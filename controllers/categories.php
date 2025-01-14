
<link rel="stylesheet" type="text/css" href="css/styles.css">

<?php


//header

$config = require("config.php");

$db = new Database($config["database"]);

//search logic
$sql = "SELECT * FROM categories";
$params = [];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    //filters posts if they include "search_query"
    $search_query = "%" . $_GET["search_query"] . "%";
    $sql .= " WHERE category_name LIKE :search_query;";
    $params = ["search_query" => $search_query];
}
//shows the results (if empty will show all posts)
$categories = $db->query($sql, $params)->fetchAll(); 

$pageTitle="Categories";

//Puts search, posts and header into index.view.php
require "views/categories.view.php";

?>