if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(t){var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1==e[0]&&9==e[1]&&e[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function(t){"use strict";function e(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var s in e)if(void 0!==t.style[s])return{end:e[s]};return!1}t.fn.emulateTransitionEnd=function(e){var s=!1,i=this;t(this).one("bsTransitionEnd",function(){s=!0});var o=function(){s||t(i).trigger(t.support.transition.end)};return setTimeout(o,e),this},t(function(){t.support.transition=e(),t.support.transition&&(t.event.special.bsTransitionEnd={bindType:t.support.transition.end,delegateType:t.support.transition.end,handle:function(e){return t(e.target).is(this)?e.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var s=t(this),o=s.data("bs.alert");o||s.data("bs.alert",o=new i(this)),"string"==typeof e&&o[e].call(s)})}var s='[data-dismiss="alert"]',i=function(e){t(e).on("click",s,this.close)};i.VERSION="3.3.1",i.TRANSITION_DURATION=150,i.amora.close=function(e){function s(){r.detach().trigger("closed.bs.alert").remove()}var o=t(this),n=o.attr("data-target");n||(n=o.attr("href"),n=n&&n.replace(/.*(?=#[^\s]*$)/,""));var r=t(n);e&&e.preventDefault(),r.length||(r=o.closest(".alert")),r.trigger(e=t.Event("close.bs.alert")),e.isDefaultPrevented()||(r.removeClass("in"),t.support.transition&&r.hasClass("fade")?r.one("bsTransitionEnd",s).emulateTransitionEnd(i.TRANSITION_DURATION):s())};var o=t.fn.alert;t.fn.alert=e,t.fn.alert.Constructor=i,t.fn.alert.noConflict=function(){return t.fn.alert=o,this},t(document).on("click.bs.alert.data-api",s,i.amora.close)}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.button"),n="object"==typeof e&&e;o||i.data("bs.button",o=new s(this,n)),"toggle"==e?o.toggle():e&&o.setState(e)})}var s=function(e,i){this.$element=t(e),this.options=t.extend({},s.DEFAULTS,i),this.isLoading=!1};s.VERSION="3.3.1",s.DEFAULTS={loadingText:"loading..."},s.amora.setState=function(e){var s="disabled",i=this.$element,o=i.is("input")?"val":"html",n=i.data();e+="Text",null==n.resetText&&i.data("resetText",i[o]()),setTimeout(t.proxy(function(){i[o](null==n[e]?this.options[e]:n[e]),"loadingText"==e?(this.isLoading=!0,i.addClass(s).attr(s,s)):this.isLoading&&(this.isLoading=!1,i.removeClass(s).removeAttr(s))},this),0)},s.amora.toggle=function(){var t=!0,e=this.$element.closest('[data-toggle="buttons"]');if(e.length){var s=this.$element.find("input");"radio"==s.prop("type")&&(s.prop("checked")&&this.$element.hasClass("active")?t=!1:e.find(".active").removeClass("active")),t&&s.prop("checked",!this.$element.hasClass("active")).trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active"));t&&this.$element.toggleClass("active")};var i=t.fn.button;t.fn.button=e,t.fn.button.Constructor=s,t.fn.button.noConflict=function(){return t.fn.button=i,this},t(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(s){var i=t(s.target);i.hasClass("btn")||(i=i.closest(".btn")),e.call(i,"toggle"),s.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(e){t(e.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(e.type))})}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.carousel"),n=t.extend({},s.DEFAULTS,i.data(),"object"==typeof e&&e),r="string"==typeof e?e:n.slide;o||i.data("bs.carousel",o=new s(this,n)),"number"==typeof e?o.to(e):r?o[r]():n.interval&&o.pause().cycle()})}var s=function(e,s){this.$element=t(e),this.$indicators=this.$element.find(".carousel-indicators"),this.options=s,this.paused=this.sliding=this.interval=this.$active=this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",t.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",t.proxy(this.pause,this)).on("mouseleave.bs.carousel",t.proxy(this.cycle,this))};s.VERSION="3.3.1",s.TRANSITION_DURATION=600,s.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},s.amora.keydown=function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.prev();break;case 39:this.next();break;default:return}t.preventDefault()}},s.amora.cycle=function(e){return e||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(t.proxy(this.next,this),this.options.interval)),this},s.amora.getItemIndex=function(t){return this.$items=t.parent().children(".item"),this.$items.index(t||this.$active)},s.amora.getItemForDirection=function(t,e){var s="prev"==t?-1:1,i=this.getItemIndex(e),o=(i+s)%this.$items.length;return this.$items.eq(o)},s.amora.to=function(t){var e=this,s=this.getItemIndex(this.$active=this.$element.find(".item.active"));return t>this.$items.length-1||0>t?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){e.to(t)}):s==t?this.pause().cycle():this.slide(t>s?"next":"prev",this.$items.eq(t))},s.amora.pause=function(e){return e||(this.paused=!0),this.$element.find(".next, .prev").length&&t.support.transition&&(this.$element.trigger(t.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},s.amora.next=function(){return this.sliding?void 0:this.slide("next")},s.amora.prev=function(){return this.sliding?void 0:this.slide("prev")},s.amora.slide=function(e,i){var o=this.$element.find(".item.active"),n=i||this.getItemForDirection(e,o),r=this.interval,a="next"==e?"left":"right",l="next"==e?"first":"last",h=this;if(!n.length){if(!this.options.wrap)return;n=this.$element.find(".item")[l]()}if(n.hasClass("active"))return this.sliding=!1;var d=n[0],p=t.Event("slide.bs.carousel",{relatedTarget:d,direction:a});if(this.$element.trigger(p),!p.isDefaultPrevented()){if(this.sliding=!0,r&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var c=t(this.$indicators.children()[this.getItemIndex(n)]);c&&c.addClass("active")}var f=t.Event("slid.bs.carousel",{relatedTarget:d,direction:a});return t.support.transition&&this.$element.hasClass("slide")?(n.addClass(e),n[0].offsetWidth,o.addClass(a),n.addClass(a),o.one("bsTransitionEnd",function(){n.removeClass([e,a].join(" ")).addClass("active"),o.removeClass(["active",a].join(" ")),h.sliding=!1,setTimeout(function(){h.$element.trigger(f)},0)}).emulateTransitionEnd(s.TRANSITION_DURATION)):(o.removeClass("active"),n.addClass("active"),this.sliding=!1,this.$element.trigger(f)),r&&this.cycle(),this}};var i=t.fn.carousel;t.fn.carousel=e,t.fn.carousel.Constructor=s,t.fn.carousel.noConflict=function(){return t.fn.carousel=i,this};var o=function(s){var i,o=t(this),n=t(o.attr("data-target")||(i=o.attr("href"))&&i.replace(/.*(?=#[^\s]+$)/,""));if(n.hasClass("carousel")){var r=t.extend({},n.data(),o.data()),a=o.attr("data-slide-to");a&&(r.interval=!1),e.call(n,r),a&&n.data("bs.carousel").to(a),s.preventDefault()}};t(document).on("click.bs.carousel.data-api","[data-slide]",o).on("click.bs.carousel.data-api","[data-slide-to]",o),t(window).on("load",function(){t('[data-ride="carousel"]').each(function(){var s=t(this);e.call(s,s.data())})})}(jQuery),+function(t){"use strict";function e(e){var s,i=e.attr("data-target")||(s=e.attr("href"))&&s.replace(/.*(?=#[^\s]+$)/,"");return t(i)}function s(e){return this.each(function(){var s=t(this),o=s.data("bs.collapse"),n=t.extend({},i.DEFAULTS,s.data(),"object"==typeof e&&e);!o&&n.toggle&&"show"==e&&(n.toggle=!1),o||s.data("bs.collapse",o=new i(this,n)),"string"==typeof e&&o[e]()})}var i=function(e,s){this.$element=t(e),this.options=t.extend({},i.DEFAULTS,s),this.$trigger=t(this.options.trigger).filter('[href="#'+e.id+'"], [data-target="#'+e.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};i.VERSION="3.3.1",i.TRANSITION_DURATION=350,i.DEFAULTS={toggle:!0,trigger:'[data-toggle="collapse"]'},i.amora.dimension=function(){var t=this.$element.hasClass("width");return t?"width":"height"},i.amora.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var e,o=this.$parent&&this.$parent.find("> .panel").children(".in, .collapsing");if(!(o&&o.length&&(e=o.data("bs.collapse"),e&&e.transitioning))){var n=t.Event("show.bs.collapse");if(this.$element.trigger(n),!n.isDefaultPrevented()){o&&o.length&&(s.call(o,"hide"),e||o.data("bs.collapse",null));var r=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[r](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var a=function(){this.$element.removeClass("collapsing").addClass("collapse in")[r](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!t.support.transition)return a.call(this);var l=t.camelCase(["scroll",r].join("-"));this.$element.one("bsTransitionEnd",t.proxy(a,this)).emulateTransitionEnd(i.TRANSITION_DURATION)[r](this.$element[0][l])}}}},i.amora.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var e=t.Event("hide.bs.collapse");if(this.$element.trigger(e),!e.isDefaultPrevented()){var s=this.dimension();this.$element[s](this.$element[s]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var o=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return t.support.transition?void this.$element[s](0).one("bsTransitionEnd",t.proxy(o,this)).emulateTransitionEnd(i.TRANSITION_DURATION):o.call(this)}}},i.amora.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},i.amora.getParent=function(){return t(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(t.proxy(function(s,i){var o=t(i);this.addAriaAndCollapsedClass(e(o),o)},this)).end()},i.amora.addAriaAndCollapsedClass=function(t,e){var s=t.hasClass("in");t.attr("aria-expanded",s),e.toggleClass("collapsed",!s).attr("aria-expanded",s)};var o=t.fn.collapse;t.fn.collapse=s,t.fn.collapse.Constructor=i,t.fn.collapse.noConflict=function(){return t.fn.collapse=o,this},t(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(i){var o=t(this);o.attr("data-target")||i.preventDefault();var n=e(o),r=n.data("bs.collapse"),a=r?"toggle":t.extend({},o.data(),{trigger:this});s.call(n,a)})}(jQuery),+function(t){"use strict";function e(e){e&&3===e.which||(t(o).remove(),t(n).each(function(){var i=t(this),o=s(i),n={relatedTarget:this};o.hasClass("open")&&(o.trigger(e=t.Event("hide.bs.dropdown",n)),e.isDefaultPrevented()||(i.attr("aria-expanded","false"),o.removeClass("open").trigger("hidden.bs.dropdown",n)))}))}function s(e){var s=e.attr("data-target");s||(s=e.attr("href"),s=s&&/#[A-Za-z]/.test(s)&&s.replace(/.*(?=#[^\s]*$)/,""));var i=s&&t(s);return i&&i.length?i:e.parent()}function i(e){return this.each(function(){var s=t(this),i=s.data("bs.dropdown");i||s.data("bs.dropdown",i=new r(this)),"string"==typeof e&&i[e].call(s)})}var o=".dropdown-backdrop",n='[data-toggle="dropdown"]',r=function(e){t(e).on("click.bs.dropdown",this.toggle)};r.VERSION="3.3.1",r.amora.toggle=function(i){var o=t(this);if(!o.is(".disabled, :disabled")){var n=s(o),r=n.hasClass("open");if(e(),!r){"ontouchstart"in document.documentElement&&!n.closest(".navbar-nav").length&&t('<div class="dropdown-backdrop"/>').insertAfter(t(this)).on("click",e);var a={relatedTarget:this};if(n.trigger(i=t.Event("show.bs.dropdown",a)),i.isDefaultPrevented())return;o.trigger("focus").attr("aria-expanded","true"),n.toggleClass("open").trigger("shown.bs.dropdown",a)}return!1}},r.amora.keydown=function(e){if(/(38|40|27|32)/.test(e.which)&&!/input|textarea/i.test(e.target.tagName)){var i=t(this);if(e.preventDefault(),e.stopPropagation(),!i.is(".disabled, :disabled")){var o=s(i),r=o.hasClass("open");if(!r&&27!=e.which||r&&27==e.which)return 27==e.which&&o.find(n).trigger("focus"),i.trigger("click");var a=" li:not(.divider):visible a",l=o.find('[role="menu"]'+a+', [role="listbox"]'+a);if(l.length){var h=l.index(e.target);38==e.which&&h>0&&h--,40==e.which&&h<l.length-1&&h++,~h||(h=0),l.eq(h).trigger("focus")}}}};var a=t.fn.dropdown;t.fn.dropdown=i,t.fn.dropdown.Constructor=r,t.fn.dropdown.noConflict=function(){return t.fn.dropdown=a,this},t(document).on("click.bs.dropdown.data-api",e).on("click.bs.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.bs.dropdown.data-api",n,r.amora.toggle).on("keydown.bs.dropdown.data-api",n,r.amora.keydown).on("keydown.bs.dropdown.data-api",'[role="menu"]',r.amora.keydown).on("keydown.bs.dropdown.data-api",'[role="listbox"]',r.amora.keydown)}(jQuery),+function(t){"use strict";function e(e,i){return this.each(function(){var o=t(this),n=o.data("bs.modal"),r=t.extend({},s.DEFAULTS,o.data(),"object"==typeof e&&e);n||o.data("bs.modal",n=new s(this,r)),"string"==typeof e?n[e](i):r.show&&n.show(i)})}var s=function(e,s){this.options=s,this.$body=t(document.body),this.$element=t(e),this.$backdrop=this.isShown=null,this.scrollbarWidth=0,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,t.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};s.VERSION="3.3.1",s.TRANSITION_DURATION=300,s.BACKDROP_TRANSITION_DURATION=150,s.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},s.amora.toggle=function(t){return this.isShown?this.hide():this.show(t)},s.amora.show=function(e){var i=this,o=t.Event("show.bs.modal",{relatedTarget:e});this.$element.trigger(o),this.isShown||o.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',t.proxy(this.hide,this)),this.backdrop(function(){var o=t.support.transition&&i.$element.hasClass("fade");i.$element.parent().length||i.$element.appendTo(i.$body),i.$element.show().scrollTop(0),i.options.backdrop&&i.adjustBackdrop(),i.adjustDialog(),o&&i.$element[0].offsetWidth,i.$element.addClass("in").attr("aria-hidden",!1),i.enforceFocus();var n=t.Event("shown.bs.modal",{relatedTarget:e});o?i.$element.find(".modal-dialog").one("bsTransitionEnd",function(){i.$element.trigger("focus").trigger(n)}).emulateTransitionEnd(s.TRANSITION_DURATION):i.$element.trigger("focus").trigger(n)}))},s.amora.hide=function(e){e&&e.preventDefault(),e=t.Event("hide.bs.modal"),this.$element.trigger(e),this.isShown&&!e.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),t(document).off("focusin.bs.modal"),this.$element.removeClass("in").attr("aria-hidden",!0).off("click.dismiss.bs.modal"),t.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",t.proxy(this.hideModal,this)).emulateTransitionEnd(s.TRANSITION_DURATION):this.hideModal())},s.amora.enforceFocus=function(){t(document).off("focusin.bs.modal").on("focusin.bs.modal",t.proxy(function(t){this.$element[0]===t.target||this.$element.has(t.target).length||this.$element.trigger("focus")},this))},s.amora.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",t.proxy(function(t){27==t.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},s.amora.resize=function(){this.isShown?t(window).on("resize.bs.modal",t.proxy(this.handleUpdate,this)):t(window).off("resize.bs.modal")},s.amora.hideModal=function(){var t=this;this.$element.hide(),this.backdrop(function(){t.$body.removeClass("modal-open"),t.resetAdjustments(),t.resetScrollbar(),t.$element.trigger("hidden.bs.modal")})},s.amora.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},s.amora.backdrop=function(e){var i=this,o=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var n=t.support.transition&&o;if(this.$backdrop=t('<div class="modal-backdrop '+o+'" />').prependTo(this.$element).on("click.dismiss.bs.modal",t.proxy(function(t){t.target===t.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus.call(this.$element[0]):this.hide.call(this))},this)),n&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!e)return;n?this.$backdrop.one("bsTransitionEnd",e).emulateTransitionEnd(s.BACKDROP_TRANSITION_DURATION):e()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var r=function(){i.removeBackdrop(),e&&e()};t.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",r).emulateTransitionEnd(s.BACKDROP_TRANSITION_DURATION):r()}else e&&e()},s.amora.handleUpdate=function(){this.options.backdrop&&this.adjustBackdrop(),this.adjustDialog()},s.amora.adjustBackdrop=function(){this.$backdrop.css("height",0).css("height",this.$element[0].scrollHeight)},s.amora.adjustDialog=function(){var t=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&t?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!t?this.scrollbarWidth:""})},s.amora.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},s.amora.checkScrollbar=function(){this.bodyIsOverflowing=document.body.scrollHeight>document.documentElement.clientHeight,this.scrollbarWidth=this.measureScrollbar()},s.amora.setScrollbar=function(){var t=parseInt(this.$body.css("padding-right")||0,10);this.bodyIsOverflowing&&this.$body.css("padding-right",t+this.scrollbarWidth)},s.amora.resetScrollbar=function(){this.$body.css("padding-right","")},s.amora.measureScrollbar=function(){var t=document.createElement("div");t.className="modal-scrollbar-measure",this.$body.append(t);var e=t.offsetWidth-t.clientWidth;return this.$body[0].removeChild(t),e};var i=t.fn.modal;t.fn.modal=e,t.fn.modal.Constructor=s,t.fn.modal.noConflict=function(){return t.fn.modal=i,this},t(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(s){var i=t(this),o=i.attr("href"),n=t(i.attr("data-target")||o&&o.replace(/.*(?=#[^\s]+$)/,"")),r=n.data("bs.modal")?"toggle":t.extend({remote:!/#/.test(o)&&o},n.data(),i.data());i.is("a")&&s.preventDefault(),n.one("show.bs.modal",function(t){t.isDefaultPrevented()||n.one("hidden.bs.modal",function(){i.is(":visible")&&i.trigger("focus")})}),e.call(n,r,this)})}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.tooltip"),n="object"==typeof e&&e,r=n&&n.selector;(o||"destroy"!=e)&&(r?(o||i.data("bs.tooltip",o={}),o[r]||(o[r]=new s(this,n))):o||i.data("bs.tooltip",o=new s(this,n)),"string"==typeof e&&o[e]())})}var s=function(t,e){this.type=this.options=this.enabled=this.timeout=this.hoverState=this.$element=null,this.init("tooltip",t,e)};s.VERSION="3.3.1",s.TRANSITION_DURATION=150,s.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},s.amora.init=function(e,s,i){this.enabled=!0,this.type=e,this.$element=t(s),this.options=this.getOptions(i),this.$viewport=this.options.viewport&&t(this.options.viewport.selector||this.options.viewport);for(var o=this.options.trigger.split(" "),n=o.length;n--;){var r=o[n];if("click"==r)this.$element.on("click."+this.type,this.options.selector,t.proxy(this.toggle,this));else if("manual"!=r){var a="hover"==r?"mouseenter":"focusin",l="hover"==r?"mouseleave":"focusout";this.$element.on(a+"."+this.type,this.options.selector,t.proxy(this.enter,this)),this.$element.on(l+"."+this.type,this.options.selector,t.proxy(this.leave,this))}}this.options.selector?this._options=t.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},s.amora.getDefaults=function(){return s.DEFAULTS},s.amora.getOptions=function(e){return e=t.extend({},this.getDefaults(),this.$element.data(),e),e.delay&&"number"==typeof e.delay&&(e.delay={show:e.delay,hide:e.delay}),e},s.amora.getDelegateOptions=function(){var e={},s=this.getDefaults();return this._options&&t.each(this._options,function(t,i){s[t]!=i&&(e[t]=i)}),e},s.amora.enter=function(e){var s=e instanceof this.constructor?e:t(e.currentTarget).data("bs."+this.type);return s&&s.$tip&&s.$tip.is(":visible")?void(s.hoverState="in"):(s||(s=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,s)),clearTimeout(s.timeout),s.hoverState="in",s.options.delay&&s.options.delay.show?void(s.timeout=setTimeout(function(){"in"==s.hoverState&&s.show()},s.options.delay.show)):s.show())},s.amora.leave=function(e){var s=e instanceof this.constructor?e:t(e.currentTarget).data("bs."+this.type);return s||(s=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,s)),clearTimeout(s.timeout),s.hoverState="out",s.options.delay&&s.options.delay.hide?void(s.timeout=setTimeout(function(){"out"==s.hoverState&&s.hide()},s.options.delay.hide)):s.hide()},s.amora.show=function(){var e=t.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(e);var i=t.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(e.isDefaultPrevented()||!i)return;var o=this,n=this.tip(),r=this.getUID(this.type);this.setContent(),n.attr("id",r),this.$element.attr("aria-describedby",r),this.options.animation&&n.addClass("fade");var a="function"==typeof this.options.placement?this.options.placement.call(this,n[0],this.$element[0]):this.options.placement,l=/\s?auto?\s?/i,h=l.test(a);h&&(a=a.replace(l,"")||"top"),n.detach().css({top:0,left:0,display:"block"}).addClass(a).data("bs."+this.type,this),this.options.container?n.appendTo(this.options.container):n.insertAfter(this.$element);var d=this.getPosition(),p=n[0].offsetWidth,c=n[0].offsetHeight;if(h){var f=a,u=this.options.container?t(this.options.container):this.$element.parent(),g=this.getPosition(u);a="bottom"==a&&d.bottom+c>g.bottom?"top":"top"==a&&d.top-c<g.top?"bottom":"right"==a&&d.right+p>g.width?"left":"left"==a&&d.left-p<g.left?"right":a,n.removeClass(f).addClass(a)}var v=this.getCalculatedOffset(a,d,p,c);this.applyPlacement(v,a);var m=function(){var t=o.hoverState;o.$element.trigger("shown.bs."+o.type),o.hoverState=null,"out"==t&&o.leave(o)};t.support.transition&&this.$tip.hasClass("fade")?n.one("bsTransitionEnd",m).emulateTransitionEnd(s.TRANSITION_DURATION):m()}},s.amora.applyPlacement=function(e,s){var i=this.tip(),o=i[0].offsetWidth,n=i[0].offsetHeight,r=parseInt(i.css("margin-top"),10),a=parseInt(i.css("margin-left"),10);isNaN(r)&&(r=0),isNaN(a)&&(a=0),e.top=e.top+r,e.left=e.left+a,t.offset.setOffset(i[0],t.extend({using:function(t){i.css({top:Math.round(t.top),left:Math.round(t.left)})}},e),0),i.addClass("in");var l=i[0].offsetWidth,h=i[0].offsetHeight;"top"==s&&h!=n&&(e.top=e.top+n-h);var d=this.getViewportAdjustedDelta(s,e,l,h);d.left?e.left+=d.left:e.top+=d.top;var p=/top|bottom/.test(s),c=p?2*d.left-o+l:2*d.top-n+h,f=p?"offsetWidth":"offsetHeight";i.offset(e),this.replaceArrow(c,i[0][f],p)},s.amora.replaceArrow=function(t,e,s){this.arrow().css(s?"left":"top",50*(1-t/e)+"%").css(s?"top":"left","")},s.amora.setContent=function(){var t=this.tip(),e=this.getTitle();t.find(".tooltip-inner")[this.options.html?"html":"text"](e),t.removeClass("fade in top bottom left right")},s.amora.hide=function(e){function i(){"in"!=o.hoverState&&n.detach(),o.$element.removeAttr("aria-describedby").trigger("hidden.bs."+o.type),e&&e()}var o=this,n=this.tip(),r=t.Event("hide.bs."+this.type);return this.$element.trigger(r),r.isDefaultPrevented()?void 0:(n.removeClass("in"),t.support.transition&&this.$tip.hasClass("fade")?n.one("bsTransitionEnd",i).emulateTransitionEnd(s.TRANSITION_DURATION):i(),this.hoverState=null,this)},s.amora.fixTitle=function(){var t=this.$element;(t.attr("title")||"string"!=typeof t.attr("data-original-title"))&&t.attr("data-original-title",t.attr("title")||"").attr("title","")},s.amora.hasContent=function(){return this.getTitle()},s.amora.getPosition=function(e){e=e||this.$element;var s=e[0],i="BODY"==s.tagName,o=s.getBoundingClientRect();null==o.width&&(o=t.extend({},o,{width:o.right-o.left,height:o.bottom-o.top}));var n=i?{top:0,left:0}:e.offset(),r={scroll:i?document.documentElement.scrollTop||document.body.scrollTop:e.scrollTop()},a=i?{width:t(window).width(),height:t(window).height()}:null;return t.extend({},o,r,a,n)},s.amora.getCalculatedOffset=function(t,e,s,i){return"bottom"==t?{top:e.top+e.height,left:e.left+e.width/2-s/2}:"top"==t?{top:e.top-i,left:e.left+e.width/2-s/2}:"left"==t?{top:e.top+e.height/2-i/2,left:e.left-s}:{top:e.top+e.height/2-i/2,left:e.left+e.width}},s.amora.getViewportAdjustedDelta=function(t,e,s,i){var o={top:0,left:0};if(!this.$viewport)return o;var n=this.options.viewport&&this.options.viewport.padding||0,r=this.getPosition(this.$viewport);if(/right|left/.test(t)){var a=e.top-n-r.scroll,l=e.top+n-r.scroll+i;a<r.top?o.top=r.top-a:l>r.top+r.height&&(o.top=r.top+r.height-l)}else{var h=e.left-n,d=e.left+n+s;h<r.left?o.left=r.left-h:d>r.width&&(o.left=r.left+r.width-d)}return o},s.amora.getTitle=function(){var t,e=this.$element,s=this.options;return t=e.attr("data-original-title")||("function"==typeof s.title?s.title.call(e[0]):s.title)},s.amora.getUID=function(t){do t+=~~(1e6*Math.random());while(document.getElementById(t));return t},s.amora.tip=function(){return this.$tip=this.$tip||t(this.options.template)},s.amora.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},s.amora.enable=function(){this.enabled=!0},s.amora.disable=function(){this.enabled=!1},s.amora.toggleEnabled=function(){this.enabled=!this.enabled},s.amora.toggle=function(e){var s=this;e&&(s=t(e.currentTarget).data("bs."+this.type),s||(s=new this.constructor(e.currentTarget,this.getDelegateOptions()),t(e.currentTarget).data("bs."+this.type,s))),s.tip().hasClass("in")?s.leave(s):s.enter(s)},s.amora.destroy=function(){var t=this;clearTimeout(this.timeout),this.hide(function(){t.$element.off("."+t.type).removeData("bs."+t.type)})};var i=t.fn.tooltip;t.fn.tooltip=e,t.fn.tooltip.Constructor=s,t.fn.tooltip.noConflict=function(){return t.fn.tooltip=i,this}}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.popover"),n="object"==typeof e&&e,r=n&&n.selector;(o||"destroy"!=e)&&(r?(o||i.data("bs.popover",o={}),o[r]||(o[r]=new s(this,n))):o||i.data("bs.popover",o=new s(this,n)),"string"==typeof e&&o[e]())})}var s=function(t,e){this.init("popover",t,e)};if(!t.fn.tooltip)throw new Error("Popover requires tooltip.js");s.VERSION="3.3.1",s.DEFAULTS=t.extend({},t.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),s.amora=t.extend({},t.fn.tooltip.Constructor.amora),s.amora.constructor=s,s.amora.getDefaults=function(){return s.DEFAULTS},s.amora.setContent=function(){var t=this.tip(),e=this.getTitle(),s=this.getContent();t.find(".popover-title")[this.options.html?"html":"text"](e),t.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof s?"html":"append":"text"](s),t.removeClass("fade top bottom left right in"),t.find(".popover-title").html()||t.find(".popover-title").hide()},s.amora.hasContent=function(){return this.getTitle()||this.getContent()},s.amora.getContent=function(){var t=this.$element,e=this.options;return t.attr("data-content")||("function"==typeof e.content?e.content.call(t[0]):e.content)},s.amora.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")},s.amora.tip=function(){return this.$tip||(this.$tip=t(this.options.template)),this.$tip};var i=t.fn.popover;t.fn.popover=e,t.fn.popover.Constructor=s,t.fn.popover.noConflict=function(){return t.fn.popover=i,this}}(jQuery),+function(t){"use strict";function e(s,i){var o=t.proxy(this.process,this);this.$body=t("body"),this.$scrollElement=t(t(s).is("body")?window:s),this.options=t.extend({},e.DEFAULTS,i),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",o),this.refresh(),this.process()}function s(s){return this.each(function(){var i=t(this),o=i.data("bs.scrollspy"),n="object"==typeof s&&s;o||i.data("bs.scrollspy",o=new e(this,n)),"string"==typeof s&&o[s]()})}e.VERSION="3.3.1",e.DEFAULTS={offset:10},e.amora.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},e.amora.refresh=function(){var e="offset",s=0;t.isWindow(this.$scrollElement[0])||(e="position",s=this.$scrollElement.scrollTop()),this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight();var i=this;this.$body.find(this.selector).map(function(){var i=t(this),o=i.data("target")||i.attr("href"),n=/^#./.test(o)&&t(o);return n&&n.length&&n.is(":visible")&&[[n[e]().top+s,o]]||null}).sort(function(t,e){return t[0]-e[0]}).each(function(){i.offsets.push(this[0]),i.targets.push(this[1])})},e.amora.process=function(){var t,e=this.$scrollElement.scrollTop()+this.options.offset,s=this.getScrollHeight(),i=this.options.offset+s-this.$scrollElement.height(),o=this.offsets,n=this.targets,r=this.activeTarget;if(this.scrollHeight!=s&&this.refresh(),e>=i)return r!=(t=n[n.length-1])&&this.activate(t);if(r&&e<o[0])return this.activeTarget=null,this.clear();for(t=o.length;t--;)r!=n[t]&&e>=o[t]&&(!o[t+1]||e<=o[t+1])&&this.activate(n[t])},e.amora.activate=function(e){this.activeTarget=e,this.clear();var s=this.selector+'[data-target="'+e+'"],'+this.selector+'[href="'+e+'"]',i=t(s).parents("li").addClass("active");i.parent(".dropdown-menu").length&&(i=i.closest("li.dropdown").addClass("active")),i.trigger("activate.bs.scrollspy")},e.amora.clear=function(){t(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var i=t.fn.scrollspy;t.fn.scrollspy=s,t.fn.scrollspy.Constructor=e,t.fn.scrollspy.noConflict=function(){return t.fn.scrollspy=i,this},t(window).on("load.bs.scrollspy.data-api",function(){t('[data-spy="scroll"]').each(function(){var e=t(this);s.call(e,e.data())})})}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.tab");o||i.data("bs.tab",o=new s(this)),"string"==typeof e&&o[e]()})}var s=function(e){this.element=t(e)};s.VERSION="3.3.1",s.TRANSITION_DURATION=150,s.amora.show=function(){var e=this.element,s=e.closest("ul:not(.dropdown-menu)"),i=e.data("target");if(i||(i=e.attr("href"),i=i&&i.replace(/.*(?=#[^\s]*$)/,"")),!e.parent("li").hasClass("active")){var o=s.find(".active:last a"),n=t.Event("hide.bs.tab",{relatedTarget:e[0]}),r=t.Event("show.bs.tab",{relatedTarget:o[0]});if(o.trigger(n),e.trigger(r),!r.isDefaultPrevented()&&!n.isDefaultPrevented()){var a=t(i);this.activate(e.closest("li"),s),this.activate(a,a.parent(),function(){o.trigger({type:"hidden.bs.tab",relatedTarget:e[0]}),e.trigger({type:"shown.bs.tab",relatedTarget:o[0]})
})}}},s.amora.activate=function(e,i,o){function n(){r.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),a?(e[0].offsetWidth,e.addClass("in")):e.removeClass("fade"),e.parent(".dropdown-menu")&&e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),o&&o()}var r=i.find("> .active"),a=o&&t.support.transition&&(r.length&&r.hasClass("fade")||!!i.find("> .fade").length);r.length&&a?r.one("bsTransitionEnd",n).emulateTransitionEnd(s.TRANSITION_DURATION):n(),r.removeClass("in")};var i=t.fn.tab;t.fn.tab=e,t.fn.tab.Constructor=s,t.fn.tab.noConflict=function(){return t.fn.tab=i,this};var o=function(s){s.preventDefault(),e.call(t(this),"show")};t(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',o).on("click.bs.tab.data-api",'[data-toggle="pill"]',o)}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var i=t(this),o=i.data("bs.affix"),n="object"==typeof e&&e;o||i.data("bs.affix",o=new s(this,n)),"string"==typeof e&&o[e]()})}var s=function(e,i){this.options=t.extend({},s.DEFAULTS,i),this.$target=t(this.options.target).on("scroll.bs.affix.data-api",t.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",t.proxy(this.checkPositionWithEventLoop,this)),this.$element=t(e),this.affixed=this.unpin=this.pinnedOffset=null,this.checkPosition()};s.VERSION="3.3.1",s.RESET="affix affix-top affix-bottom",s.DEFAULTS={offset:0,target:window},s.amora.getState=function(t,e,s,i){var o=this.$target.scrollTop(),n=this.$element.offset(),r=this.$target.height();if(null!=s&&"top"==this.affixed)return s>o?"top":!1;if("bottom"==this.affixed)return null!=s?o+this.unpin<=n.top?!1:"bottom":t-i>=o+r?!1:"bottom";var a=null==this.affixed,l=a?o:n.top,h=a?r:e;return null!=s&&s>=l?"top":null!=i&&l+h>=t-i?"bottom":!1},s.amora.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(s.RESET).addClass("affix");var t=this.$target.scrollTop(),e=this.$element.offset();return this.pinnedOffset=e.top-t},s.amora.checkPositionWithEventLoop=function(){setTimeout(t.proxy(this.checkPosition,this),1)},s.amora.checkPosition=function(){if(this.$element.is(":visible")){var e=this.$element.height(),i=this.options.offset,o=i.top,n=i.bottom,r=t("body").height();"object"!=typeof i&&(n=o=i),"function"==typeof o&&(o=i.top(this.$element)),"function"==typeof n&&(n=i.bottom(this.$element));var a=this.getState(r,e,o,n);if(this.affixed!=a){null!=this.unpin&&this.$element.css("top","");var l="affix"+(a?"-"+a:""),h=t.Event(l+".bs.affix");if(this.$element.trigger(h),h.isDefaultPrevented())return;this.affixed=a,this.unpin="bottom"==a?this.getPinnedOffset():null,this.$element.removeClass(s.RESET).addClass(l).trigger(l.replace("affix","affixed")+".bs.affix")}"bottom"==a&&this.$element.offset({top:r-e-n})}};var i=t.fn.affix;t.fn.affix=e,t.fn.affix.Constructor=s,t.fn.affix.noConflict=function(){return t.fn.affix=i,this},t(window).on("load",function(){t('[data-spy="affix"]').each(function(){var s=t(this),i=s.data();i.offset=i.offset||{},null!=i.offsetBottom&&(i.offset.bottom=i.offsetBottom),null!=i.offsetTop&&(i.offset.top=i.offsetTop),e.call(s,i)})})}(jQuery);