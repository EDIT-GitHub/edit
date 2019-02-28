var htmlCache = [];

function request(url) {
  Edit.topOffset = 0;
  if (window.Edit.previous != '') {

    if (htmlCache != null && htmlCache[url]) {

      Edit.pageLoader.attach();

      setTimeout(function() {
        Edit.pageLoader.dumpModules();
        jQuery('.logo').removeClass('loading');
        jQuery("#container").html(htmlCache[url].html);
        var encondingDiv = document.createElement('div');
        encondingDiv.innerHTML = htmlCache[url].pageTitle;
        var decoded = encondingDiv.childNodes[0].nodeValue;
        jQuery('title').text(decoded);

        document.body.scrollTop = document.documentElement.scrollTop = Edit.topOffset;
        if (is.touchDevice()) {
          jQuery('#menu-btn, .iso-block, .default-btn, .form-btn, .location-map-link, .footer-newsletter-form').addClass('no-hover');
        }

        Edit.pageLoader.detach();
        window.Edit.previous = url;
      }, 1500);

    } else {

     if (url.indexOf("s=") >= 0) {
      window.location = window.location.href;
    } else {

      jQuery.ajax({
        url: url,
        headers: { 'custom-ajax-request': 'true' },
        success: function (data, textStatus, XMLHttpRequest) {

          Edit.pageLoader.attach();

          setTimeout(function() {
            Edit.pageLoader.dumpModules();
            jQuery('.logo').removeClass('loading');
            jQuery("#container").html(data.html);
            var encondingDiv = document.createElement('div');
            encondingDiv.innerHTML = data.pageTitle;
            var decoded = encondingDiv.childNodes[0].nodeValue;
            jQuery('title').text(decoded);

            htmlCache[url] = data;

            document.body.scrollTop = document.documentElement.scrollTop = Edit.topOffset;
            if (is.touchDevice()) {
              jQuery('#menu-btn, .iso-block, .default-btn, .form-btn, .location-map-link, .footer-newsletter-form').addClass('no-hover');           
            }
            

            if(is.android()){

               // add no-route to menu items to fix ajax load on mobile filter
               jQuery("#menu-header li a").addClass("no-route");
               jQuery('#inner-navigation .close').addClass("no-route");
               jQuery('.slider.form #register-vaga, .slider.form #register-formacao, .slider.form #register-evento, .slider.form #register-internacional, slider.form #register-vaga ').addClass("scroll-android");
               
                // prevent navigate to url when touch on android
                jQuery('a').not('.header-items-link').on('touchstart touchend', function(e) {  

                  var a = jQuery(this);
                  
                  if(e.type == "touchstart") {
                    a.addClass('no-navigation');
                  } 
                  if(e.type == "touchend") {
                    a.removeClass('no-navigation');
                  } 
                })
              }   


              Edit.pageLoader.detach();
              window.Edit.previous = url;
            }, 1500);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //console.log(textStatus);

          },
          dataType: 'json'
        });
    }
  }
} else {

  if(is.android()){
    // fix not opening multifilter on android
    jQuery("#menu-header li a").addClass("no-route");
    jQuery('#inner-navigation .close').addClass("no-route");
    // fix scroll on forms on android
    jQuery('.slider.form #register-vaga, .slider.form #register-formacao, .slider.form #register-evento, .slider.form #register-internacional, slider.form #register-vaga ').addClass("scroll-android");
    // prevent navigate to url when touch on android
    jQuery('a').not('.header-items-link').on('touchstart touchend', function(e) {  

      var a = jQuery(this);

      if(e.type == "touchstart") {
        a.addClass('no-navigation');
      } 
      if(e.type == "touchend") {
        a.removeClass('no-navigation');
      } 
    })

  }   
  jQuery('.logo').removeClass('loading');
  window.Edit.previous = getCurrentUrl();
}

}

var pageUrl = '';
function getCurrentUrl() {

  var pathArray = window.location.pathname.split('/');
    //console.log(pathArray);
    var newPathname = "";
    for (var i = 0; i < pathArray.length; i++) {
      newPathname += "/";
      newPathname += pathArray[i];
    }
    
    newPathname = newPathname.replace("//", "/");
    //console.log(newPathname);
    return newPathname;
  }