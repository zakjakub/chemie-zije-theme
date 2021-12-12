/*!
 * 
 * chemieZijeTheme
 * 
 * @author Jakub ZAK
 * @version 0.1.0
 * @link UNLICENSED
 * @license UNLICENSED
 * 
 * Copyright (c) 2021 Jakub ZAK
 * 
 * This software is released under the UNLICENSED License
 * https://opensource.org/licenses/UNLICENSED
 * 
 * Compiled with the help of https://wpack.io
 * A zero setup Webpack Bundler Script for WordPress
 */
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{4:function(e,t,n){n(5),e.exports=n(8)},8:function(e,t,n){"use strict";n.r(t);n(7);var r=n(3),a=n(2),o=(new r.a(".swiper-container",{direction:"horizontal",loop:!1,pagination:{el:".swiper-pagination"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),Object(a.getInfo)().elements);function d(e,t){e.innerHTML="";var n=0,r=document.createElement("thead"),d=document.createElement("tbody"),c=document.createElement("tfoot");r.innerHTML='<tr class="text-center">\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>',Object(a.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=o.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),r=document.createElement("tr"),a=document.createElement("td");a.classList.add("text-center"),a.innerText=Number(e.number).toFixed(1),r.appendChild(a);var c=document.createElement("td");c.classList.add("text-center"),c.innerText=e.element,r.appendChild(c);var i=document.createElement("td");i.classList.add("text-end"),i.innerText=Number(t.mass).toFixed(3),r.appendChild(i);var l=document.createElement("td");l.classList.add("text-end"),l.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),r.appendChild(l),d.appendChild(r),n+=Number(e.number)*Number(t.mass)})),c.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n            <td class="text-end"><strong>'.concat(n.toFixed(3),"</strong></td>\n        </tr>"),e.appendChild(r),e.appendChild(d),e.appendChild(c)}document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){d(t,e.target.value)}))}))}},[[4,1,2]]]);
//# sourceMappingURL=main-151223b8.js.map