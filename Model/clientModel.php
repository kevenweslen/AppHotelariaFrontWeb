<?php
class ClientModel{
    public static function create ($conn, $data, $id){
    $sql = "INSERT INTO clientes (nome, email, telefone, cpf, senha, cargo_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi",
        $data['nome'],
        $data['email'],
        $data['telefone'],
        $data['cpf'],
        $data['senha'],
        $id['cargo_id']
    );
    return $stmt->execute();
    }
    public static function update($conn, $id){
        $sql = "UPDATE clientes SET nome=?, email=?, telefone=?, cpf=?, senha=?, cargo_id=?"
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi",
        $data['nome'],
        $data['email'],
        $data['telefone'],
        $data['cpf'],
        $data['senha'],
        $id['cargo_id']
    );
    return $stmt->execute();
    }
    public static function delete($conn, $id){
        $sql = "DELETE FROM clientes WHERE id=?";
        $stmt = $conn->bind_prepare($sql);
        $stmt
    }
}
?>