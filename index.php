<?php

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
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);


//search logic
if (isset($_GET["search_query"]) && $_GET["search_query"] != "") {
    //filters posts if they include "search_query"
    $posts = $db->query("SELECT * FROM posts WHERE content LIKE '%" . $_GET["search_query"] . "%';")->fetchAll();
} else {
    //if search box is left empty, shows all posts
    $posts = $db->query("SELECT * FROM posts")->fetchAll();
}

//search form
//POST - if change db - sends domain
//GET - default - if u just read data - sends thing
echo "<form >";
echo "<input name='search_query' />";
echo "<button>Search!</button>";
echo "</form>";




//posts to post list
echo "<ul>";
foreach($posts as $post){
    echo "<li>" . $post['content'] . "</li>";
}
echo "</ul>";


?>