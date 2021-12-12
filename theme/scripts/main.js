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


const elements = getInfo().elements;

function getElement(symbol)
{
    const element = elements.find(element => element.symbol === symbol);
    console.log('For', symbol, 'its', element);

    return element;
}

function processFormula(table, formula)
{
    table.innerHTML = '';
    const result = analyseMF(formula);
    console.log('Formula:', formula, 'Result:', result);
    // noinspection JSUnresolvedVariable
    result.ea.forEach(part => {
        console.log('Part is', part);
        const element = getElement(part.symbol);
        const row = document.createElement('tr');

        const countCell = document.createElement('td');
        countCell.innerText = Number(part.number).toFixed(3);
        row.appendChild(countCell);

        const elementCell = document.createElement('td');
        elementCell.innerText = part.symbol;
        row.appendChild(elementCell);

        const massCell = document.createElement('td');
        massCell.innerText = Number(element.mass).toFixed(3);
        row.appendChild(massCell);

        const massSumCell = document.createElement('td');
        massSumCell.innerText = (Number(part.number) * Number(element.mass)).toFixed(3);
        row.appendChild(massSumCell);

        table.appendChild(row);
    });

}

function initCalcs()
{
    document.querySelectorAll('.molcalc').forEach(molcalc => {
        const table = molcalc.querySelector('.molcalc_table');
        molcalc.querySelector('.molcalc_formula').addEventListener('change', event => {
            processFormula(table, event.target.value);
        })
    });
}

initCalcs();

