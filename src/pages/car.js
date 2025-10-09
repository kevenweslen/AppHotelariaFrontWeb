import Navbar from "../components/Navbar.js";
//Importar componente Footer

export default function renderCartPage() {
    //Navbar
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    const navbar = Navbar();
    nav.appendChild(navbar);

    //Root (corpo da página)
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';


    //Footer


}


// export default function renderCarPage(){
//         //navBar
//         const nav = document.getElementById('navbar');
//         nav.innerHTML = '';
//         const navbar = Navbar();
//         nav.appendChild(navbar);

//         //Root (corpo da página)
//         const divRoot = document.getElementById("root");
//         divRoot.innerHTML = '';
//         divRoot.style.alignItems = "center";
//         divRoot.style.height = "100vh";

//         const container = document.createElement('div');
//         container.className = 'card p-4 shadow-lg';
//         container.style.width = '100%';
//         container.style.maxWidth = '400px';
//         divRoot.appendChild(container);

//         const titulo = document.createElement('h1');
//         titulo.textContent = 'Seu carrinho de reservas.';
//         titulo.className = 'titulo';
// }