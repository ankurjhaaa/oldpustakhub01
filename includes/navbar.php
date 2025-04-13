<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

<nav
    class="bg-[#015551] shadow-md border-b border-gray-200 shadow-md px-6 py-3 flex items-center justify-between sticky top-0 w-full h-20 z-50">
    <!-- Left Section: Logo -->
    <div class="flex items-center space-x-2">
        <a href="index.php">
            <h1 class="text-[#FDFBEE] font-bold text-xl">PUSTAKHUB</h1>
        </a>
    </div>

    <!-- Middle Section: Location and Search (Hidden on Mobile) -->
    <div class="hidden md:flex items-center w-full md:w-1/2 lg:w-1/2 gap-2 mx-8 ps-10">
        <!-- Location Selector -->
        <div class="relative group flex-shrink-0">
            <button id="locationBtn"
                class="flex items-center space-x-1 text-gray-800 hover:text-blue-600 focus:outline-none">
                <i class="fa-solid fa-location-dot text-[#FDFBEE]"></i>
                <span class="text-sm text-[#FDFBEE] font-medium">Delhi</span>
                <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>

            <!-- Location Dropdown -->
            <div id="locationDropdown"
                class="absolute left-0 mt-8 w-64 bg-white border border-gray-200 rounded-lg shadow-lg hidden opacity-0 scale-95 transition-all duration-300 origin-top-left">
                <div class="p-4 border-b">
                    <h3 class="font-semibold text-gray-900">Select Location</h3>
                </div>
                <div class="p-4">
                    <div class="flex items-center mb-3">
                        <i class="fa-solid fa-location-crosshairs text-blue-600 mr-2"></i>
                        <button class="text-blue-600 font-medium">Use current location</button>
                    </div>
                    <div class="relative">
                        <input type="text" placeholder="Search for area"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <i class="fa-solid fa-magnifying-glass absolute right-3 top-2.5 text-gray-400 text-sm"></i>
                    </div>
                    <div class="mt-4">
                        <!-- <h4 class="text-xs font-semibold text-gray-500 uppercase mb-2">Recent Locations</h4> -->
                        <!-- <ul>
                            <li class="py-1.5 px-2 hover:bg-gray-100 rounded cursor-pointer">Mumbai, Maharashtra</li>
                            <li class="py-1.5 px-2 hover:bg-gray-100 rounded cursor-pointer">Bangalore, Karnataka</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <form action="search.php" method="GET" class="flex-1">
            <div
                class="flex items-center w-full border border-gray-300 rounded-md overflow-hidden shadow-sm bg-white px-3">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass text-gray-500 text-sm md:text-base mr-2"></i>
                </button>
                <input type="text" name="query" placeholder="Search for Products, Brands and More"
                    class="w-full px-2 py-2 text-sm md:text-base focus:outline-none text-gray-800">
            </div>
        </form>
    </div>




    <!-- Right Section (Hidden on Mobile) -->
    <div class="hidden md:flex items-center space-x-6 lg:space-x-10 md:space-x-2 ">

        <!-- Wishlist Button -->
        <!-- <a href="wishlist.php"
            class="relative flex items-center space-x-3 py-2 text-gray-800 font-medium transition-all duration-200 shadow-sm">

            <div class="relative">
                <i class="fa-solid fa-heart text-2xl text-gray-700 hover:text-red-600 transition-all duration-200"></i>

                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                    5
                </span>
            </div>

        </a> -->



        <!-- Chat Button -->
        <a href="chat.php"
            class="relative flex items-center space-x-3 py-2 text-gray-800 font-medium transition-all duration-200 shadow-sm">

            <div class="relative w-10 h-10 flex items-center justify-center">
                <!-- Hollow Chat Icon -->
                <i
                    class="fa-regular fa-comment-dots text-[28px] text-[#FDFBEE] hover:text-[#FDFBEE] transition-all duration-200"></i>

                <!-- Notification Badge -->
                <span
                    class="absolute -top-1.5 -right-1.5 bg-red-500 text-[#FDFBEE] text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                    3
                </span>
            </div>

        </a>




        <!-- Cart Button -->
        <!-- <button
            class="relative flex items-center space-x-2 px-4 py-2  text-gray-800 font-medium   transition-all duration-200 shadow-sm ">
            <div class="relative">
                <i
                    class="fa-solid fa-cart-shopping text-2xl text-gray-700 hover:text-red-600 transition-all duration-200"></i>
                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                    4
                </span>
            </div>
        </button> -->

        <!-- Profile Dropdown Button -->
        <div class="relative">
            <button id="profileBtn"
                class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 focus:outline-none transition-all duration-200">
                <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                    <img src="https://i.pravatar.cc/100" alt="User" class="w-full h-full object-cover">
                </div>
                <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE] "></i>
            </button>

            <!-- Dropdown Menu (Initially Hidden) -->
            <div id="profileDropdown"
                class="absolute right-0 mt-3 w-56 bg-white border border-gray-200 rounded-md shadow-lg hidden opacity-0 scale-95 transition-all duration-300 origin-top-right">
                <!-- Top Section with User Info -->
                <div class="p-4 border-b">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden">
                            <img src="https://i.pravatar.cc/100" alt="User" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="text-gray-900 font-semibold">Ankur Sharma</h3>
                            <p class="text-gray-500 text-sm">ankur@example.com</p>
                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <ul class="py-2">
                    <li><a href="profile.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-user-circle mr-3 text-blue-600"></i> My Profile</a></li>
                    <li><a href="orders.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-box mr-3 text-green-600"></i> My Orders</a></li>
                    <li><a href="wishlist.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-heart mr-3 text-red-500"></i> Wishlist</a></li>
                    <li><a href="settings.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-cog mr-3 text-yellow-500"></i> Settings</a></li>
                    <li><a href="logout.php"
                            class="flex items-center px-4 py-3 text-red-600 hover:bg-gray-100 font-semibold">
                            <i class="fa-solid fa-sign-out-alt mr-3"></i> Logout</a></li>
                </ul>
            </div>
        </div>



        <!-- Become a Seller Button -->
        <a href="sell.php" class="relative flex items-center justify-center px-1 py-1 text-lg font-bold text-gray-900 
              bg-white rounded-full shadow-lg transition-all duration-300 transform hover:scale-105">

            <!-- Outer Gradient Border -->
            <div class="absolute inset-0 rounded-full p-1 bg-gradient-to-r from-yellow-400 via-cyan-400 to-blue-600">
            </div>

            <!-- Inner White Background -->
            <div class="relative z-10 flex items-center space-x-3 bg-white px-3 py-1 rounded-full">
                <i class="fa-solid fa-plus text-2xl text-gray-800"></i>
                <span class="text-gray-900">SELL</span>
            </div>

        </a>


    </div>

    <!-- Mobile Icons -->
    <div class="md:hidden flex items-center space-x-5">

        <button onclick="document.getElementById('mobileLocationPopup').classList.remove('hidden')"
            class="flex items-center space-x-1 text-gray-800 hover:text-blue-600 focus:outline-none">
            <i class="fa-solid fa-location-dot text-[#FDFBEE]"></i>
            <span class="text-sm text-[#FDFBEE] font-medium">Delhi</span>
            <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE]"></i>
        </button>

        <!-- Search Icon - More prominent and distinctive -->
        <button id="mobileSearchBtn" class="group relative">
            <div
                class="flex items-center justify-center w-10 h-10 rounded-full border border-blue-600 bg-[#57B4BA] shadow-sm  transition-all duration-200">
                <i
                    class="fa-solid fa-magnifying-glass text-[#FDFBEE] text-base group-hover:scale-110 transition-transform"></i>
            </div>
        </button>


    </div>
</nav>

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
<!-- mobile search ka kaam hai -->



<!-- Mobile Location Selector (Initially Hidden) -->
<!-- Overlay -->
<!-- POPUP WRAPPER -->
<div id="mobileLocationPopup"
    class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden flex items-start justify-center pt-20">

    <!-- POPUP BOX -->
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-4 mx-4 relative">

        <!-- ❌ Close Button -->
        <button id="closeLocationPopup"
            class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-2xl focus:outline-none">
            &times;
        </button>

        <!-- Heading and content -->
        <div class="mb-4">
            <h3 class="font-semibold text-gray-900 mb-2">Select Delivery Location</h3>

            <div class="flex items-center mb-3 p-2 bg-blue-50 rounded-md">
                <i class="fa-solid fa-location-crosshairs text-blue-600 mr-2"></i>
                <button class="text-blue-600 font-medium">Use current location</button>
            </div>

            <div class="relative mb-3">
                <form action="search.php" method="GET">
                    <input type="text" name="area" placeholder="Search for area"
                        class="w-full px-10 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-800">
                    <button type="submit">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-3 top-1/3 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                    </button>
                </form>
            </div>

        </div>

        <!-- Recent Locations -->
        <!-- <div>
            <h4 class="text-xs font-semibold text-gray-500 uppercase mb-2">Recent Locations</h4>
            <ul class="space-y-1">
                <li class="py-2 px-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center">
                    <span>Delhi, India</span>
                    <i class="fa-solid fa-check text-blue-600"></i>
                </li>
                <li class="py-2 px-2 hover:bg-gray-100 rounded cursor-pointer">Mumbai, Maharashtra</li>
                <li class="py-2 px-2 hover:bg-gray-100 rounded cursor-pointer">Bangalore, Karnataka</li>
            </ul>
        </div> -->

    </div>
</div>



<script>
    // Profile Dropdown
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    profileBtn.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
        profileDropdown.classList.toggle('opacity-0');
        profileDropdown.classList.toggle('scale-95');
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
            profileDropdown.classList.add('hidden');
            profileDropdown.classList.add('opacity-0');
            profileDropdown.classList.add('scale-95');
        }
    });

    // Location Dropdown
    const locationBtn = document.getElementById('locationBtn');
    const locationDropdown = document.getElementById('locationDropdown');

    locationBtn.addEventListener('click', () => {
        locationDropdown.classList.toggle('hidden');
        locationDropdown.classList.toggle('opacity-0');
        locationDropdown.classList.toggle('scale-95');
    });

    // Hide location dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!locationBtn.contains(event.target) && !locationDropdown.contains(event.target)) {
            locationDropdown.classList.add('hidden');
            locationDropdown.classList.add('opacity-0');
            locationDropdown.classList.add('scale-95');
        }
    });

    // Mobile Search Toggle
    document.getElementById('mobileSearchBtn').addEventListener('click', function () {
        const searchBox = document.getElementById('mobileSearchBox');
        const locationBox = document.getElementById('mobileLocationBox');

        searchBox.classList.toggle('hidden');
        locationBox.classList.add('hidden');
    });

    // Mobile Location Toggle
    document.getElementById('mobileLocationBtn').addEventListener('click', function () {
        const locationBox = document.getElementById('mobileLocationBox');
        const searchBox = document.getElementById('mobileSearchBox');

        locationBox.classList.toggle('hidden');
        searchBox.classList.add('hidden');
    });

</script>
<script>
    // Close button click
    document.getElementById('closeLocationPopup').addEventListener('click', function () {
        document.getElementById('mobileLocationPopup').classList.add('hidden');
    });

    // Optional: Open popup manually for testing
    // document.getElementById('mobileLocationPopup').classList.remove('hidden');
</script>