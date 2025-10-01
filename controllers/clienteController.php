<?php

require_once __DIR__ . "/../model/clienteModel.php";
require_once __DIR__ . "/../controllers/validadorController.php";
//no lugar deste require_once validateController eu deveria chamr o validador?

class clienteController{
    public static function create($conn, $data) {

        $login = [
            "email" => $data['email'],
            "senha" => $data['senha']
        ];

        $data['senha'] = validadorController::generateHash($data['senha']);
        $result = clienteModel::create($conn, $data);
        if($result){
            // se o usuario estiver -> efetura o login
            // para retornar o token JWT
            autenticador::loginCliente($conn, $login);
        }else{
            return jsonResponse(['message'=>"erro ao criar o cliente"], 400);
        }

        // $validacao = validadorController::AuthClient($data);
        
        // if (!$validacao['sucesso']) {
        //     return jsonResponse($validacao, 400);
        // }


        // $result = clienteModel::create($conn, $data);
        
        // if ($result) {
        //     return jsonResponse([
        //         'sucesso' => true,
        //         'message'=>'Cliente registrado com sucesso"'
        //     ]);
        // }
        // else {
        //     return jsonResponse([
        //         'sucesso' => false,
        //         'message'=>'Erro ao registrar o cliente!'
        //     ]);
        // }
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