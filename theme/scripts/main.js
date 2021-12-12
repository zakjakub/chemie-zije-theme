// noinspection ES6UnusedImports,JSUnusedLocalSymbols
// noinspection ES6CheckImport
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper/bundle';
import '../styles/main.scss';
import { analyseMF, getInfo } from "chemcalc";

const swiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: false,
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});




function initCalcs()
{
    document.querySelectorAll('.molcalc').forEach(molcalc => {
        molcalc.querySelector('.molcalc_formula').addEventListener('change', event => {
            console.log(getInfo());
            console.log(analyseMF(event.target.value));
        })
    });
}

initCalcs();



