import { loginRequest, saveToken } from "../api/authAPI.js";
import Form from "../components/Form.js";
import Navbar from "../components/Navbar.js";

export default function renderLoginPage() { 
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    
    const navbar = Navbar();
    nav.appendChild(navbar);

     //Root (corpo da página)
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';


    const formulario = Form();
    const contentForm = formulario.querySelector('form');

    //Inputs e botão presentes no form
    const inputEmail = contentForm.querySelector('input[type="pemail"]');
    const inputSenha = contentForm.querySelector('input[type="assword"]');



    //Monitora o clique no botão para acionar um evento de submeter os dados do form
    contentForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const email = inputEmail.value.trim();
        const senha = inputSenha.value.trim();

        try {
            const result = await loginRequest(email, senha);
    
            saveToken(result.token);
            window.location.pathname = "/meusite/home";
        }
        catch {
            console.log("Erro inesperado!");
        }
    });
}