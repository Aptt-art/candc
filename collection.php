<?php include './includes/header.php'; ?><br>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-center my-6">NOTRE COLLECTION</h1>

    <!-- Onglets des catégories -->
    <div class="flex justify-center space-x-6 border-b-2 border-gray-300 pb-3 mb-6">
        <button class="filter-btn text-gray-700 font-semibold py-2 px-4 border-b-4 border-transparent hover:border-black focus:border-black active" data-category="all">Tous</button>
        <button class="filter-btn text-gray-700 font-semibold py-2 px-4 border-b-4 border-transparent hover:border-black focus:border-black" data-category="robes">Robes</button>
        <button class="filter-btn text-gray-700 font-semibold py-2 px-4 border-b-4 border-transparent hover:border-black focus:border-black" data-category="costumes">Costumes</button>
        <button class="filter-btn text-gray-700 font-semibold py-2 px-4 border-b-4 border-transparent hover:border-black focus:border-black" data-category="accessoires">Accessoires</button>
    </div>

    <!-- Liste des articles -->
    <div id="productsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
        <!-- Articles -->
        <?php
        $products = [
            ["category" => "robes", "image" => "robes/robe_noire.jpg", "name" => "Robe Élégance Noire", "price" => "200€/jour", "type" => "louer"],
            ["category" => "robes", "image" => "robes/robe_bleue.jpg", "name" => "Robe Cocktail Bleue", "price" => "180€/jour", "type" => "louer"],
            ["category" => "costumes", "image" => "costumes/costume_homme.jpg", "name" => "Costume Classique", "price" => "150€/jour", "type" => "louer"],
            ["category" => "costumes", "image" => "costumes/smoking.jpg", "name" => "Smoking Élégant", "price" => "220€", "type" => "acheter"],
            ["category" => "accessoires", "image" => "accessoires/noeud_pap.jpg", "name" => "Noeud Papillon", "price" => "30€", "type" => "acheter"],
            ["category" => "accessoires", "image" => "accessoires/chaussures.jpg", "name" => "Chaussures Élégantes", "price" => "50€", "type" => "acheter"]
        ];

        foreach ($products as $product) {
            $buttonClass = ($product["type"] === "louer") ? "silver-btn" : "golden-btn";
            $buttonText = ucfirst($product["type"]);
            echo "
            <div class='product bg-white shadow-lg rounded-lg overflow-hidden w-80 mx-auto flex flex-col' data-category='{$product['category']}'>
                <img src='./assets/images/{$product['image']}' alt='{$product['name']}' class='w-full h-80 object-cover rounded-lg'>
                <div class='p-4 flex flex-col flex-grow justify-between'>
                    <h2 class='text-lg font-semibold text-center'>{$product['name']}</h2>
                    <p class='text-gray-600 text-center'>{$product['price']}</p>
                    <button class='{$buttonClass} relative w-full py-2 px-4 uppercase font-bold text-white overflow-hidden transition-all duration-300'>
                        <span class='button-text relative z-10'>{$buttonText}</span>
                        <div class='hover-effect absolute inset-0'></div>
                    </button>
                </div>
            </div>";
        }
        ?>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const products = document.querySelectorAll(".product");

    filterButtons.forEach(button => {
        button.addEventListener("click", function () {
            const category = this.getAttribute("data-category");

            // Changer l'état actif du filtre
            filterButtons.forEach(btn => btn.classList.remove("border-black"));
            this.classList.add("border-black");

            // Filtrer les produits
            products.forEach(product => {
                if (category === "all" || product.getAttribute("data-category") === category) {
                    product.classList.remove("hidden");
                } else {
                    product.classList.add("hidden");
                }
            });
        });
    });

    const goldButtons = document.querySelectorAll(".golden-btn");
    const silverButtons = document.querySelectorAll(".silver-btn");

    function addButtonEffects(buttons, color) {
        buttons.forEach(button => {
            button.classList.add("relative", "rounded", "transition-all", "duration-300", "bg-black");
            button.style.position = "relative";
            button.style.overflow = "hidden";

            const hoverEffect = button.querySelector(".hover-effect");
            hoverEffect.style.background = color;
            hoverEffect.style.clipPath = "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)";
            hoverEffect.style.transition = "clip-path 0.3s ease-in-out";

            button.addEventListener("mouseenter", function () {
                hoverEffect.style.clipPath = "polygon(0 0, 100% 0, 100% 100%, 0 100%)";
            });

            button.addEventListener("mouseleave", function () {
                hoverEffect.style.clipPath = "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)";
            });

            // Effet explosion au clic
            button.addEventListener("click", function () {
                for (let i = 0; i < 10; i++) {
                    const spark = document.createElement("div");
                    spark.classList.add("spark");
                    this.appendChild(spark);
                    const angle = Math.random() * 2 * Math.PI;
                    const distance = Math.random() * 20 + 10;
                    spark.style.left = `50%`;
                    spark.style.top = `50%`;
                    spark.style.transform = `translate(-50%, -50%) translate(${distance * Math.cos(angle)}px, ${distance * Math.sin(angle)}px)`;
                    setTimeout(() => spark.remove(), 600);
                }
            });
        });
    }

    addButtonEffects(goldButtons, "gold");
    addButtonEffects(silverButtons, "silver");
});

// Style pour les étincelles sur le bouton lui-même
const style = document.createElement("style");
style.innerHTML = `
    .spark {
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        opacity: 1;
        background: inherit;
        animation: explode 0.6s ease-out forwards;
    }
    .golden-btn .spark { background: gold; }
    .silver-btn .spark { background: silver; }

    @keyframes explode {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.5) translate(calc(-30px + 60px * var(--x)), calc(-30px + 60px * var(--y))); opacity: 0; }
    }
`;
document.head.appendChild(style);
</script>

<?php include './includes/footer.php'; ?>
