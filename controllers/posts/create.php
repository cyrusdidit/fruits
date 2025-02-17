<?php

$pageTitle = "CREATING";

$config = require("config.php");
require "Validator.php"; //gets validator class

$db = new Database($config["database"]);

//empty errors array
$errors = [];

// Check if the form was submitted with POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $content = trim($_POST["content"] ?? "");

    // Validate input using Validator class
    if (!Validator::string($_POST["name"], max: 50 )) { //! makes it so if content is <50 then will work (true = false)
        $errors["name"] = "name must be between 1 and 50 characters!";
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
