<?php include 'includes/header.php'; ?>

<main class="min-h-screen w-full">
    <section class="relative h-screen w-full overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('assets/images/bg_index.jpg');">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="relative h-full flex items-center justify-center">
            <div class="relative w-full max-w-5xl aspect-[16/9]">
                <a class="text-blue-500 hover:underline" href="events.php" class="absolute top-[10%] left-[15%] w-32 h-32 rounded-full border-2 border-white/50 flex items-center justify-center text-white hover:bg-white/10 transition-all cursor-pointer font-light tracking-wider">
                    EVENT
                </a>

                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center">
                    <h1 class="text-white text-4xl md:text-6xl font-light tracking-[0.2em] mb-4">
                      <br><br>CHIC<br>AND<br>CHILL<br><br>
                        
                    </h1>
                </div>

                <a class="text-blue-500 hover:underline" href="contact.php" class="absolute top-[10%] right-[15%] w-32 h-32 rounded-full border-2 border-white/50 flex items-center justify-center text-white hover:bg-white/10 transition-all cursor-pointer font-light tracking-wider">
                    LOCATION
                </a>

                <a class="text-blue-500 hover:underline" href="collection.php" class="absolute bottom-[15%] left-1/2 -translate-x-1/2 w-32 h-32 rounded-full border-2 border-white/50 flex items-center justify-center text-white hover:bg-white/10 transition-all cursor-pointer font-light tracking-wider">
                    MAGASIN
                </a>
            </div>
        </div>
    </section>
</main>

<?php include './includes/footer.php'; ?>