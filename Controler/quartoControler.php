<?php
require_once __DIR__ . "/../Model/roomModel.php";

class quartoControler{
    public static function create($conn, $data){
        $result = roomModel::create($conn,$data);
        if($result){
            //deu certo
            return jsonResponse(['mensage'=>"Quarto cadastrado com sucesso!"]);

        }else{
            return jsonResponse(['mensage'=>"Erro ao cadastrar quarto! :("],400);
            //não deu certo
        }
    }
}
?>