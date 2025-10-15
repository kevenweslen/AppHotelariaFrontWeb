import { createRequeste } from "../api/clienteAPI.js";
import Form from "../components/Form.js";
import Navbar from "../components/Navbar.js";

export default function renderRegisterPage() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    
    const navbar = Navbar();
    nav.appendChild(navbar);

    const formulario = Form();
   
    const titulo = formulario.querySelector('h1');
    titulo.textContent = "Cadastre-se";

    //Seleciono o elemento form que está presente em ./components/Form.js
    const contentForm = formulario.querySelector('form');

    //Criar o input para nome e adicionar em contentForm
       

    const inputnome = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Digite seu nome";

    const inputemail = document.createElement('input');
    inputemail.type = 'text';
    inputemail.placeholder = "Digite seu email";

    const inputtelefone = document.createElement('input');
    inputtelefone.type = 'text';
    inputtelefone.placeholder = "Digite seu telefone";

    const inputcpf = document.createElement('input');
    inputcpf.type = 'text';
    inputcpf.placeholder = "Digite seu cpf";

    const inputsenha = document.createElement('input');
    inputsenha.type = 'text';
    inputsenha.placeholder = "Digite sua senha";

    /*Para adicionar input nome ao contentForm, localizo onde está input email pois
    quero necessariamente adicionar anteriormente a ele */
    const inputEmail = formulario.querySelector('input[type="email"]');
    contentForm.insertBefore(inputnome, inputEmail);
    contentForm.insertBefore(inputcpf, contentForm.children[2]);
    contentForm.insertBefore(inputtelefone, contentForm.children[2]);


    //Criar o input para confirmar senha
    const confSenha = document.createElement('input');
    confSenha.type = 'password';
    confSenha.placeholder = "Confirme sua senha";
    contentForm.insertBefore(confSenha, contentForm.children[5]);

        const btnRegister = formulario.querySelector('button');
        btnRegister.textContent = "Criar conta";


        contentForm.addEventListener("submit",async (e) =>{
            e.preventDefault();
            const nome = inputnome.value.trim();
            const email = inputemail.value.trim();
            const telefone = inputtelefone.value.trim();
            const cpf = inputcpf.value.trim();
            const senha = inputsenha.value.trim();
        
            try {
                const result = createRequeste(nome, email, telefone, cpf, senha);
            
            
            }catch {
                conlose.log("Erro inesperado!");
            }
        });
}
