<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chic & Chill</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-md">
        <div class="mx-auto max-w-7xl px-4 py-4 flex items-center justify-between">
            <a href="index.php?page=home" class="flex items-center space-x-2">
                <img src="assets/images/logoc&csansfond.png" alt="Chic & Chill Logo" class="h-16 w-auto object-contain">
            </a>
            <div class="md:hidden">
                <button id="menuButton" class="p-2 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div id="navLinks" class="hidden md:flex md:space-x-10 font-['Inter'] text-sm uppercase tracking-wider">
                <a href="index.php?page=collection" class="text-gray-800 hover:text-gray-600 transition-colors">Collection</a>
                <a href="index.php?page=showroom" class="text-gray-800 hover:text-gray-600 transition-colors">Showroom & Réservation</a>
                <a href="index.php?page=events" class="text-gray-800 hover:text-gray-600 transition-colors">Événements</a>
                <a href="index.php?page=panier" class="text-gray-800 hover:text-gray-600 transition-colors relative">
                    Panier
                    <span id="cartCount" class="absolute -top-2 -right-4 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Section d'accueil avec carousel -->
    <main class="relative mt-20 p-10 h-[160px] flex flex-col items-center justify-center overflow-hidden">
        <!-- Texte principal -->
        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-bold text-gray-800/80 drop-shadow-lg">Bienvenue sur Chic & Chill</h1>
            <p class="mt-4 text-lg text-gray-600/80 drop-shadow-md">Découvrez notre nouvelle collection de vêtements tendance.</p>
        </div>

        <!-- Carousel d'images en arrière-plan -->
        <div class="absolute inset-0 z-0 flex space-x-6 animate-scroll">
            <img src="assets/images/vetement1.jpg" class="h-[300px] w-auto rounded-lg shadow-lg opacity-50">
            <img src="assets/images/vetement2.jpg" class="h-[300px] w-auto rounded-lg shadow-lg opacity-50">
            <img src="assets/images/vetement3.jpg" class="h-[300px] w-auto rounded-lg shadow-lg opacity-50">
            <img src="assets/images/vetement4.jpg" class="h-[300px] w-auto rounded-lg shadow-lg opacity-50">
        </div>
    </main>

    
   
    <!-- Animation CSS -->
    <style>
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        .animate-scroll {
            display: flex;
            width: 200%;
            animation: scroll 15s linear infinite;
        }
    </style>

    <!-- Script Menu Responsive -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuButton = document.getElementById("menuButton");
            const mobileMenu = document.getElementById("mobileMenu");

            menuButton.addEventListener("click", function () {
                mobileMenu.classList.toggle("hidden");
            });

            function updateCartCount() {
                const cart = JSON.parse(localStorage.getItem("cart")) || [];
                const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
                document.getElementById("cartCount").textContent = totalItems;
            }
            updateCartCount();
            window.addEventListener("storage", updateCartCount);
        });
    </script>

</body>
</html>
