<?php include './includes/header.php'; ?><br>

<main class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-center my-6">RÉSERVATION</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
        <!-- Calendrier -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Choisissez votre date</h2>
            <input type="date" id="datePicker" class="w-full border-gray-300 rounded-md p-2">
        </div>

        <!-- Créneaux horaires dynamiques -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Détails de la réservation</h2>
            <p class="text-gray-600 text-sm mb-4">Sélectionnez une date pour voir les créneaux disponibles</p>

            <div id="timeSlots" class="grid grid-cols-2 gap-4">
                <p class="text-gray-500">Aucune date sélectionnée.</p>
            </div>

            <button id="confirmBtn" class="mt-6 w-full bg-black text-white py-3 rounded" disabled>
                Confirmer la réservation
            </button>
        </div>
    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const datePicker = document.getElementById("datePicker");
    const timeSlots = document.getElementById("timeSlots");
    const confirmBtn = document.getElementById("confirmBtn");

    // Fonction pour générer les créneaux horaires
    function generateTimeSlots() {
        let slots = [];
        for (let hour = 9; hour < 19; hour++) {
            slots.push(`${hour}h00`);
            slots.push(`${hour}h30`);
        }
        return slots;
    }

    datePicker.addEventListener("change", function () {
        const selectedDate = new Date(datePicker.value);
        const dayOfWeek = selectedDate.getDay(); // 0 = Dimanche, 1 = Lundi, ..., 6 = Samedi

        timeSlots.innerHTML = "";

        // Vérifier si le jour sélectionné est valide (mardi au samedi)
        if (dayOfWeek >= 2 && dayOfWeek <= 6) {
            let slots = generateTimeSlots();
            slots.forEach(time => {
                const btn = document.createElement("button");
                btn.classList.add("px-4", "py-2", "border", "rounded", "w-full");
                btn.textContent = time;
                btn.addEventListener("click", function () {
                    document.querySelectorAll("#timeSlots button").forEach(b => b.classList.remove("bg-blue-500", "text-white"));
                    btn.classList.add("bg-blue-500", "text-white");
                    confirmBtn.removeAttribute("disabled");
                });
                timeSlots.appendChild(btn);
            });
        } else {
            timeSlots.innerHTML = '<p class="text-gray-500">Aucun créneau disponible (magasin ouvert du mardi au samedi).</p>';
            confirmBtn.setAttribute("disabled", "true");
        }
    });
});
</script>

<?php include './includes/footer.php'; ?>
