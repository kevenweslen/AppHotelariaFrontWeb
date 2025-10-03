<?php
require_once __DIR__ . "/../controllers/usercontroller.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segments[2] ?? null;

    if ($id){
        userController::getById($conn, $id);
    }else{
        userController::getAll($conn);
    }
}
elseif ( $_SERVER['REQUEST_METHOD'] === "POST" ){
    $data = json_decode( file_get_contents('php://input'), true );
    userController::create($conn, $data);
}


elseif ( $_SERVER['REQUEST_METHOD'] === "PUT" ){
    $data = json_decode( file_get_contents('php://input'), true );
    $id = $data['id'];
    userController::update($conn, $id, $data);
}


elseif ( $_SERVER['REQUEST_METHOD'] === "DELETE" ){
    $data = json_decode( file_get_contents('php://input'), true );
    $id = $data['id'];
    if (isset($id)){
        userController::delete($conn, $id);
    }else{
        jsonResponse(['message'=>"ID do usuario é obrigatório"], 405);
    }
}
else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>