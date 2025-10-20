<?php
require_once __DIR__ ."/../model/orderModel.php";
require_once __DIR__ . "/../controllers/validadorController.php";

class orderController {
    public static function createOrder($conn, $data){
        $data["usuario_id"] = isset($data['usuario_id']) ? $data['usuario_id']: null;

        ValidadorController::validate_data($data, ["cliente_id", "pagamento", "quartos"]);

        foreach($data['quartos'] as $quarto){
            ValidadorController::validate_data($quarto, ["id", "inicio", "fim"]);
            //corrigir  fix da HORA, salvar na 
            // variavel $data
            $quarto["inicio"] = ValidadorController::fix_dateHour($quarto["inicio"], 14);
            $quarto["fim"] = ValidadorController::fix_dateHour($quarto["fim"], 12);
        }
        
        if ( count($data["quartos"]) == 0){
            return jsonResponse(['message'=> 'Não existe reservas'], 400);
        }

        try{
            $resultado = OrderModel::createOrder($conn, $data);
            return jsonResponse(['message' => $resultado]);
            
        }catch(\Throwable $erro){
            return jsonResponse(['message' => $erro->getMessage()], 500);
        }

    }
    public static function create ($conn, $data){

    }

    public static function update ($conn, $data){

    }

    public static function delete ($conn, $data){

    }

    public static function getAll ($conn, $data){

    }
    public static function getById ($conn, $data){

    }
}
?>