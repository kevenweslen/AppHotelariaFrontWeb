<?php
require_once __DIR__ . "/../controllers/autenticador.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opcao = $segments[2] ?? null;
    $data = json_decode(file_get_content('php://input'),true);

    if ($opcao == "client"){//login cliente
        AuthController::loginCliente($conn, $data);
    }else if ($opcao == "user"){//login funcionario
        AuthController::login($conn, $data);
    }alse{
        jsonResponse(['status'=>'erro', 'message'=>'Rota não existente'], 405);
    }

}elseif{
    jsonResponse(['status'=>'erro', 'message'=>'Método não existente'], 405);
}
?>