    <style>
        /* Hide scrollbar */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Smooth transitions */
        .transition-all-300 {
            transition: all 0.3s ease;
        }

        /* Fix for dropdown overflow */
        .category-slider-container {
            position: relative;
            overflow-x: auto;
            overflow-y: visible;
        }

        .category-items-wrapper {
            display: inline-flex;
            position: relative;
        }

        .category-item {
            position: static;
            /* Changed from relative to static for proper dropdown positioning */
        }

        .category-dropdown {
            position: fixed;
            /* Changed from absolute to fixed */
            transform: translateX(-50%);
            left: 50%;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.2s, visibility 0.2s;
        }

        .category-item:hover .category-dropdown,
        .category-item:focus-within .category-dropdown {
            visibility: visible;
            opacity: 1;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>


    <!-- Navigation Bar -->
    <div class="bg-[#57B4BA] hidden md:block shadow-sm flex items-center justify-between h-12  top-0  ">
        <div class="container  px-4">
            <div class="flex justify-between items-center py-1">

                <!-- Category Slider -->
                <div class="relative w-full">
                    <div class="scrollbar-hide overflow-x-auto whitespace-nowrap space-x-6 py-2"
                        style="scrollbar-width: none; -ms-overflow-style: none;">
                        <!-- Sample Categories -->
                        <div class="inline-block category-item relative">
                            <button
                                class="category-button flex items-center space-x-1 text-gray-600 hover:text-blue-600 transition-all-300">
                                <span class="font-medium ">Electronics</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="category-dropdown hidden absolute left-0 ms-8 mt-3  w-48 bg-white rounded-sm shadow-lg py-1 z-50 border border-gray-100">
                                <a href=""
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Smartphones</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Laptops</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a>
                            </div>
                        </div>
                        <div class="inline-block category-item relative">
                            <button
                                class="category-button flex items-center space-x-1 text-gray-600 hover:text-blue-600 transition-all-300">
                                <span class="font-medium">Electronics</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="category-dropdown hidden absolute left-0 ms-8 mt-2  w-48 bg-white rounded-sm shadow-lg py-1 z-50 border border-gray-100">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Smartphones</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Laptops</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a>
                            </div>
                        </div>
                        <div class="inline-block category-item relative">
                            <button
                                class="category-button flex items-center space-x-1 text-gray-600 hover:text-blue-600 transition-all-300">
                                <span class="font-medium">Electronics</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="category-dropdown hidden absolute left-0 ms-8 mt-2  w-48 bg-white rounded-sm shadow-lg py-1 z-50 border border-gray-100">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Smartphones</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Laptops</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a>
                            </div>
                        </div>
                        <div class="inline-block category-item relative">
                            <button
                                class="category-button flex items-center space-x-1 text-gray-600 hover:text-blue-600 transition-all-300">
                                <span class="font-medium">Electronics</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="category-dropdown hidden absolute left-0 ms-8 mt-2  w-48 bg-white rounded-sm shadow-lg py-1 z-50 border border-gray-100">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Smartphones</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Laptops</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a>
                            </div>
                        </div>
                        <div class="inline-block category-item relative">
                            <button
                                class="category-button flex items-center space-x-1 text-gray-600 hover:text-blue-600 transition-all-300">
                                <span class="font-medium">Electronics</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div
                                class="category-dropdown hidden absolute left-0 ms-8 mt-2  w-48 bg-white rounded-sm shadow-lg py-1 z-50 border border-gray-100">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Smartphones</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Laptops</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Accessories</a>
                            </div>
                        </div>



                    </div>
                </div>

                

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Category dropdown functionality
            document.querySelectorAll('.category-button').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const dropdown = this.nextElementSibling;
                    const rect = this.getBoundingClientRect();

                    // Position the dropdown below the button
                    dropdown.style.left = `${rect.left + rect.width / 2}px`;
                    dropdown.style.top = `${rect.bottom}px`;

                    // Close all other dropdowns first
                    document.querySelectorAll('.category-dropdown').forEach(d => {
                        if (d !== dropdown) {
                            d.classList.add('hidden');
                            d.style.visibility = 'hidden';
                            d.style.opacity = '0';
                        }
                    });

                    // Toggle current dropdown
                    dropdown.classList.toggle('hidden');
                    if (!dropdown.classList.contains('hidden')) {
                        dropdown.style.visibility = 'visible';
                        dropdown.style.opacity = '1';
                    } else {
                        dropdown.style.visibility = 'hidden';
                        dropdown.style.opacity = '0';
                    }
                });
            });

            // Close all dropdowns when clicking anywhere else
            document.addEventListener('click', function () {
                document.querySelectorAll('.category-dropdown').forEach(dropdown => {
                    dropdown.classList.add('hidden');
                    dropdown.style.visibility = 'hidden';
                    dropdown.style.opacity = '0';
                });
            });
        });
    </script>
