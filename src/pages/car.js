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

    const reservations = getCar();

    const container = document.createElement('div');
    container.className = "container my-4";
    const header = document.createElement('div');
    header.className = "d-flex align-items-center justify-content-between mb3";
    header.innerHTML = 
    `
        <h3 class="mb-0">Reservas</h3>
        <div>
            <button id="btnClear" class="btn btn-outline-danger btn-sm"> Limpar carrinho</button>
        </div>
    `

    container.appendChild(header);
    divRoot.appendChild(container);


    const table = document.documentElement('div');
    if(reservations.length == 0){
        table.innerHTML=`<div class="alert-info"> Nenhuma reserva no carrinho. :(</div>`
    }else{
        table.innerHTML=
        `
        <div calss="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-danger">
                    <tr>
                        <th>nome do quarto</th>
                        <th>data de checkIn</th>
                        <th>data de checkOut</th>
                    </tr>
                </thead>
                <tbody>
                    ${reservations.map(item => 
                        `
                        <tr>
                            <td>${item.nome}</td>
                            <td>${item.checkIn}</td>
                            <td>${item.checkOut}</td>
                            <td>R$ ${item.subTotal}</td>
                        </tr>
                        `
                    ).join("")}
                </tbody>
                <tfoot>
                    <tr>
                        <th><th>
                        <th>
                            <h4 style="font-size: 19px;">Total: R$ ${total}</h4>
                        </th>
                        <th>
                            <button id="btnFinalizar" class="btn btn-outline-danger btn-sm"> Finalizar compra. :(</button>
                        </th>
                    </tr>
                </tfoot>
            </table>    
        </div>
        `
        const btnClear = document.getElementById("btnClear");
        if(btnClear){
            btnClear,addEventListener("click", () =>{
                clearHotel_Car();
                renderHotel_Car();
            });
        }
    }


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