<?php

class orderModel {
public static function update($conn, $id, $data){
        $sql = "UPDATE pedidos SET usuario_id = ?, cliente_id = ?, pagamento = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iis",
            $data["usuario_id"],
            $data["cliente_id"],
            $data["pagamento"]
        );
        return $stmt->execute();
    }
 
    public static function createOrder($conn, $data){
        $usuario_id = $data['usuario_id'];
        $cliente_id = $data['cliente_id'];
        $pagamento = $data['pagamento'];
        $reservas = [];
        $reservou = false;
       
        $conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
 
        try {
            $order_id = self::create($conn, [
                "usuario_id" => $usuario_id,
                "cliente_id" => $cliente_id,
                "pagamento" => $pagamento
            ]);
 
            if(!$order_id){
                throw new RuntimeException("erro ao criar o pedido");
            }
 
            foreach($data['quartos'] as $quarto){
                $id = $quarto["id"];
                $inicio = $quarto["inicio"];
                $fim = $quarto["fim"];
 
                if(!quartomodel::get_available($conn, $id)){
                    $reservas[] = "quarto ($id) indisponivel";
                    continue;
                }
 
               if ( !reservaModel::isQuartoDisponivel($conn, $id, $inicio, $fim) ) {
                    $reservas[] = "quarto {$id} indisponivel no periodo de {$inicio} a {$fim}";
                    continue;
                }
 
                $reserveResult = quartomodel::create($conn, [
                    "pedido_id" => $order_id,
                    "quarto_id" => $id,
                    "adicional_id" => $false,
                    "inicio" => $inicio,
                    "fim" => $fim
                ]);
 
                $reservou = true;
                $reservas [] = [
                    "reserva_id" => $conn->insert_id,
                    "quarto_id" => $id
                ];
            }
 
            if ( $reservou == true ) {
                $conn->commit();
                return [
                    "pedido_id" => $pedido_id,
                    "reservas" => $reservas,
                    "message" => "Reservas criadas com sucesso!"
                ];
 
            } else {
                throw new RuntimeException("Pedido não realizado, nenhum quarto reservado.");
            }
 
        }catch (\Throwable $th) {
            try {
                $conn->rollback();
            } catch (\Throwable $th) {
               throw $th;
            }
            //throw $th;
        }
    }
}
?>