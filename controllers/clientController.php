<?php
require_once __DIR__ . "/../model/clientModel.php"

class clientController {
    public static function create($conn, $data) {
        $result = ClientModel::create($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Cliente cadasrado Com sucesso"]);    
        }else{
            return jsonResponse(['message'=>"Não foi possivel cadastrar o cliente"],400);
        }
    }
    
}
?>