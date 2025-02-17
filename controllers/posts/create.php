<?php

$pageTitle = "ADDING";

$config = require("config.php");
require "Validator.php"; // Gets validator class

$db = new Database($config["database"]);

// Initialize errors array
$errors = [];

// Check if the form was submitted with POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");

    // Validate input using Validator class
    if (!Validator::string($name, max: 40, min: 2 )) { //! makes it so if content is <50 then will work (true = false)
        $errors["name"] = "name must be between 2 and 40 characters!";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO fruits (name) VALUES (:name)";
        $params = ["name" => $name];
        $db->query($sql, $params);

        header("Location: /");
        exit();
    }
}

// Load the view (pass errors & old input if any)
require "views/posts/create.view.php";
