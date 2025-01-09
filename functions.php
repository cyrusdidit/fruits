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
