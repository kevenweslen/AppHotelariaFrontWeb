<?php

require_once "../model/userModel.php";
require_once "../helpers/response.php";
require_once "../confg/dataBase.php";

class Controlador{
    public static function login($conn, $data){
        $data['email'] = trin($data['email']);
        $data['senha'] = trin($data['senha']);

        //confirma se tem algum campo vazio
        id(empty ($data['email']) || empty($data['senha'])){
            return jsonResponse([
                "status"=>"ERRO",
                "mensagem"=>"Preencha todos os campos"
            ],401);
        }
    
        $user = userModel::validador($conn, $data['email'], "$data['senha']");
        if ($user){
            return jsonResponse (
                ["id"=> $user ['id'],
                "nome"=> $user['nome'],
                "email"=> $user['email'],
                "cargo_id"=> $user['cargo_id']
                ]);
        }else{
             return jjsonResponse([
                    "status"=>"ERRO",
                    "mensagem"=>"Credenciais invalidas"
                ],401);
        }

    }
}
?>