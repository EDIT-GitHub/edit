<?php
/**
 * The template for Header
* @package MrBones
*/
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<style>
@-webkit-keyframes logoAnim-e{0%{transform:matrix(1,0,0,1,0,0);-webkit-transform:matrix(1,0,0,1,0,0);width:42px;height:42px}10%{transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40);width:42px;height:42px}20%{height:122px;width:42px;transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40)}30%{height:42px;width:42px;transform:matrix(1,0,0,1,0,-80);-webkit-transform:matrix(1,0,0,1,0,-80)}40%{height:82px;width:122px;transform:matrix(1,0,0,1,0,-80);-webkit-transform:matrix(1,0,0,1,0,-80)}50%{width:82px;height:82px;transform:matrix(1,0,0,1,40,-80);-webkit-transform:matrix(1,0,0,1,40,-80)}60%{width:82px;height:42px;transform:matrix(1,0,0,1,40,-40);-webkit-transform:matrix(1,0,0,1,40,-40)}70%{width:122px;height:42px;transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40)}80%{width:42px;height:42px;transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40)}100%{width:42px;height:42px;transform:matrix(1,0,0,1,0,0);-webkit-transform:matrix(1,0,0,1,0,0)}}@keyframes logoAnim-e{0%{transform:matrix(1,0,0,1,0,0);width:42px;height:42px}10%{transform:matrix(1,0,0,1,0,-40);width:42px;height:42px}20%{height:122px;width:42px;transform:matrix(1,0,0,1,0,-40)}30%{height:42px;width:42px;transform:matrix(1,0,0,1,0,-80)}40%{height:82px;width:122px;transform:matrix(1,0,0,1,0,-80)}50%{width:82px;height:82px;transform:matrix(1,0,0,1,40,-80)}60%{width:82px;height:42px;transform:matrix(1,0,0,1,40,-40)}70%{width:122px;height:42px;transform:matrix(1,0,0,1,0,-40)}80%{width:42px;height:42px;transform:matrix(1,0,0,1,0,-40)}100%{width:42px;height:42px;transform:matrix(1,0,0,1,0,0)}}@-webkit-keyframes logoAnim-d{0%{transform:matrix(1,0,0,1,0,0);-webkit-transform:matrix(1,0,0,1,0,0);width:42px;height:42px}10%{transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40);width:42px;height:42px}20%{width:82px;height:42px;transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40)}22%{width:42px;height:42px;transform:matrix(1,0,0,1,0,-40);-webkit-transform:matrix(1,0,0,1,0,-40)}100%,27%,60%,80%{width:42px;height:42px;transform:matrix(1,0,0,1,0,0);-webkit-transform:matrix(1,0,0,1,0,0)}70%{width:82px;height:42px;transform:matrix(1,0,0,1,-40,0);-webkit-transform:matrix(1,0,0,1,-40,0)}}@keyframes logoAnim-d{0%{transform:matrix(1,0,0,1,0,0);width:42px;height:42px}10%{transform:matrix(1,0,0,1,0,-40);width:42px;height:42px}20%{width:82px;height:42px;transform:matrix(1,0,0,1,0,-40)}22%{width:42px;height:42px;transform:matrix(1,0,0,1,0,-40)}100%,27%,60%,80%{width:42px;height:42px;transform:matrix(1,0,0,1,0,0)}70%{width:82px;height:42px;transform:matrix(1,0,0,1,-40,0)}}@-webkit-keyframes logoAnim-i{0%{opacity:1}}@keyframes logoAnim-i{0%{opacity:1}}@-webkit-keyframes logoAnim-t{0%,100%,90%{transform:matrix(1,0,0,1,0,0);-webkit-transform:matrix(1,0,0,1,0,0);width:42px;height:42px}10%,30%{transform:matrix(1,0,0,1,0,40);-webkit-transform:matrix(1,0,0,1,0,40);width:42px;height:42px}20%{transform:matrix(1,0,0,1,0,-80);-webkit-transform:matrix(1,0,0,1,0,-80);width:42px;height:42px}40%{transform:matrix(1,0,0,1,-40,40);-webkit-transform:matrix(1,0,0,1,-40,40);width:42px;height:42px}50%{transform:matrix(1,0,0,1,-80,40);-webkit-transform:matrix(1,0,0,1,-80,40);width:82px;height:42px}60%{transform:matrix(1,0,0,1,-80,40);-webkit-transform:matrix(1,0,0,1,-80,40);width:82px;height:82px}70%{transform:matrix(1,0,0,1,-120,40);-webkit-transform:matrix(1,0,0,1,-120,40);width:122px;height:82px}80%{transform:matrix(1,0,0,1,0,40);-webkit-transform:matrix(1,0,0,1,0,40);width:42px;height:82px}}@keyframes logoAnim-t{0%,100%,90%{transform:matrix(1,0,0,1,0,0);width:42px;height:42px}10%,30%{transform:matrix(1,0,0,1,0,40);width:42px;height:42px}20%{transform:matrix(1,0,0,1,0,-80);width:42px;height:42px}40%{transform:matrix(1,0,0,1,-40,40);width:42px;height:42px}50%{transform:matrix(1,0,0,1,-80,40);width:82px;height:42px}60%{transform:matrix(1,0,0,1,-80,40);width:82px;height:82px}70%{transform:matrix(1,0,0,1,-120,40);width:122px;height:82px}80%{transform:matrix(1,0,0,1,0,40);width:42px;height:82px}}#loaderLayer{width:100%;height:100%;position:fixed;top:0;right:0;left:0;bottom:0;background-color:#000;z-index:10000;text-align:center;transition:transform .3s ease-out;-webkit-transition:transform .3s ease-out; will-change: transform;}#loaderLayer.remove{transform:translate(0,100%);-webkit-transform:translate(0,100%)}#loaderLayer .logo-anim{position:fixed;top:calc(50% + 90px);left:50%;width:180px;height:180px;transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%)}#loaderLayer .logo-anim .logo-anim__item{position:absolute;width:42px;height:42px;border:2px solid #fff; will-change: transform;}#loaderLayer .logo-anim .logo-anim__item svg{position:absolute;left:-2px;top:-2px}#loaderLayer .logo-anim .logo-anim__item.logo-e{top:0;left:0;animation:6s logoAnim-e infinite;-webkit-animation:6s logoAnim-e infinite}#loaderLayer .logo-anim .logo-anim__item.logo-d{top:0;left:40px;animation:6s logoAnim-d infinite;-webkit-animation:6s logoAnim-d infinite}#loaderLayer .logo-anim .logo-anim__item.logo-i{top:0;left:80px;animation:6s logoAnim-i infinite;-webkit-animation:6s logoAnim-i infinite}#loaderLayer .logo-anim .logo-anim__item.logo-t{top:0;left:120px;animation:6s logoAnim-t infinite;-webkit-animation:6s logoAnim-t infinite}#loaderLayer .logo-anim .logo-dot{width:6px;height:6px;border-radius:3px;background-color:#f2d31f;border:none;top:23px;left:25px}.pageLoaderLayer,.pageLoaderLayer .full-loader{height:100%;top:0;left:0;right:0;bottom:0;font-size:0;width:100%}.pageLoaderLayer{position:fixed;transform:translate(0,-100%);-webkit-transform:translate(0,-100%);z-index:9999;display:none;background-color:transparent;transition:transform .3s ease-out;-webkit-transition:transform .3s ease-out}.pageLoaderLayer .full-loader{position:absolute;z-index:10000;background-color:#000}.pageLoaderLayer .after{width:100%;height:50%;position:absolute;bottom:-50%;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMCIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);background:-moz-linear-gradient(top,rgba(0,0,0,1) 0,rgba(0,0,0,0) 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0,rgba(0,0,0,1)),color-stop(100%,rgba(0,0,0,0)));background:-webkit-linear-gradient(top,rgba(0,0,0,1) 0,rgba(0,0,0,0) 100%);background:-o-linear-gradient(top,rgba(0,0,0,1) 0,rgba(0,0,0,0) 100%);background:-ms-linear-gradient(top,rgba(0,0,0,1) 0,rgba(0,0,0,0) 100%);background:linear-gradient(to bottom,rgba(0,0,0,1) 0,rgba(0,0,0,0) 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#00000000', GradientType=0 )}.pageLoaderLayer .before{width:100%;height:50%;position:absolute;top:-50%;background:url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);background:-moz-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,1) 100%);background:-webkit-gradient(linear,left top,left bottom,color-stop(0,rgba(0,0,0,0)),color-stop(100%,rgba(0,0,0,1)));background:-webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,1) 100%);background:-o-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,1) 100%);background:-ms-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,1) 100%);background:linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,1) 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#000000', GradientType=0 )}.pageLoaderLayer.active{transform:translate(0,0);-webkit-transform:translate(0,0)}.pageLoaderLayer.removed{transform:translate(0,100%);-webkit-transform:translate(0,100%)}
</style>

<?php if(LANGUAGE == 'PT'): ?>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>
      <?php wp_title( '', true, 'right' ); ?>
    </title>
    <link rel="profile" href="//gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--  Don't zoom form when opened on IOS Safari -->
    
    <meta name="viewport" content="width=device-width, height=device-height, maximum-scale=1, minimum-scale=1">
    <?php wp_head(); ?>

    <script>
      window.GLOBAL_URL = "<?php bloginfo('template_url');?>";
    </script>
    <?php if ( !is_user_logged_in()): ?>
      <script>
        (function (b, o, i, l, e, r) {
          b.GoogleAnalyticsObject = l; b[l] || (b[l] =
            function () { (b[l].q = b[l].q || []).push(arguments) }); b[l].l = +new Date;
          e = o.createElement(i); r = o.getElementsByTagName(i)[0];
          e.src = '//www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-23379783-1', 'auto'); ga('require', 'displayfeatures'); ga('send', 'pageview');
      </script>
      <!-- Facebook Pixel Code -->
      <script>
        !function (f, b, e, v, n, t, s) {
          if (f.fbq) return; n = f.fbq = function () {
            n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
          }; if (!f._fbq) f._fbq = n;
          n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = []; t = b.createElement(e); t.async = !0;
          t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s)
        }(window,
          document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '669826776435013');
        fbq('track', "PageView");
      </script>
      <noscript>
        <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=669826776435013&ev=PageView&noscript=1" />
      </noscript>
      <!-- End Facebook Pixel Code -->
      <!-- LinkedIn conversion tracking -->
      <script type="text/javascript">
        _linkedin_partner_id = "490417";
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
          <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=490417&fmt=gif" />
        </noscript>
        <!-- End LinkedIn conversion tracking -->
      <?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
      <div id="loaderLayer">
        <div class="logo-anim">
          <span class="logo-anim__item logo-e">
            <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
            width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
            <g>
              <path fill="#ffffff" d="M14.473,11.291c0-0.293,0.235-0.558,0.558-0.558h11.938c0.324,0,0.559,0.265,0.559,0.558v2.406
              c0,0.293-0.234,0.557-0.559,0.557h-8.682v4.812h7.244c0.293,0,0.559,0.264,0.559,0.557v2.435c0,0.323-0.266,0.558-0.559,0.558
              h-7.244v5.134h8.682c0.324,0,0.559,0.264,0.559,0.557v2.405c0,0.294-0.234,0.558-0.559,0.558H15.031
              c-0.323,0-0.558-0.264-0.558-0.558V11.291z" />
            </g>
          </svg>
        </span>
        <span class="logo-anim__item logo-d">
          <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
          width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
          <g>
            <path fill="#ffffff" d="M12.112,11.291c0-0.293,0.234-0.558,0.528-0.558h6.952c5.662,0,10.297,4.606,10.297,10.238
            c0,5.69-4.635,10.296-10.297,10.296H12.64c-0.293,0-0.528-0.264-0.528-0.558V11.291z M19.24,27.689c3.813,0,6.6-2.875,6.6-6.718
            c0-3.813-2.787-6.688-6.6-6.688h-3.344v13.405H19.24z" />
          </g>
        </svg>
      </span>
      <span class="logo-anim__item logo-i">
        <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
        width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
        <g>
          <path fill="#ffffff" d="M19.635,12.135c0-0.293,0.264-0.557,0.558-0.557h2.728c0.294,0,0.558,0.264,0.558,0.557v19.418
          c0,0.295-0.264,0.559-0.558,0.559h-2.728c-0.294,0-0.558-0.264-0.558-0.559V12.135z" />
        </g>
      </svg>
    </span>
    <span class="logo-anim__item logo-t">
      <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
      width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
      <g>
        <path fill="#ffffff" d="M19.105,14.349h-4.425c-0.318,0-0.55-0.261-0.55-0.55v-2.371c0-0.289,0.231-0.55,0.55-0.55h12.64
        c0.316,0,0.549,0.261,0.549,0.55v2.371c0,0.289-0.232,0.55-0.549,0.55h-4.426v16.225c0,0.289-0.26,0.549-0.55,0.549h-2.69
        c-0.288,0-0.549-0.26-0.549-0.549V14.349z" />
      </g>
    </svg>
    <span class="logo-dot"></span>
  </span>
</div>
</div>
<div class="pageLoaderLayer">
  <div class="full-loader"></div>
</div>
<div id="menu-holder">
</div>
<div class="logo">
  <a href="/" id="logoEdit">
    <div class="logo-e">
      <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
      width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
      <g>
        <path fill="#1A171B" d="M14.473,11.291c0-0.293,0.235-0.558,0.558-0.558h11.938c0.324,0,0.559,0.265,0.559,0.558v2.406
        c0,0.293-0.234,0.557-0.559,0.557h-8.682v4.812h7.244c0.293,0,0.559,0.264,0.559,0.557v2.435c0,0.323-0.266,0.558-0.559,0.558
        h-7.244v5.134h8.682c0.324,0,0.559,0.264,0.559,0.557v2.405c0,0.294-0.234,0.558-0.559,0.558H15.031
        c-0.323,0-0.558-0.264-0.558-0.558V11.291z" />
      </g>
    </svg>
  </div>
  <div class="logo-d">
    <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
    width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
    <g>
      <path fill="#1A171B" d="M12.112,11.291c0-0.293,0.234-0.558,0.528-0.558h6.952c5.662,0,10.297,4.606,10.297,10.238
      c0,5.69-4.635,10.296-10.297,10.296H12.64c-0.293,0-0.528-0.264-0.528-0.558V11.291z M19.24,27.689c3.813,0,6.6-2.875,6.6-6.718
      c0-3.813-2.787-6.688-6.6-6.688h-3.344v13.405H19.24z" />
    </g>
  </svg>
</div>
<div class="logo-i">
  <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
  width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
  <g>
    <path fill="#1A171B" d="M19.635,12.135c0-0.293,0.264-0.557,0.558-0.557h2.728c0.294,0,0.558,0.264,0.558,0.557v19.418
    c0,0.295-0.264,0.559-0.558,0.559h-2.728c-0.294,0-0.558-0.264-0.558-0.559V12.135z" />
  </g>
</svg>
</div>
<div class="logo-t">
  <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
  width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
  <g>
    <path fill="#1A171B" d="M19.105,14.349h-4.425c-0.318,0-0.55-0.261-0.55-0.55v-2.371c0-0.289,0.231-0.55,0.55-0.55h12.64
    c0.316,0,0.549,0.261,0.549,0.55v2.371c0,0.289-0.232,0.55-0.549,0.55h-4.426v16.225c0,0.289-0.26,0.549-0.55,0.549h-2.69
    c-0.288,0-0.549-0.26-0.549-0.549V14.349z" />
  </g>
</svg>
<div class="logo-dot"></div>
<div class="page-loader">
  <div class="inner">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>
</div>
</div>
</a>
</div>
<div id="inner-navigation">
  <a class="inner-nav previous" href="">
    <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
    width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
    <g>
      <g>
        <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" points="16.493,2.862 13.623,0.007 6.449,7.145 6.377,7.073
        3.507,9.928 3.579,10 3.507,10.071 6.377,12.927 6.449,12.855 13.623,19.993 16.493,17.138 9.319,10        " />
      </g>
    </g>
  </svg>
</a>
<a class="inner-nav next" href="">
  <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
  width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
  <g>
    <g>
      <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" points="16.493,9.929 13.623,7.073 13.551,7.145 6.377,0.007
      3.507,2.862 10.681,10 3.507,17.138 6.377,19.993 13.552,12.855 13.623,12.927 16.493,10.072 16.421,10         " />
    </g>
  </g>
</svg>
</a>
<a class="inner-nav close" href="">
  <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
  width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
  <g>
    <g>
      <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" points="19.899,2.929 17.07,0.101 10,7.171 2.929,0.101
      0.101,2.929 7.171,10 0.101,17.071 2.929,19.899 10,12.828 17.07,19.899 19.899,17.071 12.828,10       " />
    </g>
  </g>
</svg>
</a>
</div>
<div id="headerNeswletter">
  <div class="nl-logo">
    <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
    width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
    <g>
      <g>
        <path class="newsletter-icon" d="M-0.001,0V23.99L24.001,24V0H-0.001z M21.594,21.615H2.406V2.409h19.188V21.615z M19.725,5.457H4.67v2.41
        h15.055V5.457z M15.629,12.899h4.096v-2.41h-4.096V12.899z M15.629,17.258h4.096v-2.375h-4.096V17.258z M4.778,18.959h8.443v-8.47
        H4.778V18.959z M7.149,12.899h3.665v3.685H7.149V12.899z" />
      </g>
    </g>
  </svg>
</div>
<div class="nl-text">Newsletter</div>
</div>
<div id="menu-btn">
  <div class="top-bar"></div>
  <div class="medium-bar"></div>
  <div class="bottom-bar"></div>
</div>
<!-- Dynamic -->
<div id="side-interface">
  <div class="side-interface-wrapper">
    <div id="main-btn" class="main-btn active">
      <div class="icon">
        <svg version="1.1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
        height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
        <g id="activeLayer">
          <rect x="1" y="1" fill="#FFDD15" width="18" height="18" />
          <path fill="#FFFFFF" d="M13.751,6.363v2.542c0,1.934,3,1.934,3,0V6.363C16.751,4.428,13.751,4.428,13.751,6.363" />
        </g>
        <g id="Layer_1">
          <path d="M18,18H2V2h16V18z M20,0H0v20h20V0z" />
          <rect x="9" y="9" fill="#020202" width="2" height="2" />
          <rect x="9" y="13" fill="#020202" width="2" height="2" />
          <rect x="9" y="5" fill="#020202" width="2" height="2" />
        </g>
      </svg>
    </div>
    <span>Menu</span>
  </div>
  <div onclick="document.getElementById('search-input').focus(); return false;" class="pesquisa-btn">
    <div class="icon">
      <svg version="1.1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px" width="20px"
      height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <g id="activeLayer">
        <path fill="#FFDD15" d="M18.5,6.813c0,3.534-2.876,6.396-6.422,6.396c-3.545,0-6.419-2.863-6.419-6.396
        c0-3.532,2.874-6.396,6.419-6.396C15.624,0.417,18.5,3.281,18.5,6.813" />
        <path fill="#FFDD15" d="M13.727,7.477c-0.023,0.874-0.729,1.579-1.604,1.603c-1.929,0.052-1.934,3.051,0,3
        c2.553-0.07,4.535-2.052,4.604-4.604C16.779,5.541,13.779,5.545,13.727,7.477" />
      </g>
      <g id="Layer_1">
        <path fill="#020202" d="M6.398,9.79C6.283,9.86,6.163,9.923,6.062,10.024L0.5,15.584c-0.613,0.615-0.671,1.553-0.129,2.098
        l0.985,0.982c0.543,0.543,1.482,0.486,2.095-0.127l5.561-5.563c0.122-0.122,0.205-0.263,0.282-0.404
        C8.056,11.975,7.038,10.999,6.398,9.79z" />
        <path fill="#020202" d="M11.83,2c3.021,0,5.479,2.458,5.479,5.479c0,3.02-2.457,5.478-5.479,5.478
        c-3.021,0-5.479-2.458-5.479-5.478C6.352,4.458,8.81,2,11.83,2 M11.83,0C7.701,0,4.352,3.348,4.352,7.479
        c0,4.128,3.349,7.478,7.479,7.478c4.13,0,7.479-3.35,7.479-7.478C19.309,3.348,15.96,0,11.83,0" />
      </g>
    </svg>
  </div>
  <span>Pesquisa</span>
</div>
<div class="main-btn">
  <a class="lang-link no-route" href="https://edit.com.es/">
    <div class="icon">
      <svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="7.375 6.667 20 20" enable-background="new 7.375 6.667 20 20" xml:space="preserve">
        <g>
          <path d="M7.375,6.667v20h20v-20H7.375z M25.375,24.667h-16v-16h16V24.667z"></path>
        </g>
        <g>
          <path d="M11.67,12.907h4.8v1.34h-3.3v1.71h3.21v1.34h-3.21v1.79h3.3v1.34h-4.8V12.907z"></path>
          <path d="M21.42,14.887c0-0.26-0.109-0.465-0.324-0.615c-0.218-0.15-0.476-0.225-0.775-0.225c-0.381,0-0.676,0.075-0.885,0.225
          c-0.211,0.15-0.315,0.352-0.315,0.605c0,0.133,0.028,0.248,0.085,0.345c0.057,0.097,0.126,0.18,0.21,0.25
          c0.083,0.07,0.177,0.13,0.28,0.18c0.103,0.05,0.201,0.088,0.295,0.115l1.38,0.44c0.247,0.08,0.476,0.179,0.685,0.295
          c0.211,0.116,0.393,0.256,0.545,0.42c0.153,0.163,0.271,0.356,0.355,0.58c0.083,0.224,0.125,0.478,0.125,0.765
          c0,0.233-0.045,0.483-0.135,0.75c-0.09,0.268-0.242,0.516-0.455,0.746c-0.213,0.229-0.495,0.422-0.846,0.574
          c-0.35,0.153-0.785,0.23-1.305,0.23c-0.434,0-0.805-0.043-1.115-0.131c-0.31-0.086-0.572-0.197-0.785-0.334
          s-0.381-0.293-0.504-0.465c-0.124-0.174-0.219-0.348-0.286-0.521s-0.11-0.341-0.13-0.5c-0.02-0.16-0.03-0.296-0.03-0.41l1.5-0.03
          c0,0.2,0.037,0.37,0.109,0.51c0.073,0.141,0.172,0.256,0.295,0.346c0.125,0.09,0.27,0.154,0.436,0.195
          c0.166,0.039,0.34,0.06,0.52,0.06c0.127,0,0.262-0.017,0.405-0.05s0.276-0.084,0.399-0.15s0.226-0.152,0.306-0.255
          s0.12-0.228,0.12-0.375c0-0.101-0.014-0.19-0.04-0.271s-0.073-0.152-0.14-0.22c-0.067-0.065-0.159-0.132-0.275-0.194
          c-0.117-0.063-0.268-0.129-0.455-0.195l-1.641-0.59c-0.206-0.073-0.396-0.173-0.569-0.3c-0.173-0.126-0.321-0.271-0.444-0.435
          c-0.125-0.164-0.221-0.342-0.291-0.535c-0.07-0.193-0.105-0.396-0.105-0.61c0-0.24,0.045-0.497,0.135-0.77
          c0.09-0.273,0.236-0.527,0.44-0.76c0.203-0.233,0.472-0.426,0.805-0.58c0.333-0.153,0.744-0.23,1.23-0.23
          c0.58,0,1.047,0.083,1.399,0.25s0.625,0.364,0.815,0.59c0.189,0.226,0.316,0.457,0.38,0.69c0.063,0.233,0.095,0.42,0.095,0.56
          L21.42,14.887z"></path>
        </g>
      </svg>
    </div>
    <span>Edit.ES</span>
  </a>
</div>
</div>
<div class="menu-contact-wrapper">
  <?php
  $arguments = array(
    'offset'           => '',
    'showposts'        => '0',
    'order'            => 'ASC',
    'orderby'          => 'menu_order',
    'post_type'        => 'localizacoes',
    'suppress_filters'  => '0'
  );
  $locations = get_posts( $arguments );
  $count = 0;
  if($locations):
    foreach($locations as $post):
      setup_postdata($post);
      $gmap = get_field('localizacao');
      ?>
      <div class="menu-contact-block">
        <p class="location-name"><?php the_field('nome'); ?> <?php the_field('titulo'); ?></p>
        <a class="location-link no-route" href="tel:<?php the_field('telefone'); ?>"><?php the_field('telefone'); ?></a>
        <a class="location-link no-route" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
      </div>
      <?php
    endforeach;
    wp_reset_postdata();
  endif;
  ?>
</div>
<div class="menu-social-block">
  <?php wp_nav_menu( array( 'theme_location'=>'header_social','walker' => new Header_Social_Walker(), 'items_wrap' => '%3$s') ); ?>
</div>
</div>
<div id="menu">
  <?php wp_nav_menu( array( 'theme_location'=>'primary','walker' => new Header_Walker()) ); ?>
  <div class="search-container">
    <div class="search-form">
      <div class="input-clear">
        <div class="barTop"></div>
        <div class="barBottom"></div>
      </div>
      <form id="search-form" action="/">
        <input id="search-input" class="typeahead" type="text" name="s" placeholder="Pesquisar">
        <div class="btn-icon">
          <div class="inner">
            <div class="icon">
              <svg version="1.0" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
              width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
              <path d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
              c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
              c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z" /></svg>
            </div>
          </div>
        </div>
        <div class="see-all">ver todos os resultados</div>
      </form>
    </div>
  </div>
  <div class="newsletter-container">
    <div class="newsletter-form">
      <div class="input-clear">
        <div class="barTop"></div>
        <div class="barBottom"></div>
      </div>
      <form id="newsletter-form">
        <input id="newsletter-input" class="header-input" type="text" name="newsletter-input" placeholder="Email">
        <div class="btn-icon">
          <div class="border"></div>
          <div class="inner">
            <div class="icon">
              <div class="submit-icon"></div>
            </div>
          </div>
        </div>
        <div class="row message">
        </div>
      </form>
    </div>
  </div>
</div>
<?php else: ?>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>
      <?php wp_title( '', true, 'right' ); ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <meta name="viewport" content="width=device-width, height=device-height, maximum-scale=1, minimum-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <?php wp_head(); ?>
    <script>
      window.GLOBAL_URL = "<?php bloginfo('template_url');?>";
    </script>
    <?php if ( !is_user_logged_in()): ?>
      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      <script>
        (function(b, o, i, l, e, r) {
          b.GoogleAnalyticsObject = l;
          b[l] || (b[l] =
            function() {
              (b[l].q = b[l].q || []).push(arguments)
            });
          b[l].l = +new Date;
          e = o.createElement(i);
          r = o.getElementsByTagName(i)[0];
          e.src = '//www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-90205729-1', 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
      </script>
      <!-- Facebook Pixel Code -->
      <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '2064385837145877');
          fbq('track', 'PageView');
        </script>
        <noscript>
          <img height="1" width="1"
          src="https://www.facebook.com/tr?id=2064385837145877&ev=PageView
          &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
      <?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
      <div id="loaderLayer">
        <div class="logo-anim">
          <span class="logo-anim__item logo-e">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
            <g>
              <path fill="#ffffff" d="M14.473,11.291c0-0.293,0.235-0.558,0.558-0.558h11.938c0.324,0,0.559,0.265,0.559,0.558v2.406
              c0,0.293-0.234,0.557-0.559,0.557h-8.682v4.812h7.244c0.293,0,0.559,0.264,0.559,0.557v2.435c0,0.323-0.266,0.558-0.559,0.558
              h-7.244v5.134h8.682c0.324,0,0.559,0.264,0.559,0.557v2.405c0,0.294-0.234,0.558-0.559,0.558H15.031
              c-0.323,0-0.558-0.264-0.558-0.558V11.291z" />
            </g>
          </svg>
        </span>
        <span class="logo-anim__item logo-d">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
          <g>
            <path fill="#ffffff" d="M12.112,11.291c0-0.293,0.234-0.558,0.528-0.558h6.952c5.662,0,10.297,4.606,10.297,10.238
            c0,5.69-4.635,10.296-10.297,10.296H12.64c-0.293,0-0.528-0.264-0.528-0.558V11.291z M19.24,27.689c3.813,0,6.6-2.875,6.6-6.718
            c0-3.813-2.787-6.688-6.6-6.688h-3.344v13.405H19.24z" />
          </g>
        </svg>
      </span>
      <span class="logo-anim__item logo-i">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
        <g>
          <path fill="#ffffff" d="M19.635,12.135c0-0.293,0.264-0.557,0.558-0.557h2.728c0.294,0,0.558,0.264,0.558,0.557v19.418
          c0,0.295-0.264,0.559-0.558,0.559h-2.728c-0.294,0-0.558-0.264-0.558-0.559V12.135z" />
        </g>
      </svg>
    </span>
    <span class="logo-anim__item logo-t">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
      <g>
        <path fill="#ffffff" d="M19.105,14.349h-4.425c-0.318,0-0.55-0.261-0.55-0.55v-2.371c0-0.289,0.231-0.55,0.55-0.55h12.64
        c0.316,0,0.549,0.261,0.549,0.55v2.371c0,0.289-0.232,0.55-0.549,0.55h-4.426v16.225c0,0.289-0.26,0.549-0.55,0.549h-2.69
        c-0.288,0-0.549-0.26-0.549-0.549V14.349z" />
      </g>
    </svg>
    <span class="logo-dot"></span>
  </span>
</div>
</div>
<div class="pageLoaderLayer">
  <!-- <div class="before"></div> -->
  <div class="full-loader"></div>
  <!-- <div class="after"></div> -->
</div>
<div id="menu-holder">
</div>
<div class="logo">
  <a href="/" id="logoEdit">
    <div class="logo-e">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
        <g>
          <path fill="#1A171B" d="M14.473,11.291c0-0.293,0.235-0.558,0.558-0.558h11.938c0.324,0,0.559,0.265,0.559,0.558v2.406
          c0,0.293-0.234,0.557-0.559,0.557h-8.682v4.812h7.244c0.293,0,0.559,0.264,0.559,0.557v2.435c0,0.323-0.266,0.558-0.559,0.558
          h-7.244v5.134h8.682c0.324,0,0.559,0.264,0.559,0.557v2.405c0,0.294-0.234,0.558-0.559,0.558H15.031
          c-0.323,0-0.558-0.264-0.558-0.558V11.291z" />
        </g>
      </svg>
    </div>
    <div class="logo-d">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
        <g>
          <path fill="#1A171B" d="M12.112,11.291c0-0.293,0.234-0.558,0.528-0.558h6.952c5.662,0,10.297,4.606,10.297,10.238
          c0,5.69-4.635,10.296-10.297,10.296H12.64c-0.293,0-0.528-0.264-0.528-0.558V11.291z M19.24,27.689c3.813,0,6.6-2.875,6.6-6.718
          c0-3.813-2.787-6.688-6.6-6.688h-3.344v13.405H19.24z" />
        </g>
      </svg>
    </div>
    <div class="logo-i">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
        <g>
          <path fill="#1A171B" d="M19.635,12.135c0-0.293,0.264-0.557,0.558-0.557h2.728c0.294,0,0.558,0.264,0.558,0.557v19.418
          c0,0.295-0.264,0.559-0.558,0.559h-2.728c-0.294,0-0.558-0.264-0.558-0.559V12.135z" />
        </g>
      </svg>
    </div>
    <div class="logo-t">
      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="42px" height="42px" viewBox="0 0 42 42" enable-background="new 0 0 42 42" xml:space="preserve">
        <g>
          <path fill="#1A171B" d="M19.105,14.349h-4.425c-0.318,0-0.55-0.261-0.55-0.55v-2.371c0-0.289,0.231-0.55,0.55-0.55h12.64
          c0.316,0,0.549,0.261,0.549,0.55v2.371c0,0.289-0.232,0.55-0.549,0.55h-4.426v16.225c0,0.289-0.26,0.549-0.55,0.549h-2.69
          c-0.288,0-0.549-0.26-0.549-0.549V14.349z" />
        </g>
      </svg>
      <div class="logo-dot"></div>
      <div class="page-loader">
        <div class="inner">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
      </div>
    </div>
    <!--<p class="beta">BETA</p>-->
  </a>
</div>
<div id="inner-navigation">
  <a class="inner-nav previous" href="">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <g>
        <g>
          <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" points="16.493,2.862 13.623,0.007 6.449,7.145 6.377,7.073
          3.507,9.928 3.579,10 3.507,10.071 6.377,12.927 6.449,12.855 13.623,19.993 16.493,17.138 9.319,10        " />
        </g>
      </g>
    </svg>
  </a>
  <a class="inner-nav next" href="">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <g>
        <g>
          <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" points="16.493,9.929 13.623,7.073 13.551,7.145 6.377,0.007
          3.507,2.862 10.681,10 3.507,17.138 6.377,19.993 13.552,12.855 13.623,12.927 16.493,10.072 16.421,10         " />
        </g>
      </g>
    </svg>
  </a>
  <a class="inner-nav close" href="">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
      <g>
        <g>
          <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" points="19.899,2.929 17.07,0.101 10,7.171 2.929,0.101
          0.101,2.929 7.171,10 0.101,17.071 2.929,19.899 10,12.828 17.07,19.899 19.899,17.071 12.828,10       " />
        </g>
      </g>
    </svg>
  </a>
</div>
<div id="headerNeswletter">
  <div class="nl-logo">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
      <g>
        <g>
          <path class="newsletter-icon" d="M-0.001,0V23.99L24.001,24V0H-0.001z M21.594,21.615H2.406V2.409h19.188V21.615z M19.725,5.457H4.67v2.41
          h15.055V5.457z M15.629,12.899h4.096v-2.41h-4.096V12.899z M15.629,17.258h4.096v-2.375h-4.096V17.258z M4.778,18.959h8.443v-8.47
          H4.778V18.959z M7.149,12.899h3.665v3.685H7.149V12.899z" />
        </g>
      </g>
    </svg>
  </div>
  <div class="nl-text">Newsletter</div>
</div>
<div id="menu-btn">
  <div class="top-bar"></div>
  <div class="medium-bar"></div>
  <div class="bottom-bar"></div>
</div>
<!-- Dynamic -->
<div id="side-interface">
  <div class="side-interface-wrapper">
    <div id="main-btn" class="main-btn active">
      <div class="icon">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <g id="activeLayer">
            <rect x="1" y="1" fill="#FFDD15" width="18" height="18" />
            <path fill="#FFFFFF" d="M13.751,6.363v2.542c0,1.934,3,1.934,3,0V6.363C16.751,4.428,13.751,4.428,13.751,6.363" />
          </g>
          <g id="Layer_1">
            <path d="M18,18H2V2h16V18z M20,0H0v20h20V0z" />
            <rect x="9" y="9" fill="#020202" width="2" height="2" />
            <rect x="9" y="13" fill="#020202" width="2" height="2" />
            <rect x="9" y="5" fill="#020202" width="2" height="2" />
          </g>
        </svg>
      </div>
      <span>Menú</span>
    </div>
    <div onclick="document.getElementById('search-input').focus(); return false;" class="pesquisa-btn">
      <div class="icon">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
          <g id="activeLayer">
            <path fill="#FFDD15" d="M18.5,6.813c0,3.534-2.876,6.396-6.422,6.396c-3.545,0-6.419-2.863-6.419-6.396
            c0-3.532,2.874-6.396,6.419-6.396C15.624,0.417,18.5,3.281,18.5,6.813" />
            <path fill="#FFFFFF" d="M13.727,7.477c-0.023,0.874-0.729,1.579-1.604,1.603c-1.929,0.052-1.934,3.051,0,3
            c2.553-0.07,4.535-2.052,4.604-4.604C16.779,5.541,13.779,5.545,13.727,7.477" />
          </g>
          <g id="Layer_1">
            <path fill="#020202" d="M6.398,9.79C6.283,9.86,6.163,9.923,6.062,10.024L0.5,15.584c-0.613,0.615-0.671,1.553-0.129,2.098
            l0.985,0.982c0.543,0.543,1.482,0.486,2.095-0.127l5.561-5.563c0.122-0.122,0.205-0.263,0.282-0.404
            C8.056,11.975,7.038,10.999,6.398,9.79z" />
            <path fill="#020202" d="M11.83,2c3.021,0,5.479,2.458,5.479,5.479c0,3.02-2.457,5.478-5.479,5.478
            c-3.021,0-5.479-2.458-5.479-5.478C6.352,4.458,8.81,2,11.83,2 M11.83,0C7.701,0,4.352,3.348,4.352,7.479
            c0,4.128,3.349,7.478,7.479,7.478c4.13,0,7.479-3.35,7.479-7.478C19.309,3.348,15.96,0,11.83,0" />
          </g>
        </svg>
      </div>
      <span>Buscar</span>
    </div>
    <div class="main-btn">
      <a class="lang-link no-route" href="//edit.com.pt/">
        <div class="icon">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="7.375 6.667 20 20" enable-background="new 7.375 6.667 20 20" xml:space="preserve">
            <g>
              <rect x="9.43" y="8.667" fill="none" width="16" height="16" />
              <path d="M7.43,6.667v20h20v-20H7.43z M25.43,24.667h-16v-16h16V24.667z"></path>
            </g>
            <g>
              <path d="M11.9,12.907h2.449c0.294,0,0.596,0.039,0.905,0.115c0.311,0.077,0.592,0.207,0.845,0.39
              c0.254,0.184,0.461,0.429,0.62,0.735c0.16,0.307,0.24,0.69,0.24,1.15c0,0.433-0.073,0.8-0.22,1.1
              c-0.146,0.3-0.339,0.545-0.575,0.735c-0.236,0.19-0.503,0.328-0.8,0.415c-0.297,0.086-0.595,0.13-0.896,0.13H13.4v2.75h-1.5V12.907
              z M14.24,16.397c0.246,0,0.45-0.034,0.609-0.1c0.16-0.067,0.285-0.153,0.375-0.26c0.091-0.106,0.152-0.225,0.186-0.355
              c0.034-0.13,0.05-0.258,0.05-0.385s-0.023-0.257-0.07-0.39c-0.046-0.133-0.118-0.253-0.215-0.36
              c-0.097-0.107-0.222-0.193-0.375-0.26c-0.153-0.066-0.337-0.1-0.55-0.1H13.4v2.21H14.24z"></path>
              <path d="M19.479,14.247H17.5v-1.34h5.46v1.34H20.98v6.18h-1.5v-6.18H19.479z"></path>
            </g>
          </svg>
        </div>
        <span>Edit.PT</span>
      </a>
    </div>
  </div>
  <div class="menu-contact-wrapper">
    <?php
    $arguments = array(
      'offset'           => '',
      'showposts'        => '0',
      'order'            => 'ASC',
      'orderby'          => 'menu_order',
      'post_type'        => 'localizacoes',
      'suppress_filters'  => '0'
    );
    $locations = get_posts( $arguments );
    $count = 0;
    if($locations):
      foreach($locations as $post):
        setup_postdata($post);
        $gmap = get_field('localizacao');
        ?>
        <div class="menu-contact-block">
          <p class="location-name"><?php the_field('nome'); ?> <?php the_field('titulo'); ?></p>
          <a class="location-link no-route" href="tel:<?php the_field('telefone'); ?>"><?php the_field('telefone'); ?></a>
          <a class="location-link no-route" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
        </div>
        <?php
      endforeach;
      wp_reset_postdata();
    endif;
    ?>
  </div>
  <div class="menu-social-block">
    <?php wp_nav_menu( array( 'theme_location'=>'header_social','walker' => new Header_Social_Walker(), 'items_wrap' => '%3$s') ); ?>
  </div>
</div>
<div id="menu">
  <?php wp_nav_menu( array( 'theme_location'=>'primary','walker' => new Header_Walker()) ); ?>
  <div class="search-container">
    <div class="search-form">
      <div class="input-clear">
        <div class="barTop"></div>
        <div class="barBottom"></div>
      </div>
      <form id="search-form" action="/">
        <input id="search-input" class="typeahead" type="text" name="s" placeholder="Buscar">
        <div class="btn-icon">
          <div class="inner">
            <div class="icon">
              <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                <path d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z" />
              </svg>
            </div>
          </div>
        </div>
        <div class="see-all">Ver todos los resultados</div>
      </form>
    </div>
  </div>
  <div class="newsletter-container">
    <div class="newsletter-form">
      <div class="input-clear">
        <div class="barTop"></div>
        <div class="barBottom"></div>
      </div>
      <form id="newsletter-form">
        <input id="newsletter-input" class="header-input" type="text" name="newsletter-input" placeholder="Email">
        <div class="btn-icon">
          <div class="border"></div>
          <div class="inner">
            <div class="icon">
              <div class="submit-icon"></div>
            </div>
          </div>
        </div>
        <div class="row message">
        </div>
      </form>
    </div>
  </div>
</div>
<?php endif; ?>