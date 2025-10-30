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


    public static function validadorUser($conn, $email, $password) {
        $sql = "SELECT usuarios.id, usuarios.nome, usuarios.senha, cargo.nome AS cargo  FROM usuarios WHERE usuarios.email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_pxaram("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
 
        if($user = $result->fetch_assoc()){
            if(senhaControler::leitorHash($password, $user['senha'])) {
                unset($user['senha']);  
                return $user;
            }
        }
    }
}
 
?>