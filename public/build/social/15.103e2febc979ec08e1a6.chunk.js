(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[15],{550:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});function n(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}var o=function e(t,r){var o=this;var i=arguments.length>2&&arguments[2]!==undefined?arguments[2]:500;n(this,e);this.id=null;this.distance=0;this.handle=null;this.addEventScroll=function(){document.addEventListener("scroll",o.trackScrolling)};this.trackScrolling=function(){var e=document.getElementById(o.id);if(o.isBottom(e)){if(o.handle){o.handle()}document.removeEventListener("scroll",o.trackScrolling)}};this.isBottom=function(e){return e&&e.getBoundingClientRect&&e.getBoundingClientRect()&&e.getBoundingClientRect().bottom-o.distance<=window.innerHeight};this.id=t;this.handle=r;this.distance=i};t.default=o},562:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o=r(1);var i=u(o);var a=r(539);function u(e){return e&&e.__esModule?e:{default:e}}function l(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function s(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function f(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var c=function e(){return function(e){var t=function(t){f(r,t);function r(){var e;var t,n,o;l(this,r);for(var i=arguments.length,a=Array(i),u=0;u<i;u++){a[u]=arguments[u]}return o=(t=(n=s(this,(e=r.__proto__||Object.getPrototypeOf(r)).call.apply(e,[this].concat(a))),n),n.scrollTop=function(){window.scrollTo(0,0)},t),s(n,o)}n(r,[{key:"render",value:function t(){this.scrollTop();return i.default.createElement(e,this.props)}}]);return r}(o.Component);return(0,a.withRouter)(t)}};t.default=c},600:function(e,t,r){e.exports={"module-profile-layout-info":"__1gFv1z","module-profile-layout-info-container":"__3mG4-X","module-profile-layout-info-container-info":"__3E80s8","module-profile-layout-info-info-name":"__U1AFVa","module-profile-layout-info-info-edit":"__3OJTDc","module-profile-layout-info-info-analytics":"__27n5ig","module-profile-layout-info-info-analytics-post":"__ZxCqrd","module-profile-layout-info-info-analytics-vote":"__4W3dwu","module-profile-layout-info-info-analytics-comment":"__3LiHOh","module-profile-layout-info-info-analytics-post-number":"__2WGQj-","module-profile-layout-info-info-analytics-vote-number":"__2VgtLv","module-profile-layout-info-info-analytics-comment-number":"__1H2eUh","module-profile-divider":"__1hbYJh","module-profile-vertical":"__1bpX8A","module-profile-empty":"__2-thwG","module-profile-empty-text":"__Y5fRp6"}},896:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o,i,a,u,l,s,f,c,p,d,v,y;var m=r(524);var h=r(523);var b=r(546);var _=r(199);var g=r(554);var w=O(g);var E=r(525);var P=r(544);function O(e){return e&&e.__esModule?e:{default:e}}function j(e){if(Array.isArray(e)){for(var t=0,r=Array(e.length);t<e.length;t++){r[t]=e[t]}return r}else{return Array.from(e)}}function k(e){return function(){var t=e.apply(this,arguments);return new Promise(function(e,r){function n(o,i){try{var a=t[o](i);var u=a.value}catch(e){r(e);return}if(a.done){e(u)}else{return Promise.resolve(u).then(function(e){n("next",e)},function(e){n("throw",e)})}}return n("next")})}}function I(e,t,r,n){if(!r)return;Object.defineProperty(e,t,{enumerable:r.enumerable,configurable:r.configurable,writable:r.writable,value:r.initializer?r.initializer.call(n):void 0})}function x(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function D(e,t,r,n,o){var i={};Object["ke"+"ys"](n).forEach(function(e){i[e]=n[e]});i.enumerable=!!i.enumerable;i.configurable=!!i.configurable;if("value"in i||i.initializer){i.writable=true}i=r.slice().reverse().reduce(function(r,n){return n(e,t,r)||r},i);if(o&&i.initializer!==void 0){i.value=i.initializer?i.initializer.call(o):void 0;i.initializer=undefined}if(i.initializer===void 0){Object["define"+"Property"](e,t,i);i=null}return i}function z(e,t){throw new Error("Decorating class property failed. Please ensure that transform-class-properties is enabled.")}var L=(a=function(){function e(){x(this,e);I(this,"posts",u,this);I(this,"isLoading",l,this);I(this,"error",s,this);I(this,"isLoadMore",f,this);I(this,"userID",c,this);I(this,"addUserID",p,this);I(this,"resetStore",d,this);I(this,"addPost",v,this);I(this,"handleDeletePost",y,this)}n(e,[{key:"getPosts",value:function(){var e=k(regeneratorRuntime.mark(function e(){var t=this;var r,n,o,i;return regeneratorRuntime.wrap(function e(a){while(1){switch(a.prev=a.next){case 0:if(!this.isLoading){a.next=2;break}return a.abrupt("return");case 2:this.isLoading=true;this.error=null;r=(0,_.getLastArr)(this.posts);n=r?r.post.id:"";a.prev=6;a.next=9;return(0,b.getPostsByUserApi)(this.userID,n);case 9:o=a.sent;i=o.data;(0,m.runInAction)(function(){if((0,h.httpSuccess)(o.status)){var e=i.data;if(!(0,_.isEmptyArr)(e)){t.posts=(0,P.concat2Array)(t.posts,t.createStorePosts(e))}else{t.isLoadMore=false}}else{t.error=(0,h.messageHttpRequest)()}});a.next=17;break;case 14:a.prev=14;a.t0=a["catch"](6);(0,m.runInAction)(function(){t.error=(0,h.messageHttpRequest)(a.t0)});case 17:a.prev=17;(0,m.runInAction)(function(){t.isLoading=false});if(!(0,_.isEmpty)(this.error)){(0,E.messageError)(this.error)}return a.finish(17);case 21:case"end":return a.stop()}}},e,this,[[6,14,17,21]])}));function t(){return e.apply(this,arguments)}return t}()},{key:"createStorePosts",value:function e(t){var r=this;return t.map(function(e){return r.createStorePost(e)})}},{key:"createStorePost",value:function e(t){return new w.default(t,{handleDelete:this.handleDeletePost})}},{key:"isEmpty",get:function e(){return!this.isLoading&&!this.error&&(0,_.isEmptyArr)(this.posts)}}]);return e}(),u=D(a.prototype,"posts",[m.observable],{enumerable:true,initializer:function e(){return[]}}),l=D(a.prototype,"isLoading",[m.observable],{enumerable:true,initializer:function e(){return false}}),s=D(a.prototype,"error",[m.observable],{enumerable:true,initializer:function e(){return null}}),f=D(a.prototype,"isLoadMore",[m.observable],{enumerable:true,initializer:function e(){return true}}),c=D(a.prototype,"userID",[m.observable],{enumerable:true,initializer:function e(){return""}}),p=D(a.prototype,"addUserID",[m.action],{enumerable:true,initializer:function e(){var t=this;return function(e){t.resetStore();t.userID=e;t.getPosts()}}}),d=D(a.prototype,"resetStore",[m.action],{enumerable:true,initializer:function e(){var t=this;return function(){t.posts=[];t.isLoading=false;t.error=null;t.isLoadMore=true;t.userID=""}}}),D(a.prototype,"getPosts",[m.action],Object.getOwnPropertyDescriptor(a.prototype,"getPosts"),a.prototype),v=D(a.prototype,"addPost",[m.action],{enumerable:true,initializer:function e(){var t=this;return function(e){var r=t.createStorePost(e);t.posts=[r].concat(j(t.posts))}}}),y=D(a.prototype,"handleDeletePost",[m.action],{enumerable:true,initializer:function e(){var t=this;return function(e){t.posts=t.posts.filter(function(t){return t.post.id!==e})}}}),D(a.prototype,"isEmpty",[m.computed],Object.getOwnPropertyDescriptor(a.prototype,"isEmpty"),a.prototype),a);t.default=L},897:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});t.infoUserApi=u;var n=r(202);var o=a(n);var i=r(136);function a(e){return e&&e.__esModule?e:{default:e}}function u(e){var t=i.MERCHANT_API_URL+("v1/user/"+e+"/profile");return o.default.get(t)}},898:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o,i,a,u,l,s,f,c,p;var d=r(524);var v=r(523);var y=r(199);var m=r(525);var h=r(897);function b(e){return function(){var t=e.apply(this,arguments);return new Promise(function(e,r){function n(o,i){try{var a=t[o](i);var u=a.value}catch(e){r(e);return}if(a.done){e(u)}else{return Promise.resolve(u).then(function(e){n("next",e)},function(e){n("throw",e)})}}return n("next")})}}function _(e,t,r,n){if(!r)return;Object.defineProperty(e,t,{enumerable:r.enumerable,configurable:r.configurable,writable:r.writable,value:r.initializer?r.initializer.call(n):void 0})}function g(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function w(e,t,r,n,o){var i={};Object["ke"+"ys"](n).forEach(function(e){i[e]=n[e]});i.enumerable=!!i.enumerable;i.configurable=!!i.configurable;if("value"in i||i.initializer){i.writable=true}i=r.slice().reverse().reduce(function(r,n){return n(e,t,r)||r},i);if(o&&i.initializer!==void 0){i.value=i.initializer?i.initializer.call(o):void 0;i.initializer=undefined}if(i.initializer===void 0){Object["define"+"Property"](e,t,i);i=null}return i}function E(e,t){throw new Error("Decorating class property failed. Please ensure that transform-class-properties is enabled.")}var P=(a=function(){function e(){g(this,e);_(this,"info",u,this);_(this,"isLoading",l,this);_(this,"error",s,this);_(this,"userID",f,this);_(this,"addUserID",c,this);_(this,"resetStore",p,this)}n(e,[{key:"getInfoUser",value:function(){var e=b(regeneratorRuntime.mark(function e(){var t=this;var r,n,o;return regeneratorRuntime.wrap(function e(i){while(1){switch(i.prev=i.next){case 0:this.isLoading=true;this.error=null;i.prev=2;i.next=5;return(0,h.infoUserApi)(this.userID);case 5:r=i.sent;n=r.data;if(!(0,v.httpSuccess)(r.status)){i.next=14;break}o=n.data;if(!(0,y.isEmpty)(o)){i.next=11;break}throw"null data";case 11:(0,d.runInAction)(function(){t.info=o});i.next=15;break;case 14:(0,d.runInAction)(function(){t.error=(0,v.messageHttpRequest)()});case 15:i.next=20;break;case 17:i.prev=17;i.t0=i["catch"](2);(0,d.runInAction)(function(){t.error=(0,v.messageHttpRequest)(i.t0)});case 20:i.prev=20;(0,d.runInAction)(function(){t.isLoading=false});if(!(0,y.isEmpty)(this.error)){(0,m.messageError)(this.error)}return i.finish(20);case 24:case"end":return i.stop()}}},e,this,[[2,17,20,24]])}));function t(){return e.apply(this,arguments)}return t}()}]);return e}(),u=w(a.prototype,"info",[d.observable],{enumerable:true,initializer:function e(){return{}}}),l=w(a.prototype,"isLoading",[d.observable],{enumerable:true,initializer:function e(){return false}}),s=w(a.prototype,"error",[d.observable],{enumerable:true,initializer:function e(){return null}}),f=w(a.prototype,"userID",[d.observable],{enumerable:true,initializer:function e(){return""}}),c=w(a.prototype,"addUserID",[d.action],{enumerable:true,initializer:function e(){var t=this;return function(e){t.resetStore();t.userID=e;t.getInfoUser()}}}),p=w(a.prototype,"resetStore",[d.action],{enumerable:true,initializer:function e(){var t=this;return function(){t.info={};t.isLoading=false;t.error=null;t.userID=""}}}),w(a.prototype,"getInfoUser",[d.action],Object.getOwnPropertyDescriptor(a.prototype,"getInfoUser"),a.prototype),a);t.default=P},899:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o;var i=r(1);var a=w(i);var u=r(2);var l=w(u);var s=r(559);var f=w(s);var c=r(555);var p=w(c);var d=r(600);var v=w(d);var y=r(198);var m=w(y);var h=r(521);var b=r(550);var _=w(b);var g=r(92);function w(e){return e&&e.__esModule?e:{default:e}}function E(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function P(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function O(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var j=m.default.bind(v.default);var k="list-post-user";var I=(0,h.observer)(o=function(e){O(t,e);function t(e){E(this,t);var r=P(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));r.getPosts=function(){var e=r.props.store;if(e.isLoadMore){e.getPosts()}};r.renderEmpty=function(){var e=r.props,t=e.prefixCls,n=e.t,o=e.store;var i=o.isEmpty;if(i){return a.default.createElement("div",{className:j(t+"-empty")},a.default.createElement("div",{className:j(t+"-empty-text")},n("social.home.noti.empty")))}else{return a.default.createElement("div",null)}};r.scrollView=new _.default(k,r.getPosts);return r}n(t,[{key:"componentDidUpdate",value:function e(){var t=this.props.store;var r=t.isLoading;if(!r){this.scrollView.addEventScroll()}}},{key:"render",value:function e(){var t=this.props,r=t.prefixCls,n=t.store;var o=n.posts,i=n.isLoading;return a.default.createElement("div",{id:k,className:j(r+"-layout-posts")},o&&o.length>0?o.map(function(e,t){return a.default.createElement("div",{key:t},a.default.createElement(f.default,{store:e,key:t}))}):i&&a.default.createElement("div",null,a.default.createElement(p.default,null),a.default.createElement(p.default,null)),i&&a.default.createElement(p.default,null),this.renderEmpty())}}]);return t}(a.default.Component))||o;I.defaultProps={prefixCls:"module-profile"};I.propTypes={store:l.default.object.isRequired};t.default=(0,g.translate)(function(e){return e.namespaces})(I)},901:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o=r(1);var i=d(o);var a=r(540);var u=d(a);var l=r(537);var s=r(600);var f=d(s);var c=r(198);var p=d(c);function d(e){return e&&e.__esModule?e:{default:e}}function v(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function y(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function m(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var h=p.default.bind(f.default);var b=function(e){m(t,e);function t(){v(this,t);return y(this,(t.__proto__||Object.getPrototypeOf(t)).apply(this,arguments))}n(t,[{key:"componentDidMount",value:function e(){}},{key:"render",value:function e(){var t=this.props.prefixCls;return i.default.createElement("div",{className:h(t+"-layout-info")},i.default.createElement("div",{className:h(t+"-layout-info-container")},i.default.createElement("div",{className:h(t+"-layout-info-info-avatar")},i.default.createElement(l.RoundShape,{color:"#E0E0E0",style:{width:100,height:100}})),i.default.createElement("div",{className:h(t+"-layout-info-container-info")},i.default.createElement("div",{className:h(t+"-layout-info-info-name")},i.default.createElement(l.TextBlock,{rows:1,color:"#E0E0E0"})),i.default.createElement("div",{className:h(t+"-layout-info-info-analytics"),style:{paddingTop:"20px"}},i.default.createElement(l.TextBlock,{rows:2,color:"#E0E0E0"})))))}}]);return t}(i.default.Component);b.defaultProps={prefixCls:"module-profile"};b.propTypes={};t.default=(0,u.default)()(b)},902:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=r(533);var o=k(n);var i=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var a;r(535);var u=r(1);var l=k(u);var s=r(2);var f=k(s);var c=r(92);var p=r(901);var d=k(p);var v=r(521);var y=r(532);var m=k(y);var h=r(199);var b=r(527);var _=r(600);var g=k(_);var w=r(198);var E=k(w);var P=r(529);var O=r(539);var j=r(534);function k(e){return e&&e.__esModule?e:{default:e}}function I(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function x(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function D(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var z=E.default.bind(g.default);var L=(0,v.observer)(a=function(e){D(t,e);function t(e){I(this,t);var r=x(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e));r.renderAnalytics=function(){var e=r.props,t=e.prefixCls,n=e.t,o=e.store;var i=o.info,a=i.comments_count,u=i.posts_count,s=i.votes_count;return l.default.createElement("div",{className:z(t+"-layout-info-info-analytics")},l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-post")},l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-post-number")},u),l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-comment-text")},n("social.profile.info.post"))),l.default.createElement("div",{className:z(t+"-divider",t+"-vertical")}),l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-vote")},l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-vote-number")},s),l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-comment-text")},n("social.profile.info.vote"))),l.default.createElement("div",{className:z(t+"-divider",t+"-vertical")}),l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-comment")},l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-comment-number")},a),l.default.createElement("div",{className:z(t+"-layout-info-info-analytics-comment-text")},n("social.profile.info.comment"))))};return r}i(t,[{key:"render",value:function e(){var t=this.props,r=t.prefixCls,n=t.t,i=t.store,a=t.account,u=t.history;var s=i.isLoading,f=i.info;var c=u.location;var p=c.pathname;if(s){return l.default.createElement(d.default,null)}var v=(0,h.linkRoute)("/profile/:userID",{userID:(0,h.getValueObjectFromStringKey)(a,"id")});var y=(0,h.checkLink)(p,v);var _=(0,h.getValueObjectFromStringKey)(f,"avatar_url")?f.avatar_url:b.LOGO;return l.default.createElement("div",{className:z(r+"-layout-info")},l.default.createElement("div",{className:z(r+"-layout-info-container")},l.default.createElement("div",{className:z(r+"-layout-info-info-avatar")},l.default.createElement(m.default,{url:_,size:100})),l.default.createElement("div",{className:z(r+"-layout-info-container-info")},l.default.createElement("div",{className:z(r+"-layout-info-info-name")},f.name),this.renderAnalytics(),y&&l.default.createElement("div",{className:z(r+"-layout-info-info-edit")},l.default.createElement(j.Link,{to:"/profile/edit"},l.default.createElement(o.default,{icon:"form"},n("social.profile.info.edit")))))))}}]);return t}(l.default.Component))||a;L.defaultProps={prefixCls:"module-profile"};L.propTypes={store:f.default.object.isRequired};t.default=(0,c.translate)(function(e){return e.namespaces})((0,P.withAccount)((0,O.withRouter)(L)))},903:function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=function(){function e(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,r,n){if(r)e(t.prototype,r);if(n)e(t,n);return t}}();var o=r(1);var i=_(o);var a=r(548);var u=_(a);var l=r(902);var s=_(l);var f=r(899);var c=_(f);var p=r(898);var d=_(p);var v=r(896);var y=_(v);var m=r(539);var h=r(562);var b=_(h);function _(e){return e&&e.__esModule?e:{default:e}}function g(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function w(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function E(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var P=function(e){E(t,e);function t(){var e;var r,n,o;g(this,t);for(var i=arguments.length,a=Array(i),u=0;u<i;u++){a[u]=arguments[u]}return o=(r=(n=w(this,(e=t.__proto__||Object.getPrototypeOf(t)).call.apply(e,[this].concat(a))),n),n.state={storeInfo:new d.default,storePosts:new y.default,userID:""},r),w(n,o)}n(t,[{key:"componentDidMount",value:function e(){}},{key:"render",value:function e(){var t=this.state,r=t.storeInfo,n=t.storePosts;return i.default.createElement("div",null,i.default.createElement(s.default,{store:r}),i.default.createElement(c.default,{store:n}))}}],[{key:"getDerivedStateFromProps",value:function e(t,r){var n=t.match.params.userID;if(r.userID!=n){r.storeInfo.addUserID(n);r.storePosts.addUserID(n);return{userID:n}}return null}}]);return t}(i.default.Component);P.propTypes={};t.default=(0,u.default)()((0,m.withRouter)((0,b.default)()(P)))}}]);