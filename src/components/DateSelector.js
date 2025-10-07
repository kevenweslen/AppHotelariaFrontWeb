export default function DateSelector(){
    const divDate = document.createElement('div');
    divDate.className = 'divDate';

    const dateCheciIn = document.createElement('input');
    dateCheciIn.type = 'date';
    dateCheciIn.className = 'card p-4 shadow-lg inputDate';

    const dateCheciOut = document.createElement('input');
    dateCheciOut.type = 'date';
    dateCheciOut.className = 'card p-4 shadow-lg inputDate';

    const dateAmount = document.createElement('select');
    dateAmount.className = 'inputDate';

    dateAmount.innerHTML = 
    `
    <option value="">quantas pessoas?</option>
    <option value="1">1 pessoa</option>
    <option value="2">2 pessoas</option>
    <option value="3">3 pessoas</option>
    <option value="4">4 pessoas</option>
    <option value="5">5 pessoas ou mais</option>
    `

    const btnSearchRoom = document.createElement('button');
    btnSearchRoom.type = 'submit';
    btnSearchRoom.textContent = 'Pesquisar';
    btnSearchRoom.className = 'btn btn-primary'
    divDate.appendChild(dateCheciIn);
    divDate.appendChild(dateCheciOut);
    divDate.appendChild(dateAmount);
    divDate.appendChild(btnSearchRoom);

    return divDate

}