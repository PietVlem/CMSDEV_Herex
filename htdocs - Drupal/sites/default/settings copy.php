parameters:
    session.storage.options: { gc_probability: 1, gc_divisor: 100, gc_maxlifetime: 200000, cookie_lifetime: 2000000 }
    twig.config: { debug: true, auto_reload: true, cache: true }
    renderer.config: { required_cache_contexts: ['languages:language_interface', theme, user.permissions], auto_placeholder_conditions: { max-age: 0, contexts: [session, user], tags: {  } } }
    http.response.debug_cacheability_headers: true
    factory.keyvalue: {  }
    factory.keyvalue.expirable: {  }
    filter_protocols: [http, https, ftp, news, nntp, tel, telnet, mailto, irc, ssh, sftp, webcal, rtsp]
    cors.config: { enabled: false, allowedHeaders: {  }, allowedMethods: {  }, allowedOrigins: ['*'], exposedHeaders: false, maxAge: false, supportsCredentials: false }