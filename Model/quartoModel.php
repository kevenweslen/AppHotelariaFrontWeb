<?php

class quartoModel {

    public static function getAll($conn) {
        $sql = "SELECT * FROM quartos";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($conn, $id) {
        $sql = "SELECT * FROM quartos WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($conn, $data) {
        $sql = "INSERT INTO quartos (nome, numero, qnt_cama_casal, qnt_cama_solteiro, preco, disponivel) 
        VALUES (?, ?, ?, ?, ?, ?);";
        
        $stat = $conn->prepare($sql);
        $stat->bind_param("ssiidi", 
            $data['nome'],
            $data["numero"],
            $data["qnt_cama_casal"],
            $data["qnt_cama_solteiro"],
            $data["preco"],
            $data['disponivel']
        );
                if($stat->execute()){
            return  $conn->insert_id;
        }
        return false;
    }

    public static function update($conn, $id, $data) {
        $sql = "UPDATE quartos SET nome = ?, numero = ?, qnt_cama_casal = ?, qnt_cama_solteiro = ?, preco = ?, disponivel = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiidii",
            $data["nome"],
            $data["numero"],
            $data["qnt_cama_casal"],
            $data["qnt_cama_solteiro"],
            $data["preco"],
            $data["disponivel"],
            $id
        );
        return $stmt->execute();
    }

    public static function delete($conn, $id) {
        $sql = "DELETE FROM quartos WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public static function get_available($conn,$data){
        $sql = "SELECT *
        FROM quartos q
        WHERE  q.disponivel = true
        AND ((q.qtd_cama_casal * 2) + q.qtd_cama_solteiro) >= ?
        AND q.id NOT IN (
            SELECT r.quarto_id
            FROM reservas r
            WHERE (r.data_fim >= ? AND r.data_inicio <= ?))";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss",
            $data['disponivel'],// aqui estava "qtd" mas eu acho que eu devo substituir pelo disponivel. È o que esta no meu banco, talzes isso seja o serto, pois não sei como esta no banco dos professores.
            $data['inicio'],
            $data['fim']);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}

?>