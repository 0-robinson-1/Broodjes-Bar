<?php
require_once 'database.php';

class DataHandler {
    private ?mysqli $conn = null;
    private Database $database;

    public function __construct() {
        $this->database = new Database();
        $this->conn = $this->database->connect();
    }

    public function __destruct() {
        $this->database->disconnect();
    }

    public function getBroodjes(): array {
        $sql = "SELECT * FROM broodjes";
        $result = $this->conn->query($sql);
        $broodjes = [];

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $broodjes[] = $row;
            }
        }

        return $broodjes;
    }

    public function addBestelling(string $klantNaam, int $broodjeId): bool {
        $stmt = $this->conn->prepare("INSERT INTO bestellingen (klant_naam, broodjeId, datum) VALUES (?, ?, NOW())");
        if ($stmt === false) {
            error_log("Failed to prepare statement: " . $this->conn->error);
            return false;
        }
    
        $stmt->bind_param("si", $klantNaam, $broodjeId);
        $success = $stmt->execute();
        if (!$success) {
            error_log("Failed to execute statement: " . $stmt->error);
        }
        $stmt->close();
        return $success;
    }

    public function getBestellingen(): array {
        $sql = "
            SELECT bestellingen.id, broodjes.Naam AS broodje_naam, bestellingen.klant_naam, bestellingen.datum
            FROM bestellingen
            JOIN broodjes ON bestellingen.broodjeId = broodjes.id
            ORDER BY bestellingen.id ASC
        ";
        $result = $this->conn->query($sql);
        $bestellingen = [];
    
        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bestellingen[] = $row;
            }
        }
    
        return $bestellingen;
    }
}
?>