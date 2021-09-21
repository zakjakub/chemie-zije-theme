// noinspection ES6UnusedImports,JSUnusedLocalSymbols
// noinspection ES6CheckImport
import bootstrap from 'bootstrap';
import Swiper from 'swiper/bundle';
import '../styles/main.scss';

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

