(function(Fe,H){typeof exports=="object"&&typeof module<"u"?H(exports,require("react"),require("react-dom")):typeof define=="function"&&define.amd?define(["exports","react","react-dom"],H):(Fe=typeof globalThis<"u"?globalThis:Fe||self,H(Fe.AsuHeaderFooter={},Fe.React,Fe.ReactDOM))})(this,function(Fe,H,Xi){"use strict";function Wr(e){return e&&e.__esModule&&Object.prototype.hasOwnProperty.call(e,"default")?e.default:e}var Sn,Kr=Xi;Sn=Kr.createRoot,Kr.hydrateRoot;var Zr={exports:{}},Bt={};var qr;function Qi(){if(qr)return Bt;qr=1;var e=H,t=Symbol.for("react.element"),n=Symbol.for("react.fragment"),r=Object.prototype.hasOwnProperty,a=e.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,o={key:!0,ref:!0,__self:!0,__source:!0};function i(s,u,d){var g,h={},w=null,S=null;d!==void 0&&(w=""+d),u.key!==void 0&&(w=""+u.key),u.ref!==void 0&&(S=u.ref);for(g in u)r.call(u,g)&&!o.hasOwnProperty(g)&&(h[g]=u[g]);if(s&&s.defaultProps)for(g in u=s.defaultProps,u)h[g]===void 0&&(h[g]=u[g]);return{$$typeof:t,type:s,key:w,ref:S,props:h,_owner:a.current}}return Bt.Fragment=n,Bt.jsx=i,Bt.jsxs=i,Bt}Zr.exports=Qi();var l=Zr.exports;const{entries:Jr,setPrototypeOf:_r,isFrozen:zi,getPrototypeOf:Vi,getOwnPropertyDescriptor:Yi}=Object;let{freeze:be,seal:ke,create:$r}=Object,{apply:In,construct:Bn}=typeof Reflect<"u"&&Reflect;be||(be=function(t){return t}),ke||(ke=function(t){return t}),In||(In=function(t,n,r){return t.apply(n,r)}),Bn||(Bn=function(t,n){return new t(...n)});const _t=xe(Array.prototype.forEach),Gi=xe(Array.prototype.lastIndexOf),ea=xe(Array.prototype.pop),Lt=xe(Array.prototype.push),Wi=xe(Array.prototype.splice),$t=xe(String.prototype.toLowerCase),Ln=xe(String.prototype.toString),ta=xe(String.prototype.match),Pt=xe(String.prototype.replace),Ki=xe(String.prototype.indexOf),Zi=xe(String.prototype.trim),Me=xe(Object.prototype.hasOwnProperty),we=xe(RegExp.prototype.test),Dt=qi(TypeError);function xe(e){return function(t){t instanceof RegExp&&(t.lastIndex=0);for(var n=arguments.length,r=new Array(n>1?n-1:0),a=1;a<n;a++)r[a-1]=arguments[a];return In(e,t,r)}}function qi(e){return function(){for(var t=arguments.length,n=new Array(t),r=0;r<t;r++)n[r]=arguments[r];return Bn(e,n)}}function X(e,t){let n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:$t;_r&&_r(e,null);let r=t.length;for(;r--;){let a=t[r];if(typeof a=="string"){const o=n(a);o!==a&&(zi(t)||(t[r]=o),a=o)}e[a]=!0}return e}function Ji(e){for(let t=0;t<e.length;t++)Me(e,t)||(e[t]=null);return e}function st(e){const t=$r(null);for(const[n,r]of Jr(e))Me(e,n)&&(Array.isArray(r)?t[n]=Ji(r):r&&typeof r=="object"&&r.constructor===Object?t[n]=st(r):t[n]=r);return t}function Rt(e,t){for(;e!==null;){const r=Yi(e,t);if(r){if(r.get)return xe(r.get);if(typeof r.value=="function")return xe(r.value)}e=Vi(e)}function n(){return null}return n}const na=be(["a","abbr","acronym","address","area","article","aside","audio","b","bdi","bdo","big","blink","blockquote","body","br","button","canvas","caption","center","cite","code","col","colgroup","content","data","datalist","dd","decorator","del","details","dfn","dialog","dir","div","dl","dt","element","em","fieldset","figcaption","figure","font","footer","form","h1","h2","h3","h4","h5","h6","head","header","hgroup","hr","html","i","img","input","ins","kbd","label","legend","li","main","map","mark","marquee","menu","menuitem","meter","nav","nobr","ol","optgroup","option","output","p","picture","pre","progress","q","rp","rt","ruby","s","samp","section","select","shadow","small","source","spacer","span","strike","strong","style","sub","summary","sup","table","tbody","td","template","textarea","tfoot","th","thead","time","tr","track","tt","u","ul","var","video","wbr"]),Pn=be(["svg","a","altglyph","altglyphdef","altglyphitem","animatecolor","animatemotion","animatetransform","circle","clippath","defs","desc","ellipse","filter","font","g","glyph","glyphref","hkern","image","line","lineargradient","marker","mask","metadata","mpath","path","pattern","polygon","polyline","radialgradient","rect","stop","style","switch","symbol","text","textpath","title","tref","tspan","view","vkern"]),Dn=be(["feBlend","feColorMatrix","feComponentTransfer","feComposite","feConvolveMatrix","feDiffuseLighting","feDisplacementMap","feDistantLight","feDropShadow","feFlood","feFuncA","feFuncB","feFuncG","feFuncR","feGaussianBlur","feImage","feMerge","feMergeNode","feMorphology","feOffset","fePointLight","feSpecularLighting","feSpotLight","feTile","feTurbulence"]),_i=be(["animate","color-profile","cursor","discard","font-face","font-face-format","font-face-name","font-face-src","font-face-uri","foreignobject","hatch","hatchpath","mesh","meshgradient","meshpatch","meshrow","missing-glyph","script","set","solidcolor","unknown","use"]),Rn=be(["math","menclose","merror","mfenced","mfrac","mglyph","mi","mlabeledtr","mmultiscripts","mn","mo","mover","mpadded","mphantom","mroot","mrow","ms","mspace","msqrt","mstyle","msub","msup","msubsup","mtable","mtd","mtext","mtr","munder","munderover","mprescripts"]),$i=be(["maction","maligngroup","malignmark","mlongdiv","mscarries","mscarry","msgroup","mstack","msline","msrow","semantics","annotation","annotation-xml","mprescripts","none"]),ra=be(["#text"]),aa=be(["accept","action","align","alt","autocapitalize","autocomplete","autopictureinpicture","autoplay","background","bgcolor","border","capture","cellpadding","cellspacing","checked","cite","class","clear","color","cols","colspan","controls","controlslist","coords","crossorigin","datetime","decoding","default","dir","disabled","disablepictureinpicture","disableremoteplayback","download","draggable","enctype","enterkeyhint","face","for","headers","height","hidden","high","href","hreflang","id","inputmode","integrity","ismap","kind","label","lang","list","loading","loop","low","max","maxlength","media","method","min","minlength","multiple","muted","name","nonce","noshade","novalidate","nowrap","open","optimum","pattern","placeholder","playsinline","popover","popovertarget","popovertargetaction","poster","preload","pubdate","radiogroup","readonly","rel","required","rev","reversed","role","rows","rowspan","spellcheck","scope","selected","shape","size","sizes","span","srclang","start","src","srcset","step","style","summary","tabindex","title","translate","type","usemap","valign","value","width","wrap","xmlns","slot"]),kn=be(["accent-height","accumulate","additive","alignment-baseline","amplitude","ascent","attributename","attributetype","azimuth","basefrequency","baseline-shift","begin","bias","by","class","clip","clippathunits","clip-path","clip-rule","color","color-interpolation","color-interpolation-filters","color-profile","color-rendering","cx","cy","d","dx","dy","diffuseconstant","direction","display","divisor","dur","edgemode","elevation","end","exponent","fill","fill-opacity","fill-rule","filter","filterunits","flood-color","flood-opacity","font-family","font-size","font-size-adjust","font-stretch","font-style","font-variant","font-weight","fx","fy","g1","g2","glyph-name","glyphref","gradientunits","gradienttransform","height","href","id","image-rendering","in","in2","intercept","k","k1","k2","k3","k4","kerning","keypoints","keysplines","keytimes","lang","lengthadjust","letter-spacing","kernelmatrix","kernelunitlength","lighting-color","local","marker-end","marker-mid","marker-start","markerheight","markerunits","markerwidth","maskcontentunits","maskunits","max","mask","media","method","mode","min","name","numoctaves","offset","operator","opacity","order","orient","orientation","origin","overflow","paint-order","path","pathlength","patterncontentunits","patterntransform","patternunits","points","preservealpha","preserveaspectratio","primitiveunits","r","rx","ry","radius","refx","refy","repeatcount","repeatdur","restart","result","rotate","scale","seed","shape-rendering","slope","specularconstant","specularexponent","spreadmethod","startoffset","stddeviation","stitchtiles","stop-color","stop-opacity","stroke-dasharray","stroke-dashoffset","stroke-linecap","stroke-linejoin","stroke-miterlimit","stroke-opacity","stroke","stroke-width","style","surfacescale","systemlanguage","tabindex","tablevalues","targetx","targety","transform","transform-origin","text-anchor","text-decoration","text-rendering","textlength","type","u1","u2","unicode","values","viewbox","visibility","version","vert-adv-y","vert-origin-x","vert-origin-y","width","word-spacing","wrap","writing-mode","xchannelselector","ychannelselector","x","x1","x2","xmlns","y","y1","y2","z","zoomandpan"]),oa=be(["accent","accentunder","align","bevelled","close","columnsalign","columnlines","columnspan","denomalign","depth","dir","display","displaystyle","encoding","fence","frame","height","href","id","largeop","length","linethickness","lspace","lquote","mathbackground","mathcolor","mathsize","mathvariant","maxsize","minsize","movablelimits","notation","numalign","open","rowalign","rowlines","rowspacing","rowspan","rspace","rquote","scriptlevel","scriptminsize","scriptsizemultiplier","selection","separator","separators","stretchy","subscriptshift","supscriptshift","symmetric","voffset","width","xmlns"]),en=be(["xlink:href","xml:id","xlink:title","xml:space","xmlns:xlink"]),es=ke(/\{\{[\w\W]*|[\w\W]*\}\}/gm),ts=ke(/<%[\w\W]*|[\w\W]*%>/gm),ns=ke(/\$\{[\w\W]*/gm),rs=ke(/^data-[\-\w.\u00B7-\uFFFF]+$/),as=ke(/^aria-[\-\w]+$/),ia=ke(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|sms|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i),os=ke(/^(?:\w+script|data):/i),is=ke(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g),sa=ke(/^html$/i),ss=ke(/^[a-z][.\w]*(-[.\w]+)+$/i);var ca=Object.freeze({__proto__:null,ARIA_ATTR:as,ATTR_WHITESPACE:is,CUSTOM_ELEMENT:ss,DATA_ATTR:rs,DOCTYPE_NAME:sa,ERB_EXPR:ts,IS_ALLOWED_URI:ia,IS_SCRIPT_OR_DATA:os,MUSTACHE_EXPR:es,TMPLIT_EXPR:ns});const kt={element:1,text:3,progressingInstruction:7,comment:8,document:9},cs=function(){return typeof window>"u"?null:window},ls=function(t,n){if(typeof t!="object"||typeof t.createPolicy!="function")return null;let r=null;const a="data-tt-policy-suffix";n&&n.hasAttribute(a)&&(r=n.getAttribute(a));const o="dompurify"+(r?"#"+r:"");try{return t.createPolicy(o,{createHTML(i){return i},createScriptURL(i){return i}})}catch{return console.warn("TrustedTypes policy "+o+" could not be created."),null}},la=function(){return{afterSanitizeAttributes:[],afterSanitizeElements:[],afterSanitizeShadowDOM:[],beforeSanitizeAttributes:[],beforeSanitizeElements:[],beforeSanitizeShadowDOM:[],uponSanitizeAttribute:[],uponSanitizeElement:[],uponSanitizeShadowNode:[]}};function fa(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:cs();const t=F=>fa(F);if(t.version="3.2.5",t.removed=[],!e||!e.document||e.document.nodeType!==kt.document||!e.Element)return t.isSupported=!1,t;let{document:n}=e;const r=n,a=r.currentScript,{DocumentFragment:o,HTMLTemplateElement:i,Node:s,Element:u,NodeFilter:d,NamedNodeMap:g=e.NamedNodeMap||e.MozNamedAttrMap,HTMLFormElement:h,DOMParser:w,trustedTypes:S}=e,b=u.prototype,m=Rt(b,"cloneNode"),v=Rt(b,"remove"),T=Rt(b,"nextSibling"),N=Rt(b,"childNodes"),I=Rt(b,"parentNode");if(typeof i=="function"){const F=n.createElement("template");F.content&&F.content.ownerDocument&&(n=F.content.ownerDocument)}let D,y="";const{implementation:$,createNodeIterator:se,createDocumentFragment:_,getElementsByTagName:ce}=n,{importNode:ue}=r;let Z=la();t.isSupported=typeof Jr=="function"&&typeof I=="function"&&$&&$.createHTMLDocument!==void 0;const{MUSTACHE_EXPR:Ae,ERB_EXPR:Ce,TMPLIT_EXPR:Se,DATA_ATTR:ve,ARIA_ATTR:ut,IS_SCRIPT_OR_DATA:Re,ATTR_WHITESPACE:Ee,CUSTOM_ELEMENT:dt}=ca;let{IS_ALLOWED_URI:$e}=ca,ne=null;const R=X({},[...na,...Pn,...Dn,...Rn,...ra]);let E=null;const L=X({},[...aa,...kn,...oa,...en]);let B=Object.seal($r(null,{tagNameCheck:{writable:!0,configurable:!1,enumerable:!0,value:null},attributeNameCheck:{writable:!0,configurable:!1,enumerable:!0,value:null},allowCustomizedBuiltInElements:{writable:!0,configurable:!1,enumerable:!0,value:!1}})),p=null,V=null,O=!0,ee=!0,G=!1,W=!0,U=!1,ie=!0,ae=!1,z=!1,le=!1,Q=!1,oe=!1,Ve=!1,fe=!0,At=!1;const mt="user-content-";let Oe=!0,M=!1,J={},Ye=null;const Tt=X({},["annotation-xml","audio","colgroup","desc","foreignobject","head","iframe","math","mi","mn","mo","ms","mtext","noembed","noframes","noscript","plaintext","script","style","svg","template","thead","title","video","xmp"]);let He=null;const Ti=X({},["audio","video","img","source","image","track"]);let Qr=null;const Si=X({},["alt","class","for","id","label","name","pattern","placeholder","role","summary","title","value","style","xmlns"]),Cn="http://www.w3.org/1998/Math/MathML",En="http://www.w3.org/2000/svg",et="http://www.w3.org/1999/xhtml";let St=et,zr=!1,Vr=null;const bu=X({},[Cn,En,et],Ln);let On=X({},["mi","mo","mn","ms","mtext"]),Nn=X({},["annotation-xml"]);const wu=X({},["title","style","font","a","script"]);let qt=null;const xu=["application/xhtml+xml","text/html"],Cu="text/html";let de=null,It=null;const Eu=n.createElement("form"),Ii=function(c){return c instanceof RegExp||c instanceof Function},Yr=function(){let c=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};if(!(It&&It===c)){if((!c||typeof c!="object")&&(c={}),c=st(c),qt=xu.indexOf(c.PARSER_MEDIA_TYPE)===-1?Cu:c.PARSER_MEDIA_TYPE,de=qt==="application/xhtml+xml"?Ln:$t,ne=Me(c,"ALLOWED_TAGS")?X({},c.ALLOWED_TAGS,de):R,E=Me(c,"ALLOWED_ATTR")?X({},c.ALLOWED_ATTR,de):L,Vr=Me(c,"ALLOWED_NAMESPACES")?X({},c.ALLOWED_NAMESPACES,Ln):bu,Qr=Me(c,"ADD_URI_SAFE_ATTR")?X(st(Si),c.ADD_URI_SAFE_ATTR,de):Si,He=Me(c,"ADD_DATA_URI_TAGS")?X(st(Ti),c.ADD_DATA_URI_TAGS,de):Ti,Ye=Me(c,"FORBID_CONTENTS")?X({},c.FORBID_CONTENTS,de):Tt,p=Me(c,"FORBID_TAGS")?X({},c.FORBID_TAGS,de):{},V=Me(c,"FORBID_ATTR")?X({},c.FORBID_ATTR,de):{},J=Me(c,"USE_PROFILES")?c.USE_PROFILES:!1,O=c.ALLOW_ARIA_ATTR!==!1,ee=c.ALLOW_DATA_ATTR!==!1,G=c.ALLOW_UNKNOWN_PROTOCOLS||!1,W=c.ALLOW_SELF_CLOSE_IN_ATTR!==!1,U=c.SAFE_FOR_TEMPLATES||!1,ie=c.SAFE_FOR_XML!==!1,ae=c.WHOLE_DOCUMENT||!1,Q=c.RETURN_DOM||!1,oe=c.RETURN_DOM_FRAGMENT||!1,Ve=c.RETURN_TRUSTED_TYPE||!1,le=c.FORCE_BODY||!1,fe=c.SANITIZE_DOM!==!1,At=c.SANITIZE_NAMED_PROPS||!1,Oe=c.KEEP_CONTENT!==!1,M=c.IN_PLACE||!1,$e=c.ALLOWED_URI_REGEXP||ia,St=c.NAMESPACE||et,On=c.MATHML_TEXT_INTEGRATION_POINTS||On,Nn=c.HTML_INTEGRATION_POINTS||Nn,B=c.CUSTOM_ELEMENT_HANDLING||{},c.CUSTOM_ELEMENT_HANDLING&&Ii(c.CUSTOM_ELEMENT_HANDLING.tagNameCheck)&&(B.tagNameCheck=c.CUSTOM_ELEMENT_HANDLING.tagNameCheck),c.CUSTOM_ELEMENT_HANDLING&&Ii(c.CUSTOM_ELEMENT_HANDLING.attributeNameCheck)&&(B.attributeNameCheck=c.CUSTOM_ELEMENT_HANDLING.attributeNameCheck),c.CUSTOM_ELEMENT_HANDLING&&typeof c.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements=="boolean"&&(B.allowCustomizedBuiltInElements=c.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements),U&&(ee=!1),oe&&(Q=!0),J&&(ne=X({},ra),E=[],J.html===!0&&(X(ne,na),X(E,aa)),J.svg===!0&&(X(ne,Pn),X(E,kn),X(E,en)),J.svgFilters===!0&&(X(ne,Dn),X(E,kn),X(E,en)),J.mathMl===!0&&(X(ne,Rn),X(E,oa),X(E,en))),c.ADD_TAGS&&(ne===R&&(ne=st(ne)),X(ne,c.ADD_TAGS,de)),c.ADD_ATTR&&(E===L&&(E=st(E)),X(E,c.ADD_ATTR,de)),c.ADD_URI_SAFE_ATTR&&X(Qr,c.ADD_URI_SAFE_ATTR,de),c.FORBID_CONTENTS&&(Ye===Tt&&(Ye=st(Ye)),X(Ye,c.FORBID_CONTENTS,de)),Oe&&(ne["#text"]=!0),ae&&X(ne,["html","head","body"]),ne.table&&(X(ne,["tbody"]),delete p.tbody),c.TRUSTED_TYPES_POLICY){if(typeof c.TRUSTED_TYPES_POLICY.createHTML!="function")throw Dt('TRUSTED_TYPES_POLICY configuration option must provide a "createHTML" hook.');if(typeof c.TRUSTED_TYPES_POLICY.createScriptURL!="function")throw Dt('TRUSTED_TYPES_POLICY configuration option must provide a "createScriptURL" hook.');D=c.TRUSTED_TYPES_POLICY,y=D.createHTML("")}else D===void 0&&(D=ls(S,a)),D!==null&&typeof y=="string"&&(y=D.createHTML(""));be&&be(c),It=c}},Bi=X({},[...Pn,...Dn,..._i]),Li=X({},[...Rn,...$i]),Ou=function(c){let C=I(c);(!C||!C.tagName)&&(C={namespaceURI:St,tagName:"template"});const P=$t(c.tagName),re=$t(C.tagName);return Vr[c.namespaceURI]?c.namespaceURI===En?C.namespaceURI===et?P==="svg":C.namespaceURI===Cn?P==="svg"&&(re==="annotation-xml"||On[re]):!!Bi[P]:c.namespaceURI===Cn?C.namespaceURI===et?P==="math":C.namespaceURI===En?P==="math"&&Nn[re]:!!Li[P]:c.namespaceURI===et?C.namespaceURI===En&&!Nn[re]||C.namespaceURI===Cn&&!On[re]?!1:!Li[P]&&(wu[P]||!Bi[P]):!!(qt==="application/xhtml+xml"&&Vr[c.namespaceURI]):!1},Ge=function(c){Lt(t.removed,{element:c});try{I(c).removeChild(c)}catch{v(c)}},Tn=function(c,C){try{Lt(t.removed,{attribute:C.getAttributeNode(c),from:C})}catch{Lt(t.removed,{attribute:null,from:C})}if(C.removeAttribute(c),c==="is")if(Q||oe)try{Ge(C)}catch{}else try{C.setAttribute(c,"")}catch{}},Pi=function(c){let C=null,P=null;if(le)c="<remove></remove>"+c;else{const me=ta(c,/^[\r\n\t ]+/);P=me&&me[0]}qt==="application/xhtml+xml"&&St===et&&(c='<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>'+c+"</body></html>");const re=D?D.createHTML(c):c;if(St===et)try{C=new w().parseFromString(re,qt)}catch{}if(!C||!C.documentElement){C=$.createDocument(St,"template",null);try{C.documentElement.innerHTML=zr?y:re}catch{}}const ye=C.body||C.documentElement;return c&&P&&ye.insertBefore(n.createTextNode(P),ye.childNodes[0]||null),St===et?ce.call(C,ae?"html":"body")[0]:ae?C.documentElement:ye},Di=function(c){return se.call(c.ownerDocument||c,c,d.SHOW_ELEMENT|d.SHOW_COMMENT|d.SHOW_TEXT|d.SHOW_PROCESSING_INSTRUCTION|d.SHOW_CDATA_SECTION,null)},Gr=function(c){return c instanceof h&&(typeof c.nodeName!="string"||typeof c.textContent!="string"||typeof c.removeChild!="function"||!(c.attributes instanceof g)||typeof c.removeAttribute!="function"||typeof c.setAttribute!="function"||typeof c.namespaceURI!="string"||typeof c.insertBefore!="function"||typeof c.hasChildNodes!="function")},Ri=function(c){return typeof s=="function"&&c instanceof s};function tt(F,c,C){_t(F,P=>{P.call(t,c,C,It)})}const ki=function(c){let C=null;if(tt(Z.beforeSanitizeElements,c,null),Gr(c))return Ge(c),!0;const P=de(c.nodeName);if(tt(Z.uponSanitizeElement,c,{tagName:P,allowedTags:ne}),c.hasChildNodes()&&!Ri(c.firstElementChild)&&we(/<[/\w!]/g,c.innerHTML)&&we(/<[/\w!]/g,c.textContent)||c.nodeType===kt.progressingInstruction||ie&&c.nodeType===kt.comment&&we(/<[/\w]/g,c.data))return Ge(c),!0;if(!ne[P]||p[P]){if(!p[P]&&Mi(P)&&(B.tagNameCheck instanceof RegExp&&we(B.tagNameCheck,P)||B.tagNameCheck instanceof Function&&B.tagNameCheck(P)))return!1;if(Oe&&!Ye[P]){const re=I(c)||c.parentNode,ye=N(c)||c.childNodes;if(ye&&re){const me=ye.length;for(let Ie=me-1;Ie>=0;--Ie){const We=m(ye[Ie],!0);We.__removalCount=(c.__removalCount||0)+1,re.insertBefore(We,T(c))}}}return Ge(c),!0}return c instanceof u&&!Ou(c)||(P==="noscript"||P==="noembed"||P==="noframes")&&we(/<\/no(script|embed|frames)/i,c.innerHTML)?(Ge(c),!0):(U&&c.nodeType===kt.text&&(C=c.textContent,_t([Ae,Ce,Se],re=>{C=Pt(C,re," ")}),c.textContent!==C&&(Lt(t.removed,{element:c.cloneNode()}),c.textContent=C)),tt(Z.afterSanitizeElements,c,null),!1)},Fi=function(c,C,P){if(fe&&(C==="id"||C==="name")&&(P in n||P in Eu))return!1;if(!(ee&&!V[C]&&we(ve,C))){if(!(O&&we(ut,C))){if(!E[C]||V[C]){if(!(Mi(c)&&(B.tagNameCheck instanceof RegExp&&we(B.tagNameCheck,c)||B.tagNameCheck instanceof Function&&B.tagNameCheck(c))&&(B.attributeNameCheck instanceof RegExp&&we(B.attributeNameCheck,C)||B.attributeNameCheck instanceof Function&&B.attributeNameCheck(C))||C==="is"&&B.allowCustomizedBuiltInElements&&(B.tagNameCheck instanceof RegExp&&we(B.tagNameCheck,P)||B.tagNameCheck instanceof Function&&B.tagNameCheck(P))))return!1}else if(!Qr[C]){if(!we($e,Pt(P,Ee,""))){if(!((C==="src"||C==="xlink:href"||C==="href")&&c!=="script"&&Ki(P,"data:")===0&&He[c])){if(!(G&&!we(Re,Pt(P,Ee,"")))){if(P)return!1}}}}}}return!0},Mi=function(c){return c!=="annotation-xml"&&ta(c,dt)},Ui=function(c){tt(Z.beforeSanitizeAttributes,c,null);const{attributes:C}=c;if(!C||Gr(c))return;const P={attrName:"",attrValue:"",keepAttr:!0,allowedAttributes:E,forceKeepAttr:void 0};let re=C.length;for(;re--;){const ye=C[re],{name:me,namespaceURI:Ie,value:We}=ye,Jt=de(me);let Ne=me==="value"?We:Zi(We);if(P.attrName=Jt,P.attrValue=Ne,P.keepAttr=!0,P.forceKeepAttr=void 0,tt(Z.uponSanitizeAttribute,c,P),Ne=P.attrValue,At&&(Jt==="id"||Jt==="name")&&(Tn(me,c),Ne=mt+Ne),ie&&we(/((--!?|])>)|<\/(style|title)/i,Ne)){Tn(me,c);continue}if(P.forceKeepAttr||(Tn(me,c),!P.keepAttr))continue;if(!W&&we(/\/>/i,Ne)){Tn(me,c);continue}U&&_t([Ae,Ce,Se],ji=>{Ne=Pt(Ne,ji," ")});const Hi=de(c.nodeName);if(Fi(Hi,Jt,Ne)){if(D&&typeof S=="object"&&typeof S.getAttributeType=="function"&&!Ie)switch(S.getAttributeType(Hi,Jt)){case"TrustedHTML":{Ne=D.createHTML(Ne);break}case"TrustedScriptURL":{Ne=D.createScriptURL(Ne);break}}try{Ie?c.setAttributeNS(Ie,me,Ne):c.setAttribute(me,Ne),Gr(c)?Ge(c):ea(t.removed)}catch{}}}tt(Z.afterSanitizeAttributes,c,null)},Nu=function F(c){let C=null;const P=Di(c);for(tt(Z.beforeSanitizeShadowDOM,c,null);C=P.nextNode();)tt(Z.uponSanitizeShadowNode,C,null),ki(C),Ui(C),C.content instanceof o&&F(C.content);tt(Z.afterSanitizeShadowDOM,c,null)};return t.sanitize=function(F){let c=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{},C=null,P=null,re=null,ye=null;if(zr=!F,zr&&(F="<!-->"),typeof F!="string"&&!Ri(F))if(typeof F.toString=="function"){if(F=F.toString(),typeof F!="string")throw Dt("dirty is not a string, aborting")}else throw Dt("toString is not a function");if(!t.isSupported)return F;if(z||Yr(c),t.removed=[],typeof F=="string"&&(M=!1),M){if(F.nodeName){const We=de(F.nodeName);if(!ne[We]||p[We])throw Dt("root node is forbidden and cannot be sanitized in-place")}}else if(F instanceof s)C=Pi("<!---->"),P=C.ownerDocument.importNode(F,!0),P.nodeType===kt.element&&P.nodeName==="BODY"||P.nodeName==="HTML"?C=P:C.appendChild(P);else{if(!Q&&!U&&!ae&&F.indexOf("<")===-1)return D&&Ve?D.createHTML(F):F;if(C=Pi(F),!C)return Q?null:Ve?y:""}C&&le&&Ge(C.firstChild);const me=Di(M?F:C);for(;re=me.nextNode();)ki(re),Ui(re),re.content instanceof o&&Nu(re.content);if(M)return F;if(Q){if(oe)for(ye=_.call(C.ownerDocument);C.firstChild;)ye.appendChild(C.firstChild);else ye=C;return(E.shadowroot||E.shadowrootmode)&&(ye=ue.call(r,ye,!0)),ye}let Ie=ae?C.outerHTML:C.innerHTML;return ae&&ne["!doctype"]&&C.ownerDocument&&C.ownerDocument.doctype&&C.ownerDocument.doctype.name&&we(sa,C.ownerDocument.doctype.name)&&(Ie="<!DOCTYPE "+C.ownerDocument.doctype.name+`>
`+Ie),U&&_t([Ae,Ce,Se],We=>{Ie=Pt(Ie,We," ")}),D&&Ve?D.createHTML(Ie):Ie},t.setConfig=function(){let F=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};Yr(F),z=!0},t.clearConfig=function(){It=null,z=!1},t.isValidAttribute=function(F,c,C){It||Yr({});const P=de(F),re=de(c);return Fi(P,re,C)},t.addHook=function(F,c){typeof c=="function"&&Lt(Z[F],c)},t.removeHook=function(F,c){if(c!==void 0){const C=Gi(Z[F],c);return C===-1?void 0:Wi(Z[F],C,1)[0]}return ea(Z[F])},t.removeHooks=function(F){Z[F]=[]},t.removeAllHooks=function(){Z=la()},t}fa();function*ua(e="id-",t=0){let n=t;for(;;)n+=1,yield e+n}let Fn=!1;const fs=(e,t)=>{Fn||(Fn=!0,setTimeout(()=>{e(),Fn=!1},t))};var da={exports:{}},Mn,Aa;function us(){if(Aa)return Mn;Aa=1;var e="SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED";return Mn=e,Mn}var Un,ma;function ds(){if(ma)return Un;ma=1;var e=us();function t(){}function n(){}return n.resetWarningCache=t,Un=function(){function r(i,s,u,d,g,h){if(h!==e){var w=new Error("Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types");throw w.name="Invariant Violation",w}}r.isRequired=r;function a(){return r}var o={array:r,bigint:r,bool:r,func:r,number:r,object:r,string:r,symbol:r,any:r,arrayOf:a,element:r,elementType:r,instanceOf:a,node:r,objectOf:a,oneOf:a,oneOfType:a,shape:a,exact:a,checkPropTypes:n,resetWarningCache:t};return o.PropTypes=o,o},Un}da.exports=ds()();var Be=da.exports;const f=Wr(Be);f.shape({event:f.string,action:f.string,name:f.string,region:f.string,section:f.string,component:f.string,type:f.string,text:f.string});const Y=({event:e="",action:t="",name:n="",type:r="",section:a="",text:o="",region:i="",component:s=""})=>{const{dataLayer:u}=window,d={event:e.toLowerCase(),action:t.toLowerCase(),name:n.toLowerCase(),type:r.toLowerCase(),region:i.toLowerCase(),section:a.toLowerCase(),text:o.toLowerCase(),component:s.toLowerCase()};u&&u.push(d)},Ft=({children:e})=>l.jsx(l.Fragment,{children:e});Ft.propTypes={children:f.oneOfType([f.arrayOf(f.node),f.node,f.string])};var As={exports:{}};(function(e){(function(){var t={}.hasOwnProperty;function n(){for(var o="",i=0;i<arguments.length;i++){var s=arguments[i];s&&(o=a(o,r(s)))}return o}function r(o){if(typeof o=="string"||typeof o=="number")return o;if(typeof o!="object")return"";if(Array.isArray(o))return n.apply(null,o);if(o.toString!==Object.prototype.toString&&!o.toString.toString().includes("[native code]"))return o.toString();var i="";for(var s in o)t.call(o,s)&&o[s]&&(i=a(i,s));return i}function a(o,i){return i?o?o+" "+i:o+i:o}e.exports?(n.default=n,e.exports=n):window.classNames=n})()})(As),{...Ft.propTypes};const pa=({children:e,className:t="container",...n})=>l.jsx("div",{className:t,...n,children:l.jsx("div",{className:"row",children:e})});pa.propTypes={children:Ft.propTypes.children},{...pa.propTypes},Ft.propTypes.children,f.oneOf(["0","3","4","6","8","9","12"]),Ft.propTypes.children;function ga({packageName:e="",component:t="",type:n="",configuration:r={}}){if(!e||!t){console.error("trackReactComponent: Missing required arguments.");return}window.uds=window.uds||{},window.uds.package=window.uds.package||{},window.uds.package[e]={component:t,type:n,configuration:r}}const ha={alt:f.string,title:f.string,src:f.string,mobileSrc:f.string,brandLink:f.string},tn={baseUrl:f.string,parentOrg:f.string,parentOrgUrl:f.string,animate:f.bool},nn={loggedIn:f.bool,loginLink:f.string,logoutLink:f.string,userName:f.string},rn={text:f.string.isRequired,color:f.oneOf(["gold","maroon","light","dark"]),href:f.string,classes:f.string,onClick:f.func,onFocus:f.func},Hn=f.shape({id:f.number,href:f.string,text:f.string,type:f.string,selected:f.bool,items:f.arrayOf(f.arrayOf(f.object)),buttons:f.arrayOf(f.shape(rn)),class:f.string}),va={isPartner:f.bool,navTree:f.arrayOf(Hn),partnerLogo:f.shape(ha),logo:f.shape(ha),title:f.string,parentOrg:tn.parentOrg,parentOrgUrl:tn.parentOrgUrl,baseUrl:tn.baseUrl,loggedIn:nn.loggedIn,userName:nn.userName,loginLink:nn.loginLink,onLoginClick:f.func,logoutLink:nn.logoutLink,onLogoutClick:f.func,buttons:f.arrayOf(f.shape(rn)),breakpoint:f.oneOf(["Lg","Xl"]),animateTitle:f.bool,expandOnHover:f.bool,mobileNavTree:f.arrayOf(Hn),hasNavigation:f.bool,searchUrl:f.string,site:f.string,renderDiv:f.oneOf(["true","false"])};var ya={exports:{}},q={};var ba;function ms(){if(ba)return q;ba=1;var e=Symbol.for("react.transitional.element"),t=Symbol.for("react.portal"),n=Symbol.for("react.fragment"),r=Symbol.for("react.strict_mode"),a=Symbol.for("react.profiler"),o=Symbol.for("react.consumer"),i=Symbol.for("react.context"),s=Symbol.for("react.forward_ref"),u=Symbol.for("react.suspense"),d=Symbol.for("react.suspense_list"),g=Symbol.for("react.memo"),h=Symbol.for("react.lazy"),w=Symbol.for("react.offscreen"),S=Symbol.for("react.client.reference");function b(m){if(typeof m=="object"&&m!==null){var v=m.$$typeof;switch(v){case e:switch(m=m.type,m){case n:case a:case r:case u:case d:return m;default:switch(m=m&&m.$$typeof,m){case i:case s:case h:case g:return m;case o:return m;default:return v}}case t:return v}}}return q.ContextConsumer=o,q.ContextProvider=i,q.Element=e,q.ForwardRef=s,q.Fragment=n,q.Lazy=h,q.Memo=g,q.Portal=t,q.Profiler=a,q.StrictMode=r,q.Suspense=u,q.SuspenseList=d,q.isContextConsumer=function(m){return b(m)===o},q.isContextProvider=function(m){return b(m)===i},q.isElement=function(m){return typeof m=="object"&&m!==null&&m.$$typeof===e},q.isForwardRef=function(m){return b(m)===s},q.isFragment=function(m){return b(m)===n},q.isLazy=function(m){return b(m)===h},q.isMemo=function(m){return b(m)===g},q.isPortal=function(m){return b(m)===t},q.isProfiler=function(m){return b(m)===a},q.isStrictMode=function(m){return b(m)===r},q.isSuspense=function(m){return b(m)===u},q.isSuspenseList=function(m){return b(m)===d},q.isValidElementType=function(m){return typeof m=="string"||typeof m=="function"||m===n||m===a||m===r||m===u||m===d||m===w||typeof m=="object"&&m!==null&&(m.$$typeof===h||m.$$typeof===g||m.$$typeof===i||m.$$typeof===o||m.$$typeof===s||m.$$typeof===S||m.getModuleId!==void 0)},q.typeOf=b,q}ya.exports=ms();var wa=ya.exports;function ps(e){function t(R,E,L,B,p){for(var V=0,O=0,ee=0,G=0,W,U,ie=0,ae=0,z,le=z=W=0,Q=0,oe=0,Ve=0,fe=0,At=L.length,mt=At-1,Oe,M="",J="",Ye="",Tt="",He;Q<At;){if(U=L.charCodeAt(Q),Q===mt&&O+G+ee+V!==0&&(O!==0&&(U=O===47?10:47),G=ee=V=0,At++,mt++),O+G+ee+V===0){if(Q===mt&&(0<oe&&(M=M.replace(w,"")),0<M.trim().length)){switch(U){case 32:case 9:case 59:case 13:case 10:break;default:M+=L.charAt(Q)}U=59}switch(U){case 123:for(M=M.trim(),W=M.charCodeAt(0),z=1,fe=++Q;Q<At;){switch(U=L.charCodeAt(Q)){case 123:z++;break;case 125:z--;break;case 47:switch(U=L.charCodeAt(Q+1)){case 42:case 47:e:{for(le=Q+1;le<mt;++le)switch(L.charCodeAt(le)){case 47:if(U===42&&L.charCodeAt(le-1)===42&&Q+2!==le){Q=le+1;break e}break;case 10:if(U===47){Q=le+1;break e}}Q=le}}break;case 91:U++;case 40:U++;case 34:case 39:for(;Q++<mt&&L.charCodeAt(Q)!==U;);}if(z===0)break;Q++}switch(z=L.substring(fe,Q),W===0&&(W=(M=M.replace(h,"").trim()).charCodeAt(0)),W){case 64:switch(0<oe&&(M=M.replace(w,"")),U=M.charCodeAt(1),U){case 100:case 109:case 115:case 45:oe=E;break;default:oe=ut}if(z=t(E,oe,z,U,p+1),fe=z.length,0<Ee&&(oe=n(ut,M,Ve),He=s(3,z,oe,E,Ce,Ae,fe,U,p,B),M=oe.join(""),He!==void 0&&(fe=(z=He.trim()).length)===0&&(U=0,z="")),0<fe)switch(U){case 115:M=M.replace($,i);case 100:case 109:case 45:z=M+"{"+z+"}";break;case 107:M=M.replace(N,"$1 $2"),z=M+"{"+z+"}",z=ve===1||ve===2&&o("@"+z,3)?"@-webkit-"+z+"@"+z:"@"+z;break;default:z=M+z,B===112&&(z=(J+=z,""))}else z="";break;default:z=t(E,n(E,M,Ve),z,B,p+1)}Ye+=z,z=Ve=oe=le=W=0,M="",U=L.charCodeAt(++Q);break;case 125:case 59:if(M=(0<oe?M.replace(w,""):M).trim(),1<(fe=M.length))switch(le===0&&(W=M.charCodeAt(0),W===45||96<W&&123>W)&&(fe=(M=M.replace(" ",":")).length),0<Ee&&(He=s(1,M,E,R,Ce,Ae,J.length,B,p,B))!==void 0&&(fe=(M=He.trim()).length)===0&&(M="\0\0"),W=M.charCodeAt(0),U=M.charCodeAt(1),W){case 0:break;case 64:if(U===105||U===99){Tt+=M+L.charAt(Q);break}default:M.charCodeAt(fe-1)!==58&&(J+=a(M,W,U,M.charCodeAt(2)))}Ve=oe=le=W=0,M="",U=L.charCodeAt(++Q)}}switch(U){case 13:case 10:O===47?O=0:1+W===0&&B!==107&&0<M.length&&(oe=1,M+="\0"),0<Ee*$e&&s(0,M,E,R,Ce,Ae,J.length,B,p,B),Ae=1,Ce++;break;case 59:case 125:if(O+G+ee+V===0){Ae++;break}default:switch(Ae++,Oe=L.charAt(Q),U){case 9:case 32:if(G+V+O===0)switch(ie){case 44:case 58:case 9:case 32:Oe="";break;default:U!==32&&(Oe=" ")}break;case 0:Oe="\\0";break;case 12:Oe="\\f";break;case 11:Oe="\\v";break;case 38:G+O+V===0&&(oe=Ve=1,Oe="\f"+Oe);break;case 108:if(G+O+V+Se===0&&0<le)switch(Q-le){case 2:ie===112&&L.charCodeAt(Q-3)===58&&(Se=ie);case 8:ae===111&&(Se=ae)}break;case 58:G+O+V===0&&(le=Q);break;case 44:O+ee+G+V===0&&(oe=1,Oe+="\r");break;case 34:case 39:O===0&&(G=G===U?0:G===0?U:G);break;case 91:G+O+ee===0&&V++;break;case 93:G+O+ee===0&&V--;break;case 41:G+O+V===0&&ee--;break;case 40:if(G+O+V===0){if(W===0)switch(2*ie+3*ae){case 533:break;default:W=1}ee++}break;case 64:O+ee+G+V+le+z===0&&(z=1);break;case 42:case 47:if(!(0<G+V+ee))switch(O){case 0:switch(2*U+3*L.charCodeAt(Q+1)){case 235:O=47;break;case 220:fe=Q,O=42}break;case 42:U===47&&ie===42&&fe+2!==Q&&(L.charCodeAt(fe+2)===33&&(J+=L.substring(fe,Q+1)),Oe="",O=0)}}O===0&&(M+=Oe)}ae=ie,ie=U,Q++}if(fe=J.length,0<fe){if(oe=E,0<Ee&&(He=s(2,J,oe,R,Ce,Ae,fe,B,p,B),He!==void 0&&(J=He).length===0))return Tt+J+Ye;if(J=oe.join(",")+"{"+J+"}",ve*Se!==0){switch(ve!==2||o(J,2)||(Se=0),Se){case 111:J=J.replace(D,":-moz-$1")+J;break;case 112:J=J.replace(I,"::-webkit-input-$1")+J.replace(I,"::-moz-$1")+J.replace(I,":-ms-input-$1")+J}Se=0}}return Tt+J+Ye}function n(R,E,L){var B=E.trim().split(v);E=B;var p=B.length,V=R.length;switch(V){case 0:case 1:var O=0;for(R=V===0?"":R[0]+" ";O<p;++O)E[O]=r(R,E[O],L).trim();break;default:var ee=O=0;for(E=[];O<p;++O)for(var G=0;G<V;++G)E[ee++]=r(R[G]+" ",B[O],L).trim()}return E}function r(R,E,L){var B=E.charCodeAt(0);switch(33>B&&(B=(E=E.trim()).charCodeAt(0)),B){case 38:return E.replace(T,"$1"+R.trim());case 58:return R.trim()+E.replace(T,"$1"+R.trim());default:if(0<1*L&&0<E.indexOf("\f"))return E.replace(T,(R.charCodeAt(0)===58?"":"$1")+R.trim())}return R+E}function a(R,E,L,B){var p=R+";",V=2*E+3*L+4*B;if(V===944){R=p.indexOf(":",9)+1;var O=p.substring(R,p.length-1).trim();return O=p.substring(0,R).trim()+O+";",ve===1||ve===2&&o(O,1)?"-webkit-"+O+O:O}if(ve===0||ve===2&&!o(p,1))return p;switch(V){case 1015:return p.charCodeAt(10)===97?"-webkit-"+p+p:p;case 951:return p.charCodeAt(3)===116?"-webkit-"+p+p:p;case 963:return p.charCodeAt(5)===110?"-webkit-"+p+p:p;case 1009:if(p.charCodeAt(4)!==100)break;case 969:case 942:return"-webkit-"+p+p;case 978:return"-webkit-"+p+"-moz-"+p+p;case 1019:case 983:return"-webkit-"+p+"-moz-"+p+"-ms-"+p+p;case 883:if(p.charCodeAt(8)===45)return"-webkit-"+p+p;if(0<p.indexOf("image-set(",11))return p.replace(Z,"$1-webkit-$2")+p;break;case 932:if(p.charCodeAt(4)===45)switch(p.charCodeAt(5)){case 103:return"-webkit-box-"+p.replace("-grow","")+"-webkit-"+p+"-ms-"+p.replace("grow","positive")+p;case 115:return"-webkit-"+p+"-ms-"+p.replace("shrink","negative")+p;case 98:return"-webkit-"+p+"-ms-"+p.replace("basis","preferred-size")+p}return"-webkit-"+p+"-ms-"+p+p;case 964:return"-webkit-"+p+"-ms-flex-"+p+p;case 1023:if(p.charCodeAt(8)!==99)break;return O=p.substring(p.indexOf(":",15)).replace("flex-","").replace("space-between","justify"),"-webkit-box-pack"+O+"-webkit-"+p+"-ms-flex-pack"+O+p;case 1005:return b.test(p)?p.replace(S,":-webkit-")+p.replace(S,":-moz-")+p:p;case 1e3:switch(O=p.substring(13).trim(),E=O.indexOf("-")+1,O.charCodeAt(0)+O.charCodeAt(E)){case 226:O=p.replace(y,"tb");break;case 232:O=p.replace(y,"tb-rl");break;case 220:O=p.replace(y,"lr");break;default:return p}return"-webkit-"+p+"-ms-"+O+p;case 1017:if(p.indexOf("sticky",9)===-1)break;case 975:switch(E=(p=R).length-10,O=(p.charCodeAt(E)===33?p.substring(0,E):p).substring(R.indexOf(":",7)+1).trim(),V=O.charCodeAt(0)+(O.charCodeAt(7)|0)){case 203:if(111>O.charCodeAt(8))break;case 115:p=p.replace(O,"-webkit-"+O)+";"+p;break;case 207:case 102:p=p.replace(O,"-webkit-"+(102<V?"inline-":"")+"box")+";"+p.replace(O,"-webkit-"+O)+";"+p.replace(O,"-ms-"+O+"box")+";"+p}return p+";";case 938:if(p.charCodeAt(5)===45)switch(p.charCodeAt(6)){case 105:return O=p.replace("-items",""),"-webkit-"+p+"-webkit-box-"+O+"-ms-flex-"+O+p;case 115:return"-webkit-"+p+"-ms-flex-item-"+p.replace(_,"")+p;default:return"-webkit-"+p+"-ms-flex-line-pack"+p.replace("align-content","").replace(_,"")+p}break;case 973:case 989:if(p.charCodeAt(3)!==45||p.charCodeAt(4)===122)break;case 931:case 953:if(ue.test(R)===!0)return(O=R.substring(R.indexOf(":")+1)).charCodeAt(0)===115?a(R.replace("stretch","fill-available"),E,L,B).replace(":fill-available",":stretch"):p.replace(O,"-webkit-"+O)+p.replace(O,"-moz-"+O.replace("fill-",""))+p;break;case 962:if(p="-webkit-"+p+(p.charCodeAt(5)===102?"-ms-"+p:"")+p,L+B===211&&p.charCodeAt(13)===105&&0<p.indexOf("transform",10))return p.substring(0,p.indexOf(";",27)+1).replace(m,"$1-webkit-$2")+p}return p}function o(R,E){var L=R.indexOf(E===1?":":"{"),B=R.substring(0,E!==3?L:10);return L=R.substring(L+1,R.length-1),dt(E!==2?B:B.replace(ce,"$1"),L,E)}function i(R,E){var L=a(E,E.charCodeAt(0),E.charCodeAt(1),E.charCodeAt(2));return L!==E+";"?L.replace(se," or ($1)").substring(4):"("+E+")"}function s(R,E,L,B,p,V,O,ee,G,W){for(var U=0,ie=E,ae;U<Ee;++U)switch(ae=Re[U].call(g,R,ie,L,B,p,V,O,ee,G,W)){case void 0:case!1:case!0:case null:break;default:ie=ae}if(ie!==E)return ie}function u(R){switch(R){case void 0:case null:Ee=Re.length=0;break;default:if(typeof R=="function")Re[Ee++]=R;else if(typeof R=="object")for(var E=0,L=R.length;E<L;++E)u(R[E]);else $e=!!R|0}return u}function d(R){return R=R.prefix,R!==void 0&&(dt=null,R?typeof R!="function"?ve=1:(ve=2,dt=R):ve=0),d}function g(R,E){var L=R;if(33>L.charCodeAt(0)&&(L=L.trim()),ne=L,L=[ne],0<Ee){var B=s(-1,E,L,L,Ce,Ae,0,0,0,0);B!==void 0&&typeof B=="string"&&(E=B)}var p=t(ut,L,E,0,0);return 0<Ee&&(B=s(-2,p,L,L,Ce,Ae,p.length,0,0,0),B!==void 0&&(p=B)),ne="",Se=0,Ae=Ce=1,p}var h=/^\0+/g,w=/[\0\r\f]/g,S=/: */g,b=/zoo|gra/,m=/([,: ])(transform)/g,v=/,\r+?/g,T=/([\t\r\n ])*\f?&/g,N=/@(k\w+)\s*(\S*)\s*/,I=/::(place)/g,D=/:(read-only)/g,y=/[svh]\w+-[tblr]{2}/,$=/\(\s*(.*)\s*\)/g,se=/([\s\S]*?);/g,_=/-self|flex-/g,ce=/[^]*?(:[rp][el]a[\w-]+)[^]*/,ue=/stretch|:\s*\w+\-(?:conte|avail)/,Z=/([^-])(image-set\()/,Ae=1,Ce=1,Se=0,ve=1,ut=[],Re=[],Ee=0,dt=null,$e=0,ne="";return g.use=u,g.set=d,e!==void 0&&d(e),g}var gs={animationIterationCount:1,borderImageOutset:1,borderImageSlice:1,borderImageWidth:1,boxFlex:1,boxFlexGroup:1,boxOrdinalGroup:1,columnCount:1,columns:1,flex:1,flexGrow:1,flexPositive:1,flexShrink:1,flexNegative:1,flexOrder:1,gridRow:1,gridRowEnd:1,gridRowSpan:1,gridRowStart:1,gridColumn:1,gridColumnEnd:1,gridColumnSpan:1,gridColumnStart:1,msGridRow:1,msGridRowSpan:1,msGridColumn:1,msGridColumnSpan:1,fontWeight:1,lineHeight:1,opacity:1,order:1,orphans:1,tabSize:1,widows:1,zIndex:1,zoom:1,WebkitLineClamp:1,fillOpacity:1,floodOpacity:1,stopOpacity:1,strokeDasharray:1,strokeDashoffset:1,strokeMiterlimit:1,strokeOpacity:1,strokeWidth:1};function hs(e){var t=Object.create(null);return function(n){return t[n]===void 0&&(t[n]=e(n)),t[n]}}var vs=/^((children|dangerouslySetInnerHTML|key|ref|autoFocus|defaultValue|defaultChecked|innerHTML|suppressContentEditableWarning|suppressHydrationWarning|valueLink|abbr|accept|acceptCharset|accessKey|action|allow|allowUserMedia|allowPaymentRequest|allowFullScreen|allowTransparency|alt|async|autoComplete|autoPlay|capture|cellPadding|cellSpacing|challenge|charSet|checked|cite|classID|className|cols|colSpan|content|contentEditable|contextMenu|controls|controlsList|coords|crossOrigin|data|dateTime|decoding|default|defer|dir|disabled|disablePictureInPicture|disableRemotePlayback|download|draggable|encType|enterKeyHint|fetchpriority|fetchPriority|form|formAction|formEncType|formMethod|formNoValidate|formTarget|frameBorder|headers|height|hidden|high|href|hrefLang|htmlFor|httpEquiv|id|inputMode|integrity|is|keyParams|keyType|kind|label|lang|list|loading|loop|low|marginHeight|marginWidth|max|maxLength|media|mediaGroup|method|min|minLength|multiple|muted|name|nonce|noValidate|open|optimum|pattern|placeholder|playsInline|poster|preload|profile|radioGroup|readOnly|referrerPolicy|rel|required|reversed|role|rows|rowSpan|sandbox|scope|scoped|scrolling|seamless|selected|shape|size|sizes|slot|span|spellCheck|src|srcDoc|srcLang|srcSet|start|step|style|summary|tabIndex|target|title|translate|type|useMap|value|width|wmode|wrap|about|datatype|inlist|prefix|property|resource|typeof|vocab|autoCapitalize|autoCorrect|autoSave|color|incremental|fallback|inert|itemProp|itemScope|itemType|itemID|itemRef|on|option|results|security|unselectable|accentHeight|accumulate|additive|alignmentBaseline|allowReorder|alphabetic|amplitude|arabicForm|ascent|attributeName|attributeType|autoReverse|azimuth|baseFrequency|baselineShift|baseProfile|bbox|begin|bias|by|calcMode|capHeight|clip|clipPathUnits|clipPath|clipRule|colorInterpolation|colorInterpolationFilters|colorProfile|colorRendering|contentScriptType|contentStyleType|cursor|cx|cy|d|decelerate|descent|diffuseConstant|direction|display|divisor|dominantBaseline|dur|dx|dy|edgeMode|elevation|enableBackground|end|exponent|externalResourcesRequired|fill|fillOpacity|fillRule|filter|filterRes|filterUnits|floodColor|floodOpacity|focusable|fontFamily|fontSize|fontSizeAdjust|fontStretch|fontStyle|fontVariant|fontWeight|format|from|fr|fx|fy|g1|g2|glyphName|glyphOrientationHorizontal|glyphOrientationVertical|glyphRef|gradientTransform|gradientUnits|hanging|horizAdvX|horizOriginX|ideographic|imageRendering|in|in2|intercept|k|k1|k2|k3|k4|kernelMatrix|kernelUnitLength|kerning|keyPoints|keySplines|keyTimes|lengthAdjust|letterSpacing|lightingColor|limitingConeAngle|local|markerEnd|markerMid|markerStart|markerHeight|markerUnits|markerWidth|mask|maskContentUnits|maskUnits|mathematical|mode|numOctaves|offset|opacity|operator|order|orient|orientation|origin|overflow|overlinePosition|overlineThickness|panose1|paintOrder|pathLength|patternContentUnits|patternTransform|patternUnits|pointerEvents|points|pointsAtX|pointsAtY|pointsAtZ|preserveAlpha|preserveAspectRatio|primitiveUnits|r|radius|refX|refY|renderingIntent|repeatCount|repeatDur|requiredExtensions|requiredFeatures|restart|result|rotate|rx|ry|scale|seed|shapeRendering|slope|spacing|specularConstant|specularExponent|speed|spreadMethod|startOffset|stdDeviation|stemh|stemv|stitchTiles|stopColor|stopOpacity|strikethroughPosition|strikethroughThickness|string|stroke|strokeDasharray|strokeDashoffset|strokeLinecap|strokeLinejoin|strokeMiterlimit|strokeOpacity|strokeWidth|surfaceScale|systemLanguage|tableValues|targetX|targetY|textAnchor|textDecoration|textRendering|textLength|to|transform|u1|u2|underlinePosition|underlineThickness|unicode|unicodeBidi|unicodeRange|unitsPerEm|vAlphabetic|vHanging|vIdeographic|vMathematical|values|vectorEffect|version|vertAdvY|vertOriginX|vertOriginY|viewBox|viewTarget|visibility|widths|wordSpacing|writingMode|x|xHeight|x1|x2|xChannelSelector|xlinkActuate|xlinkArcrole|xlinkHref|xlinkRole|xlinkShow|xlinkTitle|xlinkType|xmlBase|xmlns|xmlnsXlink|xmlLang|xmlSpace|y|y1|y2|yChannelSelector|z|zoomAndPan|for|class|autofocus)|(([Dd][Aa][Tt][Aa]|[Aa][Rr][Ii][Aa]|x)-.*))$/,xa=hs(function(e){return vs.test(e)||e.charCodeAt(0)===111&&e.charCodeAt(1)===110&&e.charCodeAt(2)<91}),Ca={exports:{}},K={};var Ea;function ys(){if(Ea)return K;Ea=1;var e=typeof Symbol=="function"&&Symbol.for,t=e?Symbol.for("react.element"):60103,n=e?Symbol.for("react.portal"):60106,r=e?Symbol.for("react.fragment"):60107,a=e?Symbol.for("react.strict_mode"):60108,o=e?Symbol.for("react.profiler"):60114,i=e?Symbol.for("react.provider"):60109,s=e?Symbol.for("react.context"):60110,u=e?Symbol.for("react.async_mode"):60111,d=e?Symbol.for("react.concurrent_mode"):60111,g=e?Symbol.for("react.forward_ref"):60112,h=e?Symbol.for("react.suspense"):60113,w=e?Symbol.for("react.suspense_list"):60120,S=e?Symbol.for("react.memo"):60115,b=e?Symbol.for("react.lazy"):60116,m=e?Symbol.for("react.block"):60121,v=e?Symbol.for("react.fundamental"):60117,T=e?Symbol.for("react.responder"):60118,N=e?Symbol.for("react.scope"):60119;function I(y){if(typeof y=="object"&&y!==null){var $=y.$$typeof;switch($){case t:switch(y=y.type,y){case u:case d:case r:case o:case a:case h:return y;default:switch(y=y&&y.$$typeof,y){case s:case g:case b:case S:case i:return y;default:return $}}case n:return $}}}function D(y){return I(y)===d}return K.AsyncMode=u,K.ConcurrentMode=d,K.ContextConsumer=s,K.ContextProvider=i,K.Element=t,K.ForwardRef=g,K.Fragment=r,K.Lazy=b,K.Memo=S,K.Portal=n,K.Profiler=o,K.StrictMode=a,K.Suspense=h,K.isAsyncMode=function(y){return D(y)||I(y)===u},K.isConcurrentMode=D,K.isContextConsumer=function(y){return I(y)===s},K.isContextProvider=function(y){return I(y)===i},K.isElement=function(y){return typeof y=="object"&&y!==null&&y.$$typeof===t},K.isForwardRef=function(y){return I(y)===g},K.isFragment=function(y){return I(y)===r},K.isLazy=function(y){return I(y)===b},K.isMemo=function(y){return I(y)===S},K.isPortal=function(y){return I(y)===n},K.isProfiler=function(y){return I(y)===o},K.isStrictMode=function(y){return I(y)===a},K.isSuspense=function(y){return I(y)===h},K.isValidElementType=function(y){return typeof y=="string"||typeof y=="function"||y===r||y===d||y===o||y===a||y===h||y===w||typeof y=="object"&&y!==null&&(y.$$typeof===b||y.$$typeof===S||y.$$typeof===i||y.$$typeof===s||y.$$typeof===g||y.$$typeof===v||y.$$typeof===T||y.$$typeof===N||y.$$typeof===m)},K.typeOf=I,K}Ca.exports=ys();var bs=Ca.exports,jn=bs,ws={childContextTypes:!0,contextType:!0,contextTypes:!0,defaultProps:!0,displayName:!0,getDefaultProps:!0,getDerivedStateFromError:!0,getDerivedStateFromProps:!0,mixins:!0,propTypes:!0,type:!0},xs={name:!0,length:!0,prototype:!0,caller:!0,callee:!0,arguments:!0,arity:!0},Cs={$$typeof:!0,render:!0,defaultProps:!0,displayName:!0,propTypes:!0},Oa={$$typeof:!0,compare:!0,defaultProps:!0,displayName:!0,propTypes:!0,type:!0},Xn={};Xn[jn.ForwardRef]=Cs,Xn[jn.Memo]=Oa;function Na(e){return jn.isMemo(e)?Oa:Xn[e.$$typeof]||ws}var Es=Object.defineProperty,Os=Object.getOwnPropertyNames,Ta=Object.getOwnPropertySymbols,Ns=Object.getOwnPropertyDescriptor,Ts=Object.getPrototypeOf,Sa=Object.prototype;function Ia(e,t,n){if(typeof t!="string"){if(Sa){var r=Ts(t);r&&r!==Sa&&Ia(e,r,n)}var a=Os(t);Ta&&(a=a.concat(Ta(t)));for(var o=Na(e),i=Na(t),s=0;s<a.length;++s){var u=a[s];if(!xs[u]&&!(n&&n[u])&&!(i&&i[u])&&!(o&&o[u])){var d=Ns(t,u);try{Es(e,u,d)}catch{}}}}return e}var Ss=Ia;const Is=Wr(Ss);var pe={env:{NODE_ENV:"production"}};function Ke(){return(Ke=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e}).apply(this,arguments)}var Ba=function(e,t){for(var n=[e[0]],r=0,a=t.length;r<a;r+=1)n.push(t[r],e[r+1]);return n},Qn=function(e){return e!==null&&typeof e=="object"&&(e.toString?e.toString():Object.prototype.toString.call(e))==="[object Object]"&&!wa.typeOf(e)},an=Object.freeze([]),nt=Object.freeze({});function Mt(e){return typeof e=="function"}function La(e){return e.displayName||e.name||"Component"}function zn(e){return e&&typeof e.styledComponentId=="string"}var pt=typeof pe<"u"&&pe.env!==void 0&&(pe.env.REACT_APP_SC_ATTR||pe.env.SC_ATTR)||"data-styled",Vn=typeof window<"u"&&"HTMLElement"in window,Bs=!!(typeof SC_DISABLE_SPEEDY=="boolean"?SC_DISABLE_SPEEDY:typeof pe<"u"&&pe.env!==void 0&&(pe.env.REACT_APP_SC_DISABLE_SPEEDY!==void 0&&pe.env.REACT_APP_SC_DISABLE_SPEEDY!==""?pe.env.REACT_APP_SC_DISABLE_SPEEDY!=="false"&&pe.env.REACT_APP_SC_DISABLE_SPEEDY:pe.env.SC_DISABLE_SPEEDY!==void 0&&pe.env.SC_DISABLE_SPEEDY!==""?pe.env.SC_DISABLE_SPEEDY!=="false"&&pe.env.SC_DISABLE_SPEEDY:pe.env.NODE_ENV!=="production"));function Ut(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];throw new Error("An error occurred. See https://git.io/JUIaE#"+e+" for more information."+(n.length>0?" Args: "+n.join(", "):""))}var Ls=function(){function e(n){this.groupSizes=new Uint32Array(512),this.length=512,this.tag=n}var t=e.prototype;return t.indexOfGroup=function(n){for(var r=0,a=0;a<n;a++)r+=this.groupSizes[a];return r},t.insertRules=function(n,r){if(n>=this.groupSizes.length){for(var a=this.groupSizes,o=a.length,i=o;n>=i;)(i<<=1)<0&&Ut(16,""+n);this.groupSizes=new Uint32Array(i),this.groupSizes.set(a),this.length=i;for(var s=o;s<i;s++)this.groupSizes[s]=0}for(var u=this.indexOfGroup(n+1),d=0,g=r.length;d<g;d++)this.tag.insertRule(u,r[d])&&(this.groupSizes[n]++,u++)},t.clearGroup=function(n){if(n<this.length){var r=this.groupSizes[n],a=this.indexOfGroup(n),o=a+r;this.groupSizes[n]=0;for(var i=a;i<o;i++)this.tag.deleteRule(a)}},t.getGroup=function(n){var r="";if(n>=this.length||this.groupSizes[n]===0)return r;for(var a=this.groupSizes[n],o=this.indexOfGroup(n),i=o+a,s=o;s<i;s++)r+=this.tag.getRule(s)+`/*!sc*/
`;return r},e}(),on=new Map,sn=new Map,Ht=1,cn=function(e){if(on.has(e))return on.get(e);for(;sn.has(Ht);)Ht++;var t=Ht++;return on.set(e,t),sn.set(t,e),t},Ps=function(e){return sn.get(e)},Ds=function(e,t){t>=Ht&&(Ht=t+1),on.set(e,t),sn.set(t,e)},Rs="style["+pt+'][data-styled-version="5.3.11"]',ks=new RegExp("^"+pt+'\\.g(\\d+)\\[id="([\\w\\d-]+)"\\].*?"([^"]*)'),Fs=function(e,t,n){for(var r,a=n.split(","),o=0,i=a.length;o<i;o++)(r=a[o])&&e.registerName(t,r)},Ms=function(e,t){for(var n=(t.textContent||"").split(`/*!sc*/
`),r=[],a=0,o=n.length;a<o;a++){var i=n[a].trim();if(i){var s=i.match(ks);if(s){var u=0|parseInt(s[1],10),d=s[2];u!==0&&(Ds(d,u),Fs(e,d,s[3]),e.getTag().insertRules(u,r)),r.length=0}else r.push(i)}}},Us=function(){return typeof __webpack_nonce__<"u"?__webpack_nonce__:null},Pa=function(e){var t=document.head,n=e||t,r=document.createElement("style"),a=function(s){for(var u=s.childNodes,d=u.length;d>=0;d--){var g=u[d];if(g&&g.nodeType===1&&g.hasAttribute(pt))return g}}(n),o=a!==void 0?a.nextSibling:null;r.setAttribute(pt,"active"),r.setAttribute("data-styled-version","5.3.11");var i=Us();return i&&r.setAttribute("nonce",i),n.insertBefore(r,o),r},Hs=function(){function e(n){var r=this.element=Pa(n);r.appendChild(document.createTextNode("")),this.sheet=function(a){if(a.sheet)return a.sheet;for(var o=document.styleSheets,i=0,s=o.length;i<s;i++){var u=o[i];if(u.ownerNode===a)return u}Ut(17)}(r),this.length=0}var t=e.prototype;return t.insertRule=function(n,r){try{return this.sheet.insertRule(r,n),this.length++,!0}catch{return!1}},t.deleteRule=function(n){this.sheet.deleteRule(n),this.length--},t.getRule=function(n){var r=this.sheet.cssRules[n];return r!==void 0&&typeof r.cssText=="string"?r.cssText:""},e}(),js=function(){function e(n){var r=this.element=Pa(n);this.nodes=r.childNodes,this.length=0}var t=e.prototype;return t.insertRule=function(n,r){if(n<=this.length&&n>=0){var a=document.createTextNode(r),o=this.nodes[n];return this.element.insertBefore(a,o||null),this.length++,!0}return!1},t.deleteRule=function(n){this.element.removeChild(this.nodes[n]),this.length--},t.getRule=function(n){return n<this.length?this.nodes[n].textContent:""},e}(),Xs=function(){function e(n){this.rules=[],this.length=0}var t=e.prototype;return t.insertRule=function(n,r){return n<=this.length&&(this.rules.splice(n,0,r),this.length++,!0)},t.deleteRule=function(n){this.rules.splice(n,1),this.length--},t.getRule=function(n){return n<this.length?this.rules[n]:""},e}(),Da=Vn,Qs={isServer:!Vn,useCSSOMInjection:!Bs},Ra=function(){function e(n,r,a){n===void 0&&(n=nt),r===void 0&&(r={}),this.options=Ke({},Qs,{},n),this.gs=r,this.names=new Map(a),this.server=!!n.isServer,!this.server&&Vn&&Da&&(Da=!1,function(o){for(var i=document.querySelectorAll(Rs),s=0,u=i.length;s<u;s++){var d=i[s];d&&d.getAttribute(pt)!=="active"&&(Ms(o,d),d.parentNode&&d.parentNode.removeChild(d))}}(this))}e.registerId=function(n){return cn(n)};var t=e.prototype;return t.reconstructWithOptions=function(n,r){return r===void 0&&(r=!0),new e(Ke({},this.options,{},n),this.gs,r&&this.names||void 0)},t.allocateGSInstance=function(n){return this.gs[n]=(this.gs[n]||0)+1},t.getTag=function(){return this.tag||(this.tag=(a=(r=this.options).isServer,o=r.useCSSOMInjection,i=r.target,n=a?new Xs(i):o?new Hs(i):new js(i),new Ls(n)));var n,r,a,o,i},t.hasNameForId=function(n,r){return this.names.has(n)&&this.names.get(n).has(r)},t.registerName=function(n,r){if(cn(n),this.names.has(n))this.names.get(n).add(r);else{var a=new Set;a.add(r),this.names.set(n,a)}},t.insertRules=function(n,r,a){this.registerName(n,r),this.getTag().insertRules(cn(n),a)},t.clearNames=function(n){this.names.has(n)&&this.names.get(n).clear()},t.clearRules=function(n){this.getTag().clearGroup(cn(n)),this.clearNames(n)},t.clearTag=function(){this.tag=void 0},t.toString=function(){return function(n){for(var r=n.getTag(),a=r.length,o="",i=0;i<a;i++){var s=Ps(i);if(s!==void 0){var u=n.names.get(s),d=r.getGroup(i);if(u&&d&&u.size){var g=pt+".g"+i+'[id="'+s+'"]',h="";u!==void 0&&u.forEach(function(w){w.length>0&&(h+=w+",")}),o+=""+d+g+'{content:"'+h+`"}/*!sc*/
`}}}return o}(this)},e}(),zs=/(a)(d)/gi,ka=function(e){return String.fromCharCode(e+(e>25?39:97))};function Yn(e){var t,n="";for(t=Math.abs(e);t>52;t=t/52|0)n=ka(t%52)+n;return(ka(t%52)+n).replace(zs,"$1-$2")}var gt=function(e,t){for(var n=t.length;n;)e=33*e^t.charCodeAt(--n);return e},Fa=function(e){return gt(5381,e)};function Vs(e){for(var t=0;t<e.length;t+=1){var n=e[t];if(Mt(n)&&!zn(n))return!1}return!0}var Ys=Fa("5.3.11"),Gs=function(){function e(t,n,r){this.rules=t,this.staticRulesId="",this.isStatic=(r===void 0||r.isStatic)&&Vs(t),this.componentId=n,this.baseHash=gt(Ys,n),this.baseStyle=r,Ra.registerId(n)}return e.prototype.generateAndInjectStyles=function(t,n,r){var a=this.componentId,o=[];if(this.baseStyle&&o.push(this.baseStyle.generateAndInjectStyles(t,n,r)),this.isStatic&&!r.hash)if(this.staticRulesId&&n.hasNameForId(a,this.staticRulesId))o.push(this.staticRulesId);else{var i=ht(this.rules,t,n,r).join(""),s=Yn(gt(this.baseHash,i)>>>0);if(!n.hasNameForId(a,s)){var u=r(i,"."+s,void 0,a);n.insertRules(a,s,u)}o.push(s),this.staticRulesId=s}else{for(var d=this.rules.length,g=gt(this.baseHash,r.hash),h="",w=0;w<d;w++){var S=this.rules[w];if(typeof S=="string")h+=S;else if(S){var b=ht(S,t,n,r),m=Array.isArray(b)?b.join(""):b;g=gt(g,m+w),h+=m}}if(h){var v=Yn(g>>>0);if(!n.hasNameForId(a,v)){var T=r(h,"."+v,void 0,a);n.insertRules(a,v,T)}o.push(v)}}return o.join(" ")},e}(),Ws=/^\s*\/\/.*$/gm,Ks=[":","[",".","#"];function Zs(e){var t,n,r,a,o=nt,i=o.options,s=i===void 0?nt:i,u=o.plugins,d=u===void 0?an:u,g=new ps(s),h=[],w=function(m){function v(T){if(T)try{m(T+"}")}catch{}}return function(T,N,I,D,y,$,se,_,ce,ue){switch(T){case 1:if(ce===0&&N.charCodeAt(0)===64)return m(N+";"),"";break;case 2:if(_===0)return N+"/*|*/";break;case 3:switch(_){case 102:case 112:return m(I[0]+N),"";default:return N+(ue===0?"/*|*/":"")}case-2:N.split("/*|*/}").forEach(v)}}}(function(m){h.push(m)}),S=function(m,v,T){return v===0&&Ks.indexOf(T[n.length])!==-1||T.match(a)?m:"."+t};function b(m,v,T,N){N===void 0&&(N="&");var I=m.replace(Ws,""),D=v&&T?T+" "+v+" { "+I+" }":I;return t=N,n=v,r=new RegExp("\\"+n+"\\b","g"),a=new RegExp("(\\"+n+"\\b){2,}"),g(T||!v?"":v,D)}return g.use([].concat(d,[function(m,v,T){m===2&&T.length&&T[0].lastIndexOf(n)>0&&(T[0]=T[0].replace(r,S))},w,function(m){if(m===-2){var v=h;return h=[],v}}])),b.hash=d.length?d.reduce(function(m,v){return v.name||Ut(15),gt(m,v.name)},5381).toString():"",b}var Ma=H.createContext();Ma.Consumer;var Ua=H.createContext(),qs=(Ua.Consumer,new Ra),Gn=Zs();function Js(){return H.useContext(Ma)||qs}function _s(){return H.useContext(Ua)||Gn}var $s=function(){function e(t,n){var r=this;this.inject=function(a,o){o===void 0&&(o=Gn);var i=r.name+o.hash;a.hasNameForId(r.id,i)||a.insertRules(r.id,i,o(r.rules,i,"@keyframes"))},this.toString=function(){return Ut(12,String(r.name))},this.name=t,this.id="sc-keyframes-"+t,this.rules=n}return e.prototype.getName=function(t){return t===void 0&&(t=Gn),this.name+t.hash},e}(),ec=/([A-Z])/,tc=/([A-Z])/g,nc=/^ms-/,rc=function(e){return"-"+e.toLowerCase()};function Ha(e){return ec.test(e)?e.replace(tc,rc).replace(nc,"-ms-"):e}var ja=function(e){return e==null||e===!1||e===""};function ht(e,t,n,r){if(Array.isArray(e)){for(var a,o=[],i=0,s=e.length;i<s;i+=1)(a=ht(e[i],t,n,r))!==""&&(Array.isArray(a)?o.push.apply(o,a):o.push(a));return o}if(ja(e))return"";if(zn(e))return"."+e.styledComponentId;if(Mt(e)){if(typeof(d=e)!="function"||d.prototype&&d.prototype.isReactComponent||!t)return e;var u=e(t);return ht(u,t,n,r)}var d;return e instanceof $s?n?(e.inject(n,r),e.getName(r)):e:Qn(e)?function g(h,w){var S,b,m=[];for(var v in h)h.hasOwnProperty(v)&&!ja(h[v])&&(Array.isArray(h[v])&&h[v].isCss||Mt(h[v])?m.push(Ha(v)+":",h[v],";"):Qn(h[v])?m.push.apply(m,g(h[v],v)):m.push(Ha(v)+": "+(S=v,(b=h[v])==null||typeof b=="boolean"||b===""?"":typeof b!="number"||b===0||S in gs||S.startsWith("--")?String(b).trim():b+"px")+";"));return w?[w+" {"].concat(m,["}"]):m}(e):e.toString()}var Xa=function(e){return Array.isArray(e)&&(e.isCss=!0),e};function Wn(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];return Mt(e)||Qn(e)?Xa(ht(Ba(an,[e].concat(n)))):n.length===0&&e.length===1&&typeof e[0]=="string"?e:Xa(ht(Ba(e,n)))}var ac=function(e,t,n){return n===void 0&&(n=nt),e.theme!==n.theme&&e.theme||t||n.theme},oc=/[!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~-]+/g,ic=/(^-|-$)/g;function Kn(e){return e.replace(oc,"-").replace(ic,"")}var sc=function(e){return Yn(Fa(e)>>>0)};function ln(e){return typeof e=="string"&&pe.env.NODE_ENV==="production"}var Zn=function(e){return typeof e=="function"||typeof e=="object"&&e!==null&&!Array.isArray(e)},cc=function(e){return e!=="__proto__"&&e!=="constructor"&&e!=="prototype"};function lc(e,t,n){var r=e[n];Zn(t)&&Zn(r)?Qa(r,t):e[n]=t}function Qa(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];for(var a=0,o=n;a<o.length;a++){var i=o[a];if(Zn(i))for(var s in i)cc(s)&&lc(e,i[s],s)}return e}var za=H.createContext();za.Consumer;var qn={};function Va(e,t,n){var r=zn(e),a=!ln(e),o=t.attrs,i=o===void 0?an:o,s=t.componentId,u=s===void 0?function(N,I){var D=typeof N!="string"?"sc":Kn(N);qn[D]=(qn[D]||0)+1;var y=D+"-"+sc("5.3.11"+D+qn[D]);return I?I+"-"+y:y}(t.displayName,t.parentComponentId):s,d=t.displayName,g=d===void 0?function(N){return ln(N)?"styled."+N:"Styled("+La(N)+")"}(e):d,h=t.displayName&&t.componentId?Kn(t.displayName)+"-"+t.componentId:t.componentId||u,w=r&&e.attrs?Array.prototype.concat(e.attrs,i).filter(Boolean):i,S=t.shouldForwardProp;r&&e.shouldForwardProp&&(S=t.shouldForwardProp?function(N,I,D){return e.shouldForwardProp(N,I,D)&&t.shouldForwardProp(N,I,D)}:e.shouldForwardProp);var b,m=new Gs(n,h,r?e.componentStyle:void 0),v=m.isStatic&&i.length===0,T=function(N,I){return function(D,y,$,se){var _=D.attrs,ce=D.componentStyle,ue=D.defaultProps,Z=D.foldedComponentIds,Ae=D.shouldForwardProp,Ce=D.styledComponentId,Se=D.target,ve=function(B,p,V){B===void 0&&(B=nt);var O=Ke({},p,{theme:B}),ee={};return V.forEach(function(G){var W,U,ie,ae=G;for(W in Mt(ae)&&(ae=ae(O)),ae)O[W]=ee[W]=W==="className"?(U=ee[W],ie=ae[W],U&&ie?U+" "+ie:U||ie):ae[W]}),[O,ee]}(ac(y,H.useContext(za),ue)||nt,y,_),ut=ve[0],Re=ve[1],Ee=function(B,p,V,O){var ee=Js(),G=_s(),W=p?B.generateAndInjectStyles(nt,ee,G):B.generateAndInjectStyles(V,ee,G);return W}(ce,se,ut),dt=$,$e=Re.$as||y.$as||Re.as||y.as||Se,ne=ln($e),R=Re!==y?Ke({},y,{},Re):y,E={};for(var L in R)L[0]!=="$"&&L!=="as"&&(L==="forwardedAs"?E.as=R[L]:(Ae?Ae(L,xa,$e):!ne||xa(L))&&(E[L]=R[L]));return y.style&&Re.style!==y.style&&(E.style=Ke({},y.style,{},Re.style)),E.className=Array.prototype.concat(Z,Ce,Ee!==Ce?Ee:null,y.className,Re.className).filter(Boolean).join(" "),E.ref=dt,H.createElement($e,E)}(b,N,I,v)};return T.displayName=g,(b=H.forwardRef(T)).attrs=w,b.componentStyle=m,b.displayName=g,b.shouldForwardProp=S,b.foldedComponentIds=r?Array.prototype.concat(e.foldedComponentIds,e.styledComponentId):an,b.styledComponentId=h,b.target=r?e.target:e,b.withComponent=function(N){var I=t.componentId,D=function($,se){if($==null)return{};var _,ce,ue={},Z=Object.keys($);for(ce=0;ce<Z.length;ce++)_=Z[ce],se.indexOf(_)>=0||(ue[_]=$[_]);return ue}(t,["componentId"]),y=I&&I+"-"+(ln(N)?N:Kn(La(N)));return Va(N,Ke({},D,{attrs:w,componentId:y}),n)},Object.defineProperty(b,"defaultProps",{get:function(){return this._foldedDefaultProps},set:function(N){this._foldedDefaultProps=r?Qa({},e.defaultProps,N):N}}),Object.defineProperty(b,"toString",{value:function(){return"."+b.styledComponentId}}),a&&Is(b,e,{attrs:!0,componentStyle:!0,displayName:!0,foldedComponentIds:!0,shouldForwardProp:!0,styledComponentId:!0,target:!0,withComponent:!0}),b}var ge=function(e){return function t(n,r,a){if(a===void 0&&(a=nt),!wa.isValidElementType(r))return Ut(1,String(r));var o=function(){return n(r,a,Wn.apply(void 0,arguments))};return o.withConfig=function(i){return t(n,r,Ke({},a,{},i))},o.attrs=function(i){return t(n,r,Ke({},a,{attrs:Array.prototype.concat(a.attrs,i).filter(Boolean)}))},o}(Va,e)};["a","abbr","address","area","article","aside","audio","b","base","bdi","bdo","big","blockquote","body","br","button","canvas","caption","cite","code","col","colgroup","data","datalist","dd","del","details","dfn","dialog","div","dl","dt","em","embed","fieldset","figcaption","figure","footer","form","h1","h2","h3","h4","h5","h6","head","header","hgroup","hr","html","i","iframe","img","input","ins","kbd","keygen","label","legend","li","link","main","map","mark","marquee","menu","menuitem","meta","meter","nav","noscript","object","ol","optgroup","option","output","p","param","picture","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","small","source","span","strong","style","sub","summary","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","u","ul","var","video","wbr","circle","clipPath","defs","ellipse","foreignObject","g","image","line","linearGradient","marker","mask","path","pattern","polygon","polyline","radialGradient","rect","stop","svg","text","textPath","tspan"].forEach(function(e){ge[e]=ge(e)});const Jn="#8c1d40",_n="#ffc627",Ze="#ffffff",Ya="#000000",Le="#191919",fn="#BFBFBF",Pe="#d0d0d0",fc="#e8e8e8",uc="#bfbfbf",dc="#495057",Ac=ge.a`
  font-family:
    Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans, sans-serif;
  color: ${Le};
  padding: 0.5rem 1rem;
  border-radius: 400rem;
  font-weight: 700;
  font-size: 0.875rem;
  line-height: 1;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  vertical-align: middle;
  transition: 0.03s ease-in-out;
  cursor: pointer;
  & + a {
    margin-left: 1rem;
  }
  &:hover {
    transform: scale(1.05);
  }
  &.button-light {
    background-color: ${uc} !important;
    color: ${Ya} !important;
  }
  &.button-gold {
    background-color: ${_n} !important;
    color: ${Ya} !important;
  }
  &.button-dark {
    background-color: ${Le} !important;
    color: ${Ze} !important;
  }
  &.button-maroon {
    background-color: ${Jn} !important;
    color: ${Ze} !important;
  }
`,vt=({href:e,color:t,text:n,classes:r,onClick:a,onFocus:o,as:i,...s})=>l.jsx(Ac,{href:e,className:`button-${t} ${r??""}`,onClick:a?u=>a(u):void 0,onFocus:o?u=>o(u):void 0,as:i,...s,children:n});vt.propTypes={...rn};const mc={prefix:"fas",iconName:"house",icon:[576,512,[127968,63498,63500,"home","home-alt","home-lg-alt"],"f015","M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"]},$n={prefix:"fas",iconName:"magnifying-glass",icon:[512,512,[128269,"search"],"f002","M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"]},Ga={prefix:"fas",iconName:"chevron-down",icon:[512,512,[],"f078","M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"]},pc={prefix:"fas",iconName:"xmark",icon:[384,512,[128473,10005,10006,10060,215,"close","multiply","remove","times"],"f00d","M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"]};var gc={env:{NODE_ENV:"production"}};function hc(e,t,n){return(t=yc(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function Wa(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter(function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable})),n.push.apply(n,r)}return n}function x(e){for(var t=1;t<arguments.length;t++){var n=arguments[t]!=null?arguments[t]:{};t%2?Wa(Object(n),!0).forEach(function(r){hc(e,r,n[r])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):Wa(Object(n)).forEach(function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(n,r))})}return e}function vc(e,t){if(typeof e!="object"||!e)return e;var n=e[Symbol.toPrimitive];if(n!==void 0){var r=n.call(e,t);if(typeof r!="object")return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return(t==="string"?String:Number)(e)}function yc(e){var t=vc(e,"string");return typeof t=="symbol"?t:t+""}const Ka=()=>{};let er={},Za={},qa=null,Ja={mark:Ka,measure:Ka};try{typeof window<"u"&&(er=window),typeof document<"u"&&(Za=document),typeof MutationObserver<"u"&&(qa=MutationObserver),typeof performance<"u"&&(Ja=performance)}catch{}const{userAgent:_a=""}=er.navigator||{},rt=er,te=Za,$a=qa,un=Ja;rt.document;const qe=!!te.documentElement&&!!te.head&&typeof te.addEventListener=="function"&&typeof te.createElement=="function",eo=~_a.indexOf("MSIE")||~_a.indexOf("Trident/");var bc=/fa(s|r|l|t|d|dr|dl|dt|b|k|kd|ss|sr|sl|st|sds|sdr|sdl|sdt)?[\-\ ]/,wc=/Font ?Awesome ?([56 ]*)(Solid|Regular|Light|Thin|Duotone|Brands|Free|Pro|Sharp Duotone|Sharp|Kit)?.*/i,to={classic:{fa:"solid",fas:"solid","fa-solid":"solid",far:"regular","fa-regular":"regular",fal:"light","fa-light":"light",fat:"thin","fa-thin":"thin",fab:"brands","fa-brands":"brands"},duotone:{fa:"solid",fad:"solid","fa-solid":"solid","fa-duotone":"solid",fadr:"regular","fa-regular":"regular",fadl:"light","fa-light":"light",fadt:"thin","fa-thin":"thin"},sharp:{fa:"solid",fass:"solid","fa-solid":"solid",fasr:"regular","fa-regular":"regular",fasl:"light","fa-light":"light",fast:"thin","fa-thin":"thin"},"sharp-duotone":{fa:"solid",fasds:"solid","fa-solid":"solid",fasdr:"regular","fa-regular":"regular",fasdl:"light","fa-light":"light",fasdt:"thin","fa-thin":"thin"}},xc={GROUP:"duotone-group",PRIMARY:"primary",SECONDARY:"secondary"},no=["fa-classic","fa-duotone","fa-sharp","fa-sharp-duotone"],he="classic",dn="duotone",Cc="sharp",Ec="sharp-duotone",ro=[he,dn,Cc,Ec],Oc={classic:{900:"fas",400:"far",normal:"far",300:"fal",100:"fat"},duotone:{900:"fad",400:"fadr",300:"fadl",100:"fadt"},sharp:{900:"fass",400:"fasr",300:"fasl",100:"fast"},"sharp-duotone":{900:"fasds",400:"fasdr",300:"fasdl",100:"fasdt"}},Nc={"Font Awesome 6 Free":{900:"fas",400:"far"},"Font Awesome 6 Pro":{900:"fas",400:"far",normal:"far",300:"fal",100:"fat"},"Font Awesome 6 Brands":{400:"fab",normal:"fab"},"Font Awesome 6 Duotone":{900:"fad",400:"fadr",normal:"fadr",300:"fadl",100:"fadt"},"Font Awesome 6 Sharp":{900:"fass",400:"fasr",normal:"fasr",300:"fasl",100:"fast"},"Font Awesome 6 Sharp Duotone":{900:"fasds",400:"fasdr",normal:"fasdr",300:"fasdl",100:"fasdt"}},Tc=new Map([["classic",{defaultShortPrefixId:"fas",defaultStyleId:"solid",styleIds:["solid","regular","light","thin","brands"],futureStyleIds:[],defaultFontWeight:900}],["sharp",{defaultShortPrefixId:"fass",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}],["duotone",{defaultShortPrefixId:"fad",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}],["sharp-duotone",{defaultShortPrefixId:"fasds",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}]]),Sc={classic:{solid:"fas",regular:"far",light:"fal",thin:"fat",brands:"fab"},duotone:{solid:"fad",regular:"fadr",light:"fadl",thin:"fadt"},sharp:{solid:"fass",regular:"fasr",light:"fasl",thin:"fast"},"sharp-duotone":{solid:"fasds",regular:"fasdr",light:"fasdl",thin:"fasdt"}},Ic=["fak","fa-kit","fakd","fa-kit-duotone"],ao={kit:{fak:"kit","fa-kit":"kit"},"kit-duotone":{fakd:"kit-duotone","fa-kit-duotone":"kit-duotone"}},Bc=["kit"],Lc={kit:{"fa-kit":"fak"}},Pc=["fak","fakd"],Dc={kit:{fak:"fa-kit"}},oo={kit:{kit:"fak"},"kit-duotone":{"kit-duotone":"fakd"}},An={GROUP:"duotone-group",SWAP_OPACITY:"swap-opacity",PRIMARY:"primary",SECONDARY:"secondary"},Rc=["fa-classic","fa-duotone","fa-sharp","fa-sharp-duotone"],kc=["fak","fa-kit","fakd","fa-kit-duotone"],Fc={"Font Awesome Kit":{400:"fak",normal:"fak"},"Font Awesome Kit Duotone":{400:"fakd",normal:"fakd"}},Mc={classic:{"fa-brands":"fab","fa-duotone":"fad","fa-light":"fal","fa-regular":"far","fa-solid":"fas","fa-thin":"fat"},duotone:{"fa-regular":"fadr","fa-light":"fadl","fa-thin":"fadt"},sharp:{"fa-solid":"fass","fa-regular":"fasr","fa-light":"fasl","fa-thin":"fast"},"sharp-duotone":{"fa-solid":"fasds","fa-regular":"fasdr","fa-light":"fasdl","fa-thin":"fasdt"}},Uc={classic:["fas","far","fal","fat","fad"],duotone:["fadr","fadl","fadt"],sharp:["fass","fasr","fasl","fast"],"sharp-duotone":["fasds","fasdr","fasdl","fasdt"]},tr={classic:{fab:"fa-brands",fad:"fa-duotone",fal:"fa-light",far:"fa-regular",fas:"fa-solid",fat:"fa-thin"},duotone:{fadr:"fa-regular",fadl:"fa-light",fadt:"fa-thin"},sharp:{fass:"fa-solid",fasr:"fa-regular",fasl:"fa-light",fast:"fa-thin"},"sharp-duotone":{fasds:"fa-solid",fasdr:"fa-regular",fasdl:"fa-light",fasdt:"fa-thin"}},Hc=["fa-solid","fa-regular","fa-light","fa-thin","fa-duotone","fa-brands"],nr=["fa","fas","far","fal","fat","fad","fadr","fadl","fadt","fab","fass","fasr","fasl","fast","fasds","fasdr","fasdl","fasdt",...Rc,...Hc],jc=["solid","regular","light","thin","duotone","brands"],io=[1,2,3,4,5,6,7,8,9,10],Xc=io.concat([11,12,13,14,15,16,17,18,19,20]),Qc=[...Object.keys(Uc),...jc,"2xs","xs","sm","lg","xl","2xl","beat","border","fade","beat-fade","bounce","flip-both","flip-horizontal","flip-vertical","flip","fw","inverse","layers-counter","layers-text","layers","li","pull-left","pull-right","pulse","rotate-180","rotate-270","rotate-90","rotate-by","shake","spin-pulse","spin-reverse","spin","stack-1x","stack-2x","stack","ul",An.GROUP,An.SWAP_OPACITY,An.PRIMARY,An.SECONDARY].concat(io.map(e=>"".concat(e,"x"))).concat(Xc.map(e=>"w-".concat(e))),zc={"Font Awesome 5 Free":{900:"fas",400:"far"},"Font Awesome 5 Pro":{900:"fas",400:"far",normal:"far",300:"fal"},"Font Awesome 5 Brands":{400:"fab",normal:"fab"},"Font Awesome 5 Duotone":{900:"fad"}};const Je="___FONT_AWESOME___",rr=16,so="fa",co="svg-inline--fa",ct="data-fa-i2svg",ar="data-fa-pseudo-element",Vc="data-fa-pseudo-element-pending",or="data-prefix",ir="data-icon",lo="fontawesome-i2svg",Yc="async",Gc=["HTML","HEAD","STYLE","SCRIPT"],fo=(()=>{try{return gc.env.NODE_ENV==="production"}catch{return!1}})();function jt(e){return new Proxy(e,{get(t,n){return n in t?t[n]:t[he]}})}const uo=x({},to);uo[he]=x(x(x(x({},{"fa-duotone":"duotone"}),to[he]),ao.kit),ao["kit-duotone"]);const Wc=jt(uo),sr=x({},Sc);sr[he]=x(x(x(x({},{duotone:"fad"}),sr[he]),oo.kit),oo["kit-duotone"]);const Ao=jt(sr),cr=x({},tr);cr[he]=x(x({},cr[he]),Dc.kit);const lr=jt(cr),fr=x({},Mc);fr[he]=x(x({},fr[he]),Lc.kit),jt(fr);const Kc=bc,mo="fa-layers-text",Zc=wc,qc=x({},Oc);jt(qc);const Jc=["class","data-prefix","data-icon","data-fa-transform","data-fa-mask"],ur=xc,_c=[...Bc,...Qc],Xt=rt.FontAwesomeConfig||{};function $c(e){var t=te.querySelector("script["+e+"]");if(t)return t.getAttribute(e)}function el(e){return e===""?!0:e==="false"?!1:e==="true"?!0:e}te&&typeof te.querySelector=="function"&&[["data-family-prefix","familyPrefix"],["data-css-prefix","cssPrefix"],["data-family-default","familyDefault"],["data-style-default","styleDefault"],["data-replacement-class","replacementClass"],["data-auto-replace-svg","autoReplaceSvg"],["data-auto-add-css","autoAddCss"],["data-auto-a11y","autoA11y"],["data-search-pseudo-elements","searchPseudoElements"],["data-observe-mutations","observeMutations"],["data-mutate-approach","mutateApproach"],["data-keep-original-source","keepOriginalSource"],["data-measure-performance","measurePerformance"],["data-show-missing-icons","showMissingIcons"]].forEach(t=>{let[n,r]=t;const a=el($c(n));a!=null&&(Xt[r]=a)});const po={styleDefault:"solid",familyDefault:he,cssPrefix:so,replacementClass:co,autoReplaceSvg:!0,autoAddCss:!0,autoA11y:!0,searchPseudoElements:!1,observeMutations:!0,mutateApproach:"async",keepOriginalSource:!0,measurePerformance:!1,showMissingIcons:!0};Xt.familyPrefix&&(Xt.cssPrefix=Xt.familyPrefix);const yt=x(x({},po),Xt);yt.autoReplaceSvg||(yt.observeMutations=!1);const k={};Object.keys(po).forEach(e=>{Object.defineProperty(k,e,{enumerable:!0,set:function(t){yt[e]=t,Qt.forEach(n=>n(k))},get:function(){return yt[e]}})}),Object.defineProperty(k,"familyPrefix",{enumerable:!0,set:function(e){yt.cssPrefix=e,Qt.forEach(t=>t(k))},get:function(){return yt.cssPrefix}}),rt.FontAwesomeConfig=k;const Qt=[];function tl(e){return Qt.push(e),()=>{Qt.splice(Qt.indexOf(e),1)}}const at=rr,je={size:16,x:0,y:0,rotate:0,flipX:!1,flipY:!1};function nl(e){if(!e||!qe)return;const t=te.createElement("style");t.setAttribute("type","text/css"),t.innerHTML=e;const n=te.head.childNodes;let r=null;for(let a=n.length-1;a>-1;a--){const o=n[a],i=(o.tagName||"").toUpperCase();["STYLE","LINK"].indexOf(i)>-1&&(r=o)}return te.head.insertBefore(t,r),e}const rl="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";function zt(){let e=12,t="";for(;e-- >0;)t+=rl[Math.random()*62|0];return t}function bt(e){const t=[];for(let n=(e||[]).length>>>0;n--;)t[n]=e[n];return t}function dr(e){return e.classList?bt(e.classList):(e.getAttribute("class")||"").split(" ").filter(t=>t)}function go(e){return"".concat(e).replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function al(e){return Object.keys(e||{}).reduce((t,n)=>t+"".concat(n,'="').concat(go(e[n]),'" '),"").trim()}function mn(e){return Object.keys(e||{}).reduce((t,n)=>t+"".concat(n,": ").concat(e[n].trim(),";"),"")}function Ar(e){return e.size!==je.size||e.x!==je.x||e.y!==je.y||e.rotate!==je.rotate||e.flipX||e.flipY}function ol(e){let{transform:t,containerWidth:n,iconWidth:r}=e;const a={transform:"translate(".concat(n/2," 256)")},o="translate(".concat(t.x*32,", ").concat(t.y*32,") "),i="scale(".concat(t.size/16*(t.flipX?-1:1),", ").concat(t.size/16*(t.flipY?-1:1),") "),s="rotate(".concat(t.rotate," 0 0)"),u={transform:"".concat(o," ").concat(i," ").concat(s)},d={transform:"translate(".concat(r/2*-1," -256)")};return{outer:a,inner:u,path:d}}function il(e){let{transform:t,width:n=rr,height:r=rr,startCentered:a=!1}=e,o="";return a&&eo?o+="translate(".concat(t.x/at-n/2,"em, ").concat(t.y/at-r/2,"em) "):a?o+="translate(calc(-50% + ".concat(t.x/at,"em), calc(-50% + ").concat(t.y/at,"em)) "):o+="translate(".concat(t.x/at,"em, ").concat(t.y/at,"em) "),o+="scale(".concat(t.size/at*(t.flipX?-1:1),", ").concat(t.size/at*(t.flipY?-1:1),") "),o+="rotate(".concat(t.rotate,"deg) "),o}var sl=`:root, :host {
  --fa-font-solid: normal 900 1em/1 "Font Awesome 6 Free";
  --fa-font-regular: normal 400 1em/1 "Font Awesome 6 Free";
  --fa-font-light: normal 300 1em/1 "Font Awesome 6 Pro";
  --fa-font-thin: normal 100 1em/1 "Font Awesome 6 Pro";
  --fa-font-duotone: normal 900 1em/1 "Font Awesome 6 Duotone";
  --fa-font-duotone-regular: normal 400 1em/1 "Font Awesome 6 Duotone";
  --fa-font-duotone-light: normal 300 1em/1 "Font Awesome 6 Duotone";
  --fa-font-duotone-thin: normal 100 1em/1 "Font Awesome 6 Duotone";
  --fa-font-brands: normal 400 1em/1 "Font Awesome 6 Brands";
  --fa-font-sharp-solid: normal 900 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-regular: normal 400 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-light: normal 300 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-thin: normal 100 1em/1 "Font Awesome 6 Sharp";
  --fa-font-sharp-duotone-solid: normal 900 1em/1 "Font Awesome 6 Sharp Duotone";
  --fa-font-sharp-duotone-regular: normal 400 1em/1 "Font Awesome 6 Sharp Duotone";
  --fa-font-sharp-duotone-light: normal 300 1em/1 "Font Awesome 6 Sharp Duotone";
  --fa-font-sharp-duotone-thin: normal 100 1em/1 "Font Awesome 6 Sharp Duotone";
}

svg:not(:root).svg-inline--fa, svg:not(:host).svg-inline--fa {
  overflow: visible;
  box-sizing: content-box;
}

.svg-inline--fa {
  display: var(--fa-display, inline-block);
  height: 1em;
  overflow: visible;
  vertical-align: -0.125em;
}
.svg-inline--fa.fa-2xs {
  vertical-align: 0.1em;
}
.svg-inline--fa.fa-xs {
  vertical-align: 0em;
}
.svg-inline--fa.fa-sm {
  vertical-align: -0.0714285705em;
}
.svg-inline--fa.fa-lg {
  vertical-align: -0.2em;
}
.svg-inline--fa.fa-xl {
  vertical-align: -0.25em;
}
.svg-inline--fa.fa-2xl {
  vertical-align: -0.3125em;
}
.svg-inline--fa.fa-pull-left {
  margin-right: var(--fa-pull-margin, 0.3em);
  width: auto;
}
.svg-inline--fa.fa-pull-right {
  margin-left: var(--fa-pull-margin, 0.3em);
  width: auto;
}
.svg-inline--fa.fa-li {
  width: var(--fa-li-width, 2em);
  top: 0.25em;
}
.svg-inline--fa.fa-fw {
  width: var(--fa-fw-width, 1.25em);
}

.fa-layers svg.svg-inline--fa {
  bottom: 0;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
}

.fa-layers-counter, .fa-layers-text {
  display: inline-block;
  position: absolute;
  text-align: center;
}

.fa-layers {
  display: inline-block;
  height: 1em;
  position: relative;
  text-align: center;
  vertical-align: -0.125em;
  width: 1em;
}
.fa-layers svg.svg-inline--fa {
  transform-origin: center center;
}

.fa-layers-text {
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  transform-origin: center center;
}

.fa-layers-counter {
  background-color: var(--fa-counter-background-color, #ff253a);
  border-radius: var(--fa-counter-border-radius, 1em);
  box-sizing: border-box;
  color: var(--fa-inverse, #fff);
  line-height: var(--fa-counter-line-height, 1);
  max-width: var(--fa-counter-max-width, 5em);
  min-width: var(--fa-counter-min-width, 1.5em);
  overflow: hidden;
  padding: var(--fa-counter-padding, 0.25em 0.5em);
  right: var(--fa-right, 0);
  text-overflow: ellipsis;
  top: var(--fa-top, 0);
  transform: scale(var(--fa-counter-scale, 0.25));
  transform-origin: top right;
}

.fa-layers-bottom-right {
  bottom: var(--fa-bottom, 0);
  right: var(--fa-right, 0);
  top: auto;
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: bottom right;
}

.fa-layers-bottom-left {
  bottom: var(--fa-bottom, 0);
  left: var(--fa-left, 0);
  right: auto;
  top: auto;
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: bottom left;
}

.fa-layers-top-right {
  top: var(--fa-top, 0);
  right: var(--fa-right, 0);
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: top right;
}

.fa-layers-top-left {
  left: var(--fa-left, 0);
  right: auto;
  top: var(--fa-top, 0);
  transform: scale(var(--fa-layers-scale, 0.25));
  transform-origin: top left;
}

.fa-1x {
  font-size: 1em;
}

.fa-2x {
  font-size: 2em;
}

.fa-3x {
  font-size: 3em;
}

.fa-4x {
  font-size: 4em;
}

.fa-5x {
  font-size: 5em;
}

.fa-6x {
  font-size: 6em;
}

.fa-7x {
  font-size: 7em;
}

.fa-8x {
  font-size: 8em;
}

.fa-9x {
  font-size: 9em;
}

.fa-10x {
  font-size: 10em;
}

.fa-2xs {
  font-size: 0.625em;
  line-height: 0.1em;
  vertical-align: 0.225em;
}

.fa-xs {
  font-size: 0.75em;
  line-height: 0.0833333337em;
  vertical-align: 0.125em;
}

.fa-sm {
  font-size: 0.875em;
  line-height: 0.0714285718em;
  vertical-align: 0.0535714295em;
}

.fa-lg {
  font-size: 1.25em;
  line-height: 0.05em;
  vertical-align: -0.075em;
}

.fa-xl {
  font-size: 1.5em;
  line-height: 0.0416666682em;
  vertical-align: -0.125em;
}

.fa-2xl {
  font-size: 2em;
  line-height: 0.03125em;
  vertical-align: -0.1875em;
}

.fa-fw {
  text-align: center;
  width: 1.25em;
}

.fa-ul {
  list-style-type: none;
  margin-left: var(--fa-li-margin, 2.5em);
  padding-left: 0;
}
.fa-ul > li {
  position: relative;
}

.fa-li {
  left: calc(-1 * var(--fa-li-width, 2em));
  position: absolute;
  text-align: center;
  width: var(--fa-li-width, 2em);
  line-height: inherit;
}

.fa-border {
  border-color: var(--fa-border-color, #eee);
  border-radius: var(--fa-border-radius, 0.1em);
  border-style: var(--fa-border-style, solid);
  border-width: var(--fa-border-width, 0.08em);
  padding: var(--fa-border-padding, 0.2em 0.25em 0.15em);
}

.fa-pull-left {
  float: left;
  margin-right: var(--fa-pull-margin, 0.3em);
}

.fa-pull-right {
  float: right;
  margin-left: var(--fa-pull-margin, 0.3em);
}

.fa-beat {
  animation-name: fa-beat;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-bounce {
  animation-name: fa-bounce;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.28, 0.84, 0.42, 1));
}

.fa-fade {
  animation-name: fa-fade;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
}

.fa-beat-fade {
  animation-name: fa-beat-fade;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, cubic-bezier(0.4, 0, 0.6, 1));
}

.fa-flip {
  animation-name: fa-flip;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, ease-in-out);
}

.fa-shake {
  animation-name: fa-shake;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, linear);
}

.fa-spin {
  animation-name: fa-spin;
  animation-delay: var(--fa-animation-delay, 0s);
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 2s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, linear);
}

.fa-spin-reverse {
  --fa-animation-direction: reverse;
}

.fa-pulse,
.fa-spin-pulse {
  animation-name: fa-spin;
  animation-direction: var(--fa-animation-direction, normal);
  animation-duration: var(--fa-animation-duration, 1s);
  animation-iteration-count: var(--fa-animation-iteration-count, infinite);
  animation-timing-function: var(--fa-animation-timing, steps(8));
}

@media (prefers-reduced-motion: reduce) {
  .fa-beat,
.fa-bounce,
.fa-fade,
.fa-beat-fade,
.fa-flip,
.fa-pulse,
.fa-shake,
.fa-spin,
.fa-spin-pulse {
    animation-delay: -1ms;
    animation-duration: 1ms;
    animation-iteration-count: 1;
    transition-delay: 0s;
    transition-duration: 0s;
  }
}
@keyframes fa-beat {
  0%, 90% {
    transform: scale(1);
  }
  45% {
    transform: scale(var(--fa-beat-scale, 1.25));
  }
}
@keyframes fa-bounce {
  0% {
    transform: scale(1, 1) translateY(0);
  }
  10% {
    transform: scale(var(--fa-bounce-start-scale-x, 1.1), var(--fa-bounce-start-scale-y, 0.9)) translateY(0);
  }
  30% {
    transform: scale(var(--fa-bounce-jump-scale-x, 0.9), var(--fa-bounce-jump-scale-y, 1.1)) translateY(var(--fa-bounce-height, -0.5em));
  }
  50% {
    transform: scale(var(--fa-bounce-land-scale-x, 1.05), var(--fa-bounce-land-scale-y, 0.95)) translateY(0);
  }
  57% {
    transform: scale(1, 1) translateY(var(--fa-bounce-rebound, -0.125em));
  }
  64% {
    transform: scale(1, 1) translateY(0);
  }
  100% {
    transform: scale(1, 1) translateY(0);
  }
}
@keyframes fa-fade {
  50% {
    opacity: var(--fa-fade-opacity, 0.4);
  }
}
@keyframes fa-beat-fade {
  0%, 100% {
    opacity: var(--fa-beat-fade-opacity, 0.4);
    transform: scale(1);
  }
  50% {
    opacity: 1;
    transform: scale(var(--fa-beat-fade-scale, 1.125));
  }
}
@keyframes fa-flip {
  50% {
    transform: rotate3d(var(--fa-flip-x, 0), var(--fa-flip-y, 1), var(--fa-flip-z, 0), var(--fa-flip-angle, -180deg));
  }
}
@keyframes fa-shake {
  0% {
    transform: rotate(-15deg);
  }
  4% {
    transform: rotate(15deg);
  }
  8%, 24% {
    transform: rotate(-18deg);
  }
  12%, 28% {
    transform: rotate(18deg);
  }
  16% {
    transform: rotate(-22deg);
  }
  20% {
    transform: rotate(22deg);
  }
  32% {
    transform: rotate(-12deg);
  }
  36% {
    transform: rotate(12deg);
  }
  40%, 100% {
    transform: rotate(0deg);
  }
}
@keyframes fa-spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.fa-rotate-90 {
  transform: rotate(90deg);
}

.fa-rotate-180 {
  transform: rotate(180deg);
}

.fa-rotate-270 {
  transform: rotate(270deg);
}

.fa-flip-horizontal {
  transform: scale(-1, 1);
}

.fa-flip-vertical {
  transform: scale(1, -1);
}

.fa-flip-both,
.fa-flip-horizontal.fa-flip-vertical {
  transform: scale(-1, -1);
}

.fa-rotate-by {
  transform: rotate(var(--fa-rotate-angle, 0));
}

.fa-stack {
  display: inline-block;
  vertical-align: middle;
  height: 2em;
  position: relative;
  width: 2.5em;
}

.fa-stack-1x,
.fa-stack-2x {
  bottom: 0;
  left: 0;
  margin: auto;
  position: absolute;
  right: 0;
  top: 0;
  z-index: var(--fa-stack-z-index, auto);
}

.svg-inline--fa.fa-stack-1x {
  height: 1em;
  width: 1.25em;
}
.svg-inline--fa.fa-stack-2x {
  height: 2em;
  width: 2.5em;
}

.fa-inverse {
  color: var(--fa-inverse, #fff);
}

.sr-only,
.fa-sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

.sr-only-focusable:not(:focus),
.fa-sr-only-focusable:not(:focus) {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

.svg-inline--fa .fa-primary {
  fill: var(--fa-primary-color, currentColor);
  opacity: var(--fa-primary-opacity, 1);
}

.svg-inline--fa .fa-secondary {
  fill: var(--fa-secondary-color, currentColor);
  opacity: var(--fa-secondary-opacity, 0.4);
}

.svg-inline--fa.fa-swap-opacity .fa-primary {
  opacity: var(--fa-secondary-opacity, 0.4);
}

.svg-inline--fa.fa-swap-opacity .fa-secondary {
  opacity: var(--fa-primary-opacity, 1);
}

.svg-inline--fa mask .fa-primary,
.svg-inline--fa mask .fa-secondary {
  fill: black;
}`;function ho(){const e=so,t=co,n=k.cssPrefix,r=k.replacementClass;let a=sl;if(n!==e||r!==t){const o=new RegExp("\\.".concat(e,"\\-"),"g"),i=new RegExp("\\--".concat(e,"\\-"),"g"),s=new RegExp("\\.".concat(t),"g");a=a.replace(o,".".concat(n,"-")).replace(i,"--".concat(n,"-")).replace(s,".".concat(r))}return a}let vo=!1;function mr(){k.autoAddCss&&!vo&&(nl(ho()),vo=!0)}var cl={mixout(){return{dom:{css:ho,insertCss:mr}}},hooks(){return{beforeDOMElementCreation(){mr()},beforeI2svg(){mr()}}}};const _e=rt||{};_e[Je]||(_e[Je]={}),_e[Je].styles||(_e[Je].styles={}),_e[Je].hooks||(_e[Je].hooks={}),_e[Je].shims||(_e[Je].shims=[]);var Xe=_e[Je];const yo=[],bo=function(){te.removeEventListener("DOMContentLoaded",bo),pn=1,yo.map(e=>e())};let pn=!1;qe&&(pn=(te.documentElement.doScroll?/^loaded|^c/:/^loaded|^i|^c/).test(te.readyState),pn||te.addEventListener("DOMContentLoaded",bo));function ll(e){qe&&(pn?setTimeout(e,0):yo.push(e))}function Vt(e){const{tag:t,attributes:n={},children:r=[]}=e;return typeof e=="string"?go(e):"<".concat(t," ").concat(al(n),">").concat(r.map(Vt).join(""),"</").concat(t,">")}function wo(e,t,n){if(e&&e[t]&&e[t][n])return{prefix:t,iconName:n,icon:e[t][n]}}var pr=function(t,n,r,a){var o=Object.keys(t),i=o.length,s=n,u,d,g;for(r===void 0?(u=1,g=t[o[0]]):(u=0,g=r);u<i;u++)d=o[u],g=s(g,t[d],d,t);return g};function fl(e){const t=[];let n=0;const r=e.length;for(;n<r;){const a=e.charCodeAt(n++);if(a>=55296&&a<=56319&&n<r){const o=e.charCodeAt(n++);(o&64512)==56320?t.push(((a&1023)<<10)+(o&1023)+65536):(t.push(a),n--)}else t.push(a)}return t}function gr(e){const t=fl(e);return t.length===1?t[0].toString(16):null}function ul(e,t){const n=e.length;let r=e.charCodeAt(t),a;return r>=55296&&r<=56319&&n>t+1&&(a=e.charCodeAt(t+1),a>=56320&&a<=57343)?(r-55296)*1024+a-56320+65536:r}function xo(e){return Object.keys(e).reduce((t,n)=>{const r=e[n];return!!r.icon?t[r.iconName]=r.icon:t[n]=r,t},{})}function hr(e,t){let n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:{};const{skipHooks:r=!1}=n,a=xo(t);typeof Xe.hooks.addPack=="function"&&!r?Xe.hooks.addPack(e,xo(t)):Xe.styles[e]=x(x({},Xe.styles[e]||{}),a),e==="fas"&&hr("fa",t)}const{styles:Yt,shims:dl}=Xe,Co=Object.keys(lr),Al=Co.reduce((e,t)=>(e[t]=Object.keys(lr[t]),e),{});let vr=null,Eo={},Oo={},No={},To={},So={};function ml(e){return~_c.indexOf(e)}function pl(e,t){const n=t.split("-"),r=n[0],a=n.slice(1).join("-");return r===e&&a!==""&&!ml(a)?a:null}const Io=()=>{const e=r=>pr(Yt,(a,o,i)=>(a[i]=pr(o,r,{}),a),{});Eo=e((r,a,o)=>(a[3]&&(r[a[3]]=o),a[2]&&a[2].filter(s=>typeof s=="number").forEach(s=>{r[s.toString(16)]=o}),r)),Oo=e((r,a,o)=>(r[o]=o,a[2]&&a[2].filter(s=>typeof s=="string").forEach(s=>{r[s]=o}),r)),So=e((r,a,o)=>{const i=a[2];return r[o]=o,i.forEach(s=>{r[s]=o}),r});const t="far"in Yt||k.autoFetchSvg,n=pr(dl,(r,a)=>{const o=a[0];let i=a[1];const s=a[2];return i==="far"&&!t&&(i="fas"),typeof o=="string"&&(r.names[o]={prefix:i,iconName:s}),typeof o=="number"&&(r.unicodes[o.toString(16)]={prefix:i,iconName:s}),r},{names:{},unicodes:{}});No=n.names,To=n.unicodes,vr=gn(k.styleDefault,{family:k.familyDefault})};tl(e=>{vr=gn(e.styleDefault,{family:k.familyDefault})}),Io();function yr(e,t){return(Eo[e]||{})[t]}function gl(e,t){return(Oo[e]||{})[t]}function lt(e,t){return(So[e]||{})[t]}function Bo(e){return No[e]||{prefix:null,iconName:null}}function hl(e){const t=To[e],n=yr("fas",e);return t||(n?{prefix:"fas",iconName:n}:null)||{prefix:null,iconName:null}}function ot(){return vr}const Lo=()=>({prefix:null,iconName:null,rest:[]});function vl(e){let t=he;const n=Co.reduce((r,a)=>(r[a]="".concat(k.cssPrefix,"-").concat(a),r),{});return ro.forEach(r=>{(e.includes(n[r])||e.some(a=>Al[r].includes(a)))&&(t=r)}),t}function gn(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{family:n=he}=t,r=Wc[n][e];if(n===dn&&!e)return"fad";const a=Ao[n][e]||Ao[n][r],o=e in Xe.styles?e:null;return a||o||null}function yl(e){let t=[],n=null;return e.forEach(r=>{const a=pl(k.cssPrefix,r);a?n=a:r&&t.push(r)}),{iconName:n,rest:t}}function Po(e){return e.sort().filter((t,n,r)=>r.indexOf(t)===n)}function hn(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{skipLookups:n=!1}=t;let r=null;const a=nr.concat(kc),o=Po(e.filter(h=>a.includes(h))),i=Po(e.filter(h=>!nr.includes(h))),s=o.filter(h=>(r=h,!no.includes(h))),[u=null]=s,d=vl(o),g=x(x({},yl(i)),{},{prefix:gn(u,{family:d})});return x(x(x({},g),Cl({values:e,family:d,styles:Yt,config:k,canonical:g,givenPrefix:r})),bl(n,r,g))}function bl(e,t,n){let{prefix:r,iconName:a}=n;if(e||!r||!a)return{prefix:r,iconName:a};const o=t==="fa"?Bo(a):{},i=lt(r,a);return a=o.iconName||i||a,r=o.prefix||r,r==="far"&&!Yt.far&&Yt.fas&&!k.autoFetchSvg&&(r="fas"),{prefix:r,iconName:a}}const wl=ro.filter(e=>e!==he||e!==dn),xl=Object.keys(tr).filter(e=>e!==he).map(e=>Object.keys(tr[e])).flat();function Cl(e){const{values:t,family:n,canonical:r,givenPrefix:a="",styles:o={},config:i={}}=e,s=n===dn,u=t.includes("fa-duotone")||t.includes("fad"),d=i.familyDefault==="duotone",g=r.prefix==="fad"||r.prefix==="fa-duotone";if(!s&&(u||d||g)&&(r.prefix="fad"),(t.includes("fa-brands")||t.includes("fab"))&&(r.prefix="fab"),!r.prefix&&wl.includes(n)&&(Object.keys(o).find(w=>xl.includes(w))||i.autoFetchSvg)){const w=Tc.get(n).defaultShortPrefixId;r.prefix=w,r.iconName=lt(r.prefix,r.iconName)||r.iconName}return(r.prefix==="fa"||a==="fa")&&(r.prefix=ot()||"fas"),r}class El{constructor(){this.definitions={}}add(){for(var t=arguments.length,n=new Array(t),r=0;r<t;r++)n[r]=arguments[r];const a=n.reduce(this._pullDefinitions,{});Object.keys(a).forEach(o=>{this.definitions[o]=x(x({},this.definitions[o]||{}),a[o]),hr(o,a[o]);const i=lr[he][o];i&&hr(i,a[o]),Io()})}reset(){this.definitions={}}_pullDefinitions(t,n){const r=n.prefix&&n.iconName&&n.icon?{0:n}:n;return Object.keys(r).map(a=>{const{prefix:o,iconName:i,icon:s}=r[a],u=s[2];t[o]||(t[o]={}),u.length>0&&u.forEach(d=>{typeof d=="string"&&(t[o][d]=s)}),t[o][i]=s}),t}}let Do=[],wt={};const xt={},Ol=Object.keys(xt);function Nl(e,t){let{mixoutsTo:n}=t;return Do=e,wt={},Object.keys(xt).forEach(r=>{Ol.indexOf(r)===-1&&delete xt[r]}),Do.forEach(r=>{const a=r.mixout?r.mixout():{};if(Object.keys(a).forEach(o=>{typeof a[o]=="function"&&(n[o]=a[o]),typeof a[o]=="object"&&Object.keys(a[o]).forEach(i=>{n[o]||(n[o]={}),n[o][i]=a[o][i]})}),r.hooks){const o=r.hooks();Object.keys(o).forEach(i=>{wt[i]||(wt[i]=[]),wt[i].push(o[i])})}r.provides&&r.provides(xt)}),n}function br(e,t){for(var n=arguments.length,r=new Array(n>2?n-2:0),a=2;a<n;a++)r[a-2]=arguments[a];return(wt[e]||[]).forEach(i=>{t=i.apply(null,[t,...r])}),t}function ft(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];(wt[e]||[]).forEach(o=>{o.apply(null,n)})}function it(){const e=arguments[0],t=Array.prototype.slice.call(arguments,1);return xt[e]?xt[e].apply(null,t):void 0}function wr(e){e.prefix==="fa"&&(e.prefix="fas");let{iconName:t}=e;const n=e.prefix||ot();if(t)return t=lt(n,t)||t,wo(Ro.definitions,n,t)||wo(Xe.styles,n,t)}const Ro=new El,De={noAuto:()=>{k.autoReplaceSvg=!1,k.observeMutations=!1,ft("noAuto")},config:k,dom:{i2svg:function(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};return qe?(ft("beforeI2svg",e),it("pseudoElements2svg",e),it("i2svg",e)):Promise.reject(new Error("Operation requires a DOM of some kind."))},watch:function(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};const{autoReplaceSvgRoot:t}=e;k.autoReplaceSvg===!1&&(k.autoReplaceSvg=!0),k.observeMutations=!0,ll(()=>{Tl({autoReplaceSvgRoot:t}),ft("watch",e)})}},parse:{icon:e=>{if(e===null)return null;if(typeof e=="object"&&e.prefix&&e.iconName)return{prefix:e.prefix,iconName:lt(e.prefix,e.iconName)||e.iconName};if(Array.isArray(e)&&e.length===2){const t=e[1].indexOf("fa-")===0?e[1].slice(3):e[1],n=gn(e[0]);return{prefix:n,iconName:lt(n,t)||t}}if(typeof e=="string"&&(e.indexOf("".concat(k.cssPrefix,"-"))>-1||e.match(Kc))){const t=hn(e.split(" "),{skipLookups:!0});return{prefix:t.prefix||ot(),iconName:lt(t.prefix,t.iconName)||t.iconName}}if(typeof e=="string"){const t=ot();return{prefix:t,iconName:lt(t,e)||e}}}},library:Ro,findIconDefinition:wr,toHtml:Vt},Tl=function(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};const{autoReplaceSvgRoot:t=te}=e;(Object.keys(Xe.styles).length>0||k.autoFetchSvg)&&qe&&k.autoReplaceSvg&&De.dom.i2svg({node:t})};function vn(e,t){return Object.defineProperty(e,"abstract",{get:t}),Object.defineProperty(e,"html",{get:function(){return e.abstract.map(n=>Vt(n))}}),Object.defineProperty(e,"node",{get:function(){if(!qe)return;const n=te.createElement("div");return n.innerHTML=e.html,n.children}}),e}function Sl(e){let{children:t,main:n,mask:r,attributes:a,styles:o,transform:i}=e;if(Ar(i)&&n.found&&!r.found){const{width:s,height:u}=n,d={x:s/u/2,y:.5};a.style=mn(x(x({},o),{},{"transform-origin":"".concat(d.x+i.x/16,"em ").concat(d.y+i.y/16,"em")}))}return[{tag:"svg",attributes:a,children:t}]}function Il(e){let{prefix:t,iconName:n,children:r,attributes:a,symbol:o}=e;const i=o===!0?"".concat(t,"-").concat(k.cssPrefix,"-").concat(n):o;return[{tag:"svg",attributes:{style:"display: none;"},children:[{tag:"symbol",attributes:x(x({},a),{},{id:i}),children:r}]}]}function xr(e){const{icons:{main:t,mask:n},prefix:r,iconName:a,transform:o,symbol:i,title:s,maskId:u,titleId:d,extra:g,watchable:h=!1}=e,{width:w,height:S}=n.found?n:t,b=Pc.includes(r),m=[k.replacementClass,a?"".concat(k.cssPrefix,"-").concat(a):""].filter(y=>g.classes.indexOf(y)===-1).filter(y=>y!==""||!!y).concat(g.classes).join(" ");let v={children:[],attributes:x(x({},g.attributes),{},{"data-prefix":r,"data-icon":a,class:m,role:g.attributes.role||"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 ".concat(w," ").concat(S)})};const T=b&&!~g.classes.indexOf("fa-fw")?{width:"".concat(w/S*16*.0625,"em")}:{};h&&(v.attributes[ct]=""),s&&(v.children.push({tag:"title",attributes:{id:v.attributes["aria-labelledby"]||"title-".concat(d||zt())},children:[s]}),delete v.attributes.title);const N=x(x({},v),{},{prefix:r,iconName:a,main:t,mask:n,maskId:u,transform:o,symbol:i,styles:x(x({},T),g.styles)}),{children:I,attributes:D}=n.found&&t.found?it("generateAbstractMask",N)||{children:[],attributes:{}}:it("generateAbstractIcon",N)||{children:[],attributes:{}};return N.children=I,N.attributes=D,i?Il(N):Sl(N)}function ko(e){const{content:t,width:n,height:r,transform:a,title:o,extra:i,watchable:s=!1}=e,u=x(x(x({},i.attributes),o?{title:o}:{}),{},{class:i.classes.join(" ")});s&&(u[ct]="");const d=x({},i.styles);Ar(a)&&(d.transform=il({transform:a,startCentered:!0,width:n,height:r}),d["-webkit-transform"]=d.transform);const g=mn(d);g.length>0&&(u.style=g);const h=[];return h.push({tag:"span",attributes:u,children:[t]}),o&&h.push({tag:"span",attributes:{class:"sr-only"},children:[o]}),h}function Bl(e){const{content:t,title:n,extra:r}=e,a=x(x(x({},r.attributes),n?{title:n}:{}),{},{class:r.classes.join(" ")}),o=mn(r.styles);o.length>0&&(a.style=o);const i=[];return i.push({tag:"span",attributes:a,children:[t]}),n&&i.push({tag:"span",attributes:{class:"sr-only"},children:[n]}),i}const{styles:Cr}=Xe;function Er(e){const t=e[0],n=e[1],[r]=e.slice(4);let a=null;return Array.isArray(r)?a={tag:"g",attributes:{class:"".concat(k.cssPrefix,"-").concat(ur.GROUP)},children:[{tag:"path",attributes:{class:"".concat(k.cssPrefix,"-").concat(ur.SECONDARY),fill:"currentColor",d:r[0]}},{tag:"path",attributes:{class:"".concat(k.cssPrefix,"-").concat(ur.PRIMARY),fill:"currentColor",d:r[1]}}]}:a={tag:"path",attributes:{fill:"currentColor",d:r}},{found:!0,width:t,height:n,icon:a}}const Ll={found:!1,width:512,height:512};function Pl(e,t){!fo&&!k.showMissingIcons&&e&&console.error('Icon with name "'.concat(e,'" and prefix "').concat(t,'" is missing.'))}function Or(e,t){let n=t;return t==="fa"&&k.styleDefault!==null&&(t=ot()),new Promise((r,a)=>{if(n==="fa"){const o=Bo(e)||{};e=o.iconName||e,t=o.prefix||t}if(e&&t&&Cr[t]&&Cr[t][e]){const o=Cr[t][e];return r(Er(o))}Pl(e,t),r(x(x({},Ll),{},{icon:k.showMissingIcons&&e?it("missingIconAbstract")||{}:{}}))})}const Fo=()=>{},Nr=k.measurePerformance&&un&&un.mark&&un.measure?un:{mark:Fo,measure:Fo},Gt='FA "6.7.2"',Dl=e=>(Nr.mark("".concat(Gt," ").concat(e," begins")),()=>Mo(e)),Mo=e=>{Nr.mark("".concat(Gt," ").concat(e," ends")),Nr.measure("".concat(Gt," ").concat(e),"".concat(Gt," ").concat(e," begins"),"".concat(Gt," ").concat(e," ends"))};var Tr={begin:Dl,end:Mo};const yn=()=>{};function Uo(e){return typeof(e.getAttribute?e.getAttribute(ct):null)=="string"}function Rl(e){const t=e.getAttribute?e.getAttribute(or):null,n=e.getAttribute?e.getAttribute(ir):null;return t&&n}function kl(e){return e&&e.classList&&e.classList.contains&&e.classList.contains(k.replacementClass)}function Fl(){return k.autoReplaceSvg===!0?bn.replace:bn[k.autoReplaceSvg]||bn.replace}function Ml(e){return te.createElementNS("http://www.w3.org/2000/svg",e)}function Ul(e){return te.createElement(e)}function Ho(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{ceFn:n=e.tag==="svg"?Ml:Ul}=t;if(typeof e=="string")return te.createTextNode(e);const r=n(e.tag);return Object.keys(e.attributes||[]).forEach(function(o){r.setAttribute(o,e.attributes[o])}),(e.children||[]).forEach(function(o){r.appendChild(Ho(o,{ceFn:n}))}),r}function Hl(e){let t=" ".concat(e.outerHTML," ");return t="".concat(t,"Font Awesome fontawesome.com "),t}const bn={replace:function(e){const t=e[0];if(t.parentNode)if(e[1].forEach(n=>{t.parentNode.insertBefore(Ho(n),t)}),t.getAttribute(ct)===null&&k.keepOriginalSource){let n=te.createComment(Hl(t));t.parentNode.replaceChild(n,t)}else t.remove()},nest:function(e){const t=e[0],n=e[1];if(~dr(t).indexOf(k.replacementClass))return bn.replace(e);const r=new RegExp("".concat(k.cssPrefix,"-.*"));if(delete n[0].attributes.id,n[0].attributes.class){const o=n[0].attributes.class.split(" ").reduce((i,s)=>(s===k.replacementClass||s.match(r)?i.toSvg.push(s):i.toNode.push(s),i),{toNode:[],toSvg:[]});n[0].attributes.class=o.toSvg.join(" "),o.toNode.length===0?t.removeAttribute("class"):t.setAttribute("class",o.toNode.join(" "))}const a=n.map(o=>Vt(o)).join(`
`);t.setAttribute(ct,""),t.innerHTML=a}};function jo(e){e()}function Xo(e,t){const n=typeof t=="function"?t:yn;if(e.length===0)n();else{let r=jo;k.mutateApproach===Yc&&(r=rt.requestAnimationFrame||jo),r(()=>{const a=Fl(),o=Tr.begin("mutate");e.map(a),o(),n()})}}let Sr=!1;function Qo(){Sr=!0}function Ir(){Sr=!1}let wn=null;function zo(e){if(!$a||!k.observeMutations)return;const{treeCallback:t=yn,nodeCallback:n=yn,pseudoElementsCallback:r=yn,observeMutationsRoot:a=te}=e;wn=new $a(o=>{if(Sr)return;const i=ot();bt(o).forEach(s=>{if(s.type==="childList"&&s.addedNodes.length>0&&!Uo(s.addedNodes[0])&&(k.searchPseudoElements&&r(s.target),t(s.target)),s.type==="attributes"&&s.target.parentNode&&k.searchPseudoElements&&r(s.target.parentNode),s.type==="attributes"&&Uo(s.target)&&~Jc.indexOf(s.attributeName))if(s.attributeName==="class"&&Rl(s.target)){const{prefix:u,iconName:d}=hn(dr(s.target));s.target.setAttribute(or,u||i),d&&s.target.setAttribute(ir,d)}else kl(s.target)&&n(s.target)})}),qe&&wn.observe(a,{childList:!0,attributes:!0,characterData:!0,subtree:!0})}function jl(){wn&&wn.disconnect()}function Xl(e){const t=e.getAttribute("style");let n=[];return t&&(n=t.split(";").reduce((r,a)=>{const o=a.split(":"),i=o[0],s=o.slice(1);return i&&s.length>0&&(r[i]=s.join(":").trim()),r},{})),n}function Ql(e){const t=e.getAttribute("data-prefix"),n=e.getAttribute("data-icon"),r=e.innerText!==void 0?e.innerText.trim():"";let a=hn(dr(e));return a.prefix||(a.prefix=ot()),t&&n&&(a.prefix=t,a.iconName=n),a.iconName&&a.prefix||(a.prefix&&r.length>0&&(a.iconName=gl(a.prefix,e.innerText)||yr(a.prefix,gr(e.innerText))),!a.iconName&&k.autoFetchSvg&&e.firstChild&&e.firstChild.nodeType===Node.TEXT_NODE&&(a.iconName=e.firstChild.data)),a}function zl(e){const t=bt(e.attributes).reduce((a,o)=>(a.name!=="class"&&a.name!=="style"&&(a[o.name]=o.value),a),{}),n=e.getAttribute("title"),r=e.getAttribute("data-fa-title-id");return k.autoA11y&&(n?t["aria-labelledby"]="".concat(k.replacementClass,"-title-").concat(r||zt()):(t["aria-hidden"]="true",t.focusable="false")),t}function Vl(){return{iconName:null,title:null,titleId:null,prefix:null,transform:je,symbol:!1,mask:{iconName:null,prefix:null,rest:[]},maskId:null,extra:{classes:[],styles:{},attributes:{}}}}function Vo(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{styleParser:!0};const{iconName:n,prefix:r,rest:a}=Ql(e),o=zl(e),i=br("parseNodeAttributes",{},e);let s=t.styleParser?Xl(e):[];return x({iconName:n,title:e.getAttribute("title"),titleId:e.getAttribute("data-fa-title-id"),prefix:r,transform:je,mask:{iconName:null,prefix:null,rest:[]},maskId:null,symbol:!1,extra:{classes:a,styles:s,attributes:o}},i)}const{styles:Yl}=Xe;function Yo(e){const t=k.autoReplaceSvg==="nest"?Vo(e,{styleParser:!1}):Vo(e);return~t.extra.classes.indexOf(mo)?it("generateLayersText",e,t):it("generateSvgReplacementMutation",e,t)}function Gl(){return[...Ic,...nr]}function Go(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:null;if(!qe)return Promise.resolve();const n=te.documentElement.classList,r=g=>n.add("".concat(lo,"-").concat(g)),a=g=>n.remove("".concat(lo,"-").concat(g)),o=k.autoFetchSvg?Gl():no.concat(Object.keys(Yl));o.includes("fa")||o.push("fa");const i=[".".concat(mo,":not([").concat(ct,"])")].concat(o.map(g=>".".concat(g,":not([").concat(ct,"])"))).join(", ");if(i.length===0)return Promise.resolve();let s=[];try{s=bt(e.querySelectorAll(i))}catch{}if(s.length>0)r("pending"),a("complete");else return Promise.resolve();const u=Tr.begin("onTree"),d=s.reduce((g,h)=>{try{const w=Yo(h);w&&g.push(w)}catch(w){fo||w.name==="MissingIcon"&&console.error(w)}return g},[]);return new Promise((g,h)=>{Promise.all(d).then(w=>{Xo(w,()=>{r("active"),r("complete"),a("pending"),typeof t=="function"&&t(),u(),g()})}).catch(w=>{u(),h(w)})})}function Wl(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:null;Yo(e).then(n=>{n&&Xo([n],t)})}function Kl(e){return function(t){let n=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const r=(t||{}).icon?t:wr(t||{});let{mask:a}=n;return a&&(a=(a||{}).icon?a:wr(a||{})),e(r,x(x({},n),{},{mask:a}))}}const Zl=function(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{transform:n=je,symbol:r=!1,mask:a=null,maskId:o=null,title:i=null,titleId:s=null,classes:u=[],attributes:d={},styles:g={}}=t;if(!e)return;const{prefix:h,iconName:w,icon:S}=e;return vn(x({type:"icon"},e),()=>(ft("beforeDOMElementCreation",{iconDefinition:e,params:t}),k.autoA11y&&(i?d["aria-labelledby"]="".concat(k.replacementClass,"-title-").concat(s||zt()):(d["aria-hidden"]="true",d.focusable="false")),xr({icons:{main:Er(S),mask:a?Er(a.icon):{found:!1,width:null,height:null,icon:{}}},prefix:h,iconName:w,transform:x(x({},je),n),symbol:r,title:i,maskId:o,titleId:s,extra:{attributes:d,styles:g,classes:u}})))};var ql={mixout(){return{icon:Kl(Zl)}},hooks(){return{mutationObserverCallbacks(e){return e.treeCallback=Go,e.nodeCallback=Wl,e}}},provides(e){e.i2svg=function(t){const{node:n=te,callback:r=()=>{}}=t;return Go(n,r)},e.generateSvgReplacementMutation=function(t,n){const{iconName:r,title:a,titleId:o,prefix:i,transform:s,symbol:u,mask:d,maskId:g,extra:h}=n;return new Promise((w,S)=>{Promise.all([Or(r,i),d.iconName?Or(d.iconName,d.prefix):Promise.resolve({found:!1,width:512,height:512,icon:{}})]).then(b=>{let[m,v]=b;w([t,xr({icons:{main:m,mask:v},prefix:i,iconName:r,transform:s,symbol:u,maskId:g,title:a,titleId:o,extra:h,watchable:!0})])}).catch(S)})},e.generateAbstractIcon=function(t){let{children:n,attributes:r,main:a,transform:o,styles:i}=t;const s=mn(i);s.length>0&&(r.style=s);let u;return Ar(o)&&(u=it("generateAbstractTransformGrouping",{main:a,transform:o,containerWidth:a.width,iconWidth:a.width})),n.push(u||a.icon),{children:n,attributes:r}}}},Jl={mixout(){return{layer(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{classes:n=[]}=t;return vn({type:"layer"},()=>{ft("beforeDOMElementCreation",{assembler:e,params:t});let r=[];return e(a=>{Array.isArray(a)?a.map(o=>{r=r.concat(o.abstract)}):r=r.concat(a.abstract)}),[{tag:"span",attributes:{class:["".concat(k.cssPrefix,"-layers"),...n].join(" ")},children:r}]})}}}},_l={mixout(){return{counter(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{title:n=null,classes:r=[],attributes:a={},styles:o={}}=t;return vn({type:"counter",content:e},()=>(ft("beforeDOMElementCreation",{content:e,params:t}),Bl({content:e.toString(),title:n,extra:{attributes:a,styles:o,classes:["".concat(k.cssPrefix,"-layers-counter"),...r]}})))}}}},$l={mixout(){return{text(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{transform:n=je,title:r=null,classes:a=[],attributes:o={},styles:i={}}=t;return vn({type:"text",content:e},()=>(ft("beforeDOMElementCreation",{content:e,params:t}),ko({content:e,transform:x(x({},je),n),title:r,extra:{attributes:o,styles:i,classes:["".concat(k.cssPrefix,"-layers-text"),...a]}})))}}},provides(e){e.generateLayersText=function(t,n){const{title:r,transform:a,extra:o}=n;let i=null,s=null;if(eo){const u=parseInt(getComputedStyle(t).fontSize,10),d=t.getBoundingClientRect();i=d.width/u,s=d.height/u}return k.autoA11y&&!r&&(o.attributes["aria-hidden"]="true"),Promise.resolve([t,ko({content:t.innerHTML,width:i,height:s,transform:a,title:r,extra:o,watchable:!0})])}}};const ef=new RegExp('"',"ug"),Wo=[1105920,1112319],Ko=x(x(x(x({},{FontAwesome:{normal:"fas",400:"fas"}}),Nc),zc),Fc),Br=Object.keys(Ko).reduce((e,t)=>(e[t.toLowerCase()]=Ko[t],e),{}),tf=Object.keys(Br).reduce((e,t)=>{const n=Br[t];return e[t]=n[900]||[...Object.entries(n)][0][1],e},{});function nf(e){const t=e.replace(ef,""),n=ul(t,0),r=n>=Wo[0]&&n<=Wo[1],a=t.length===2?t[0]===t[1]:!1;return{value:gr(a?t[0]:t),isSecondary:r||a}}function rf(e,t){const n=e.replace(/^['"]|['"]$/g,"").toLowerCase(),r=parseInt(t),a=isNaN(r)?"normal":r;return(Br[n]||{})[a]||tf[n]}function Zo(e,t){const n="".concat(Vc).concat(t.replace(":","-"));return new Promise((r,a)=>{if(e.getAttribute(n)!==null)return r();const i=bt(e.children).filter(w=>w.getAttribute(ar)===t)[0],s=rt.getComputedStyle(e,t),u=s.getPropertyValue("font-family"),d=u.match(Zc),g=s.getPropertyValue("font-weight"),h=s.getPropertyValue("content");if(i&&!d)return e.removeChild(i),r();if(d&&h!=="none"&&h!==""){const w=s.getPropertyValue("content");let S=rf(u,g);const{value:b,isSecondary:m}=nf(w),v=d[0].startsWith("FontAwesome");let T=yr(S,b),N=T;if(v){const I=hl(b);I.iconName&&I.prefix&&(T=I.iconName,S=I.prefix)}if(T&&!m&&(!i||i.getAttribute(or)!==S||i.getAttribute(ir)!==N)){e.setAttribute(n,N),i&&e.removeChild(i);const I=Vl(),{extra:D}=I;D.attributes[ar]=t,Or(T,S).then(y=>{const $=xr(x(x({},I),{},{icons:{main:y,mask:Lo()},prefix:S,iconName:N,extra:D,watchable:!0})),se=te.createElementNS("http://www.w3.org/2000/svg","svg");t==="::before"?e.insertBefore(se,e.firstChild):e.appendChild(se),se.outerHTML=$.map(_=>Vt(_)).join(`
`),e.removeAttribute(n),r()}).catch(a)}else r()}else r()})}function af(e){return Promise.all([Zo(e,"::before"),Zo(e,"::after")])}function of(e){return e.parentNode!==document.head&&!~Gc.indexOf(e.tagName.toUpperCase())&&!e.getAttribute(ar)&&(!e.parentNode||e.parentNode.tagName!=="svg")}function qo(e){if(qe)return new Promise((t,n)=>{const r=bt(e.querySelectorAll("*")).filter(of).map(af),a=Tr.begin("searchPseudoElements");Qo(),Promise.all(r).then(()=>{a(),Ir(),t()}).catch(()=>{a(),Ir(),n()})})}var sf={hooks(){return{mutationObserverCallbacks(e){return e.pseudoElementsCallback=qo,e}}},provides(e){e.pseudoElements2svg=function(t){const{node:n=te}=t;k.searchPseudoElements&&qo(n)}}};let Jo=!1;var cf={mixout(){return{dom:{unwatch(){Qo(),Jo=!0}}}},hooks(){return{bootstrap(){zo(br("mutationObserverCallbacks",{}))},noAuto(){jl()},watch(e){const{observeMutationsRoot:t}=e;Jo?Ir():zo(br("mutationObserverCallbacks",{observeMutationsRoot:t}))}}}};const _o=e=>{let t={size:16,x:0,y:0,flipX:!1,flipY:!1,rotate:0};return e.toLowerCase().split(" ").reduce((n,r)=>{const a=r.toLowerCase().split("-"),o=a[0];let i=a.slice(1).join("-");if(o&&i==="h")return n.flipX=!0,n;if(o&&i==="v")return n.flipY=!0,n;if(i=parseFloat(i),isNaN(i))return n;switch(o){case"grow":n.size=n.size+i;break;case"shrink":n.size=n.size-i;break;case"left":n.x=n.x-i;break;case"right":n.x=n.x+i;break;case"up":n.y=n.y-i;break;case"down":n.y=n.y+i;break;case"rotate":n.rotate=n.rotate+i;break}return n},t)};var lf={mixout(){return{parse:{transform:e=>_o(e)}}},hooks(){return{parseNodeAttributes(e,t){const n=t.getAttribute("data-fa-transform");return n&&(e.transform=_o(n)),e}}},provides(e){e.generateAbstractTransformGrouping=function(t){let{main:n,transform:r,containerWidth:a,iconWidth:o}=t;const i={transform:"translate(".concat(a/2," 256)")},s="translate(".concat(r.x*32,", ").concat(r.y*32,") "),u="scale(".concat(r.size/16*(r.flipX?-1:1),", ").concat(r.size/16*(r.flipY?-1:1),") "),d="rotate(".concat(r.rotate," 0 0)"),g={transform:"".concat(s," ").concat(u," ").concat(d)},h={transform:"translate(".concat(o/2*-1," -256)")},w={outer:i,inner:g,path:h};return{tag:"g",attributes:x({},w.outer),children:[{tag:"g",attributes:x({},w.inner),children:[{tag:n.icon.tag,children:n.icon.children,attributes:x(x({},n.icon.attributes),w.path)}]}]}}}};const Lr={x:0,y:0,width:"100%",height:"100%"};function $o(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:!0;return e.attributes&&(e.attributes.fill||t)&&(e.attributes.fill="black"),e}function ff(e){return e.tag==="g"?e.children:[e]}var uf={hooks(){return{parseNodeAttributes(e,t){const n=t.getAttribute("data-fa-mask"),r=n?hn(n.split(" ").map(a=>a.trim())):Lo();return r.prefix||(r.prefix=ot()),e.mask=r,e.maskId=t.getAttribute("data-fa-mask-id"),e}}},provides(e){e.generateAbstractMask=function(t){let{children:n,attributes:r,main:a,mask:o,maskId:i,transform:s}=t;const{width:u,icon:d}=a,{width:g,icon:h}=o,w=ol({transform:s,containerWidth:g,iconWidth:u}),S={tag:"rect",attributes:x(x({},Lr),{},{fill:"white"})},b=d.children?{children:d.children.map($o)}:{},m={tag:"g",attributes:x({},w.inner),children:[$o(x({tag:d.tag,attributes:x(x({},d.attributes),w.path)},b))]},v={tag:"g",attributes:x({},w.outer),children:[m]},T="mask-".concat(i||zt()),N="clip-".concat(i||zt()),I={tag:"mask",attributes:x(x({},Lr),{},{id:T,maskUnits:"userSpaceOnUse",maskContentUnits:"userSpaceOnUse"}),children:[S,v]},D={tag:"defs",children:[{tag:"clipPath",attributes:{id:N},children:ff(h)},I]};return n.push(D,{tag:"rect",attributes:x({fill:"currentColor","clip-path":"url(#".concat(N,")"),mask:"url(#".concat(T,")")},Lr)}),{children:n,attributes:r}}}},df={provides(e){let t=!1;rt.matchMedia&&(t=rt.matchMedia("(prefers-reduced-motion: reduce)").matches),e.missingIconAbstract=function(){const n=[],r={fill:"currentColor"},a={attributeType:"XML",repeatCount:"indefinite",dur:"2s"};n.push({tag:"path",attributes:x(x({},r),{},{d:"M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"})});const o=x(x({},a),{},{attributeName:"opacity"}),i={tag:"circle",attributes:x(x({},r),{},{cx:"256",cy:"364",r:"28"}),children:[]};return t||i.children.push({tag:"animate",attributes:x(x({},a),{},{attributeName:"r",values:"28;14;28;28;14;28;"})},{tag:"animate",attributes:x(x({},o),{},{values:"1;0;1;1;0;1;"})}),n.push(i),n.push({tag:"path",attributes:x(x({},r),{},{opacity:"1",d:"M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"}),children:t?[]:[{tag:"animate",attributes:x(x({},o),{},{values:"1;0;0;0;0;1;"})}]}),t||n.push({tag:"path",attributes:x(x({},r),{},{opacity:"0",d:"M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"}),children:[{tag:"animate",attributes:x(x({},o),{},{values:"0;0;1;1;0;0;"})}]}),{tag:"g",attributes:{class:"missing"},children:n}}}},Af={hooks(){return{parseNodeAttributes(e,t){const n=t.getAttribute("data-fa-symbol"),r=n===null?!1:n===""?!0:n;return e.symbol=r,e}}}},mf=[cl,ql,Jl,_l,$l,sf,cf,lf,uf,df,Af];Nl(mf,{mixoutsTo:De}),De.noAuto,De.config,De.library,De.dom;const Pr=De.parse;De.findIconDefinition,De.toHtml;const pf=De.icon;De.layer,De.text,De.counter;var gf={env:{NODE_ENV:"production"}};function ei(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter(function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable})),n.push.apply(n,r)}return n}function Qe(e){for(var t=1;t<arguments.length;t++){var n=arguments[t]!=null?arguments[t]:{};t%2?ei(Object(n),!0).forEach(function(r){Ct(e,r,n[r])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):ei(Object(n)).forEach(function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(n,r))})}return e}function xn(e){"@babel/helpers - typeof";return xn=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(t){return typeof t}:function(t){return t&&typeof Symbol=="function"&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},xn(e)}function Ct(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function hf(e,t){if(e==null)return{};var n={},r=Object.keys(e),a,o;for(o=0;o<r.length;o++)a=r[o],!(t.indexOf(a)>=0)&&(n[a]=e[a]);return n}function vf(e,t){if(e==null)return{};var n=hf(e,t),r,a;if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(a=0;a<o.length;a++)r=o[a],!(t.indexOf(r)>=0)&&Object.prototype.propertyIsEnumerable.call(e,r)&&(n[r]=e[r])}return n}function Dr(e){return yf(e)||bf(e)||wf(e)||xf()}function yf(e){if(Array.isArray(e))return Rr(e)}function bf(e){if(typeof Symbol<"u"&&e[Symbol.iterator]!=null||e["@@iterator"]!=null)return Array.from(e)}function wf(e,t){if(e){if(typeof e=="string")return Rr(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);if(n==="Object"&&e.constructor&&(n=e.constructor.name),n==="Map"||n==="Set")return Array.from(e);if(n==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return Rr(e,t)}}function Rr(e,t){(t==null||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function xf(){throw new TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}function Cf(e){var t,n=e.beat,r=e.fade,a=e.beatFade,o=e.bounce,i=e.shake,s=e.flash,u=e.spin,d=e.spinPulse,g=e.spinReverse,h=e.pulse,w=e.fixedWidth,S=e.inverse,b=e.border,m=e.listItem,v=e.flip,T=e.size,N=e.rotation,I=e.pull,D=(t={"fa-beat":n,"fa-fade":r,"fa-beat-fade":a,"fa-bounce":o,"fa-shake":i,"fa-flash":s,"fa-spin":u,"fa-spin-reverse":g,"fa-spin-pulse":d,"fa-pulse":h,"fa-fw":w,"fa-inverse":S,"fa-border":b,"fa-li":m,"fa-flip":v===!0,"fa-flip-horizontal":v==="horizontal"||v==="both","fa-flip-vertical":v==="vertical"||v==="both"},Ct(t,"fa-".concat(T),typeof T<"u"&&T!==null),Ct(t,"fa-rotate-".concat(N),typeof N<"u"&&N!==null&&N!==0),Ct(t,"fa-pull-".concat(I),typeof I<"u"&&I!==null),Ct(t,"fa-swap-opacity",e.swapOpacity),t);return Object.keys(D).map(function(y){return D[y]?y:null}).filter(function(y){return y})}function Ef(e){return e=e-0,e===e}function ti(e){return Ef(e)?e:(e=e.replace(/[\-_\s]+(.)?/g,function(t,n){return n?n.toUpperCase():""}),e.substr(0,1).toLowerCase()+e.substr(1))}var Of=["style"];function Nf(e){return e.charAt(0).toUpperCase()+e.slice(1)}function Tf(e){return e.split(";").map(function(t){return t.trim()}).filter(function(t){return t}).reduce(function(t,n){var r=n.indexOf(":"),a=ti(n.slice(0,r)),o=n.slice(r+1).trim();return a.startsWith("webkit")?t[Nf(a)]=o:t[a]=o,t},{})}function ni(e,t){var n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:{};if(typeof t=="string")return t;var r=(t.children||[]).map(function(u){return ni(e,u)}),a=Object.keys(t.attributes||{}).reduce(function(u,d){var g=t.attributes[d];switch(d){case"class":u.attrs.className=g,delete t.attributes.class;break;case"style":u.attrs.style=Tf(g);break;default:d.indexOf("aria-")===0||d.indexOf("data-")===0?u.attrs[d.toLowerCase()]=g:u.attrs[ti(d)]=g}return u},{attrs:{}}),o=n.style,i=o===void 0?{}:o,s=vf(n,Of);return a.attrs.style=Qe(Qe({},a.attrs.style),i),e.apply(void 0,[t.tag,Qe(Qe({},a.attrs),s)].concat(Dr(r)))}var ri=!1;try{ri=gf.env.NODE_ENV==="production"}catch{}function Sf(){if(!ri&&console&&typeof console.error=="function"){var e;(e=console).error.apply(e,arguments)}}function ai(e){if(e&&xn(e)==="object"&&e.prefix&&e.iconName&&e.icon)return e;if(Pr.icon)return Pr.icon(e);if(e===null)return null;if(e&&xn(e)==="object"&&e.prefix&&e.iconName)return e;if(Array.isArray(e)&&e.length===2)return{prefix:e[0],iconName:e[1]};if(typeof e=="string")return{prefix:"fas",iconName:e}}function kr(e,t){return Array.isArray(t)&&t.length>0||!Array.isArray(t)&&t?Ct({},e,t):{}}var oi={border:!1,className:"",mask:null,maskId:null,fixedWidth:!1,inverse:!1,flip:!1,icon:null,listItem:!1,pull:null,pulse:!1,rotation:null,size:null,spin:!1,spinPulse:!1,spinReverse:!1,beat:!1,fade:!1,beatFade:!1,bounce:!1,shake:!1,symbol:!1,title:"",titleId:null,transform:null,swapOpacity:!1},Te=H.forwardRef(function(e,t){var n=Qe(Qe({},oi),e),r=n.icon,a=n.mask,o=n.symbol,i=n.className,s=n.title,u=n.titleId,d=n.maskId,g=ai(r),h=kr("classes",[].concat(Dr(Cf(n)),Dr((i||"").split(" ")))),w=kr("transform",typeof n.transform=="string"?Pr.transform(n.transform):n.transform),S=kr("mask",ai(a)),b=pf(g,Qe(Qe(Qe(Qe({},h),w),S),{},{symbol:o,title:s,titleId:u,maskId:d}));if(!b)return Sf("Could not find icon",g),null;var m=b.abstract,v={ref:t};return Object.keys(n).forEach(function(T){oi.hasOwnProperty(T)||(v[T]=n[T])}),If(m[0],v)});Te.displayName="FontAwesomeIcon",Te.propTypes={beat:f.bool,border:f.bool,beatFade:f.bool,bounce:f.bool,className:f.string,fade:f.bool,flash:f.bool,mask:f.oneOfType([f.object,f.array,f.string]),maskId:f.string,fixedWidth:f.bool,inverse:f.bool,flip:f.oneOf([!0,!1,"horizontal","vertical","both"]),icon:f.oneOfType([f.object,f.array,f.string]),listItem:f.bool,pull:f.oneOf(["right","left"]),pulse:f.bool,rotation:f.oneOf([0,90,180,270]),shake:f.bool,size:f.oneOf(["2xs","xs","sm","lg","xl","2xl","1x","2x","3x","4x","5x","6x","7x","8x","9x","10x"]),spin:f.bool,spinPulse:f.bool,spinReverse:f.bool,symbol:f.oneOfType([f.bool,f.string]),title:f.string,titleId:f.string,transform:f.oneOfType([f.string,f.object]),swapOpacity:f.bool};var If=ni.bind(null,H.createElement);const ii=({columnIndex:e,column:{title:t,links:n},isOpen:r=!1,onToggle:a})=>{const[o,i]=H.useState(r),u=typeof window<"u"?window.innerWidth>=1260:!1,[d,g]=H.useState(u),h=H.useRef(null);H.useEffect(()=>{!d&&a&&w(r),i(r)},[r,d,a]),H.useEffect(()=>{const b=window.matchMedia("screen and (min-width: 1260px)"),m=v=>g(v.matches);return b.addEventListener("change",m),m(b),()=>b.removeEventListener("change",m)},[]);const w=b=>{const m=h==null?void 0:h.current;if(!m||!m.animate)return;m.classList.add("footer-collapsing");const v=m.animate([{maxHeight:b?`${m.scrollHeight}px`:"0px"}],{duration:250,easing:"ease-in-out",fill:"forwards"});v.onfinish=()=>{m.classList.remove("footer-collapsing"),b?m.classList.add("footer-column-show"):m.classList.remove("footer-column-show")}},S=()=>{if(d){i(!0);return}a?a():i(b=>{const m=!b;return w(m),m})};return l.jsx("div",{className:"col-xl flex-footer testname-column",children:l.jsxs("div",{className:"card accordion-item desktop-disable-xl",children:[l.jsx("div",{className:"footer-accordion-header",children:l.jsx("div",{className:"h5",children:d?l.jsx("p",{className:"accordion-button",children:t}):l.jsxs("button",{id:`footlink-header-${e}`,className:"footer-accordion-button","aria-expanded":o||d,"aria-controls":`footlink-${e}`,onClick:S,type:"button",disabled:d,children:[t,l.jsx(Te,{className:o||d?"column-open":"",icon:Ga})]})})}),l.jsx("div",{id:`footlink-${e}`,className:"footer-accordion-body",role:"region",ref:h,children:n.map(b=>l.jsx("a",{className:"nav-link",href:b.url,title:b.title,children:b.text},`footlink-${t}-link-${b.text}`))})]})})};ii.propTypes={columnIndex:f.number.isRequired,column:Be.shape({title:f.string,links:Be.arrayOf(Be.shape({url:f.string.isRequired,title:f.string,text:f.string.isRequired}))}),isOpen:f.bool,onToggle:f.func};const Fr=({contact:{title:e="",contactLink:t="",contributionLink:n="",columns:r}})=>{const[a,o]=H.useState(null);return l.jsx("div",{className:"wrapper",id:"wrapper-footer-columns","data-testid":"contact",children:l.jsx("div",{className:"container",id:"footer-columns",children:l.jsxs("div",{className:"row","data-testid":"columns-container",children:[l.jsxs("div",{className:"col-xl-3",id:"info-column",children:[l.jsx("div",{className:"h5",children:e}),t&&l.jsx("p",{className:"contact-link",children:l.jsx("a",{href:t,children:"Contact Us"})}),n&&l.jsx("p",{className:"contribute-button","data-testid":"contact-contribution-link",children:l.jsx(vt,{color:"gold",href:n,text:"Support ASU",classes:"btn"})})]}),r&&r.length&&l.jsx(l.Fragment,{children:r.map((i,s)=>l.jsx(ii,{columnIndex:s,column:i,isOpen:a===s,onToggle:()=>{o(a===s?null:s)}},`footlink-${i.title}`))})]})})})};Fr.propTypes={contact:Be.shape({title:f.string.isRequired,contactLink:f.string.isRequired,contributionLink:f.string,columns:Be.arrayOf(Be.shape({title:f.string,links:Be.arrayOf(Be.shape({url:f.string.isRequired,title:f.string,text:f.string.isRequired}))}))})};const Bf="data:image/png;base64,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",Et={MAPS_AND_LOCATIONS:"https://www.asu.edu/about/locations-maps",JOBS:"https://cfo.asu.edu/applicant",DIRECTORY:"https://search.asu.edu/?search-tabs=web_dir_faculty_staff",CONTACT_ASU:"https://www.asu.edu/about/contact",MY_ASU:"https://my.asu.edu/",RANKINGS:"https://www.asu.edu/rankings"},Wt={COPYRIGHT_AND_TRADEMARK:"https://www.asu.edu/about/copyright-trademark",ACCESSIBILITY_REPORT:"https://accessibility.asu.edu/report",PRIVACY:"https://www.asu.edu/about/privacy",TERMS_OF_USE:"https://www.asu.edu/about/terms-of-use",EMERGENCY:"https://www.asu.edu/emergency/"},Ot={type:"internal link",section:"secondary footer"},Lf=()=>l.jsx("div",{className:"wrapper",id:"wrapper-footer-innovation","data-testid":"innovation",children:l.jsx("div",{className:"container",id:"footer-innovation",children:l.jsx("div",{className:"row",children:l.jsx("div",{className:"col",children:l.jsxs("div",{className:"d-flex footer-innovation-links",children:[l.jsxs("nav",{className:"nav","aria-label":"University Services",children:[l.jsx("a",{className:"nav-link",href:Et.MAPS_AND_LOCATIONS,onFocus:()=>Y({...Ot,text:"maps and locations"}),children:"Maps and Locations"}),l.jsx("a",{className:"nav-link",href:Et.JOBS,onFocus:()=>Y({...Ot,text:"jobs"}),children:"Jobs"}),l.jsx("a",{className:"nav-link",href:Et.DIRECTORY,onFocus:()=>Y({...Ot,text:"directory"}),children:"Directory"}),l.jsx("a",{className:"nav-link",href:Et.CONTACT_ASU,onFocus:()=>Y({...Ot,text:"contact asu"}),children:"Contact ASU"}),l.jsx("a",{className:"nav-link",href:Et.MY_ASU,onFocus:()=>Y({...Ot,text:"my asu"}),children:"My ASU"})]}),l.jsx("a",{className:"img-link",href:Et.RANKINGS,onFocus:()=>Y({...Ot,text:"#1 in the u.s. for innovation"}),children:l.jsx("img",{src:Bf,alt:"Repeatedly ranked #1 on 30+ lists in the last 3 years",width:"459",height:"100",loading:"lazy",decoding:"async"})})]})})})})}),Kt={type:"internal link",section:"tertiary footer"},Pf=()=>{function e(){try{return window.location.href}catch(t){return console.error(t),""}}return l.jsx("div",{className:"wrapper",id:"wrapper-footer-colophon","data-testid":"legal",children:l.jsx("div",{className:"container",id:"footer-colophon",children:l.jsx("div",{className:"row",children:l.jsx("div",{className:"col",children:l.jsxs("nav",{className:"nav colophon","aria-label":"University Legal and Compliance",children:[l.jsx("a",{className:"nav-link",href:Wt.COPYRIGHT_AND_TRADEMARK,onFocus:()=>Y({...Kt,text:"copyright and trademark"}),children:"Copyright and Trademark"}),l.jsx("a",{className:"nav-link",href:`${Wt.ACCESSIBILITY_REPORT}#a11yref=${e()}`,onFocus:()=>Y({...Kt,text:"accessibility"}),children:"Accessibility"}),l.jsx("a",{className:"nav-link",href:Wt.TERMS_OF_USE,onFocus:()=>Y({...Kt,text:"terms of use"}),children:"Terms of Use"}),l.jsx("a",{className:"nav-link",href:Wt.EMERGENCY,onFocus:()=>Y({...Kt,text:"emergency"}),children:"Emergency"}),l.jsx("a",{className:"nav-link",href:Wt.PRIVACY,onFocus:()=>Y({...Kt,text:"privacy"}),children:"Privacy"}),l.jsx("button",{type:"button",id:"manualConsentoptout",children:"Manage my privacy settings"})]})})})})})};const Df={prefix:"fab",iconName:"square-instagram",icon:[448,512,["instagram-square"],"e055","M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"]},Rf={prefix:"fab",iconName:"square-youtube",icon:[448,512,[61798,"youtube-square"],"f431","M282 256.2l-95.2-54.1V310.3L282 256.2zM384 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64zm14.4 136.1c7.6 28.6 7.6 88.2 7.6 88.2s0 59.6-7.6 88.1c-4.2 15.8-16.5 27.7-32.2 31.9C337.9 384 224 384 224 384s-113.9 0-142.2-7.6c-15.7-4.2-28-16.1-32.2-31.9C42 315.9 42 256.3 42 256.3s0-59.7 7.6-88.2c4.2-15.8 16.5-28.2 32.2-32.4C110.1 128 224 128 224 128s113.9 0 142.2 7.7c15.7 4.2 28 16.6 32.2 32.4z"]},kf={prefix:"fab",iconName:"square-facebook",icon:[448,512,["facebook-square"],"f082","M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"]},Ff={prefix:"fab",iconName:"linkedin",icon:[448,512,[],"f08c","M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"]},Mf={prefix:"fab",iconName:"square-x-twitter",icon:[448,512,[],"e61a","M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"]},Uf="data:image/png;base64,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",Nt={type:"external link",section:"primary footer"},Mr=({social:{logoUrl:e,unitLogo:t=Uf,mediaLinks:n={facebook:"",twitter:"",linkedIn:"",instagram:"",youtube:""}}})=>l.jsx("div",{className:"wrapper",id:"wrapper-endorsed-footer","data-testid":"social",children:l.jsx("div",{className:"container",id:"endorsed-footer",children:l.jsxs("div",{className:"row",children:[l.jsx("div",{className:"col-md",id:"endorsed-logo",children:l.jsx("a",{href:e,onFocus:()=>Y({...Nt,type:"internal link",text:"asu logo"}),children:l.jsx("img",{src:t,alt:"ASU University Technology Office Arizona State University."})})}),n&&l.jsx("div",{className:"col-md",id:"social-media",children:l.jsxs("nav",{className:"nav","aria-label":"Social Media",children:[n.facebook&&l.jsx("a",{className:"nav-link",href:n.facebook,"data-testid":"facebook",onFocus:()=>Y({...Nt,text:"facebook icon"}),children:l.jsx(Te,{title:"Facebook Social Media Icon",icon:kf,className:"social-icon"})}),n.twitter&&l.jsx("a",{className:"nav-link",href:n.twitter,"data-testid":"twitter",onFocus:()=>Y({...Nt,text:"twitter icon"}),children:l.jsx(Te,{title:"Twitter Social Media Icon",icon:Mf,className:"social-icon"})}),n.instagram&&l.jsx("a",{className:"nav-link",href:n.instagram,"data-testid":"instagram",onFocus:()=>Y({...Nt,text:"instagram icon"}),children:l.jsx(Te,{title:"Instagram Social Media Icon",icon:Df,className:"social-icon"})}),n.youtube&&l.jsx("a",{className:"nav-link",href:n.youtube,"data-testid":"youtube",onFocus:()=>Y({...Nt,text:"youtube icon"}),children:l.jsx(Te,{title:"YouTube Social Media Icon",icon:Rf,className:"social-icon"})}),n.linkedIn&&l.jsx("a",{className:"nav-link",href:n.linkedIn,"data-testid":"linkedin",onFocus:()=>Y({...Nt,text:"linkedin icon"}),children:l.jsx(Te,{title:"LinkedIn Social Media Icon",icon:Ff,className:"social-icon"})})]})})]})})});Mr.propTypes={social:Be.shape({unitLogo:f.string,mediaLinks:Be.shape({facebook:f.string,twitter:f.string,linkedIn:f.string,instagram:f.string,youtube:f.string})})};const Hf=Wn`
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
`,jf=Wn`
  display: flex;
  align-items: center;
`,Xf=ge.footer`
  // Variables
  --color-divider-darker: #1e1e1e;
  --color-base-white: #ffffff;
  --color-base-grey-2: #e8e8e8;
  --color-base-gold: #ffc627;
  --color-divider-lighter: #393939;
  --color-base-grey-7: #191919;
  --color-base-grey-4: #bfbfbf;

  // Base Styles
  * {
    box-sizing: border-box;
    font-family:
      Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans, sans-serif;
    line-height: 1.5rem;

    a:focus,
    button:focus {
      outline: none;
      box-shadow:
        0 0 0 2px var(--color-base-white),
        0 0 0 4px var(--color-base-grey-7) !important;
      -webkit-tap-highlight-color: transparent;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
  }

  .btn,
  a[class^="button-"] {
    text-decoration: none !important;
    padding: 1rem 2rem;
    white-space: nowrap;
    line-height: 1rem;
    width: max-content !important;
    font-size: 1rem;
    display: inline-block;
    &:active {
      transform: scale(0.95);
    }
  }

  h5,
  .h5 {
    font-size: 1rem;
    line-height: 1.5rem;
    letter-spacing: -0.015rem;
    margin: 1rem 0;
  }

  .nav {
    display: flex;
    flex-wrap: wrap;
    ${Hf}
  }

  // Footer Sections
  #wrapper-endorsed-footer,
  #wrapper-footer-columns {
    background: var(--color-divider-darker);

    h5,
    .h5 {
      color: var(--color-base-white);
      font-weight: 700;
    }
  }

  #wrapper-endorsed-footer {
    a {
      color: var(--color-base-grey-2);
    }

    & + #wrapper-footer-columns {
      border-top: 2px solid var(--color-divider-lighter);
    }
  }

  #wrapper-footer-innovation {
    background-color: var(--color-base-gold);
  }

  #wrapper-footer-colophon {
    background-color: var(--color-base-grey-2);
  }

  #wrapper-footer-innovation,
  #wrapper-footer-colophon {
    a {
      margin-right: 1.5rem;
      text-decoration: none;
      color: var(--color-base-grey-7);
    }
  }

  // Endorsed Footer
  #endorsed-logo {
    --endorsed-logo-display: block;
    --endorsed-logo-padding-top: 12px;
    --endorsed-logo-padding-bottom: 12px;
    --endorsed-logo-img-max-height: 6rem;
    --endorsed-logo-img-width: 100%;
    --endorsed-logo-img-max-width: 320px;
    padding-top: var(--endorsed-logo-padding-top);
    padding-bottom: var(--endorsed-logo-padding-bottom);
    display: var(--endorsed-logo-display);
    align-items: center;

    img {
      width: var(--endorsed-logo-img-width);
      max-width: var(--endorsed-logo-img-max-width);
      height: auto;
      max-height: var(--endorsed-logo-img-max-height);
      transform: scale(1.13);
      padding: 0;
      margin: 0;
    }

    @media (min-width: 768px) {
      --endorsed-logo-display: flex;
      --endorsed-logo-padding-top: 20px;
      --endorsed-logo-padding-bottom: 20px;
      --endorsed-logo-img-max-height: 6rem;
      --endorsed-logo-img-width: auto;
    }
  }

  #endorsed-footer {
    #social-media {
      .nav {
        padding-bottom: 1.5rem;

        .nav-link .social-icon {
          &:hover {
            color: var(--color-base-white);
          }
        }

        @media (min-width: 768px) {
          padding: 2.5rem 0;
          justify-content: flex-end;
        }
      }

      .nav-link {
        padding: 0.75rem 1rem 0.5rem 1rem;
        font-size: 2rem;
        color: var(--color-base-grey-4);
        line-height: 1;
        padding-top: 7px;

        &:first-child {
          @media (max-width: 575.98px) {
            padding-left: 0;
          }
        }

        &:last-child {
          @media (min-width: 768px) {
            /* padding-right: 0; */
          }
        }
      }
    }
  }

  // Footer Columns
  #footer-columns {
    #info-column {
      .contact-link {
        margin-bottom: 1.5rem;

        a {
          color: var(--color-base-grey-2);
          line-height: 1.5rem;
          text-decoration: underline;

          &:hover {
            color: var(--color-base-gold);
          }
        }
      }

      .contribute-button {
        margin-bottom: 1.5rem;
      }
    }

    .flex-footer {
      .accordion-item,
      .footer-accordion-header,
      .footer-accordion-body {
        background: var(--color-divider-darker);
        color: var(--color-base-white);
        border: 0;
      }

      .footer-accordion-header {
        border-top: 1px solid var(--color-divider-lighter);
        padding-left: 0;

        h5,
        .h5 {
          margin: 0;
          a,
          .footer-accordion-button {
            ${jf}
            justify-content: space-between;
          }
        }

        a,
        .footer-accordion-button {
          color: var(--color-base-grey-2);
          padding: 1.5rem 0;
          text-decoration: none;
          background: none;
          border: none;
          font: inherit;
          color: inherit;
          cursor: pointer;
          text-align: inherit;
          width: 100%;
          transition: background-color 0.15s ease;

          &:hover {
            background: var(--color-divider-darker);
          }

          svg,
          fa-chevron-up {
            margin-left: 1rem;
            transition: 0.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            margin-left: 0.5rem;
            font-size: 1rem;

            &.column-open {
              transform: rotate(180deg);
            }
          }
        }

        @media (min-width: 1260px) {
          border-top: 0;
          padding: 0;
          a,
          .footer-accordion-button {
            padding: 0;
            cursor: default;
          }

          span {
            display: none;
          }
        }
      }

      .footer-accordion-body {
        display: none;
        overflow: hidden;
        padding: 0 0 0 1.5rem;

        &.footer-collapsing {
          display: block;
          max-height: 0px;
        }
        &.footer-column-show {
          display: block;
          max-height: 1000px;
        }

        .nav-link {
          color: var(--color-base-grey-2);
          padding: 0 0 1rem;
          line-height: 1.5rem;
          text-decoration: none;
          display: block;

          &:hover {
            color: var(--color-base-gold);
            text-decoration: underline;
          }
        }

        @media (min-width: 1260px) {
          padding: 0;
          display: block;
          min-height: fit-content;
          overflow: visible;
        }
      }
    }

    @media (min-width: 1260px) {
      padding-bottom: 3rem;
      padding-top: 3rem;
      h5,
      .h5 {
        margin: 0 0 1.5rem 0;
      }
      .footer-accordion-header:has(.h5, h5) {
        h5,
        .h5 {
          margin: 0 0 1.5rem 0;
        }
      }
    }
  }

  // Footer Innovation
  #footer-innovation {
    .footer-innovation-links {
      justify-content: space-between;
      align-items: center;
      font-weight: 700;

      .img-link {
        order: 2;
        margin-right: 0;
        transform: translate(1.5rem, 0);
        padding-top: 24px;
        padding-bottom: 24px;

        img {
          height: auto;
          width: auto;
          max-width: 320px;
        }
      }

      .nav-link {
        padding: 0;
      }

      @media (max-width: 991.98px) {
        flex-direction: column;
        padding: 0.5rem 0;

        .img-link {
          margin-right: 0;
          transform: none;

          img {
            width: 100%;
            height: auto;
            order: -1;
          }
        }

        .nav {
          display: grid;
          grid-template-rows: 1fr 1fr 1fr;
          grid-auto-flow: column;
          justify-items: start;
          width: 100%;

          .nav-link {
            margin-right: 0;
            padding: 0.5rem 0;

            &:nth-child(n + 4) {
              justify-self: end;
            }
          }
        }
      }
      @media (min-width: 991.98px) {
        .img-link {
          padding-right: 16px;
        }
      }
      @media (max-width: 576px) {
        .img-link {
          img {
            max-width: 100%;
          }
        }
      }
    }
  }

  // Footer Colophon
  #wrapper-footer-colophon {
    .colophon {
      margin: 1rem 0;
    }

    .nav-link {
      padding: 0;
    }

    @media (max-width: 767.98px) {
      .nav {
        display: grid;
        grid-template-rows: 1fr 1fr 1fr;
        grid-auto-flow: column;
        justify-items: start;
        width: 100%;

        .nav-link {
          margin-right: 0;
          padding: 0.5rem 0;

          &:nth-child(n + 4) {
            justify-self: end;
          }
        }
      }
    }
  }

  //footer manual consent opt-out
  .footer-legal-links,
  .footer-menu,
  .nav {
    &.colophon #manualConsentoptout,
    #manualConsentoptout {
      color: #484848;
      border: none;
      background-color: transparent;
      width: auto;
      cursor: pointer;
      padding: 0;
      text-align: right;
      justify-self: end;
      font-size: 1rem;
      &:hover {
        text-decoration: underline;
      }
    }
  }

  // Bootstrap Default Stylings
  .row {
    --bs-gutter-x: 24px;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1 * var(--bs-gutter-y));
    margin-right: calc(-0.5 * var(--bs-gutter-x));
    margin-left: calc(-0.5 * var(--bs-gutter-x));

    > * {
      flex-shrink: 0;
      width: 100%;
      max-width: 100%;
      padding-right: calc(var(--bs-gutter-x) * 0.5);
      padding-left: calc(var(--bs-gutter-x) * 0.5);
      margin-top: var(--bs-gutter-y);
    }
  }

  .col {
    flex: 1 0 0%;
  }

  .d-flex {
    display: flex;
  }

  .container {
    --bs-gutter-x: 24px;
    --bs-gutter-y: 0;
    width: 100%;
    padding-right: calc(var(--bs-gutter-x) * 0.5);
    padding-left: calc(var(--bs-gutter-x) * 0.5);
    margin-right: auto;
    margin-left: auto;
  }

  @media (max-width: 767.98px) {
    .container,
    .container-fluid,
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm {
      padding-left: 2rem;
      padding-right: 2rem;
    }
  }

  @media (min-width: 576px) {
    .container {
      max-width: 540px;
    }
  }

  @media (min-width: 768px) {
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm,
    .container {
      max-width: 768px;
    }
    .col-md {
      flex: 1 0 0%;
    }
  }

  @media (min-width: 992px) {
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm,
    .container {
      max-width: 992px;
    }
  }

  @media (min-width: 1260px) {
    .col-xl-3 {
      flex: 0 0 auto;
      width: 25%;
    }
    .col-xl {
      flex: 1 0 0%;
    }
    .accordion-item {
      svg,
      .fa-chevron-up {
        display: none;
      }
    }
    .container-xl,
    .container-lg,
    .container-md,
    .container-sm,
    .container {
      max-width: 1224px;
    }
  }
`,Qf=()=>l.jsxs(l.Fragment,{children:[l.jsx(Lf,{}),l.jsx(Pf,{})]}),Ur=({social:e,contact:t})=>(H.useEffect(()=>{typeof window<"u"&&ga({packageName:"component-StyledFooter",component:"Component Footer",type:"NA",configuration:{social:e,contact:t}})},[]),l.jsxs(Xf,{role:"contentinfo",children:[e&&l.jsx(Mr,{social:e}),t&&l.jsx(Fr,{contact:t}),l.jsx(Qf,{})]}));Ur.propTypes={social:Be.shape(Mr.propTypes),contact:Be.shape(Fr.propTypes)};const zf=(e,t,n)=>{Sn(n).render(H.createElement(e,t))},Vf=({targetSelector:e,props:t})=>{zf(Ur,t,document.querySelector(e))},Yf="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAyAAAAJYCAIAAAAVFBUnAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAEvGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSfvu78nIGlkPSdXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQnPz4KPHg6eG1wbWV0YSB4bWxuczp4PSdhZG9iZTpuczptZXRhLyc+CjxyZGY6UkRGIHhtbG5zOnJkZj0naHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyc+CgogPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9JycKICB4bWxuczpBdHRyaWI9J2h0dHA6Ly9ucy5hdHRyaWJ1dGlvbi5jb20vYWRzLzEuMC8nPgogIDxBdHRyaWI6QWRzPgogICA8cmRmOlNlcT4KICAgIDxyZGY6bGkgcmRmOnBhcnNlVHlwZT0nUmVzb3VyY2UnPgogICAgIDxBdHRyaWI6Q3JlYXRlZD4yMDI1LTEwLTEwPC9BdHRyaWI6Q3JlYXRlZD4KICAgICA8QXR0cmliOkV4dElkPjExYTU0MmJlLTRhNWYtNDBmNy1iODljLTQyYTU3N2I1Mjg3YzwvQXR0cmliOkV4dElkPgogICAgIDxBdHRyaWI6RmJJZD41MjUyNjU5MTQxNzk1ODA8L0F0dHJpYjpGYklkPgogICAgIDxBdHRyaWI6VG91Y2hUeXBlPjI8L0F0dHJpYjpUb3VjaFR5cGU+CiAgICA8L3JkZjpsaT4KICAgPC9yZGY6U2VxPgogIDwvQXR0cmliOkFkcz4KIDwvcmRmOkRlc2NyaXB0aW9uPgoKIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PScnCiAgeG1sbnM6ZGM9J2h0dHA6Ly9wdXJsLm9yZy9kYy9lbGVtZW50cy8xLjEvJz4KICA8ZGM6dGl0bGU+CiAgIDxyZGY6QWx0PgogICAgPHJkZjpsaSB4bWw6bGFuZz0neC1kZWZhdWx0Jz5VbnRpdGxlZCBkZXNpZ24gLSAxPC9yZGY6bGk+CiAgIDwvcmRmOkFsdD4KICA8L2RjOnRpdGxlPgogPC9yZGY6RGVzY3JpcHRpb24+CgogPHJkZjpEZXNjcmlwdGlv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eUZdAb1MfX39jBkzNmzYcMVHZp7/iegnn3xy06ZN6RzWJa4MQvydPHmyvLz866+/Dj0EII3Ky8tfe+21yzzggsA6fvz4lClTjh8/nv5hKVNXEH9NTU3z5s378ccfQw8BSLtZs2a9++67l7r3gt8ivO6669asWdOvX7/0r0qNuoL4++WXX+699151BfQRH3/88cKFCy91b/sfey4pKXnllVfSuyhF6gri79ixY/Pmzfvtt99CDwHoPl9++eX8+fMvele//+ZUQUHB4cOHf/jhh7Tv6gB1BfF36tSpuXPn7t+/P/QQgO526NChY8eOTZs2rd3t7c9gtXn77beLi4vTv+oKJkyYoK4g/p566qnvv/8+9AqAMNatW7dx48Z2N148sDIyMj744IP/5lh3KikpqaurU1cQc++88862bdtCrwAI6fnnnz969Oj5t1wysK666qr169eXlZWlf9VFzJw5s66uLjs7O8irAx3U0NCwbNmy0CsAAvv777/b/azzJQOrzapVq956663c3Nx0rrpATk7OG2+8sXr16m57RaDTKioqQk8AiIXPP//8iy++OPfPC74H61KOHDny4osvnv+0NJk+ffrrr79+/fXXp/uFgK7bvn17eXl56BUAcTFixIhdu3a1/X2FM1hthg8fXlVVtXHjxry8vDRtysvL27hxY1VVlbqCHiGZTLo4CHC+Q4cOVVVVtf3doTNY5ySTye3bt1dWVu7evTuqNZMnT37sscfuvvvuzMzMqI4JpNunn3768MMPh14BEC/Dhw/ftWtXVlZWaoF1zt69ezds2LB58+Y//vijcwuGDh06a9as+++/f+zYsZ07AhDQzJkz9+zZE3oFQOysWLFi9uzZnQysc+rr67/66qudO3d28JzW5MmTi4uLb7/99sLCwq68LhDQwYMHS0pKQq8AiKOpU6fW1NR0NbDO19DQsG/fvp9//vnMmTPn356VlTVy5Mibb775lltuieq1gIBefvnltWvXhl4BEFPfffddlIEF9BG33XZbc3Nz6BUAMbV06dIOfYoQ4JwDBw6oK4DL+OSTTwQWkJpvvvkm9ASAWNu1a5fAAlIT4be0APRWAgtITUNDQ+gJAHHnTe5Aam666abW1tbQKwBizRksIAVNTU3qCuCKBBaQgtOnT4eeANADCCwgBe2+RhiAixJYAAARE1hACq6++urQEwB6AIEFpGDgwIGhJwD0AAILSEFOTk7oCQA9gMACUpBIJAYPHhx6BUDcCSwgNSNHjgw9ASDuBBaQmlGjRoWeABB3AgtIzejRo0NPAIg7gQWkZsqUKaEnAMTaoEGDBBaQmjFjxvgsIcBlTJs2TWABqUkkEqWlpaFXAMTXjBkzBBaQsrKystATAGJq4MCBAgvojNLS0tzc3NArAOKorKxswIABAgtIWf/+/efOnRt6BUAcPfTQQxk+RQh0zuOPP56VlRV6BUC8FBYWjh07NkNgAZ1z4403zpkzJ/QKgHh54okn2v7ITCaTYacAPVRjY2NxcXFLS0voIQCxkJ+fv3Xr1ra/ncECOmnYsGHPPfdc6BUAsZCZmbl8+fJz/xRYQOctWrTo1ltvDb0CILynn376/F8Sc4kQ6JKDBw+WlpaePn069BCAYCZOnLhp06ZE4v/nrZzBArpk1KhRS5cuDb0CIJihQ4euW7fu/LrKEFhA182fP3/evHmhVwAEkJ2dvX79+kGDBrW73SVCIAJnzpwpLy//7LPPQg8B6D7Z2dnV1dWTJk36713OYAERSCQSq1ev9iPQQN+Rk5NTW1t70brKEFhAVAYMGPD+++/Pnj079BCAtBs0aNDmzZsnTpx4qQcILCAyiURixYoVS5YsCT0EII1Gjx69devWy39JjfdgAdHbu3fvo48+evjw4dBDAKKUmZlZXl7+0ksv9e/f/wqPFFhAOvzzzz+rVq1auXKl39IBeoehQ4euXLlyypQpHXmwwALSqLGxcdmyZXV1daGHAHReTk7OggULFi9enJub28GnCCwg7X7//fc1a9ZUVVWdPHky9BaAFOTl5S1cuPCBBx7oeFq1EVhAN2lpaamurl67du2hQ4dCbwG4nMGDB991111z5swpKirq3BEEFtDd9u3b9+2339bX1+/du/fgwYOh5wCcVVhYeMcdd5SWlo4bN66LhxJYQGD79+9vbm4OvQLou3Jzc4cMGTJs2LAIjymwAAAi5otGAQAiJrAAACImsAAAIiawAAAiJrAAACImsAAAIiawAAAiJrAAACImsAAAIiawAAAiJrAAACImsAAAIiawAAAiJrAAACImsAAAIiawAAAiJrAAACImsAAAIiawAAAi9j80rnSkWg3OzAAAAABJRU5ErkJggg==",Gf={Lg:"992px",Xl:"1260px"},si=H.createContext(),ci=({initialValue:e,children:t})=>{const n={...e,breakpoint:Gf[e.breakpoint]};return l.jsx(si.Provider,{value:n,children:t})};ci.propTypes={initialValue:f.shape(va).isRequired,children:f.node.isRequired};const ze=()=>{const e=H.useContext(si);if(e===void 0)throw new Error("useAppContext must be used within a AppContextProvider");return e},j="uds-hdr-",A={LOGIN_STATUS:`${j}login-status`,USER_NAME:`${j}name`,SIGNOUT:`${j}signout`,NAV_LINK:`${j}nav-link`,NAV_ITEM_SELECTED:`${j}nav-item-selected`,OPEN_LINK:`${j}open-link`,ICON_NAV_ITEM:`${j}icon-nav-item`,MOBILE_ONLY:`${j}mobile-only`,CHEVRON_ICON:`${j}chevron-icon`,OPEN:`${j}open`,HEADER_DROPDOWN:e=>`${j}header-dropdown-${e}`,OPENED:`${j}opened`,DROPDOWN_CONTAINER:`${j}dropdown-container`,DROPDOWN_BUTTON_CONTAINER:`${j}dropdown-button-container`,SEARCH_BUTTON:`${j}search-button`,OPEN_SEARCH:`${j}open-search`,SEARCH_ICON:`${j}search-icon`,SUBMIT_BUTTON:`${j}submit-button`,SUBMIT_SEARCH:`${j}submit-search`,UNIVERSAL_NAV:`${j}universal-nav`,HEADER_TOP:`${j}header-top`,LINKS_CONTAINER:`${j}links-container`,HEADER_MAIN:`${j}header-main`,CONTENT_CONTAINER:`${j}content-container`,NAV_LIST:`${j}nav-list`,BUTTONS_CONTAINER:`${j}buttons-container`,NAV_BUTTON:`${j}nav-button`,UL_HEADING:`${j}ul-heading`,TITLE:`${j}title`,UNIT_NAME:`${j}unit-name`,SUBUNIT_NAME:`${j}subunit-name`,TITLE_SUBUNIT_NAME:`${j}title-subunit-name`,EXPAND_TITLE:`${j}expand-title`,NO_NAVIGATION:`${j}no-navigation`,PARTNER:`${j}partner`,PARTNERS_LOGOS:`${j}partners-logos`,LOGO_VERT:`${j}vert`,LOGO_HORIZ:`${j}horiz`,MENU_SEARCH_ICON:`${j}menu-search-icon`,MENU_CLOSE_ICON:`${j}menu-close-icon`,NAVBAR:"navbar",NAVBAR_EXPAND_XL:"navbar-expand-xl",NAVBAR_BRAND:"navbar-brand",NAVBAR_TOGGLER:"navbar-toggler",NAVBAR_NAV:"navbar-nav",NAV_ITEM:"nav-item",COLLAPSED:"collapsed",CONTAINER:"container",CONTAINER_XL:"container-xl",FORM_CONTROL:"form-control",VISUALLY_HIDDEN:"visually-hidden",VISUALLY_HIDDEN_FOCUSABLE:"visually-hidden-focusable"},li=e=>A.HEADER_DROPDOWN(e),Ue=(...e)=>e.filter(Boolean).join(" "),Zt=e=>{const t=window==null?void 0:window.matchMedia(`(max-width: ${e})`),[n,r]=H.useState(t==null?void 0:t.matches),a=o=>{r(o.matches)};return H.useEffect(()=>(t.addEventListener("change",a),()=>t.removeEventListener("change",a)),[]),n},Wf=ge.div`
  background-color: ${fc};
  padding: 0.5rem 0rem;
  transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
  .${A.HEADER_TOP} {
    height: 100%;
    .nav {
      height: 100%;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      .${A.LINKS_CONTAINER} {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1.5rem;
        .${A.NAV_LINK} {
          color: ${Le};
          font-size: 0.75rem;
          line-height: 1;
          white-space: nowrap;
          text-decoration: none;
          display: flex;
          align-items: center;

          &:hover {
            text-decoration: underline;
          }

          &.visually-hidden-focusable:not(:focus):not(:active) {
            clip: rect(0 0 0 0);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;
          }
        }
      }
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
    min-height: auto;
    position: sticky;
    bottom: 0;
    padding: 0;
    .${A.HEADER_TOP} {
      width: 100%;
      .nav {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column-reverse;
        .${A.LINKS_CONTAINER} {
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-auto-flow: row;
          justify-items: start;
          width: 100%;
          gap: 0;
          border-top: 1px solid ${Pe};
          border-left: 1px solid ${Pe};
          .${A.NAV_LINK} {
            white-space: normal;
            margin-right: 0;
            text-align: center;
            width: 100%;
            font-size: 0.875rem;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid ${Pe};
            border-right: 1px solid ${Pe};
            display: flex;
            align-items: center;
            justify-content: center;

            &.visually-hidden-focusable:not(:focus):not(:active) {
              border: none;
            }
          }
        }
      }
    }
  }
`,Kf=ge.div`
  display: flex;
  align-items: center;
  margin-right: 0.5rem;
  > a {
    padding: 0;
    margin: 0;
    color: ${Le};
    text-decoration: none;
    line-height: 1;
    vertical-align: middle;
  }
  > span.${A.USER_NAME} {
    font-weight: 700;
    line-height: 1;
  }
  > a.${A.SIGNOUT}:before {
    content: "(";
    margin-left: 4px;
  }
  > a.${A.SIGNOUT}:after {
    content: ") ";
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
    margin-right: 0;
    justify-content: center;
  }
`,fi={section:"topbar"},Zf=()=>{const{loggedIn:e,userName:t,logoutLink:n,loginLink:r,onLoginClick:a,onLogoutClick:o,breakpoint:i}=ze();return l.jsx(Kf,{className:Ue(A.NAV_LINK,A.LOGIN_STATUS),breakpoint:i,children:e?l.jsxs(l.Fragment,{children:[t?l.jsx("span",{className:A.USER_NAME,"data-testid":"user-name",children:t}):"",l.jsx("a",{className:A.SIGNOUT,href:n,onFocus:()=>Y({...fi,text:"sign out"}),onClick:s=>o==null?void 0:o(s),children:"Sign Out"})]}):l.jsx("a",{href:r,onFocus:()=>Y({...fi,text:"sign in"}),onClick:s=>a==null?void 0:a(s),children:"Sign In"})})},qf=ge.form`
  display: flex;
  align-items: center;
  button {
    border: none;
    background: transparent;
    cursor: pointer;
  }
  .${A.SEARCH_BUTTON} {
    transition: cubic-bezier(0.19, 1, 0.19, 1);
    font-size: 0.75rem;
    line-height: 1;
    color: ${Le};
    display: inline-flex;
    align-items: center;
    vertical-align: middle;
    span {
      margin-right: 0.25rem;
    }
  }
  input[name="q"] {
    width: 200px;
    background-color: ${Ze};
    border: 0;
    border-radius: 0;
    padding: 0.5rem 0.5rem;
    font-weight: 400;
    font-size: 0.75rem;
    line-height: 1;
    color: ${dc};
    border: 1px solid ${Pe};
    outline: ${Le};
    margin-left: 1.5rem;
    display: unset;
    vertical-align: middle;

    &::placeholder {
      font-size: 0.75rem;
      line-height: 1;
    }
    &:focus,
    &:focus-visible {
      border: 1px solid ${Le};
    }
  }
  .${A.SUBMIT_BUTTON} {
    margin-left: 0.5rem;
  }
  .${A.CLOSE_SEARCH} {
    background-color: ${Ze};
    border: 1px solid ${Pe};
    border-radius: 100%;
    padding: 0.45rem 0.75rem;
    margin-left: 0.5rem;
  }
  &.${A.OPEN_SEARCH} {
    margin-left: -1rem;
    .${A.SEARCH_BUTTON} {
      transform: translate(1.9rem);
      pointer-events: none;
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
    padding: 1rem 1rem;
    label {
      position: relative;
      font-size: 0.875rem;
      margin-bottom: 0;
      width: 100%;
      svg.${A.SEARCH_ICON} {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translate(0, -50%);
      }
      input[name="q"] {
        width: 100%;
        margin: 0;
        padding: 0.5rem 3rem 0.5rem 2.25rem;
        font-size: 1rem;
        line-height: 1.5;

        &::placeholder {
          font-size: 1rem;
          line-height: 1.5;
        }

        &::-webkit-search-cancel-button,
        &::-webkit-search-decoration,
        &::-webkit-search-results-button,
        &::-webkit-search-results-decoration {
          display: none;
        }
      }
      .${A.SUBMIT_SEARCH} {
        position: absolute;
        top: 50%;
        right: 0.5rem;
        transform: translate(0, -50%);
        border-radius: 50%;
        width: 2rem;
        height: 2rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        background-color: ${Jn};
        color: ${Ze};
        font-size: 0.75rem;
      }
    }
  }
`,Hr=({inputRef:e,hasInputValue:t,setHasInputValue:n,isMobile:r,style:a={},className:o="",onBlur:i})=>{const s=d=>{const g=d.target.value;n(g.length>0)},u={ref:e,className:`form-control ${o}`,type:"search",name:"q",placeholder:"Search asu.edu",required:!0,onChange:s,onBlur:i,style:{paddingLeft:t&&r?"1rem":void 0,...a}};return r?l.jsxs(l.Fragment,{children:[!t&&l.jsx(Te,{className:A.SEARCH_ICON,icon:$n}),l.jsx("input",{...u}),t&&l.jsx("button",{type:"submit","aria-label":"Submit search",className:A.SUBMIT_SEARCH,children:l.jsx(Te,{icon:$n,size:"lg"})})]}):l.jsx("input",{...u})};Hr.propTypes={inputRef:f.shape({current:f.instanceOf(Element)}).isRequired,hasInputValue:f.bool.isRequired,setHasInputValue:f.func.isRequired,isMobile:f.bool.isRequired,style:f.object,className:f.string,onBlur:f.func};const ui={event:"search",action:"type",name:"onenter",type:"main search",region:"navbar",section:"topbar"},di=()=>{const{breakpoint:e,searchUrl:t,site:n}=ze(),r=Zt(e),a=H.useRef(null),[o,i]=H.useState(!1),[s,u]=H.useState(!1);H.useEffect(()=>{o&&a.current&&a.current.focus()},[o]);const d=h=>{const w=h.currentTarget;h.preventDefault();const S=w.elements.namedItem("q");Y({...ui,text:S?S.value:""}),setTimeout(()=>{w.submit()},100)},g=()=>{i(h=>{const w=!h;return Y({...ui,event:"link",action:"click",name:"onclick",text:w?"search icon":"close search icon"}),w})};return l.jsxs(qf,{breakpoint:e,action:t,onSubmit:d,method:"get",name:"gs",className:o?A.OPEN_SEARCH:"","data-testid":"universal-nav-search-form",role:"search",children:[r?l.jsx("label",{children:l.jsx(Hr,{inputRef:a,hasInputValue:s,setHasInputValue:u,isMobile:r})}):l.jsxs(l.Fragment,{children:[!o&&l.jsxs("button",{type:"button","aria-label":"Search asu.edu",onClick:g,className:A.SEARCH_BUTTON,"data-testid":"search-button",children:[l.jsx("span",{children:"Search"}),l.jsx(Te,{icon:$n})]}),o&&l.jsxs(l.Fragment,{children:[l.jsx(Hr,{inputRef:a,hasInputValue:s,setHasInputValue:u,isMobile:r,onBlur:()=>{s||i(!1)}}),l.jsx(vt,{color:"dark",text:"Search",as:"button",classes:A.SUBMIT_BUTTON})]})]}),l.jsx("input",{name:"url_host",value:n,type:"hidden"}),l.jsx("input",{name:"site",value:"default_collection",type:"hidden"}),l.jsx("input",{name:"sort",value:"date:D:L:d1",type:"hidden"}),l.jsx("input",{name:"output",value:"xml_no_dtd",type:"hidden"}),l.jsx("input",{name:"ie",value:"UTF-8",type:"hidden"}),l.jsx("input",{name:"oe",value:"UTF-8",type:"hidden"}),l.jsx("input",{name:"client",value:"asu_frontend",type:"hidden"}),l.jsx("input",{name:"proxystylesheet",value:"asu_frontend",type:"hidden"})]})},Jf={event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"topbar",text:""},Ai=()=>{const{breakpoint:e}=ze(),t=Zt(e);function n(){try{return window.location.href}catch(a){return console.error(a),""}}const r=[{className:Ue(A.NAV_LINK,A.VISUALLY_HIDDEN_FOCUSABLE),href:"#skip-to-content",text:"Skip to main content"},{className:Ue(A.NAV_LINK,A.VISUALLY_HIDDEN_FOCUSABLE),href:`https://accessibility.asu.edu/report#a11yref=${n()}`,text:"Report an accessibility problem"},{className:A.NAV_LINK,href:"https://asu.edu",text:"ASU Home"},{className:A.NAV_LINK,href:"https://my.asu.edu",text:"My ASU"},{className:A.NAV_LINK,href:"https://www.asu.edu/academics/colleges-schools",text:"Colleges and Schools"}];return l.jsx(Wf,{breakpoint:e,className:A.UNIVERSAL_NAV,"data-testid":"universal-navbar","data-elastic-exclude":"data-elastic-exclude",children:l.jsx("div",{className:"container-xl",children:l.jsx("div",{className:A.HEADER_TOP,children:l.jsxs("nav",{className:"nav","aria-label":"ASU Global",children:[l.jsxs("div",{className:A.LINKS_CONTAINER,children:[r.map(a=>l.jsx("a",{className:a.className,href:a.href,onClick:()=>Y({...Jf,text:a.text}),children:a.text},a.href)),l.jsx(Zf,{})]}),!t&&l.jsx(di,{})]})})})})},_f=ge.div`
  background-color: ${Ze};
  border-bottom: 1px solid ${Pe};
  padding: 0 12px;
  .navbar {
    padding: 0;
    display: flex;
    align-items: flex-start;
    flex-wrap: nowrap;
  }
  .navbar-brand {
    .${A.LOGO_VERT} {
      display: block;
      height: 72px;
      width: auto;
      margin: 20px 1rem 20px 0;
    }
    .${A.LOGO_HORIZ} {
      display: none;
    }
  }
  .navbar-toggler {
    display: none;
  }
  .${A.EXPAND_TITLE} {
    width: 100%;
  }
  @media (min-width: ${({breakpoint:e})=>e}) {
    .${A.NO_NAVIGATION} {
      margin-top: 16px;
      display: flex;
      align-items: center;
      .${A.TITLE} {
        width: 100%;
      }
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    padding: 0;
    .navbar {
      padding: 1.5rem 0 0 0;
      flex-wrap: wrap;
      justify-content: space-between;
      &.${A.PARTNER} {
        flex-direction: row-reverse;
      }
    }
    .${A.PARTNER} .${A.CONTENT_CONTAINER} {
      min-height: calc(100vh - 240px);
    }
    .navbar-brand {
      padding: 0;
      margin: 0;

      .${A.LOGO_VERT} {
        display: none;
      }

      .${A.LOGO_HORIZ} {
        display: block;
        height: 32px;
        width: auto;
        margin-bottom: 1rem;
        margin-left: 2rem;
      }
    }
    .navbar-toggler {
      display: initial;
      background: transparent;
      color: ${Le};
      border: 0;
      border-radius: 0;
      font-size: 1.25rem;
      margin-right: 2rem;
      cursor: pointer;
      min-width: 44px;
      min-height: 44px;

      .${A.MENU_SEARCH_ICON} {
        display: none;
      }

      &.collapsed {
        .${A.MENU_SEARCH_ICON} {
          width: 24px;
          height: auto;
          display: unset;
        }
        .${A.MENU_CLOSE_ICON} {
          display: none;
        }
      }
      .${A.NO_NAVIGATION} + nav .${A.BUTTONS_CONTAINER} {
        border-top: 1px solid ${fn};
      }
    }
  }
`,mi="data:image/png;base64,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",pi="data:image/png;base64,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",$f=ge.a`
  display: unset;
  padding: 0;
  margin: 0;
  font-size: unset;
  line-height: unset;
  white-space: unset;
`,eu=()=>{const{logo:e}=ze();return l.jsxs($f,{href:(e==null?void 0:e.brandLink)??"https://asu.edu",className:A.NAVBAR_BRAND,"data-testid":"logo",onFocus:()=>Y({text:"asu logo"}),children:[l.jsx("img",{className:A.LOGO_VERT,src:(e==null?void 0:e.src)??mi,alt:(e==null?void 0:e.alt)??"Arizona State University logo",title:(e==null?void 0:e.title)??"ASU homepage",width:"303",height:"234",decoding:"async",fetchpriority:"high"}),l.jsx("img",{className:A.LOGO_HORIZ,src:(e==null?void 0:e.mobileSrc)??pi,alt:(e==null?void 0:e.alt)??"Arizona State University logo",title:(e==null?void 0:e.title)??"ASU homepage",width:"400",height:"72",decoding:"async",fetchpriority:"high"})]})},tu=ge.nav`
  white-space: nowrap;
  > .${A.CONTENT_CONTAINER} {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: none;
    height: auto;
    margin: inherit;
    font-size: inherit;
    color: inherit;
    flex-direction: row;
  }
  .${A.NAV_LIST} {
    display: flex;
    margin: 0;
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
    > .${A.CONTENT_CONTAINER} {
      flex-direction: column;
      justify-content: flex-start;
      overflow-y: auto;
      min-height: calc(100vh - 277px);
      max-height: calc(100vh - 277px);
      > *:last-child {
        margin-bottom: min(75px, 15vw);
      }
    }
    .${A.NAV_LIST} {
      flex-direction: column;
      width: 100%;
    }
    .${A.BUTTONS_CONTAINER} {
      display: flex;
      align-items: center;
      padding: 1rem 2rem;
      width: 100%;
    }
  }
`,nu=ge.div`
  position: fixed;
  background-color: ${Ze};
  border: 1px solid ${Pe};
  margin: 0;
  z-index: 1031;
  visibility: hidden;
  white-space: normal;
  &.${A.OPENED} {
    visibility: visible;
  }
  &.mega {
    width: 100%;
    left: 0;
    margin-left: 0 !important;
  }
  &.aligned-right:not(.mega) {
    position: absolute;
    right: 0;
  }
  > .${A.DROPDOWN_CONTAINER} {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    padding: 2rem;
    ul {
      width: 16rem;
      max-width: 282px;
      display: flex;
      flex-direction: column;
      &:not(:last-child) {
        padding-right: 2rem;
        margin-right: 2rem;
        border-right: 1px solid ${Pe};
      }
      .${A.UL_HEADING} {
        margin-top: 0;
        font-size: 1.5rem;
        letter-spacing: -0.035em;
        font-weight: 700;
        text-align: left;
        opacity: 1;
        margin: 1rem 0;
        line-height: calc(100% + 0.12em);
      }
      .${A.NAV_LINK} {
        padding: 0;
        a {
          width: 100%;
          display: inline-block;
          margin: 0.75rem 0;
          position: relative;
          line-height: 1rem;
          color: ${Le};
          &:hover {
            color: ${Jn};
            text-decoration: underline;
          }
        }
        & + .${A.NAV_BUTTON} {
          margin-top: auto;
          padding-top: 2rem;
          & + .${A.NAV_BUTTON} {
            margin-top: 1rem;
          }
        }
      }
    }
  }
  .${A.DROPDOWN_BUTTON_CONTAINER} {
    border-top: 1px solid ${Pe};
    border-bottom: 1px solid ${Pe};
    margin-top: 1rem;
    > div {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      padding: 1rem 0;
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    position: initial;
    border: none;
    max-height: unset;
    visibility: visible;
    display: none;
    &.${A.OPENED} {
      display: block;
    }
    > .${A.DROPDOWN_CONTAINER} {
      max-width: 100%;
      padding: 1rem 2rem;
      flex-direction: column;
      ul {
        width: 100%;
        max-width: 100%;
        padding: 0 1rem;
        margin-bottom: 1rem;
        &:not(:last-child) {
          padding-right: 1rem;
          margin: 0 0 1rem 0;
          border: none;
        }
        .${A.UL_HEADING} {
          font-size: 1.25rem;
        }
        .${A.NAV_BUTTON} {
          padding-top: 1.5rem;
        }
        .${A.NAV_LINK} {
          padding: 0 1rem;
          &:not(:last-child) {
            border-bottom: 1px solid ${Pe};
          }
          a {
            padding: 1rem 0;
            margin: 0;
          }
        }
      }
    }
    .${A.DROPDOWN_BUTTON_CONTAINER} {
      margin-top: 0;
      > div {
        max-width: 100%;
        padding: 1rem 3rem;
      }
    }
  }
`,ru={event:"link",action:"click",name:"onclick",type:"internal link",region:"navbar",section:"main navbar",text:""},gi=({text:e})=>l.jsx("h3",{className:A.UL_HEADING,children:e});gi.propTypes={text:f.string};const hi=({link:e,dropdownName:t,handleLinkEvent:n})=>l.jsx("li",{className:A.NAV_BUTTON,children:l.jsx(vt,{text:e.text,color:e.color||"dark",href:e.href,onClick:r=>n(r,e)})});hi.propTypes={link:f.shape({text:f.string,color:f.string,href:f.string}),dropdownName:f.string,handleLinkEvent:f.func};const vi=({link:e,dropdownName:t,handleLinkEvent:n})=>l.jsx("li",{className:A.NAV_LINK,children:l.jsx("a",{...e.href?{}:{tabIndex:0},href:e.href,onClick:r=>n(r,e),onKeyDown:r=>n(r,e),children:e.text})});vi.propTypes={link:f.shape({text:f.string,href:f.string}),dropdownName:f.string,handleLinkEvent:f.func};const yi=({dropdownName:e,items:t,buttons:n,classes:r,listId:a,setItemOpened:o,parentLink:i})=>{const{breakpoint:s}=ze(),u=(t==null?void 0:t.length)>2,d=H.useRef(null),[g,h]=H.useState(!1),w=(t==null?void 0:t.length)>1;H.useEffect(()=>{var v;if(window&&d.current){const T=(v=d==null?void 0:d.current)==null?void 0:v.getBoundingClientRect().left,N=window.innerWidth*.55;h(T>N)}},[]);const S=v=>v.stopPropagation(),b=(v,T)=>{var _;const{key:N,type:I,target:D}=v,{parentElement:y}=D,$=()=>{var ue;const ce=(ue=y.nextElementSibling)==null?void 0:ue.firstChild;ce&&ce.focus()},se=()=>{var ue;const ce=(ue=y.previousElementSibling)==null?void 0:ue.firstChild;ce&&ce.focus()};S(v),N==="ArrowDown"?(v.preventDefault(),$()):N==="ArrowUp"?(v.preventDefault(),se()):N==="Escape"?(o(),i!=null&&i.current&&i.current.focus()):(N==="Enter"||N===" "||I==="click")&&((_=T==null?void 0:T.onClick)==null||_.call(T,v),Y({...ru,text:T.text}))},m=(v,T)=>{const N=`${v.text}-${v.href||T}`;return v.type==="heading"?l.jsx(gi,{text:v.text},N):v.type==="button"?l.jsx(hi,{link:v,dropdownName:e,handleLinkEvent:b},N):l.jsx(vi,{link:v,dropdownName:e,handleLinkEvent:b},N)};return l.jsxs(nu,{ref:d,className:`${r}${g?" aligned-right":""}${u?" mega":""}`,breakpoint:s,children:[l.jsx("div",{id:w?a:"",className:A.DROPDOWN_CONTAINER,children:t==null?void 0:t.map((v,T)=>{const I=ua(`dropdown-item-${T}-`).next().value;return l.jsx("ul",{id:w?`${a}-${I}`:a,children:v.map((D,y)=>m(D,y))},I)})}),n&&l.jsx("div",{className:A.DROPDOWN_BUTTON_CONTAINER,children:l.jsx("div",{children:n.map((v,T)=>l.jsx(vt,{color:v.color,text:v.text,href:v.href,onClick:S},`${v.text}-${v.href||T}`))})})]})};yi.propTypes={dropdownName:f.string,items:f.arrayOf(f.shape({text:f.string,selected:f.bool,onClick:f.func,href:f.string})),buttons:f.arrayOf(f.shape(rn)),classes:f.string,listId:f.string,setItemOpened:f.func,parentLink:f.shape({focus:f.func,current:f.instanceOf(HTMLElement)})};const au=ge.li`
  position: relative;
  padding: 0;
  max-width: 100%;
  margin: 0 0.5rem 0 0;
  &:has(.${A.OPEN_LINK}) > a:after,
  &:hover > a:after {
    width: calc(100% + 24px);
  }
  > a {
    display: inline-block;
    padding: 0.5rem 0.75rem;
    line-height: 1rem;
    color: ${Le};
    &:after {
      transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      content: "";
      display: block;
      height: 0.5rem;
      position: relative;
      top: 0.6rem;
      right: 12px;
      width: 0;
      background-image: linear-gradient(
        to right,
        transparent 0.5%,
        ${_n} 0.5%
      );
    }
    &.${A.NAV_ITEM_SELECTED}:after {
      width: calc(100% + 24px);
    }
    &.nav-item {
      display: block;
    }
    > span {
      position: relative;
      .${A.CHEVRON_ICON} {
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
        margin-left: 0.5rem;
        font-size: 0.75rem;

        &.${A.OPEN} {
          transform: rotate(180deg);
        }
      }
    }
    .${A.MOBILE_ONLY} {
      display: none;
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    border-bottom: 1px solid ${fn};
    margin: 0;
    &:first-child {
      border-top: 1px solid ${fn};
    }
    &:hover > a:after {
      width: 100%;
    }
    .${A.ICON_NAV_ITEM} {
      display: none;
    }
    > a {
      padding: 1rem 2rem 0.75rem;
      width: 100%;
      &.${A.OPEN_LINK} {
        border-bottom: 1px solid ${fn};
      }
      &:after {
        right: 0;
        top: 0.8rem;
      }
      &.${A.NAV_ITEM_SELECTED}:after {
        width: 100%;
      }
      > span {
        display: flex;
        justify-content: space-between;
        .${A.CHEVRON_ICON} {
          font-size: 1.25rem;
        }
      }
      .${A.MOBILE_ONLY} {
        display: initial;
      }
    }
  }
`,ou={event:"collapse",type:"click"},jr={event:"link",action:"click",name:"onclick",type:"internal link",region:"navbar",section:"main navbar",text:""},bi=({children:e})=>l.jsxs(l.Fragment,{children:[l.jsx(Te,{icon:mc,className:A.ICON_NAV_ITEM,alt:""}),l.jsx("span",{className:A.MOBILE_ONLY,children:e})]});bi.propTypes={children:f.node};const wi=({link:e,setItemOpened:t,itemOpened:n})=>{const r=H.useRef(null),a=H.useRef(null),o=e.id===n,{breakpoint:i,expandOnHover:s,title:u}=ze(),d=Zt(i);H.useEffect(()=>{const b=v=>{var T;o&&!((T=r==null?void 0:r.current)!=null&&T.contains(v.target))&&t()},m=()=>{requestAnimationFrame(()=>{const v=r.current;o&&v&&!v.contains(document.activeElement)&&t()})};return document.addEventListener("click",b,!0),document.addEventListener("focusin",m),()=>{document.removeEventListener("click",b,!0),document.removeEventListener("focusin",m)}},[o]);const g=H.useMemo(()=>{var b;return e.type==="icon-home"?l.jsx(bi,{children:e.text}):l.jsxs("span",{children:[e.text,!!((b=e.items)!=null&&b.length)&&l.jsx(Te,{icon:Ga,className:Ue(A.CHEVRON_ICON,o&&A.OPEN),alt:""})]})},[e]),h=()=>{var T;const b=!!((T=e.items)!=null&&T.length),m=o?"close":"open",{text:v}=e;Y(b?{...jr,...ou,action:m,text:v}:{...jr,text:e.type==="icon-home"?"home button":v})},w=b=>{var T,N;if(!e.items&&e.href){Y({...jr,text:e.text});return}const{key:m}=b;if(["ArrowUp","ArrowDown","ArrowLeft","ArrowRight","Enter"," ","Escape","Click"].includes(m)){if(b.preventDefault(),m==="Escape"&&o){t();return}if((m==="Enter"||m===" ")&&(e.items&&(!s&&!d||d)&&t(),h(),(T=e.onClick)==null||T.call(e,b)),(m==="ArrowDown"||m==="ArrowRight")&&o){const I=document.querySelectorAll(`.${li(e.id)} li.${A.NAV_LINK} a`);I.length&&I[0].focus()}}else b.type==="click"&&e.items?(b.preventDefault(),h(),t()):b.type==="click"&&(h(),(N=e.onClick)==null||N.call(e,b))},S=()=>{s&&!d&&(t(),h())};return l.jsxs(au,{breakpoint:i,ref:r,onMouseEnter:S,onMouseLeave:S,children:[l.jsx("a",{onKeyDown:w,onClick:w,href:e.href,...e.items?{"aria-expanded":o}:{},...e.href?{}:{tabIndex:0},"aria-owns":e.items?`dropdown-${e.id}`:null,className:Ue(e.class,e.selected&&A.NAV_ITEM_SELECTED,o&&A.OPEN_LINK),"data-testid":"nav-item",title:e.type==="icon-home"&&u?`${u} home page`:e.text,ref:a,children:g}),e.items&&l.jsx(yi,{items:e.items,buttons:e.buttons,dropdownName:e.text,classes:Ue(li(e.id),o&&A.OPENED),listId:`dropdown-${e.id}`,setItemOpened:t,parentLink:a==null?void 0:a.current})]})};wi.propTypes={link:Hn,setItemOpened:f.func,itemOpened:f.number};const iu="Header buttons cannot have both an onClick and an href property as this breaks accessibility. Please remove one",xi=()=>{const{navTree:e,mobileNavTree:t,buttons:n,breakpoint:r}=ze(),a=Zt(r),[o,i]=H.useState(void 0),s=h=>{i(w=>o===h?void 0:h)},u=h=>{h.onClick&&h.href&&console.error(iu)},d=h=>()=>{Y({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:h.text}),h.onClick&&h.onClick()},g=(h,w)=>{const S={...h,id:w},m=ua(`${h.text}-${w}-`).next().value;return l.jsx(wi,{link:S,setItemOpened:()=>s(w),itemOpened:o},m)};return l.jsxs(tu,{breakpoint:r,"data-testid":"navigation","aria-label":"Site",children:[((e==null?void 0:e.length)||(t==null?void 0:t.length)||(n==null?void 0:n.length))&&l.jsxs("div",{className:A.CONTENT_CONTAINER,children:[((e==null?void 0:e.length)||(t==null?void 0:t.length))&&l.jsx("ul",{className:A.NAV_LIST,children:t!=null&&t.length&&a?t==null?void 0:t.map((h,w)=>g(h,w)):e==null?void 0:e.map((h,w)=>g(h,w))}),!!(n!=null&&n.length)&&l.jsx("form",{className:A.BUTTONS_CONTAINER,"data-testid":"buttons-container",children:n.map(h=>(u(h),H.createElement(vt,{...h,key:h.text,onClick:d(h)})))})]}),a&&l.jsx(Ai,{})]})},su="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOgAAABRCAYAAADYbOrFAAAgAElEQVR4Xu1dB3gU1fc9bzahSBNEkC5KkSIqIDYQUKkCihCyJaGDhSJVQJAOinQRUboku7MhYAEURBQEBUUQRaSqIEiXXkOy+/7febuz7G4SsgkB8fff+31+kp03b968mTv3vXvPPVcgLOEZCM/ALTsD4pYdWXhg4RkIzwDCChp+CcIzcAvPQFhBb+GHEx5aeAbCChp+B8IzcAvPwC2hoFLKnABuA3BOCJFyC89XeGjhGbipM3DTFHTu2hXVtx/e2+74udMP/nP+7N2HTp+489TFcznPX76kXbhyGZeuJCFfrttwW46c8rYcudx3FSh4sWj+gsfuyFvgjxKFCq+vWaLcvBY16+y/qbMTvlh4Bv7lGbhhCrp69eqIr0/t67n98N6O2w/9VX7XkQM53FJm+XZzRkSiWql7L1QqXuaXh0tXnNSjQcvFWe4sfGJ4Bv4jM5DtCjp51cLHNv6xa+L633+r9deJo6ZQ5kETAq82aIXJKxeF0ly1qVGm3OVa91RZ2ajiQ92fr1X3QMgn3tyGIjraVlMIUUxKbWdCwoLdxuXNZnNxTdNyBQ8nR44ch+bPn3/Z+D0qKipvZGRkkQoVKuwbPny4O7h9VGxs2UiXSz3H5OSIpMTEBYcA+L6EUVFRpsjIyPzGeefO5U1aunTmRf9+mjfvelu+fOfvSk5OPpaYmHiex2JjY4u4XK68Dodjr39/PBYV1f6uiIiUR91umWQyye8dDscpo78WHTvmy3v58p3JycmHExMTL/F3q9VaBoDJ/zdPP7GlIyJkdZdwnzl36tT65cuXJ93cx3PrXy3bFPTNz+Mbbtq7e+rnv268j8vVzEizBx5DwktvoFS/aJy8cC4zp6Jw3gKycdVaG58oX63zy/WbbcvUyTewcVRUVG5TRI7PAdTzXkZKIdonOOIX8G+zxfYdgMeDh+DWUHuh3c5jSsxW2wxIvCQ1NE+w25cFtzdbbFcARPr9vsel4flEu327UoKYmIoml9zpd5xKvvxi7pyWJXPnqsk2m2NaQMhPpZAxCQ6Hnb9ZLDHxEtJ25vTJXP6KY7bGvA4phwDIzXYCOOd2Izohwb6cf0dbrV2FFB8IiIa6Hv+lxWLrIYF3ILDclXzl+cTERI4XZrO1J4SYCCDCO7Z1Tt1eN/hjcAMf0X+i6+tW0EkrFpbb9NeujxZtXnv/lZSs+Xe+6DMODavURL+FH2DiFwuzNHG3584ro2rVXWmt2aR1/SpVlBX4N8VstnWEwBwBjHcJuUxI8fjRwwcnrFmzRk2SxRL7lFu47hASLwHiKUjYpCaTNSlX67r+D9u0b9/+9stJyVwd5BXAKl23N0hDQfk13OQWcqQGPAgp3gKw0Knbo/0VVEA4hXDHuaWwAIjh9ZxOuyMjBXWlXLnNsITGPQFyt4CY6obIJaSsr2myrWFFLZaYFyXk+1RQQBaVwIcC+CYl5cqzRj9RUVE5TBE5zgDYBSleEQKV3W7xXUJC3I5/85nditfOsoJKKcUr8VPnJG5a0+6fc2e0rN7cfcVKY/uouRBCYO8/h1F+UFu43KlWciF3X6V42STLo08NHNIsZkrIJ92AhmaztTeEmAQp3xVCjtZ1/WhalzGbY2ZDyE65ckbm9l/aeq2Mtw98BIGW0q1VS0iIC1glmC22JEgsczrtraOjY6sIzf0TINY79XhluaOj21YQmmuXdxwj3NBeFMBoAe1pXY/7OgQFzWcse81m2x4hUBRwl0/vfqKt1peFFO8JyKkS4hUAP7pSrjQy+uD1uAy+7VLSaQD7IEUnlytpXWJiousGPIb/fJdZUtDBn8wttX7Ptu9W79hSKrMz0LF2EzxUphwK3pYXhfLkR8W7SuGeO4v5utm0bxcOnzmJkxfO4tSF81j+60as/G1Tpi4TaYpAx9qNN5qffKFu/bJlffu5THVynY1p/ZKSkj+VwJMAXBJyqQbZxbCORvdmi20OgI7BCjp8+HBt5849u6DhrCvZ1MIU4doHYJ5Tt3f1H5pSUCCH329uARGj6/F6gIIG3s+SI4cPtjKs+bWWuCYNBex2+1mlyBabWwDrdM9SNE2xWGyvSGA67xmABumq4XQ6twQ3jrbGvCqkfNO7VD4oheyZ4HB8dJ3T/j93eqYV9PXFc9rHbVg568DJY8beIVOTUvz2O/DZq2PxYOlyGZ63aNM3iJ39Fi4nq21LpuWxe6uc7VS7ab3OdZumekEy3VkWT4iOjqkuNNmNSiiBiQm6vZ9/VxaLda6E6BCsoFartalbis8AbIAUayFkOwAFBNyl/ZXcbLFeFhB/SIGfIWEVQE9dt08zrnHVguIjqUmncKMMhHhLAlOMsURH2xoKDV9IIdr59shWmxMSURfO58lnOJXMFtsJARzRdXuV9KYj2hrTXUg5TQCvS+ANAH9HRmi14+LijgWfo5bwl5OjIDAWQK4jhw8WND4aWZzu/7nTMqWgfRPeGzJr7bJRZy8p51yWJW/O3Mop1LTaI+n2MXXVYvRxzsD1hGbY+d2F73K9VLdZq4HP2j7N8oCzcGLXrl0jz5y/+KI7OWk+cuYsoRw1UsxwOuO57POJ2WybB4H2wQpqttjodHmKL7i3Ma1kSQgx2OmI5wuthAoKKVa4XFcspogcv9OZe+F8nsqGUlmt1vJuKXZDylFOp2MoPapuKX4DxCZjGWy1Wgu6paD3N8Gp29t7l6A/A/jHqdt9D8mw9pCyj9PpmExHWEREjs45c0bOMpbnXufPVM8eFAUlpBMCW0wC9Q1LzHFHW60vCLdp/4ULubfnyXdhCSSecKVcKWA4kbIw5f+Tp4SsoB3nvv1B3IYvuya7suYICp49LkO/HTQVtcrel2piZ36zDC8umJxtE140f0HZu2GrbgOb2mZkW6cZdGQ2W4dAiFEAOGERgEzSBJ50OBwbAxTUYpsPoJ2/gnqt3k4JOSdBd3Rhe69jhQ6j5Pz58pSdOXNmskdBbZcg8YXTaX/ebLa9BIEZkHKs0+kYzOM+BQ0cr1sKaUtwOJw+Rfc4td4H5F5AFOLv0i0aJSTE/2S0sVgshSW0NQBoQbmnzkMHlv/1vEvXKYYXN9piGyqAEYD8+szpU03pETabzaWgmXZCKvQYQ0KCe2Sn09HjZj2f/8p1QlLQFz+cNH3W2mWvZMaaze3QH2XvvAvf/7EDzo2r8cuBPwLmJHeOnDg8KREFcvMZB8p3v29D7TdfDfjRpGmoW/EBRNWsi+plyqs+MxM3vSNPfjnoWVu7fo3bxN2Mh1OvXr2IosWLR2sS1d0QZ0xC6g6HY0/wtc3mmGehuaseOXRoorG8s1qttdxAfemK+Ng/dhptszUTUlYxCWG32+3Kslostr5uIfdy/6as9rmLvTTI5IoVy7/DuKmyjoBv3yqkdsLtTl6dkJAQ+ECUQym2kqa5GwHifEpK0qeJiYnHg8cbGxubJyXFzeX6Y2pvLcSXlSqUizditGZzbE1orqfhdic4nU7um4XFYrO5hbwNLtM6w1MbZbNVjnCjmZSygDSJDQl2O5fzWUey3IyH+i9cI0MFfTl+yqjZ33w2JLOWs3zRktg2cg5yRHi2qhv+2I5+C9/H+t9/U3/bHn0G8V0G+W6Zyk/AgiH3DW6PXUcOKO+uuVZ9jHmhI8oW9jiT9v1zBJXf6KjggZmRuwoUcvdv0qZ534bRjE+GJTwDt/wMXFNBX180K2byqsVxmVUE467fjuqK/o1VOE6JlBLTV3+K3vp7YOzzqUoPqd9nrf0Mo5fGY27H/ni6UnX127jlOt5enqD2qs9UrhEwka3fG4HFm9dmaXLLFy2RMrR5TKXYxxtzvxaW8Azc0jOQroIOXjy7TPz3q/b8deKoP0ol3ZvhsjP64Xr45cCfWLFto0IEFcl/O/aPd4I4Wn+hNX3knkrKAr4cNwVxG75Uh7mMHdo8FkOax+L4udM4f/kS7i1SPODcnYf3K+tJZS9zR1E0qvowyhctgTHL7Dh9MTR8QsMqNY4Pqv5s8fr162fPhvqWfsThwf2XZyBNBSUIoc5bPQ9+u2fb1QBlBnfJpeiK3m8pRFCK24WFP65RSjOgiRltH6dDL1DOXb6IHvZ3wUyWQnny+Q4eOXMSBC+Ma618I6mkh30adhzej8HNbKh/34Pq+OCP5mLsZwqhFrJ0frLpitnt+zcJ+YRww/AM/AszkKaCvhQ3+f33Vy95MbPjYYxz64jZuCOvB5tN6N+yrRvwQvU6me0qzfZU/E+3fIdWNRj798i63b+i/vg+mUYf0Uk1tmXnlr0btf4kWwYX7iQ8AzdgBlIpaH/nB/fO27B8N+F75YqUwO/HDmbqsjGPNUBc54GZOierjZNSklF5SAf8efxwyF3kisyBuwoUUo6mx++tcva716cVEkKEYWYhz2C44c2cgVQK2njSgN9WbNtYmYNY2fdt/Hn8ELrFvxOyhaIndtPQGXiodPlU90ELuPHPnfj5wO/49e+92H30b7Vv5H+XrlxB3ly5kT/XbUqBKhcvgyolyqg4aaVizFZKLVO+XIzezvdCni8upT/tMUp5lF9LnKnO692g9ZzJlm6dQ+4k3DA8AzdxBgIUtP/CmXWnfJm4xgiprOo3XnlV3/pcx6DFs0MeFh033I9S2BeXpYs3f4svtv2IUxcD08m436xcrIxCDB06/Q+2HdyLi0HhE4ZXnq32CKyPPo3H7lXfDpy9dBH3DozBP+eZFJGx8MNBzzE9whO+WIj+Cz9QJ5UrUjxlVuzrBW+FDJiM7yLc4v/bDAQoaIOJ/XZ9+dvmCsYkbB0xC/eXvEd5TJ8c1xvf7vk15PkhUIEKN2PNUhw8pbKnUKJgYQgIHDz9Dzo80RgDmppRoWjJgD6NfeuopfH4ef/vqFGmAn49+Kfaz1L4d/enn8PmfXvw7tehbx9ffaYVplg8KDt6jdvO9nxAKN2eej5uesyrbUO+uUw2ZHI2oHWTQjQSEKU9p8vfBMRMXY8nmidVgN5ms+V3u9FFQjaFEOUgEQGJg4D4WtPcMxwOx19pDSPaYp0lpEaf3fe6Hp/uV9VsNj8ERBAjDG9/m9O7LbPZGgto6QLkAbnC6bSnyrYn4H/H7t2tIBEtgPsBUZiuCUL/pBSJ7pQkezC0z2y2dQFE+hhQ4GOnM56ghv8X4lPQfos+eGTKisTvuQylRGgmnHtvGbhno6zavhkNJr6W6UlhqEUTmgq10PPa0/EunC8OwXMPPXHNvjgOxksTN32Dt1p3xstxU0En1P4Tx5SXODPCe/hzXDyKFbhDnbb5r92oOfJlXxflihRLWd5pRN7y5ctnDvkQwiDMZls080K9sLi0zoh36vZY/wNmc0wdCJkIMLUrLZFJkKKX02l/P/io2WLzKLuAw+mw29IbosLCSqFoY6SQbRIcDl4vTTFbbNwPpO1WV9cSE5yO+P7+J5N1wRSRzP5TJaVfbSe2nDl94jH/hHCLJUaXkOZ0p1bKN5xOx+gQpv5/oolPQaNmDF+d+OM3Rva/gtWteW2S7yZpRYv3bYN/zp0BGRDqVqym9olcOtK6bdy7Ewk/rgHjlBTGNEvcXhidn2yqlsg/vjEDTSYPxKBnrXipXvOQJo/XbPXecOTJmRtN76+FjvPGKyUftTQOpDcyluK1y98Pc616qHl3RUSYTCr7hWlrX23fgs+2fo8GVWr6lty8MPNNi/WJUrFWQ4Y2bzt0ZMsOxM5mm7SxWp/RpCDo3QOnEvhJSLlOClFISjQXCu4qWy10OFYbF7VYLFUAbYMEPLEngYuQWAuJJAgFryvibSsFhM1IKzPOvwkKuk2msvhifoIe73tZmjRpkrNAwULrIeFBnQBMV1sEgUNSyrsERCtPZg7a6bo93n/C/RVUAqmWbEJimtNpn5VtD+kW70gpaL3hwyN2n9126dDpE74UsqmWbuj5zAsBw5//3QpQGejdDZaPf/oWHea+jTOXLqgsFTqBCOVrNnUwhrWIReF8BTBw0Wws6TFa7TNdbhcevbcyqpYom6qvP44dwm+H9oGhEOaNPjamB/a8uQCv6tOx958jGNjUrGKfpQrdqcIsd+a7Hfaur6NBEOKIHf/6959qSd24aq2A63T5cBJmr726UmpU9eEDX/R527v8zJanJswWG3GNlTx6ht66bp9qLGfJx4OcMndifPwu/6tFW2wrBNDI+9sak4ZYA3dL7qA8eS5OgJCG+T964Xyee/w5hm60gl44nydPMKdR8GwZgHnv7xtdKVpUYmKcj5GRoHvAVFfX41MRv/kpqHTq9iwTAWTLE7wFOlEK2nX+hN4z137m+wLmz32bQgClBWRPa8zDPv3Qa9WkilESbNC65pNKmRJ//Ab7J+hoNGkAvt6xBaULFWEKmFLAE+fPIvaxBpjVvq9aAl9IuoxO8ycgYeNqhRIqVagIdhz+S7UjFrdl9dqoPKQjHF0Hgx+EgnnyKWwvFZ4We4qlG7o/9XxI00rFfWB4V7W/pvBjMC22x92dn3g2zb1dSJ36NbJarTXcUngyzSU+cjrttBrXFIvFUlRCY9oXX8zDrpQrVRMTE08GnUTw+UoJPKO6FvL5BIfDl0p3Kyio2WL9ERA1AZyHdN3vBc1ndPvqeFhBA6dJKWiLaYM3L9my3liO4PVnbUohMhK+3NxTGs4aKt/4Ni8qj++vI+egeJ8odKzTBG+26oyCPZ5DpMmEE+98gr9PepIk3vxcB1PLvuz7tvKuzli9BK/ET8Wolh0U+iiHKQL7ThxRFpTWkWGfh0e9gttvy4s5HfqhypCO+KTHSDSZPMi33B35fHu80TxgS5fubbR8dxg+2fKt7/iAppap41p37ZXRfYdy3Gy1doIUHieNkB2cDgfTyjJQ0JgGEnKlR6mvpowFnxQdbWsiNHgA/0KMcDrihxttbrSCKqULEqmhQYLd/r33Z64cuJePJA+SrseTA0mJ1Wp9UEoxPugVnK7r8T5vX9AeNPW13KJ2QkL8LxnN5f/KcaWg9w6wXv7j+GGyuytP684x88Gk6oykb8L7mLTyqm/hw04DMGfdcjxZoRqerFgNDSe+ppSPFpNcQxTSmxjAAjqQjp09rZSNVChGf7TgDKP4t2cfe8fZQWv91ucO/DP1Y7SZMQrVSt2jLO90P4/upOiX0bth64yGDy6lq7zREQQ8UFo8+PiuJT3HpE5QzbCn1A2MxGWla+kw8gWfZbHEtJKQHm+olK86nY530ro096kSmoebSIjJTkd8n5uooKmGJOCuo+u6+tKpZXjeCxfU0CCn6rrD98EjUZqE+yv/DqQQPRIc8e8av2XkJJJuUcM/RzULj+Y/dYpoO2tMtQUbVqkvEn3zS3qMUk6gjCQYJFA0f0H8PHwmSvaLxveD31VLT+4Zd4/9EGcvX/R5TZ9/qDY27t2hlIpgBu4P37F2U3tE7lHf+eojVCt5D7bs36OY5glUIC8RreapaZ+C++AOc8fjhyHTsfXAHxi/YiGW935LxUQNoeOKWTCta14jMuBtPH5Fgg+0UKZw0ZS/3naGlByQ0fxEW61mIYXiBYJEd6fTTp6ea4rXe6vSdATkJF139E3rhGirNUpIoegPJTAoQbf7YkY32oIKYIyU0vNF84l7rtPp9HETmy02Wr48EPjK6bCrpThFUYCmoA80mZf0LGr86SuohJQjgu/f5crxQWLi/CMZzeX/ynHx0oJJb76/ZqnC5nV76nm8a8s4qZ0J1fXG9QkId9AzW6/iAzB/MBpn3l2KccudCsB+dvpSHDh5XFmqKsXvxrZRjDj4PVop1fKUe1D9h69x+MwJ9GkYpX4j6wKlSK9WKuxzaNJClSnDJS0RQcT8MrH7r/E6npv2hoqbGkIrvHno+2k6tIKv33jSAHy53RMG1F9+vbrl4QbXzWFks9lKutygY4SrlB1HDh+sFsy3wzihPxm11/owaMzlywlXypUKwXtQnrNr155VEqjvUeSr1ot/32gFDclJ5Ofokm40NThzfYoaFVvaFOH27PWDPl7hPWjgp0W0mj7sy8Wb1z7DPeDnvcb6lILNiPr55Kfv8M2urQp0kDMyBx6+u4Jaxu4/GcgBxeXt36eOK8WkghKpQ8TO3xMSlPXjHvTReyth7YD02TCDk7aNoVZ8vR2KFiiozqUDiR+BhS8PVaiiUv3MWP3aRCT+uBbvrQ6kHaIlrn/fQ8oaU9mZutagcnW1QjDiu7wGoYaPj+2pHFKDnrUNeLNV57ez4wtsNtsWQ8DjChdYCberMy0N2d5NpsjegGjjitSiE+PiyN6uxGyOec/npVVhGbdN13VFPN22bds7riS7OIGe5YLAT/dVKP+wv5IbCiogEnPmjAhgAARw2eAO8o+DCqB9zpyRAZN34cKFcwYVpn8cNMIkikdERASQUp3UNJdBgs1hWSyW5hLaEu8tnfISmTHdSNGbWCyWZr7j11DQXDkjFfWKv1y4cCHFn8IzO57TrdyHeGJsj30nL5wrs/71d5QiUbYf+gtcwtq/X5UKdpfezVB5Fm1eq0IXF2Z8rvam3FPSsUMHz5PjemHv8SM4MMFHg6O6Yk7ox1u+VXteLk2Dl9cEJRTo1lylrQ1t0VbtQUcuWaCUtfQdRXD3a1a1nD1w8pgivg5FCuctgC5PPosezzzvAy9wX/zomO549oFHP5rfcUCGHtdQrqMQRML0gyL78ghfUIZV7gSgUBMSOC2kq4rT6aT3lo4UEnitB3B1LyzxOwToeCHAWSFHyOgOuGvrur7Vfyw+C5rGAEmiret2hTbxV9A070WKJ53O+HXqo5EBUEEAu3TdHrB3N8jQrvYtjkvIgwKiBCB5/0oE0E3X7T5AdUZ7UEBscerxPodmKM/hv9xGVB7S4Vy7xxvkpbOFFCMfbf4W6/b8qsIPDF08Ua6qilXS4hCB882utB1o3HdymfjGx/OUp3b7oX2o81Yv9G3UBhPavIh5365QQIMdo+epfE9DCBag5dt95CAeK1cZr9R/LoD6ZO3uraj/dh/88Va8cjZRiTbv262usfXvP9Q1aEG3HdwH5oqmJZZHnlIhG17rx727VFiGQqvKmG3jqg+rsM6nW9bjxIWzWxe9MvyB7HqoXOq63ZhnhEX8+1VlEyBeTdDj5/n/zrooV1LkbAGZDqJDbJVutE3Lm3mrKKhaJUTmGA4p+wNCOSDTkL8hRazTGU8iMiVhBQ2cJVGyX1Ty3yf/CeC45f6tx9MvoNtTLXwWhqc1f2cIlv2yIc2ZXtJzNE5dOId2c8Zhee830aByTeUwoqLTaia7XCjRtw0612mqQjEUIpAuXrnss9xc4p44f0YBDwxhf1Ssz3u9qWKnVd/opFgUCMYnaVifhBkKxjd33QqMXhYASvH1wQ8EPxSGkMCMziXnxq9TZek0vb/W/s97j0s7feY6tFZhXzWtIdxaGSmkhBA7NOlKTI+hnZfyhiWaALK8FCICbnnArWH1QoeDntA0CbaIm5WaljZThgvbDA8ogRJapPQhx4JvLYdJrDC4bKNttkchhQ+jnXoa3Gf8Y7H+x2NiYoq5XGjhhqymQdwpIU9L4E8N7m9TUlI2BDPK01EmNaRGr3g7FW6c+H+Fxc37clP3+aRL6oFSMbrWbYbeDVr5kq6NyQ4O7Ac/JCKPuDylN5UOoxmxvZRFY4x0cbfhKmmbMdMP13+hwjjExdIhRCcPwfR5cuZSe8Fnqz2Kj7uPVNab6WhUyEWvDGMIRCkjlZJA/A61G+Op8X3x+7FD2D9eVwTX8V7qlOCxEcP75zh7KuoVwhIZiyX7g0GO/UT5qv98N2iabwl2HToZPjU8A9c9A2LG158kRZhMObjsfLjsfQEvMfdlTBH768QxrN39i8qjTE+IIKIiMd5Jq3hgQgLW/75NLUEZQqFVNSwggfIfdxuhwjrcO/Z0TFcZK82qPYZxUV3UGIiXfXpCPxUzZfyTXl1aZPIUHZm8SHmQi/WOQrsnGmF2+75qL/rXiTTLn6ghR9eqj3sKF1M5pk3ufySAZoXOMIaF+KG4LWeu3bGPNax43TMb7iA8A9kwA0JKN/O4Aup40uv55me6Ys4LlQuXjpejUxbjVS+yiE6cJ8pXVYpz8NRx3x6SFpNhmoFNLQphlJZwWczslQ++WYphLdpi+HPt4PjhK9hmjlWWlCEWMgF2/XASEl8equKp5QaFhh7i9eiQ4kqhb6MolSETJL8IoXnIjsISnoF/eQaooMx4zk+lWLPrF0xd9RGW/Lzeh1HNzPjIpEAr1mr6cEW3SdpN7iEXrF+J92Jexcv1WwQkf7d/ojG4NOae1xCyAZJVnnVZKBuHvIeHy1aEdeYYFSedZuuh8LYE4TNT5fjUjxTelxDBzAodX9wTd3vqOX/H1XdCaLUz21e4fXgGbsQMiEYTX7t0KTkp19a///TRVnLp+dyDT6BD7UYqQZqZI9w7ZiQLOg/E/SXK4qERL/qwswQr8HwqFZWLTiY6mwwpeFs+vFCjDu4uXBR/HDusrDYZ/wy5OONzBWRnnwQiGLhdLncJByQQgnvbaV99nNHw1PUbVamJb/dsw7SvPlHxUUPo5WXyeKlCRfbO7zTgngw7y3wDEW2J6S2EO1K6tBWh4EmjYmLKaS5p1SCqSiHzwo2jQojlKSlJi/2dK1ar9R63G804JCldnwWzxlssltpSChWauHAh7+yA7BeWfIDMK4S23x8TGxUVVcBkimTBpnTFgCIyvSx/wYKqrSZFkq7bPww+iYkAbiGe87SR2w1ooAddRDb79EQcdTrtCcZRxoKTUlJ8YTBNiovBKWts28ZqbSQAn7PPBKz2Z/Y3m2MfAVzpJoZLKXYmJNg9uGjFuh99L0ymp32j9GPJN36zWCx13UKo7VGlChVmMz7tjXmrxPhriaZhrcPhYD2cABEl+7a58vep4z54G/eLo1/ooBTTkAeGdQEVOCMhBpZ7PXprmZa2buAUVZCX8clOdZqqveKaXT+j/tseBBvjnmktoYka4h6T/0+a+YzToLYAABqGSURBVIVqV2lIB5Vryj7Zd6EezyvvLz24lg/GKI9sRvJi3eZ4v60HGsoVw0c/rcOQj+f5clj5e/1KDx1Y3X9Sdqadqev5VStj8G+502Fvmt54+VAjInKMlgAroaVRRU5uijBpLeLj4xVbmtlsawkBVbpPQLQOTuOyWKwTJYTC6xJoYJynzrXYGH8tFgzLS6emS8CQvelgyptsttgY71U5fWnhZc1m6zAIoUD9/tjkaKvVJqRI2/3ueVKbnLrjYePC0dExDwhNBrzI0m2q6F8igyUwzp67wLm5un+Rsq3T6fCV/bBYbCMkMDTddyYo4T0Auulxof969PDB6v7oMF9xKeYcp1zJSbYIb6X1qxYnvQt6C1KlUlDrB6P2n7hwrhTrdFofeUoRShtCRj+GJKLfHxUSadiGwdOUN5QK2OPplnjH2l3tE7lfNFjmudzlspfghc96jVWKT8vIlDJaMaKN8ufKo7zBzC0lEokAfkL5uPSe3+k1tHu8Eeq93Uc5dojPZf+hkIexHAWX1MT3GtSgBpXn0p+/V7jg+4qV/PpdW6+rX8qMtD7E495qZY29zaWAu7KBEAruItpimy4A/ypohwgGcAMPCeB2vhwmIZ93OBzqq3lLKKh/9k7qQkjCbInZA8h7IbDflXzlHmMFkC0KCgxL0O0jjXk06p0GzGs2K6j6dAjRK8FxdW+VloK2b98+1+WkZB9SjInqXignu7iKKZYYmlYiupDSNQ0Q3f1vhsH8AYtmYvXOVBY33deRYRSGU2jNPv5pHbaOnK0cMKX7WXDhyiXlJCpZ8E4F0yNcj5hfYn/Tk+ffHarIxma266NQP9yTRs0YqdLSuMylslJpqXA8XnVop5DpN2mZYx9vAKamcUyBIroI4U0TC1H5MmrmtUaE611NQBaY7nTYA+ad/bSxWutrUhjLgUsSoluCHs9UNekphKR1dyUnTfaHu91wBfWktKUCrvvHYllUKTnFTWtMUuSTZ06fLG5QmZjNtqchsIr3x7qhum5n4V4l/gqqCfmsw+EgA4W/BMR7gywo8aZFgpFMZk9tU9YcUcdVZ9dQUJdJlE+Mjw8uJhV4Xf/kB+/oCDRJSTFVSkxcoLhp01LQ4HfDH2GVVlX14PZCStkdkAqCwzAI2eBZOcxIZM7o5eNxInx+GuYpjMT9JZe6vRq0UmUd3l+zVHEKDWhiUUilasM6K1TS3nGOgFBH8HUMUDwtO8mwmUtaf3xfhWQitK/Nw/WUJWY+55ZhMxVu+ImxPX2pY6GMm3vbrk82Q7/GUX6KKp4UQiiIW3aJ2WydBsGPoDguIH/xoorO58oZWWr+/PlXeVc81tCH3w3O9EhvPDdJQX05p+mP4yqO2J/nyGy12b3ZK1e8BYh98bA0FPSaha0CFJTlEiWIehHGslrVNr2cdESVNpTyXc+8h6Sg16zVE5Sd9JGBsfbPeb0hCjpmWXzH1Tt/nrP/xFEFDDCE6WPk8iGKh7HQ9ITVy9YNnKqgclQ+7l1ZQXvZ1u+Vhatb4QF81X8C3NKtlr5kBqQziUwKGQmZ98jAZySQM2ZaY+TLSHG5sHXkLMX4UH3ES6oGzDcDJuODNUvRPR24n3EtVlVjqtvK33704YxpUQl1LJQnn+z0aKOSltoNFS42O8RbDJcTm5/kWnDL9cZ+UUL09efy8X6FuewhWdgFb0HbDBnS/BXUW480GGXEMJqy3lncgx6AVJk5PhEC63TdfrU8nQckX01C82BBvfts5WyKzHHIWwtUd+p2lWZmiL+CCmC7lDjlf1xqYqZR9Zu/ByqoHMiEA8V95CUus1hs7STAFccpAdFRQnq8h9ewoBLYLCQu+1/Xrck3/Lmi/BWULBaaFK8aGUVGxs4NUdDmE4YXXr7z2+MGUx5f+tefteLVBq0UYMCIN6b3shrWstk7gxUpNRWH8sCwrkqRfhkxU+0tDZC79ZGnFX9QKEJvLr23e48fxpd9x6tqaAyt0Eobis/c0jpv9sKQ5jYMa9FOhXjo/ElPfh05W2GLj549hWGffIjZ6z7z7a/LFy15ac+bcVdjPqEMMoM2ZrO1N4RQdDLSrVU+evTAnruKleDLzro3f7lSrtzr75FVBXmBXAB+cer2kOKxQQp6zRFlUUHT6nOJU7crr6y/mM22jRCgU8dt0lDG7UYLCXhyYf0A+GkpaFoXkcCQBN0+xtfe30kkqKCaCVLy+CFXypXSpojI5YDg13+WJuQnbik8xFOZ3IMGMx0GK6hbiD0mN7gHjITE77lyRd5/OSmZ96moSAwnURrzoyqq8/eQlrhsWGlIuzOHTp3IT+sy/Lm2PiwsrefUVR9jTDoYVzpbNgx+FzNWf6osF5FELavXgZFfyZQwFtwlMKHuuN6KMZ4KwtBKqEKLy3OL314Yv4yYpZbFBoSQtCy0rlT+scvsWDtwimJsYHoaHUxpyUfdRigs7205PPhtAucHLZ6jVgnPVK7+0/Le4wJrHYY60DTaMXdz5849uyBQjjmhmpAKTeGG6O/dI9Hr2tI/vGG22Oh9vItZLgm6nelWGRa1DVBQLus0BHDcSinMBhFZFhV0ByR2BNyiJjc6HY5xwbdtscR0lpCer7SQA6UUUQKoQeuo6/aqwfcT4CSS+M5budvXrRDC4e+VDragGvCRW4rdHiWEGQL0CJND+BlNkzlDUVAJfCEkAl4YIdwTdF33Ac+DFZTYY7M55i0IOcBzr2IopLz7hiioy+UaqGnCt3Fnrmcf5wzl7LkWkoiInjoV7leOIEIFf3zjPUXm9cL0YcpTStYDCnmESIM5r2N/EJyQWYmZ9aZKfXutiVlVPeN+s2TfaBWK2fe2AwVy50WpftG4587iagwDFs3C28sD09r8r0ncb8+nX1AUnvy3IUfPnW5xV/5CSzM7vvTaB+VFptdsjVO3q+RrSrQl5jNBsmqPQyU2rRhfcEe3yh6U44qKisprishBpwmdRUw+J1l1uqwS17cHlQP5kTBbYn4BZDUuawEUpJK7Uq6UiIyMbBSKgnqdRCHvQQ2iNq9jjMyNjLdeAsRGQCoaj2y1oFLKMoD883LyFY1g9DGf2dU+LSO59P5yFX8kBcmI59qpfE1DmQzyLuJbCSqgHJuyOCBTJaP+jeNEEBFJxI8A09Uoiu9o+2ZMj+mpUtSMWOiusR+q5HIj1nqta3DpPTH6JbSu8SRxwccBUUIIEUTnEeooU7czW6wrvcuta3Yi3eJBA7hgscS0kZAqME8rqkFYdD1+hfflz22KzDEebm2+0xnnYQy8GWGWIGKyjGbEbLXNgMRLfu3OmzSUsNvt5McNkOxQ0GiLbagArnqZvWGegNhzxl7cTCuo+qBarc8JKVKVOMhWBVUP+YMRBz/7ZWNxA8VDT2tTgsrz5g/gjzVml/VSCBJg8jSXmAaUj/SaK3/b5PubcU4CHShUaH8mg4wetHGc+05C+5htQyWnGB+CIc1iFAsg46BMMv+q3wTlsHpweFecTwpI/FfWkmyBvx3cB+aZGsJwUHStemsmm7v7LFmoY0uvXXR0bCWhufl1FWQ30PX4q/luqR/sXKdu7+Tti6x49GT6lhp0YmiQv0mIp7zJ31cg5CtOh0Pxx9xwC+ohnk5VBMctZMeFDocKn/hLKjCBwPtOh/0qlb9f48A4KD+SMpVlcKVcqZGYmKioIIOXuLSgASRqfjQwoSooKU69zjXfyBhC0XV7FeOHtJa4vmOWmCXBubvZrqAd542bPXfdCvWS0Bkzs20fRRHCLJK8rzzrq41CVI/lkacxzdZd7SUNEq9+jdqoPE8Ddmf8TSUh6of9kCOIlbgzK1yuctnK5bRBmcLE7R/+3OHzCBtABsZbuQ8lK0SXDyeq0I8hj5ergu8GeYjy+BEhiILYYUIb32gR22bkcx3SLX+Q2TH7U5dINxr5w8bYV7169SLuKlaCvDzFAZkkIMsYuaHK83sxab6PLiX1xY9Aupo6nU7FnXQTFDTt25fiOacz3qA2CWjjx40LSFd1Y6yplDlDJBGXi5HFDKKwtBRUzYHFxlQromwO3Fex/N2E2WVCQVPdn1dBPYVuPR9UHwlcMBcxc2tNEW5eP4/RPtsVtNe8ybev2PPT8djHG0YwZsl8TAIWlv6yAZ9s+Q6F8+ZHnQrVVJl7lnwwhDmdzFgpXaioYvD7Ye8OxWNLJfn9zTj18reZMVLVWCFTPYEFmRHGY+8f2lnFaJljylxT7pHLvmZVGN2DExcqKCBLOXAPyoJP/kKy7I9++hY//bUbJs2E5x56XN0Dl7cE5vfSp7O/f74ZMCU7c0CFxWKdIKWWF5q8fF+F8r39eYOM8VksthgWM+ffQrjiDHzq1eOWulKarIB8CEIUgpRHpMBKk5DTHA6HLxxhs9nuT3F7vIca3PNS0aCYY1pIIdXq4FLunEP9+YPM1pjhUsoCEHJ3gsMxw+/ahd3QBl/rWWlwz9Z1/eoX0K+xotiUsqEQ8qSu29PleIqOjqkOzeM8S0/8x8wE8JQUvOqds+W6rqusCosl5nkp8agQ+EnX4xXjoZdFsIOn35QE/4+ExRLT2A2ZLgZYAy77h5HUh0FAcfy6THJBot0ekHtpNttae8m61dVcrqTBwcnohqJDeopDHT18sH8wkVzwHARk3ksp+wJyAp0vpMCcvDJROYlYFYzVwdKTzvMnYs66z1WpB3qCDUJowym05+jfqDasiwI/0BNL8EGown7ZP2uEktaTcVfjelzacolrLLNZOJgFhNMTpqsxbY3ZM9NtPf3aigZCiFRLtVDHGG4XnoEbNQPBCppn/R+/HRi8eE5BgtoNMWB86Q2CAAdWumaxJLIlHD5zUtFsMqbKvwlqN5SIy+dVfccry5qRMMxz3+D2OHXxPL7uPwH1Kj6oijQ9NqY7yt5ZDNtGzlEe3QqD2qnaL6zfQtBBWsKPQ6n+Zl8pRLZh+lvPp1tuqVT87v83JFQZzXn4+K01A6m0pM2M4frCH79R5d9o6bisrH/ftePl3M8RO0uGPsOqkTyMHEEGaJ7s7XQWEe5Hik46azISI5eUbXkOrfmjY7qppTc5kJo/8JjyIHMfzLITLNDrT0gW3D/3wfQIkzqF4Hx+JLrXf77rtJie/2+qZWU05+Hjt9YMpFLQGh90jTy379KpuwvflYfAA7K7cx9HHipaMH8h6deELxIw/NMFvtoo9JQyFFIoT35l/bhHZWySrAdGjVFC83aMnn9NLC6B+qQ8uT13XmWFeY5Ru4VMfIQTGtbUiNXSacXlOGGEwRaafEXMZmG2DmlU6G0uW/iunV/2m3A1fefWejbh0YRnQLGep5IZX3/SqEvdZkuupCTnaDtnnMokodOHBZGIwCFBNYm23l+zDNxfGkLnEb2nTAdjWtjcb5ej07wJimB6/eseSkxmpLA/Uo580LZ3mo+Alo57VuZ/GlkvLHXPpezpS+fVB4DWnXxHRBrx37TMhrBOaJcnmyp6FKKXDPIx7q3pXfaAHc4fm/zlx4+Pbtk+OIsh216L6Gjbw9IkmV5kiMsk5TFN0w6kFRMkj64QQiWLR0REbImLi0sbDpXGCJmA7NZc+SKAPelV37ZYLPe5hPCVND926NCaYCdFG5vtCUiZW7jEmYQEe/og7GybpXBH15qBdDeCR8+efi3qvWHjjHghnTMP330f/jh+SJUXTEsIVGBxXWJ4SUXCcvd39npBLX0Z3mCYg/0Rusf+WOKQoPxgoceXnl/uYQ9NSlQfheBQC1ngWYqQXEgsS0jMcFpCy8t6pgzJkIiM0r52Yzmvw2uNhBBf3sjXw2yxkYA6rUI3LkgsE8L9oj/tpsVi6yuBCRxTZooEKc+mS+5TpNZB9VD87y+AtV4BIdIC68f8rvI2gQ1O3X6N6tg3cubCfRszkK6CEkf6Vc6Tf6/b82sxelCX9BylvLBV3ujkW84GTyO5ahlbZBiEHtcHSt2r9p0EKxi4WVqx215qqvogaJ7g+WCh1aX1NUoO8njTKYNUESUjVGMoMfNDG1ap4SuAFNwXY7nbR81TpNuMldLx1LFOo5VzOwy8Bs1G9rwg11BQdQEBrNV1u6/CU1YV1Gy1jYKEj0dGwP1AcKiF1wtWUFbv1iAr+1tcsyWsoNnz9LOnl2u6Usd9Hl/y8183bbd3eT0fi+UO+2S+QusYmS/+QzC4Z0l3QgcMCx2R+5ZWTtU8aWrF2FYesAyLIVFRCLNjoaRgMQjBzLWegv6iJxRHq0vraziduEclLy6Z76no5QbGpjkuWt+hLWIVcfWWv37HuBX6vkUvjygnhMgwjet6p9hPQfc4dXsFfvR2795d0y0FoXwEVsOkoZRRQTsrCqrKzd9eiIAHpqgpkZCzE3SHB77lJ6kU1HNskVO3+x5CWEGv96ln7/kZxjqklMVdbtd3LaYNufvzraSdSVtmteuDB0uXU8B45oSS4Y+KSgABraWRZM0sExZSojUm2J77xGBh2cJ3Vn0UALjvpb+HqasW49F7KoPUKvQKkxeXbA3kyR368XxfIeG0RsiQynsxr/4AiKeFECHv7a5nuoMV1OgrQFH8UDZZUVC//EdmvbCILpfUl7yJ0QSr+yRIQfkwVcDcvwJZWEGv54ln/7kZKigv+e5Xnz459rO41YdOn9CY7kWe2tcSZ/rY2LkUZYjjhenDFcOBsXQ1aoj67yWZlUIcLblpqVj+2STG7dFrTA8u0UwsG0FLzGwYKj+9s4x/0iFFwi+mwjHlbGBTs8LfGsWByTn0RvMYBbggT1L5oiUvv9bQUr5L/aZXvVrZP5+BFuvqHvSAJmRLpQxSu1dCMs2HWR5uAXdRXdeVImVFQQ1InQBWu4Qcq0nvvlqIwU5H/Nh0FVRqD0O4mTibCxB/5MoZUZWVz8IKeoNfikx2H5KCss/+C2fWXbRp9UrnS2/kYJ1PelBJW0lFICUJq1Wzghk9qr+NmqssHJedDLPQecRsF4pBXH0t2B+tK724zNVkfioTsSkGEJ90J7TItNCEGbqkW8EM9584psZAZ1CT+2upWClpPgctmnOhZc0nqr/5QldP3uBNkoz3oMKu6/G+ysOZVVBFpwlNZadLIWMSHA6Hj5wLOJQ/X567Z86c6cvO8beguXJGFkxKSu5tMNsJYKSu24eFFfQmvRwhXiZkBWV/m/74o3SNe8p++vy7Qx8koRfF+eIQRD1cD7VGvaIcMQbrnkG3SevJnE2iiQzKTVYV+/2tOAUuSE8MJnlabJ7PeCwTv6ngxN5uGT5TVeI2cj8JMSTUcNDi2Yocm+L9CHw6c9VX7V5s0CBVNkaIc5TlZukoaAokDkDAmStn5EijXmdWLKjFErNQQkYxLe3i+TwlyHcbbbENFsBo9icgrLoe75mMICcRFfTo0aOXCtxecCugCiORL+gBCdOysBc3y48820/MlILy6h98+WWBuE1Lf/h2z68VGW/cOGQ65n23QsU7SR5GS8ZKZvcMsClakcHNYjC6pQevbORwGnHSa90NrWCF19uqJatB2cn2zPOkopOpgYwNDPmUHWBTFpuhHFr3sgOsCh7YuGqtDR1KVK/Tpk2bG+4QSute/PegmpBqv1ehQoUzaQHnM6ugUVFtS5giXKRz9HEapx5DIKdssAUlYVl0tK2h0KBYyQWwSkKUDStotutZljvMtIIaV2o/Z9zsh0rfG9PzmRdyGqTS5MGll9UoC8h4KK0fwQLGHpLnEzBP65eRGHtY7kH3vu2pTmbQbdKKEjjBvehLC6aoOi4GZrib/Z3z5y9fGr2g86BUlBwZXTM7j/sp6E6nbs8QsZSZJa7ZYuP+MoC0K82xS+1RpzNOeffSUlDPh8Fjib3nqyrY4Thodr4JWe8rywrKS9LDu/3w3neqDOnUigpDUEGRfLerfSFjoR1rN8GcDiRHh688oD8VSkbDZjrYXb1bKy+wwQRIWB85h0iqbaCRDPADl8Gnp306U9NMrwkhbvqSNvh+rkdBAayDDEyS1jTZlmlmXrZyEo8VpoNHE24PZYWhYVJU9TLb8Rcfk156CuoFOpBzyB/1FAYqZPSC3oTj16Wgxvheips8bOfh/X1X95+YjyzxZOKjrOo3Hk9Xqq7oLYv0ekHRqIx9oRMGPRvAvHjN23xmQn98teMnX9FeNmatF9Z8oWU+PClR9V9r9Ctna5Sp0HtB50FzfR12rl8DUjDscBSmM59g5uZsozMJ5dlcp4KmuoRB+OVPzBVMBO09iawMuwAwOz7FpKEsY63pKSjPibbE9BGQE/0uGlbQUB7yDW6TLQrqtabsq9ncdZ9N7DR/oqJNYGEjWjXWFX18bA91KwzHNKxSM+Tb6r/wA0z4YqHK4Tw1bYlyEBnEZOzk6JRFPxTJV+h1IXxs7J6+O9XvCDcKQ5P7Ae0Q3LIG8uZ6D9OWJ4V88etsaLbapgqJyoA8oOsOlVB9LSEfESDTzWhPSbnSMjEx8aTZGjNJSHk/+zKZRFv/WitG/9GWmA4apPoSSonZLEBkNlt7CiGa8zdvX+eN9mR4KFasZBwgFcmXFNjudNhVYnRY/r0ZyDYF9d3C8OFah9K5u/9+9O8eq1+bXMikaYVYsaz1ex5Op+2j56rk61CFgAUCFyhn3l2qFHX1zp+Pjlq64HCpgkXfWtBlkK/yla/PrjUikZJ/OFkCAG0v3O7myI0RuKw1wNyvMy6DFurgwu3CM3CDZyD7FdRvwFJKks/WX/bzd+Y3PpnXesfhA3mIAmLqWahCkDzDJpWK3X3yy35vv3tbjlz0OH4vhPAg39OSrnWKITmiOTRxCZCPQcqjmLtmBDrUa415axaFeu1wu/AM/NszcEMVNPjmlm7aVLjaPaUqli5YpCzgvg8AeYBuB0RelYmhuEUll13nAI1OkN0b/9r5dxGZa0vZsmUz5gH1v2DH+mMAuR3StAXCbYaQCyBQErPXrPm3Jz18/fAMhDoDN1VBQx1UtrSjg8iN5wDxLeAurvqcu4Y1O8ISnoH/zAz87yooH0FUlAl5jpdHjojDmLnqXw+7/GfeivBAb5kZ+N9W0FtmmsMDCc9A1mYgrKBZm7fwWeEZuCkzEFbQmzLN4YuEZyBrMxBW0KzNW/is8AzclBn4P9JgzgVBEQh0AAAAAElFTkSuQmCC",cu=ge.div`
  margin: 0.5rem 0;
  a {
    display: inline-block;
    &:not(:last-child) {
      border-right: 1px solid ${Pe};
      margin-right: 1.5rem;
      padding-right: 1.5rem;
    }
    img {
      height: 52px;
      width: auto;
      &.${A.LOGO_VERT} {
        display: initial;
      }
      &.${A.LOGO_HORIZ} {
        display: none;
      }
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    margin: 0.5rem 0 1rem 1rem;
    a {
      &:not(:last-child) {
        margin-right: 1rem;
        padding-right: 1rem;
      }
      img {
        height: 32px;
        width: auto;
        &.${A.LOGO_VERT} {
          display: none;
        }
        &.${A.LOGO_HORIZ} {
          height: 24px;
          width: auto;
          display: initial;
        }
      }
    }
  }
  @media (max-width: 370px) {
    margin: 0.5rem 0 1rem 0.5rem;
    a {
      &:not(:last-child) {
        margin-right: 0.5rem;
        padding-right: 0.5rem;
      }
      img {
        height: 29px;
        &.${A.LOGO_HORIZ} {
          height: 21px;
        }
      }
    }
  }
`,lu=()=>{const{partnerLogo:e,logo:t,breakpoint:n}=ze();return l.jsxs(cu,{breakpoint:n,"data-testid":"partner",children:[l.jsx("a",{href:(e==null?void 0:e.brandLink)??"https://starbucks.asu.edu/",onClick:()=>Y({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:"partner logo"}),children:l.jsx("img",{src:(e==null?void 0:e.src)??su,alt:(e==null?void 0:e.alt)??"ASU Starbucks logo",width:"232",height:"81",decoding:"async",fetchpriority:"high"})}),l.jsxs("a",{href:(t==null?void 0:t.brandLink)??"https://asu.edu",onClick:()=>Y({text:"asu logo"}),children:[l.jsx("img",{className:A.LOGO_VERT,src:(t==null?void 0:t.src)??mi,alt:(t==null?void 0:t.alt)??"Arizona State University logo",width:"303",height:"234",decoding:"async",fetchpriority:"high"}),l.jsx("img",{className:A.LOGO_HORIZ,src:(t==null?void 0:t.mobileSrc)??pi,alt:(t==null?void 0:t.alt)??"Arizona State University logo",width:"400",height:"72",decoding:"async",fetchpriority:"high"})]})]})},fu=(e,t)=>{const n=new Date(e);return n.setMinutes(n.getMinutes()+t),n},uu=e=>{const t="localhost",n="title_loaded",r=new Date,a=e||window.location.hostname,o=localStorage.getItem("title_loaded"),i=r.getTime()>parseInt(o,10),s=a===t,u=document.referrer.includes(a);if(s||!u&&(!o||i)){const g=fu(r,10).getTime();return localStorage.setItem(n,g.toString()),!0}return!1},du={"992px":"993px","1260px":"1261px"},Ci=ge.div`
  line-height: 1;
  font-size: 1rem;
  font-weight: 700;
  padding: 0 2rem 1.5rem 2rem;
  letter-spacing: -1px;
  display: inline-block;
  margin: 0;
  width: max-content;

  &.active {
    background-position: -200%;
  }

  > .${A.UNIT_NAME} {
    display: none;
  }
  .${A.UNIT_NAME},
    .${A.SUBUNIT_NAME},
    .${A.TITLE_SUBUNIT_NAME} {
    color: ${Le};
  }

  .${A.SUBUNIT_NAME}, .${A.TITLE_SUBUNIT_NAME} {
    background-image: linear-gradient(
      to right,
      transparent 51%,
      ${_n} 51%,
      95%,
      transparent
    );
    background-position: 0 0;
    background-size: 200%;
    display: inline-block;
    transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
    transition-duration: 1.5s;
    &.active {
      background-position: -200%;
    }
  }

  @media (min-width: ${({breakpoint:e})=>du[e]}) {
    line-height: 1;
    font-weight: 700;
    padding: 0;
    margin: 1rem 0 0.5rem 0;
    > .${A.UNIT_NAME} {
      font-size: 1rem;
      margin-bottom: 0.5rem;
      display: block;

      :hover {
        text-decoration: underline;
      }
    }
    .${A.SUBUNIT_NAME} {
      font-size: 1.5rem;
      margin-bottom: 0;
      display: inline-block;

      :hover {
        text-decoration: underline;
      }
    }
    .${A.TITLE_SUBUNIT_NAME} {
      font-size: 2rem;
      font-weight: 700;
      display: inline-block;
      margin: 0.5rem 0 0.5rem 0;

      :hover {
        text-decoration: underline;
      }
    }
  }
`,Ei=()=>{const[e,t]=H.useState(!1),{title:n,parentOrg:r,parentOrgUrl:a,baseUrl:o,breakpoint:i,animateTitle:s}=ze();return H.useEffect(()=>{if(s!==!1){let u=o==="/"?window.location.hostname:o;!u.includes(window.location.hostname)&&u.indexOf("/")===0&&(u=window.location.hostname+u),uu(u)&&t(!0)}},[e,s,o]),r?l.jsxs(Ci,{breakpoint:i,className:A.TITLE,"data-testid":"title",children:[l.jsx("a",{className:A.UNIT_NAME,href:a,onClick:()=>Y({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:r}),title:`${r} home page`,children:r}),l.jsx("a",{className:Ue(A.SUBUNIT_NAME,e&&"active"),href:o,onClick:()=>Y({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:n}),title:`${n} home page`,children:n})]}):l.jsx(Ci,{breakpoint:i,className:A.TITLE,"data-testid":"title",children:l.jsx("a",{className:Ue(A.TITLE_SUBUNIT_NAME,e&&"active"),href:o,onClick:()=>Y({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:n}),title:`${n} home page`,children:n})})};Ei.propTypes={...tn};const Au=()=>{const{breakpoint:e,isPartner:t,hasNavigation:n}=ze(),[r,a]=H.useState(!1),o=Zt(e),i=()=>{a(u=>!u)},s=()=>{i(),Y({event:"collapse",action:r?"close":"open",type:"click",text:"menu button tablet"})};return l.jsxs(l.Fragment,{children:[!o&&l.jsx(Ai,{}),l.jsx(_f,{breakpoint:e,children:l.jsx("div",{className:"container-xl",children:l.jsx("div",{className:A.HEADER_MAIN,children:l.jsxs("div",{className:Ue(A.NAVBAR,A.NAVBAR_EXPAND_XL,t&&A.PARTNER),children:[!t&&l.jsx(eu,{}),l.jsxs("button",{className:Ue(A.NAVBAR_TOGGLER,!r&&A.COLLAPSED),type:"button",onClick:s,"aria-label":r?"Close menu":"Open menu","aria-expanded":r,children:[l.jsx("img",{src:Yf,alt:"Menu and Search Icon",className:A.MENU_SEARCH_ICON}),l.jsx(Te,{icon:pc,alt:"",className:A.MENU_CLOSE_ICON})]}),l.jsxs("div",{className:Ue(!t&&A.EXPAND_TITLE,!n&&A.NO_NAVIGATION),children:[t?l.jsx(lu,{}):l.jsx(Ei,{}),!o&&l.jsx(xi,{})]}),r&&o&&l.jsx(di,{}),r&&o&&l.jsx(xi,{})]})})})})]})},mu=(e,t)=>e==null?void 0:e.findIndex(n=>{var r;return(n==null?void 0:n.href)===t||Array.isArray(n.items)&&((r=n.items)==null?void 0:r.flat().find(({href:a})=>a===t))}),pu=e=>e==null?void 0:e.find(t=>t.selected),Oi=e=>{if(!Array.isArray(e)||e.length===0||pu(e))return e;let t="";if(window!=null&&window.location&&(t=window.location.pathname+window.location.search),!t)return e;const n=mu(e,t);if(n===-1)return e;const r=[...e];return r[n].selected=!0,r},Ni={Lg:"992px",Xl:"1260px"},gu=ge.header`
  font-family:
    Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans, sans-serif;
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  .container-xl {
    height: 100%;
    max-width: 1224px;
    margin-right: auto;
    margin-left: auto;
    width: 100%;
  }
  button,
  a {
    text-decoration: none;
    &:focus {
      outline: none !important;
      box-shadow:
        0px 0px 0px 2px ${Ze},
        0px 0px 0px 4px ${Le} !important;
    }
  }
  @media (min-width: ${({breakpoint:e})=>Ni[e]}) {
    &.scrolled {
      .${A.TITLE} {
        margin: 0.5rem 0 0 0;
      }
      a.${A.UNIT_NAME} {
        display: none;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      }
      a.${A.SUBUNIT_NAME} {
        margin: 0.52rem 0;
      }
      a.${A.SUBUNIT_NAME}, a.${A.TITLE_SUBUNIT_NAME} {
        font-size: 1.5em;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      }
      .navbar-brand img {
        height: 64px;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
        margin: 12px 1rem 12px 0;
      }
    }
  }
  @media (max-width: 1260px) {
    .container-xl {
      padding-left: 0;
      padding-right: 0;
      max-width: 100%;
    }
  }
`,hu=ge.div`
  font-family:
    Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans, sans-serif;
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  .container-xl {
    height: 100%;
    max-width: 1224px;
    margin-right: auto;
    margin-left: auto;
    width: 100%;
  }
  button,
  a {
    text-decoration: none;
    &:focus {
      outline: none !important;
      box-shadow:
        0px 0px 0px 2px ${Ze},
        0px 0px 0px 4px ${Le} !important;
    }
  }
  @media (min-width: ${({breakpoint:e})=>Ni[e]}) {
    &.scrolled {
      .${A.TITLE} {
        margin: 0.5rem 0 0 0;
      }
      a.${A.UNIT_NAME} {
        display: none;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      }
      a.${A.SUBUNIT_NAME} {
        margin: 0.52rem 0;
      }
      a.${A.SUBUNIT_NAME}, a.${A.TITLE_SUBUNIT_NAME} {
        font-size: 1.5em;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      }
      .navbar-brand img {
        height: 64px;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
        margin: 12px 1rem 12px 0;
      }
    }
  }
  @media (max-width: 1260px) {
    .container-xl {
      padding-left: 0;
      padding-right: 0;
      max-width: 100%;
    }
  }
`,Xr=({isPartner:e=!1,navTree:t,title:n,baseUrl:r="/",parentOrg:a,parentOrgUrl:o,partnerLogo:i,logo:s,loggedIn:u,userName:d,loginLink:g,onLoginClick:h,logoutLink:w,onLogoutClick:S,buttons:b,breakpoint:m="Xl",animateTitle:v,expandOnHover:T=!1,mobileNavTree:N,searchUrl:I,site:D,renderDiv:y="false"})=>{const $=Oi(t),se=Oi(N),_=H.useRef(null),ce=()=>{const Z=window.scrollY;_!=null&&_.current&&(Z>_.current.getBoundingClientRect().top?_.current.classList.add("scrolled"):_.current.classList.remove("scrolled"))};H.useEffect(()=>{typeof window<"u"&&ga({packageName:"component-header",component:"Component Header",type:"NA",configuration:{site:D,isPartner:e,searchUrl:I,navTree:$,parentOrg:a,buttons:b,mobileNavTree:se}})},[]),H.useEffect(()=>{const Z=()=>fs(ce,100);return window.addEventListener("scroll",Z),()=>{window.removeEventListener("scroll",Z)}},[]);const ue=()=>{const Z=y==="true"?hu:gu;return l.jsx(Z,{id:"asuHeader",breakpoint:m,ref:_,children:l.jsx(Au,{})})};return l.jsx(ci,{initialValue:{isPartner:e,navTree:$,title:n,baseUrl:r,parentOrg:a,parentOrgUrl:o,partnerLogo:i,logo:s,loggedIn:u,userName:d,loginLink:g,onLoginClick:h,logoutLink:w,onLogoutClick:S,buttons:b,breakpoint:m,animateTitle:v,expandOnHover:T,mobileNavTree:se,hasNavigation:!!($!=null&&$.length)||!!(se!=null&&se.length),searchUrl:I,site:D},children:ue()})};Xr.propTypes={...va};const vu=(e,t,n)=>{Sn(n).render(H.createElement(e,t))},yu=({targetSelector:e,props:t})=>{vu(Xr,t,document.querySelector(e))};Fe.ASUFooter=Ur,Fe.ASUHeader=Xr,Fe.initASUFooter=Vf,Fe.initGlobalHeader=yu,Object.defineProperty(Fe,Symbol.toStringTag,{value:"Module"})});
/**
 * @license React
 * react-jsx-runtime.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
/*! @license DOMPurify 3.2.5 | (c) Cure53 and other contributors | Released under the Apache license 2.0 and Mozilla Public License 2.0 | github.com/cure53/DOMPurify/blob/3.2.5/LICENSE */
/*!
	Copyright (c) 2018 Jed Watson.
	Licensed under the MIT License (MIT), see
	http://jedwatson.github.io/classnames
*/
/**
 * @license React
 * react-is.production.js
 *
 * Copyright (c) Meta Platforms, Inc. and affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
/** @license React v16.13.1
 * react-is.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
/*!
 * Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 * Copyright 2024 Fonticons, Inc.
 */
