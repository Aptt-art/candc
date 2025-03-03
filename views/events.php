<?php include 'includes/header.php'; ?>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-center my-8 tracking-wide text-gray-800">NOS ÉVÉNEMENTS</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        // Les données $events sont passées par EventsController.php
        if (!empty($events)) {
            foreach ($events as $event) {
                echo "
                <div class='bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300'>
                    <img src='./{$event['image']}' alt='{$event['titre']}' class='w-full h-64 object-cover rounded-t-lg'>
                    <div class='p-6'>
                        <h2 class='text-xl font-semibold text-gray-800 mb-2'>{$event['titre']}</h2>
                        <p class='text-gray-500 text-sm mb-2'>" . date('d/m/Y', strtotime($event['date'])) . "</p>
                        <p class='text-gray-600'>{$event['description']}</p>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='text-gray-500 text-center col-span-full'>Aucun événement pour l’instant.</p>";
        }
        ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>