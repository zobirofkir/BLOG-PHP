<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


include "../connection/connection.php";

$response = array();

if (isset($_SESSION["user_id"])) {
    $response["authenticated"] = true;
} else {
    $response["authenticated"] = false;
}

header("Content-Type: application/json");
echo json_encode($response);
?>

