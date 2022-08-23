import{g as e,j as h,k as o,_ as Q,s as l,v as t,D as M,B as i,E as r,r as n,l as W,a as I,o as K,G as P,H as R,I as U,J as X,K as Y,L as Z,u as x,t as d,z as f,F as b,x as k,A as L}from"./app.f4da73c3.js";import{L as y,_ as tt,r as p,h as et}from"./StreamList.22f2ce3d.js";function st(c,_){return e(),h("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true"},[o("path",{"fill-rule":"evenodd",d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z","clip-rule":"evenodd"})])}const at={name:"ListBox"},lt={class:"w-full"},ot={class:"max-w-6xl mx-auto mt-8 text-lg leading-6 font-medium text-gray-900"},nt={class:"hidden sm:block"},it={class:"w-full"},rt={class:"flex flex-col mt-2"},dt={class:"align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg"};function ct(c,_,g,B,v,T){return e(),l("div",lt,[t("h2",ot,[M(c.$slots,"title")]),t("div",nt,[t("div",it,[t("div",rt,[t("div",dt,[M(c.$slots,"content")])])])])])}const S=Q(at,[["render",ct]]),ut={class:"bg-white overflow-hidden shadow rounded-lg"},xt={class:"p-5"},mt={class:"flex items-center"},ht={class:"ml-5 w-0 flex-1"},_t={class:"text-sm font-medium text-gray-500 truncate"},gt={key:1,class:"text-lg font-medium text-gray-900"},pt=t("div",{class:"bg-gray-50 px-5 py-3"},[t("div",{class:"text-sm"},[t("a",{href:"#",class:"font-medium text-cyan-700 hover:text-cyan-900"}," View all ")])],-1),yt={name:"StatCard"},$=Object.assign(yt,{props:{loading:{type:Boolean},title:{type:String,required:!0},stat:{type:Number,required:!0}},setup(c){return(_,g)=>(e(),l("div",ut,[t("div",xt,[t("div",mt,[t("div",ht,[t("dl",null,[t("dt",_t,i(c.title),1),t("dd",null,[c.loading?(e(),h(y,{key:0,"class-name":"w-5 h-5"})):r("",!0),c.loading?r("",!0):(e(),l("div",gt,i(c.stat),1))])])])])]),pt]))}}),ft={class:"flex-1 pb-8"},vt={class:"bg-white shadow"},wt={class:"px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8"},bt={class:"py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200"},kt={class:"flex-1 min-w-0"},St={class:"flex items-center"},$t=t("img",{class:"hidden h-16 w-16 rounded-full sm:block",src:"https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80",alt:""},null,-1),Bt={class:"flex items-center"},Tt=t("img",{class:"h-16 w-16 rounded-full sm:hidden",src:"https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80",alt:""},null,-1),Ct={class:"ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate"},Lt={class:"mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap"},Gt=t("dt",{class:"sr-only"},"Account status",-1),Vt={class:"mt-3 flex items-center text-sm text-gray-500 font-medium sm:mr-6 sm:mt-0 capitalize"},zt=f(" Verified account "),Dt={class:"mt-8"},Nt={class:"max-w-6xl mx-auto px-4 sm:px-6 lg:px-8"},Ot=t("h2",{class:"text-lg leading-6 font-medium text-gray-900"},"Overview",-1),jt={class:"mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3"},Et={class:"max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-4"},Mt=f(" Top Games by Viewers "),Ft={key:1,class:"min-w-full divide-y divide-gray-200"},qt=t("thead",null,[t("tr",null,[t("th",{class:"px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900",scope:"col"},"Game name"),t("th",{class:"hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block",scope:"col"},"Viewers")])],-1),Ht={class:"bg-white divide-y divide-gray-200"},At={class:"max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900"},Jt={class:"flex"},Qt={href:"#",class:"group inline-flex space-x-2 truncate text-sm"},Wt={class:"text-gray-500 truncate group-hover:text-gray-900"},It={class:"hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block"},Kt=f(" Top Streams per Game "),Pt={key:1,class:"min-w-full divide-y divide-gray-200"},Rt=t("thead",null,[t("tr",null,[t("th",{class:"px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900",scope:"col"},"Game name"),t("th",{class:"hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block",scope:"col"},"Streams Count")])],-1),Ut={class:"bg-white divide-y divide-gray-200"},Xt={class:"max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900"},Yt={class:"flex"},Zt={href:"#",class:"group inline-flex space-x-2 truncate text-sm"},te={class:"text-gray-500 truncate group-hover:text-gray-900"},ee={class:"hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block"},se={class:"max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-4"},ae=f(" Followed Streams Tags in Top 1k Streams "),le={key:1,class:"min-w-full divide-y divide-gray-200"},oe=t("thead",null,[t("tr",null,[t("th",{class:"px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900",scope:"col"},"Tag name")])],-1),ne={class:"bg-white divide-y divide-gray-200"},ie={class:"max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900"},re={class:"flex"},de={href:"#",class:"group inline-flex space-x-2 truncate text-sm"},ce={class:"text-gray-500 truncate group-hover:text-gray-900"},ue=f(" Followed Streams in Top 1k Streams "),xe={key:1,class:"min-w-full divide-y divide-gray-200"},me=t("thead",null,[t("tr",null,[t("th",{class:"px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900",scope:"col"},"Stream name"),t("th",{class:"hidden px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900 md:block",scope:"col"},"Viewers Count")])],-1),he={class:"bg-white divide-y divide-gray-200"},_e={class:"max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900"},ge={class:"flex"},pe={href:"#",class:"group inline-flex space-x-2 truncate text-sm"},ye={class:"text-gray-500 truncate group-hover:text-gray-900"},fe={class:"hidden px-6 py-4 whitespace-nowrap text-sm text-gray-500 md:block"},ve=f(" Streams Count By Start Date "),we={key:1,class:"min-w-full divide-y divide-gray-200"},be=t("thead",null,[t("tr",null,[t("th",{class:"px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900",scope:"col"},"Start Date"),t("th",{class:"px-6 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-900",scope:"col"},"Streams Count")])],-1),ke={class:"bg-white divide-y divide-gray-200"},Se={class:"max-w-0 w-1/2 px-6 py-4 whitespace-nowrap text-sm text-gray-900"},$e={class:"flex"},Be={href:"#",class:"group inline-flex space-x-2 truncate text-sm"},Te={class:"text-gray-500 truncate group-hover:text-gray-900"},Ce={class:"max-w-0 w-full px-6 py-4 whitespace-nowrap text-sm text-gray-900"},Le={class:"flex"},Ge={href:"#",class:"group inline-flex space-x-2 truncate text-sm"},Ve={class:"text-gray-500 truncate group-hover:text-gray-900"},ze=t("h2",{class:"max-w-6xl mx-auto mt-8 px-4 text-lg leading-6 font-medium text-gray-900 sm:px-6 lg:px-8"},"Top 100 Streams",-1),De={name:"Dashboard"},je=Object.assign(De,{setup(c){const _={success:"bg-green-100 text-green-800",processing:"bg-yellow-100 text-yellow-800",failed:"bg-gray-100 text-gray-800"},g=n([]),B=n([]),v=n(!0),T=n([]),m=n(!0),G=n([]),V=n([]),z=n([]),w=n(!0),D=n(0),N=n(0),O=n(0),j=n(0),E=n(!0),F=W(),q=I(()=>F.getters["user/user"]),H=(s,u)=>s.viewers_count-u.viewers_count,A=(s,u)=>u.viewers_count-s.viewers_count;async function J(s){const u=s.order==="asc"?H:A;g.value=g.value.sort(u)}return K(()=>{P({}).then(s=>{g.value=s.data.data,D.value=s.data.meta.total,O.value=s.data.median_views,v.value=!1}),R().then(s=>{T.value=s.data.data,m.value=!1}),U().then(s=>{G.value=s.data.data,N.value=s.data.meta.total,w.value=!1}),X().then(s=>{const u=s.data.data;V.value=u,u.forEach(a=>{a.tags.forEach(C=>z.value.push(C))})}),Y().then(s=>{j.value=s.data.needed_views_count,E.value=!1}),Z().then(s=>{B.value=s.data.data})}),(s,u)=>(e(),l("main",ft,[t("div",vt,[t("div",wt,[t("div",bt,[t("div",kt,[t("div",St,[$t,t("div",null,[t("div",Bt,[Tt,t("h1",Ct,"Hello, "+i(x(q).name),1)]),t("dl",Lt,[Gt,t("dd",Vt,[o(x(st),{class:"flex-shrink-0 mr-1.5 h-5 w-5 text-green-400","aria-hidden":"true"}),zt])])])])])])])]),t("div",Dt,[t("div",Nt,[Ot,t("div",jt,[o($,{stat:D.value,loading:v.value,title:"Total Streams"},null,8,["stat","loading"]),o($,{stat:N.value,loading:m.value,title:"Total Games"},null,8,["stat","loading"]),o($,{stat:O.value,loading:v.value,title:"Median number of viewers"},null,8,["stat","loading"]),o($,{stat:j.value,loading:E.value,title:"Streams need to Make top 1k"},null,8,["stat","loading"])])]),t("div",Et,[o(S,null,{title:d(()=>[Mt]),content:d(()=>[m.value?(e(),h(y,{key:0,"class-name":"w-8 h-8"})):r("",!0),m.value?r("",!0):(e(),l("table",Ft,[qt,t("tbody",Ht,[(e(!0),l(b,null,k(T.value,a=>(e(),l("tr",{key:a.id,class:"bg-white"},[t("td",At,[t("div",Jt,[t("a",Qt,[o(x(p),{class:"flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500","aria-hidden":"true"}),t("p",Wt,i(a.game_name),1)])])]),t("td",It,[t("span",{class:L([_.processing,"inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize"])},i(a.viewers_count),3)])]))),128))])]))]),_:1}),o(S,null,{title:d(()=>[Kt]),content:d(()=>[w.value?(e(),h(y,{key:0,"class-name":"w-8 h-8"})):r("",!0),w.value?r("",!0):(e(),l("table",Pt,[Rt,t("tbody",Ut,[(e(!0),l(b,null,k(G.value,a=>(e(),l("tr",{key:a.game_count,class:"bg-white"},[t("td",Xt,[t("div",Yt,[t("a",Zt,[o(x(p),{class:"flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500","aria-hidden":"true"}),t("p",te,i(a.game_name),1)])])]),t("td",ee,[t("span",{class:L([_.failed,"inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize"])},i(a.game_count),3)])]))),128))])]))]),_:1})]),t("div",se,[o(S,null,{title:d(()=>[ae]),content:d(()=>[m.value?(e(),h(y,{key:0,"class-name":"w-8 h-8"})):r("",!0),m.value?r("",!0):(e(),l("table",le,[oe,t("tbody",ne,[(e(!0),l(b,null,k(z.value,a=>(e(),l("tr",{key:a.id,class:"bg-white"},[t("td",ie,[t("div",re,[t("a",de,[o(x(p),{class:"flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500","aria-hidden":"true"}),t("p",ce,i(a.tag),1)])])])]))),128))])]))]),_:1}),o(S,null,{title:d(()=>[ue]),content:d(()=>[w.value?(e(),h(y,{key:0,"class-name":"w-8 h-8"})):r("",!0),w.value?r("",!0):(e(),l("table",xe,[me,t("tbody",he,[(e(!0),l(b,null,k(V.value,a=>(e(),l("tr",{key:a.id,class:"bg-white"},[t("td",_e,[t("div",ge,[t("a",pe,[o(x(p),{class:"flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500","aria-hidden":"true"}),t("p",ye,i(a.stream_title),1)])])]),t("td",fe,[t("span",{class:L([_.failed,"inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize"])},i(a.viewers_count),3)])]))),128))])]))]),_:1}),o(S,null,{title:d(()=>[ve]),content:d(()=>[m.value?(e(),h(y,{key:0,"class-name":"w-8 h-8"})):r("",!0),m.value?r("",!0):(e(),l("table",we,[be,t("tbody",ke,[(e(!0),l(b,null,k(B.value,(a,C)=>(e(),l("tr",{key:C,class:"bg-white"},[t("td",Se,[t("div",$e,[t("a",Be,[o(x(p),{class:"flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500","aria-hidden":"true"}),t("p",Te,i(x(et)(a.start_date).format("lll")),1)])])]),t("td",Ce,[t("div",Le,[t("a",Ge,[o(x(p),{class:"flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500","aria-hidden":"true"}),t("p",Ve,i(a.date_count),1)])])])]))),128))])]))]),_:1})]),ze,o(tt,{streams:g.value,loader:v.value,onOnOrderBy:J},null,8,["streams","loader"])])]))}});export{je as default};
