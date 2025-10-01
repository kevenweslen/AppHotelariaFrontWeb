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

    //segundo a imagem que eu tenho no celular da tabela de coisas que tem que fazer, parece que esta faltando a update e a delete aqui 

}

?>