<div
    class="fixed bottom-0 left-0 w-full border-t border-[#E8E8E8] shadow-lg flex justify-around items-center py-2 md:hidden bg-[#F4F4F2] z-40">

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
                </div>
                <span class="text-xs mt-1 font-medium">Wishlist</span>
            </a>
        </button>
    <?php } else { ?>
        <a href="../wishlist.php"
            class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
            <div class="relative">
                <!-- Heart Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <!-- Notification Badge -->

                <?php
                $email = $_SESSION['email'];
                $findLikedQuery = $connect->query("SELECT * FROM liked WHERE UserEmail='$email'");
                $likeBookCount = mysqli_num_rows($findLikedQuery);
                if ($likeBookCount > 0) { ?>
                    <span
                        class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                        <?= $likeBookCount ?>
                    </span>
                <?php } ?>
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

                </div>
                <span class="text-xs mt-1 font-medium">Chat</span>
            </a>
        </button>
    <?php } else { ?>
        <a href="../chat/"
            class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
            <div class="relative">
                <!-- Chat Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <!-- Notification Badge -->
                <!-- <span
                    class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                    3
                </span> -->
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
        <?php if ($USERDETAIL['role'] == 2 && $USERDETAIL['isPlanActive'] == 0) { ?>
            <!-- Your Existing Button (No Changes) -->
            <button class="sell-btn">
                <a
                    class="sell-btn relative ms-5 flex items-center justify-center -mt-8 transition-transform duration-300 hover:scale-105">

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
            <a href="sell/sell.php"
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
        <?php } ?>


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
    <button id="openModalBtn"
        class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
        <div class="relative">
            <!-- Shopping Cart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 103.5 10.5a7.5 7.5 0 0013.65 6.15z" />
            </svg>
            <!-- Notification Badge -->
            <!-- <span class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                5
            </span> -->
        </div>
        <span class="text-xs mt-1 font-medium">Search</span>
    </button>

    <!-- Profile Button -->
    <?php if (!isset($_SESSION)) { ?>
        <button class="openPopupBtn">
            <a
                class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
                <div class="relative w-6 h-6 rounded-full overflow-hidden border border-[#00ADB5]">
                    <img src="images\default_user.jpeg" alt="Profile" class="w-full h-full object-cover">
                </div>
                <span class="text-xs mt-1 font-medium">Profile</span>
            </a>
        </button>
    <?php } else { ?>
        <a href="../profile.php"
            class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
            <?php if (isset($_SESSION['email'])) { ?>
                <div
                    class="relative w-6 h-6 flex items-center justify-center rounded-full bg-[#015551]/10 text-[#015551] font-bold text-lg mt-2 border-2 border-[#015551]">
                    <?= strtoupper(substr($USERDETAIL['firstname'], 0, 1)) ?>
                </div>

            <?php } else { ?>
                <div class="relative w-6 h-6 rounded-full overflow-hidden border border-[#00ADB5]">
                    <img src="images/default_user.jpeg " alt="Profile" class="w-full h-full object-cover">
                </div>

            <?php } ?>
            <span class="text-xs mt-1 font-medium">Profile</span>
        </a>

    <?php } ?>

</div>





<!-- jab seller ka plan khatamho jaaye -->

<!-- Modal -->
<div class="popup-modal fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm px-4">
    <div class="modal-content bg-white rounded-lg p-4 sm:p-6 w-full max-w-md mx-2 shadow-xl relative animate-fade-in">
        <!-- Header with icon -->
        <div class="flex items-center justify-center mb-3">
            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>

        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-1 text-center">Plan Expired</h2>

        <!-- Expiration details -->
        <div class="bg-gray-50 p-2 sm:p-3 rounded-lg mb-3 sm:mb-4 text-center">
            <p class="text-xs sm:text-sm text-gray-600 mb-1">Your plan expired on:</p>
            <p class="text-sm sm:text-base font-semibold text-red-600">October 15, 2023</p>
        </div>

        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-5 text-center">
            Your access to premium features has been suspended. Renew to continue.
        </p>

        <!-- Action buttons (Stacked on mobile, Row on desktop) -->
        <div class="flex flex-row flex-wrap gap-2 sm:gap-3 justify-center">
            <!-- Renew Plan Button -->
            <a href="wallet/purchaseSellPlan.php"
                class="renew-btn inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium text-sm sm:text-base">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span>Renew Plan</span>
            </a>

            <!-- Close Button -->
            <button
                class="close-modal inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200 font-medium text-sm sm:text-base">
                Close
            </button>
        </div>


        <!-- Contact support link -->
        <p class="text-xs text-gray-500 mt-3 sm:mt-4 text-center">
            Need help? <a href="#" class="text-blue-500 hover:underline">Contact support</a>
        </p>
    </div>
</div>

<!-- Script -->
<script>
    document.querySelectorAll('.sell-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.popup-modal').forEach(modal => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });
    });

    document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', () => {
            document.querySelectorAll('.popup-modal').forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });
    });
</script>

<!-- ------------------------------------------------------- -->

<!-- Button to open modal -->


<!-- Modal -->
<div id="modal" class="fixed inset-0 p-6 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg relative">

        <!-- Close button -->
        <button id="closeModalBtn"
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-900 text-xl font-bold"></button>

        <!-- Search input with icons inside -->
        <div class="relative">
            <!-- Left search icon -->
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none"
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M17 17A7.5 7.5 0 1110.5 3 7.5 7.5 0 0117 17z" />
            </svg>

            <!-- Search input -->
            <form action="filter.php" method="get">
                <input id="searchInput" type="text" placeholder="Search for Products, Brands and More" name="book_name"
                    class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    oninput="filterSuggestions(this.value)" />

                <!-- Right search icon button -->
                <button type="submit" name="find_book"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
                    🔍
                </button>
            </form>
        </div>

        <!-- Static Suggestions Div -->
        <div id="suggestions" 
            class="mt-4 max-h-72 overflow-y-auto space-y-1 text-sm text-gray-700 border border-gray-200 rounded-md">
            <?php
            $call_books_name = mysqli_query($connect, "
      SELECT title AS name FROM books
      UNION ALL
      SELECT category_title AS name FROM category
      UNION ALL
      SELECT subcat_title AS name FROM sub_category
      ORDER BY RAND()
    ");

            while ($row = mysqli_fetch_array($call_books_name)) { ?>
                <a href="../filter.php?find_book=&book_name=<?= urlencode($row['name']) ?>"
                    class="block hover:no-underline focus:outline-none focus:ring-2 focus:ring-blue-500 rounded"
                    role="option" aria-selected="false">
                    <div class="suggestion flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-gray-500 text-xs"></i>
                        <span><?= htmlspecialchars($row['name']) ?></span>
                    </div>
                </a>
            <?php } ?>
        </div>

    </div>
</div>

<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');
    const suggestions = document.querySelectorAll('.suggestion');

    function filterSuggestions(query) {
        query = query.toLowerCase();
        suggestions.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(query)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }




    openModalBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeModalBtn.addEventListener('click', () => modal.classList.add('hidden'));
    modal.addEventListener('click', e => { if (e.target === modal) modal.classList.add('hidden'); });
</script>