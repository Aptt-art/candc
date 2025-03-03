<?php include 'includes/header.php'; ?>

<main class="relative min-h-screen flex flex-col items-center justify-start py-12">
    <div id="redCarpet" class="fixed inset-0 bg-red-700 z-50 hidden" style="clip-path: inset(100% 0 0 0);">
        <div class="absolute inset-0 bg-gradient-to-b from-red-700 to-red-900 animate-pulse"></div>
    </div>

    <div class="relative z-10 w-full max-w-6xl mx-auto pt-20">
        <h1 class="text-4xl font-bold text-center mb-12 tracking-wide text-gray-800">SHOWROOM & RÉSERVATION</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-semibold mb-6">Notre Showroom</h2>
                <video autoplay loop muted class="w-full h-64 object-cover rounded-lg mb-6">
                    <source src="./assets/videos/presentation_candc.mp4" type="video/mp4">
                </video>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                    <div>
                        <span class="text-3xl">📍</span>
                        <h3 class="text-lg font-semibold mt-2">Localisation</h3>
                        <p class="text-gray-600">10 rue Irénée Carré, 08000 Charleville-Mézières</p>
                    </div>
                    <div>
                        <span class="text-3xl">⏰</span>
                        <h3 class="text-lg font-semibold mt-2">Horaires</h3>
                        <p class="text-gray-600">Mardi-Samedi<br>9h-19h</p>
                    </div>
                    <div>
                        <span class="text-3xl">📅</span>
                        <h3 class="text-lg font-semibold mt-2">Rendez-vous</h3>
                        <a href="#reservation" class="inline-block mt-2 px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Réserver</a>
                    </div>
                </div>
            </div>

            <div id="reservation" class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-semibold mb-6">Réservez votre essayage</h2>
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">Choisissez une date</label>
                        <input type="date" id="datePicker" class="w-full border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Créneaux disponibles</label>
                        <div id="timeSlots" class="grid grid-cols-2 gap-4">
                            <p class="text-gray-500">Sélectionnez une date</p>
                        </div>
                        <button id="confirmBtn" class="mt-6 w-full bg-black text-white py-3 rounded hover:bg-gray-800" disabled>Confirmer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.querySelector('a[href="index.php?page=showroom"]').addEventListener('click', function(e) {
    e.preventDefault();
    const redCarpet = document.getElementById('redCarpet');
    redCarpet.classList.remove('hidden');
    redCarpet.animate([
        { clipPath: 'inset(100% 0 0 0)' },
        { clipPath: 'inset(0 0 0 0)' }
    ], { duration: 1000, easing: 'ease-in-out', fill: 'forwards' });
    setTimeout(() => {
        document.body.style.transition = 'transform 0.8s ease-in-out';
        document.body.style.transform = 'scale(1.1) translateY(-20px)';
        setTimeout(() => {
            document.body.style.transform = 'scale(1) translateY(0)';
            redCarpet.classList.add('hidden');
            window.location.href = 'index.php?page=showroom';
        }, 800);
    }, 1000);
});

document.addEventListener("DOMContentLoaded", function () {
    const datePicker = document.getElementById("datePicker");
    const timeSlots = document.getElementById("timeSlots");
    const confirmBtn = document.getElementById("confirmBtn");

    function generateTimeSlots() {
        let slots = [];
        for (let hour = 9; hour < 19; hour++) slots.push(`${hour}h00`, `${hour}h30`);
        return slots;
    }

    datePicker.addEventListener("change", function () {
        const selectedDate = new Date(datePicker.value);
        const dayOfWeek = selectedDate.getDay();
        timeSlots.innerHTML = "";
        if (dayOfWeek >= 2 && dayOfWeek <= 6) {
            generateTimeSlots().forEach(time => {
                const btn = document.createElement("button");
                btn.classList.add("px-4", "py-2", "border", "rounded", "hover:bg-gray-100");
                btn.textContent = time;
                btn.addEventListener("click", function () {
                    timeSlots.querySelectorAll("button").forEach(b => b.classList.remove("bg-blue-500", "text-white"));
                    btn.classList.add("bg-blue-500", "text-white");
                    confirmBtn.removeAttribute("disabled");
                });
                timeSlots.appendChild(btn);
            });
        } else {
            timeSlots.innerHTML = '<p class="text-gray-500">Ouvert mardi à samedi</p>';
            confirmBtn.setAttribute("disabled", "true");
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>