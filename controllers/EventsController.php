<?php
require_once 'models/VetementModel.php'; // Si besoin de données liées
require_once 'models/Database.php'; // Pour la connexion BDD

class EventsController {
    public function index() {
        $db = (new Database())->getConnection(); // Syntaxe corrigée, parenthèses ajustées
        $sql = "SELECT * FROM evenements ORDER BY date ASC";
        $stmt = $db->prepare($sql); // Point-virgule ajouté
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require 'views/events.php';
    }
}