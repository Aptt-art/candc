<?php include 'includes/header.php'; ?>

<main class="container mx-auto px-4 py-10 min-h-screen">
    <h1 class="text-4xl font-bold text-center my-8 tracking-wide text-gray-800">VOTRE PANIER</h1>

    <div id="cartContainer" class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto">
        <div id="cartItems" class="space-y-6"></div>
        <div class="flex justify-between items-center mt-8">
            <p id="cartTotal" class="text-xl font-semibold text-gray-800">Total : 0€</p>
            <div class="space-x-4">
                <button id="clearCart" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition-colors">Vider le panier</button>
                <form method="POST" action="index.php?page=panier">
                    <input type="hidden" name="cart" id="cartInput">
                    <button type="submit" name="checkout" id="checkoutBtn" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 transition-colors">Payer avec Stripe</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartItemsDiv = document.getElementById("cartItems");
    const cartTotalDiv = document.getElementById("cartTotal");
    const clearCartBtn = document.getElementById("clearCart");
    const cartInput = document.getElementById("cartInput");

    function updateCart() {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        cartItemsDiv.innerHTML = "";
        let total = 0;

        if (cart.length === 0) {
            cartItemsDiv.innerHTML = '<p class="text-gray-500 text-center">Votre panier est vide.</p>';
        } else {
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                const itemDiv = document.createElement("div");
                itemDiv.classList.add("flex", "justify-between", "items-center", "p-4", "border-b", "bg-gray-50", "rounded-lg");
                itemDiv.innerHTML = `
                    <div class="flex items-center space-x-4">
                        <span class="text-lg font-semibold text-gray-800">${item.name}</span>
                        <span class="text-gray-600">(${item.type})</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="decrease-qty text-gray-600 hover:text-gray-800" data-id="${item.id}">-</button>
                        <span class="text-gray-800">${item.quantity}</span>
                        <button class="increase-qty text-gray-600 hover:text-gray-800" data-id="${item.id}">+</button>
                        <span class="text-gray-800">${itemTotal.toFixed(2)}€</span>
                        <button class="remove-item text-red-500 hover:text-red-700" data-id="${item.id}">✕</button>
                    </div>
                `;
                cartItemsDiv.appendChild(itemDiv);
            });
        }
        cartTotalDiv.textContent = `Total : ${total.toFixed(2)}€`;
        cartInput.value = JSON.stringify(cart); // Mettre à jour le champ caché avec le panier
    }

    updateCart();

    cartItemsDiv.addEventListener("click", function (e) {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        if (e.target.classList.contains("remove-item")) {
            const id = e.target.getAttribute("data-id");
            const newCart = cart.filter(item => item.id !== id);
            localStorage.setItem("cart", JSON.stringify(newCart));
            updateCart();
        } else if (e.target.classList.contains("increase-qty")) {
            const id = e.target.getAttribute("data-id");
            const item = cart.find(item => item.id === id);
            item.quantity += 1;
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCart();
        } else if (e.target.classList.contains("decrease-qty")) {
            const id = e.target.getAttribute("data-id");
            const item = cart.find(item => item.id === id);
            if (item.quantity > 1) item.quantity -= 1;
            else cart.splice(cart.indexOf(item), 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCart();
        }
    });

    clearCartBtn.addEventListener("click", function () {
        if (confirm("Vider le panier ?")) {
            localStorage.removeItem("cart");
            updateCart();
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>