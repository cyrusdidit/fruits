<?php

// Extract the REQUEST_URI from $_SERVER
$requestUri = $_SERVER["REQUEST_URI"];

// Parse the URL to get the path
$parsedUrl = parse_url($requestUri);

// Extract the path part of the URL
$uri = $parsedUrl["path"];

//getting routes from routes.php
$routes = require("routes.php");

// Add routing logic
if ($uri === "/") {
    // Home page route
    require 'controllers/index.php'; 
} else if ($uri === "/about") {
    // About page route
    require 'controllers/story.php'; 
} else if ($uri === "/categories") {
    require 'controllers/categories.php'; 
} else {
    // 404 Not Found
    http_response_code(404); // Set HTTP response code to 404
    echo "<p>Atvainojiet, lapa netika atrasta!</p>"; // error message
    die(); // Stop further execution
}
