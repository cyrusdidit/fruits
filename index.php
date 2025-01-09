<?php

// Load configuration
$config = require 'config.php'; // Include the configuration file

// Import necessary classes
require_once 'Database.php'; // Ensure Database.php is included only once
require_once 'functions.php'; // Include helper functions

// Create the database object
$db = new Database($config["database"]); // Pass the database configuration

// Require the router
require 'router.php'; // Adjust the path to your router file if necessary
?>
