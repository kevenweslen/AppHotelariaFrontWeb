import Form from "../components/Form.js";
import Navbar from "../components/Navbar.js";
// import InfoQuarto from "../components/FormQuarto.js";

export default function renderCadQuarto() {
    const nav = document.getElementById('navbar');
    nav.innerHTML = '';
    
    const navbar = Navbar();
    nav.appendChild(navbar);

     //Root (corpo da página)
    const divRoot = document.getElementById('root');
    divRoot.innerHTML = '';

    const formulario = Form();
   
    const titulo = formulario.querySelector('h1');
    titulo.textContent = "Cadastre um novo quarto.";

    //Seleciono o elemento form que está presente em ./components/Form.js
    const contentForm = formulario.querySelector('form');

    
    const email = document.createElement('input');
    email.type = 'email';
    email.placeholder = "Digite seu e-mail";
    
    const password = document.createElement('input');
    password.type = 'password';
    password.placeholder = "Digite sua senha";
    //Criar o input para nome e adicionar em contentForm
       
    const inputnome = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Nome do quarto";

    const inputnumero = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Numero do quarto";

    const inputqntcamacasal = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Numero do quarto";

    const inputqntcamasolteiro = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Numero do quarto";

    const inputpreco = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Numero do quarto";

    const inputdisponevel = document.createElement('input');
    inputnome.type = 'text';
    inputnome.placeholder = "Numero do quarto";

    const InfoQuartos = InfoQuarto();
    InfoQuartos.appendChild(infoQuarto);


    const btnRegister = formulario.querySelector('button');
        btnRegister.textContent = "Criar quarto";


        contentForm.addEventListener("submit",async (e) =>{
            e.preventDefault();
            const nome = inputnome.value.trim();
            const numero = inputnumero.value.trim();
            const qntCamaCasal = inputqntcamacasal.value.trim();
            const qntCamaSolteiro = inputqntcamasolteiro.value.trim();
            const senha = inputpreco.value.trim();
            const disponivel = inputdisponevel.value.trim();
        
            try {
                const result = createRequeste(nome, numero, qntCamaCasal, qntCamaSolteiro, senha, disponivel);
                console.log("informações do quarto cadastrado: \n" + result);
            }catch {
                conlose.log("Erro inesperado!");
            }
        });
        
        divRoot.appendChild(formulario);

}