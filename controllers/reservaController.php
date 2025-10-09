<?php
require_once "validadorController.php";
require_once __DIR__ . "/../models/reservaModel.php";

class reservaController{

    public static function create($conn, $data) {
        validadorController::validate_data($data, ["pedido_id", "quarto_id", "adicional_id", "fim", "inicio"]);

        $data["fim"] = validadorController::fix_dateHour($data["fim"], 12);
        $data["inicio"] = validadorController::fix_dateHour($data["inicio"], 14);
    
        $result = reservaModel::create($conn, $data);
        if ($result) {
            return jsonResponse(['message'=>'Reserva registrada com sucesso"']);
        }
        else {
            return jsonResponse(['message'=>'Erro ao registrar a reserva!'], 400);
        }
    } 

    public static function getById($conn, $id) {
        $result = reservaModel::getById($conn, $id);
        return jsonResponse($result);
    }

    public static function getAll($conn) {
        $result = reservaModel::getAll($conn);
        return jsonResponse($result);
    }
}

?>