/**
 * Created by aschuermann on 16.03.2015.
 */
var ragsnasWrapMyUrlBundleRrewriteBaseUrl,
    ragsnasWrapMyUrlBundleRewriteUrlEncode,
    ragsnasWrapMyUrlBundleLeaveUntouched = [];

(function() {
    if (typeof ragsnasWrapMyUrlBundleRrewriteBaseUrl !== 'undefined') {
        var proxied = window.XMLHttpRequest.prototype.open;
        window.XMLHttpRequest.prototype.open = function() {
            if (ragsnasWrapMyUrlBundleLeaveUntouched.length > 0) {
                for (var i = 0; i < ragsnasWrapMyUrlBundleLeaveUntouched.length ;i++) {
                    if (arguments[1].substring(0, ragsnasWrapMyUrlBundleLeaveUntouched[i].length) === ragsnasWrapMyUrlBundleLeaveUntouched[i]) {
                        return proxied.apply(this, [].slice.call(arguments));
                    }
                }
            }
            var newUrl = ragsnasWrapMyUrlBundleRrewriteBaseUrl;
            arguments[1] = newUrl.replace('%s', (ragsnasWrapMyUrlBundleRewriteUrlEncode ? encodeURIComponent(arguments[1]) : arguments[1]));

            return proxied.apply(this, [].slice.call(arguments));
        };
    }
})();
