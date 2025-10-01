<?php

require_once __DIR__ . "/../model/quartoModel.php";

class quartoController{
    public static function create($conn, $data) {
        $result = quartoModel::create($conn, $data);
        
        if ($result) {
            return jsonResponse(['message'=>'Quarto registrado com sucesso"']);
        }
        else {
            return jsonResponse(['message'=>'Erro ao registrar o quarto!']);
        }
    }

    public static function getAll($conn) {
        $result = quartoModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function getById($conn, $id) {
        $result = quartoModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function delete($conn, $id) {
        $result = quartoModel::delete($conn, $id);
         if($result){
            return jsonResponse(['message'=> 'Quarto deletado']);
        } else{
            return jsonResponse(['message'=> ''], 400);
        }
    }

    public static function update($conn, $id, $data){
        $result = quartoModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'quarto atualizado']);
        } else{
            return jsonResponse(['message'=> 'Deu merda'], 400);
        }
    }
}

?>