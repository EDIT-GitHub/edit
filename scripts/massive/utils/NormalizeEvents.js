/*jslint browser: true*/
/*global $, jQuery, alert, is*/
// Events Normalize
// Requires is.js
var keys = [37, 38, 39, 40];
function keydown(e) {
    "use strict";
    var i = 0;
    for (i = keys.length; i > 0; i -= 1) {
        if (e.keyCode === keys[i]) {
            e.preventDefault(e);
            return;
        }
    }
}

function wheel(e) {
    "use strict";
    if (e.stopPropagation) {
        e.stopPropagation();
    }
    if (e.preventDefault) {
        e.preventDefault();
    }
    e.cancelBubble = true;
    e.cancel = true;
    e.returnValue = false;
}

//Custom Events
function CustomEvent(event, params) {
    "use strict";
    params = params || { bubbles: false, cancelable: false, detail: undefined };
    var evt = document.createEvent('CustomEvent');
    evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
    return evt;
}
window.CustomEvent = CustomEvent;
CustomEvent.prototype = window.CustomEvent.prototype;

function Event() { "use strict"; }

function MouseEvent() { "use strict"; }

function KeyboardEvent() { "use strict"; }

function TouchEvent() { "use strict"; }

function MouseAndTouchEvent() { "use strict"; }
Event.RESIZE = "resize";
Event.ORIENTATIONCHANGE = "orientationchange";
Event.LOAD = "load";
Event.SCROLL = "scroll";
Event.SELECT = "select";
Event.SUBMIT = "submit";
Event.HASHCHANGE = "hashchange";
Event.FOCUS = "focus";
Event.BLUR = "blur";
Event.CHANGE = "change";
Event.ABORT = "abort";
Event.UNLOAD = "unload";
Event.BEFOREUNLOAD = "beforeunload";
Event.LOAD = "load";
Event.ERROR = "error";
Event.CONTEXTMENU = "contextmenu";
Event.COPY = "copy";
Event.PASTE = "paste";
Event.READY_STATE_CHANGE = "readystatechange";
Event.RESET = "reset";
MouseEvent.CLICK = "click";
MouseEvent.MOUSE_DOWN = "mousedown";
MouseEvent.MOUSE_MOVE = "mousemove";
MouseEvent.MOUSE_UP = "mouseup";
MouseEvent.RIGHT_CLICK = "rightclick";
MouseEvent.MOUSE_OVER = "mouseover";
MouseEvent.MOUSE_OUT = "mouseout";
MouseEvent.DOUBLE_CLICK = "dblclick";
MouseEvent.FOCUS = "focus";
MouseEvent.MOUSE_ENTER = "mouseenter";
MouseEvent.MOUSE_LEAVE = "mouseleave";
MouseEvent.ROLL_OVER = "mouseenter";
MouseEvent.ROLL_OUT = "mouseleave";
MouseEvent.DRAG_END = "dragend";
MouseEvent.DRAG_ENTER = "dragenter";
MouseEvent.DRAG_LEAVE = "dragleave";
MouseEvent.DRAG_OVER = "dragover";
MouseEvent.DRAG_START = "dragstart";
MouseEvent.DROP = "drop";
MouseEvent.MOUSE_WHEEL = "mousewheel";
//if (BrowserDetect.BROWSER_NAME == "Firefox") MouseEvent.MOUSE_WHEEL = "DOMMouseScroll";
KeyboardEvent.KEY_DOWN = "keydown";
KeyboardEvent.KEY_UP = "keyup";
KeyboardEvent.KEY_PRESS = "keypress";
TouchEvent.TOUCH_START = "touchstart";
TouchEvent.TOUCH_MOVE = "touchmove";
TouchEvent.TOUCH_END = "touchend";
TouchEvent.TOUCH_CANCEL = "touchcancel";
if (is.tablet() || is.mobile()) {
    MouseAndTouchEvent.MOUSE_DOWN = TouchEvent.TOUCH_START;
    MouseAndTouchEvent.MOUSE_MOVE = TouchEvent.TOUCH_MOVE;
    MouseAndTouchEvent.MOUSE_UP = TouchEvent.TOUCH_END;
    MouseAndTouchEvent.RESIZE = Event.ORIENTATIONCHANGE;
} else {
    MouseAndTouchEvent.MOUSE_DOWN = MouseEvent.MOUSE_DOWN;
    MouseAndTouchEvent.MOUSE_MOVE = MouseEvent.MOUSE_MOVE;
    MouseAndTouchEvent.MOUSE_UP = MouseEvent.MOUSE_UP;
    MouseAndTouchEvent.RESIZE = Event.RESIZE;
}

function Key() { "use strict"; }
Key.SPACEBAR = 32;
Key.BACKSPACE = 8;
Key.TAB = 9;
Key.ENTER = 13;
Key.SHIFT = 16;
Key.CTRL = 17;
Key.ALT = 18;
Key.PAUSE = 19;
Key.CAPSLOCK = 20;
Key.ESCAPE = 27;
Key.PAGEUP = 33;
Key.PAGEDOWN = 34;
Key.END = 35;
Key.HOME = 36;
Key.LEFT = 37;
Key.UP = 38;
Key.RIGHT = 39;
Key.DOWN = 40;
Key.INSERT = 45;
Key.DELETE = 46;
Key.QUESTIONMARK = 191;
Key.PASTE = 91;


