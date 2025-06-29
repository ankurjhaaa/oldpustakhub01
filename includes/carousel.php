<!-- <div class="relative w-full max-w-8xl mx-auto  overflow-hidden rounded-sm shadow-lg">
    <div class="relative w-full flex transition-transform duration-500 ease-in-out" id="carousel">
        <img src="images/1.webp?random=1" 
             class="w-full h-auto object-cover md:h-[50vh] lg:h-[60vh]" 
             alt="Slide 1"
             loading="lazy">
        <img src="images/2.webp?random=2" 
             class="w-full h-auto object-cover md:h-[50vh] lg:h-[60vh] hidden" 
             alt="Slide 2"
             loading="lazy">
        <img src="images/3.webp?random=3" 
             class="w-full h-auto object-cover md:h-[50vh] lg:h-[60vh] hidden" 
             alt="Slide 3"
             loading="lazy">
    </div>

    <button onclick="prevSlide()" 
            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-70 transition-all duration-300
                   w-10 h-10 md:w-12 md:h-12 flex items-center justify-center">
        <i class="fa-solid fa-chevron-left text-lg md:text-xl"></i>
    </button>

    <button onclick="nextSlide()" 
            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-70 transition-all duration-300
                   w-10 h-10 md:w-12 md:h-12 flex items-center justify-center">
        <i class="fa-solid fa-chevron-right text-lg md:text-xl"></i>
    </button>

    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button onclick="goToSlide(0)" 
                class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300 carousel-indicator"></button>
        <button onclick="goToSlide(1)" 
                class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300 carousel-indicator"></button>
        <button onclick="goToSlide(2)" 
                class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all duration-300 carousel-indicator"></button>
    </div>
</div>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll("#carousel img");
    let autoSlideInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("hidden", i !== index);
        });
        
        document.querySelectorAll('.carousel-indicator').forEach((dot, i) => {
            dot.classList.toggle('bg-opacity-100', i === index);
            dot.classList.toggle('bg-opacity-50', i !== index);
        });
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
        resetAutoSlide();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
        resetAutoSlide();
    }

    function goToSlide(index) {
        currentIndex = index;
        showSlide(currentIndex);
        resetAutoSlide();
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(nextSlide, 5000);
    }

    let touchStartX = 0;
    let touchEndX = 0;
    const carousel = document.getElementById('carousel');

    carousel.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});

    carousel.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, {passive: true});

    function handleSwipe() {
        if (touchEndX < touchStartX - 50) {
            nextSlide(); // Swipe left
        }
        if (touchEndX > touchStartX + 50) {
            prevSlide(); // Swipe right
        }
    }

    showSlide(currentIndex);
    autoSlideInterval = setInterval(nextSlide, 5000);
</script>

<style>
    @media (max-width: 640px) {
        #carousel img {
            height: 30vh;
        }
        .carousel-indicator {
            width: 10px;
            height: 10px;
        }
    }

    @media (min-width: 641px) and (max-width: 1024px) {
        #carousel img {
            height: 40vh;
        }
    }

    @media (min-width: 1025px) {
        #carousel img {
            height: 50vh;
        }
    }
</style> -->


<section class="bg-[#015551] text-white py-14 px-6 sm:px-10 lg:px-20">
  <div class="max-w-6xl mx-auto flex flex-col items-center text-center lg:text-left lg:items-start space-y-6">
    
    <!-- Main Heading -->
    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-wide leading-tight">
      Welcome to <span class="text-yellow-300">PUSTAKHUB</span>
    </h1>

    <!-- Subheading -->
    <p class="text-lg sm:text-xl text-white/90 max-w-2xl">
      Buy & sell <span class="text-yellow-200 font-semibold">old books</span>, or grab the latest 
      <span class="text-yellow-200 font-semibold">new titles</span> — all in one simple, trusted platform.
    </p>

    <!-- CTA Button -->
    <a href="#shop" class="inline-block bg-yellow-400 hover:bg-yellow-300 text-[#015551] font-semibold px-6 py-3 rounded-full shadow-lg transition-all duration-300">
      Start Exploring
    </a>

  </div>
</section>
