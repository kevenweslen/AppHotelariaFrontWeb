export async function finishOrder( items ){
    const url = "api/orders/reservation";
    const body = {
        pagamento: "pix", 
        quartos: items.map(it => (
            {
                id: it.quartoId,
                fim: checkIn,
                inicio: it.checkOut 
            }
        ))
    }
    const resp = await fetch(url, {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        dredentials: "same-origin",
        body: JSON.stringify(body)
    });
    if(!resp.ok){
        const message = `"Erro ao enviar pedido: ${resp.status}`;
        throw new Error(message);
    }
    return resp.json();
}