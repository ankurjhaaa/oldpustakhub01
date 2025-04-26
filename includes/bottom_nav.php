<!-- Search Icon (bottom right, above navbar) -->
<div class="fixed bottom-20 right-6 z-50 md:hidden">
    <button id="mobileSearchBtn" class="group relative">
        <div
            class="flex items-center justify-center w-14 h-14 rounded-2xl border border-blue-600 bg-[#57B4BA] shadow-sm  transition-all duration-200">
            <i
                class="fa-solid fa-magnifying-glass text-[#FDFBEE] text-base group-hover:scale-110 transition-transform"></i>
        </div>
    </button>
</div>
<!-- Mobile Search Bar (Initially Hidden) -->
<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 z-50 bg-black/40 hidden items-center justify-center">
    <div class="bg-white w-11/12 max-w-md mx-auto rounded-lg shadow-lg p-4">

        <!-- Modal Header -->
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-lg font-semibold text-gray-800">Search Book</h2>
            <button id="closeSearchModal" class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
        </div>

        <!-- Search Form -->
        <form id="searchForm" action="search.php" method="GET" class="relative">
            <input id="searchInput" type="text" name="q" placeholder="Search for books, authors..."
                class="w-full border border-gray-300 rounded-md pr-10 pl-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />
            <button type="submit"
                class="absolute inset-y-0 right-2 flex items-center text-blue-600 hover:text-blue-800">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</div>
<script>
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const searchModal = document.getElementById('searchModal');
    const closeSearchModal = document.getElementById('closeSearchModal');

    // Open Modal
    mobileSearchBtn.addEventListener('click', () => {
        searchModal.classList.remove('hidden');
        searchModal.classList.add('flex');
        document.getElementById('searchInput').focus();
    });

    // Close Modal
    closeSearchModal.addEventListener('click', () => {
        searchModal.classList.add('hidden');
        searchModal.classList.remove('flex');
    });

    // ESC to close
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            searchModal.classList.add('hidden');
            searchModal.classList.remove('flex');
        }
    });
</script>
<div
    class="fixed bottom-0 left-0 w-full border-t border-[#E8E8E8] shadow-lg flex justify-around items-center py-2 md:hidden bg-[#F4F4F2] z-50">

    <!-- Wishlist Button -->
    <?php
    if (!isset($_SESSION['email'])) { ?>
        <button class="openPopupBtn">
            <a
                class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
                <div class="relative">
                    <!-- Heart Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <!-- Notification Badge -->
                    <span
                        class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                        5
                    </span>
                </div>
                <span class="text-xs mt-1 font-medium">Wishlist</span>
            </a>
        </button>
    <?php } else { ?>
        <a href="wishlist.php"
            class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
            <div class="relative">
                <!-- Heart Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <!-- Notification Badge -->
                <span
                    class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                    5
                </span>
            </div>
            <span class="text-xs mt-1 font-medium">Wishlist</span>
        </a>
    <?php } ?>


    <!-- Chat Button -->
    <?php if (!isset($_SESSION['email'])) { ?>
        <button class="openPopupBtn">
            <a
                class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
                <div class="relative">
                    <!-- Chat Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <!-- Notification Badge -->
                    <span
                        class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                        3
                    </span>
                </div>
                <span class="text-xs mt-1 font-medium">Chat</span>
            </a>
        </button>
    <?php } else { ?>
        <a href="chat.php"
            class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
            <div class="relative">
                <!-- Chat Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <!-- Notification Badge -->
                <span
                    class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                    3
                </span>
            </div>
            <span class="text-xs mt-1 font-medium">Chat</span>
        </a>

    <?php } ?>


    <!-- Sell Button (Center) -->
    <?php if (!isset($_SESSION['email'])) { ?>
        <button class="openPopupBtn">
            <a
                class="relative ms-5 flex items-center justify-center -mt-8 transition-transform duration-300 hover:scale-105">

                <!-- Outer Animated Gradient Ring -->
                <div class="absolute w-16 h-16 rounded-full bg-gradient-to-tr from-[#00ADB5] via-[#5F6769] to-[#BBBFCA] 
              p-[2px] shadow-xl animate-spin-slow opacity-70 hover:opacity-90 transition-all duration-500">
                </div>

                <!-- Inner Circle with Glass Effect -->
                <div class="relative z-10 flex items-center justify-center w-14 h-14 bg-white/70 rounded-full shadow-inner 
              backdrop-blur-md border border-white/30">
                    <span class="text-[#333] font-semibold text-sm tracking-wide">SELL</span>
                </div>

            </a>
        </button>
    <?php } else { ?>
        <a href="sell.php"
            class="relative ms-5 flex items-center justify-center -mt-8 transition-transform duration-300 hover:scale-105">

            <!-- Outer Animated Gradient Ring -->
            <div class="absolute w-16 h-16 rounded-full bg-gradient-to-tr from-[#00ADB5] via-[#5F6769] to-[#BBBFCA] 
              p-[2px] shadow-xl animate-spin-slow opacity-70 hover:opacity-90 transition-all duration-500">
            </div>

            <!-- Inner Circle with Glass Effect -->
            <div class="relative z-10 flex items-center justify-center w-14 h-14 bg-white/70 rounded-full shadow-inner 
              backdrop-blur-md border border-white/30">
                <span class="text-[#333] font-semibold text-sm tracking-wide">SELL</span>
            </div>

        </a>

        <style>
            @keyframes spin-slow {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            .animate-spin-slow {
                animation: spin-slow 8s linear infinite;
            }
        </style>

    <?php } ?>


    <!-- Cart Button -->
    <a href="m_category.php"
        class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
        <div class="relative">
            <!-- Shopping Cart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            <!-- Notification Badge -->
            <!-- <span class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                5
            </span> -->
        </div>
        <span class="text-xs mt-1 font-medium">Category</span>
    </a>

    <!-- Profile Button -->
    <?php if (!isset($_SESSION)) { ?>
        <button class="openPopupBtn">
            <a
                class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
                <div class="relative w-6 h-6 rounded-full overflow-hidden border border-[#00ADB5]">
                    <img src="https://i.pravatar.cc/100" alt="Profile" class="w-full h-full object-cover">
                </div>
                <span class="text-xs mt-1 font-medium">Profile</span>
            </a>
        </button>
    <?php } else { ?>
        <a href="m_profile.php"
            class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
            <div class="relative w-6 h-6 rounded-full overflow-hidden border border-[#00ADB5]">
                <img src="https://i.pravatar.cc/100" alt="Profile" class="w-full h-full object-cover">
            </div>
            <span class="text-xs mt-1 font-medium">Profile</span>
        </a>

    <?php } ?>

</div>