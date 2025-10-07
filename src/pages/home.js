import DateSelector from "../components/DateSelector.js";
import Hero from "../components/Hero.js";
import Navbar from "../components/Navbar.js";
import RoomCard from "../components/RoomCard.js";


export default function renderHomePage() { 
    //navBar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    //Root (corpo da página)
    const divRoot = document.getElementById("root");
    divRoot.innerHTML = '';

    const containerHero = Hero();
    divRoot.appendChild(containerHero);

    const dataSelector = DateSelector();
    divRoot.appendChild(dataSelector);

    const [dateCheciIn, dateCheciOut] = dateselector.querySelectorAll('input[type="date"]');

    const btnSearchRoom = dateselector.querySelector('button');
    btnSearchRoom.addEventListener("click", async (e) => {
        e.preventDefaolt();
        const inicio = (dateCheciIn?.value || "").trim(); //ainda não tenho, mas tem que ser uma reserva ixistente
        const fim = (dateCheciOut?.value || "").trim();
        const disponivel = parseInt(dateAmount?.value || "0", 10);
        
        if(!inicio || fim || Number.isNaN(disponivel) || disponivel <= 0) {
            console.log("preencha todos os campos!! >:)")
        return;
        }

        const dtInicio = new Date(inicio);
        const dtFim = new Date(fim);

        if(isNaN(dtInicio) || isNaN(dtFim) || dtInicio >= dtFim){
            console.log("A data de check-out deve ser posterior ao chek-in!");
            //renderizar posteriormente um model bootstrap
            return;
        }

        console.log("buscando quartos disponiveis");
        //renderizar simbulo de loading

    try{
        const quarto = listAvaliableRoomsRequest({inicio, fim, disponivel})
        if(!quarto.length){
            console.log("nenhum quarto disponivel para esse periodo");
            //renderizar na tela um modal do bootstrap
        return;
        }
    }catch(error){
        console.log(error);
    }
    });

    //Grupo para incorporar cada div de cada card, para aplicar display-flex
    const cardsGroup = document.createElement('div');
    cardsGroup.className = "cards";
    
    for (var i=0; i < 3; i++) {
    const cards = RoomCard(i);
    cardsGroup.appendChild(cards); 
    }

    divRoot.appendChild(cardsGroup);    

    //footer
}