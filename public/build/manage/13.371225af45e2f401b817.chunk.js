(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[13],{577:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:true});t.formatTime=u;var n=a(200);var r=a(526);var o=i(r);function i(e){return e&&e.__esModule?e:{default:e}}function u(e){var t=arguments.length>1&&arguments[1]!==undefined?arguments[1]:"LLLL";return(0,n.capitalizeFirstLetter)(o.default.unix(e).format(t))}},795:function(e,t,a){e.exports={"table-log":"table-log__3eBWr","table-action-icon":"table-action-icon__1kdrV"}},796:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:true});t.getPostsApi=u;t.hidePostApi=l;var n=a(202);var r=i(n);var o=a(201);function i(e){return e&&e.__esModule?e:{default:e}}function u(){var e=arguments.length>0&&arguments[0]!==undefined?arguments[0]:{};var t=o.MANAGE_API_URL+"v1/post/all";return r.default.get(t,{params:{page:e.page?e.page:1,limit:10,order:e.sortCreatedAt?e.sortCreatedAt:""}})}function l(e){var t=o.MANAGE_API_URL+"v1/post/hide/"+e;return r.default.put(t)}},797:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:true});t.getPosts=i;t.hidePost=u;var n=a(796);var r=a(550);var o=a(200);function i(e){var t=arguments.length>1&&arguments[1]!==undefined?arguments[1]:{};e({isLoading:true});(0,n.getPostsApi)(t).then(function(t){if((0,r.httpSuccess)(t.status)){e({isLoading:false,data:t.data.data,pagination:(0,o.formatPagination)(t.data.meta)})}}).catch(function(e){(0,r.messageHttpRequest)(e)}).finally(function(){e({isLoading:false})})}function u(e,t,a){e({isLoading:true});(0,n.hidePostApi)(a).then(function(e){if((0,r.httpSuccess)(e.status)){t()}}).catch(function(e){(0,r.messageHttpRequest)(e)}).finally(function(){e({isLoading:false})})}},855:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:true});var n=a(608);var r=A(n);var o=a(605);var i=A(o);var u=a(645);var l=A(u);var c=a(575);var s=A(c);var d=a(527);var f=A(d);var p=a(648);var v=A(p);var m=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var n in a){if(Object.prototype.hasOwnProperty.call(a,n)){e[n]=a[n]}}}return e};var g=function(){function e(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||false;n.configurable=true;if("value"in n)n.writable=true;Object.defineProperty(e,n.key,n)}}return function(t,a,n){if(a)e(t.prototype,a);if(n)e(t,n);return t}}();a(604);a(617);a(642);a(594);a(551);a(644);var h=a(1);var _=A(h);var b=a(797);var y=a(571);var E=a(795);var P=A(E);var w=a(93);var L=a(200);var k=a(577);var O=a(201);function A(e){return e&&e.__esModule?e:{default:e}}function j(e,t){if(!(e instanceof t)){throw new TypeError("Cannot call a class as a function")}}function M(e,t){if(!e){throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}return t&&(typeof t==="object"||typeof t==="function")?t:e}function S(e,t){if(typeof t!=="function"&&t!==null){throw new TypeError("Super expression must either be null or a function, not "+typeof t)}e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:false,writable:true,configurable:true}});if(t)Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t}var C=function e(t){return[{title:(0,L.capitalizeFirstLetter)(t("manage.post.table.header.creator")),dataIndex:"creator",key:"creator",width:"25%",render:function e(t,a,n){var r=_.default.createElement("div",{key:n},_.default.createElement(v.default,{src:t.avatar_url}),"  ",_.default.createElement("a",{href:"#"},t.name));return r}},{title:(0,L.capitalizeFirstLetter)(t("manage.post.table.header.body")),dataIndex:"body",key:"body",render:function e(a,n,r){var o=_.default.createElement("div",{key:r,dangerouslySetInnerHTML:{__html:""+t(a)}});return o},width:"20%"},{title:"",dataIndex:"info",key:"info",render:function e(a){var n=_.default.createElement("span",null,_.default.createElement(s.default,{title:a.upvote+" "+(0,L.capitalizeFirstLetter)(t("social.home.post_item.upvote"))},_.default.createElement(f.default,{type:"caret-up"})," ",a.upvote),_.default.createElement(l.default,{type:"vertical"}),_.default.createElement(s.default,{title:a.downvote+" "+(0,L.capitalizeFirstLetter)(t("social.home.post_item.downvote"))},_.default.createElement(f.default,{type:"caret-down"})," ",a.downvote),_.default.createElement(l.default,{type:"vertical"}),_.default.createElement(s.default,{title:a.comment+" "+(0,L.capitalizeFirstLetter)(t("social.home.post_item.comment"))},_.default.createElement(f.default,{type:"message"})," ",a.comment));return n}},{title:(0,L.capitalizeFirstLetter)(t("manage.post.table.header.created_at")),dataIndex:"created_at",key:"created_at"},{title:"",dataIndex:"actions",key:"actions",render:function e(a){var n=_.default.createElement("span",null,_.default.createElement(s.default,{title:t("manage.post.table.action.hide")},_.default.createElement(f.default,{className:P.default["table-action-icon"],type:"close-circle",onClick:function e(){return a.confirmHidePost(a.post_id)}})),_.default.createElement(s.default,{title:t("manage.post.table.action.detail")},_.default.createElement("a",{href:O.BASE_URL+"post/"+a.post_id,target:"_blank",rel:"noopener noreferrer"},_.default.createElement(f.default,{className:P.default["table-action-icon"],type:"info-circle"}))));return n}}]};var T=function(e){S(t,e);function t(e,a){j(this,t);var n=M(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e,a));n.state={isLoading:true,data:[],pagination:null};n.confirmHidePost=function(e){var t=n.props.t;i.default.confirm({title:t("manage.post.confirm.hide_post"),content:t("manage.post.confirm.description"),okType:"danger",onOk:function t(){(0,b.hidePost)(n.setData,function(){return(0,b.getPosts)(n.setData)},e)}})};n.handleTableChange=function(e,t,a){var r=m({},n.state.pagination);r.current=e.current;n.setState({pagination:r});(0,b.getPosts)(n.setData,m({page:e.current,sortCreatedAt:(0,L.formatSortTable)(a,"created_at")},t))};n.setData=n.setState.bind(n);return n}g(t,[{key:"componentDidMount",value:function e(){(0,b.getPosts)(this.setData)}},{key:"render",value:function e(){var t=this;var a=this.state,n=a.data,o=a.isLoading,i=a.pagination;var u=this.props.t;var l=n?n.map(function(e){return{creator:e.creator,info:{comment:e.num_comments,upvote:e.upvote,downvote:e.downvote},actions:{post_id:e.id,confirmHidePost:t.confirmHidePost},body:(0,L.shortString)(e.body,20),created_at:(0,k.formatTime)(e.created_at)}}):[];return _.default.createElement("div",{className:P.default["table-log"]},_.default.createElement(r.default,{dataSource:l,columns:C(u),rowKey:function e(t,a){return a},loading:o,pagination:i,onChange:this.handleTableChange}))}}]);return t}(h.Component);t.default=(0,w.translate)(function(e){return e.namespaces})((0,y.withAccount)(T))}}]);