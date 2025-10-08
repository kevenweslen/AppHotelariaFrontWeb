export async function listAllRoomsRequest(inicio, fim, disponivel) {
    //const token = getToken();
    const params = new URLSearchParams();

    if(inicio) params.set("inicio", inicio);
    if(fim) params.set("fim", fim);
    if(disponivel !== null && disponivel !== "") params.set("disponivel", String(disponivel));

    const url = `api/quarto/disponivel?${params.toString}`;
    const response = await fetch("url", {
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
        const msg = data?.message || "Falha ou buscar quartos diponiveis";
        throw new Error(msg);
    }

    const quartos = Array.isArray(data?.quartos) ? data.quartos : [];  
    console.log(quartos);
    return quartos;

}