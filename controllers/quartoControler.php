<?php
require_once __DIR__ . "/../Model/roomModel.php";

class quartoControler {
    public static function create($conn, $data) {
        $result = RoomModel::create($conn,$data);
        if($result){
            //deu certo
            return jsonResponse(['mensage'=>"Quarto cadastrado com sucesso!"]);

        }else{
            return jsonResponse(['mensage'=>"Erro ao cadastrar quarto! :("],400);
            //não deu certo
        }
    }

    public static function getById($conn, $id) {
        $result = roomModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function listAll($conn) {
        $result = roomModel::getAll($conn);
        return jsonResponse($result);
    } 

    public static function delete($conn, $id) {
        $result = roomModel::delete($conn, $id);
        if($result){
            return jsonResponse(['message'=> 'Quarto deletado.']);
        }else{
            return jsonResponse(['message'=> ''], 400);
        }
    }

    public static function update($conn, $id, $data){
        $result = roomModel::update($conn, $id, $data);
        if($result){
            return jsonResponse(['message'=> 'Quarto atualizado com sucesso.'], 400);
        }else{
            return jsonResponse(['message'=> 'Não foi possivel alterar o quarto'], 400);
        }
    }
}
?>