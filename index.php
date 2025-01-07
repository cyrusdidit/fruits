
<link rel="stylesheet" type="text/css" href="styles.css">

<?php
//#96C3EB
//search box for flitering blog entries
//1. html form input element, submit button -
//2. PHP gets from form and so on
//3. izviedot vaicinajumu uz db

require "functions.php";
require "Database.php";

//header
echo "<h1>Blog</h1>";

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









//search form
//POST - if change db - sends domain
//GET - default - if u just read data - sends thing
echo "<form >";
echo "<input name='search_query' />";
echo "<button>Search!</button>";
echo "</form>";


//posts to post (list)
echo "<ul>";
foreach($posts as $post){
    echo "<li>" . $post['content'] . "</li>";
}
echo "</ul>";


?>