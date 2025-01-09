<?php

// Check if the Database class is already defined
if (!class_exists('Database')) {
    class Database {
        public $pdo;

        // Constructor to establish a PDO connection
        public function __construct($config) {
            // Proper DSN construction
            $dsn = "mysql:host=" . $config['host'] . ";port=" . $config['port'] . ";dbname=" . $config['dbname'] . ";charset=" . $config['charset'];

            // Create the PDO object
            try {
                $this->pdo = new PDO($dsn, $config['user'], $config['password']);
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Set fetch mode to associative
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                die(); // Stop execution if connection fails
            }
        }

        // Method to execute queries
        public function query($sql, $params = []) {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
            return $statement;
        }
    }
}
?>
