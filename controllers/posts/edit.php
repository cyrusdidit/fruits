<?php

$pageTitle = "EDITING";

$config = require("config.php");
require "Validator.php"; // Gets Validator class
require "Database.php";  // Make sure Database.php is included if not already

$db = new Database($config["database"]);

// Check if 'id' is provided in the URL
if (!isset($_GET["id"])) {
    die("No fruit ID provided.");
}

$fruitID = $_GET["id"];

// Fetch the existing fruits
$query = $db->query("SELECT * FROM fruits WHERE ID = :id", ["id" => $fruitID]);
$fruit = $query->fetch();

//If the id doesn't exist
if (!$fruit) {
    die("Fruit not found.");
}

// Empty errors array
$errors = [];

// Handle updating
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postID = $_POST["id"]; // Get post ID from hidden input
    $name = trim($_POST["name"] ?? "");

    if (!Validator::string($name, max: 40, min: 2)) {
        $errors["name"] = "Name must be between 2 and 40 characters!";
    }

    if (empty($errors)) {
        // UPDATE, NOT MAKE NEW
        $sql = "UPDATE fruits SET name = :name WHERE ID = :id";
        $params = ["name" => $name, "id" => $fruitID];
        $db->query($sql, $params);

        header("Location: show?id=" . $fruitID); // Redirect to updated post
        exit();
    }
}

// Load the edit view (pass post data & errors)
require "views/posts/edit.view.php";
?>
