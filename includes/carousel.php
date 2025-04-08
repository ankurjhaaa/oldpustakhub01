<div class="relative w-full max-w-8xl mx-auto mt-1 overflow-hidden rounded-sm shadow-lg">
    <!-- Carousel Container -->
    <div class="relative w-full flex transition-transform duration-500 ease-in-out" id="carousel">
        <!-- Slides with different aspect ratios for different devices -->
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

    <!-- Navigation Buttons -->
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

    <!-- Indicator Dots -->
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
        // Update slides visibility
        slides.forEach((slide, i) => {
            slide.classList.toggle("hidden", i !== index);
        });
        
        // Update indicator dots
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

    // Touch events for mobile swipe
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

    // Initialize
    showSlide(currentIndex);
    autoSlideInterval = setInterval(nextSlide, 5000);
</script>

<style>
    /* Responsive adjustments */
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
</style>