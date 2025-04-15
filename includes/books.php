<div class="container mx-auto px-4 sm:px-6 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-5">Recommendation Books </h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1  md:gap-4">

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>

        <!-- Product Card 1 -->
        <div
            class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
            <!-- Image Section -->
            <div class="relative w-full h-[160px] sm:h-[200px]">
                <?php if (!isset($_SESSION['email'])) { ?>
                    <button
                        class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                        aria-label="Add to Wishlist">
                        <i
                            class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                    </button>
                <?php } else { ?>
                    <form action="" method="post">
                        <button id="wishlistBtn"
                            class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                            aria-label="Add to Wishlist">
                            <i
                                class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    </form>
                <?php } ?>
                <a href="view.php">
                    <img src="https://picsum.photos/300/300"
                        class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Smartphone"
                        loading="lazy">
                </a>
            </div>

            <!-- Details Section -->
            <div class="p-2 flex-grow flex flex-col">
                <!-- Price -->
                <div class="mb-1">
                    <div class="flex items-center gap-2">
                        <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                        <span class="line-through text-xs text-gray-500">₹2499</span>
                        <span class="text-xs text-green-600 font-semibold">20% off</span>
                    </div>
                </div>

                <!-- Title -->
                <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                    Science Book kc
                </p>

                <!-- Author -->
                <p class="text-gray-600 text-xs sm:text-sm mb-1">
                    Author: Ankur Jha
                </p>

                <!-- Location & Time -->
                <div class="flex justify-between text-xs text-gray-500">
                    <span class="truncate">📍 Patna</span>
                    <span>🕒 Today</span>
                </div>
            </div>
            <hr>
        </div>











    </div>
</div>