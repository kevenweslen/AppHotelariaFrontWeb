<?php
    require_once __DIR__ . "/../controllers/orderController.php";
 
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $option =  $segments[2] ?? null;
    $data = json_decode(file_get_contents('php://input'), true);
    if ($option == "reservation"){
           orderController::createOrder($conn, $data);
    }else{
        orderController::create($conn, $data);
    }
    
} else {
    return jsonResponse(['message' => 'Metodo não Permitido'], 400);
}
 
?>