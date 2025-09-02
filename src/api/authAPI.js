export async function loginRequest(email,senha) {
    const response = await fetch("/api/login.php", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/x-www-from-urlencoded;charset=UTF-8"
        },
        body: new URLSearchParams({email, senha}).toString(),

        /*URL da requisisão é a mesma da prigem do front (mesmo protocolo fttp/
        mesmo domínio - local/mesma porta 80 do servidor wec Apache).
        front: http://localhost/meu-site/public/index.html
        back: http://localhost/meu-site/api/login.php*/

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
        user: data.user ?? null,
        raw: data
    }
}