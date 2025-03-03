<?php
require_once 'models/VetementModel.php';
require_once 'vendor/autoload.php'; // Assure-toi que Stripe est installé avec Composer

use Stripe\Stripe;
use Stripe\Checkout\Session;

// Initialisation de Stripe avec la clé secrète (test mode)
Stripe::setApiKey('sk_test_51QyMviQPek35pYdZS7CWsS50si1jvR4RZEjnTk9tm0xZa3vik8FltobsPGbqJAVyNVXFyeX7bXQbWV30MSD9uevZ00B1Nybznl'); // Remplace par ta clé secrète Stripe (test mode)

class PanierController {
    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
            $cart = json_decode($_POST['cart'], true);
            if (empty($cart)) {
                echo "Erreur : Panier vide.";
                exit;
            }

            $line_items = [];
            foreach ($cart as $item) {
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => ['name' => $item['name']],
                        'unit_amount' => $item['price'] * 100, // En centimes
                    ],
                    'quantity' => $item['quantity'],
                ];
            }

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => 'http://localhost/projets/chicandchillperso/index.php?page=panier&success=1',
                'cancel_url' => 'http://localhost/projets/chicandchillperso/index.php?page=panier',
            ]);

            header("Location: " . $session->url);
            exit;
        }
        // Charger la vue si aucune action POST
        if (file_exists('views/panier.php')) {
            require 'views/panier.php';
        } else {
            echo "Erreur : Le fichier views/panier.php n'existe pas. Vérifie qu'il est dans le dossier views/.";
        }
    }
}