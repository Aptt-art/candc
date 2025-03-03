<?php
session_start();
require_once 'models/Database.php';
require_once 'models/VetementModel.php';
require_once 'controllers/VetementsController.php';
require_once 'controllers/PanierController.php';
require_once 'controllers/ShowroomController.php'; // Vérifié et corrigé
require_once 'controllers/EventsController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'home') {
    require 'views/index.php';
} elseif ($page === 'collection') {
    $controller = new VetementsController();
    $controller->index();
} elseif ($page === 'panier') {
    $controller = new PanierController();
    $controller->index();
} elseif ($page === 'showroom') {
    $controller = new ShowroomController();
    $controller->index();
} elseif ($page === 'events') {
    $controller = new EventsController();
    $controller->index();
} elseif ($page === 'admin') {
    $controller = new VetementsController();
    $controller->admin();
} elseif ($page === 'admin_vetements') {
    $controller = new VetementsController();
    $controller->admin();
} elseif ($page === 'admin_accessoires') {
    $controller = new VetementsController();
    $controller->adminAccessoires();
} elseif ($page === 'admin_enfants') {
    $controller = new VetementsController();
    $controller->adminEnfants();
} elseif ($page === 'admin_commandes') {
    $controller = new VetementsController();
    $controller->commandes();
} else {
    echo "Page non trouvée";
    exit;
}