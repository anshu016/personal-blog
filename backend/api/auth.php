<?php

// Define your credentials
define('USERNAME', 'admin');  // Replace with your username
define('PASSWORD', 'password');  // Replace with your password

// Authentication function
function authenticate() {
    // Check if the Authorization header is set
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Restricted Area"');
        echo json_encode(['error' => 'Authentication required']);
        exit;
    }

    // Check if the username and password are correct
    if ($_SERVER['PHP_AUTH_USER'] !== USERNAME || $_SERVER['PHP_AUTH_PW'] !== PASSWORD) {
        header('HTTP/1.1 403 Forbidden');
        echo json_encode(['error' => 'Invalid credentials']);
        exit;
    }
}
?>
