<?php

declare(strict_types=1);

class DbConnection {

    private static $instance;
    
    static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DbConnection();
        }
        return self::$instance;
    }
    
    private $connection;
    
    private function __construct() {
    
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "url_shortener";

        $dsn = "mysql:host=$host;dbname=$db";
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ];
        $this->connection = new PDO($dsn, $user, $pass, $options);
    }
    
    function getConnection() {
        return $this->connection;
    }
    private function __clone() {}
} 
