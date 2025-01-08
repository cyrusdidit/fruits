
<link rel="stylesheet" type="text/css" href="styles.css">

<?php
//#96C3EB
//search box for flitering blog entries
//1. html form input element, submit button -
//2. PHP gets from form and so on
//3. izviedot vaicinajumu uz db

require "functions.php";
require "Database.php";


$config = require("config.php");

$db = new Database($config["database"]);

//search logic
$sql = "SELECT * FROM posts";
$params = [];
if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    //filters posts if they include "search_query"
    $search_query = "%" . $_GET["search_query"] . "%";
    $sql .= " WHERE content LIKE :search_query;";
    $params = ["search_query" => $search_query];
}
//shows the results (if empty will show all posts)
$posts = $db->query($sql, $params)->fetchAll(); 


//Puts search, posts and header into index.view.php
require "views/index.view.php";

//is there, you dont know it or if it is there $x
//2nd value, where value comes from 1st val
//if it is there, 


//null coalescing operator
//$y = $x ?? "not found";

?>