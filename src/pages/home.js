import Navbar from "../components/Navbar.js";
import Hero from "../components/Hero.js";


export default function renderHomePage() { 
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    
    const navbar = Navbar();
    nav.appendChild(navbar);

    const divRoot = document.getElementById("root");
    divRoot.innerHTML = '';

    const hero = Hero();
    divRoot.appendChild =(hero);

    
}