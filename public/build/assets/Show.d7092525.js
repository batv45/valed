import{o as c,i as l,w as r,b as o,a as e,d as i,L as u,g as _,h as a,O as m}from"./app.cb490c74.js";import{a as f,_ as h}from"./PageHeader.f0b4b248.js";import{E as p,T as g}from"./vue-tabler-icons.es.b4ade83b.js";import{u as b}from"./useConfirm.67180550.js";import{_ as w}from"./Table.36708e28.js";import"./tabler.min.52ba5559.js";import"./_plugin-vue_export-helper.cdc0426e.js";const k={class:"dropdown"},v=e("button",{type:"button",class:"btn dropdown-toggle","data-bs-toggle":"dropdown"}," Se\xE7enekler ",-1),y={class:"dropdown-menu"},C=a(" D\xFCzenle"),x=["onClick"],B=a(" Router Sil "),z={class:"row"},I={class:"col"},R={class:"card"},T=e("div",{class:"card-header"},[e("h3",{class:"card-title"},"Trafik Log Kay\u0131tlar\u0131")],-1),L={class:"table-response"},G={__name:"Show",props:{page_router:Object,page_syslogs:Object},setup(t){const n=t;function d(){b("Bu router\u0131 silmek istedi\u011Finize emin misiniz?").then(s=>{s.isConfirmed&&m.Inertia.delete(route("router.destroy",n.page_router))})}return(s,N)=>(c(),l(f,{title:"Router G\xF6r\xFCnt\xFCle","container-type":"fluid"},{default:r(()=>[o(h,{"back-href":s.route("router.index"),"back-text":"Router'lar",title:"Router Cihaz Bilgisi","sub-title":t.page_router.name+" - "+t.page_router.ip_address+" Identity: "+t.page_router.identity},{actions:r(()=>[e("div",k,[v,e("div",y,[o(i(u),{href:s.route("router.edit",t.page_router),class:"dropdown-item"},{default:r(()=>[o(i(p),{class:"dropdown-item-icon"}),C]),_:1},8,["href"]),e("a",{href:"#",onClick:_(d,["prevent"]),class:"dropdown-item"},[o(i(g),{class:"dropdown-item-icon text-danger"}),B],8,x)])])]),_:1},8,["back-href","sub-title"]),e("div",z,[e("div",I,[e("div",R,[T,e("div",L,[o(w,{resource:t.page_syslogs},null,8,["resource"])])])])])]),_:1}))}};export{G as default};