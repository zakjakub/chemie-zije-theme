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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{4:function(e,t,n){n(5),e.exports=n(8)},8:function(e,t,n){"use strict";n.r(t);n(7);var r=n(3),o=n(1),a=(new r.a(".swiper-container",{observer:!0,observeParents:!0,direction:"horizontal",centeredSlides:!0,loop:!1,allowTouchMove:!1,freeMode:!1,pagination:{el:".swiper-pagination",clickable:!0},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),Object(o.getInfo)().elements);function l(e,t){e.innerHTML="";var n=0,r=document.createElement("thead"),l=document.createElement("tbody"),i=document.createElement("tfoot");r.innerHTML='<tr class="text-center">\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>',Object(o.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=a.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),r=document.createElement("tr"),o=document.createElement("td");o.classList.add("text-center"),o.innerText=Number(e.number).toFixed(1),r.appendChild(o);var i=document.createElement("td");i.classList.add("text-center"),i.innerText=e.element,r.appendChild(i);var c=document.createElement("td");c.classList.add("text-end"),c.innerText=Number(t.mass).toFixed(3),r.appendChild(c);var d=document.createElement("td");d.classList.add("text-end"),d.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),r.appendChild(d),l.appendChild(r),n+=Number(e.number)*Number(t.mass)})),i.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n            <td class="text-end"><strong>'.concat(n.toFixed(3),"</strong></td>\n        </tr>"),e.appendChild(r),e.appendChild(l),e.appendChild(i)}function i(){document.querySelectorAll(".swiper-container").forEach((function(e){var t=[];e.querySelectorAll(".swiper-slide").forEach((function(e){var n,r,o;t.push((o=null!==(n=e.dataset.level)&&void 0!==n?n:"level-attr-is-unknown",Number.parseInt(o)<3?"bg-success":Number.parseInt(o)<5?"bg-warning":Number.parseInt(o)>=5?"bg-danger":"bg-primary")),console.log("Get level attr: ",null!==(r=e.dataset.level)&&void 0!==r?r:"[]")})),e.querySelectorAll(".swiper-pagination-bullet").forEach((function(e,n){var r,o;e.classList.add(null!==(r=t[n])&&void 0!==r?r:"level-class-is-unknown"),console.log("Get level color: ",null!==(o=t[n])&&void 0!==o?o:"[]")}))}))}window.addEventListener("load",(function(){document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){l(t,e.target.value)}))})),i()}))}},[[4,1,2]]]);
//# sourceMappingURL=main-b084c5ff.js.map