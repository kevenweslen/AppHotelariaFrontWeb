import renderCadQuarto from "./pages/cadQuarto.js";
import renderCarPage from "./pages/car.js";
import renderHomePage from "./pages/home.js";
import renderLoginPage from "./pages/login.js";
import renderRegisterPage from "./pages/register.js";


//Configuraçao de rotas mapeadas
const routes = {
   "/cadQuarto": renderCadQuarto,
   "/car": renderCarPage,
   "/home": renderHomePage,
   "/login": renderLoginPage,
   "/cadastro": renderRegisterPage,
   //Novas páginas serão adicionadas aqui conforme desenvolvidas
};

//Obtém o caminho atual a partir do nome
function getPath() {
   //obtém o hash (ex. "#/login"), remove o # e tira espaços
   const url = (location.pathname || "").replace("/meu-site/", "/").trim();
   console.log(url);
   //retorna url se começar com "/", se não, retorna "/login" como padrão
   return url && url.startsWith("/") ? url : "/home";         
}
//Decide o que renderizar com base na rota atual
function renderRoutes() {
   const url = getPath();  //Lê a rota atual, ex. "/register"
   const render = routes[url] || routes["/home"]; //Busca esta rota no mapa
   render(); //Executa a função de render na página atual
}
//Renderizacao
document.addEventListener('DOMContentLoaded', renderRoutes);