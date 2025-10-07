<?php
require_once __DIR__ . "/../model/userModel.php";

class userController{
        public static function create($conn, $data) {
        $result = userModel::create($conn, $data);
        
        if ($result) {
            return jsonResponse(['message'=>'Usuario registrado com sucesso"']);
        }
        else {
            return jsonResponse(['message'=>'Erro ao registrar o usuario']);
        }
    }

    public static function getAll($conn) {
        $result = userModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function getById($conn, $id) {
        $result = userModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function delete($conn, $id) {
        $result = userModel::delete($conn, $id);
         if($result){
            return jsonResponse(['message'=> 'Usuario excluído']);
        } else{
            return jsonResponse(['message'=> ''], 400);
        }
    }

    public static function update($conn, $id, $data){
        $result = userModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Usuario atualizado']);
        } else{
            return jsonResponse(['message'=> 'Deu merda'], 400);
        }
    }
}
?>