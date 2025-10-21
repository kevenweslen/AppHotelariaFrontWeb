export async function finishOrder( items ){
    const url = "api/orders/reservation";
    const body = {
/*Por enquanto , o cliente_id será setado no código, amanhã Jeff tretará o token que valida
o clienre no back-end, de modo de que o envio do token já será o suficiente para definir a quem o pedido é referente*/

        cliente_id: 32,

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
    let data = null;
    try {
        data = await resp.json();
    } catch {
        data = null;
    }

    if(!data){
        const message = `"Erro ao enviar pedido: ${resp.status}`;
        return {ok: false, waw, data, message};
    }
    return { ok: true,
        raw: data
    };
}