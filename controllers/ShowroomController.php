<?php
require_once 'models/VetementModel.php'; // Si besoin de données liées
require_once 'models/Database.php'; // Pour la connexion BDD, si nécessaire

class ShowroomController {
    public function index() {
        // Vérifier si le fichier existe avant de le charger
        if (file_exists('views/showroom.php')) {
            require 'views/showroom.php';
        } else {
            echo "Erreur : Le fichier views/showroom.php n'existe pas. Vérifie qu'il est dans le dossier views/.";
        }
    }
}