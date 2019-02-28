// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
; (function ($, window, document, undefined) {

    "use strict";

    // undefined is used here as the undefined global variable in ECMAScript 3 is
    // mutable (ie. it can be changed by someone else). undefined isn't really being
    // passed in so we can ensure the value of it is truly undefined. In ES5, undefined
    // can no longer be modified.

    // window and document are passed through as local variable rather than global
    // as this (slightly) quickens the resolution process and can be more efficiently
    // minified (especially when both are regularly referenced in your plugin).

    // Create the defaults once
    var pluginName = "multifilter",
            defaults = {
                containerClass: "multifilter-container",
                multiselect: false,
                singlecategory: false,
                totalLabelPrefix: '(',
                totalLabelSufix: ')',
                totalLabelPos: 'after',
                clearLabel: 'Limpar'

            };

    // The actual plugin constructor
    function Plugin(element, options) {
        this.element = element;
        this.contDiv = '';
        this.listCont = '';
        this.extLabel = $(this.element).attr('data-exterior-label');
        this.optGroups = [];
        this.containerClass = '';
        this.totalSelected = 0;
        this.selected = [];
        // jQuery has an extend method which merges the contents of two or
        // more objects, storing the result in the first object. The first object
        // is generally empty as we don't want to alter the default options for
        // future instances of the plugin
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend(Plugin.prototype, {
        init: function () {
            Date.now = Date.now || function () { return +new Date; }; // if Date Obj does not exist create new Date
            this.id = Date.now(); //Get date.now for Identifying  purpose
            var _this = this;
            this.mouseTrigger = false;
            this.scroll = '';
            this.monga = false;
            //Create the Element that will contain the Lists and add the proper class
            this.containerClass = this.settings.containerClass;
            this.contDiv = document.createElement('div');
            this.contDiv = $(this.contDiv);
            this.contDiv.addClass(this.settings.containerClass)
            //This is a work around to the jquery wrap method, this way the element doesn't get cloned
            this.contDiv.insertAfter($(this.element)).append($(this.element))
            //if not iOS Add listeners to the select Element on Focus and Blur to control the opening/closing of the controller, else set all DOM elements with cursor pointer
            // this way all elements can trigger click events (SAY WUT?!);
            if (!is.ios()) {
                $(this.element).on('focus', function () { _this.onSelectElementFocusHandler(this) });

                $(this.element).on('blur', function () {
                    _this.onSelectElementBlurHandler(this)
                });

            } else {
                //$('*').css('cursor', 'pointer');
                this.monga = true;
            }


            this.multi = this.settings.multiselect;
            /*
                Create DOM elements
            */
            this.listCont = document.createElement('div');
            this.listCont = $(this.listCont);
            this.listCont.addClass('lists-container');
            this.listCont.attr('data-expanded', false);
            this.scrollCont = document.createElement('div');
            this.scrollCont = $(this.scrollCont);
            this.scrollCont.addClass('scroll-container');
            this.mainLabel = document.createElement('span');
            this.mainHeader = document.createElement('div');
            this.mainIcon = document.createElement('div');
            this.totalSelectedLabel = document.createElement('span');
            this.totalSelectedLabel = $(this.totalSelectedLabel);
            this.totalSelectedLabel.addClass('multiselect-total-selected');
            this.totalSelectedLabel.text(this.settings.totalLabelPrefix + this.totalSelected + this.settings.totalLabelSufix);
            if ($(this.element).attr('data-ncount-label')) {
                this.totalSelectedLabel.text('');
                this.totalSelectedLabel.css('display', 'none');
            }
            this.mainLabel = $(this.mainLabel);
            this.mainHeaderLabel = $(this.element).attr('data-exterior-label');
            this.mainHeader = $(this.mainHeader);
            this.mainIcon = $(this.mainIcon);
            this.mainHeader.addClass('multiselect-header');
            this.mainLabel.addClass('multiselect-label');
            this.mainIcon.addClass('multiselect-icon');
            this.mainLabel.text($(this.element).attr('data-exterior-label'));
            if (!this.settings.multiselect && this.settings.singlecategory) {
                var option = $(this.element).find('option')[0];
                if ($(option).text() != "Todos") {
                    this.mainLabel.text($(option).text());
                } else {
                    this.mainLabel.text(_this.mainHeaderLabel);
                }
            }

            /*
                Add Event Listener to created elements, and a change event to Select Element
            */
            this.mainHeader.on('click', function (e) { _this.onMainLabelClickHandler(this, e) });
            this.mainHeader.on('mousedown', function () { _this.onMainLabelDownHandler(this) });
            this.listCont.on('mousedown', function () { _this.onMainLabelDownHandler(this) });
            this.mainHeader.on('mouseup', function () { _this.onMainLabelUpHandler(this) });
            this.listCont.on('mouseup', function () { _this.onMainLabelUpHandler(this) });
            this.mainLabel.on('update', this.onTotalUpadeHandler);//Custom Update Event
            //$(this.element).on('change', function () { _this.onSelectChangeHandler(this) });
            this.listCont.append(this.scrollCont);
            this.mainLabel.attr('data-label',$(this.element).attr('data-exterior-label'));
            this.mainHeader.append(this.mainLabel);
            this.mainHeader.append(this.mainIcon);
            this.contDiv.append(this.mainHeader);
            if ((this.settings.multiselect && !this.settings.singlecategory) || (!this.settings.singlecategory && !this.settings.multiselect) || (this.settings.singlecategory && this.settings.multiselect)) {
                if (this.settings.totalLabelPos == 'before') {
                    this.mainHeader.prepend(this.totalSelectedLabel);
                } else {
                    this.mainHeader.append(this.totalSelectedLabel);
                }

            }
            this.contDiv.append(this.listCont);
            this.createLists();

            

        },
        createLists: function () {
            /*
                Creates the lists based on optgroups found in the select, this will work as categories;
            */
            var i = 0;
            var optGroupsTemp = $(this.element).find('optgroup');
            if (this.settings.singlecategory) {
                optGroupsTemp = $(this.element);
            }
            var _this = this;
            for (i = 0; i < optGroupsTemp.length; i += 1) {
                var j = 0;
                /*
                    Create DOM elements
                */
                var optGroupUL = document.createElement('ul'); //The Ul that contaions the options
                var optGroupCont = document.createElement('div'); //The div that contains the category 
                var optGroupContHeader = document.createElement('div'); //The Header of the category
                var optGroupContHeaderIcon = document.createElement('div'); //The icon for the category header (usually a drop icon )
                var optGroupLabel = document.createElement('span'); //The category label
                var optGroupTotalSelected = document.createElement('span'); //The total amount of items selected in the category
                var optGroupOptions = $(optGroupsTemp[i]).find('option');
                var newOptGroupOptions = [];
                var labelText = $(optGroupsTemp[i]).attr('label');
                var optGroupId = this.id + "_" + i;
                var clearListLabel = document.createElement('li');
                var clearListIcon = document.createElement('div');
                var selectedValue = 0;
                clearListIcon = $(clearListIcon);
                clearListIcon.addClass('list-clear-icon');
                clearListLabel = $(clearListLabel);
                clearListLabel.addClass('list-clear');
                if ($(this.element).attr('data-clear-label')) {
                    this.settings.clearLabel = $(this.element).attr('data-clear-label');
                }
                clearListLabel.text(this.settings.clearLabel);
                clearListLabel.append(clearListIcon); //Add icon to clear List item
                optGroupUL = $(optGroupUL);
                optGroupCont = $(optGroupCont);
                optGroupLabel = $(optGroupLabel);
                optGroupTotalSelected = $(optGroupTotalSelected);
                optGroupTotalSelected.addClass('optgroup-total-selected');
                optGroupTotalSelected.text('(' + 0 + ')');
                optGroupCont.addClass('optgroup-container');
                optGroupCont.attr('id', optGroupId);
                optGroupLabel.addClass('optgroup-label');
                optGroupLabel.text(labelText);


                optGroupContHeader = $(optGroupContHeader);
                optGroupContHeader.addClass('optgroup-header');
                optGroupContHeader.attr('data-expanded', false);
                optGroupContHeaderIcon = $(optGroupContHeaderIcon);
                optGroupContHeaderIcon.addClass('optgroup-header-icon');
                optGroupContHeader.on('click', function (e) { _this.onOptGroupLabelClikHandler(this, e) });
                optGroupUL.addClass('optgroup-list');
                clearListLabel.attr('data-optgroup', optGroupId)
                clearListLabel.on('click', function (e) { _this.onListClearClickHandler(this, e) });
                //First item to append on the lisdt is the clear list item.
                if(_this.multi){
                    optGroupUL.append(clearListLabel);
                }
                
                $(optGroupsTemp[i]).attr('data-ref', optGroupId);
                /*
                    For every option found in the optgroup, create a list item
                */
                for (j = 0; j < optGroupOptions.length; j += 1) {
                    var option = this.appendItemToList(optGroupUL, $(optGroupOptions[j]), optGroupId);
                    newOptGroupOptions.push(option);
                    if ($(optGroupOptions[j]).is(':selected')) {
                        selectedValue = $(optGroupOptions[j]).val();
                    }
                }

                optGroupContHeader.append(optGroupLabel);
                optGroupContHeader.append(optGroupTotalSelected);
                optGroupContHeader.append(optGroupContHeaderIcon);
                if (!this.settings.singlecategory) optGroupCont.append(optGroupContHeader);
                optGroupCont.append(optGroupUL);
                this.scrollCont.append(optGroupCont);
                var optGroup = {
                    element: optGroupCont,
                    options: newOptGroupOptions
                }
                this.optGroups.push(optGroup);
                if (i == optGroupsTemp.length - 1) {
                    _this.scroll = new IScroll(_this.listCont[0], {
                        // mouseWheel: true,
                        scrollbars: true,
                        tap: true,
                        click: (function () {
                            if (is.mobile() || is.tablet()) {
                                return true;
                            } else {
                                return false;
                            }
                        }())
                    });
                }

                //sart
                this.markSelectOption(selectedValue, optGroupId);
            }
        },
        appendItemToList: function (list, item, parentId) {
            var itemLi = document.createElement('li');
            var mark = document.createElement('div');
            var itemLabel = document.createElement('span');
            var itemLabelText = item.text();
            var itemValue = item.val();
            var _this = this;
            itemLabel = $(itemLabel);
            mark = $(mark);
            itemLi = $(itemLi);
            mark.addClass('mark');

            itemLabel.text(itemLabelText);
            itemLi.append(itemLabel);

            if ((this.settings.multiselect && this.settings.singlecategory) || (this.settings.multiselect)) itemLi.append(mark);
            itemLi.attr('data-value', itemValue);
            itemLi.attr('data-state', false);
            itemLi.attr('data-optgroup', parentId);
            itemLi.state = false;
            itemLi.on('click', function (e) { _this.onListItemClickHandler(this, e) });
            itemLi.on('change', function () { _this.onSelectionsChangeHandler(this) });
            list.append(itemLi);


            return { item: itemValue, state: false, optgroup: parentId };
        },
        onListItemClickHandler: function (el, event) {
            event.stopPropagation();
            var clickedEl = $(el);
            if (!this.monga) this.element.focus();
            if (clickedEl.attr('data-state') == 'true') {
                clickedEl.attr('data-state', false)
                this.markSelectOption(clickedEl.attr('data-value'), clickedEl.attr('data-optgroup'));
                clickedEl.removeClass('active');
            } else {
                clickedEl.attr('data-state', true);
                this.markSelectOption(clickedEl.attr('data-value'), clickedEl.attr('data-optgroup'));
                clickedEl.addClass('active');
            }
            if (!this.multi) {
                var optGroup = clickedEl.attr('data-optgroup');
                var optGroupEl = $('#' + optGroup);
                var optGroupCount = $('#' + optGroup).find('.optgroup-total-selected');
                var optList = optGroupEl.find('li');

                for (var i = 0; i < optList.length; i++) {
                    if ($(optList[i]).attr('data-state') == 'true' && optList[i] != clickedEl[0]) {
                        $(optList[i]).removeClass('active');
                        $(optList[i]).attr('data-state', false);
                        $(optList[i]).trigger('change');

                    }
                }
            }
            clickedEl.trigger('change');
        },
        onListClearClickHandler: function (el, event) {
            event.stopPropagation();
            var optgroup = $('#' + $(el).attr('data-optgroup'));
            var options = optgroup.find('li').not('.list-clear');
            for (var i = 0; i < options.length; i += 1) {
                if ($(options[i]).attr('data-state') == 'true') {

                    $(options[i]).attr('data-state', false);
                    $(options[i]).removeClass('active');
                    $(options[i]).trigger('change');
                    this.markSelectOption($(options[i]).attr('data-value'), $(options[i]).attr('data-optgroup'))
                }
            }
        },
        onSelectionsChangeHandler: function (el) {
            var changedEl = $(el);
            var optGroup = changedEl.attr('data-optgroup');
            var optGroupEl = $('#' + optGroup);
            var optGroupCount = $('#' + optGroup).find('.optgroup-total-selected');
            var optList = optGroupEl.find('li');
            var count = 0;
            var _this = this;
            for (var i = 0; i < optList.length; i += 1) {
                if ($(optList[i]).attr('data-state') == 'true') {
                    count += 1;
                    this.selected.push($(optList[i]));
                } else {

                }
                if (i == optList.length - 1) {
                    optGroupCount.text('(' + count + ')');
                    if (count >= 1) {
                        var listClear = optGroupEl.find('.list-clear');
                        if ((_this.settings.multiselect && !_this.settings.singlecategory) || (_this.settings.multiselect) || (!_this.settings.multiselect && !_this.settings.singlecategory)) {
                            TweenMax.to(listClear, 0.2, {
                                height: 50, overwrite: 'all', onComplete: function () {
                                    _this.scroll.refresh();
                                }
                            });
                            var list = optGroupEl.find('ul');
                            if (!list.find('.list-clear').hasClass('active')) {
                                list.height(list.height() + 50);
                                _this.scroll.refresh();
                            }
                            listClear.addClass('active');
                        }

                        var list = optGroupEl.find('ul');
                        if (!list.find('.list-clear').hasClass('active')) {
                            list.height(list.height() + 50);
                        }

                    } else {
                        var listClear = optGroupEl.find('.list-clear');
                        TweenMax.to(listClear, 0.2, {
                            height: 0, overwrite: 'all', onComplete: function () {
                                _this.scroll.refresh();
                            }
                        })
                        var list = optGroupEl.find('ul');
                        if (list.find('.list-clear').hasClass('active')) {
                            list.height(list.height() - 50);
                            _this.scroll.refresh();
                        }

                        optGroupEl.find('.list-clear').removeClass('active');
                    }
                }
            }

            this.onTotalUpdateHandler();
        },
        markSelectOption: function (val, parentId) {
            var _this = this;
            var optgroup = $(this.element).find('optgroup');
            if (this.settings.singlecategory) optgroup = $(this.element);
            optgroup.each(function (index) {
                if (!_this.settings.singlecategory) {
                    if ($(optgroup[index]).attr('data-ref') == parentId) {
                        var options = $(optgroup[index]).find('option');
                        if (!_this.multi) {
                            options.each(function (index2) {
                                if ($(options[index2]).val() == val) {
                                    if ($(options[index2]).prop('selected') == true) {
                                        $(options[index2]).prop('selected', false);
                                    } else {
                                        $(options).prop('selected', false);
                                        $(options[index2]).prop('selected', true);
                                    }

                                }
                            })
                        } else {
                            options.each(function (index2) {
                                if ($(options[index2]).val() == val) {
                                    if ($(options[index2]).prop('selected') == true) {
                                        $(options[index2]).prop('selected', false);
                                    } else {
                                        $(options[index2]).prop('selected', true);
                                    }

                                }
                            })
                        }
                    }
                } else {
                    var options = $(optgroup[index]).find('option');
                    if (!_this.multi) {
                        options.each(function (index2) {
                            if ($(options[index2]).val() == val) {
                                $(options).prop('selected', false);
                                $(options[index2]).prop('selected', true);
                                if ($(options[index2]).text() != "Todos") {
                                    _this.mainLabel.text($(options[index2]).text());
                                } else {
                                    _this.mainLabel.text(_this.mainHeaderLabel);
                                }
                                $(_this.element).trigger('change');
                                _this.closeList();
                            }
                        })
                    } else {
                        options.each(function (index2) {
                            if ($(options[index2]).val() == val) {
                                if ($(options[index2]).prop('selected') == true) {
                                    $(options[index2]).prop('selected', false);
                                } else {
                                    $(options[index2]).prop('selected', true);
                                }

                            }
                        })
                    }

                }

            })
        },
        onOptGroupLabelClikHandler: function (el, event) {
            event.stopPropagation();
            var clickedEl = $(el);
            var optGroup = clickedEl.parent().find('ul');
            var optGroupConts = this.contDiv.find('.optgroup-container .optgroup-header');
            var optGroupListItems = clickedEl.parent().find('li');
            var listItemHeight = optGroupListItems.height();
            var finalHeight = 0;
            var _this = this;
            if (!this.monga) this.element.focus();
            this.contDiv.find('.optgroup-container .optgroup-label').removeClass('active');
            for (var i = 0; i < optGroupConts.length; i += 1) {
                if ($(optGroupConts[i]).attr('data-expanded') == 'true' && optGroupConts[i] != clickedEl[0]) {
                    $(optGroupConts[i]).attr('data-expanded', false)
                    $(optGroupConts[i]).removeClass('active');
                    TweenMax.to($(optGroupConts[i]).parent().find('ul'), 0.4, { height: 0, overwrite: 'all', ease: massive.easings.material.easeOut })
                }
            }
            if (clickedEl.attr('data-expanded') == 'true') {
                clickedEl.attr('data-expanded', false)
                clickedEl.removeClass('active');
                TweenMax.to(optGroup, 0.4, {
                    height: 0, overwrite: 'all', ease: massive.easings.material.easeOut, onComplete: function () {
                        _this.scroll.refresh();
                    }
                })

            } else {

                for (var i = 0; i < optGroupListItems.length; i += 1) {
                    finalHeight += $(optGroupListItems[i]).outerHeight(true);
                    if (i == optGroupListItems.length - 1) {
                        clickedEl.addClass('active');
                        TweenMax.to(optGroup, 0.4, {
                            height: finalHeight, overwrite: 'all', ease: massive.easings.material.easeOut, onComplete: function () {
                                _this.scroll.refresh();
                            }
                        })
                    }
                }
                clickedEl.attr('data-expanded', true)
            }
        },
        onTotalUpdateHandler: function () {
            var listItems = this.contDiv.find('li');
            var count = 0;
            for (var i = 0; i < listItems.length; i += 1) {
                if ($(listItems[i]).attr('data-state') == 'true') {
                    count += 1;

                }
                if (i == listItems.length - 1) {
                    if ($(this.element).attr('data-ncount-label')) {
                        if (count > 0) {
                            this.totalSelectedLabel.text(this.settings.totalLabelPrefix + count + this.settings.totalLabelSufix);
                            this.totalSelectedLabel.css('display', 'inline-block');
                            this.mainLabel.text($(this.element).attr('data-ncount-label'));
                        } else {

                            this.totalSelectedLabel.text('');
                            this.totalSelectedLabel.css('display', 'none');
                            this.mainLabel.text($(this.element).attr('data-exterior-label'));
                        }
                    } else {
                        this.totalSelectedLabel.text(this.settings.totalLabelPrefix + count + this.settings.totalLabelSufix);
                    }

                }
            }

        },
        onMainLabelClickHandler: function (el, event) {
            event.stopPropagation();
            var _this = this;
            var clickedEl = el;
            if (is.ios()) {
                if (this.listCont.attr('data-expanded') == 'false') {
                    $(document).off('mousedown');
                    $(document).on('mousedown', function (e) { _this.onBodyTapHandler(this, e) });
                    this.openList(clickedEl);
                    this.mainHeader.addClass('active');
                    this.contDiv.addClass('active');
                    return;
                } else {
                    this.closeList();
                }

            }
            if (this.listCont.attr('data-expanded') == 'false') {
                this.openList(clickedEl);
                if (!this.monga) this.element.focus();
                this.mainHeader.addClass('active');
                this.contDiv.addClass('active');
            } else {

                this.closeList();

            }

        },
        setActive: function(index){
            var _this = this;
            if(!_this.multi){
                if(_this.settings.singlecategory){
                    var items = $(this.element).find('option');
                    $(items[index]).prop('selected', true);
                    $($(_this.optGroups[0].element[0]).find('ul li')[index]).trigger('click');
                }
            }
        },
        onMainLabelDownHandler: function (el) {
            this.mouseTrigger = true;
        },
        onMainLabelUpHandler: function (el) {
            this.mouseTrigger = false;
        },
        openList: function (el) {
            var clickedEl = $(el);
            var _this = this;

            this.listCont.attr('data-expanded', true);
            TweenMax.set(this.listCont, { display: 'block' });
            TweenMax.to(this.listCont, 0.3, { opacity: 1, ease: Power1.easeOut, overwrite: 'all' });
            if (this.settings.singlecategory) {
                var optGroup = clickedEl.parent().find('ul');
                var optGroupConts = this.contDiv.find('.optgroup-container .optgroup-header');
                var optGroupListItems = clickedEl.parent().find('li');
                var listItemHeight = optGroupListItems.height();
                var finalHeight = 0;
                for (var i = 0; i < optGroupListItems.length; i += 1) {
                    finalHeight += $(optGroupListItems[i]).outerHeight(true);
                    if (i == optGroupListItems.length - 1) {
                        clickedEl.addClass('active');


                        TweenMax.set(optGroup, {
                            height: finalHeight,
                            onComplete: function() {
                                _this.scroll.refresh();
                            }
                        });
                        
                    }
                }
            }
        },
        closeList: function () {
            this.listCont.attr('data-expanded', false);
            var _this = this;
            this.mainHeader.removeClass('active');
            this.contDiv.removeClass('active');
            TweenMax.to(this.listCont, 0.3, {
                opacity: 0, ease: Power1.easeOut, overwrite: 'all', onComplete: function () {
                    TweenMax.set(_this.listCont, { display: 'none' });
                }
            });
            var optGroupConts = this.contDiv.find('.optgroup-container .optgroup-header');
            for (var i = 0; i < optGroupConts.length; i += 1) {
                if ($(optGroupConts[i]).attr('data-expanded') == 'true') {
                    $(optGroupConts[i]).attr('data-expanded', false)
                    $(optGroupConts[i]).removeClass('active');

                    TweenMax.set($(optGroupConts[i]).parent().find('ul'), {
                        height: 0,
                        onComplete: function() {
                            _this.scroll.refresh();
                        }
                    });
                }
            }

        },
        onSelectElementFocusHandler: function () {
            //this.closeList();
        },
        onSelectElementBlurHandler: function () {
            if (this.mouseTrigger) return;
            this.closeList();
        },
        onBodyTapHandler: function (el, event) {
            this.closeList();
            /*if(target != this.contDiv){
                this.closeList();
            }*/
        },

        yourOtherFunction: function () {
            // some logic
        }
    });

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
    };

})(jQuery, window, document);
