/* getToken() é uma função que retorna o valor do token armazenado no localStorage(),
para que o usuário permaneça logado mesmo que mude de página e não tenha que "re-logar"*/
import { getToken } from "./authAPI";

/*Listar todos os quartos independente de filtro*/
export async function listAllRoomsRequest(inicio, fim, disponivel) {
    //const token = getToken();
    const params = new URLSearchParams();

    if(inicio) params.set("inicio", inicio);
    if(fim) params.set("fim", fim);
    if(disponivel !== null && disponivel !== "") params.set("disponivel", String(disponivel));

    const url = `api/quarto/disponivel?${params.toString}`;

const response = await fetch("api/rooms", {
        method: "GET",
        headers: {
            "Accept": "application/json",
        },

        credentials: "same-origin",
    });

    let data = null;
    try {
        data = await response.json();
    }
    catch {
        data = null;
    }
    if(!response.ok) {
        const message = data?.message || "Falha ou buscar quartos diponiveis";
        throw new Error(msg);
    }

    const quarto = Array.isArray(data?.quartos) ? data.quartos : [];  
    console.log(quarto);
    return quarto;

}