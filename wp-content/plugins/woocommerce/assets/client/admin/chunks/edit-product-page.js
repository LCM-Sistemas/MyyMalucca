"use strict";(self.webpackChunk_wcAdmin_webpackJsonp=self.webpackChunk_wcAdmin_webpackJsonp||[]).push([[3307],{36778:function(e,t,n){n.r(t);var r=n(69307),c=n(65736),a=n(14599),i=n(9818),s=n(86020),l=n(67221),u=n(85597),o=n(89145),d=n(67628),m=n(97602),p=n(86998),E=n(45473),v=n(32604),_=n(64620),P=n(3143),g=n(34953);t.default=()=>{var e,t;const{productId:n}=(0,u.UO)(),f=(0,r.useRef)(),h=(0,r.useRef)(null),{product:w,isLoading:I,isPendingAction:k}=(0,i.useSelect)((e=>{const{getProduct:t,hasFinishedResolution:r,isPending:c,getPermalinkParts:a}=e(l.PRODUCTS_STORE_NAME);if(n){const e=t(parseInt(n,10),void 0);return{product:a(parseInt(n,10))&&e?e:void 0,isLoading:!r("getProduct",[parseInt(n,10)])||!r("getPermalinkParts",[parseInt(n,10)]),isPendingAction:c("createProduct")||c("deleteProduct",parseInt(n,10))||c("updateProduct",parseInt(n,10))}}return{isLoading:!1,isPendingAction:!1}}));(0,r.useEffect)((()=>{f.current&&w&&f.current.id!==w.id&&h.current&&h.current.resetForm(w),f.current=w}),[w]),(0,r.useEffect)((()=>{(0,a.recordEvent)("view_new_product_management_experience")}),[]);const b=(null===(e=f.current)||void 0===e?void 0:e.id)===(null==w?void 0:w.id)&&"trash"!==(null===(t=f.current)||void 0===t?void 0:t.status)&&"trash"===(null==w?void 0:w.status);return(0,r.createElement)("div",{className:"woocommerce-edit-product"},I&&!w?(0,r.createElement)("div",{className:"woocommerce-edit-product__spinner"},(0,r.createElement)(s.Spinner,null)):null,w&&"trash"===w.status&&!k&&!b&&(0,r.createElement)(d.a,null,(0,r.createElement)("div",{className:"woocommerce-edit-product__error"},(0,c.__)("You cannot edit this item because it is in the Trash. Please restore it and try again.","woocommerce"))),w&&("trash"!==w.status||b)&&(0,r.createElement)(s.Form,{ref:h,initialValues:w||{},validate:P.G,errors:{}},(0,r.createElement)(o.b,null),(0,r.createElement)(d.a,null,(0,r.createElement)(m.o,null),(0,r.createElement)(E.t,null),(0,r.createElement)(_.I,null),(0,r.createElement)(p.i,null),(0,r.createElement)(v.I,{product:w}),(0,r.createElement)(g.J,null))))}}}]);