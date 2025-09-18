<?php
require_once __DIR__ . "/../model/clientModel.php";

class clientController {
    public static function create($conn, $data){
        $result = ClientModel::create($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Cliente cadasrado Com sucesso"]);    
        }else{
            return jsonResponse(['message'=>"Não foi possivel cadastrar o cliente"],400);
        }
    }

    public static function getById($conn, $id){
        $result = ClientModel::getById($conn, $id);
        return jsonResponse($result);
        }
    public static function getAll($conn){
        $result = ClientModel::getAll($conn);
        return jsonResponse($result);
    }
    public static function delete($conn, $id){
        $result = ClientModel::delete($conn, $id);
        if($result){
            return jsonResponse(['message' => 'Cliente deletado com sucesso.']);
        }else{
            return jsonResponse(['message' => 'Erro ao deletar cliente.'], 400);
        }
    }
    public static function update($conn, $id, $data){
        $result = ClientModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Cliente atualizado com sucesso.'], 400);
        }else{
            return jsonResponse(['message'=> 'Não foi possivel alterar dados do Cliente'], 400);
        }
    }
    
}
?>