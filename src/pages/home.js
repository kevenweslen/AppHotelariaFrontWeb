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

    const btnSearchRoom = dateselector.querySelector('button');
    btnSearchRoom.addEventListener("click", async (e) => {
        e.preventDefaolt();
        const inicio = "???????"; //ainda não tenho, mas tem que ser uma reserva ixistente
        const fim = "??????";
        const disponivel = 2
        
    try{
        const quarto = listAvaliableRoomsRequest({inicio, fim, disponivel})
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