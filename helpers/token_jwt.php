<?php

    require_once __DIR__ . "/jwt/jwt_INCLUD.php";
  
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

function criarToken($user){

        $payload = [
            "iss" => "Meu-site",
            "iat" => time(),
            "exp" => time() + (60 * (60 * 1)),
            "sub" => $user
        ];
        return JWT::encode($payload, SECRET_KEY, "HS256");
    };

function validateToken($token){
    try {
        $key = new Key(SECRET_KEY, "HS256");
        $decode = JWT::decode($token, $key);
        return $decode->sub;

    }catch(exception $error){

        return false;
    }
};

function validateTokenAPI($token){
        $headers = getallheaders();
    if(isset($headers["Authorization"])){
        return jsonResponse(["message" => "Token ausente"], 401);
        exit;
    }
    $token = str_replace("Bearer", " ", $headers["Authorization"]);
    if( ! validateToken($token)){
        return jsonResponse(["message" => "Token é invalido"], 401);
        exit;  
    }
};
?>