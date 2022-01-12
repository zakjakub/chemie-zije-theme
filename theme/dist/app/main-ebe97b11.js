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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{17:function(e,t,n){"use strict";n.r(t);n(16);var r=n(5),o=n(2),a=n(3),l=n.n(a),i=(new r.a(".swiper-container",{observer:!0,observeParents:!0,direction:"horizontal",centeredSlides:!0,loop:!1,allowTouchMove:!1,freeMode:!1,pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},on:{paginationUpdate:function(e){var t,n;t=e.el,n=[],t.querySelectorAll(".swiper-slide").forEach((function(e){var t,r,o;n.push((o=null!==(t=e.dataset.level)&&void 0!==t?t:"level-attr-is-unknown",Number.parseInt(o)<3?"bg-success":Number.parseInt(o)<5?"bg-warning":Number.parseInt(o)>=5?"bg-danger":"bg-primary")),console.log("Get level attr: ",null!==(r=e.dataset.level)&&void 0!==r?r:"[]")})),t.querySelectorAll(".swiper-pagination-bullet").forEach((function(e,t){var r,o;e.classList.add(null!==(r=n[t])&&void 0!==r?r:"level-class-is-unknown"),console.log("Get level color: ",null!==(o=n[t])&&void 0!==o?o:"[]")}))}}}),Object(o.getInfo)().elements);function d(e,t){e.innerHTML="";var n=0,r=document.createElement("thead"),a=document.createElement("tbody"),l=document.createElement("tfoot");r.innerHTML='<tr class="text-center">\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>',Object(o.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=i.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),r=document.createElement("tr"),o=document.createElement("td");o.classList.add("text-center"),o.innerText=Number(e.number).toFixed(1),r.appendChild(o);var l=document.createElement("td");l.classList.add("text-center"),l.innerText=e.element,r.appendChild(l);var d=document.createElement("td");d.classList.add("text-end"),d.innerText=Number(t.mass).toFixed(3),r.appendChild(d);var c=document.createElement("td");c.classList.add("text-end"),c.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),r.appendChild(c),a.appendChild(r),n+=Number(e.number)*Number(t.mass)})),l.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n            <td class="text-end"><strong>'.concat(n.toFixed(3),"</strong></td>\n        </tr>"),e.appendChild(r),e.appendChild(a),e.appendChild(l)}window.addEventListener("load",(function(){document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){d(t,e.target.value)}))})),new l.a("#categories",{plugins:["remove_button"],create:!0,onItemAdd:function(){this.setTextboxValue(""),this.refreshOptions()}}),new l.a("#level",{create:!0,controlInput:null,onItemAdd:function(){this.refreshOptions()}})}))},6:function(e,t,n){n(7),e.exports=n(17)}},[[6,1,2]]]);
//# sourceMappingURL=main-ebe97b11.js.map