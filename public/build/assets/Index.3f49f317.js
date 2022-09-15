import{u as m,o as p,i as h,w as i,b as r,a as e,g as f,d as s,n as v,L as V,h as d}from"./app.5b90729d.js";import{a as b,_ as g}from"./PageHeader.9111c6b1.js";import{_ as w}from"./Table.184b40bc.js";import{_ as l}from"./Input.e10c48f7.js";import{P as n,a as k}from"./vue-tabler-icons.es.7f112e9e.js";import{_ as I}from"./CardProgress.b16b72e0.js";import"./tabler.min.6d2cad63.js";import"./_plugin-vue_export-helper.cdc0426e.js";const P={class:"row mb-3"},C={class:"col"},R=["onSubmit"],U={class:"card-header"},$={class:"card-title"},x=d(" Yeni Router Ekle"),z={class:"card-actions"},A=d(" Yeni Ekle"),y={class:"card-body"},B={class:"row"},L={class:"col-md-3 col-lg-3"},N={class:"col-md-4 col-lg-3"},S={class:"col-md-3 col-lg-2"},E={class:"col-md-3 col-lg-2"},M={class:"col-md-3 col-lg-2"},Y={class:"row"},j={class:"col"},F={class:"card"},G=e("div",{class:"card-header"},[e("h3",{class:"card-title"},"Router Cihaz Listesi")],-1),K={class:"table-responsive"},O=d(" G\xF6r\xFCnt\xFCle "),Z={__name:"Index",props:{page_routers:Object},setup(c){const o=m({name:null,ip_address:null,api_port:8728,api_username:null,api_password:null});function _(){o.post(route("router.store"),{onSuccess:()=>{o.reset()}})}return(u,t)=>(p(),h(b,{title:"Routerlar"},{default:i(()=>[r(g,{title:"Routerlar","sub-title":"Mikrotik router cihazlar\u0131 listesi"}),e("div",P,[e("div",C,[e("form",{onSubmit:f(_,["prevent"]),class:"card"},[e("div",U,[e("h3",$,[r(s(n)),x]),e("div",z,[e("button",{type:"submit",class:v(["btn btn-primary",{"btn-loading":s(o).processing}])},[r(s(n)),A],2)])]),e("div",y,[e("div",B,[e("div",L,[r(l,{placeholder:"Cihaz ad\u0131",modelValue:s(o).name,"onUpdate:modelValue":t[0]||(t[0]=a=>s(o).name=a),error:s(o).errors.name},null,8,["modelValue","error"])]),e("div",N,[r(l,{placeholder:"IP Adres",modelValue:s(o).ip_address,"onUpdate:modelValue":t[1]||(t[1]=a=>s(o).ip_address=a),error:s(o).errors.ip_address},null,8,["modelValue","error"])]),e("div",S,[r(l,{placeholder:"API Port",modelValue:s(o).api_port,"onUpdate:modelValue":t[2]||(t[2]=a=>s(o).api_port=a),error:s(o).errors.api_port},null,8,["modelValue","error"])]),e("div",E,[r(l,{placeholder:"API Kullan\u0131c\u0131",modelValue:s(o).api_username,"onUpdate:modelValue":t[3]||(t[3]=a=>s(o).api_username=a),error:s(o).errors.api_username},null,8,["modelValue","error"])]),e("div",M,[r(l,{placeholder:"API \u015Eifre",modelValue:s(o).api_password,"onUpdate:modelValue":t[4]||(t[4]=a=>s(o).api_password=a),error:s(o).errors.api_password},null,8,["modelValue","error"])])])]),r(I,{progress:s(o).processing},null,8,["progress"])],40,R)])]),e("div",Y,[e("div",j,[e("div",F,[G,e("div",K,[r(w,{resource:c.page_routers},{"cell(actions)":i(({item:a})=>[r(s(V),{href:u.route("router.show",a),class:"btn"},{default:i(()=>[r(s(k)),O]),_:2},1032,["href"])]),_:1},8,["resource"])])])])])]),_:1}))}};export{Z as default};