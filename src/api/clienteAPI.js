export async function createRequeste(nome, email, telefone,cpf, senha){
    const dados = {nome, email, telefone,cpf, senha};
    const response = await fetch("api/client", {
        method: "POST",
        headers:{
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dados),
        credentials: "same-origin"
    });
//Interpreta a resposta do json
    let data =null;
        try {
            data = await response.json();
        }catch{
            //se não for json válido, data permanece null
            data = null;
        } 
        return {
            ok: true, 
            raw: data
        };
}