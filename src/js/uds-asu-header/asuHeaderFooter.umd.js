(function(Be,j){typeof exports=="object"&&typeof module<"u"?j(exports,require("react"),require("react-dom")):typeof define=="function"&&define.amd?define(["exports","react","react-dom"],j):(Be=typeof globalThis<"u"?globalThis:Be||self,j(Be.AsuHeaderFooter={},Be.React,Be.ReactDOM))})(this,function(Be,j,Pi){"use strict";function Fr(e){return e&&e.__esModule&&Object.prototype.hasOwnProperty.call(e,"default")?e.default:e}var xn,Rr=Pi;xn=Rr.createRoot,Rr.hydrateRoot;var Mr={exports:{}},Ct={};var jr;function Ti(){if(jr)return Ct;jr=1;var e=j,t=Symbol.for("react.element"),n=Symbol.for("react.fragment"),r=Object.prototype.hasOwnProperty,a=e.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,o={key:!0,ref:!0,__self:!0,__source:!0};function i(s,u,f){var g,h={},b=null,E=null;f!==void 0&&(b=""+f),u.key!==void 0&&(b=""+u.key),u.ref!==void 0&&(E=u.ref);for(g in u)r.call(u,g)&&!o.hasOwnProperty(g)&&(h[g]=u[g]);if(s&&s.defaultProps)for(g in u=s.defaultProps,u)h[g]===void 0&&(h[g]=u[g]);return{$$typeof:t,type:s,key:b,ref:E,props:h,_owner:a.current}}return Ct.Fragment=n,Ct.jsx=i,Ct.jsxs=i,Ct}Mr.exports=Ti();var l=Mr.exports,Hr={exports:{}},wn,zr;function Oi(){if(zr)return wn;zr=1;var e="SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED";return wn=e,wn}var Cn,Xr;function Li(){if(Xr)return Cn;Xr=1;var e=Oi();function t(){}function n(){}return n.resetWarningCache=t,Cn=function(){function r(i,s,u,f,g,h){if(h!==e){var b=new Error("Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types");throw b.name="Invariant Violation",b}}r.isRequired=r;function a(){return r}var o={array:r,bigint:r,bool:r,func:r,number:r,object:r,string:r,symbol:r,any:r,arrayOf:a,element:r,elementType:r,instanceOf:a,node:r,objectOf:a,oneOf:a,oneOfType:a,shape:a,exact:a,checkPropTypes:n,resetWarningCache:t};return o.PropTypes=o,o},Cn}Hr.exports=Li()();var Oe=Hr.exports;const d=Fr(Oe);function Ur({packageName:e="",component:t="",type:n="",configuration:r={}}){if(!e||!t){console.error("trackReactComponent: Missing required arguments.");return}window.uds=window.uds||{},window.uds.package=window.uds.package||{},window.uds.package[e]={component:t,type:n,configuration:r}}const Qr={alt:d.string,title:d.string,src:d.string,mobileSrc:d.string,brandLink:d.string},Wt={baseUrl:d.string,parentOrg:d.string,parentOrgUrl:d.string,animate:d.bool},Gt={loggedIn:d.bool,loginLink:d.string,logoutLink:d.string,userName:d.string},Yt={text:d.string.isRequired,color:d.oneOf(["gold","maroon","light","dark"]),href:d.string,classes:d.string,onClick:d.func,onFocus:d.func},Sn=d.shape({id:d.number,href:d.string,text:d.string,type:d.string,selected:d.bool,items:d.arrayOf(d.arrayOf(d.object)),buttons:d.arrayOf(d.shape(Yt)),class:d.string}),Wr={isPartner:d.bool,navTree:d.arrayOf(Sn),partnerLogo:d.shape(Qr),logo:d.shape(Qr),title:d.string,parentOrg:Wt.parentOrg,parentOrgUrl:Wt.parentOrgUrl,baseUrl:Wt.baseUrl,loggedIn:Gt.loggedIn,userName:Gt.userName,loginLink:Gt.loginLink,onLoginClick:d.func,logoutLink:Gt.logoutLink,onLogoutClick:d.func,buttons:d.arrayOf(d.shape(Yt)),breakpoint:d.oneOf(["Lg","Xl"]),animateTitle:d.bool,expandOnHover:d.bool,mobileNavTree:d.arrayOf(Sn),hasNavigation:d.bool,searchUrl:d.string,site:d.string,renderDiv:d.oneOf(["true","false"])};var Gr={exports:{}},K={};var Yr;function ki(){if(Yr)return K;Yr=1;var e=Symbol.for("react.transitional.element"),t=Symbol.for("react.portal"),n=Symbol.for("react.fragment"),r=Symbol.for("react.strict_mode"),a=Symbol.for("react.profiler"),o=Symbol.for("react.consumer"),i=Symbol.for("react.context"),s=Symbol.for("react.forward_ref"),u=Symbol.for("react.suspense"),f=Symbol.for("react.suspense_list"),g=Symbol.for("react.memo"),h=Symbol.for("react.lazy"),b=Symbol.for("react.offscreen"),E=Symbol.for("react.client.reference");function y(p){if(typeof p=="object"&&p!==null){var v=p.$$typeof;switch(v){case e:switch(p=p.type,p){case n:case a:case r:case u:case f:return p;default:switch(p=p&&p.$$typeof,p){case i:case s:case h:case g:return p;case o:return p;default:return v}}case t:return v}}}return K.ContextConsumer=o,K.ContextProvider=i,K.Element=e,K.ForwardRef=s,K.Fragment=n,K.Lazy=h,K.Memo=g,K.Portal=t,K.Profiler=a,K.StrictMode=r,K.Suspense=u,K.SuspenseList=f,K.isContextConsumer=function(p){return y(p)===o},K.isContextProvider=function(p){return y(p)===i},K.isElement=function(p){return typeof p=="object"&&p!==null&&p.$$typeof===e},K.isForwardRef=function(p){return y(p)===s},K.isFragment=function(p){return y(p)===n},K.isLazy=function(p){return y(p)===h},K.isMemo=function(p){return y(p)===g},K.isPortal=function(p){return y(p)===t},K.isProfiler=function(p){return y(p)===a},K.isStrictMode=function(p){return y(p)===r},K.isSuspense=function(p){return y(p)===u},K.isSuspenseList=function(p){return y(p)===f},K.isValidElementType=function(p){return typeof p=="string"||typeof p=="function"||p===n||p===a||p===r||p===u||p===f||p===b||typeof p=="object"&&p!==null&&(p.$$typeof===h||p.$$typeof===g||p.$$typeof===i||p.$$typeof===o||p.$$typeof===s||p.$$typeof===E||p.getModuleId!==void 0)},K.typeOf=y,K}Gr.exports=ki();var Kr=Gr.exports;function Ni(e){function t(I,C,k,L,m){for(var Q=0,S=0,_=0,W=0,G,M,oe=0,ne=0,X,se=X=G=0,z=0,re=0,He=0,ce=0,st=k.length,ct=st-1,Ce,R="",V="",ze="",yt="",De;z<st;){if(M=k.charCodeAt(z),z===ct&&S+W+_+Q!==0&&(S!==0&&(M=S===47?10:47),W=_=Q=0,st++,ct++),S+W+_+Q===0){if(z===ct&&(0<re&&(R=R.replace(b,"")),0<R.trim().length)){switch(M){case 32:case 9:case 59:case 13:case 10:break;default:R+=k.charAt(z)}M=59}switch(M){case 123:for(R=R.trim(),G=R.charCodeAt(0),X=1,ce=++z;z<st;){switch(M=k.charCodeAt(z)){case 123:X++;break;case 125:X--;break;case 47:switch(M=k.charCodeAt(z+1)){case 42:case 47:e:{for(se=z+1;se<ct;++se)switch(k.charCodeAt(se)){case 47:if(M===42&&k.charCodeAt(se-1)===42&&z+2!==se){z=se+1;break e}break;case 10:if(M===47){z=se+1;break e}}z=se}}break;case 91:M++;case 40:M++;case 34:case 39:for(;z++<ct&&k.charCodeAt(z)!==M;);}if(X===0)break;z++}switch(X=k.substring(ce,z),G===0&&(G=(R=R.replace(h,"").trim()).charCodeAt(0)),G){case 64:switch(0<re&&(R=R.replace(b,"")),M=R.charCodeAt(1),M){case 100:case 109:case 115:case 45:re=C;break;default:re=ot}if(X=t(C,re,X,M,m+1),ce=X.length,0<we&&(re=n(ot,R,He),De=s(3,X,re,C,xe,ue,ce,M,m,L),R=re.join(""),De!==void 0&&(ce=(X=De.trim()).length)===0&&(M=0,X="")),0<ce)switch(M){case 115:R=R.replace(Z,i);case 100:case 109:case 45:X=R+"{"+X+"}";break;case 107:R=R.replace(P,"$1 $2"),X=R+"{"+X+"}",X=he===1||he===2&&o("@"+X,3)?"@-webkit-"+X+"@"+X:"@"+X;break;default:X=R+X,L===112&&(X=(V+=X,""))}else X="";break;default:X=t(C,n(C,R,He),X,L,m+1)}ze+=X,X=He=re=se=G=0,R="",M=k.charCodeAt(++z);break;case 125:case 59:if(R=(0<re?R.replace(b,""):R).trim(),1<(ce=R.length))switch(se===0&&(G=R.charCodeAt(0),G===45||96<G&&123>G)&&(ce=(R=R.replace(" ",":")).length),0<we&&(De=s(1,R,C,I,xe,ue,V.length,L,m,L))!==void 0&&(ce=(R=De.trim()).length)===0&&(R="\0\0"),G=R.charCodeAt(0),M=R.charCodeAt(1),G){case 0:break;case 64:if(M===105||M===99){yt+=R+k.charAt(z);break}default:R.charCodeAt(ce-1)!==58&&(V+=a(R,G,M,R.charCodeAt(2)))}He=re=se=G=0,R="",M=k.charCodeAt(++z)}}switch(M){case 13:case 10:S===47?S=0:1+G===0&&L!==107&&0<R.length&&(re=1,R+="\0"),0<we*Ke&&s(0,R,C,I,xe,ue,V.length,L,m,L),ue=1,xe++;break;case 59:case 125:if(S+W+_+Q===0){ue++;break}default:switch(ue++,Ce=k.charAt(z),M){case 9:case 32:if(W+Q+S===0)switch(oe){case 44:case 58:case 9:case 32:Ce="";break;default:M!==32&&(Ce=" ")}break;case 0:Ce="\\0";break;case 12:Ce="\\f";break;case 11:Ce="\\v";break;case 38:W+S+Q===0&&(re=He=1,Ce="\f"+Ce);break;case 108:if(W+S+Q+Pe===0&&0<se)switch(z-se){case 2:oe===112&&k.charCodeAt(z-3)===58&&(Pe=oe);case 8:ne===111&&(Pe=ne)}break;case 58:W+S+Q===0&&(se=z);break;case 44:S+_+W+Q===0&&(re=1,Ce+="\r");break;case 34:case 39:S===0&&(W=W===M?0:W===0?M:W);break;case 91:W+S+_===0&&Q++;break;case 93:W+S+_===0&&Q--;break;case 41:W+S+Q===0&&_--;break;case 40:if(W+S+Q===0){if(G===0)switch(2*oe+3*ne){case 533:break;default:G=1}_++}break;case 64:S+_+W+Q+se+X===0&&(X=1);break;case 42:case 47:if(!(0<W+Q+_))switch(S){case 0:switch(2*M+3*k.charCodeAt(z+1)){case 235:S=47;break;case 220:ce=z,S=42}break;case 42:M===47&&oe===42&&ce+2!==z&&(k.charCodeAt(ce+2)===33&&(V+=k.substring(ce,z+1)),Ce="",S=0)}}S===0&&(R+=Ce)}ne=oe,oe=M,z++}if(ce=V.length,0<ce){if(re=C,0<we&&(De=s(2,V,re,I,xe,ue,ce,L,m,L),De!==void 0&&(V=De).length===0))return yt+V+ze;if(V=re.join(",")+"{"+V+"}",he*Pe!==0){switch(he!==2||o(V,2)||(Pe=0),Pe){case 111:V=V.replace(B,":-moz-$1")+V;break;case 112:V=V.replace(O,"::-webkit-input-$1")+V.replace(O,"::-moz-$1")+V.replace(O,":-ms-input-$1")+V}Pe=0}}return yt+V+ze}function n(I,C,k){var L=C.trim().split(v);C=L;var m=L.length,Q=I.length;switch(Q){case 0:case 1:var S=0;for(I=Q===0?"":I[0]+" ";S<m;++S)C[S]=r(I,C[S],k).trim();break;default:var _=S=0;for(C=[];S<m;++S)for(var W=0;W<Q;++W)C[_++]=r(I[W]+" ",L[S],k).trim()}return C}function r(I,C,k){var L=C.charCodeAt(0);switch(33>L&&(L=(C=C.trim()).charCodeAt(0)),L){case 38:return C.replace(T,"$1"+I.trim());case 58:return I.trim()+C.replace(T,"$1"+I.trim());default:if(0<1*k&&0<C.indexOf("\f"))return C.replace(T,(I.charCodeAt(0)===58?"":"$1")+I.trim())}return I+C}function a(I,C,k,L){var m=I+";",Q=2*C+3*k+4*L;if(Q===944){I=m.indexOf(":",9)+1;var S=m.substring(I,m.length-1).trim();return S=m.substring(0,I).trim()+S+";",he===1||he===2&&o(S,1)?"-webkit-"+S+S:S}if(he===0||he===2&&!o(m,1))return m;switch(Q){case 1015:return m.charCodeAt(10)===97?"-webkit-"+m+m:m;case 951:return m.charCodeAt(3)===116?"-webkit-"+m+m:m;case 963:return m.charCodeAt(5)===110?"-webkit-"+m+m:m;case 1009:if(m.charCodeAt(4)!==100)break;case 969:case 942:return"-webkit-"+m+m;case 978:return"-webkit-"+m+"-moz-"+m+m;case 1019:case 983:return"-webkit-"+m+"-moz-"+m+"-ms-"+m+m;case 883:if(m.charCodeAt(8)===45)return"-webkit-"+m+m;if(0<m.indexOf("image-set(",11))return m.replace(q,"$1-webkit-$2")+m;break;case 932:if(m.charCodeAt(4)===45)switch(m.charCodeAt(5)){case 103:return"-webkit-box-"+m.replace("-grow","")+"-webkit-"+m+"-ms-"+m.replace("grow","positive")+m;case 115:return"-webkit-"+m+"-ms-"+m.replace("shrink","negative")+m;case 98:return"-webkit-"+m+"-ms-"+m.replace("basis","preferred-size")+m}return"-webkit-"+m+"-ms-"+m+m;case 964:return"-webkit-"+m+"-ms-flex-"+m+m;case 1023:if(m.charCodeAt(8)!==99)break;return S=m.substring(m.indexOf(":",15)).replace("flex-","").replace("space-between","justify"),"-webkit-box-pack"+S+"-webkit-"+m+"-ms-flex-pack"+S+m;case 1005:return y.test(m)?m.replace(E,":-webkit-")+m.replace(E,":-moz-")+m:m;case 1e3:switch(S=m.substring(13).trim(),C=S.indexOf("-")+1,S.charCodeAt(0)+S.charCodeAt(C)){case 226:S=m.replace(A,"tb");break;case 232:S=m.replace(A,"tb-rl");break;case 220:S=m.replace(A,"lr");break;default:return m}return"-webkit-"+m+"-ms-"+S+m;case 1017:if(m.indexOf("sticky",9)===-1)break;case 975:switch(C=(m=I).length-10,S=(m.charCodeAt(C)===33?m.substring(0,C):m).substring(I.indexOf(":",7)+1).trim(),Q=S.charCodeAt(0)+(S.charCodeAt(7)|0)){case 203:if(111>S.charCodeAt(8))break;case 115:m=m.replace(S,"-webkit-"+S)+";"+m;break;case 207:case 102:m=m.replace(S,"-webkit-"+(102<Q?"inline-":"")+"box")+";"+m.replace(S,"-webkit-"+S)+";"+m.replace(S,"-ms-"+S+"box")+";"+m}return m+";";case 938:if(m.charCodeAt(5)===45)switch(m.charCodeAt(6)){case 105:return S=m.replace("-items",""),"-webkit-"+m+"-webkit-box-"+S+"-ms-flex-"+S+m;case 115:return"-webkit-"+m+"-ms-flex-item-"+m.replace(J,"")+m;default:return"-webkit-"+m+"-ms-flex-line-pack"+m.replace("align-content","").replace(J,"")+m}break;case 973:case 989:if(m.charCodeAt(3)!==45||m.charCodeAt(4)===122)break;case 931:case 953:if(le.test(I)===!0)return(S=I.substring(I.indexOf(":")+1)).charCodeAt(0)===115?a(I.replace("stretch","fill-available"),C,k,L).replace(":fill-available",":stretch"):m.replace(S,"-webkit-"+S)+m.replace(S,"-moz-"+S.replace("fill-",""))+m;break;case 962:if(m="-webkit-"+m+(m.charCodeAt(5)===102?"-ms-"+m:"")+m,k+L===211&&m.charCodeAt(13)===105&&0<m.indexOf("transform",10))return m.substring(0,m.indexOf(";",27)+1).replace(p,"$1-webkit-$2")+m}return m}function o(I,C){var k=I.indexOf(C===1?":":"{"),L=I.substring(0,C!==3?k:10);return k=I.substring(k+1,I.length-1),it(C!==2?L:L.replace(ae,"$1"),k,C)}function i(I,C){var k=a(C,C.charCodeAt(0),C.charCodeAt(1),C.charCodeAt(2));return k!==C+";"?k.replace(ie," or ($1)").substring(4):"("+C+")"}function s(I,C,k,L,m,Q,S,_,W,G){for(var M=0,oe=C,ne;M<we;++M)switch(ne=ke[M].call(g,I,oe,k,L,m,Q,S,_,W,G)){case void 0:case!1:case!0:case null:break;default:oe=ne}if(oe!==C)return oe}function u(I){switch(I){case void 0:case null:we=ke.length=0;break;default:if(typeof I=="function")ke[we++]=I;else if(typeof I=="object")for(var C=0,k=I.length;C<k;++C)u(I[C]);else Ke=!!I|0}return u}function f(I){return I=I.prefix,I!==void 0&&(it=null,I?typeof I!="function"?he=1:(he=2,it=I):he=0),f}function g(I,C){var k=I;if(33>k.charCodeAt(0)&&(k=k.trim()),ee=k,k=[ee],0<we){var L=s(-1,C,k,k,xe,ue,0,0,0,0);L!==void 0&&typeof L=="string"&&(C=L)}var m=t(ot,k,C,0,0);return 0<we&&(L=s(-2,m,k,k,xe,ue,m.length,0,0,0),L!==void 0&&(m=L)),ee="",Pe=0,ue=xe=1,m}var h=/^\0+/g,b=/[\0\r\f]/g,E=/: */g,y=/zoo|gra/,p=/([,: ])(transform)/g,v=/,\r+?/g,T=/([\t\r\n ])*\f?&/g,P=/@(k\w+)\s*(\S*)\s*/,O=/::(place)/g,B=/:(read-only)/g,A=/[svh]\w+-[tblr]{2}/,Z=/\(\s*(.*)\s*\)/g,ie=/([\s\S]*?);/g,J=/-self|flex-/g,ae=/[^]*?(:[rp][el]a[\w-]+)[^]*/,le=/stretch|:\s*\w+\-(?:conte|avail)/,q=/([^-])(image-set\()/,ue=1,xe=1,Pe=0,he=1,ot=[],ke=[],we=0,it=null,Ke=0,ee="";return g.use=u,g.set=f,e!==void 0&&f(e),g}var Bi={animationIterationCount:1,borderImageOutset:1,borderImageSlice:1,borderImageWidth:1,boxFlex:1,boxFlexGroup:1,boxOrdinalGroup:1,columnCount:1,columns:1,flex:1,flexGrow:1,flexPositive:1,flexShrink:1,flexNegative:1,flexOrder:1,gridRow:1,gridRowEnd:1,gridRowSpan:1,gridRowStart:1,gridColumn:1,gridColumnEnd:1,gridColumnSpan:1,gridColumnStart:1,msGridRow:1,msGridRowSpan:1,msGridColumn:1,msGridColumnSpan:1,fontWeight:1,lineHeight:1,opacity:1,order:1,orphans:1,tabSize:1,widows:1,zIndex:1,zoom:1,WebkitLineClamp:1,fillOpacity:1,floodOpacity:1,stopOpacity:1,strokeDasharray:1,strokeDashoffset:1,strokeMiterlimit:1,strokeOpacity:1,strokeWidth:1};function Ii(e){var t=Object.create(null);return function(n){return t[n]===void 0&&(t[n]=e(n)),t[n]}}var Di=/^((children|dangerouslySetInnerHTML|key|ref|autoFocus|defaultValue|defaultChecked|innerHTML|suppressContentEditableWarning|suppressHydrationWarning|valueLink|abbr|accept|acceptCharset|accessKey|action|allow|allowUserMedia|allowPaymentRequest|allowFullScreen|allowTransparency|alt|async|autoComplete|autoPlay|capture|cellPadding|cellSpacing|challenge|charSet|checked|cite|classID|className|cols|colSpan|content|contentEditable|contextMenu|controls|controlsList|coords|crossOrigin|data|dateTime|decoding|default|defer|dir|disabled|disablePictureInPicture|disableRemotePlayback|download|draggable|encType|enterKeyHint|fetchpriority|fetchPriority|form|formAction|formEncType|formMethod|formNoValidate|formTarget|frameBorder|headers|height|hidden|high|href|hrefLang|htmlFor|httpEquiv|id|inputMode|integrity|is|keyParams|keyType|kind|label|lang|list|loading|loop|low|marginHeight|marginWidth|max|maxLength|media|mediaGroup|method|min|minLength|multiple|muted|name|nonce|noValidate|open|optimum|pattern|placeholder|playsInline|poster|preload|profile|radioGroup|readOnly|referrerPolicy|rel|required|reversed|role|rows|rowSpan|sandbox|scope|scoped|scrolling|seamless|selected|shape|size|sizes|slot|span|spellCheck|src|srcDoc|srcLang|srcSet|start|step|style|summary|tabIndex|target|title|translate|type|useMap|value|width|wmode|wrap|about|datatype|inlist|prefix|property|resource|typeof|vocab|autoCapitalize|autoCorrect|autoSave|color|incremental|fallback|inert|itemProp|itemScope|itemType|itemID|itemRef|on|option|results|security|unselectable|accentHeight|accumulate|additive|alignmentBaseline|allowReorder|alphabetic|amplitude|arabicForm|ascent|attributeName|attributeType|autoReverse|azimuth|baseFrequency|baselineShift|baseProfile|bbox|begin|bias|by|calcMode|capHeight|clip|clipPathUnits|clipPath|clipRule|colorInterpolation|colorInterpolationFilters|colorProfile|colorRendering|contentScriptType|contentStyleType|cursor|cx|cy|d|decelerate|descent|diffuseConstant|direction|display|divisor|dominantBaseline|dur|dx|dy|edgeMode|elevation|enableBackground|end|exponent|externalResourcesRequired|fill|fillOpacity|fillRule|filter|filterRes|filterUnits|floodColor|floodOpacity|focusable|fontFamily|fontSize|fontSizeAdjust|fontStretch|fontStyle|fontVariant|fontWeight|format|from|fr|fx|fy|g1|g2|glyphName|glyphOrientationHorizontal|glyphOrientationVertical|glyphRef|gradientTransform|gradientUnits|hanging|horizAdvX|horizOriginX|ideographic|imageRendering|in|in2|intercept|k|k1|k2|k3|k4|kernelMatrix|kernelUnitLength|kerning|keyPoints|keySplines|keyTimes|lengthAdjust|letterSpacing|lightingColor|limitingConeAngle|local|markerEnd|markerMid|markerStart|markerHeight|markerUnits|markerWidth|mask|maskContentUnits|maskUnits|mathematical|mode|numOctaves|offset|opacity|operator|order|orient|orientation|origin|overflow|overlinePosition|overlineThickness|panose1|paintOrder|pathLength|patternContentUnits|patternTransform|patternUnits|pointerEvents|points|pointsAtX|pointsAtY|pointsAtZ|preserveAlpha|preserveAspectRatio|primitiveUnits|r|radius|refX|refY|renderingIntent|repeatCount|repeatDur|requiredExtensions|requiredFeatures|restart|result|rotate|rx|ry|scale|seed|shapeRendering|slope|spacing|specularConstant|specularExponent|speed|spreadMethod|startOffset|stdDeviation|stemh|stemv|stitchTiles|stopColor|stopOpacity|strikethroughPosition|strikethroughThickness|string|stroke|strokeDasharray|strokeDashoffset|strokeLinecap|strokeLinejoin|strokeMiterlimit|strokeOpacity|strokeWidth|surfaceScale|systemLanguage|tableValues|targetX|targetY|textAnchor|textDecoration|textRendering|textLength|to|transform|u1|u2|underlinePosition|underlineThickness|unicode|unicodeBidi|unicodeRange|unitsPerEm|vAlphabetic|vHanging|vIdeographic|vMathematical|values|vectorEffect|version|vertAdvY|vertOriginX|vertOriginY|viewBox|viewTarget|visibility|widths|wordSpacing|writingMode|x|xHeight|x1|x2|xChannelSelector|xlinkActuate|xlinkArcrole|xlinkHref|xlinkRole|xlinkShow|xlinkTitle|xlinkType|xmlBase|xmlns|xmlnsXlink|xmlLang|xmlSpace|y|y1|y2|yChannelSelector|z|zoomAndPan|for|class|autofocus)|(([Dd][Aa][Tt][Aa]|[Aa][Rr][Ii][Aa]|x)-.*))$/,Vr=Ii(function(e){return Di.test(e)||e.charCodeAt(0)===111&&e.charCodeAt(1)===110&&e.charCodeAt(2)<91}),Jr={exports:{}},Y={};var Zr;function Fi(){if(Zr)return Y;Zr=1;var e=typeof Symbol=="function"&&Symbol.for,t=e?Symbol.for("react.element"):60103,n=e?Symbol.for("react.portal"):60106,r=e?Symbol.for("react.fragment"):60107,a=e?Symbol.for("react.strict_mode"):60108,o=e?Symbol.for("react.profiler"):60114,i=e?Symbol.for("react.provider"):60109,s=e?Symbol.for("react.context"):60110,u=e?Symbol.for("react.async_mode"):60111,f=e?Symbol.for("react.concurrent_mode"):60111,g=e?Symbol.for("react.forward_ref"):60112,h=e?Symbol.for("react.suspense"):60113,b=e?Symbol.for("react.suspense_list"):60120,E=e?Symbol.for("react.memo"):60115,y=e?Symbol.for("react.lazy"):60116,p=e?Symbol.for("react.block"):60121,v=e?Symbol.for("react.fundamental"):60117,T=e?Symbol.for("react.responder"):60118,P=e?Symbol.for("react.scope"):60119;function O(A){if(typeof A=="object"&&A!==null){var Z=A.$$typeof;switch(Z){case t:switch(A=A.type,A){case u:case f:case r:case o:case a:case h:return A;default:switch(A=A&&A.$$typeof,A){case s:case g:case y:case E:case i:return A;default:return Z}}case n:return Z}}}function B(A){return O(A)===f}return Y.AsyncMode=u,Y.ConcurrentMode=f,Y.ContextConsumer=s,Y.ContextProvider=i,Y.Element=t,Y.ForwardRef=g,Y.Fragment=r,Y.Lazy=y,Y.Memo=E,Y.Portal=n,Y.Profiler=o,Y.StrictMode=a,Y.Suspense=h,Y.isAsyncMode=function(A){return B(A)||O(A)===u},Y.isConcurrentMode=B,Y.isContextConsumer=function(A){return O(A)===s},Y.isContextProvider=function(A){return O(A)===i},Y.isElement=function(A){return typeof A=="object"&&A!==null&&A.$$typeof===t},Y.isForwardRef=function(A){return O(A)===g},Y.isFragment=function(A){return O(A)===r},Y.isLazy=function(A){return O(A)===y},Y.isMemo=function(A){return O(A)===E},Y.isPortal=function(A){return O(A)===n},Y.isProfiler=function(A){return O(A)===o},Y.isStrictMode=function(A){return O(A)===a},Y.isSuspense=function(A){return O(A)===h},Y.isValidElementType=function(A){return typeof A=="string"||typeof A=="function"||A===r||A===f||A===o||A===a||A===h||A===b||typeof A=="object"&&A!==null&&(A.$$typeof===y||A.$$typeof===E||A.$$typeof===i||A.$$typeof===s||A.$$typeof===g||A.$$typeof===v||A.$$typeof===T||A.$$typeof===P||A.$$typeof===p)},Y.typeOf=O,Y}Jr.exports=Fi();var Ri=Jr.exports,En=Ri,Mi={childContextTypes:!0,contextType:!0,contextTypes:!0,defaultProps:!0,displayName:!0,getDefaultProps:!0,getDerivedStateFromError:!0,getDerivedStateFromProps:!0,mixins:!0,propTypes:!0,type:!0},ji={name:!0,length:!0,prototype:!0,caller:!0,callee:!0,arguments:!0,arity:!0},Hi={$$typeof:!0,render:!0,defaultProps:!0,displayName:!0,propTypes:!0},qr={$$typeof:!0,compare:!0,defaultProps:!0,displayName:!0,propTypes:!0,type:!0},Pn={};Pn[En.ForwardRef]=Hi,Pn[En.Memo]=qr;function _r(e){return En.isMemo(e)?qr:Pn[e.$$typeof]||Mi}var zi=Object.defineProperty,Xi=Object.getOwnPropertyNames,$r=Object.getOwnPropertySymbols,Ui=Object.getOwnPropertyDescriptor,Qi=Object.getPrototypeOf,ea=Object.prototype;function ta(e,t,n){if(typeof t!="string"){if(ea){var r=Qi(t);r&&r!==ea&&ta(e,r,n)}var a=Xi(t);$r&&(a=a.concat($r(t)));for(var o=_r(e),i=_r(t),s=0;s<a.length;++s){var u=a[s];if(!ji[u]&&!(n&&n[u])&&!(i&&i[u])&&!(o&&o[u])){var f=Ui(t,u);try{zi(e,u,f)}catch{}}}}return e}var Wi=ta;const Gi=Fr(Wi);var me={env:{NODE_ENV:"production"}};function Qe(){return(Qe=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(e[r]=n[r])}return e}).apply(this,arguments)}var na=function(e,t){for(var n=[e[0]],r=0,a=t.length;r<a;r+=1)n.push(t[r],e[r+1]);return n},Tn=function(e){return e!==null&&typeof e=="object"&&(e.toString?e.toString():Object.prototype.toString.call(e))==="[object Object]"&&!Kr.typeOf(e)},Kt=Object.freeze([]),Ze=Object.freeze({});function St(e){return typeof e=="function"}function ra(e){return e.displayName||e.name||"Component"}function On(e){return e&&typeof e.styledComponentId=="string"}var lt=typeof me<"u"&&me.env!==void 0&&(me.env.REACT_APP_SC_ATTR||me.env.SC_ATTR)||"data-styled",Ln=typeof window<"u"&&"HTMLElement"in window,Yi=!!(typeof SC_DISABLE_SPEEDY=="boolean"?SC_DISABLE_SPEEDY:typeof me<"u"&&me.env!==void 0&&(me.env.REACT_APP_SC_DISABLE_SPEEDY!==void 0&&me.env.REACT_APP_SC_DISABLE_SPEEDY!==""?me.env.REACT_APP_SC_DISABLE_SPEEDY!=="false"&&me.env.REACT_APP_SC_DISABLE_SPEEDY:me.env.SC_DISABLE_SPEEDY!==void 0&&me.env.SC_DISABLE_SPEEDY!==""?me.env.SC_DISABLE_SPEEDY!=="false"&&me.env.SC_DISABLE_SPEEDY:me.env.NODE_ENV!=="production"));function Et(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];throw new Error("An error occurred. See https://git.io/JUIaE#"+e+" for more information."+(n.length>0?" Args: "+n.join(", "):""))}var Ki=function(){function e(n){this.groupSizes=new Uint32Array(512),this.length=512,this.tag=n}var t=e.prototype;return t.indexOfGroup=function(n){for(var r=0,a=0;a<n;a++)r+=this.groupSizes[a];return r},t.insertRules=function(n,r){if(n>=this.groupSizes.length){for(var a=this.groupSizes,o=a.length,i=o;n>=i;)(i<<=1)<0&&Et(16,""+n);this.groupSizes=new Uint32Array(i),this.groupSizes.set(a),this.length=i;for(var s=o;s<i;s++)this.groupSizes[s]=0}for(var u=this.indexOfGroup(n+1),f=0,g=r.length;f<g;f++)this.tag.insertRule(u,r[f])&&(this.groupSizes[n]++,u++)},t.clearGroup=function(n){if(n<this.length){var r=this.groupSizes[n],a=this.indexOfGroup(n),o=a+r;this.groupSizes[n]=0;for(var i=a;i<o;i++)this.tag.deleteRule(a)}},t.getGroup=function(n){var r="";if(n>=this.length||this.groupSizes[n]===0)return r;for(var a=this.groupSizes[n],o=this.indexOfGroup(n),i=o+a,s=o;s<i;s++)r+=this.tag.getRule(s)+`/*!sc*/
`;return r},e}(),Vt=new Map,Jt=new Map,Pt=1,Zt=function(e){if(Vt.has(e))return Vt.get(e);for(;Jt.has(Pt);)Pt++;var t=Pt++;return Vt.set(e,t),Jt.set(t,e),t},Vi=function(e){return Jt.get(e)},Ji=function(e,t){t>=Pt&&(Pt=t+1),Vt.set(e,t),Jt.set(t,e)},Zi="style["+lt+'][data-styled-version="5.3.11"]',qi=new RegExp("^"+lt+'\\.g(\\d+)\\[id="([\\w\\d-]+)"\\].*?"([^"]*)'),_i=function(e,t,n){for(var r,a=n.split(","),o=0,i=a.length;o<i;o++)(r=a[o])&&e.registerName(t,r)},$i=function(e,t){for(var n=(t.textContent||"").split(`/*!sc*/
`),r=[],a=0,o=n.length;a<o;a++){var i=n[a].trim();if(i){var s=i.match(qi);if(s){var u=0|parseInt(s[1],10),f=s[2];u!==0&&(Ji(f,u),_i(e,f,s[3]),e.getTag().insertRules(u,r)),r.length=0}else r.push(i)}}},es=function(){return typeof __webpack_nonce__<"u"?__webpack_nonce__:null},aa=function(e){var t=document.head,n=e||t,r=document.createElement("style"),a=function(s){for(var u=s.childNodes,f=u.length;f>=0;f--){var g=u[f];if(g&&g.nodeType===1&&g.hasAttribute(lt))return g}}(n),o=a!==void 0?a.nextSibling:null;r.setAttribute(lt,"active"),r.setAttribute("data-styled-version","5.3.11");var i=es();return i&&r.setAttribute("nonce",i),n.insertBefore(r,o),r},ts=function(){function e(n){var r=this.element=aa(n);r.appendChild(document.createTextNode("")),this.sheet=function(a){if(a.sheet)return a.sheet;for(var o=document.styleSheets,i=0,s=o.length;i<s;i++){var u=o[i];if(u.ownerNode===a)return u}Et(17)}(r),this.length=0}var t=e.prototype;return t.insertRule=function(n,r){try{return this.sheet.insertRule(r,n),this.length++,!0}catch{return!1}},t.deleteRule=function(n){this.sheet.deleteRule(n),this.length--},t.getRule=function(n){var r=this.sheet.cssRules[n];return r!==void 0&&typeof r.cssText=="string"?r.cssText:""},e}(),ns=function(){function e(n){var r=this.element=aa(n);this.nodes=r.childNodes,this.length=0}var t=e.prototype;return t.insertRule=function(n,r){if(n<=this.length&&n>=0){var a=document.createTextNode(r),o=this.nodes[n];return this.element.insertBefore(a,o||null),this.length++,!0}return!1},t.deleteRule=function(n){this.element.removeChild(this.nodes[n]),this.length--},t.getRule=function(n){return n<this.length?this.nodes[n].textContent:""},e}(),rs=function(){function e(n){this.rules=[],this.length=0}var t=e.prototype;return t.insertRule=function(n,r){return n<=this.length&&(this.rules.splice(n,0,r),this.length++,!0)},t.deleteRule=function(n){this.rules.splice(n,1),this.length--},t.getRule=function(n){return n<this.length?this.rules[n]:""},e}(),oa=Ln,as={isServer:!Ln,useCSSOMInjection:!Yi},ia=function(){function e(n,r,a){n===void 0&&(n=Ze),r===void 0&&(r={}),this.options=Qe({},as,{},n),this.gs=r,this.names=new Map(a),this.server=!!n.isServer,!this.server&&Ln&&oa&&(oa=!1,function(o){for(var i=document.querySelectorAll(Zi),s=0,u=i.length;s<u;s++){var f=i[s];f&&f.getAttribute(lt)!=="active"&&($i(o,f),f.parentNode&&f.parentNode.removeChild(f))}}(this))}e.registerId=function(n){return Zt(n)};var t=e.prototype;return t.reconstructWithOptions=function(n,r){return r===void 0&&(r=!0),new e(Qe({},this.options,{},n),this.gs,r&&this.names||void 0)},t.allocateGSInstance=function(n){return this.gs[n]=(this.gs[n]||0)+1},t.getTag=function(){return this.tag||(this.tag=(a=(r=this.options).isServer,o=r.useCSSOMInjection,i=r.target,n=a?new rs(i):o?new ts(i):new ns(i),new Ki(n)));var n,r,a,o,i},t.hasNameForId=function(n,r){return this.names.has(n)&&this.names.get(n).has(r)},t.registerName=function(n,r){if(Zt(n),this.names.has(n))this.names.get(n).add(r);else{var a=new Set;a.add(r),this.names.set(n,a)}},t.insertRules=function(n,r,a){this.registerName(n,r),this.getTag().insertRules(Zt(n),a)},t.clearNames=function(n){this.names.has(n)&&this.names.get(n).clear()},t.clearRules=function(n){this.getTag().clearGroup(Zt(n)),this.clearNames(n)},t.clearTag=function(){this.tag=void 0},t.toString=function(){return function(n){for(var r=n.getTag(),a=r.length,o="",i=0;i<a;i++){var s=Vi(i);if(s!==void 0){var u=n.names.get(s),f=r.getGroup(i);if(u&&f&&u.size){var g=lt+".g"+i+'[id="'+s+'"]',h="";u!==void 0&&u.forEach(function(b){b.length>0&&(h+=b+",")}),o+=""+f+g+'{content:"'+h+`"}/*!sc*/
`}}}return o}(this)},e}(),os=/(a)(d)/gi,sa=function(e){return String.fromCharCode(e+(e>25?39:97))};function kn(e){var t,n="";for(t=Math.abs(e);t>52;t=t/52|0)n=sa(t%52)+n;return(sa(t%52)+n).replace(os,"$1-$2")}var ft=function(e,t){for(var n=t.length;n;)e=33*e^t.charCodeAt(--n);return e},ca=function(e){return ft(5381,e)};function is(e){for(var t=0;t<e.length;t+=1){var n=e[t];if(St(n)&&!On(n))return!1}return!0}var ss=ca("5.3.11"),cs=function(){function e(t,n,r){this.rules=t,this.staticRulesId="",this.isStatic=(r===void 0||r.isStatic)&&is(t),this.componentId=n,this.baseHash=ft(ss,n),this.baseStyle=r,ia.registerId(n)}return e.prototype.generateAndInjectStyles=function(t,n,r){var a=this.componentId,o=[];if(this.baseStyle&&o.push(this.baseStyle.generateAndInjectStyles(t,n,r)),this.isStatic&&!r.hash)if(this.staticRulesId&&n.hasNameForId(a,this.staticRulesId))o.push(this.staticRulesId);else{var i=ut(this.rules,t,n,r).join(""),s=kn(ft(this.baseHash,i)>>>0);if(!n.hasNameForId(a,s)){var u=r(i,"."+s,void 0,a);n.insertRules(a,s,u)}o.push(s),this.staticRulesId=s}else{for(var f=this.rules.length,g=ft(this.baseHash,r.hash),h="",b=0;b<f;b++){var E=this.rules[b];if(typeof E=="string")h+=E;else if(E){var y=ut(E,t,n,r),p=Array.isArray(y)?y.join(""):y;g=ft(g,p+b),h+=p}}if(h){var v=kn(g>>>0);if(!n.hasNameForId(a,v)){var T=r(h,"."+v,void 0,a);n.insertRules(a,v,T)}o.push(v)}}return o.join(" ")},e}(),ls=/^\s*\/\/.*$/gm,fs=[":","[",".","#"];function us(e){var t,n,r,a,o=Ze,i=o.options,s=i===void 0?Ze:i,u=o.plugins,f=u===void 0?Kt:u,g=new Ni(s),h=[],b=function(p){function v(T){if(T)try{p(T+"}")}catch{}}return function(T,P,O,B,A,Z,ie,J,ae,le){switch(T){case 1:if(ae===0&&P.charCodeAt(0)===64)return p(P+";"),"";break;case 2:if(J===0)return P+"/*|*/";break;case 3:switch(J){case 102:case 112:return p(O[0]+P),"";default:return P+(le===0?"/*|*/":"")}case-2:P.split("/*|*/}").forEach(v)}}}(function(p){h.push(p)}),E=function(p,v,T){return v===0&&fs.indexOf(T[n.length])!==-1||T.match(a)?p:"."+t};function y(p,v,T,P){P===void 0&&(P="&");var O=p.replace(ls,""),B=v&&T?T+" "+v+" { "+O+" }":O;return t=P,n=v,r=new RegExp("\\"+n+"\\b","g"),a=new RegExp("(\\"+n+"\\b){2,}"),g(T||!v?"":v,B)}return g.use([].concat(f,[function(p,v,T){p===2&&T.length&&T[0].lastIndexOf(n)>0&&(T[0]=T[0].replace(r,E))},b,function(p){if(p===-2){var v=h;return h=[],v}}])),y.hash=f.length?f.reduce(function(p,v){return v.name||Et(15),ft(p,v.name)},5381).toString():"",y}var la=j.createContext();la.Consumer;var fa=j.createContext(),ds=(fa.Consumer,new ia),Nn=us();function ms(){return j.useContext(la)||ds}function ps(){return j.useContext(fa)||Nn}var gs=function(){function e(t,n){var r=this;this.inject=function(a,o){o===void 0&&(o=Nn);var i=r.name+o.hash;a.hasNameForId(r.id,i)||a.insertRules(r.id,i,o(r.rules,i,"@keyframes"))},this.toString=function(){return Et(12,String(r.name))},this.name=t,this.id="sc-keyframes-"+t,this.rules=n}return e.prototype.getName=function(t){return t===void 0&&(t=Nn),this.name+t.hash},e}(),hs=/([A-Z])/,As=/([A-Z])/g,vs=/^ms-/,bs=function(e){return"-"+e.toLowerCase()};function ua(e){return hs.test(e)?e.replace(As,bs).replace(vs,"-ms-"):e}var da=function(e){return e==null||e===!1||e===""};function ut(e,t,n,r){if(Array.isArray(e)){for(var a,o=[],i=0,s=e.length;i<s;i+=1)(a=ut(e[i],t,n,r))!==""&&(Array.isArray(a)?o.push.apply(o,a):o.push(a));return o}if(da(e))return"";if(On(e))return"."+e.styledComponentId;if(St(e)){if(typeof(f=e)!="function"||f.prototype&&f.prototype.isReactComponent||!t)return e;var u=e(t);return ut(u,t,n,r)}var f;return e instanceof gs?n?(e.inject(n,r),e.getName(r)):e:Tn(e)?function g(h,b){var E,y,p=[];for(var v in h)h.hasOwnProperty(v)&&!da(h[v])&&(Array.isArray(h[v])&&h[v].isCss||St(h[v])?p.push(ua(v)+":",h[v],";"):Tn(h[v])?p.push.apply(p,g(h[v],v)):p.push(ua(v)+": "+(E=v,(y=h[v])==null||typeof y=="boolean"||y===""?"":typeof y!="number"||y===0||E in Bi||E.startsWith("--")?String(y).trim():y+"px")+";"));return b?[b+" {"].concat(p,["}"]):p}(e):e.toString()}var ma=function(e){return Array.isArray(e)&&(e.isCss=!0),e};function Bn(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];return St(e)||Tn(e)?ma(ut(na(Kt,[e].concat(n)))):n.length===0&&e.length===1&&typeof e[0]=="string"?e:ma(ut(na(e,n)))}var ys=function(e,t,n){return n===void 0&&(n=Ze),e.theme!==n.theme&&e.theme||t||n.theme},xs=/[!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~-]+/g,ws=/(^-|-$)/g;function In(e){return e.replace(xs,"-").replace(ws,"")}var Cs=function(e){return kn(ca(e)>>>0)};function qt(e){return typeof e=="string"&&me.env.NODE_ENV==="production"}var Dn=function(e){return typeof e=="function"||typeof e=="object"&&e!==null&&!Array.isArray(e)},Ss=function(e){return e!=="__proto__"&&e!=="constructor"&&e!=="prototype"};function Es(e,t,n){var r=e[n];Dn(t)&&Dn(r)?pa(r,t):e[n]=t}function pa(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];for(var a=0,o=n;a<o.length;a++){var i=o[a];if(Dn(i))for(var s in i)Ss(s)&&Es(e,i[s],s)}return e}var ga=j.createContext();ga.Consumer;var Fn={};function ha(e,t,n){var r=On(e),a=!qt(e),o=t.attrs,i=o===void 0?Kt:o,s=t.componentId,u=s===void 0?function(P,O){var B=typeof P!="string"?"sc":In(P);Fn[B]=(Fn[B]||0)+1;var A=B+"-"+Cs("5.3.11"+B+Fn[B]);return O?O+"-"+A:A}(t.displayName,t.parentComponentId):s,f=t.displayName,g=f===void 0?function(P){return qt(P)?"styled."+P:"Styled("+ra(P)+")"}(e):f,h=t.displayName&&t.componentId?In(t.displayName)+"-"+t.componentId:t.componentId||u,b=r&&e.attrs?Array.prototype.concat(e.attrs,i).filter(Boolean):i,E=t.shouldForwardProp;r&&e.shouldForwardProp&&(E=t.shouldForwardProp?function(P,O,B){return e.shouldForwardProp(P,O,B)&&t.shouldForwardProp(P,O,B)}:e.shouldForwardProp);var y,p=new cs(n,h,r?e.componentStyle:void 0),v=p.isStatic&&i.length===0,T=function(P,O){return function(B,A,Z,ie){var J=B.attrs,ae=B.componentStyle,le=B.defaultProps,q=B.foldedComponentIds,ue=B.shouldForwardProp,xe=B.styledComponentId,Pe=B.target,he=function(L,m,Q){L===void 0&&(L=Ze);var S=Qe({},m,{theme:L}),_={};return Q.forEach(function(W){var G,M,oe,ne=W;for(G in St(ne)&&(ne=ne(S)),ne)S[G]=_[G]=G==="className"?(M=_[G],oe=ne[G],M&&oe?M+" "+oe:M||oe):ne[G]}),[S,_]}(ys(A,j.useContext(ga),le)||Ze,A,J),ot=he[0],ke=he[1],we=function(L,m,Q,S){var _=ms(),W=ps(),G=m?L.generateAndInjectStyles(Ze,_,W):L.generateAndInjectStyles(Q,_,W);return G}(ae,ie,ot),it=Z,Ke=ke.$as||A.$as||ke.as||A.as||Pe,ee=qt(Ke),I=ke!==A?Qe({},A,{},ke):A,C={};for(var k in I)k[0]!=="$"&&k!=="as"&&(k==="forwardedAs"?C.as=I[k]:(ue?ue(k,Vr,Ke):!ee||Vr(k))&&(C[k]=I[k]));return A.style&&ke.style!==A.style&&(C.style=Qe({},A.style,{},ke.style)),C.className=Array.prototype.concat(q,xe,we!==xe?we:null,A.className,ke.className).filter(Boolean).join(" "),C.ref=it,j.createElement(Ke,C)}(y,P,O,v)};return T.displayName=g,(y=j.forwardRef(T)).attrs=b,y.componentStyle=p,y.displayName=g,y.shouldForwardProp=E,y.foldedComponentIds=r?Array.prototype.concat(e.foldedComponentIds,e.styledComponentId):Kt,y.styledComponentId=h,y.target=r?e.target:e,y.withComponent=function(P){var O=t.componentId,B=function(Z,ie){if(Z==null)return{};var J,ae,le={},q=Object.keys(Z);for(ae=0;ae<q.length;ae++)J=q[ae],ie.indexOf(J)>=0||(le[J]=Z[J]);return le}(t,["componentId"]),A=O&&O+"-"+(qt(P)?P:In(ra(P)));return ha(P,Qe({},B,{attrs:b,componentId:A}),n)},Object.defineProperty(y,"defaultProps",{get:function(){return this._foldedDefaultProps},set:function(P){this._foldedDefaultProps=r?pa({},e.defaultProps,P):P}}),Object.defineProperty(y,"toString",{value:function(){return"."+y.styledComponentId}}),a&&Gi(y,e,{attrs:!0,componentStyle:!0,displayName:!0,foldedComponentIds:!0,shouldForwardProp:!0,styledComponentId:!0,target:!0,withComponent:!0}),y}var pe=function(e){return function t(n,r,a){if(a===void 0&&(a=Ze),!Kr.isValidElementType(r))return Et(1,String(r));var o=function(){return n(r,a,Bn.apply(void 0,arguments))};return o.withConfig=function(i){return t(n,r,Qe({},a,{},i))},o.attrs=function(i){return t(n,r,Qe({},a,{attrs:Array.prototype.concat(a.attrs,i).filter(Boolean)}))},o}(ha,e)};["a","abbr","address","area","article","aside","audio","b","base","bdi","bdo","big","blockquote","body","br","button","canvas","caption","cite","code","col","colgroup","data","datalist","dd","del","details","dfn","dialog","div","dl","dt","em","embed","fieldset","figcaption","figure","footer","form","h1","h2","h3","h4","h5","h6","head","header","hgroup","hr","html","i","iframe","img","input","ins","kbd","keygen","label","legend","li","link","main","map","mark","marquee","menu","menuitem","meta","meter","nav","noscript","object","ol","optgroup","option","output","p","param","picture","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","small","source","span","strong","style","sub","summary","sup","table","tbody","td","textarea","tfoot","th","thead","time","title","tr","track","u","ul","var","video","wbr","circle","clipPath","defs","ellipse","foreignObject","g","image","line","linearGradient","marker","mask","path","pattern","polygon","polyline","radialGradient","rect","stop","svg","text","textPath","tspan"].forEach(function(e){pe[e]=pe(e)});const Ps=pe.a`
  font-family: Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans,
    sans-serif;
  color: #191919;
  padding: 0.5rem 1rem;
  border-radius: 400rem;
  font-weight: 700;
  font-size: 0.875rem;
  transition: 0.03s ease-in-out;
  cursor: pointer;
  & + a {
    margin-left: 1rem;
  }
  &:hover {
    transform: scale(1.05);
  }
  &.button-light {
    background-color: #bfbfbf !important;
    color: #000000 !important;
  }
  &.button-gold {
    background-color: #ffc627 !important;
    color: #000000 !important;
  }
  &.button-dark {
    background-color: #191919 !important;
    color: #ffffff !important;
  }
  &.button-maroon {
    background-color: #8c1d40 !important;
    color: #ffffff !important;
  }
`,Tt=({href:e,color:t,text:n,classes:r,onClick:a,onFocus:o})=>l.jsx(Ps,{href:e,className:`button-${t} ${r??""}`,onClick:a,onFocus:o,...a&&{role:"button"},children:n});Tt.propTypes={...Yt};const Ts={prefix:"fas",iconName:"bars",icon:[448,512,["navicon"],"f0c9","M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"]},Os={prefix:"fas",iconName:"house",icon:[576,512,[127968,63498,63500,"home","home-alt","home-lg-alt"],"f015","M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"]},Aa={prefix:"fas",iconName:"magnifying-glass",icon:[512,512,[128269,"search"],"f002","M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"]},va={prefix:"fas",iconName:"chevron-down",icon:[512,512,[],"f078","M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"]},ba={prefix:"fas",iconName:"xmark",icon:[384,512,[128473,10005,10006,10060,215,"close","multiply","remove","times"],"f00d","M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"]};var Ls={env:{NODE_ENV:"production"}};function ks(e,t,n){return(t=Bs(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function ya(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter(function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable})),n.push.apply(n,r)}return n}function x(e){for(var t=1;t<arguments.length;t++){var n=arguments[t]!=null?arguments[t]:{};t%2?ya(Object(n),!0).forEach(function(r){ks(e,r,n[r])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):ya(Object(n)).forEach(function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(n,r))})}return e}function Ns(e,t){if(typeof e!="object"||!e)return e;var n=e[Symbol.toPrimitive];if(n!==void 0){var r=n.call(e,t);if(typeof r!="object")return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return(t==="string"?String:Number)(e)}function Bs(e){var t=Ns(e,"string");return typeof t=="symbol"?t:t+""}const xa=()=>{};let Rn={},wa={},Ca=null,Sa={mark:xa,measure:xa};try{typeof window<"u"&&(Rn=window),typeof document<"u"&&(wa=document),typeof MutationObserver<"u"&&(Ca=MutationObserver),typeof performance<"u"&&(Sa=performance)}catch{}const{userAgent:Ea=""}=Rn.navigator||{},qe=Rn,$=wa,Pa=Ca,_t=Sa;qe.document;const We=!!$.documentElement&&!!$.head&&typeof $.addEventListener=="function"&&typeof $.createElement=="function",Ta=~Ea.indexOf("MSIE")||~Ea.indexOf("Trident/");var Is=/fa(s|r|l|t|d|dr|dl|dt|b|k|kd|ss|sr|sl|st|sds|sdr|sdl|sdt)?[\-\ ]/,Ds=/Font ?Awesome ?([56 ]*)(Solid|Regular|Light|Thin|Duotone|Brands|Free|Pro|Sharp Duotone|Sharp|Kit)?.*/i,Oa={classic:{fa:"solid",fas:"solid","fa-solid":"solid",far:"regular","fa-regular":"regular",fal:"light","fa-light":"light",fat:"thin","fa-thin":"thin",fab:"brands","fa-brands":"brands"},duotone:{fa:"solid",fad:"solid","fa-solid":"solid","fa-duotone":"solid",fadr:"regular","fa-regular":"regular",fadl:"light","fa-light":"light",fadt:"thin","fa-thin":"thin"},sharp:{fa:"solid",fass:"solid","fa-solid":"solid",fasr:"regular","fa-regular":"regular",fasl:"light","fa-light":"light",fast:"thin","fa-thin":"thin"},"sharp-duotone":{fa:"solid",fasds:"solid","fa-solid":"solid",fasdr:"regular","fa-regular":"regular",fasdl:"light","fa-light":"light",fasdt:"thin","fa-thin":"thin"}},Fs={GROUP:"duotone-group",PRIMARY:"primary",SECONDARY:"secondary"},La=["fa-classic","fa-duotone","fa-sharp","fa-sharp-duotone"],ge="classic",$t="duotone",Rs="sharp",Ms="sharp-duotone",ka=[ge,$t,Rs,Ms],js={classic:{900:"fas",400:"far",normal:"far",300:"fal",100:"fat"},duotone:{900:"fad",400:"fadr",300:"fadl",100:"fadt"},sharp:{900:"fass",400:"fasr",300:"fasl",100:"fast"},"sharp-duotone":{900:"fasds",400:"fasdr",300:"fasdl",100:"fasdt"}},Hs={"Font Awesome 6 Free":{900:"fas",400:"far"},"Font Awesome 6 Pro":{900:"fas",400:"far",normal:"far",300:"fal",100:"fat"},"Font Awesome 6 Brands":{400:"fab",normal:"fab"},"Font Awesome 6 Duotone":{900:"fad",400:"fadr",normal:"fadr",300:"fadl",100:"fadt"},"Font Awesome 6 Sharp":{900:"fass",400:"fasr",normal:"fasr",300:"fasl",100:"fast"},"Font Awesome 6 Sharp Duotone":{900:"fasds",400:"fasdr",normal:"fasdr",300:"fasdl",100:"fasdt"}},zs=new Map([["classic",{defaultShortPrefixId:"fas",defaultStyleId:"solid",styleIds:["solid","regular","light","thin","brands"],futureStyleIds:[],defaultFontWeight:900}],["sharp",{defaultShortPrefixId:"fass",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}],["duotone",{defaultShortPrefixId:"fad",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}],["sharp-duotone",{defaultShortPrefixId:"fasds",defaultStyleId:"solid",styleIds:["solid","regular","light","thin"],futureStyleIds:[],defaultFontWeight:900}]]),Xs={classic:{solid:"fas",regular:"far",light:"fal",thin:"fat",brands:"fab"},duotone:{solid:"fad",regular:"fadr",light:"fadl",thin:"fadt"},sharp:{solid:"fass",regular:"fasr",light:"fasl",thin:"fast"},"sharp-duotone":{solid:"fasds",regular:"fasdr",light:"fasdl",thin:"fasdt"}},Us=["fak","fa-kit","fakd","fa-kit-duotone"],Na={kit:{fak:"kit","fa-kit":"kit"},"kit-duotone":{fakd:"kit-duotone","fa-kit-duotone":"kit-duotone"}},Qs=["kit"],Ws={kit:{"fa-kit":"fak"}},Gs=["fak","fakd"],Ys={kit:{fak:"fa-kit"}},Ba={kit:{kit:"fak"},"kit-duotone":{"kit-duotone":"fakd"}},en={GROUP:"duotone-group",SWAP_OPACITY:"swap-opacity",PRIMARY:"primary",SECONDARY:"secondary"},Ks=["fa-classic","fa-duotone","fa-sharp","fa-sharp-duotone"],Vs=["fak","fa-kit","fakd","fa-kit-duotone"],Js={"Font Awesome Kit":{400:"fak",normal:"fak"},"Font Awesome Kit Duotone":{400:"fakd",normal:"fakd"}},Zs={classic:{"fa-brands":"fab","fa-duotone":"fad","fa-light":"fal","fa-regular":"far","fa-solid":"fas","fa-thin":"fat"},duotone:{"fa-regular":"fadr","fa-light":"fadl","fa-thin":"fadt"},sharp:{"fa-solid":"fass","fa-regular":"fasr","fa-light":"fasl","fa-thin":"fast"},"sharp-duotone":{"fa-solid":"fasds","fa-regular":"fasdr","fa-light":"fasdl","fa-thin":"fasdt"}},qs={classic:["fas","far","fal","fat","fad"],duotone:["fadr","fadl","fadt"],sharp:["fass","fasr","fasl","fast"],"sharp-duotone":["fasds","fasdr","fasdl","fasdt"]},Mn={classic:{fab:"fa-brands",fad:"fa-duotone",fal:"fa-light",far:"fa-regular",fas:"fa-solid",fat:"fa-thin"},duotone:{fadr:"fa-regular",fadl:"fa-light",fadt:"fa-thin"},sharp:{fass:"fa-solid",fasr:"fa-regular",fasl:"fa-light",fast:"fa-thin"},"sharp-duotone":{fasds:"fa-solid",fasdr:"fa-regular",fasdl:"fa-light",fasdt:"fa-thin"}},_s=["fa-solid","fa-regular","fa-light","fa-thin","fa-duotone","fa-brands"],jn=["fa","fas","far","fal","fat","fad","fadr","fadl","fadt","fab","fass","fasr","fasl","fast","fasds","fasdr","fasdl","fasdt",...Ks,..._s],$s=["solid","regular","light","thin","duotone","brands"],Ia=[1,2,3,4,5,6,7,8,9,10],ec=Ia.concat([11,12,13,14,15,16,17,18,19,20]),tc=[...Object.keys(qs),...$s,"2xs","xs","sm","lg","xl","2xl","beat","border","fade","beat-fade","bounce","flip-both","flip-horizontal","flip-vertical","flip","fw","inverse","layers-counter","layers-text","layers","li","pull-left","pull-right","pulse","rotate-180","rotate-270","rotate-90","rotate-by","shake","spin-pulse","spin-reverse","spin","stack-1x","stack-2x","stack","ul",en.GROUP,en.SWAP_OPACITY,en.PRIMARY,en.SECONDARY].concat(Ia.map(e=>"".concat(e,"x"))).concat(ec.map(e=>"w-".concat(e))),nc={"Font Awesome 5 Free":{900:"fas",400:"far"},"Font Awesome 5 Pro":{900:"fas",400:"far",normal:"far",300:"fal"},"Font Awesome 5 Brands":{400:"fab",normal:"fab"},"Font Awesome 5 Duotone":{900:"fad"}};const Ge="___FONT_AWESOME___",Hn=16,Da="fa",Fa="svg-inline--fa",tt="data-fa-i2svg",zn="data-fa-pseudo-element",rc="data-fa-pseudo-element-pending",Xn="data-prefix",Un="data-icon",Ra="fontawesome-i2svg",ac="async",oc=["HTML","HEAD","STYLE","SCRIPT"],Ma=(()=>{try{return Ls.env.NODE_ENV==="production"}catch{return!1}})();function Ot(e){return new Proxy(e,{get(t,n){return n in t?t[n]:t[ge]}})}const ja=x({},Oa);ja[ge]=x(x(x(x({},{"fa-duotone":"duotone"}),Oa[ge]),Na.kit),Na["kit-duotone"]);const ic=Ot(ja),Qn=x({},Xs);Qn[ge]=x(x(x(x({},{duotone:"fad"}),Qn[ge]),Ba.kit),Ba["kit-duotone"]);const Ha=Ot(Qn),Wn=x({},Mn);Wn[ge]=x(x({},Wn[ge]),Ys.kit);const Gn=Ot(Wn),Yn=x({},Zs);Yn[ge]=x(x({},Yn[ge]),Ws.kit),Ot(Yn);const sc=Is,za="fa-layers-text",cc=Ds,lc=x({},js);Ot(lc);const fc=["class","data-prefix","data-icon","data-fa-transform","data-fa-mask"],Kn=Fs,uc=[...Qs,...tc],Lt=qe.FontAwesomeConfig||{};function dc(e){var t=$.querySelector("script["+e+"]");if(t)return t.getAttribute(e)}function mc(e){return e===""?!0:e==="false"?!1:e==="true"?!0:e}$&&typeof $.querySelector=="function"&&[["data-family-prefix","familyPrefix"],["data-css-prefix","cssPrefix"],["data-family-default","familyDefault"],["data-style-default","styleDefault"],["data-replacement-class","replacementClass"],["data-auto-replace-svg","autoReplaceSvg"],["data-auto-add-css","autoAddCss"],["data-auto-a11y","autoA11y"],["data-search-pseudo-elements","searchPseudoElements"],["data-observe-mutations","observeMutations"],["data-mutate-approach","mutateApproach"],["data-keep-original-source","keepOriginalSource"],["data-measure-performance","measurePerformance"],["data-show-missing-icons","showMissingIcons"]].forEach(t=>{let[n,r]=t;const a=mc(dc(n));a!=null&&(Lt[r]=a)});const Xa={styleDefault:"solid",familyDefault:ge,cssPrefix:Da,replacementClass:Fa,autoReplaceSvg:!0,autoAddCss:!0,autoA11y:!0,searchPseudoElements:!1,observeMutations:!0,mutateApproach:"async",keepOriginalSource:!0,measurePerformance:!1,showMissingIcons:!0};Lt.familyPrefix&&(Lt.cssPrefix=Lt.familyPrefix);const dt=x(x({},Xa),Lt);dt.autoReplaceSvg||(dt.observeMutations=!1);const D={};Object.keys(Xa).forEach(e=>{Object.defineProperty(D,e,{enumerable:!0,set:function(t){dt[e]=t,kt.forEach(n=>n(D))},get:function(){return dt[e]}})}),Object.defineProperty(D,"familyPrefix",{enumerable:!0,set:function(e){dt.cssPrefix=e,kt.forEach(t=>t(D))},get:function(){return dt.cssPrefix}}),qe.FontAwesomeConfig=D;const kt=[];function pc(e){return kt.push(e),()=>{kt.splice(kt.indexOf(e),1)}}const _e=Hn,Fe={size:16,x:0,y:0,rotate:0,flipX:!1,flipY:!1};function gc(e){if(!e||!We)return;const t=$.createElement("style");t.setAttribute("type","text/css"),t.innerHTML=e;const n=$.head.childNodes;let r=null;for(let a=n.length-1;a>-1;a--){const o=n[a],i=(o.tagName||"").toUpperCase();["STYLE","LINK"].indexOf(i)>-1&&(r=o)}return $.head.insertBefore(t,r),e}const hc="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";function Nt(){let e=12,t="";for(;e-- >0;)t+=hc[Math.random()*62|0];return t}function mt(e){const t=[];for(let n=(e||[]).length>>>0;n--;)t[n]=e[n];return t}function Vn(e){return e.classList?mt(e.classList):(e.getAttribute("class")||"").split(" ").filter(t=>t)}function Ua(e){return"".concat(e).replace(/&/g,"&amp;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/</g,"&lt;").replace(/>/g,"&gt;")}function Ac(e){return Object.keys(e||{}).reduce((t,n)=>t+"".concat(n,'="').concat(Ua(e[n]),'" '),"").trim()}function tn(e){return Object.keys(e||{}).reduce((t,n)=>t+"".concat(n,": ").concat(e[n].trim(),";"),"")}function Jn(e){return e.size!==Fe.size||e.x!==Fe.x||e.y!==Fe.y||e.rotate!==Fe.rotate||e.flipX||e.flipY}function vc(e){let{transform:t,containerWidth:n,iconWidth:r}=e;const a={transform:"translate(".concat(n/2," 256)")},o="translate(".concat(t.x*32,", ").concat(t.y*32,") "),i="scale(".concat(t.size/16*(t.flipX?-1:1),", ").concat(t.size/16*(t.flipY?-1:1),") "),s="rotate(".concat(t.rotate," 0 0)"),u={transform:"".concat(o," ").concat(i," ").concat(s)},f={transform:"translate(".concat(r/2*-1," -256)")};return{outer:a,inner:u,path:f}}function bc(e){let{transform:t,width:n=Hn,height:r=Hn,startCentered:a=!1}=e,o="";return a&&Ta?o+="translate(".concat(t.x/_e-n/2,"em, ").concat(t.y/_e-r/2,"em) "):a?o+="translate(calc(-50% + ".concat(t.x/_e,"em), calc(-50% + ").concat(t.y/_e,"em)) "):o+="translate(".concat(t.x/_e,"em, ").concat(t.y/_e,"em) "),o+="scale(".concat(t.size/_e*(t.flipX?-1:1),", ").concat(t.size/_e*(t.flipY?-1:1),") "),o+="rotate(".concat(t.rotate,"deg) "),o}var yc=`:root, :host {
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
}`;function Qa(){const e=Da,t=Fa,n=D.cssPrefix,r=D.replacementClass;let a=yc;if(n!==e||r!==t){const o=new RegExp("\\.".concat(e,"\\-"),"g"),i=new RegExp("\\--".concat(e,"\\-"),"g"),s=new RegExp("\\.".concat(t),"g");a=a.replace(o,".".concat(n,"-")).replace(i,"--".concat(n,"-")).replace(s,".".concat(r))}return a}let Wa=!1;function Zn(){D.autoAddCss&&!Wa&&(gc(Qa()),Wa=!0)}var xc={mixout(){return{dom:{css:Qa,insertCss:Zn}}},hooks(){return{beforeDOMElementCreation(){Zn()},beforeI2svg(){Zn()}}}};const Ye=qe||{};Ye[Ge]||(Ye[Ge]={}),Ye[Ge].styles||(Ye[Ge].styles={}),Ye[Ge].hooks||(Ye[Ge].hooks={}),Ye[Ge].shims||(Ye[Ge].shims=[]);var Re=Ye[Ge];const Ga=[],Ya=function(){$.removeEventListener("DOMContentLoaded",Ya),nn=1,Ga.map(e=>e())};let nn=!1;We&&(nn=($.documentElement.doScroll?/^loaded|^c/:/^loaded|^i|^c/).test($.readyState),nn||$.addEventListener("DOMContentLoaded",Ya));function wc(e){We&&(nn?setTimeout(e,0):Ga.push(e))}function Bt(e){const{tag:t,attributes:n={},children:r=[]}=e;return typeof e=="string"?Ua(e):"<".concat(t," ").concat(Ac(n),">").concat(r.map(Bt).join(""),"</").concat(t,">")}function Ka(e,t,n){if(e&&e[t]&&e[t][n])return{prefix:t,iconName:n,icon:e[t][n]}}var qn=function(t,n,r,a){var o=Object.keys(t),i=o.length,s=n,u,f,g;for(r===void 0?(u=1,g=t[o[0]]):(u=0,g=r);u<i;u++)f=o[u],g=s(g,t[f],f,t);return g};function Cc(e){const t=[];let n=0;const r=e.length;for(;n<r;){const a=e.charCodeAt(n++);if(a>=55296&&a<=56319&&n<r){const o=e.charCodeAt(n++);(o&64512)==56320?t.push(((a&1023)<<10)+(o&1023)+65536):(t.push(a),n--)}else t.push(a)}return t}function _n(e){const t=Cc(e);return t.length===1?t[0].toString(16):null}function Sc(e,t){const n=e.length;let r=e.charCodeAt(t),a;return r>=55296&&r<=56319&&n>t+1&&(a=e.charCodeAt(t+1),a>=56320&&a<=57343)?(r-55296)*1024+a-56320+65536:r}function Va(e){return Object.keys(e).reduce((t,n)=>{const r=e[n];return!!r.icon?t[r.iconName]=r.icon:t[n]=r,t},{})}function $n(e,t){let n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:{};const{skipHooks:r=!1}=n,a=Va(t);typeof Re.hooks.addPack=="function"&&!r?Re.hooks.addPack(e,Va(t)):Re.styles[e]=x(x({},Re.styles[e]||{}),a),e==="fas"&&$n("fa",t)}const{styles:It,shims:Ec}=Re,Ja=Object.keys(Gn),Pc=Ja.reduce((e,t)=>(e[t]=Object.keys(Gn[t]),e),{});let er=null,Za={},qa={},_a={},$a={},eo={};function Tc(e){return~uc.indexOf(e)}function Oc(e,t){const n=t.split("-"),r=n[0],a=n.slice(1).join("-");return r===e&&a!==""&&!Tc(a)?a:null}const to=()=>{const e=r=>qn(It,(a,o,i)=>(a[i]=qn(o,r,{}),a),{});Za=e((r,a,o)=>(a[3]&&(r[a[3]]=o),a[2]&&a[2].filter(s=>typeof s=="number").forEach(s=>{r[s.toString(16)]=o}),r)),qa=e((r,a,o)=>(r[o]=o,a[2]&&a[2].filter(s=>typeof s=="string").forEach(s=>{r[s]=o}),r)),eo=e((r,a,o)=>{const i=a[2];return r[o]=o,i.forEach(s=>{r[s]=o}),r});const t="far"in It||D.autoFetchSvg,n=qn(Ec,(r,a)=>{const o=a[0];let i=a[1];const s=a[2];return i==="far"&&!t&&(i="fas"),typeof o=="string"&&(r.names[o]={prefix:i,iconName:s}),typeof o=="number"&&(r.unicodes[o.toString(16)]={prefix:i,iconName:s}),r},{names:{},unicodes:{}});_a=n.names,$a=n.unicodes,er=rn(D.styleDefault,{family:D.familyDefault})};pc(e=>{er=rn(e.styleDefault,{family:D.familyDefault})}),to();function tr(e,t){return(Za[e]||{})[t]}function Lc(e,t){return(qa[e]||{})[t]}function nt(e,t){return(eo[e]||{})[t]}function no(e){return _a[e]||{prefix:null,iconName:null}}function kc(e){const t=$a[e],n=tr("fas",e);return t||(n?{prefix:"fas",iconName:n}:null)||{prefix:null,iconName:null}}function $e(){return er}const ro=()=>({prefix:null,iconName:null,rest:[]});function Nc(e){let t=ge;const n=Ja.reduce((r,a)=>(r[a]="".concat(D.cssPrefix,"-").concat(a),r),{});return ka.forEach(r=>{(e.includes(n[r])||e.some(a=>Pc[r].includes(a)))&&(t=r)}),t}function rn(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{family:n=ge}=t,r=ic[n][e];if(n===$t&&!e)return"fad";const a=Ha[n][e]||Ha[n][r],o=e in Re.styles?e:null;return a||o||null}function Bc(e){let t=[],n=null;return e.forEach(r=>{const a=Oc(D.cssPrefix,r);a?n=a:r&&t.push(r)}),{iconName:n,rest:t}}function ao(e){return e.sort().filter((t,n,r)=>r.indexOf(t)===n)}function an(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{skipLookups:n=!1}=t;let r=null;const a=jn.concat(Vs),o=ao(e.filter(h=>a.includes(h))),i=ao(e.filter(h=>!jn.includes(h))),s=o.filter(h=>(r=h,!La.includes(h))),[u=null]=s,f=Nc(o),g=x(x({},Bc(i)),{},{prefix:rn(u,{family:f})});return x(x(x({},g),Rc({values:e,family:f,styles:It,config:D,canonical:g,givenPrefix:r})),Ic(n,r,g))}function Ic(e,t,n){let{prefix:r,iconName:a}=n;if(e||!r||!a)return{prefix:r,iconName:a};const o=t==="fa"?no(a):{},i=nt(r,a);return a=o.iconName||i||a,r=o.prefix||r,r==="far"&&!It.far&&It.fas&&!D.autoFetchSvg&&(r="fas"),{prefix:r,iconName:a}}const Dc=ka.filter(e=>e!==ge||e!==$t),Fc=Object.keys(Mn).filter(e=>e!==ge).map(e=>Object.keys(Mn[e])).flat();function Rc(e){const{values:t,family:n,canonical:r,givenPrefix:a="",styles:o={},config:i={}}=e,s=n===$t,u=t.includes("fa-duotone")||t.includes("fad"),f=i.familyDefault==="duotone",g=r.prefix==="fad"||r.prefix==="fa-duotone";if(!s&&(u||f||g)&&(r.prefix="fad"),(t.includes("fa-brands")||t.includes("fab"))&&(r.prefix="fab"),!r.prefix&&Dc.includes(n)&&(Object.keys(o).find(b=>Fc.includes(b))||i.autoFetchSvg)){const b=zs.get(n).defaultShortPrefixId;r.prefix=b,r.iconName=nt(r.prefix,r.iconName)||r.iconName}return(r.prefix==="fa"||a==="fa")&&(r.prefix=$e()||"fas"),r}class Mc{constructor(){this.definitions={}}add(){for(var t=arguments.length,n=new Array(t),r=0;r<t;r++)n[r]=arguments[r];const a=n.reduce(this._pullDefinitions,{});Object.keys(a).forEach(o=>{this.definitions[o]=x(x({},this.definitions[o]||{}),a[o]),$n(o,a[o]);const i=Gn[ge][o];i&&$n(i,a[o]),to()})}reset(){this.definitions={}}_pullDefinitions(t,n){const r=n.prefix&&n.iconName&&n.icon?{0:n}:n;return Object.keys(r).map(a=>{const{prefix:o,iconName:i,icon:s}=r[a],u=s[2];t[o]||(t[o]={}),u.length>0&&u.forEach(f=>{typeof f=="string"&&(t[o][f]=s)}),t[o][i]=s}),t}}let oo=[],pt={};const gt={},jc=Object.keys(gt);function Hc(e,t){let{mixoutsTo:n}=t;return oo=e,pt={},Object.keys(gt).forEach(r=>{jc.indexOf(r)===-1&&delete gt[r]}),oo.forEach(r=>{const a=r.mixout?r.mixout():{};if(Object.keys(a).forEach(o=>{typeof a[o]=="function"&&(n[o]=a[o]),typeof a[o]=="object"&&Object.keys(a[o]).forEach(i=>{n[o]||(n[o]={}),n[o][i]=a[o][i]})}),r.hooks){const o=r.hooks();Object.keys(o).forEach(i=>{pt[i]||(pt[i]=[]),pt[i].push(o[i])})}r.provides&&r.provides(gt)}),n}function nr(e,t){for(var n=arguments.length,r=new Array(n>2?n-2:0),a=2;a<n;a++)r[a-2]=arguments[a];return(pt[e]||[]).forEach(i=>{t=i.apply(null,[t,...r])}),t}function rt(e){for(var t=arguments.length,n=new Array(t>1?t-1:0),r=1;r<t;r++)n[r-1]=arguments[r];(pt[e]||[]).forEach(o=>{o.apply(null,n)})}function et(){const e=arguments[0],t=Array.prototype.slice.call(arguments,1);return gt[e]?gt[e].apply(null,t):void 0}function rr(e){e.prefix==="fa"&&(e.prefix="fas");let{iconName:t}=e;const n=e.prefix||$e();if(t)return t=nt(n,t)||t,Ka(io.definitions,n,t)||Ka(Re.styles,n,t)}const io=new Mc,Le={noAuto:()=>{D.autoReplaceSvg=!1,D.observeMutations=!1,rt("noAuto")},config:D,dom:{i2svg:function(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};return We?(rt("beforeI2svg",e),et("pseudoElements2svg",e),et("i2svg",e)):Promise.reject(new Error("Operation requires a DOM of some kind."))},watch:function(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};const{autoReplaceSvgRoot:t}=e;D.autoReplaceSvg===!1&&(D.autoReplaceSvg=!0),D.observeMutations=!0,wc(()=>{zc({autoReplaceSvgRoot:t}),rt("watch",e)})}},parse:{icon:e=>{if(e===null)return null;if(typeof e=="object"&&e.prefix&&e.iconName)return{prefix:e.prefix,iconName:nt(e.prefix,e.iconName)||e.iconName};if(Array.isArray(e)&&e.length===2){const t=e[1].indexOf("fa-")===0?e[1].slice(3):e[1],n=rn(e[0]);return{prefix:n,iconName:nt(n,t)||t}}if(typeof e=="string"&&(e.indexOf("".concat(D.cssPrefix,"-"))>-1||e.match(sc))){const t=an(e.split(" "),{skipLookups:!0});return{prefix:t.prefix||$e(),iconName:nt(t.prefix,t.iconName)||t.iconName}}if(typeof e=="string"){const t=$e();return{prefix:t,iconName:nt(t,e)||e}}}},library:io,findIconDefinition:rr,toHtml:Bt},zc=function(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};const{autoReplaceSvgRoot:t=$}=e;(Object.keys(Re.styles).length>0||D.autoFetchSvg)&&We&&D.autoReplaceSvg&&Le.dom.i2svg({node:t})};function on(e,t){return Object.defineProperty(e,"abstract",{get:t}),Object.defineProperty(e,"html",{get:function(){return e.abstract.map(n=>Bt(n))}}),Object.defineProperty(e,"node",{get:function(){if(!We)return;const n=$.createElement("div");return n.innerHTML=e.html,n.children}}),e}function Xc(e){let{children:t,main:n,mask:r,attributes:a,styles:o,transform:i}=e;if(Jn(i)&&n.found&&!r.found){const{width:s,height:u}=n,f={x:s/u/2,y:.5};a.style=tn(x(x({},o),{},{"transform-origin":"".concat(f.x+i.x/16,"em ").concat(f.y+i.y/16,"em")}))}return[{tag:"svg",attributes:a,children:t}]}function Uc(e){let{prefix:t,iconName:n,children:r,attributes:a,symbol:o}=e;const i=o===!0?"".concat(t,"-").concat(D.cssPrefix,"-").concat(n):o;return[{tag:"svg",attributes:{style:"display: none;"},children:[{tag:"symbol",attributes:x(x({},a),{},{id:i}),children:r}]}]}function ar(e){const{icons:{main:t,mask:n},prefix:r,iconName:a,transform:o,symbol:i,title:s,maskId:u,titleId:f,extra:g,watchable:h=!1}=e,{width:b,height:E}=n.found?n:t,y=Gs.includes(r),p=[D.replacementClass,a?"".concat(D.cssPrefix,"-").concat(a):""].filter(A=>g.classes.indexOf(A)===-1).filter(A=>A!==""||!!A).concat(g.classes).join(" ");let v={children:[],attributes:x(x({},g.attributes),{},{"data-prefix":r,"data-icon":a,class:p,role:g.attributes.role||"img",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 ".concat(b," ").concat(E)})};const T=y&&!~g.classes.indexOf("fa-fw")?{width:"".concat(b/E*16*.0625,"em")}:{};h&&(v.attributes[tt]=""),s&&(v.children.push({tag:"title",attributes:{id:v.attributes["aria-labelledby"]||"title-".concat(f||Nt())},children:[s]}),delete v.attributes.title);const P=x(x({},v),{},{prefix:r,iconName:a,main:t,mask:n,maskId:u,transform:o,symbol:i,styles:x(x({},T),g.styles)}),{children:O,attributes:B}=n.found&&t.found?et("generateAbstractMask",P)||{children:[],attributes:{}}:et("generateAbstractIcon",P)||{children:[],attributes:{}};return P.children=O,P.attributes=B,i?Uc(P):Xc(P)}function so(e){const{content:t,width:n,height:r,transform:a,title:o,extra:i,watchable:s=!1}=e,u=x(x(x({},i.attributes),o?{title:o}:{}),{},{class:i.classes.join(" ")});s&&(u[tt]="");const f=x({},i.styles);Jn(a)&&(f.transform=bc({transform:a,startCentered:!0,width:n,height:r}),f["-webkit-transform"]=f.transform);const g=tn(f);g.length>0&&(u.style=g);const h=[];return h.push({tag:"span",attributes:u,children:[t]}),o&&h.push({tag:"span",attributes:{class:"sr-only"},children:[o]}),h}function Qc(e){const{content:t,title:n,extra:r}=e,a=x(x(x({},r.attributes),n?{title:n}:{}),{},{class:r.classes.join(" ")}),o=tn(r.styles);o.length>0&&(a.style=o);const i=[];return i.push({tag:"span",attributes:a,children:[t]}),n&&i.push({tag:"span",attributes:{class:"sr-only"},children:[n]}),i}const{styles:or}=Re;function ir(e){const t=e[0],n=e[1],[r]=e.slice(4);let a=null;return Array.isArray(r)?a={tag:"g",attributes:{class:"".concat(D.cssPrefix,"-").concat(Kn.GROUP)},children:[{tag:"path",attributes:{class:"".concat(D.cssPrefix,"-").concat(Kn.SECONDARY),fill:"currentColor",d:r[0]}},{tag:"path",attributes:{class:"".concat(D.cssPrefix,"-").concat(Kn.PRIMARY),fill:"currentColor",d:r[1]}}]}:a={tag:"path",attributes:{fill:"currentColor",d:r}},{found:!0,width:t,height:n,icon:a}}const Wc={found:!1,width:512,height:512};function Gc(e,t){!Ma&&!D.showMissingIcons&&e&&console.error('Icon with name "'.concat(e,'" and prefix "').concat(t,'" is missing.'))}function sr(e,t){let n=t;return t==="fa"&&D.styleDefault!==null&&(t=$e()),new Promise((r,a)=>{if(n==="fa"){const o=no(e)||{};e=o.iconName||e,t=o.prefix||t}if(e&&t&&or[t]&&or[t][e]){const o=or[t][e];return r(ir(o))}Gc(e,t),r(x(x({},Wc),{},{icon:D.showMissingIcons&&e?et("missingIconAbstract")||{}:{}}))})}const co=()=>{},cr=D.measurePerformance&&_t&&_t.mark&&_t.measure?_t:{mark:co,measure:co},Dt='FA "6.7.2"',Yc=e=>(cr.mark("".concat(Dt," ").concat(e," begins")),()=>lo(e)),lo=e=>{cr.mark("".concat(Dt," ").concat(e," ends")),cr.measure("".concat(Dt," ").concat(e),"".concat(Dt," ").concat(e," begins"),"".concat(Dt," ").concat(e," ends"))};var lr={begin:Yc,end:lo};const sn=()=>{};function fo(e){return typeof(e.getAttribute?e.getAttribute(tt):null)=="string"}function Kc(e){const t=e.getAttribute?e.getAttribute(Xn):null,n=e.getAttribute?e.getAttribute(Un):null;return t&&n}function Vc(e){return e&&e.classList&&e.classList.contains&&e.classList.contains(D.replacementClass)}function Jc(){return D.autoReplaceSvg===!0?cn.replace:cn[D.autoReplaceSvg]||cn.replace}function Zc(e){return $.createElementNS("http://www.w3.org/2000/svg",e)}function qc(e){return $.createElement(e)}function uo(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{ceFn:n=e.tag==="svg"?Zc:qc}=t;if(typeof e=="string")return $.createTextNode(e);const r=n(e.tag);return Object.keys(e.attributes||[]).forEach(function(o){r.setAttribute(o,e.attributes[o])}),(e.children||[]).forEach(function(o){r.appendChild(uo(o,{ceFn:n}))}),r}function _c(e){let t=" ".concat(e.outerHTML," ");return t="".concat(t,"Font Awesome fontawesome.com "),t}const cn={replace:function(e){const t=e[0];if(t.parentNode)if(e[1].forEach(n=>{t.parentNode.insertBefore(uo(n),t)}),t.getAttribute(tt)===null&&D.keepOriginalSource){let n=$.createComment(_c(t));t.parentNode.replaceChild(n,t)}else t.remove()},nest:function(e){const t=e[0],n=e[1];if(~Vn(t).indexOf(D.replacementClass))return cn.replace(e);const r=new RegExp("".concat(D.cssPrefix,"-.*"));if(delete n[0].attributes.id,n[0].attributes.class){const o=n[0].attributes.class.split(" ").reduce((i,s)=>(s===D.replacementClass||s.match(r)?i.toSvg.push(s):i.toNode.push(s),i),{toNode:[],toSvg:[]});n[0].attributes.class=o.toSvg.join(" "),o.toNode.length===0?t.removeAttribute("class"):t.setAttribute("class",o.toNode.join(" "))}const a=n.map(o=>Bt(o)).join(`
`);t.setAttribute(tt,""),t.innerHTML=a}};function mo(e){e()}function po(e,t){const n=typeof t=="function"?t:sn;if(e.length===0)n();else{let r=mo;D.mutateApproach===ac&&(r=qe.requestAnimationFrame||mo),r(()=>{const a=Jc(),o=lr.begin("mutate");e.map(a),o(),n()})}}let fr=!1;function go(){fr=!0}function ur(){fr=!1}let ln=null;function ho(e){if(!Pa||!D.observeMutations)return;const{treeCallback:t=sn,nodeCallback:n=sn,pseudoElementsCallback:r=sn,observeMutationsRoot:a=$}=e;ln=new Pa(o=>{if(fr)return;const i=$e();mt(o).forEach(s=>{if(s.type==="childList"&&s.addedNodes.length>0&&!fo(s.addedNodes[0])&&(D.searchPseudoElements&&r(s.target),t(s.target)),s.type==="attributes"&&s.target.parentNode&&D.searchPseudoElements&&r(s.target.parentNode),s.type==="attributes"&&fo(s.target)&&~fc.indexOf(s.attributeName))if(s.attributeName==="class"&&Kc(s.target)){const{prefix:u,iconName:f}=an(Vn(s.target));s.target.setAttribute(Xn,u||i),f&&s.target.setAttribute(Un,f)}else Vc(s.target)&&n(s.target)})}),We&&ln.observe(a,{childList:!0,attributes:!0,characterData:!0,subtree:!0})}function $c(){ln&&ln.disconnect()}function el(e){const t=e.getAttribute("style");let n=[];return t&&(n=t.split(";").reduce((r,a)=>{const o=a.split(":"),i=o[0],s=o.slice(1);return i&&s.length>0&&(r[i]=s.join(":").trim()),r},{})),n}function tl(e){const t=e.getAttribute("data-prefix"),n=e.getAttribute("data-icon"),r=e.innerText!==void 0?e.innerText.trim():"";let a=an(Vn(e));return a.prefix||(a.prefix=$e()),t&&n&&(a.prefix=t,a.iconName=n),a.iconName&&a.prefix||(a.prefix&&r.length>0&&(a.iconName=Lc(a.prefix,e.innerText)||tr(a.prefix,_n(e.innerText))),!a.iconName&&D.autoFetchSvg&&e.firstChild&&e.firstChild.nodeType===Node.TEXT_NODE&&(a.iconName=e.firstChild.data)),a}function nl(e){const t=mt(e.attributes).reduce((a,o)=>(a.name!=="class"&&a.name!=="style"&&(a[o.name]=o.value),a),{}),n=e.getAttribute("title"),r=e.getAttribute("data-fa-title-id");return D.autoA11y&&(n?t["aria-labelledby"]="".concat(D.replacementClass,"-title-").concat(r||Nt()):(t["aria-hidden"]="true",t.focusable="false")),t}function rl(){return{iconName:null,title:null,titleId:null,prefix:null,transform:Fe,symbol:!1,mask:{iconName:null,prefix:null,rest:[]},maskId:null,extra:{classes:[],styles:{},attributes:{}}}}function Ao(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{styleParser:!0};const{iconName:n,prefix:r,rest:a}=tl(e),o=nl(e),i=nr("parseNodeAttributes",{},e);let s=t.styleParser?el(e):[];return x({iconName:n,title:e.getAttribute("title"),titleId:e.getAttribute("data-fa-title-id"),prefix:r,transform:Fe,mask:{iconName:null,prefix:null,rest:[]},maskId:null,symbol:!1,extra:{classes:a,styles:s,attributes:o}},i)}const{styles:al}=Re;function vo(e){const t=D.autoReplaceSvg==="nest"?Ao(e,{styleParser:!1}):Ao(e);return~t.extra.classes.indexOf(za)?et("generateLayersText",e,t):et("generateSvgReplacementMutation",e,t)}function ol(){return[...Us,...jn]}function bo(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:null;if(!We)return Promise.resolve();const n=$.documentElement.classList,r=g=>n.add("".concat(Ra,"-").concat(g)),a=g=>n.remove("".concat(Ra,"-").concat(g)),o=D.autoFetchSvg?ol():La.concat(Object.keys(al));o.includes("fa")||o.push("fa");const i=[".".concat(za,":not([").concat(tt,"])")].concat(o.map(g=>".".concat(g,":not([").concat(tt,"])"))).join(", ");if(i.length===0)return Promise.resolve();let s=[];try{s=mt(e.querySelectorAll(i))}catch{}if(s.length>0)r("pending"),a("complete");else return Promise.resolve();const u=lr.begin("onTree"),f=s.reduce((g,h)=>{try{const b=vo(h);b&&g.push(b)}catch(b){Ma||b.name==="MissingIcon"&&console.error(b)}return g},[]);return new Promise((g,h)=>{Promise.all(f).then(b=>{po(b,()=>{r("active"),r("complete"),a("pending"),typeof t=="function"&&t(),u(),g()})}).catch(b=>{u(),h(b)})})}function il(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:null;vo(e).then(n=>{n&&po([n],t)})}function sl(e){return function(t){let n=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const r=(t||{}).icon?t:rr(t||{});let{mask:a}=n;return a&&(a=(a||{}).icon?a:rr(a||{})),e(r,x(x({},n),{},{mask:a}))}}const cl=function(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{transform:n=Fe,symbol:r=!1,mask:a=null,maskId:o=null,title:i=null,titleId:s=null,classes:u=[],attributes:f={},styles:g={}}=t;if(!e)return;const{prefix:h,iconName:b,icon:E}=e;return on(x({type:"icon"},e),()=>(rt("beforeDOMElementCreation",{iconDefinition:e,params:t}),D.autoA11y&&(i?f["aria-labelledby"]="".concat(D.replacementClass,"-title-").concat(s||Nt()):(f["aria-hidden"]="true",f.focusable="false")),ar({icons:{main:ir(E),mask:a?ir(a.icon):{found:!1,width:null,height:null,icon:{}}},prefix:h,iconName:b,transform:x(x({},Fe),n),symbol:r,title:i,maskId:o,titleId:s,extra:{attributes:f,styles:g,classes:u}})))};var ll={mixout(){return{icon:sl(cl)}},hooks(){return{mutationObserverCallbacks(e){return e.treeCallback=bo,e.nodeCallback=il,e}}},provides(e){e.i2svg=function(t){const{node:n=$,callback:r=()=>{}}=t;return bo(n,r)},e.generateSvgReplacementMutation=function(t,n){const{iconName:r,title:a,titleId:o,prefix:i,transform:s,symbol:u,mask:f,maskId:g,extra:h}=n;return new Promise((b,E)=>{Promise.all([sr(r,i),f.iconName?sr(f.iconName,f.prefix):Promise.resolve({found:!1,width:512,height:512,icon:{}})]).then(y=>{let[p,v]=y;b([t,ar({icons:{main:p,mask:v},prefix:i,iconName:r,transform:s,symbol:u,maskId:g,title:a,titleId:o,extra:h,watchable:!0})])}).catch(E)})},e.generateAbstractIcon=function(t){let{children:n,attributes:r,main:a,transform:o,styles:i}=t;const s=tn(i);s.length>0&&(r.style=s);let u;return Jn(o)&&(u=et("generateAbstractTransformGrouping",{main:a,transform:o,containerWidth:a.width,iconWidth:a.width})),n.push(u||a.icon),{children:n,attributes:r}}}},fl={mixout(){return{layer(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{classes:n=[]}=t;return on({type:"layer"},()=>{rt("beforeDOMElementCreation",{assembler:e,params:t});let r=[];return e(a=>{Array.isArray(a)?a.map(o=>{r=r.concat(o.abstract)}):r=r.concat(a.abstract)}),[{tag:"span",attributes:{class:["".concat(D.cssPrefix,"-layers"),...n].join(" ")},children:r}]})}}}},ul={mixout(){return{counter(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{title:n=null,classes:r=[],attributes:a={},styles:o={}}=t;return on({type:"counter",content:e},()=>(rt("beforeDOMElementCreation",{content:e,params:t}),Qc({content:e.toString(),title:n,extra:{attributes:a,styles:o,classes:["".concat(D.cssPrefix,"-layers-counter"),...r]}})))}}}},dl={mixout(){return{text(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{};const{transform:n=Fe,title:r=null,classes:a=[],attributes:o={},styles:i={}}=t;return on({type:"text",content:e},()=>(rt("beforeDOMElementCreation",{content:e,params:t}),so({content:e,transform:x(x({},Fe),n),title:r,extra:{attributes:o,styles:i,classes:["".concat(D.cssPrefix,"-layers-text"),...a]}})))}}},provides(e){e.generateLayersText=function(t,n){const{title:r,transform:a,extra:o}=n;let i=null,s=null;if(Ta){const u=parseInt(getComputedStyle(t).fontSize,10),f=t.getBoundingClientRect();i=f.width/u,s=f.height/u}return D.autoA11y&&!r&&(o.attributes["aria-hidden"]="true"),Promise.resolve([t,so({content:t.innerHTML,width:i,height:s,transform:a,title:r,extra:o,watchable:!0})])}}};const ml=new RegExp('"',"ug"),yo=[1105920,1112319],xo=x(x(x(x({},{FontAwesome:{normal:"fas",400:"fas"}}),Hs),nc),Js),dr=Object.keys(xo).reduce((e,t)=>(e[t.toLowerCase()]=xo[t],e),{}),pl=Object.keys(dr).reduce((e,t)=>{const n=dr[t];return e[t]=n[900]||[...Object.entries(n)][0][1],e},{});function gl(e){const t=e.replace(ml,""),n=Sc(t,0),r=n>=yo[0]&&n<=yo[1],a=t.length===2?t[0]===t[1]:!1;return{value:_n(a?t[0]:t),isSecondary:r||a}}function hl(e,t){const n=e.replace(/^['"]|['"]$/g,"").toLowerCase(),r=parseInt(t),a=isNaN(r)?"normal":r;return(dr[n]||{})[a]||pl[n]}function wo(e,t){const n="".concat(rc).concat(t.replace(":","-"));return new Promise((r,a)=>{if(e.getAttribute(n)!==null)return r();const i=mt(e.children).filter(b=>b.getAttribute(zn)===t)[0],s=qe.getComputedStyle(e,t),u=s.getPropertyValue("font-family"),f=u.match(cc),g=s.getPropertyValue("font-weight"),h=s.getPropertyValue("content");if(i&&!f)return e.removeChild(i),r();if(f&&h!=="none"&&h!==""){const b=s.getPropertyValue("content");let E=hl(u,g);const{value:y,isSecondary:p}=gl(b),v=f[0].startsWith("FontAwesome");let T=tr(E,y),P=T;if(v){const O=kc(y);O.iconName&&O.prefix&&(T=O.iconName,E=O.prefix)}if(T&&!p&&(!i||i.getAttribute(Xn)!==E||i.getAttribute(Un)!==P)){e.setAttribute(n,P),i&&e.removeChild(i);const O=rl(),{extra:B}=O;B.attributes[zn]=t,sr(T,E).then(A=>{const Z=ar(x(x({},O),{},{icons:{main:A,mask:ro()},prefix:E,iconName:P,extra:B,watchable:!0})),ie=$.createElementNS("http://www.w3.org/2000/svg","svg");t==="::before"?e.insertBefore(ie,e.firstChild):e.appendChild(ie),ie.outerHTML=Z.map(J=>Bt(J)).join(`
`),e.removeAttribute(n),r()}).catch(a)}else r()}else r()})}function Al(e){return Promise.all([wo(e,"::before"),wo(e,"::after")])}function vl(e){return e.parentNode!==document.head&&!~oc.indexOf(e.tagName.toUpperCase())&&!e.getAttribute(zn)&&(!e.parentNode||e.parentNode.tagName!=="svg")}function Co(e){if(We)return new Promise((t,n)=>{const r=mt(e.querySelectorAll("*")).filter(vl).map(Al),a=lr.begin("searchPseudoElements");go(),Promise.all(r).then(()=>{a(),ur(),t()}).catch(()=>{a(),ur(),n()})})}var bl={hooks(){return{mutationObserverCallbacks(e){return e.pseudoElementsCallback=Co,e}}},provides(e){e.pseudoElements2svg=function(t){const{node:n=$}=t;D.searchPseudoElements&&Co(n)}}};let So=!1;var yl={mixout(){return{dom:{unwatch(){go(),So=!0}}}},hooks(){return{bootstrap(){ho(nr("mutationObserverCallbacks",{}))},noAuto(){$c()},watch(e){const{observeMutationsRoot:t}=e;So?ur():ho(nr("mutationObserverCallbacks",{observeMutationsRoot:t}))}}}};const Eo=e=>{let t={size:16,x:0,y:0,flipX:!1,flipY:!1,rotate:0};return e.toLowerCase().split(" ").reduce((n,r)=>{const a=r.toLowerCase().split("-"),o=a[0];let i=a.slice(1).join("-");if(o&&i==="h")return n.flipX=!0,n;if(o&&i==="v")return n.flipY=!0,n;if(i=parseFloat(i),isNaN(i))return n;switch(o){case"grow":n.size=n.size+i;break;case"shrink":n.size=n.size-i;break;case"left":n.x=n.x-i;break;case"right":n.x=n.x+i;break;case"up":n.y=n.y-i;break;case"down":n.y=n.y+i;break;case"rotate":n.rotate=n.rotate+i;break}return n},t)};var xl={mixout(){return{parse:{transform:e=>Eo(e)}}},hooks(){return{parseNodeAttributes(e,t){const n=t.getAttribute("data-fa-transform");return n&&(e.transform=Eo(n)),e}}},provides(e){e.generateAbstractTransformGrouping=function(t){let{main:n,transform:r,containerWidth:a,iconWidth:o}=t;const i={transform:"translate(".concat(a/2," 256)")},s="translate(".concat(r.x*32,", ").concat(r.y*32,") "),u="scale(".concat(r.size/16*(r.flipX?-1:1),", ").concat(r.size/16*(r.flipY?-1:1),") "),f="rotate(".concat(r.rotate," 0 0)"),g={transform:"".concat(s," ").concat(u," ").concat(f)},h={transform:"translate(".concat(o/2*-1," -256)")},b={outer:i,inner:g,path:h};return{tag:"g",attributes:x({},b.outer),children:[{tag:"g",attributes:x({},b.inner),children:[{tag:n.icon.tag,children:n.icon.children,attributes:x(x({},n.icon.attributes),b.path)}]}]}}}};const mr={x:0,y:0,width:"100%",height:"100%"};function Po(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:!0;return e.attributes&&(e.attributes.fill||t)&&(e.attributes.fill="black"),e}function wl(e){return e.tag==="g"?e.children:[e]}var Cl={hooks(){return{parseNodeAttributes(e,t){const n=t.getAttribute("data-fa-mask"),r=n?an(n.split(" ").map(a=>a.trim())):ro();return r.prefix||(r.prefix=$e()),e.mask=r,e.maskId=t.getAttribute("data-fa-mask-id"),e}}},provides(e){e.generateAbstractMask=function(t){let{children:n,attributes:r,main:a,mask:o,maskId:i,transform:s}=t;const{width:u,icon:f}=a,{width:g,icon:h}=o,b=vc({transform:s,containerWidth:g,iconWidth:u}),E={tag:"rect",attributes:x(x({},mr),{},{fill:"white"})},y=f.children?{children:f.children.map(Po)}:{},p={tag:"g",attributes:x({},b.inner),children:[Po(x({tag:f.tag,attributes:x(x({},f.attributes),b.path)},y))]},v={tag:"g",attributes:x({},b.outer),children:[p]},T="mask-".concat(i||Nt()),P="clip-".concat(i||Nt()),O={tag:"mask",attributes:x(x({},mr),{},{id:T,maskUnits:"userSpaceOnUse",maskContentUnits:"userSpaceOnUse"}),children:[E,v]},B={tag:"defs",children:[{tag:"clipPath",attributes:{id:P},children:wl(h)},O]};return n.push(B,{tag:"rect",attributes:x({fill:"currentColor","clip-path":"url(#".concat(P,")"),mask:"url(#".concat(T,")")},mr)}),{children:n,attributes:r}}}},Sl={provides(e){let t=!1;qe.matchMedia&&(t=qe.matchMedia("(prefers-reduced-motion: reduce)").matches),e.missingIconAbstract=function(){const n=[],r={fill:"currentColor"},a={attributeType:"XML",repeatCount:"indefinite",dur:"2s"};n.push({tag:"path",attributes:x(x({},r),{},{d:"M156.5,447.7l-12.6,29.5c-18.7-9.5-35.9-21.2-51.5-34.9l22.7-22.7C127.6,430.5,141.5,440,156.5,447.7z M40.6,272H8.5 c1.4,21.2,5.4,41.7,11.7,61.1L50,321.2C45.1,305.5,41.8,289,40.6,272z M40.6,240c1.4-18.8,5.2-37,11.1-54.1l-29.5-12.6 C14.7,194.3,10,216.7,8.5,240H40.6z M64.3,156.5c7.8-14.9,17.2-28.8,28.1-41.5L69.7,92.3c-13.7,15.6-25.5,32.8-34.9,51.5 L64.3,156.5z M397,419.6c-13.9,12-29.4,22.3-46.1,30.4l11.9,29.8c20.7-9.9,39.8-22.6,56.9-37.6L397,419.6z M115,92.4 c13.9-12,29.4-22.3,46.1-30.4l-11.9-29.8c-20.7,9.9-39.8,22.6-56.8,37.6L115,92.4z M447.7,355.5c-7.8,14.9-17.2,28.8-28.1,41.5 l22.7,22.7c13.7-15.6,25.5-32.9,34.9-51.5L447.7,355.5z M471.4,272c-1.4,18.8-5.2,37-11.1,54.1l29.5,12.6 c7.5-21.1,12.2-43.5,13.6-66.8H471.4z M321.2,462c-15.7,5-32.2,8.2-49.2,9.4v32.1c21.2-1.4,41.7-5.4,61.1-11.7L321.2,462z M240,471.4c-18.8-1.4-37-5.2-54.1-11.1l-12.6,29.5c21.1,7.5,43.5,12.2,66.8,13.6V471.4z M462,190.8c5,15.7,8.2,32.2,9.4,49.2h32.1 c-1.4-21.2-5.4-41.7-11.7-61.1L462,190.8z M92.4,397c-12-13.9-22.3-29.4-30.4-46.1l-29.8,11.9c9.9,20.7,22.6,39.8,37.6,56.9 L92.4,397z M272,40.6c18.8,1.4,36.9,5.2,54.1,11.1l12.6-29.5C317.7,14.7,295.3,10,272,8.5V40.6z M190.8,50 c15.7-5,32.2-8.2,49.2-9.4V8.5c-21.2,1.4-41.7,5.4-61.1,11.7L190.8,50z M442.3,92.3L419.6,115c12,13.9,22.3,29.4,30.5,46.1 l29.8-11.9C470,128.5,457.3,109.4,442.3,92.3z M397,92.4l22.7-22.7c-15.6-13.7-32.8-25.5-51.5-34.9l-12.6,29.5 C370.4,72.1,384.4,81.5,397,92.4z"})});const o=x(x({},a),{},{attributeName:"opacity"}),i={tag:"circle",attributes:x(x({},r),{},{cx:"256",cy:"364",r:"28"}),children:[]};return t||i.children.push({tag:"animate",attributes:x(x({},a),{},{attributeName:"r",values:"28;14;28;28;14;28;"})},{tag:"animate",attributes:x(x({},o),{},{values:"1;0;1;1;0;1;"})}),n.push(i),n.push({tag:"path",attributes:x(x({},r),{},{opacity:"1",d:"M263.7,312h-16c-6.6,0-12-5.4-12-12c0-71,77.4-63.9,77.4-107.8c0-20-17.8-40.2-57.4-40.2c-29.1,0-44.3,9.6-59.2,28.7 c-3.9,5-11.1,6-16.2,2.4l-13.1-9.2c-5.6-3.9-6.9-11.8-2.6-17.2c21.2-27.2,46.4-44.7,91.2-44.7c52.3,0,97.4,29.8,97.4,80.2 c0,67.6-77.4,63.5-77.4,107.8C275.7,306.6,270.3,312,263.7,312z"}),children:t?[]:[{tag:"animate",attributes:x(x({},o),{},{values:"1;0;0;0;0;1;"})}]}),t||n.push({tag:"path",attributes:x(x({},r),{},{opacity:"0",d:"M232.5,134.5l7,168c0.3,6.4,5.6,11.5,12,11.5h9c6.4,0,11.7-5.1,12-11.5l7-168c0.3-6.8-5.2-12.5-12-12.5h-23 C237.7,122,232.2,127.7,232.5,134.5z"}),children:[{tag:"animate",attributes:x(x({},o),{},{values:"0;0;1;1;0;0;"})}]}),{tag:"g",attributes:{class:"missing"},children:n}}}},El={hooks(){return{parseNodeAttributes(e,t){const n=t.getAttribute("data-fa-symbol"),r=n===null?!1:n===""?!0:n;return e.symbol=r,e}}}},Pl=[xc,ll,fl,ul,dl,bl,yl,xl,Cl,Sl,El];Hc(Pl,{mixoutsTo:Le}),Le.noAuto,Le.config,Le.library,Le.dom;const pr=Le.parse;Le.findIconDefinition,Le.toHtml;const Tl=Le.icon;Le.layer,Le.text,Le.counter;var Ol={env:{NODE_ENV:"production"}};function To(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter(function(a){return Object.getOwnPropertyDescriptor(e,a).enumerable})),n.push.apply(n,r)}return n}function Me(e){for(var t=1;t<arguments.length;t++){var n=arguments[t]!=null?arguments[t]:{};t%2?To(Object(n),!0).forEach(function(r){ht(e,r,n[r])}):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):To(Object(n)).forEach(function(r){Object.defineProperty(e,r,Object.getOwnPropertyDescriptor(n,r))})}return e}function fn(e){"@babel/helpers - typeof";return fn=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(t){return typeof t}:function(t){return t&&typeof Symbol=="function"&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},fn(e)}function ht(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function Ll(e,t){if(e==null)return{};var n={},r=Object.keys(e),a,o;for(o=0;o<r.length;o++)a=r[o],!(t.indexOf(a)>=0)&&(n[a]=e[a]);return n}function kl(e,t){if(e==null)return{};var n=Ll(e,t),r,a;if(Object.getOwnPropertySymbols){var o=Object.getOwnPropertySymbols(e);for(a=0;a<o.length;a++)r=o[a],!(t.indexOf(r)>=0)&&Object.prototype.propertyIsEnumerable.call(e,r)&&(n[r]=e[r])}return n}function gr(e){return Nl(e)||Bl(e)||Il(e)||Dl()}function Nl(e){if(Array.isArray(e))return hr(e)}function Bl(e){if(typeof Symbol<"u"&&e[Symbol.iterator]!=null||e["@@iterator"]!=null)return Array.from(e)}function Il(e,t){if(e){if(typeof e=="string")return hr(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);if(n==="Object"&&e.constructor&&(n=e.constructor.name),n==="Map"||n==="Set")return Array.from(e);if(n==="Arguments"||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return hr(e,t)}}function hr(e,t){(t==null||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function Dl(){throw new TypeError(`Invalid attempt to spread non-iterable instance.
In order to be iterable, non-array objects must have a [Symbol.iterator]() method.`)}function Fl(e){var t,n=e.beat,r=e.fade,a=e.beatFade,o=e.bounce,i=e.shake,s=e.flash,u=e.spin,f=e.spinPulse,g=e.spinReverse,h=e.pulse,b=e.fixedWidth,E=e.inverse,y=e.border,p=e.listItem,v=e.flip,T=e.size,P=e.rotation,O=e.pull,B=(t={"fa-beat":n,"fa-fade":r,"fa-beat-fade":a,"fa-bounce":o,"fa-shake":i,"fa-flash":s,"fa-spin":u,"fa-spin-reverse":g,"fa-spin-pulse":f,"fa-pulse":h,"fa-fw":b,"fa-inverse":E,"fa-border":y,"fa-li":p,"fa-flip":v===!0,"fa-flip-horizontal":v==="horizontal"||v==="both","fa-flip-vertical":v==="vertical"||v==="both"},ht(t,"fa-".concat(T),typeof T<"u"&&T!==null),ht(t,"fa-rotate-".concat(P),typeof P<"u"&&P!==null&&P!==0),ht(t,"fa-pull-".concat(O),typeof O<"u"&&O!==null),ht(t,"fa-swap-opacity",e.swapOpacity),t);return Object.keys(B).map(function(A){return B[A]?A:null}).filter(function(A){return A})}function Rl(e){return e=e-0,e===e}function Oo(e){return Rl(e)?e:(e=e.replace(/[\-_\s]+(.)?/g,function(t,n){return n?n.toUpperCase():""}),e.substr(0,1).toLowerCase()+e.substr(1))}var Ml=["style"];function jl(e){return e.charAt(0).toUpperCase()+e.slice(1)}function Hl(e){return e.split(";").map(function(t){return t.trim()}).filter(function(t){return t}).reduce(function(t,n){var r=n.indexOf(":"),a=Oo(n.slice(0,r)),o=n.slice(r+1).trim();return a.startsWith("webkit")?t[jl(a)]=o:t[a]=o,t},{})}function Lo(e,t){var n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:{};if(typeof t=="string")return t;var r=(t.children||[]).map(function(u){return Lo(e,u)}),a=Object.keys(t.attributes||{}).reduce(function(u,f){var g=t.attributes[f];switch(f){case"class":u.attrs.className=g,delete t.attributes.class;break;case"style":u.attrs.style=Hl(g);break;default:f.indexOf("aria-")===0||f.indexOf("data-")===0?u.attrs[f.toLowerCase()]=g:u.attrs[Oo(f)]=g}return u},{attrs:{}}),o=n.style,i=o===void 0?{}:o,s=kl(n,Ml);return a.attrs.style=Me(Me({},a.attrs.style),i),e.apply(void 0,[t.tag,Me(Me({},a.attrs),s)].concat(gr(r)))}var ko=!1;try{ko=Ol.env.NODE_ENV==="production"}catch{}function zl(){if(!ko&&console&&typeof console.error=="function"){var e;(e=console).error.apply(e,arguments)}}function No(e){if(e&&fn(e)==="object"&&e.prefix&&e.iconName&&e.icon)return e;if(pr.icon)return pr.icon(e);if(e===null)return null;if(e&&fn(e)==="object"&&e.prefix&&e.iconName)return e;if(Array.isArray(e)&&e.length===2)return{prefix:e[0],iconName:e[1]};if(typeof e=="string")return{prefix:"fas",iconName:e}}function Ar(e,t){return Array.isArray(t)&&t.length>0||!Array.isArray(t)&&t?ht({},e,t):{}}var Bo={border:!1,className:"",mask:null,maskId:null,fixedWidth:!1,inverse:!1,flip:!1,icon:null,listItem:!1,pull:null,pulse:!1,rotation:null,size:null,spin:!1,spinPulse:!1,spinReverse:!1,beat:!1,fade:!1,beatFade:!1,bounce:!1,shake:!1,symbol:!1,title:"",titleId:null,transform:null,swapOpacity:!1},Ee=j.forwardRef(function(e,t){var n=Me(Me({},Bo),e),r=n.icon,a=n.mask,o=n.symbol,i=n.className,s=n.title,u=n.titleId,f=n.maskId,g=No(r),h=Ar("classes",[].concat(gr(Fl(n)),gr((i||"").split(" ")))),b=Ar("transform",typeof n.transform=="string"?pr.transform(n.transform):n.transform),E=Ar("mask",No(a)),y=Tl(g,Me(Me(Me(Me({},h),b),E),{},{symbol:o,title:s,titleId:u,maskId:f}));if(!y)return zl("Could not find icon",g),null;var p=y.abstract,v={ref:t};return Object.keys(n).forEach(function(T){Bo.hasOwnProperty(T)||(v[T]=n[T])}),Xl(p[0],v)});Ee.displayName="FontAwesomeIcon",Ee.propTypes={beat:d.bool,border:d.bool,beatFade:d.bool,bounce:d.bool,className:d.string,fade:d.bool,flash:d.bool,mask:d.oneOfType([d.object,d.array,d.string]),maskId:d.string,fixedWidth:d.bool,inverse:d.bool,flip:d.oneOf([!0,!1,"horizontal","vertical","both"]),icon:d.oneOfType([d.object,d.array,d.string]),listItem:d.bool,pull:d.oneOf(["right","left"]),pulse:d.bool,rotation:d.oneOf([0,90,180,270]),shake:d.bool,size:d.oneOf(["2xs","xs","sm","lg","xl","2xl","1x","2x","3x","4x","5x","6x","7x","8x","9x","10x"]),spin:d.bool,spinPulse:d.bool,spinReverse:d.bool,symbol:d.oneOfType([d.bool,d.string]),title:d.string,titleId:d.string,transform:d.oneOfType([d.string,d.object]),swapOpacity:d.bool};var Xl=Lo.bind(null,j.createElement);const Io=({columnIndex:e,column:{title:t,links:n}})=>{const[r,a]=j.useState(!1),i=typeof window<"u"?window.innerWidth>=1260:!1,[s,u]=j.useState(i),f=j.useRef(null);j.useEffect(()=>{const b=window.matchMedia("screen and (min-width: 1260px)"),E=y=>u(y.matches);return b.addEventListener("change",E),E(b),()=>b.removeEventListener("change",E)},[]);const g=b=>{const E=f==null?void 0:f.current;if(!E)return;E.classList.add("collapsing");const y=E.animate([{maxHeight:b?`${E.scrollHeight}px`:"0px"}],{duration:350,easing:"ease-in-out",fill:"forwards"});y.onfinish=()=>{E.classList.remove("collapsing"),b?E.classList.add("show"):E.classList.remove("show")}},h=()=>{if(s){a(!0);return}a(b=>{const E=!b;return g(E),E})};return l.jsx("div",{className:"col-xl flex-footer testname-column",children:l.jsxs("div",{className:"card accordion-item desktop-disable-xl",children:[l.jsx("div",{className:"accordion-header",children:l.jsx("div",{className:"h5",children:l.jsxs("button",{id:`footlink-header-${e}`,className:"accordion-button","aria-expanded":r||s,"aria-controls":`footlink-${e}`,onClick:h,type:"button",disabled:s,children:[t,l.jsx(Ee,{className:r||s?"open":"",icon:va})]})})}),l.jsx("div",{id:`footlink-${e}`,className:"accordion-body",role:"region","aria-labelledby":`footlink-header-${e}`,ref:f,children:n.map(b=>l.jsx("a",{className:"nav-link",href:b.url,title:b.title,children:b.text},`footlink-${t}-link-${b.text}`))})]})})};Io.propTypes={columnIndex:d.number.isRequired,column:Oe.shape({title:d.string,links:Oe.arrayOf(Oe.shape({url:d.string.isRequired,title:d.string,text:d.string.isRequired}))})};const vr=({contact:{title:e="",contactLink:t="",contributionLink:n="",columns:r}})=>l.jsx("div",{className:"wrapper",id:"wrapper-footer-columns","data-testid":"contact",children:l.jsx("div",{className:"container",id:"footer-columns",children:l.jsxs("div",{className:"row","data-testid":"columns-container",children:[l.jsxs("div",{className:"col-xl-3",id:"info-column",children:[l.jsx("div",{className:"h5",children:e}),t&&l.jsx("p",{className:"contact-link",children:l.jsx("a",{href:t,children:"Contact Us"})}),n&&l.jsx("p",{className:"contribute-button","data-testid":"contact-contribution-link",children:l.jsx(Tt,{color:"gold",href:n,text:"Support ASU",classes:"btn"})})]}),r&&r.length&&l.jsx(l.Fragment,{children:r.map((a,o)=>l.jsx(Io,{columnIndex:o,column:a},`footlink-${a.title}`))})]})})});vr.propTypes={contact:Oe.shape({title:d.string.isRequired,contactLink:d.string.isRequired,contributionLink:d.string,columns:Oe.arrayOf(Oe.shape({title:d.string,links:Oe.arrayOf(Oe.shape({url:d.string.isRequired,title:d.string,text:d.string.isRequired}))}))})};const{entries:Do,setPrototypeOf:Fo,isFrozen:Ul,getPrototypeOf:Ql,getOwnPropertyDescriptor:Wl}=Object;let{freeze:ve,seal:Ne,create:Ro}=Object,{apply:br,construct:yr}=typeof Reflect<"u"&&Reflect;ve||(ve=function(t){return t}),Ne||(Ne=function(t){return t}),br||(br=function(t,n,r){return t.apply(n,r)}),yr||(yr=function(t,n){return new t(...n)});const un=ye(Array.prototype.forEach),Gl=ye(Array.prototype.lastIndexOf),Mo=ye(Array.prototype.pop),Ft=ye(Array.prototype.push),Yl=ye(Array.prototype.splice),dn=ye(String.prototype.toLowerCase),xr=ye(String.prototype.toString),jo=ye(String.prototype.match),Rt=ye(String.prototype.replace),Kl=ye(String.prototype.indexOf),Vl=ye(String.prototype.trim),Ie=ye(Object.prototype.hasOwnProperty),be=ye(RegExp.prototype.test),Mt=Jl(TypeError);function ye(e){return function(t){for(var n=arguments.length,r=new Array(n>1?n-1:0),a=1;a<n;a++)r[a-1]=arguments[a];return br(e,t,r)}}function Jl(e){return function(){for(var t=arguments.length,n=new Array(t),r=0;r<t;r++)n[r]=arguments[r];return yr(e,n)}}function H(e,t){let n=arguments.length>2&&arguments[2]!==void 0?arguments[2]:dn;Fo&&Fo(e,null);let r=t.length;for(;r--;){let a=t[r];if(typeof a=="string"){const o=n(a);o!==a&&(Ul(t)||(t[r]=o),a=o)}e[a]=!0}return e}function Zl(e){for(let t=0;t<e.length;t++)Ie(e,t)||(e[t]=null);return e}function at(e){const t=Ro(null);for(const[n,r]of Do(e))Ie(e,n)&&(Array.isArray(r)?t[n]=Zl(r):r&&typeof r=="object"&&r.constructor===Object?t[n]=at(r):t[n]=r);return t}function jt(e,t){for(;e!==null;){const r=Wl(e,t);if(r){if(r.get)return ye(r.get);if(typeof r.value=="function")return ye(r.value)}e=Ql(e)}function n(){return null}return n}const Ho=ve(["a","abbr","acronym","address","area","article","aside","audio","b","bdi","bdo","big","blink","blockquote","body","br","button","canvas","caption","center","cite","code","col","colgroup","content","data","datalist","dd","decorator","del","details","dfn","dialog","dir","div","dl","dt","element","em","fieldset","figcaption","figure","font","footer","form","h1","h2","h3","h4","h5","h6","head","header","hgroup","hr","html","i","img","input","ins","kbd","label","legend","li","main","map","mark","marquee","menu","menuitem","meter","nav","nobr","ol","optgroup","option","output","p","picture","pre","progress","q","rp","rt","ruby","s","samp","section","select","shadow","small","source","spacer","span","strike","strong","style","sub","summary","sup","table","tbody","td","template","textarea","tfoot","th","thead","time","tr","track","tt","u","ul","var","video","wbr"]),wr=ve(["svg","a","altglyph","altglyphdef","altglyphitem","animatecolor","animatemotion","animatetransform","circle","clippath","defs","desc","ellipse","filter","font","g","glyph","glyphref","hkern","image","line","lineargradient","marker","mask","metadata","mpath","path","pattern","polygon","polyline","radialgradient","rect","stop","style","switch","symbol","text","textpath","title","tref","tspan","view","vkern"]),Cr=ve(["feBlend","feColorMatrix","feComponentTransfer","feComposite","feConvolveMatrix","feDiffuseLighting","feDisplacementMap","feDistantLight","feDropShadow","feFlood","feFuncA","feFuncB","feFuncG","feFuncR","feGaussianBlur","feImage","feMerge","feMergeNode","feMorphology","feOffset","fePointLight","feSpecularLighting","feSpotLight","feTile","feTurbulence"]),ql=ve(["animate","color-profile","cursor","discard","font-face","font-face-format","font-face-name","font-face-src","font-face-uri","foreignobject","hatch","hatchpath","mesh","meshgradient","meshpatch","meshrow","missing-glyph","script","set","solidcolor","unknown","use"]),Sr=ve(["math","menclose","merror","mfenced","mfrac","mglyph","mi","mlabeledtr","mmultiscripts","mn","mo","mover","mpadded","mphantom","mroot","mrow","ms","mspace","msqrt","mstyle","msub","msup","msubsup","mtable","mtd","mtext","mtr","munder","munderover","mprescripts"]),_l=ve(["maction","maligngroup","malignmark","mlongdiv","mscarries","mscarry","msgroup","mstack","msline","msrow","semantics","annotation","annotation-xml","mprescripts","none"]),zo=ve(["#text"]),Xo=ve(["accept","action","align","alt","autocapitalize","autocomplete","autopictureinpicture","autoplay","background","bgcolor","border","capture","cellpadding","cellspacing","checked","cite","class","clear","color","cols","colspan","controls","controlslist","coords","crossorigin","datetime","decoding","default","dir","disabled","disablepictureinpicture","disableremoteplayback","download","draggable","enctype","enterkeyhint","face","for","headers","height","hidden","high","href","hreflang","id","inputmode","integrity","ismap","kind","label","lang","list","loading","loop","low","max","maxlength","media","method","min","minlength","multiple","muted","name","nonce","noshade","novalidate","nowrap","open","optimum","pattern","placeholder","playsinline","popover","popovertarget","popovertargetaction","poster","preload","pubdate","radiogroup","readonly","rel","required","rev","reversed","role","rows","rowspan","spellcheck","scope","selected","shape","size","sizes","span","srclang","start","src","srcset","step","style","summary","tabindex","title","translate","type","usemap","valign","value","width","wrap","xmlns","slot"]),Er=ve(["accent-height","accumulate","additive","alignment-baseline","amplitude","ascent","attributename","attributetype","azimuth","basefrequency","baseline-shift","begin","bias","by","class","clip","clippathunits","clip-path","clip-rule","color","color-interpolation","color-interpolation-filters","color-profile","color-rendering","cx","cy","d","dx","dy","diffuseconstant","direction","display","divisor","dur","edgemode","elevation","end","exponent","fill","fill-opacity","fill-rule","filter","filterunits","flood-color","flood-opacity","font-family","font-size","font-size-adjust","font-stretch","font-style","font-variant","font-weight","fx","fy","g1","g2","glyph-name","glyphref","gradientunits","gradienttransform","height","href","id","image-rendering","in","in2","intercept","k","k1","k2","k3","k4","kerning","keypoints","keysplines","keytimes","lang","lengthadjust","letter-spacing","kernelmatrix","kernelunitlength","lighting-color","local","marker-end","marker-mid","marker-start","markerheight","markerunits","markerwidth","maskcontentunits","maskunits","max","mask","media","method","mode","min","name","numoctaves","offset","operator","opacity","order","orient","orientation","origin","overflow","paint-order","path","pathlength","patterncontentunits","patterntransform","patternunits","points","preservealpha","preserveaspectratio","primitiveunits","r","rx","ry","radius","refx","refy","repeatcount","repeatdur","restart","result","rotate","scale","seed","shape-rendering","slope","specularconstant","specularexponent","spreadmethod","startoffset","stddeviation","stitchtiles","stop-color","stop-opacity","stroke-dasharray","stroke-dashoffset","stroke-linecap","stroke-linejoin","stroke-miterlimit","stroke-opacity","stroke","stroke-width","style","surfacescale","systemlanguage","tabindex","tablevalues","targetx","targety","transform","transform-origin","text-anchor","text-decoration","text-rendering","textlength","type","u1","u2","unicode","values","viewbox","visibility","version","vert-adv-y","vert-origin-x","vert-origin-y","width","word-spacing","wrap","writing-mode","xchannelselector","ychannelselector","x","x1","x2","xmlns","y","y1","y2","z","zoomandpan"]),Uo=ve(["accent","accentunder","align","bevelled","close","columnsalign","columnlines","columnspan","denomalign","depth","dir","display","displaystyle","encoding","fence","frame","height","href","id","largeop","length","linethickness","lspace","lquote","mathbackground","mathcolor","mathsize","mathvariant","maxsize","minsize","movablelimits","notation","numalign","open","rowalign","rowlines","rowspacing","rowspan","rspace","rquote","scriptlevel","scriptminsize","scriptsizemultiplier","selection","separator","separators","stretchy","subscriptshift","supscriptshift","symmetric","voffset","width","xmlns"]),mn=ve(["xlink:href","xml:id","xlink:title","xml:space","xmlns:xlink"]),$l=Ne(/\{\{[\w\W]*|[\w\W]*\}\}/gm),ef=Ne(/<%[\w\W]*|[\w\W]*%>/gm),tf=Ne(/\$\{[\w\W]*/gm),nf=Ne(/^data-[\-\w.\u00B7-\uFFFF]+$/),rf=Ne(/^aria-[\-\w]+$/),Qo=Ne(/^(?:(?:(?:f|ht)tps?|mailto|tel|callto|sms|cid|xmpp):|[^a-z]|[a-z+.\-]+(?:[^a-z+.\-:]|$))/i),af=Ne(/^(?:\w+script|data):/i),of=Ne(/[\u0000-\u0020\u00A0\u1680\u180E\u2000-\u2029\u205F\u3000]/g),Wo=Ne(/^html$/i),sf=Ne(/^[a-z][.\w]*(-[.\w]+)+$/i);var Go=Object.freeze({__proto__:null,ARIA_ATTR:rf,ATTR_WHITESPACE:of,CUSTOM_ELEMENT:sf,DATA_ATTR:nf,DOCTYPE_NAME:Wo,ERB_EXPR:ef,IS_ALLOWED_URI:Qo,IS_SCRIPT_OR_DATA:af,MUSTACHE_EXPR:$l,TMPLIT_EXPR:tf});const Ht={element:1,text:3,progressingInstruction:7,comment:8,document:9},cf=function(){return typeof window>"u"?null:window},lf=function(t,n){if(typeof t!="object"||typeof t.createPolicy!="function")return null;let r=null;const a="data-tt-policy-suffix";n&&n.hasAttribute(a)&&(r=n.getAttribute(a));const o="dompurify"+(r?"#"+r:"");try{return t.createPolicy(o,{createHTML(i){return i},createScriptURL(i){return i}})}catch{return console.warn("TrustedTypes policy "+o+" could not be created."),null}},Yo=function(){return{afterSanitizeAttributes:[],afterSanitizeElements:[],afterSanitizeShadowDOM:[],beforeSanitizeAttributes:[],beforeSanitizeElements:[],beforeSanitizeShadowDOM:[],uponSanitizeAttribute:[],uponSanitizeElement:[],uponSanitizeShadowNode:[]}};function Ko(){let e=arguments.length>0&&arguments[0]!==void 0?arguments[0]:cf();const t=F=>Ko(F);if(t.version="3.2.4",t.removed=[],!e||!e.document||e.document.nodeType!==Ht.document||!e.Element)return t.isSupported=!1,t;let{document:n}=e;const r=n,a=r.currentScript,{DocumentFragment:o,HTMLTemplateElement:i,Node:s,Element:u,NodeFilter:f,NamedNodeMap:g=e.NamedNodeMap||e.MozNamedAttrMap,HTMLFormElement:h,DOMParser:b,trustedTypes:E}=e,y=u.prototype,p=jt(y,"cloneNode"),v=jt(y,"remove"),T=jt(y,"nextSibling"),P=jt(y,"childNodes"),O=jt(y,"parentNode");if(typeof i=="function"){const F=n.createElement("template");F.content&&F.content.ownerDocument&&(n=F.content.ownerDocument)}let B,A="";const{implementation:Z,createNodeIterator:ie,createDocumentFragment:J,getElementsByTagName:ae}=n,{importNode:le}=r;let q=Yo();t.isSupported=typeof Do=="function"&&typeof O=="function"&&Z&&Z.createHTMLDocument!==void 0;const{MUSTACHE_EXPR:ue,ERB_EXPR:xe,TMPLIT_EXPR:Pe,DATA_ATTR:he,ARIA_ATTR:ot,IS_SCRIPT_OR_DATA:ke,ATTR_WHITESPACE:we,CUSTOM_ELEMENT:it}=Go;let{IS_ALLOWED_URI:Ke}=Go,ee=null;const I=H({},[...Ho,...wr,...Cr,...Sr,...zo]);let C=null;const k=H({},[...Xo,...Er,...Uo,...mn]);let L=Object.seal(Ro(null,{tagNameCheck:{writable:!0,configurable:!1,enumerable:!0,value:null},attributeNameCheck:{writable:!0,configurable:!1,enumerable:!0,value:null},allowCustomizedBuiltInElements:{writable:!0,configurable:!1,enumerable:!0,value:!1}})),m=null,Q=null,S=!0,_=!0,W=!1,G=!0,M=!1,oe=!0,ne=!1,X=!1,se=!1,z=!1,re=!1,He=!1,ce=!0,st=!1;const ct="user-content-";let Ce=!0,R=!1,V={},ze=null;const yt=H({},["annotation-xml","audio","colgroup","desc","foreignobject","head","iframe","math","mi","mn","mo","ms","mtext","noembed","noframes","noscript","plaintext","script","style","svg","template","thead","title","video","xmp"]);let De=null;const di=H({},["audio","video","img","source","image","track"]);let kr=null;const mi=H({},["alt","class","for","id","label","name","pattern","placeholder","role","summary","title","value","style","xmlns"]),hn="http://www.w3.org/1998/Math/MathML",An="http://www.w3.org/2000/svg",Ve="http://www.w3.org/1999/xhtml";let xt=Ve,Nr=!1,Br=null;const eu=H({},[hn,An,Ve],xr);let vn=H({},["mi","mo","mn","ms","mtext"]),bn=H({},["annotation-xml"]);const tu=H({},["title","style","font","a","script"]);let Ut=null;const nu=["application/xhtml+xml","text/html"],ru="text/html";let fe=null,wt=null;const au=n.createElement("form"),pi=function(c){return c instanceof RegExp||c instanceof Function},Ir=function(){let c=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};if(!(wt&&wt===c)){if((!c||typeof c!="object")&&(c={}),c=at(c),Ut=nu.indexOf(c.PARSER_MEDIA_TYPE)===-1?ru:c.PARSER_MEDIA_TYPE,fe=Ut==="application/xhtml+xml"?xr:dn,ee=Ie(c,"ALLOWED_TAGS")?H({},c.ALLOWED_TAGS,fe):I,C=Ie(c,"ALLOWED_ATTR")?H({},c.ALLOWED_ATTR,fe):k,Br=Ie(c,"ALLOWED_NAMESPACES")?H({},c.ALLOWED_NAMESPACES,xr):eu,kr=Ie(c,"ADD_URI_SAFE_ATTR")?H(at(mi),c.ADD_URI_SAFE_ATTR,fe):mi,De=Ie(c,"ADD_DATA_URI_TAGS")?H(at(di),c.ADD_DATA_URI_TAGS,fe):di,ze=Ie(c,"FORBID_CONTENTS")?H({},c.FORBID_CONTENTS,fe):yt,m=Ie(c,"FORBID_TAGS")?H({},c.FORBID_TAGS,fe):{},Q=Ie(c,"FORBID_ATTR")?H({},c.FORBID_ATTR,fe):{},V=Ie(c,"USE_PROFILES")?c.USE_PROFILES:!1,S=c.ALLOW_ARIA_ATTR!==!1,_=c.ALLOW_DATA_ATTR!==!1,W=c.ALLOW_UNKNOWN_PROTOCOLS||!1,G=c.ALLOW_SELF_CLOSE_IN_ATTR!==!1,M=c.SAFE_FOR_TEMPLATES||!1,oe=c.SAFE_FOR_XML!==!1,ne=c.WHOLE_DOCUMENT||!1,z=c.RETURN_DOM||!1,re=c.RETURN_DOM_FRAGMENT||!1,He=c.RETURN_TRUSTED_TYPE||!1,se=c.FORCE_BODY||!1,ce=c.SANITIZE_DOM!==!1,st=c.SANITIZE_NAMED_PROPS||!1,Ce=c.KEEP_CONTENT!==!1,R=c.IN_PLACE||!1,Ke=c.ALLOWED_URI_REGEXP||Qo,xt=c.NAMESPACE||Ve,vn=c.MATHML_TEXT_INTEGRATION_POINTS||vn,bn=c.HTML_INTEGRATION_POINTS||bn,L=c.CUSTOM_ELEMENT_HANDLING||{},c.CUSTOM_ELEMENT_HANDLING&&pi(c.CUSTOM_ELEMENT_HANDLING.tagNameCheck)&&(L.tagNameCheck=c.CUSTOM_ELEMENT_HANDLING.tagNameCheck),c.CUSTOM_ELEMENT_HANDLING&&pi(c.CUSTOM_ELEMENT_HANDLING.attributeNameCheck)&&(L.attributeNameCheck=c.CUSTOM_ELEMENT_HANDLING.attributeNameCheck),c.CUSTOM_ELEMENT_HANDLING&&typeof c.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements=="boolean"&&(L.allowCustomizedBuiltInElements=c.CUSTOM_ELEMENT_HANDLING.allowCustomizedBuiltInElements),M&&(_=!1),re&&(z=!0),V&&(ee=H({},zo),C=[],V.html===!0&&(H(ee,Ho),H(C,Xo)),V.svg===!0&&(H(ee,wr),H(C,Er),H(C,mn)),V.svgFilters===!0&&(H(ee,Cr),H(C,Er),H(C,mn)),V.mathMl===!0&&(H(ee,Sr),H(C,Uo),H(C,mn))),c.ADD_TAGS&&(ee===I&&(ee=at(ee)),H(ee,c.ADD_TAGS,fe)),c.ADD_ATTR&&(C===k&&(C=at(C)),H(C,c.ADD_ATTR,fe)),c.ADD_URI_SAFE_ATTR&&H(kr,c.ADD_URI_SAFE_ATTR,fe),c.FORBID_CONTENTS&&(ze===yt&&(ze=at(ze)),H(ze,c.FORBID_CONTENTS,fe)),Ce&&(ee["#text"]=!0),ne&&H(ee,["html","head","body"]),ee.table&&(H(ee,["tbody"]),delete m.tbody),c.TRUSTED_TYPES_POLICY){if(typeof c.TRUSTED_TYPES_POLICY.createHTML!="function")throw Mt('TRUSTED_TYPES_POLICY configuration option must provide a "createHTML" hook.');if(typeof c.TRUSTED_TYPES_POLICY.createScriptURL!="function")throw Mt('TRUSTED_TYPES_POLICY configuration option must provide a "createScriptURL" hook.');B=c.TRUSTED_TYPES_POLICY,A=B.createHTML("")}else B===void 0&&(B=lf(E,a)),B!==null&&typeof A=="string"&&(A=B.createHTML(""));ve&&ve(c),wt=c}},gi=H({},[...wr,...Cr,...ql]),hi=H({},[...Sr,..._l]),ou=function(c){let w=O(c);(!w||!w.tagName)&&(w={namespaceURI:xt,tagName:"template"});const N=dn(c.tagName),te=dn(w.tagName);return Br[c.namespaceURI]?c.namespaceURI===An?w.namespaceURI===Ve?N==="svg":w.namespaceURI===hn?N==="svg"&&(te==="annotation-xml"||vn[te]):!!gi[N]:c.namespaceURI===hn?w.namespaceURI===Ve?N==="math":w.namespaceURI===An?N==="math"&&bn[te]:!!hi[N]:c.namespaceURI===Ve?w.namespaceURI===An&&!bn[te]||w.namespaceURI===hn&&!vn[te]?!1:!hi[N]&&(tu[N]||!gi[N]):!!(Ut==="application/xhtml+xml"&&Br[c.namespaceURI]):!1},Xe=function(c){Ft(t.removed,{element:c});try{O(c).removeChild(c)}catch{v(c)}},yn=function(c,w){try{Ft(t.removed,{attribute:w.getAttributeNode(c),from:w})}catch{Ft(t.removed,{attribute:null,from:w})}if(w.removeAttribute(c),c==="is")if(z||re)try{Xe(w)}catch{}else try{w.setAttribute(c,"")}catch{}},Ai=function(c){let w=null,N=null;if(se)c="<remove></remove>"+c;else{const de=jo(c,/^[\r\n\t ]+/);N=de&&de[0]}Ut==="application/xhtml+xml"&&xt===Ve&&(c='<html xmlns="http://www.w3.org/1999/xhtml"><head></head><body>'+c+"</body></html>");const te=B?B.createHTML(c):c;if(xt===Ve)try{w=new b().parseFromString(te,Ut)}catch{}if(!w||!w.documentElement){w=Z.createDocument(xt,"template",null);try{w.documentElement.innerHTML=Nr?A:te}catch{}}const Ae=w.body||w.documentElement;return c&&N&&Ae.insertBefore(n.createTextNode(N),Ae.childNodes[0]||null),xt===Ve?ae.call(w,ne?"html":"body")[0]:ne?w.documentElement:Ae},vi=function(c){return ie.call(c.ownerDocument||c,c,f.SHOW_ELEMENT|f.SHOW_COMMENT|f.SHOW_TEXT|f.SHOW_PROCESSING_INSTRUCTION|f.SHOW_CDATA_SECTION,null)},Dr=function(c){return c instanceof h&&(typeof c.nodeName!="string"||typeof c.textContent!="string"||typeof c.removeChild!="function"||!(c.attributes instanceof g)||typeof c.removeAttribute!="function"||typeof c.setAttribute!="function"||typeof c.namespaceURI!="string"||typeof c.insertBefore!="function"||typeof c.hasChildNodes!="function")},bi=function(c){return typeof s=="function"&&c instanceof s};function Je(F,c,w){un(F,N=>{N.call(t,c,w,wt)})}const yi=function(c){let w=null;if(Je(q.beforeSanitizeElements,c,null),Dr(c))return Xe(c),!0;const N=fe(c.nodeName);if(Je(q.uponSanitizeElement,c,{tagName:N,allowedTags:ee}),c.hasChildNodes()&&!bi(c.firstElementChild)&&be(/<[/\w]/g,c.innerHTML)&&be(/<[/\w]/g,c.textContent)||c.nodeType===Ht.progressingInstruction||oe&&c.nodeType===Ht.comment&&be(/<[/\w]/g,c.data))return Xe(c),!0;if(!ee[N]||m[N]){if(!m[N]&&wi(N)&&(L.tagNameCheck instanceof RegExp&&be(L.tagNameCheck,N)||L.tagNameCheck instanceof Function&&L.tagNameCheck(N)))return!1;if(Ce&&!ze[N]){const te=O(c)||c.parentNode,Ae=P(c)||c.childNodes;if(Ae&&te){const de=Ae.length;for(let Te=de-1;Te>=0;--Te){const Ue=p(Ae[Te],!0);Ue.__removalCount=(c.__removalCount||0)+1,te.insertBefore(Ue,T(c))}}}return Xe(c),!0}return c instanceof u&&!ou(c)||(N==="noscript"||N==="noembed"||N==="noframes")&&be(/<\/no(script|embed|frames)/i,c.innerHTML)?(Xe(c),!0):(M&&c.nodeType===Ht.text&&(w=c.textContent,un([ue,xe,Pe],te=>{w=Rt(w,te," ")}),c.textContent!==w&&(Ft(t.removed,{element:c.cloneNode()}),c.textContent=w)),Je(q.afterSanitizeElements,c,null),!1)},xi=function(c,w,N){if(ce&&(w==="id"||w==="name")&&(N in n||N in au))return!1;if(!(_&&!Q[w]&&be(he,w))){if(!(S&&be(ot,w))){if(!C[w]||Q[w]){if(!(wi(c)&&(L.tagNameCheck instanceof RegExp&&be(L.tagNameCheck,c)||L.tagNameCheck instanceof Function&&L.tagNameCheck(c))&&(L.attributeNameCheck instanceof RegExp&&be(L.attributeNameCheck,w)||L.attributeNameCheck instanceof Function&&L.attributeNameCheck(w))||w==="is"&&L.allowCustomizedBuiltInElements&&(L.tagNameCheck instanceof RegExp&&be(L.tagNameCheck,N)||L.tagNameCheck instanceof Function&&L.tagNameCheck(N))))return!1}else if(!kr[w]){if(!be(Ke,Rt(N,we,""))){if(!((w==="src"||w==="xlink:href"||w==="href")&&c!=="script"&&Kl(N,"data:")===0&&De[c])){if(!(W&&!be(ke,Rt(N,we,"")))){if(N)return!1}}}}}}return!0},wi=function(c){return c!=="annotation-xml"&&jo(c,it)},Ci=function(c){Je(q.beforeSanitizeAttributes,c,null);const{attributes:w}=c;if(!w||Dr(c))return;const N={attrName:"",attrValue:"",keepAttr:!0,allowedAttributes:C,forceKeepAttr:void 0};let te=w.length;for(;te--;){const Ae=w[te],{name:de,namespaceURI:Te,value:Ue}=Ae,Qt=fe(de);let Se=de==="value"?Ue:Vl(Ue);if(N.attrName=Qt,N.attrValue=Se,N.keepAttr=!0,N.forceKeepAttr=void 0,Je(q.uponSanitizeAttribute,c,N),Se=N.attrValue,st&&(Qt==="id"||Qt==="name")&&(yn(de,c),Se=ct+Se),oe&&be(/((--!?|])>)|<\/(style|title)/i,Se)){yn(de,c);continue}if(N.forceKeepAttr||(yn(de,c),!N.keepAttr))continue;if(!G&&be(/\/>/i,Se)){yn(de,c);continue}M&&un([ue,xe,Pe],Ei=>{Se=Rt(Se,Ei," ")});const Si=fe(c.nodeName);if(xi(Si,Qt,Se)){if(B&&typeof E=="object"&&typeof E.getAttributeType=="function"&&!Te)switch(E.getAttributeType(Si,Qt)){case"TrustedHTML":{Se=B.createHTML(Se);break}case"TrustedScriptURL":{Se=B.createScriptURL(Se);break}}try{Te?c.setAttributeNS(Te,de,Se):c.setAttribute(de,Se),Dr(c)?Xe(c):Mo(t.removed)}catch{}}}Je(q.afterSanitizeAttributes,c,null)},iu=function F(c){let w=null;const N=vi(c);for(Je(q.beforeSanitizeShadowDOM,c,null);w=N.nextNode();)Je(q.uponSanitizeShadowNode,w,null),yi(w),Ci(w),w.content instanceof o&&F(w.content);Je(q.afterSanitizeShadowDOM,c,null)};return t.sanitize=function(F){let c=arguments.length>1&&arguments[1]!==void 0?arguments[1]:{},w=null,N=null,te=null,Ae=null;if(Nr=!F,Nr&&(F="<!-->"),typeof F!="string"&&!bi(F))if(typeof F.toString=="function"){if(F=F.toString(),typeof F!="string")throw Mt("dirty is not a string, aborting")}else throw Mt("toString is not a function");if(!t.isSupported)return F;if(X||Ir(c),t.removed=[],typeof F=="string"&&(R=!1),R){if(F.nodeName){const Ue=fe(F.nodeName);if(!ee[Ue]||m[Ue])throw Mt("root node is forbidden and cannot be sanitized in-place")}}else if(F instanceof s)w=Ai("<!---->"),N=w.ownerDocument.importNode(F,!0),N.nodeType===Ht.element&&N.nodeName==="BODY"||N.nodeName==="HTML"?w=N:w.appendChild(N);else{if(!z&&!M&&!ne&&F.indexOf("<")===-1)return B&&He?B.createHTML(F):F;if(w=Ai(F),!w)return z?null:He?A:""}w&&se&&Xe(w.firstChild);const de=vi(R?F:w);for(;te=de.nextNode();)yi(te),Ci(te),te.content instanceof o&&iu(te.content);if(R)return F;if(z){if(re)for(Ae=J.call(w.ownerDocument);w.firstChild;)Ae.appendChild(w.firstChild);else Ae=w;return(C.shadowroot||C.shadowrootmode)&&(Ae=le.call(r,Ae,!0)),Ae}let Te=ne?w.outerHTML:w.innerHTML;return ne&&ee["!doctype"]&&w.ownerDocument&&w.ownerDocument.doctype&&w.ownerDocument.doctype.name&&be(Wo,w.ownerDocument.doctype.name)&&(Te="<!DOCTYPE "+w.ownerDocument.doctype.name+`>
`+Te),M&&un([ue,xe,Pe],Ue=>{Te=Rt(Te,Ue," ")}),B&&He?B.createHTML(Te):Te},t.setConfig=function(){let F=arguments.length>0&&arguments[0]!==void 0?arguments[0]:{};Ir(F),X=!0},t.clearConfig=function(){wt=null,X=!1},t.isValidAttribute=function(F,c,w){wt||Ir({});const N=fe(F),te=fe(c);return xi(N,te,w)},t.addHook=function(F,c){typeof c=="function"&&Ft(q[F],c)},t.removeHook=function(F,c){if(c!==void 0){const w=Gl(q[F],c);return w===-1?void 0:Yl(q[F],w,1)[0]}return Mo(q[F])},t.removeHooks=function(F){q[F]=[]},t.removeAllHooks=function(){q=Yo()},t}Ko();function*Vo(e="id-",t=0){let n=t;for(;;)n+=1,yield e+n}d.shape({event:d.string,action:d.string,name:d.string,region:d.string,section:d.string,component:d.string,type:d.string,text:d.string});const U=({event:e="",action:t="",name:n="",type:r="",section:a="",text:o="",region:i="",component:s=""})=>{const{dataLayer:u}=window,f={event:e.toLowerCase(),action:t.toLowerCase(),name:n.toLowerCase(),type:r.toLowerCase(),region:i.toLowerCase(),section:a.toLowerCase(),text:o.toLowerCase(),component:s.toLowerCase()};u&&u.push(f)},ff="data:image/png;base64,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",At={MAPS_AND_LOCATIONS:"https://www.asu.edu/about/locations-maps",JOBS:"https://cfo.asu.edu/applicant",DIRECTORY:"https://search.asu.edu/?search-tabs=web_dir_faculty_staff",CONTACT_ASU:"https://www.asu.edu/about/contact",MY_ASU:"https://my.asu.edu/",RANKINGS:"https://www.asu.edu/rankings"},zt={COPYRIGHT_AND_TRADEMARK:"https://www.asu.edu/about/copyright-trademark",ACCESSIBILITY_REPORT:"https://accessibility.asu.edu/report",PRIVACY:"https://www.asu.edu/about/privacy",TERMS_OF_USE:"https://www.asu.edu/about/terms-of-use",EMERGENCY:"https://www.asu.edu/emergency/"},vt={type:"internal link",section:"secondary footer"},uf=()=>l.jsx("div",{className:"wrapper",id:"wrapper-footer-innovation","data-testid":"innovation",children:l.jsx("div",{className:"container",id:"footer-innovation",children:l.jsx("div",{className:"row",children:l.jsx("div",{className:"col",children:l.jsxs("div",{className:"d-flex footer-innovation-links",children:[l.jsxs("nav",{className:"nav","aria-label":"University Services",children:[l.jsx("a",{className:"nav-link",href:At.MAPS_AND_LOCATIONS,onFocus:()=>U({...vt,text:"maps and locations"}),children:"Maps and Locations"}),l.jsx("a",{className:"nav-link",href:At.JOBS,onFocus:()=>U({...vt,text:"jobs"}),children:"Jobs"}),l.jsx("a",{className:"nav-link",href:At.DIRECTORY,onFocus:()=>U({...vt,text:"directory"}),children:"Directory"}),l.jsx("a",{className:"nav-link",href:At.CONTACT_ASU,onFocus:()=>U({...vt,text:"contact asu"}),children:"Contact ASU"}),l.jsx("a",{className:"nav-link",href:At.MY_ASU,onFocus:()=>U({...vt,text:"my asu"}),children:"My ASU"})]}),l.jsx("a",{className:"img-link",href:At.RANKINGS,onFocus:()=>U({...vt,text:"#1 in the u.s. for innovation"}),children:l.jsx("img",{src:ff,alt:"Repeatedly ranked #1 in innovation (ASU ahead of MIT and Stanford), sustainability (ASU ahead of Stanford and UC Berkeley), and global impact (ASU ahead of MIT and Penn State)",width:"459",height:"100",loading:"lazy",decoding:"async"})})]})})})})}),Xt={type:"internal link",section:"tertiary footer"},df=()=>{function e(){try{return window.location.href}catch(t){return console.error(t),""}}return l.jsx("div",{className:"wrapper",id:"wrapper-footer-colophon","data-testid":"legal",children:l.jsx("div",{className:"container",id:"footer-colophon",children:l.jsx("div",{className:"row",children:l.jsx("div",{className:"col",children:l.jsxs("nav",{className:"nav colophon","aria-label":"University Legal and Compliance",children:[l.jsx("a",{className:"nav-link",href:zt.COPYRIGHT_AND_TRADEMARK,onFocus:()=>U({...Xt,text:"copyright and trademark"}),children:"Copyright and Trademark"}),l.jsx("a",{className:"nav-link",href:`${zt.ACCESSIBILITY_REPORT}?a11yref=${e()}`,onFocus:()=>U({...Xt,text:"accessibility"}),children:"Accessibility"}),l.jsx("a",{className:"nav-link",href:zt.PRIVACY,onFocus:()=>U({...Xt,text:"privacy"}),children:"Privacy"}),l.jsx("a",{className:"nav-link",href:zt.TERMS_OF_USE,onFocus:()=>U({...Xt,text:"terms of use"}),children:"Terms of Use"}),l.jsx("a",{className:"nav-link",href:zt.EMERGENCY,onFocus:()=>U({...Xt,text:"emergency"}),children:"Emergency"})]})})})})})};const mf={prefix:"fab",iconName:"square-instagram",icon:[448,512,["instagram-square"],"e055","M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"]},pf={prefix:"fab",iconName:"square-youtube",icon:[448,512,[61798,"youtube-square"],"f431","M282 256.2l-95.2-54.1V310.3L282 256.2zM384 32H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64zm14.4 136.1c7.6 28.6 7.6 88.2 7.6 88.2s0 59.6-7.6 88.1c-4.2 15.8-16.5 27.7-32.2 31.9C337.9 384 224 384 224 384s-113.9 0-142.2-7.6c-15.7-4.2-28-16.1-32.2-31.9C42 315.9 42 256.3 42 256.3s0-59.7 7.6-88.2c4.2-15.8 16.5-28.2 32.2-32.4C110.1 128 224 128 224 128s113.9 0 142.2 7.7c15.7 4.2 28 16.6 32.2 32.4z"]},gf={prefix:"fab",iconName:"square-facebook",icon:[448,512,["facebook-square"],"f082","M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"]},hf={prefix:"fab",iconName:"linkedin",icon:[448,512,[],"f08c","M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"]},Af={prefix:"fab",iconName:"square-x-twitter",icon:[448,512,[],"e61a","M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"]},vf="data:image/png;base64,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",bt={type:"external link",section:"primary footer"},pn=({social:{logoUrl:e,unitLogo:t,mediaLinks:n}})=>l.jsx("div",{className:"wrapper",id:"wrapper-endorsed-footer","data-testid":"social",children:l.jsx("div",{className:"container",id:"endorsed-footer",children:l.jsxs("div",{className:"row",children:[l.jsx("div",{className:"col-md",id:"endorsed-logo",children:l.jsx("a",{href:e,onFocus:()=>U({...bt,type:"internal link",text:"asu logo"}),children:l.jsx("img",{src:t,alt:"ASU University Technology Office Arizona State University."})})}),n&&l.jsx("div",{className:"col-md",id:"social-media",children:l.jsxs("nav",{className:"nav","aria-label":"Social Media",children:[n.facebook&&l.jsx("a",{className:"nav-link",href:n.facebook,"data-testid":"facebook",onFocus:()=>U({...bt,text:"facebook icon"}),children:l.jsx(Ee,{title:"Facebook Social Media Icon",icon:gf})}),n.twitter&&l.jsx("a",{className:"nav-link",href:n.twitter,"data-testid":"twitter",onFocus:()=>U({...bt,text:"twitter icon"}),children:l.jsx(Ee,{title:"Twitter Social Media Icon",icon:Af})}),n.instagram&&l.jsx("a",{className:"nav-link",href:n.instagram,"data-testid":"instagram",onFocus:()=>U({...bt,text:"instagram icon"}),children:l.jsx(Ee,{title:"Instagram Social Media Icon",icon:mf})}),n.youtube&&l.jsx("a",{className:"nav-link",href:n.youtube,"data-testid":"youtube",onFocus:()=>U({...bt,text:"youtube icon"}),children:l.jsx(Ee,{title:"YouTube Social Media Icon",icon:pf})}),n.linkedIn&&l.jsx("a",{className:"nav-link",href:n.linkedIn,"data-testid":"linkedin",onFocus:()=>U({...bt,text:"linkedin icon"}),children:l.jsx(Ee,{title:"LinkedIn Social Media Icon",icon:hf})})]})})]})})});pn.propTypes={social:Oe.shape({unitLogo:d.string.isRequired,mediaLinks:Oe.shape({facebook:d.string,twitter:d.string,linkedIn:d.string,instagram:d.string,youtube:d.string})})},pn.defaultProps={social:{unitLogo:vf,mediaLinks:{facebook:"",twitter:"",linkedIn:"",instagram:"",youtube:""}}};const bf=Bn`
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
`,yf=Bn`
  display: flex;
  align-items: center;
`,xf=pe.footer`
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
    font-family: Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans,
      sans-serif;
    line-height: 1.5rem;
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
    ${bf}
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
    --endorsed-logo-img-max-height: 100%;
    --endorsed-logo-img-width: 100%;
    padding-top: var(--endorsed-logo-padding-top);
    padding-bottom: var(--endorsed-logo-padding-bottom);
    display: var(--endorsed-logo-display);
    align-items: center;

    img {
      width: var(--endorsed-logo-img-width);
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
            padding-right: 0;
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
      .accordion-header,
      .accordion-body {
        background: var(--color-divider-darker);
        color: var(--color-base-white);
        border: 0;
      }

      .accordion-header {
        border-top: 1px solid var(--color-divider-lighter);
        padding-left: 0;

        h5,
        .h5 {
          margin: 0;
          a,
          .accordion-button {
            ${yf}
            justify-content: space-between;
          }
        }

        a,
        .accordion-button {
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

          &:hover {
            background: var(--color-divider-darker);
          }

          svg,
          fa-chevron-up {
            margin-left: 1rem;
            transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
            margin-left: 0.5rem;
            font-size: 1rem;

            &.open {
              transform: rotate(180deg);
            }
          }
        }

        @media (min-width: 1260px) {
          border-top: 0;
          padding: 0;
          a,
          .accordion-button {
            padding: 0;
            cursor: default;
          }

          span {
            display: none;
          }
        }
      }

      .accordion-body {
        display: none;
        overflow: hidden;
        padding: 0 0 0 1.5rem;

        &.collapsing {
          display: block;
          max-height: 0px;
        }
        &.show {
          display: block;
          max-height: 1000px;
        }

        .nav-link {
          color: var(--color-base-grey-2);
          padding: 0 0 1rem;
          line-height: 1.5rem;
          text-decoration: none;
          display: block;

          &:hover,
          &:focus {
            color: var(--color-base-gold);
            text-decoration: underline;
          }
        }

        @media (min-width: 1260px) {
          padding: 0;
          display: block;
          min-height: fit-content;
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
      .accordion-header:has(.h5, h5) {
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
`,wf=()=>l.jsxs(l.Fragment,{children:[l.jsx(uf,{}),l.jsx(df,{})]}),Pr=({social:e,contact:t})=>(j.useEffect(()=>{typeof window<"u"&&Ur({packageName:"component-StyledFooter",component:"Component Footer",type:"NA",configuration:{social:e,contact:t}})},[]),l.jsxs(xf,{role:"contentinfo",children:[e&&l.jsx(pn,{social:e}),t&&l.jsx(vr,{contact:t}),l.jsx(wf,{})]}));Pr.propTypes={social:Oe.shape(pn.propTypes),contact:Oe.shape(vr.propTypes)};const Cf=(e,t,n)=>{xn(n).render(j.createElement(e,t))},Sf=({targetSelector:e,props:t})=>{Cf(Pr,t,document.querySelector(e))},Ef={Lg:"992px",Xl:"1260px"},Jo=j.createContext(),Zo=({initialValue:e,children:t})=>{const n={...e,breakpoint:Ef[e.breakpoint]};return l.jsx(Jo.Provider,{value:n,children:t})};Zo.propTypes={initialValue:d.shape(Wr).isRequired,children:d.node.isRequired};const je=()=>{const e=j.useContext(Jo);if(e===void 0)throw new Error("useAppContext must be used within a AppContextProvider");return e},gn=e=>{const t=window==null?void 0:window.matchMedia(`(max-width: ${e})`),[n,r]=j.useState(t==null?void 0:t.matches),a=o=>{r(o.matches)};return j.useEffect(()=>(t.addEventListener("change",a),()=>t.removeEventListener("change",a)),[]),n},Pf=pe.div`
  background-color: #e8e8e8;
  min-height: 24px;
  transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
  .header-top {
    height: 100%;
    .nav {
      height: 100%;
      display: flex;
      justify-content: flex-end;
      align-items: center;
      .links-container {
        display: flex;
        .nav-link {
          color: #484848;
          font-size: 0.75rem;
          line-height: 0.75rem;
          padding: 0.25rem 0.5rem;
          margin-right: 0.5rem;
          white-space: nowrap;
          text-decoration: none;

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
    position: relative;
    &:before {
      content: "";
      width: 100%;
      height: 50px;
      position: absolute;
      top: -50px;
      border-bottom: 1px solid #d0d0d0;
      background: linear-gradient(
        180deg,
        rgba(232, 232, 232, 0) 0%,
        rgba(232, 232, 232, 1) 100%
      );
    }
    .header-top {
      width: 100%;
      .nav {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column-reverse;
        .links-container {
          display: grid;
          grid-template-columns: 1fr 1fr;
          grid-auto-flow: row;
          justify-items: start;
          width: 100%;
          .nav-link {
            white-space: normal;
            color: #191919;
            margin-right: 0;
            text-align: center;
            width: 100%;
            font-size: 0.875rem;
            padding: 1rem 1.5rem;
            border-top: 1px solid #d0d0d0;
            justify-content: center;
            &:nth-child(even) {
              border-left: 1px solid #d0d0d0;
            }
          }
        }
      }
    }
  }
`,Tf=pe.div`
  display: flex;
  align-items: center;
  margin-right: 0.5rem;
  > a {
    padding: 0;
    margin: 0;
    color: #484848;
    text-decoration: none;
  }
  > span.name {
    font-weight: 700;
  }
  > a.signout:before {
    content: "(";
    margin-left: 4px;
  }
  > a.signout:after {
    content: ") ";
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
  }
`,qo={section:"topbar"},Of=()=>{const{loggedIn:e,userName:t,logoutLink:n,loginLink:r,onLoginClick:a,onLogoutClick:o,breakpoint:i}=je();return l.jsx(Tf,{className:"nav-link login-status",breakpoint:i,children:e?l.jsxs(l.Fragment,{children:[t?l.jsx("span",{className:"name","data-testid":"user-name",children:t}):"",l.jsx("a",{className:"signout",href:n,onFocus:()=>U({...qo,text:"sign out"}),onClick:s=>o==null?void 0:o(s),children:"Sign Out"})]}):l.jsx("a",{href:r,onFocus:()=>U({...qo,text:"sign in"}),onClick:s=>a==null?void 0:a(s),children:"Sign In"})})},Lf=pe.form`
  button {
    border: none;
    background: transparent;
    cursor: pointer;
  }
  .search-button {
    transition: cubic-bezier(0.19, 1, 0.19, 1);
  }
  input[name="q"] {
    width: 200px;
    background-color: #ffffff;
    border: 0;
    border-radius: 0;
    padding: 0.5rem 0.5rem 0.5rem 2rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    border: 1px solid #707070;
    margin: 0.5rem 0;
    display: unset;
    &:focus {
      border-color: transparent;
    }
  }
  .close-search {
    background-color: #ffffff;
    border: 1px solid #d0d0d0;
    border-radius: 100%;
    padding: 0.45rem 0.75rem;
    margin-left: 0.5rem;
  }
  &.open-search {
    margin-left: -1rem;
    .search-button {
      transform: translate(1.9rem);
      pointer-events: none;
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
    padding: 1rem 2rem;
    label {
      position: relative;
      font-size: 0.875rem;
      margin-bottom: 0;
      width: 100%;
      svg {
        position: absolute;
        top: 50%;
        left: 0.5rem;
        transform: translate(0, -50%);
      }
      input {
        width: 100%;
        border: unset;
        margin: 0;
      }
    }
  }
`,Tr={event:"search",action:"type",name:"onenter",type:"main search",region:"navbar",section:"topbar"},kf=()=>{const{breakpoint:e,searchUrl:t,site:n}=je(),r=gn(e),a=j.useRef(null),[o,i]=j.useState(!1);j.useEffect(()=>{o&&a.current.focus()},[o]);const s=f=>{const g=f.target;f.preventDefault(),U({...Tr,text:f.target.elements.q.value}),setTimeout(()=>{g.submit()},100)},u=()=>{i(f=>{const g=!f;return U({...Tr,event:"link",action:"click",name:"onclick",text:g?"search icon":"close search icon"}),g})};return l.jsxs(Lf,{breakpoint:e,action:t,onSubmit:s,method:"get",name:"gs",className:o?"open-search":"","data-testid":"universal-nav-search-form",children:[r?l.jsxs("label",{children:[l.jsx(Ee,{icon:Aa}),l.jsx("input",{ref:a,className:"form-control",type:"search",name:"q","aria-labelledby":"header-top-search",placeholder:"Search asu.edu",required:!0,onChange:f=>U({...Tr,text:f.target.value})})]}):l.jsxs(l.Fragment,{children:[l.jsx("button",{type:"button","aria-label":"Search asu.edu",onClick:u,className:"search-button","data-testid":"search-button",children:l.jsx(Ee,{icon:Aa})}),o&&l.jsxs(l.Fragment,{children:[l.jsx("input",{ref:a,className:"form-control",type:"search",name:"q","aria-labelledby":"header-top-search",placeholder:"Search asu.edu",required:!0}),l.jsx("button",{type:"button","aria-label":"Search asu.edu",onClick:u,className:"close-search","data-testid":"close-search",children:l.jsx(Ee,{icon:ba})})]})]}),l.jsx("input",{name:"url_host",value:n,type:"hidden"}),l.jsx("input",{name:"site",value:"default_collection",type:"hidden"}),l.jsx("input",{name:"sort",value:"date:D:L:d1",type:"hidden"}),l.jsx("input",{name:"output",value:"xml_no_dtd",type:"hidden"}),l.jsx("input",{name:"ie",value:"UTF-8",type:"hidden"}),l.jsx("input",{name:"oe",value:"UTF-8",type:"hidden"}),l.jsx("input",{name:"client",value:"asu_frontend",type:"hidden"}),l.jsx("input",{name:"proxystylesheet",value:"asu_frontend",type:"hidden"})]})},Nf={event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"topbar",text:""},_o=()=>{const{breakpoint:e}=je();function t(){try{return window.location.href}catch(r){return console.error(r),""}}const n=[{className:"nav-link visually-hidden-focusable",href:"#skip-to-content",text:"Skip to main content"},{className:"nav-link visually-hidden-focusable",href:`https://accessibility.asu.edu/report?a11yref=${t()}`,text:"Report an accessibility problem"},{className:"nav-link",href:"https://asu.edu",text:"ASU Home"},{className:"nav-link",href:"https://my.asu.edu",text:"My ASU"},{className:"nav-link",href:"https://www.asu.edu/academics/colleges-schools",text:"Colleges and Schools"}];return l.jsx(Pf,{breakpoint:e,className:"universal-nav","data-testid":"universal-navbar","data-elastic-exclude":"data-elastic-exclude",children:l.jsx("div",{className:"container-xl",children:l.jsx("div",{className:"header-top",children:l.jsxs("nav",{className:"nav","aria-label":"ASU Global",children:[l.jsxs("div",{className:"links-container",children:[n.map(r=>l.jsx("a",{className:r.className,href:r.href,onClick:()=>U({...Nf,text:r.text}),children:r.text},r.href)),l.jsx(Of,{})]}),l.jsx(kf,{})]})})})})},Bf=pe.div`
  background-color: #ffffff;
  border-bottom: 1px solid #d0d0d0;
  padding: 0 12px;
  .navbar {
    padding: 0;
    display: flex;
    align-items: flex-start;
    flex-wrap: nowrap;
  }
  .navbar-brand {
    .vert {
      display: block;
      height: 72px;
      width: auto;
      margin: 20px 1rem 20px 0;
    }
    .horiz {
      display: none;
    }
  }
  .navbar-toggler {
    display: none;
  }
  .expand-title {
    width: 100%;
  }
  @media (min-width: ${({breakpoint:e})=>e}) {
    .no-navigation {
      margin-top: 16px;
      display: flex;
      align-items: center;
      .title {
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
      &.partner {
        flex-direction: row-reverse;
      }
    }
    .partner .content-container {
      min-height: calc(100vh - 240px);
    }
    .navbar-brand {
      padding: 0;
      margin: 0;

      .vert {
        display: none;
      }

      .horiz {
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
      color: #191919;
      border: 0;
      border-radius: 50%;
      font-size: 1.25rem;
      margin-right: 2rem;
      padding: 0.25rem 0.45rem;
      &.collapsed {
        border-radius: 0;
      }
    }
    .no-navigation + nav .buttons-container {
      border-top: 1px solid #cccccc;
    }
  }
`,$o="data:image/png;base64,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",ei="data:image/png;base64,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",If=pe.a`
  display: unset;
  padding: 0;
  margin: 0;
  font-size: unset;
  line-height: unset;
  white-space: unset;
`,Df=()=>{const{logo:e}=je();return l.jsxs(If,{href:(e==null?void 0:e.brandLink)??"https://asu.edu",className:"navbar-brand","data-testid":"logo",onFocus:()=>U({text:"asu logo"}),children:[l.jsx("img",{className:"vert",src:(e==null?void 0:e.src)??$o,alt:(e==null?void 0:e.alt)??"Arizona State University",title:(e==null?void 0:e.title)??"ASU home page",width:"303",height:"234",decoding:"async",fetchpriority:"high"}),l.jsx("img",{className:"horiz",src:(e==null?void 0:e.mobileSrc)??ei,alt:(e==null?void 0:e.alt)??"Arizona State University",title:(e==null?void 0:e.title)??"ASU home page",width:"400",height:"72",decoding:"async",fetchpriority:"high"})]})},Ff=pe.nav`
  white-space: nowrap;
  > .content-container {
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
  .nav-list {
    display: flex;
    margin: 0;
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    width: 100%;
    > .content-container {
      flex-direction: column;
      justify-content: flex-start;
      overflow-y: auto;
      min-height: calc(100vh - 277px);
      max-height: calc(100vh - 277px);
      > *:last-child {
        margin-bottom: min(75px, 15vw);
      }
    }
    .nav-list {
      flex-direction: column;
      width: 100%;
    }
    .buttons-container {
      display: flex;
      align-items: center;
      padding: 1rem 2rem;
      width: 100%;
    }
  }
`,Rf=pe.div`
  position: fixed;
  background-color: #ffffff;
  border: 1px solid #d0d0d0;
  margin: 0;
  z-index: 1031;
  visibility: hidden;
  white-space: normal;
  &.opened {
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
  > .dropdown-container {
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
        border-right: 1px solid #d0d0d0;
      }
      .ul-heading {
        margin-top: 0;
        font-size: 1.5rem;
        letter-spacing: -0.035em;
        font-weight: 700;
        text-align: left;
        opacity: 1;
        margin: 1rem 0;
        line-height: calc(100% + 0.12em);
      }
      .nav-link {
        padding: 0;
        a {
          width: 100%;
          display: inline-block;
          margin: 0.75rem 0;
          position: relative;
          line-height: 1rem;
          color: #191919;
          &:hover {
            color: #8c1d40;
            text-decoration: underline;
          }
        }
        & + .nav-button {
          margin-top: auto;
          padding-top: 2rem;
          & + .nav-button {
            margin-top: 1rem;
          }
        }
      }
    }
  }
  .dropdown-button-container {
    border-top: 1px solid #d0d0d0;
    border-bottom: 1px solid #d0d0d0;
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
    &.opened {
      display: block;
    }
    > .dropdown-container {
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
        .ul-heading {
          font-size: 1.25rem;
        }
        .nav-button {
          padding-top: 1.5rem;
        }
        .nav-link {
          padding: 0 1rem;
          &:not(:last-child) {
            border-bottom: 1px solid #d0d0d0;
          }
          a {
            padding: 1rem 0;
            margin: 0;
          }
        }
      }
    }
    .dropdown-button-container {
      margin-top: 0;
      > div {
        max-width: 100%;
        padding: 1rem 3rem;
      }
    }
  }
`,Mf={event:"link",action:"click",name:"onclick",type:"internal link",region:"navbar",section:"main navbar",text:""},ti=({text:e})=>l.jsx("h3",{className:"ul-heading",children:e});ti.propTypes={text:d.string};const ni=({link:e,dropdownName:t,handleLinkEvent:n})=>l.jsx("li",{className:"nav-button",children:l.jsx(Tt,{text:e.text,color:e.color||"dark",href:e.href,onClick:r=>n(r,e)})});ni.propTypes={link:d.shape({text:d.string,color:d.string,href:d.string}),dropdownName:d.string,handleLinkEvent:d.func};const ri=({link:e,dropdownName:t,handleLinkEvent:n})=>l.jsx("li",{className:"nav-link",children:l.jsx("a",{...e.href?{}:{tabIndex:0},href:e.href,onClick:r=>n(r,e),onKeyDown:r=>n(r,e),children:e.text})});ri.propTypes={link:d.shape({text:d.string,href:d.string}),dropdownName:d.string,handleLinkEvent:d.func};const ai=({dropdownName:e,items:t,buttons:n,classes:r,listId:a,setItemOpened:o,parentLink:i})=>{const{breakpoint:s}=je(),u=(t==null?void 0:t.length)>2,f=j.useRef(null),[g,h]=j.useState(!1),b=(t==null?void 0:t.length)>1;j.useEffect(()=>{var v;if(window&&f.current){const T=(v=f==null?void 0:f.current)==null?void 0:v.getBoundingClientRect().left,P=window.innerWidth*.55;h(T>P)}},[]);const E=v=>v.stopPropagation(),y=(v,T)=>{var J;const{key:P,type:O,target:B}=v,{parentElement:A}=B,Z=()=>{var le;const ae=(le=A.nextElementSibling)==null?void 0:le.firstChild;ae&&ae.focus()},ie=()=>{var le;const ae=(le=A.previousElementSibling)==null?void 0:le.firstChild;ae&&ae.focus()};E(v),P==="ArrowDown"?(v.preventDefault(),Z()):P==="ArrowUp"?(v.preventDefault(),ie()):P==="Escape"?(o(),i!=null&&i.current&&i.current.focus()):(P==="Enter"||P===" "||O==="click")&&((J=T==null?void 0:T.onClick)==null||J.call(T,v),U({...Mf,text:T.text}))},p=(v,T)=>{const P=`${v.text}-${v.href||T}`;return v.type==="heading"?l.jsx(ti,{text:v.text},P):v.type==="button"?l.jsx(ni,{link:v,dropdownName:e,handleLinkEvent:y},P):l.jsx(ri,{link:v,dropdownName:e,handleLinkEvent:y},P)};return l.jsxs(Rf,{ref:f,className:`${r}${g?" aligned-right":""}${u?" mega":""}`,breakpoint:s,children:[l.jsx("div",{id:b?a:"",className:"dropdown-container",children:t==null?void 0:t.map((v,T)=>{const O=Vo(`dropdown-item-${T}-`).next().value;return l.jsx("ul",{id:b?`${a}-${O}`:a,children:v.map((B,A)=>p(B,A))},O)})}),n&&l.jsx("div",{className:"dropdown-button-container",children:l.jsx("div",{children:n.map((v,T)=>l.jsx(Tt,{color:v.color,text:v.text,href:v.href,onClick:E},`${v.text}-${v.href||T}`))})})]})};ai.propTypes={dropdownName:d.string,items:d.arrayOf(d.shape({text:d.string,selected:d.bool,onClick:d.func,href:d.string})),buttons:d.arrayOf(d.shape(Yt)),classes:d.string,listId:d.string,setItemOpened:d.func,parentLink:d.shape({focus:d.func,current:d.instanceOf(HTMLElement)})};const jf=pe.li`
  position: relative;
  padding: 0;
  margin: 0 0.5rem 0 0;
  &:has(.open-link) > a:after,
  &:hover > a:after {
    width: calc(100% + 24px);
  }
  > a {
    display: inline-block;
    padding: 0.5rem 0.75rem;
    line-height: 1rem;
    color: #191919;
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
        #ffc627 0.5%
      );
    }
    &.nav-item-selected:after {
      width: calc(100% + 24px);
    }
    &.nav-item {
      display: block;
    }
    > span {
      position: relative;
      .chevron-icon {
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
        margin-left: 0.5rem;
        font-size: 0.75rem;

        &.open {
          transform: rotate(180deg);
        }
      }
    }
    .mobile-only {
      display: none;
    }
  }
  @media (max-width: ${({breakpoint:e})=>e}) {
    border-bottom: 1px solid #cccccc;
    margin: 0;
    &:first-child {
      border-top: 1px solid #cccccc;
    }
    &:hover > a:after {
      width: 100%;
    }
    .icon-nav-item {
      display: none;
    }
    > a {
      padding: 1rem 2rem 0.75rem;
      width: 100%;
      &.open-link {
        border-bottom: 1px solid #cccccc;
      }
      &:after {
        right: 0;
        top: 0.8rem;
      }
      &.nav-item-selected:after {
        width: 100%;
      }
      > span {
        display: flex;
        justify-content: space-between;
        .chevron-icon {
          font-size: 1.25rem;
        }
      }
      .mobile-only {
        display: initial;
      }
    }
  }
`,Hf={event:"collapse",type:"click"},Or={event:"link",action:"click",name:"onclick",type:"internal link",region:"navbar",section:"main navbar",text:""},oi=({children:e})=>l.jsxs(l.Fragment,{children:[l.jsx(Ee,{icon:Os,className:"icon-nav-item",alt:""}),l.jsx("span",{className:"mobile-only",children:e})]});oi.propTypes={children:d.node};const ii=({link:e,setItemOpened:t,itemOpened:n})=>{const r=j.useRef(null),a=j.useRef(null),o=e.id===n,{breakpoint:i,expandOnHover:s,title:u}=je(),f=gn(i);j.useEffect(()=>{const y=p=>{var v;o&&!((v=r==null?void 0:r.current)!=null&&v.contains(p.target))&&t()};return document.addEventListener("click",y,!0),()=>{document.removeEventListener("click",y,!0)}},[o]);const g=j.useMemo(()=>{var y;return e.type==="icon-home"?l.jsx(oi,{children:e.text}):l.jsxs("span",{children:[e.text,!!((y=e.items)!=null&&y.length)&&l.jsx(Ee,{icon:va,className:`chevron-icon ${o?"open":""}`,alt:""})]})},[e]),h=()=>{var T;const y=!!((T=e.items)!=null&&T.length),p=o?"close":"open",{text:v}=e;U(y?{...Or,...Hf,action:p,text:v}:{...Or,text:e.type==="icon-home"?"home button":v})},b=y=>{var T,P;if(!e.items&&e.href){U({...Or,text:e.text});return}const{key:p}=y;if(["ArrowUp","ArrowDown","ArrowLeft","ArrowRight","Enter"," ","Escape","Click"].includes(p)){if(y.preventDefault(),p==="Escape"&&o){t();return}if((p==="Enter"||p===" ")&&(e.items&&(!s&&!f||f)&&t(),h(),(T=e.onClick)==null||T.call(e,y)),(p==="ArrowDown"||p==="ArrowRight")&&o){const O=document.querySelectorAll(`.header-dropdown-${e.id} li.nav-link a`);O.length&&O[0].focus()}}else y.type==="click"&&e.items?(y.preventDefault(),h(),t()):y.type==="click"&&(h(),(P=e.onClick)==null||P.call(e,y))},E=()=>{s&&!f&&(t(),h())};return l.jsxs(jf,{breakpoint:i,ref:r,onMouseEnter:E,onMouseLeave:E,children:[l.jsx("a",{onKeyDown:b,onClick:b,href:e.href,...e.items?{"aria-expanded":o}:{},...e.href?{}:{tabIndex:0},"aria-owns":e.items?`dropdown-${e.id}`:null,className:`${e.class?e.class:""}${e.selected?" nav-item-selected":""}${o?" open-link":""}`,"data-testid":"nav-item",title:e.type==="icon-home"&&u?`${u} home page`:e.text,ref:a,children:g}),e.items&&l.jsx(ai,{items:e.items,buttons:e.buttons,dropdownName:e.text,classes:`header-dropdown-${e.id} ${o?"opened":""}`,listId:`dropdown-${e.id}`,setItemOpened:t,parentLink:a==null?void 0:a.current})]})};ii.propTypes={link:Sn,setItemOpened:d.func,itemOpened:d.number};const zf="Header buttons cannot have both an onClick and an href property as this breaks accessibility. Please remove one",si=()=>{const{navTree:e,mobileNavTree:t,buttons:n,breakpoint:r}=je(),a=gn(r),[o,i]=j.useState(void 0),s=h=>{i(b=>o===h?void 0:h)},u=h=>{h.onClick&&h.href&&console.error(zf)},f=h=>()=>{U({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:h.text}),h.onClick&&h.onClick()},g=(h,b)=>{const E={...h,id:b},p=Vo(`${h.text}-${b}-`).next().value;return l.jsx(ii,{link:E,setItemOpened:()=>s(b),itemOpened:o},p)};return l.jsxs(Ff,{breakpoint:r,"data-testid":"navigation","aria-label":"Site",children:[((e==null?void 0:e.length)||(t==null?void 0:t.length)||(n==null?void 0:n.length))&&l.jsxs("div",{className:"content-container",children:[((e==null?void 0:e.length)||(t==null?void 0:t.length))&&l.jsx("ul",{className:"nav-list",children:t!=null&&t.length&&a?t==null?void 0:t.map((h,b)=>g(h,b)):e==null?void 0:e.map((h,b)=>g(h,b))}),!!(n!=null&&n.length)&&l.jsx("form",{className:"buttons-container","data-testid":"buttons-container",children:n.map(h=>(u(h),console.log(h),j.createElement(Tt,{...h,key:h.text,onClick:f(h)})))})]}),a&&l.jsx(_o,{})]})},Xf="data:image/png;base64,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",Uf=pe.div`
  margin: 0.5rem 0;
  a {
    display: inline-block;
    &:not(:last-child) {
      border-right: 1px solid #d0d0d0;
      margin-right: 1.5rem;
      padding-right: 1.5rem;
    }
    img {
      height: 52px;
      width: auto;
      &.vert {
        display: initial;
      }
      &.horiz {
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
        &.vert {
          display: none;
        }
        &.horiz {
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
        &.horiz {
          height: 21px;
        }
      }
    }
  }
`,Qf=()=>{const{partnerLogo:e,logo:t,breakpoint:n}=je();return l.jsxs(Uf,{breakpoint:n,"data-testid":"partner",children:[l.jsx("a",{href:(e==null?void 0:e.brandLink)??"https://starbucks.asu.edu/",onClick:()=>U({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:"partner logo"}),children:l.jsx("img",{src:(e==null?void 0:e.src)??Xf,alt:(e==null?void 0:e.alt)??"ASU Starbucks logo",width:"232",height:"81",decoding:"async",fetchpriority:"high"})}),l.jsxs("a",{href:(t==null?void 0:t.brandLink)??"https://asu.edu",onClick:()=>U({text:"asu logo"}),children:[l.jsx("img",{className:"vert",src:(t==null?void 0:t.src)??$o,alt:(t==null?void 0:t.alt)??"Arizona State University",width:"303",height:"234",decoding:"async",fetchpriority:"high"}),l.jsx("img",{className:"horiz",src:(t==null?void 0:t.mobileSrc)??ei,alt:(t==null?void 0:t.alt)??"Arizona State University",width:"400",height:"72",decoding:"async",fetchpriority:"high"})]})]})},Wf=(e,t)=>{const n=new Date(e);return n.setMinutes(n.getMinutes()+t),n},Gf=e=>{const t="localhost",n="title_loaded",r=new Date,a=e||window.location.hostname,o=localStorage.getItem("title_loaded"),i=r.getTime()>parseInt(o,10),s=a===t,u=document.referrer.includes(a);if(s||!u&&(!o||i)){const g=Wf(r,10).getTime();return localStorage.setItem(n,g.toString()),!0}return!1},Yf={"992px":"993px","1260px":"1261px"},ci=pe.div`
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

  > .unit-name {
    display: none;
  }
  .unit-name,
  .subunit-name,
  .title-subunit-name {
    color: #191919;
  }

  .subunit-name,
  .title-subunit-name {
    background-image: linear-gradient(
      to right,
      transparent 51%,
      #ffc626 51%,
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

  @media (min-width: ${({breakpoint:e})=>Yf[e]}) {
    line-height: 1;
    font-weight: 700;
    padding: 0;
    margin: 1rem 0 0.5rem 0;
    > .unit-name {
      font-size: 1rem;
      margin-bottom: 0.5rem;
      display: block;

      :hover {
        text-decoration: underline;
      }
    }
    .subunit-name {
      font-size: 1.5rem;
      margin-bottom: 0;
      display: inline-block;

      :hover {
        text-decoration: underline;
      }
    }
    .title-subunit-name {
      font-size: 2rem;
      font-weight: 700;
      display: inline-block;
      margin: 0.5rem 0 0.5rem 0;

      :hover {
        text-decoration: underline;
      }
    }
  }
`,li=()=>{const[e,t]=j.useState(!1),{title:n,parentOrg:r,parentOrgUrl:a,baseUrl:o,breakpoint:i,animateTitle:s}=je();return j.useEffect(()=>{if(s!==!1){let u=o==="/"?window.location.hostname:o;!u.includes(window.location.hostname)&&u.indexOf("/")===0&&(u=window.location.hostname+u),Gf(u)&&t(!0)}},[e,s,o]),r?l.jsxs(ci,{breakpoint:i,className:"title","data-testid":"title",children:[l.jsx("a",{className:"unit-name",href:a,onClick:()=>U({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:r}),title:`${r} home page`,children:r}),l.jsx("a",{className:`subunit-name ${e?"active":""}`,href:o,onClick:()=>U({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:n}),title:`${n} home page`,children:n})]}):l.jsx(ci,{breakpoint:i,className:"title","data-testid":"title",children:l.jsx("a",{className:`title-subunit-name ${e?"active":""}`,href:o,onClick:()=>U({event:"link",action:"click",name:"onclick",region:"navbar",type:"internal link",section:"main navbar",text:n}),title:`${n} home page`,children:n})})};li.propTypes={...Wt};const Kf=()=>{const{breakpoint:e,isPartner:t,hasNavigation:n}=je(),[r,a]=j.useState(!1),o=gn(e),i=()=>{a(u=>!u)},s=()=>{i(),U({event:"collapse",action:r?"close":"open",type:"click",text:"menu button tablet"})};return l.jsxs(l.Fragment,{children:[!o&&l.jsx(_o,{}),l.jsx(Bf,{breakpoint:e,children:l.jsx("div",{className:"container-xl",children:l.jsx("div",{className:"header-main",children:l.jsxs("div",{className:`navbar navbar-expand-xl ${t?"partner":""}`,children:[!t&&l.jsx(Df,{}),l.jsx("button",{className:`navbar-toggler${r?"":" collapsed"}`,type:"button",onClick:s,"aria-label":"Toggle navigation",children:l.jsx(Ee,{icon:r?ba:Ts,alt:""})}),l.jsxs("div",{className:`${t?"":"expand-title"}${n?"":" no-navigation"}`,children:[t?l.jsx(Qf,{}):l.jsx(li,{}),!o&&l.jsx(si,{})]}),r&&o&&l.jsx(si,{})]})})})})]})},Vf=(e,t)=>e==null?void 0:e.findIndex(n=>{var r;return(n==null?void 0:n.href)===t||Array.isArray(n.items)&&((r=n.items)==null?void 0:r.flat().find(({href:a})=>a===t))}),Jf=e=>e==null?void 0:e.find(t=>t.selected),fi=e=>{if(!Array.isArray(e)||e.length===0||Jf(e))return e;let t="";if(window!=null&&window.location&&(t=window.location.pathname+window.location.search),!t)return e;const n=Vf(e,t);if(n===-1)return e;const r=[...e];return r[n].selected=!0,r},ui={Lg:"992px",Xl:"1260px"},Zf=pe.header`
  font-family: Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans,
    sans-serif;
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
      box-shadow: 0px 0px 0px 2px #ffffff, 0px 0px 0px 4px #191919 !important;
    }
  }
  @media (min-width: ${({breakpoint:e})=>ui[e]}) {
    &.scrolled {
      .universal-nav {
        min-height: 0;
        height: 0;
        overflow: hidden;
      }
      .title {
        margin: 0.5rem 0 0 0;
      }
      a.unit-name {
        display: none;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      }
      a.subunit-name {
        margin: 0.52rem 0;
      }
      a.subunit-name,
      a.title-subunit-name {
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
`,qf=pe.div`
  font-family: Arial, Helvetica, "Nimbus Sans L", "Liberation Sans", FreeSans,
    sans-serif;
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
      box-shadow: 0px 0px 0px 2px #ffffff, 0px 0px 0px 4px #191919 !important;
    }
  }
  @media (min-width: ${({breakpoint:e})=>ui[e]}) {
    &.scrolled {
      .universal-nav {
        min-height: 0;
        height: 0;
        overflow: hidden;
      }
      .title {
        margin: 0.5rem 0 0 0;
      }
      a.unit-name {
        display: none;
        transition: 0.5s cubic-bezier(0.19, 1, 0.19, 1);
      }
      a.subunit-name {
        margin: 0.52rem 0;
      }
      a.subunit-name,
      a.title-subunit-name {
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
`,Lr=({isPartner:e=!1,navTree:t,title:n,baseUrl:r="/",parentOrg:a,parentOrgUrl:o,partnerLogo:i,logo:s,loggedIn:u,userName:f,loginLink:g,onLoginClick:h,logoutLink:b,onLogoutClick:E,buttons:y,breakpoint:p="Xl",animateTitle:v,expandOnHover:T=!1,mobileNavTree:P,searchUrl:O,site:B,renderDiv:A="false"})=>{const Z=fi(t),ie=fi(P),J=j.useRef(null),ae=()=>{const q=window.scrollY;J!=null&&J.current&&(q>J.current.getBoundingClientRect().top?J.current.classList.add("scrolled"):J.current.classList.remove("scrolled"))};j.useEffect(()=>{typeof window<"u"&&Ur({packageName:"component-header",component:"Component Header",type:"NA",configuration:{site:B,isPartner:e,searchUrl:O,navTree:Z,parentOrg:a,buttons:y,mobileNavTree:ie}})},[]),j.useEffect(()=>(window==null||window.addEventListener("scroll",ae),()=>window.removeEventListener("scroll",ae)),[]);const le=()=>{const q=A==="true"?qf:Zf;return l.jsx(q,{id:"asuHeader",ref:J,breakpoint:p,children:l.jsx(Kf,{})})};return l.jsx(Zo,{initialValue:{isPartner:e,navTree:Z,title:n,baseUrl:r,parentOrg:a,parentOrgUrl:o,partnerLogo:i,logo:s,loggedIn:u,userName:f,loginLink:g,onLoginClick:h,logoutLink:b,onLogoutClick:E,buttons:y,breakpoint:p,animateTitle:v,expandOnHover:T,mobileNavTree:ie,hasNavigation:!!(Z!=null&&Z.length)||!!(ie!=null&&ie.length),searchUrl:O,site:B},children:le()})};Lr.propTypes={...Wr};const _f=(e,t,n)=>{xn(n).render(j.createElement(e,t))},$f=({targetSelector:e,props:t})=>{_f(Lr,t,document.querySelector(e))};Be.ASUFooter=Pr,Be.ASUHeader=Lr,Be.initASUFooter=Sf,Be.initGlobalHeader=$f,Object.defineProperty(Be,Symbol.toStringTag,{value:"Module"})});
/**
 * @license React
 * react-jsx-runtime.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
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
/*! @license DOMPurify 3.2.4 | (c) Cure53 and other contributors | Released under the Apache license 2.0 and Mozilla Public License 2.0 | github.com/cure53/DOMPurify/blob/3.2.4/LICENSE */
