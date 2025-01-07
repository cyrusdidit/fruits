<?php

class Database{
    public $pdo;

    //make and destroy
    public function __construct($config){
        //data source name
        $dsn = "mysql:" . http_build_query($config, "", ";");

        //php data object
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //19,2
    }


    public function query($sql, $params){
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params); //do it
        return $statement;
    }
}




?>