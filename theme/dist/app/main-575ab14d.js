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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{17:function(e,t,n){"use strict";n.r(t);n(16);var o=n(5),r=n(2),a=n(3),l=n.n(a),i=(new o.a(".swiper-container",{observer:!0,observeParents:!0,direction:"horizontal",centeredSlides:!0,loop:!1,allowTouchMove:!1,freeMode:!1,pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},on:{paginationUpdate:function(e){var t,n;t=e.el,n=[],t.querySelectorAll(".swiper-slide").forEach((function(e){var t,o,r;n.push((r=null!==(t=e.dataset.level)&&void 0!==t?t:"level-attr-is-unknown",Number.parseInt(r)<3?"bg-success":Number.parseInt(r)<5?"bg-warning":Number.parseInt(r)>=5?"bg-danger":"bg-primary")),console.log("Get level attr: ",null!==(o=e.dataset.level)&&void 0!==o?o:"[]")})),t.querySelectorAll(".swiper-pagination-bullet").forEach((function(e,t){var o,r;e.classList.add(null!==(o=n[t])&&void 0!==o?o:"level-class-is-unknown"),console.log("Get level color: ",null!==(r=n[t])&&void 0!==r?r:"[]")}))}}}),Object(r.getInfo)().elements);function s(e,t){e.innerHTML="";var n=0,o=document.createElement("thead"),a=document.createElement("tbody"),l=document.createElement("tfoot");o.innerHTML='<tr class="text-center">\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>',Object(r.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=i.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),o=document.createElement("tr"),r=document.createElement("td");r.classList.add("text-center"),r.innerText=Number(e.number).toFixed(1),o.appendChild(r);var l=document.createElement("td");l.classList.add("text-center"),l.innerText=e.element,o.appendChild(l);var s=document.createElement("td");s.classList.add("text-end"),s.innerText=Number(t.mass).toFixed(3),o.appendChild(s);var d=document.createElement("td");d.classList.add("text-end"),d.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),o.appendChild(d),a.appendChild(o),n+=Number(e.number)*Number(t.mass)})),l.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n            <td class="text-end"><strong>'.concat(n.toFixed(3),"</strong></td>\n        </tr>"),e.appendChild(o),e.appendChild(a),e.appendChild(l)}window.addEventListener("load",(function(){document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){s(t,e.target.value)}))})),new l.a("#categories",{plugins:["remove_button"],create:!0,onItemAdd:function(){this.setTextboxValue(""),this.refreshOptions()}}),new l.a("#level",{create:!0,controlInput:null,onItemAdd:function(){this.setTextboxValue(""),this.close(),this.refreshOptions()}})}))},6:function(e,t,n){n(7),e.exports=n(17)}},[[6,1,2]]]);
//# sourceMappingURL=main-575ab14d.js.map