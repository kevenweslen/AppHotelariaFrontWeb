<?php

class userModel{
    public static function validador($conn, $email, $password){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $state = $conn-> prepare($sql);
        $state->bind_param("s", $email);
        $state->execute();
        $resultado = $state -> get_result();
        
        if($user = $resultado-> fetch_assoc()){

            if($user['senha'] === $password){
                unset($user['senha']);
                return $user;
            }
        }
        return false;
    }

    public static function create($conn, $data) {
        $sql = "INSERT INTO usuarios (nome, email, senha, cargo_id) VALUES (?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi",
            $data["nome"],
            $data["email"],
            $data["senha"],
            $data["cargo_id"]
        );
        return $stmt->execute();
    }

    public static function update($conn, $id, $data) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, cargo_id = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii",
            $data["nome"],
            $data["email"],
            $data["senha"],
            $data["cargo_id"],
            $id
        );
        return $stmt->execute();
    }

    public static function getAll($conn) {
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getById($conn, $id) {
        $sql = "SELECT * FROM usuarios WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function delete($conn, $id) {
        $sql = "DELETE FROM usuarios WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>