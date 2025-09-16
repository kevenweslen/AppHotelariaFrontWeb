<?php
require_once __DIR__ ."/controler/autenticador.php";
require_once __DIR__ ."/controler/senha.php";
require_once __DIR__ ."/helpers/token_jwt.php";
require_once __DIR__ ."/controler/quartoControler.php";

$data = [
    "name" => "quarto normal",
    "numero" => 1,
    "qtd_solteiro" => 2,
    "qtd_casal" => 1,
    "preco" => 300,
    "disponivel" => 1
];
 
quartoControler::create($conn, $data);

// $data = [
//     "email" => "leo@gmail.com",
//     "senha" => "123456"
// ];

//Controlador::login($conn, $data);
//echo senhaControler::geradorHash($data["password"]); 
//$hash = '$2y$10$gS3zXiLQKS2CQF/1WWSDcuCtre.B4XdLxZqIuV50P8765yN7hseei$2y$10$w.TyMHBKdtwpf81ZtdCNUeXtZ1yF6iq8yKtI0RsV1MxiDLKQ.Kne2';
//echo "<br>";
//echo senhaControler::leitorHash($data["password"], $hash); 
// $tokenInvalido = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJNZXUtc2l0ZSIsImlhdCI6MTc1NjkyNjU1MCwiZXhwIjoxNzU2OTMwMTUwLCJzdWIiOnsiaWQiOjMsIm5vbWUiOiJsZW8gY2FtYXJnbyIsImVtYWlsIjoibGVvQGdtYWlsLmNvbSIsImNhcmdvX2lkIjoxfX0.qcKBfWx-yX48tXw7p5N9b0Na0VfbDAJzbS1wUtrmZKk';
// echo validateToken($token);
?>