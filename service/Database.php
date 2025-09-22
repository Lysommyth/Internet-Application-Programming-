<?php
class Database {

    private $conn;

    public function __construct($conf) {
        
        $this->conn = new mysqli(
            $conf['db_host'],
            $conf['db_user'],
            $conf['db_pass'],
            $conf['db_name']
        );

       
        if ($this->conn->connect_error) {
            die("Database Connection Failed: " . $this->conn->connect_error);
        }

        
    }

    
    public function getConnection() {
        return $this->conn;
    }

    
    public function close() {
        $this->conn->close();
    }
}
