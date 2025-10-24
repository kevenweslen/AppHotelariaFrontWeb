<?php

require_once __DIR__ . "/../controllers/quartoController.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $segments[2] ?? null;

    if (isset($id)){
        if (is_numeric($id)){ // cliente passou um numero -> (API/ROOMS/1)
            quartoController::getById($conn, $id);

        }elseif($id === "disponiveis"){ // cliente os disponiveis -> (API/ROOMS/DISPONIVEIS?)
            $data = [ "inicio" => isset($_GET['inicio']) ? $_GET['inicio'] : null,
                "fim" => isset($_GET['fim']) ? $_GET['fim'] : null,
                "disponivel" => isset($_GET['disponivel']) ? $_GET['disponivel'] : null];
            quartoController::get_available($conn, $data);

        }else{ // cliente colocou qualquer outra coisa
            jsonResponse(['message'=>"Essa rota não existe"], 400);

        }
        
    }else{ // cliente não passou nada -> (API/ROOMS)
        quartoController::getAll($conn);
    }
    
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = $_POST;
    $data ['fotos'] = $_FILES['fotos'] ?? null;
    quartoController::create($conn, $data);
}

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    $id = $segments[2] ?? null;
    
    if (isset($id)) {
        quartoController::delete($conn, $id);
    }
    else {
        jsonResponse([
        "message" => 'Você não conseguiu excluir'
        ], 400);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "PUT") {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data["id"];

    quartoController::update($conn, $id, $data);
    
}

else {
    jsonResponse([
        "status" => 'erro',
        "message" => 'Método não permitido'
    ], 405);
}

?>