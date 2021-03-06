<?php

namespace Consolidation\SiteAlias\Cli;

use Consolidation\SiteAlias\SiteAliasFileLoader;
use Consolidation\SiteAlias\Util\YamlDataFileLoader;
use Consolidation\SiteAlias\SiteSpecParser;

class SiteAliasCommands extends \Robo\Tasks
{
    protected $aliasLoader;

    /**
     * List available site aliases.
     *
     * @command site:list
     * @format yaml
     * @return array
     */
    public function siteList(array $dirs)
    {
        $this->aliasLoader = new SiteAliasFileLoader();
        $ymlLoader = new YamlDataFileLoader();
        $this->aliasLoader->addLoader('yml', $ymlLoader);

        foreach ($dirs as $dir) {
            $this->io()->note("Add search location: $dir");
            $this->aliasLoader->addSearchLocation($dir);
        }

        $all = $this->aliasLoader->loadAll();

        if (empty($all)) {
            throw new \Exception("No aliases found");
        }

        $result = [];
        foreach ($all as $name => $alias) {
            $result[$name] = $alias->export();
        }

        return $result;
    }

    /**
     * Parse a site specification.
     *
     * @command site-spec:parse
     * @format yaml
     * @return array
     */
    public function parse($spec, $options = ['root' => ''])
    {
        $parser = new SiteSpecParser();
        return $parser->parse($spec, $options['root']);
    }
}
