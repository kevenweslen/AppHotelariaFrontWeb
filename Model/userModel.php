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
}
?>