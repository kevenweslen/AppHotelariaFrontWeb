<?php
    require_once "../confg/dataBase.php";
    require_once "../controllers/autenticador.php";
    $title = "AppHotelaria";
//    require_once "Utils/cabecalho.php";

$data = [
    "email"=>"leo@gmail.com",
    "senha"=>"123456"
];

    Controlador::login($conn, $data);

?>

    <h1>Home teste</h1>

<?php
    require_once "Utils/rodape.php";
?>