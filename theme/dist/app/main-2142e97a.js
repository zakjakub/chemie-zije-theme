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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{4:function(e,t,n){n(5),e.exports=n(8)},8:function(e,t,n){"use strict";n.r(t);n(7);var r=n(3),o=n(2),a=(new r.a(".swiper-container",{direction:"horizontal",loop:!1,pagination:{el:".swiper-pagination"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),Object(o.getInfo)().elements);function i(e,t){e.innerHTML="";var n=document.createElement("thead"),r=document.createElement("tbody"),i=document.createElement("tfoot");n.innerHTML="<tr>\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>",i.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n        </tr>',Object(o.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=a.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),n=document.createElement("tr"),o=document.createElement("td");o.innerText=Number(e.number).toFixed(3),n.appendChild(o);var i=document.createElement("td");i.innerText=e.element,n.appendChild(i);var d=document.createElement("td");d.innerText=Number(t.mass).toFixed(3),n.appendChild(d);var c=document.createElement("td");c.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),n.appendChild(c),r.appendChild(n)})),e.appendChild(n),e.appendChild(r),e.appendChild(i)}document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){i(t,e.target.value)}))}))}},[[4,1,2]]]);
//# sourceMappingURL=main-2142e97a.js.map