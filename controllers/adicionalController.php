<?php

require_once __DIR__ . "/../model/adicionalModel.php";

class adiciController{
    public static function create($conn, $data) {
        $result = adicionalModel::create($conn, $data);
        
        if ($result) {
            return jsonResponse(['message'=>'Adicional(is) do pedido registrado com sucesso"']);
        }
        else {
            return jsonResponse(['message'=>'Erro ao registrar o adicional do pedido!']);
        }
    }

    public static function getById($conn, $id) {
        $result = adicionalModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function getAll($conn) {
        $result = adicionalModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function delete($conn, $id) {
        $result = adicionalModel::delete($conn, $id);
         if($result){
            return jsonResponse(['message'=> 'Adicional(is) do pedido excluído']);
        } else{
            return jsonResponse(['message'=> ''], 400);
        }
    }

    public static function update($conn, $id, $data){
        $result = adicionalModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Adicional(is) do pedido atualizado']);
        } else{
            return jsonResponse(['message'=> 'Deu merda'], 400);
        }
    }
}

?>