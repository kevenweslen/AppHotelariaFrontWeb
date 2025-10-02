<?php

require_once __DIR__ . "/../controllers/adicionalController.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segments[2] ?? null;

    if ($id){
        adicionalController::getById($conn, $id);
    }else{
        adicionalController::getAll($conn);
    }
}
elseif ( $_SERVER['REQUEST_METHOD'] === "POST" ){
    $data = json_decode( file_get_contents('php://input'), true );
    adicionalController::create($conn, $data);
}
elseif ( $_SERVER['REQUEST_METHOD'] === "PUT" ){
    $data = json_decode( file_get_contents('php://input'), true );
    $id = $data['id'];
    adicionalController::update($conn, $id, $data);
}
elseif ( $_SERVER['REQUEST_METHOD'] === "DELETE" ){
    $data = json_decode( file_get_contents('php://input'), true );
    $id = $data['id'];
    if (isset($id)){
        adicionalController::delete($conn, $id);
    }else{
        jsonResponse(['message'=>"ID do item é obrigatório"], 405);
    }
}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>