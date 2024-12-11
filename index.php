<?php

require "functions.php";
require "Database.php";

echo "Rawr <br><br>";


$db = new Database();
$db->query();

//get blog inputs
$posts = $db->query(); //PDO::FETCH_ASSOC or just (2)


//foreach output each post in a table

echo "<table border='1'>";
echo "<tr><th>Content</th></tr>"; // Table header (only Content)

// Loop through each post and output only the content
foreach ($posts as $post) {
    echo "<tr>";
    echo "<td>" . ($post['content']) . "</td>"; // Output content
    echo "</tr>";
}

echo "</table>";

echo "<br>"; //not in a table below

//list
 echo "<ul>";
foreach($posts as $post){
    echo "<li>" . ($post['content']) . "</li>"; // Output content
}
echo "</ul>";



?>