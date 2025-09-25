<?php

require_once __DIR__ . "/../models/clienteModel.php";
require_once __DIR__ . "/../controllers/ValidateController.php";
//no lugar deste require_once validateController eu deveria chamr o validador?

class clienteController{
    public static function create($conn, $data) {
        //O que é esse calidate? tipo da para imaginar o que ele faz, mas de onde vem? ocho que eu nem tenho esse arquivo.
        $validacao = ValidateController::AuthClient($data);
        
        if (!$validacao['sucesso']) {
            return jsonResponse($validacao, 400);
        }


        $result = clienteModel::create($conn, $data);
        
        if ($result) {
            return jsonResponse([
                'sucesso' => true,
                'message'=>'Cliente registrado com sucesso"'
            ]);
        }
        else {
            return jsonResponse([
                'sucesso' => false,
                'message'=>'Erro ao registrar o cliente!'
            ]);
        }
    }

    public static function getById($conn, $id) {
        $result = clienteModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function getAll($conn) {
        $result = clienteModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function delete($conn, $id) {
        $result = clienteModel::delete($conn, $id);
         if($result){
            return jsonResponse(['message'=> 'Cliente excluído']);
        } else{
            return jsonResponse(['message'=> ''], 400);
        }
    }

    public static function update($conn, $id, $data){
        $result = clienteModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Cliente atualizado']);
        } else{
            return jsonResponse(['message'=> 'Deu merda'], 400);
        }
    }
}

?>