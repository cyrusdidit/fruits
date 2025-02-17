
<?php
//#96C3EB - Im blue ladadidadadididaaaaa

//search box for flitering blog entries


$config = require("config.php");

$db = new Database($config["database"]);

//search logic
$sql = "SELECT * FROM fruits ORDER BY name ASC";
$params = [];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    //filters posts if they include "search_query"
    $search_query = "%" . $_GET["search_query"] . "%";
    $sql .= " WHERE name LIKE :search_query;";
    $params = ["search_query" => $search_query];
}
//shows the results (if empty will show all posts)
$posts = $db->query($sql, $params)->fetchAll(); 

$pageTitle="FRUITS";
//dd($posts);
//Puts search, posts and header into index.view.php
require "views/posts/index.view.php";


?>