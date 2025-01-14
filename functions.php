<?php

// Define the dd() helper function for debugging if it's not already defined
if (!function_exists('dd')) {
    function dd($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

function redirectIfNotFound($location = "/") {
    http_response_code(404);
    header("location: $location", 302);
    exit(); //like die() but more softly (??)
}
