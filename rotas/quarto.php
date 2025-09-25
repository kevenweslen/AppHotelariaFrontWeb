<?php

require_once __DIR__ . "/../controllers/quartoController.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET") {
    $id = $segments[2] ?? null;

    if (isset($id) === null) {
        quartoController::getAll($conn);
    }
    else  {
        quartoController::getById($conn, $id);
    }
    
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
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