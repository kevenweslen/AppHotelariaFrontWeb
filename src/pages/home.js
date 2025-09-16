import Navbar from "../components/Navbar.js";
import Hero from "../components/Hero.js";


export default function renderHomePage() { 
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById("root");
    divRoot.innerHTML = '';

    const containerHero = Hero();
    divRoot.appendChild(containerHero);

    const cards = RoomCard();
    divRoot.appendChild(cards); 

    for (var i=0; i < 3; i++) {
        const cards = RoomCard();
        cardsGroup.appendChild(cards);
    }

    divRoot.appendChild(cardsGroup);    

}