<?php
require_once __DIR__ . "/../model/pedidoModel"

class pedidoController{
    public static function create($conn, $data){
        $result = pedidoModel::create($conn) 
    }
}
?>