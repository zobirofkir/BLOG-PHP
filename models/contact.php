<?php
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include "../connection/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["contact"])) {
    $message = $_POST["message"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];

    // Validate and sanitize user input
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $subject = filter_var($subject, FILTER_SANITIZE_STRING);

    try {
        $contact_insert = $database->prepare("INSERT INTO contact (message, name, email, subject) VALUES (:message, :name, :email, :subject);");
        $contact_insert->bindParam(":message", $message);
        $contact_insert->bindParam(":name", $name);
        $contact_insert->bindParam(":email", $email);
        $contact_insert->bindParam(":subject", $subject);
        
        if ($contact_insert->execute()) {
            echo "success"; // Provide a success response
        } else {
            echo "error"; // Provide an error response
        }
    } catch (PDOException $e) {
        echo "error"; // Handle any exceptions (e.g., database errors)
    }
}
?>
