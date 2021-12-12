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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{4:function(e,n,t){t(5),e.exports=t(8)},8:function(e,n,t){"use strict";t.r(n);t(7);var o=t(3),r=t(2),a=(new o.a(".swiper-container",{direction:"horizontal",loop:!1,pagination:{el:".swiper-pagination"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),Object(r.getInfo)().elements);function i(e,n){e.innerHTML="";var t=Object(r.analyseMF)(n);console.log("Formula:",n,"Result:",t),t.ea.forEach((function(n){console.log("Part is",n);var t=function(e){var n=a.find((function(n){return n.symbol===e}));return console.log("For",e,"its",n),n}(n.element),o=document.createElement("tr"),r=document.createElement("td");r.innerText=Number(n.number).toFixed(3),o.appendChild(r);var i=document.createElement("td");i.innerText=n.element,o.appendChild(i);var c=document.createElement("td");c.innerText=Number(t.mass).toFixed(3),o.appendChild(c);var l=document.createElement("td");l.innerText=(Number(n.number)*Number(t.mass)).toFixed(3),o.appendChild(l),e.appendChild(o)}))}document.querySelectorAll(".molcalc").forEach((function(e){var n=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){i(n,e.target.value)}))}))}},[[4,1,2]]]);
//# sourceMappingURL=main-0aa85f15.js.map