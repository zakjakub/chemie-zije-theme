// noinspection ES6UnusedImports,JSUnusedLocalSymbols
// noinspection ES6CheckImport
import * as bootstrap from 'bootstrap';
import Swiper from 'swiper/bundle';
import '../styles/main.scss';
import { analyseMF, getInfo } from 'chemcalc';

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

// noinspection JSUnresolvedVariable
function processFormula(table, formula)
{
    table.innerHTML = '';

    const tableHead = document.createElement('thead');
    const tableBody = document.createElement('tbody');
    const tableFoot = document.createElement('tfoot');

    tableHead.innerHTML = `<tr>
            <td>Počet atomů</td>
            <td>Prvek</td>
            <td>A<sub>r</sub> prvku </td>
            <td>M<sub>r</sub> mezisoučet </td>
        </tr>`;

    tableFoot.innerHTML = `<tr>
            <td colspan="3">Relativní molekulová hmotnost</td>
        </tr>`;

    // noinspection JSUnresolvedVariable
    analyseMF(formula).ea.forEach(part => {
        const element = getElement(part.element);
        const row = document.createElement('tr');

        const countCell = document.createElement('td');
        countCell.innerText = Number(part.number).toFixed(3);
        row.appendChild(countCell);

        const elementCell = document.createElement('td');
        elementCell.innerText = part.element;
        row.appendChild(elementCell);

        const massCell = document.createElement('td');
        massCell.innerText = Number(element.mass).toFixed(3);
        row.appendChild(massCell);

        const massSumCell = document.createElement('td');
        massSumCell.innerText = (Number(part.number) * Number(element.mass)).toFixed(3);
        row.appendChild(massSumCell);
        tableBody.appendChild(row);
    });

    table.appendChild(tableHead);
    table.appendChild(tableBody);
    table.appendChild(tableFoot);
}

function initCalcs()
{
    document.querySelectorAll('.molcalc').forEach(molcalc => {
        const table = molcalc.querySelector('.molcalc_table');
        molcalc.querySelector('.molcalc_formula').addEventListener('change', event => {
            processFormula(table, event.target.value);
        });
    });
}

initCalcs();

