<?php
require_once __DIR__ . "/../controllers/quartoControler.php";

if ( $_SERVER['REQUEST_METHOD'] === "GET" ){
    $id = $segment[2] ?? null;

    if ( isset($id) ){
        QuartoControler::getById($conn, $id);

    }else{
        QuartoControler::getAll($conn);
    }
}

elseif ($_SERVER['REQUEST_METHOD'] === "POST"){
    $data=json_decode( file_get_contents('php://input'), true);
    QuartoControler::create($conn, $data);
}

elseif($_SERVER['REQUEST_METHOD'] === "PUT"){
    $data=json_decode(file_get_contents('php://input'), true);
    $id=$data['id'];
    QuartoControler::update($conn, $id, $data);
    
}

elseif ($_SERVER['REQUEST_METHOD'] === "DELETE" ){
    $id = $segment[2] ?? null;

    if (isset($id)){
        QuartoControler::delete($conn, $id);
    }else{
        jsonResponse(['message'=>"ID do adicional é obrigatório"], 400);
    }
}
?>