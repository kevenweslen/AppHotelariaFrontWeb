<?php

class adicionalModel {

    public static function create($conn, $name) {
        $sql = "INSERT INTO fotos (nome) VALUES (?)";
        
        $stmt = $conn->prepare($sql);
        if($stmt->bind_param("s", $name,)){
            return  $conn->insert_id;
        }
        return false;
    }

    public static function createRelationRoom($conn, $idRoom, $idPhoto) {
        $sql = "INSERT INTO quartos_fotos (quarto_id, foto_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $idRoom, $idPhoto);
        if($stmt->execute()){
            return  $conn->insert_id;
        }
        return false;
    }
    
    public static function getAll($conn) {
        $sql = "SELECT * FROM fotos";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($conn, $id) {
        $sql = "SELECT * FROM fotos (nome) WHERE d= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function getByRoomId($conn, $id) {
        $sql = "SELECT f.nome FROM quartod_fotos qf JOIN fotos f ON qf.foto_id = f.id WHERE qf.quarto_id = ?"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $photos = [];
        while ( $row = $result->fecth_assoc()){
            $photo[] = $row['nome'];
        }
        return $photos;
    }
     public static function delete($conn, $id) {
        $sql = "DELETE FROM fotos WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    
    public static function update($conn, $id, $data) {
        $sql = "UPDATE fotos SET nome = ?, preco = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi",
            $data["nome"],
            $data["preco"],
            $id
        );
        return $stmt->execute();
    }


}

?> 