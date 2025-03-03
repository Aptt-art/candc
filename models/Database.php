<?php
class Database {
    private $host = "localhost";
    private $user = "postgres"; // Remplace par ton utilisateur PostgreSQL
    private $pass = "postgres"; // Remplace par ton mot de passe
    private $dbname = "chicandchill";
    private $port = "5432";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données : " . $e->getMessage());
            echo "Erreur de connexion à la base de données. Vérifiez vos identifiants ou contactez l'administrateur.";
            exit;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}