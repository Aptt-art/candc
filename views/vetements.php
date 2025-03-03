<?php include '../includes/header.php'; ?>

<main class="container mx-auto px-4 py-10 min-h-screen">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">GESTION DES <?php echo strtoupper($category ?? 'VÊTEMENTS'); ?></h1>
    <a href="index.php?page=admin" class="inline-block mb-6 text-blue-500 hover:text-blue-700">← Retour</a>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6">Ajouter un article</h2>
            <form method="POST" enctype="multipart/form-data" class="space-y-4">
                <input type="text" name="nom" placeholder="Nom" required class="w-full p-3 border rounded-lg">
                <textarea name="description" placeholder="Description" class="w-full p-3 border rounded-lg"></textarea>
                <input type="number" name="prix_vente" placeholder="Prix vente (€)" step="0.01" class="w-full p-3 border rounded-lg">
                <input type="number" name="prix_location" placeholder="Prix location (€/jour)" step="0.01" class="w-full p-3 border rounded-lg">
                <input type="text" name="taille" placeholder="Taille (ex. M)" class="w-full p-3 border rounded-lg">
                <input type="number" name="stock" placeholder="Stock" required class="w-full p-3 border rounded-lg">
                <input type="file" name="image" accept="image/*" class="w-full p-3 border rounded-lg">
                <button type="submit" name="add" class="w-full bg-gray-800 text-white py-3 rounded-lg hover:bg-gray-900">Ajouter</button>
            </form>
        </div>

        <div class="bg-white p-8 rounded-lg shadow-lg overflow-auto max-h-[600px]">
            <?php if ($vetements): ?>
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100"><tr><th class="p-3">Nom</th><th class="p-3">Prix</th><th class="p-3">Image</th><th class="p-3">Actions</th></tr></thead>
                    <tbody>
                        <?php foreach ($vetements as $vetement): ?>
                            <tr class='border-t'>
                                <td class='p-3'><?php echo $vetement['nom']; ?></td>
                                <td class='p-3'><?php echo $vetement['prix_location'] ? $vetement['prix_location'] . "€/jour" : $vetement['prix_vente'] . "€"; ?></td>
                                <td class='p-3'><img src='../<?php echo $vetement['image']; ?>' class='w-12 h-12 object-cover rounded'></td>
                                <td class='p-3'><a href='?delete=<?php echo $vetement['id']; ?>' class='text-red-500 hover:text-red-700' onclick='return confirm("Supprimer ?")'>✕</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-gray-500 text-center">Aucun article pour l’instant.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>