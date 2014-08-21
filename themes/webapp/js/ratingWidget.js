/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-generatedcontent-csstransitions-input-inputtypes-svg-cssclasses-teststyles-testprop-testallprops-domprefixes
 */
;



window.Modernizr = (function( window, document, undefined ) {

    var version = '2.6.2',

    Modernizr = {},

    enableClasses = true,

    docElement = document.documentElement,

    mod = 'modernizr',
    modElem = document.createElement(mod),
    mStyle = modElem.style,

    inputElem  = document.createElement('input')  ,

    smile = ':)',

    toString = {}.toString,    omPrefixes = 'Webkit Moz O ms',

    cssomPrefixes = omPrefixes.split(' '),

    domPrefixes = omPrefixes.toLowerCase().split(' '),

    ns = {'svg': 'http://www.w3.org/2000/svg'},

    tests = {},
    inputs = {},
    attrs = {},

    classes = [],

    slice = classes.slice,

    featureName, 


    injectElementWithStyles = function( rule, callback, nodes, testnames ) {

      var style, ret, node, docOverflow,
          div = document.createElement('div'),
                body = document.body,
                fakeBody = body || document.createElement('body');

      if ( parseInt(nodes, 10) ) {
                      while ( nodes-- ) {
              node = document.createElement('div');
              node.id = testnames ? testnames[nodes] : mod + (nodes + 1);
              div.appendChild(node);
          }
      }

                style = ['&#173;','<style id="s', mod, '">', rule, '</style>'].join('');
      div.id = mod;
          (body ? div : fakeBody).innerHTML += style;
      fakeBody.appendChild(div);
      if ( !body ) {
                fakeBody.style.background = '';
                fakeBody.style.overflow = 'hidden';
          docOverflow = docElement.style.overflow;
          docElement.style.overflow = 'hidden';
          docElement.appendChild(fakeBody);
      }

      ret = callback(div, rule);
        if ( !body ) {
          fakeBody.parentNode.removeChild(fakeBody);
          docElement.style.overflow = docOverflow;
      } else {
          div.parentNode.removeChild(div);
      }

      return !!ret;

    },
    _hasOwnProperty = ({}).hasOwnProperty, hasOwnProp;

    if ( !is(_hasOwnProperty, 'undefined') && !is(_hasOwnProperty.call, 'undefined') ) {
      hasOwnProp = function (object, property) {
        return _hasOwnProperty.call(object, property);
      };
    }
    else {
      hasOwnProp = function (object, property) { 
        return ((property in object) && is(object.constructor.prototype[property], 'undefined'));
      };
    }


    if (!Function.prototype.bind) {
      Function.prototype.bind = function bind(that) {

        var target = this;

        if (typeof target != "function") {
            throw new TypeError();
        }

        var args = slice.call(arguments, 1),
            bound = function () {

            if (this instanceof bound) {

              var F = function(){};
              F.prototype = target.prototype;
              var self = new F();

              var result = target.apply(
                  self,
                  args.concat(slice.call(arguments))
              );
              if (Object(result) === result) {
                  return result;
              }
              return self;

            } else {

              return target.apply(
                  that,
                  args.concat(slice.call(arguments))
              );

            }

        };

        return bound;
      };
    }

    function setCss( str ) {
        mStyle.cssText = str;
    }

    function setCssAll( str1, str2 ) {
        return setCss(prefixes.join(str1 + ';') + ( str2 || '' ));
    }

    function is( obj, type ) {
        return typeof obj === type;
    }

    function contains( str, substr ) {
        return !!~('' + str).indexOf(substr);
    }

    function testProps( props, prefixed ) {
        for ( var i in props ) {
            var prop = props[i];
            if ( !contains(prop, "-") && mStyle[prop] !== undefined ) {
                return prefixed == 'pfx' ? prop : true;
            }
        }
        return false;
    }

    function testDOMProps( props, obj, elem ) {
        for ( var i in props ) {
            var item = obj[props[i]];
            if ( item !== undefined) {

                            if (elem === false) return props[i];

                            if (is(item, 'function')){
                                return item.bind(elem || obj);
                }

                            return item;
            }
        }
        return false;
    }

    function testPropsAll( prop, prefixed, elem ) {

        var ucProp  = prop.charAt(0).toUpperCase() + prop.slice(1),
            props   = (prop + ' ' + cssomPrefixes.join(ucProp + ' ') + ucProp).split(' ');

            if(is(prefixed, "string") || is(prefixed, "undefined")) {
          return testProps(props, prefixed);

            } else {
          props = (prop + ' ' + (domPrefixes).join(ucProp + ' ') + ucProp).split(' ');
          return testDOMProps(props, prefixed, elem);
        }
    }

    tests['csstransitions'] = function() {
        return testPropsAll('transition');
    };



    tests['fontface'] = function() {
        var bool;

        injectElementWithStyles('@font-face {font-family:"font";src:url("https://")}', function( node, rule ) {
          var style = document.getElementById('smodernizr'),
              sheet = style.sheet || style.styleSheet,
              cssText = sheet ? (sheet.cssRules && sheet.cssRules[0] ? sheet.cssRules[0].cssText : sheet.cssText || '') : '';

          bool = /src/i.test(cssText) && cssText.indexOf(rule.split(' ')[0]) === 0;
        });

        return bool;
    };

    tests['generatedcontent'] = function() {
        var bool;

        injectElementWithStyles(['#',mod,'{font:0/0 a}#',mod,':after{content:"',smile,'";visibility:hidden;font:3px/1 a}'].join(''), function( node ) {
          bool = node.offsetHeight >= 3;
        });

        return bool;
    };
    tests['svg'] = function() {
        return !!document.createElementNS && !!document.createElementNS(ns.svg, 'svg').createSVGRect;
    };
    function webforms() {
                                            Modernizr['input'] = (function( props ) {
            for ( var i = 0, len = props.length; i < len; i++ ) {
                attrs[ props[i] ] = !!(props[i] in inputElem);
            }
            if (attrs.list){
                                  attrs.list = !!(document.createElement('datalist') && window.HTMLDataListElement);
            }
            return attrs;
        })('autocomplete autofocus list placeholder max min multiple pattern required step'.split(' '));
                            Modernizr['inputtypes'] = (function(props) {

            for ( var i = 0, bool, inputElemType, defaultView, len = props.length; i < len; i++ ) {

                inputElem.setAttribute('type', inputElemType = props[i]);
                bool = inputElem.type !== 'text';

                                                    if ( bool ) {

                    inputElem.value         = smile;
                    inputElem.style.cssText = 'position:absolute;visibility:hidden;';

                    if ( /^range$/.test(inputElemType) && inputElem.style.WebkitAppearance !== undefined ) {

                      docElement.appendChild(inputElem);
                      defaultView = document.defaultView;

                                        bool =  defaultView.getComputedStyle &&
                              defaultView.getComputedStyle(inputElem, null).WebkitAppearance !== 'textfield' &&
                                                                                  (inputElem.offsetHeight !== 0);

                      docElement.removeChild(inputElem);

                    } else if ( /^(search|tel)$/.test(inputElemType) ){
                                                                                    } else if ( /^(url|email)$/.test(inputElemType) ) {
                                        bool = inputElem.checkValidity && inputElem.checkValidity() === false;

                    } else {
                                        bool = inputElem.value != smile;
                    }
                }

                inputs[ props[i] ] = !!bool;
            }
            return inputs;
        })('search tel url email datetime date month week time datetime-local number range color'.split(' '));
        }
    for ( var feature in tests ) {
        if ( hasOwnProp(tests, feature) ) {
                                    featureName  = feature.toLowerCase();
            Modernizr[featureName] = tests[feature]();

            classes.push((Modernizr[featureName] ? '' : 'no-') + featureName);
        }
    }

    Modernizr.input || webforms();


     Modernizr.addTest = function ( feature, test ) {
       if ( typeof feature == 'object' ) {
         for ( var key in feature ) {
           if ( hasOwnProp( feature, key ) ) {
             Modernizr.addTest( key, feature[ key ] );
           }
         }
       } else {

         feature = feature.toLowerCase();

         if ( Modernizr[feature] !== undefined ) {
                                              return Modernizr;
         }

         test = typeof test == 'function' ? test() : test;

         if (typeof enableClasses !== "undefined" && enableClasses) {
           docElement.className += ' ' + (test ? '' : 'no-') + feature;
         }
         Modernizr[feature] = test;

       }

       return Modernizr; 
     };


    setCss('');
    modElem = inputElem = null;


    Modernizr._version      = version;

    Modernizr._domPrefixes  = domPrefixes;
    Modernizr._cssomPrefixes  = cssomPrefixes;



    Modernizr.testProp      = function(prop){
        return testProps([prop]);
    };

    Modernizr.testAllProps  = testPropsAll;


    Modernizr.testStyles    = injectElementWithStyles;    docElement.className = docElement.className.replace(/(^|\s)no-js(\s|$)/, '$1$2') +

                                                    (enableClasses ? ' js ' + classes.join(' ') : '');

    return Modernizr;

})(this, this.document);
;

/*! jQuery v1.8.3 jquery.com | jquery.org/license */
(function(e,t){function _(e){var t=M[e]={};return v.each(e.split(y),function(e,n){t[n]=!0}),t}function H(e,n,r){if(r===t&&e.nodeType===1){var i="data-"+n.replace(P,"-$1").toLowerCase();r=e.getAttribute(i);if(typeof r=="string"){try{r=r==="true"?!0:r==="false"?!1:r==="null"?null:+r+""===r?+r:D.test(r)?v.parseJSON(r):r}catch(s){}v.data(e,n,r)}else r=t}return r}function B(e){var t;for(t in e){if(t==="data"&&v.isEmptyObject(e[t]))continue;if(t!=="toJSON")return!1}return!0}function et(){return!1}function tt(){return!0}function ut(e){return!e||!e.parentNode||e.parentNode.nodeType===11}function at(e,t){do e=e[t];while(e&&e.nodeType!==1);return e}function ft(e,t,n){t=t||0;if(v.isFunction(t))return v.grep(e,function(e,r){var i=!!t.call(e,r,e);return i===n});if(t.nodeType)return v.grep(e,function(e,r){return e===t===n});if(typeof t=="string"){var r=v.grep(e,function(e){return e.nodeType===1});if(it.test(t))return v.filter(t,r,!n);t=v.filter(t,r)}return v.grep(e,function(e,r){return v.inArray(e,t)>=0===n})}function lt(e){var t=ct.split("|"),n=e.createDocumentFragment();if(n.createElement)while(t.length)n.createElement(t.pop());return n}function Lt(e,t){return e.getElementsByTagName(t)[0]||e.appendChild(e.ownerDocument.createElement(t))}function At(e,t){if(t.nodeType!==1||!v.hasData(e))return;var n,r,i,s=v._data(e),o=v._data(t,s),u=s.events;if(u){delete o.handle,o.events={};for(n in u)for(r=0,i=u[n].length;r<i;r++)v.event.add(t,n,u[n][r])}o.data&&(o.data=v.extend({},o.data))}function Ot(e,t){var n;if(t.nodeType!==1)return;t.clearAttributes&&t.clearAttributes(),t.mergeAttributes&&t.mergeAttributes(e),n=t.nodeName.toLowerCase(),n==="object"?(t.parentNode&&(t.outerHTML=e.outerHTML),v.support.html5Clone&&e.innerHTML&&!v.trim(t.innerHTML)&&(t.innerHTML=e.innerHTML)):n==="input"&&Et.test(e.type)?(t.defaultChecked=t.checked=e.checked,t.value!==e.value&&(t.value=e.value)):n==="option"?t.selected=e.defaultSelected:n==="input"||n==="textarea"?t.defaultValue=e.defaultValue:n==="script"&&t.text!==e.text&&(t.text=e.text),t.removeAttribute(v.expando)}function Mt(e){return typeof e.getElementsByTagName!="undefined"?e.getElementsByTagName("*"):typeof e.querySelectorAll!="undefined"?e.querySelectorAll("*"):[]}function _t(e){Et.test(e.type)&&(e.defaultChecked=e.checked)}function Qt(e,t){if(t in e)return t;var n=t.charAt(0).toUpperCase()+t.slice(1),r=t,i=Jt.length;while(i--){t=Jt[i]+n;if(t in e)return t}return r}function Gt(e,t){return e=t||e,v.css(e,"display")==="none"||!v.contains(e.ownerDocument,e)}function Yt(e,t){var n,r,i=[],s=0,o=e.length;for(;s<o;s++){n=e[s];if(!n.style)continue;i[s]=v._data(n,"olddisplay"),t?(!i[s]&&n.style.display==="none"&&(n.style.display=""),n.style.display===""&&Gt(n)&&(i[s]=v._data(n,"olddisplay",nn(n.nodeName)))):(r=Dt(n,"display"),!i[s]&&r!=="none"&&v._data(n,"olddisplay",r))}for(s=0;s<o;s++){n=e[s];if(!n.style)continue;if(!t||n.style.display==="none"||n.style.display==="")n.style.display=t?i[s]||"":"none"}return e}function Zt(e,t,n){var r=Rt.exec(t);return r?Math.max(0,r[1]-(n||0))+(r[2]||"px"):t}function en(e,t,n,r){var i=n===(r?"border":"content")?4:t==="width"?1:0,s=0;for(;i<4;i+=2)n==="margin"&&(s+=v.css(e,n+$t[i],!0)),r?(n==="content"&&(s-=parseFloat(Dt(e,"padding"+$t[i]))||0),n!=="margin"&&(s-=parseFloat(Dt(e,"border"+$t[i]+"Width"))||0)):(s+=parseFloat(Dt(e,"padding"+$t[i]))||0,n!=="padding"&&(s+=parseFloat(Dt(e,"border"+$t[i]+"Width"))||0));return s}function tn(e,t,n){var r=t==="width"?e.offsetWidth:e.offsetHeight,i=!0,s=v.support.boxSizing&&v.css(e,"boxSizing")==="border-box";if(r<=0||r==null){r=Dt(e,t);if(r<0||r==null)r=e.style[t];if(Ut.test(r))return r;i=s&&(v.support.boxSizingReliable||r===e.style[t]),r=parseFloat(r)||0}return r+en(e,t,n||(s?"border":"content"),i)+"px"}function nn(e){if(Wt[e])return Wt[e];var t=v("<"+e+">").appendTo(i.body),n=t.css("display");t.remove();if(n==="none"||n===""){Pt=i.body.appendChild(Pt||v.extend(i.createElement("iframe"),{frameBorder:0,width:0,height:0}));if(!Ht||!Pt.createElement)Ht=(Pt.contentWindow||Pt.contentDocument).document,Ht.write("<!doctype html><html><body>"),Ht.close();t=Ht.body.appendChild(Ht.createElement(e)),n=Dt(t,"display"),i.body.removeChild(Pt)}return Wt[e]=n,n}function fn(e,t,n,r){var i;if(v.isArray(t))v.each(t,function(t,i){n||sn.test(e)?r(e,i):fn(e+"["+(typeof i=="object"?t:"")+"]",i,n,r)});else if(!n&&v.type(t)==="object")for(i in t)fn(e+"["+i+"]",t[i],n,r);else r(e,t)}function Cn(e){return function(t,n){typeof t!="string"&&(n=t,t="*");var r,i,s,o=t.toLowerCase().split(y),u=0,a=o.length;if(v.isFunction(n))for(;u<a;u++)r=o[u],s=/^\+/.test(r),s&&(r=r.substr(1)||"*"),i=e[r]=e[r]||[],i[s?"unshift":"push"](n)}}function kn(e,n,r,i,s,o){s=s||n.dataTypes[0],o=o||{},o[s]=!0;var u,a=e[s],f=0,l=a?a.length:0,c=e===Sn;for(;f<l&&(c||!u);f++)u=a[f](n,r,i),typeof u=="string"&&(!c||o[u]?u=t:(n.dataTypes.unshift(u),u=kn(e,n,r,i,u,o)));return(c||!u)&&!o["*"]&&(u=kn(e,n,r,i,"*",o)),u}function Ln(e,n){var r,i,s=v.ajaxSettings.flatOptions||{};for(r in n)n[r]!==t&&((s[r]?e:i||(i={}))[r]=n[r]);i&&v.extend(!0,e,i)}function An(e,n,r){var i,s,o,u,a=e.contents,f=e.dataTypes,l=e.responseFields;for(s in l)s in r&&(n[l[s]]=r[s]);while(f[0]==="*")f.shift(),i===t&&(i=e.mimeType||n.getResponseHeader("content-type"));if(i)for(s in a)if(a[s]&&a[s].test(i)){f.unshift(s);break}if(f[0]in r)o=f[0];else{for(s in r){if(!f[0]||e.converters[s+" "+f[0]]){o=s;break}u||(u=s)}o=o||u}if(o)return o!==f[0]&&f.unshift(o),r[o]}function On(e,t){var n,r,i,s,o=e.dataTypes.slice(),u=o[0],a={},f=0;e.dataFilter&&(t=e.dataFilter(t,e.dataType));if(o[1])for(n in e.converters)a[n.toLowerCase()]=e.converters[n];for(;i=o[++f];)if(i!=="*"){if(u!=="*"&&u!==i){n=a[u+" "+i]||a["* "+i];if(!n)for(r in a){s=r.split(" ");if(s[1]===i){n=a[u+" "+s[0]]||a["* "+s[0]];if(n){n===!0?n=a[r]:a[r]!==!0&&(i=s[0],o.splice(f--,0,i));break}}}if(n!==!0)if(n&&e["throws"])t=n(t);else try{t=n(t)}catch(l){return{state:"parsererror",error:n?l:"No conversion from "+u+" to "+i}}}u=i}return{state:"success",data:t}}function Fn(){try{return new e.XMLHttpRequest}catch(t){}}function In(){try{return new e.ActiveXObject("Microsoft.XMLHTTP")}catch(t){}}function $n(){return setTimeout(function(){qn=t},0),qn=v.now()}function Jn(e,t){v.each(t,function(t,n){var r=(Vn[t]||[]).concat(Vn["*"]),i=0,s=r.length;for(;i<s;i++)if(r[i].call(e,t,n))return})}function Kn(e,t,n){var r,i=0,s=0,o=Xn.length,u=v.Deferred().always(function(){delete a.elem}),a=function(){var t=qn||$n(),n=Math.max(0,f.startTime+f.duration-t),r=n/f.duration||0,i=1-r,s=0,o=f.tweens.length;for(;s<o;s++)f.tweens[s].run(i);return u.notifyWith(e,[f,i,n]),i<1&&o?n:(u.resolveWith(e,[f]),!1)},f=u.promise({elem:e,props:v.extend({},t),opts:v.extend(!0,{specialEasing:{}},n),originalProperties:t,originalOptions:n,startTime:qn||$n(),duration:n.duration,tweens:[],createTween:function(t,n,r){var i=v.Tween(e,f.opts,t,n,f.opts.specialEasing[t]||f.opts.easing);return f.tweens.push(i),i},stop:function(t){var n=0,r=t?f.tweens.length:0;for(;n<r;n++)f.tweens[n].run(1);return t?u.resolveWith(e,[f,t]):u.rejectWith(e,[f,t]),this}}),l=f.props;Qn(l,f.opts.specialEasing);for(;i<o;i++){r=Xn[i].call(f,e,l,f.opts);if(r)return r}return Jn(f,l),v.isFunction(f.opts.start)&&f.opts.start.call(e,f),v.fx.timer(v.extend(a,{anim:f,queue:f.opts.queue,elem:e})),f.progress(f.opts.progress).done(f.opts.done,f.opts.complete).fail(f.opts.fail).always(f.opts.always)}function Qn(e,t){var n,r,i,s,o;for(n in e){r=v.camelCase(n),i=t[r],s=e[n],v.isArray(s)&&(i=s[1],s=e[n]=s[0]),n!==r&&(e[r]=s,delete e[n]),o=v.cssHooks[r];if(o&&"expand"in o){s=o.expand(s),delete e[r];for(n in s)n in e||(e[n]=s[n],t[n]=i)}else t[r]=i}}function Gn(e,t,n){var r,i,s,o,u,a,f,l,c,h=this,p=e.style,d={},m=[],g=e.nodeType&&Gt(e);n.queue||(l=v._queueHooks(e,"fx"),l.unqueued==null&&(l.unqueued=0,c=l.empty.fire,l.empty.fire=function(){l.unqueued||c()}),l.unqueued++,h.always(function(){h.always(function(){l.unqueued--,v.queue(e,"fx").length||l.empty.fire()})})),e.nodeType===1&&("height"in t||"width"in t)&&(n.overflow=[p.overflow,p.overflowX,p.overflowY],v.css(e,"display")==="inline"&&v.css(e,"float")==="none"&&(!v.support.inlineBlockNeedsLayout||nn(e.nodeName)==="inline"?p.display="inline-block":p.zoom=1)),n.overflow&&(p.overflow="hidden",v.support.shrinkWrapBlocks||h.done(function(){p.overflow=n.overflow[0],p.overflowX=n.overflow[1],p.overflowY=n.overflow[2]}));for(r in t){s=t[r];if(Un.exec(s)){delete t[r],a=a||s==="toggle";if(s===(g?"hide":"show"))continue;m.push(r)}}o=m.length;if(o){u=v._data(e,"fxshow")||v._data(e,"fxshow",{}),"hidden"in u&&(g=u.hidden),a&&(u.hidden=!g),g?v(e).show():h.done(function(){v(e).hide()}),h.done(function(){var t;v.removeData(e,"fxshow",!0);for(t in d)v.style(e,t,d[t])});for(r=0;r<o;r++)i=m[r],f=h.createTween(i,g?u[i]:0),d[i]=u[i]||v.style(e,i),i in u||(u[i]=f.start,g&&(f.end=f.start,f.start=i==="width"||i==="height"?1:0))}}function Yn(e,t,n,r,i){return new Yn.prototype.init(e,t,n,r,i)}function Zn(e,t){var n,r={height:e},i=0;t=t?1:0;for(;i<4;i+=2-t)n=$t[i],r["margin"+n]=r["padding"+n]=e;return t&&(r.opacity=r.width=e),r}function tr(e){return v.isWindow(e)?e:e.nodeType===9?e.defaultView||e.parentWindow:!1}var n,r,i=e.document,s=e.location,o=e.navigator,u=e.jQuery,a=e.$,f=Array.prototype.push,l=Array.prototype.slice,c=Array.prototype.indexOf,h=Object.prototype.toString,p=Object.prototype.hasOwnProperty,d=String.prototype.trim,v=function(e,t){return new v.fn.init(e,t,n)},m=/[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,g=/\S/,y=/\s+/,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,w=/^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,E=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,S=/^[\],:{}\s]*$/,x=/(?:^|:|,)(?:\s*\[)+/g,T=/\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,N=/"[^"\\\r\n]*"|true|false|null|-?(?:\d\d*\.|)\d+(?:[eE][\-+]?\d+|)/g,C=/^-ms-/,k=/-([\da-z])/gi,L=function(e,t){return(t+"").toUpperCase()},A=function(){i.addEventListener?(i.removeEventListener("DOMContentLoaded",A,!1),v.ready()):i.readyState==="complete"&&(i.detachEvent("onreadystatechange",A),v.ready())},O={};v.fn=v.prototype={constructor:v,init:function(e,n,r){var s,o,u,a;if(!e)return this;if(e.nodeType)return this.context=this[0]=e,this.length=1,this;if(typeof e=="string"){e.charAt(0)==="<"&&e.charAt(e.length-1)===">"&&e.length>=3?s=[null,e,null]:s=w.exec(e);if(s&&(s[1]||!n)){if(s[1])return n=n instanceof v?n[0]:n,a=n&&n.nodeType?n.ownerDocument||n:i,e=v.parseHTML(s[1],a,!0),E.test(s[1])&&v.isPlainObject(n)&&this.attr.call(e,n,!0),v.merge(this,e);o=i.getElementById(s[2]);if(o&&o.parentNode){if(o.id!==s[2])return r.find(e);this.length=1,this[0]=o}return this.context=i,this.selector=e,this}return!n||n.jquery?(n||r).find(e):this.constructor(n).find(e)}return v.isFunction(e)?r.ready(e):(e.selector!==t&&(this.selector=e.selector,this.context=e.context),v.makeArray(e,this))},selector:"",jquery:"1.8.3",length:0,size:function(){return this.length},toArray:function(){return l.call(this)},get:function(e){return e==null?this.toArray():e<0?this[this.length+e]:this[e]},pushStack:function(e,t,n){var r=v.merge(this.constructor(),e);return r.prevObject=this,r.context=this.context,t==="find"?r.selector=this.selector+(this.selector?" ":"")+n:t&&(r.selector=this.selector+"."+t+"("+n+")"),r},each:function(e,t){return v.each(this,e,t)},ready:function(e){return v.ready.promise().done(e),this},eq:function(e){return e=+e,e===-1?this.slice(e):this.slice(e,e+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(l.apply(this,arguments),"slice",l.call(arguments).join(","))},map:function(e){return this.pushStack(v.map(this,function(t,n){return e.call(t,n,t)}))},end:function(){return this.prevObject||this.constructor(null)},push:f,sort:[].sort,splice:[].splice},v.fn.init.prototype=v.fn,v.extend=v.fn.extend=function(){var e,n,r,i,s,o,u=arguments[0]||{},a=1,f=arguments.length,l=!1;typeof u=="boolean"&&(l=u,u=arguments[1]||{},a=2),typeof u!="object"&&!v.isFunction(u)&&(u={}),f===a&&(u=this,--a);for(;a<f;a++)if((e=arguments[a])!=null)for(n in e){r=u[n],i=e[n];if(u===i)continue;l&&i&&(v.isPlainObject(i)||(s=v.isArray(i)))?(s?(s=!1,o=r&&v.isArray(r)?r:[]):o=r&&v.isPlainObject(r)?r:{},u[n]=v.extend(l,o,i)):i!==t&&(u[n]=i)}return u},v.extend({noConflict:function(t){return e.$===v&&(e.$=a),t&&e.jQuery===v&&(e.jQuery=u),v},isReady:!1,readyWait:1,holdReady:function(e){e?v.readyWait++:v.ready(!0)},ready:function(e){if(e===!0?--v.readyWait:v.isReady)return;if(!i.body)return setTimeout(v.ready,1);v.isReady=!0;if(e!==!0&&--v.readyWait>0)return;r.resolveWith(i,[v]),v.fn.trigger&&v(i).trigger("ready").off("ready")},isFunction:function(e){return v.type(e)==="function"},isArray:Array.isArray||function(e){return v.type(e)==="array"},isWindow:function(e){return e!=null&&e==e.window},isNumeric:function(e){return!isNaN(parseFloat(e))&&isFinite(e)},type:function(e){return e==null?String(e):O[h.call(e)]||"object"},isPlainObject:function(e){if(!e||v.type(e)!=="object"||e.nodeType||v.isWindow(e))return!1;try{if(e.constructor&&!p.call(e,"constructor")&&!p.call(e.constructor.prototype,"isPrototypeOf"))return!1}catch(n){return!1}var r;for(r in e);return r===t||p.call(e,r)},isEmptyObject:function(e){var t;for(t in e)return!1;return!0},error:function(e){throw new Error(e)},parseHTML:function(e,t,n){var r;return!e||typeof e!="string"?null:(typeof t=="boolean"&&(n=t,t=0),t=t||i,(r=E.exec(e))?[t.createElement(r[1])]:(r=v.buildFragment([e],t,n?null:[]),v.merge([],(r.cacheable?v.clone(r.fragment):r.fragment).childNodes)))},parseJSON:function(t){if(!t||typeof t!="string")return null;t=v.trim(t);if(e.JSON&&e.JSON.parse)return e.JSON.parse(t);if(S.test(t.replace(T,"@").replace(N,"]").replace(x,"")))return(new Function("return "+t))();v.error("Invalid JSON: "+t)},parseXML:function(n){var r,i;if(!n||typeof n!="string")return null;try{e.DOMParser?(i=new DOMParser,r=i.parseFromString(n,"text/xml")):(r=new ActiveXObject("Microsoft.XMLDOM"),r.async="false",r.loadXML(n))}catch(s){r=t}return(!r||!r.documentElement||r.getElementsByTagName("parsererror").length)&&v.error("Invalid XML: "+n),r},noop:function(){},globalEval:function(t){t&&g.test(t)&&(e.execScript||function(t){e.eval.call(e,t)})(t)},camelCase:function(e){return e.replace(C,"ms-").replace(k,L)},nodeName:function(e,t){return e.nodeName&&e.nodeName.toLowerCase()===t.toLowerCase()},each:function(e,n,r){var i,s=0,o=e.length,u=o===t||v.isFunction(e);if(r){if(u){for(i in e)if(n.apply(e[i],r)===!1)break}else for(;s<o;)if(n.apply(e[s++],r)===!1)break}else if(u){for(i in e)if(n.call(e[i],i,e[i])===!1)break}else for(;s<o;)if(n.call(e[s],s,e[s++])===!1)break;return e},trim:d&&!d.call("\ufeff\u00a0")?function(e){return e==null?"":d.call(e)}:function(e){return e==null?"":(e+"").replace(b,"")},makeArray:function(e,t){var n,r=t||[];return e!=null&&(n=v.type(e),e.length==null||n==="string"||n==="function"||n==="regexp"||v.isWindow(e)?f.call(r,e):v.merge(r,e)),r},inArray:function(e,t,n){var r;if(t){if(c)return c.call(t,e,n);r=t.length,n=n?n<0?Math.max(0,r+n):n:0;for(;n<r;n++)if(n in t&&t[n]===e)return n}return-1},merge:function(e,n){var r=n.length,i=e.length,s=0;if(typeof r=="number")for(;s<r;s++)e[i++]=n[s];else while(n[s]!==t)e[i++]=n[s++];return e.length=i,e},grep:function(e,t,n){var r,i=[],s=0,o=e.length;n=!!n;for(;s<o;s++)r=!!t(e[s],s),n!==r&&i.push(e[s]);return i},map:function(e,n,r){var i,s,o=[],u=0,a=e.length,f=e instanceof v||a!==t&&typeof a=="number"&&(a>0&&e[0]&&e[a-1]||a===0||v.isArray(e));if(f)for(;u<a;u++)i=n(e[u],u,r),i!=null&&(o[o.length]=i);else for(s in e)i=n(e[s],s,r),i!=null&&(o[o.length]=i);return o.concat.apply([],o)},guid:1,proxy:function(e,n){var r,i,s;return typeof n=="string"&&(r=e[n],n=e,e=r),v.isFunction(e)?(i=l.call(arguments,2),s=function(){return e.apply(n,i.concat(l.call(arguments)))},s.guid=e.guid=e.guid||v.guid++,s):t},access:function(e,n,r,i,s,o,u){var a,f=r==null,l=0,c=e.length;if(r&&typeof r=="object"){for(l in r)v.access(e,n,l,r[l],1,o,i);s=1}else if(i!==t){a=u===t&&v.isFunction(i),f&&(a?(a=n,n=function(e,t,n){return a.call(v(e),n)}):(n.call(e,i),n=null));if(n)for(;l<c;l++)n(e[l],r,a?i.call(e[l],l,n(e[l],r)):i,u);s=1}return s?e:f?n.call(e):c?n(e[0],r):o},now:function(){return(new Date).getTime()}}),v.ready.promise=function(t){if(!r){r=v.Deferred();if(i.readyState==="complete")setTimeout(v.ready,1);else if(i.addEventListener)i.addEventListener("DOMContentLoaded",A,!1),e.addEventListener("load",v.ready,!1);else{i.attachEvent("onreadystatechange",A),e.attachEvent("onload",v.ready);var n=!1;try{n=e.frameElement==null&&i.documentElement}catch(s){}n&&n.doScroll&&function o(){if(!v.isReady){try{n.doScroll("left")}catch(e){return setTimeout(o,50)}v.ready()}}()}}return r.promise(t)},v.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(e,t){O["[object "+t+"]"]=t.toLowerCase()}),n=v(i);var M={};v.Callbacks=function(e){e=typeof e=="string"?M[e]||_(e):v.extend({},e);var n,r,i,s,o,u,a=[],f=!e.once&&[],l=function(t){n=e.memory&&t,r=!0,u=s||0,s=0,o=a.length,i=!0;for(;a&&u<o;u++)if(a[u].apply(t[0],t[1])===!1&&e.stopOnFalse){n=!1;break}i=!1,a&&(f?f.length&&l(f.shift()):n?a=[]:c.disable())},c={add:function(){if(a){var t=a.length;(function r(t){v.each(t,function(t,n){var i=v.type(n);i==="function"?(!e.unique||!c.has(n))&&a.push(n):n&&n.length&&i!=="string"&&r(n)})})(arguments),i?o=a.length:n&&(s=t,l(n))}return this},remove:function(){return a&&v.each(arguments,function(e,t){var n;while((n=v.inArray(t,a,n))>-1)a.splice(n,1),i&&(n<=o&&o--,n<=u&&u--)}),this},has:function(e){return v.inArray(e,a)>-1},empty:function(){return a=[],this},disable:function(){return a=f=n=t,this},disabled:function(){return!a},lock:function(){return f=t,n||c.disable(),this},locked:function(){return!f},fireWith:function(e,t){return t=t||[],t=[e,t.slice?t.slice():t],a&&(!r||f)&&(i?f.push(t):l(t)),this},fire:function(){return c.fireWith(this,arguments),this},fired:function(){return!!r}};return c},v.extend({Deferred:function(e){var t=[["resolve","done",v.Callbacks("once memory"),"resolved"],["reject","fail",v.Callbacks("once memory"),"rejected"],["notify","progress",v.Callbacks("memory")]],n="pending",r={state:function(){return n},always:function(){return i.done(arguments).fail(arguments),this},then:function(){var e=arguments;return v.Deferred(function(n){v.each(t,function(t,r){var s=r[0],o=e[t];i[r[1]](v.isFunction(o)?function(){var e=o.apply(this,arguments);e&&v.isFunction(e.promise)?e.promise().done(n.resolve).fail(n.reject).progress(n.notify):n[s+"With"](this===i?n:this,[e])}:n[s])}),e=null}).promise()},promise:function(e){return e!=null?v.extend(e,r):r}},i={};return r.pipe=r.then,v.each(t,function(e,s){var o=s[2],u=s[3];r[s[1]]=o.add,u&&o.add(function(){n=u},t[e^1][2].disable,t[2][2].lock),i[s[0]]=o.fire,i[s[0]+"With"]=o.fireWith}),r.promise(i),e&&e.call(i,i),i},when:function(e){var t=0,n=l.call(arguments),r=n.length,i=r!==1||e&&v.isFunction(e.promise)?r:0,s=i===1?e:v.Deferred(),o=function(e,t,n){return function(r){t[e]=this,n[e]=arguments.length>1?l.call(arguments):r,n===u?s.notifyWith(t,n):--i||s.resolveWith(t,n)}},u,a,f;if(r>1){u=new Array(r),a=new Array(r),f=new Array(r);for(;t<r;t++)n[t]&&v.isFunction(n[t].promise)?n[t].promise().done(o(t,f,n)).fail(s.reject).progress(o(t,a,u)):--i}return i||s.resolveWith(f,n),s.promise()}}),v.support=function(){var t,n,r,s,o,u,a,f,l,c,h,p=i.createElement("div");p.setAttribute("className","t"),p.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",n=p.getElementsByTagName("*"),r=p.getElementsByTagName("a")[0];if(!n||!r||!n.length)return{};s=i.createElement("select"),o=s.appendChild(i.createElement("option")),u=p.getElementsByTagName("input")[0],r.style.cssText="top:1px;float:left;opacity:.5",t={leadingWhitespace:p.firstChild.nodeType===3,tbody:!p.getElementsByTagName("tbody").length,htmlSerialize:!!p.getElementsByTagName("link").length,style:/top/.test(r.getAttribute("style")),hrefNormalized:r.getAttribute("href")==="/a",opacity:/^0.5/.test(r.style.opacity),cssFloat:!!r.style.cssFloat,checkOn:u.value==="on",optSelected:o.selected,getSetAttribute:p.className!=="t",enctype:!!i.createElement("form").enctype,html5Clone:i.createElement("nav").cloneNode(!0).outerHTML!=="<:nav></:nav>",boxModel:i.compatMode==="CSS1Compat",submitBubbles:!0,changeBubbles:!0,focusinBubbles:!1,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0,boxSizingReliable:!0,pixelPosition:!1},u.checked=!0,t.noCloneChecked=u.cloneNode(!0).checked,s.disabled=!0,t.optDisabled=!o.disabled;try{delete p.test}catch(d){t.deleteExpando=!1}!p.addEventListener&&p.attachEvent&&p.fireEvent&&(p.attachEvent("onclick",h=function(){t.noCloneEvent=!1}),p.cloneNode(!0).fireEvent("onclick"),p.detachEvent("onclick",h)),u=i.createElement("input"),u.value="t",u.setAttribute("type","radio"),t.radioValue=u.value==="t",u.setAttribute("checked","checked"),u.setAttribute("name","t"),p.appendChild(u),a=i.createDocumentFragment(),a.appendChild(p.lastChild),t.checkClone=a.cloneNode(!0).cloneNode(!0).lastChild.checked,t.appendChecked=u.checked,a.removeChild(u),a.appendChild(p);if(p.attachEvent)for(l in{submit:!0,change:!0,focusin:!0})f="on"+l,c=f in p,c||(p.setAttribute(f,"return;"),c=typeof p[f]=="function"),t[l+"Bubbles"]=c;return v(function(){var n,r,s,o,u="padding:0;margin:0;border:0;display:block;overflow:hidden;",a=i.getElementsByTagName("body")[0];if(!a)return;n=i.createElement("div"),n.style.cssText="visibility:hidden;border:0;width:0;height:0;position:static;top:0;margin-top:1px",a.insertBefore(n,a.firstChild),r=i.createElement("div"),n.appendChild(r),r.innerHTML="<table><tr><td></td><td>t</td></tr></table>",s=r.getElementsByTagName("td"),s[0].style.cssText="padding:0;margin:0;border:0;display:none",c=s[0].offsetHeight===0,s[0].style.display="",s[1].style.display="none",t.reliableHiddenOffsets=c&&s[0].offsetHeight===0,r.innerHTML="",r.style.cssText="box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;",t.boxSizing=r.offsetWidth===4,t.doesNotIncludeMarginInBodyOffset=a.offsetTop!==1,e.getComputedStyle&&(t.pixelPosition=(e.getComputedStyle(r,null)||{}).top!=="1%",t.boxSizingReliable=(e.getComputedStyle(r,null)||{width:"4px"}).width==="4px",o=i.createElement("div"),o.style.cssText=r.style.cssText=u,o.style.marginRight=o.style.width="0",r.style.width="1px",r.appendChild(o),t.reliableMarginRight=!parseFloat((e.getComputedStyle(o,null)||{}).marginRight)),typeof r.style.zoom!="undefined"&&(r.innerHTML="",r.style.cssText=u+"width:1px;padding:1px;display:inline;zoom:1",t.inlineBlockNeedsLayout=r.offsetWidth===3,r.style.display="block",r.style.overflow="visible",r.innerHTML="<div></div>",r.firstChild.style.width="5px",t.shrinkWrapBlocks=r.offsetWidth!==3,n.style.zoom=1),a.removeChild(n),n=r=s=o=null}),a.removeChild(p),n=r=s=o=u=a=p=null,t}();var D=/(?:\{[\s\S]*\}|\[[\s\S]*\])$/,P=/([A-Z])/g;v.extend({cache:{},deletedIds:[],uuid:0,expando:"jQuery"+(v.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(e){return e=e.nodeType?v.cache[e[v.expando]]:e[v.expando],!!e&&!B(e)},data:function(e,n,r,i){if(!v.acceptData(e))return;var s,o,u=v.expando,a=typeof n=="string",f=e.nodeType,l=f?v.cache:e,c=f?e[u]:e[u]&&u;if((!c||!l[c]||!i&&!l[c].data)&&a&&r===t)return;c||(f?e[u]=c=v.deletedIds.pop()||v.guid++:c=u),l[c]||(l[c]={},f||(l[c].toJSON=v.noop));if(typeof n=="object"||typeof n=="function")i?l[c]=v.extend(l[c],n):l[c].data=v.extend(l[c].data,n);return s=l[c],i||(s.data||(s.data={}),s=s.data),r!==t&&(s[v.camelCase(n)]=r),a?(o=s[n],o==null&&(o=s[v.camelCase(n)])):o=s,o},removeData:function(e,t,n){if(!v.acceptData(e))return;var r,i,s,o=e.nodeType,u=o?v.cache:e,a=o?e[v.expando]:v.expando;if(!u[a])return;if(t){r=n?u[a]:u[a].data;if(r){v.isArray(t)||(t in r?t=[t]:(t=v.camelCase(t),t in r?t=[t]:t=t.split(" ")));for(i=0,s=t.length;i<s;i++)delete r[t[i]];if(!(n?B:v.isEmptyObject)(r))return}}if(!n){delete u[a].data;if(!B(u[a]))return}o?v.cleanData([e],!0):v.support.deleteExpando||u!=u.window?delete u[a]:u[a]=null},_data:function(e,t,n){return v.data(e,t,n,!0)},acceptData:function(e){var t=e.nodeName&&v.noData[e.nodeName.toLowerCase()];return!t||t!==!0&&e.getAttribute("classid")===t}}),v.fn.extend({data:function(e,n){var r,i,s,o,u,a=this[0],f=0,l=null;if(e===t){if(this.length){l=v.data(a);if(a.nodeType===1&&!v._data(a,"parsedAttrs")){s=a.attributes;for(u=s.length;f<u;f++)o=s[f].name,o.indexOf("data-")||(o=v.camelCase(o.substring(5)),H(a,o,l[o]));v._data(a,"parsedAttrs",!0)}}return l}return typeof e=="object"?this.each(function(){v.data(this,e)}):(r=e.split(".",2),r[1]=r[1]?"."+r[1]:"",i=r[1]+"!",v.access(this,function(n){if(n===t)return l=this.triggerHandler("getData"+i,[r[0]]),l===t&&a&&(l=v.data(a,e),l=H(a,e,l)),l===t&&r[1]?this.data(r[0]):l;r[1]=n,this.each(function(){var t=v(this);t.triggerHandler("setData"+i,r),v.data(this,e,n),t.triggerHandler("changeData"+i,r)})},null,n,arguments.length>1,null,!1))},removeData:function(e){return this.each(function(){v.removeData(this,e)})}}),v.extend({queue:function(e,t,n){var r;if(e)return t=(t||"fx")+"queue",r=v._data(e,t),n&&(!r||v.isArray(n)?r=v._data(e,t,v.makeArray(n)):r.push(n)),r||[]},dequeue:function(e,t){t=t||"fx";var n=v.queue(e,t),r=n.length,i=n.shift(),s=v._queueHooks(e,t),o=function(){v.dequeue(e,t)};i==="inprogress"&&(i=n.shift(),r--),i&&(t==="fx"&&n.unshift("inprogress"),delete s.stop,i.call(e,o,s)),!r&&s&&s.empty.fire()},_queueHooks:function(e,t){var n=t+"queueHooks";return v._data(e,n)||v._data(e,n,{empty:v.Callbacks("once memory").add(function(){v.removeData(e,t+"queue",!0),v.removeData(e,n,!0)})})}}),v.fn.extend({queue:function(e,n){var r=2;return typeof e!="string"&&(n=e,e="fx",r--),arguments.length<r?v.queue(this[0],e):n===t?this:this.each(function(){var t=v.queue(this,e,n);v._queueHooks(this,e),e==="fx"&&t[0]!=="inprogress"&&v.dequeue(this,e)})},dequeue:function(e){return this.each(function(){v.dequeue(this,e)})},delay:function(e,t){return e=v.fx?v.fx.speeds[e]||e:e,t=t||"fx",this.queue(t,function(t,n){var r=setTimeout(t,e);n.stop=function(){clearTimeout(r)}})},clearQueue:function(e){return this.queue(e||"fx",[])},promise:function(e,n){var r,i=1,s=v.Deferred(),o=this,u=this.length,a=function(){--i||s.resolveWith(o,[o])};typeof e!="string"&&(n=e,e=t),e=e||"fx";while(u--)r=v._data(o[u],e+"queueHooks"),r&&r.empty&&(i++,r.empty.add(a));return a(),s.promise(n)}});var j,F,I,q=/[\t\r\n]/g,R=/\r/g,U=/^(?:button|input)$/i,z=/^(?:button|input|object|select|textarea)$/i,W=/^a(?:rea|)$/i,X=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,V=v.support.getSetAttribute;v.fn.extend({attr:function(e,t){return v.access(this,v.attr,e,t,arguments.length>1)},removeAttr:function(e){return this.each(function(){v.removeAttr(this,e)})},prop:function(e,t){return v.access(this,v.prop,e,t,arguments.length>1)},removeProp:function(e){return e=v.propFix[e]||e,this.each(function(){try{this[e]=t,delete this[e]}catch(n){}})},addClass:function(e){var t,n,r,i,s,o,u;if(v.isFunction(e))return this.each(function(t){v(this).addClass(e.call(this,t,this.className))});if(e&&typeof e=="string"){t=e.split(y);for(n=0,r=this.length;n<r;n++){i=this[n];if(i.nodeType===1)if(!i.className&&t.length===1)i.className=e;else{s=" "+i.className+" ";for(o=0,u=t.length;o<u;o++)s.indexOf(" "+t[o]+" ")<0&&(s+=t[o]+" ");i.className=v.trim(s)}}}return this},removeClass:function(e){var n,r,i,s,o,u,a;if(v.isFunction(e))return this.each(function(t){v(this).removeClass(e.call(this,t,this.className))});if(e&&typeof e=="string"||e===t){n=(e||"").split(y);for(u=0,a=this.length;u<a;u++){i=this[u];if(i.nodeType===1&&i.className){r=(" "+i.className+" ").replace(q," ");for(s=0,o=n.length;s<o;s++)while(r.indexOf(" "+n[s]+" ")>=0)r=r.replace(" "+n[s]+" "," ");i.className=e?v.trim(r):""}}}return this},toggleClass:function(e,t){var n=typeof e,r=typeof t=="boolean";return v.isFunction(e)?this.each(function(n){v(this).toggleClass(e.call(this,n,this.className,t),t)}):this.each(function(){if(n==="string"){var i,s=0,o=v(this),u=t,a=e.split(y);while(i=a[s++])u=r?u:!o.hasClass(i),o[u?"addClass":"removeClass"](i)}else if(n==="undefined"||n==="boolean")this.className&&v._data(this,"__className__",this.className),this.className=this.className||e===!1?"":v._data(this,"__className__")||""})},hasClass:function(e){var t=" "+e+" ",n=0,r=this.length;for(;n<r;n++)if(this[n].nodeType===1&&(" "+this[n].className+" ").replace(q," ").indexOf(t)>=0)return!0;return!1},val:function(e){var n,r,i,s=this[0];if(!arguments.length){if(s)return n=v.valHooks[s.type]||v.valHooks[s.nodeName.toLowerCase()],n&&"get"in n&&(r=n.get(s,"value"))!==t?r:(r=s.value,typeof r=="string"?r.replace(R,""):r==null?"":r);return}return i=v.isFunction(e),this.each(function(r){var s,o=v(this);if(this.nodeType!==1)return;i?s=e.call(this,r,o.val()):s=e,s==null?s="":typeof s=="number"?s+="":v.isArray(s)&&(s=v.map(s,function(e){return e==null?"":e+""})),n=v.valHooks[this.type]||v.valHooks[this.nodeName.toLowerCase()];if(!n||!("set"in n)||n.set(this,s,"value")===t)this.value=s})}}),v.extend({valHooks:{option:{get:function(e){var t=e.attributes.value;return!t||t.specified?e.value:e.text}},select:{get:function(e){var t,n,r=e.options,i=e.selectedIndex,s=e.type==="select-one"||i<0,o=s?null:[],u=s?i+1:r.length,a=i<0?u:s?i:0;for(;a<u;a++){n=r[a];if((n.selected||a===i)&&(v.support.optDisabled?!n.disabled:n.getAttribute("disabled")===null)&&(!n.parentNode.disabled||!v.nodeName(n.parentNode,"optgroup"))){t=v(n).val();if(s)return t;o.push(t)}}return o},set:function(e,t){var n=v.makeArray(t);return v(e).find("option").each(function(){this.selected=v.inArray(v(this).val(),n)>=0}),n.length||(e.selectedIndex=-1),n}}},attrFn:{},attr:function(e,n,r,i){var s,o,u,a=e.nodeType;if(!e||a===3||a===8||a===2)return;if(i&&v.isFunction(v.fn[n]))return v(e)[n](r);if(typeof e.getAttribute=="undefined")return v.prop(e,n,r);u=a!==1||!v.isXMLDoc(e),u&&(n=n.toLowerCase(),o=v.attrHooks[n]||(X.test(n)?F:j));if(r!==t){if(r===null){v.removeAttr(e,n);return}return o&&"set"in o&&u&&(s=o.set(e,r,n))!==t?s:(e.setAttribute(n,r+""),r)}return o&&"get"in o&&u&&(s=o.get(e,n))!==null?s:(s=e.getAttribute(n),s===null?t:s)},removeAttr:function(e,t){var n,r,i,s,o=0;if(t&&e.nodeType===1){r=t.split(y);for(;o<r.length;o++)i=r[o],i&&(n=v.propFix[i]||i,s=X.test(i),s||v.attr(e,i,""),e.removeAttribute(V?i:n),s&&n in e&&(e[n]=!1))}},attrHooks:{type:{set:function(e,t){if(U.test(e.nodeName)&&e.parentNode)v.error("type property can't be changed");else if(!v.support.radioValue&&t==="radio"&&v.nodeName(e,"input")){var n=e.value;return e.setAttribute("type",t),n&&(e.value=n),t}}},value:{get:function(e,t){return j&&v.nodeName(e,"button")?j.get(e,t):t in e?e.value:null},set:function(e,t,n){if(j&&v.nodeName(e,"button"))return j.set(e,t,n);e.value=t}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(e,n,r){var i,s,o,u=e.nodeType;if(!e||u===3||u===8||u===2)return;return o=u!==1||!v.isXMLDoc(e),o&&(n=v.propFix[n]||n,s=v.propHooks[n]),r!==t?s&&"set"in s&&(i=s.set(e,r,n))!==t?i:e[n]=r:s&&"get"in s&&(i=s.get(e,n))!==null?i:e[n]},propHooks:{tabIndex:{get:function(e){var n=e.getAttributeNode("tabindex");return n&&n.specified?parseInt(n.value,10):z.test(e.nodeName)||W.test(e.nodeName)&&e.href?0:t}}}}),F={get:function(e,n){var r,i=v.prop(e,n);return i===!0||typeof i!="boolean"&&(r=e.getAttributeNode(n))&&r.nodeValue!==!1?n.toLowerCase():t},set:function(e,t,n){var r;return t===!1?v.removeAttr(e,n):(r=v.propFix[n]||n,r in e&&(e[r]=!0),e.setAttribute(n,n.toLowerCase())),n}},V||(I={name:!0,id:!0,coords:!0},j=v.valHooks.button={get:function(e,n){var r;return r=e.getAttributeNode(n),r&&(I[n]?r.value!=="":r.specified)?r.value:t},set:function(e,t,n){var r=e.getAttributeNode(n);return r||(r=i.createAttribute(n),e.setAttributeNode(r)),r.value=t+""}},v.each(["width","height"],function(e,t){v.attrHooks[t]=v.extend(v.attrHooks[t],{set:function(e,n){if(n==="")return e.setAttribute(t,"auto"),n}})}),v.attrHooks.contenteditable={get:j.get,set:function(e,t,n){t===""&&(t="false"),j.set(e,t,n)}}),v.support.hrefNormalized||v.each(["href","src","width","height"],function(e,n){v.attrHooks[n]=v.extend(v.attrHooks[n],{get:function(e){var r=e.getAttribute(n,2);return r===null?t:r}})}),v.support.style||(v.attrHooks.style={get:function(e){return e.style.cssText.toLowerCase()||t},set:function(e,t){return e.style.cssText=t+""}}),v.support.optSelected||(v.propHooks.selected=v.extend(v.propHooks.selected,{get:function(e){var t=e.parentNode;return t&&(t.selectedIndex,t.parentNode&&t.parentNode.selectedIndex),null}})),v.support.enctype||(v.propFix.enctype="encoding"),v.support.checkOn||v.each(["radio","checkbox"],function(){v.valHooks[this]={get:function(e){return e.getAttribute("value")===null?"on":e.value}}}),v.each(["radio","checkbox"],function(){v.valHooks[this]=v.extend(v.valHooks[this],{set:function(e,t){if(v.isArray(t))return e.checked=v.inArray(v(e).val(),t)>=0}})});var $=/^(?:textarea|input|select)$/i,J=/^([^\.]*|)(?:\.(.+)|)$/,K=/(?:^|\s)hover(\.\S+|)\b/,Q=/^key/,G=/^(?:mouse|contextmenu)|click/,Y=/^(?:focusinfocus|focusoutblur)$/,Z=function(e){return v.event.special.hover?e:e.replace(K,"mouseenter$1 mouseleave$1")};v.event={add:function(e,n,r,i,s){var o,u,a,f,l,c,h,p,d,m,g;if(e.nodeType===3||e.nodeType===8||!n||!r||!(o=v._data(e)))return;r.handler&&(d=r,r=d.handler,s=d.selector),r.guid||(r.guid=v.guid++),a=o.events,a||(o.events=a={}),u=o.handle,u||(o.handle=u=function(e){return typeof v=="undefined"||!!e&&v.event.triggered===e.type?t:v.event.dispatch.apply(u.elem,arguments)},u.elem=e),n=v.trim(Z(n)).split(" ");for(f=0;f<n.length;f++){l=J.exec(n[f])||[],c=l[1],h=(l[2]||"").split(".").sort(),g=v.event.special[c]||{},c=(s?g.delegateType:g.bindType)||c,g=v.event.special[c]||{},p=v.extend({type:c,origType:l[1],data:i,handler:r,guid:r.guid,selector:s,needsContext:s&&v.expr.match.needsContext.test(s),namespace:h.join(".")},d),m=a[c];if(!m){m=a[c]=[],m.delegateCount=0;if(!g.setup||g.setup.call(e,i,h,u)===!1)e.addEventListener?e.addEventListener(c,u,!1):e.attachEvent&&e.attachEvent("on"+c,u)}g.add&&(g.add.call(e,p),p.handler.guid||(p.handler.guid=r.guid)),s?m.splice(m.delegateCount++,0,p):m.push(p),v.event.global[c]=!0}e=null},global:{},remove:function(e,t,n,r,i){var s,o,u,a,f,l,c,h,p,d,m,g=v.hasData(e)&&v._data(e);if(!g||!(h=g.events))return;t=v.trim(Z(t||"")).split(" ");for(s=0;s<t.length;s++){o=J.exec(t[s])||[],u=a=o[1],f=o[2];if(!u){for(u in h)v.event.remove(e,u+t[s],n,r,!0);continue}p=v.event.special[u]||{},u=(r?p.delegateType:p.bindType)||u,d=h[u]||[],l=d.length,f=f?new RegExp("(^|\\.)"+f.split(".").sort().join("\\.(?:.*\\.|)")+"(\\.|$)"):null;for(c=0;c<d.length;c++)m=d[c],(i||a===m.origType)&&(!n||n.guid===m.guid)&&(!f||f.test(m.namespace))&&(!r||r===m.selector||r==="**"&&m.selector)&&(d.splice(c--,1),m.selector&&d.delegateCount--,p.remove&&p.remove.call(e,m));d.length===0&&l!==d.length&&((!p.teardown||p.teardown.call(e,f,g.handle)===!1)&&v.removeEvent(e,u,g.handle),delete h[u])}v.isEmptyObject(h)&&(delete g.handle,v.removeData(e,"events",!0))},customEvent:{getData:!0,setData:!0,changeData:!0},trigger:function(n,r,s,o){if(!s||s.nodeType!==3&&s.nodeType!==8){var u,a,f,l,c,h,p,d,m,g,y=n.type||n,b=[];if(Y.test(y+v.event.triggered))return;y.indexOf("!")>=0&&(y=y.slice(0,-1),a=!0),y.indexOf(".")>=0&&(b=y.split("."),y=b.shift(),b.sort());if((!s||v.event.customEvent[y])&&!v.event.global[y])return;n=typeof n=="object"?n[v.expando]?n:new v.Event(y,n):new v.Event(y),n.type=y,n.isTrigger=!0,n.exclusive=a,n.namespace=b.join("."),n.namespace_re=n.namespace?new RegExp("(^|\\.)"+b.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,h=y.indexOf(":")<0?"on"+y:"";if(!s){u=v.cache;for(f in u)u[f].events&&u[f].events[y]&&v.event.trigger(n,r,u[f].handle.elem,!0);return}n.result=t,n.target||(n.target=s),r=r!=null?v.makeArray(r):[],r.unshift(n),p=v.event.special[y]||{};if(p.trigger&&p.trigger.apply(s,r)===!1)return;m=[[s,p.bindType||y]];if(!o&&!p.noBubble&&!v.isWindow(s)){g=p.delegateType||y,l=Y.test(g+y)?s:s.parentNode;for(c=s;l;l=l.parentNode)m.push([l,g]),c=l;c===(s.ownerDocument||i)&&m.push([c.defaultView||c.parentWindow||e,g])}for(f=0;f<m.length&&!n.isPropagationStopped();f++)l=m[f][0],n.type=m[f][1],d=(v._data(l,"events")||{})[n.type]&&v._data(l,"handle"),d&&d.apply(l,r),d=h&&l[h],d&&v.acceptData(l)&&d.apply&&d.apply(l,r)===!1&&n.preventDefault();return n.type=y,!o&&!n.isDefaultPrevented()&&(!p._default||p._default.apply(s.ownerDocument,r)===!1)&&(y!=="click"||!v.nodeName(s,"a"))&&v.acceptData(s)&&h&&s[y]&&(y!=="focus"&&y!=="blur"||n.target.offsetWidth!==0)&&!v.isWindow(s)&&(c=s[h],c&&(s[h]=null),v.event.triggered=y,s[y](),v.event.triggered=t,c&&(s[h]=c)),n.result}return},dispatch:function(n){n=v.event.fix(n||e.event);var r,i,s,o,u,a,f,c,h,p,d=(v._data(this,"events")||{})[n.type]||[],m=d.delegateCount,g=l.call(arguments),y=!n.exclusive&&!n.namespace,b=v.event.special[n.type]||{},w=[];g[0]=n,n.delegateTarget=this;if(b.preDispatch&&b.preDispatch.call(this,n)===!1)return;if(m&&(!n.button||n.type!=="click"))for(s=n.target;s!=this;s=s.parentNode||this)if(s.disabled!==!0||n.type!=="click"){u={},f=[];for(r=0;r<m;r++)c=d[r],h=c.selector,u[h]===t&&(u[h]=c.needsContext?v(h,this).index(s)>=0:v.find(h,this,null,[s]).length),u[h]&&f.push(c);f.length&&w.push({elem:s,matches:f})}d.length>m&&w.push({elem:this,matches:d.slice(m)});for(r=0;r<w.length&&!n.isPropagationStopped();r++){a=w[r],n.currentTarget=a.elem;for(i=0;i<a.matches.length&&!n.isImmediatePropagationStopped();i++){c=a.matches[i];if(y||!n.namespace&&!c.namespace||n.namespace_re&&n.namespace_re.test(c.namespace))n.data=c.data,n.handleObj=c,o=((v.event.special[c.origType]||{}).handle||c.handler).apply(a.elem,g),o!==t&&(n.result=o,o===!1&&(n.preventDefault(),n.stopPropagation()))}}return b.postDispatch&&b.postDispatch.call(this,n),n.result},props:"attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(e,t){return e.which==null&&(e.which=t.charCode!=null?t.charCode:t.keyCode),e}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(e,n){var r,s,o,u=n.button,a=n.fromElement;return e.pageX==null&&n.clientX!=null&&(r=e.target.ownerDocument||i,s=r.documentElement,o=r.body,e.pageX=n.clientX+(s&&s.scrollLeft||o&&o.scrollLeft||0)-(s&&s.clientLeft||o&&o.clientLeft||0),e.pageY=n.clientY+(s&&s.scrollTop||o&&o.scrollTop||0)-(s&&s.clientTop||o&&o.clientTop||0)),!e.relatedTarget&&a&&(e.relatedTarget=a===e.target?n.toElement:a),!e.which&&u!==t&&(e.which=u&1?1:u&2?3:u&4?2:0),e}},fix:function(e){if(e[v.expando])return e;var t,n,r=e,s=v.event.fixHooks[e.type]||{},o=s.props?this.props.concat(s.props):this.props;e=v.Event(r);for(t=o.length;t;)n=o[--t],e[n]=r[n];return e.target||(e.target=r.srcElement||i),e.target.nodeType===3&&(e.target=e.target.parentNode),e.metaKey=!!e.metaKey,s.filter?s.filter(e,r):e},special:{load:{noBubble:!0},focus:{delegateType:"focusin"},blur:{delegateType:"focusout"},beforeunload:{setup:function(e,t,n){v.isWindow(this)&&(this.onbeforeunload=n)},teardown:function(e,t){this.onbeforeunload===t&&(this.onbeforeunload=null)}}},simulate:function(e,t,n,r){var i=v.extend(new v.Event,n,{type:e,isSimulated:!0,originalEvent:{}});r?v.event.trigger(i,null,t):v.event.dispatch.call(t,i),i.isDefaultPrevented()&&n.preventDefault()}},v.event.handle=v.event.dispatch,v.removeEvent=i.removeEventListener?function(e,t,n){e.removeEventListener&&e.removeEventListener(t,n,!1)}:function(e,t,n){var r="on"+t;e.detachEvent&&(typeof e[r]=="undefined"&&(e[r]=null),e.detachEvent(r,n))},v.Event=function(e,t){if(!(this instanceof v.Event))return new v.Event(e,t);e&&e.type?(this.originalEvent=e,this.type=e.type,this.isDefaultPrevented=e.defaultPrevented||e.returnValue===!1||e.getPreventDefault&&e.getPreventDefault()?tt:et):this.type=e,t&&v.extend(this,t),this.timeStamp=e&&e.timeStamp||v.now(),this[v.expando]=!0},v.Event.prototype={preventDefault:function(){this.isDefaultPrevented=tt;var e=this.originalEvent;if(!e)return;e.preventDefault?e.preventDefault():e.returnValue=!1},stopPropagation:function(){this.isPropagationStopped=tt;var e=this.originalEvent;if(!e)return;e.stopPropagation&&e.stopPropagation(),e.cancelBubble=!0},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=tt,this.stopPropagation()},isDefaultPrevented:et,isPropagationStopped:et,isImmediatePropagationStopped:et},v.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(e,t){v.event.special[e]={delegateType:t,bindType:t,handle:function(e){var n,r=this,i=e.relatedTarget,s=e.handleObj,o=s.selector;if(!i||i!==r&&!v.contains(r,i))e.type=s.origType,n=s.handler.apply(this,arguments),e.type=t;return n}}}),v.support.submitBubbles||(v.event.special.submit={setup:function(){if(v.nodeName(this,"form"))return!1;v.event.add(this,"click._submit keypress._submit",function(e){var n=e.target,r=v.nodeName(n,"input")||v.nodeName(n,"button")?n.form:t;r&&!v._data(r,"_submit_attached")&&(v.event.add(r,"submit._submit",function(e){e._submit_bubble=!0}),v._data(r,"_submit_attached",!0))})},postDispatch:function(e){e._submit_bubble&&(delete e._submit_bubble,this.parentNode&&!e.isTrigger&&v.event.simulate("submit",this.parentNode,e,!0))},teardown:function(){if(v.nodeName(this,"form"))return!1;v.event.remove(this,"._submit")}}),v.support.changeBubbles||(v.event.special.change={setup:function(){if($.test(this.nodeName)){if(this.type==="checkbox"||this.type==="radio")v.event.add(this,"propertychange._change",function(e){e.originalEvent.propertyName==="checked"&&(this._just_changed=!0)}),v.event.add(this,"click._change",function(e){this._just_changed&&!e.isTrigger&&(this._just_changed=!1),v.event.simulate("change",this,e,!0)});return!1}v.event.add(this,"beforeactivate._change",function(e){var t=e.target;$.test(t.nodeName)&&!v._data(t,"_change_attached")&&(v.event.add(t,"change._change",function(e){this.parentNode&&!e.isSimulated&&!e.isTrigger&&v.event.simulate("change",this.parentNode,e,!0)}),v._data(t,"_change_attached",!0))})},handle:function(e){var t=e.target;if(this!==t||e.isSimulated||e.isTrigger||t.type!=="radio"&&t.type!=="checkbox")return e.handleObj.handler.apply(this,arguments)},teardown:function(){return v.event.remove(this,"._change"),!$.test(this.nodeName)}}),v.support.focusinBubbles||v.each({focus:"focusin",blur:"focusout"},function(e,t){var n=0,r=function(e){v.event.simulate(t,e.target,v.event.fix(e),!0)};v.event.special[t]={setup:function(){n++===0&&i.addEventListener(e,r,!0)},teardown:function(){--n===0&&i.removeEventListener(e,r,!0)}}}),v.fn.extend({on:function(e,n,r,i,s){var o,u;if(typeof e=="object"){typeof n!="string"&&(r=r||n,n=t);for(u in e)this.on(u,n,r,e[u],s);return this}r==null&&i==null?(i=n,r=n=t):i==null&&(typeof n=="string"?(i=r,r=t):(i=r,r=n,n=t));if(i===!1)i=et;else if(!i)return this;return s===1&&(o=i,i=function(e){return v().off(e),o.apply(this,arguments)},i.guid=o.guid||(o.guid=v.guid++)),this.each(function(){v.event.add(this,e,i,r,n)})},one:function(e,t,n,r){return this.on(e,t,n,r,1)},off:function(e,n,r){var i,s;if(e&&e.preventDefault&&e.handleObj)return i=e.handleObj,v(e.delegateTarget).off(i.namespace?i.origType+"."+i.namespace:i.origType,i.selector,i.handler),this;if(typeof e=="object"){for(s in e)this.off(s,n,e[s]);return this}if(n===!1||typeof n=="function")r=n,n=t;return r===!1&&(r=et),this.each(function(){v.event.remove(this,e,r,n)})},bind:function(e,t,n){return this.on(e,null,t,n)},unbind:function(e,t){return this.off(e,null,t)},live:function(e,t,n){return v(this.context).on(e,this.selector,t,n),this},die:function(e,t){return v(this.context).off(e,this.selector||"**",t),this},delegate:function(e,t,n,r){return this.on(t,e,n,r)},undelegate:function(e,t,n){return arguments.length===1?this.off(e,"**"):this.off(t,e||"**",n)},trigger:function(e,t){return this.each(function(){v.event.trigger(e,t,this)})},triggerHandler:function(e,t){if(this[0])return v.event.trigger(e,t,this[0],!0)},toggle:function(e){var t=arguments,n=e.guid||v.guid++,r=0,i=function(n){var i=(v._data(this,"lastToggle"+e.guid)||0)%r;return v._data(this,"lastToggle"+e.guid,i+1),n.preventDefault(),t[i].apply(this,arguments)||!1};i.guid=n;while(r<t.length)t[r++].guid=n;return this.click(i)},hover:function(e,t){return this.mouseenter(e).mouseleave(t||e)}}),v.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(e,t){v.fn[t]=function(e,n){return n==null&&(n=e,e=null),arguments.length>0?this.on(t,null,e,n):this.trigger(t)},Q.test(t)&&(v.event.fixHooks[t]=v.event.keyHooks),G.test(t)&&(v.event.fixHooks[t]=v.event.mouseHooks)}),function(e,t){function nt(e,t,n,r){n=n||[],t=t||g;var i,s,a,f,l=t.nodeType;if(!e||typeof e!="string")return n;if(l!==1&&l!==9)return[];a=o(t);if(!a&&!r)if(i=R.exec(e))if(f=i[1]){if(l===9){s=t.getElementById(f);if(!s||!s.parentNode)return n;if(s.id===f)return n.push(s),n}else if(t.ownerDocument&&(s=t.ownerDocument.getElementById(f))&&u(t,s)&&s.id===f)return n.push(s),n}else{if(i[2])return S.apply(n,x.call(t.getElementsByTagName(e),0)),n;if((f=i[3])&&Z&&t.getElementsByClassName)return S.apply(n,x.call(t.getElementsByClassName(f),0)),n}return vt(e.replace(j,"$1"),t,n,r,a)}function rt(e){return function(t){var n=t.nodeName.toLowerCase();return n==="input"&&t.type===e}}function it(e){return function(t){var n=t.nodeName.toLowerCase();return(n==="input"||n==="button")&&t.type===e}}function st(e){return N(function(t){return t=+t,N(function(n,r){var i,s=e([],n.length,t),o=s.length;while(o--)n[i=s[o]]&&(n[i]=!(r[i]=n[i]))})})}function ot(e,t,n){if(e===t)return n;var r=e.nextSibling;while(r){if(r===t)return-1;r=r.nextSibling}return 1}function ut(e,t){var n,r,s,o,u,a,f,l=L[d][e+" "];if(l)return t?0:l.slice(0);u=e,a=[],f=i.preFilter;while(u){if(!n||(r=F.exec(u)))r&&(u=u.slice(r[0].length)||u),a.push(s=[]);n=!1;if(r=I.exec(u))s.push(n=new m(r.shift())),u=u.slice(n.length),n.type=r[0].replace(j," ");for(o in i.filter)(r=J[o].exec(u))&&(!f[o]||(r=f[o](r)))&&(s.push(n=new m(r.shift())),u=u.slice(n.length),n.type=o,n.matches=r);if(!n)break}return t?u.length:u?nt.error(e):L(e,a).slice(0)}function at(e,t,r){var i=t.dir,s=r&&t.dir==="parentNode",o=w++;return t.first?function(t,n,r){while(t=t[i])if(s||t.nodeType===1)return e(t,n,r)}:function(t,r,u){if(!u){var a,f=b+" "+o+" ",l=f+n;while(t=t[i])if(s||t.nodeType===1){if((a=t[d])===l)return t.sizset;if(typeof a=="string"&&a.indexOf(f)===0){if(t.sizset)return t}else{t[d]=l;if(e(t,r,u))return t.sizset=!0,t;t.sizset=!1}}}else while(t=t[i])if(s||t.nodeType===1)if(e(t,r,u))return t}}function ft(e){return e.length>1?function(t,n,r){var i=e.length;while(i--)if(!e[i](t,n,r))return!1;return!0}:e[0]}function lt(e,t,n,r,i){var s,o=[],u=0,a=e.length,f=t!=null;for(;u<a;u++)if(s=e[u])if(!n||n(s,r,i))o.push(s),f&&t.push(u);return o}function ct(e,t,n,r,i,s){return r&&!r[d]&&(r=ct(r)),i&&!i[d]&&(i=ct(i,s)),N(function(s,o,u,a){var f,l,c,h=[],p=[],d=o.length,v=s||dt(t||"*",u.nodeType?[u]:u,[]),m=e&&(s||!t)?lt(v,h,e,u,a):v,g=n?i||(s?e:d||r)?[]:o:m;n&&n(m,g,u,a);if(r){f=lt(g,p),r(f,[],u,a),l=f.length;while(l--)if(c=f[l])g[p[l]]=!(m[p[l]]=c)}if(s){if(i||e){if(i){f=[],l=g.length;while(l--)(c=g[l])&&f.push(m[l]=c);i(null,g=[],f,a)}l=g.length;while(l--)(c=g[l])&&(f=i?T.call(s,c):h[l])>-1&&(s[f]=!(o[f]=c))}}else g=lt(g===o?g.splice(d,g.length):g),i?i(null,o,g,a):S.apply(o,g)})}function ht(e){var t,n,r,s=e.length,o=i.relative[e[0].type],u=o||i.relative[" "],a=o?1:0,f=at(function(e){return e===t},u,!0),l=at(function(e){return T.call(t,e)>-1},u,!0),h=[function(e,n,r){return!o&&(r||n!==c)||((t=n).nodeType?f(e,n,r):l(e,n,r))}];for(;a<s;a++)if(n=i.relative[e[a].type])h=[at(ft(h),n)];else{n=i.filter[e[a].type].apply(null,e[a].matches);if(n[d]){r=++a;for(;r<s;r++)if(i.relative[e[r].type])break;return ct(a>1&&ft(h),a>1&&e.slice(0,a-1).join("").replace(j,"$1"),n,a<r&&ht(e.slice(a,r)),r<s&&ht(e=e.slice(r)),r<s&&e.join(""))}h.push(n)}return ft(h)}function pt(e,t){var r=t.length>0,s=e.length>0,o=function(u,a,f,l,h){var p,d,v,m=[],y=0,w="0",x=u&&[],T=h!=null,N=c,C=u||s&&i.find.TAG("*",h&&a.parentNode||a),k=b+=N==null?1:Math.E;T&&(c=a!==g&&a,n=o.el);for(;(p=C[w])!=null;w++){if(s&&p){for(d=0;v=e[d];d++)if(v(p,a,f)){l.push(p);break}T&&(b=k,n=++o.el)}r&&((p=!v&&p)&&y--,u&&x.push(p))}y+=w;if(r&&w!==y){for(d=0;v=t[d];d++)v(x,m,a,f);if(u){if(y>0)while(w--)!x[w]&&!m[w]&&(m[w]=E.call(l));m=lt(m)}S.apply(l,m),T&&!u&&m.length>0&&y+t.length>1&&nt.uniqueSort(l)}return T&&(b=k,c=N),x};return o.el=0,r?N(o):o}function dt(e,t,n){var r=0,i=t.length;for(;r<i;r++)nt(e,t[r],n);return n}function vt(e,t,n,r,s){var o,u,f,l,c,h=ut(e),p=h.length;if(!r&&h.length===1){u=h[0]=h[0].slice(0);if(u.length>2&&(f=u[0]).type==="ID"&&t.nodeType===9&&!s&&i.relative[u[1].type]){t=i.find.ID(f.matches[0].replace($,""),t,s)[0];if(!t)return n;e=e.slice(u.shift().length)}for(o=J.POS.test(e)?-1:u.length-1;o>=0;o--){f=u[o];if(i.relative[l=f.type])break;if(c=i.find[l])if(r=c(f.matches[0].replace($,""),z.test(u[0].type)&&t.parentNode||t,s)){u.splice(o,1),e=r.length&&u.join("");if(!e)return S.apply(n,x.call(r,0)),n;break}}}return a(e,h)(r,t,s,n,z.test(e)),n}function mt(){}var n,r,i,s,o,u,a,f,l,c,h=!0,p="undefined",d=("sizcache"+Math.random()).replace(".",""),m=String,g=e.document,y=g.documentElement,b=0,w=0,E=[].pop,S=[].push,x=[].slice,T=[].indexOf||function(e){var t=0,n=this.length;for(;t<n;t++)if(this[t]===e)return t;return-1},N=function(e,t){return e[d]=t==null||t,e},C=function(){var e={},t=[];return N(function(n,r){return t.push(n)>i.cacheLength&&delete e[t.shift()],e[n+" "]=r},e)},k=C(),L=C(),A=C(),O="[\\x20\\t\\r\\n\\f]",M="(?:\\\\.|[-\\w]|[^\\x00-\\xa0])+",_=M.replace("w","w#"),D="([*^$|!~]?=)",P="\\["+O+"*("+M+")"+O+"*(?:"+D+O+"*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|("+_+")|)|)"+O+"*\\]",H=":("+M+")(?:\\((?:(['\"])((?:\\\\.|[^\\\\])*?)\\2|([^()[\\]]*|(?:(?:"+P+")|[^:]|\\\\.)*|.*))\\)|)",B=":(even|odd|eq|gt|lt|nth|first|last)(?:\\("+O+"*((?:-\\d)?\\d*)"+O+"*\\)|)(?=[^-]|$)",j=new RegExp("^"+O+"+|((?:^|[^\\\\])(?:\\\\.)*)"+O+"+$","g"),F=new RegExp("^"+O+"*,"+O+"*"),I=new RegExp("^"+O+"*([\\x20\\t\\r\\n\\f>+~])"+O+"*"),q=new RegExp(H),R=/^(?:#([\w\-]+)|(\w+)|\.([\w\-]+))$/,U=/^:not/,z=/[\x20\t\r\n\f]*[+~]/,W=/:not\($/,X=/h\d/i,V=/input|select|textarea|button/i,$=/\\(?!\\)/g,J={ID:new RegExp("^#("+M+")"),CLASS:new RegExp("^\\.("+M+")"),NAME:new RegExp("^\\[name=['\"]?("+M+")['\"]?\\]"),TAG:new RegExp("^("+M.replace("w","w*")+")"),ATTR:new RegExp("^"+P),PSEUDO:new RegExp("^"+H),POS:new RegExp(B,"i"),CHILD:new RegExp("^:(only|nth|first|last)-child(?:\\("+O+"*(even|odd|(([+-]|)(\\d*)n|)"+O+"*(?:([+-]|)"+O+"*(\\d+)|))"+O+"*\\)|)","i"),needsContext:new RegExp("^"+O+"*[>+~]|"+B,"i")},K=function(e){var t=g.createElement("div");try{return e(t)}catch(n){return!1}finally{t=null}},Q=K(function(e){return e.appendChild(g.createComment("")),!e.getElementsByTagName("*").length}),G=K(function(e){return e.innerHTML="<a href='#'></a>",e.firstChild&&typeof e.firstChild.getAttribute!==p&&e.firstChild.getAttribute("href")==="#"}),Y=K(function(e){e.innerHTML="<select></select>";var t=typeof e.lastChild.getAttribute("multiple");return t!=="boolean"&&t!=="string"}),Z=K(function(e){return e.innerHTML="<div class='hidden e'></div><div class='hidden'></div>",!e.getElementsByClassName||!e.getElementsByClassName("e").length?!1:(e.lastChild.className="e",e.getElementsByClassName("e").length===2)}),et=K(function(e){e.id=d+0,e.innerHTML="<a name='"+d+"'></a><div name='"+d+"'></div>",y.insertBefore(e,y.firstChild);var t=g.getElementsByName&&g.getElementsByName(d).length===2+g.getElementsByName(d+0).length;return r=!g.getElementById(d),y.removeChild(e),t});try{x.call(y.childNodes,0)[0].nodeType}catch(tt){x=function(e){var t,n=[];for(;t=this[e];e++)n.push(t);return n}}nt.matches=function(e,t){return nt(e,null,null,t)},nt.matchesSelector=function(e,t){return nt(t,null,null,[e]).length>0},s=nt.getText=function(e){var t,n="",r=0,i=e.nodeType;if(i){if(i===1||i===9||i===11){if(typeof e.textContent=="string")return e.textContent;for(e=e.firstChild;e;e=e.nextSibling)n+=s(e)}else if(i===3||i===4)return e.nodeValue}else for(;t=e[r];r++)n+=s(t);return n},o=nt.isXML=function(e){var t=e&&(e.ownerDocument||e).documentElement;return t?t.nodeName!=="HTML":!1},u=nt.contains=y.contains?function(e,t){var n=e.nodeType===9?e.documentElement:e,r=t&&t.parentNode;return e===r||!!(r&&r.nodeType===1&&n.contains&&n.contains(r))}:y.compareDocumentPosition?function(e,t){return t&&!!(e.compareDocumentPosition(t)&16)}:function(e,t){while(t=t.parentNode)if(t===e)return!0;return!1},nt.attr=function(e,t){var n,r=o(e);return r||(t=t.toLowerCase()),(n=i.attrHandle[t])?n(e):r||Y?e.getAttribute(t):(n=e.getAttributeNode(t),n?typeof e[t]=="boolean"?e[t]?t:null:n.specified?n.value:null:null)},i=nt.selectors={cacheLength:50,createPseudo:N,match:J,attrHandle:G?{}:{href:function(e){return e.getAttribute("href",2)},type:function(e){return e.getAttribute("type")}},find:{ID:r?function(e,t,n){if(typeof t.getElementById!==p&&!n){var r=t.getElementById(e);return r&&r.parentNode?[r]:[]}}:function(e,n,r){if(typeof n.getElementById!==p&&!r){var i=n.getElementById(e);return i?i.id===e||typeof i.getAttributeNode!==p&&i.getAttributeNode("id").value===e?[i]:t:[]}},TAG:Q?function(e,t){if(typeof t.getElementsByTagName!==p)return t.getElementsByTagName(e)}:function(e,t){var n=t.getElementsByTagName(e);if(e==="*"){var r,i=[],s=0;for(;r=n[s];s++)r.nodeType===1&&i.push(r);return i}return n},NAME:et&&function(e,t){if(typeof t.getElementsByName!==p)return t.getElementsByName(name)},CLASS:Z&&function(e,t,n){if(typeof t.getElementsByClassName!==p&&!n)return t.getElementsByClassName(e)}},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(e){return e[1]=e[1].replace($,""),e[3]=(e[4]||e[5]||"").replace($,""),e[2]==="~="&&(e[3]=" "+e[3]+" "),e.slice(0,4)},CHILD:function(e){return e[1]=e[1].toLowerCase(),e[1]==="nth"?(e[2]||nt.error(e[0]),e[3]=+(e[3]?e[4]+(e[5]||1):2*(e[2]==="even"||e[2]==="odd")),e[4]=+(e[6]+e[7]||e[2]==="odd")):e[2]&&nt.error(e[0]),e},PSEUDO:function(e){var t,n;if(J.CHILD.test(e[0]))return null;if(e[3])e[2]=e[3];else if(t=e[4])q.test(t)&&(n=ut(t,!0))&&(n=t.indexOf(")",t.length-n)-t.length)&&(t=t.slice(0,n),e[0]=e[0].slice(0,n)),e[2]=t;return e.slice(0,3)}},filter:{ID:r?function(e){return e=e.replace($,""),function(t){return t.getAttribute("id")===e}}:function(e){return e=e.replace($,""),function(t){var n=typeof t.getAttributeNode!==p&&t.getAttributeNode("id");return n&&n.value===e}},TAG:function(e){return e==="*"?function(){return!0}:(e=e.replace($,"").toLowerCase(),function(t){return t.nodeName&&t.nodeName.toLowerCase()===e})},CLASS:function(e){var t=k[d][e+" "];return t||(t=new RegExp("(^|"+O+")"+e+"("+O+"|$)"))&&k(e,function(e){return t.test(e.className||typeof e.getAttribute!==p&&e.getAttribute("class")||"")})},ATTR:function(e,t,n){return function(r,i){var s=nt.attr(r,e);return s==null?t==="!=":t?(s+="",t==="="?s===n:t==="!="?s!==n:t==="^="?n&&s.indexOf(n)===0:t==="*="?n&&s.indexOf(n)>-1:t==="$="?n&&s.substr(s.length-n.length)===n:t==="~="?(" "+s+" ").indexOf(n)>-1:t==="|="?s===n||s.substr(0,n.length+1)===n+"-":!1):!0}},CHILD:function(e,t,n,r){return e==="nth"?function(e){var t,i,s=e.parentNode;if(n===1&&r===0)return!0;if(s){i=0;for(t=s.firstChild;t;t=t.nextSibling)if(t.nodeType===1){i++;if(e===t)break}}return i-=r,i===n||i%n===0&&i/n>=0}:function(t){var n=t;switch(e){case"only":case"first":while(n=n.previousSibling)if(n.nodeType===1)return!1;if(e==="first")return!0;n=t;case"last":while(n=n.nextSibling)if(n.nodeType===1)return!1;return!0}}},PSEUDO:function(e,t){var n,r=i.pseudos[e]||i.setFilters[e.toLowerCase()]||nt.error("unsupported pseudo: "+e);return r[d]?r(t):r.length>1?(n=[e,e,"",t],i.setFilters.hasOwnProperty(e.toLowerCase())?N(function(e,n){var i,s=r(e,t),o=s.length;while(o--)i=T.call(e,s[o]),e[i]=!(n[i]=s[o])}):function(e){return r(e,0,n)}):r}},pseudos:{not:N(function(e){var t=[],n=[],r=a(e.replace(j,"$1"));return r[d]?N(function(e,t,n,i){var s,o=r(e,null,i,[]),u=e.length;while(u--)if(s=o[u])e[u]=!(t[u]=s)}):function(e,i,s){return t[0]=e,r(t,null,s,n),!n.pop()}}),has:N(function(e){return function(t){return nt(e,t).length>0}}),contains:N(function(e){return function(t){return(t.textContent||t.innerText||s(t)).indexOf(e)>-1}}),enabled:function(e){return e.disabled===!1},disabled:function(e){return e.disabled===!0},checked:function(e){var t=e.nodeName.toLowerCase();return t==="input"&&!!e.checked||t==="option"&&!!e.selected},selected:function(e){return e.parentNode&&e.parentNode.selectedIndex,e.selected===!0},parent:function(e){return!i.pseudos.empty(e)},empty:function(e){var t;e=e.firstChild;while(e){if(e.nodeName>"@"||(t=e.nodeType)===3||t===4)return!1;e=e.nextSibling}return!0},header:function(e){return X.test(e.nodeName)},text:function(e){var t,n;return e.nodeName.toLowerCase()==="input"&&(t=e.type)==="text"&&((n=e.getAttribute("type"))==null||n.toLowerCase()===t)},radio:rt("radio"),checkbox:rt("checkbox"),file:rt("file"),password:rt("password"),image:rt("image"),submit:it("submit"),reset:it("reset"),button:function(e){var t=e.nodeName.toLowerCase();return t==="input"&&e.type==="button"||t==="button"},input:function(e){return V.test(e.nodeName)},focus:function(e){var t=e.ownerDocument;return e===t.activeElement&&(!t.hasFocus||t.hasFocus())&&!!(e.type||e.href||~e.tabIndex)},active:function(e){return e===e.ownerDocument.activeElement},first:st(function(){return[0]}),last:st(function(e,t){return[t-1]}),eq:st(function(e,t,n){return[n<0?n+t:n]}),even:st(function(e,t){for(var n=0;n<t;n+=2)e.push(n);return e}),odd:st(function(e,t){for(var n=1;n<t;n+=2)e.push(n);return e}),lt:st(function(e,t,n){for(var r=n<0?n+t:n;--r>=0;)e.push(r);return e}),gt:st(function(e,t,n){for(var r=n<0?n+t:n;++r<t;)e.push(r);return e})}},f=y.compareDocumentPosition?function(e,t){return e===t?(l=!0,0):(!e.compareDocumentPosition||!t.compareDocumentPosition?e.compareDocumentPosition:e.compareDocumentPosition(t)&4)?-1:1}:function(e,t){if(e===t)return l=!0,0;if(e.sourceIndex&&t.sourceIndex)return e.sourceIndex-t.sourceIndex;var n,r,i=[],s=[],o=e.parentNode,u=t.parentNode,a=o;if(o===u)return ot(e,t);if(!o)return-1;if(!u)return 1;while(a)i.unshift(a),a=a.parentNode;a=u;while(a)s.unshift(a),a=a.parentNode;n=i.length,r=s.length;for(var f=0;f<n&&f<r;f++)if(i[f]!==s[f])return ot(i[f],s[f]);return f===n?ot(e,s[f],-1):ot(i[f],t,1)},[0,0].sort(f),h=!l,nt.uniqueSort=function(e){var t,n=[],r=1,i=0;l=h,e.sort(f);if(l){for(;t=e[r];r++)t===e[r-1]&&(i=n.push(r));while(i--)e.splice(n[i],1)}return e},nt.error=function(e){throw new Error("Syntax error, unrecognized expression: "+e)},a=nt.compile=function(e,t){var n,r=[],i=[],s=A[d][e+" "];if(!s){t||(t=ut(e)),n=t.length;while(n--)s=ht(t[n]),s[d]?r.push(s):i.push(s);s=A(e,pt(i,r))}return s},g.querySelectorAll&&function(){var e,t=vt,n=/'|\\/g,r=/\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,i=[":focus"],s=[":active"],u=y.matchesSelector||y.mozMatchesSelector||y.webkitMatchesSelector||y.oMatchesSelector||y.msMatchesSelector;K(function(e){e.innerHTML="<select><option selected=''></option></select>",e.querySelectorAll("[selected]").length||i.push("\\["+O+"*(?:checked|disabled|ismap|multiple|readonly|selected|value)"),e.querySelectorAll(":checked").length||i.push(":checked")}),K(function(e){e.innerHTML="<p test=''></p>",e.querySelectorAll("[test^='']").length&&i.push("[*^$]="+O+"*(?:\"\"|'')"),e.innerHTML="<input type='hidden'/>",e.querySelectorAll(":enabled").length||i.push(":enabled",":disabled")}),i=new RegExp(i.join("|")),vt=function(e,r,s,o,u){if(!o&&!u&&!i.test(e)){var a,f,l=!0,c=d,h=r,p=r.nodeType===9&&e;if(r.nodeType===1&&r.nodeName.toLowerCase()!=="object"){a=ut(e),(l=r.getAttribute("id"))?c=l.replace(n,"\\$&"):r.setAttribute("id",c),c="[id='"+c+"'] ",f=a.length;while(f--)a[f]=c+a[f].join("");h=z.test(e)&&r.parentNode||r,p=a.join(",")}if(p)try{return S.apply(s,x.call(h.querySelectorAll(p),0)),s}catch(v){}finally{l||r.removeAttribute("id")}}return t(e,r,s,o,u)},u&&(K(function(t){e=u.call(t,"div");try{u.call(t,"[test!='']:sizzle"),s.push("!=",H)}catch(n){}}),s=new RegExp(s.join("|")),nt.matchesSelector=function(t,n){n=n.replace(r,"='$1']");if(!o(t)&&!s.test(n)&&!i.test(n))try{var a=u.call(t,n);if(a||e||t.document&&t.document.nodeType!==11)return a}catch(f){}return nt(n,null,null,[t]).length>0})}(),i.pseudos.nth=i.pseudos.eq,i.filters=mt.prototype=i.pseudos,i.setFilters=new mt,nt.attr=v.attr,v.find=nt,v.expr=nt.selectors,v.expr[":"]=v.expr.pseudos,v.unique=nt.uniqueSort,v.text=nt.getText,v.isXMLDoc=nt.isXML,v.contains=nt.contains}(e);var nt=/Until$/,rt=/^(?:parents|prev(?:Until|All))/,it=/^.[^:#\[\.,]*$/,st=v.expr.match.needsContext,ot={children:!0,contents:!0,next:!0,prev:!0};v.fn.extend({find:function(e){var t,n,r,i,s,o,u=this;if(typeof e!="string")return v(e).filter(function(){for(t=0,n=u.length;t<n;t++)if(v.contains(u[t],this))return!0});o=this.pushStack("","find",e);for(t=0,n=this.length;t<n;t++){r=o.length,v.find(e,this[t],o);if(t>0)for(i=r;i<o.length;i++)for(s=0;s<r;s++)if(o[s]===o[i]){o.splice(i--,1);break}}return o},has:function(e){var t,n=v(e,this),r=n.length;return this.filter(function(){for(t=0;t<r;t++)if(v.contains(this,n[t]))return!0})},not:function(e){return this.pushStack(ft(this,e,!1),"not",e)},filter:function(e){return this.pushStack(ft(this,e,!0),"filter",e)},is:function(e){return!!e&&(typeof e=="string"?st.test(e)?v(e,this.context).index(this[0])>=0:v.filter(e,this).length>0:this.filter(e).length>0)},closest:function(e,t){var n,r=0,i=this.length,s=[],o=st.test(e)||typeof e!="string"?v(e,t||this.context):0;for(;r<i;r++){n=this[r];while(n&&n.ownerDocument&&n!==t&&n.nodeType!==11){if(o?o.index(n)>-1:v.find.matchesSelector(n,e)){s.push(n);break}n=n.parentNode}}return s=s.length>1?v.unique(s):s,this.pushStack(s,"closest",e)},index:function(e){return e?typeof e=="string"?v.inArray(this[0],v(e)):v.inArray(e.jquery?e[0]:e,this):this[0]&&this[0].parentNode?this.prevAll().length:-1},add:function(e,t){var n=typeof e=="string"?v(e,t):v.makeArray(e&&e.nodeType?[e]:e),r=v.merge(this.get(),n);return this.pushStack(ut(n[0])||ut(r[0])?r:v.unique(r))},addBack:function(e){return this.add(e==null?this.prevObject:this.prevObject.filter(e))}}),v.fn.andSelf=v.fn.addBack,v.each({parent:function(e){var t=e.parentNode;return t&&t.nodeType!==11?t:null},parents:function(e){return v.dir(e,"parentNode")},parentsUntil:function(e,t,n){return v.dir(e,"parentNode",n)},next:function(e){return at(e,"nextSibling")},prev:function(e){return at(e,"previousSibling")},nextAll:function(e){return v.dir(e,"nextSibling")},prevAll:function(e){return v.dir(e,"previousSibling")},nextUntil:function(e,t,n){return v.dir(e,"nextSibling",n)},prevUntil:function(e,t,n){return v.dir(e,"previousSibling",n)},siblings:function(e){return v.sibling((e.parentNode||{}).firstChild,e)},children:function(e){return v.sibling(e.firstChild)},contents:function(e){return v.nodeName(e,"iframe")?e.contentDocument||e.contentWindow.document:v.merge([],e.childNodes)}},function(e,t){v.fn[e]=function(n,r){var i=v.map(this,t,n);return nt.test(e)||(r=n),r&&typeof r=="string"&&(i=v.filter(r,i)),i=this.length>1&&!ot[e]?v.unique(i):i,this.length>1&&rt.test(e)&&(i=i.reverse()),this.pushStack(i,e,l.call(arguments).join(","))}}),v.extend({filter:function(e,t,n){return n&&(e=":not("+e+")"),t.length===1?v.find.matchesSelector(t[0],e)?[t[0]]:[]:v.find.matches(e,t)},dir:function(e,n,r){var i=[],s=e[n];while(s&&s.nodeType!==9&&(r===t||s.nodeType!==1||!v(s).is(r)))s.nodeType===1&&i.push(s),s=s[n];return i},sibling:function(e,t){var n=[];for(;e;e=e.nextSibling)e.nodeType===1&&e!==t&&n.push(e);return n}});var ct="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",ht=/ jQuery\d+="(?:null|\d+)"/g,pt=/^\s+/,dt=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,vt=/<([\w:]+)/,mt=/<tbody/i,gt=/<|&#?\w+;/,yt=/<(?:script|style|link)/i,bt=/<(?:script|object|embed|option|style)/i,wt=new RegExp("<(?:"+ct+")[\\s/>]","i"),Et=/^(?:checkbox|radio)$/,St=/checked\s*(?:[^=]|=\s*.checked.)/i,xt=/\/(java|ecma)script/i,Tt=/^\s*<!(?:\[CDATA\[|\-\-)|[\]\-]{2}>\s*$/g,Nt={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]},Ct=lt(i),kt=Ct.appendChild(i.createElement("div"));Nt.optgroup=Nt.option,Nt.tbody=Nt.tfoot=Nt.colgroup=Nt.caption=Nt.thead,Nt.th=Nt.td,v.support.htmlSerialize||(Nt._default=[1,"X<div>","</div>"]),v.fn.extend({text:function(e){return v.access(this,function(e){return e===t?v.text(this):this.empty().append((this[0]&&this[0].ownerDocument||i).createTextNode(e))},null,e,arguments.length)},wrapAll:function(e){if(v.isFunction(e))return this.each(function(t){v(this).wrapAll(e.call(this,t))});if(this[0]){var t=v(e,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&t.insertBefore(this[0]),t.map(function(){var e=this;while(e.firstChild&&e.firstChild.nodeType===1)e=e.firstChild;return e}).append(this)}return this},wrapInner:function(e){return v.isFunction(e)?this.each(function(t){v(this).wrapInner(e.call(this,t))}):this.each(function(){var t=v(this),n=t.contents();n.length?n.wrapAll(e):t.append(e)})},wrap:function(e){var t=v.isFunction(e);return this.each(function(n){v(this).wrapAll(t?e.call(this,n):e)})},unwrap:function(){return this.parent().each(function(){v.nodeName(this,"body")||v(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(e){(this.nodeType===1||this.nodeType===11)&&this.appendChild(e)})},prepend:function(){return this.domManip(arguments,!0,function(e){(this.nodeType===1||this.nodeType===11)&&this.insertBefore(e,this.firstChild)})},before:function(){if(!ut(this[0]))return this.domManip(arguments,!1,function(e){this.parentNode.insertBefore(e,this)});if(arguments.length){var e=v.clean(arguments);return this.pushStack(v.merge(e,this),"before",this.selector)}},after:function(){if(!ut(this[0]))return this.domManip(arguments,!1,function(e){this.parentNode.insertBefore(e,this.nextSibling)});if(arguments.length){var e=v.clean(arguments);return this.pushStack(v.merge(this,e),"after",this.selector)}},remove:function(e,t){var n,r=0;for(;(n=this[r])!=null;r++)if(!e||v.filter(e,[n]).length)!t&&n.nodeType===1&&(v.cleanData(n.getElementsByTagName("*")),v.cleanData([n])),n.parentNode&&n.parentNode.removeChild(n);return this},empty:function(){var e,t=0;for(;(e=this[t])!=null;t++){e.nodeType===1&&v.cleanData(e.getElementsByTagName("*"));while(e.firstChild)e.removeChild(e.firstChild)}return this},clone:function(e,t){return e=e==null?!1:e,t=t==null?e:t,this.map(function(){return v.clone(this,e,t)})},html:function(e){return v.access(this,function(e){var n=this[0]||{},r=0,i=this.length;if(e===t)return n.nodeType===1?n.innerHTML.replace(ht,""):t;if(typeof e=="string"&&!yt.test(e)&&(v.support.htmlSerialize||!wt.test(e))&&(v.support.leadingWhitespace||!pt.test(e))&&!Nt[(vt.exec(e)||["",""])[1].toLowerCase()]){e=e.replace(dt,"<$1></$2>");try{for(;r<i;r++)n=this[r]||{},n.nodeType===1&&(v.cleanData(n.getElementsByTagName("*")),n.innerHTML=e);n=0}catch(s){}}n&&this.empty().append(e)},null,e,arguments.length)},replaceWith:function(e){return ut(this[0])?this.length?this.pushStack(v(v.isFunction(e)?e():e),"replaceWith",e):this:v.isFunction(e)?this.each(function(t){var n=v(this),r=n.html();n.replaceWith(e.call(this,t,r))}):(typeof e!="string"&&(e=v(e).detach()),this.each(function(){var t=this.nextSibling,n=this.parentNode;v(this).remove(),t?v(t).before(e):v(n).append(e)}))},detach:function(e){return this.remove(e,!0)},domManip:function(e,n,r){e=[].concat.apply([],e);var i,s,o,u,a=0,f=e[0],l=[],c=this.length;if(!v.support.checkClone&&c>1&&typeof f=="string"&&St.test(f))return this.each(function(){v(this).domManip(e,n,r)});if(v.isFunction(f))return this.each(function(i){var s=v(this);e[0]=f.call(this,i,n?s.html():t),s.domManip(e,n,r)});if(this[0]){i=v.buildFragment(e,this,l),o=i.fragment,s=o.firstChild,o.childNodes.length===1&&(o=s);if(s){n=n&&v.nodeName(s,"tr");for(u=i.cacheable||c-1;a<c;a++)r.call(n&&v.nodeName(this[a],"table")?Lt(this[a],"tbody"):this[a],a===u?o:v.clone(o,!0,!0))}o=s=null,l.length&&v.each(l,function(e,t){t.src?v.ajax?v.ajax({url:t.src,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0}):v.error("no ajax"):v.globalEval((t.text||t.textContent||t.innerHTML||"").replace(Tt,"")),t.parentNode&&t.parentNode.removeChild(t)})}return this}}),v.buildFragment=function(e,n,r){var s,o,u,a=e[0];return n=n||i,n=!n.nodeType&&n[0]||n,n=n.ownerDocument||n,e.length===1&&typeof a=="string"&&a.length<512&&n===i&&a.charAt(0)==="<"&&!bt.test(a)&&(v.support.checkClone||!St.test(a))&&(v.support.html5Clone||!wt.test(a))&&(o=!0,s=v.fragments[a],u=s!==t),s||(s=n.createDocumentFragment(),v.clean(e,n,s,r),o&&(v.fragments[a]=u&&s)),{fragment:s,cacheable:o}},v.fragments={},v.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(e,t){v.fn[e]=function(n){var r,i=0,s=[],o=v(n),u=o.length,a=this.length===1&&this[0].parentNode;if((a==null||a&&a.nodeType===11&&a.childNodes.length===1)&&u===1)return o[t](this[0]),this;for(;i<u;i++)r=(i>0?this.clone(!0):this).get(),v(o[i])[t](r),s=s.concat(r);return this.pushStack(s,e,o.selector)}}),v.extend({clone:function(e,t,n){var r,i,s,o;v.support.html5Clone||v.isXMLDoc(e)||!wt.test("<"+e.nodeName+">")?o=e.cloneNode(!0):(kt.innerHTML=e.outerHTML,kt.removeChild(o=kt.firstChild));if((!v.support.noCloneEvent||!v.support.noCloneChecked)&&(e.nodeType===1||e.nodeType===11)&&!v.isXMLDoc(e)){Ot(e,o),r=Mt(e),i=Mt(o);for(s=0;r[s];++s)i[s]&&Ot(r[s],i[s])}if(t){At(e,o);if(n){r=Mt(e),i=Mt(o);for(s=0;r[s];++s)At(r[s],i[s])}}return r=i=null,o},clean:function(e,t,n,r){var s,o,u,a,f,l,c,h,p,d,m,g,y=t===i&&Ct,b=[];if(!t||typeof t.createDocumentFragment=="undefined")t=i;for(s=0;(u=e[s])!=null;s++){typeof u=="number"&&(u+="");if(!u)continue;if(typeof u=="string")if(!gt.test(u))u=t.createTextNode(u);else{y=y||lt(t),c=t.createElement("div"),y.appendChild(c),u=u.replace(dt,"<$1></$2>"),a=(vt.exec(u)||["",""])[1].toLowerCase(),f=Nt[a]||Nt._default,l=f[0],c.innerHTML=f[1]+u+f[2];while(l--)c=c.lastChild;if(!v.support.tbody){h=mt.test(u),p=a==="table"&&!h?c.firstChild&&c.firstChild.childNodes:f[1]==="<table>"&&!h?c.childNodes:[];for(o=p.length-1;o>=0;--o)v.nodeName(p[o],"tbody")&&!p[o].childNodes.length&&p[o].parentNode.removeChild(p[o])}!v.support.leadingWhitespace&&pt.test(u)&&c.insertBefore(t.createTextNode(pt.exec(u)[0]),c.firstChild),u=c.childNodes,c.parentNode.removeChild(c)}u.nodeType?b.push(u):v.merge(b,u)}c&&(u=c=y=null);if(!v.support.appendChecked)for(s=0;(u=b[s])!=null;s++)v.nodeName(u,"input")?_t(u):typeof u.getElementsByTagName!="undefined"&&v.grep(u.getElementsByTagName("input"),_t);if(n){m=function(e){if(!e.type||xt.test(e.type))return r?r.push(e.parentNode?e.parentNode.removeChild(e):e):n.appendChild(e)};for(s=0;(u=b[s])!=null;s++)if(!v.nodeName(u,"script")||!m(u))n.appendChild(u),typeof u.getElementsByTagName!="undefined"&&(g=v.grep(v.merge([],u.getElementsByTagName("script")),m),b.splice.apply(b,[s+1,0].concat(g)),s+=g.length)}return b},cleanData:function(e,t){var n,r,i,s,o=0,u=v.expando,a=v.cache,f=v.support.deleteExpando,l=v.event.special;for(;(i=e[o])!=null;o++)if(t||v.acceptData(i)){r=i[u],n=r&&a[r];if(n){if(n.events)for(s in n.events)l[s]?v.event.remove(i,s):v.removeEvent(i,s,n.handle);a[r]&&(delete a[r],f?delete i[u]:i.removeAttribute?i.removeAttribute(u):i[u]=null,v.deletedIds.push(r))}}}}),function(){var e,t;v.uaMatch=function(e){e=e.toLowerCase();var t=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||e.indexOf("compatible")<0&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];return{browser:t[1]||"",version:t[2]||"0"}},e=v.uaMatch(o.userAgent),t={},e.browser&&(t[e.browser]=!0,t.version=e.version),t.chrome?t.webkit=!0:t.webkit&&(t.safari=!0),v.browser=t,v.sub=function(){function e(t,n){return new e.fn.init(t,n)}v.extend(!0,e,this),e.superclass=this,e.fn=e.prototype=this(),e.fn.constructor=e,e.sub=this.sub,e.fn.init=function(r,i){return i&&i instanceof v&&!(i instanceof e)&&(i=e(i)),v.fn.init.call(this,r,i,t)},e.fn.init.prototype=e.fn;var t=e(i);return e}}();var Dt,Pt,Ht,Bt=/alpha\([^)]*\)/i,jt=/opacity=([^)]*)/,Ft=/^(top|right|bottom|left)$/,It=/^(none|table(?!-c[ea]).+)/,qt=/^margin/,Rt=new RegExp("^("+m+")(.*)$","i"),Ut=new RegExp("^("+m+")(?!px)[a-z%]+$","i"),zt=new RegExp("^([-+])=("+m+")","i"),Wt={BODY:"block"},Xt={position:"absolute",visibility:"hidden",display:"block"},Vt={letterSpacing:0,fontWeight:400},$t=["Top","Right","Bottom","Left"],Jt=["Webkit","O","Moz","ms"],Kt=v.fn.toggle;v.fn.extend({css:function(e,n){return v.access(this,function(e,n,r){return r!==t?v.style(e,n,r):v.css(e,n)},e,n,arguments.length>1)},show:function(){return Yt(this,!0)},hide:function(){return Yt(this)},toggle:function(e,t){var n=typeof e=="boolean";return v.isFunction(e)&&v.isFunction(t)?Kt.apply(this,arguments):this.each(function(){(n?e:Gt(this))?v(this).show():v(this).hide()})}}),v.extend({cssHooks:{opacity:{get:function(e,t){if(t){var n=Dt(e,"opacity");return n===""?"1":n}}}},cssNumber:{fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":v.support.cssFloat?"cssFloat":"styleFloat"},style:function(e,n,r,i){if(!e||e.nodeType===3||e.nodeType===8||!e.style)return;var s,o,u,a=v.camelCase(n),f=e.style;n=v.cssProps[a]||(v.cssProps[a]=Qt(f,a)),u=v.cssHooks[n]||v.cssHooks[a];if(r===t)return u&&"get"in u&&(s=u.get(e,!1,i))!==t?s:f[n];o=typeof r,o==="string"&&(s=zt.exec(r))&&(r=(s[1]+1)*s[2]+parseFloat(v.css(e,n)),o="number");if(r==null||o==="number"&&isNaN(r))return;o==="number"&&!v.cssNumber[a]&&(r+="px");if(!u||!("set"in u)||(r=u.set(e,r,i))!==t)try{f[n]=r}catch(l){}},css:function(e,n,r,i){var s,o,u,a=v.camelCase(n);return n=v.cssProps[a]||(v.cssProps[a]=Qt(e.style,a)),u=v.cssHooks[n]||v.cssHooks[a],u&&"get"in u&&(s=u.get(e,!0,i)),s===t&&(s=Dt(e,n)),s==="normal"&&n in Vt&&(s=Vt[n]),r||i!==t?(o=parseFloat(s),r||v.isNumeric(o)?o||0:s):s},swap:function(e,t,n){var r,i,s={};for(i in t)s[i]=e.style[i],e.style[i]=t[i];r=n.call(e);for(i in t)e.style[i]=s[i];return r}}),e.getComputedStyle?Dt=function(t,n){var r,i,s,o,u=e.getComputedStyle(t,null),a=t.style;return u&&(r=u.getPropertyValue(n)||u[n],r===""&&!v.contains(t.ownerDocument,t)&&(r=v.style(t,n)),Ut.test(r)&&qt.test(n)&&(i=a.width,s=a.minWidth,o=a.maxWidth,a.minWidth=a.maxWidth=a.width=r,r=u.width,a.width=i,a.minWidth=s,a.maxWidth=o)),r}:i.documentElement.currentStyle&&(Dt=function(e,t){var n,r,i=e.currentStyle&&e.currentStyle[t],s=e.style;return i==null&&s&&s[t]&&(i=s[t]),Ut.test(i)&&!Ft.test(t)&&(n=s.left,r=e.runtimeStyle&&e.runtimeStyle.left,r&&(e.runtimeStyle.left=e.currentStyle.left),s.left=t==="fontSize"?"1em":i,i=s.pixelLeft+"px",s.left=n,r&&(e.runtimeStyle.left=r)),i===""?"auto":i}),v.each(["height","width"],function(e,t){v.cssHooks[t]={get:function(e,n,r){if(n)return e.offsetWidth===0&&It.test(Dt(e,"display"))?v.swap(e,Xt,function(){return tn(e,t,r)}):tn(e,t,r)},set:function(e,n,r){return Zt(e,n,r?en(e,t,r,v.support.boxSizing&&v.css(e,"boxSizing")==="border-box"):0)}}}),v.support.opacity||(v.cssHooks.opacity={get:function(e,t){return jt.test((t&&e.currentStyle?e.currentStyle.filter:e.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":t?"1":""},set:function(e,t){var n=e.style,r=e.currentStyle,i=v.isNumeric(t)?"alpha(opacity="+t*100+")":"",s=r&&r.filter||n.filter||"";n.zoom=1;if(t>=1&&v.trim(s.replace(Bt,""))===""&&n.removeAttribute){n.removeAttribute("filter");if(r&&!r.filter)return}n.filter=Bt.test(s)?s.replace(Bt,i):s+" "+i}}),v(function(){v.support.reliableMarginRight||(v.cssHooks.marginRight={get:function(e,t){return v.swap(e,{display:"inline-block"},function(){if(t)return Dt(e,"marginRight")})}}),!v.support.pixelPosition&&v.fn.position&&v.each(["top","left"],function(e,t){v.cssHooks[t]={get:function(e,n){if(n){var r=Dt(e,t);return Ut.test(r)?v(e).position()[t]+"px":r}}}})}),v.expr&&v.expr.filters&&(v.expr.filters.hidden=function(e){return e.offsetWidth===0&&e.offsetHeight===0||!v.support.reliableHiddenOffsets&&(e.style&&e.style.display||Dt(e,"display"))==="none"},v.expr.filters.visible=function(e){return!v.expr.filters.hidden(e)}),v.each({margin:"",padding:"",border:"Width"},function(e,t){v.cssHooks[e+t]={expand:function(n){var r,i=typeof n=="string"?n.split(" "):[n],s={};for(r=0;r<4;r++)s[e+$t[r]+t]=i[r]||i[r-2]||i[0];return s}},qt.test(e)||(v.cssHooks[e+t].set=Zt)});var rn=/%20/g,sn=/\[\]$/,on=/\r?\n/g,un=/^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,an=/^(?:select|textarea)/i;v.fn.extend({serialize:function(){return v.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?v.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||an.test(this.nodeName)||un.test(this.type))}).map(function(e,t){var n=v(this).val();return n==null?null:v.isArray(n)?v.map(n,function(e,n){return{name:t.name,value:e.replace(on,"\r\n")}}):{name:t.name,value:n.replace(on,"\r\n")}}).get()}}),v.param=function(e,n){var r,i=[],s=function(e,t){t=v.isFunction(t)?t():t==null?"":t,i[i.length]=encodeURIComponent(e)+"="+encodeURIComponent(t)};n===t&&(n=v.ajaxSettings&&v.ajaxSettings.traditional);if(v.isArray(e)||e.jquery&&!v.isPlainObject(e))v.each(e,function(){s(this.name,this.value)});else for(r in e)fn(r,e[r],n,s);return i.join("&").replace(rn,"+")};var ln,cn,hn=/#.*$/,pn=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,dn=/^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,vn=/^(?:GET|HEAD)$/,mn=/^\/\//,gn=/\?/,yn=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,bn=/([?&])_=[^&]*/,wn=/^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,En=v.fn.load,Sn={},xn={},Tn=["*/"]+["*"];try{cn=s.href}catch(Nn){cn=i.createElement("a"),cn.href="",cn=cn.href}ln=wn.exec(cn.toLowerCase())||[],v.fn.load=function(e,n,r){if(typeof e!="string"&&En)return En.apply(this,arguments);if(!this.length)return this;var i,s,o,u=this,a=e.indexOf(" ");return a>=0&&(i=e.slice(a,e.length),e=e.slice(0,a)),v.isFunction(n)?(r=n,n=t):n&&typeof n=="object"&&(s="POST"),v.ajax({url:e,type:s,dataType:"html",data:n,complete:function(e,t){r&&u.each(r,o||[e.responseText,t,e])}}).done(function(e){o=arguments,u.html(i?v("<div>").append(e.replace(yn,"")).find(i):e)}),this},v.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(e,t){v.fn[t]=function(e){return this.on(t,e)}}),v.each(["get","post"],function(e,n){v[n]=function(e,r,i,s){return v.isFunction(r)&&(s=s||i,i=r,r=t),v.ajax({type:n,url:e,data:r,success:i,dataType:s})}}),v.extend({getScript:function(e,n){return v.get(e,t,n,"script")},getJSON:function(e,t,n){return v.get(e,t,n,"json")},ajaxSetup:function(e,t){return t?Ln(e,v.ajaxSettings):(t=e,e=v.ajaxSettings),Ln(e,t),e},ajaxSettings:{url:cn,isLocal:dn.test(ln[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded; charset=UTF-8",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":Tn},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":e.String,"text html":!0,"text json":v.parseJSON,"text xml":v.parseXML},flatOptions:{context:!0,url:!0}},ajaxPrefilter:Cn(Sn),ajaxTransport:Cn(xn),ajax:function(e,n){function T(e,n,s,a){var l,y,b,w,S,T=n;if(E===2)return;E=2,u&&clearTimeout(u),o=t,i=a||"",x.readyState=e>0?4:0,s&&(w=An(c,x,s));if(e>=200&&e<300||e===304)c.ifModified&&(S=x.getResponseHeader("Last-Modified"),S&&(v.lastModified[r]=S),S=x.getResponseHeader("Etag"),S&&(v.etag[r]=S)),e===304?(T="notmodified",l=!0):(l=On(c,w),T=l.state,y=l.data,b=l.error,l=!b);else{b=T;if(!T||e)T="error",e<0&&(e=0)}x.status=e,x.statusText=(n||T)+"",l?d.resolveWith(h,[y,T,x]):d.rejectWith(h,[x,T,b]),x.statusCode(g),g=t,f&&p.trigger("ajax"+(l?"Success":"Error"),[x,c,l?y:b]),m.fireWith(h,[x,T]),f&&(p.trigger("ajaxComplete",[x,c]),--v.active||v.event.trigger("ajaxStop"))}typeof e=="object"&&(n=e,e=t),n=n||{};var r,i,s,o,u,a,f,l,c=v.ajaxSetup({},n),h=c.context||c,p=h!==c&&(h.nodeType||h instanceof v)?v(h):v.event,d=v.Deferred(),m=v.Callbacks("once memory"),g=c.statusCode||{},b={},w={},E=0,S="canceled",x={readyState:0,setRequestHeader:function(e,t){if(!E){var n=e.toLowerCase();e=w[n]=w[n]||e,b[e]=t}return this},getAllResponseHeaders:function(){return E===2?i:null},getResponseHeader:function(e){var n;if(E===2){if(!s){s={};while(n=pn.exec(i))s[n[1].toLowerCase()]=n[2]}n=s[e.toLowerCase()]}return n===t?null:n},overrideMimeType:function(e){return E||(c.mimeType=e),this},abort:function(e){return e=e||S,o&&o.abort(e),T(0,e),this}};d.promise(x),x.success=x.done,x.error=x.fail,x.complete=m.add,x.statusCode=function(e){if(e){var t;if(E<2)for(t in e)g[t]=[g[t],e[t]];else t=e[x.status],x.always(t)}return this},c.url=((e||c.url)+"").replace(hn,"").replace(mn,ln[1]+"//"),c.dataTypes=v.trim(c.dataType||"*").toLowerCase().split(y),c.crossDomain==null&&(a=wn.exec(c.url.toLowerCase()),c.crossDomain=!(!a||a[1]===ln[1]&&a[2]===ln[2]&&(a[3]||(a[1]==="http:"?80:443))==(ln[3]||(ln[1]==="http:"?80:443)))),c.data&&c.processData&&typeof c.data!="string"&&(c.data=v.param(c.data,c.traditional)),kn(Sn,c,n,x);if(E===2)return x;f=c.global,c.type=c.type.toUpperCase(),c.hasContent=!vn.test(c.type),f&&v.active++===0&&v.event.trigger("ajaxStart");if(!c.hasContent){c.data&&(c.url+=(gn.test(c.url)?"&":"?")+c.data,delete c.data),r=c.url;if(c.cache===!1){var N=v.now(),C=c.url.replace(bn,"$1_="+N);c.url=C+(C===c.url?(gn.test(c.url)?"&":"?")+"_="+N:"")}}(c.data&&c.hasContent&&c.contentType!==!1||n.contentType)&&x.setRequestHeader("Content-Type",c.contentType),c.ifModified&&(r=r||c.url,v.lastModified[r]&&x.setRequestHeader("If-Modified-Since",v.lastModified[r]),v.etag[r]&&x.setRequestHeader("If-None-Match",v.etag[r])),x.setRequestHeader("Accept",c.dataTypes[0]&&c.accepts[c.dataTypes[0]]?c.accepts[c.dataTypes[0]]+(c.dataTypes[0]!=="*"?", "+Tn+"; q=0.01":""):c.accepts["*"]);for(l in c.headers)x.setRequestHeader(l,c.headers[l]);if(!c.beforeSend||c.beforeSend.call(h,x,c)!==!1&&E!==2){S="abort";for(l in{success:1,error:1,complete:1})x[l](c[l]);o=kn(xn,c,n,x);if(!o)T(-1,"No Transport");else{x.readyState=1,f&&p.trigger("ajaxSend",[x,c]),c.async&&c.timeout>0&&(u=setTimeout(function(){x.abort("timeout")},c.timeout));try{E=1,o.send(b,T)}catch(k){if(!(E<2))throw k;T(-1,k)}}return x}return x.abort()},active:0,lastModified:{},etag:{}});var Mn=[],_n=/\?/,Dn=/(=)\?(?=&|$)|\?\?/,Pn=v.now();v.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var e=Mn.pop()||v.expando+"_"+Pn++;return this[e]=!0,e}}),v.ajaxPrefilter("json jsonp",function(n,r,i){var s,o,u,a=n.data,f=n.url,l=n.jsonp!==!1,c=l&&Dn.test(f),h=l&&!c&&typeof a=="string"&&!(n.contentType||"").indexOf("application/x-www-form-urlencoded")&&Dn.test(a);if(n.dataTypes[0]==="jsonp"||c||h)return s=n.jsonpCallback=v.isFunction(n.jsonpCallback)?n.jsonpCallback():n.jsonpCallback,o=e[s],c?n.url=f.replace(Dn,"$1"+s):h?n.data=a.replace(Dn,"$1"+s):l&&(n.url+=(_n.test(f)?"&":"?")+n.jsonp+"="+s),n.converters["script json"]=function(){return u||v.error(s+" was not called"),u[0]},n.dataTypes[0]="json",e[s]=function(){u=arguments},i.always(function(){e[s]=o,n[s]&&(n.jsonpCallback=r.jsonpCallback,Mn.push(s)),u&&v.isFunction(o)&&o(u[0]),u=o=t}),"script"}),v.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(e){return v.globalEval(e),e}}}),v.ajaxPrefilter("script",function(e){e.cache===t&&(e.cache=!1),e.crossDomain&&(e.type="GET",e.global=!1)}),v.ajaxTransport("script",function(e){if(e.crossDomain){var n,r=i.head||i.getElementsByTagName("head")[0]||i.documentElement;return{send:function(s,o){n=i.createElement("script"),n.async="async",e.scriptCharset&&(n.charset=e.scriptCharset),n.src=e.url,n.onload=n.onreadystatechange=function(e,i){if(i||!n.readyState||/loaded|complete/.test(n.readyState))n.onload=n.onreadystatechange=null,r&&n.parentNode&&r.removeChild(n),n=t,i||o(200,"success")},r.insertBefore(n,r.firstChild)},abort:function(){n&&n.onload(0,1)}}}});var Hn,Bn=e.ActiveXObject?function(){for(var e in Hn)Hn[e](0,1)}:!1,jn=0;v.ajaxSettings.xhr=e.ActiveXObject?function(){return!this.isLocal&&Fn()||In()}:Fn,function(e){v.extend(v.support,{ajax:!!e,cors:!!e&&"withCredentials"in e})}(v.ajaxSettings.xhr()),v.support.ajax&&v.ajaxTransport(function(n){if(!n.crossDomain||v.support.cors){var r;return{send:function(i,s){var o,u,a=n.xhr();n.username?a.open(n.type,n.url,n.async,n.username,n.password):a.open(n.type,n.url,n.async);if(n.xhrFields)for(u in n.xhrFields)a[u]=n.xhrFields[u];n.mimeType&&a.overrideMimeType&&a.overrideMimeType(n.mimeType),!n.crossDomain&&!i["X-Requested-With"]&&(i["X-Requested-With"]="XMLHttpRequest");try{for(u in i)a.setRequestHeader(u,i[u])}catch(f){}a.send(n.hasContent&&n.data||null),r=function(e,i){var u,f,l,c,h;try{if(r&&(i||a.readyState===4)){r=t,o&&(a.onreadystatechange=v.noop,Bn&&delete Hn[o]);if(i)a.readyState!==4&&a.abort();else{u=a.status,l=a.getAllResponseHeaders(),c={},h=a.responseXML,h&&h.documentElement&&(c.xml=h);try{c.text=a.responseText}catch(p){}try{f=a.statusText}catch(p){f=""}!u&&n.isLocal&&!n.crossDomain?u=c.text?200:404:u===1223&&(u=204)}}}catch(d){i||s(-1,d)}c&&s(u,f,c,l)},n.async?a.readyState===4?setTimeout(r,0):(o=++jn,Bn&&(Hn||(Hn={},v(e).unload(Bn)),Hn[o]=r),a.onreadystatechange=r):r()},abort:function(){r&&r(0,1)}}}});var qn,Rn,Un=/^(?:toggle|show|hide)$/,zn=new RegExp("^(?:([-+])=|)("+m+")([a-z%]*)$","i"),Wn=/queueHooks$/,Xn=[Gn],Vn={"*":[function(e,t){var n,r,i=this.createTween(e,t),s=zn.exec(t),o=i.cur(),u=+o||0,a=1,f=20;if(s){n=+s[2],r=s[3]||(v.cssNumber[e]?"":"px");if(r!=="px"&&u){u=v.css(i.elem,e,!0)||n||1;do a=a||".5",u/=a,v.style(i.elem,e,u+r);while(a!==(a=i.cur()/o)&&a!==1&&--f)}i.unit=r,i.start=u,i.end=s[1]?u+(s[1]+1)*n:n}return i}]};v.Animation=v.extend(Kn,{tweener:function(e,t){v.isFunction(e)?(t=e,e=["*"]):e=e.split(" ");var n,r=0,i=e.length;for(;r<i;r++)n=e[r],Vn[n]=Vn[n]||[],Vn[n].unshift(t)},prefilter:function(e,t){t?Xn.unshift(e):Xn.push(e)}}),v.Tween=Yn,Yn.prototype={constructor:Yn,init:function(e,t,n,r,i,s){this.elem=e,this.prop=n,this.easing=i||"swing",this.options=t,this.start=this.now=this.cur(),this.end=r,this.unit=s||(v.cssNumber[n]?"":"px")},cur:function(){var e=Yn.propHooks[this.prop];return e&&e.get?e.get(this):Yn.propHooks._default.get(this)},run:function(e){var t,n=Yn.propHooks[this.prop];return this.options.duration?this.pos=t=v.easing[this.easing](e,this.options.duration*e,0,1,this.options.duration):this.pos=t=e,this.now=(this.end-this.start)*t+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),n&&n.set?n.set(this):Yn.propHooks._default.set(this),this}},Yn.prototype.init.prototype=Yn.prototype,Yn.propHooks={_default:{get:function(e){var t;return e.elem[e.prop]==null||!!e.elem.style&&e.elem.style[e.prop]!=null?(t=v.css(e.elem,e.prop,!1,""),!t||t==="auto"?0:t):e.elem[e.prop]},set:function(e){v.fx.step[e.prop]?v.fx.step[e.prop](e):e.elem.style&&(e.elem.style[v.cssProps[e.prop]]!=null||v.cssHooks[e.prop])?v.style(e.elem,e.prop,e.now+e.unit):e.elem[e.prop]=e.now}}},Yn.propHooks.scrollTop=Yn.propHooks.scrollLeft={set:function(e){e.elem.nodeType&&e.elem.parentNode&&(e.elem[e.prop]=e.now)}},v.each(["toggle","show","hide"],function(e,t){var n=v.fn[t];v.fn[t]=function(r,i,s){return r==null||typeof r=="boolean"||!e&&v.isFunction(r)&&v.isFunction(i)?n.apply(this,arguments):this.animate(Zn(t,!0),r,i,s)}}),v.fn.extend({fadeTo:function(e,t,n,r){return this.filter(Gt).css("opacity",0).show().end().animate({opacity:t},e,n,r)},animate:function(e,t,n,r){var i=v.isEmptyObject(e),s=v.speed(t,n,r),o=function(){var t=Kn(this,v.extend({},e),s);i&&t.stop(!0)};return i||s.queue===!1?this.each(o):this.queue(s.queue,o)},stop:function(e,n,r){var i=function(e){var t=e.stop;delete e.stop,t(r)};return typeof e!="string"&&(r=n,n=e,e=t),n&&e!==!1&&this.queue(e||"fx",[]),this.each(function(){var t=!0,n=e!=null&&e+"queueHooks",s=v.timers,o=v._data(this);if(n)o[n]&&o[n].stop&&i(o[n]);else for(n in o)o[n]&&o[n].stop&&Wn.test(n)&&i(o[n]);for(n=s.length;n--;)s[n].elem===this&&(e==null||s[n].queue===e)&&(s[n].anim.stop(r),t=!1,s.splice(n,1));(t||!r)&&v.dequeue(this,e)})}}),v.each({slideDown:Zn("show"),slideUp:Zn("hide"),slideToggle:Zn("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(e,t){v.fn[e]=function(e,n,r){return this.animate(t,e,n,r)}}),v.speed=function(e,t,n){var r=e&&typeof e=="object"?v.extend({},e):{complete:n||!n&&t||v.isFunction(e)&&e,duration:e,easing:n&&t||t&&!v.isFunction(t)&&t};r.duration=v.fx.off?0:typeof r.duration=="number"?r.duration:r.duration in v.fx.speeds?v.fx.speeds[r.duration]:v.fx.speeds._default;if(r.queue==null||r.queue===!0)r.queue="fx";return r.old=r.complete,r.complete=function(){v.isFunction(r.old)&&r.old.call(this),r.queue&&v.dequeue(this,r.queue)},r},v.easing={linear:function(e){return e},swing:function(e){return.5-Math.cos(e*Math.PI)/2}},v.timers=[],v.fx=Yn.prototype.init,v.fx.tick=function(){var e,n=v.timers,r=0;qn=v.now();for(;r<n.length;r++)e=n[r],!e()&&n[r]===e&&n.splice(r--,1);n.length||v.fx.stop(),qn=t},v.fx.timer=function(e){e()&&v.timers.push(e)&&!Rn&&(Rn=setInterval(v.fx.tick,v.fx.interval))},v.fx.interval=13,v.fx.stop=function(){clearInterval(Rn),Rn=null},v.fx.speeds={slow:600,fast:200,_default:400},v.fx.step={},v.expr&&v.expr.filters&&(v.expr.filters.animated=function(e){return v.grep(v.timers,function(t){return e===t.elem}).length});var er=/^(?:body|html)$/i;v.fn.offset=function(e){if(arguments.length)return e===t?this:this.each(function(t){v.offset.setOffset(this,e,t)});var n,r,i,s,o,u,a,f={top:0,left:0},l=this[0],c=l&&l.ownerDocument;if(!c)return;return(r=c.body)===l?v.offset.bodyOffset(l):(n=c.documentElement,v.contains(n,l)?(typeof l.getBoundingClientRect!="undefined"&&(f=l.getBoundingClientRect()),i=tr(c),s=n.clientTop||r.clientTop||0,o=n.clientLeft||r.clientLeft||0,u=i.pageYOffset||n.scrollTop,a=i.pageXOffset||n.scrollLeft,{top:f.top+u-s,left:f.left+a-o}):f)},v.offset={bodyOffset:function(e){var t=e.offsetTop,n=e.offsetLeft;return v.support.doesNotIncludeMarginInBodyOffset&&(t+=parseFloat(v.css(e,"marginTop"))||0,n+=parseFloat(v.css(e,"marginLeft"))||0),{top:t,left:n}},setOffset:function(e,t,n){var r=v.css(e,"position");r==="static"&&(e.style.position="relative");var i=v(e),s=i.offset(),o=v.css(e,"top"),u=v.css(e,"left"),a=(r==="absolute"||r==="fixed")&&v.inArray("auto",[o,u])>-1,f={},l={},c,h;a?(l=i.position(),c=l.top,h=l.left):(c=parseFloat(o)||0,h=parseFloat(u)||0),v.isFunction(t)&&(t=t.call(e,n,s)),t.top!=null&&(f.top=t.top-s.top+c),t.left!=null&&(f.left=t.left-s.left+h),"using"in t?t.using.call(e,f):i.css(f)}},v.fn.extend({position:function(){if(!this[0])return;var e=this[0],t=this.offsetParent(),n=this.offset(),r=er.test(t[0].nodeName)?{top:0,left:0}:t.offset();return n.top-=parseFloat(v.css(e,"marginTop"))||0,n.left-=parseFloat(v.css(e,"marginLeft"))||0,r.top+=parseFloat(v.css(t[0],"borderTopWidth"))||0,r.left+=parseFloat(v.css(t[0],"borderLeftWidth"))||0,{top:n.top-r.top,left:n.left-r.left}},offsetParent:function(){return this.map(function(){var e=this.offsetParent||i.body;while(e&&!er.test(e.nodeName)&&v.css(e,"position")==="static")e=e.offsetParent;return e||i.body})}}),v.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(e,n){var r=/Y/.test(n);v.fn[e]=function(i){return v.access(this,function(e,i,s){var o=tr(e);if(s===t)return o?n in o?o[n]:o.document.documentElement[i]:e[i];o?o.scrollTo(r?v(o).scrollLeft():s,r?s:v(o).scrollTop()):e[i]=s},e,i,arguments.length,null)}}),v.each({Height:"height",Width:"width"},function(e,n){v.each({padding:"inner"+e,content:n,"":"outer"+e},function(r,i){v.fn[i]=function(i,s){var o=arguments.length&&(r||typeof i!="boolean"),u=r||(i===!0||s===!0?"margin":"border");return v.access(this,function(n,r,i){var s;return v.isWindow(n)?n.document.documentElement["client"+e]:n.nodeType===9?(s=n.documentElement,Math.max(n.body["scroll"+e],s["scroll"+e],n.body["offset"+e],s["offset"+e],s["client"+e])):i===t?v.css(n,r,i,u):v.style(n,r,i,u)},n,o?i:t,o,null)}})}),e.jQuery=e.$=v,typeof define=="function"&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return v})})(window);

// Minified Tipsy tooltip plugin
(function($){function fixTitle($ele){if($ele.attr('title')||typeof($ele.data('original-title'))!='string'){$ele.data('original-title',$ele.attr('title')||'').removeAttr('title')}}function Tipsy(element,options){this.$element=$(element);this.options=options;this.enabled=true;fixTitle(this.$element)}Tipsy.prototype={show:function(){var title=this.getTitle();if(title&&this.enabled){var $tip=this.tip();$tip.find('.tipsy-inner')[this.options.html?'html':'text'](title);$tip[0].className='tipsy';$tip.remove().css({top:0,left:0,visibility:'hidden',display:'block'}).appendTo(document.body);var pos=$.extend({},this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight});var actualWidth=$tip[0].offsetWidth,actualHeight=$tip[0].offsetHeight;var gravity=(typeof this.options.gravity=='function')?this.options.gravity.call(this.$element[0]):this.options.gravity;var tp;switch(gravity.charAt(0)){case'n':tp={top:pos.top+pos.height+this.options.offset,left:pos.left+pos.width/2-actualWidth/2};break;case's':tp={top:pos.top-actualHeight-this.options.offset,left:pos.left+pos.width/2-actualWidth/2};break;case'e':tp={top:pos.top+pos.height/2-actualHeight/2,left:pos.left-actualWidth-this.options.offset};break;case'w':tp={top:pos.top+pos.height/2-actualHeight/2,left:pos.left+pos.width+this.options.offset};break}if(gravity.length==2){if(gravity.charAt(1)=='w'){tp.left=pos.left+pos.width/2-15}else{tp.left=pos.left+pos.width/2-actualWidth+15}}$tip.css(tp).addClass('tipsy-'+gravity);if(this.options.fade){$tip.stop().css({opacity:0,display:'block',visibility:'visible'}).animate({opacity:this.options.opacity})}else{$tip.css({visibility:'visible',opacity:this.options.opacity})}}},hide:function(){if(this.options.fade){this.tip().stop().fadeOut(function(){$(this).remove()})}else{this.tip().remove()}},getTitle:function(){var title,$e=this.$element,o=this.options;fixTitle($e);var title,o=this.options;if(typeof o.title=='string'){title=$e.data(o.title=='title'?'original-title':o.title)}else if(typeof o.title=='function'){title=o.title.call($e[0])}title=(''+title).replace(/(^\s*|\s*$)/,"");return title||o.fallback},tip:function(){if(!this.$tip){this.$tip=$('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"/></div>')}return this.$tip},validate:function(){if(!this.$element[0].parentNode){this.hide();this.$element=null;this.options=null}},enable:function(){this.enabled=true},disable:function(){this.enabled=false},toggleEnabled:function(){this.enabled=!this.enabled}};$.fn.tipsy=function(options){if(options===true){return this.data('tipsy')}else if(typeof options=='string'){return this.data('tipsy')[options]()}options=$.extend({},$.fn.tipsy.defaults,options);function get(ele){var tipsy=$.data(ele,'tipsy');if(!tipsy){tipsy=new Tipsy(ele,$.fn.tipsy.elementOptions(ele,options));$.data(ele,'tipsy',tipsy)}return tipsy}function enter(){var tipsy=get(this);tipsy.hoverState='in';if(options.delayIn==0){tipsy.show()}else{setTimeout(function(){if(tipsy.hoverState=='in')tipsy.show()},options.delayIn)}};function leave(){var tipsy=get(this);tipsy.hoverState='out';if(options.delayOut==0){tipsy.hide()}else{setTimeout(function(){if(tipsy.hoverState=='out')tipsy.hide()},options.delayOut)}};if(!options.live)this.each(function(){get(this)});if(options.trigger!='manual'){var binder=options.live?'live':'bind',eventIn=options.trigger=='hover'?'mouseenter':'focus',eventOut=options.trigger=='hover'?'mouseleave':'blur';this[binder](eventIn,enter)[binder](eventOut,leave)}return this};$.fn.tipsy.defaults={delayIn:0,delayOut:0,fade:false,fallback:'',gravity:'n',html:false,live:false,offset:0,opacity:0.8,title:'title',trigger:'hover'};$.fn.tipsy.elementOptions=function(ele,options){return $.metadata?$.extend({},options,$(ele).metadata()):options};$.fn.tipsy.autoNS=function(){return $(this).offset().top>($(document).scrollTop()+$(window).height()/2)?'s':'n'};$.fn.tipsy.autoWE=function(){return $(this).offset().left>($(document).scrollLeft()+$(window).width()/2)?'e':'w'}})(jQuery);

(function( $, zomato ){
	var language = {
		getText: function() {
			var args = arguments;
			var key = args[0];
			var params = [];
			for( var i = 0; i < args.length; i++ ) {			
				params.push( args[i+1] );
			}
			var unreplaced_text = zomato.keys ? zomato.keys[key] : null;
			if ( unreplaced_text ) {
				for ( i = 0; i < params.length; i++ ) {
					unreplaced_text = unreplaced_text.replace( new RegExp("\\$" + (i+1), "g"), params[i] );
				}
			}
			return unreplaced_text;
		},
		getPluralText: function( keyParams, count ) {
			var isPlural = ( count != 1 ) ? true : false;
			var key = keyParams[0] + ( isPlural ? '-pl' : '-sn' );
			var unreplaced_text = zomato.keys ? zomato.keys[key] : null;
			if ( unreplaced_text ) {
				for ( var i = 1; i < keyParams.length; i++ ) {
					unreplaced_text = unreplaced_text.replace( new RegExp("\\$" + i, "g"), keyParams[i] );
				}
			}
			return unreplaced_text;
		},
		toMilesFromKm: function( km ) {
			return km * 0.621371;
		},
		testLanguage: function() {
			$( '<div></div>').html( language.getPluralText( ['zm-common-js-rating-aggr-vote-text',2, 5], 5 ) ).appendTo( 'body' );
		}		
	};
    var zomato = zomato || {};
	zomato.language = language;
})( jQuery, zomato );

;zomato.reviews = zomato.reviews || {
    attachedPhotos: [],
    setIndexVisible: 0,

    bindEvents: function() {

        $('.res-reviews-container').off('click','.js-btn-comment-setting');
        $('.res-reviews-container').on('click','.js-btn-comment-setting', function(event) {
            event.preventDefault();
            $(this).trigger('mouseout');
            zomato.reviews.changeCommentsFlag($(this));
        });
        $('.review-form-container').off('click', '.prom-filter-box-cont');
        $('.review-form-container').on('click', '.prom-filter-box-cont', function(event) {
            var prom_filter_box = $('.prom-filter-box');
            var no_comments_flag = $(prom_filter_box).data('no-comments-flag');

            if ( parseInt(no_comments_flag) == 0 ) {
                $(prom_filter_box).data('no-comments-flag', 1);
                $(prom_filter_box).removeClass('sel');
                $(prom_filter_box).removeAttr('data-icon');
            } else {
                $(prom_filter_box).data('no-comments-flag', 0);
                $(prom_filter_box).addClass('sel');
                $(prom_filter_box).attr('data-icon', ';');
            }    
        });
        $(".review_submit_button").off('click');
        $(".review_submit_button").on('click', function(event) {
            event.preventDefault();
            if ($(this).parents('.review-form-container').find('.restaurant-rating-widget').hasClass('review_not_saved')) {
                $(this).parents('.review-form-container').find('.restaurant-rating-widget').removeClass('review_not_saved');
                var level = $(this).parents('.review-form-container').find('.rating-sel');
                level.trigger('click');
            }
            zomato.reviews.submitReview($(this).parents('.review-form-container'));
        });

        $(".review-form-container").off('click', '.add-photos-msg');
        $(".review-form-container").on('click', '.add-photos-msg', function(event) {
            event.preventDefault();
            zomato.reviews.showPhotoUploadChoices($(this).parents('.review-form-container'));
        });

        $(".review-form-container").off('click', '.file-chooser-link');
        $(".review-form-container").on('click', '.file-chooser-link', function(event) {
            event.preventDefault();
            zomato.reviews.uploadPictures(this);
        });

        $(".review-form-container").off('click', '.inst');
        $(".review-form-container").on('click', '.inst', function(event) {
            event.preventDefault();
            var obj = $(this).parents('.review-photos');
            var iz = instagramZomato.get(obj)

            if (!iz.ready) {
                promptForInstagramConnection(obj);
                obj.find("#instagram-selection-container").hide();
            } else {
                startInstagramSelection(obj);    
            }
        });

        $(".review-form-container").off('click', '#instagram-selection-container .next');
        $(".review-form-container").on('click', '#instagram-selection-container .next', function(event) {
            event.preventDefault();
            var parent_obj = $(this).parents('.review-photos');
            var iz = instagramZomato.get(parent_obj);
            iz.fetchNextImages();
        });

        $(".review-form-container").off('click', '#instagram-selection-container .prev');
        $(".review-form-container").on('click', '#instagram-selection-container .prev', function(event) {
            event.preventDefault();
            var parent_obj = $(this).parents('.review-photos');
            var iz = instagramZomato.get(parent_obj);
            iz.fetchPrevImages();
        });

        $(".review-form-container").off('click', '#uploaded-restaurant-photos-container .next');
        $(".review-form-container").on('click', '#uploaded-restaurant-photos-container .next', function(event) {
            event.preventDefault();
            zomato.reviews.goNext(this);
        });
        
        $(".review-form-container").off('click', '#uploaded-restaurant-photos-container .prev');
        $(".review-form-container").on('click', '#uploaded-restaurant-photos-container .prev', function(event) {
            event.preventDefault(); 
            zomato.reviews.goPrev(this);
        });

        $(".review-form-container").off('click', '[class^="inst-li"]');
        $(".review-form-container").on('click', '[class^="inst-li"]', function(event) {
            event.preventDefault();
            var parent_obj = $(this).parents('.review-photos');
            var iz = instagramZomato.get(parent_obj);
            iz.toggleSelection(this);
        });

        $(".review-form-container").off('click', '#instagram-selection-container .inst-cancel');
        $(".review-form-container").on('click', '#instagram-selection-container .inst-cancel', function(event) {
            event.preventDefault();
            var parent_obj = $(this).parents('.review-photos');
            exitInstagramZomato(true, parent_obj);
        });

        $(".review-form-container").off('click', '#instagram-selection-container .photo-confirm-btn');
        $(".review-form-container").on('click', '#instagram-selection-container .photo-confirm-btn', function(event) {
            event.preventDefault();
            var parent_obj = $(this).parents('.review-photos');
            var iz = instagramZomato.get(parent_obj);
            // iz.parent_obj = parent_obj;
            iz.beginPhotoReview();
        });

        $(".review-form-container").off('change', '.inst-photo-tag-select');
        $(".review-form-container").on('change', '.inst-photo-tag-select', function(event) {
            var parent_obj = $(this).parents('.review-photos');
            resetInstagramZomato(true,parent_obj);
        });

        $(".review-form-container").off('click', '.remove-uploaded-photo');
        $(".review-form-container").on('click', '.remove-uploaded-photo', function(event) {
            event.preventDefault();
            zomato.reviews.removeUploadedPicture(this);
        });

        $('.remove-uploaded-review-photos').off('click');
        $('.remove-uploaded-review-photos').on('click', function(event) {
            event.preventDefault();
            zomato.reviews.clearUploadedPictures(this);
        });

        $('.res-reviews-container').off('click', '.res-review-report');
        $('.res-reviews-container').on('click', '.res-review-report', function(event) {
            event.preventDefault();
            zomato.reviews.reportReview(this);
        });

        $(".res-reviews-container").off('click', '.res-review-edit');
        $(".res-reviews-container").on('click', '.res-review-edit', function(e) {
            e.preventDefault();
            zomato.reviews.editReview($(this).parents('.res-review'));
        });

        $(".res-reviews-container").on('click', '.show-removed-comment', function(e) {
            e.preventDefault();
            $(this).hide();
            $(this).siblings('.review_comment_text').show();
        });

        $(".res-reviews-container").on('click', '.show-removed-reply', function(e) {
            e.preventDefault();
            $(this).hide();
            $(this).siblings('.review-reply-text').show();
        });

        $(".res-reviews-container").off('click', '.res-review-delete');
        $(".res-reviews-container").on('click', '.res-review-delete', function(e) {
            e.preventDefault();
            zomato.reviews.deleteReview($(this).parents('.res-review'));
        });

        $('.res-reviews-container').off('click', '.sn-share-icons a.fb');
        $('.res-reviews-container').on('click', '.sn-share-icons a.fb', function(event){
            event.preventDefault();
            zomato.reviews.showFacebookShareDialog(this);
        });

        $('.res-reviews-container').off('click', '.sn-share-icons a.tw');
        $('.res-reviews-container').on('click', '.sn-share-icons a.tw', function(event) {
            event.preventDefault();
            zomato.reviews.showTweetDialog(this);
        });

        $(".res-reviews-container").off('click', '.review-permalink-btn');
        $(".res-reviews-container").on('click', '.review-permalink-btn', function(event) {
            event.preventDefault();
            $(this).parents('.res-review').find('.res-review-permalink-input').toggle();
        });

        $('.review-form-container').off('click', '.unlinked-restaurant-photos');
        $('.review-form-container').on('click', '.unlinked-restaurant-photos', function(event) {
            event.preventDefault();   
            zomato.reviews.displayUploadedPhotos(this);
        });

        $('.review-form-container').off('click', '.user-uploaded-restaurant-photos');
        $('.review-form-container').on('click', '.user-uploaded-restaurant-photos', function(event) {
            event.preventDefault();
            zomato.reviews.toggleSelectUserRestaurantPhotos(this);
        });

        $('.review-form-container').off('click', '.uploaded-attached-cancel');
        $('.review-form-container').on('click', '.uploaded-attached-cancel', function(event) {
            event.preventDefault();
            zomato.reviews.clearUploadedPhotosSelection(this);
        });
        $('.review-form-container').off('click', '.uploaded-attached-confirm-btn');
        $('.review-form-container').on('click', '.uploaded-attached-confirm-btn', function(event) {
            event.preventDefault();
            zomato.reviews.confirmUploadedPhotosSelection(this);
        });

        $('.review-form-container').off('click', '#attach-more-review-photos');
        $('.review-form-container').on('click', '#attach-more-review-photos', function(event) {
            event.preventDefault();
            $(this).parents('.review-photos').find('.unlinked-restaurant-photos').trigger('click');
        });


        if(typeof bindPhotoUploadFunctions == "function")
            bindPhotoUploadFunctions();
    },

    showFacebookShareDialog: function(btn) {
        $btn = $(btn);
        var url = $btn.data('url');
        var res_name = $btn.data('res-name');
        var rev_snippet = $btn.data('review-snippet');
        var rating = $btn.data('rating');
        var user_name = $btn.data('user-name');
        var photo = $btn.data('photo');

        FB.ui({
            method: 'feed',
            name: user_name+' review for '+res_name,
            link: url,
            picture: photo,
            caption: 'Rated '+rating+' out of 5',
            description: rev_snippet
        });
    },

    changeCommentsFlag: function(link) {
        var $link = link;
        var no_comments_flag = $link.data('no-comments-flag');
        var review_id = $link.data('review-id');
        var new_no_comments_flag;
        var page;

        if ( typeof RES_ID === 'undefined' ) {
            page = 'user';
        } else {
            page = 'restaurant';
        }

        if ( parseInt(no_comments_flag) == 0 ) {
            new_no_comments_flag = 1;
        } else {
            new_no_comments_flag = 0;
        }


        $link.html('<img src="' + HOST + 'images/floading.gif"/>');
        $.ajax({
            url: HOST + 'php/update_comments_flag.php?review_id=' + review_id + '&no_comments_flag=' + new_no_comments_flag + '&page=' + page,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if ( response.status == 'success' ) {
                    var review_parent = $link.parents('.res-review:eq(0)');
                    review_parent.replaceWith(response.html);
                    $('.tooltip').tipsy();
                    initiateLaziness();
                }
            },
            error: function() {}
        });
    },

    showTweetDialog: function(btn) {
        $btn = $(btn);

        $btn.attr('href','#');
        var url = $btn.data('url');
        var res_name = $btn.data('res-name');
        var user_name = $btn.data('user-name');
        var review_id = $btn.data('review-id');
        var rating = $btn.data('rating');
        var user_twitter_handle = $btn.data('user-twitter-handle');

        window.open("https://twitter.com/intent/tweet?url=http://www.zoma.to/"+review_id+"&text="+encodeURIComponent(user_name+' review ('+rating+'/5) for '+res_name+' on @zomato'+user_twitter_handle), "Twitter", "status = 1, height = 250, width = 540, resizable = 0");
    },

    reportReview: function(link) {
        var that = $(link);

        var review_id = $(that).parents('.res-review').data('review_id');
        var user_id = $(that).data('user_id');
        $(that).html('<img width="30" src="'+HOST+'images/loading-transparent.gif"/>');

        $.ajax({
            url: HOST + 'php/report_review.php',
            type: 'POST',
            data: {'review_id' : review_id, 'user_id' : user_id},
            dataType: 'JSON',
            success: function(data) {
                if ( data.status == 'success' ) {
                    $(that).trigger('mouseout');
                    $(that).replaceWith('<span class="res-review-reported">Reported</span>');
                }else{
                    $(that).html('Report');   
                }
            }
        });
    },

    uploadPictures: function(button) {

        // Pass the reference of top container (review-photos). Generalizing the functions so that same can be used in edit reviews also.
        var obj = $(button).parents('.review-photos');

        // html5_uploader is used for browsers other than IE.
        if(!(/MSIE/.test(navigator.userAgent))) {
            var inp = obj.find('.file-chooser');
            res_id = inp.data('resid');

            inp.trigger('html5_upload.destroy');
            inp.html5_upload({
                url: HOST+'php/review_picture_upload_handler?res_id='+res_id+'&user_id='+USER_ID+'&type=upload',
                sendBoundary: window.FormData || $.browser.mozilla,
                onStart: function(event, total) {
                    obj.find('#uploaded-photos-container').hide();
                    obj.find('#add-photos-select').show();
                    obj.find(".loading-progress-complete").width(0);
                    return true;
                },
                onStartOne: function(event, name, number, total) {
                    var container = $(button).parents('.review-dragdrop');
                    container.children(".loading").show();
                    container.children(".default").hide();
                    container.find(".loading-text").text(zomato.language.getText('zm-commmon-js-uploading-text'));
                    var _name = name.length > 20 ? name+'...' : name;
                    container.find(".loading-filename").text(_name);
                    return true;
                },
                onProgress: function(event, progress, name, number, total) {
                    var container = $(button).parents('.review-dragdrop');
                    container.find('.loading-progress-complete').width((100 / total) * (number + progress) + '%');
                    var containerWidth = container.find(".loading-progress-complete").parent().width();
                    var partWidth = containerWidth/total;
                    var startWidth = partWidth * number;
                    container.find(".loading-text").text(1.0 > progress ? zomato.language.getText( 'zm-common-js-uploading-text-var' ,Math.round( (number + progress) * 100 / total ) ) : zomato.language.getText('zm-common-js-processing-img-text'));
                },
                onFinishOne: function(event, response, name, number, total){
                    var resp = eval('('+response+')');
                    var container = $(button).parents('.review-dragdrop');
                    container.find(".loading-text").text(zomato.language.getText('zm-common-js-processing-img-text'));
                    if(resp.status=="success" && resp.tmp_id!="" && resp.url!=""){
                        var html = '<li data-file-hash="'+resp.file_hash+'"><a class="remove-uploaded-photo" href="#" data-icon="X" id="' + resp.file_hash + '"></a><img src="'+resp.url+'" class="hoverZoomLink"></img></li>';
                        obj.find('#uploaded-photos-container #uploaded-photos').append(html);

                    }else{
                        if(obj.find("#uploaded-photos-container li").length>0){
                            obj.find("#uploaded-photos-container").css('display', 'block');
                            obj.find("#add-photos-select").hide();
                        }else{
                            obj.find("#uploaded-photos-container .loading").hide();
                            obj.find("#add-photos-select .loading").hide();
                            obj.find('#add-photos-select .default').show();
                        }

                        $(button).data('error', true);
                        alert(resp.message);
                    }
                }, 
                onFinish: function(event, total) {

                    var container = $(button).parents('.review-dragdrop');
                    var pbar = container.find('.loading-progress-complete');
                    pbar.width('100%');
                    container.find(".loading-text").text(zomato.language.getText('zm-common-js-almost-there-text'));

                    if(!$(button).data('error')) {
                        var wait = setInterval(function() {
                            if (pbar.width() >= pbar.parent().width() * 0.9) {
                                obj.find('#uploaded-photos-container').show();
                                obj.find('#add-photos-select').hide();
                                zomato.reviews.bindEvents();
                                clearInterval(wait);
                                progressbarDone = false;
                                return true;
                            }
                        }, 200);
                    } else {
                        $(button).removeData('error');
                    }
                },
                setName: function(text) {
                },
                setStatus: function(text) {
                },
                setProgress: function(val) {
                }
            });
            inp.trigger('click');
        }
    },

    removeUploadedPicture: function(button) {
        var me = $(button);
        var me_parent = me.parents('.review-photos');
        var id = $(button).attr('id');
        //fire ajax to remove the picture from db
        $.ajax({
            url: HOST + 'php/review_picture_upload_handler.php',
            data: {type: 'remove', file_hash_json: JSON.stringify([id])},
            type: 'GET',
            success: function(response) {
                if ('success' == response.status) {
                    me_parent.find("li[data-file-hash='" + id + "']").fadeOut(300, function() {
                        me.remove();
                        //check if all photos have been removed, hide the containers, if yes.
                        var remainingPhotos = me_parent.find(".remove-uploaded-photo").length;
                        if (0 == remainingPhotos) {
                            me_parent.find("#uploaded-photos-container").hide();
                            me_parent.find(".add-photos-msg").show();
                            me_parent.find(".inst").parent().show();
                            me_parent.find(".loading").hide();
                        }
                        me_parent.find("li[data-file-hash='" + id + "']").remove();      

                    });  
                }
            },
            error: function(jqHR, status, error) {
                //do nothing as of now

            },
            dataType: 'json'
        });

    },    

    clearUploadedPictures: function(button) {

        var file_hash_array = [];
        var me = $(button);
        me.parents('#uploaded-photos-container').find('#uploaded-photos li').each(function(){
            file_hash_array.push(me.data('file-hash'));
        })
        var file_hash_json = JSON.stringify(file_hash_array);
        var RES_ID = RES_ID || 0;
        $.ajax({
            type:"GET",
            url: HOST+'php/review_picture_upload_handler?res_id='+RES_ID+'&user_id='+USER_ID+'&type=remove',
            data: {file_hash_json:file_hash_json},
            success: function(response){
                var resp = eval('('+response+')');
                if(resp.status=="success"){
                    me.parents('#uploaded-photos-container').find('#uploaded-photos').empty();
                    me.parents('#uploaded-photos-container').hide();
                    me.parents('.review-photos').find('.loading').hide();
                    me.parents('.review-photos').find('.default').show();
                    me.parents('.review-photos').find('.add-photos-select').hide();
                    me.parents('.review-photos').find('.add-photos-msg').show();
                }
            }
        });
    },

    showPhotoUploadChoices: function(container) {
        var $container = $(container);
        var parent_obj = $container;

        var iz = instagramZomato.get(parent_obj)

        if (!iz.ready) {
            //user hasn't connected his account yet
            parent_obj.find(".inst").unbind('click');
            $(".inst").click(function(event) {
                // Pass the reference of top container (review-photos). Generalizing the functions so that same can be used in edit reviews also. 
                event.preventDefault();
                promptForInstagramConnection(parent_obj);
                parent_obj.find("#instagram-selection-container").hide();
            });
        }
        parent_obj.find('#add-photos-select').fadeIn('fast');
        parent_obj.find('.add-photos-msg').hide();
    },

    deleteReview: function(container) {
        var $container = $(container);
        var review_id = $container.data('review_id');

        var check = confirm("Are you sure you want to delete this review? This action cannot be undone.");
        if(check) {
            $.ajax({
                url: HOST+'php/delete_review',
                type: 'GET',
                data: {review_id: review_id},
                dataType: 'json',
                complete: function() {
                },
                success: function(response) {
                    if(response.status == "success") {
                        $('.res-review[data-review_id="'+review_id+'"]').remove();
                        // TODO if in my reviews tab and no reviews left. show 
                    } else {
                        alert(response.message);
                    }
                }
            });

        }
    },

    editReview: function(container) {
        var $container = $(container);
        var review_id = $container.data('review_id');

        $.ajax({
            url: HOST+'php/edit_review',
            type: 'POST',
            data: {review_id: review_id, action: 'get_form'},
            dataType: 'json',
            complete: function() {
            },
            success: function(response) {
                if(response.status == 'failed') {
                    $container.append('<div class="error-message-highlight">'+response.message+'</div>');
                } else {
                    Dialog.show({
                        head: 'Edit Review',
                        html: response.html
                    });
                    user_rating_widget();
                    zomato.reviews.bindEvents();
                    // nicEditors.allTextAreas('review-form-textarea');
                }
            }
        });
    },

    displayReviewSubmitMessage: function(container, message) {
        $container = $(container);

        $container.find('.review-form-error-message').html(message).slideDown();
        setTimeout(function() {
            $container.find('.review-form-error-message').slideUp();
        }, 8000);
    },

    displaySuccessfulReviewSubmitMessage: function(container, message) {
        $container = $(container);

        $container.find('.review-form-success-message').html(message).slideDown();
        setTimeout(function() {
            $container.find('.review-form-success-message').slideUp();
        }, 8000);
    },

    showMyReviewsTab: function() {
        // TODO Check if on restaurant page else do nothing

        var li = $('.review-sorting li:eq(0)');
        var anchor = li.find('a'); 
        var count = li.data('count');
        if ( typeof NO_RES_REVIEWS != 'undefined' && NO_RES_REVIEWS === true ) {
            $('#reviews-container').show(); 
            $('#no-review-section').hide();
        }
        li.show();
        li.siblings('.text-tab-sep.hidden').show();
        anchor.removeClass( 'active selected');
        anchor.trigger('click');
        $('.zs-load-more-container .zs-laod-more').hide();
        if ( count > 0 ) {
            $('#selectors a:eq(0)').text('My Reviews');
        } else {
            $('#selectors a:eq(0)').text('My Review');
        }
    },

    submitReview: function(container) {
        var $container = $(container);
        var no_comments_flag = $('.review-form-container .prom-filter-box').data('no-comments-flag');
        var reviewSubmitButton = $container.find('.review_submit_button');
        var review_textarea = $container.find('.review-form-textarea');
        var review_pictures_parent_obj = $container.find('.review-photos');

        var review_id = $container.data("review_id");
        var is_edit = $container.data("is_edit") || 0;
        var res_id = $container.data("res_id");

        // Get images uploaded by user from local computer.
        var uploaded_images_hashes = [];
        var instagram_images_to_update = [];

        // Get photos attached
        var photos_attached = zomato.reviews.attachedPhotos; 

        // Give value zero to disable saving images.
        var save_image = 1;

        var review = $.trim(review_textarea.val());
        var rating = $container.find('.rating-widget-stars div').data('rating');


        if(rating < 1 || rating > 5) { 
            var please_rate_message = zomato.language.getText('zm-common-js-please-rate-res-before-rev');
            zomato.reviews.displayReviewSubmitMessage($container, please_rate_message);
            return;
        }

        if(50 > review.length) {
            var review_is_short_message = zomato.language.getText('zm-common-js-review-too-short');
            zomato.reviews.displayReviewSubmitMessage($container, review_is_short_message);
            return;
        }

        review_pictures_parent_obj.find(".photo-confirm-btn").trigger('click');
        review_pictures_parent_obj.find(".uploaded-attached-confirm-btn").trigger('click');

        // Get uploaded images hashes
        $container.find('#uploaded-photos li').each(function() {
            uploaded_images_hashes.push($(this).data('file-hash'));
        });

        // Get instagram images id of selected instagram images.
        review_pictures_parent_obj.find('#selected-instagram li').each(function() {
            instagram_images_to_update.push($(this).attr('id'));
        });

        var uploaded_images_json = JSON.stringify(uploaded_images_hashes);
        var instagram_images_to_update = JSON.stringify(instagram_images_to_update);

        if("true" == reviewSubmitButton.data('disabled')) {
            return false;
        }
        reviewSubmitButton.addClass('btn-loading').data('disabled', 'true');
        review_textarea.attr("disabled", "disabled");

        // check if instagramZomato has been initiated/reviewed flag is set
        // if ('false' == $(this).data('reviewed')) {
        //    showNewReviewMsg("IMG_UNCONFIRMED");
        //    return false;
        // }


        var iz = instagramZomato.get(review_pictures_parent_obj);
        var instagram_json_data = iz.getSubmissionData(true);

        $.ajax({
            type: "POST",
            url: HOST+"php/submitReview",
            data: {
                review: review,
                res_id: res_id,
                city_id: CITY_ID,
                rating: rating,
                is_edit: is_edit,
                review_id: review_id, 
                save_image: save_image,
                instagram_images_to_update: instagram_images_to_update,
                instagram_json_data: instagram_json_data,
                uploaded_images_json: uploaded_images_json,
                no_comments_flag: no_comments_flag,
                attached_photos: photos_attached
            },
            dataType: 'json',
            complete: function() {
                review_textarea.removeAttr("disabled");
                reviewSubmitButton.removeClass('btn-loading').data('disabled', 'false');
            },
            success: function(m) {

                if('login' == m.status) {
                    Dialog.show({
                        head: zomato.language.getText('zm-common-js-sign-in-complete-rev'),
                        url: HOST+'php/loginDialog?type=review'
                    });

                    return;
                }

                if('duplicate' == m.status) {
                    zomato.reviews.displayReviewSubmitMessage($container, m.message);
                    return;
                }

                if('false' == m.status) {
                    zomato.reviews.displayReviewSubmitMessage($container, m.message);
                    return;
                }
                
                if('true' == m.status) {

                    // clean up
                    review_textarea.val('');
                    $container.find('.remove-uploaded-review-photos').trigger('click');

                    review_pictures_parent_obj.find('#instagram-selection-container').hide();
                    review_pictures_parent_obj.find('.review-dragdrop .loading').hide();
                    console.log('here');
                    review_pictures_parent_obj.find('#photo-review').hide();
                    review_pictures_parent_obj.find('#uploaded-photos-container').hide();
                    // review_pictures_parent_obj.find('.add-photos-msg').show();
                    // Below line will automatically show photos message
                    review_pictures_parent_obj.find('#uploaded-restaurant-photos-container').hide();
                   
                    // Remove attach photo tab if no attached photos left
                    if(photos_attached.length == review_pictures_parent_obj.find('#uploaded-restaurant-photos-container .choose-photos-ul li').length) {
                        $('.unlinked-restaurant-photos').remove();
                        $('.unlinked-or').remove();
                    }

                    // Remove attached photos
                    for(i in photos_attached) {
                        photo_id = photos_attached[i];
                        $('#uploaded-restaurant-photos-container').find('li[data-photo_id="'+photo_id+'"]').remove();
                    }
                    
                    $container.find('.uploaded-attached-cancel').trigger('click');

                    // show share on twitter popup upon review submission
                    if( m.twitter_popup_flag == 1 && ( m.twitter_status == 2 || m.twitter_connect == 1 )) {
                        Dialog.show({
                            url: HOST + 'php/twitter_tweet_box.php?review_id=' + m.review_id,
                            head: 'REVIEW SUBMITTED SUCCESSFULLY'
                        });
                    }

                    
                    if (!is_edit) {
                        zomato.reviews.displaySuccessfulReviewSubmitMessage($('#reviews-container'), m.message);
                        zomato.reviews.showMyReviewsTab();
                        window.location.hash = 'my-reviews-container';

                        resetInstagramZomato(false, review_pictures_parent_obj);

                        if(m.added_to_bt && $("#resinfo-bt").length > 0 && $("#resinfo-bt").data('in-bt') == false) {
                            $("#resinfo-bt").data('in-bt', true);
                            $("#resinfo-bt").addClass('active').attr('title', zomato.language.getText('zm-restaurant-js-remove-been-there'));
                        }
                    } else {

                        zomato.reviews.displayReviewSubmitMessage($container, m.message);
                        $('.res-review[data-review_id="'+review_id+'"]').html(m.review_html);
                        $('.res-review[data-review_id="'+review_id+'"] .review-message').html(m.message).slideDown();
                        setTimeout(function() {
                            $('.res-review[data-review_id="'+review_id+'"] .review-message').slideUp();
                        }, 5000);
                        initiateLaziness();
                        bindReviewPhotosLightboxEvents();

                        Dialog.close();
                    } 

                }
            }
        });
    },

    attachUploadedPhotos: function(parent_obj, photo_id) {
        zomato.reviews.attachedPhotos.push(photo_id);
        var img = parent_obj.find('.choose-photos-ul li[data-photo_id="'+photo_id+'"]').clone().attr('class', '');
        parent_obj.find('#selected-uploaded-restaurant-photos').append(img);
        return;
    },

    removeAttachedUploadedPhotos: function(parent_obj, photo_id) {
        for(i in zomato.reviews.attachedPhotos) {
            if(zomato.reviews.attachedPhotos[i] == photo_id) {
                parent_obj.find('#selected-uploaded-restaurant-photos li[data-photo_id="'+ photo_id + '"]').remove();
                var rest = zomato.reviews.attachedPhotos.splice(i+1);
                zomato.reviews.attachedPhotos.pop();
                zomato.reviews.attachedPhotos.push.apply(zomato.reviews.attachedPhotos, rest);
            }
        }
    },

    displayUploadedPhotos: function(btn) {
       var obj = $(btn).parents('.review-photos');
       obj.find('#add-photos-select').hide(); 
       var container = obj.find('#uploaded-restaurant-photos-container');
       container.show();
       container.find('.choose-photos').show();
       container.find('.select-photos').show(); 
    },

    toggleSelectUserRestaurantPhotos: function(li) {
        var obj = $(li);
        var photo_id = obj.data('photo_id');
        if(obj.hasClass('selected')) {
            obj.removeClass('selected');
            zomato.reviews.removeAttachedUploadedPhotos($(li).parents('.review-photos'), photo_id);
        }
        else {
            obj.addClass('selected');
            zomato.reviews.attachUploadedPhotos($(li).parents('.review-photos'), photo_id);
        }
        var confirm_button = $(obj.parents('#uploaded-restaurant-photos-container').find('.uploaded-attached-confirm-btn'));
        if(confirm_button.hasClass('hidden') && zomato.reviews.attachedPhotos.length >= 1) {
            confirm_button.removeClass('hidden');
        } else if(!confirm_button.hasClass('hidden') && zomato.reviews.attachedPhotos.length < 1) {
            confirm_button.addClass('hidden');
        }
    },

    clearUploadedPhotosSelection: function(reset) {
        var parent_obj = $(reset).parents('.review-photos');
        var parent_container = $(reset).parents('#uploaded-restaurant-photos-container');
        $(parent_container).find('.choose-photos-ul li').removeClass('selected');
        zomato.reviews.attachedPhotos = [];
        $(parent_container).find('.choose-photos').hide();
        $(parent_container).find('.select-photos').hide();
        parent_obj.find('#selected-uploaded-restaurant-photos').html("");
        $(parent_container).parents('.review-photos').find('.add-photos-msg').fadeIn('fast');
        $(parent_container).parents('.review-photos').find('.add-photos-select').hide();
    }, 
    
    confirmUploadedPhotosSelection: function(confirm_button) {
        if(zomato.reviews.attachedPhotos.length <= 0)
            return;
        var obj = $(confirm_button);
        var parent_obj = obj.parents('.review-photos');
        parent_obj.find("#photo-review").fadeIn();
        parent_obj.find("#uploaded-restaurant-photos-container .choose-photos").hide();
        parent_obj.find("#uploaded-restaurant-photos-container .select-photos").hide();
        parent_obj.find(".edit-selected-inst").off('click');
        parent_obj.find(".edit-selected-inst").on('click', function(event){
            event.preventDefault();
            parent_obj.find('.selected-uploaded-restaurant-photos').hide();
            parent_obj.find('.unlinked-restaurant-photos').trigger('click');
            parent_obj.find('#photo-review').hide();
        });
        parent_obj.find("#instagram-selection-container").hide();
    },

    goNext: function(next_btn) {
        var obj = $(next_btn);
        var parent_obj = obj.parents('.review-photos');
        var photos = parent_obj.find('#uploaded-restaurant-photos-container .choose-photos-ul li');
        var num_of_photos = parent_obj.find('#uploaded-restaurant-photos-container .choose-photos-ul li').length;
        var i = zomato.reviews.setIndexVisible*9;
        var j = i+9;
        if((zomato.reviews.setIndexVisible + 1) * 9 >= num_of_photos)
            return;

        for(i; i<j; i++ ) {
            $(photos[i]).hide();
        }
        zomato.reviews.setIndexVisible++;
        parent_obj.find('#uploaded-restaurant-photos-container .prev').removeClass('disabled');
        if((zomato.reviews.setIndexVisible + 1) * 9 >= num_of_photos ) {
            parent_obj.find('#uploaded-restaurant-photos-container .next').addClass('disabled');
            if(num_of_photos < 9) {
                parent_obj.find('#uploaded-restaurant-photos-container .prev').addClass('disabled');
                parent_obj.find('#uploaded-restaurant-photos-container .next').addClass('disabled');
            }
        }
    },

    goPrev: function(prev_btn) {
        if(zomato.reviews.setIndexVisible == 0)
            return;
        var obj = $(prev_btn);
        var parent_obj = obj.parents('.review-photos');
        var photos = parent_obj.find('#uploaded-restaurant-photos-container .choose-photos-ul li');
        var num_of_photos = parent_obj.find('#uploaded-restaurant-photos-container .choose-photos-ul li').length;
        var i = zomato.reviews.setIndexVisible*9-1;
        var j = i-9;
        for(i; i>j; i-- ) {
            $(photos[i]).show();
        }
        zomato.reviews.setIndexVisible--;
        parent_obj.find('#uploaded-restaurant-photos-container .next').removeClass('disabled');
        if(zomato.reviews.setIndexVisible == 0) {
            parent_obj.find('#uploaded-restaurant-photos-container .prev').addClass('disabled');
            if(num_of_photos < 9) {
                parent_obj.find('#uploaded-restaurant-photos-container .next').addClass('disabled');
            }
        }
    }
};

zomato.messages = zomato.messages || {
    bindEvents: function() {

        $(".send-pm-change").on('click', function(event) {
            event.preventDefault();
            zomato.messages.resetToField($(this).parents('.js-send-pm-container'));
        });

        $('.user-send-pm').on('click', function(event){
            event.preventDefault();
            var receiver_id = $(this).data('user_id') || '';
            console.log(zomato.language.getText('zm-zomato-messages-js-send-new-msg'));

            Dialog.show({
                head: zomato.language.getText('zm-zomato-messages-js-send-new-msg'),
                url: HOST+'php/send_pm_dialog?user_id='+receiver_id
            });

        });

        $(".user-reply-pm-submit").off('click');
        $(".user-reply-pm-submit").on('click', function(e) {
            e.preventDefault();
            var explore = $('.user-send-pm-text').val();
            var placeholder = $('.user-send-pm-text').attr('placeholder');
            if(explore == placeholder) {
                $('.user-send-pm-text').val('');
            }
            zomato.messages.replyToMessage($('.user-message-thread'));
        });

        $(".user-send-pm-submit").off('click');
        $(".user-send-pm-submit").on('click', function(event) {
            var explore = $('.user-send-pm-text').val();
            var placeholder = $('.user-send-pm-text').attr('placeholder');
            if(explore == placeholder) {
                $('.user-send-pm-text').val('');
            }
            zomato.messages.sendPrivateMessage($('#dialog-body'));
        });

        $('.messages-list').on('scroll', zomato.messages.onThreadScroll);
		//	placeholderFixByClass();
    },

    onThreadScroll: function() {
        if($('.messages-list').get(0).scrollHeight > 500 && $('.messages-list').scrollTop() < 200 && $(".messages-list").data('more') != "false") {
            $(".messages-list").off('scroll');
            window.ajax = window.proceed = true;

            var thread = $('.messages-list .user-profile-message-item:first').data('thread');
            var message_id = $('.messages-list .user-profile-message-item:first').find('.message-text').data('message_id');
            var data = {'thread': thread, 'message_id': message_id};
            $('.messages-list').find('.user-message-thread-loading').show();
            $.ajax({
                type: 'POST',
                url: HOST+'php/user_messages_handler',
                data: data,
                dataType: 'JSON',
                complete: function() {
                    zomato.messages.bindEvents();
                },
                success: function(response) {

                    if(response.status == 'success') {
                        var initHeight = $('.messages-list').get(0).scrollHeight;
                        var alreadyScrolled = $('.messages-list').scrollTop();
                        $('.messages-list').prepend(response.html);
                        
                        var totalHeight = $('.messages-list').get(0).scrollHeight;
                        console.log(totalHeight);
                        $('.messages-list').scrollTop(totalHeight - initHeight + alreadyScrolled);
                    } else {
                        $(".messages-list").data('more', 'false');
                    }

                    var loading = $('.messages-list').find('.user-message-thread-loading').remove();
                    $('.messages-list').prepend(loading.hide());
                }
            });
        }
    },

    resetToField: function(container) {
        $container = $(container);

        $container.find('.send-pm-to-user,.send-pm-change').hide();
        $container.find('.send-pm-to-input').show().focus();
    },

    setToField: function(container, user_id, name, url) {
        var $container = $(container);

        $container.find('.send-pm-to-input').hide();
        $container.find('.send-pm-to-user a').attr('href', url).text(name);
        $container.find('.send-pm-to-user, .send-pm-change').show();
    },

    chooseToUserClick: function(elem, inp) {
        var name = $(elem).find('.pm-to-name').text();
        var user_id = $(elem).data('user_id');
        var url = $(elem).data('url');

        inp.val(name);
        $(inp).parents('.js-send-pm-container').find('.user-send-pm-submit').data('user_id', $(elem).data('user_id'));
        closeDropDowns();
        zomato.messages.setToField($(inp).parents('.js-send-pm-container'), user_id, name, url);
    },

    chooseToUserSelect: function(elem, inp) {
        var name = $(elem).find('.pm-to-name').text();
        inp.val(name);
    },

    replyToMessage: function(container) {
        $container = $(container);
        if($container.find('.user-reply-pm-submit').data('disabled') == 'disabled')
            return;
        $container.find('.user-reply-pm-submit').addClass('btn-loading').data('disabled', 'disabled');
        var message = $container.find(".user-send-pm-text").val();
        var receiver_id = $container.find('.user-reply-pm-submit').data('user_id');
        $.ajax({
            url: HOST+'php/send_message',
            type: 'POST',
            data: {message: message, receiver_id: receiver_id},
            dataType: 'json',
            complete: function() {
                $container.find('.user-reply-pm-submit').removeClass('btn-loading').data('disabled', '');
            },
            success: function(response) {
                if(response.status == 'success') {

                    $container.find('.messages-list').append(response.thread_html).fadeIn('slow');
                    $container.find('.messages-list').scrollTop($container.find('.messages-list').get(0).scrollHeight);
                    $('.user-profile-message-item.latest-message[data-thread="'+response.thread+'"]').remove();
                    $('.latest-message-selected').removeClass('latest-message-selected');
                    $('.user-profile-message-container').prepend($(response.latest_html).addClass('latest-message-selected'));
                    markMessageRead($('.user-message-thread'), thread);

                    $container.find(".user-send-pm-text").val('');
                } else {
                    $container.find('.user-send-pm-error').text(response.message).fadeIn('slow');
                }

                setTimeout(function() {
                    $container.find('.user-send-pm-error').fadeOut('slow');
                }, 3000);
            }
        });
    },

    sendPrivateMessage: function(container, action_page) {
        $container = $(container);
        $container.find('.user-send-pm-submit').addClass('btn-loading').data('disabled', 'disabled');
        if($container.find('.user-reply-pm-submit').data('disabled') == 'disabled')
            return;
        var message = $container.find(".user-send-pm-text").val();
        var receiver_id = $container.find('.user-send-pm-submit').data('user_id');
        $.ajax({
            url: HOST+'php/send_message',
            type: 'POST',
            data: {message: message, receiver_id: receiver_id},
            dataType: 'json',
            complete: function() {
                $container.find('.user-send-pm-submit').removeClass('btn-loading').data('disabled', '');
            },
            success: function(response) {
                if(response.status == 'success') {
                    $container.find('.user-send-pm-error').text(response.message).fadeIn('slow');
                    $container.find(".user-send-pm-text").val('');
                } else {
                    $container.find('.user-send-pm-error').text(response.message).fadeIn('slow');
                }

                setTimeout(function() {
                    $container.find('.user-send-pm-error').fadeOut('slow');
                }, 3000);
            }
        });
    }

};

var Dialog = {
    height: 300,
    width: 300,
    
    create: function() {
        var dialogHTML =
            '<div id="dialog-screen">'+
                '<div id="dialog-screen-busy"><div id="dialog-screen-busy-img"></div></div>' +
                '<div id="dialog-container">'+
                    '<div class="dialog-head-container clearfix">'+
                        '<div id="dialog-close"><div data-icon="X"></div></div>'+
                        '<div id="dialog-head">'+
                            '<span id="dialog-head-text"></span>'+
                            '<div class="clear"></div>'+
                        '</div>'+
                    '</div>'+
                    '<div id="dialog-busy">'+
                        '<div id="busy-text"></div>'+
                    '</div>'+
                    '<div id="dialog-body">'+
                    '</div>'+
                '</div>'+
            '</div>';


        if(!$("#dialog-container").length)
            $(document.body).append(dialogHTML);

    },

    show: function(data) {
        var head = data.head || '&nbsp;';
        var h = data.height || this.height; 
        var w = data.width || this.width;
        var url = data.url || false;
        var html = data.html || false;
        var postData = data.post || {};
        var onClose = data.onClose || function(){};


        this.create();
        this.setTitle(head);

        var dialog = $("#dialog-container");
        var dialogBody = $("#dialog-body");
        var dialogScreen = $("#dialog-screen");

        dialogScreen.show();
        $("#dialog-head").show();
        $("#dialog-container").show();
        $("#dialog-close").click(function() {
            onClose();
            Dialog.close();
        });
		
		var resize_to = 0;

    dialog.css({width: 'auto', visibility: 'hidden'});
    $("#dialog-head").css({width: '200px'}); // Needed for IE6/7
    dialogBody.css({width: '200px'}).hide();

    if(html) { // If html is passed show that in the dialog
	    var that = this;

	    dialogBody.css({width: 'auto'}).html(html).css({display: 'block'});

	    resize_to = parseInt(dialogBody.outerHeight(true));
	    resize_to_w = parseInt(dialogBody.outerWidth(true));
	    that.resize(resize_to, resize_to_w);

	    dialogBody.show();
	    dialog.css({visibility: 'visible'});

    } else if(url) { // else if url is passed get contents from there
            var that = this;
            $("#dialog-screen-busy").show();

            // $("#dialog-head").css({width: '400px'});
			$.ajax({
				url: url,
				type: "POST",
				data: postData,
				success: function(data){
                    $("#dialog-screen-busy").hide();
					dialogBody.css({width: 'auto'}).html(data); // .css({display: 'block'});
					resize_to = parseInt(dialogBody.outerHeight(true));
					resize_to_w = parseInt(dialogBody.outerWidth(true));
					that.resize(resize_to, resize_to_w);

					dialogBody.show();
                    dialog.css({visibility: 'visible'});
				}
			});
        }

        $('body').css('overflow', 'hidden');

        //Bind ESC
        $(document).on('keyup.dialog', function(e){
            if ( e.keyCode == 27 )
                $("#dialog-close").trigger('click');
        });

        // dialogScreen.on('click.dialog', function() {
        //    Dialog.close();
        // });

        $("#dialog-container").on('click.dialog', function(e) {
            e.stopPropagation();
        });

    },

    resize: function(h, w) {
        // reset height width
        if(typeof(h) == 'number')
            this.height = h;
        if(typeof(w) == 'number')
            this.width = w;
        

        // Adjust position to center of the screen
        var l = $(window).scrollLeft() + ($(window).width() - this.width)/2;
        // var t = ($(window).height() - this.height)/2 - 60;
        var t = 80; // Always start from constant position

		// To prevent dialog box going up the screen
        if(t < 40)
            t = 40;

        $("#dialog-head").css({width: w - 90}); // Needed for IE6/7
        $("#dialog-container").css({
             height: 'auto',
             width: w,
             top: t,
             left: l
        });
    },

    setTitle: function(title) {
        $("#dialog-head-text").text(title);
    },

    close: function() {
        $("#dialog-screen").hide().off('click.dialog');
        $("#dialog-container").hide().off('click.dialog');
        $(document).off('keyup.dialog');
        $('body').css('overflow', 'auto');
    }
};

var zomato = zomato || {};
zomato.auth = {
    onEmailVerificationComplete: function(data) {
        data = data || {};

        $(".signup-verif-success-proceed").on('click', function(event) {
            event.preventDefault();
            Dialog.close();
        });

        $.ajax({
            url: HOST+'php/asyncLogin.php',
            type: "GET",
            data: data,
            success: function(response) {
                var m = eval('('+response+')');
                USER_ID = m.user_id;   

                try {
                    if(m.status == 'true')	{
                        asyncUpdateLoginDiv();
                    } else {
                    }
                } catch(e) {
                }
            }
        });
    },

    bindResendVerificationEmailEvents: function() {
        $(".signup-verif-resend-code").on('click', function(e) {
            var user_id = $(this).data('user_id');
            $.ajax({
                url: HOST+'php/resend_verification_email',
                data: {user_id: user_id},
                dataType: 'json',
                complete: function() {
                }, 
                success: function(response) {
                    $(".signup-verif-resend-code").parent().html('A new verification email has been sent to your registered email address.');
                }
            });
        });


        $("#resend-verification-email").on('click', function(e) {
            var user_id = $(this).data('user_id');
            $(this).hide();
            $("#resend-verifcation-email-loading").show();
            $.ajax({
                url: HOST+'php/resend_verification_email',
                data: {user_id: user_id},
                dataType: 'json',
                complete: function() {
                    $("#resend-verifcation-email-loading").hide();
                }, 
                success: function(response) {
                    $("#resend-verification-email-message").html(response.message).show();
                    if(response.status == 'success') {
                        $(".resend-verification-email-code").show();
                        $(".resend-verification-email-code").find('.signup-verif-uid').val(response.user_id);

                        $("#ld-login-not-verified").find('.signup-verif-submit').on('click', function(e) { 
                            e.preventDefault();
                            zomato.auth.onConfirmationCodeSubmit($('#ld-login-not-verified')) 
                        });
                        $("#ld-login-not-verified").find('.signup-verif-code').on('keydown', function(e) {
                            if(e.keyCode == 13)
                                zomato.auth.onConfirmationCodeSubmit($('#ld-login-not-verified'));
                        });
                    }
                    $("#resend-verification-email-before").hide();
                }
            });
        });
    },

    loginNotVerified: function(m) {
        $("#ld-login-not-verified").show();
        $("#login-form-dialog").hide();
        $("#resend-verification-email,.signup-verif-resend-code").data('user_id', m.user_id);
    },

    onConfirmationCodeSubmit: function(container) {
        var $container = $(container);
        var code = $container.find(".signup-verif-code").val();
        var user_id = $container.find(".signup-verif-uid").val();
        $container.find(".signup-verif-submit-loading").show();
        $container.find(".signup-verif-submit-text").hide();
        $.ajax({
            url: HOST+'php/confirm_user_async',
            type: 'POST',
            data: {code: code, user_id: user_id},
            dataType: 'json',
            success: function(response) {
                if(response.status == "success") {
                    zomato.auth.switchLoginDialogPage('signup-verif-success');
                    zomato.auth.onEmailVerificationComplete();
                } else {
                    $container.find(".signup-verif-error").text(response.message).show();
                }
            },
            complete: function() {
                $container.find(".signup-verif-submit-loading").hide();
                $container.find(".signup-verif-submit-text").show();
            }
        });
    },

    switchLoginDialogPage: function(page_class) {
        $(".login-section").hide();
        $("."+page_class).show();
        var heading_elem = $("#login-section-heading-"+$("."+page_class+":first").attr('id'));
        console.log("#login-section-heading-"+$("."+page_class+":first").attr('id'));
        if(heading_elem.length) {
            $("#dialog-head-text").text($(heading_elem).text());
        }
    },

    tryZomatoSignUp: function(data) {
        dialogIsBusy();
        var currentId = $(this).attr('id');

        // var showNotification = typeof $(this).data('show-notification') != 'undefined' ? $(this).data('show-notification') : 'true';
        // var closeDialog = typeof $(this).data('close-dialog') != 'undefined' ? $(this).data('close-dialog') : 'true';
        // var store_cookie_session = typeof $(this).data('store-cookie-session') != 'undefined' ? $(this).data('store-cookie-session') : 'true';

        $.ajax({
            url: HOST+"php/signup",
            type: "POST",
            data: data,
            dataType: 'json',
            complete: function(response) {
                dialogIsNotBusy();
            },
            success: function(m) {
                if(m.status == 'success') {
                    if(m.action == 'verify') {

                        zomato.auth.switchLoginDialogPage('signup-verif-container');
                        $(".signup-verif-form").find('.signup-verif-uid').val(m.user_id);

                        $(".signup-verif-form").find('.signup-verif-submit').on('click', function(e) { 
                            e.preventDefault();
                            zomato.auth.onConfirmationCodeSubmit($('.signup-verif-form')) 
                        });
                        $(".signup-verif-form").find('.signup-verif-code').on('keydown', function(e) {
                            if(e.keyCode == 13)
                                zomato.auth.onConfirmationCodeSubmit($('.signup-verif-form'));
                        });
                    } else {
                        // we should not reach here
                    }
                } else {
                    $("#sd-error").hide().html(m.message).fadeIn('slow');
                }
            
            /*
                var yesNo = m.verification;

                if(typeof m.status != 'undefined') {

                    if(m.status == "true")	{

                        if(currentId != 'sd-form-reload') {
                            if(showNotification == 'true') {
                                if ( yesNo && yesNo == 'yes' ) {
                                    showSingupNotif(m.message);
                                } else {
                                    showSingupNotif();
                                    USER_ID = m.user_id;    // added by ankur
                                    $(document).trigger('ZOMATO_SIGNUP', currentId);
                                    asyncUpdateLoginDiv();
                                    if(currentId!='sd-form-booktable') {
                                        if(closeDialog == 'true')
                                            setTimeout(function() {Dialog.close();}, 1000);
                                    }

                                }
                            }
                        } else
                            window.location.reload();
                    } else {
                        $("#sd-error").hide().html(m.message).fadeIn('slow');
                    }        
                } 
                else	{
                    $("#sd-error").hide().html(m.message).fadeIn('slow');
                }
               */
            }

        });
    }
}





/*
 * the types to be added
 *
 *      type name for  |  type name to be appended
 *   ------------------------------------------
 *      review-submit  |  review
 *     event attending |  eventAttending
 *       add to list   |  addToList
 *      set favourite  |  favourite
 *      claim listing  |  claim
 * Global(from header) |  global
 *
 *
 *  to be used in following situations to recognize the subsequent action to be done
 *
 *  1. (sd-form-* -> submit ) - Signup form in signup_dialog.php ( sd )  submit event
 *  2. (ld-submit-* -> submit ) - Login form in the loginDialog.php ( ld ) submit event
 *  3. (facebook-login-* -> click ) - facebook login/signup
 *
 */
function addGlobalSignupEvents()	{

	
}


function addGlobalLoginEvents()     {

  

    $(".ld-form").live('submit', function() {
        var showNotification = typeof $(this).data('show-notification') != 'undefined' ? $(this).data('show-notification') : 'true';
        var closeDialog = typeof $(this).data('close-dialog') != 'undefined' ? $(this).data('close-dialog') : 'true';
        console.log(showNotification, closeDialog);


        dialogIsBusy();
     
        var currentId = $(this).attr('id');
        var onSuccess = function() {
          

	        if(document.location.pathname == '/login'){

                if($("#hidden-next-url").length && $("#hidden-next-url").attr('value') == 'userProfile'){

                    $.get(HOST+'php/getProfileUrl.php', function(response){

                        if(response)
                            window.location = response;
                        else
                            window.location = HOST;
                    });

                }
                else{
                    window.location = HOST;
                }

            }
             else{

            if(currentId != 'ld-form-reload'){
                if(showNotification == 'true')
                    showLoginNotif();

                //dialogIsNotBusy();
                $(document).trigger('ZOMATO_LOGIN', currentId);
                if(currentId!='ld-form-booktable') {
                    if(closeDialog == 'true')
                        setTimeout(function() {Dialog.close();}, 1000);
                }
            }else
                window.location.reload();
            
		}
        };

        var onFail = function(m) {
            if(typeof m.action != "undefined" && m.action == "NOT_VERIFIED") {
                zomato.auth.loginNotVerified(m);
                dialogIsNotBusy();
            } else {
                m.message = m.message || zomato.language.getText('zm-login-js-invalid-username-pwd');
                dialogIsNotBusy();
                $("#ld-message").hide().html(m.message).fadeIn("slow");
            }
        };

                          
        zomatoLoginAsync($("#ld-email").val(), $("#ld-password").val(),$("#ld-remember").attr('checked'), onSuccess, onFail);
        return false;

    });




  // facebook login

     $(".facebook-login").live('mouseup',function() {

        var showNotification = typeof $(this).data('show-notification') != 'undefined' ? $(this).data('show-notification') : 'true';
        var closeDialog = typeof $(this).data('close-dialog') != 'undefined' ? $(this).data('close-dialog') : 'true';

        dialogIsBusy();

        var currentId = $(this).attr('id');
        var data = {};

        if($(this).data('type') == 'signup')
            data['newsletter_flag'] = $("#sd-newsletter-social:checked").length ? true : false;


        var onFail = function() {
            dialogIsNotBusy();
            alert(zomato.language.getText('zm-login-js-login-fail'));
        };

        var onSuccess = function() {

            // TODO type
            //dialogIsNotBusy();
            if(document.location.pathname == '/login'){
                if($("#hidden-next-url").length && $("#hidden-next-url").attr('value') == 'userProfile'){
                    $.get(HOST+'php/getProfileUrl.php', function(response){
                        if(response)
                            window.location = response;
                        else
                            window.location = HOST;
                    });
                }
                else{
                    window.location = HOST;
                }
            }
            else{
                if(showNotification == 'true')
                    showLoginNotif();
                $(document).trigger('FACEBOOK_LOGIN', currentId);
                if(closeDialog == 'true')
                    setTimeout(function() {Dialog.close();}, 1000);
            }
        };

        facebookLoginAsync(onSuccess, onFail, function(){}, function(){}, data);
        return false;
    });

// @todo show confirmation after user has logged in !

//Facebook Account Connection
$('.facebook-connect-account').live('click', function(){
     var currentId = $(this).attr('id');
     var title = zomato.language.getText('zm-login-js-facebook-error-header');
     var key = "";
     var onFail = function(code) {
        if(code==0)
            key = 'zm-login-js-facebook-connect-error';
        else if(code==1)
            key = 'zm-login-js-facebook-connect-invalid-fbid';
        else if(code==2)
            key = 'zm-login-js-facebook-connect-fbid-exist';
        else
            key = 'zm-login-js-facebook-connect-error';
        Dialog.show({
            head: title,
            html: '<div class="logged-in-success grid_6 column mtop2" style=" text-align: center; margin-bottom: 40px;">'+zomato.language.getText(key)+'</div><div class="clear"></div>', 
            height: 470,
            width: 390

        });
     };
     var onSuccess = function() {
        $(document).trigger('FACEBOOK_CONNECT_ACCOUNT', currentId);
     };

     facebookConnectAccountAsync(onSuccess, onFail);
     return false;
});

}


// completes Google async login

function showLoginNotif() {
    dialogIsNotBusy();
    Dialog.show({
        head: zomato.language.getText('zm-login-js-login-to-zomato'),
        html: '<div class="logged-in-success grid_6 mtop2" style="font-weight: bold; text-align: center; margin-bottom: 40px;">'+zomato.language.getText('zm-login-js-logged-in-success')+'</div><div class="clear"></div>'
    });
	//$("#login-notification").fadeIn("slow").delay(1000).fadeOut("slow");   
}

function showSingupNotif( text ) {
    var font_weight = '', header = zomato.language.getText('zm-login-js-register'); 
    if ( !text ) {
        text = zomato.language.getText('zm-lougin-js-signed-up-success');
    } else {
        font_weight = '';
        header = zomato.language.getText('zm-login-js-verification-almost-there');
    }   
    dialogIsNotBusy();
    Dialog.show({
        head: header,
        html: '<div class="clearfix">'+text+'</div>'
    });

    $("#signup-verif-submit").on('click', function() { zomato.auth.onConfirmationCodeSubmit($('.signup-verif-container')) });
    $("#signup-verif-code").on('keydown', function(e) {
        if(e.keyCode == 13)
            zomato.auth.onConfirmationCodeSubmit($('.signup-verif-container'));
    });
    //$(".login-notification-content").html('<b>Signup Successful');
    //$("#login-notification").fadeIn("slow").delay(1000).fadeOut("slow");

}

// dialog box - show busy loading gif

function dialogIsBusy(){
    $("#busy-text").show();
    $("#dialog-busy").show();
}


function dialogIsNotBusy(){
    $("#busy-text").hide();
    $("#dialog-busy").hide();
}

function zomatoLoginAsync(login, password, rememberFlag, successCallback, failCallback) {

    if(typeof(successCallback) == 'undefined')
        successCallback = function(){};
    if(typeof(failCallback) == 'undefined')
        failCallback = function(){};

    if(login == '') {
        dialogIsNotBusy();
        $("#ld-message").hide().html(zomato.language.getText('zm-login-js-fill-email-or-address')).fadeIn("slow");
    } else if( password == '') {
        dialogIsNotBusy();
        $("#ld-message").hide().html(zomato.language.getText('zm-login-js-please-enter-pwd')).fadeIn("slow");
    } else {
        $.ajax({
            url: HOST+'php/asyncLogin.php',
            type: "POST",
            data: "login="+encodeURIComponent(login)+"&password="+encodeURIComponent(password)+"&rememberFlag="+rememberFlag,
            success: function(response) {
                var m = eval('('+response+')');
                var message = m.message||'';


                if(typeof m.status != 'undefined') {
                    if(m.status == 'true')	{
                        USER_ID = m.user_id;    
                        asyncUpdateLoginDiv();
                        successCallback();
                    }
                    else
                        failCallback(m);
                } else
                    failCallback(m);
            }
        });
    }
}

function zomatoAsyncSignup(formid, successCallback, failCallback, errorCallback) {
    if(typeof(successCallback) == 'undefined')
        successCallback = function(){};
    if(typeof(failCallback) == 'undefined')
        failCallback = function(){};
    if(typeof(errorCallback) == 'undefined')
        errorCallback = function(){};

    $.ajax({
        url: HOST+"php/signup.php",
        type: "POST",
        data: $("#"+formid).serialize(),
        success: function(response) {
            var m = eval('('+response+')');

            

            if(typeof m.status != 'undefined') {
                if(m.status == "true"){
                    USER_ID = m.user_id;    
                    successCallback(m);
                }
                else
                    failCallback(m);
            } else
                errorCallback(m);
        }
    });

}

function asyncUpdateLoginDiv()	{

    _gaq = typeof _gaq == 'undefined' ? [] : _gaq;
    _gaq.push( ['_trackPageview', '/signup/complete'], ['t2._trackPageview', '/signup/complete'], ['t3._trackPageview', '/signup/complete'] );
	$.get(HOST+'php/loginLinkUpdater.php', function(response){
	    $("#loginbox").replaceWith(response.login_link);
        // zomato.notifications.fetch();
        // fixHeaderNotificationsHeight();
        addLogoutEvent();
    });
}

// Asyncronously login on facebook connect without page reload
// calls function successCallback on successful login
// calls function failCallback on failed login
// calls function newRegCallback if user is not found in database (new registration)

function facebookLoginAsync(successCallback, failCallback, newRegCallback, errorCallback, data) {
    if(typeof(successCallback) == 'undefined')
        successCallback = function(){};
    if(typeof(failCallback) == 'undefined')
        failCallback = function(){};
    if(typeof(newRegCallback) == 'undefined')
        newRegCallback = function(){};
    if(typeof(errorCallback) == 'undefined')
        errorCallback = function(){};
    if(typeof(data) == 'undefined')
        data = {};

    FB.login(function(response) {
        if (response.authResponse) {    
            // session replaced with authResponse to assist Oauth 2.0
            // console.log(response);
            // user is logged in and granted some permissions.
            // perms is a comma separated list of granted permissions
            var access_token = FB.getAuthResponse()['accessToken'];
            FB.api('/me/permissions', function (resp) {
                var perms = resp.data[0];  
                data['perms'] = JSON.stringify(perms);  
                $.ajax({
                    url: HOST+'php/asyncLogin.php?access_token='+access_token,
                    type: "GET",
                    data: data,
                    success: function(response) {
                        var m = eval('('+response+')');
                        USER_ID = m.user_id;   

                        if(typeof(m.status) != 'undefined') {
                            if(m.status == 'true' && m.isNew == "true")
                                newRegCallback();
                            else if(m.status == 'true') {
                                asyncUpdateLoginDiv();
                                successCallback();
                            } else
                                failCallback();
                        } else
                            errorCallback();
                    }
                });                                       
            });

        } else {
            // user is not logged in
            failCallback();
            //alert("User cancelled login or did not fully authorize.");
        }
    }, {scope:'publish_actions, email, user_about_me, user_birthday, user_location'});
}
//scope:'publish_stream, email, user_about_me, user_birthday, user_location'

function facebookConnectAccountAsync(successCallback, failCallback, newRegCallback, errorCallback) {
    if(typeof(successCallback) == 'undefined')
        successCallback = function(){};
    if(typeof(failCallback) == 'undefined')
        failCallback = function(){};
    if(typeof(newRegCallback) == 'undefined')
        newRegCallback = function(){};
    if(typeof(errorCallback) == 'undefined')
        errorCallback = function(){};

    FB.login(function(response) {
               if (response.authResponse) {     // session replaced with authResponse to assist Oauth 2.0
                 //console.log(response);
                // user is logged in and granted some permissions.
                // perms is a comma separated list of granted permissions
                var access_token = FB.getAuthResponse()['accessToken'];
                FB.api('/me', function(fb_user_data) {
                    $.ajax({
                        url: HOST+'php/common_activity_handler.php?type=connect_facebook_to_zomato&access_token='+access_token,
                        type: "POST",
                        data: fb_user_data,
                        success: function(r) {
                            var m = eval('('+r+')'); 
                            if(m.status == 'success')
                                successCallback();
                            else{
                                failCallback(m.code);
                            }

                        }
                    });

                });
            } else {
            // user is not logged in
            failCallback();
            //alert("User cancelled login or did not fully authorize.");
            }
    }, {scope:'publish_actions, email, user_about_me, user_birthday, user_location'});
}



function addLogoutEvent() {

    $("#logout").on("click", function(event) {
        event.preventDefault();

        var failTimeout = setTimeout(function() { window.location = $("#logout").attr('href'); }, 3500);
        FB.getLoginStatus(function(response) {
            clearTimeout(failTimeout);
            if (response.authResponse) {
                // if(response.status == 'connected') {
                //     // deleting the fb cookie
                //     setCookie('fbsr_'+FB_APP_ID, '', -1);               
                // }
                
                // logged in and connected user, someone you know
                FB.logout(function(logoutResponse) {
                    // user is now logged out

                    // if(response.status == 'connected')
                    //     setCookie('fbsr_'+FB_APP_ID, '', -1);               // deleting the fb cookie
                    window.location = $("#logout").attr('href');
                });

            } else {
                // no user session available, someone you dont know
                // deleting the fb cookie
                // setCookie('fbsr_'+FB_APP_ID, '', -1);
                window.location = $("#logout").attr('href');
            }
           
        }, true);
    });


}

function popupIt(url) {

    dialogIsBusy();

    var newWindow = window.open(url, 'name', 'height=500,width=450,menubar=0');
      if (window.focus) {
        newWindow.focus();
      }
      if ( typeof newWindow.closed !== 'undefined' ) {
        var openCheckInterval = setInterval( function() {
            if ( newWindow.closed ) {
                dialogIsNotBusy();
                clearInterval(openCheckInterval)
            }
        }, 300 );
      }
    }

function showDialog(context, title, type, titleOverride) {

    if(typeof(title) == 'undefined')
        title='zomato';

    if(typeof(type) == 'undefined')
        type='global'+ (window.unstore_cookie_session ? '&unstore=true' : '');
    
    if ( window.unstore_cookie_session ) window.unstore_cookie_session = false;


    if(context=='signup'){
        url = HOST+"php/signup_dialog.php?type=";
        height = 550;
        width  = 392;
        title = zomato.language.getText('zm-login-js-register');
    }
    else if(context =='login'){
        url =HOST+'php/loginDialog.php?type=';
        height = 470;
        width  = 392;
        title = zomato.language.getText('zm-login-js-login-to-zomato');
    }
    else if(context == 'resetPassword'){
        title = zomato.language.getText('zm-login-js-forgot-password');
        url = HOST+"php/reset_password_dialog?type=";
        height = 210;
        width  = 570;
    }

    if( titleOverride != null && typeof titleOverride != 'undefined' && titleOverride != '' )
        title = titleOverride;

    Dialog.show({
        head: title,
        url: url+type,
        height: height,
        width: width
    });
}



$(document).ready(function(){

    addLogoutEvent();
    addGlobalLoginEvents();
    addGlobalSignupEvents();

    // storeFacebookFriendsEvents();

    $("body").on('submit', '.sd-form', function(event) {
        event.preventDefault();
        var data = {
            fullname: $("#sd-fullname").val(),
            email: $("#sd-email").val(),
            password: $("#sd-password").val(),
            newsletter: $("#sd-newsletter:checked").length,
            city: $("#sd-city").val()
        };
        zomato.auth.tryZomatoSignUp(data);
    });

    $('#sd-newsletter-social').live('change',function(){
        if ( $( this ).attr( 'checked' ) ) 
            $('#sd-newsletter').attr('checked','check');
        else
            $('#sd-newsletter').removeAttr('checked');
            
    });

    $('.google-signup-link').live('click',function(){
        var newsletter_flag = $( '#sd-newsletter-social:checked' ).length ? true : false; 
        setCookie('newsletter_flag',newsletter_flag,1);    
    });

    // login/signup dialog events

    // move signups and signins to class based event triggers rather then id based

    $("#signup-link").on('click',function(event) {
        event.preventDefault();
        showDialog('signup');

        return false;
    });

    $("#signin-link").on('click',function(event) {
        event.preventDefault();
        window.unstore_cookie_session = true;
        showDialog('login');
    });


    
    $(".signin-link-reload").live('click',function(event) {
        event.preventDefault();
        
        showDialog('login','','reload');

    });

    
    $(".signup-link-reload").live('click',function(event) {
        event.preventDefault();
        
        showDialog('signup');

        return false;
    });
    
    // for premium menu quick login 

     $("#signin-for-premium-menu").live('click',function(event) {
        event.preventDefault();

        showDialog('login','','premium&remember=1');

    });
    
    $("#signup-for-premium-menu").live('click',function(event) {
        event.preventDefault();
        
        showDialog('signup','','premium');

        return false;
    });

    // events for premium menu end here



    $("#random-signup-link").live('click',function(event) {
        event.preventDefault();

        showDialog('signup');

        return false;
    });


  $("#signup-link-on-login-page").live('click',function(event) {
        event.preventDefault();

        showDialog('signup');

        return false;
    });

        // login/signup dialog events

    $("#claim-signup-link").live('click',function(event) {
        event.preventDefault();

        showDialog('signup',zomato.language.getText('zm-login-js-register-to-claim-res'),'claim');
            
        return false;
    });

    $("#claim-signin-link").live('click',function(event) {
        event.preventDefault();

        showDialog('login',zomato.language.getText('zm-login-js-login-to-claim-res'),'claim');

    });

    $("#random-forgotpass").live('click',function(event){
        event.preventDefault();
        
        showDialog('resetPassword');
        
        return false;
    });

    // reset password

    $("#reset-password-form").live('submit', function(event){

        event.preventDefault();

           $.ajax({
                url: HOST+'php/resetPassword.php',
                type: "POST",
                data: "type=resetPassword&password="+encodeURIComponent($("#new_password").val())+"&repeat_password="+encodeURIComponent($("#repeat_password").val())+"&reset_id="+encodeURIComponent($("#reset_id").val()),
                success: function(response) {

			
        	        var m = eval('('+response+')');

                    if(typeof m.status != 'undefined') {
                        if(m.status == 'success')	{
                           alert(m.message);
                            window.location = HOST;
                        }
                        else if(m.status == 'error'){
                            $("#reset-password-error").html(m.message);
                            $("#new_password").val('');
                            $("#repeat_password").val('');

                        }
                    }
                 }  
            });
    });



    

var login_hover = 0;
$("#loginbox").live('mouseenter',function(){
    login_hover = 1;
   if($("#loginbox").width() >= 120)
       $("#user-menu-dropdown").width($("#loginbox").width());
   else
       $("#user-menu-dropdown").width(130);

   $(".logged-in-link").addClass('sectionSelect');
   $("#user-menu-dropdown").show();

   $("#loginbox").live('mouseleave',function(){
        login_hover=0;
       $(".logged-in-link").removeClass('sectionSelect');
       $("#user-menu-dropdown").hide();

    });

});

var click_count = 0;

$("#loginbox").live('click',function(){

    if(click_count == 0){
          $(".logged-in-link").removeClass('sectionSelect');
          $("#user-menu-dropdown").hide();
          click_count = 1;
    }
    else if (click_count == 1){
          $(".logged-in-link").addClass('sectionSelect');
          $("#user-menu-dropdown").show();
          click_count = 0;
    }

   /* $('body').bind('click', function(event){

        $(".logged-in-link").removeClass('sectionSelect');
        $("#user-menu-dropdown").hide();

    }); */

});


$("#user-menu-dropdown").live('mouseenter',function(){

    $(".logged-in-link").addClass('sectionSelect');
    $("#user-menu-dropdown").show();
})

$("#user-menu-dropdown").live('mouseleave',function(){

    if(login_hover==0){
        $(".logged-in-link").removeClass('sectionSelect');
        $("#user-menu-dropdown").hide();
    }
});


});

function storeFacebookFriendsEvents() {
    $(document).bind("FACEBOOK_LOGIN", function() {
        $.ajax({
            type: "GET",
            url: HOST+'php/post_fb_login',
            success: function() {
            }
        });
    });
}

function googleLoginAsync(currentId, user_id, data ) {
    if ( data.error && data.error == 'access_denied') {
        dialogIsNotBusy();
    } else if ( data.code ) {
        USER_ID = parseInt( user_id, 10 );
        asyncUpdateLoginDiv();

        if(currentId != 'pmenu-login-g') {
            showLoginNotif();
            $("#dialog-head").hide();
            setTimeout(function(){Dialog.close();}, 2000);
        }

        $(document).trigger('ZOMATO_LOGIN', currentId);
    } 
}
/*function googlePlusLogInAsync(result) {
    console.log(result);
    if ( result.error && result.error == 'access_denied' ) {
        dialogIsNotBusy();
    } else if ( result.code ) {
            var state = $.parseJSON( result.state );
            $.ajax( {
                type: "POST",
                url: HOST + 'php/asyncLogin.php',
                success: function( result ) {
                    var m = eval('('+result+')');
                    var currentId = m.user_id;
                    if ( currentId ) {
                        dialogIsNotBusy();
                        asyncUpdateLoginDiv();
                        showLoginNotif();
                        $(document).trigger('ZOMATO_LOGIN', currentId);
                        $("#dialog-head").hide();
                        setTimeout(function(){Dialog.close();}, 2000);
                    } else {
                        dialogIsNotBusy(); 
                    }
                },
                data: { data: { code: result.code , state: state }}   
            } );
        
    } 
}*/



;(function($) {
	
	var defaults = {
		'socialEngineHandler': HOST+'php/common_social_handler.php',
		'followEngineHandler': HOST+'php/common_follow_handler.php',
		'followUserButtonClass': 'zs-follow-user-button',
		'followUserButtonBeforeLoginClass': 'zs-follow-user-button-before-login',
		'unfollowUserButtonClass': 'zs-unfollow-user-button',
		'followResButtonClass': 'zs-follow-res-button',
		'followResButtonBeforeLoginClass': 'zs-follow-res-button-before-login',
		'unfollowResButtonClass': 'zs-unfollow-res-button',
        'resFavCount': 'zs-res-fav-count',
        'userFollower': 'zs-user-follower',
        'userFollowerCount': 'zs-user-follower-count',
        'userFollowerText': 'zs-user-follower-text'
	};

	var methods = {
		init: function(options) {
			//console.log(options);
		},
		loadFollowUserButton: function(options) {
			return this.each(function() {
			    var $this = $('.zs-follow-btn-container[data-user-id='+options.followed_user_id+'][data-entity-type=USER]');
				//var $this = $(this);
				var content = '';

				//Not logged in
				if(options.follower_user_id == '0') {
					content = '<a href="#" title="'+zomato.language.getText('zm-zsocial-js-follow-text')+'" class="tooltip social-button follow-social '+defaults.followUserButtonClass+'">+</a>';
                    $this.undelegate('.'+defaults.followUserButtonClass, 'click.fub');
                    $this.delegate('.'+defaults.followUserButtonClass, 'click.fub', function(e) {
                        e.preventDefault();
                        follow_data = {'user_id': options.followed_user_id, 'container_obj': $this};
                        follow_data_hover = {'user_id': options.followed_user_id, 'container_obj': $this};
						followUser(0, options.followed_user_id, $this);
                    });
				}
				else {
					if(options.follower_user_id != options.followed_user_id) {
						if(options.is_followed == false) {
							content = '<a href="#" title="'+zomato.language.getText('zm-zsocial-js-follow-text')+'" class="tooltip social-button follow-social '+defaults.followUserButtonClass+'">+</a>';
						}
						else {
							content = '<a href="#" title="'+zomato.language.getText('zm-zsocial-js-unfollow-text')+'" class="tooltip social-button following-social '+defaults.unfollowUserButtonClass+'">=</a>';
						}

						//Event listener for follow button
	                    $this.undelegate('.'+defaults.followUserButtonClass, 'click.fub');
						$this.delegate('.'+defaults.followUserButtonClass, 'click.fub', function(e) {
							e.preventDefault();
	                        followUser(options.follower_user_id, options.followed_user_id, $this);
						});
		
						//Event listener for unfollow button
	                    $this.undelegate('.'+defaults.unfollowUserButtonClass, 'click.ufub');
						$this.delegate('.'+defaults.unfollowUserButtonClass, 'click.ufub', function(e) {
							e.preventDefault();
							unfollowUser(options.follower_user_id, options.followed_user_id, $this);
						});

	                    //Change text from Following to Unfollow
                        // shifted to common.js on a common class selector
	                    // $this.find('.'+defaults.unfollowUserButtonClass).live({
	                    //     mouseenter: function() {if(!$(this).hasClass('while-following') && !$(this).hasClass('just-followed')){$(this).html('6');}},
	                    //     mouseleave: function() {if(!$(this).hasClass('while-following')){$(this).removeClass('just-followed').html('=');}}
	                    // });
					} else {
						content = '';
					}

				}
				$this.html(content);
				$('.tooltip').tipsy();
			});
		},
		loadFollowSuggestions: function(options) {
			 return this.each(function() {
                var $this = $(this);
				
				$this.html(zomato.language.getText('zm-zsocial-js-loading-sugg-text'));
                var content = new Array();
				
				$.ajax({
					url: defaults.followEngineHandler+'?type=get_follow_suggestions',
					type: 'GET',
					data: {'user_id': options.user_id},
                    dataType: 'json',
					success: function(response) {
						var r = response;
						
						$(r.ids).each(function(i, v) {
							content[i] = '<a href="'+HOST+'user.php?user_id='+v+'" title="'+r.data[v].name+'"><img src="'+r.data[v].profile_thumb+'" width="30" height="30" style="margin-right: 5px;"/></a>';
						});
						if(content.length > 0)
							$this.html(zomato.language.getText('zm-zsocial-js-suggestions-text', content.join('') ));
						else
							$this.html(zomato.language.getText( 'zm-zsocial-js-suggestions-text-none' ));

					}
				});        
                        });
		},
		loadFollowed: function(options) {
			 return this.each(function() {
                var $this = $(this);
				$this.html(zomato.language.getText( 'zm-zsocial-js-loading-people-i-follow' ));
                var content = new Array();
                
				$.ajax({
					url: defaults.followEngineHandler+'?type=get_followed&entity_type=USER',
					type: 'GET',
					data: {'user_id': options.user_id},
                    dataType: 'json',
					success: function(response) {
						var r = response;
        				$(r.ids).each(function(i, v) {
                            content[i] = '<li><a href="'+HOST+'user.php?user_id='+v+'" class="tooltip" title="'+r.data[v].name+'"><img src="'+r.data[v].profile_thumb+'" class="uimage"></a></li>';
						});
						if(content.length > 0) {

                            if(r.count > 9) {
                        		more1_li = '<li class="more"><a title="'+zomato.language.getText('zm-zsocial-js-view-all-text')+'" class="tooltip" href="'+user_profile_url+'/follows">&middot;&middot;&middot;</a></li>';
								$this.html(content.join('')).append(more1_li);
							}
							else {
								$this.html(content.join(''));
                            }

                            $this.find('.tooltip').tipsy();
                        }
						else {
							$this.html('<li>'+zomato.language.getText('zm-zsocial-js-none-text')+'</li>');
                        }

					}				
				});        
         	});
		},
		loadFollowers: function(options) {
			 return this.each(function() {
                var $this = $(this);
				
				$this.html(zomato.language.getText('zm-zsocial-js-loading-ppl-follow-me'));

                var content = new Array();
				
				$.ajax({
					url: defaults.followEngineHandler+'?type=get_followers',
					type: 'GET',
					data: {'user_id': options.user_id},
                    dataType: 'json',
					success: function(response) {
						var r = response;
						$(r.ids).each(function(i, v) {
                            content[i] = '<li><a href="'+HOST+'user.php?user_id='+v+'" class="tooltip" title="'+r.data[v].name+'"><img src="'+r.data[v].profile_thumb+'" class="uimage"></a></li>';
						});
						if(content.length > 0) {

                            if(r.count > 9) {
                        		more_li = '<li class="more"><a title="'+zomato.language.getText('zm-zsocial-js-view-all-text')+'" class="tooltip" href="'+user_profile_url+'/followedby">&middot;&middot;&middot;</a></li>';
								$this.html(content.join('')).append(more_li);
							}
							else {
								$this.html(content.join(''));
                            }


                            $this.find('.tooltip').tipsy();
                        }
						else {
							$this.html('<li>'+zomato.language.getText('zm-zsocial-js-none-text')+'</li>');
                        }

					}				
				});        
            });
		},
		loadFollowRestaurantButton: function(options) {
			return this.each(function() {
				var $this = $('.zs-follow-btn-container[data-res-id='+options.followed_res_id+'][data-entity-type=RESTAURANT]');
				var content = '';

				//Not logged in
				if(options.follower_user_id == '0') {
					$this.find('a').addClass(defaults.followResButtonClass).attr('title',zomato.language.getText('zm-zsocial-js-add-fav-text')).trigger("mouseout");
					//content = '<a href="#" class="social-button follow-social '+defaults.followResButtonClass+'">Follow</a>';
                    $this.undelegate('.'+defaults.followResButtonClass, 'click.frb');
                    $this.delegate('.'+defaults.followResButtonClass, 'click.frb', function(e) {
                        e.preventDefault();
                        follow_data = {'res_id': options.followed_res_id, 'container_obj': $this};
                        follow_data_hover = {'res_id': options.followed_res_id, 'container_obj': $this};
                        followRestaurant(0, options.followed_res_id, $this);
                    });
				} else {
					if(options.is_followed == false) {
						$this.find('a').removeClass(defaults.unfollowResButtonClass).addClass(defaults.followResButtonClass).attr('title',zomato.language.getText('zm-zsocial-js-add-fav-text')).trigger("mouseout");
						$this.removeClass('fav-yes cross-hover').addClass('fav-no');
						//content = '<a href="#" class="social-button follow-social '+defaults.followResButtonClass+'">Follow</a>';
					} else {
						$this.find('a').removeClass(defaults.followResButtonClass).addClass(defaults.unfollowResButtonClass).attr('title',zomato.language.getText('zm-zsocial-js-rem-fav-text')).trigger("mouseout");
						$this.removeClass('fav-no').addClass('fav-yes');
                        $this.hover(function() {
                            $this.addClass("cross-hover");
                        }, function() {
                            $this.removeClass("cross-hover");
                        });
;
						//content = '<a href="#" class="social-button following-social '+defaults.unfollowResButtonClass+'">=</a>';
					}

					//Event listener for follow button
                    $this.undelegate('.'+defaults.followResButtonClass, 'click.frb');
					$this.delegate('.'+defaults.followResButtonClass, 'click.frb', function(e) {
                        e.preventDefault();
						followRestaurant(options.follower_user_id, options.followed_res_id, $this);
					});
	
					//Event listener for unfollow button
                    $this.undelegate('.'+defaults.unfollowResButtonClass, 'click.ufrb');
					$this.delegate('.'+defaults.unfollowResButtonClass, 'click.ufrb', function(e) {
						e.preventDefault();
                        unfollowRestaurant(options.follower_user_id, options.followed_res_id, $this);
					});
                   
                    //Change text from Following to Unfollow
                    /*$this.find('.'+defaults.unfollowResButtonClass).live({
                        mouseenter: function() {if(!$(this).hasClass('while-following')){$(this).html('X');}},
                        mouseleave: function() {if(!$(this).hasClass('while-following')){$(this).html('=');}}
                    });*/
				}

				//$this.html(content);
			});
		},
		loadRestaurantHovercard: function(options) {
			return this.each(function() {
	            var $this = $(this);

	            var settings = $.extend(defaults, options);
	            var content = '';

	            $this.parent().append('<span class="inlineResFollowButtonContainer" style="display: none;"></span>');

            });
		},
		loadUserHovercard: function(options) {
			return this.each(function() {
	            var $this = $(this);

	            var settings = $.extend(defaults, options);
	            var content = '';
			});
		}
	};
	
	var followRestaurant = function(follower_user_id, followed_res_id, obj) {
		$(obj).addClass('load');
        $.ajax({
            url: defaults.followEngineHandler+'?type=follow_restaurant',
            type: 'POST',
            data: {'follower_user_id': follower_user_id, 'followed_res_id': followed_res_id},
            dataType: 'json',
            success: function(response) {
                var r = response;
                if(r.status == 'success') {
                    setTimeout(function(){
                        $(obj).children('a:first').attr('title',zomato.language.getText('zm-zsocial-js-rem-fav-text')).trigger("mouseout"); 
                        $(obj).removeClass('fav-no cross-hover').addClass('fav-yes').removeClass('load');
                        $(obj).hover(function() {
                            $(obj).addClass("cross-hover");
                        }, function() {
                            $(obj).removeClass("cross-hover");
                        });
                        $('.tooltip').tipsy();

                        if(typeof(loadResSocialSharing)=='function') {
                            loadResSocialSharing('fav',$(obj).children('a:first'));
                        }
                        $(obj).find('.'+defaults.followResButtonClass).removeClass(defaults.followResButtonClass).addClass(defaults.unfollowResButtonClass);
                        if(typeof r.already_following == 'undefined') {
                            var current_fav_count = parseInt($('.'+defaults.resFavCount+'[data-res-id='+followed_res_id+']').text());
                            $('.'+defaults.resFavCount+'[data-res-id='+followed_res_id+']').text(current_fav_count+1);
                            //Specifically for Top 25 Restaurants page, to update the tooltip
                            if($('.'+defaults.resFavCount).parent().hasClass('tooltip') == true) {
                                $('.'+defaults.resFavCount).parent().attr('title', zomato.language.getPluralText( ['zm-zsocial-js-favorited-var-time', '' + ( current_fav_count + 1)], ( current_fav_count + 1 ) ));
                            }
                        }
                        
                        $(".res-main-stats-num#fav_count").text(r.favorite_count);
                        var fav_text = (r.favorite_count==1) ? 'favorite' : 'favorites';
                        $(".res-main-stats-text#fav_text").text(fav_text);
                    }, 500);
                }
                else if(r.status == 'login') {
                    $(obj).removeClass('load');
                    //$(obj).find('.'+defaults.followRestaurantButtonClass).removeClass('while-following').addClass('social-button').html('Follow');
                    showDialog('login', zomato.language.getText('zm-zsocial-js-log-in-to-follow'));
                }
                else {
                    //alert('There was a problem, please try again later!');
                }
           }
        });
	}
	
	var unfollowRestaurant = function(follower_user_id, followed_res_id, obj) {
		$(obj).addClass('load').removeClass("cross-hover");
		$.ajax({
           		url: defaults.followEngineHandler+'?type=unfollow_restaurant',
           		type: 'POST',
          		data: {'follower_user_id': follower_user_id, 'followed_res_id': followed_res_id},
                dataType: 'json',
    			success: function(response) {
	    			var r = response;
		    		if(r.status == 'success') {
		    			setTimeout(function(){
                            hideSocialTab($("#share-res-action"));
			    			$(obj).children('a:first').attr('title', zomato.language.getText('zm-zsocial-js-add-fav-text')).trigger("mouseout"); 
			    			$(obj).removeClass('fav-yes cross-hover').addClass('fav-no').removeClass('load'); 
							$('.tooltip').tipsy();
					        $(obj).find('.'+defaults.unfollowResButtonClass).removeClass(defaults.unfollowResButtonClass).addClass(defaults.followResButtonClass);
	                        if(typeof r.not_followed == 'undefined') {
	                            var current_fav_count = parseInt($('.'+defaults.resFavCount+'[data-res-id='+followed_res_id+']').text());
	                            $('.'+defaults.resFavCount+'[data-res-id='+followed_res_id+']').text(current_fav_count-1);
	                            //Specifically for Top 25 Restaurants page, to update the tooltip
	                            if($('.'+defaults.resFavCount).parent().hasClass('tooltip') == true) {
	                            	$('.'+defaults.resFavCount).parent().attr('title', zomato.language.getPluralText( ['zm-zsocial-js-favorited-var-time', '' + ( current_fav_count + 1)], ( current_fav_count + 1 ) ));
	                            }
	                        }
	                        //update favourites asynchronously
	                        $(".res-main-stats-num#fav_count").text(r.favorite_count);
	                        var fav_text = (r.favorite_count==1) ? 'favorite' : 'favorites';
                        	$(".res-main-stats-text#fav_text").text(fav_text);
		    			}, 500);
                    }
                    else if(r.status == 'login') {
                    	$(obj).addClass('load');
                        //showDialog('login', 'Log in to unfollow', 'follow-user-button');
                    }
				    else {
					    //alert('There was a problem, please try again later!');
                    }
			    }
		});
	}


	var followUser = function(follower_user_id, followed_user_id, obj) {
        if(follower_user_id)
        {
        	if($(obj).find('.'+defaults.followUserButtonClass).hasClass('while-following')) {
        		return false;
        	}
            $(obj).find('.'+defaults.followUserButtonClass).addClass('while-following').removeClass('social-button').html('<img src="'+HOST+'images/floading.gif" style="border-radius: 0px;"/>');
        }
		$.ajax({
            	url: defaults.followEngineHandler+'?type=follow_user',
           		type: 'POST',
          		data: {'follower_user_id': follower_user_id, 'followed_user_id': followed_user_id},
                dataType: 'json',
				success: function(response) {
					var r = response;
					if(r.status == 'success') {
                        $(obj).find('.'+defaults.followUserButtonClass).removeClass(defaults.followUserButtonClass).removeClass('while-following').addClass('social-button').addClass('just-followed').removeClass('follow-social').addClass('following-social').addClass(defaults.unfollowUserButtonClass).attr('title',zomato.language.getText('zm-zsocial-js-unfollow-text')).html('=').tipsy();
                        $(obj).data('is-followed','1');
    
                        if(typeof r.already_following == 'undefined') {
                            var current_follower_count = parseInt($('.'+defaults.userFollowerCount+'[data-user-id='+followed_user_id+']:first').text()) + 1;
                            var follower_text = zomato.language.getPluralText( ['zm-zsocial-js-followers-count-var'], current_follower_count );

                            $('.'+defaults.userFollowerCount+'[data-user-id='+followed_user_id+']').text(current_follower_count);
                        	$('.'+defaults.userFollowerText+'[data-user-id='+followed_user_id+']').text(follower_text);
                            if($('.'+defaults.userFollower+'[data-user-id='+followed_user_id+']').hasClass('tooltip'))
                            	$('.'+defaults.userFollower+'[data-user-id='+followed_user_id+']').attr('title', current_follower_count+' '+follower_text).tipsy();
                        }

                        $(document).trigger('USER_FOLLOWED', followed_user_id);

                    }
                    else if(r.status == 'failed') {
                        $(obj).find('.'+defaults.followUserButtonClass).removeClass('while-following').addClass('social-button').html('+');
                    }
                    else if(r.status == 'limit_exceeded') {
                        $(obj).find('.'+defaults.followUserButtonClass).removeClass('while-following').addClass('social-button').html('+');
                        $(obj).find('.'+defaults.followUserButtonClass).trigger('mouseout');
                        Dialog.show({
                            head: 'Limit Exceeded!',
                            url: HOST+'php/follow_limit_exceed.php?limit='+r.limit,
                            height: 550,
                            width: 392
                        });
                    }
                    else if(r.status == 'login') {
                        $(obj).find('.'+defaults.followUserButtonClass).removeClass('while-following').addClass('social-button').html('+');
                        showDialog('login', zomato.language.getText('zm-zsocial-log-in-to-follow'));
                    }
				}
		});
	}
	
	var unfollowUser = function(follower_user_id, followed_user_id, obj) {
		if($(obj).find('.'+defaults.unfollowUserButtonClass).hasClass('while-following')) {
    		return false;
    	}
        $(obj).find('.'+defaults.unfollowUserButtonClass).addClass('while-following').removeClass('social-button').html('<img src="'+HOST+'images/floading.gif" style="border-radius: 0px;"/>');
		$.ajax({
        	url: defaults.followEngineHandler+'?type=unfollow_user',
       		type: 'POST',
      		data: {'follower_user_id': follower_user_id, 'followed_user_id': followed_user_id},
            dataType: 'json',
			success: function(response) {
				var r = response;
				if(r.status == 'success') {	
                    $(obj).find('.'+defaults.unfollowUserButtonClass).removeClass(defaults.unfollowUserButtonClass).removeClass('while-following').addClass('social-button').removeClass('following-social').addClass('follow-social').addClass(defaults.followUserButtonClass).attr('title',zomato.language.getText('zm-zsocial-js-follow-text')).html('+').tipsy();
                    $(obj).data('is-followed','0');

                    if(typeof r.not_followed == 'undefined') {
                        var current_follower_count = parseInt($('.'+defaults.userFollowerCount+'[data-user-id='+followed_user_id+']:first').text()) - 1;
                        var follower_text = zomato.language.getPluralText( ['zm-zsocial-js-followers-count-var'], current_follower_count );

                        $('.'+defaults.userFollowerCount+'[data-user-id='+followed_user_id+']').text(current_follower_count);
                        $('.'+defaults.userFollowerText+'[data-user-id='+followed_user_id+']').text(follower_text);
                        if($('.'+defaults.userFollower+'[data-user-id='+followed_user_id+']').hasClass('tooltip'))
                            $('.'+defaults.userFollower+'[data-user-id='+followed_user_id+']').attr('title', current_follower_count+' '+follower_text).tipsy();
                    }

                }
                else if(r.status == 'login') {
                    //showDialog('login', 'Log in to follow', 'follow-user-button');
                }
				else {
					//alert('There was a problem, please try again later!');
                }
			}
		});
	}




    

    function setLoadingState(obj) {
        $(obj).find('.'+defaults.unfollowUserButtonClass).addClass('while-following').html('<img src="'+HOST+'images/floading.gif" style="border-radius: 0px;"/>');
    }

    function unsetLoadingState(obj) {

    }
	
	$.fn.zSocial = function(method) {
		// Method calling logic
   	 	if ( methods[method] ) {
      			return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    		} else if ( typeof method === 'object' || ! method ) {
      			return methods.init.apply( this, arguments );
    		} else {
      			$.error( 'Method ' +  method + ' does not exist in zSocial' );
    		}
	};
})(jQuery);

/*! nanoScrollerJS - v0.7
* http://jamesflorentino.github.com/nanoScrollerJS/
* Copyright (c) 2013 James Florentino; Licensed MIT */


(function($, window, document) {
  "use strict";

  var BROWSER_IS_IE7, BROWSER_SCROLLBAR_WIDTH, DOMSCROLL, DOWN, DRAG, KEYDOWN, KEYUP, MOUSEDOWN, MOUSEMOVE, MOUSEUP, MOUSEWHEEL, NanoScroll, PANEDOWN, RESIZE, SCROLL, SCROLLBAR, TOUCHMOVE, UP, WHEEL, defaults, getBrowserScrollbarWidth;
  defaults = {
    /**
      a classname for the pane element.
      @property paneClass
      @type String
      @default 'pane'
    */

    paneClass: 'pane',
    /**
      a classname for the slider element.
      @property sliderClass
      @type String
      @default 'slider'
    */

    sliderClass: 'slider',
    /**
      a classname for the content element.
      @property contentClass
      @type String
      @default 'content'
    */

    contentClass: 'content',
    /**
      a setting to enable native scrolling in iOS devices.
      @property iOSNativeScrolling
      @type Boolean
      @default false
    */

    extraPaneHeight: 0,

    iOSNativeScrolling: false,
    /**
      a setting to prevent the rest of the page being
      scrolled when user scrolls the `.content` element.
      @property preventPageScrolling
      @type Boolean
      @default false
    */

    preventPageScrolling: false,
    /**
      a setting to disable binding to the resize event.
      @property disableResize
      @type Boolean
      @default false
    */

    disableResize: false,
    /**
      a setting to make the scrollbar always visible.
      @property alwaysVisible
      @type Boolean
      @default false
    */

    alwaysVisible: false,
    /**
      a default timeout for the `flash()` method.
      @property flashDelay
      @type Number
      @default 1500
    */

    flashDelay: 1500,
    /**
      a minimum height for the `.slider` element.
      @property sliderMinHeight
      @type Number
      @default 20
    */

    sliderMinHeight: 20,
    /**
      a maximum height for the `.slider` element.
      @property sliderMaxHeight
      @type Number
      @default null
    */

    sliderMaxHeight: null
  };
  /**
    @property SCROLLBAR
    @type String
    @static
    @final
    @private
  */

  SCROLLBAR = 'scrollbar';
  /**
    @property SCROLL
    @type String
    @static
    @final
    @private
  */

  SCROLL = 'scroll';
  /**
    @property MOUSEDOWN
    @type String
    @final
    @private
  */

  MOUSEDOWN = 'mousedown';
  /**
    @property MOUSEMOVE
    @type String
    @static
    @final
    @private
  */

  MOUSEMOVE = 'mousemove';
  /**
    @property MOUSEWHEEL
    @type String
    @final
    @private
  */

  MOUSEWHEEL = 'mousewheel';
  /**
    @property MOUSEUP
    @type String
    @static
    @final
    @private
  */

  MOUSEUP = 'mouseup';
  /**
    @property RESIZE
    @type String
    @final
    @private
  */

  RESIZE = 'resize';
  /**
    @property DRAG
    @type String
    @static
    @final
    @private
  */

  DRAG = 'drag';
  /**
    @property UP
    @type String
    @static
    @final
    @private
  */

  UP = 'up';
  /**
    @property PANEDOWN
    @type String
    @static
    @final
    @private
  */

  PANEDOWN = 'panedown';
  /**
    @property DOMSCROLL
    @type String
    @static
    @final
    @private
  */

  DOMSCROLL = 'DOMMouseScroll';
  /**
    @property DOWN
    @type String
    @static
    @final
    @private
  */

  DOWN = 'down';
  /**
    @property WHEEL
    @type String
    @static
    @final
    @private
  */

  WHEEL = 'wheel';
  /**
    @property KEYDOWN
    @type String
    @static
    @final
    @private
  */

  KEYDOWN = 'keydown';
  /**
    @property KEYUP
    @type String
    @static
    @final
    @private
  */

  KEYUP = 'keyup';
  /**
    @property TOUCHMOVE
    @type String
    @static
    @final
    @private
  */

  TOUCHMOVE = 'touchmove';
  /**
    @property BROWSER_IS_IE7
    @type Boolean
    @static
    @final
    @private
  */

  BROWSER_IS_IE7 = window.navigator.appName === 'Microsoft Internet Explorer' && /msie 7./i.test(window.navigator.appVersion) && window.ActiveXObject;
  /**
    @property BROWSER_SCROLLBAR_WIDTH
    @type Number
    @static
    @default null
    @private
  */

  BROWSER_SCROLLBAR_WIDTH = null;
  /**
    Returns browser's native scrollbar width
    @method getBrowserScrollbarWidth
    @return {Number} the scrollbar width in pixels
    @static
    @private
  */

  getBrowserScrollbarWidth = function() {
    var outer, outerStyle, scrollbarWidth;
    outer = document.createElement('div');
    outerStyle = outer.style;
    outerStyle.position = 'absolute';
    outerStyle.width = '100px';
    outerStyle.height = '100px';
    outerStyle.overflow = SCROLL;
    outerStyle.top = '-9999px';
    document.body.appendChild(outer);
    scrollbarWidth = outer.offsetWidth - outer.clientWidth;
    document.body.removeChild(outer);
    return scrollbarWidth;
  };
  /**
    @class NanoScroll
    @param element {HTMLElement|Node} the main element
    @param options {Object} nanoScroller's options
    @constructor
  */

  NanoScroll = (function() {

    function NanoScroll(el, options) {
      this.el = el;
      this.options = options;
      BROWSER_SCROLLBAR_WIDTH || (BROWSER_SCROLLBAR_WIDTH = getBrowserScrollbarWidth());
      this.$el = $(this.el);
      this.doc = $(document);
      this.win = $(window);
      this.$content = this.$el.children("." + options.contentClass);
      // this.$content.attr('tabindex', 0);
      this.content = this.$content[0];
      if (this.options.iOSNativeScrolling && (this.el.style.WebkitOverflowScrolling != null)) {
        this.nativeScrolling();
      } else {
        this.generate();
      }
      this.createEvents();
      this.addEvents();
      this.reset();
    }

    /**
      Prevents the rest of the page being scrolled
      when user scrolls the `.content` element.
      @method preventScrolling
      @param event {Event}
      @param direction {String} Scroll direction (up or down)
      @private
    */


    NanoScroll.prototype.preventScrolling = function(e, direction) {
      if (!this.isActive) {
        return;
      }
      if (e.type === DOMSCROLL) {
        if (direction === DOWN && e.originalEvent.detail > 0 || direction === UP && e.originalEvent.detail < 0) {
          e.preventDefault();
        }
      } else if (e.type === MOUSEWHEEL) {
        if (!e.originalEvent || !e.originalEvent.wheelDelta) {
          return;
        }
        if (direction === DOWN && e.originalEvent.wheelDelta < 0 || direction === UP && e.originalEvent.wheelDelta > 0) {
          e.preventDefault();
        }
      }
    };

    /**
      Enable iOS native scrolling
    */


    NanoScroll.prototype.nativeScrolling = function() {
      this.$content.css({
        WebkitOverflowScrolling: 'touch'
      });
      this.options.iOSNativeScrolling = true;
      this.isActive = true;
    };

    /**
      Updates those nanoScroller properties that
      are related to current scrollbar position.
      @method updateScrollValues
      @private
    */


    NanoScroll.prototype.updateScrollValues = function() {
      var content;
      content = this.content;
      this.maxScrollTop = content.scrollHeight - content.clientHeight;
      this.contentScrollTop = content.scrollTop;
      if (!this.options.iOSNativeScrolling) {
        this.maxSliderTop = this.paneHeight - this.sliderHeight;
        this.sliderTop = this.contentScrollTop * this.maxSliderTop / this.maxScrollTop;
      }
    };

    /**
      Creates event related methods
      @method createEvents
      @private
    */


    NanoScroll.prototype.createEvents = function() {
      var _this = this;
      this.events = {
        down: function(e) {
          _this.isBeingDragged = true;
          _this.offsetY = e.pageY - _this.slider.offset().top;
          _this.pane.addClass('active');
          _this.doc.bind(MOUSEMOVE, _this.events[DRAG]).bind(MOUSEUP, _this.events[UP]);
          return false;
        },
        drag: function(e) {
          _this.sliderY = e.pageY - _this.$el.offset().top - _this.offsetY;
          _this.scroll();
          _this.updateScrollValues();
          if (_this.contentScrollTop >= _this.maxScrollTop) {
            _this.$el.trigger('scrollend');
          } else if (_this.contentScrollTop === 0) {
            _this.$el.trigger('scrolltop');
          }
          return false;
        },
        up: function(e) {
          _this.isBeingDragged = false;
          _this.pane.removeClass('active');
          _this.doc.unbind(MOUSEMOVE, _this.events[DRAG]).unbind(MOUSEUP, _this.events[UP]);
          return false;
        },
        resize: function(e) {
          _this.reset();
        },
        panedown: function(e) {
          _this.sliderY = (e.offsetY || e.originalEvent.layerY) - (_this.sliderHeight * 0.5);
          _this.scroll();
          _this.events.down(e);
          return false;
        },
        scroll: function(e) {
          if (_this.isBeingDragged) {
            return;
          }
          _this.updateScrollValues();
          if (!_this.options.iOSNativeScrolling) {
            _this.sliderY = _this.sliderTop;
            _this.slider.css({
              top: _this.sliderTop
            });
          }
          if (e == null) {
            return;
          }
          if (_this.contentScrollTop >= _this.maxScrollTop) {
            if (_this.options.preventPageScrolling) {
              _this.preventScrolling(e, DOWN);
            }
            _this.$el.trigger('scrollend');
          } else if (_this.contentScrollTop === 0) {
            if (_this.options.preventPageScrolling) {
              _this.preventScrolling(e, UP);
            }
            _this.$el.trigger('scrolltop');
          }
        },
        wheel: function(e) {
          if (e == null) {
            return;
          }
          _this.sliderY += -e.wheelDeltaY || -e.delta;
          _this.scroll();
          return false;
        }
      };
    };

    /**
      Adds event listeners with jQuery.
      @method addEvents
      @private
    */


    NanoScroll.prototype.addEvents = function() {
      var events;
      this.removeEvents();
      events = this.events;
      if (!this.options.disableResize) {
        this.win.bind(RESIZE, events[RESIZE]);
      }
      if (!this.options.iOSNativeScrolling) {
        this.slider.bind(MOUSEDOWN, events[DOWN]);
        this.pane.bind(MOUSEDOWN, events[PANEDOWN]).bind("" + MOUSEWHEEL + " " + DOMSCROLL, events[WHEEL]);
      }
      this.$content.bind("" + SCROLL + " " + MOUSEWHEEL + " " + DOMSCROLL + " " + TOUCHMOVE, events[SCROLL]);
    };

    /**
      Removes event listeners with jQuery.
      @method removeEvents
      @private
    */


    NanoScroll.prototype.removeEvents = function() {
      var events;
      events = this.events;
      this.win.unbind(RESIZE, events[RESIZE]);
      if (!this.options.iOSNativeScrolling) {
        this.slider.unbind();
        this.pane.unbind();
      }
      this.$content.unbind("" + SCROLL + " " + MOUSEWHEEL + " " + DOMSCROLL + " " + TOUCHMOVE, events[SCROLL]);
    };

    /**
      Generates nanoScroller's scrollbar and elements for it.
      @method generate
      @chainable
      @private
    */


    NanoScroll.prototype.generate = function() {
      var contentClass, cssRule, options, paneClass, sliderClass;
      options = this.options;
      paneClass = options.paneClass, sliderClass = options.sliderClass, contentClass = options.contentClass;
      if (!this.$el.find("" + paneClass).length && !this.$el.find("" + sliderClass).length) {
        this.$el.append("<div class=\"" + paneClass + "\"><div class=\"" + sliderClass + "\" /></div>");
      }
      this.slider = this.$el.find("." + sliderClass);
      this.pane = this.$el.find("." + paneClass);
      if (true || BROWSER_SCROLLBAR_WIDTH) { 
        cssRule = this.$el.css('direction') === 'rtl' ? {
          left: -BROWSER_SCROLLBAR_WIDTH
        } : {
          right: -BROWSER_SCROLLBAR_WIDTH
        };
        this.$el.addClass('has-scrollbar');
        $("."+contentClass).children(':first').width(this.$el.width());
      }
      if (cssRule != null) {
        this.$content.css(cssRule);
      }
      return this;
    };

    /**
      @method restore
      @private
    */


    NanoScroll.prototype.restore = function() {
      this.stopped = false;
      this.pane.show();
      this.addEvents();
    };

    /**
      Resets nanoScroller's scrollbar.
      @method reset
      @chainable
      @example
          $(".nano").nanoScroller();
    */
    NanoScroll.prototype.reset = function() {
      var content, contentHeight, contentStyle, contentStyleOverflowY, paneBottom, paneHeight, paneOuterHeight, paneTop, sliderHeight;
      if (this.options.iOSNativeScrolling) {
        this.contentHeight = this.content.scrollHeight;
        return;
      }
      if (!this.$el.find("." + this.options.paneClass).length) {
        this.generate().stop();
      }
      if (this.stopped) {
        this.restore();
      }
      content = this.content;
      contentStyle = content.style;
      contentStyleOverflowY = contentStyle.overflowY;
      if (BROWSER_IS_IE7) {
        this.$content.css({
          height: this.$content.height()
        });
      }
      contentHeight = content.scrollHeight + BROWSER_SCROLLBAR_WIDTH;
      paneHeight = this.pane.parent(".has-scrollbar").length ? this.pane.parent(".has-scrollbar").outerHeight() - 4 : this.pane.outerHeight();
      paneHeight = paneHeight + this.options.extraPaneHeight;
      paneTop = parseInt(this.pane.css('top'), 10);
      paneBottom = parseInt(this.pane.css('bottom'), 10);
      paneOuterHeight = paneHeight + paneTop + paneBottom;
      sliderHeight = Math.round(paneOuterHeight / contentHeight * paneOuterHeight);
      if (sliderHeight < this.options.sliderMinHeight) {
        sliderHeight = this.options.sliderMinHeight;
      } else if ((this.options.sliderMaxHeight != null) && sliderHeight > this.options.sliderMaxHeight) {
        sliderHeight = this.options.sliderMaxHeight;
      }
      if (contentStyleOverflowY === SCROLL && contentStyle.overflowX !== SCROLL) {
        sliderHeight += BROWSER_SCROLLBAR_WIDTH;
      }
      this.maxSliderTop = paneOuterHeight - sliderHeight;
      this.contentHeight = contentHeight;
      this.paneHeight = paneHeight;
      this.paneOuterHeight = paneOuterHeight;
      this.sliderHeight = sliderHeight;
      this.slider.height(sliderHeight);
      this.events.scroll();
      this.pane.show();
      this.isActive = true;
      if ((content.scrollHeight === content.clientHeight) || (this.pane.outerHeight(true) >= content.scrollHeight && contentStyleOverflowY !== SCROLL)) {
        this.pane.hide();
        this.isActive = false;
      } else if (this.el.clientHeight === content.scrollHeight && contentStyleOverflowY === SCROLL) {
        this.slider.hide();
      } else {
        this.slider.show();
      }
      this.pane.css({
        opacity: (this.options.alwaysVisible ? 1 : ''),
        visibility: (this.options.alwaysVisible ? 'visible' : '')
      });
      return this;
    };

    /**
      @method scroll
      @private
      @example
          $(".nano").nanoScroller({ scroll: 'top' });
    */


    NanoScroll.prototype.scroll = function() {
      if (!this.isActive) {
        return;
      }
      this.sliderY = Math.max(0, this.sliderY);
      this.sliderY = Math.min(this.maxSliderTop, this.sliderY);
      this.$content.scrollTop((this.paneHeight - this.contentHeight + BROWSER_SCROLLBAR_WIDTH) * this.sliderY / this.maxSliderTop * -1);
      if (!this.options.iOSNativeScrolling) {
        this.slider.css({
          top: this.sliderY
        });
      }
      return this;
    };

    /**
      Scroll at the bottom with an offset value
      @method scrollBottom
      @param offsetY {Number}
      @chainable
      @example
          $(".nano").nanoScroller({ scrollBottom: value });
    */


    NanoScroll.prototype.scrollBottom = function(offsetY) {
      if (!this.isActive) {
        return;
      }
      this.reset();
      this.$content.scrollTop(this.contentHeight - this.$content.height() - offsetY).trigger(MOUSEWHEEL);
      return this;
    };

    /**
      Scroll at the top with an offset value
      @method scrollTop
      @param offsetY {Number}
      @chainable
      @example
          $(".nano").nanoScroller({ scrollTop: value });
    */


    NanoScroll.prototype.scrollTop = function(offsetY) {
      if (!this.isActive) {
        return;
      }
      this.reset();
      this.$content.scrollTop(+offsetY).trigger(MOUSEWHEEL);
      return this;
    };

    /**
      Scroll to an element
      @method scrollTo
      @param node {Node} A node to scroll to.
      @chainable
      @example
          $(".nano").nanoScroller({ scrollTo: $('#a_node') });
    */


    NanoScroll.prototype.scrollTo = function(node) {
      if (!this.isActive) {
        return;
      }
      this.reset();
      this.scrollTop($(node).get(0).offsetTop);
      return this;
    };

    /**
      To stop the operation.
      This option will tell the plugin to disable all event bindings and hide the gadget scrollbar from the UI.
      @method stop
      @chainable
      @example
          $(".nano").nanoScroller({ stop: true });
    */


    NanoScroll.prototype.stop = function() {
      this.stopped = true;
      this.removeEvents();
      this.pane.hide();
      return this;
    };

    /**
      To flash the scrollbar gadget for an amount of time defined in plugin settings (defaults to 1,5s).
      Useful if you want to show the user (e.g. on pageload) that there is more content waiting for him.
      @method flash
      @chainable
      @example
          $(".nano").nanoScroller({ flash: true });
    */


    NanoScroll.prototype.flash = function() {
      var _this = this;
      if (!this.isActive) {
        return;
      }
      this.reset();
      this.pane.addClass('flashed');
      setTimeout(function() {
        _this.pane.removeClass('flashed');
      }, this.options.flashDelay);
      return this;
    };

    return NanoScroll;

  })();
  $.fn.nanoScroller = function(settings) {
    return this.each(function() {
      var options, scrollbar;
      if (!(scrollbar = this.nanoscroller)) {
        options = $.extend({}, defaults, settings);
        this.nanoscroller = scrollbar = new NanoScroll(this, options);
      }
      if (settings && typeof settings === "object") {
        $.extend(scrollbar.options, settings);
        if (settings.scrollBottom) {
          return scrollbar.scrollBottom(settings.scrollBottom);
        }
        if (settings.scrollTop) {
          return scrollbar.scrollTop(settings.scrollTop);
        }
        if (settings.scrollTo) {
          return scrollbar.scrollTo(settings.scrollTo);
        }
        if (settings.scroll === 'bottom') {
          return scrollbar.scrollBottom(0);
        }
        if (settings.scroll === 'top') {
          return scrollbar.scrollTop(0);
        }
        if (settings.scroll && settings.scroll instanceof $) {
          return scrollbar.scrollTo(settings.scroll);
        }
        if (settings.stop) {
          return scrollbar.stop();
        }
        if (settings.flash) {
          return scrollbar.flash();
        }
      }
      return scrollbar.reset();
    });
  };
})(jQuery, window, document);

/*
 * Lazy Load - jQuery plugin for lazy loading images
 *
 * Copyright (c) 2007-2012 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://www.appelsiini.net/projects/lazyload
 *
 * Version:  1.7.2
 *
 */
(function(a,b){$window=a(b),a.fn.lazyload=function(c){function f(){var b=0;d.each(function(){var c=a(this);if(e.skip_invisible&&!c.is(":visible"))return;if(!a.abovethetop(this,e)&&!a.leftofbegin(this,e))if(!a.belowthefold(this,e)&&!a.rightoffold(this,e))c.trigger("appear");else if(++b>e.failure_limit)return!1})}var d=this,e={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return c&&(undefined!==c.failurelimit&&(c.failure_limit=c.failurelimit,delete c.failurelimit),undefined!==c.effectspeed&&(c.effect_speed=c.effectspeed,delete c.effectspeed),a.extend(e,c)),$container=e.container===undefined||e.container===b?$window:a(e.container),0===e.event.indexOf("scroll")&&$container.bind(e.event,function(a){return f()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(e.appear){var f=d.length;e.appear.call(b,f,e)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(e.data_attribute))[e.effect](e.effect_speed),b.loaded=!0;var f=a.grep(d,function(a){return!a.loaded});d=a(f);if(e.load){var g=d.length;e.load.call(b,g,e)}}).attr("src",c.data(e.data_attribute))}}),0!==e.event.indexOf("scroll")&&c.bind(e.event,function(a){b.loaded||c.trigger("appear")})}),$window.bind("resize",function(a){f()}),f(),this},a.belowthefold=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.height()+$window.scrollTop():e=$container.offset().top+$container.height(),e<=a(c).offset().top-d.threshold},a.rightoffold=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.width()+$window.scrollLeft():e=$container.offset().left+$container.width(),e<=a(c).offset().left-d.threshold},a.abovethetop=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.scrollTop():e=$container.offset().top,e>=a(c).offset().top+d.threshold+a(c).height()},a.leftofbegin=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.scrollLeft():e=$container.offset().left,e>=a(c).offset().left+d.threshold+a(c).width()},a.inviewport=function(b,c){return!a.rightofscreen(b,c)&&!a.leftofscreen(b,c)&&!a.belowthefold(b,c)&&!a.abovethetop(b,c)},a.extend(a.expr[":"],{"below-the-fold":function(c){return a.belowthefold(c,{threshold:0,container:b})},"above-the-top":function(c){return!a.belowthefold(c,{threshold:0,container:b})},"right-of-screen":function(c){return a.rightoffold(c,{threshold:0,container:b})},"left-of-screen":function(c){return!a.rightoffold(c,{threshold:0,container:b})},"in-viewport":function(c){return!a.inviewport(c,{threshold:0,container:b})},"above-the-fold":function(c){return!a.belowthefold(c,{threshold:0,container:b})},"right-of-fold":function(c){return a.rightoffold(c,{threshold:0,container:b})},"left-of-fold":function(c){return!a.rightoffold(c,{threshold:0,container:b})}})})(jQuery,window)

// Global zomato namespace. Add all objects under this to avoid conflicts
var zomato = zomato || {};
zomato.notifications = zomato.notifications || {};
zomato.leftColumnWidth = 724;

var follow_data = follow_data || {};
var follow_data_hover = follow_data_hover || {};

// define console if not defined
var console = console || {
    log: function(m) {},
    error: function(m) {}
};

// Add a stringWrap function to String objects
String.prototype.stringWrap = function(len) {
    var str = this.toString();

    if(len < str.length)
        return str.substring(0, len) + '...';
    else
        return str;
};

String.prototype.urlify = function() {
    var str = this.toString();

    var allowed_chars = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',

        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
        'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
        'u', 'v', 'w', 'x', 'y', 'z',

        'ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'i̇',


        'à', 'á', 'â', 'ã', 'ä', 'å', 'ă', 'æ', 'è', 'é',
        'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó',
        'ô', 'õ', 'ő', 'ø', 'ș', 'ț', 'ù', 'ú', 'û',
        'ű', 'ý', 'þ', 'ÿ',


        '°'];

    str = str.toLowerCase();
    str = str.replace("'", "");

    var regex = new RegExp("[^"+allowed_chars.join("")+"\-]", 'g');
    str = str.replace(regex, '-');
    str = str.replace(/(\-)+/g, '-');
    str = str.replace(/^-+/g, '');
    str = str.replace(/-+$/g, '');

    return str;
};

// Add compatibility for trim
if(!String.prototype.trim) {
    String.prototype.trim = function () {
        return this.replace(/^\s+|\s+$/g,'');
    };
}

var hc_data = hc_data || {restaurant: {}, user: {}};

// resize image img to fit into xmax, ymax
zomato.resizeImage = function(img, xmax, ymax) {
    var img = $(img);
    var imgx = img.width();
    var imgy = img.height();
    if(imgx > xmax && (xmax/imgx) * imgy < ymax)
        img.css("width", xmax).css("height", (xmax/imgx) * imgy);
    else if(imgy > ymax)
        img.css("width", (ymax/imgy) * imgx).css("height", ymax);
};

function initiateLaziness() {
    if(typeof $("img.lazy").lazyload == 'function') {
        $("img.lazy").lazyload({
            threshold : 200,
            effect: 'fadeIn',
            effectspeed: 250
        }).removeClass('lazy');

        //hack to get the first images to load anyway
        setTimeout(function() {
            $(document).trigger('scroll');
        }, 20);
    }
}

function addSocialButtons() {
    zomato.social = zomato.social || {};
    for(var i in zomato.social) {
        switch(i) {
            case 'facebook.like':
                for(var j in zomato.social[i]) {
                    if(!$("#"+zomato.social[i][j]['id']).data('isset')) {
                        $("#"+zomato.social[i][j]['id']).append('<div class="fb-like" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>');
                        $("#"+zomato.social[i][j]['id']+" div.fb-like").attr(zomato.social[i][j]['params']);
                        $("#"+zomato.social[i][j]['id']).data('isset', true);
                    }
                }
            break;

            case 'twitter.follow':
                for(var j in zomato.social[i]) {
                    if(!$("#"+zomato.social[i][j]['id']).data('isset')) {
                        $("#"+zomato.social[i][j]['id']).append('<a href="https://twitter.com/zomato" class="twitter-follow-button" data-show-count="false">'+zomato.language.getText( 'zm-common-js-follow-at-zomato' ) +'</a>');
                        $("#"+zomato.social[i][j]['id']+" a").attr(zomato.social[i][j]['params']);
                        $("#"+zomato.social[i][j]['id']).data('isset', true);
                    }
                }
            break;

            case 'twitter.tweet':
                for(var j in zomato.social[i]) {
                    if(!$("#"+zomato.social[i][j]['id']).data('isset')) {
                        $("#"+zomato.social[i][j]['id']).append('<a class="twitter-share-button" href="http://twitter.com/share" data-url="" data-via="" data-count="horizontal" data-text=""></a>');
                        $("#"+zomato.social[i][j]['id']+" a").attr(zomato.social[i][j]['params']);
                        $("#"+zomato.social[i][j]['id']).data('isset', true);
                    }
                }
            break;

            case 'google.plusone':
                for(var j in zomato.social[i]) {
                    if(!$("#"+zomato.social[i][j]['id']).data('isset')) {
                        $("#"+zomato.social[i][j]['id']).append('<div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://www.zomato.com"></div>');
                        $("#"+zomato.social[i][j]['id']+" div.g-plusone").attr(zomato.social[i][j]['params']);
                        $("#"+zomato.social[i][j]['id']).data('isset', true);
                    }
                }
            break;

        }
    }

    // Load Twitter JS only when needed
    if(typeof zomato.social['twitter.follow'] != "undefined" || typeof zomato.social['twitter.tweet'] != "undefined") {
        if(typeof twttr == 'undefined')
            $.getScript("http://platform.twitter.com/widgets.js");
        else
            twttr.widgets.load();
    }

    // Load Google plusone JS only when a plusone button was added
    if(typeof zomato.social['google.plusone'] != "undefined") {
        if(typeof gapi == 'undefined' || typeof gapi.plusone == 'undefined')
            $.getScript("https://apis.google.com/js/plusone.js");
        else
            gapi.plusone.go();
    }

    if(typeof zomato.social['facebook.like'] != "undefined") {
        try {
            FB.XFBML.parse();
        } catch (e) {}
    }

}

// Add live suggest for search to input with id = 'id'
zomato.addLiveSuggest = function(id, url, data, css_class) {
    css_class = css_class || '';
    data = data || {};
    var selectCallback = data.onselect || function(elem, inp){
        inp.val(elem.text());
    };
    var clickCallback = data.onclick || function(){};

    // The Live Suggest Container
    var lsc = $("#lsc_"+id);

    // The input textbox to which live suggest is attached
    var inp = $("#"+id);

    // Cache for storing previous searches to prevent requests when user presses
    // backspace etc
    zomato['suggest_'+id] = [];

    // if input textbox is not present return silently
    if(!inp.length)
        return;

    inp.blur(function() {
/*        $(document).one('mouseup', function(){
            lsc.hide();
        });
*/
        setTimeout(function(){
            lsc.hide();
        }, 500);

    });

    // create dropdown if does not exist
    if(typeof data.dropdownId != "undefined") {
        lsc = $("#"+data.dropdownId);
    } else if(lsc.length == 0) {
        $(document.body).append('<div class="liveSuggestContainer '+ css_class + '" id="liveSuggestContainer_'+id+'"></div>');
        lsc = $("#liveSuggestContainer_"+id);
        if(css_class=='tags_input'){
            lsc.width(inp.outerWidth() - 2)
            .css("top", inp.offset().top + inp.outerHeight())
            .css("left", inp.offset().left)
            .css("background-color", "#ffffff")
            .css("position", "absolute")
            .hide();
        }else{
            lsc.width(inp.outerWidth() - 2)
            .css("top", inp.offset().top + inp.outerHeight())
            .css("left", inp.offset().left)
            .hide();
        }

    }

    $(lsc).on('click', '.item', function() {
        clickCallback(this, inp);
    });

    inp.keyup(function(e){
        if(e.keyCode == 38) { // Up arrow
            var current = lsc.children(".selected:first");
            var prev = current.prev(".item");

            lsc.children(".selected").removeClass("selected");
            if(prev.length) {
                prev.addClass("selected");
                selectCallback(prev, inp);
            } else {
                var last = lsc.children(".item:last");
                last.addClass("selected");
                selectCallback(last, inp);
            }

            return false;
        } else if(e.keyCode == 40) { //Down arrow
            var current = lsc.children(".selected:first");
            var next = current.next(".item");

            lsc.children(".selected").removeClass("selected");
            if(next.length) {
                next.addClass("selected");
                selectCallback(next, inp);
            } else {
                var first = lsc.children(".item:first");
                first.addClass("selected");
                selectCallback(first, inp);
            }

            return false;
        } else if(e.keyCode == 13) { // Enter
            var selected = lsc.children(".selected:first");
            if(selected.length) {
                selected.click();
                clickCallback(selected, inp);
            }

            return false;
        } else if (e.keyCode == 37 || e.keyCode == 39)
            return;

        var query = inp.val().replace(/^\s+.*\s+$/, '');
        query = encodeURIComponent(query);
        if(query.length >= 2) {
             if(typeof data.dropdownId == "undefined") {
                lsc.width(inp.outerWidth() - 2)
                    .css("top", inp.offset().top + inp.outerHeight())
                    .css("left", inp.offset().left);
             }

            if(typeof(zomato['suggest_'+id][query]) == 'undefined') {
                $.ajax({
                    url: url,
                    type: "GET",
                    data: ({q:query}),
                    success: function(response) {
                        var content = response;

                        if(content != '')
                        {
                            zomato['suggest_'+id][query] = content;
                            lsc.html(content).show();

                            lsc.children(".item").mouseenter(function(){
                                lsc.children(".selected").removeClass("selected");
                                $(this).addClass("selected");
                            });

                        }
                        else
                            lsc.html('').hide();
                    }
                });
            } else {
                lsc.html(zomato['suggest_'+id][query]).show();

                lsc.children(".item").mouseenter(function(){
                    lsc.children(".selected").removeClass("selected");
                    $(this).addClass("selected");
                });
            }


        }
        else
            lsc.html('').hide();
    });
};


/**
 * initialize hover banner
 */
function initHover() {
    var banner = $('#hover-zban-fixed');
    if(!banner.length)
        return;
    var h = banner.height();

    var wid = $(window).width();
    var hgt = $(window).height();
    var hpos = $("#mainframe").get(0).offsetLeft + 1000;
    var vpos = hgt - h;

    var vmin = $(".zbans").get(0).offsetTop;
    var vmax = $("footer").get(0).offsetTop - hgt - 10;
    var ftop = $("footer").get(0).offsetTop;

    if(vpos < vmin)
        vpos = vmin;

    if(wid > 1200 && hgt > 500) {

        $('body').append(banner.remove());
        banner.css({left: hpos, top: vpos}).show();

        if($.browser.msie && parseInt(jQuery.browser.version) <= 6) {
            banner.css('position', 'absolute');
            setInterval(function() {
                var btop = vpos+$(document).scrollTop();
                if(btop < ftop -h)
                    banner.css('top', btop);
            }, 50);
        } else {
            banner.css('position', 'fixed');
            $(window).scroll(function() {
                var winscroll = $(window).scrollTop();

                if(winscroll + hgt < h + vmin)
                    banner.css({position:'absolute', top: vmin});
                else if(winscroll >= vmax) {
                    banner.css({position:'absolute',top: ftop - h});
                    // console.log(ftop-h);
                }
                else
                    banner.css({position:'fixed', top: hgt - h});
            });
        }
    }
    banner.css('z-index', 50);
}



function checkCookie(name)  {
    if(document.cookie.length > 0)  {

        var start=document.cookie.indexOf(name+"=");
        if (start!=-1)    {
            start = start + name.length+1;
            var end = document.cookie.indexOf(";", start);
            if (end == -1) {
                end = document.cookie.length;
            }
            return unescape(document.cookie.substring(start, end));
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function setCookie(name, value, nDays)  {
    var nDays = nDays || (365*5);
    var today = new Date();
    var expire = new Date();
    expire.setTime(today.getTime() + 3600000*24*nDays);
    document.cookie = name+"="+escape(value)
                + ";path=/;domain="+COOKIE_DOMAIN+";expires="+expire.toGMTString();
}

function getCookie(CookieName) {
    var CookieVal = null;
    if(document.cookie) {
        var arr = document.cookie.split((escape(CookieName) + '='));
        if(arr.length >= 2) {
            var arr2 = arr[1].split(';');
            CookieVal  = unescape(arr2[0]); //unescape() : Decodes the String
        }
    }

    return CookieVal;
}

function displayChromeMessage() {
    var isCookieSet = checkCookie('is_chrome_dismissed');

    if(isCookieSet == false)    {
        $("#chrome-appstore-message").prependTo($("body")).slideDown();

        $("#chrome-appstore-link").click(function() {
                $("#chrome-appstore-message").slideUp();
                setCookie('is_chrome_dismissed', 1);
        });

        $("#chrome-appstore-dismiss").click(function(event) {
                event.preventDefault();

                $("#chrome-appstore-message").slideUp();
                setCookie('is_chrome_dismissed', 1);
            });
    }
}

function displayIEMessage() {
    var isCookieSet = checkCookie('is_ie_dismissed');

    if(isCookieSet == false)    {
        $("#ie-pin-message").prependTo($("body")).slideDown();

        $("#pinning-link").click(function() {
                $("#ie-pin-message").slideUp();
                setCookie('is_ie_dismissed', 1);
        });

        $("#pinning-dismiss").click(function(event) {
                event.preventDefault();

                $("#ie-pin-message").slideUp();
                setCookie('is_ie_dismissed', 1);
            });
    }
}


//Reload ZS Follow buttons
function reloadZSFollowButtons(r) {
    $('.zs-follow-btn-container').each(function(){
        //console.log($.inArray($(this).data('user-id'), r.users), $(this).data('user-id'), typeof $(this).data('user-id'));
        if($.inArray($(this).data('res-id')+'', r.restaurants) != -1 || $.inArray($(this).data('user-id')+'', r.users) != -1) {
            $(this).data('is-followed', 1).attr('data-is-followed', 1);
        }
    });

    displayZSFollowButtons();

    //check for triggered follow button
    if(typeof follow_data.container_obj != 'undefined') {
        if(typeof follow_data.res_id != 'undefined') {
            var is_triggered_followed = $(follow_data.container_obj).data('is-followed');
            var trigger_res_id = follow_data.res_id;
            if(is_triggered_followed == 0) {
                $('.zs-follow-btn-container[data-res-id='+trigger_res_id+'] a').trigger('click');
            }
            follow_data = {};
        }
        else if(typeof follow_data.user_id != 'undefined') {
            var is_triggered_followed = $(follow_data.container_obj).data('is-followed');
            var trigger_user_id = follow_data.user_id;
            if(is_triggered_followed == 0)
                $('.zs-follow-btn-container[data-user-id='+trigger_user_id+'] a').trigger('click');
            follow_data = {};
        }
    }
}


//Display ZS Follow buttons
function displayZSFollowButtons() {
        $('.zs-follow-btn-container').each(function(){
            var is_followed = $(this).data('is-followed');
            var entity_type = $(this).data('entity-type');
            if(entity_type == 'RESTAURANT') {
                var res_id = $(this).data('res-id');
                $(this).zSocial('loadFollowRestaurantButton', {'is_followed': is_followed, 'follower_user_id': (USER_ID == '' || typeof USER_ID == 'undefined' ? 0 : USER_ID), 'followed_res_id': res_id});
            }
            else if(entity_type == 'USER_FOLLOW_BACK'){
                $(this).show();
            }
            else {
                var user_id = $(this).data('user-id');
                $(this).zSocial('loadFollowUserButton', {'is_followed': is_followed, 'follower_user_id': (USER_ID == '' || typeof USER_ID == 'undefined' ? 0 : USER_ID), 'followed_user_id': user_id});
            }
        });
}


//Social-Follow starts here


//Reload ZS Follow hover buttons
function reloadZSFollowHoverButtons(r) {
    $('.zs-follow-hover-btn-container').each(function() {
        //Reset is_followed for all isntances
        if($.inArray($(this).data('res-id'), r.restaurants) != -1 || $.inArray($(this).data('user-id'), r.users) != -1) {
            /*console.log('h', $(this).data('res-id'));*/
            $(this).data('is-followed', 1).attr('data-is-followed', 1);
        }
    });

    displayZSFollowHoverButtons('.resZS');

    //check for triggered follow button
    if(typeof follow_data_hover.container_obj != 'undefined') {
        if(typeof follow_data_hover.res_id != 'undefined') {
            var is_triggered_followed = $(follow_data_hover.container_obj).data('is-followed');
            var trigger_res_id = follow_data_hover.res_id;
            if(is_triggered_followed == 0) {
                $('.zs-follow-hover-btn-container[data-res-id='+trigger_res_id+'] a').trigger('click');
            }
            follow_data_hover = {};
        }
        else if(typeof follow_data_hover.user_id != 'undefined') {
            var is_triggered_followed = $(follow_data_hover.container_obj).data('is-followed');
            var trigger_user_id = follow_data_hover.user_id;
            if(is_triggered_followed == 0) {
                $('.zs-follow-hover-btn-container[data-user-id='+trigger_user_id+'] a').trigger('click');
            }
            follow_data_hover = {};
        }
    }
}

//Display ZS Follow hover buttons
function displayZSFollowHoverButtons(hoverBlock){
        $('.zs-follow-hover-btn-container').each(function(){
            var is_followed = $(this).data('is-followed');
            var entity_type = $(this).data('entity-type');
            if(entity_type == 'RESTAURANT') {
                var res_id = $(this).data('res-id');
                $(this).zSocial('loadFollowRestaurantButton', {'is_followed': is_followed, 'follower_user_id': (USER_ID == '' || typeof USER_ID == 'undefined' ? 0 : USER_ID), 'followed_res_id': res_id});
            }
            else {
                var user_id = $(this).data('user-id');
                $(this).zSocial('loadFollowUserButton', {'is_followed': is_followed, 'follower_user_id': (USER_ID == '' || typeof USER_ID == 'undefined' ? 0 : USER_ID), 'followed_user_id': user_id});
            }
        });

        //For showing/hiding
        $(hoverBlock).hover(
            function(){
                var th = $(this);
                th.hide();
                // if(th.find('.hid-res-name').length>0) {
                //     var elem = th.find('.hid-res-name');
                //     var hid_name = elem.data('hid_res_name');
                //     elem.data('hid_res_name', elem.text());
                //     elem.text(hid_name);
                // }
                $(this).find('.zs-follow-hover-btn-container').show();
                th.show();
            },
            function(){
                var th = $(this);
                th.hide();
                // if(th.find('.hid-res-name').length>0) {
                //     var elem = th.find('.hid-res-name');
                //     var hid_name = elem.data('hid_res_name');
                //     elem.data('hid_res_name', elem.text());
                //     elem.text(hid_name);
                // }
                th.find('.zs-follow-hover-btn-container').hide();
                th.show();
            }
        );
}



$(window).load(function() {
    // IE placeholder fix
    //placeholderFixByClass();
    // Load social buttons on the page after all content is ready
    addSocialButtons();
    updateTitleNotifyCount();
    window.setInterval(zomato.friendlyTime, 60000);
    try {
        // nicEditors.allTextAreas('review-form-textarea');
    } catch(e) { }
});

function postTwitterAuth(status,already_connected) {
    var do_post_param = review_param = '';
    if ( typeof window.only_twitter_update != 'undefined' && window.only_twitter_update === true ) {
        do_post_param = '&postTweet=yes';
     //   delete window.only_twitter_update;
    }

    if ( typeof window.twitter_review_id != 'undefined' ) {
        review_param = '&review_id=' + window.twitter_review_id;
       // delete window.twitter_review_id;
    }

    url = HOST + 'php/post_twitter_authenticate.php?status=' + status+ do_post_param + review_param;
    if(status == 'success') {
        if(already_connected==0) {
            Dialog.show({
                head: 'Twitter Permissions',
                url: url
            });
        }
        else{
            Dialog.show({
                 head: 'Twitter Connect Failure',
                 html: '<div class="grid_6 column" style="font-size: 14px; line-height: 20px;">This twitter account is already linked with your other user account on zomato.<br/><br/>If you wish to link twitter with this account, first disconnect it from your other zomato account.</div>'
            });
        }
    }
    else{
        Dialog.show({
            head: 'Twitter Connect',
            html: '<div class="grid_6 column">Some problem occured. Please try again later.</div>'
        });
        setTimeout(function(){Dialog.close();},3000);
    }
}

$('#admin_privilege_toggle').click(function(event){
    event.preventDefault();
    if($(this).attr('value') == 0)
        {
            setCookie('ap', 0);
            location.reload();
        }
        else
            {
                setCookie('ap', 1);
                location.reload();
            }
});

$('#z9_toggle').click(function(event){
    event.preventDefault();
    if($(this).attr('value') == 0)
        {
            setCookie('force_old_look', 0, -1);
            $.ajax({
                url: HOST+"updateZomato9.php",
                data: {value: 0},
                complete: function() {
                    location.reload();
                }
            });
        } else {
            setCookie('force_old_look', 1, 3);
            $.ajax({
                url: HOST+"updateZomato9.php",
                data: {value: 1},
                complete: function() {
                    location.reload();
                }
            });
        }
});



function bindTweetBoxEvents() {
    $('#tw-authorize-popup textarea').on('input propertychange', function( event ) {
        var text = $(this).val();
        var str_len = text.length;
        //var num = ( 140 - str_len > 0 ) ? ( 140 - str_len ) : 0;
        var num = 140 - str_len;
        var static_url = $(this).data('static-url');
        var limit=140;
        if ( text.search(static_url) !== -1 ) {
           var static_len = 23;
           limit = 117;
           text = text.replace(static_url,'');
           str_len = text.length;
           //num = ( 117 - str_len > 0 ) ? 117 - str_len : 0;
           num = 117 - str_len;
        }
        if ( str_len > limit ) {
            $( '#tweet-post-review' ).addClass('disable');
        } else {
            $( '#tweet-post-review' ).removeClass('disable');
        }
        $('#tweet-remain-chars').text( num );
    });
    $('#block-twitter-popup').click(function(event) {
        event.preventDefault();
        $.ajax({
            url: HOST + 'php/twitter_preferences.php?type=block_popup',
            type: 'GET',
            dataType: 'json',
            success: function( data ) {
                Dialog.close();
            }
        });
    });

    $('#tweet-box-cancel').click(function(event){
        Dialog.close();
    });

    $('#tweet-post-review').click(function(event){
        event.preventDefault();
        if ( $(this).hasClass('disable') ) return ;
        var action = $(this).data('action');
        if(action=='tweet') {
            var message = $('#tw-authorize-popup textarea').val();
            $(this).replaceWith('<div class="right ta-center" style="line-height:30px;width:63px;"><img src="'+HOST+'images/floading.gif"/></div>');
            $('#tweet-box-cancel').hide();
            $.ajax({
                url: HOST + 'php/post_twitter_authenticate.php?status=success&type=posttweet',
                type: 'POST',
                dataType: 'json',
                data:{message:message},
                success: function( data ) {
                    $('#tw-authorize-popup').html('<p>'+data.message+'</p>');
                    setTimeout(function(){
                        Dialog.close();
                    },3000);
                },
                error: function() {}
            });
        } else if(action=='connect') {
            window.only_twitter_update = true;
            window.twitter_review_id = $(this).data('review-id');
            var twitter_oauth_url = HOST + 'php/twitter_router.php';
            var newWindow = window.open(twitter_oauth_url, 'name', 'height=400,width=600,menubar=0');
            if (window.focus) {
                newWindow.focus();
            }
        }

    });
}

function twitterPreferenceSelected(){
    $('#tw-pref-sel').click( function(event) {
        var val = $('.twitterPref:checked').val();
        // var message_param = $(this).data('tw-message');
        var that = $(this);
        $.ajax({
            url: HOST + 'php/twitter_preferences?type=update_preference&value=' + val,
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                if ( data == 'error' ) {
                    //show error message
                } else if ( typeof window.only_twitter_update != 'undefined' && window.only_twitter_update === true ) {
                    //delete window.only_twitter_update;
                    Dialog.close();
                } else {
                    Dialog.close();
                    if($(that).data('page-reload'))
                        document.location.reload();
                }
            }
        });
    });
}

function launchPersonalisationHelper() {
    $('.onoffswitch').css('z-index', '10000').attr('disabled', 'disabled');
    var html = "<div id='personalisation-slideshow' style='width: 800px; height: 500px;'>";
    html += "<img src='"+HOST+"images/personalised_rating_result1.png'  />";
    html += "<img src='"+HOST+"images/personalised_rating_result1.png' />";
    html += "<img src='"+HOST+"images/personalised_rating_result1.png' />";
    html += "</div>";
    html += "<div id='nav' class='ta-center slideshow-nav' style='font-size:22px;'></div>";
    html += "<div class='mr10'><span class='mbot0 btn btn-red personalised-rating-gotit right'>Got it!</span></div>";

    Dialog.show({
        html: html,
        head: 'Personalised Ratings',
        onClose: function() {
            $('.onoffswitch').css('z-index', '1').removeAttr('disabled');
            $('.personalised-rating-gotit').trigger('click');
        }
    });

    $('.personalised-rating-gotit').on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: HOST + 'php/personalised_rating_understood.php',
            type: 'POST',
            dataType: 'JSON',
            success: function(response) {
                if(response.status == 'failed')
                    console.error(response.message);
            }
        });
        Dialog.close();
    })

    $('#personalisation-slideshow').cycle({
        fx:     'scrollHorz',
        speed:  400,
        timeout: 0,
        cleartypeNoBg: true,
        pager:  '#nav',
        pagerAnchorBuilder: function paginate(idx, el) {
            return '<a class="service' + idx + '" style="text-decoration: none;" href="#" >&bull;</a>';
        }
    });

    // cookies handler
}

$(document).ready(function() {
    /*if(typeof personalisation_info_box != "undefined" && personalisation_info_box) {
        launchPersonalisationHelper();
    }*/

    $('.brunches_read_more').on('click',function(event){
        event.preventDefault();
        $(this).parents('.brunch_text_area').find('.brunch_half_text').hide();
        $(this).parents('.brunch_text_area').find('.brunch_full_text').show();
    });
    $('.brunches_collapse').on('click',function(event){
        event.preventDefault();
        $(this).parents('.brunch_text_area').find('.brunch_full_text').hide();
        $(this).parents('.brunch_text_area').find('.brunch_half_text').show();
    });


    setRetinaDisplayCookie();
    zomato.reviews.bindEvents();
    zomato.messages.bindEvents();
    zomato.prepareReadMoreReview('body', '.res-review-body');


    $("#username-vanity").on("keyup",function(e){
        if(e.keyCode == 13) {
            $('#choose-uname').click();
        }
    });

    $('.start-step-box').click(function(){
        var step = $(this).data('cat_id');
        $('.search-widget1').animate({left: '-500px'}, 300);
        $('.search-widget2').animate({left: '0px'}, 300);
        // $('.start-keyword-search').addClass('start-keyword-search-faded');
        $('.step2-subhead').hide();
        $('.step2-subhead-'+step).show();
    });
    $('.start-step-box-back').click(function(event){
        event.preventDefault();
        if($("#start-45s-filter-input").length>0) {
            $('.prom-filter-box-45s-home').data('active',0).removeAttr('data-icon');
            $("#start-45s-filter-input").val(0);
        }
        if($("#start-luxury-filter-input").length>0) {
            $('.prom-filter-box-luxury-home').data('active',0).removeAttr('data-icon');
            $("#start-luxury-filter-input").val(0);
        }
        $('.search-widget2').animate({left: '500px'}, 300);
        $('.search-widget1').animate({left: '0px'}, 300);
        // $('.start-keyword-search').removeClass('start-keyword-search-faded');
        // $('.step2-subhead').hide();
    });

    printGuideBuyEvent();

    pinReviewHandler();

    $('.feature-profile').on('click', function(e){
        e.preventDefault();
        var feature_button = $(this);
        var profile_id = feature_button.data('profile-id');
        var city_id = feature_button.data('city-id');
        data = {'profile_id': profile_id, 'city_id': city_id};
        $.ajax({
            url: HOST+'php/feature_profile_handler.php',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(data){
                if(data['message'] == 'success'){
                    feature_button.hide();
                }
                else{
                    alert(data['message'])
                }
            }
        });
    });

    $('.review-form-textarea,.review-photos').live('mouseover',
        function(){
            $(this).parent().addClass('review-borders');
        }
    );
    $('.review-form-textarea').live('mouseout',
        function(){
            if($(this).data('focused')!=1)
                $(this).parent().removeClass('review-borders');
        }
    );
    $('.review-photos').live('mouseout',
        function(){
            if($(this).siblings('.review-form-textarea').data('focused')!=1)
                $(this).parent().removeClass('review-borders');
        }
    );
    $('.review-form-textarea').live('focus',
        function(){
            $(this).data('focused',1);
            $(this).parent().addClass('review-borders');
        }
    );
    $('.review-form-textarea').live('blur',
        function(){
            $(this).data('focused',0);
            $(this).parent().removeClass('review-borders');
        }
    );



    setupGetMobileAppsEvents();

    $('.get-mobile-app').click(function(event)
        {
            event.stopPropagation();
            event.preventDefault();
            if(!$('#get-mobile-app-content').is(':visible')) {
                closeHeaderDropDowns();
            }
            $('#get-mobile-app-content').toggle();
            if($('#get-mobile-app-content').is(':visible')) {
                $('.get-mobile-app').css({'height': '32px'});
                // $('.get-mobile-app a img').css({'background-color': '#ffffff'});
            }
            else {
                $('.get-mobile-app').css({'height': '30px'});
                // $('.get-mobile-app a img').css({'background-color': '#ffffff'});
            }
            $(document).bind('click.headerDropDowns', closeHeaderDropDowns);


        });
    $('#get-mobile-app-content').click(function(event)
        {
            event.stopPropagation();
        });

    if(!$('html').hasClass('svg'))
        $('.manila-map-homepage').show();

    headerDropDownEvents();
    // setBrowserSupportCookie();
    relocateHeadlinerBanner();

    morelinkActions();

    $('.zs-unfollow-user-button').live({
        mouseenter: function() {if(!$(this).hasClass('while-following') && !$(this).hasClass('just-followed')){$(this).html('6');}},
        mouseleave: function() {if(!$(this).hasClass('while-following')){$(this).removeClass('just-followed').html('=');}}
    });

    $('.recommendations-expand').click(function(e){
        e.preventDefault();
        $(this).parent().find('.recommendation-pics .tooltip').tipsy();
        $(this).parent().find('.recommendation-pics .uimage').each(function() {
            if($(this).attr('src') == $(this).data('orig')) {
                $(this).animate({opacity: 1}, 500);
                $(this).css('opacity', 0);
            } else {
                $(this).load(function() {
                    $(this).animate({opacity: 1}, 500);
                });
                $(this).css('opacity', 0).attr('src', $(this).data('orig'));
            }
        });
        $(this).parent().find('.recommendation-pics').animate({
            height: 'toggle'
            }, 1, function() {
            //Animation complete.
        });
    });

    $('.expand-link').live("click",function(e){
        e.preventDefault();
        $(this).parents('.expand-group').find('.expand-content .tooltip').tipsy();

        var content = $(this).parents('.expand-group').find('.expand-content');
        if(content.is(':visible')) {
            content.hide();
        } else {
            content.show();
            $(this).parents(".expand-group").children(".hidden_user_thumbs").find('img').each(function() {
                if($(this).attr('src') == $(this).data('orig')) {
                    $(this).animate({
                        opacity: 1
                    }, 250);
                    $(this).css({opacity: 0});
                } else {
                    $(this).load(function() {
                        $(this).animate({
                            opacity: 1
                        }, 250);
                    });
                    $(this).css({opacity: 0}).attr('src', $(this).data('orig'));
                }
            });
        }

    });

    $('.notifications-content .notification-expand').live("click",function(){
        if( $(this).parents('.notifications-content').hasClass('profile') ) {
            return false;
        }

        $(this).parents('.notification-text').find('.uimage').each(function() {
            var that = $(this);
            setTimeout(function() {
                that.animate({opacity: 1}, 500);
            }, 100);
            $(this).css('opacity', 0).attr('src', $(this).data('orig'));
        });
        $(this).parents('.notification-text').find('.notification-pics').animate({
            height: 'toggle'
            }, 1, function() {
            //Animation complete.
        });
    });

    /*$('.notification-day').live('click',function(){
        if($(this).hasClass('collapsed')){
            $(this).removeClass('collapsed');
            $(this).children('.caret').addClass('tcaret').removeClass('caret');
            $(this).siblings('.group').animate({
                height: 'toggle'
                }, 100, function() {
                //Animation complete.
            });
        }
        else{
            $(this).addClass('collapsed');
            $(this).children('.tcaret').addClass('caret').removeClass('tcaret');
            $(this).siblings('.group').animate({
                height: 'toggle'
                }, 100, function() {
                //Animation complete.
            });
        }
    });*/

    $('.notification-expand').live("click",function(event){
        event.preventDefault();
        event.stopPropagation();
    });

    $('#header-notifications-content').live("click", function(event){
        // event.preventDefault();
        event.stopPropagation();
    });

    $(".messages-content").on('click', function(event) {
        event.stopPropagation();
    });

    $(".messages-content .message-notifier").on('click', function() {
        // $("#header-messages .notifications-sel").removeClass('.notifications-sel');
        closeHeaderDropDowns();
    });

    //right click on logo modal box
    $('#logo').bind('contextmenu rightclick', function(e){
            e.preventDefault();
            Dialog.show({
                html : '<div style="padding:0 13px;" class="grid_6"><div class="grid_2 alpha column2"><div style="border: 1px solid rgb(222, 222, 222); margin: 0pt auto; border-radius: 4px 4px 4px 4px; height: 88px; width: 88px;"><a href="'+HOST+'downloads/ZomatoLogos.zip"><img style="height:80px;width:80px;margin: 4px;" src="'+CDN+'images/logo_download_preview_black.png"></a></div></div><div class="grid_2 column2"><div style="border: 1px solid rgb(222, 222, 222); margin: 0pt auto; border-radius: 4px 4px 4px 4px; height: 88px; width: 88px;"><a href="'+HOST+'downloads/ZomatoLogos.zip"><img style="margin: 4px;height:80px;width:80px;" src="'+CDN+'images/white-on-black.png"></a></div></div><div class="grid_2 omega column2"><div style="border: 1px solid rgb(222, 222, 222); margin: 0pt auto; border-radius: 4px 4px 4px 4px; height: 88px; width: 88px;"><a href="'+HOST+'downloads/ZomatoLogos.zip"><img style="margin: 4px;height:80px;width:80px;" src="'+CDN+'images/logo_download_preview_red.png"></a></div></div><div class="clear"></div></div><div class="grid_6" style="padding: 0 13px;text-align: center; margin-top: 20px;"><a style="padding: 10px" href="'+HOST+'downloads/ZomatoLogos.zip" class="btn btn-red">'+ zomato.language.getText( 'zm-common-js-download-btn' )+'</a></div>',
            head: zomato.language.getText( 'zm-common-js-looking-for-logo' )
        });
     });


    //Social Follow hover/non-hover buttons
    displayZSFollowButtons();
    //for the Top25 restaurant block on the homepage
    displayZSFollowHoverButtons('.resZS')


    /*if($('.footer').length) {
        if($(window).height() > $('body').height()){
            var force_footer_height = $(window).height() - $('body').height() + $('.footer').height();
            $('.footer').height(force_footer_height);
        }
    }*/

    $('.zs-load-more').live('click',function(event) {
        event.preventDefault();
        $(this).find('.load-more').html('<img class="zs-loading-img" src="'+HOST+'images/floading.gif"/>');
        // $(this).find('.load-more').hide();
        // $(this).find('.bg-line').show();
        var entity_id = $(this).data('entity_id');
        var profile_action = $(this).data('profile_action');
        var page = $(this).data('page');
        var limit = $(this).data('limit');

        var that = $(this);
        $.ajax({
          type:"POST",
          url:HOST+"php/social_load_more.php",
          data: {entity_id:entity_id,profile_action:profile_action, page:page, limit:limit},
          success: function(response){
            var m = eval('('+response+')');
            if(m.status == 'success'){
                if(profile_action=='get_notifications' || profile_action=='get_activity') {
                    var output = m.html;
                    var container = $(that).parents('.zs-load-more-container .n-content');
                    $(output).hide().insertBefore($(that));
                    $(container).find('li').fadeIn();
                }
                else {
                    var output = ''+m.html+'';
                    var container = $(that).parents('.zs-load-more-container').find('.zs-following-list');
                    var o = $(output).hide();
                    o.appendTo($(container));
                    $(container).children().each(function(){
                        $(this).fadeIn();
                    });
                    initiateLaziness();
                    bindReviewPhotosLightboxEvents();
                    //bindPhotoUploadFunctions();

                }

            displayZSFollowButtons();
            morelinkActions();
		    user_rating_widget();

                $(that).data('page',m.page);
                if(m.more==0) {
                    $(that).fadeOut('300').remove();
                } else {
                    if(m.left_count)
                        $(that).find('.load-more').html(zomato.language.getText('zm-common-js-load-more-param',m.left_count));
                    else
                        $(that).find('.load-more').html(zomato.language.getText('zm-common-js-load-more'));
                }
            } else if(m.status == false) {
                $("#create-list-error").html(m.message).fadeIn().delay(5000).fadeOut();
            }
          }
        });
    });

    $('#choose-uname').click(function(event){
        $("#check-uname-status").html('&nbsp;');
        event.preventDefault();
        $(this).hide().siblings('.loader').show();
        var uname = $("#username-vanity").val();
        var that = $(this);
        setTimeout(function(){
          $.ajax({
             type:"POST",
             url:HOST+"php/username_selector.php",
             dataType:"json",
             context:this,
             data: {uname:uname},
             success: function(m){
                 if(m.status == 'success'){
                  $("#vanity-url-box").animate({
                      height: '20px',
                      opacity: 0
                  }, 300, function() {
                      $("#vanity-url-box").removeClass('ta-right').html(m.message).animate({opacity:1}, 250);
                  })
                  if($('#user-vanity-message').length){
                    //$('#user-vanity-message').delay(4000).slideUp();
                  }
                 }
                 else{
                  $("#check-uname-status").html(m.message).show();
                  $(that).show().siblings('.loader').hide();
                 }
             }

          });}
          , 500);
      });

    $('#user-vanity-sure').click(function(){
        $('#user-vanity-options').fadeOut(200,function(){
            $('#vanity-url-box').fadeIn(200);
        });
    });

    $("#user-vanity-message-dismiss").click(function(event) {
        event.preventDefault();
        $.ajax({
            type:"POST",
            url:HOST+"php/username_selector.php",
            dataType:"json",
            context:this,
            data: {type:"dismiss"},
            success: function(m){
                if(m.status == 'success'){
                    $("#user-vanity-message").slideUp();
                }
            }
        });
    });

    $("#cookie_msg_dismiss").click(function(event) {
        event.preventDefault();
        $.ajax({
            type:"POST",
            url:HOST+"php/cookie_msg_dismiss.php",
            dataType:"json",
            context:this,
            success: function(m){
                if(m.status == 'success'){
                    $("#user-cookie-message").slideUp();
                }
            }
        });
    });

    //call lazy loader function
    initiateLaziness();

    // addAnalyticsEvents();
    feedbackContestMessage();
    initHover();

    loadMoreReviewsEvents();


    zomato.iosTipsyFix();

    $(".tooltip").tipsy();
    $(".tooltip-w").tipsy({gravity:'w'});
    $(".tooltip-e").tipsy({gravity:'e'});

    $(".tooltip_formatted").tipsy({html: true});
    $(".tooltip_formatted-w").tipsy({gravity:'w',html: true});
    $(".tooltip_formatted-e").tipsy({gravity:'e',html: true});


    //addFacebookEvent();

//    exportToExcelEvents();
/*
    // zomato.addLiveSuggest('suggest-keyword', HOST+'php/liveSuggest.php');
    var data = {onselect: function(obj){
        $("#zone").val($(obj).attr("zone"));
        $("#subzone").val($(obj).attr("subzone"));
    }};

    $("#livesuggestcontainer_suggest-locality .item").live('click', function(){
        var obj = $(this);
        $("#suggest-locality").val($(this).text());
        $("#zone").val($(obj).attr("zone"));
        $("#subzone").val($(obj).attr("subzone"));
        $("#location-form").submit();
    });

    $("#suggest-locality").keydown(function(){
        $("#zone").val(0);
        $("#subzone").val(0);
    });

    zomato.addLiveSuggest('suggest-locality', HOST+'php/liveSuggest.php?type=locality', data);
*/

     zomato.initRatingWidget();

    // footerSlider();
    // inputPlaceholderEffect("explore-keywords");

     if( /chrome/.test( navigator.userAgent.toLowerCase()) == true)  {
        displayChromeMessage();
        //  if( /chrome/.test( navigator.userAgent.toLowerCase()) == true)  {
        //      displayChromeMessage();
        //  };
        /*  if( ADREF != '')    {
            displayAddMessage(ADREF);*/
     }
     if( /msie 9/.test( navigator.userAgent.toLowerCase()) == true)  {
        ie_9_test();                    //IE nine functionalities
     }

     $("#go-button").click(function(){
         var subscribeFlag = $(this).data("subscribe_flag");
         var hasError = false;
         var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
         var emailaddressVal = $("#newslettersubscribe").val();
         if(emailaddressVal == "") {
             hasError = true;
         }

         else if(!emailReg.test(emailaddressVal)) {

             $("#dontspam").html(zomato.language.getText( 'zm-common-js-email-invalid' ));
             $("#dontspam").css("color", "red");
             hasError = true;
         }

         if(hasError == false) {

             var email = $("#newslettersubscribe").val();
             $.post(HOST+"php/newsletterSubscribe.php",
                    {city_id: CITY_ID, email:email, subscribe_type:subscribeFlag },
                    function(data){
                        $("#dontspam").css("color", "#444444");
                        if(data!=null)
                            {
                                $("#dontspam").html(data);
                            }
                    });

         }
     });

    //for Inline User Rating of Restaurants - Starts
    //added by ashish
    user_rating_widget();
    //dummy function to simulate reloading widgets to be used in case of login
    $(document).bind('ZOMATO_LOGIN',function(){
        reload_user_rating_widgets();
    });
    //for Inline User Rating of Restaurants - ends

    //Follow button events start here
    $(document).bind('ZOMATO_SIGNUP', function(event, currentId) {
        $.ajax({
            url: HOST+'php/common_follow_handler.php?type=get_followed_list',
            type: 'GET',
            data: {'user_id': USER_ID},
            datatype: 'json',
            success: function(response) {
                var r = eval('('+response+')');
                reloadZSFollowButtons(r);
                reloadZSFollowHoverButtons(r);
            }
        });
    });
    $(document).bind('ZOMATO_LOGIN', function(event, currentId) {
        $.ajax({
            url: HOST+'php/common_follow_handler.php?type=get_followed_list',
            type: 'GET',
            data: {'user_id': USER_ID},
            datatype: 'json',
            success: function(response) {
                var r = eval('('+response+')');
                reloadZSFollowButtons(r);
                reloadZSFollowHoverButtons(r);
            }
        });
    });

    $(document).bind('FACEBOOK_LOGIN', function(event , currentId) {
         $.ajax({
             url: HOST+'php/common_follow_handler.php?type=get_followed_list',
             type: 'GET',
             data: {'user_id': USER_ID},
            datatype: 'json',
             success: function(response) {
                 var r = eval('('+response+')');

                 reloadZSFollowButtons(r);
                 reloadZSFollowHoverButtons(r);
             }
         });
    });
    //Follow button events end here

    /*
    var fixed_hopper = false;
    var hopper_offset = $('#hopper').length != 0 ? parseInt($('#hopper').offset().top) : 0;

    window.sections_scroll = [];
    $('.section').each(function(){
        var elem = $(this);
        window.sections_scroll.push( { top:parseInt(elem.offset().top), height:parseInt(elem.height()), ref: elem } );
    });
    window.last_scroll_top = 0;
    window.scroll_monitor = true;
    window.active_section = -1;

    var section_focus_last = null;
    var section_focus = null;
    var step = 20;

    $('a.hopper-top').click(function(event){
        event.preventDefault();
        window.scroll_monitor = false;
        $('html,body').animate({scrollTop: 0}, 500);
        setTimeout( function(){
            $('.hopper-links.selected').removeClass('selected');
            window.active_section = -1;
            window.scroll_monitor = true;
        }, 300);
    });

    browsers not supporting css transitions are likely to have poor scrolling
    performance. so disable sticky hopper
    if(Modernizr.csstransitions) {
        $(window).scroll(function(e){
            var win_scroll_top = parseInt($(this).scrollTop());
            if(!fixed_hopper && parseInt(hopper_offset - win_scroll_top) <= 0) {
                fixed_hopper = true;
                $('#hopper').addClass('fixed');
                $('#hopper-holder').addClass('mt60');
                $('a.hopper-top').show();
            } else if(win_scroll_top < hopper_offset) {
                $('#hopper').removeClass('fixed');
                $('#hopper-holder').removeClass('mt60');
                $('.hopper-links.selected').removeClass('selected');
                section_focus_last = null;
                section_focus = null;
                window.active_section = -1;
                $('a.hopper-top').hide();
                fixed_hopper = false;
            }

            if ( !window.scroll_monitor ){
                window.last_scroll_top = win_scroll_top;
                return false;
            }
            if ( win_scroll_top > ( window.last_scroll_top + step ) ){
                window.last_scroll_top = win_scroll_top;
                for( var i=window.active_section+1; i < window.sections_scroll.length; i++ ){
                    var v = window.sections_scroll[ i ];
                    if(v.top < (win_scroll_top + 60)) {
                        window.active_section = i;
                        section_focus = v.ref;
                        break;
                    }
                }
            }
            if ( win_scroll_top < ( window.last_scroll_top - step ) ){
                window.last_scroll_top = win_scroll_top;
                for( var i=0; i < window.active_section; i++ ){
                    var v = window.sections_scroll[i];
                    if ( v.top > (win_scroll_top - v.height/2) ) {
                        window.active_section = i;
                        section_focus = v.ref;
                        break;
                    }
                }
            }

            // console.log(section_focus,section_focus_last);
            if(section_focus != section_focus_last) {
                section_focus_last = section_focus;
                var section_id = $(section_focus).attr('id');
                $('.hopper-links').removeClass('selected');
                $('.hopper-links[data-section_id='+section_id+']').addClass('selected');

                $(document).trigger('HOPPER_SECTION_FOCUS', section_focus);
            }
        });
    }

    $('.hopper-links').click(function(){
        var elem = $(this);
        var section_id = elem.data('section_id');
        window.scroll_monitor = false;
        var correction = 60;
        $('html,body').animate({scrollTop: parseInt($('#'+section_id).offset().top) - correction}, 500);
        setTimeout( function(){
            $('.hopper-links.selected').removeClass('selected');
            elem.addClass('selected');
            window.scroll_monitor = true;
        }, 550);
    });

    */
});

function fixHeaderNotificationsHeight(){
    var hgt = $(window).height();
    var header_notification = $('#header-notifications-content .content');
    var notification_height = header_notification.height();

    if(notification_height >= 405){
        header_notification.nanoScroller({
            contentClass: 'n-scroll',
            sliderMinHeight: 60,
            sliderMaxHeight: 240,
            preventPageScrolling: true,
            extraPaneHeight: -37
        });
        //$(header_notification).find('ul.content').css({'overflow-y':'scroll','height':(hgt-300)+'px'});
    }
}

/*             : 1) To dynamically change the star selection on mouseover and mousout in rating widget used anywhere.
/*  Function   : user_rating_widget()
 *  Created on : 21 Feb, 2012
 *  Author     : Ashish
 *  Description: Purpose of the function follows.
 *             : 2) To dynamically update the restaurant rating through ajax call.
 *             : 3) To dynamically clear the data for a user for restaurant rating through ajax call.
*/
function user_rating_widget() {
    var rating_classes = 'user_stars2_0 user_stars2_1 user_stars2_2 user_stars2_3 user_stars2_4 user_stars2_5 user_stars2_6 user_stars2_7 user_stars2_8 user_stars2_9 user_stars2_10';
    //var rating_levels = 'level-1 level-2 level-3 level-4 level-5 level-6 level-7 level-8 level-9';
    /*
     * Stars colour fill and change effect on mouseover
     */
    $(".rating-widget-stars a").mouseover(function() {
        var starno = $(this).data('num');

        $(this).parents('.rating-cls').removeClass(rating_classes).addClass('user_stars2_'+starno);
/*changed variable here */
        $(this).parents('.rating-widget').find('.rating-widget-num').text($(this).data('hover-rating'));
        //$('.rating-widget-num').removeClass(rating_levels).addClass('level-'+$(this).data('num'));

        $(this).parents('.rating-widget-stars').find("a").addClass('level-0');

        for(i=1;i<starno;i++)
            $(this).parents('.rating-widget-stars').find("a.level-"+i).removeClass('level-0');


        var ratingtext = $(this).parents('.rating-widget').find('.ratingtext');
        ratingtext.html(zomato.language.getText('zm-common-js-rate-this-as', (starno/2)));
    });

    /*
     * Stars, remove filled colour on mouseout
     */
    $('.rating-widget-stars div.rating-cls').mouseout(function(){
        $(this).removeClass(rating_classes).addClass($(this).data('originalclass'));
        var rating_widget_num = $(this).parents('.rating-widget').find('.rating-widget-num');
        rating_widget_num.text(rating_widget_num.data('original-rating-num'));
        // $('.rating-widget-num').removeClass(rating_levels).addClass('level-'+$('.rating-widget-num').data('original-data-num'));

        var str = $(this).data('originalclass');
        var num_arr = str.split("_");
        var num = num_arr[2];

        $(this).parents('.rating-widget-stars').find("a").addClass('level-0');
        if(num==0) {
            $(this).parents('.rating-widget-stars').find("a").removeClass('level-0');
        }
        else {
            for(i=1;i<num;i++)
                $(this).parents('.rating-widget-stars').find("a.level-"+i).removeClass('level-0');
        }

        var ratingtext = $(this).parents('.rating-widget').find('.ratingtext');
        ratingtext.html(ratingtext.data("original"));
    });

    /*
     * Clear rating data on clicking the cross image
     */
    $(".rating-clear").click(function(event) {
        event.preventDefault();
        var rating = 0;
        var res_id = $(this).parents('.rating-widget').data('res_id');
        var review_id = $(this).parents('.rating-widget').data('review_id');
        var rating_for = $(this).parents('.rating-widget').data('rating-for');

        var review_not_saved = $(this).parents('.restaurant-rating-widget').hasClass('review_not_saved');

        if(rating_for=='review' && !review_not_saved) {
            var rating_widget = {};
            rating_widget = $('.rating-widget-res_'+res_id+','+'.rating-widget-review_'+review_id);
        } else if (review_not_saved) {
            var rating_widget = $('.rating-widget-review_'+review_id+'');
        } else {
            var rating_widget = $('.rating-widget-res_'+res_id+'');
        }

        rating_widget.find(".rating-clear").hide();
        rating_widget.find(".rating-working").show();

        if (!review_not_saved) {
            $.ajax({
                type: "POST",
                url: HOST+"php/user_rating_widget_handler.php?type=clear",
                data: {
                    rating:rating,
                    res_id:res_id
                },
                dataType: "json",
                complete: function() {
                    // $(".rating-widget-res_"+res_id).find('.rating-clear').show();
                    rating_widget.find('.rating-working').hide();
                },
                success: function(msg) {
                    if(typeof msg.status != 'undefined' && msg.status == 'success') {
                        var ratingtext = rating_widget.find('.ratingtext');
                        var ratingnum = rating_widget.find('.rating-widget-num');
                        var ratingstars = rating_widget.find(".rating-widget-stars div.rating-cls");

                        var res_ratingstars = rating_widget.find('.rating-widget-stars div.rating-cls');

                        var message = msg['widget_text'];

                        ratingtext.html(message);
                        ratingtext.data("original", message);
                        ratingstars.removeClass(rating_classes).addClass('user_stars2_0');
                        ratingnum.text('-');
                        // ratingnum.removeClass(rating_levels);
                        ratingstars.data("rating", "0");
                        rating_widget.find(".rating-widget-stars a").removeClass('level-0');
                        ratingstars.data("originalclass", "user_stars2_0");
                        rating_widget.find('.rating-widget-num').text("-");
                        rating_widget.find('.rating-widget-num').data('original-rating-num',"-");
                        rating_widget.find('.rating-widget-num').data('original-data-num',0);

                        res_ratingstars.removeClass(rating_classes).addClass("user_stars2_0");
                        res_ratingstars.data("originalclass", "user_stars2_0");

                        //last parameter are for multiple color backgrounds as per rating
                        $(document).trigger('ZOMATO_RATE', {
                            res_id: res_id,
                            votes: msg['votes'],
                            'aggregate': msg['aggregate'],
                            'rating_level': msg['rating_level'],
                            'rating_text': msg['rating_text'],
                            'rating_sub_text': msg['rating_sub_text'],
                            'votes_text': msg['votes_text'],
                            'rating_display': msg['rating_display']
                        });
                    }
                }
            });
        }  else {
                rating_widget.find('.rating-working').hide();

                var ratingstars = rating_widget.find(".rating-widget-stars div.rating-cls");
                var ratingnum = rating_widget.find('.rating-widget-num');

                ratingstars.removeClass(rating_classes).addClass('user_stars2_0');
                ratingnum.text('-');
                ratingstars.data("rating", "0");
                rating_widget.find(".rating-widget-stars a").removeClass('level-0');
                ratingstars.data("originalclass", "user_stars2_0");
                rating_widget.find('.rating-widget-num').text("-");
                rating_widget.find('.rating-widget-num').data('original-rating-num',"-");
                rating_widget.find('.rating-widget-num').data('original-data-num',0);
        }
    });

    /*
     * Change the background colour of average rating displayed, by
     * changing the CSS class. Background colour is based upon the
     * average rating displayed.
     */
    $(document).bind("ZOMATO_RATE", function(event, data){
        $(".rrw-container-"+data['res_id']+" .rrw-aggregate").html(data['rating_display']);

        $(".rrw-container-"+data['res_id']+" .rrw-votes").html(data['votes_text']);

        $(".rrw-container-"+data['res_id']+" .rrw-votes-count").html(data['votes']);
        $(".rrw-container-"+data['res_id']+" .rrw-rating-text").html(data['rating_text']);
        $(".rrw-container-"+data['res_id']+" .rrw-rating-sub-text").html(data['rating_sub_text']);

        var rating_levels = 'level-0 level-1 level-2 level-3 level-4 level-5 level-6 level-7 level-8 level-9 level-10';
        $(".rrw-container-"+data['res_id']+" .rrw-aggregate").removeClass(rating_levels);
        $(".rrw-container-"+data['res_id']+" .rrw-aggregate").addClass(data['rating_level']);

        $(".tooltip").tipsy();
        $(".tooltip_formatted").tipsy({html: true});
    });

    // $('#resinfo-photos').click(function(event) {
    //     event.preventDefault();

    //     Modal.show({
    //         url: HOST+'php/photosDialog.php',
    //         height: 700,
    //         width: 600,
    //         flexible:1
    //     });
    // });

    /*
     * Submitting rating data on click a star
     */
    $('.rating-widget-stars a').click(function(event) {
        event.preventDefault();

        $('.rating-widget-stars a').removeClass('.rating-sel');

        var rating = $(this).data('num');
        var rate_num = $(this).data('hover-rating');
        var res_id = $(this).parents('.rating-widget').data('res_id');
        var review_id = $(this).parents('.rating-widget').data('review_id');
        var rating_for = $(this).parents('.rating-widget').data('rating-for');

        $(this).addClass('rating-sel');

        var review_not_saved = $(this).parents('.restaurant-rating-widget').hasClass('review_not_saved');

        if(rating_for=='review' && !review_not_saved) {
            var rating_widget = {};
            rating_widget = $('.rating-widget-res_'+res_id+','+'.rating-widget-review_'+review_id);
        }
        else if(review_not_saved) {
            var rating_widget = $('.rating-widget-review_'+review_id+'');
        }
        else {
            var rating_widget = $('.rating-widget-res_'+res_id+'');
        }

        rating_widget.find(".rating-clear").hide();
        rating_widget.find(".rating-working").show();

        var rating_wodget_cls = rating_widget.find(".rating-widget-stars div.rating-cls");
        var rating_widget_num = rating_widget.find('.rating-widget-num');

        rating_wodget_cls.data("originalclass", "user_stars2_"+rating);
        rating_widget_num.text(rate_num);
        rating_widget_num.data('original-rating-num',rate_num);

        rating_widget_num.data('original-data-num',rating);
        // $('.rating-widget-num').removeClass(rating_levels).addClass('level-'+rating);

        rating_wodget_cls.data("rating", rating/2);
        rating_wodget_cls.removeClass(rating_classes).addClass("user_stars2_"+rating);
        rating_wodget_cls.children('div').removeClass().addClass("user_sel_stars2_"+rating);
        rating_wodget_cls.trigger('mouseout');

        var ratetext = "Your rating: "+(rating/2)+".0/5";
        rating_widget.find(".ratingtext").data("original", ratetext);
        rating_widget.find(".ratingtext").html(ratetext);

        if (!review_not_saved) {
            $.ajax({
            type: "POST",
            url: HOST,
            data: {
                rating:rating,
                res_id:res_id
            },
            dataType: "json",
            complete: function() {
                rating_widget.find('.rating-clear').show();
                rating_widget.find('.rating-working').hide();
            },
            success: function(msg){
            /*
            code for updating only the curent widgets overall rating
                $(that).parent('div').removeClass();
                $(that).parent('div').addClass(msg['rateclass']);
                $(that).parent('div').data('originalclass',(msg['rateclass']));
                $(that).parents('.rate_restaurant_inline').data('originalclass','');
                $(that).parents('.ratinginline').children('.ratingtext').children('.rate').text(msg['rating']);
                $(that).parents('.ratinginline').children('.ratingtext').attr('original-title',msg['orgtitle']);

            */
                if(msg['status'] == 'please_login') {
                    Dialog.show({
                        head: zomato.language.getText('zm-common-js-sign-to-continue'),
                        url: HOST+'php/loginDialog.php?type=rating',
                        height: 470,
                        width: 392,
                        flexible:1
                    });

                    rating_widget.find(".rating-widget-stars div").each(function(){
                        $(this).data("originalclass", $(this).data("user_stars2_0"));
                        $(this).data("rating", "0");
                        $(this).removeClass().addClass("user_stars2_0");
                    });

                    if(msg['votes']==1)
                        var ratetext = zomato.language.getText( 'zm-common-js-rating-aggr-vote-text-sn', msg['aggregate'], msg['votes']);
                    else
                        var ratetext = zomato.language.getText( 'zm-common-js-rating-aggr-vote-text-pl', msg['aggregate'], msg['votes']);

                    rating_widget.find(".ratingtext").data("original", ratetext);
                    rating_widget.find(".ratingtext").html(ratetext);

                    var res_ratingstars = rating_widget.find('.rating-widget-stars div');
                    res_ratingstars.each(function(){
                        $(this).data("originalclass", "user_stars2_0");
                        $(this).data("rating", "0");
                        $(this).removeClass().addClass("user_stars2_0");
                    });


                }
                else{

                    $(document).trigger('ZOMATO_RATE', {
                        res_id: res_id,
                        votes: msg['votes'],
                        'aggregate': msg['aggregate'],
                        'rating_level': msg['rating_level'],
                        'rating_text': msg['rating_text'],
                        'rating_sub_text': msg['rating_sub_text'],
                        'votes_text': msg['votes_text'],
                        'rating_display': msg['rating_display']
                    });
                }
            }
            });
        }
        else  {
            rating_widget.find('.rating-clear').show();
            rating_widget.find('.rating-working').hide();
        }
    });
}




// call this function to reload all User Rating Widgets like in case of login, when page is not refreshed...
//added by ashish
function reload_user_rating_widgets() {
    var res_id = '';
    var rating_editor_overall = '';
    $('.rating-inline-widget').each(function(){
        var res_id = $(this).data('resID');
        var rating_editor_overall = $(this).data('editorRating');
        var that = this;
        $.ajax({
            type: "POST",
            url: "/update_rating_widgets",
            data: {res_id:res_id,rating_editor_overall:rating_editor_overall},
            dataType: "json",
            success: function(msg){
                $(that).replaceWith(msg['outputhtml']);

                //to rebind all widget related events
                user_rating_widget();

                //to rebind all tipsy related hover events on reloaded widgets
                $(".tooltip").tipsy();
                $(".tooltip-w").tipsy({gravity:'w'});
                $(".tooltip-e").tipsy({gravity:'e'});
                $(".tooltip_formatted").tipsy({html: true});
            }
        });

    });
}

function ie_9_test() {
  if( /msie 9/.test( navigator.userAgent.toLowerCase()) == true)  {
        if(window.external.msIsSiteMode() == false){                //not running from pinned site
          displayIEMessage();
        }
        else{
          setCookie('is_ie_dismissed', 1);
          if (window.external.msIsSiteModeFirstRun(false) == 1) {       //Running form pinned site for 1st time
            $.ajax({
            type: "POST",
            data: "firstRun=true",
            url: HOST+"php/pinnedSiteTracking.php",
            success: (function(msg){
              var m = eval('('+msg+')');
    //          alert(m.status);
            })
            });
          }
          // Dynamic jump list
          window.external.msSiteModeCreateJumplist(zomato.language.getText('zm-common-js-my-fav-res'));
              $.post(HOST+"php/pinnedSiteTracking.php", {user_id: USER_ID,get_fave: 'true'}, function(msg){
            var m = eval('('+msg+')');
            if(m.status == 'success')
            {
               var i=0;
               //alert(m.rest_name);
               window.external.msSiteModeClearJumplist();
               if((m.rest_name.length) > 0)
               {
                  for(i=0;i<(m.rest_name.length);i++)
                  {
                window.external.msSiteModeAddJumpListItem(m.rest_name[i],m.rest_url[i],HOST+'images/favicon.ico');
                  }
               }
               else{
                 window.external.msSiteModeAddJumpListItem(zomato.language.getText('zm-common-js-add-fav'),HOST,HOST+'images/favicon.ico');
               }

               window.external.msSiteModeShowJumplist();
            }
            else if(m.status == 'login'){
        //     window.external.msSiteModeClearJumplist();
            }
            else
                  alert(zomato.language.getText('zm-common-js-err-try-again-variant'));
              });
        }
    }
}


/** Stars Rating Widget **/
zomato.initRatingWidget = function() {
    // $(".ratingWidget > div > a").tipsy();

    $(".ratingWidget > div > a").mouseover(function(){
        var par = $(this).parent();
        var widget = par.parent();
        var pos = par.children().index(this);

        par.get(0).className = "user_stars2_"+((pos+1)*2);
    });

    $(".ratingWidget > div > a").click(function(event){
        event.preventDefault();
        var val = $(this).parent().children().index(this) + 1;
        $(this).parent().parent().find("input").val(val);
        $(this).parent().parent().trigger('ratingWidget_rate', val);
    });

    $(".ratingWidget").mouseout(function(){
        var val = $(this).find("input").val();
        if(!(val >= 1 && val <= 5)) val = 0;
        $(this).children("div").get(0).className = "user_stars2_"+(val*2);
    });
}




function inputPlaceholderEffect(input_id)   {
    $("#"+input_id).focus(function()    {
        if($(this).val() == $(this).attr('placeholder'))    {
            $(this).val('');
        }
    });
    $("#"+input_id).keydown(function(e)    {
        if($(this).val().length==1 && e.keyCode=='8' )    {
            $(this).css('color', '#aaaaaa');
        }
        else if($(this).val() == '')    {
            $(this).css('color', '#aaa');
        }
        else if($(this).val() != $(this).attr('placeholder'))    {
            $(this).css('color', '#2d2d2d');
        }
        else if($(this).val() != '' )    {
            $(this).css('color', '#2d2d2d');
        }
    });
    $("#"+input_id).keyup(function() {
        if($(this).val() == '')    {
            $(this).css('color', '#aaaaaa');
        }
        else if($(this).val() != '' && $(this).val() != $(this).attr('placeholder') )    {
            $(this).css('color', '#2d2d2d');
        }
    });

    $("#"+input_id).blur(function() {
        if($(this).val() == '') {
            //var placeholder_text = $(this).attr('placeholder');
            //$(this).val(placeholder_text).css("color", "#aaa");
            $(this).css("color", "#aaa");
        }
    });

    $("#"+input_id).blur();
}

function checkHeaderSearch()    {
    if($("#suggest-keyword").val() == $("#suggest-keyword").attr('placeholder'))    {
        $("#suggest-keyword").val('');
    }
    return true;
}

function loadMoreReviewsEvents() {
    $("#loadMoreReviews").on('click', function(event) {
        event.preventDefault();
        $.get(HOST+'php/loadMoreReviews.php?past='+PAST+'&start='+moreReviewsStart, function(msg) {
            $("#loadMoreReviews").replaceWith('<p id="reviewsLoading">'+zomato.language.getText('zm-common-js-loading-text')+'</p>');
            $("#moreReviewsContainer").append(msg);
        $("#reviewsLoading").remove();
            // moreReviewsStart = Number(moreReviewsStart);
        });
        return false;
    });
}

function showReviewMessage(message, elem, review_id, keep_showing) {
    if(typeof keep_showing == 'undefined'){
        keep_showing = true;
    }

    $(elem).children(".reviewMessage").html(message);
    $(elem).clearQueue().slideDown().delay(5000).slideUp();

    if(keep_showing) {
        $(elem).clearQueue().slideDown();
    }
}







function closeDropDowns(addDelay) {
    if(addDelay) {
        setTimeout(function(){
            $(".liveSuggestContainer").hide();
            $("#dish-hint").show();
            $(document).unbind('click', closeDropDowns);
        }, 50);
    } else {
        $(".liveSuggestContainer").hide();
        $("#dish-hint").show();
        $(document).unbind('click', closeDropDowns);
    }
}

function feedbackContestMessage() {
    if(typeof(hide_hire_message) != "undefined" && hide_hire_message == "1")
        return false;

    var isCookieSet = checkCookie('ifd');

    if(isCookieSet)
        return;

    if($.browser.msie && parseInt($.browser.version) <= 7)
        return;


//    if(isCookieSet == false ) {
    //var feedbackmessage = '<div id="feedback-contest-message" style="text-align: center; position: fixed; right: 0px; bottom: 0px; left:0px;  -moz-box-shadow: 0px -2px 5px #aaa; -webkit-box-shadow: 0px -2px 5px #aaa; box-shadow: 0px -2px 5px #aaa; background: #333; opacity: 0.95; background: rgba(0, 0, 0, 0.75); color: #fff; -moz-text-shadow: 1px 1px 0px #222; -webkit-text-shadow: 1px 1px 0px #222; text-shadow: 1px 1px 0px #222;display: none;"><div class="container"><a href="#" style="float: right; color: #fff; font-size: 90%;" id="feedback-contest-message-close"> Dismiss </a><div class="left" style=""><img src="'+HOST+'images/feedbackicon.png" style="height: 20px; margin: 0px 10px;" /></div><div style="margin: 5px 10px; text-align: left;"><a class="nounderline" id="feedback-contest-link" style="color: #fff; " href="'+HOST+'feedback"><span style="font-weight: bold;">We need your feedback.</span> &nbsp;&nbsp;<span style="font-size: 90%;">Blog us your feedback and get assured gifts including an iPad. <span style="text-decoration: underline;">click here for details &raquo;</span></span></a></div><div class="clear"></div></div></div>';
    var feedbackmessage = '<div id="feedback-contest-message" style="z-index:999; text-align: center; position: fixed; right: 0px; bottom: 0px; left:0px;  -moz-box-shadow: 0px -2px 5px #aaa; -webkit-box-shadow: 0px -2px 5px #aaa; box-shadow: 0px -2px 5px #aaa; background: #333; opacity: 0.95; background: rgba(0, 0, 0, 0.75); color: #fff; -moz-text-shadow: 1px 1px 0px #222; -webkit-text-shadow: 1px 1px 0px #222; text-shadow: 1px 1px 0px #222;display: none;"><div class="container"><div class="right" style="width: 100px; overflow: hidden;"><iframe src="//www.facebook.com/plugins/like.php?app_id=163020500450469&amp;href=facebook.com%2Fzomato&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=verdana&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe></div>';
        // <div style="width: 62px; overflow: hidden;" class="right"><a href="https://twitter.com/zomato" class="twitter-follow-button" data-link-color="#444444" data-show-count="false">Follow</a><script src="//platform.twitter.com/widgets.js" type="text/javascript"></script></div>
    feedbackmessage +=         '<div class="right" style="margin-right: 10px; height: 24px; overflow: hidden; "><div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://www.zomato.com"></div><script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);})();</script></div><div class="right" style="height: 100%; border-left: 1px solid rgb(0, 0, 0); width: 0px; border-right: 1px solid rgb(85, 85, 85); margin-right: 8px;">&nbsp;</div><div class="left" style=""><img src="'+HOST+'images/feedbackicon.png" style="height: 20px; margin: 0px 10px;" /></div><div style="margin: 5px 10px; text-align: left;"><a class="nounderline" id="feedback-contest-link" style="color: #fff; " href="'+HOST+'feedback"><span style="font-weight: bold;">We need your feedback.</span> &nbsp;&nbsp;<span style="font-size: 12px;">Blog us your feedback and get assured gifts including an iPad. <span style="text-decoration: underline;">click here for details &raquo;</span></span></a></div><div class="clear"></div></div></div>';

    setTimeout(function() {
        $("#feedback-contest-message").fadeIn();
        $("#feedback-contest-message-close").live('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $("#feedback-contest-message").fadeOut();
            setCookie('ifd', 1);
        });

        $("#feedback-contest-link").click(function() {
            // setCookie('ifd', 1);
        });
    }, 1500);
}



function initJqueryRegexSelector() {
    jQuery.expr[':'].regex = function(elem, index, match) {
    var matchParams = match[3].split(','),
        validLabels = /^(data|css):/,
        attr = {
            method: matchParams[0].match(validLabels) ?
                        matchParams[0].split(':')[0] : 'attr',
            property: matchParams.shift().replace(validLabels,'')
        },
        regexFlags = 'ig',
        regex = new RegExp(matchParams.join('').replace(/^\s+|\s+$/g,''), regexFlags);
    return regex.test(jQuery(elem)[attr.method](attr.property));
   }
}
function headerDropDownEvents() {
    $("#header-login-dd-link").live("click",function(event) {
        event.stopPropagation();
        initiateLaziness();
        if($(this).hasClass("user-tab-sel")) {
            $(this).removeClass("user-tab-sel")
            closeHeaderDropDowns();
        } else {
            closeHeaderDropDowns();
            $(document).bind('click.headerDropDowns', closeHeaderDropDowns);
            $(this).addClass("user-tab-sel");
        }
    });

    $("#city_list").live("click", function(event) {
        // Do not add stopPropagation here. Creates problem with location dropdown
        // event.stopPropagation();
        event.stopPropagation();
        if($(this).hasClass("city-list-sel")) {
            $(this).removeClass("city-list-sel");
            closeHeaderDropDowns();
        } else {
            closeHeaderDropDowns();
            $(document).bind('click.headerDropDowns', closeHeaderDropDowns);
            $(this).addClass("city-list-sel");
        }
    });

    $("#lang_list").live("click", function(event) {
        // Do not add stopPropagation here. Creates problem with location dropdown
        // event.stopPropagation();
        event.stopPropagation();
        if($(this).hasClass("lang-list-sel")) {
            $(this).removeClass("lang-list-sel");
            closeHeaderDropDowns();
        } else {
            closeHeaderDropDowns();
            $(document).bind('click.headerDropDowns', closeHeaderDropDowns);
            $(this).addClass("lang-list-sel");
        }
    });

    $(".user-city-list,.user-dropdown").on('click', function(e) {
        e.stopPropagation();
    });

    $("#header-notifications .notifications-content a").live("click",function(event) {
      //  event.stopPropagation();
        if(!$(this).hasClass('notification-expand') && $(this).parents('.notification-share').length == 0 ) {
            event.stopPropagation();
            event.preventDefault();
            var that = $(this);
            closeHeaderDropDowns( function(){
                 window.location = that.attr('href');
            });
        }
    });
    $("#header-notifications").live("click",function(event) {
        event.stopPropagation();
        if($(this).find('.notifications-content ul li').length<1)
            return false;
        if($(this).find('.notifications').hasClass("notifications-sel")) {
            // $(this).find('.unread-heading .count').text('0');
            // $(this).find('.unread-heading').removeClass('unread-heading');
            // $(this).find('.notifications-content li.unread').removeClass('unread');
            $(this).find('.notifications').removeClass("notifications-sel");

            $("#header-notifications-content").hide();
            closeHeaderDropDowns();
        } else {
            closeHeaderDropDowns();
            if($(this).find('.notifications').hasClass("unread-heading")){
                $(this).find('.notifications').addClass("read-heading");
            }
            $(document).bind('click.headerDropDowns', closeHeaderDropDowns);
            $(this).find('.notifications').addClass("notifications-sel");
            $("#header-notifications-content").show();
            fixHeaderNotificationsHeight();
        }
    });
    $("#header-messages").live("click",function(event) {
        event.stopPropagation();
        if($(this).find('.messages-content ul li').length<1)
            return false;
        if($(this).find('.notifications').hasClass("notifications-sel")) {
            // $(this).find('.unread-heading .count').text('0');
            // $(this).find('.unread-heading').removeClass('unread-heading');
            // $(this).find('.notifications-content li.unread').removeClass('unread');
            $(this).find('.notifications').removeClass("notifications-sel");

            $("#header-messages-content").hide();
            closeHeaderDropDowns();
        } else {
            closeHeaderDropDowns();
            if($(this).find('.notifications').hasClass("unread-heading")){
                $(this).find('.notifications').addClass("read-heading");
            }
            $(document).bind('click.headerDropDowns', closeHeaderDropDowns);
            $(this).find('.notifications').addClass("notifications-sel");
            $("#header-messages-content").show();
            fixHeaderNotificationsHeight();
        }
    });

}
var notified=0;

function closeHeaderDropDowns(ajaxCallback) {
    if (typeof(closeDropDowns) === 'function' ) {
        closeDropDowns();
    }

    $(document).unbind('click.headerDropDowns');

    $("#header-login-dd-link").removeClass("user-tab-sel");
    $("#city_list").removeClass("city-list-sel");
    $("#lang_list").removeClass("lang-list-sel");
    $('#get-mobile-app-content').hide();
    // $('.get-mobile-app a img').css({'background-color': 'transparent'});

    $("#header-notifications .notifications").removeClass("notifications-sel");
    $("#header-notifications-content").fadeOut(150);

    $(".header-messages .notifications-sel").removeClass('notifications-sel');
    $(".header-messages .messages-content").hide();

    if($('#header-notifications .notifications').hasClass('read-heading')) {
        $('#header-notifications .unread-heading .count').text('0');
        $('#header-notifications .unread-heading').removeClass('unread-heading read-heading');
        if(notified==0){
            notified=1;
            $.ajax({
                url: HOST+"php/update_read_notify.php",
                success: function(response) {
                    updateTitleNotifyCount();
                    if (typeof(ajaxCallback) === 'function' ){ ajaxCallback() };
                }
            });
        }
        $('#header-notifications .notifications-content li.unread').removeClass('unread');
    }
    else{
        if (typeof(ajaxCallback) === 'function' ) {
            ajaxCallback();
        }
    }
}

function updateTitleNotifyCount(){
    if(typeof(zomato.originalPageTitle) == "undefined"){
        zomato.originalPageTitle = document.title;
    }
    var unread_count = $('#header-notifications .unread-heading .count').text();
    if(unread_count>0){
        document.title = "("+unread_count+") "+zomato.originalPageTitle;
    }
    else{
        document.title = zomato.originalPageTitle;
    }
}

zomato.iosTipsyFix = function() {
    $(".tooltip").on('touchstart touchend', function() {
        var elem = $(this);
        setTimeout(function() {
            elem.click();
        }, 500);
    });
};

function setRetinaDisplayCookie() {
    if(window.devicePixelRatio != "undefined") {
        setCookie('dpr', window.devicePixelRatio, 365);
    }
}

/*
function setBrowserSupportCookie() {
    if(typeof Modernizr != 'undefined') {
        // Set retina=false in cookie if browser does not support
        // SVG or CSS generate content
        try {
            if(!Modernizr.svg || !Modernizr.generatedcontent) {
                // _gaq.push(['_setCustomVar', 1, 'Supports icon fonts', 'Yes', 2 ], ['t3._setCustomVar', 1, 'Supports icon fonts', 'Yes', 2 ]);
                setCookie('r', 'false', 365);
            } else {
                // _gaq.push(['_setCustomVar', 1, 'Supports icon fonts', 'No', 2 ], ['t3._setCustomVar', 1, 'Supports icon fonts', 'No', 2 ]);
                setCookie('r', 'true', 1);
            }
        } catch (e) {}
    }
}
*/

/**
 * Reposition headliner banner placed by openx at the bottom of page to below the header
 * Collapse white space if banner not present
 */
function relocateHeadlinerBanner() {
    if($("#headliner_temp a img").length && $("#headliner_container").length) {

        $("#headliner_temp a").remove().appendTo($("#headliner_container"));
        if(typeof was_headliner_set != 'undefined' && was_headliner_set == false) {
            $("#headliner_container").show();

            // Send an ajax call to set value in cache
            /*
            $.ajax({
                url: HOST + "php/set_headliner_cache",
                data: {
                    req: encodeURIComponent(location.href),
                    time: new Date().getTime() / 1000
                },
                success: function(response) {
                }
            });
            */
        }
    } else {
        $("#headliner_container").hide();
    }
}

//Debug FB users with no email
function logFBDebug() {
    $.ajax({url: HOST+'php/common_social_handler.php?type=log_fb_debug'});
}

//Coke Ad Campaign
function cokeImpression(page, url) {
    var timestamp = new Date().getTime();
    switch(page) {
        case 'foodshot_impression':
            $.ajax({
                url: 'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=5689949&PluID=0&ord='+timestamp+'&rtu=-1'
            });
        break;
        case 'foodshot_click':
            /*$.ajax({
                url: 'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=5689949&PluID=0&ord='+timestamp
            });*/
           var url = 'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=5689949&PluID=0&ord='+timestamp;
           return url;
        break;
        case 'res_impression':
            $.ajax({
                url: 'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=5689958&PluID=0&ord='+timestamp+'&rtu=-1'
            });
        break;
         case 'res_click':
            /*$.ajax({
                url: 'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=5689958&PluID=0&ord='+timestamp
            });*/
            var url = 'http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=5689958&PluID=0&ord='+timestamp;
            //$(".coke-ad a").attr('href', url);
            return url;
        break;

    }
}

function validateEmail(val) {
    var atpos=val.indexOf("@");
    var dotpos=val.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=val.length) {
        return false;
    }
    return true;
}

function placeholderFixUpdate(id) {
   if(!Modernizr.input.placeholder){
        $("#"+id).each( function(){
            if($(this).val()=="" && $(this).attr("placeholder")!=""){
                $(this).val($(this).attr("placeholder"));
            }
        });
    }
}
function placeholderFixreset(id) {
    if(!Modernizr.input.placeholder){
        $("#"+id).each( function(){
            $(this).on('keydown.pf', function(){
                if($(this).val()==$(this).attr("placeholder")) {
                    $(this).val("");
                }
            });
            $(this).on('blur.pf', function(){
                if($(this).val()=="") {
                    $(this).val($(this).attr("placeholder"));
                }
            });
        });
    }
}

function placeholderFix(id) {
    if(!Modernizr.input.placeholder){
        $("#"+id).each( function(){
            if($(this).val() == "" && $(this).attr("placeholder") != "") {
                $(this).val($(this).attr("placeholder"));

                $(this).on('keydown.pf', function(){
                    if($(this).val()==$(this).attr("placeholder")) {
                        $(this).val("");
                    }
                });

                $(this).on('blur.pf', function(){
                    if($(this).val()=="") {
                        $(this).val($(this).attr("placeholder"));
                    }
                });
            }
        });
    }
}



function morelinkActions() {
    $(".review_reply_more").on('click', function(e) {
        e.preventDefault();
        $(this).parent('span').hide();
        $(this).parent('span').next('.review_reply_rest').show();
    });
}


var progressingInterval = null;
var progressbarDone = false;


/*
   To upload images with reviews in IE. (html5_uploader is incompatible with IE)
   Single Image will be uploaded at one time using iframe.
   */
function upload_ie_images(input_file_button, review_id)
{
    var parent_obj = $('.review-photos[data-review_id="'+review_id+'"]');
    if(input_file_button==1){
        parent_obj.find('#my_ie_form').attr('target', 'my_iframe');
        parent_obj.find('#my_ie_form').submit();
    }
    if(input_file_button==2){
        parent_obj.find('#my_ie_form2').attr('target', 'my_iframe');
        parent_obj.find('#my_ie_form2').submit();
    }

}

$( '#language_bar_dismiss' ).click( function( event ) {
	$( '#language-not-supported' ).remove();
} );
var setupLoginSignupDialog = function() {
    if($("#login-email").data('bound'))
        return;

    $("#login-email").on('click', function(event) {
        event.preventDefault();
        $(this).data('bound', true);
        zomato.auth.switchLoginDialogPage('login-form-dialog');
        $("#ld-email").focus();
    });

    $("#signup-email").on('click', function(event) {
        event.preventDefault();
        zomato.auth.switchLoginDialogPage('signup-form');
        $("#sd-fullname").focus();
    });

    $(".ld-forgotpass").on('click', function(event) {
        event.preventDefault();
        zomato.auth.switchLoginDialogPage('ld-reset-password');
    });

    $("#forgot-password-back").on('click', function(event) {
        event.preventDefault();
        zomato.auth.switchLoginDialogPage('login-form-dialog');
        $("#ld-email").focus();
    });

    $("#ld-login-back").on('click', function(event) {
        event.preventDefault();
        zomato.auth.switchLoginDialogPage('login-home');
    });

    $("#ld-signup-back").on('click', function(event) {
        event.preventDefault();
        zomato.auth.switchLoginDialogPage('login-home');
    });

    $("#rp-form").on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: HOST+"php/resetPassword.php",
            type: "POST",
            data: "email="+encodeURIComponent($("#reset-password-email").val())+"&type=resetRequest",
            success: function(response) {
                var r = eval('('+response+')');

                $("#reset-password-message").html(r.message).parent().fadeIn();
            }
        });
    });

    zomato.auth.bindResendVerificationEmailEvents();
};

var setupGetMobileAppsEvents = function() {
    $(".mobile-apps a").on('click', function() {
        _gaq = typeof _gaq == 'undefined' ? [] : _gaq;
        _gaq.push(['t3._trackEvent', 'Mobile App', 'Click_'+$(this).attr('class')]);
    });

    $("#mobile_apps_get_links_go").on('click', function(event) {
        event.preventDefault();
        var email = $('#mobile_apps_get_links_email').val().replace(/^\s*/, '').replace(/\s*$/, '');
        var csrf = $("#mobile_apps_csrf").val();
        if(email == '') {
            $("#mobile_apps_get_links_email").css('border-color', '#cb202d');
        } else {
            $("#mobile_apps_get_links_email").css('border-color', '#dedede');
        }
        $("#mobile_apps_get_links_error").hide();

        $.ajax({
            url: HOST+'php/get_mobile_apps',
            data: {emailid: email, csrf: csrf},
            dataType: 'json',
            success: function(response) {
                if(response.status == 'success') {
                    $("#mobile_apps_get_links_success").html(response.message).show();
                    $("#mobile_apps_get_links_section").hide();
                    setTimeout(function() {
                        if($('#get-mobile-app-content').is(':visible')) {
                            closeHeaderDropDowns();
                        }
                    }, 5000);
                } else {
                    $("#mobile_apps_get_links_email").css('border-color', '#cb202d');
                    $("#mobile_apps_get_links_error").text(response.message).show();
                }
            },
            error: function() {
            }
        });
    });
};

var printGuideBuyEvent = function() {
    $('.guide-quantity').change(function(){
        var quant = $(this).val();
        var total_amount = quant * $('.guide-total').data('amount');
        var mug_amount = 1 * quant;
        $('.guide-total').text(total_amount);
        $('.mug-total').text(mug_amount);
        if (mug_amount > 1) {
            $('.zom-mug').text("Mugs");
        } else {
            $('.zom-mug').text("Mug");
        };
    });

    if($("#print-guide-buy-container").length) {
        var original_position = $('#print-guide-buy-container').css('position');
        var original_top = $('#print-guide-buy-container').css('top');
        var offset_top = $('#print-guide-buy-container').offset().top - 10;
        $(window).scroll(function() {
            var scroll_height = $(this).scrollTop();
            if(scroll_height > offset_top && scroll_height<1482){
                $('#print-guide-buy-container').css({'position': 'fixed', 'top': '0'});
            }

            var footer_height = $('footer').height()
            var footer_offset = $('footer').offset().top;
            if(scroll_height >= footer_offset - footer_height){
                $('#print-guide-buy-container').css({'position':'absolute', 'top': footer_offset-footer_height});
            }

            if(scroll_height <= offset_top){
                console.log(original_position);
                $('#print-guide-buy-container').css({'position': original_position, 'top': original_top});
            }
        });
    }
};

$('#personalised-onoffswitch').on('change', function(event) {
    var $onoffswitch = $(this);
    if($onoffswitch.is(":checked")) {
        curr_state = "off";
        // $('.onoffswitch').attr('title', 'Click to switch personalised ratings off').tipsy();
    } else {
        curr_state = "on";
        // $('.onoffswitch').attr('title', 'Click to switch personalised ratings on').tipsy();
    }
    togglePersonalisation(curr_state);
});

function replaceRatingLevel(elem, newval) {
    var class_val = $(elem).attr('class'), old_class;
    class_val = class_val.split(' ');
    for ( var i = 0; i < class_val.length; i++ ) {
        if ( class_val[i].match(/level/) )
            old_class = class_val[i];
    }
    elem.removeClass(old_class).addClass(newval);
    return elem;
}

function togglePersonalisation(curr_state) {
    var res_ids = [],
        that = $(this);
    $('.rating-div').each( function() {
        res_ids.push(  $(this).data('res-id') );
    });

    $.ajax({
        url: HOST + 'php/update_rating_preference',
        type: 'POST',
        dataType: 'json',
        data: { res_ids: res_ids, state: curr_state },
        success: function(response) {
            if(response.status!='failed'){
                if($('.onoffswitch').data('reload') == true) {
                    setTimeout(function() {window.location.reload()}, 500);
                    //return;
                } else {
                    var votes_text;
                    for ( var prop in response ) {
                        if ( response.hasOwnProperty(prop) ) {
                            var elem = $('.rating-for-' + prop );
                            if ( elem.hasClass('rrw-aggregate') ) {
                                elem = replaceRatingLevel(elem, response[prop].rating_level);
                                elem.text(response[prop].rating);
                                $('.rating-text-div').text(response[prop].rating_text);
                                $('.rating-votes-div').html(response[prop].votes_text);
                            } else if ( elem.hasClass('top-res-box-rating') )  {
                                elem = replaceRatingLevel(elem, response[prop].rating_level);
                                elem.text(response[prop].rating);
                            } else {
                                elem = replaceRatingLevel(elem, response[prop].rating_level);
                                elem.text(response[prop].rating);
                                $('.rating-text-div-' + prop).text(response[prop].rating_text);
                			    if(curr_state == 'on') {
                                    votes_text = response[prop].votes + ' user votes';
                			    }else {
                    				votes_text = response[prop].votes_text;
                    			}
                                $('.rating-votes-div-' + prop).text(votes_text);
                            }
                        }
                    }
                }
            }
        },
        error: function() {}
    });
}

/*$('#rating-onoff').click( function(event) {
    event.preventDefault();
    var res_ids = [],
        that = $(this),
        curr_state = $(this).data('state'),
        reload = $(this).data('reload');

    $('.rating-div').each( function() {
        res_ids.push(  $(this).data('res-id') );
    });

    $.ajax({
        url: HOST + 'php/update_rating_preference',
        type: 'POST',
        dataType: 'json',
        data: { res_ids: res_ids, state: curr_state },
        success: function(response) {
            if(response.status!='failed'){
                var votes_text;
                for ( var prop in response ) {
                    if ( response.hasOwnProperty(prop) ) {
                        var elem = $('.rating-for-' + prop );
                        if ( elem.hasClass('rrw-aggregate') ) {
                            elem = replaceRatingLevel(elem, response[prop].rating_level);
                            elem.text(response[prop].rating);
                            $('.rating-text-div').text(response[prop].rating_text);
                            $('.rating-votes-div').html(response[prop].votes_text);
                        } else if ( elem.hasClass('top-res-box-rating') )  {
                            elem = replaceRatingLevel(elem, response[prop].rating_level);
                            elem.text(response[prop].rating);
                        } else {
                            elem = replaceRatingLevel(elem, response[prop].rating_level);
                            elem.text(response[prop].rating);
                            $('.rating-text-div-' + prop).text(response[prop].rating_text);
                            votes_text = response[prop].votes + ' user votes';
                            $('.rating-votes-div-' + prop).text(votes_text);
                        }
                    }
                }
                if ( curr_state  == 'on' ) {
                    that.data('state', 'off');
                    that.css({
                        'background-color': '#e4e4e2',
                        'color': '#4d4d49'
                    });
                    // that.text('NO');
                } else {
                    that.data('state', 'on');
                    that.css({
                        'background-color': '#51a351',
                        'color': '#f4f4f2'
                    });
                    // that.text('YES');
                }
                // In case of search page sorted by rating.
                if(reload == 'reload') {
                    window.location.reload();
                    that.text('YES');

                }

            }
        },
        error: function() {}
    });
});
*/

function pinReviewHandler() {
    $('.res-reviews-container').on('click', '.pin_review', function(e){
        e.preventDefault();
        var pin_button = $(this);
        var pin_status = $(this).data('status');
        var review_id = pin_button.data('review-id');
        pin_button.html('<img width="20" src="'+HOST+'images/loading-transparent.gif"/>').attr('data-icon','');
        data = {'pin_status':pin_status,'review_id': review_id};
        $.ajax({
            url: HOST+'php/reviewPinHandler.php',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(data){
                pin_button.html('').attr('data-icon','?');
                if(data['message'] == 'success'){
                    if(pin_status==0) {
                        pin_button.addClass('btn-red').data('status',1);
                        pin_button.trigger('mouseout').addClass('tooltip_formatted').attr('title',zomato.language.getText('zm-common-js-unpin-title')).tipsy().trigger('mouseover').trigger('mouseout');
                    }
                    else {
                        pin_button.removeClass('btn-red').data('status',0);
                        pin_button.trigger('mouseout').addClass('tooltip_formatted').attr('title',zomato.language.getText('zm-common-js-pin-title')).tipsy().trigger('mouseover').trigger('mouseout');
                    }
                }
                else{
                    alert(data['message'])
                }
            }
        }, "json");

        // case update is to be added.
            //alert(review_id);
    });
}

function onNewMessageNotification(message) {
    var data = {'user': USER_ID};
    $.ajax({
        url: HOST+'php/user_messages_handler',
        type: 'GET',
        dataType: 'JSON',
        data: data,
        success: function(response){
            if(response.status == 'success'){
                $('.header-messages').html(response.html);
                if(window.location.hash.split('-')[1] == message.thread){
                    $('.messages-list').append(message.html.thread_html);
                    $('.messages-list').scrollTop($('.messages-list').get(0).scrollHeight);
                    //markMessageRead($('.user-message-thread'), message.thread);
                }

                $('.user-profile-message-item.latest-message[data-thread="'+message.thread+'"]').remove();
                $('.latest-message-selected').removeClass('latest-message-selected');
                $('.user-profile-message-container').prepend(message.html.latest_html);

            } else {
                console.error(response.message);
            }
        }
    });
}

// converts time into friendly string.
var friendlyUnixTime = function(t){
    var t_inSeconds = t/1000;
    var second = 1;
    var minute = 60 * second;
    var hour = 60 * minute;
    var day = 24 * hour;
    var month = 30 * day;

    if(t_inSeconds < 1 * minute)
        return "just now";
    if(t_inSeconds < 2 * minute)
        return "a minute ago";
    if(t_inSeconds < 45 * minute)
        return Math.round(t_inSeconds/minute) + " minutes ago";
    if(t_inSeconds < 90 * minute)
        return "an hour ago";
    if(t_inSeconds < 24 * hour)
        return Math.round(t_inSeconds/hour) + " hours ago";
    if(t_inSeconds < 48 * hour)
        return "yesterday";
    if(t_inSeconds < 30 * day)
        return Math.round(t_inSeconds/day) + " days ago";
    else
        var months = t_inSeconds/month;
        return months <= 1 ? "a month ago" : Math.round(months) + " months ago";
}

// Make timestamp real time.
zomato.friendlyTime = function(){
    //db_time needed to be in milliseconds
    var times = $('.zm-time');
    var offset_complement = -1 * new Date().getTimezoneOffset() * 60000;
    var zomato_offset = -19800000;
    var current_time = (new Date()).getTime();
    times.each(function(index, time_html) {
        var db_time = ($(time_html).data('timestamp') | 0 ) * 1000;
        db_time += offset_complement + zomato_offset;
        var time_diff = current_time - db_time;
        var friendly_time = friendlyUnixTime(time_diff);
        $(time_html).text(friendly_time);
    });
};

zomato.prepareReadMoreLinks = function(container) {
    $container = $(container);
    $container.off('click', ".z-comment-read-more");
    $container.on('click', '.z-comment-read-more', function(event){
        event.preventDefault();
        var parent = $(this).parents('.z-comment-container');
        $(parent).find('.z-comment-more').removeClass('hidden');
        $(parent).find('.z-comment-ellipsis').hide();
        $(parent).find('.z-comment-read-more').hide();
    });
}

zomato.prepareReadMoreReview = function (delegate, parent) {
    $delegate = $(delegate);
    $delegate.off('click', '.read-more-self');
    $delegate.on('click', '.read-more-self', function(event) {
        event.preventDefault();
        var parent = $(this).parents(parent);
        $(parent).children('.rev-def-text').hide();
        $(parent).children('.rev-comp-text').show();
    });
}


/*
 * jQuery Cycle Plugin (with Transition Definitions)
 * Examples and documentation at: http://jquery.malsup.com/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version: 2.97 (14-FEB-2011)
 * Dual licensed under the MIT and GPL licenses.
 * http://jquery.malsup.com/license.html
 * Requires: jQuery v1.3.2 or later
 */
;(function($){var ver="2.97";if($.support==undefined){$.support={opacity:!($.browser.msie)};}function debug(s){$.fn.cycle.debug&&log(s);}function log(){window.console&&console.log&&console.log("[cycle] "+Array.prototype.join.call(arguments," "));}$.expr[":"].paused=function(el){return el.cyclePause;};$.fn.cycle=function(options,arg2){var o={s:this.selector,c:this.context};if(this.length===0&&options!="stop"){if(!$.isReady&&o.s){log("DOM not ready, queuing slideshow");$(function(){$(o.s,o.c).cycle(options,arg2);});return this;}log("terminating; zero elements found by selector"+($.isReady?"":" (DOM not ready)"));return this;}return this.each(function(){var opts=handleArguments(this,options,arg2);if(opts===false){return;}opts.updateActivePagerLink=opts.updateActivePagerLink||$.fn.cycle.updateActivePagerLink;if(this.cycleTimeout){clearTimeout(this.cycleTimeout);}this.cycleTimeout=this.cyclePause=0;var $cont=$(this);var $slides=opts.slideExpr?$(opts.slideExpr,this):$cont.children();var els=$slides.get();if(els.length<2){log("terminating; too few slides: "+els.length);return;}var opts2=buildOptions($cont,$slides,els,opts,o);if(opts2===false){return;}var startTime=opts2.continuous?10:getTimeout(els[opts2.currSlide],els[opts2.nextSlide],opts2,!opts2.backwards);if(startTime){startTime+=(opts2.delay||0);if(startTime<10){startTime=10;}debug("first timeout: "+startTime);this.cycleTimeout=setTimeout(function(){go(els,opts2,0,!opts.backwards);},startTime);}});};function handleArguments(cont,options,arg2){if(cont.cycleStop==undefined){cont.cycleStop=0;}if(options===undefined||options===null){options={};}if(options.constructor==String){switch(options){case"destroy":case"stop":var opts=$(cont).data("cycle.opts");if(!opts){return false;}cont.cycleStop++;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);}cont.cycleTimeout=0;$(cont).removeData("cycle.opts");if(options=="destroy"){destroy(opts);}return false;case"toggle":cont.cyclePause=(cont.cyclePause===1)?0:1;checkInstantResume(cont.cyclePause,arg2,cont);return false;case"pause":cont.cyclePause=1;return false;case"resume":cont.cyclePause=0;checkInstantResume(false,arg2,cont);return false;case"prev":case"next":var opts=$(cont).data("cycle.opts");if(!opts){log('options not found, "prev/next" ignored');return false;}$.fn.cycle[options](opts);return false;default:options={fx:options};}return options;}else{if(options.constructor==Number){var num=options;options=$(cont).data("cycle.opts");if(!options){log("options not found, can not advance slide");return false;}if(num<0||num>=options.elements.length){log("invalid slide index: "+num);return false;}options.nextSlide=num;if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}if(typeof arg2=="string"){options.oneTimeFx=arg2;}go(options.elements,options,1,num>=options.currSlide);return false;}}return options;function checkInstantResume(isPaused,arg2,cont){if(!isPaused&&arg2===true){var options=$(cont).data("cycle.opts");if(!options){log("options not found, can not resume");return false;}if(cont.cycleTimeout){clearTimeout(cont.cycleTimeout);cont.cycleTimeout=0;}go(options.elements,options,1,!options.backwards);}}}function removeFilter(el,opts){if(!$.support.opacity&&opts.cleartype&&el.style.filter){try{el.style.removeAttribute("filter");}catch(smother){}}}function destroy(opts){if(opts.next){$(opts.next).unbind(opts.prevNextEvent);}if(opts.prev){$(opts.prev).unbind(opts.prevNextEvent);}if(opts.pager||opts.pagerAnchorBuilder){$.each(opts.pagerAnchors||[],function(){this.unbind().remove();});}opts.pagerAnchors=null;if(opts.destroy){opts.destroy(opts);}}function buildOptions($cont,$slides,els,options,o){var opts=$.extend({},$.fn.cycle.defaults,options||{},$.metadata?$cont.metadata():$.meta?$cont.data():{});if(opts.autostop){opts.countdown=opts.autostopCount||els.length;}var cont=$cont[0];$cont.data("cycle.opts",opts);opts.$cont=$cont;opts.stopCount=cont.cycleStop;opts.elements=els;opts.before=opts.before?[opts.before]:[];opts.after=opts.after?[opts.after]:[];if(!$.support.opacity&&opts.cleartype){opts.after.push(function(){removeFilter(this,opts);});}if(opts.continuous){opts.after.push(function(){go(els,opts,0,!opts.backwards);});}saveOriginalOpts(opts);if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($slides);}if($cont.css("position")=="static"){$cont.css("position","relative");}if(opts.width){$cont.width(opts.width);}if(opts.height&&opts.height!="auto"){$cont.height(opts.height);}if(opts.startingSlide){opts.startingSlide=parseInt(opts.startingSlide);}else{if(opts.backwards){opts.startingSlide=els.length-1;}}if(opts.random){opts.randomMap=[];for(var i=0;i<els.length;i++){opts.randomMap.push(i);}opts.randomMap.sort(function(a,b){return Math.random()-0.5;});opts.randomIndex=1;opts.startingSlide=opts.randomMap[1];}else{if(opts.startingSlide>=els.length){opts.startingSlide=0;}}opts.currSlide=opts.startingSlide||0;var first=opts.startingSlide;$slides.css({position:"absolute",top:0,left:0}).hide().each(function(i){var z;if(opts.backwards){z=first?i<=first?els.length+(i-first):first-i:els.length-i;}else{z=first?i>=first?els.length-(i-first):first-i:els.length-i;}$(this).css("z-index",z);});$(els[first]).css("opacity",1).show();removeFilter(els[first],opts);if(opts.fit&&opts.width){$slides.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$slides.height(opts.height);}var reshape=opts.containerResize&&!$cont.innerHeight();if(reshape){var maxw=0,maxh=0;for(var j=0;j<els.length;j++){var $e=$(els[j]),e=$e[0],w=$e.outerWidth(),h=$e.outerHeight();if(!w){w=e.offsetWidth||e.width||$e.attr("width");}if(!h){h=e.offsetHeight||e.height||$e.attr("height");}maxw=w>maxw?w:maxw;maxh=h>maxh?h:maxh;}if(maxw>0&&maxh>0){$cont.css({width:maxw+"px",height:maxh+"px"});}}if(opts.pause){$cont.hover(function(){this.cyclePause++;},function(){this.cyclePause--;});}if(supportMultiTransitions(opts)===false){return false;}var requeue=false;options.requeueAttempts=options.requeueAttempts||0;$slides.each(function(){var $el=$(this);this.cycleH=(opts.fit&&opts.height)?opts.height:($el.height()||this.offsetHeight||this.height||$el.attr("height")||0);this.cycleW=(opts.fit&&opts.width)?opts.width:($el.width()||this.offsetWidth||this.width||$el.attr("width")||0);if($el.is("img")){var loadingIE=($.browser.msie&&this.cycleW==28&&this.cycleH==30&&!this.complete);var loadingFF=($.browser.mozilla&&this.cycleW==34&&this.cycleH==19&&!this.complete);var loadingOp=($.browser.opera&&((this.cycleW==42&&this.cycleH==19)||(this.cycleW==37&&this.cycleH==17))&&!this.complete);var loadingOther=(this.cycleH==0&&this.cycleW==0&&!this.complete);if(loadingIE||loadingFF||loadingOp||loadingOther){if(o.s&&opts.requeueOnImageNotLoaded&&++options.requeueAttempts<100){log(options.requeueAttempts," - img slide not loaded, requeuing slideshow: ",this.src,this.cycleW,this.cycleH);setTimeout(function(){$(o.s,o.c).cycle(options);},opts.requeueTimeout);requeue=true;return false;}else{log("could not determine size of image: "+this.src,this.cycleW,this.cycleH);}}}return true;});if(requeue){return false;}opts.cssBefore=opts.cssBefore||{};opts.cssAfter=opts.cssAfter||{};opts.cssFirst=opts.cssFirst||{};opts.animIn=opts.animIn||{};opts.animOut=opts.animOut||{};$slides.not(":eq("+first+")").css(opts.cssBefore);$($slides[first]).css(opts.cssFirst);if(opts.timeout){opts.timeout=parseInt(opts.timeout);if(opts.speed.constructor==String){opts.speed=$.fx.speeds[opts.speed]||parseInt(opts.speed);}if(!opts.sync){opts.speed=opts.speed/2;}var buffer=opts.fx=="none"?0:opts.fx=="shuffle"?500:250;while((opts.timeout-opts.speed)<buffer){opts.timeout+=opts.speed;}}if(opts.easing){opts.easeIn=opts.easeOut=opts.easing;}if(!opts.speedIn){opts.speedIn=opts.speed;}if(!opts.speedOut){opts.speedOut=opts.speed;}opts.slideCount=els.length;opts.currSlide=opts.lastSlide=first;if(opts.random){if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.backwards){opts.nextSlide=opts.startingSlide==0?(els.length-1):opts.startingSlide-1;}else{opts.nextSlide=opts.startingSlide>=(els.length-1)?0:opts.startingSlide+1;}}if(!opts.multiFx){var init=$.fn.cycle.transitions[opts.fx];if($.isFunction(init)){init($cont,$slides,opts);}else{if(opts.fx!="custom"&&!opts.multiFx){log("unknown transition: "+opts.fx,"; slideshow terminating");return false;}}}var e0=$slides[first];if(opts.before.length){opts.before[0].apply(e0,[e0,e0,opts,true]);}if(opts.after.length>1){opts.after[1].apply(e0,[e0,e0,opts,true]);}if(opts.next){$(opts.next).bind(opts.prevNextEvent,function(){return advance(opts,1);});}if(opts.prev){$(opts.prev).bind(opts.prevNextEvent,function(){return advance(opts,0);});}if(opts.pager||opts.pagerAnchorBuilder){buildPager(els,opts);}exposeAddSlide(opts,els);return opts;}function saveOriginalOpts(opts){opts.original={before:[],after:[]};opts.original.cssBefore=$.extend({},opts.cssBefore);opts.original.cssAfter=$.extend({},opts.cssAfter);opts.original.animIn=$.extend({},opts.animIn);opts.original.animOut=$.extend({},opts.animOut);$.each(opts.before,function(){opts.original.before.push(this);});$.each(opts.after,function(){opts.original.after.push(this);});}function supportMultiTransitions(opts){var i,tx,txs=$.fn.cycle.transitions;if(opts.fx.indexOf(",")>0){opts.multiFx=true;opts.fxs=opts.fx.replace(/\s*/g,"").split(",");for(i=0;i<opts.fxs.length;i++){var fx=opts.fxs[i];tx=txs[fx];if(!tx||!txs.hasOwnProperty(fx)||!$.isFunction(tx)){log("discarding unknown transition: ",fx);opts.fxs.splice(i,1);i--;}}if(!opts.fxs.length){log("No valid transitions named; slideshow terminating.");return false;}}else{if(opts.fx=="all"){opts.multiFx=true;opts.fxs=[];for(p in txs){tx=txs[p];if(txs.hasOwnProperty(p)&&$.isFunction(tx)){opts.fxs.push(p);}}}}if(opts.multiFx&&opts.randomizeEffects){var r1=Math.floor(Math.random()*20)+30;for(i=0;i<r1;i++){var r2=Math.floor(Math.random()*opts.fxs.length);opts.fxs.push(opts.fxs.splice(r2,1)[0]);}debug("randomized fx sequence: ",opts.fxs);}return true;}function exposeAddSlide(opts,els){opts.addSlide=function(newSlide,prepend){var $s=$(newSlide),s=$s[0];if(!opts.autostopCount){opts.countdown++;}els[prepend?"unshift":"push"](s);if(opts.els){opts.els[prepend?"unshift":"push"](s);}opts.slideCount=els.length;$s.css("position","absolute");$s[prepend?"prependTo":"appendTo"](opts.$cont);if(prepend){opts.currSlide++;opts.nextSlide++;}if(!$.support.opacity&&opts.cleartype&&!opts.cleartypeNoBg){clearTypeFix($s);}if(opts.fit&&opts.width){$s.width(opts.width);}if(opts.fit&&opts.height&&opts.height!="auto"){$s.height(opts.height);}s.cycleH=(opts.fit&&opts.height)?opts.height:$s.height();s.cycleW=(opts.fit&&opts.width)?opts.width:$s.width();$s.css(opts.cssBefore);if(opts.pager||opts.pagerAnchorBuilder){$.fn.cycle.createPagerAnchor(els.length-1,s,$(opts.pager),els,opts);}if($.isFunction(opts.onAddSlide)){opts.onAddSlide($s);}else{$s.hide();}};}$.fn.cycle.resetState=function(opts,fx){fx=fx||opts.fx;opts.before=[];opts.after=[];opts.cssBefore=$.extend({},opts.original.cssBefore);opts.cssAfter=$.extend({},opts.original.cssAfter);opts.animIn=$.extend({},opts.original.animIn);opts.animOut=$.extend({},opts.original.animOut);opts.fxFn=null;$.each(opts.original.before,function(){opts.before.push(this);});$.each(opts.original.after,function(){opts.after.push(this);});var init=$.fn.cycle.transitions[fx];if($.isFunction(init)){init(opts.$cont,$(opts.elements),opts);}};function go(els,opts,manual,fwd){if(manual&&opts.busy&&opts.manualTrump){debug("manualTrump in go(), stopping active transition");$(els).stop(true,true);opts.busy=0;}if(opts.busy){debug("transition active, ignoring new tx request");return;}var p=opts.$cont[0],curr=els[opts.currSlide],next=els[opts.nextSlide];if(p.cycleStop!=opts.stopCount||p.cycleTimeout===0&&!manual){return;}if(!manual&&!p.cyclePause&&!opts.bounce&&((opts.autostop&&(--opts.countdown<=0))||(opts.nowrap&&!opts.random&&opts.nextSlide<opts.currSlide))){if(opts.end){opts.end(opts);}return;}var changed=false;if((manual||!p.cyclePause)&&(opts.nextSlide!=opts.currSlide)){changed=true;var fx=opts.fx;curr.cycleH=curr.cycleH||$(curr).height();curr.cycleW=curr.cycleW||$(curr).width();next.cycleH=next.cycleH||$(next).height();next.cycleW=next.cycleW||$(next).width();if(opts.multiFx){if(opts.lastFx==undefined||++opts.lastFx>=opts.fxs.length){opts.lastFx=0;}fx=opts.fxs[opts.lastFx];opts.currFx=fx;}if(opts.oneTimeFx){fx=opts.oneTimeFx;opts.oneTimeFx=null;}$.fn.cycle.resetState(opts,fx);if(opts.before.length){$.each(opts.before,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});}var after=function(){opts.busy=0;$.each(opts.after,function(i,o){if(p.cycleStop!=opts.stopCount){return;}o.apply(next,[curr,next,opts,fwd]);});};debug("tx firing("+fx+"); currSlide: "+opts.currSlide+"; nextSlide: "+opts.nextSlide);opts.busy=1;if(opts.fxFn){opts.fxFn(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}else{if($.isFunction($.fn.cycle[opts.fx])){$.fn.cycle[opts.fx](curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}else{$.fn.cycle.custom(curr,next,opts,after,fwd,manual&&opts.fastOnEvent);}}}if(changed||opts.nextSlide==opts.currSlide){opts.lastSlide=opts.currSlide;if(opts.random){opts.currSlide=opts.nextSlide;if(++opts.randomIndex==els.length){opts.randomIndex=0;}opts.nextSlide=opts.randomMap[opts.randomIndex];if(opts.nextSlide==opts.currSlide){opts.nextSlide=(opts.currSlide==opts.slideCount-1)?0:opts.currSlide+1;}}else{if(opts.backwards){var roll=(opts.nextSlide-1)<0;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=1;opts.currSlide=0;}else{opts.nextSlide=roll?(els.length-1):opts.nextSlide-1;opts.currSlide=roll?0:opts.nextSlide+1;}}else{var roll=(opts.nextSlide+1)==els.length;if(roll&&opts.bounce){opts.backwards=!opts.backwards;opts.nextSlide=els.length-2;opts.currSlide=els.length-1;}else{opts.nextSlide=roll?0:opts.nextSlide+1;opts.currSlide=roll?els.length-1:opts.nextSlide-1;}}}}if(changed&&opts.pager){opts.updateActivePagerLink(opts.pager,opts.currSlide,opts.activePagerClass);}var ms=0;if(opts.timeout&&!opts.continuous){ms=getTimeout(els[opts.currSlide],els[opts.nextSlide],opts,fwd);}else{if(opts.continuous&&p.cyclePause){ms=10;}}if(ms>0){p.cycleTimeout=setTimeout(function(){go(els,opts,0,!opts.backwards);},ms);}}$.fn.cycle.updateActivePagerLink=function(pager,currSlide,clsName){$(pager).each(function(){$(this).children().removeClass(clsName).eq(currSlide).addClass(clsName);});};function getTimeout(curr,next,opts,fwd){if(opts.timeoutFn){var t=opts.timeoutFn.call(curr,curr,next,opts,fwd);while(opts.fx!="none"&&(t-opts.speed)<250){t+=opts.speed;}debug("calculated timeout: "+t+"; speed: "+opts.speed);if(t!==false){return t;}}return opts.timeout;}$.fn.cycle.next=function(opts){advance(opts,1);};$.fn.cycle.prev=function(opts){advance(opts,0);};function advance(opts,moveForward){var val=moveForward?1:-1;var els=opts.elements;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}if(opts.random&&val<0){opts.randomIndex--;if(--opts.randomIndex==-2){opts.randomIndex=els.length-2;}else{if(opts.randomIndex==-1){opts.randomIndex=els.length-1;}}opts.nextSlide=opts.randomMap[opts.randomIndex];}else{if(opts.random){opts.nextSlide=opts.randomMap[opts.randomIndex];}else{opts.nextSlide=opts.currSlide+val;if(opts.nextSlide<0){if(opts.nowrap){return false;}opts.nextSlide=els.length-1;}else{if(opts.nextSlide>=els.length){if(opts.nowrap){return false;}opts.nextSlide=0;}}}}var cb=opts.onPrevNextEvent||opts.prevNextClick;if($.isFunction(cb)){cb(val>0,opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,moveForward);return false;}function buildPager(els,opts){var $p=$(opts.pager);$.each(els,function(i,o){$.fn.cycle.createPagerAnchor(i,o,$p,els,opts);});opts.updateActivePagerLink(opts.pager,opts.startingSlide,opts.activePagerClass);}$.fn.cycle.createPagerAnchor=function(i,el,$p,els,opts){var a;if($.isFunction(opts.pagerAnchorBuilder)){a=opts.pagerAnchorBuilder(i,el);debug("pagerAnchorBuilder("+i+", el) returned: "+a);}else{a='<a href="#">'+(i+1)+"</a>";}if(!a){return;}var $a=$(a);if($a.parents("body").length===0){var arr=[];if($p.length>1){$p.each(function(){var $clone=$a.clone(true);$(this).append($clone);arr.push($clone[0]);});$a=$(arr);}else{$a.appendTo($p);}}opts.pagerAnchors=opts.pagerAnchors||[];opts.pagerAnchors.push($a);$a.bind(opts.pagerEvent,function(e){e.preventDefault();opts.nextSlide=i;var p=opts.$cont[0],timeout=p.cycleTimeout;if(timeout){clearTimeout(timeout);p.cycleTimeout=0;}var cb=opts.onPagerEvent||opts.pagerClick;if($.isFunction(cb)){cb(opts.nextSlide,els[opts.nextSlide]);}go(els,opts,1,opts.currSlide<i);});if(!/^click/.test(opts.pagerEvent)&&!opts.allowPagerClickBubble){$a.bind("click.cycle",function(){return false;});}if(opts.pauseOnPagerHover){$a.hover(function(){opts.$cont[0].cyclePause++;},function(){opts.$cont[0].cyclePause--;});}};$.fn.cycle.hopsFromLast=function(opts,fwd){var hops,l=opts.lastSlide,c=opts.currSlide;if(fwd){hops=c>l?c-l:opts.slideCount-l;}else{hops=c<l?l-c:l+opts.slideCount-c;}return hops;};function clearTypeFix($slides){debug("applying clearType background-color hack");function hex(s){s=parseInt(s).toString(16);return s.length<2?"0"+s:s;}function getBg(e){for(;e&&e.nodeName.toLowerCase()!="html";e=e.parentNode){var v=$.css(e,"background-color");if(v.indexOf("rgb")>=0){var rgb=v.match(/\d+/g);return"#"+hex(rgb[0])+hex(rgb[1])+hex(rgb[2]);}if(v&&v!="transparent"){return v;}}return"#ffffff";}$slides.each(function(){$(this).css("background-color",getBg(this));});}$.fn.cycle.commonReset=function(curr,next,opts,w,h,rev){$(opts.elements).not(curr).hide();if(typeof opts.cssBefore.opacity=="undefined"){opts.cssBefore.opacity=1;}opts.cssBefore.display="block";if(opts.slideResize&&w!==false&&next.cycleW>0){opts.cssBefore.width=next.cycleW;}if(opts.slideResize&&h!==false&&next.cycleH>0){opts.cssBefore.height=next.cycleH;}opts.cssAfter=opts.cssAfter||{};opts.cssAfter.display="none";$(curr).css("zIndex",opts.slideCount+(rev===true?1:0));$(next).css("zIndex",opts.slideCount+(rev===true?0:1));};$.fn.cycle.custom=function(curr,next,opts,cb,fwd,speedOverride){var $l=$(curr),$n=$(next);var speedIn=opts.speedIn,speedOut=opts.speedOut,easeIn=opts.easeIn,easeOut=opts.easeOut;$n.css(opts.cssBefore);if(speedOverride){if(typeof speedOverride=="number"){speedIn=speedOut=speedOverride;}else{speedIn=speedOut=1;}easeIn=easeOut=null;}var fn=function(){$n.animate(opts.animIn,speedIn,easeIn,function(){cb();});};$l.animate(opts.animOut,speedOut,easeOut,function(){$l.css(opts.cssAfter);if(!opts.sync){fn();}});if(opts.sync){fn();}};$.fn.cycle.transitions={fade:function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css("opacity",0);opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.opacity=0;});opts.animIn={opacity:1};opts.animOut={opacity:0};opts.cssBefore={top:0,left:0};}};$.fn.cycle.ver=function(){return ver;};$.fn.cycle.defaults={activePagerClass:"activeSlide",after:null,allowPagerClickBubble:false,animIn:null,animOut:null,autostop:0,autostopCount:0,backwards:false,before:null,cleartype:!$.support.opacity,cleartypeNoBg:false,containerResize:1,continuous:0,cssAfter:null,cssBefore:null,delay:0,easeIn:null,easeOut:null,easing:null,end:null,fastOnEvent:0,fit:0,fx:"fade",fxFn:null,height:"auto",manualTrump:true,next:null,nowrap:0,onPagerEvent:null,onPrevNextEvent:null,pager:null,pagerAnchorBuilder:null,pagerEvent:"click.cycle",pause:0,pauseOnPagerHover:0,prev:null,prevNextEvent:"click.cycle",random:0,randomizeEffects:1,requeueOnImageNotLoaded:true,requeueTimeout:250,rev:0,shuffle:null,slideExpr:null,slideResize:1,speed:1000,speedIn:null,speedOut:null,startingSlide:0,sync:1,timeout:4000,timeoutFn:null,updateActivePagerLink:null};})(jQuery);
/*
 * jQuery Cycle Plugin Transition Definitions
 * This script is a plugin for the jQuery Cycle Plugin
 * Examples and documentation at: http://malsup.com/jquery/cycle/
 * Copyright (c) 2007-2010 M. Alsup
 * Version:	 2.73
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 */
;(function($){$.fn.cycle.transitions.none=function($cont,$slides,opts){opts.fxFn=function(curr,next,opts,after){$(next).show();$(curr).hide();after();};};$.fn.cycle.transitions.fadeout=function($cont,$slides,opts){$slides.not(":eq("+opts.currSlide+")").css({display:"block",opacity:1});opts.before.push(function(curr,next,opts,w,h,rev){$(curr).css("zIndex",opts.slideCount+(!rev===true?1:0));$(next).css("zIndex",opts.slideCount+(!rev===true?0:1));});opts.animIn.opacity=1;opts.animOut.opacity=0;opts.cssBefore.opacity=1;opts.cssBefore.display="block";opts.cssAfter.zIndex=0;};$.fn.cycle.transitions.scrollUp=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssBefore.top=h;opts.cssBefore.left=0;opts.cssFirst.top=0;opts.animIn.top=0;opts.animOut.top=-h;};$.fn.cycle.transitions.scrollDown=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var h=$cont.height();opts.cssFirst.top=0;opts.cssBefore.top=-h;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.top=h;};$.fn.cycle.transitions.scrollLeft=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst.left=0;opts.cssBefore.left=w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=0-w;};$.fn.cycle.transitions.scrollRight=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push($.fn.cycle.commonReset);var w=$cont.width();opts.cssFirst.left=0;opts.cssBefore.left=-w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=w;};$.fn.cycle.transitions.scrollHorz=function($cont,$slides,opts){$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts,fwd){if(opts.rev){fwd=!fwd;}$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.left=fwd?(next.cycleW-1):(1-next.cycleW);opts.animOut.left=fwd?-curr.cycleW:curr.cycleW;});opts.cssFirst.left=0;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.top=0;};$.fn.cycle.transitions.scrollVert=function($cont,$slides,opts){$cont.css("overflow","hidden");opts.before.push(function(curr,next,opts,fwd){if(opts.rev){fwd=!fwd;}$.fn.cycle.commonReset(curr,next,opts);opts.cssBefore.top=fwd?(1-next.cycleH):(next.cycleH-1);opts.animOut.top=fwd?curr.cycleH:-curr.cycleH;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.left=0;};$.fn.cycle.transitions.slideX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.width=0;opts.animIn.width="show";opts.animOut.width=0;};$.fn.cycle.transitions.slideY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$(opts.elements).not(curr).hide();$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.height=0;opts.animIn.height="show";opts.animOut.height=0;};$.fn.cycle.transitions.shuffle=function($cont,$slides,opts){var i,w=$cont.css("overflow","visible").width();$slides.css({left:0,top:0});opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);});if(!opts.speedAdjusted){opts.speed=opts.speed/2;opts.speedAdjusted=true;}opts.random=0;opts.shuffle=opts.shuffle||{left:-w,top:15};opts.els=[];for(i=0;i<$slides.length;i++){opts.els.push($slides[i]);}for(i=0;i<opts.currSlide;i++){opts.els.push(opts.els.shift());}opts.fxFn=function(curr,next,opts,cb,fwd){if(opts.rev){fwd=!fwd;}var $el=fwd?$(curr):$(next);$(next).css(opts.cssBefore);var count=opts.slideCount;$el.animate(opts.shuffle,opts.speedIn,opts.easeIn,function(){var hops=$.fn.cycle.hopsFromLast(opts,fwd);for(var k=0;k<hops;k++){fwd?opts.els.push(opts.els.shift()):opts.els.unshift(opts.els.pop());}if(fwd){for(var i=0,len=opts.els.length;i<len;i++){$(opts.els[i]).css("z-index",len-i+count);}}else{var z=$(curr).css("z-index");$el.css("z-index",parseInt(z)+1+count);}$el.animate({left:0,top:0},opts.speedOut,opts.easeOut,function(){$(fwd?this:curr).hide();if(cb){cb();}});});};$.extend(opts.cssBefore,{display:"block",opacity:1,top:0,left:0});};$.fn.cycle.transitions.turnUp=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=next.cycleH;opts.animIn.height=next.cycleH;opts.animOut.width=next.cycleW;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.cssBefore.height=0;opts.animIn.top=0;opts.animOut.height=0;};$.fn.cycle.transitions.turnDown=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssFirst.top=0;opts.cssBefore.left=0;opts.cssBefore.top=0;opts.cssBefore.height=0;opts.animOut.height=0;};$.fn.cycle.transitions.turnLeft=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=next.cycleW;opts.animIn.width=next.cycleW;});opts.cssBefore.top=0;opts.cssBefore.width=0;opts.animIn.left=0;opts.animOut.width=0;};$.fn.cycle.transitions.turnRight=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});$.extend(opts.cssBefore,{top:0,left:0,width:0});opts.animIn.left=0;opts.animOut.width=0;};$.fn.cycle.transitions.zoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false,true);opts.cssBefore.top=next.cycleH/2;opts.cssBefore.left=next.cycleW/2;$.extend(opts.animIn,{top:0,left:0,width:next.cycleW,height:next.cycleH});$.extend(opts.animOut,{width:0,height:0,top:curr.cycleH/2,left:curr.cycleW/2});});opts.cssFirst.top=0;opts.cssFirst.left=0;opts.cssBefore.width=0;opts.cssBefore.height=0;};$.fn.cycle.transitions.fadeZoom=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,false);opts.cssBefore.left=next.cycleW/2;opts.cssBefore.top=next.cycleH/2;$.extend(opts.animIn,{top:0,left:0,width:next.cycleW,height:next.cycleH});});opts.cssBefore.width=0;opts.cssBefore.height=0;opts.animOut.opacity=0;};$.fn.cycle.transitions.blindX=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.width=next.cycleW;opts.animOut.left=curr.cycleW;});opts.cssBefore.left=w;opts.cssBefore.top=0;opts.animIn.left=0;opts.animOut.left=w;};$.fn.cycle.transitions.blindY=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore.top=h;opts.cssBefore.left=0;opts.animIn.top=0;opts.animOut.top=h;};$.fn.cycle.transitions.blindZ=function($cont,$slides,opts){var h=$cont.css("overflow","hidden").height();var w=$cont.width();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH;});opts.cssBefore.top=h;opts.cssBefore.left=w;opts.animIn.top=0;opts.animIn.left=0;opts.animOut.top=h;opts.animOut.left=w;};$.fn.cycle.transitions.growX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true);opts.cssBefore.left=this.cycleW/2;opts.animIn.left=0;opts.animIn.width=this.cycleW;opts.animOut.left=0;});opts.cssBefore.top=0;opts.cssBefore.width=0;};$.fn.cycle.transitions.growY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false);opts.cssBefore.top=this.cycleH/2;opts.animIn.top=0;opts.animIn.height=this.cycleH;opts.animOut.top=0;});opts.cssBefore.height=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.curtainX=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,false,true,true);opts.cssBefore.left=next.cycleW/2;opts.animIn.left=0;opts.animIn.width=this.cycleW;opts.animOut.left=curr.cycleW/2;opts.animOut.width=0;});opts.cssBefore.top=0;opts.cssBefore.width=0;};$.fn.cycle.transitions.curtainY=function($cont,$slides,opts){opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,false,true);opts.cssBefore.top=next.cycleH/2;opts.animIn.top=0;opts.animIn.height=next.cycleH;opts.animOut.top=curr.cycleH/2;opts.animOut.height=0;});opts.cssBefore.height=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.cover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts);if(d=="right"){opts.cssBefore.left=-w;}else{if(d=="up"){opts.cssBefore.top=h;}else{if(d=="down"){opts.cssBefore.top=-h;}else{opts.cssBefore.left=w;}}}});opts.animIn.left=0;opts.animIn.top=0;opts.cssBefore.top=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.uncover=function($cont,$slides,opts){var d=opts.direction||"left";var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(d=="right"){opts.animOut.left=w;}else{if(d=="up"){opts.animOut.top=-h;}else{if(d=="down"){opts.animOut.top=h;}else{opts.animOut.left=-w;}}}});opts.animIn.left=0;opts.animIn.top=0;opts.cssBefore.top=0;opts.cssBefore.left=0;};$.fn.cycle.transitions.toss=function($cont,$slides,opts){var w=$cont.css("overflow","visible").width();var h=$cont.height();opts.before.push(function(curr,next,opts){$.fn.cycle.commonReset(curr,next,opts,true,true,true);if(!opts.animOut.left&&!opts.animOut.top){$.extend(opts.animOut,{left:w*2,top:-h/2,opacity:0});}else{opts.animOut.opacity=0;}});opts.cssBefore.left=0;opts.cssBefore.top=0;opts.animIn.left=0;};$.fn.cycle.transitions.wipe=function($cont,$slides,opts){var w=$cont.css("overflow","hidden").width();var h=$cont.height();opts.cssBefore=opts.cssBefore||{};var clip;if(opts.clip){if(/l2r/.test(opts.clip)){clip="rect(0px 0px "+h+"px 0px)";}else{if(/r2l/.test(opts.clip)){clip="rect(0px "+w+"px "+h+"px "+w+"px)";}else{if(/t2b/.test(opts.clip)){clip="rect(0px "+w+"px 0px 0px)";}else{if(/b2t/.test(opts.clip)){clip="rect("+h+"px "+w+"px "+h+"px 0px)";}else{if(/zoom/.test(opts.clip)){var top=parseInt(h/2);var left=parseInt(w/2);clip="rect("+top+"px "+left+"px "+top+"px "+left+"px)";}}}}}}opts.cssBefore.clip=opts.cssBefore.clip||clip||"rect(0px 0px 0px 0px)";var d=opts.cssBefore.clip.match(/(\d+)/g);var t=parseInt(d[0]),r=parseInt(d[1]),b=parseInt(d[2]),l=parseInt(d[3]);opts.before.push(function(curr,next,opts){if(curr==next){return;}var $curr=$(curr),$next=$(next);$.fn.cycle.commonReset(curr,next,opts,true,true,false);opts.cssAfter.display="block";var step=1,count=parseInt((opts.speedIn/13))-1;(function f(){var tt=t?t-parseInt(step*(t/count)):0;var ll=l?l-parseInt(step*(l/count)):0;var bb=b<h?b+parseInt(step*((h-b)/count||1)):h;var rr=r<w?r+parseInt(step*((w-r)/count||1)):w;$next.css({clip:"rect("+tt+"px "+rr+"px "+bb+"px "+ll+"px)"});(step++<=count)?setTimeout(f,13):$curr.css("display","none");})();});$.extend(opts.cssBefore,{display:"block",opacity:1,top:0,left:0});opts.animIn={left:0};opts.animOut={left:0};};})(jQuery);