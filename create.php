<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $taille = $_POST['taille'];
    $categorie = $_POST['categorie'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO vetements (nom, description, prix, taille, categorie, stock) 
            VALUES (:nom, :description, :prix, :taille, :categorie, :stock)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':description' => $description,
        ':prix' => $prix,
        ':taille' => $taille,
        ':categorie' => $categorie,
        ':stock' => $stock
    ]);
    echo "Vêtement ajouté avec succès !";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un vêtement</title>
</head>
<body>
    <h2>Ajouter un vêtement</h2>
    <form method="POST">
        <input type="text" name="nom" placeholder="Nom du vêtement" required><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="number" name="prix" placeholder="Prix" step="0.01" required><br>
        <input type="text" name="taille" placeholder="Taille (ex. M)" required><br>
        <input type="text" name="categorie" placeholder="Catégorie (ex. Haut)" required><br>
        <input type="number" name="stock" placeholder="Stock" required><br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>