<?php
require_once 'Database.php';

class VetementModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection(); // Correct
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM vetements");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllByCategory($category) {
        $stmt = $this->db->prepare("SELECT * FROM vetements WHERE categorie = :categorie");
        $stmt->execute([':categorie' => $category]);
        return $stmt->fetchAll();
    }

    public function add($data) {
        $sql = "INSERT INTO vetements (nom, description, prix_vente, prix_location, taille, categorie, stock, image) 
                VALUES (:nom, :description, :prix_vente, :prix_location, :taille, :categorie, :stock, :image)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM vetements WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getCommandes() {
        $stmt = $this->db->prepare("SELECT c.*, v.nom AS vetement_nom FROM commandes c JOIN vetements v ON c.vetement_id = v.id ORDER BY c.date_commande DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateCommandeStatut($id, $statut) {
        $stmt = $this->db->prepare("UPDATE commandes SET statut = :statut WHERE id = :id");
        return $stmt->execute([':statut' => $statut, ':id' => $id]);
    }
}