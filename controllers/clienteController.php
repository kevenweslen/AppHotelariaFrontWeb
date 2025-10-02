<?php

require_once __DIR__ . "/../model/clienteModel.php";
require_once __DIR__ . "/../controllers/validadorController.php";
require_once __DIR__ . "/../controllers/senha.php";
require_once __DIR__ . "/../controllers/autenticador.php";

//no lugar deste require_once validateController eu deveria chamr o validador?

class clienteController{
    public static function create($conn, $data) {

        $login = [
            "email"=> $data["email"],
            "password"=> $data["senha"]
        ];
        $data['senha'] = senhaControler::geradorHash($data['senha']);
        $result = clienteModel::create($conn, $data);
        if ($result) {
           Controlador::loginCliente($conn, $login);
           
            $token = criarToken($result);
            return jsonResponse(['token'=> $token]);

        } else {
            return jsonResponse(['message'=>"erro ao criar o cliente"], 400);
        }
    }
    

    public static function getAll($conn) {
        $result = clienteModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function getById($conn, $id) {
        $result = clienteModel::getById($conn, $id);
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