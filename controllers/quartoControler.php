<?php
require_once __DIR__ . "/../model/quartoModel.php";

class QuartoControler {
    public static function create($conn, $data){
        $result = QuartoModel::create($conn, $data);
        if($result){
            return jsonResponse(['message'=>"Quarto cadasrado com sucesso"]);    
        }else{
            return jsonResponse(['message'=>"Não foi possivel cadastrar o quarto"],400);
        }
    }

    public static function getById($conn, $id){
        $result = QuartoModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function getAll($conn){
        $result = QuartoModel::getAll($conn);
        return jsonResponse($result);
    }

    public static function delete($conn, $id){
        $result = QuartoModel::delete($conn, $id);
        if($result){
            return jsonResponse(['message' => 'Quarto deletado com sucesso.']);
        }else{
            return jsonResponse(['message' => 'Erro ao deletar quarto.'], 400);
        }
    }

    public static function update($conn, $id, $data){
        $result = QuartoModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Quarto atualizado com sucesso.'], 400);
        }else{
            return jsonResponse(['message'=> 'Não foi possivel alterar dados do quarto'], 400);
        }
    }
}
?>