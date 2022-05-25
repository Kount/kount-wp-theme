<!--Start Cookie Script-->
<script type="text/javascript" charset="UTF-8" src="https://ca-eu.cookie-script.com/s/bf7f62f7e02a1b8ea7b9d9528dde0342.js"></script>
<!--End Cookie Script-->

<?php
global $post;
if(!is_page_template('template-podcast.php')):
?>
    <!-- Start of Async Drift Code -->
    <script>
        "use strict";
        var driftInitialized = false;
        function DriftBot() {
            var t = window.driftt = window.drift = window.driftt || [];
            // console.log(t);
            if (!t.init) {
                if (t.invoked) {
                    return 0;
                    // return void (window.console && console.error && console.error("Drift snippet included twice."));
                }
                t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ],
                    t.factory = function(e) {
                        return function() {
                            var n = Array.prototype.slice.call(arguments);
                            return n.unshift(e), t.push(n), t;
                        };
                    }, t.methods.forEach(function(e) {
                    t[e] = t.factory(e);
                }), t.load = function(t) {
                    var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                    o.type = "text/javascript", o.async = "true", o.defer = "true", o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                    var i = document.getElementsByTagName("script")[0];
                    i.parentNode.insertBefore(o, i);
                    console.log(o);
                };
            }
            drift.SNIPPET_VERSION = '0.3.1';
            drift.load('rd3gpgy8emp6');
        };

        window.onscroll = function() {
            if(window.scrollY > 100 && !driftInitialized) {
                driftInitialized = true;
                setTimeout(function() {
                    DriftBot();
                }, 200);
            }
        };

    </script>

    <!-- End of Async Drift Code -->

<?php
endif;

if(!is_user_logged_in() && !is_front_page()):
?>

<!-- begin Linkedin Code -->
<script type="text/javascript">
  _linkedin_partner_id = "222305";
  window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
  window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
  (function(){var s = document.getElementsByTagName("script")[0];
    var b = document.createElement("script");
    b.type = "text/javascript";b.async = true;
    b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
    s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
  <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=222305&fmt=gif" />
</noscript>
<!-- end Linkedin Code -->
<?php
endif;
if(!is_user_logged_in()): ?>
  <!-- begin Perfect Audience -->
  <script type="text/javascript">
    (function() {
      window._pa = window._pa || {};
      // _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
      // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
      // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads

      var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
      pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/5f986291b2d8d2145800010d.js";
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
    })();
  </script>
  <!-- end Perfect Audience -->

  <!-- begin G2 tracking -->
  <script>(function (c, p, d, u, id, i) {
      id = ''; // Optional Custom ID for user in your system
      u = 'https://tracking.g2crowd.com/attribution_tracking/conversions/' + c + '.js?p=' + encodeURI(p) + '&e=' + id;
      i = document.createElement('script');
      i.type = 'application/javascript';
      i.async = true;
      i.src = u;
      d.getElementsByTagName('head')[0].appendChild(i);
    }("2408", document.location.href, document));</script>
  <!-- end G2 tracking -->

  <!--Begin ZoomInfo noscript tracking-->
  <noscript>
    <img src="https://ws.zoominfo.com/pixel/zqqEbtCkjbBppvBqUlTZ" width="1" height="1" style="display: none;" />
  </noscript>
  <!--End ZoomInfo noscript tracking-->
<?php
endif;
?>
