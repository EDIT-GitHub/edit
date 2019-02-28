Edit.events = {
    MODULE_LOADED: 'module_loaded',
    TOTAL_LOADED: 'total_loaded',
}
Edit.pageLoader = {
    totalModules: void 0,
    totalModulesLoaded: 0,
    init: function() {
        var _this = this;

    },
    moduleLoadedHandler: function (module) {
        Edit.pageLoader.totalModulesLoaded += 1;
       //console.log(Edit.pageLoader.totalModulesLoaded + ' of ' + Edit.pageLoader.totalModules + ' MODULES LOADED ->',module)

       if (Edit.pageLoader.totalModulesLoaded == Edit.pageLoader.totalModules) {
        jQuery('#loaderLayer').trigger(Edit.events.TOTAL_LOADED);
    }
},
allLoaded: function() {
    setTimeout(function() {
        jQuery('#loaderLayer .logo-anim').fadeOut(300);
        jQuery('#loaderLayer').delay(300).queue(function() {
            jQuery('#loaderLayer').addClass('remove');
        })
        Waypoint.refreshAll();
    }, 500)

},
attach: function() {
    jQuery('.pageLoaderLayer').css('display', 'block');
    setTimeout(function() {
        jQuery('.pageLoaderLayer').addClass('active');
    }, 100)
},
detach: function() {
        //console.log('Detach Veil')
        jQuery('.pageLoaderLayer').removeClass('active').addClass('removed')
        setTimeout(function() {
            jQuery('.pageLoaderLayer').css({ 'display': 'none' }).removeClass('removed');
        }, 600)

    },
    dumpModules: function() {
        for (var i = 0; i < Edit.modules.collection.length; i++) {
            if(Edit.modules.collection[i].type != 'goTop'){
                Edit.modules.collection[i].instance.destroy();
                delete Edit.modules.collection[i];
                if (i == Edit.modules.collection.length - 1) {
                    Edit.modules.collection = [];
                    Edit.pageLoader.totalModulesLoaded = 0;
                    Edit.contentPagenumber = 1;
                }
            }
            
        }
    }
}
Edit.menu = {
    menuBtn: void 0,
    searchForm: void 0,
    searchBtn: void 0,
    newsletterBtn: void 0,
    currentState: void 0,
    mainBtn: void 0,
    scroller: void 0,
    states: {
        OPENED: 'opened',
        CLOSED: 'closed'
    },
    menus: {
        SEARCH: 'search',
        NEWSLETTER: 'newsletter',
        DEFAULT: 'default'
    },
    init: function() {
        Edit.menu.currentState = Edit.menu.states.CLOSED;
        Edit.menu.menuBtn = jQuery('#menu-btn');
      /*  Edit.menu.menuLocaltions = jQuery('#menu-contact-wrapper');*/
        Edit.menu.menuBtn.on('click', Edit.menu.onMenuBtnClickHandler);
        Edit.menu.initHover();
        Edit.menu.searchForm = jQuery('#search-form');
        Edit.menu.searchBtn = jQuery('#side-interface .pesquisa-btn');
        Edit.menu.newsletterBtn = jQuery('#side-interface .newsletter-btn');
        Edit.menu.mainBtn = jQuery('#side-interface #main-btn');
        Edit.menu.searchBtn.on('click', function() {
            var _this = jQuery(this);
            if (Edit.search.currentState == Edit.search.states.OPENED) {
                Edit.search.hide();
                _this.delay(200).queue(function() {
                    _this.dequeue();
                    Edit.menu.show();
                })
            } else if (Edit.newsletter.currentState == Edit.newsletter.states.OPENED) {
                Edit.newsletter.hide(true);
                _this.delay(200).queue(function() {
                    _this.dequeue();
                    Edit.search.show(true);
                })
            } else {
                Edit.menu.hide();
                _this.delay(200).queue(function() {
                    _this.dequeue();
                    Edit.search.show();
                })
            }

        })
        Edit.menu.newsletterBtn.on('click', function() {
            var _this = jQuery(this);
            var mobile = !jQuery("#headerNeswletter .nl-text").is(":visible");

            jQuery(window).scrollTop(0);
            jQuery.fancybox.open({
                href: "#newNewsletterForm",
                maxWidth: "100%",
                height: 470,
                autoSize: false,
                scrolling: true,
                helpers: {
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, 0.8)'
                        }
                    }
                },
                afterShow: function() {
                    if (mobile) {
                        var height = jQuery(".fancybox-overlay").height();
                        jQuery("#container").hide();
                    }
                    
                },
                afterClose: function() {
                    if (mobile) {
                        jQuery("#container").show();
                    }
                }
            });

        })
        Edit.menu.mainBtn.on('click', function() {
            var _this = jQuery(this);
            if (Edit.newsletter.currentState == Edit.newsletter.states.OPENED) {
                Edit.newsletter.hide();
                _this.delay(200).queue(function() {
                    _this.dequeue();
                    Edit.menu.show();
                })
            } else if (Edit.search.currentState == Edit.search.states.OPENED) {
                Edit.search.hide();
                _this.delay(200).queue(function() {
                    _this.dequeue();
                    Edit.menu.show();
                })
            }

        })
        jQuery('.menu-header-container').css('z-index', '9');
        Edit.search.init();
        Edit.newsletter.init();
        
        jQuery('#menu').addClass('no-scroll');
        Edit.menu.scroller = new IScroll(jQuery('#menu .menu-header-container')[0], {
            mouseWheel: true,
            click:true
        });
        
        Edit.menu.scroller.refresh();
    },
    initHover: function() {
        var hoverTimer = void 0;
        /*This clears the menu hover styling on mouse out*/
        jQuery('.menu-header-container').on('mouseleave', function() {
            var elements = jQuery('.header-items-link');
            TweenMax.killTweensOf(jQuery(elements));
            TweenMax.to(elements, 0.3, { opacity: 1, x: 0, overwrite: 'all' });
        })
        jQuery('.menu-header-container ul li a').hover(function() {
            if (hoverTimer != undefined) {
                window.clearTimeout(hoverTimer)
            }
            if(jQuery(this).parent().hasClass('active')){
                return;
            }
            var bullet = jQuery(this).find('.bullet')
            var elements = jQuery('.header-items-link').not(jQuery(this));
            var trailT = new TimelineMax({ delay: 0, repeat: 0 });
            trailT.to(bullet, 0.2, { opacity: 1, overwrite: 'all' });
            trailT.to(bullet, 0.25, { left: '40%', width: '70%', delay: 0.1 });
            trailT.to(bullet, 0.1, { width: '6px', left: '100%', delay: 0.01 });
            TweenMax.to(elements, 0.3, { opacity: 0.1 });
            TweenMax.to(jQuery(this), 0.3, { opacity: 1, x: 20 });

        },
        function() {
            if(jQuery(this).parent().hasClass('active')){
                return;
            }
            var bullet = jQuery(this).find('.bullet');
            var notActiveBullet = jQuery(this).find('.bullet').not('active');
            var trailT = new TimelineMax({ delay: 0, repeat: 0 });
            trailT.to(bullet, 0.25, { left: '20%', width: '70%', overwrite: 'all' });
            trailT.to(bullet, 0.1, { width: '6px', left: 0, delay: 0.05, });
            trailT.to(notActiveBullet, 0.2, { opacity: 0 });
            TweenMax.to(jQuery(this), 0.3, { x: 0, opacity: 0.1, overwrite: 'all' });
            hoverTimer = window.setTimeout(function() {
                var elements = jQuery('.header-items-link');
                TweenMax.killTweensOf(jQuery('.header-items-link'));
                TweenMax.to(elements, 0.3, { opacity: 1, x: 0, overwrite: 'all' });
            }, 150);
        })
    },
    onMenuBtnClickHandler: function (event) {
        if (Edit.menu.currentState == Edit.menu.states.CLOSED) {
            Edit.menu.currentState = Edit.menu.states.OPENED;
            Edit.menu.animateIn(Edit.menu.animateInComplete);

            Edit.header.logo.addClass('expanded-1');
            jQuery('#menu').addClass('open');
            jQuery('body').addClass('no-scroll');
            jQuery('.logo').addClass('no-collapse');
            jQuery('#menu-btn').addClass('no-collapse');
            Edit.menu.menuBtn.addClass('active');
            jQuery('.logo svg *').css('fill', '#000');
        } else {
            jQuery('#menu').delay(800).queue(function() {
                Edit.search.hide(true);
                Edit.newsletter.hide(true);
                jQuery('#menu').dequeue();
                Edit.menu.scroller.scrollToElement(jQuery('#menu-header li')[0],null,null,-30);
            });
            Edit.menu.animateOut();
            Edit.header.logo.removeClass('expanded-1');
            jQuery('#menu').removeClass('open');
            jQuery('body').removeClass('no-scroll');
            jQuery('.logo').removeClass('no-collapse');
            jQuery('#menu-btn').removeClass('no-collapse');
            Edit.menu.menuBtn.removeClass('active');

        }
    },
    close: function() {
        jQuery('#menu').delay(800).queue(function() {
            Edit.search.hide(true);
            Edit.newsletter.hide(true);
            jQuery('#menu').dequeue();
        })
        Edit.menu.animateOut();
        Edit.header.logo.removeClass('expanded-1');
        jQuery('#menu').removeClass('open');
        jQuery('body').removeClass('no-scroll');
        jQuery('.logo').removeClass('no-collapse');
        jQuery('#menu-btn').removeClass('no-collapse');
        Edit.menu.menuBtn.removeClass('active');

    },
    animateIn: function (callback) {
        TweenMax.to(jQuery('#side-interface'), 0.2, { x: '0%', ease: Power1.easeOut, overwrite: 'all' });
        TweenMax.to(jQuery('#menu'), 0.5, {
            x: '0%', delay: 0.15, ease: Power1.easeOut, onComplete: function() {
                callback();
            }
        });
    },
    animateInComplete: function() {
        Edit.menu.scroller.refresh();
        if (!Edit.HeaderAnim.isInited && !is.touchDevice()) {
            //Edit.HeaderAnim.init();
            //Edit.HeaderAnim.animate();
        }
        /*ONLY CALL THIS WHEN MENU OPEN IS OVER*/

        //Edit.HeaderAnim.canAnimate = true;
    },
    animateOut: function (callback) {
        Edit.HeaderAnim.canAnimate = false;
        Edit.menu.currentState = Edit.menu.states.CLOSED;
        jQuery('.menu-header-container').css('z-index', '9').removeClass('hide');
        TweenMax.to(jQuery('#side-interface'), 0.2, { x: '-100%', delay: 0.4, ease: Power1.easeOut });
        TweenMax.to(jQuery('#menu'), 0.6, { x: '-100%', ease: Power1.easeOut });
        setTimeout(function() {
            jQuery('.logo svg *').css('fill', '#FFF');
        }, 400);

    },
    hide: function() {
        jQuery('.menu-header-container').css('z-index', '7').addClass('hide');
        Edit.menu.mainBtn.removeClass('active');
    },
    show: function() {
        jQuery('.search-container').removeClass('hide');
        jQuery('.newsletter-container').removeClass('hide');
        jQuery('.menu-header-container').css('z-index', '9').removeClass('hide');
        Edit.menu.mainBtn.addClass('active');
    }
}
Edit.search = {
    states: {
        OPENED: 'opened',
        CLOSED: 'closed',
    },
    currentState: '',
    init: function() {
        var engine = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            limit: 4,
            prefetch: {
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                url: '/results/autocomplete/',
                cache:true,
                // the json file contains an array of strings, but the Bloodhound
                // suggestion engine expects JavaScript objects so this converts all of
                // those strings
                filter: function (list) {
                    return jQuery.map(list, function (data) {
                        return {
                            name: data.titulo,
                            link: data.link
                        };
                    });
                }
            }
        });
        engine.initialize();
        jQuery('.typeahead').on('focus',function(){
            var element = jQuery(this);
            element.parent().parent().find('.btn-icon').addClass('focused');

            
        });
        jQuery('.typeahead').on('blur',function(){
            var element = jQuery(this);
            if(element.val() != ''){
                element.parent().parent().find('.btn-icon').removeClass('focused');
            }else{
                element.parent().parent().find('.see-all').removeClass('active');
            }
        });
        jQuery('.typeahead').on('keypress',function(e){
            var element = jQuery(this);
            element.parent().parent().find('.see-all').addClass('active');
            var key = e.keyCode;
            if(key == 13){
                jQuery('#search-form').submit();
            }
        });
        jQuery('#search-form .btn-icon, #search-form .see-all').on('click',function(){
            jQuery('#search-form').submit();
        })
        jQuery('.typeahead').typeahead(
        {
            name: 'countries',
            displayKey: 'name',
            highlight: true,
            classNames: {
                input: "search-typeahead",
                hint: "search-hint",
                menu: "search-suggestions",
                suggestion: "search-suggestion",
                highlight: "search-highlight"
            },
            // `ttAdapter` wraps the suggestion engine in an adapter that
            // is compatible with the typeahead jQuery plugin
        },
        {
            source: engine,
            display: function (obj) {
                var parseDiv = document.createElement('div');
                parseDiv.innerHTML = obj.name;
                var parsedData = parseDiv.childNodes[0].nodeValue;
                return parsedData;
            }
        });
        jQuery('.typeahead').on('typeahead:active', function() {
            var _this = jQuery(this);
            jQuery(this).parent().parent().parent().find('.input-clear').addClass('active');
            jQuery(this).parent().parent().parent().find('.input-clear').on('click', function() {

                _this.typeahead('val', '');
                jQuery(this).removeClass('active');
            })
        });
        jQuery('.typeahead').on('typeahead:idle', function() {

            if (jQuery(this).typeahead('val') != '') {
                return;
            }
            jQuery(this).parent().parent().parent().find('.input-clear').off('click')
            jQuery(this).parent().parent().parent().find('.input-clear').removeClass('active');
        });
        jQuery('.typeahead').on('typeahead:select',function(ev,suggestion){
            ev.preventDefault();
            Edit.app_router.navigate(suggestion.link, {trigger:true});
            jQuery('.typeahead').typeahead('val','');
            
        })
    },
    show: function (deeper) {
        Edit.menu.currentMenu = Edit.menu.menus.SEARCH;
        Edit.search.currentState = Edit.search.states.OPENED;
        Edit.menu.searchBtn.addClass('active');
        jQuery('#menu').removeClass('no-scroll');
        if (deeper) {
            jQuery('.search-container').css('z-index', '9').removeClass('hide').addClass('active');
        } else {
            jQuery('.search-container').css('z-index', '9').addClass('active');
        }
    },
    hide: function (deeper) {

      Edit.search.currentState = Edit.search.states.CLOSED;
      Edit.menu.searchBtn.removeClass('active');
      jQuery('#menu').addClass('no-scroll');
      if (deeper) {
        jQuery('.search-container').css('z-index', '7').removeClass('active').addClass('hide');
        jQuery('.search-container').delay(200).queue(function() {
            jQuery('.search-container').dequeue();
            jQuery('.search-container').removeClass('active hide');
        })
    } else {
        jQuery('.search-container').css('z-index', '7').removeClass('active');
        Edit.menu.currentMenu = Edit.menu.menus.DEFAULT;
    }

}
}
Edit.newsletter = {
    states: {
        OPENED: 'opened',
        CLOSED: 'closed'
    },
    currentState: '',
    newsletterForm: '',
    newsletterFormFooter: '',
    sending:false,
    init: function() {
        Edit.newsletter.newsletterForm = jQuery('#newsletter-form');
        Edit.newsletter.newsletterFormFooter = jQuery('#footer-newsletter');

        Edit.newsletter.newsletterForm.find('input').on('focus', function() {
            var element = jQuery(this);
            element.parent().parent().find('.input-clear').addClass('active');
            element.parent().parent().find('.btn-icon').addClass('focused');
            element.parent().parent().find('.input-clear').on('click', function() {
                Edit.newsletter.newsletterForm.find('input').val('');
                element.parent().parent().find('.input-clear').removeClass('active');
            })
        });

        Edit.newsletter.newsletterForm.find('input').on('blur', function() {
            var element = jQuery(this);
            if (element.val() === '') {
                element.parent().parent().find('.btn-icon').removeClass('focused');
                element.parent().parent().find('.input-clear').removeClass('active');
                element.parent().parent().find('.input-clear').off('click');
            }
        });

        Edit.newsletter.newsletterFormFooter.find('input').on('focus', function() {
            var element = jQuery(this);
            element.parent().parent().find('.btn-icon').addClass('focused');
            element.parent().parent().find('.input-clear').on('click', function() {
                Edit.newsletter.newsletterForm.find('input').val('');
            })
        });

        Edit.newsletter.newsletterFormFooter.find('input').on('blur', function() {
            var element = jQuery(this);
            if (element.val() === '') {
                element.parent().parent().find('.btn-icon').removeClass('focused');
                element.parent().parent().find('.input-clear').removeClass('active');
                element.parent().parent().find('.input-clear').off('click');
            }
        });

        Edit.newsletter.newsletterForm.find('.btn-icon').on('click', function() {
            var email = jQuery("#newsletter-input").val();
            Edit.newsletter.send(email);
        });

        Edit.newsletter.newsletterForm.on('submit', function (e) {
            e.preventDefault();
            var email = jQuery("#newsletter-input").val();
            Edit.newsletter.send(email);
        });

        //Edit.newsletter.newsletterFormFooter.find('#footerNewsletterButton').on('click', function() {
        //    //var email = Edit.newsletter.newsletterFormFooter.find('input').val();
        //    //Edit.newsletter.send(email);
        //    alert("Popup");


        //});
        jQuery('#headerNeswletter').on('click', function() {
            var email = Edit.newsletter.newsletterFormFooter.find('input').val();
            //Edit.newsletter.send(email);

            var mobile = !jQuery("#headerNeswletter .nl-text").is(":visible");

            jQuery(window).scrollTop(0);
            jQuery.fancybox.open({
                href: "#newNewsletterForm",
                maxWidth: "100%",
                height: 470,
                autoSize: false,
                scrolling: true,
                helpers: {
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, 0.8)'
                        }
                    }
                },
                afterShow: function() {
                    if (mobile) {


                        var height = jQuery(".fancybox-overlay").height();

                        jQuery("#container").hide();

                    }

                },
                afterClose: function() {

                    if (mobile) {

                        jQuery("#container").show();
                    }
                }
            });

        });


        Edit.newsletter.newsletterFormFooter.find('#footerNewsletterButton').on('click', function() {
            var email = Edit.newsletter.newsletterFormFooter.find('input').val();
            //Edit.newsletter.send(email);
            jQuery(window).scrollTop(0);
            jQuery.fancybox.open({
                href: "#newNewsletterForm",
                maxWidth: "100%",
                height: 470,
                autoSize: false,
                scrolling: false,
                helpers: {
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, 0.8)'
                        }
                    }
                }
            });

        });

        Edit.newsletter.newsletterFormFooter.find('.btn-icon').on('click', function() {
            var email = Edit.newsletter.newsletterFormFooter.find('input').val();
            //Edit.newsletter.send(email);
            var mobile = !jQuery("#headerNeswletter .nl-text").is(":visible");

            jQuery(window).scrollTop(0);
            jQuery.fancybox.open({
                href: "#newNewsletterForm",
                maxWidth: "100%",
                height: 470,
                autoSize: false,
                scrolling: true,
                helpers: {
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, 0.8)'
                        }
                    }
                },
                afterShow: function() {
                    if (mobile) {


                        var height = jQuery(".fancybox-overlay").height();
                        jQuery("#container").hide();

                    }

                },
                afterClose: function() {

                    if (mobile) {


                        jQuery("#container").show();
                    }
                }
            });
            
        });

        Edit.newsletter.newsletterFormFooter.on('submit', function (e) {
            e.preventDefault();
            var mobile = !jQuery("#headerNeswletter .nl-text").is(":visible");

            jQuery(window).scrollTop(0);
            jQuery.fancybox.open({
                href: "#newNewsletterForm",
                maxWidth: "100%",
                height: 470,
                autoSize: false,
                scrolling: true,
                helpers: {
                    overlay: {
                        css: {
                            'background': 'rgba(0, 0, 0, 0.8)'
                        }
                    }
                },
                afterShow: function() {
                    if (mobile) {
                        var height = jQuery(".fancybox-overlay").height();
                        jQuery("#container").hide();
                    }
                },
                afterClose: function() {
                    if (mobile) {
                        jQuery("#container").show();
                    }
                }
            });
            var email = Edit.newsletter.newsletterFormFooter.find('input').val();
            //Edit.newsletter.send(email);
        });
    },
    show: function (deeper) {
        Edit.menu.currentMenu = Edit.menu.menus.SEARCH;
        Edit.newsletter.currentState = Edit.newsletter.states.OPENED;
        Edit.menu.newsletterBtn.addClass('active');
        if (deeper) {
            jQuery('.newsletter-container').css('z-index', '9').removeClass('hide').addClass('active');
        } else {
            jQuery('.newsletter-container').css('z-index', '9').addClass('active');
        }
    },
    hide: function (deeper) {
        Edit.newsletter.currentState = Edit.newsletter.states.CLOSED;
        Edit.menu.newsletterBtn.removeClass('active');
        if (deeper) {
            jQuery('.newsletter-container').css('z-index', '7').removeClass('active').addClass('hide');
            jQuery('.newsletter-container').delay(200).queue(function() {
                jQuery('.newsletter-container').dequeue();
                jQuery('.newsletter-container').removeClass('active hide');
            })
        } else {
            jQuery('.newsletter-container').css('z-index', '7').removeClass('active');
            Edit.menu.currentMenu = Edit.menu.menus.DEFAULT;
        }

    },
    send: function (email) {
        //TODO Mensagens de erro e sucesso
        if(Edit.newsletter.sending){
            return;
        }
        //validate
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if (re.test(email)) {
            Edit.newsletter.newsletterForm.find('.btn-icon').addClass('loading');
            Edit.newsletter.newsletterFormFooter.find('.btn-icon').addClass('loading');

            var newsletterData = {
                email: email,
                action: 'newsletter_form',
                nonce: newsletterN
            }
            Edit.newsletter.sending = true;
            jQuery.ajax({
                url: '/wp-admin/admin-ajax.php',
                method: 'post',
                data: newsletterData,
                dataType: 'json',
                success: function (data) {
                    Edit.newsletter.sending=false;
                    if(data.Status){
                        jQuery("#newsletter-input").val('');
                        Edit.newsletter.newsletterFormFooter.find('.btn-icon').removeClass('loading');
                        Edit.newsletter.newsletterForm.find('.btn-icon').removeClass('loading');
                        Edit.newsletter.newsletterFormFooter.find('.btn-icon .submit-icon').addClass('sent');
                        Edit.newsletter.newsletterForm.find('.btn-icon .submit-icon').addClass('sent');
                        var email = Edit.newsletter.newsletterFormFooter.find('input').val('');
                        setTimeout(function() {
                            Edit.newsletter.newsletterFormFooter.find('.btn-icon .submit-icon').removeClass('sent');
                            Edit.newsletter.newsletterForm.find('.btn-icon .submit-icon').removeClass('sent');
                        }, 1500);
                    }else{
                        Edit.newsletter.newsletterFormFooter.find('.btn-icon').removeClass('loading');
                        Edit.newsletter.newsletterForm.find('.btn-icon').removeClass('loading');
                        Edit.newsletter.newsletterFormFooter.find('.btn-icon').addClass('fail');
                        Edit.newsletter.newsletterForm.find('.btn-icon').addClass('fail');
                        Edit.newsletter.newsletterFormFooter.find('.message').html('<span>'+data.Message+'</span>');
                        Edit.newsletter.newsletterForm.find('.message').html('<span>'+data.Message+'</span>');
                        setTimeout(function() {
                            Edit.newsletter.newsletterFormFooter.find('.btn-icon').removeClass('fail');
                            Edit.newsletter.newsletterForm.find('.btn-icon').removeClass('fail');
                            Edit.newsletter.newsletterFormFooter.find('.message span').remove();
                            Edit.newsletter.newsletterForm.find('.message span').remove();
                        }, 2000);
                    }
                    
                },
                error: function() {
                    Edit.newsletter.sending=false;
                    Edit.newsletter.newsletterFormFooter.find('.btn-icon').removeClass('loading');
                    Edit.newsletter.newsletterForm.find('.btn-icon').removeClass('loading');
                    Edit.newsletter.newsletterFormFooter.find('.btn-icon').addClass('fail');
                    Edit.newsletter.newsletterForm.find('.btn-icon').addClass('fail');
                    setTimeout(function() {
                        Edit.newsletter.newsletterFormFooter.find('.btn-icon').removeClass('fail');
                        Edit.newsletter.newsletterForm.find('.btn-icon').removeClass('fail');
                    }, 1500);
                }
            });
        } else {
            Edit.newsletter.newsletterFormFooter.find('.btn-icon').addClass('fail');
            Edit.newsletter.newsletterForm.find('.btn-icon').addClass('fail');
            setTimeout(function() {
                Edit.newsletter.newsletterFormFooter.find('.btn-icon').removeClass('fail');
                Edit.newsletter.newsletterForm.find('.btn-icon').removeClass('fail');
            }, 1500);
        }

    },
    sendModal: function (email, nome, apelido, localizacao, interesse) {
        //TODO Mensagens de erro e sucesso
        if (Edit.newsletter.sending) {
            return;
        }
        //validate
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if (re.test(email)) {
            jQuery("#newNewsletterForm").find('.btn-icon').addClass('loading');
            jQuery("#newNewsletterForm").find('.btn-icon').addClass('loading');

            var newsletterData = {
                email: email,
                nome: nome,
                apelido: apelido,
                localizacao: localizacao,
                interesse: interesse,
                action: 'newsletter_form',
                nonce: newsletterN
            }
            Edit.newsletter.sending = true;
            jQuery.ajax({
                url: '/wp-admin/admin-ajax.php',
                method: 'post',
                data: newsletterData,
                dataType: 'json',
                success: function (data) {
                    Edit.newsletter.sending = false;
                    
                    if (data.Status) {
                        jQuery("#newsletter-input").val('');
                        jQuery("#newNewsletterForm").find('.btn-icon').removeClass('loading');
                        jQuery("#newNewsletterForm").find('.btn-icon').removeClass('loading');
                        jQuery("#newNewsletterForm").find('.btn-icon .submit-icon').addClass('sent');
                        jQuery("#newNewsletterForm").find('.btn-icon .submit-icon').addClass('sent');
                        
                        jQuery("#nl_nome").val("");
                        jQuery("#nl_apelido").val("");
                        jQuery("#nl_email").val("");
                        jQuery("#nl_localizacao").val("");
                        jQuery("#nl_interesse").val("");

                        setTimeout(function() {
                            jQuery("#newNewsletterForm").find('.btn-icon .submit-icon').removeClass('sent');
                            jQuery("#newNewsletterForm").find('.btn-icon .submit-icon').removeClass('sent');
                        }, 1500);

                        jQuery("#register-newsletter").hide();
                        jQuery(".nl-message-container").show();

                    } else {
                        jQuery("#newNewsletterForm").find('.btn-icon').removeClass('loading');
                        jQuery("#newNewsletterForm").find('.btn-icon').removeClass('loading');
                        jQuery("#newNewsletterForm").find('.btn-icon').addClass('fail');
                        jQuery("#newNewsletterForm").find('.btn-icon').addClass('fail');
                        jQuery("#newNewsletterForm").find('.message').html('<span>' + data.Message + '</span>');
                        jQuery("#newNewsletterForm").find('.message').html('<span>' + data.Message + '</span>');
                        jQuery("#messageEmailReg").show();
                        setTimeout(function() {
                            jQuery("#newNewsletterForm").find('.btn-icon').removeClass('fail');
                            jQuery("#newNewsletterForm").find('.btn-icon').removeClass('fail');
                            jQuery("#newNewsletterForm").find('.message span').remove();
                            jQuery("#newNewsletterForm").find('.message span').remove();
                            jQuery("#messageEmailReg").hide();
                        }, 2000);
                    }

                },
                error: function() {
                    Edit.newsletter.sending = false;
                    jQuery("#newNewsletterForm").find('.btn-icon').removeClass('loading');
                    jQuery("#newNewsletterForm").find('.btn-icon').removeClass('loading');
                    jQuery("#newNewsletterForm").find('.btn-icon').addClass('fail');
                    jQuery("#newNewsletterForm").find('.btn-icon').addClass('fail');
                    setTimeout(function() {
                        jQuery("#newNewsletterForm").find('.btn-icon').removeClass('fail');
                        jQuery("#newNewsletterForm").find('.btn-icon').removeClass('fail');
                    }, 1500);
                }
            });
        } else {
            jQuery("#newNewsletterForm").find('.btn-icon').addClass('fail');
            jQuery("#newNewsletterForm").find('.btn-icon').addClass('fail');
            setTimeout(function() {
                jQuery("#newNewsletterForm").find('.btn-icon').removeClass('fail');
                jQuery("#newNewsletterForm").find('.btn-icon').removeClass('fail');
            }, 1500);
        }
    }
}
Edit.header = {
    logo: '',
    init: function() {
        Edit.header.logo = jQuery('.logo');
    }
}
Edit.HeaderAnim = {
    container: '',
    parent: '',
    camera: '',
    scene: '',
    particles: '',
    vertices: '',
    renderer: '',
    composer: '',
    mouseX: 0,
    mouseY: 0,
    windowHalfX: 0,
    windowHalfY: 0,
    count: 0,
    AMOUNTX: 20,
    AMOUNTY: 20,
    SEPARATION: 100,
    MAXZOOM: 1000,
    ZOOM: 0,
    canAnimate: false,
    isInited: false,
    init: function() {
        if (is.touchDevice()) return;
        if (Edit.HeaderAnim.isInited) return;
        if (!Detector.webgl) {
            return;
        }
        if(is.safari()){
            return;
        }
        Edit.HeaderAnim.isInited = true;
        Edit.HeaderAnim.container = document.getElementById('menu-canvas');
        Edit.HeaderAnim.parent = new THREE.Object3D();
        Edit.HeaderAnim.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 3500);
        Edit.HeaderAnim.camera.position.z = 0;

        Edit.HeaderAnim.scene = new THREE.Scene();

        Edit.HeaderAnim.particles = new Array();
        Edit.HeaderAnim.vertices = new Array();

        var PI2 = Math.PI * 2;
        var geometry = new THREE.Geometry();
        var i = 0;

        for (var ix = 0; ix < Edit.HeaderAnim.AMOUNTX; ix++) {

            for (var iy = 0; iy < Edit.HeaderAnim.AMOUNTY; iy++) {


                var vertex = new THREE.Vector3();
                vertex.x = ix * Edit.HeaderAnim.SEPARATION - ((Edit.HeaderAnim.AMOUNTX * Edit.HeaderAnim.SEPARATION) / 2);
                vertex.z = iy * Edit.HeaderAnim.SEPARATION - ((Edit.HeaderAnim.AMOUNTY * Edit.HeaderAnim.SEPARATION) / 2);
                geometry.vertices.push(vertex);
                Edit.HeaderAnim.vertices.push(vertex)

            }

        }
        var parameters = [[1, 1, 1], 5];

        var color = parameters[0];
        var size = parameters[1];

        var material = new THREE.PointCloudMaterial({ size: size, color: '#999' });

        Edit.HeaderAnim.particles = new THREE.PointCloud(geometry, material);

        Edit.HeaderAnim.particles.rotation.x = 45;
        Edit.HeaderAnim.particles.rotation.y = -35;
        Edit.HeaderAnim.parent.add(Edit.HeaderAnim.particles)
        Edit.HeaderAnim.scene.add(Edit.HeaderAnim.parent);

        Edit.HeaderAnim.renderer = new THREE.WebGLRenderer();
        Edit.HeaderAnim.renderer.setPixelRatio(window.devicePixelRatio);
        Edit.HeaderAnim.renderer.setSize(window.innerWidth * 1.5, window.innerHeight);
        Edit.HeaderAnim.container.appendChild(Edit.HeaderAnim.renderer.domElement)
        var renderModel = new THREE.RenderPass(Edit.HeaderAnim.scene, Edit.HeaderAnim.camera);

        effectFocus = new THREE.ShaderPass(THREE.FocusShader);

        effectFocus.uniforms["screenWidth"].value = window.innerWidth;
        effectFocus.uniforms["screenHeight"].value = window.innerHeight;
        effectFocus.uniforms["sampleDistance"].value = 1.2;
        effectFocus.uniforms["waveFactor"].value = 0.00325;
        effectFocus.renderToScreen = true;
        Edit.HeaderAnim.composer = new THREE.EffectComposer(Edit.HeaderAnim.renderer);
        Edit.HeaderAnim.composer.addPass(renderModel);
        Edit.HeaderAnim.composer.addPass(effectFocus);
        document.addEventListener('mousemove', Edit.HeaderAnim.onDocumentMouseMove, false);

    },
    onWindowResize: function() {

        Edit.HeaderAnim.windowHalfX = window.innerWidth / 2;
        Edit.HeaderAnim.windowHalfY = window.innerHeight / 2;

        Edit.HeaderAnim.camera.aspect = window.innerWidth / window.innerHeight;
        Edit.HeaderAnim.camera.updateProjectionMatrix();

        Edit.HeaderAnim.renderer.setSize(window.innerWidth, window.innerHeight);
        

    },

    //
    onDocumentMouseMove: function (event) {
        Edit.HeaderAnim.mouseX = event.clientX - Edit.HeaderAnim.windowHalfX;
        Edit.HeaderAnim.mouseY = event.clientY - Edit.HeaderAnim.windowHalfY;
    },

    onDocumentTouchStart: function (event) {
        if (event.touches.length === 1) {

            event.preventDefault();

            Edit.HeaderAnim.mouseX = event.touches[0].pageX - Edit.HeaderAnim.windowHalfX;
            Edit.HeaderAnim.mouseY = event.touches[0].pageY - Edit.HeaderAnim.windowHalfY;
        }
    },

    onDocumentTouchMove: function (event) {
        if (event.touches.length === 1) {

            event.preventDefault();

            Edit.HeaderAnim.mouseX = event.touches[0].pageX - Edit.HeaderAnim.windowHalfX;
            Edit.HeaderAnim.mouseY = event.touches[0].pageY - Edit.HeaderAnim.windowHalfY;
        }
    },

    animate: function() {
        if (!is.touchDevice()) {
            //requestAnimationFrame(Edit.HeaderAnim.animate);
            //if (Edit.HeaderAnim.canAnimate) Edit.HeaderAnim.render();
        }

    },

    render: function() {
        Edit.HeaderAnim.camera.position.x += (Edit.HeaderAnim.mouseX - Edit.HeaderAnim.camera.position.x) * .05;
        Edit.HeaderAnim.camera.position.y += (-Edit.HeaderAnim.mouseY - Edit.HeaderAnim.camera.position.y) * .05;
        Edit.HeaderAnim.camera.lookAt(Edit.HeaderAnim.scene.position);

        var i = 0;

        for (var ix = 0; ix < Edit.HeaderAnim.AMOUNTX; ix++) {

            for (var iy = 0; iy < Edit.HeaderAnim.AMOUNTY; iy++) {

                vertex = Edit.HeaderAnim.particles.geometry.vertices[i++];
                vertex.y = (Math.sin((ix + Edit.HeaderAnim.count) * 0.3) * 50) +
                (Math.sin((iy + Edit.HeaderAnim.count) * 0.5) * 50);


            }

        }
        if (Edit.HeaderAnim.ZOOM < Edit.HeaderAnim.MAXZOOM) Edit.HeaderAnim.camera.position.z = Edit.HeaderAnim.ZOOM;
        //console.log(Edit.HeaderAnim.ZOOM);
        Edit.HeaderAnim.particles.geometry.verticesNeedUpdate = true;
        Edit.HeaderAnim.renderer.clear();
        Edit.HeaderAnim.composer.render(0.01);

        Edit.HeaderAnim.count += 0.1;
        Edit.HeaderAnim.ZOOM += 5;
    }
}

Edit.footer = {
    init: function() {
        //Edit.footerAnim.init();
        //Edit.footerAnim.initAnimation();
        //Edit.footerAnim.addListeners();
    }

}
Edit.footerAnim = {
    width: 0,
    height: 0,
    largeHeader: 0,
    canvas: void 0,
    ctx: void 0,
    points: 0,
    target: '',
    animateHeader: true,
    init: function() {

        Edit.footerAnim.width = jQuery('body').innerWidth();
        Edit.footerAnim.height = jQuery('#footer').outerHeight(true);
        Edit.footerAnim.target = { x: Edit.footerAnim.width / 2, y: Edit.footerAnim.height / 2 };

        Edit.footerAnim.largeHeader = document.getElementById('footer');

        Edit.footerAnim.canvas = document.getElementById('footer-anim');
        Edit.footerAnim.canvas.width = Edit.footerAnim.width;
        Edit.footerAnim.canvas.height = Edit.footerAnim.height;
        Edit.footerAnim.ctx = Edit.footerAnim.canvas.getContext('2d');

        Edit.footerAnim.points = [];
        for (var x = 0; x < Edit.footerAnim.width; x = x + Edit.footerAnim.width / 10) {
            for (var y = 0; y < Edit.footerAnim.height; y = y + Edit.footerAnim.height / 10) {
                var px = x + Math.random() * Edit.footerAnim.width / 10;
                var py = y + Math.random() * Edit.footerAnim.height / 10;
                var p = { x: px, originX: px, y: py, originY: py };
                Edit.footerAnim.points.push(p);
            }
        }
        for (var i = 0; i < Edit.footerAnim.points.length; i++) {
            var closest = [];
            var p1 = Edit.footerAnim.points[i];
            for (var j = 0; j < Edit.footerAnim.points.length; j++) {
                var p2 = Edit.footerAnim.points[j]
                if (!(p1 == p2)) {
                    var placed = false;
                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (closest[k] == undefined) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }

                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (Edit.footerAnim.getDistance(p1, p2) < Edit.footerAnim.getDistance(p1, closest[k])) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                }
            }
            p1.closest = closest;
        }

        // assign a circle to each point
        for (var i in Edit.footerAnim.points) {
            var c = new Edit.footerAnim.Circle(Edit.footerAnim.points[i], 2 + Math.random() * 1, 'rgba(255,255,255,1)');
            Edit.footerAnim.points[i].circle = c;
        }
        jQuery(window).on('resize', throttle(function() {
            Edit.footerAnim.resize();
        }, 100))
    },
    addListeners: function() {
        if (!is.touchDevice()) {
            jQuery('#footer')[0].addEventListener('mousemove', Edit.footerAnim.mouseMoveHandler);
        }


        window.addEventListener('scroll', Edit.footerAnim.scrollCheck);
        window.addEventListener('resize', Edit.footerAnim.resize);
    },
    mouseMoveHandler: function (e) {
        var posx = posy = 0;
        var parentOffset = jQuery(this).offset();
        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        }
        else if (e.clientX || e.clientY) {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }

        posx = posx - parentOffset.left;
        posy = posy - parentOffset.top;
        Edit.footerAnim.target.x = posx;
        Edit.footerAnim.target.y = posy;
    },
    scrollCheck: function() {
        if (document.body.scrollTop > Edit.footerAnim.height) Edit.footerAnim.animateHeader = true;
        else Edit.footerAnim.animateHeader = true;
    },
    resize: function() {
        var xDiff = Edit.footerAnim.width - jQuery('body').innerWidth();
        var yDiff = Edit.footerAnim.height - jQuery('#footer').outerHeight(true);

        Edit.footerAnim.width = jQuery('body').innerWidth();
        Edit.footerAnim.height = jQuery('#footer').outerHeight(true);
        Edit.footerAnim.canvas.width = Edit.footerAnim.width;
        Edit.footerAnim.canvas.height = Edit.footerAnim.height;
        var count = 1;
        for (var x = 0; x < Edit.footerAnim.width; x = x + Edit.footerAnim.width / 10) {
            for (var y = 0; y < Edit.footerAnim.height; y = y + Edit.footerAnim.height / 10) {
                var px = x + Math.random() * Edit.footerAnim.width / 10;
                var py = y + Math.random() * Edit.footerAnim.height / 10;

                Edit.footerAnim.points[count - 1].originX = px;
                Edit.footerAnim.points[count - 1].originY = py;
                if (count < Edit.footerAnim.points.length) {
                    count++;
                }
            }
        }

    },
    initAnimation: function() {
        Edit.footerAnim.animate();
        for (var i in Edit.footerAnim.points) {
            Edit.footerAnim.shiftPoint(Edit.footerAnim.points[i]);
        }
    },
    animate: function() {
        if (Edit.footerAnim.animateHeader) {
            Edit.footerAnim.ctx.clearRect(0, 0, Edit.footerAnim.width, Edit.footerAnim.height);
            for (var i in Edit.footerAnim.points) {
                // detect points in range
                if (Math.abs(Edit.footerAnim.getDistance(Edit.footerAnim.target, Edit.footerAnim.points[i])) < 4000) {
                    Edit.footerAnim.points[i].active = 0.1;
                    Edit.footerAnim.points[i].circle.active = 0.2;
                } else if (Math.abs(Edit.footerAnim.getDistance(Edit.footerAnim.target, Edit.footerAnim.points[i])) < 20000) {
                    Edit.footerAnim.points[i].active = 0.08;
                    Edit.footerAnim.points[i].circle.active = 0.09;
                } else if (Math.abs(Edit.footerAnim.getDistance(Edit.footerAnim.target, Edit.footerAnim.points[i])) < 4000000) {
                    Edit.footerAnim.points[i].active = 0.03;
                    Edit.footerAnim.points[i].circle.active = 0.01;
                } else {
                    Edit.footerAnim.points[i].active = 0;
                    Edit.footerAnim.points[i].circle.active = 0;
                }

                Edit.footerAnim.drawLines(Edit.footerAnim.points[i]);
                Edit.footerAnim.points[i].circle.draw();
            }
        }
        if (!is.touchDevice()) {
            requestAnimationFrame(Edit.footerAnim.animate);
        }

    },
    shiftPoint: function (p) {
        TweenMax.to(p, 1 + 1 * Math.random(), {
            x: p.originX - 50 + Math.random() * 100,
            y: p.originY - 50 + Math.random() * 100, ease: Power1.easeOut,
            onComplete: function() {
                Edit.footerAnim.shiftPoint(p);
            }
        });
    },
    drawLines: function (p) {
        if (!p.active) return;
        for (var i in p.closest) {
            Edit.footerAnim.ctx.beginPath();
            Edit.footerAnim.ctx.moveTo(p.x, p.y);
            Edit.footerAnim.ctx.lineWidth = 2;
            Edit.footerAnim.ctx.lineTo(p.closest[i].x, p.closest[i].y);
            Edit.footerAnim.ctx.strokeStyle = 'rgba(255,255,255,' + p.active + ')';
            Edit.footerAnim.ctx.stroke();
        }
    },
    Circle: function (pos, rad, color) {
        var _this = this;

        // constructor
        (function() {
            _this.pos = pos || null;
            _this.radius = rad || null;
            _this.color = color || null;
        })();

        this.draw = function() {
            if (!_this.active) return;
            Edit.footerAnim.ctx.beginPath();
            Edit.footerAnim.ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
            /*ctx.moveTo(_this.pos.x-5,_this.pos.y-5);
            ctx.lineTo(_this.pos.x+5,_this.pos.y-5)
            ctx.lineTo(_this.pos.x+0.5,_this.pos.y+5);*/
            Edit.footerAnim.ctx.fillStyle = 'rgba(255,255,255,' + _this.active + ')';
            Edit.footerAnim.ctx.fill();
        };
    },
    getDistance: function (p1, p2) {
        return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
    }
}
