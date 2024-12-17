<?php

require "functions.php";
require "Database.php";

echo "Rawr <br><br>";

$config = require("config.php");

$db = new Database($config["database"]);
$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);


echo "<ul>";
foreach($posts as $post){
    echo "<li>" . $post['content'] . "</li>";
}
echo "</ul>";


?>