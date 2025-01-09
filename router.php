<?php

// Extract the REQUEST_URI from $_SERVER
$requestUri = $_SERVER["REQUEST_URI"];

// Parse the URL to get the path
$parsedUrl = parse_url($requestUri);

// Extract the path part of the URL
$uri = $parsedUrl["path"];

// Add routing logic
if ($uri === "/") {
    // Home page route
    require 'controllers/index.php'; // Adjust the path as needed
} elseif ($uri === "/about") {
    // About page route
    require 'controllers/story.php'; // Adjust the path as needed
} elseif ($uri === "/categories") {
    // Categories page route
    require 'controllers/categories.php'; // Adjust the path as needed
} else {
    // 404 Not Found
    http_response_code(404); // Set HTTP response code to 404
    echo "<p>Atvainojiet, lapa netika atrasta!</p>"; // Output error message
    die(); // Stop further execution
}
