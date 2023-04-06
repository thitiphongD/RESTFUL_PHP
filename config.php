<?php
    class Config {
        private const HOST = "localhost";
        private const USER = "root";
        private const PASS = "";
        private const NAME = "restful_php";

        private $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::NAME . "";
        protected $conn = null;

        public function __construct() {
            try {
                $this->conn = new PDO($this->dsn, self::USER, self::PASS);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $error) {
                die("Connection fail!: " . $error->getMessage());
            }
            return $this->conn;
        }
        public function test_input($data) {
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        }
        public function message($content, $status) {
            return json_encode(['message' => $content, 'error' => $status]);
        }
    }
?>