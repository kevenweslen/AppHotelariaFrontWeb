import renderLoginPage from "./pages/login.js";
import renderRegisterPage from "./pages/register.js";
import renderHomePage from "./pages/home.js";

//Configuraçao de rotas mapeadas
const routes = {
   "/login": renderLoginPage,
   "/cadastro": renderRegisterPage,
   "/home": renderHomePage
   //Novas páginas serão adicionadas aqui conforme desenvolvidas
};

//Obtém o caminho atual a partir do hash da URL
function getPath() {
   //obtém o hash (ex. "#/login"), remove o # e tira espaços
   const url = (location.hash || "").replace(/^#/, "").trim();
   //retorna url se começar com "/", se não, retorna "/login" como padrão
   return url && url.startsWith("/") ? url : "/home";         
}

//Decide o que renderizar com base na rota atual
function renderRoutes() {
   const url = getPath();  //Lê a rota atual, ex. "/register"
   const render = routes[url] || routes["/home"]; //Busca esta rota no mapa
   render(); //Executa a função de render na página atual
}

window.addEventListener("hashchange", renderRoutes);
//Renderizacao
document.addEventListener('DOMContentLoaded', renderRoutes);
