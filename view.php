<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details | PustakHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <style>
        .thumbnail.active {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .image-gallery {
            height: 500px;
        }

        @media (max-width: 768px) {
            .image-gallery {
                height: 350px;
            }
        }
    </style>
</head>

<body class="bg-[#DBE2EF]">
    <?php include_once "includes/navbar.php"; ?>
    <!-- Navigation would be included here -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Image Gallery Section -->
            <div class="lg:col-span-8 mt-12">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Main Image Display -->
                    <div class="relative image-gallery w-full flex justify-center items-center">
                        <button onclick="prevImage()"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md border border-gray-300 hover:bg-gray-100 transition z-10">
                            <i class="fas fa-chevron-left text-gray-700"></i>
                        </button>

                        <img id="mainImage" src="https://picsum.photos/800/1000?random=1"
                            class="w-full max-w-[850px] h-auto md:h-[500px] lg:h-[600px] object-contain rounded-lg shadow-md bg-white p-4 cursor-zoom-in"
                            alt="Book Cover" onclick="openFullScreen()">

                        <button onclick="nextImage()"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-md border border-gray-300 hover:bg-gray-100 transition z-10">
                            <i class="fas fa-chevron-right text-gray-700"></i>
                        </button>
                    </div>

                    <!-- Thumbnails (Desktop में Side में, Mobile/Tablet में नीचे) -->
                    <div class="flex justify-left gap-2 overflow-x-auto md:flex-wrap mt-10">
                        <img src="https://picsum.photos/200/300?random=1"
                            class="thumbnail w-16 h-16 md:w-20 md:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(0)">
                        <img src="https://picsum.photos/200/300?random=2"
                            class="thumbnail w-16 h-16 md:w-20 md:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(1)">
                        <img src="https://picsum.photos/200/300?random=3"
                            class="thumbnail w-16 h-16 md:w-20 md:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(2)">
                        <img src="https://picsum.photos/200/300?random=4"
                            class="thumbnail w-16 h-16 md:w-20 md:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(3)">
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="lg:col-span-4 space-y-5">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">NEET Preparation Books (Complete Set)</h1>
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <span class="text-3xl font-bold text-blue-600">₹3,000</span>
                            <span class="text-sm text-gray-500 ml-1">(Negotiable)</span>
                        </div>
                        <div class="flex space-x-3">
                            <button class="text-gray-500 hover:text-blue-500 transition-colors" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-500 transition-colors" title="Save">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-2 text-sm text-gray-600">
                        <p><i class="fas fa-book text-blue-500 mr-2"></i> Complete set of NEET preparation books
                            including modules</p>
                        <p><i class="fas fa-clipboard-check text-blue-500 mr-2"></i> Excellent condition (like new)</p>
                        <p><i class="fas fa-calendar-alt text-blue-500 mr-2"></i> Posted: Today</p>
                        <p><i class="fas fa-map-marker-alt text-blue-500 mr-2"></i> Ambedkar Puram, Kanpur, UP</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-teal-700"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Satyam</h3>
                                <p class="text-xs text-gray-500">Member since 2022</p>
                            </div>
                        </div>
                        <a href="#" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-300">
                        <i class="fas fa-comment-dots mr-2"></i> Chat with Seller
                    </button>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-200">
                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i> Location
                    </h3>
                    <div class="rounded-lg overflow-hidden" style="height: 300px;">
                        <iframe class="w-full h-full border-0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.091807829648!2d81.001703214981!3d26.85359298315586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd5c5e5c6e7b%3A0x6d1e0b7f7d0d73e9!2sAwas%20Vikas%20Ambedkar%20Puram!5e0!3m2!1sen!2sin!4v1709823421692"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Ambedkar Puram, Kanpur, Uttar Pradesh</p>
                </div>

            </div>
        </div>
    </div>


    <!-- Fullscreen Image Modal -->
    <div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center hidden">
        <button onclick="prevImage()"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-left text-gray-700"></i>
        </button>

        <img id="fullscreenImage" class="max-w-[90vw] max-h-[90vh] object-contain">

        <button onclick="nextImage()"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-right text-gray-700"></i>
        </button>

        <button onclick="closeFullScreen()"
            class="absolute top-6 right-6 text-white text-3xl hover:text-gray-300 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <script>
        const images = [
            "https://picsum.photos/800/1000?random=1",
            "https://picsum.photos/800/1000?random=2",
            "https://picsum.photos/800/1000?random=3",
            "https://picsum.photos/800/1000?random=4"
        ];
        let currentIndex = 0;
        const thumbnails = document.querySelectorAll('.thumbnail');

        function updateActiveThumbnail() {
            thumbnails.forEach((thumb, index) => {
                thumb.classList.toggle('active', index === currentIndex);
            });
        }

        function changeImage(index) {
            currentIndex = index;
            document.getElementById("mainImage").src = images[currentIndex];
            updateActiveThumbnail();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById("mainImage").src = images[currentIndex];
            document.getElementById("fullscreenImage").src = images[currentIndex];
            updateActiveThumbnail();
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById("mainImage").src = images[currentIndex];
            document.getElementById("fullscreenImage").src = images[currentIndex];
            updateActiveThumbnail();
        }

        function openFullScreen() {
            document.getElementById("fullscreenImage").src = images[currentIndex];
            document.getElementById("fullscreenModal").classList.remove("hidden");
            document.body.style.overflow = "hidden";
        }

        function closeFullScreen() {
            document.getElementById("fullscreenModal").classList.add("hidden");
            document.body.style.overflow = "auto";
        }

        // Keyboard navigation
        document.addEventListener("keydown", function (event) {
            if (!document.getElementById("fullscreenModal").classList.contains("hidden")) {
                if (event.key === "Escape") closeFullScreen();
            }
            if (event.key === "ArrowLeft") prevImage();
            if (event.key === "ArrowRight") nextImage();
        });

        // Initialize
        updateActiveThumbnail();
    </script>
</body>

</html>