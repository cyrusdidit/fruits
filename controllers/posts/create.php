<?php

$pageTitle = "CREATING";

$config = require("config.php");

// Create a DB instance
$db = new Database($config["database"]);

// Check form was submitted w/POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["content"])) {
        // Prepare SQL query
        $sql = "INSERT INTO posts (content) VALUES (:content)";
        $params = ["content" => $_POST["content"]];

        // Execute query 
        $db->query($sql, $params);

        // Redirect 
        header("Location: /");
        exit();
    } else {
        $error = "Content cannot be empty!";
    }
}

require "views/posts/create.view.php";
