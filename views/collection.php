<?php include 'includes/header.php'; ?>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-center my-8 tracking-wide text-gray-800">NOTRE COLLECTION</h1>

    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 border-b-2 border-gray-200 pb-4 mb-8">
        <button class="filter-btn text-gray-700 font-semibold py-2 px-6 rounded-lg hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 w-full sm:w-auto" data-category="all">Tous</button>
        <button class="filter-btn text-gray-700 font-semibold py-2 px-6 rounded-lg hover:bg-gray-100 focus:bg-gray-100 w-full sm:w-auto" data-category="Robes">Robes</button>
        <button class="filter-btn text-gray-700 font-semibold py-2 px-6 rounded-lg hover:bg-gray-100 focus:bg-gray-100 w-full sm:w-auto" data-category="Costumes">Costumes</button>
        <button class="filter-btn text-gray-700 font-semibold py-2 px-6 rounded-lg hover:bg-gray-100 focus:bg-gray-100 w-full sm:w-auto" data-category="Accessoires">Accessoires</button>
    </div>

    <div id="productsContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        <?php foreach ($vetements as $product): ?>
            <?php
            $buttonClass = $product['prix_location'] ? "silver-btn" : "golden-btn";
            $buttonText = $product['prix_location'] ? "Louer" : "Acheter";
            $prix = $product['prix_location'] ? $product['prix_location'] . "€/jour" : ($product['prix_vente'] ? $product['prix_vente'] . "€" : "N/A");
            $priceValue = $product['prix_location'] ?: $product['prix_vente'];
            ?>
            <div class='product bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 w-full max-w-sm mx-auto'>
                <img src='./<?php echo $product['image']; ?>' alt='<?php echo $product['nom']; ?>' class='w-full h-64 sm:h-80 object-cover rounded-t-lg'>
                <div class='p-4 sm:p-6 flex flex-col items-center space-y-3 sm:space-y-4'>
                    <h2 class='text-lg sm:text-xl font-semibold text-gray-800 text-center'><?php echo $product['nom']; ?></h2>
                    <p class='text-gray-600 text-center'><?php echo $prix; ?></p>
                    <button class='<?php echo $buttonClass; ?> add-to-cart w-full py-2 px-3 sm:px-4 uppercase font-bold text-white rounded-lg hover:opacity-90 transition-opacity' 
                            data-id='<?php echo $product['id']; ?>' data-name='<?php echo $product['nom']; ?>' data-price='<?php echo $priceValue; ?>' data-type='<?php echo $buttonText; ?>'>
                        <?php echo $buttonText; ?>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const products = document.querySelectorAll(".product");
    filterButtons.forEach(button => {
        button.addEventListener("click", function () {
            const category = this.getAttribute("data-category");
            filterButtons.forEach(btn => btn.classList.remove("bg-gray-200"));
            this.classList.add("bg-gray-200");
            products.forEach(product => {
                if (category === "all" || product.getAttribute("data-category") === category) {
                    product.classList.remove("hidden");
                } else {
                    product.classList.add("hidden");
                }
            });
        });
    });

    const addToCartButtons = document.querySelectorAll(".add-to-cart");
    addToCartButtons.forEach(button => {
        button.addEventListener("click", function () {
            const id = this.getAttribute("data-id");
            const name = this.getAttribute("data-name");
            const price = parseFloat(this.getAttribute("data-price"));
            const type = this.getAttribute("data-type");

            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            const existingItem = cart.find(item => item.id === id);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id, name, price, type, quantity: 1 });
            }
            localStorage.setItem("cart", JSON.stringify(cart));
            this.classList.add("animate-pulse");
            setTimeout(() => this.classList.remove("animate-pulse"), 500);
            alert(`${name} ajouté au panier !`);
        });
    });
});

const style = document.createElement("style");
style.innerHTML = `
    .silver-btn { background: linear-gradient(to right, #c0c0c0, #a9a9a9); }
    .golden-btn { background: linear-gradient(to right, #ffd700, #daa520); }
`;
document.head.appendChild(style);
</script>

<?php include 'includes/footer.php'; ?>