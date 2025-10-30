import Form from "../components/Form.js";
import Navbar from "../components/Navbar.js";
import {addRoom} from "../api/quartoAPI.js";


export default function renderCadQuarto() {
    const nav = document.getElementById('navbar');
        nav.innerHTML = '';
    const navbar = Navbar();
        nav.appendChild(navbar);

    const formulario = Form();

    const titulo = formulario.querySelector('h1');
        titulo.textContent = "cadastrar quarto";

    const contentForm = formulario.querySelector('form');
    contentForm.enctype = "multipart/form-data";


    const imputNome = contentForm.querySelector('input[type=email]');
        imputNome.type = 'text';
        imputNome.placeholder = "digite o nome do quarto";
        imputNome.name = 'nome';
        imputNome.className = 'imputNomeQuarto';

        

    const imputNumero = contentForm.querySelector('input[type=password]');
        imputNumero.type = 'text';
        imputNumero.placeholder = "digite o numero do quarto";
        imputNumero.name = 'preco';
        

    const qntCamaCasal = document.createElement('select');
        qntCamaCasal.className = 'select-qtd';
        qntCamaCasal.innerHTML = 
            `
            <option value="">Quantidade camas casal</option>
            <option value="1">1 cama</option>
            <option value="2">2 camas</option>
            <option value="3">3 camas</option>
            <option value="4">4 camas</option>
            `
        qntCamaCasal.name = 'qnt_cama_casal';

    const qntCamaSolteiro = document.createElement('select');
        qntCamaSolteiro.className = 'select-qtd';
        qntCamaSolteiro.innerHTML = 
            `
            <option value="">Quantidade camas solteiro</option>
            <option value="1">1 cama</option>
            <option value="2">2 camas</option>
            <option value="3">3 camas</option>
            <option value="4">4 camas</option>
            `
        qntCamaSolteiro.name = 'qnt_cama_solteiro';


    const imputPreco = document.createElement('input');
        imputPreco.type = 'number';
        imputPreco.placeholder = "Preço diária";
        imputPreco.name = 'preco';


    const dispDiv = document.createElement('div');
        dispDiv.className = 'd-flex flex-row gap-2';

    const subtitulo = document.createElement('p');
        subtitulo.textContent = "Quarto disponível?:";

    const labelTrue = document.createElement('label');
        labelTrue.textContent = 'Sim';

    const imputDisptrue = document.createElement('input');
        imputDisptrue.type = 'radio';
        imputDisptrue.name= "disponivel";
        imputDisptrue.value = true;

    const labelFalse = document.createElement('label');
        labelFalse.textContent = 'Não';

    const imputDispfalse = document.createElement('input');
        imputDispfalse.type = 'radio';
        imputDispfalse.name= "disponivel";
        imputDispfalse.value = false;

    dispDiv.appendChild(subtitulo);
    dispDiv.appendChild(labelTrue);
    dispDiv.appendChild(imputDisptrue);
    dispDiv.appendChild(labelFalse);
    dispDiv.appendChild(imputDispfalse);

    const inputFotos = document.createElement('input');
    inputFotos.className = 'form-control';
    inputFotos.type = 'file';
    inputFotos.id = 'formFileMultple';
    inputFotos.multiple = true;
    inputFotos.accept = "image/*";
    inputFotos.name = 'Fotos[]'

    contentForm.insertBefore(imputPreco, contentForm.children[2]);
    contentForm.insertBefore(qntCamaCasal, contentForm.children[3]);
    contentForm.insertBefore(qntCamaSolteiro, contentForm.children[4]);
    contentForm.insertBefore(dispDiv, contentForm.children[5]);
    contentForm.insertBefore(inputFotos, contentForm.children[6]);

    const btnRegister = btnRegister.textContent = 'Criar quarto';
    contentForm.addEventListener('Cadastrar qaurto');

    contentForm.querySelector('button', async (e) => {
        e.preventDefault();
        try{
            const response = await addRoom(this);
            console.log("if(resposta){ console.log(boa cara)} " + response);
        }catch{
            console.log("erro." + response);

        }
    });


    // divRoot.appendChild();


    
        //RODAPE
}