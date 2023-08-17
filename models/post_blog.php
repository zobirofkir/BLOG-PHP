<?php
include "../connection/connection.php"; // Include your database connection file here

// Set appropriate headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$successMessage = $errorMessage = '';

if (isset($_POST["send_blog"])) {
    try {
        $image = file_get_contents($_FILES["image"]["tmp_name"]);
        $date = $_POST["date"];
        $date_pub = $_POST["date_pub"];
        $month_pub = $_POST["month_pub"];
        $title = $_POST["title"];
        $paragraph = $_POST["paragraph"];

        // Prepare and execute the database query
        $PostBlog = $database->prepare("INSERT INTO blog_posts (image, date_pub, month_pub, title, paragraph) VALUES (:image, :date_pub, :month_pub, :title, :paragraph)");
        $PostBlog->bindParam(":image", $image, PDO::PARAM_LOB);
        $PostBlog->bindParam(":date_pub", $date_pub, PDO::PARAM_INT);
        $PostBlog->bindParam(":month_pub", $month_pub, PDO::PARAM_INT);
        $PostBlog->bindParam(":title", $title, PDO::PARAM_STR);
        $PostBlog->bindParam(":paragraph", $paragraph, PDO::PARAM_STR);

        if ($PostBlog->execute()) {
            $successMessage = "This Blog has been created successfully";
        } else {
            $errorMessage = "Error creating the blog";
        }
    } catch(PDOException $e) {
        $errorMessage = "Database Error: " . $e->getMessage();
    }
}

include "../view/index.html"; 
?>
