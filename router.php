<?php

// contains uri of currect request
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

//getting routes from routes.php
$routes = require("routes.php");


// Add routing logic
if (array_key_exists($uri, $routes)) {
require $routes[$uri]; 
} else {
    // 404 Not Found
    http_response_code(404); // Set HTTP response code to 404
    require "controllers/404.php"; // error message
    die(); // Stop further execution
}
