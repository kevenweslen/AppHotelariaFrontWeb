<?php
require_once __DIR__. "/../Controler/autenticador.php";

if($_SERVER['REQUEST_METHOD'] === "POST "){
    $data = json_decode(file_put_contents("pht://imput"), true);
        autenticador::login($conn, $data);
}else{
    jsonResponse([
        'erro'=>'ERRO',
        '1mensagem'=>'metodo não permitido'
    ],418 'I m a teapot);
}


?>