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

if (!$post) {
    die("Post not found.");
}

// Empty errors array
$errors = [];

// Handle updating
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postID = $_POST["id"]; // Get post ID from hidden input
    $content = trim($_POST["content"] ?? "");

    if (!Validator::string($content, max: 50)) {
        $errors["content"] = "Content must be between 1 and 50 characters!";
    }

    if (empty($errors)) {
        // UPDATE, NOT MAKE NEW
        $sql = "UPDATE posts SET content = :content WHERE ID = :id";
        $params = ["content" => $content, "id" => $postID];
        $db->query($sql, $params);

        header("Location: show?id=" . $postID); // Redirect to updated post
        exit();
    }
}

// Load the edit view (pass post data & errors)
require "views/posts/edit.view.php";
?>
