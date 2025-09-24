<?php
require_once __DIR__ . "/../model/adicionalModel.php";

class AdicionalController {
    public static function create($conn, $data){
        $result = AdicionalModel::create($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Adicional cadasrado Com sucesso"],200);    
        }else{
            return jsonResponse(['message'=>"Não foi possivel cadastrar o adicional"],400);
        }
    }

    public static function getById($conn, $id){
        $result = AdicionalModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function getAll($conn){
        $result = AdicionalModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function delete($conn, $id){
        $result = AdicionalModel::delete($conn, $id);
        if($result){
            return jsonResponse(['message' => 'Adicional deletado com sucesso.'],200);
        }else{
            return jsonResponse(['message' => 'Erro ao deletar adicional.'], 400);
        }
    }
    
    public static function update($conn, $id, $data){
        $result = AdicionalModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Adicional atualizado com sucesso.'],200);
        }else{
            return jsonResponse(['message'=> 'Não foi possivel alterar dados do adicional'],400);
        }
    }
    
}
?>