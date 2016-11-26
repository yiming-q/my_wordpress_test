(function (jQuery) {
    if (window.XDomainRequest && !jQuery.support.cors) {
        jQuery.ajaxTransport(function (s) {
            if (s.crossDomain && s.async) {
                if (s.timeout) {
                    s.xdrTimeout = s.timeout;
                    delete s.timeout;
                }
                var xdr;
                return {
                    send: function (_, complete) {
                        function callback(status, statusText, responses, responseHeaders) {
                            xdr.onload = xdr.onerror = xdr.ontimeout = xdr.onprogress = jQuery.noop;
                            xdr = undefined;
                            jQuery.event.trigger("ajaxStop");
                            complete(status, statusText, responses, responseHeaders);
                        }

                        xdr = new window.XDomainRequest();
                        xdr.onload = function () {
                            var status = 200;
                            var message = xdr.responseText;
                            try {
                                var r = JSON.parse(xdr.responseText);
                                if (r.StatusCode && r.Message) {
                                    status = r.StatusCode;
                                    message = r.Message;
                                }
                            } catch (error) {
                                if (error.name !== 'SyntaxError') {
                                    throw error;
                                }
                            }
                            callback(status, message, { text: message }, "Content-Type: " + xdr.contentType);
                        };
                        xdr.onerror = function () {
                            callback(500, "Unable to Process Data");
                        };
                        xdr.onprogress = function () {};
                        if (s.xdrTimeout) {
                            xdr.ontimeout = function () {
                                callback(0, "timeout");
                            };
                            xdr.timeout = s.xdrTimeout;
                        }
                        xdr.open(s.type, s.url);
                        xdr.send(( s.hasContent && s.data ) || null);
                    },
                    abort: function () {
                        if (xdr) {
                            xdr.onerror = jQuery.noop();
                            xdr.abort();
                        }
                    }
                };
            }
        });
    }
})(jQuery);