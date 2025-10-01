<?php

require_once "senha.php";
require_once __DIR__ . "/../model/userModel.php";
require_once __DIR__ . "/../model/clienteModel.php";
require_once __DIR__ . "/../helpers/token_jwt.php";

class Controlador{
    public static function login($conn, $data){
        $data['email'] = trim($data['email']);
        $data['senha'] = trim($data['senha']);

        //confirma se tem algum campo vazio
        if(empty($data['email']) || empty($data['senha'])){
            return jsonResponse([
                "status"=>"ERRO",
                "mensagem"=>"Preencha todos os campos"
            ],401);
        }
    
        $user = userModel::validador($conn, $data['email'], $data['senha']);
        if ($user){
            $token = criarToken($user);


            return jsonResponse (["token" => $token]);

        }else{
             return jsonResponse([
                    "status"=>"ERRO",
                    "mensagem"=>"Credenciais invalidas"
                ],401);
        }

    }

    public static function loginCliente($conn, $data){
        $data['email'] = trim($data['email']);
        $data['senha'] = trim($data['senha']);

        //confirma se tem algum campo vazio
        if(empty($data['email']) || empty($data['senha'])){
            return jsonResponse([
                "status"=>"ERRO",
                "mensagem"=>"Preencha todos os campos"
            ],401);
        }
    
        $user = clienteModel::validadorCliente($conn, $data['email'], $data['senha']);
        if ($user){
            $token = criarToken($user);


            return jsonResponse (["token" => $token]);

        }else{
             return jsonResponse([
                    "status"=>"ERRO",
                    "mensagem"=>"Credenciais invalidas"
                ],401);
        }

    }
}
?>