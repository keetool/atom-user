(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[14],{550:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});function n(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}var o=function e(t,r){var o=this;var a=arguments.length>2&&arguments[2]!==undefined?arguments[2]:500;n(this,e);this.id=null;this.distance=0;this.handle=null;this.addEventScroll=function(){document.addEventListener("scroll",o.trackScrolling)};this.trackScrolling=function(){var e=document.getElementById(o.id);if(o.isBottom(e)){if(o.handle){o.handle()}document.removeEventListener("scroll",o.trackScrolling)}};this.isBottom=function(e){return e&&e.getBoundingClientRect&&e.getBoundingClientRect()&&e.getBoundingClientRect().bottom-o.distance<=window.innerHeight};this.id=t;this.handle=r;this.distance=a};t.default=o},562:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o=r(1);var a=u(o);var i=r(539);function u(e){return e&&e.__esModule?e:{default:e}}function l(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function s(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function c(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var f=function e(){return function(e){var t=function(t){c(r,t);function r(){var e;var t,n,o;l(this,r);for(var a=arguments.length,i=Array(a),u=0;u<a;u++){i[u]=arguments[u]}return o=(t=(n=s(this,(e=r.__proto__||Object.getPrototypeOf(r)).call.apply(e,[this].concat(i))),n),n.scrollTop=function(){window.scrollTo(0,0)},t),s(n,o)}n(r,[{key:"render",value:function t(){this.scrollTop();return a.default.createElement(e,this.props)}}]);return r}(o.Component);return(0,i.withRouter)(t)}};t.default=f},611:function(e,t,r){e.exports={"module-mark-layout-posts":"__17_fFJ","module-mark-header":"__1mEoDv","module-mark-header-icon":"__2JbHF7","module-mark-header-text":"__2btz-z","module-mark-empty":"__35LM6X","module-mark-empty-text":"__1IklHv","module-mark-active-mark":"__1D9GFW"}},970:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r){if(Object.prototype.hasOwnProperty.call(r,n)){e[n]=r[n]}}}return e};var o=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var a,i,u,l,s,c,f,p;var d=r(524);var v=r(523);var m=r(199);var y=r(525);var h=r(584);var b=r(554);var g=_(b);function _(e){return e&&e.__esModule?e:{default:e}}function w(e){if(Array.isArray(e)){for(var t=0,r=Array(e.length);t<e.length;t++){r[t]=e[t]}return r}else{return Array.from(e)}}function k(e){return function(){var t=e.apply(this,arguments);return new Promise(function(e,r){function n(o,a){try{var i=t[o](a);var u=i.value}catch(e){r(e);return}if(i.done){e(u)}else{return Promise.resolve(u).then(function(e){n("next",e)},function(e){n("throw",e)})}}return n("next")})}}function O(e,t,r,n){if(!r)return;Object.defineProperty(e,t,{enumerable:r.enumerable,configurable:r.configurable,writable:r.writable,value:r.initializer?r.initializer.call(n):void 0})}function E(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function P(e,t,r,n,o){var a={};Object["ke"+"ys"](n).forEach(function(e){a[e]=n[e]});a.enumerable=!!a.enumerable;a.configurable=!!a.configurable;if("value"in a||a.initializer){a.writable=true}a=r.slice().reverse().reduce(function(r,n){return n(e,t,r)||r},a);if(o&&a.initializer!==void 0){a.value=a.initializer?a.initializer.call(o):void 0;a.initializer=undefined}if(a.initializer===void 0){Object["define"+"Property"](e,t,a);a=null}return a}function j(e,t){throw new Error("Decorating class property failed. Please ensure that transform-class-properties is enabled.")}var x=(u=function(){function e(){E(this,e);O(this,"marks",l,this);O(this,"isLoading",s,this);O(this,"error",c,this);O(this,"pagination",f,this);O(this,"handleDeletePost",p,this)}o(e,[{key:"getBookmarks",value:function(){var e=k(regeneratorRuntime.mark(function e(){var t=this;var r,n,o,a,i;return regeneratorRuntime.wrap(function e(u){while(1){switch(u.prev=u.next){case 0:if(!this.isLoading){u.next=2;break}return u.abrupt("return");case 2:this.isLoading=true;this.error=null;r=(0,m.getLastArr)(this.marks);n=r?r.id:"";u.prev=6;u.next=9;return(0,h.getMarkPostsBySubdomain)(n);case 9:o=u.sent;a=o.data;if((0,v.httpSuccess)(o.status)){i=a.data;(0,d.runInAction)(function(){t.marks=[].concat(w(t.marks),w(t.createStorePosts(i)));a.meta.remain_total=a.meta.total-i.length;t.pagination=a.meta})}else{(0,d.runInAction)(function(){t.error=(0,v.messageHttpRequest)()})}u.next=17;break;case 14:u.prev=14;u.t0=u["catch"](6);(0,d.runInAction)(function(){t.error=(0,v.messageHttpRequest)(u.t0)});case 17:u.prev=17;(0,d.runInAction)(function(){t.isLoading=false});if(!(0,m.isEmpty)(this.error)){(0,y.messageError)(this.error)}return u.finish(17);case 21:case"end":return u.stop()}}},e,this,[[6,14,17,21]])}));function t(){return e.apply(this,arguments)}return t}()},{key:"createStorePosts",value:function e(t){var r=this;return t.map(function(e){return n({},e,{postStore:r.createStorePost(e.post)})})}},{key:"createStorePost",value:function e(t){return new g.default(t,{handleDelete:this.handleDeletePost})}},{key:"isEmpty",get:function e(){return!this.isLoading&&!this.error&&(0,m.isEmptyArr)(this.marks)}},{key:"isLoadMore",get:function e(){return this.pagination.remain_total>0}}]);return e}(),l=P(u.prototype,"marks",[d.observable],{enumerable:true,initializer:function e(){return[]}}),s=P(u.prototype,"isLoading",[d.observable],{enumerable:true,initializer:function e(){return false}}),c=P(u.prototype,"error",[d.observable],{enumerable:true,initializer:function e(){return null}}),f=P(u.prototype,"pagination",[d.observable],{enumerable:true,initializer:function e(){return{}}}),P(u.prototype,"getBookmarks",[d.action],Object.getOwnPropertyDescriptor(u.prototype,"getBookmarks"),u.prototype),P(u.prototype,"isEmpty",[d.computed],Object.getOwnPropertyDescriptor(u.prototype,"isEmpty"),u.prototype),p=P(u.prototype,"handleDeletePost",[d.action],{enumerable:true,initializer:function e(){var t=this;return function(e){t.marks=t.marks.filter(function(t){return t.postStore.post.id!==e})}}}),P(u.prototype,"isLoadMore",[d.computed],Object.getOwnPropertyDescriptor(u.prototype,"isLoadMore"),u.prototype),u);t.default=x},971:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o;var a=r(1);var i=w(a);var u=r(2);var l=w(u);var s=r(559);var c=w(s);var f=r(555);var p=w(f);var d=r(611);var v=w(d);var m=r(198);var y=w(m);var h=r(521);var b=r(550);var g=w(b);var _=r(92);function w(e){return e&&e.__esModule?e:{default:e}}function k(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function O(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function E(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var P=y.default.bind(v.default);var j="list-mark";var x=(0,h.observer)(o=function(e){E(t,e);function t(e){k(this,t);var r=O(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));r.getPosts=function(){var e=r.props.store;if(e.isLoadMore){e.getBookmarks()}};r.renderEmpty=function(){var e=r.props,t=e.store,n=e.prefixCls,o=e.t;var a=t.isEmpty;if(a){return i.default.createElement("div",{className:P(n+"-empty")},i.default.createElement("div",{className:P(n+"-empty-text")},o("social.mark.noti.empty")))}else{return i.default.createElement("div",null)}};r.scrollView=new g.default(j,r.getPosts);return r}n(t,[{key:"componentDidUpdate",value:function e(){var t=this.props.store;var r=t.isLoading;if(!r){this.scrollView.addEventScroll()}}},{key:"render",value:function e(){var t=this.props,r=t.store,n=t.prefixCls;var o=r.marks,a=r.isLoading;return i.default.createElement("div",{id:j,className:P(n+"-layout-posts")},o&&o.length>0?o.map(function(e,t){return i.default.createElement("div",{key:t},i.default.createElement(c.default,{store:e.postStore,key:t}))}):a&&i.default.createElement("div",null,i.default.createElement(p.default,null),i.default.createElement(p.default,null)),a&&i.default.createElement(p.default,null),this.renderEmpty())}}]);return t}(i.default.Component))||o;x.defaultProps={prefixCls:"module-mark"};x.propTypes={store:l.default.object.isRequired};t.default=(0,_.translate)(function(e){return e.namespaces})(x)},972:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=r(522);var o=m(n);var a=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var i;r(526);var u=r(1);var l=m(u);var s=r(92);var c=r(198);var f=m(c);var p=r(611);var d=m(p);var v=r(521);function m(e){return e&&e.__esModule?e:{default:e}}function y(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function h(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function b(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var g=f.default.bind(d.default);var _=(0,v.observer)(i=function(e){b(t,e);function t(){y(this,t);return h(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}a(t,[{key:"componentDidMount",value:function e(){}},{key:"render",value:function e(){var t=this.props,r=t.t,n=t.prefixCls;return l.default.createElement("div",{className:g(n+"-header")},l.default.createElement("div",{className:g(n+"-header-icon")},l.default.createElement(o.default,{type:"star",className:g(n+"-active-mark")})),l.default.createElement("div",{className:g(n+"-header-text")},r("social.mark.header.marked")))}}]);return t}(l.default.Component))||i;_.defaultProps={prefixCls:"module-mark"};_.propTypes={};t.default=(0,s.translate)(function(e){return e.namespaces})(_)},974:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o;var a=r(1);var i=O(a);var u=r(92);var l=r(548);var s=O(l);var c=r(198);var f=O(c);var p=r(611);var d=O(p);var v=r(972);var m=O(v);var y=r(971);var h=O(y);var b=r(521);var g=r(970);var _=O(g);var w=r(562);var k=O(w);function O(e){return e&&e.__esModule?e:{default:e}}function E(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function P(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function j(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var x=f.default.bind(d.default);var C=(0,b.observer)(o=function(e){j(t,e);function t(e){E(this,t);var r=P(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));r.store=new _.default;return r}n(t,[{key:"componentDidMount",value:function e(){this.store.getBookmarks()}},{key:"render",value:function e(){var t=this.props.prefixCls;return i.default.createElement("div",{className:x(t+"-layout")},i.default.createElement(m.default,null),i.default.createElement(h.default,{store:this.store}))}}]);return t}(i.default.Component))||o;C.defaultProps={prefixCls:"module-mark"};C.propTypes={};t.default=(0,u.translate)(function(e){return e.namespaces})((0,s.default)()((0,k.default)()(C)))}}]);