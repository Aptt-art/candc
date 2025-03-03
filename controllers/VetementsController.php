<?php
require_once 'models/VetementModel.php';

class VetementsController {
    private $vetement;

    public function __construct() {
        $this->vetement = new VetementModel();
    }

    public function index() {
        $vetements = $this->vetement->getAll();
        require 'views/collection.php';
    }

    public function admin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
            $data = [
                ':nom' => $_POST['nom'],
                ':description' => $_POST['description'],
                ':prix_vente' => $_POST['prix_vente'] ?: NULL,
                ':prix_location' => $_POST['prix_location'] ?: NULL,
                ':taille' => $_POST['taille'],
                ':categorie' => $_POST['categorie'] ?? 'Vêtements',
                ':stock' => $_POST['stock'],
                ':image' => $this->handleImageUpload()
            ];
            $this->vetement->add($data);
        }
        if (isset($_GET['delete'])) {
            $this->vetement->delete($_GET['delete']);
        }
        $vetements = $this->vetement->getAll();
        require 'views/admin/vetements.php';
    }

    public function adminAccessoires() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
            $data = [
                ':nom' => $_POST['nom'],
                ':description' => $_POST['description'],
                ':prix_vente' => $_POST['prix_vente'] ?: NULL,
                ':prix_location' => $_POST['prix_location'] ?: NULL,
                ':taille' => $_POST['taille'],
                ':categorie' => 'Accessoires',
                ':stock' => $_POST['stock'],
                ':image' => $this->handleImageUpload()
            ];
            $this->vetement->add($data);
        }
        if (isset($_GET['delete'])) {
            $this->vetement->delete($_GET['delete']);
        }
        $vetements = $this->vetement->getAllByCategory('Accessoires');
        require 'views/admin/vetements.php';
    }

    public function adminEnfants() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
            $data = [
                ':nom' => $_POST['nom'],
                ':description' => $_POST['description'],
                ':prix_vente' => $_POST['prix_vente'] ?: NULL,
                ':prix_location' => $_POST['prix_location'] ?: NULL,
                ':taille' => $_POST['taille'],
                ':categorie' => 'Enfants',
                ':stock' => $_POST['stock'],
                ':image' => $this->handleImageUpload()
            ];
            $this->vetement->add($data);
        }
        if (isset($_GET['delete'])) {
            $this->vetement->delete($_GET['delete']);
        }
        $vetements = $this->vetement->getAllByCategory('Enfants');
        require 'views/admin/vetements.php';
    }

    public function commandes() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commande_id'])) {
            $this->vetement->updateCommandeStatut($_POST['commande_id'], $_POST['statut']);
        }
        $commandes = $this->vetement->getCommandes();
        require 'views/admin/commandes.php';
    }

    private function handleImageUpload() {
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "../assets/images/";
            $image_name = time() . "_" . basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                return "assets/images/" . $image_name;
            }
        }
        return NULL;
    }
}