// function calculoDiarias(checkin, checkout){
    // const checkin = "2026-01-01";
    // const checkout = "2026-01-08";
// 
    // const [yin, min, din] = String(checkin).split("-").map(Number);
    // const [yout, mout, dout] = String(checkout).split("-").map(Number);
    // console.log("check-in formatado: " + yin + min + din +
    // "\n check-out formatado: " + yout + mout +dout);
// 
    // const tzin = Date.UTC(yin, min -1, din);
    // const tzout = Date.UTC(yout, mout -1, dout);
// 
    // return Math.floor((tzin - tzout) / (1000 * 60 * 60 * 24));
// }

import {addItemToHotel_Cart} from "../store/cartStore.js";

function calculoDiaria(checkIn, checkOut) {

    /* Feito para teste:

        const checkIn = "2026-01-01";

        const checkOut = "2026-01-08"; */

    const [yin, min, din] = String(checkIn).split("-").map(Number);

    const [yout, mout, dout] = String(checkOut).split("-").map(Number);
 
    const tzin = Date.UTC(yin, min -1, din);

    const tzout = Date.UTC(yout, mout -1, dout);
 
    console.log("Milissegundos desde 1970-01-01 00:00:00 " +

        tzin);
 
    return Math.floor((tzout - tzin) / (1000 * 60 * 60 * 24));

}

 

export default function RoomCard(itemCard, index = 0) {
    const {
        nome ,
        numero ,
        qnt_cama_casal,
        qnt_cama_solteiro,
        preco,
    } = itemCard || {};

    const title = nome;

    const camas = [
        (qnt_cama_casal != null ? `${qnt_cama_casal} cama(s) de casal` : null),
        (qnt_cama_solteiro != null ? `${qnt_cama_solteiro} cama(s) de solteiro` : null),
    ].filter(Boolean).join(' - ');


    const card = document.createElement('div');
    card.className = "cardContainer";
    card.innerHTML =
    //Bootstrap
    `
    <div class="card" style="width: 18rem;">
        <div id="carouselExampleIndicators-${index}" class="carousel slide">
            <div class="carousel-indicators">
                <button visually-hiddentype="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
  
            <div class="carousel-inner shadow">
                <div class="carousel-item active">
                    <img src="public/assets/images/carousel1.jpg" class="d-block w-100" alt="...">
                </div>

                <div class="carousel-item">
                    <img src="public/assets/images/carousel2.jpg" class="d-block w-100" alt="...">
                </div>

                <div class="carousel-item">
                    <img src="public/assets/images/carousel1.jpg" class="d-block w-100" alt="...">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
 
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators-${index}" data-bs-slide="next">
                <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        
        <div class="card-body">
            <h5 class="card-title">${title}</h5>
            <p class="card-text">Descrição do quarto: Lorem ipsum dolor sit amet consectetur
             adipisicing elit. Officia, harum libero, ratione, nostrum iusto dicta.</p>
             ${camas? `<li>${camas}` : ""}
             ${preco != null ? `<li>preco diaria: R$ ${numero(preco).toFixed(2)}</li>` : ""}
            <a href="#" class="btn btn-primary btn-reservar">Reservar</a>
        </div>
    </div>

    `;

    card.querySelector(".btn-reservar").addEventListener('click', (e) => {
        e.preventDefault();
    // dateCheciIn.ID = 'id-dateCheckIn';
    // dateCheciOut.ID = 'id-dateCheckOut';
    // guestAmount.ID = 'id-guestAmount';
    const iddateCheckIn = document.getElementById("id-dateCheckIn");
    const iddateCheckOut = document.getElementById("id-dateCheckOut");
    const idguestAmount = document.getElementById("id-guestAmount");

    const inicio = (iddateCheckIn?.value || "");
    const fim = (iddateCheckOut?.value || "");
    const qtd = parseInt(idguestAmount?.value || "0", 10);

    if(!inicio || !fim || Number.isNaN(qtd) || qtd <= 0){
        console.log("preencha todos os campos!");
        return;
    }
    const daily = calculoDiaria(inicio, fim);

    const subTotal = parseFloat(preco) * daily;

    const novoItemReserva = {
        id, 
        checkIn: inicio,
        checkOut: fim,
        guests: qtd,
        daily,
        subTotal,
    }
    addItemToHotel_Cart(novoItemReserva);
    alert(`Reserva adicionada: ${nome} - numero de diarias: ${daily} - preco: ${preco} - subtotal: R$ ${subtotal}`);
    return card;
});



}