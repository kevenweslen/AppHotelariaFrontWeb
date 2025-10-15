<?php
class reservaModel {

    public static function getAll($conn) {
        $sql = "SELECT * FROM reservas";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($conn, $id) {
        $sql = "SELECT * FROM reservas WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($conn, $data) {
        $sql = "INSERT INTO reservas (pedido_id, quarto_id, adicional_id, inicio, fim) 
        VALUES (?, ?, ?, ?, ?);";
        
        $stat = $conn->prepare($sql);
        $stat->bind_param("iiiss", 
            $data['pedido_id'],
            $data["quarto_id"],
            $data["adicional_id"],
            $data["inicio"],
            $data["fim"]
        );
        return $stat->execute();
    }
    //KEVEN - RETORNA TRUE SE NAO TEM CONFLITO
        public static function isQuartoDisponivel($conn, $quarto_id, $inicio, $fim) {
            $sql = "SELECT COUNT(*) as conflitos
                    FROM reservas
                    WHERE quarto_id = ?
                    AND (
                        (data_inicio <= ? AND data_fim > ?) OR
                        (data_inicio < ? AND data_fim >= ?) OR
                        (data_inicio >= ? AND data_fim <= ?)
                    )";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issssss",
                $quarto_id,
                $fim, $inicio,
                $inicio, $fim,
                $inicio, $fim
            );
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['conflitos'] == 0;
    }

}

?>