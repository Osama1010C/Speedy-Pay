<?php
// SINGELTON AND IMMUTABLE patterns
class Database {
    private $host = 'localhost';
    private $db_name = 'speedypay';
    private $username = 'root';
    private $password = '';
    private $conn;
    private static $instance;

    // Private constructor to prevent direct instantiation
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Get instance method
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Query method
    public function query($query) {
        return $this->conn->query($query);
    }

    // Fetch single row
    public function fetchSingle($query) {
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    // Fetch multiple rows
    public function fetchAll($query) {
        $result = $this->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // // Prevent cloning
    // private function __clone() {}

    // // Prevent unserialization
    // private function __wakeup() {}
}

?>
