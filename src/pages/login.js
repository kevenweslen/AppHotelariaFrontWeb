import { loginRequest } from "../api/authAPI.js";
import Form from "../components/Form.js";
import Navbar from "../components/Navbar.js";

export default function renderLoginPage() { 
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    
    const navbar = Navbar();
    nav.appendChild(navbar);

    const formulario = Form();
    const contentForm = formulario.querySelector('form');

    const imputEmail = contentForm.querySelector('imput[type="email"]');
    const imputsenha = contentForm.querySelector('imput[type="senha"]');
    const btn = contentForm.querySelector('button[type="submit]"');

//monmitora o clique no botão para adicionar um evento de submeter os daods do form
    contentForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const email = imputEmail.values.trim();
        const senha = imputEmail.values.trim();

        try{
            const result = await loginRequest(email, senha);
            window.location.pathname = /home;
        }catch{
            console.log("Wrro inesperado!!!     :(");
    };

});

}
