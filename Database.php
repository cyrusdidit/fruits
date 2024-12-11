<?php

class Database{
    //make query method
    public function query(){

//datasource name
$dsn = "mysql:host=localhost;port=3306;user=root;dbname=blogcyrus;charset=utf8mb4";
//db object (php data object)
$pdo = new PDO($dsn);


        //prepare statement
        $statement = $pdo->prepare("SELECT * FROM posts");
        //fillout statement
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}





?>