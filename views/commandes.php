<?php include '../includes/header.php'; ?>

<main class="container mx-auto px-4 py-10 min-h-screen">
    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">GESTION DES COMMANDES</h1>
    <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
        <div class="overflow-x-auto">
            <?php
            $model = new VetementModel();
            $commandes = $model->getCommandes();

            if ($commandes) {
                echo '<table class="w-full text-left border-collapse">';
                echo '<thead class="bg-gray-100"><tr><th class="p-3">ID</th><th class="p-3">Article</th><th class="p-3">Client</th><th class="p-3">Quantité</th><th class="p-3">Montant</th><th class="p-3">Statut</th><th class="p-3">Date</th><th class="p-3">Actions</th></tr></thead>';
                echo '<tbody>';
                foreach ($commandes as $commande) {
                    echo "<tr class='border-t'><td class='p-3'>{$commande['id']}</td>";
                    echo "<td class='p-3'>{$commande['vetement_nom']}</td>";
                    echo "<td class='p-3'>{$commande['client_nom']}</td>";
                    echo "<td class='p-3'>{$commande['quantite']}</td>";
                    echo "<td class='p-3'>{$commande['montant']}€</td>";
                    echo "<td class='p-3'>";
                    echo "<select class='border rounded p-2' onchange='updateStatut({$commande['id']}, this.value)'>";
                    $statuts = ['en_attente', 'paye', 'livre'];
                    foreach ($statuts as $statut) {
                        $selected = $commande['statut'] === $statut ? 'selected' : '';
                        echo "<option value='$statut' $selected>$statut</option>";
                    }
                    echo "</select></td>";
                    echo "<td class='p-3'>" . date('d/m/Y H:i', strtotime($commande['date_commande'])) . "</td>";
                    echo "<td class='p-3'><a href='?delete_commande={$commande['id']}' class='text-red-500 hover:text-red-700' onclick='return confirm(\"Supprimer ?\")'>Supprimer</a></td></tr>";
                }
                echo '</tbody></table>';
            } else {
                echo '<p class="text-gray-500 text-center">Aucune commande pour l’instant.</p>';
            }
            ?>
        </div>
    </div>
</main>

<script>
function updateStatut(id, statut) {
    fetch('index.php?page=admin_commandes', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'commande_id=' + id + '&statut=' + statut
    }).then(response => {
        if (response.ok) alert('Statut mis à jour !');
    }).catch(error => console.error('Erreur:', error));
}
</script>

<?php include '../includes/footer.php'; ?>