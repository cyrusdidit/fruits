<?php

require "functions.php";

echo "Rawr <br><br>";


//connect db and php with PDO
//datasource name
$dsn = "mysql:host=localhost;port=3306;user=root;dbname=blogcyrus;charset=utf8mb4";
//db object (php data object)
$pdo = new PDO($dsn);

//prepare statement

$statement = $pdo->prepare("SELECT * FROM posts");

//fillout statement
$statement->execute();

//get blog inputs
$posts = $statement->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC or just (2)
//see it



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