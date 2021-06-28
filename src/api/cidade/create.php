<?php
// required headers
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header("HTTP/1.1 200 OK");
    die();
}

// get database connection
include_once '../../database/Database.php';
include_once '../../model/Cidade.php';
  
$database = new Database();
$db = $database->getConnection();

$cidade = new Cidade();
$cidade->createWithDb($db);

$data = json_decode(file_get_contents("php://input"));

if(!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    http_response_code(400);
    echo json_encode(array("message" => "Method not founded."));
    return;
}

if( !empty($data->nome) &&
    !empty($data->cep)) {
              
    try {
        $cidade->setNome($data->nome);
        $cidade->insertCep($data->cep);

        if($cidade->create()){
            http_response_code(201);

            echo json_encode(array("message" => "Cidade created with sucess.",
                                    "id" => $cidade->id,
                                    "nome" => $cidade->getNome(),
                                    "cep" => $cidade->getCep()));
        } else{
            http_response_code(503);
            echo json_encode(array("message" => "Unable to create cidade."));
        }

    } catch (InvalidArgumentException $e) {
        http_response_code(500);
        echo json_encode(array("message" => $e->getMessage()));
    }

    
} else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create cidade. Data is incomplete."));
}

?>