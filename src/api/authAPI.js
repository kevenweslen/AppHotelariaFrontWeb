export async function loginRequest(email,senha) {
    const dados = await fetch("/api/login", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },

        body: JSON.stringify(dados),
        /* body: new URLSearchParams({ "email":email, "password":senha }).toString(), */ 

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
    if(!data || !data.token){
        const message = "Resposta invalida do servidor. Token inválido";
        return {ok: false, token: null, raw: data, message};
    }

    return {
        ok: true,
        user: data.user ?? null,
        raw: data
    }
}

/*Função para salvar a chave token após autenticação confirmada,
    ao salvar no local storage, o usuário poderá mudar de página, fechar o
    site e ainda assim permanecer logado, DESDE QUE TEMPO NÃO TENHA EXPIRADO (1h)*/
    export function saveToken(token) {
        localStorage.setItem("auth_token", token);
    }

    /*Recuperar a chave a cada página que o usuário navegar*/
    export function getToken() {
        return localStorage.getItem("auth_token");
    }

    /*Função para remover a chave token quando o usuário deslogar*/
    export function clearToken() {
        localStorage.removeItem("auth_token");
    }