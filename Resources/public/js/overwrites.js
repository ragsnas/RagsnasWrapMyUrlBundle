/**
 * Created by aschuermann on 16.03.2015.
 */
var ragsnasWrapMyUrlBundleRrewriteBaseUrl,
    ragsnasWrapMyUrlBundleRewriteUrlEncode;

(function() {
    if (typeof ragsnasWrapMyUrlBundleRrewriteBaseUrl !== 'undefined') {
        var proxied = window.XMLHttpRequest.prototype.open;
        window.XMLHttpRequest.prototype.open = function() {
            var newUrl = ragsnasWrapMyUrlBundleRrewriteBaseUrl;
            arguments[1] = newUrl.replace('%s', (ragsnasWrapMyUrlBundleRewriteUrlEncode ? encodeURIComponent(arguments[1]) : arguments[1]));

            return proxied.apply(this, [].slice.call(arguments));
        };
    }
})();
