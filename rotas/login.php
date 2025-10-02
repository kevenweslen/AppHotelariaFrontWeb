<?php
require_once __DIR__ . "/../controllers/autenticador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opcao = $segments[2] ?? null;
    $data = json_decode(file_get_content('php://input'),true);

    if ($opcao == "client"){//login cliente
        Controlador::loginCliente($conn, $data);
    }
    else if ($opcao == "user"){//login funcionario
       Controlador::login($conn, $data);
    }
    else{
        jsonResponse(['status'=>'erro', 'message'=>'Rota não existente'], 405);
    }
}
elseif($_SERVER['REQUEST_METHOD'] === 'PUT'){
    validateTokenAPI();
    jsonResponse(["message"=>$headers], 200);
}
else{
    jsonResponse(['status'=>'erro', 'message'=>'Método não existente'], 405);
}
?>