<?php
    function connect_to_db()
    {
        define("HOST", 'beerbuddy.cejtxhzk4z1f.us-east-2.rds.amazonaws.com');
        define("USER", "beerbuddy");
        define("PASS", "beerbuddydev");
        define("DB", "beerbuddy");
        define("DB_PORT", "3306");
    
        // connect to database
        $connection = new mysqli(HOST, USER, PASS, DB, DB_PORT);
    
        if ($connection->connect_error) {
            die('Connection to database error (' . $connection->connect_errno . ') ' . $connection->connect_error);
        }
        
        return $connection;   
    }
?>
