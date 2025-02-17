<?php

$pageTitle = "EDITING";

$config = require("config.php");
require "Validator.php"; // Gets validator class

$db = new Database($config["database"]);

// Check if 'id' is provided in the URL
if (!isset($_GET["id"])) {
    die("No post ID provided.");
}

$postID = $_GET["id"];

// Fetch the existing post
$query = $db->query("SELECT * FROM posts WHERE ID = :id", ["id" => $postID]);
$post = $query->fetch();
//If the id doesn't exist
if (!$post) {
    die("Post not found.");
}

// Empty errors array
$errors = [];

// Handle updating
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postID = $_POST["id"]; // Get post ID from hidden input
    $content = trim($_POST["name"] ?? "");

    if (!Validator::string($content, max: 50)) {
        $errors["name"] = "Name must be between 1 and 50 characters!";
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
