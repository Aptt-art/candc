<?php include './includes/header.php'; ?><br><br>

<main class="relative min-h-screen flex flex-col items-center justify-start py-8">
    <!-- Images de fond animées avec flou progressif -->
    <div class="absolute inset-0 flex justify-between px-10 overflow-hidden">
        <div class="relative flex flex-col gap-6 animate-scroll-down">
            <img src="./assets/images/robes/robe_bleue.jpg" alt="Robe Bleue" class="w-40 h-72 object-cover rounded-lg shadow-lg blur-effect">
            <img src="./assets/images/costumes/costume_homme.jpg" alt="Costume Homme" class="w-40 h-72 object-cover rounded-lg shadow-lg blur-effect">
            <img src="./assets/images/accessoires/noeud_pap.jpg" alt="Noeud Papillon" class="w-40 h-72 object-cover rounded-lg shadow-lg blur-effect">
        </div>
        <div class="relative flex flex-col gap-6 animate-scroll-up">
            <img src="./assets/images/robes/robe_rouge.jpg" alt="Robe Rouge" class="w-40 h-72 object-cover rounded-lg shadow-lg blur-effect">
            <img src="./assets/images/costumes/smoking.jpg" alt="Smoking Élégant" class="w-40 h-72 object-cover rounded-lg shadow-lg blur-effect">
            <img src="./assets/images/accessoires/chaussures.jpg" alt="Chaussures Élégantes" class="w-40 h-72 object-cover rounded-lg shadow-lg blur-effect">
        </div>
    </div>

    <!-- Informations Showroom -->
    <h1 class="text-4xl font-bold text-center mt-1 relative z-10">BOUTIQUE & SHOWROOM</h1>

    <!-- Bannière Showroom avec vidéo bien visible -->
    <div class="relative w-full h-[420px] md:h-[480px] flex justify-center items-center z-10">
        <!-- Miroir central avec vidéo -->
        <div class="absolute inset-x-1/4 top-1/4 w-1/2 h-3/4 shadow-xl border-4 border-gray-300 rounded-lg flex justify-center items-center overflow-hidden">
            <video autoplay loop muted class="w-full h-full object-cover rounded-lg">
                <source src="./assets/videos/presentation_candc.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la lecture des vidéos.
            </video>
        </div>
    </div>

    <!-- ESPACEMENT AJOUTÉ ICI -->
    <div class="mt-16"></div>

    <div class="grid grid-cols-1 md:grid-cols-3 text-center gap-8 relative z-10">
        <!-- Localisation -->
        <div>
            <span class="text-3xl">📍</span>
            <h2 class="text-xl font-semibold mt-2">Localisation</h2>
            <p class="text-gray-600">10 rue Irénée Carré, 08000 Charleville-Mézières</p>
        </div>

        <!-- Horaires -->
        <div>
            <span class="text-3xl">⏰</span>
            <h2 class="text-xl font-semibold mt-2">Horaires</h2>
            <p class="text-gray-600">Du Mardi au Samedi<br>9h - 19h</p>
        </div>

        <!-- Réservation -->
        <div>
            <span class="text-3xl">📅</span>
            <h2 class="text-xl font-semibold mt-2">Sur Rendez-vous</h2>
            <a href="reservation.php" class="inline-block mt-2 px-4 py-2 bg-black text-white rounded hover:bg-gray-800">
                Réserver un essayage
            </a>
        </div>
    </div>
</main>

<style>
/* Ombres et bordures pour l’effet showroom */
.shadow-2xl {
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

/* Animation de défilement vertical des articles sur toute la hauteur */
@keyframes scrollDown {
    0% { transform: translateY(-120vh) scale(0.9); filter: blur(5px); opacity: 0; }
    50% { transform: translateY(0) scale(1); filter: blur(0px); opacity: 1; }
    100% { transform: translateY(120vh) scale(0.9); filter: blur(5px); opacity: 0; }
}

@keyframes scrollUp {
    0% { transform: translateY(120vh) scale(0.9); filter: blur(5px); opacity: 0; }
    50% { transform: translateY(0) scale(1); filter: blur(0px); opacity: 1; }
    100% { transform: translateY(-120vh) scale(0.9); filter: blur(5px); opacity: 0; }
}

.animate-scroll-down {
    animation: scrollDown 15s infinite linear;
}

.animate-scroll-up {
    animation: scrollUp 15s infinite linear;
}

/* Effet de flou progressif */
.blur-effect {
    transition: filter 0.5s ease-in-out, transform 0.5s ease-in-out;
}
</style>

<?php include './includes/footer.php'; ?>
