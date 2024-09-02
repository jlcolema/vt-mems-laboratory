!function(e,t,n){function a(e,t){return typeof e===t}function i(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):w?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function r(){var e=t.body;return e||(e=i(w?"svg":"body"),e.fake=!0),e}function s(e,n,a,s){var o,l,c,u,d="modernizr",v=i("div"),p=r();if(parseInt(a,10))for(;a--;)c=i("div"),c.id=s?s[a]:d+(a+1),v.appendChild(c);return o=i("style"),o.type="text/css",o.id="s"+d,(p.fake?p:v).appendChild(o),p.appendChild(v),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(t.createTextNode(e)),v.id=d,p.fake&&(p.style.background="",p.style.overflow="hidden",u=b.style.overflow,b.style.overflow="hidden",b.appendChild(p)),l=n(v,e),p.fake?(p.parentNode.removeChild(p),b.style.overflow=u,b.offsetHeight):v.parentNode.removeChild(v),!!l}function o(e,t){return!!~(""+e).indexOf(t)}function l(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function c(e,t){return function(){return e.apply(t,arguments)}}function u(e,t,n){var i;for(var r in e)if(e[r]in t)return!1===n?e[r]:(i=t[e[r]],a(i,"function")?c(i,n||t):i);return!1}function d(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function v(t,n,a){var i;if("getComputedStyle"in e){i=getComputedStyle.call(e,t,n);var r=e.console;if(null!==i)a&&(i=i.getPropertyValue(a));else if(r){var s=r.error?"error":"log";r[s].call(r,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else i=!n&&t.currentStyle&&t.currentStyle[a];return i}function p(t,a){var i=t.length;if("CSS"in e&&"supports"in e.CSS){for(;i--;)if(e.CSS.supports(d(t[i]),a))return!0;return!1}if("CSSSupportsRule"in e){for(var r=[];i--;)r.push("("+d(t[i])+":"+a+")");return r=r.join(" or "),s("@supports ("+r+") { #modernizr { position: absolute; } }",function(e){return"absolute"==v(e,null,"position")})}return n}function m(e,t,r,s){function c(){d&&(delete E.style,delete E.modElem)}if(s=!a(s,"undefined")&&s,!a(r,"undefined")){var u=p(e,r);if(!a(u,"undefined"))return u}for(var d,v,m,f,g,h=["modernizr","tspan","samp"];!E.style&&h.length;)d=!0,E.modElem=i(h.shift()),E.style=E.modElem.style;for(m=e.length,v=0;v<m;v++)if(f=e[v],g=E.style[f],o(f,"-")&&(f=l(f)),E.style[f]!==n){if(s||a(r,"undefined"))return c(),"pfx"!=t||f;try{E.style[f]=r}catch(e){}if(E.style[f]!=g)return c(),"pfx"!=t||f}return c(),!1}function f(e,t,n,i,r){var s=e.charAt(0).toUpperCase()+e.slice(1),o=(e+" "+P.join(s+" ")+s).split(" ");return a(t,"string")||a(t,"undefined")?m(o,t,i,r):(o=(e+" "+M.join(s+" ")+s).split(" "),u(o,t,n))}function g(e,t,a){return f(e,n,n,t,a)}var h=[],y=[],S={_version:"3.4.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){y.push({name:e,fn:t,options:n})},addAsyncTest:function(e){y.push({name:null,fn:e})}},x=function(){};x.prototype=S,x=new x;var b=t.documentElement,w="svg"===b.nodeName.toLowerCase(),C=S._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];S._prefixes=C;var T=S.testStyles=s;x.addTest("touchevents",function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var a=["@media (",C.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");T(a,function(e){n=9===e.offsetTop})}return n});var N="Moz O ms Webkit",P=S._config.usePrefixes?N.split(" "):[];S._cssomPrefixes=P;var M=S._config.usePrefixes?N.toLowerCase().split(" "):[];S._domPrefixes=M;var A={elem:i("modernizr")};x._q.push(function(){delete A.elem});var E={style:A.elem.style};x._q.unshift(function(){delete E.style}),S.testAllProps=f,S.testAllProps=g,x.addTest("flexbox",g("flexBasis","1px",!0)),function(){var e,t,n,i,r,s,o;for(var l in y)if(y.hasOwnProperty(l)){if(e=[],t=y[l],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(i=a(t.fn,"function")?t.fn():t.fn,r=0;r<e.length;r++)s=e[r],o=s.split("."),1===o.length?x[o[0]]=i:(!x[o[0]]||x[o[0]]instanceof Boolean||(x[o[0]]=new Boolean(x[o[0]])),x[o[0]][o[1]]=i),h.push((i?"":"no-")+o.join("-"))}}(),function(e){var t=b.className,n=x._config.classPrefix||"";if(w&&(t=t.baseVal),x._config.enableJSClass){var a=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(a,"$1"+n+"js$2")}x._config.enableClasses&&(t+=" "+n+e.join(" "+n),w?b.className.baseVal=t:b.className=t)}(h),delete S.addTest,delete S.addAsyncTest;for(var I=0;I<x._q.length;I++)x._q[I]();e.Modernizr=x}(window,document),function(e){var t=!0;e.flexslider=function(n,a){var i=e(n);i.vars=e.extend({},e.flexslider.defaults,a);var r,s=i.vars.namespace,o=window.navigator&&window.navigator.msPointerEnabled&&window.MSGesture,l=("ontouchstart"in window||o||window.DocumentTouch&&document instanceof DocumentTouch)&&i.vars.touch,c="click touchend MSPointerUp keyup",u="",d="vertical"===i.vars.direction,v=i.vars.reverse,p=i.vars.itemWidth>0,m="fade"===i.vars.animation,f=""!==i.vars.asNavFor,g={};e.data(n,"flexslider",i),g={init:function(){i.animating=!1,i.currentSlide=parseInt(i.vars.startAt?i.vars.startAt:0,10),isNaN(i.currentSlide)&&(i.currentSlide=0),i.animatingTo=i.currentSlide,i.atEnd=0===i.currentSlide||i.currentSlide===i.last,i.containerSelector=i.vars.selector.substr(0,i.vars.selector.search(" ")),i.slides=e(i.vars.selector,i),i.container=e(i.containerSelector,i),i.count=i.slides.length,i.syncExists=e(i.vars.sync).length>0,"slide"===i.vars.animation&&(i.vars.animation="swing"),i.prop=d?"top":"marginLeft",i.args={},i.manualPause=!1,i.stopped=!1,i.started=!1,i.startTimeout=null,i.transitions=!i.vars.video&&!m&&i.vars.useCSS&&function(){var e=document.createElement("div"),t=["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"];for(var n in t)if(void 0!==e.style[t[n]])return i.pfx=t[n].replace("Perspective","").toLowerCase(),i.prop="-"+i.pfx+"-transform",!0;return!1}(),i.ensureAnimationEnd="",""!==i.vars.controlsContainer&&(i.controlsContainer=e(i.vars.controlsContainer).length>0&&e(i.vars.controlsContainer)),""!==i.vars.manualControls&&(i.manualControls=e(i.vars.manualControls).length>0&&e(i.vars.manualControls)),""!==i.vars.customDirectionNav&&(i.customDirectionNav=2===e(i.vars.customDirectionNav).length&&e(i.vars.customDirectionNav)),i.vars.randomize&&(i.slides.sort(function(){return Math.round(Math.random())-.5}),i.container.empty().append(i.slides)),i.doMath(),i.setup("init"),i.vars.controlNav&&g.controlNav.setup(),i.vars.directionNav&&g.directionNav.setup(),i.vars.keyboard&&(1===e(i.containerSelector).length||i.vars.multipleKeyboard)&&e(document).bind("keyup",function(e){var t=e.keyCode;if(!i.animating&&(39===t||37===t)){var n=39===t?i.getTarget("next"):37===t&&i.getTarget("prev");i.flexAnimate(n,i.vars.pauseOnAction)}}),i.vars.mousewheel&&i.bind("mousewheel",function(e,t,n,a){e.preventDefault();var r=t<0?i.getTarget("next"):i.getTarget("prev");i.flexAnimate(r,i.vars.pauseOnAction)}),i.vars.pausePlay&&g.pausePlay.setup(),i.vars.slideshow&&i.vars.pauseInvisible&&g.pauseInvisible.init(),i.vars.slideshow&&(i.vars.pauseOnHover&&i.hover(function(){i.manualPlay||i.manualPause||i.pause()},function(){i.manualPause||i.manualPlay||i.stopped||i.play()}),i.vars.pauseInvisible&&g.pauseInvisible.isHidden()||(i.vars.initDelay>0?i.startTimeout=setTimeout(i.play,i.vars.initDelay):i.play())),f&&g.asNav.setup(),l&&i.vars.touch&&g.touch(),(!m||m&&i.vars.smoothHeight)&&e(window).bind("resize orientationchange focus",g.resize),i.find("img").attr("draggable","false"),setTimeout(function(){i.vars.start(i)},200)},asNav:{setup:function(){i.asNav=!0,i.animatingTo=Math.floor(i.currentSlide/i.move),i.currentItem=i.currentSlide,i.slides.removeClass(s+"active-slide").eq(i.currentItem).addClass(s+"active-slide"),o?(n._slider=i,i.slides.each(function(){var t=this;t._gesture=new MSGesture,t._gesture.target=t,t.addEventListener("MSPointerDown",function(e){e.preventDefault(),e.currentTarget._gesture&&e.currentTarget._gesture.addPointer(e.pointerId)},!1),t.addEventListener("MSGestureTap",function(t){t.preventDefault();var n=e(this),a=n.index();e(i.vars.asNavFor).data("flexslider").animating||n.hasClass("active")||(i.direction=i.currentItem<a?"next":"prev",i.flexAnimate(a,i.vars.pauseOnAction,!1,!0,!0))})})):i.slides.on(c,function(t){t.preventDefault();var n=e(this),a=n.index();n.offset().left-e(i).scrollLeft()<=0&&n.hasClass(s+"active-slide")?i.flexAnimate(i.getTarget("prev"),!0):e(i.vars.asNavFor).data("flexslider").animating||n.hasClass(s+"active-slide")||(i.direction=i.currentItem<a?"next":"prev",i.flexAnimate(a,i.vars.pauseOnAction,!1,!0,!0))})}},controlNav:{setup:function(){i.manualControls?g.controlNav.setupManual():g.controlNav.setupPaging()},setupPaging:function(){var t,n,a="thumbnails"===i.vars.controlNav?"control-thumbs":"control-paging",r=1;if(i.controlNavScaffold=e('<ol class="'+s+"control-nav "+s+a+'"></ol>'),i.pagingCount>1)for(var o=0;o<i.pagingCount;o++){n=i.slides.eq(o),void 0===n.attr("data-thumb-alt")&&n.attr("data-thumb-alt","");var l=""!==n.attr("data-thumb-alt")?l=' alt="'+n.attr("data-thumb-alt")+'"':"";if(t="thumbnails"===i.vars.controlNav?'<img src="'+n.attr("data-thumb")+'"'+l+"/>":'<a href="#">'+r+"</a>","thumbnails"===i.vars.controlNav&&!0===i.vars.thumbCaptions){var d=n.attr("data-thumbcaption");""!==d&&void 0!==d&&(t+='<span class="'+s+'caption">'+d+"</span>")}i.controlNavScaffold.append("<li>"+t+"</li>"),r++}i.controlsContainer?e(i.controlsContainer).append(i.controlNavScaffold):i.append(i.controlNavScaffold),g.controlNav.set(),g.controlNav.active(),i.controlNavScaffold.delegate("a, img",c,function(t){if(t.preventDefault(),""===u||u===t.type){var n=e(this),a=i.controlNav.index(n);n.hasClass(s+"active")||(i.direction=a>i.currentSlide?"next":"prev",i.flexAnimate(a,i.vars.pauseOnAction))}""===u&&(u=t.type),g.setToClearWatchedEvent()})},setupManual:function(){i.controlNav=i.manualControls,g.controlNav.active(),i.controlNav.bind(c,function(t){if(t.preventDefault(),""===u||u===t.type){var n=e(this),a=i.controlNav.index(n);n.hasClass(s+"active")||(a>i.currentSlide?i.direction="next":i.direction="prev",i.flexAnimate(a,i.vars.pauseOnAction))}""===u&&(u=t.type),g.setToClearWatchedEvent()})},set:function(){var t="thumbnails"===i.vars.controlNav?"img":"a";i.controlNav=e("."+s+"control-nav li "+t,i.controlsContainer?i.controlsContainer:i)},active:function(){i.controlNav.removeClass(s+"active").eq(i.animatingTo).addClass(s+"active")},update:function(t,n){i.pagingCount>1&&"add"===t?i.controlNavScaffold.append(e('<li><a href="#">'+i.count+"</a></li>")):1===i.pagingCount?i.controlNavScaffold.find("li").remove():i.controlNav.eq(n).closest("li").remove(),g.controlNav.set(),i.pagingCount>1&&i.pagingCount!==i.controlNav.length?i.update(n,t):g.controlNav.active()}},directionNav:{setup:function(){var t=e('<ul class="'+s+'direction-nav"><li class="'+s+'nav-prev"><a class="'+s+'prev" href="#">'+i.vars.prevText+'</a></li><li class="'+s+'nav-next"><a class="'+s+'next" href="#">'+i.vars.nextText+"</a></li></ul>");i.customDirectionNav?i.directionNav=i.customDirectionNav:i.controlsContainer?(e(i.controlsContainer).append(t),i.directionNav=e("."+s+"direction-nav li a",i.controlsContainer)):(i.append(t),i.directionNav=e("."+s+"direction-nav li a",i)),g.directionNav.update(),i.directionNav.bind(c,function(t){t.preventDefault();var n;""!==u&&u!==t.type||(n=e(this).hasClass(s+"next")?i.getTarget("next"):i.getTarget("prev"),i.flexAnimate(n,i.vars.pauseOnAction)),""===u&&(u=t.type),g.setToClearWatchedEvent()})},update:function(){var e=s+"disabled";1===i.pagingCount?i.directionNav.addClass(e).attr("tabindex","-1"):i.vars.animationLoop?i.directionNav.removeClass(e).removeAttr("tabindex"):0===i.animatingTo?i.directionNav.removeClass(e).filter("."+s+"prev").addClass(e).attr("tabindex","-1"):i.animatingTo===i.last?i.directionNav.removeClass(e).filter("."+s+"next").addClass(e).attr("tabindex","-1"):i.directionNav.removeClass(e).removeAttr("tabindex")}},pausePlay:{setup:function(){var t=e('<div class="'+s+'pauseplay"><a href="#"></a></div>');i.controlsContainer?(i.controlsContainer.append(t),i.pausePlay=e("."+s+"pauseplay a",i.controlsContainer)):(i.append(t),i.pausePlay=e("."+s+"pauseplay a",i)),g.pausePlay.update(i.vars.slideshow?s+"pause":s+"play"),i.pausePlay.bind(c,function(t){t.preventDefault(),""!==u&&u!==t.type||(e(this).hasClass(s+"pause")?(i.manualPause=!0,i.manualPlay=!1,i.pause()):(i.manualPause=!1,i.manualPlay=!0,i.play())),""===u&&(u=t.type),g.setToClearWatchedEvent()})},update:function(e){"play"===e?i.pausePlay.removeClass(s+"pause").addClass(s+"play").html(i.vars.playText):i.pausePlay.removeClass(s+"play").addClass(s+"pause").html(i.vars.pauseText)}},touch:function(){function e(e){e.stopPropagation(),i.animating?e.preventDefault():(i.pause(),n._gesture.addPointer(e.pointerId),w=0,c=d?i.h:i.w,f=Number(new Date),l=p&&v&&i.animatingTo===i.last?0:p&&v?i.limit-(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo:p&&i.currentSlide===i.last?i.limit:p?(i.itemW+i.vars.itemMargin)*i.move*i.currentSlide:v?(i.last-i.currentSlide+i.cloneOffset)*c:(i.currentSlide+i.cloneOffset)*c)}function t(e){e.stopPropagation();var t=e.target._slider;if(t){var a=-e.translationX,i=-e.translationY;if(w+=d?i:a,u=w,S=d?Math.abs(w)<Math.abs(-a):Math.abs(w)<Math.abs(-i),e.detail===e.MSGESTURE_FLAG_INERTIA)return void setImmediate(function(){n._gesture.stop()});(!S||Number(new Date)-f>500)&&(e.preventDefault(),!m&&t.transitions&&(t.vars.animationLoop||(u=w/(0===t.currentSlide&&w<0||t.currentSlide===t.last&&w>0?Math.abs(w)/c+2:1)),t.setProps(l+u,"setTouch")))}}function a(e){e.stopPropagation();var t=e.target._slider;if(t){if(t.animatingTo===t.currentSlide&&!S&&null!==u){var n=v?-u:u,a=n>0?t.getTarget("next"):t.getTarget("prev");t.canAdvance(a)&&(Number(new Date)-f<550&&Math.abs(n)>50||Math.abs(n)>c/2)?t.flexAnimate(a,t.vars.pauseOnAction):m||t.flexAnimate(t.currentSlide,t.vars.pauseOnAction,!0)}r=null,s=null,u=null,l=null,w=0}}var r,s,l,c,u,f,g,h,y,S=!1,x=0,b=0,w=0;o?(n.style.msTouchAction="none",n._gesture=new MSGesture,n._gesture.target=n,n.addEventListener("MSPointerDown",e,!1),n._slider=i,n.addEventListener("MSGestureChange",t,!1),n.addEventListener("MSGestureEnd",a,!1)):(g=function(e){i.animating?e.preventDefault():(window.navigator.msPointerEnabled||1===e.touches.length)&&(i.pause(),c=d?i.h:i.w,f=Number(new Date),x=e.touches[0].pageX,b=e.touches[0].pageY,l=p&&v&&i.animatingTo===i.last?0:p&&v?i.limit-(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo:p&&i.currentSlide===i.last?i.limit:p?(i.itemW+i.vars.itemMargin)*i.move*i.currentSlide:v?(i.last-i.currentSlide+i.cloneOffset)*c:(i.currentSlide+i.cloneOffset)*c,r=d?b:x,s=d?x:b,n.addEventListener("touchmove",h,!1),n.addEventListener("touchend",y,!1))},h=function(e){x=e.touches[0].pageX,b=e.touches[0].pageY,u=d?r-b:r-x,S=d?Math.abs(u)<Math.abs(x-s):Math.abs(u)<Math.abs(b-s);(!S||Number(new Date)-f>500)&&(e.preventDefault(),!m&&i.transitions&&(i.vars.animationLoop||(u/=0===i.currentSlide&&u<0||i.currentSlide===i.last&&u>0?Math.abs(u)/c+2:1),i.setProps(l+u,"setTouch")))},y=function(e){if(n.removeEventListener("touchmove",h,!1),i.animatingTo===i.currentSlide&&!S&&null!==u){var t=v?-u:u,a=t>0?i.getTarget("next"):i.getTarget("prev");i.canAdvance(a)&&(Number(new Date)-f<550&&Math.abs(t)>50||Math.abs(t)>c/2)?i.flexAnimate(a,i.vars.pauseOnAction):m||i.flexAnimate(i.currentSlide,i.vars.pauseOnAction,!0)}n.removeEventListener("touchend",y,!1),r=null,s=null,u=null,l=null},n.addEventListener("touchstart",g,!1))},resize:function(){!i.animating&&i.is(":visible")&&(p||i.doMath(),m?g.smoothHeight():p?(i.slides.width(i.computedW),i.update(i.pagingCount),i.setProps()):d?(i.viewport.height(i.h),i.setProps(i.h,"setTotal")):(i.vars.smoothHeight&&g.smoothHeight(),i.newSlides.width(i.computedW),i.setProps(i.computedW,"setTotal")))},smoothHeight:function(e){if(!d||m){var t=m?i:i.viewport;e?t.animate({height:i.slides.eq(i.animatingTo).innerHeight()},e):t.innerHeight(i.slides.eq(i.animatingTo).innerHeight())}},sync:function(t){var n=e(i.vars.sync).data("flexslider"),a=i.animatingTo;switch(t){case"animate":n.flexAnimate(a,i.vars.pauseOnAction,!1,!0);break;case"play":n.playing||n.asNav||n.play();break;case"pause":n.pause()}},uniqueID:function(t){return t.filter("[id]").add(t.find("[id]")).each(function(){var t=e(this);t.attr("id",t.attr("id")+"_clone")}),t},pauseInvisible:{visProp:null,init:function(){var e=g.pauseInvisible.getHiddenProp();if(e){var t=e.replace(/[H|h]idden/,"")+"visibilitychange";document.addEventListener(t,function(){g.pauseInvisible.isHidden()?i.startTimeout?clearTimeout(i.startTimeout):i.pause():i.started?i.play():i.vars.initDelay>0?setTimeout(i.play,i.vars.initDelay):i.play()})}},isHidden:function(){var e=g.pauseInvisible.getHiddenProp();return!!e&&document[e]},getHiddenProp:function(){var e=["webkit","moz","ms","o"];if("hidden"in document)return"hidden";for(var t=0;t<e.length;t++)if(e[t]+"Hidden"in document)return e[t]+"Hidden";return null}},setToClearWatchedEvent:function(){clearTimeout(r),r=setTimeout(function(){u=""},3e3)}},i.flexAnimate=function(t,n,a,r,o){if(i.vars.animationLoop||t===i.currentSlide||(i.direction=t>i.currentSlide?"next":"prev"),f&&1===i.pagingCount&&(i.direction=i.currentItem<t?"next":"prev"),!i.animating&&(i.canAdvance(t,o)||a)&&i.is(":visible")){if(f&&r){var c=e(i.vars.asNavFor).data("flexslider");if(i.atEnd=0===t||t===i.count-1,c.flexAnimate(t,!0,!1,!0,o),i.direction=i.currentItem<t?"next":"prev",c.direction=i.direction,Math.ceil((t+1)/i.visible)-1===i.currentSlide||0===t)return i.currentItem=t,i.slides.removeClass(s+"active-slide").eq(t).addClass(s+"active-slide"),!1;i.currentItem=t,i.slides.removeClass(s+"active-slide").eq(t).addClass(s+"active-slide"),t=Math.floor(t/i.visible)}if(i.animating=!0,i.animatingTo=t,n&&i.pause(),i.vars.before(i),i.syncExists&&!o&&g.sync("animate"),i.vars.controlNav&&g.controlNav.active(),p||i.slides.removeClass(s+"active-slide").eq(t).addClass(s+"active-slide"),i.atEnd=0===t||t===i.last,i.vars.directionNav&&g.directionNav.update(),t===i.last&&(i.vars.end(i),i.vars.animationLoop||i.pause()),m)l?(i.slides.eq(i.currentSlide).css({opacity:0,zIndex:1}),i.slides.eq(t).css({opacity:1,zIndex:2}),i.wrapup(S)):(i.slides.eq(i.currentSlide).css({zIndex:1}).animate({opacity:0},i.vars.animationSpeed,i.vars.easing),i.slides.eq(t).css({zIndex:2}).animate({opacity:1},i.vars.animationSpeed,i.vars.easing,i.wrapup));else{var u,h,y,S=d?i.slides.filter(":first").height():i.computedW;p?(u=i.vars.itemMargin,y=(i.itemW+u)*i.move*i.animatingTo,h=y>i.limit&&1!==i.visible?i.limit:y):h=0===i.currentSlide&&t===i.count-1&&i.vars.animationLoop&&"next"!==i.direction?v?(i.count+i.cloneOffset)*S:0:i.currentSlide===i.last&&0===t&&i.vars.animationLoop&&"prev"!==i.direction?v?0:(i.count+1)*S:v?(i.count-1-t+i.cloneOffset)*S:(t+i.cloneOffset)*S,i.setProps(h,"",i.vars.animationSpeed),i.transitions?(i.vars.animationLoop&&i.atEnd||(i.animating=!1,i.currentSlide=i.animatingTo),i.container.unbind("webkitTransitionEnd transitionend"),i.container.bind("webkitTransitionEnd transitionend",function(){clearTimeout(i.ensureAnimationEnd),i.wrapup(S)}),clearTimeout(i.ensureAnimationEnd),i.ensureAnimationEnd=setTimeout(function(){i.wrapup(S)},i.vars.animationSpeed+100)):i.container.animate(i.args,i.vars.animationSpeed,i.vars.easing,function(){i.wrapup(S)})}i.vars.smoothHeight&&g.smoothHeight(i.vars.animationSpeed)}},i.wrapup=function(e){m||p||(0===i.currentSlide&&i.animatingTo===i.last&&i.vars.animationLoop?i.setProps(e,"jumpEnd"):i.currentSlide===i.last&&0===i.animatingTo&&i.vars.animationLoop&&i.setProps(e,"jumpStart")),i.animating=!1,i.currentSlide=i.animatingTo,i.vars.after(i)},i.animateSlides=function(){!i.animating&&t&&i.flexAnimate(i.getTarget("next"))},i.pause=function(){clearInterval(i.animatedSlides),i.animatedSlides=null,i.playing=!1,i.vars.pausePlay&&g.pausePlay.update("play"),i.syncExists&&g.sync("pause")},i.play=function(){i.playing&&clearInterval(i.animatedSlides),i.animatedSlides=i.animatedSlides||setInterval(i.animateSlides,i.vars.slideshowSpeed),i.started=i.playing=!0,i.vars.pausePlay&&g.pausePlay.update("pause"),i.syncExists&&g.sync("play")},i.stop=function(){i.pause(),i.stopped=!0},i.canAdvance=function(e,t){var n=f?i.pagingCount-1:i.last;return!!t||(!(!f||i.currentItem!==i.count-1||0!==e||"prev"!==i.direction)||(!f||0!==i.currentItem||e!==i.pagingCount-1||"next"===i.direction)&&(!(e===i.currentSlide&&!f)&&(!!i.vars.animationLoop||(!i.atEnd||0!==i.currentSlide||e!==n||"next"===i.direction)&&(!i.atEnd||i.currentSlide!==n||0!==e||"next"!==i.direction))))},i.getTarget=function(e){return i.direction=e,"next"===e?i.currentSlide===i.last?0:i.currentSlide+1:0===i.currentSlide?i.last:i.currentSlide-1},i.setProps=function(e,t,n){var a=function(){var n=e||(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo;return-1*function(){if(p)return"setTouch"===t?e:v&&i.animatingTo===i.last?0:v?i.limit-(i.itemW+i.vars.itemMargin)*i.move*i.animatingTo:i.animatingTo===i.last?i.limit:n;switch(t){case"setTotal":return v?(i.count-1-i.currentSlide+i.cloneOffset)*e:(i.currentSlide+i.cloneOffset)*e;case"setTouch":return e;case"jumpEnd":return v?e:i.count*e;case"jumpStart":return v?i.count*e:e;default:return e}}()+"px"}();i.transitions&&(a=d?"translate3d(0,"+a+",0)":"translate3d("+a+",0,0)",n=void 0!==n?n/1e3+"s":"0s",i.container.css("-"+i.pfx+"-transition-duration",n),i.container.css("transition-duration",n)),i.args[i.prop]=a,(i.transitions||void 0===n)&&i.container.css(i.args),i.container.css("transform",a)},i.setup=function(t){if(m)i.slides.css({width:"100%",float:"left",marginRight:"-100%",position:"relative"}),"init"===t&&(l?i.slides.css({opacity:0,display:"block",webkitTransition:"opacity "+i.vars.animationSpeed/1e3+"s ease",zIndex:1}).eq(i.currentSlide).css({opacity:1,zIndex:2}):0==i.vars.fadeFirstSlide?i.slides.css({opacity:0,display:"block",zIndex:1}).eq(i.currentSlide).css({zIndex:2}).css({opacity:1}):i.slides.css({opacity:0,display:"block",zIndex:1}).eq(i.currentSlide).css({zIndex:2}).animate({opacity:1},i.vars.animationSpeed,i.vars.easing)),i.vars.smoothHeight&&g.smoothHeight();else{var n,a;"init"===t&&(i.viewport=e('<div class="'+s+'viewport"></div>').css({overflow:"hidden",position:"relative"}).appendTo(i).append(i.container),i.cloneCount=0,i.cloneOffset=0,v&&(a=e.makeArray(i.slides).reverse(),i.slides=e(a),i.container.empty().append(i.slides))),i.vars.animationLoop&&!p&&(i.cloneCount=2,i.cloneOffset=1,"init"!==t&&i.container.find(".clone").remove(),i.container.append(g.uniqueID(i.slides.first().clone().addClass("clone")).attr("aria-hidden","true")).prepend(g.uniqueID(i.slides.last().clone().addClass("clone")).attr("aria-hidden","true"))),i.newSlides=e(i.vars.selector,i),n=v?i.count-1-i.currentSlide+i.cloneOffset:i.currentSlide+i.cloneOffset,d&&!p?(i.container.height(200*(i.count+i.cloneCount)+"%").css("position","absolute").width("100%"),setTimeout(function(){i.newSlides.css({display:"block"}),i.doMath(),i.viewport.height(i.h),i.setProps(n*i.h,"init")},"init"===t?100:0)):(i.container.width(200*(i.count+i.cloneCount)+"%"),i.setProps(n*i.computedW,"init"),setTimeout(function(){i.doMath(),i.newSlides.css({width:i.computedW,marginRight:i.computedM,float:"left",display:"block"}),i.vars.smoothHeight&&g.smoothHeight()},"init"===t?100:0))}p||i.slides.removeClass(s+"active-slide").eq(i.currentSlide).addClass(s+"active-slide"),i.vars.init(i)},i.doMath=function(){var e=i.slides.first(),t=i.vars.itemMargin,n=i.vars.minItems,a=i.vars.maxItems;i.w=void 0===i.viewport?i.width():i.viewport.width(),i.h=e.height(),i.boxPadding=e.outerWidth()-e.width(),p?(i.itemT=i.vars.itemWidth+t,i.itemM=t,i.minW=n?n*i.itemT:i.w,i.maxW=a?a*i.itemT-t:i.w,i.itemW=i.minW>i.w?(i.w-t*(n-1))/n:i.maxW<i.w?(i.w-t*(a-1))/a:i.vars.itemWidth>i.w?i.w:i.vars.itemWidth,i.visible=Math.floor(i.w/i.itemW),i.move=i.vars.move>0&&i.vars.move<i.visible?i.vars.move:i.visible,i.pagingCount=Math.ceil((i.count-i.visible)/i.move+1),i.last=i.pagingCount-1,i.limit=1===i.pagingCount?0:i.vars.itemWidth>i.w?i.itemW*(i.count-1)+t*(i.count-1):(i.itemW+t)*i.count-i.w-t):(i.itemW=i.w,i.itemM=t,i.pagingCount=i.count,i.last=i.count-1),i.computedW=i.itemW-i.boxPadding,i.computedM=i.itemM},i.update=function(e,t){i.doMath(),p||(e<i.currentSlide?i.currentSlide+=1:e<=i.currentSlide&&0!==e&&(i.currentSlide-=1),i.animatingTo=i.currentSlide),i.vars.controlNav&&!i.manualControls&&("add"===t&&!p||i.pagingCount>i.controlNav.length?g.controlNav.update("add"):("remove"===t&&!p||i.pagingCount<i.controlNav.length)&&(p&&i.currentSlide>i.last&&(i.currentSlide-=1,i.animatingTo-=1),g.controlNav.update("remove",i.last))),i.vars.directionNav&&g.directionNav.update()},i.addSlide=function(t,n){var a=e(t);i.count+=1,i.last=i.count-1,d&&v?void 0!==n?i.slides.eq(i.count-n).after(a):i.container.prepend(a):void 0!==n?i.slides.eq(n).before(a):i.container.append(a),i.update(n,"add"),i.slides=e(i.vars.selector+":not(.clone)",i),i.setup(),i.vars.added(i)},i.removeSlide=function(t){var n=isNaN(t)?i.slides.index(e(t)):t;i.count-=1,i.last=i.count-1,isNaN(t)?e(t,i.slides).remove():d&&v?i.slides.eq(i.last).remove():i.slides.eq(t).remove(),i.doMath(),i.update(n,"remove"),i.slides=e(i.vars.selector+":not(.clone)",i),i.setup(),i.vars.removed(i)},g.init()},e(window).blur(function(e){t=!1}).focus(function(e){t=!0}),e.flexslider.defaults={namespace:"flex-",selector:".slides > li",animation:"fade",easing:"swing",direction:"horizontal",reverse:!1,animationLoop:!0,smoothHeight:!1,startAt:0,slideshow:!0,slideshowSpeed:7e3,animationSpeed:600,initDelay:0,randomize:!1,fadeFirstSlide:!0,thumbCaptions:!1,pauseOnAction:!0,pauseOnHover:!1,pauseInvisible:!0,useCSS:!0,touch:!0,video:!1,controlNav:!0,directionNav:!0,prevText:"Previous",nextText:"Next",keyboard:!0,multipleKeyboard:!1,mousewheel:!1,pausePlay:!1,pauseText:"Pause",playText:"Play",controlsContainer:"",manualControls:"",customDirectionNav:"",sync:"",asNavFor:"",itemWidth:0,itemMargin:0,minItems:1,maxItems:0,move:0,allowOneSlide:!0,start:function(){},before:function(){},after:function(){},end:function(){},added:function(){},removed:function(){},init:function(){}},e.fn.flexslider=function(t){if(void 0===t&&(t={}),"object"==typeof t)return this.each(function(){var n=e(this),a=t.selector?t.selector:".slides > li",i=n.find(a);1===i.length&&!1===t.allowOneSlide||0===i.length?(i.fadeIn(400),t.start&&t.start(n)):void 0===n.data("flexslider")&&new e.flexslider(this,t)});var n=e(this).data("flexslider");switch(t){case"play":n.play();break;case"pause":n.pause();break;case"stop":n.stop();break;case"next":n.flexAnimate(n.getTarget("next"),!0);break;case"prev":case"previous":n.flexAnimate(n.getTarget("prev"),!0);break;default:"number"==typeof t&&n.flexAnimate(t,!0)}}}(jQuery),function(e){e(document).ready(function(){e(".primary-navigation").find(".toggle").click(function(){e(this).toggleClass("active"),e(this).next("ul").toggleClass("open")})}),e(window).load(function(){e(".flexslider").flexslider({animation:"fade",slideshowSpeed:7e3,useCSS:!0,controlNav:!1,directionNav:!0,start:function(t){e("body").removeClass("loading")}})}),e(window).resize(function(){})}(window.jQuery);