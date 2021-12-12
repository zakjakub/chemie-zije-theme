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
(window.wpackiochemieZijeThemeappJsonp=window.wpackiochemieZijeThemeappJsonp||[]).push([[0],{4:function(e,n,t){t(5),e.exports=t(8)},8:function(e,n,t){"use strict";t.r(n);t(7);var o=t(3),r=t(2),a=(new o.a(".swiper-container",{direction:"horizontal",loop:!1,pagination:{el:".swiper-pagination"},navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"}}),Object(r.getInfo)().elements);function i(e,n){e.innerHTML="";var t=Object(r.analyseMF)(n);console.log("Formula:",n,"Result:",t),t.ea.forEach((function(n){var t,o=(t=n.symbol,a.find((function(e){return e.symbol===t}))),r=document.createElement("tr"),i=document.createElement("td");i.innerText=Number(n.number).toFixed(3),r.appendChild(i);var c=document.createElement("td");c.innerText=n.symbol,r.appendChild(c);var l=document.createElement("td");l.innerText=Number(o.mass).toFixed(3),r.appendChild(l);var m=document.createElement("td");m.innerText=(Number(n.number)*Number(o.mass)).toFixed(3),r.appendChild(m),e.appendChild(r)}))}document.querySelectorAll(".molcalc").forEach((function(e){var n=e.querySelector(".molcalc_table");e.querySelector(".molcalc_formula").addEventListener("change",(function(e){i(n,e.target.value)}))}))}},[[4,1,2]]]);
//# sourceMappingURL=main-015f8e00.js.map