<?php


require "functions.php";
require "Database.php";

//header
echo "<h1>Categories</h1>";

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


//search form 
//POST - if change db - sends domain
//GET - default - if u just read data - sends thing
echo "<form >";
echo "<input name='search_query' />";
echo "<button>Search!</button>";
echo "</form>";


//posts to post (list)
echo "<ul>";
foreach($categories as $category){
    echo "<li>" . $category['category_name'] . "</li>";
}
echo "</ul>";


?>