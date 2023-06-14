<?php
class DB {
    private $conn;

    public function __construct($hostname, $dbname, $username, $pw) {
        try {
            $this->conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $pw);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

$hostname = "localhost";
$dbname = "vies_escalada";
$username = "dwes-user";
$pw = "dwes-pass";

$db = new DB($hostname, $dbname, $username, $pw);
$connexio = $db->getConnection();
?>
