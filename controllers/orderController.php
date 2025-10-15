<?php
require_once __DIR__ ."/../model/orderModel.php";
require_once __DIR__ . "/../controllers/validadorController.php";

class orderController {
    public static function createOrder($conn, $data){
       $data['usuario_id'] = isset($data['usuario_id']) ?  $data['usuario_id'] : null;
 
        validadorController::validate_data($data, ["cliente_id", "pagamento", "quartos"]);
 
        foreach($data['quartos'] as $quarto){
          validadorController::validate_data($quarto,["id","inicio", "fim"]);
          $quarto['inicio'] = validadorController::fix_dateHour($quarto['inicio'], 14);
          $quarto['fim'] = validadorController::fix_dateHour($quarto['fim'], 12);
        }
 
        if(count ($data ["quartos"]) == 0){
            return jsonResponse(['message'=> 'não existe reserva'], 400);
        }
        try {
            $resultado = orderModel::createOrder($conn, $data);
            return jsonResponse(['message'=> $resultado]);
        } catch(RuntimeException $erro){
            return jsonResponse(['message' => "erro ao criar a reserva"], 500);
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
}
?>