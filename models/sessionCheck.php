<?php
session_start(); // Start or resume the session

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require "../connection/connection.php";

// Function to generate a CSRF token
function generateCsrfToken() {
    $token = bin2hex(random_bytes(32)); // Generate a random token
    $_SESSION['csrf_token'] = $token; // Store the token in the session
    return $token;
}

// Include the session checking function
function checkCookie() {
    if (isset($_COOKIE['user_cookie'])) {
        return true;
    } else {
        return false;
    }
}

// Check if the CSRF token sent in the request matches the one in the session
function validateCsrfToken($receivedToken) {
    return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $receivedToken;
}

// Check user cookie status
$authenticated = checkCookie();

// Generate CSRF token
$csrfToken = generateCsrfToken();

// Validate CSRF token from the request
$receivedToken = isset($_SERVER['HTTP_X_CSRF_TOKEN']) ? $_SERVER['HTTP_X_CSRF_TOKEN'] : '';
$csrfValid = validateCsrfToken($receivedToken);

echo json_encode(["authenticated" => $authenticated, "csrf_token" => $csrfToken, "csrf_valid" => $csrfValid]);
?>
