<?php

// Assuming your fruit ID is in the query parameter 'id'
if (!isset($_GET["id"])) {
    die("No fruit ID provided.");
}

$fruitID = $_GET["id"];

// Assuming you already have a Database instance available
$config = require("config.php");
$db = new Database($config["database"]);

// Fetch the fruit from the database
$query = $db->query("SELECT * FROM fruits WHERE ID = :id", ["id" => $fruitID]);
$fruit = $query->fetch();

// If the fruit doesn't exist
if (!$fruit) {
    die("Fruit not found.");
}

// Load the show view and pass the fruit data
require "views/posts/show.view.php";

?>
