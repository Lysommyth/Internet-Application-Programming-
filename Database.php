<?php
require_once 'conf.php';

class Database {
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct($conf) {
        $this->host = $conf['db_host'];
        $this->db_name = $conf['db_name'];
        $this->username = $conf['db_user'];
        $this->password = $conf['db_pass'];
    }

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("❌ Database Connection Error: " . $e->getMessage());
        }
        return $this->conn;
    }
}
