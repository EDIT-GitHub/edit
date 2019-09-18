(function($) {  
    'use strict';  
    Edit.modules = {
        collection: [],
        isoModule: function (elemClass, endpoint) {
            this.inited = false;
            this.elem = $($('.js-iso-module' + elemClass + ' .grid-cont')[0]);
            this.elemClass = elemClass;
            this.scroller = [];
            this.imagesLoaded = false;
            this.loaded = false;
            this.imageLoader = void 0;
            this.filtered = false;
            this.filtersDist = 70;
            this.filterObj = void 0;
            this.anyFilter = false;
            this.hasFilters = false;
            this.endpoint = endpoint;
            this.filtersElems = void 0;
            this.mobileTimer = void 0;
            this.waiter = void 0;
            this.init = function () {
                var _this = this;
                if(Edit.inited){
                    if(_this.waiter !== undefined){
                        window.clearTimeout(_this.waiter);
                    }
                //console.log('Teste');
                if (_this.elem.parent().hasClass('filtered')) {
                    _this.elem.filtered = true;
                    Edit.filtered = true;
                    _this.filterObj = {};
                    _this.filtersElems = _this.elem.find('.filter');
                    _this.filtersElems.find('select').multifilter({
                        multiselect: false,
                        singlecategory: true,
                        totalLabelSufix: '',
                        totalLabelPrefix: '',
                        totalLabelPos: 'before',
                    });
                    _this.elem.parent().find('.filters-holder .responsive-header').on('click', function () {
                        _this.elem.parent().find('.filters-holder').removeClass('active');
                        _this.mobileTimer = window.setTimeout(function(){
                            _this.elem.parent().find('.filters-holder').css('display', 'none');
                        },300);
                        if(_this.checkFilters()){
                            _this.elem.find('.modal-btn.clear').removeClass('disabled');
                            _this.elem.find('.modal-btn.okay').removeClass('disabled');
                        }else{
                            _this.elem.find('.modal-btn.clear').addClass('disabled');
                            _this.elem.find('.modal-btn.okay').addClass('disabled');
                        }
                    });
                    _this.elem.find('.default-btn.filter-btn').on('click', function () {

                        _this.elem.parent().find('.filters-holder .responsive-header').addClass('active');
                        _this.elem.parent().find('.filters-holder').css('display', 'block');
                        _this.mobileTimer = window.setTimeout(function(){
                            _this.elem.parent().find('.filters-holder').addClass('active');
                        },100);
                        var origin = _this.elem.find('.responsive-header').outerHeight(true);
                        if(_this.checkFilters()){
                            _this.elem.find('.modal-btn.clear').removeClass('disabled');
                            _this.elem.find('.modal-btn.okay').removeClass('disabled');
                        }else{
                            _this.elem.find('.modal-btn.clear').addClass('disabled');
                            _this.elem.find('.modal-btn.okay').addClass('disabled');
                        }
                    });
                    
                    _this.filterObj = (function () {
                        var obj = {};
                        _this.elem.find('select').each(function () {
                            var name = $(this).attr('name');
                            obj[name] = '0';
                        });
                        return obj;
                    }());

                }
                var wW = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                if(is.safari()){
                    wW = $(window).width();
                }
                if(wW > 1035){
                    _this.desktop();
                }
                if(wW <= 1024){
                    _this.setFilters();
                }
                if(wW > 1024){
                    _this.unsetFilters();
                }
                if(wW <= 1035 && wW > 786){
                    _this.tablet();
                }
                if(wW <= 786 && wW > 500){
                    _this.smallTablet();
                }
                if(wW <= 500 && wW > 360){
                    _this.mobile();
                }
                if(wW <= 360){
                    _this.smallMobile();
                }
            }else{
                _this.postpone();
            }


        };
        this.checkFilters = function(){
            var _this = this;
            var filters = _this.filtersElems.find('select');
            var filtered = false;
            filters.each(function(index){
                var el = $(this);
                if(_this.filterObj.hasOwnProperty(el.attr('name')) && !filtered){
                    if(_this.filterObj[el.attr('name')] == '0'){
                        _this.anyFilter = false;
                        filtered = false;
                    }else{
                        _this.anyFilter = true;
                        filtered= true;
                        return filtered;
                    }
                }
                if(index == filters.length-1){
                    _this.anyFilter = filtered;
                    return filtered;
                }
            });
            return filtered;
        };
        this.postpone = function(){
            var _this = this;
            _this.waiter = window.setTimeout(function () {
                _this.init();
            }, 20);
        };
        this.onFiltersChangeHandler = function (e) {
            var el = $(e.currentTarget);
            var _this = this;
            if (_this.filterObj.hasOwnProperty(el.attr('name'))) {
                _this.filterObj[el.attr('name')] = el.val();
                Edit.contentPagenumber = 1;
                if(_this.checkFilters()){
                    _this.elem.find('.modal-btn.clear').removeClass('disabled');
                    _this.elem.find('.modal-btn.okay').removeClass('disabled');
                }else if(!_this.hasFilters){
                    //console.log('ENTER');
                    _this.elem.find('.modal-btn.clear').addClass('disabled');
                    _this.elem.find('.modal-btn.okay').addClass('disabled');
                }
                _this.checkFilters();
            } else {
                throw new ModuleError('No filter exists with the name provided: ' + el.attr('name')).toString();
            }
        };
        this.onFiltersChangeHandlerAndLoad = function (e) {
            var el = $(e.currentTarget);
            var _this = this;
            if (_this.filterObj.hasOwnProperty(el.attr('name'))) {
                _this.filterObj[el.attr('name')] = el.val();
                Edit.contentPagenumber = 1;
                _this.anyFilter = true;
                _this.loadContentPage();

            } else {
                throw new ModuleError('No filter exists with the name provided: ' + el.attr('name')).toString();
            }

        };
        this.loadContentPage = function () {
            var _this = this;
            var urlData = {};
            $('.logo').addClass('loading');
            if (Edit.filtered) {

                urlData.pagenumber = Edit.contentPagenumber;
                for (var filter in _this.filterObj) {
                    urlData[filter] = _this.filterObj[filter];
                }

            } else {
                urlData.pagenumber = Edit.contentPagenumber;
            }
            if(_this.checkFilters()){
                _this.hasFilters = true;
            }else{
                _this.hasFilters = false;
            }
            if (!Edit.contentPageLoading) {
                Edit.contentPageLoading = true;
                $.ajax({
                    url: _this.endpoint,
                    data: urlData,
                    method: 'POST',
                    success: function (data) { _this.successCallback(data); },
                    error: _this.errorCallback
                });
            }
        };
        this.successCallback = function (result) {
            var _this = this;
            var i;
            _this.elem.find('.load-more-btn').removeClass('loading');
            Edit.contentPageLoading = false;
            Edit.contentPagenumber = 1;
            $('.logo').removeClass('loading');
            if (Edit.filtered) {
                for (i = 0; i < Edit.modules.collection.length; i++) {
                    if (Edit.modules.collection[i].type == 'isoModule') {
                        Edit.modules.collection[i].instance.clear();
                        Edit.modules.collection[i].instance.append(result);
                        for (i = 0; i < Edit.modules.collection.length; i++) {
                            if (Edit.modules.collection[i].type == 'loadMore') {
                                Edit.modules.collection[i].instance.checkPages();
                            }
                        }
                        Waypoint.refreshAll();
                    }
                }
            }
        };
        this.errorCallback = function () {
            $('.logo').removeClass('loading');
        };
        this.desktop = function () {
            var _this = this;
            if (_this.elem.data('isotope')) {
                _this.elem.isotope('destroy');
            }
            //console.log('START ISO MODULE')
            _this.inited = true;
            var size = 0;
            //_this.elem.find('.placeholder').remove();
            //_this.insertPlaceholders(1000, 2, [750, 500, 500]);
            if (_this.imagesLoaded) {
                //console.log('Create Desktop Iso');
                
                _this.elem.isotope({
                    itemSelector: '.iso-block',
                    stamp: '.stamp',
                    layoutMode: 'masonry',
                    animationEngine:'css',
                    masonry:{
                        columnWidth:250
                    },
                    getSortData: {
                        fixPods: function (elem) {
                            var order,
                            index = $(elem).index();

                            if (!$(elem).hasClass('module-title')) {
                                $(elem).removeClass('block-medium block-full block-small can-invert');
                                $(elem).addClass($(elem).attr('data-old'));
                            }
                            if ($(elem).hasClass('block-full')) {
                                size += 1000;
                            } else if ($(elem).hasClass('block-medium')) {
                                size += 500;
                            } else if ($(elem).hasClass('block-small')) {
                                size += 500;
                            }
                            if (size > 1000) {
                                if (!$(elem).hasClass('module-title')) {
                                    $(elem).removeClass('block-medium block-full');
                                    $(elem).addClass('block-small');
                                }
                                size = 0;
                            } else if (size >= 1000) {
                                size = 0;
                            }
                            return order;
                        }
                    },
                    sortBy: 'fixPods'
                });
                if(!_this.loaded){
                    //console.log('Loaded IsoModule -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                }
                _this.loaded = true;
            } else {
                //console.log(_this.elem);
                _this.imageLoader = _this.elem.waitForImages(function () {
                    //console.log('Create Desktop Iso WFI');
                    //console.log('Loaded IsoModule -> '+_this.elemClass);
                    _this.imagesLoaded = true;
                    _this.elem.isotope({
                        itemSelector: '.iso-block',
                        stamp: '.stamp',
                        layoutMode: 'masonry',
                        animationEngine:'css',
                        masonry:{
                            columnWidth:250
                        },
                        getSortData: {
                            fixPods: function (elem) {
                                var order,
                                index = $(elem).index();

                                if ($(elem).hasClass('block-full')) {
                                    size += 1000;
                                } else if ($(elem).hasClass('block-medium')) {
                                    size += 500;
                                } else if ($(elem).hasClass('block-small')) {
                                    size += 500;
                                }
                                if (!$(elem).hasClass('module-title')) {
                                    $(elem).removeClass('block-medium block-full block-small can-invert');
                                    $(elem).addClass($(elem).attr('data-old'));
                                }
                                if (size > 1000) {
                                    if (!$(elem).hasClass('module-title')) {
                                        $(elem).removeClass('block-medium block-full');
                                        $(elem).addClass('block-small');
                                    }
                                    size = 0;
                                } else if (size >= 1000) {
                                    size = 0;
                                }
                                return order;
                            }
                        },
                        sortBy: 'fixPods'
                    });
                    if(!_this.loaded){
                        $(window).trigger(Edit.events.MODULE_LOADED); 
                    }
                    _this.loaded = true;
                    
                });
            }

        };
        this.tablet = function () {
            var _this = this;
            if (_this.elem.data('isotope')) {
                _this.elem.isotope('destroy');
            }
            $('.js-iso-module' + _this.elemClass + '.mobile-scroll').each(function (index) {
                if (_this.scroller[index]) {
                    _this.scroller[index].destroy();
                    var children = $(this).find('.mobile-scroll-wrapper .pane-scroll').children();
                    $(this).find('.grid-cont').append(children);
                    $(this).find('.mobile-scroll-wrapper').remove();
                    $(this).removeClass('added');
                }
            });
            _this.inited = true;
            var size = 0;
            _this.elem.find('.placeholder').remove();
            //_this.insertPlaceholders(750, 2, [750, 500, 500]);
            if (_this.imagesLoaded) {
                //console.log('Create Tablet Iso');
                _this.elem.isotope({
                    itemSelector: '.iso-block',
                    layoutMode: 'masonry',
                    masonry:{
                        columnWidth:'.grid-sizer'
                    },
                    stamp: '.stamp',
                    getSortData: {
                        fixPods: function (elem) {
                            var order, index = $(elem).index();
                            if (!$(elem).hasClass('module-title')) {
                                $(elem).removeClass('block-medium block-full block-small can-invert');
                                $(elem).addClass($(elem).attr('data-old'));

                            }
                            if ($(elem).hasClass('block-full')) {
                                size += 750;
                            } else if ($(elem).hasClass('block-medium') || $(elem).hasClass('medium-horz') || $(elem).hasClass('module-title')) {
                                size += 500;
                            } else if ($(elem).hasClass('block-small') || $(elem).hasClass('medium-vert')) {
                                size += 500;
                            } else if ($(elem).hasClass('small')) {
                                size += 250;
                            }
                            if (size >= 750) {
                                if (!$(elem).hasClass('module-title')) {
                                    if (!$(elem).hasClass('block-full')) {
                                        $(elem).removeClass('block-medium');
                                        $(elem).addClass('block-small can-invert');
                                    }
                                }
                                size = 0;
                            }
                            //return order;
                        }
                    },
                    sortBy: 'fixPods'
                });
                if(!_this.loaded){
                    //console.log('Loaded IsoModule -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                }
                _this.loaded = true;
            } else {
                _this.elem.waitForImages(function () {
                    //console.log('Create Tablet Iso No Load');
                    _this.imagesLoaded = true;
                    _this.elem.isotope({
                        itemSelector: '.iso-block',
                        layoutMode: 'masonry',
                        masonry:{
                            columnWidth:'.grid-sizer'
                        },
                        stamp: '.stamp',
                        getSortData: {
                            fixPods: function (elem) {
                                var order, index = $(elem).index();
                                if (!$(elem).hasClass('module-title')) {
                                    $(elem).removeClass('block-medium block-full block-small can-invert');
                                    $(elem).addClass($(elem).attr('data-old'));
                                }
                                if ($(elem).hasClass('block-full')) {
                                    size += 750;
                                } else if ($(elem).hasClass('block-medium') || $(elem).hasClass('medium-horz') || $(elem).hasClass('module-title')) {
                                    size += 500;
                                } else if ($(elem).hasClass('block-small') || $(elem).hasClass('medium-vert')) {
                                    size += 500;
                                } else if ($(elem).hasClass('small')) {
                                    size += 250;
                                }
                                if (size >= 750) {
                                    if (!$(elem).hasClass('module-title')) {
                                        if (!$(elem).hasClass('block-full')) {
                                            /*$(elem).removeClass('block-medium');
                                            $(elem).addClass('block-small can-invert');*/
                                        }
                                    }
                                    size = 0;
                                }

                                //return order;
                            }
                        },
                        sortBy: 'fixPods'
                    });
                    _this.relayout();
                    if(!_this.loaded){
                        //console.log('Loaded IsoModule -> '+_this.elemClass);
                        $(window).trigger(Edit.events.MODULE_LOADED);
                    }
                    _this.loaded = true;
                });
            }
        };
        this.setFilters = function () {
            var _this = this;
            if (_this.elem.parent().hasClass('filtered')) {
                var filters = _this.elem.find('.filter');
                var gridCont = $(_this.elem.find('.grid-cont')[0]);
                _this.elem.find('.modal-btn.okay').on('click',function(e){
                    if($(this).hasClass('disabled')){
                        _this.elem.parent().find('.filters-holder').css('display', 'none');
                    }else{
                        _this.elem.parent().find('.filters-holder').css('display', 'none');
                        if(_this.anyFilter || _this.hasFilters) {_this.loadContentPage(); }
                    }
                });
                _this.elem.find('.modal-btn.clear').on('click',function(e){
                    filters.each(function(index){
                        var el = $(this);
                        _this.anyFilter = false;
                        el.find('select').data('plugin_multifilter').setActive(0);
                    });
                });
                _this.elem.find('select').off('change');
                _this.elem.find('select').on('change', function (e) { _this.onFiltersChangeHandler(e); });
            }
        };
        this.unsetFilters = function () {
            var _this = this;
            if (_this.elem.parent().hasClass('filtered')) {
                var filters = _this.elem.find('.filter');
                _this.elem.parent().find('.filters-holder').attr('style','');
                var gridCont = $(_this.elem.find('.grid-cont')[0]);
                _this.elem.find('.modal-btn.okay').off('click');
                _this.elem.find('.modal-btn.clear').off('click');
                _this.elem.find('select').off('change');
                _this.elem.find('select').on('change', function (e) { _this.onFiltersChangeHandlerAndLoad(e); });
            }
        };
        this.smallTablet = function () {
            var _this = this;
            if (_this.elem.data('isotope')) {
                _this.elem.isotope('destroy');
            }
            $('.js-iso-module' + _this.elemClass + '.mobile-scroll').each(function (index) {
                if (_this.scroller[index]) {
                    _this.scroller[index].destroy();
                    var children = $(this).find('.mobile-scroll-wrapper .pane-scroll').children();
                    $(this).find('.grid-cont').append(children);
                    $(this).find('.mobile-scroll-wrapper').remove();
                    $(this).removeClass('added');
                }
            });
            _this.inited = true;
            var size = 0;
            _this.elem.find('.placeholder').remove();
            //_this.insertPlaceholders(750, 4, [750, 500, 500]);

            if (_this.imagesLoaded) {
                _this.elem.isotope({
                    itemSelector: '.iso-block',
                    layoutMode: 'packery',
                    stamp: '.stamp',
                    getSortData: {
                        fixPods: function (elem) {
                            var order,
                            index = $(elem).index();
                            if (!$(elem).hasClass('module-title')) {
                                $(elem).removeClass('block-medium block-full block-small can-invert');
                                $(elem).addClass($(elem).attr('data-old'));
                            }
                            if ($(elem).hasClass('module-title')) {
                                size += 500;
                            }
                            if ($(elem).hasClass('block-full')) {
                                size += 750;
                            } else if ($(elem).hasClass('block-medium') || $(elem).hasClass('medium-horz') || $(elem).hasClass('module-title')) {
                                size += 500;
                            } else if ($(elem).hasClass('block-small') || $(elem).hasClass('medium-vert')) {
                                size += 500;
                            } else if ($(elem).hasClass('small')) {
                                size += 250;
                            }
                            if (size >= 750) {
                                if (!$(elem).hasClass('module-title')) {
                                    if (!$(elem).hasClass('block-full')) {
                                        $(elem).removeClass('block-medium');
                                        $(elem).addClass('block-small can-invert');
                                    }
                                }
                                size = 0;
                            }

                            return order;
                        }
                    },
                    sortBy: 'fixPods'
                });
                if(!_this.loaded){
                    //console.log('Loaded IsoModule -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                }
                _this.loaded = true;
            } else {
                _this.elem.waitForImages(function () {

                    _this.imagesLoaded = true;
                    _this.elem.isotope({
                        itemSelector: '.iso-block',
                        layoutMode: 'packery',
                        stamp: '.stamp',
                        getSortData: {
                            fixPods: function (elem) {
                                var order,
                                index = $(elem).index();
                                if (!$(elem).hasClass('module-title')) {
                                    $(elem).removeClass('block-medium block-full block-small can-invert');
                                    $(elem).addClass($(elem).attr('data-old'));
                                }
                                if ($(elem).hasClass('block-full')) {
                                    size += 750;
                                } else if ($(elem).hasClass('block-medium') || $(elem).hasClass('medium-horz') || $(elem).hasClass('module-title')) {
                                    size += 500;
                                } else if ($(elem).hasClass('block-small') || $(elem).hasClass('medium-vert')) {
                                    size += 500;
                                } else if ($(elem).hasClass('small')) {
                                    size += 250;
                                }
                                if (size >= 750) {
                                    if (!$(elem).hasClass('module-title')) {
                                        if (!$(elem).hasClass('block-full')) {
                                            //console.log('aqui')
                                            $(elem).removeClass('block-medium');
                                            $(elem).addClass('block-small can-invert');
                                        }
                                    }
                                    size = 0;
                                }

                                return order;
                            }
                        },
                        sortBy: 'fixPods'
                    });
                    if(!_this.loaded){
                        //console.log('Loaded IsoModule -> '+_this.elemClass);
                        $(window).trigger(Edit.events.MODULE_LOADED);
                    }
                    _this.loaded = true;
                });
            }

        };
        this.mobile = function () {
            var _this = this;
            if (_this.elem.data('isotope')) {
                _this.elem.isotope('destroy');
            }
            if (_this.imagesLoaded) {
                if ($('.js-iso-module' + _this.elemClass).hasClass('mobile-scroll')) {
                    _this.elem.find('.placeholder').remove();
                    _this.elem.find('.block-medium,.block-small,.block-full').not('.module-title').not('.recruitment').not('.blog').not('.project').removeClass('block-medium block-small block-full can-invert').addClass('block-small can-invert');
                    $('.js-iso-module' + _this.elemClass + '.mobile-scroll').not('.added').each(function (index) {
                        var children = $(this).find('.grid-cont').children().not('.stamp');
                        $(this).find('.grid-cont').append('<div class="mobile-scroll-wrapper"><div class="pane-scroll"></div></div>');

                        var scrollWrapper = $(this).find('.mobile-scroll-wrapper');
                        scrollWrapper.find('.pane-scroll').width((children.length - 1) * 260 + 250);
                        scrollWrapper.find('.pane-scroll').append(children);
                        var scroller = new IScroll(scrollWrapper[0], {
                            eventPassthrough: true,
                            scrollX: true,
                            snap: '.iso-block',
                            probeType: 3,
                            deceleration: 0.01,

                        });
                        scroller.on('scrollStart', function () {
                            $('.js-iso-module' + _this.elemClass + '.mobile-scroll a').addClass('no-navigation');
                        });
                        scroller.on('scrollEnd', function () {
                            $('.js-iso-module' + _this.elemClass + '.mobile-scroll a').removeClass('no-navigation');
                        });
                        $(this).addClass('added');
                        _this.scroller.push(scroller);
                    });
                } else {
                    _this.elem.find('.placeholder').remove();
                    _this.elem.find('.block-medium,.block-small,.block-full').not('.module-title').not('.recruitment').not('.blog').not('.project').removeClass('block-medium block-small block-full can-invert');
                    var count = 0;
                    //_this.insertPlaceholdersMobile();
                    _this.elem.isotope({
                        itemSelector: '.iso-block',
                        layoutMode: 'packery',
                        stamp: '.stamp',
                        getSortData: {
                            fixPods: function (elem) {
                                var order,
                                index = $(elem).index();
                                if (!$(elem).hasClass('noticia') && !$(elem).hasClass('blog-clear-css') && !$(elem).hasClass('module-title') && !$(elem).hasClass('placeholder') && !$(elem).hasClass('recruitment') && !$(elem).hasClass('blog') && !$(elem).hasClass('project')) {
                                    $(elem).removeClass('block-medium block-full block-small can-invert');
                                    if (count == 0) {
                                        $(elem).addClass('block-medium');
                                    } else {
                                        //console.log('aqui Mobile');
                                        $(elem).addClass('block-small can-invert');
                                    }
                                    count++;

                                    if (count > 2) {
                                        count = 0;
                                    }

                                }

                                if ($(elem).hasClass('noticia') || $(elem).hasClass('blog-clear-css') ) {
                                    $(elem).removeClass('block-medium block-full block-small can-invert');
                                    $(elem).addClass('block-small can-invert');
                                } 


                                return order;
                            }
                        },
                        sortBy: 'fixPods'
                    });
                }
                if(!_this.loaded){
                    //console.log('Loaded IsoModule -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                }
                _this.loaded = true;
            } else {
                _this.elem.waitForImages(function () {
                    _this.imagesLoaded = true;
                    if ($('.js-iso-module' + _this.elemClass).hasClass('mobile-scroll')) {
                        //console.log('HAS SCROLL');
                        _this.elem.find('.placeholder').remove();
                        _this.elem.find('.block-medium,.block-small,.block-full').not('.module-title').not('.recruitment').not('.blog').not('.project').removeClass('block-medium block-small block-full can-invert').addClass('block-small can-invert');
                        $('.js-iso-module' + _this.elemClass + '.mobile-scroll').not('.added').each(function (index) {
                            var children = $(this).find('.grid-cont').children().not('.stamp');
                            $(this).find('.grid-cont').append('<div class="mobile-scroll-wrapper"><div class="pane-scroll"></div></div>');

                            var scrollWrapper = $(this).find('.mobile-scroll-wrapper');
                            scrollWrapper.find('.pane-scroll').width((children.length - 1) * 260 + 250);
                            scrollWrapper.find('.pane-scroll').append(children);
                            var scroller = new IScroll(scrollWrapper[0], {
                                eventPassthrough: true,
                                scrollX: true,
                                snap: '.iso-block',
                                probeType: 3,
                                deceleration: 0.01,

                            });
                            scroller.on('scrollStart', function () {
                                //console.log($('.js-iso-module' + _this.elemClass + '.mobile-scroll a'));
                                $('.js-iso-module' + _this.elemClass + '.mobile-scroll a').addClass('no-navigation');
                            });
                            scroller.on('scrollEnd', function () {
                                $('.js-iso-module' + _this.elemClass + '.mobile-scroll a').removeClass('no-navigation');
                            });
                            $(this).addClass('added');
                            _this.scroller.push(scroller);
                        });
                    } else {
                        var count = 0;
                        //_this.insertPlaceholdersMobile();
                        //console.log('Images already loaded on:' + _this.elemClass);
                        //console.log('aqui se sempre');
                        _this.elem.isotope({
                            itemSelector: '.iso-block',
                            layoutMode: 'masonry',
                            masonry:{
                                columnWidth:'.grid-sizer'
                            },
                            stamp: '.stamp',
                            getSortData: {
                                fixPods: function (elem) {
                                    var order,
                                    index = $(elem).index();
                                    if (!$(elem).hasClass('module-title') && !$(elem).hasClass('placeholder') && !$(elem).hasClass('recruitment') && !$(elem).hasClass('blog') && !$(elem).hasClass('project')) {
                                        $(elem).removeClass('block-medium block-full block-small can-invert');
                                        if (count == 0) {
                                            $(elem).addClass('block-medium');
                                        } else {
                                            //console.log('aqui Mobile');
                                            $(elem).addClass('block-small can-invert');
                                        }
                                        count++;

                                        if (count == 3) {
                                            count = 0;
                                        }

                                    }
                                    //console.log('Fix pods')
                                    return order;
                                }
                            },
                            sortBy: 'fixPods'
                        });
                    }
                    _this.relayout();
                    if(!_this.loaded){
                        //console.log('Loaded IsoModule -> '+_this.elemClass);
                        $(window).trigger(Edit.events.MODULE_LOADED);
                    }
                    _this.loaded = true;
                });

}

};
this.smallMobile = function () {
    var _this = this;
    if (_this.elem.data('isotope')) {
        _this.elem.isotope('destroy');
    }
    if (_this.imagesLoaded) {
        if (!_this.elem.hasClass('mobile-scroll')) {
            _this.elem.find('.placeholder').remove();
            _this.elem.find('.block-medium,.block-small,.block-full').not('.module-title').not('.blog').not('.recruitment').removeClass('block-medium block-small block-full can-invert').addClass('block-small can-invert');
        }
        if(!_this.loaded){
                    //console.log('Loaded IsoModule -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                }
                _this.loaded = true;
            } else {
                _this.elem.waitForImages(function () {
                    _this.imagesLoaded = true;
                    _this.elem.find('.placeholder').remove();
                    _this.elem.find('.block-medium,.block-small,.block-full').not('.module-title').not('.blog').not('.recruitment').removeClass('block-medium block-small block-full can-invert').addClass('block-small can-invert');
                    if(!_this.loaded){
                        //console.log('Loaded IsoModule -> '+_this.elemClass);
                        $(window).trigger(Edit.events.MODULE_LOADED);
                    }
                    _this.loaded = true;
                });
            }
        };
        this.relayout = function () {
            var _this = this;
            if (_this.elem.data('isotope')) {
                _this.elem.isotope('layout');
            }
        };
        this.append = function (data) {
            var _this = this;
            var tempContainer, script, newBlocks, i;
            //console.log(_this.elem);
            if (_this.elem.data('isotope')) {
                tempContainer = document.createElement('div');
                $(tempContainer).append(data);
                script = $(tempContainer).find('script');

                _this.elem.append(script);
                newBlocks = $(tempContainer).find('.iso-block');
                for (i = 0; i < newBlocks.length; i++) {
                    _this.elem.append(newBlocks[i]);
                    _this.elem.isotope('appended', newBlocks[i]);
                }

                //_this.elem.find('.placeholder').remove();
                //_this.insertPlaceholders(1000, 2, [750, 500, 500]);
                setTimeout(function () {
                    _this.relayout();
                    Waypoint.refreshAll();
                }, 500);
            } else {
                tempContainer = document.createElement('div');
                $(tempContainer).append(data);
                script = $(tempContainer).find('script');

                _this.elem.append(script);
                newBlocks = $(tempContainer).find('.iso-block');
                for (i = 0; i < newBlocks.length; i++) {
                    _this.elem.append(newBlocks[i]);
                    
                }
                setTimeout(function () {
                    _this.smallMobile();
                    Waypoint.refreshAll();
                }, 500);
            }
        };
        this.clear = function () {
            var _this = this;
            if (_this.elem.data('isotope')) {
                var items = _this.elem.find('.iso-block');
                _this.elem.isotope('remove', items);
            }
        };
        this.changeFiltersPos = function () {
            var _this = this;
            if (_this.elem.parent().hasClass('filtered')) {
                _this.elem.find('.filter-btn').on('click', function () {
                    _this.elem.find('.filters-holder').css('display', 'block');
                    var origin = _this.elem.find('.responsive-header').outerHeight(true);

                    /*_this.elem.find('.multifilter-container').each(function(index){
                        $(this).css('top',origin+(index * _this.filtersDist));
                    });*/
                });


            }
        };
        this.insertPlaceholders = function (maxSize, modulus, sizes) {
            var _this = this;
            var elems = _this.elem.find('.iso-block');
            var size = 0;
            var first = true;
            for (var i = 0; i < elems.length; i += 1) {
                var elem = elems[i];
                if ($(elem).hasClass('block-full')) {
                    size += sizes[0];
                } else if ($(elem).hasClass('block-medium')) {
                    size += sizes[1];
                } else if ($(elem).hasClass('block-small')) {
                    size += sizes[2];
                }
                if (!first) {
                    if (modulus % i == 0) {
                        var rand2 = Math.floor(Math.floor(Math.random() * (3 + 1) + 1));
                        var cssClass = '';
                        if (rand2 == 1) {
                            cssClass = 'small';
                            size += 250;
                        } else if (rand2 == 2) {
                            cssClass = 'small';
                            size += 250;
                        } else {
                            cssClass = 'small';
                            size += 250;
                        }
                        $(elem).after('<div class="placeholder ' + cssClass + ' iso-block"></div>');
                    }

                }
                if (size >= maxSize) {
                    size = 0;
                    first = false;
                }
            }
        };
        this.insertPlaceholdersMobile = function () {
            var _this = this;
            var elems = _this.elem.find('.iso-block');
            var count = 0;
            var first = true;
            for (var i = 0; i < elems.length; i += 1) {
                var elem = elems[i];
                if (!first) {
                    if (count == 1 || count == 2) {
                        $(elem).after('<div class="placeholder small iso-block"></div>');
                    }
                    if (count == 2) {
                        count = 0;
                    } else {
                        count++;
                    }
                }
                first = false;
            }
        };
        this.destroy = function () {
            //this.imageLoader.canceled = true;
            this.elem.remove();
        };
        this.init();
    },
    isoModuleResponsive: {
        waiter: void 0,
        inited:false,
        init: function () {

            if (!Edit.inited) {
                Edit.modules.isoModuleResponsive.postpone();
            } else {
                window.clearTimeout(Edit.modules.isoModuleResponsive.waiter);

                if(!Edit.modules.isoModuleResponsive.inited){
                    Edit.modules.isoModuleResponsive.inited = true;
                    enquire
                    .register('screen and (min-width:1035px)', {
                      match: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if (Edit.modules.collection[i].type == 'isoModule') {
                                  Edit.modules.collection[i].instance.desktop();
                              }
                          }

                      }
                  })
                    .register('screen and (max-width:1024px)',{
                        match:function(){
                            for (var i = 0; i < Edit.modules.collection.length; i++) {
                                if (Edit.modules.collection[i].type == 'isoModule') {
                                    Edit.modules.collection[i].instance.setFilters();
                                }
                            }
                        },
                        unmatch:function(){
                            for (var i = 0; i < Edit.modules.collection.length; i++) {
                                if (Edit.modules.collection[i].type == 'isoModule') {
                                    Edit.modules.collection[i].instance.unsetFilters();
                                }
                            }
                        }
                    })
                    .register('screen and (max-width:1035px) and (min-width:786px)', {
                      match: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if(Edit.modules.collection[i].type == 'isoModule'){
                                    //console.log('SET TABLET ISO MODULE')
                                    //Edit.modules.collection[i].instance.tablet();
                                    Edit.modules.collection[i].instance.smallTablet();
                                }
                            }
                        },
                        unmatch: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if(Edit.modules.collection[i].type == 'isoModule'){
                               Edit.modules.collection[i].instance.desktop();
                           }
                       }
                   }
               })
                    .register('screen and (max-width:1024px)', {
                      match: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if(Edit.modules.collection[i].type == 'isoModule'){
                               Edit.modules.collection[i].instance.setFilters();
                           }
                       }
                   },
                   unmatch: function () {
                      for (var i = 0; i < Edit.modules.collection.length; i++) {
                          if(Edit.modules.collection[i].type == 'isoModule'){
                           Edit.modules.collection[i].instance.unsetFilters();
                       }
                   }
               }
           })
                    .register('screen and (max-width:785px) and (min-width:501px)', {
                      match: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if(Edit.modules.collection[i].type == 'isoModule'){
                               Edit.modules.collection[i].instance.smallTablet();
                           }
                       }
                   },
                   unmatch: function () {
                      for (var i = 0; i < Edit.modules.collection.length; i++) {
                          if(Edit.modules.collection[i].type == 'isoModule'){
                                    //console.log('SET TABLET ISO MODULE')
                                    //Edit.modules.collection[i].instance.tablet();
                                }
                            }
                        }
                    })
                    .register('screen and (max-width:600px)', {
                      match: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if(Edit.modules.collection[i].type == 'isoModule'){
                               Edit.modules.collection[i].instance.relayout();
                           }
                       }
                   },
                   unmatch: function () {
                      for (var i = 0; i < Edit.modules.collection.length; i++) {
                          if(Edit.modules.collection[i].type == 'isoModule'){
                           Edit.modules.collection[i].instance.relayout();
                       }
                   }
               }
           })
                    .register('screen and (max-width:500px) and (min-width:361px)', {
                      match: function () {
                          for (var i = 0; i < Edit.modules.collection.length; i++) {
                              if(Edit.modules.collection[i].type == 'isoModule'){
                               // //console.log('Mobile');
                               Edit.modules.collection[i].instance.mobile();
                               Edit.modules.collection[i].instance.filtersDist = 60;
                               Edit.modules.collection[i].instance.changeFiltersPos();
                           }
                       }
                   },
                   unmatch: function () {
                      for (var i = 0; i < Edit.modules.collection.length; i++) {
                          if(Edit.modules.collection[i].type == 'isoModule'){
                           Edit.modules.collection[i].instance.smallTablet();
                           Edit.modules.collection[i].instance.filtersDist = 70;
                           Edit.modules.collection[i].instance.changeFiltersPos();
                       }
                   }
               }
           })
                    .register('screen and (max-width:360px)', {
                       match: function () {
                        for (var i = 0; i < Edit.modules.collection.length; i++) {
                            if(Edit.modules.collection[i].type == 'isoModule'){
                                //console.log('smallmobile');
                                Edit.modules.collection[i].instance.mobile();
                                Edit.modules.collection[i].instance.filtersDist = 60;
                                Edit.modules.collection[i].instance.changeFiltersPos();
                            }
                        }
                    },
                    unmatch: function () {
                        for (var i = 0; i < Edit.modules.collection.length; i++) {
                            if(Edit.modules.collection[i].type == 'isoModule'){
                                Edit.modules.collection[i].instance.smallTablet();
                                Edit.modules.collection[i].instance.filtersDist = 70;
                                Edit.modules.collection[i].instance.changeFiltersPos();
                            }
                        }
                    }
                });
                }
            }

        },
        postpone: function () {
            Edit.modules.isoModuleResponsive.waiter = window.setTimeout(function () {
                Edit.modules.isoModuleResponsive.init();
            }, 20);
        }
    },
    homeSlider: function (elemClass) {
        this.elemClass = elemClass;
        this.elem = $('.slider' + this.elemClass);
        this.imageLoader = void 0;
        this.waiter = void 0;
        this.init = function () {
            var _this = this;
            if (!Edit.inited) {
                _this.postpone();
            } else {
                window.clearTimeout(_this.waiter);
                _this.imageloader = _this.elem.waitForImages(function () {
                    //console.log('LOADED SLIDER -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                    _this.elem.massiveStrip();
                });
            }
        };
        this.postpone = function () {
            var _this = this;
            this.waiter = window.setTimeout(function () {
                _this.init();
            }, 20);
        };
        this.destroy = function () {
            var _this = this;
            _this.elem.remove();
        };
        this.init();
    },
    homeMediaSlider: function (elemClass) {
        this.elemClass = elemClass;
        this.elem = $('.slider' + this.elemClass);
        this.init = function () {
            var _this = this;
            if (!Edit.inited) {
                _this.postpone();
            } else {
                window.clearTimeout(_this.waiter);
                _this.imageloader = _this.elem.waitForImages(function () {
                    //console.log('LOADED MEDIA SLIDER -> '+_this.elemClass);
                    $.event.trigger({
                        type: Edit.events.MODULE_LOADED
                    });
                    _this.elem.massiveStrip();
                });
            }
        };
        this.postpone = function () {
            var _this = this;
            this.waiter = window.setTimeout(function () {
                _this.init();
            }, 20);
        };
        this.destroy = function () {
            var _this = this;
            _this.elem.remove();
        };
        this.init();
    },
    mapModule: function (elemClass, locationsArr) {
        this.inited = false;
        this.elem = $(elemClass);
        this.defaultPosition = void 0;
        this.defaulOptions = {};
        this.mapObj = void 0;
        this.defaultMarker = void 0;
        this.searchBox = void 0;
        this.locations = locationsArr;
        this.locationBtns = void 0;
        this.activeLocation = void 0;
        this.currentPlace = void 0;
        this.waiter = 0;
        this.init = function () {
            var _this = this;
            var hash = location.hash;
            if (!Edit.inited) {
                _this.postpone();
            } else {
                window.clearTimeout(_this.waiter);
                $(window).trigger(Edit.events.MODULE_LOADED);
                $(window).on('resize',function(){_this.recenter();});
                //console.log(_this.locations[0]);
                _this.defaultPosition = new google.maps.LatLng(_this.locations[0].location.lat, _this.locations[0].location.lng);
                _this.activeLocation = _this.defaultPosition;
                //console.log(_this.activeLocation);
                _this.defaulOptions = {
                    zoom: 15,
                    center: _this.defaultPosition,
                    scrollwheel: false,
                    draggable: false,
                    disableDefaultUI: true,
                    styles: [{ 'featureType': 'landscape.natural.terrain', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#b6f04a' }] }, { 'featureType': 'landscape.natural.landcover', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#bdbdbd' }] }, { 'featureType': 'landscape.man_made', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#c0c0c0' }] }, { 'featureType': 'landscape.natural', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#dbdbdb' }] }, { 'featureType': 'poi', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#cccccc' }] }, { 'featureType': 'road', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#edc915' }] }, { 'featureType': 'water', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#b0b0b0' }] }, { 'featureType': 'administrative', 'elementType': 'labels.text.fill', 'stylers': [{ 'color': '#ffffff' }] }, { 'featureType': 'administrative', 'elementType': 'labels.text.stroke', 'stylers': [{ 'color': '#000000' }] }, { 'featureType': 'water', 'elementType': 'labels.text.fill', 'stylers': [{ 'color': '#ffffff' }] }, { 'featureType': 'road.local', 'elementType': 'geometry.fill', 'stylers': [{ 'color': '#cccccc' }] }]
                };
                _this.mapObj = new google.maps.Map(document.getElementById('map-canvas'), _this.defaulOptions);
                var input = document.getElementById('directions-input');
                var control = document.getElementById('directions-interface');
                _this.mapObj.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(control);
                _this.searchBox = new google.maps.places.Autocomplete(input, {
                    componentRestrictions: { country: 'pt' }
                });
                _this.searchBox.bindTo('bounds', _this.mapObj);

                _this.createMarkers();

                //Binds
                _this.locationBtns = $('.map-nav .map-block');
                _this.locationBtns.find('a').on('click',function(e){
                    e.stopPropagation();
                });
                _this.locationBtns.on('click', function (e) { _this.onLocationBtnClickHandler(e); });
                $('#directions-input').on('focus', _this.onSearchFocusHandler);
                $('#directions-input').on('blur', _this.onSearchBlurHandler);
                $('#directions-input').on('keyup', function(e){_this.onSearchKeyHandler(e);});
                google.maps.event.addListener(_this.searchBox, 'place_changed', function (data) { _this.onPlaceChangedHandler(_this); });
                if (hash != '') {
                    hash = hash.split('#');
                    hash = hash[1];
                    var map = hash.split('?');
                    map = map[0];
                    var loc = hash.split('?');
                    loc = loc[1];
                    if(map == 'map'){
                        var mapPosition = _this.elem.position().top;
                        Edit.topOffset = mapPosition - 250;
                        var locationV = loc.split('=');
                        locationV = locationV[1];
                        _this.locationBtns.eq(locationV).trigger('click');
                    }
                }
            }
        };
        
        this.postpone = function () {
          var _this = this;
          _this.waiter = window.setTimeout(function () {
              _this.init();
          }, 20);
      };
      this.onLocationBtnClickHandler = function (e) {
        var _this = this;
        var el = $(e.currentTarget);
            //e.preventDefault();
            var locationTo = $(el).data('location');
            _this.locationBtns.removeClass('active');

            var locations = _this.locations;
            //console.log(locations)
            for (var i = 0; i < locations.length; i++) {
                if (locations[i].id == locationTo) {
                    //console.log(typeof locations[i].id);
                    //console.log(typeof locationTo);
                    //console.log(locations[i].id == locationTo);
                    //console.log(locations[i].id == locationTo);

                    $(el).addClass('active');
                    var ltlng = new google.maps.LatLng(locations[i].location.lat, locations[i].location.lng);

                    _this.mapObj.setCenter(ltlng);
                    _this.activeLocation = ltlng;
                    _this.updateDestination();
                }
            }
        };
        this.createMarkers = function () {
          var _this = this;
          var locations = _this.locations;
          for (var i = 0; i < locations.length; i++) {
              var mapLocation = locations[i].location;
              var marker = new google.maps.Marker({
                  position: new google.maps.LatLng(mapLocation.lat, mapLocation.lng),
                  map: _this.mapObj,
                  icon: {
                      url: GLOBAL_URL + '/images/assets/svg/map-marker.svg',
                      size: new google.maps.Size(50, 70),
                      origin: new google.maps.Point(0, 0),
                      anchor: new google.maps.Point(25, 70)
                  }
              });
          }
      };
      this.onSearchKeyHandler = function (e) {
          var _this = this;
          var el = $(e.target);
          var keyCode = e.keyCode;
          var directionsBtn = $('#directions-interface .directions-btn');
          if (keyCode == 13) {

              var url = 'https://maps.google.com?saddr=' + el.val() + '&daddr=' + _this.activeLocation;
              directionsBtn.attr('onclick', 'window.open("' + url + '")');
              window.open('' + url + '');
          }
      };
      this.onSearchFocusHandler = function () {
          var directionsBtn = $('#directions-interface .directions-btn');
          directionsBtn.addClass('active');
      };
      this.onSearchBlurHandler = function () {
          var directionsBtn = $('#directions-interface .directions-btn');
          directionsBtn.removeClass('active');
      };
      this.onPlaceChangedHandler = function (inst) {
          var _this = inst;
          var directionsBtn = $('#directions-interface .directions-btn');
            //directionsBtn.removeClass('active');
            directionsBtn.attr('onclick', '');
            var place = _this.searchBox.getPlace();
            if (!place.geometry) {
              return;
          } else {
              _this.currentPlace = place.geometry.location;
              var url = 'https://maps.google.com?saddr=' + place.formatted_address + '&daddr=' + _this.activeLocation;
              directionsBtn.attr('onclick', 'window.open("' + url + '")');
                //directionsBtn.addClass('active');
            }

        };
        this.updateDestination = function () {
          var _this = this;
          var directionsBtn = $('#directions-interface .directions-btn');
          var url = 'https://maps.google.com?saddr=' + _this.currentPlace + '&daddr=' + _this.activeLocation;

          if (!_this.currentPlace) {
              return;
          } else {
              directionsBtn.attr('onclick', 'window.open("' + url + '")');
          }


      };
      this.recenter = function () {
          var _this = this;
          _this.mapObj.panTo(_this.activeLocation);
      };
      this.destroy = function () {
        var _this = this;
        _this.elem.remove();
    };
    this.init();
},
filtersModule: function (elemClass, endpoint) {
    this.filters = [];
    this.el = $('.filters-holder' + elemClass);
    this.filtersElems = void 0;
    this.anyFilter = false;
    this.endpoint = endpoint;
    this.hasFilters = false;
    this.tempObj = void 0;
    this.mobileTimer = void 0;
    this.destroyed = false;
    this.init = function () {
        var _this = this;
        _this.filtersElems = _this.el.find('.filter');
        _this.filtersElems.find('select').multifilter({
            multiselect: false,
            singlecategory: true,
            totalLabelSufix: '',
            totalLabelPrefix: '',
            totalLabelPos: 'before',
        });
        _this.filtersElems.find('select').on('change', function (e) { _this.onFiltersChangeHandlerAndLoad(e); });
        Edit.filterObj = (function () {
            var obj = {};
            _this.filtersElems.find('select').each(function () {
                var name = $(this).attr('name');
                obj[name] = $(this).val();
            });
            return obj;
        }());
        _this.tempObj = (function () {
            var obj = {};
            _this.filtersElems.find('select').each(function () {
                var name = $(this).attr('name');
                obj[name] = $(this).val();
            });
            return obj;
        }());
        Edit.filtered = true;
        for (var i = 0; i < Edit.modules.collection.length; i++) {
            if (Edit.modules.collection[i].type == 'loadMore') {
                Edit.modules.collection[i].instance.checkPages();
            }
        }
        _this.el.parent().find('.filters-holder .responsive-header').on('click', function () {
            _this.el.parent().find('.filters-holder').removeClass('active');
            _this.mobileTimer = window.setTimeout(function(){
                _this.el.parent().find('.filters-holder').css('display', 'none');
            },300);
            if(_this.checkFilters()){
                _this.el.find('.modal-btn.clear').removeClass('disabled');
                _this.el.find('.modal-btn.okay').removeClass('disabled');
            }else{
                _this.el.find('.modal-btn.clear').addClass('disabled');
                _this.el.find('.modal-btn.okay').addClass('disabled');
            }
        });
        _this.el.parent().find('.filter-btn').on('click', function () {
            _this.el.parent().find('.filters-holder .responsive-header').addClass('active');
            _this.el.parent().find('.filters-holder').css('display', 'block');
            _this.mobileTimer = window.setTimeout(function(){
                _this.el.parent().find('.filters-holder').addClass('active');
            },100);
            var origin = _this.el.find('.responsive-header').outerHeight(true);
            if(_this.checkFilters()){
                _this.el.find('.modal-btn.clear').removeClass('disabled');
                _this.el.find('.modal-btn.okay').removeClass('disabled');
            }else{
                _this.el.find('.modal-btn.clear').addClass('disabled');
                _this.el.find('.modal-btn.okay').addClass('disabled');
            }
        });
        enquire.register('screen and (max-width:1024px)',{
            match:function(){
                if(_this.destroyed){
                    return;
                }
                _this.setMobile();
            },
            unmatch:function(){
                if(_this.destroyed){
                    return;
                }
                _this.unsetMobile();
            }
        });
    };
    this.setMobile = function(){
        var _this = this;
        var filters = _this.el.find('.filter');
        var gridCont = $(_this.el.find('.grid-cont')[0]);
        _this.el.find('.modal-btn.okay').on('click',function(e){
            if($(this).hasClass('disabled')){
                _this.el.parent().find('.filters-holder').css('display', 'none');
            }else{
                _this.el.parent().find('.filters-holder').css('display', 'none');
                if(_this.anyFilter || _this.hasFilters) {_this.loadContentPage();}
            }
        });
        _this.el.find('.modal-btn.clear').on('click',function(e){
            filters.each(function(index){
                var el = $(this);
                _this.anyFilter = false;
                el.find('select').data('plugin_multifilter').setActive(0);
            });
        });
        filters.find('select').off('change');
        filters.find('select').on('change', function (e) { _this.onFiltersChangeHandler(e); });
        gridCont.before(filters);
    };
    this.unsetMobile = function(){
        var _this = this;
        var filters = _this.el.find('.filter');
        var gridCont = $(_this.el.find('.grid-cont')[0]);
        _this.el.attr('style','');
        if(JSON.stringify(_this.tempObj) !== JSON.stringify(Edit.filterObj)){
            _this.loadContentPage();
        }
        filters.find('select').off('change');
        filters.find('select').on('change', function (e) { _this.onFiltersChangeHandlerAndLoad(e); });
        gridCont.append(filters);
    };
    this.onFiltersChangeHandler = function (e) {
        var el = $(e.currentTarget);
        var _this = this;
        if (Edit.filterObj.hasOwnProperty(el.attr('name'))) {
            Edit.filterObj[el.attr('name')] = el.val();
            Edit.contentPagenumber = 1;
                //if(el.val() != 0){
                    if(_this.checkFilters()){
                        _this.el.find('.modal-btn.clear').removeClass('disabled');
                        _this.el.find('.modal-btn.okay').removeClass('disabled');
                    }else if(!_this.hasFilters){
                        _this.el.find('.modal-btn.clear').addClass('disabled');
                        _this.el.find('.modal-btn.okay').addClass('disabled');
                    }
                    _this.checkFilters();
                //}
                
            } else {
                throw new ModuleError('No filter exists with the name provided: ' + el.attr('name')).toString();
            }

        };
        this.checkFilters = function(){
            var _this = this;
            var filters = _this.filtersElems.find('select');
            var filtered = false;
            filters.each(function(index){
                var el = $(this);
                if(Edit.filterObj.hasOwnProperty(el.attr('name')) && !filtered){
                    if(Edit.filterObj[el.attr('name')] == '0'){
                        _this.anyFilter = false;
                        filtered = false;
                    }else{
                        _this.anyFilter = true;
                        filtered= true;
                        return filtered;
                    }
                }
                if(index == filters.length-1){
                    _this.anyFilter = filtered;
                    return filtered;
                }
            });
            return filtered;
        };
        this.onFiltersChangeHandlerAndLoad = function (e) {
            var el = $(e.currentTarget);
            var _this = this;
            if (Edit.filterObj.hasOwnProperty(el.attr('name'))) {
                Edit.filterObj[el.attr('name')] = el.val();
                Edit.contentPagenumber = 1;
                _this.anyFilter = true;
                _this.loadContentPage();

            } else {
                throw new ModuleError('No filter exists with the name provided: ' + el.attr('name')).toString();
            }
        };
        this.loadContentPage = function () {
            var _this = this;
            var urlData = {};
            $('.logo').addClass('loading');

            //$.mockjax.clear();
            if (Edit.filtered) {
                urlData.pagenumber = Edit.contentPagenumber;
                for (var filter in Edit.filterObj) {
                    urlData[filter] = Edit.filterObj[filter];
                }

            }
            if(_this.checkFilters()){
                _this.hasFilters = true;
            }else{
                _this.hasFilters = false;
            }
            if (!Edit.contentPageLoading) {
                Edit.contentPageLoading = true;
                $.ajax({
                    url: _this.endpoint,
                    data: urlData,
                    method: 'POST',
                    success: function (data) { _this.successCallback(data); },
                    error: _this.errorCallback
                });
            }

        };
        this.successCallback = function (result) {
            var _this = this;
            _this.el.find('.load-more-btn').removeClass('loading');
            Edit.contentPageLoading = false;
            Edit.contentPagenumber = 1;
            
            _this.tempObj = (function () {
                var obj = {};
                _this.filtersElems.find('select').each(function () {
                    var name = $(this).attr('name');
                    obj[name] = '0';
                });
                return obj;
            }());
            $('.logo').removeClass('loading');
            if (Edit.filtered) {
                for (var i = 0; i < Edit.modules.collection.length; i++) {
                    if (Edit.modules.collection[i].type == 'isoModule') {
                        Edit.modules.collection[i].instance.clear();
                        Edit.modules.collection[i].instance.append(result);
                        //console.log(result);
                        for (var j = 0; j < Edit.modules.collection.length; j++) {
                            if (Edit.modules.collection[j].type == 'loadMore') {
                                Edit.modules.collection[j].instance.checkPages();
                            }
                        }
                    }
                }
            }
        };
        this.errorCallback = function () {
            //console.log('errorCallback');
        };
        this.destroy = function () {
            var _this = this;
            _this.el.remove();
            _this.destroyed = true;
            Edit.filtered = false;
        };
        this.init();
    },
    loadMore: function (elemClass, isInfinite, endpoint) {
        this.isInfinite = isInfinite;
        this.waypoint = void 0;
        this.inited = false;
        this.el = $(elemClass);
        this.endpoint = endpoint;
        this.init = function () {
            var _this = this;
            this.inited = true;
            if (_this.isInfinite) {
                _this.waypoint = new Waypoint({
                    element: _this.el[0],
                    handler: function (direction) {
                        if (direction === 'down') {
                            if (Edit.contentPagenumber < Edit.contentTotalpages) {
                                _this.el.find('.load-more-btn').addClass('loading');
                                _this.loadContentPage();
                            }
                        }
                    },
                    offset: 'bottom-in-view'
                });
            } else {
                _this.el.find('.load-more-btn').on('click', function () {
                    if (Edit.contentPagenumber < Edit.contentTotalpages) {
                        _this.el.find('.load-more-btn').addClass('loading');
                        _this.loadContentPage();
                    }
                });
            }

            this.checkPages();
            Waypoint.refreshAll();
        };
        this.checkPages = function () {
            if (Edit.contentTotalpages <= 1 || Edit.contentPagenumber == Edit.contentTotalpages) {
                this.el.hide();
            } else {
                this.el.show();
                Waypoint.refreshAll();
            }
        };
        this.loadContentPage = function () {
            var _this = this;
            var urlData = {};
            //$.mockjax.clear();
            if (Edit.filtered) {
                urlData.pagenumber = Edit.contentPagenumber + 1;
                for (var filter in Edit.filterObj) {
                    urlData[filter] = Edit.filterObj[filter];
                }

            } else {
                urlData.pagenumber = Edit.contentPagenumber + 1;
            }
            if (!Edit.contentPageLoading) {
                Edit.contentPageLoading = true;
                $.ajax({
                    url: _this.endpoint,
                    data: urlData,
                    method: 'POST',
                    success: function (data) { _this.successCallback(data); },
                    error: _this.errorCallback
                });
            }

        };
        this.successCallback = function (result) {
            var _this = this;
            var i;
            _this.el.find('.load-more-btn').removeClass('loading');

            Edit.contentPageLoading = false;
            Edit.contentPagenumber++;
            this.checkPages();
            
            if (Edit.filtered) {
                for (i = 0; i < Edit.modules.collection.length; i++) {
                    if (Edit.modules.collection[i].type == 'isoModule') {
                        Edit.modules.collection[i].instance.append(result);
                        Waypoint.refreshAll();
                    }
                }
            }
            for (i = 0; i < Edit.modules.collection.length; i++) {
                if (Edit.modules.collection[i].type == 'goTop') {
                    Edit.modules.collection[i].instance.checkScroll();
                }
            }
        };
        this.errorCallback = function () {

        };
        this.destroy = function () {
            var _this = this;
            _this.inited = false;
            if (_this.isInfinite) {
                _this.waypoint.destroy();
            }

        };
        this.init();
    },
    smallHeader: function (elemClass) {
        this.elem = $(elemClass);
        this.imagesLoaded = false;
        this.waiter = void 0;
        this.init = function () {
            var _this = this;
            if (!Edit.inited) {
                _this.postpone();
            } else {
                window.clearTimeout(_this.waiter);
                if (!_this.imagesLoaded) {
                    _this.elem.waitForImages(function () {
                        _this.imagesLoaded = true;
                        _this.elem.find('.header-item').addClass('active');
                        //console.log('Loaded SmallHeader -> '+_this.elemClass);
                        $(window).trigger(Edit.events.MODULE_LOADED);
                    });
                } else {
                    //console.log('Loaded SmallHeader -> '+_this.elemClass);
                    $(window).trigger(Edit.events.MODULE_LOADED);
                }
            }
        };
        this.postpone = function () {
            var _this = this;
            _this.waiter = window.setTimeout(function () {
                _this.init();
            }, 20);
        };
        this.destroy = function () {
            var _this = this;
            _this.elem.remove();
        };
        this.init();
    },
    windowpop: function (url, width, height) {
        var leftPosition, topPosition;
        //Allow for borders.
        leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
        //Allow for title and status bars.
        topPosition = (window.screen.height / 2) - ((height / 2) + 50);
        //Open the window.
        window.open(url, 'Window2', 'status=no,height=' + height + ',width=' + width + ',resizable=yes,left=' + leftPosition + ',top=' + topPosition + ',screenX=' + leftPosition + ',screenY=' + topPosition + ',toolbar=no,menubar=no,scrollbars=no,location=no,directories=no', '_blank');
    },
    sharebtns: function () {
        var _this = $(this);
        _this.on('click', function (e) {
            e.preventDefault();
            var _href = $(this).attr('href');
            Edit.modules.windowpop(_href, 600, 400);
        });
    },
    shareLightbox: function (elemClass) {
        this.elem = $(elemClass);
        //console.log(this.elem);
        this.lightbox = $('.shareLightbox');
        this.btnClose = this.lightbox.find('.btn-close');

        this.init = function () {
            var _this = this;

            _this.elem.on('click', function () {
                _this.lightbox.css({ 'z-index': '10000' });
                TweenMax.to(_this.lightbox, 0.3, { opacity: '1', ease: Linear.easeNone });
            });
            _this.btnClose.on('click', function () {

                TweenMax.to(_this.lightbox, 0.3, {
                    opacity: '0', ease: Linear.easeNone, onComplete: function () {
                        _this.lightbox.css({ 'z-index': '-1' });
                    }
                });
            });
            $('.share-content a').addClass('no-route');
            //Edit.modules.sharebtns('.share-content a');
        };
        this.destroy = function () {
            this.elem.remove();
        };
        this.init();
    },
    radialGraph: function (elemClass, svgClass) {

        this.elem = $(elemClass);
        this.svg = this.elem.find(svgClass);
        this.waiter = void 0;
        this.init = function () {
            var _this = this;
            var length;
            if (!Edit.inited) {
                _this.postpone();
            } else {
               window.clearTimeout(_this.waiter);
               var radialModule = $('.js-radialmodule');
               if(radialModule.length>0){
                  this.isWaypoint = new Waypoint({
                    element: radialModule,
                    handler: function (direction) {
                     if (_this.svg.length > 0) {
                       length = _this.svg[0].getTotalLength();
                   } else {
                       length = 0;
                   }
                   _this.svg.css({
                    'stroke-dasharray': length,
                    'stroke-dashoffset': length
                });
                   var total = $('.total').data('total');
                   _this.svg.each(function (index) {
                    var this_hours = $(_this.elem[index]).data('hours');
                    var strokeDashArray = length * this_hours / total;
                    strokeDashArray = length - strokeDashArray;
                    var deg = this_hours * 360 / total;
                    $(this).animate({ 'stroke-dashoffset': strokeDashArray, 'stroke-dasharray': length }, { duration: 3000, easing: 'easeOutExpo' });
                    if ($('.content-circle').length > 0) {
                        $('.content-circle').eq(index).css({ 'transform': 'rotate(' + (134) + 'deg)' }).animateRotate((134 + deg), {
                            duration: 3000,
                            easing: 'easeOutExpo',
                            start: function () {
                                $('.radial-svg').addClass('animate');
                            }
                        });
                    }
                });
                   this.destroy();
               },
               offset: '55%'
           });
              }

          }
      };
      this.postpone = function () {
          var _this = this;
          _this.waiter = window.setTimeout(function () {
              _this.init();
          }, 20);
      };
      this.destroy = function () {
        this.elem.remove();
    };
    this.init();
},
radialGraph2: function (elemClass, svgClass) {
    this.elem = $(elemClass);
    this.svg = this.elem.find(svgClass);
    this.waiter = void 0;
    var length;
    this.init = function () {
        var _this = this;
        if (!Edit.inited) {
            _this.postpone();
        } else {
           window.clearTimeout(_this.waiter);
           var radialModule = $('.js-radialmodule2');
           if(radialModule.length>0){
              this.isWaypoint = new Waypoint({
                element: radialModule,
                handler: function (direction) {
                  if (_this.svg.length > 0) {
                     length = _this.svg[0].getTotalLength();
                 } else {
                     length = 0;
                 }
                 _this.svg.css({
                    'stroke-dasharray': length,
                    'stroke-dashoffset': length
                });
                 var total = $('.total').data('total');
                 _this.svg.each(function (index) {
                    var this_hours = $(_this.elem.find('.graph')[index]).data('hours');
                    var strokeDashArray = length * this_hours / total;
                    strokeDashArray = length - strokeDashArray;
                    var deg = this_hours * 360 / total;
                    $(this).animate({ 'stroke-dashoffset': strokeDashArray, 'stroke-dasharray': length }, { duration: 3000, easing: 'easeOutExpo' });
                    if ($('.content-circle-js').length > 0) {
                        $('.content-circle-js').eq(index).css({ 'transform': 'rotate(' + (134) + 'deg)' }).animateRotate((134 + deg), {
                            duration: 3000,
                            easing: 'easeOutExpo',
                            start: function () {
                                $('.radial-svg-workshop').addClass('animate');
                            }
                        });
                    }

                });
                 this.destroy();
             },offset: '55%' });
          }
      }
  };
  this.postpone = function () {
      var _this = this;
      _this.waiter = window.setTimeout(function () {
          _this.init();
      }, 20);
  };
  this.destroy = function () {
    this.elem.remove();
};
this.init();
},
animateChart: function (elemClass, svgClass) {
    this.elem = $(elemClass);
    this.svg = this.elem.find(svgClass);
    this.waiter = void 0;
    this.init = function () {
        var _this = this;
        if (!Edit.inited) {
            _this.postpone();
        } else {
           window.clearTimeout(_this.waiter);
           var chartUX = jQuery('.graph-js:eq(0)');
                if(chartUX.length>0){
                this.isWaypoint = new Waypoint({
                    element: chartUX,
                    offset: '70%',
                    handler: function(direction) {
                    animateUxChart();
                    jQuery(chartUX).find('.texto-js').addClass('fadeIn');
                    this.destroy();
                    }
                })
            }
            var chartUI = jQuery('.graph-js:eq(1)');
            if(chartUI.length>0){
            this.isWaypoint = new Waypoint({
                element: chartUI,
                offset: '70%',
                handler: function(direction) {
                animateUiChart();
                jQuery(chartUI).find('.texto-js').addClass('fadeIn');
                this.destroy();
                }
            })
            }

      }
  };
  this.postpone = function () {
      var _this = this;
      _this.waiter = window.setTimeout(function () {
          _this.init();
      }, 20);
  };
  this.destroy = function () {
    this.elem.remove();
};
this.init();
},

swiperHome: function (elemClass) {
    this.elem = $(elemClass);
    this.waiter = void 0;
    this.init = function () {
        var _this = this;
        if (!Edit.inited) {
            _this.postpone();
        } else {
           window.clearTimeout(_this.waiter);
           var swiperSlider = $('.profissoes-slider');
           
           if(swiperSlider.length>0){
            var swiper = new Swiper(swiperSlider, {
                disableOnInteraction: false,
                autoplay: {
                    delay: 3000,
                },
                effect: 'coverflow',
                initialSlide: 1,
                loop: true,
                centeredSlides: true,
                keyboard: true,
                spaceBetween: 0,
                slidesPerView: "auto",
                watchSlidesVisibility: true,
                speed: 300,
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 0,
                    modifier: 3,
                    slideShadows: false
                },
                breakpoints: {
                    480: {
                        spaceBetween: 0,
                        centeredSlides: true,
                        autoplay: false
                    }
                },
                pagination: {
                    el: '.profissoes-slider__pagination',
                    clickable: true
                },
                on: {
                    init: function () {
                        jQuery('.swiper-slide-active').addClass('active');

                        if(jQuery(window).width() > 800) {
                                

                                var profissoesItem = document.querySelectorAll('.profissoes-slider__item');
                                profissoesItem.forEach(function (element) {
                                    element.addEventListener('mouseover', function () {
                                        jQuery('.swiper-slide-active').removeClass('active');
                                        jQuery(element).addClass('active');
                                        
                                    });
                        
                                    element.addEventListener('mouseleave', function () {
                                        jQuery(element).removeClass('active');
                                    });
                                });
                        }
                    }
                }
            });

            $(swiperSlider).hover(function(){
                swiper.autoplay.stop();	
            }, function(){
                swiper.autoplay.start();	
            });
            
            swiper.on('touchEnd', function () {
                jQuery('.swiper-slide-active').addClass('active');
            });
            
            swiper.on('slideChange', function () {
                jQuery('.swiper-slide-active').removeClass('active');
            });
            
            swiper.on('slideChangeTransitionEnd', function () {
                jQuery('.swiper-slide-active').addClass('active');
            });
          }
      }
  };
  this.postpone = function () {
      var _this = this;
      _this.waiter = window.setTimeout(function () {
          _this.init();
      }, 20);
  };
  this.destroy = function () {
    this.elem.remove();
};
this.init();
},
slickProfissoes: function (elemClass) {
    this.elem = $(elemClass);
    this.waiter = void 0;
    this.init = function () {
        var _this = this;
        if (!Edit.inited) {
            _this.postpone();
        } else {
           window.clearTimeout(_this.waiter);
         
           var slickSlider = jQuery('#slick-slider');
           if(slickSlider.length>0){
            jQuery(slickSlider).slick({
             dots: false,
             infinite: true,
             autoplay: true,
             autoplaySpeed: 1500,
             speed: 800,
             slidesToShow: 1,
             nextArrow: '<i class="fa fa-chevron-right slick-next"></i>',
             prevArrow: '<i class="fa fa-chevron-left slick-prev"></i>',
           });
          }
        
      }
  };
  this.postpone = function () {
      var _this = this;
      _this.waiter = window.setTimeout(function () {
          _this.init();
      }, 20);
  };
  this.destroy = function () {
    this.elem.remove();
};
this.init();
},
slickProfissoes2: function (elemClass) {
    this.elem = $(elemClass);
    this.waiter = void 0;
    this.init = function () {
        var _this = this;
        if (!Edit.inited) {
            _this.postpone();
        } else {
           window.clearTimeout(_this.waiter);
         
          var slickSlider2 = jQuery('#slick-slider2');
          if(slickSlider2.length>0){
            jQuery(slickSlider2).slick({
             dots: true,
             infinite: true,
             autoplay: true,
             autoplaySpeed: 1500,
             speed: 800,
             slidesToShow: 1
           });
          }
        
      }
  };
  this.postpone = function () {
      var _this = this;
      _this.waiter = window.setTimeout(function () {
          _this.init();
      }, 20);
  };
  this.destroy = function () {
    this.elem.remove();
};
this.init();
},
formModal: function (elemClass, action,type,name) {
    this.elem = $(elemClass);
    this.formEl = this.elem.find('form');
    this.formType = type;
    this.formName = name;
    this.scrollWrapper = this.elem.find('.wrapper');
    this.paneScroll = this.scrollWrapper.find('.pane-scroll');
    this.contentControls = this.elem.find('.content-controls');
    this.bullets = this.contentControls.find('.btn');
    this.nextBtn = this.elem.find('.btn-next');
    this.prevBtn = this.elem.find('.btn-prev');
    this.submitBtn = this.elem.find('.btn-submit');
    this.submitBtnIcon = this.submitBtn.find('.btn-icon');
    this.submitBtnLabel = this.submitBtn.find('.label');
    this.scroller = void 0;
    this.currentStep = 0;
    this.totalSteps = 0;
    this.validator = void 0;
    this.validatedSteps = 0;
    this.canProceed = false;
    this.canRegister = false;
    this.blocked = false;
    this.action = action;
    this.isSending = false;
    this.isWaypoint = void 0;
    this.init = function () {
        var _this = this;

        _this.elem.find('.filter select').multifilter({
            multiselect: false,
            singlecategory: true,
            totalLabelSufix: '',
            totalLabelPrefix: '',
            totalLabelPos: 'before',
        });

        var width = _this.paneScroll.children('.slider-item').length * 100 + '%';
        _this.paneScroll.width(width);
        _this.scroller = new IScroll(_this.scrollWrapper[0], {
            mouseWheel: true,
            preventDefaultException:{
                tagName:/^(INPUT|TEXTAREA|LABEL|BUTTON|SELECT)$/,
                className: /(^|\s)default-btn|multiselect-header|btn-icon|label|submit-icon(\s|$)/
            }
        });

        _this.nextBtn.on('click', function (e) {
            _this.nextHandler(e);
        });
        _this.submitBtn.on('click', function (e) {
            _this.nextHandler(e);
        });


        // Quando abre o form
        $('.block-formacao-info.form-content > div, .open-form').click(function (e) {
            e.preventDefault();
            var el = $(this);
            if (!$('.slider.form').hasClass('js-active')) {
                var formItems = _this.formEl.find('input,textarea,.content-radio,.filters-holder,.editUpload, .btn-gdpr').not('[type="checkbox"],[type="radio"]');
                $('.delete-file-cont').click();
                formItems.attr('style','');
                var sendM = _this.formEl.find('.send-message');
                if(sendM.length>0){
                    sendM.remove();
                }
                _this.submitBtn.attr('style','');
                if(el.hasClass('marcacao')){
                    $('.slider.form #assunto').data('plugin_multifilter').setActive(1);
                }else if(el.parent().hasClass('workshop')){
                    $('.slider.form #assunto').data('plugin_multifilter').setActive(1);
                }else if(el.parent().hasClass('int-workshop')){
                    $('.slider.form #assunto').data('plugin_multifilter').setActive(1);
                }else if(el.hasClass('curso')){
                    $('.slider.form #assunto').data('plugin_multifilter').setActive(0);
                }
                $('.slider.form').css({ 'z-index': '1000000' });
                $('body').addClass('no-scroll');
                TweenMax.to($('.slider.form'), 0.3, {
                    opacity: '1', ease: Linear.easeNone, onComplete: function () {
                        $('.slider.form').addClass('js-active');
                        var tipo = 'Indefinido';
                        var nome = '';
                        if(_this.formEl.attr('id') == 'register-formacao'){
                            tipo = ' de registo de formações';
                        }else if(_this.formEl.attr('id') == 'register-evento'){
                            tipo = ' de registo de eventos';
                        }
                        else if(_this.formEl.attr('id') == 'register-internacional'){
                            tipo = ' de alunos internacional';
                        } else if (_this.formEl.attr('id') == 'register-vaga') {
                            tipo = ' de incricao de vaga';
                        }



                        if(_this.formName !== undefined ){
                            nome = _this.formName;
                        }
                        if (window.ga && ga.create) {
                            ga('send','event', 'Formulário - '+_this.formType, 'Acesso', ''+nome);
                        }

                    }
                });

            }
        });
        // Quando fecha o form
        _this.elem.find('.form-content > div').click(function () {
            if ($('.slider.form').hasClass('js-active')) {
                TweenMax.to($('.slider.form'), 0.3, {
                    opacity: '0', ease: Linear.easeNone, onComplete: function () {
                        $('.slider.form').addClass('js-active');
                        var tipo = 'Indefinido';
                        var nome = '';
                        if(_this.formEl.attr('id') == 'register-formacao'){
                            tipo = ' de registo de formações';
                        }else if(_this.formEl.attr('id') == 'register-evento'){
                            tipo = ' de registo de eventos';
                        }
                        else if(_this.formEl.attr('id') == 'register-internacional'){
                            tipo = ' de alunos internacional';
                        } else if (_this.formEl.attr('id') == 'register-vaga') {
                            tipo = ' de incricao de vaga';
                        }

                        if(_this.formName !== undefined ){
                            nome = _this.formName;
                        }
                        if (window.ga && ga.create) {
                            ga('send','event', 'Formulário - '+_this.formType, 'Fecho', ''+nome);
                        }
                        $('.slider.form').css({ 'z-index': -1 }).removeClass('js-active');
                        $('body').removeClass('no-scroll');
                    }
                });
            }
        });

            //Initiate validation
            _this.validator = _this.formEl.validate({
                errorElement: 'div',
                rules: {
                    'checkbox': {
                        required: true
                    },
                    'checkbox[]': {
                        required: true
                    }
                },
                    // Colocar highlight na checkbox
                    // Using highlight and unhighlight options we can add the error class to the parent ul which can then be selected and styled
                    highlight: function(element, errorClass, validClass) {
                      $(element).addClass(errorClass).removeClass(validClass);
                            // Keeps the default behaviour, adding error class to element but seems to break the default radio group behaviour but the below fixes that
                            $(element).closest('div.checkbox').addClass('erro');
                            // add error class to ul element for checkbox groups and radio inputs
                         //   $(element).closest('div.editUpload').addClass('erro');
                        // add class erro para o input de CV
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass(errorClass).addClass(validClass);
                        // keeps the default behaviour removing error class from elements
                        $(element).closest('div.checkbox').removeClass('erro');
                        // remove error class from ul element for checkbox groups and radio inputs
                      //  $(element).closest('div.editUpload').removeClass('erro');
                        // add class erro para o input de CV
                    },
                    /* não apresentar informação sobre erros */
                    errorPlacement: function (error, element) {

                    } 
                });
            $.extend($.validator.messages, {
                required: 'Campo Obrigatório',
                email: 'Email incorreto',
                numbersonly: 'Introduzir número',
                birthdate: 'Data incorreta'
            });
            this.initValidation();
        };
        this.initValidation = function () {
            var _this = this;
            _this.elem.find('.slider-item').find('input').rules('remove');
            var input = _this.elem.find('.slider-item').find('input');
            input.each(function () {
                var element = $(this);
                var type = element.attr('data-type');
                switch (type) {
                    case 'text':
                    element.rules('add', { required: true });
                    break;
                    case 'email':
                    element.rules('add', {
                        required: true,
                        email: true
                    });
                    break;
                    case 'phone':
                    element.on('keypress',function(e){
                        var key = (e.keyCode ? e.keyCode : e.which);
                        if (!(key >= 48 && key <= 57) && key != 43 && key != 8) {
                            e.preventDefault();
                            return false;
                        } else {
                            var txt = element.val() + String.fromCharCode(key);
                            var count = txt.split("+").length - 1;

                                //tenta colocar + depois do primeiro
                                if (String.fromCharCode(key) == "+" && txt.length > 1)
                                    return false;
                            }
                        });
                    element.rules('add', {
                        // required: true,
                        numbersonly: true,
                        maxlength:14
                    });
                    break;
                    case 'date':
                    element.rules('add', {
                        required: true,
                        birthdate: true
                    });
                    break;
                    case 'file':    
                    $(this).rules('add', {
                        // required: true,
                    });
                    break;
                }
            });
        };
        this.validateStep = function () {
            var _this = this;
            var input = _this.elem.find('.slider-item').find('input');

            input.each(function () {
                _this.validator.element($(this));
            });
            var valid = _this.formEl.valid();
            return valid;
        };
        this.nextHandler = function () {
            var _this = this;
            if (_this.validateStep()) {
                _this.register();
            }
        };
        this.prevHandler = function () {
            var _this = this;
            if (_this.currentStep > 0) {
                if (!_this.blocked) {
                    _this.blocked = true;
                    _this.scroller.scrollToElement($('.slider-item').eq(_this.currentStep - 1)[0], 300, null, true);
                }
            }
        },
        this.register = function () {
          var _this = this;
          if(_this.isSending){
            return;
        }
        _this.formData = (function () {
          var obj = {};
          var input = _this.elem.find('.slider-item').find('input, select, textarea');
          obj.interests = '';
          input.each(function () {
              var element = $(this);
                    //console.log(element.attr('type'));
                    if (element.attr('type') == 'checkbox' || element.attr('type') == 'radio') {
                      if (element.parent().parent().parent().hasClass('interests')) {
                          if (element.is(':checked')) {
                              obj.interests += '' + element.val() + ', ';
                          }
                      }
                      else {
                          obj[element.attr('name')] = $('input[name="' + element.attr('name') + '"]:checked').val();
                      }
                  } else {
                      obj[element.attr('name')] = element.val();
                  }
              });
          return obj;
      }());
        _this.formData.nonce = cursoN;
        _this.formData.action = _this.action;
        _this.submitBtnIcon.addClass('loading');
        _this.submitBtnLabel.text(sending);
        _this.isSending = true;

        $.ajax({
          url: '/edit/wp-admin/admin-ajax.php',
          method: 'post',
          data: _this.formData,
          dataType: 'json',
          success: function () {
            $('body').removeClass('no-scroll');
            _this.submitBtnIcon.removeClass('loading');
            _this.submitBtnIcon.addClass('success');
            _this.submitBtnLabel.text(success);
            var tipo = 'Indefinido';
            var action;
            var nome;
            if(_this.formEl.attr('id') == 'register-formacao'){
               tipo = ' de registo de formações';
               if(window.ga && ga.create) {
                fbq('track', 'Lead');
            }
        }else if(_this.formEl.attr('id') == 'register-evento'){
         tipo = ' de registo de eventos';
         if(window.ga && ga.create) {
            fbq('track', 'Lead');
        }
    }
    else if(_this.formEl.attr('id') == 'register-internacional'){
     tipo = ' de alunos internacional';                         
     if(window.ga && ga.create) {
        fbq('track', 'Lead');
    }

} else if (_this.formEl.attr('id') == 'register-vaga') {
    tipo = ' de inscricao de vaga';
    if(window.ga && ga.create) {
        fbq('track', 'Lead');
    }
}
if (_this.formType == 'workshop' || _this.formType == 'curso' || _this.formType == 'internacional' || _this.formType == 'internacional') {
    action = ' - '+ _this.formData.assunto;
}

if(_this.formName !== undefined ){
    nome = _this.formName;
}

if (window.ga && ga.create) {
    ga('send','event', 'Formulário - '+_this.formType, 'Registo'+action, ''+nome); 
}

_this.submitBtn.before('<div class="send-message" style="opacity:0;height:0;overflow:hidden;position:relative;"><img src="' + GLOBAL_URL + '/images/assets/svg/sent-icon.svg" /><h4>' + form_sucesso + '</div>');
setTimeout(function () {
  var formItems = _this.formEl.find('input,textarea,.content-radio,.filters-holder,.editUpload, .btn-gdpr').not('[type="checkbox"],[type="radio"]');
  var odd = 0;
  formItems.each(function(index){
    var el = $(this);
    var delay = 0.1*index;
    if(odd == 0){
        odd = 1;
        TweenMax.to(el,0.2,{x:-50,opacity:0,delay:delay,ease:Power1.easeOut});
    }else{
        odd = 0;
        TweenMax.to(el,0.2,{x:50,opacity:0,delay:delay,ease:Power1.easeOut});
    }
    if(index == formItems.length-1){
        _this.elem.find('input').not('[type="hidden"],[type="checkbox"],[type="radio"]').val('');
        _this.elem.find('textarea').val('');
        _this.elem.find('input[type="checkbox"]').prop('checked',false);
        TweenMax.to(_this.submitBtn,0.3,{opacity:0,ease:Power1.easeOut});
        setTimeout(function(){
            formItems.css('display','none');
            _this.submitBtn.css('display','none');
            TweenMax.to(_this.formEl.find('.send-message'),0.2,{opacity:1,height:500,ease:Power1.easeOut});
            _this.scroller.scrollToElement($('.slider-item')[0], 800, null, true);
        },delay*1000);
        setTimeout(function() {
            if ($('.slider.form').hasClass('js-active')) {
                TweenMax.to($('.slider.form'), 0.3, {
                    opacity: '0', ease: Linear.easeNone, onComplete: function () {
                        $('.slider.form').css({ 'z-index': -1 }).removeClass('js-active');
                    }
                });
            }
        },delay*5000);
    }
});

  _this.isSending = false;
  _this.cleanBtn();
}, 1000);
},
error: function (response) {
    console.log(response);
  _this.submitBtnIcon.removeClass('loading');
  _this.submitBtnIcon.addClass('fail');
  _this.submitBtnLabel.text('Erro');
  setTimeout(function () {
    _this.isSending = false;
    _this.cleanBtn();
}, 2000);
}
});
    },
    this.destroy = function () {
        if (this.isWaypoint !== undefined) {
            this.isWaypoint.destroy();
        }
        this.elem.remove();
    },
    this.cleanBtn = function () {
        this.submitBtnIcon.removeClass('loading');
        this.submitBtnIcon.removeClass('success');
        this.submitBtnIcon.removeClass('fail');
    },
    this.init();
},
innerNavigation:function(nextLink,prevLink,parentLink){
    this.nextLink = nextLink;
    this.prevLink = prevLink;
    this.parentLink = parentLink;
    this.el = $('#inner-navigation');
    this.nextBtn = $('#inner-navigation .next');
    this.prevBtn = $('#inner-navigation .previous');
    this.closeBtn = $('#inner-navigation .close');
    this.isWaypoint = void 0;

    this.init = function(){
        var wayEl = $('.btn-position-holder');
        if(wayEl.length>0){
            this.isWaypoint = new Waypoint({
                element: wayEl[0],
                offset: '80px',
                handler: function (direction) {
                    if (direction === 'down') {
                        $('.btn-position-holder').addClass('fixed');
                        $('.block-formacao-info.form-content, .open-form').addClass('fix-to-top');
                    }else{
                        $('.btn-position-holder').removeClass('fixed');
                        $('.block-formacao-info.form-content, .open-form').removeClass('fix-to-top');
                    }
                }
            });
        }

        this.el.addClass('active');
        if(nextLink == 'undefined'){
            this.nextBtn.attr('href','');
            this.nextBtn.hide();
        }else{
            this.nextBtn.show();
            this.nextBtn.attr('href',nextLink);
        }

        if(prevLink == 'undefined'){
            this.prevBtn.attr('href','');
            this.prevBtn.hide();
        }else{
            this.prevBtn.show();
            this.prevBtn.attr('href',prevLink);
        }

        this.closeBtn.attr('href',parentLink);
    };
    this.destroy = function(){
       if (this.isWaypoint !== undefined) {
        this.isWaypoint.destroy();
    }
    this.el.removeClass('active');
    this.nextBtn.attr('href','');
    this.prevBtn.attr('href','');
    this.closeBtn.attr('href','');
};
this.init();
},
goTop:function(elemClass){
    this.elem = $(elemClass);
    this.btn = $(elemClass).find('.gotop-btn');
    this.delay = void 0;
    this.rect = void 0;
    this.is = void 0;
    this.checkingTargets = void 0;
    this.clickWaiter = void 0;
    this.locked = false;
    this.init= function(){
        var _this = this;
        _this.checkingTargets = [];
        this.rect = new Rect(_this.elem.offset().top,_this.elem.offset().left,60,146);
        this.is = new AABB(_this.rect);
        Edit.goTop = this;
        _this.btn.on('click',function(e){_this.onClickHandler(e);});
        $(window).on('scroll',function(e){_this.onScrollHandler(e);});
        _this.onScrollHandler();
        enquire
        .register('screen and (max-width:1330px)', {
            match:function(){
                Edit.goTop.lock();
            },
            unmatch:function(){
                Edit.goTop.unlock();
            }
        });
    };
    this.lock = function(){
        var _this = this;
        _this.locked = true;
        _this.btn.removeClass('animate');

        _this.btn.removeClass('click');
        _this.delay = window.setTimeout(function(){
            _this.btn.removeClass('active');
        },300);
    };
    this.unlock = function(){
        var _this = this;
        _this.locked = false;
        _this.onScrollHandler();
    };
    this.onScrollHandler = function(e){

        var _this = this;
        _this.checkScroll();
        _this.rect.set(_this.elem.offset().top,_this.elem.offset().left,60,146);
        _this.is.set(_this.rect);
        for(var i = 0; i<_this.checkingTargets.length;i++){
            if(_this.is.inside(_this.checkingTargets[i].target)){
                if(_this.checkingTargets[i].action == 'invert'){
                    _this.setInvert();
                }
            }else{
                if(_this.checkingTargets[i].action == 'invert'){
                    _this.unsetInvert();
                }
            }
        }
    };
    this.checkScroll = function(){
        var _this = this;
        var scrollPos  = $(window).scrollTop();
        var headerEl = $('.slider').not('.form');
        if(headerEl.length > 1){
            headerEl = $(headerEl[0]);

        }else if(headerEl.length<1){
            headerEl = $('header');
        }
        if(_this.locked){
            return;
        }
        if(scrollPos > (headerEl.height()+200) && (scrollPos + ($(window).height())-$(window).height()/4) < ($(document).height()-$('#footer').outerHeight(true))){
            if(_this.delay !== undefined){
                window.clearTimeout(_this.delay);
            }
            if(_this.clickWaiter !== undefined){
                window.clearTimeout(_this.clickWaiter);
            }
            _this.btn.addClass('active');
            _this.delay = window.setTimeout(function(){
                _this.btn.addClass('animate');
            },100);
        }else{
            if(_this.delay !== undefined){
                window.clearTimeout(_this.delay);
            }
            _this.btn.removeClass('animate');

            _this.btn.removeClass('click');
            _this.delay = window.setTimeout(function(){
                _this.btn.removeClass('active');
            },300);

        }
    };
    this.appendTarget = function(targetEl,action){
        var _this = this;
        _this.checkingTargets.push({target:targetEl,action:action});
    },
    this.removeTarget = function(targetEl){
        var _this = this;
        for(var i = 0;i<_this.checkingTargets.length;i++){
            if(targetEl == _this.checkingTargets[i].target){
                _this.checkingTargets.splice(i,1);
            }
        }
        _this.unsetInvert();

    },
    this.setInvert = function(){
        var _this = this;
        if(!_this.btn.hasClass('invert')){
            _this.btn.addClass('invert');
        }

    },
    this.unsetInvert = function(){
        var _this = this;
        if(_this.btn.hasClass('invert')){
            _this.btn.removeClass('invert');
        }

    },
    this.onClickHandler= function(){
        var _this = this;
        var distance = $(window).scrollTop();
        var dur = _this.getDuration(distance,2000);
        TweenMax.to(window,dur,{scrollTo:{y:0},ease:Power1.easeOut,onComplete:function(){
            _this.btn.removeClass('click');
        }});
        _this.btn.addClass('click');
        _this.clickWaiter = window.setTimeout(function(){
            _this.btn.removeClass('click');
        },dur*1000);
            //_this.btn.delay(dur).removeClass('click')
        },
        this.getDuration = function(distance,pixelsPerSecond){
            var duration = distance / pixelsPerSecond;
            return duration;
        },
        this.destroy = function(){

        },
        this.init();
    },
    courseProgram:function(elemClass){
        this.elem = $(elemClass);
        this.waypointDown = void 0;
        this.waypointDown1 = void 0;
        this.waypointUp = void 0;
        this.rect = void 0;
        this.waiter = void 0;
        this.init = function(){
            var _this = this;
            
            if(!Edit.inited){
                _this.waiter = window.setTimeout(function(){
                    _this.postpone();
                },20);
            }else{
                window.clearTimeout(_this.waiter);
                this.rect = new Rect(_this.elem.offset().top,0,$(window).width(),_this.elem.height());
                
                Edit.goTop.appendTarget(_this.rect,'invert');
            }
            enquire
            .register('screen and (max-width:768px)',{
                match:function(){
                    _this.setMobile();
                },
                unmatch:function(){
                    _this.unsetMobile();
                }
            });
        };
        this.setMobile = function(){
            var _this = this;
            _this.elem.find('.modulo.right .col.graphics:parent').each(function(){
                $(this).insertBefore($(this).prev('.col.text'));
            });
        };
        this.unsetMobile = function(){
            var _this = this;
            _this.elem.find('.modulo.right .col.text:parent').each(function(){
                $(this).insertBefore($(this).prev('.col.graphics'));
            });
        };
        this.postpone = function(){
            this.init();
        };
        this.destroy = function(){
            var _this = this;
            Edit.goTop.removeTarget(_this.rect);
        };
        this.init();
    },
    searchModule:function(elemClass){
        this.elem = $(elemClass);
        this.btn = this.elem.find('.btn-icon');
        this.init = function(){
            var _this = this;
            _this.elem.find('input').on('focus', function () {
                var element = $(this);
                element.parent().find('.btn-icon').addClass('focused');
            });
            _this.elem.find('input').on('blur', function () {
                var element = $(this);
                if(element.val() == ''){
                    element.parent().find('.btn-icon').removeClass('focused');
                }
            });
        };
        this.destroy = function(){

        };
        this.init();
    }
};

})( jQuery );
