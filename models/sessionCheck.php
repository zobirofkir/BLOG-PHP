<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require "../connection/connection.php";

// Include the session checking function
function checkSession() {
    if (isset($_SESSION['fullname'])) {
        return $_SESSION['fullname'];
    } else {
        return false;
    }
}

$fullnameSession = checkSession();

if ($fullnameSession) {
    echo $fullnameSession;
} else {
    echo json_encode(["authenticated" => false]); // Return a JSON response indicating authentication status
}
?>
