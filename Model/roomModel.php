<?php

class roomModel{
    public static function create ($conn, $data){
        $sql = "INSERT INTO quartos (nome, numero, qnt_cama_casal, qnt_cama_solteiro, preco, disponivel) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siiidi", 
            $data['name'],
            $data['numero'],
            $data['qtd_solteiro'],
            $data['qtd_casal'],
            $data['preco'],
            $data['disponivel']
        );
        return $stmt->execute();
    }
}

?>