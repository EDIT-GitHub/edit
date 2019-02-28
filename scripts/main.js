/*global Themes, $*/

function throttle(fn, threshhold, scope) {
    threshhold || (threshhold = 250);

    var last,
    deferTimer;
    return function () {
        var context = scope || this;

        var now = +new Date,
        args = arguments;
        if (last && now < last + threshhold) {
            // hold on to it
            clearTimeout(deferTimer);
            deferTimer = setTimeout(function () {
                last = now;
                fn.apply(context, args);
            }, threshhold);
        } else {
            last = now;
            fn.apply(context, args);
        }
    };
}
function ModuleError(message){
    this.message = message;
    this.name = "ModuleError";
    this.toString = function(){
        return this.name + ' -> '+ this.message;
    }
};
var Rect= function(top,left,width,height){
    this.top = top || 0;
    this.left = left || 0;
    this.width  = width || 0;
    this.height = height || 0;
    this.right = this.left + this.width;
    this.bottom = this.top + this.height;
}
Rect.prototype.set = function(top,left,width,height){
    this.top = top || this.top;
    this.left = left || this.left;
    this.width = width || this.width;
    this.height = height || this.height;
    this.right = this.left +this.width;
    this.bottom = this.top + this.height;
}
/*Axis-Aligned Bounding Box Collision
╔════════╗
║        ║
║  HTML  ║
║        ║
╚════════╝
*
*/
var AABB = function(rect){ 
    this.top = rect.top;
    this.left = rect.left;
    this.width = rect.width;
    this.height = rect.height;
    this.right = rect.right;
    this.bottom = rect.bottom;
}

AABB.prototype = {
    set:function(rect){
        this.top = rect.top;
        this.left = rect.left;
        this.width = rect.width;
        this.height = rect.height;
        this.right = rect.right;
        this.bottom = rect.bottom;
    },
    colliding:function(other){
        return !(
            this.top > other.bottom ||
            this.right < other.left ||
            this.bottom < other.top ||
            this.left > other.right

            );
    },
    containing:function(other){
        return (
            this.left <= other.left && 
            other.left < this.width &&
            this.top <= other.top &&
            other.top < this.height
            );
    },
    inside:function(other){
        return (
            ((other.top <= this.top) && (this.top <= other.bottom)) &&
            ((other.top <= this.bottom) && (this.bottom <= other.bottom)) &&
            ((other.left <= this.left) && (this.left <= other.right)) &&
            ((other.left <= this.right) && (this.right <= other.right))
            )
    }
}
window.Edit = {
    inited:false,
    Models: {},
    Collections: {},
    Views: {},
    Routers: {},
    app_router:void 0,
    previous:"",
    filtered:false,
    filterObj:void 0,
    contentPageLoading:false,
    contentPagenumber:1,
    contentTotalpages:0,
    topOffset: 0,
    filter: false,
    goTop:void 0,
    init: function () {
        'use strict';
        jQuery.fn.animateRotate = function(angle, duration, easing, complete) {
          var args = jQuery.speed(duration, easing, complete);
          var step = args.step;
          return this.each(function(i, e) {
            args.complete = jQuery.proxy(args.complete, e);
            args.step = function(now) {
              jQuery.style(e, 'transform', 'rotate(' + now + 'deg)');
              if (step) return step.apply(e, arguments);
          };

          jQuery({deg: 134}).animate({deg: angle}, args);
      });
      };
      jQuery.waitForImages.hasImgProperties = ['backgroundImage','img'];
      jQuery(window).on(Edit.events.MODULE_LOADED,Edit.pageLoader.moduleLoadedHandler);
      jQuery(window).on(Edit.events.TOTAL_LOADED,Edit.pageLoader.allLoaded);
      jQuery(window).on('resize',Edit.resize);
      validator.initModules([validator.modules.UPLOADS, validator.modules.BDATES, validator.modules.INPUTTYPE]);
      Edit.pageLoader.init();
      Edit.header.init();
      Edit.menu.init();
      Edit.footer.init();
      if(is.touchDevice()){
        jQuery('#menu-btn, .iso-block, .default-btn, .form-btn, .location-map-link, .footer-newsletter-form').addClass('no-hover');
    }



    if(is.firefox()){
            //jQuery('.slider,.header').addClass('firefox');
        }
        if(is.ie()){
            jQuery('body').addClass('ie');
        }
        jQuery(window).on('scroll',Edit.onMainScrollHandler);
        
        Edit.onMainScrollHandler();
        Edit.inited = true;
    },
    resize:function(){
        for(var i = 0;i<Edit.modules.collection.length;i++){
            if(Edit.modules.collection[i].type == 'mapModule'){
                Edit.modules.collection[i].instance.recenter();
            }
        }
    },
    onMainScrollHandler:function(){ 
        var scrollTop = (window.pageYOffset || document.documentElement.scrollTop);
        
        if(scrollTop>40){
            jQuery('#menu-holder, #menu-btn, .logo,#inner-navigation, #headerNeswletter, #headerLanguage').addClass('collapsed');
        }else{
            jQuery('#menu-holder, #menu-btn, .logo,#inner-navigation, #headerNeswletter, #headerLanguage').removeClass('collapsed');
        }
    }
};

jQuery(document).ready(function( $ ) {
    'use strict';
    Edit.init();

    var AppRouter = Backbone.Router.extend({
        routes: {
            "posts/:id": "getPost",
            // <a href="http://example.com/#/posts/121">Example</a>

            "download/*path": "downloadFile",
            // <a href="http://example.com/#/download/user/images/hey.gif">Download</a>


            ":route/:action": "loadViewAction",

            ":route/": "loadView",
            "*path": "loadView"
            
            // <a href="http://example.com/#/dashboard/graph">Load Route/Action View</a>
        }
    });



    // Initiate the router
    Edit.app_router = new AppRouter;

    Edit.app_router.on('route:getPost', function (id) {
        //console.log(id); // 121 
    });
    Edit.app_router.on('route:downloadFile', function (path) {
       // console.log(path); // user/images/hey.gif 
   });
    Edit.app_router.on('route:loadViewAction', function (route, action) {
        //console.log(route + "_" + action); // dashboard_graph 
    });

    Edit.app_router.on('route:loadView', function (route, action) {
        $('.logo').addClass('loading');

        if(Edit.menu.currentState = Edit.menu.states.OPENED){
            Edit.menu.close();
        }

        $('#menu .menu-header-container ul li').removeClass('active');
        $('#menu .menu-header-container ul li .bullet').attr('style','');
        $('#menu .menu-header-container ul li').addClass('header-items');
        $('#menu .menu-header-container ul li a').addClass('header-items-link');
        $('#footer .menu-footer-container ul li').removeClass('active');
        $('#footer .menu-footer-container ul li').addClass('footer-items');
        $('#footer .menu-footer-container ul li a').addClass('footer-items-link');
        $('#menu .menu-header-container ul li a[href="/'+route+'/"]').parent().addClass('active');
        $('#footer .menu-footer-container ul li a[href="/'+route+'/"]').parent().addClass('active');
        //console.log("##loadView## " + route); // dashboard_graph

        var urldata = '';
        if (Edit.filter) {

            var itens = $(".filter select");
            for (var i = 0; itens.length > i; i++) {
                var item = itens[i];
                urldata += '&' + item.id + '=' + $(item).val();
            }
            Edit.filter = false;
            //alert(urldata);
        }

        if (route != null) {
            var link = '';
            if (action != null) {
                link = "/" + route + '/' + '?' + action + '&ajax=true' + urldata;
                link = link.replace('//','/');
                request(link);
            } else {
                link = "/" + route + '/' + '?ajax=true' + urldata;
                link = link.replace('//','/');
                request(link);
            }
            
        } else {

            if (action != null && action.indexOf("s=") >= 0) {
                request("/?ajax=true&" + action);
            } else {
                request("/?ajax=true" + urldata);
            }
        }
    });

    
    // Start Backbone history a necessary step for bookmarkable URL's
    Backbone.history.start({ pushState: true });

    // Ajax fixes
    if($("body.single-projectos360").length > 0) {
      $(".previous").addClass("no-route");
      $(".next").addClass("no-route");
  }

  if($("body.single-profissoes").length > 0) {
      $(".previous").addClass("no-route");
      $(".next").addClass("no-route");
  }

  if($("body.single-blog").length > 0) {
    $(".previous").addClass("no-route");
    $(".next").addClass("no-route");
}


if($("body.single-entrevista").length > 0) {
    $(".previous").addClass("no-route");
    $(".next").addClass("no-route");
}


var $navList = $('#menu-profissoes');
$("#menu-profissoes li a").addClass("no-route");

$navList.on('click', 'li:not(.selected)', function(e){
  $navList.find(".selected").removeClass("selected");
  $(e.currentTarget).addClass("selected");
});


//Handle links
$('body').on('click', 'a', function (e) {

    var a = $(this);

    var url = a.attr('href');
    var route = true;
    Edit.filter = false;
        //console.log(url);

        
        if (a.hasClass('no-navigation')) {
            e.preventDefault(); route = false;
        }

        if (a.hasClass('no-route') || a[0].target == '_blank') {
            route = false;
        }

        if (a.hasClass('filter-linker')) {
            Edit.filter = true;
            route = false;
        }

        if (route) {
            e.preventDefault();
            Edit.app_router.navigate(url, { trigger: true });
        }
    });


});
