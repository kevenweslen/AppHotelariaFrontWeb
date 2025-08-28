<?php
require_once __DIR__ ."/controler/autenticador.php";
require_once __DIR__ ."/controler/senha.php";

$data = [
    "email" => "leo@gmail.com",
    "password" => "123456"
];


echo senhaControler::geradorHash($data["password"]); 
$hash = '$2y$10$gS3zXiLQKS2CQF/1WWSDcuCtre.B4XdLxZqIuV50P8765yN7hseei$2y$10$w.TyMHBKdtwpf81ZtdCNUeXtZ1yF6iq8yKtI0RsV1MxiDLKQ.Kne2';
echo "<br>";
echo senhaControler::leitorHash($data["password"], $hash); 

?>