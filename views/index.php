<?php include 'includes/header.php'; ?>

<main class="min-h-screen w-full">
    <section class="relative h-screen w-full overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('assets/images/bg_index.jpg');">
            <div class="absolute inset-0 bg-black/30"></div>
        </div>

        <div class="relative h-full flex items-center justify-center">
            <div class="relative w-full max-w-5xl aspect-[16/9] text-center">
                <h1 class="text-white text-5xl md:text-7xl font-light tracking-[0.3em] mb-6 animate-fade-in">
                    CHIC & CHILL
                </h1>
                <p class="text-white text-lg md:text-xl font-light mb-8">La mode durable accessible à tous</p>
                <div class="flex justify-center space-x-6">
                    <a href="index.php?page=collection" class="bg-white/20 text-white py-3 px-6 rounded-lg hover:bg-white/30 transition-colors">Découvrir</a>
                    <a href="index.php?page=showroom" class="bg-white/20 text-white py-3 px-6 rounded-lg hover:bg-white/30 transition-colors">Réserver</a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in { animation: fade-in 1s ease-out forwards; }
</style>

<?php include 'includes/footer.php'; ?>