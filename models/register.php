<?php
session_start();


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include "../connection/connection.php";


if (isset($_POST["submit"])){
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $date = $_POST["date"];

        // Check if the user already exists in the database
        $existing_user = $database->prepare("SELECT COUNT(*) FROM User WHERE email = :email");
        $existing_user->bindParam(":email", $email);
        $existing_user->execute();
        $check_existing_user = $existing_user->fetchColumn();

        if ($check_existing_user > 0){
            echo "This user already exists in the database!";
        } elseif ($confirm_password !== $password){
            echo "Invalid password";
        }else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user with hashed password into the database
            $post_user = $database->prepare("INSERT INTO User(fullname, email, password, date) VALUES (:fullname, :email, :password, :date)");
            $post_user->bindParam(":fullname", $fullname);
            $post_user->bindParam(":email", $email);
            $post_user->bindParam(":password", $hashed_password); // Use the hashed password
            $post_user->bindParam(":date", $date);
            $_SESSION["fullname"] = $fullname;
            if ($post_user->execute()) {
                $_SESSION["fullname"] = $fullname;
                echo "This user has been registered.";
            } else {
                echo "Error while registering the user.";
            }
        }        
    }
?>




