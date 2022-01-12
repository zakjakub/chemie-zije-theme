/*!
 * 
 * chemieZijeTheme
 * 
 * @author Jakub ZAK
 * @version 0.1.0
 * @link UNLICENSED
 * @license UNLICENSED
 * 
 * Copyright (c) 2022 Jakub ZAK
 * 
 * This software is released under the UNLICENSED License
 * https://opensource.org/licenses/UNLICENSED
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{17:function(e,t,n){"use strict";n.r(t);n(16);var r=n(5),a=n(2),o=n(4),l=n.n(o),i=(new r.a(".swiper-container",{observer:!0,observeParents:!0,direction:"horizontal",centeredSlides:!0,loop:!1,allowTouchMove:!1,freeMode:!1,pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},on:{paginationUpdate:function(e){var t,n;t=e.el,n=[],t.querySelectorAll(".swiper-slide").forEach((function(e){var t,r,a;n.push((a=null!==(t=e.dataset.level)&&void 0!==t?t:"level-attr-is-unknown",Number.parseInt(a)<3?"bg-success":Number.parseInt(a)<5?"bg-warning":Number.parseInt(a)>=5?"bg-danger":"bg-primary")),console.log("Get level attr: ",null!==(r=e.dataset.level)&&void 0!==r?r:"[]")})),t.querySelectorAll(".swiper-pagination-bullet").forEach((function(e,t){var r,a;e.classList.add(null!==(r=n[t])&&void 0!==r?r:"level-class-is-unknown"),console.log("Get level color: ",null!==(a=n[t])&&void 0!==a?a:"[]")}))}}}),Object(a.getInfo)().elements);function d(e,t){e.innerHTML="";var n=0,r=document.createElement("thead"),o=document.createElement("tbody"),l=document.createElement("tfoot");r.innerHTML='<tr class="text-center">\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>',Object(a.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=i.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),r=document.createElement("tr"),a=document.createElement("td");a.classList.add("text-center"),a.innerText=Number(e.number).toFixed(1),r.appendChild(a);var l=document.createElement("td");l.classList.add("text-center"),l.innerText=e.element,r.appendChild(l);var d=document.createElement("td");d.classList.add("text-end"),d.innerText=Number(t.mass).toFixed(3),r.appendChild(d);var s=document.createElement("td");s.classList.add("text-end"),s.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),r.appendChild(s),o.appendChild(r),n+=Number(e.number)*Number(t.mass)})),l.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n            <td class="text-end"><strong>'.concat(n.toFixed(3),"</strong></td>\n        </tr>"),e.appendChild(r),e.appendChild(o),e.appendChild(l)}window.addEventListener("load",(function(){document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){d(t,e.target.value)}))})),new l.a("#categories",{plugins:["remove_button"],create:!0,onItemAdd:function(){this.setTextboxValue(""),this.refreshOptions()},render:{option:function(e,t){return'<div class="d-flex"><span>'+t(e.value)+'</span><span class="ms-auto text-muted">'+t(e.date)+"</span></div>"},item:function(e,t){return"<div>"+t(e.value)+"</div>"}}})}))},6:function(e,t,n){n(7),e.exports=n(17)}},[[6,1,2]]]);
//# sourceMappingURL=main-e0923a72.js.map