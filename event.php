<?php include './includes/header.php'; ?><br><br>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-center my-6">NOS ÉVÉNEMENTS</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
        <!-- Événement 1 -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-sm mx-auto">
            <img src="./assets/images/event_1.jpg" alt="Soirée Privée Collection Automne" class="w-full h-64 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Soirée Privée Collection Automne</h2>
                <p class="text-gray-500 text-sm">15 Octobre 2024</p>
                <p class="text-gray-600">Découvrez en avant-première notre nouvelle collection.</p>
            </div>
        </div>

        <!-- Événement 2 -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-sm mx-auto">
            <img src="./assets/images/event_2.jpg" alt="Défilé Haute Couture 2025" class="w-full h-64 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Défilé Haute Couture 2025</h2>
                <p class="text-gray-500 text-sm">12 Février 2025</p>
                <p class="text-gray-600">Un événement exclusif pour découvrir les tendances de demain.</p>
            </div>
        </div>

        <!-- Événement 3 -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden max-w-sm mx-auto">
            <img src="./assets/images/event_3.jpg" alt="Atelier Mode & Personnalisation" class="w-full h-64 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold">Atelier Mode & Personnalisation</h2>
                <p class="text-gray-500 text-sm">28 Mars 2025</p>
                <p class="text-gray-600">Apprenez à créer votre propre style avec nos designers.</p>
            </div>
        </div>
    </div>
</main>

<?php include './includes/footer.php'; ?>
