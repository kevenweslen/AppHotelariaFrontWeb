<?php

class orderModel {
    public static function createOrder($conn, $data) {
        $sql = "INSERT INTO pedidos (usuario_id, cliente_id, pagamento) 
        VALUES (?, ?, ?);";
        
        $stat = $conn->prepare($sql);
        $stat->bind_param("iii", 
            $data["usuario_id"],
            $data["cliente_id"],
            $data["pagamento"]
        );
        $resultado = $stat->execute;
        if ($resultado) {
            return $conn->insert_id;
    }
    return false;
}
}
?>