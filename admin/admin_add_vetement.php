<?php
include '../db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix_vente = $_POST['prix_vente'] ?: NULL;
    $prix_location = $_POST['prix_location'] ?: NULL;
    $taille = $_POST['taille'];
    $categorie = $_POST['categorie'];
    $stock = $_POST['stock'];

    // Gestion de l’upload d’image
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "assets/images/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $image_name; // Ajoute un timestamp pour éviter les doublons
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
    } else {
        $image = NULL;
    }

    $sql = "INSERT INTO vetements (nom, description, prix_vente, prix_location, taille, categorie, stock, image) 
            VALUES (:nom, :description, :prix_vente, :prix_location, :taille, :categorie, :stock, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':description' => $description,
        ':prix_vente' => $prix_vente,
        ':prix_location' => $prix_location,
        ':taille' => $taille,
        ':categorie' => $categorie,
        ':stock' => $stock,
        ':image' => $image
    ]);
    echo "<p class='text-green-500 text-center'>Vêtement ajouté !</p>";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un vêtement - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">Ajouter un vêtement</h2>
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="text" name="nom" placeholder="Nom" required class="w-full p-2 border rounded">
            <textarea name="description" placeholder="Description" class="w-full p-2 border rounded"></textarea>
            <input type="number" name="prix_vente" placeholder="Prix vente (€)" step="0.01" class="w-full p-2 border rounded">
            <input type="number" name="prix_location" placeholder="Prix location (€/jour)" step="0.01" class="w-full p-2 border rounded">
            <input type="text" name="taille" placeholder="Taille (ex. M)" required class="w-full p-2 border rounded">
            <input type="text" name="categorie" placeholder="Catégorie (ex. Robes)" required class="w-full p-2 border rounded">
            <input type="number" name="stock" placeholder="Stock" required class="w-full p-2 border rounded">
            <input type="file" name="image" accept="image/*" class="w-full p-2 border rounded">
            <button type="submit" class="w-full bg-black text-white py-2<|control644|> rounded hover:bg-gray-800">Ajouter</button>
        </form>
    </div>
</body>
</html>