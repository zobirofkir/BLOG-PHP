<?php
    include "/connection/connection.php";
    
    $create_user = $database->prepare("CREATE TABLE User(
        id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        fullname VARCHAR(120) NOT NULL,
        email VARCHAR(120) NOT NULL,
        password VARCHAR(120) NOT NULL,
        date DATE NOT NULL
    );");
    $create_user->execute();
    
?>