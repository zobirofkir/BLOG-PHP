<?php
    include "../connection/connection.php";
    
    // $create_user = $database->prepare("CREATE TABLE User(
    //     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    //     fullname VARCHAR(120) NOT NULL,
    //     email VARCHAR(120) NOT NULL,
    //     password VARCHAR(120) NOT NULL,
    //     date DATE NOT NULL
    // );");
    // $create_user->execute();

    // $post_comment = $database->prepare("CREATE TABLE comment (
    //     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    //     comment VARCHAR(120) NOT NULL,
    //     name VARCHAR(120) NOT NULL,
    //     email VARCHAR(120) NOT NULL, 
    //     website VARCHAR(120) NOT NULL
    // );");
    // $post_comment->execute();
        
    $contact_user = $database->prepare("CREATE TABLE contact(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, message VARCHAR(120) NOT NULL, name VARCHAR(120) NOT NULL, email VARCHAR(120) NOT NULL, subject VARCHAR(120) NOT NULL);");
    $contact_user->execute();
?>