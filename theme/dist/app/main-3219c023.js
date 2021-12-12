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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{4:function(e,t,n){n(5),e.exports=n(8)},8:function(e,t,n){"use strict";n.r(t);n(7);var r=n(3),o=n(2),a=(new r.a(".swiper-container",{direction:"horizontal",loop:!1,pagination:{el:".swiper-pagination"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),Object(o.getInfo)().elements);function i(e,t){e.innerHTML="";var n=0,r=document.createElement("thead"),i=document.createElement("tbody"),d=document.createElement("tfoot");r.innerHTML="<tr>\n            <td>Počet atomů</td>\n            <td>Prvek</td>\n            <td>A<sub>r</sub> prvku </td>\n            <td>M<sub>r</sub> mezisoučet </td>\n        </tr>",Object(o.analyseMF)(t).ea.forEach((function(e){var t=function(e){var t=a.find((function(t){return t.symbol===e}));return console.log("For",e,"its",t),t}(e.element),r=document.createElement("tr"),o=document.createElement("td");o.innerText=Number(e.number).toFixed(3),r.appendChild(o);var d=document.createElement("td");d.innerText=e.element,r.appendChild(d);var c=document.createElement("td");c.innerText=Number(t.mass).toFixed(3),r.appendChild(c);var l=document.createElement("td");l.innerText=(Number(e.number)*Number(t.mass)).toFixed(3),r.appendChild(l),i.appendChild(r),n+=(Number(e.number)*Number(t.mass)).toFixed(3)})),d.innerHTML='<tr>\n            <td colspan="3">Relativní molekulová hmotnost</td>\n            <td>'.concat(n,"</td>\n        </tr>"),e.appendChild(r),e.appendChild(i),e.appendChild(d)}document.querySelectorAll(".molcalc").forEach((function(e){var t=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){i(t,e.target.value)}))}))}},[[4,1,2]]]);
//# sourceMappingURL=main-3219c023.js.map