<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../../database/Database.php';
include_once '../../model/Cidade.php';
  
$database = new Database();
$db = $database->getConnection();
  
$cidade = new Cidade();
$cidade->createWithDb($db);

$stmt = $cidade->findAll();
$num = $stmt->rowCount();

if($num>0){
    $cidades_arr=array();
    $cidades_arr["records"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $cidades_item=array(
            "ci_id" => $ci_id,
            "ci_nome" => $ci_nome,
            "ci_cep" => $ci_cep
        );
  
        array_push($cidades_arr["records"], $cidades_item);
    }

    http_response_code(200);
    echo json_encode($cidades_arr);
} else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No cidade found.")
    );
}