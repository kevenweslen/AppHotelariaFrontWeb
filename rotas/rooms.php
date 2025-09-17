<?php
require_once __DIR__ . "/../controllers/quartoControler.php";


if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segments[2] ?? null;

    if (isset($id)){
        quartoControler::getById($conn, $id);
    }else{
        quartoControler::listAll($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data = json_decode( file_get_contents('php://input'), true);
    quartoControler::create($conn, $data);
}

elseif($_SERVER['REQUEST_METHOD'] == "PUT"){
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    quartoControler::update($conn, $id, $data);
      }

/*elseif($_SERVER['REQUEST_METHOD'] === ){

}*/

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE" ){
    $id = $segments[2] ?? null;

    if (isset($id)){
        quartoControler::delete($conn, $id);
    }else{
        jsonResponse(['message'=>"ID do quarto é obrigatório"], 400);
    }
}


else{
    jsonResponse([
        'status'=>'erro',
        'message'=>'Método não permitido'
    ], 405);
}

?>