<?php

require_once __DIR__ . "/../model/pedidoModel.php";

class pedidoController{
    public static function create($conn, $data) {
        $result = pedidoModel::create($conn, $data);
        
        if ($result) {
            return jsonResponse(['message'=>'Pedido adicionado com sucesso"']);
        }
        else {
            return jsonResponse(['message'=>'Erro ao registrar o quarto!']);
        }
    }

    public static function getById($conn, $id) {
        $result = pedidoModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function getAll($conn) {
        $result = pedidoModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function delete($conn, $id) {
        $result = pedidoModel::delete($conn, $id);
        return jsonResponse($result);
    }

    public static function update($conn, $id, $data){
        $result = pedidoModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'quarto atualizado']);
        } else{
            return jsonResponse(['message'=> 'Deu merda'], 400);
        }
    }

    //segundo a imagem que eu tenho no celular da tabela de coisas que tem que fazer, parece que esta faltando a update e a delete aqui 

}

?>