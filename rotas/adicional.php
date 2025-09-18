<?php
require_once __DIR__ . "/../Controllers/AdicionalController.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segment[2] ?? null;

    if ( isset($id) ){
        AdicionalController::getById($conn, $id);

    }else{
        AdicionalController::getAll($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode( file_get_contents('php://input'), true);
    AdicionalController::create($conn, $data);
}

elseif($_SERVER['REQUEST_METHOD'] == "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    AdicionalController::update($conn, $id, $data);
      }

/*elseif($_SERVER['REQUEST_METHOD'] === ){

}*/

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE" ){
    $id = $segment[2] ?? null;

    if (isset($id)){
        AdicionalController::delete($conn, $id);
    }else{
        jsonResponse(['message'=>"ID do adicional é obrigatório"], 400);
    }
}


else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>