// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;(function ( $, window, document, undefined ) {

	"use strict";

		// undefined is used here as the undefined global variable in ECMAScript 3 is
		// mutable (ie. it can be changed by someone else). undefined isn't really being
		// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
		// can no longer be modified.

		// window and document are passed through as local variable rather than global
		// as this (slightly) quickens the resolution process and can be more efficiently
		// minified (especially when both are regularly referenced in your plugin).

		// Create the defaults once
		var pluginName = "massiveStrip",
		defaults = {
			itemClass: ".slider-item",
			itemClassProfissoes: ".slider-profissoes-item",
			scrollerClass:".pane-scroll",
			wrapperClass:'.wrapper',
			controlsClass:'.slider-controls',
			prevClass:'.prev-btn',
			nextClass:'.next-btn',
			indicatorClass:'.indicator',
			indicatorEl:'p',
			indicatorElLeft:'.indicator-left',
			indicatorElRight:'.indicator-right',
			parallaxSpeed:.5,
			animaDuration:1200
		};

		// The actual plugin constructor
		function Plugin ( element, options ) {
			this.element = element;
			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;
			this.items = $(this.element).find(this.settings.itemClass);
			this.itemProfissoes = $(this.element).find(this.settings.itemClassProfissoes);
			this.scrollerEl = $(this.element).find(this.settings.scrollerClass);
			this.scroller = void 0;
			this.wrapper = $(this.element).find(this.settings.wrapperClass);
			this.currentPage = void 0;
			this.animating = false;
			this.controls = {
				el:$(this.element).find(this.settings.controlsClass),
				prevBtn:$(this.element).find(this.settings.prevClass),
				nextBtn:$(this.element).find(this.settings.nextClass),
				indicator:$(this.element).find(this.settings.indicatorClass),
				indicatorEls:$(this.element).find(this.settings.indicatorClass+' '+this.settings.indicatorEl),
				indicatorElsLeft:$(this.element).find(this.settings.indicatorClass+' '+this.settings.indicatorElLeft),
				indicatorElsRight:$(this.element).find(this.settings.indicatorClass+' '+this.settings.indicatorElRight)
			};

			this.bind();
			
			this.init();
			///console.log(this.items);
			//console.log(this.itemProfissoes);
		}

		// Avoid Plugin.prototype conflicts
		$.extend(Plugin.prototype, {
			init: function () {
				//Set initial width
				var _this = this;
				this.scrollerEl.width(100*this.items.length+'%');
				if(this.items.length == 1){
					$(this.element).addClass('single');
					this.buildIndicators(false);
					$(this.items[0]).addClass('active');
				} else {
					this.scroller = new IScroll(this.scrollerEl.parent()[0],{
						eventPassthrough:true,
						scrollX:true,
						snap:'.slider-item',
						probeType:3,
						deceleration:0.01,
						bounce:false
					});
					this.resize();

					/*BindEvents */
					this.scroller.on('scrollStart',function(e){_this.scrollStartHandler(e)});
					this.scroller.on('scroll',function(e){_this.scrollHandler(e)})
					this.scroller.on('scrollEnd',function(e){_this.scrollEndHandler(e)});
					this.scrollHandler();
					this.buildIndicators(true);
				}
			},
			bind:function(){
				var _this = this; 
				this.controls.prevBtn.on('click',function(){_this.prevClickHandler(_this)})
				this.controls.nextBtn.on('click',function(){_this.nextClickHandler(_this)})
			},
			buildIndicators:function(notSingle){
				var _this = this;
				if(notSingle){
					var currentPage = this.getPageIndex(this.scroller.currentPage.pageX);
					$(this.controls.el).find('.total').text(_this.items.length);
					
					this.currentPage = currentPage;
					//console.log(currentPage)
					this.controls.indicatorEls.removeClass('current');
					this.controls.indicatorEls.eq(currentPage).addClass('current');
					this.controls.indicatorElsLeft.removeClass('current');
					this.controls.indicatorElsLeft.eq(currentPage).addClass('current');
					this.controls.indicatorElsRight.removeClass('current');
					this.controls.indicatorElsRight.eq(currentPage).addClass('current');

					if(this.itemProfissoes.length > 1){
						var itemHeight = $(this.controls.indicatorElsLeft[0]).height();
					} else {
						var itemHeight = $(this.controls.indicatorEls[0]).height();
					}

					//var itemHeight = $(this.controls.indicatorEls[0]).height();
					//var itemHeight = $(this.controls.indicatorElsLeft[0]).height();
					if(this.currentPage == 0){
						this.controls.nextBtn.removeClass('disable');
						this.controls.prevBtn.addClass('disable');

					}else if(this.currentPage == this.items.length-1){
						$(this.controls.el).find('.indicator-right.current').text(this.items.length);
						this.controls.prevBtn.removeClass('disable');
						this.controls.nextBtn.addClass('disable');
					}else{
						this.controls.nextBtn.removeClass('disable');
						this.controls.prevBtn.removeClass('disable');
					}
					TweenMax.to($(this.controls.el).find('.strip'),0.2,{y:-(this.currentPage*itemHeight)});
				}else{
					this.controls.el.css('display','none');
				}
				
			},
			scrollStartHandler:function(e){
				var _this = this;
				var frame = _this.items.eq(_this.currentPage).find('iframe');
				if($(_this.element).find('.drag-icon').length>0){
					$(_this.element).find('.drag-icon').addClass('hide');
				}
				if(frame.length>0){
					var frameEl = frame[0];
					var player = $f(frameEl);
					player.api('pause');
					player.api('seek',0);
				}
			},
			scrollHandler:function(){ 
				var currentMismatch = this.calcMismtach(this.scroller.x, this.scroller.wrapperWidth * this.scroller.currentPage.pageX * -1,this.scroller.wrapperWidth * (this.scroller.currentPage.pageX + 1) * -1, 0, this.scroller.wrapperWidth * this.settings.parallaxSpeed);
				
				var nextMismatch = this.calcMismtach(currentMismatch, 0, this.scroller.wrapperWidth * this.settings.parallaxSpeed, this.scroller.wrapperWidth * -this.settings.parallaxSpeed, 0);

				var prevMismmatch = this.calcMismtach(currentMismatch, 0, this.scroller.wrapperWidth * -this.settings.parallaxSpeed, this.scroller.wrapperWidth * this.settings.parallaxSpeed, 0);
                /*if(this.items.eq(this.scroller.currentPage.pageX).hasClass('event')){
                	var rect = this.items.eq(this.scroller.currentPage.pageX).find('.square svg rect');
                	console.log(rect);
                }*/
                this.items.eq(this.scroller.currentPage.pageX).addClass("active").children(".delayed").children(".background").css("transform", "translateX(" + currentMismatch + "px) translateZ(0px)"), this.items.eq(this.scroller.currentPage.pageX - 1).removeClass("active").children(".delayed").children(".background").css("transform", "translateX(" + prevMismmatch + "px) translateZ(0px)"), this.items.eq(this.scroller.currentPage.pageX + 1).removeClass("active").children(".delayed").children(".background").css("transform", "translateX(" + nextMismatch + "px) translateZ(0px)")
            },
            calcMismtach:function(a,b,c,d,e){
            	return d + (e - d) * (a - b) / (c - b)
            },
            getPageIndex:function(pageX){
            	var _this = this;
            	var pageIndex = null;
            	this.items.each(function(index){
            		if(this == _this.items.eq(pageX)[0]){
            			pageIndex = index;
            		}
            	})
            	return pageIndex;
            },
            scrollEndHandler:function(){ 
            	this.buildIndicators(true);


            },
            prevClickHandler:function(){
            	if(this.currentPage >0){
            		this.prevNext(-1);
            	}
            },
            nextClickHandler:function(){ 
            	if(this.currentPage < this.items.length){
            		this.prevNext(1);
            	}
            },
            prevNext:function(page){
            	var _this = this;
            	var frame = _this.items.eq(_this.currentPage).find('iframe');
            	if(frame.length>0){
            		var frameEl = frame[0];
            		var player = $f(frameEl);
            		player.api('pause');
            		player.api('seek',0);
            	}
            	if(!this.animating){
            		this.animating = true;
            		var page = this.scroller.currentPage.pageX + page;
            		this.goToPage(page);
            		$(this.element).delay(this.settings.animaDuration).queue(function(){ 
						//_this.buildIndicators();
						_this.animating = false;
						$(_this.element).dequeue();
					})
            	}

            },
            goToPage:function(pageX){ 
            	return this.scroller.goToPage(pageX,0,this.settings.animaDuration);
            },
            resize:function(){ 
            	var wH = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
				//$(this.element).height(wH);
			},
			yourOtherFunction: function () {
					// some logic
				}
			});

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function ( options ) {
			return this.each(function() {
				if ( !$.data( this, "plugin_" + pluginName ) ) {
					$.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
				}
			});
		};

	})( jQuery, window, document );
