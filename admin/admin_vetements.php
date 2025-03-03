<?php
include '../db_connect.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) $_SESSION['admin_logged_in'] = true; // Simulation

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix_vente = $_POST['prix_vente'] ?: NULL;
    $prix_location = $_POST['prix_location'] ?: NULL;
    $taille = $_POST['taille'];
    $categorie = $_POST['categorie'];
    $stock = $_POST['stock'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../assets/images/";
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = "assets/images/" . $image_name;
    } else {
        $image = NULL;
    }
    $sql = "INSERT INTO vetements (nom, description, prix_vente, prix_location, taille, categorie, stock, image) 
            VALUES (:nom, :description, :prix_vente, :prix_location, :taille, :categorie, :stock, :image)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':nom' => $nom, ':description' => $description, ':prix_vente' => $prix_vente,
                    ':prix_location' => $prix_location, ':taille' => $taille, ':categorie' => $categorie,
                    ':stock' => $stock, ':image' => $image]);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM vetements WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Vêtements - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen p-8">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold text-center mb-8 tracking-wide text-gray-800">Gestion des Vêtements</h1>
        <a href="admin.php" class="inline-block mb-6 text-blue-500 hover:underline">← Retour</a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-6">Ajouter un vêtement</h2>
                <form method="POST" enctype="multipart/form-data" class="space-y-4">
                    <input type="text" name="nom" placeholder="Nom" required class="w-full p-3 border rounded-lg">
                    <textarea name="description" placeholder="Description" class="w-full p-3 border rounded-lg"></textarea>
                    <input type="number" name="prix_vente" placeholder="Prix vente (€)" step="0.01" class="w-full p-3 border rounded-lg">
                    <input type="number" name="prix_location" placeholder="Prix location (€/jour)" step="0.01" class="w-full p-3 border rounded-lg">
                    <input type="text" name="taille" placeholder="Taille (ex. M)" required class="w-full p-3 border rounded-lg">
                    <input type="text" name="categorie" placeholder="Catégorie (ex. Robes)" required class="w-full p-3 border rounded-lg">
                    <input type="number" name="stock" placeholder="Stock" required class="w-full p-3 border rounded-lg">
                    <input type="file" name="image" accept="image/*" class="w-full p-3 border rounded-lg">
                    <button type="submit" name="add" class="w-full bg-black text-white py-3 rounded-lg hover:bg-gray-800 transition-colors">Ajouter</button>
                </form>
            </div>

            <div class="bg-white p-8 rounded-lg shadow-lg overflow-auto max-h-[600px]">
                <?php
                $sql = "SELECT * FROM vetements WHERE categorie IN ('Robes', 'Costumes')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $vetements = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($vetements) {
                    echo '<table class="w-full text-left border-collapse">';
                    echo '<tr class="bg-gray-100"><th class="p-3">Nom</th><th class="p-3">Prix</th><th class="p-3">Image</th><th class="p-3">Actions</th></tr>';
                    foreach ($vetements as $vetement) {
                        $prix = $vetement['prix_location'] ? $vetement['prix_location'] . "€/jour" : $vetement['prix_vente'] . "€";
                        echo "<tr class='border-t'>";
                        echo "<td class='p-3'>{$vetement['nom']}</td>";
                        echo "<td class='p-3'>{$prix}</td>";
                        echo "<td class='p-3'><img src='../{$vetement['image']}' class='w-12 h-12 object-cover rounded'></td>";
                        echo "<td class='p-3'><a href='?delete={$vetement['id']}' class='text-red-500 hover:text-red-700' onclick='return confirm(\"Supprimer ?\")'>✕</a></td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                } else {
                    echo "<p class='text-gray-500 text-center'>Aucun vêtement.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>