/*PARA AMANHÃ, 08/10
  - Criar um componente  chamado Modal.js e inicializá-lo na página home.js
    referente às tarefas 1, 2 e 4 abaixo
  - Criar um componente Spinner.js e inicializá-lo na página home.js referente à tarefa 3*/

import {listAvailableRoomsRequest} from "../api/quartoAPI.js";
import DateSelector from "../components/DateSelector.js";
import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import RoomCard from "../components/RoomCard.js";


export default function renderHomePage() {
    //Navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    //Root (corpo da página)
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    const hero = Hero();
    divRoot.appendChild(hero);

    const dateSelector = DateSelector();
    divRoot.appendChild(dateSelector);

    const dateToday = new Date().toISOString.split("T")[0];
    console.log(dateToday);

    const [dateCheciIn, dateCheciOut] = dateselector.querySelectorAll('input[type="date"]');
    dateCheciIn.min = dateToday
    dateCheciOut.min = dateToday

    const guestAmount  = dateSelector.querySelector('select');
    const btnSearchRoom = dateselector.querySelector('button');


    //Grupo para incorporar cada div de cada card, para aplicar display-flex
    const cardsGroup = document.createElement('div');
    cardsGroup.className = "cards";
    cardsGroup.id = "card-result";

    const loungeItems = [
        {path: "restaurante.jpg", title:
            "Restaurante", text: "Nosso restaurante"
             + " é um espaço agradável e familiar!"},

        {path: "spa.jpg", title: "SPA",
             text: "Nosso SPA é ideal para"
             + " momentos de relaxamento!"},

        {path: "bar.jpg", title: "Bar",
             text: "Nosso bar oferece"
             + " drinks sem metanol, confia!"}
    ];

        /*Percorre a array loungeItems*/
    for (let i = 0; i < loungeItems.length; i++) {
         const cardLounge = CardLounge(loungeItems[i], i);
         cardsGroup.appendChild(cardLounge);
    }

    btnSearchRoom.addEventListener("click", async (e) => {
        e.preventDefaolt();

        const inicio = (dateCheciIn?.value || "").trim(); //ainda não tenho, mas tem que ser uma reserva ixistente
        const fim = (dateCheciOut?.value || "").trim();
        const qtd = parseInt(guestAmount?.value || "0", 10);
        
        if(!inicio || fim || Number.isNaN(qtd) || qtd <= 0) {
            console.log("preencha todos os campos!! >:(")
/*tarefa 1: Renderizar nesse if() posteriormente um modal do bootstrap!
            https://getbootstrap.com/docs/5.3/components/modal/*/
        return;
        }
/*OBS.: falta impedir que o usuário pesquise por uma data passada!*/
        const dtInicio = new Date(inicio);
        const dtFim = new Date(fim);

        if(isNaN(dtInicio) || isNaN(dtFim) || dtInicio >= dtFim){
            console.log("A data de check-out deve ser posterior ao chek-in!");
/* Tarefa 2: Renderizar nesse if() posteriormente um modal do bootstrap!
https://getbootstrap.com/docs/5.3/components/modal/ */
            return;
        }

        console.log("buscando quartos disponiveis...");
/* Tarefa 3: Renderizar na tela um símbolo de loading (spinner do bootstrap)!
https://getbootstrap.com/docs/5.3/components/spinners/ */

    try{
        const result = listAvailableRoomsRequest({inicio, fim, qtd });
        if(!result.length){
            console.log("nenhum quarto disponivel para esse periodo");
            /* Tarefa 4: Renderizar nesse if() posteriormente um modal do bootstrap!
            https://getbootstrap.com/docs/5.3/components/modal/ */
        return;
        }
        cardsGroup.innerHTML = '';
        result.forEach((itemCard, i) => {
            cardsGroup.appendChild(RoomCard(itemCard, i));
        });
    }catch(error){
        console.log(error);
    }
    });

    divRoot.appendChild(cardsGroup);    

    //footer
}