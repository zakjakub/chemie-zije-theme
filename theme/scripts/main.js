// noinspection ES6UnusedImports,JSUnusedLocalSymbols
// noinspection ES6CheckImport
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper/bundle';
import '../styles/main.scss';
import {analyseMF, getInfo} from 'chemcalc';
import TomSelect from 'tom-select';

const swiper = new Swiper('.swiper-container', {
    observer: true,
    observeParents: true,
    direction: 'horizontal',
    centeredSlides: true,
    loop: false,
    allowTouchMove: false,
    freeMode: false,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    on: {
        paginationUpdate: function (initializedSwiper) {
            initSwiper(initializedSwiper.el);
        },
    },
});

const elements = getInfo().elements;

function getElement(symbol) {
    const element = elements.find(el => el.symbol === symbol);
    console.log('For', symbol, 'its', element);

    return element;
}

// noinspection JSUnresolvedVariable
function processFormula(table, formula) {
    table.innerHTML = '';

    let sum = 0;

    const tableHead = document.createElement('thead');
    const tableBody = document.createElement('tbody');
    const tableFoot = document.createElement('tfoot');

    tableHead.innerHTML = `<tr class="text-center">
            <td>Počet atomů</td>
            <td>Prvek</td>
            <td class="text-end">A<sub>r</sub> prvku </td>
            <td class="text-end">M<sub>r</sub> mezisoučet </td>
        </tr>`;

    // noinspection JSUnresolvedVariable
    analyseMF(formula).ea.forEach(part => {
        const element = getElement(part.element);
        const row = document.createElement('tr');

        const countCell = document.createElement('td');
        countCell.classList.add('text-center');
        countCell.innerText = Number(part.number).toFixed(1);
        row.appendChild(countCell);

        const elementCell = document.createElement('td');
        elementCell.classList.add('text-center');
        elementCell.innerText = part.element;
        row.appendChild(elementCell);

        const massCell = document.createElement('td');
        massCell.classList.add('text-end');
        massCell.innerText = Number(element.mass).toFixed(3);
        row.appendChild(massCell);

        const massSumCell = document.createElement('td');
        massSumCell.classList.add('text-end');
        massSumCell.innerText = (Number(part.number) * Number(element.mass)).toFixed(3);
        row.appendChild(massSumCell);

        tableBody.appendChild(row);
        sum += (Number(part.number) * Number(element.mass));
    });

    tableFoot.innerHTML = `<tr>
            <td colspan="3">Relativní molekulová hmotnost</td>
            <td class="text-end"><strong>${sum.toFixed(3)}</strong></td>
        </tr>`;

    table.appendChild(tableHead);
    table.appendChild(tableBody);
    table.appendChild(tableFoot);
}

function initCalcs() {
    document.querySelectorAll('.molcalc').forEach(molcalc => {
        const table = molcalc.querySelector('.molcalc_table');
        const molcalcFormula = molcalc.querySelector('.molcalc_formula');
        molcalcFormula.addEventListener('change', event => {
            if (event.target.value) {
                processFormula(table, event.target.value);
            }
        });
        molcalc.querySelector('button').addEventListener('click', event => {
            if (molcalcFormula.value) {
                processFormula(table, molcalcFormula.value);
            }
        });
    });
}

function initSelects() {
    const tomSelect = new TomSelect('#categories', {
        plugins: ['remove_button'],
        create: true,
        onItemAdd: function () {
            this.setTextboxValue('');
            this.refreshOptions();
        },
    });
    const tomSelect2 = new TomSelect('#level', {
        create: true,
        controlInput: null,
        onItemAdd: function () {
            this.setTextboxValue('');
            this.close();
            this.refreshOptions();
        },
    });
    const tomSelect3 = new TomSelect('#count', {
        create: true,
        controlInput: null,
        onItemAdd: function () {
            this.setTextboxValue('');
            this.close();
            this.refreshOptions();
        },
    });
}

function getLevelBackgroundClass(level) {
    if (Number.parseInt(level) < 3) {
        return 'bg-success';
    }
    if (Number.parseInt(level) < 5) {
        return 'bg-warning';
    }
    if (Number.parseInt(level) >= 5) {
        return 'bg-danger';
    }

    return 'bg-primary';
}

function initSwiper(swiperContainer) {
    const colors = [];
    swiperContainer.querySelectorAll('.swiper-slide').forEach(swiperSlide => {
        colors.push(getLevelBackgroundClass(swiperSlide.dataset.level ?? 'level-attr-is-unknown'));
        console.log('Get level attr: ', swiperSlide.dataset.level ?? '[]');
    });
    swiperContainer.querySelectorAll('.swiper-pagination-bullet').forEach((bullet, index) => {
        bullet.classList.add(colors[index] ?? 'level-class-is-unknown');
        console.log('Get level color: ', colors[index] ?? '[]');
    });
}

window.addEventListener('load', () => {
    initCalcs();
    initSelects();
});

