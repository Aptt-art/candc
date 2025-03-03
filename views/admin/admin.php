<?php
include '../db_connect.php'; // Remonte au dossier racine
session_start(); // Pour une sécurité future (login)

// Simulation d’un login basique (à améliorer plus tard)
if (!isset($_SESSION['admin_logged_in'])) {
    $_SESSION['admin_logged_in'] = true; // Pour tester, à remplacer par un vrai login
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Chic & Chill</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center p-6 font-['Inter']">
    <header class="w-full max-w-4xl mb-8">
        <h1 class="text-4xl font-bold text-center text-gray-800">Bienvenue, Administrateur</h1>
        <p class="text-center text-gray-600 mt-2">Gérez facilement votre boutique Chic & Chill</p>
    </header>

    <main class="w-full max-w-4xl grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Gestion des vêtements -->
        <a href="admin_vetements.php" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col items-center justify-center">
            <img src="../assets/images/robes/robe_bleue.jpg" alt="Vêtements" class="w-24 h-24 object-cover rounded-full mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Vêtements</h2>
            <p class="text-gray-600 text-center">Robes, costumes, etc.</p>
        </a>

        <!-- Gestion des accessoires -->
        <a href="admin_accessoires.php" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col items-center justify-center">
            <img src="../assets/images/accessoires/noeud_pap.jpg" alt="Accessoires" class="w-24 h-24 object-cover rounded-full mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Accessoires</h2>
            <p class="text-gray-600 text-center">Sacs, bijoux, etc.</p>
        </a>

        <!-- Gestion des vêtements enfants -->
        <a href="admin_enfants.php" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col items-center justify-center">
            <img src="../assets/images/enfants/robe_enfant.jpg" alt="Enfants" class="w-24 h-24 object-cover rounded-full mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Vêtements Enfants</h2>
            <p class="text-gray-600 text-center">Tenues pour petits</p>
        </a>

        <!-- Gestion des événements -->
        <a href="admin_evenements.php" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col items-center justify-center">
            <img src="../assets/images/event_1.jpg" alt="Événements" class="w-24 h-24 object-cover rounded-full mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Événements</h2>
            <p class="text-gray-600 text-center">Soirées, défilés</p>
        </a>

        <!-- Gestion des photos -->
        <a href="admin_photos.php" class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col items-center justify-center">
            <img src="../assets/images/robes/robe_rouge.jpg" alt="Photos" class="w-24 h-24 object-cover rounded-full mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Photos</h2>
            <p class="text-gray-600 text-center">Galerie d’images</p>
        </a>
    </main>
</body>
</html>