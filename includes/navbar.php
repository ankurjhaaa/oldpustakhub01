<nav class="bg-[#A5BFCC] shadow-md px-6 py-3 flex items-center justify-between sticky top-0 w-full z-50">
    <!-- Left Section: Logo -->
    <div class="flex items-center space-x-2">
        <a href="index.php">
            <h1 class="text-blue-600 font-bold text-xl">Pustakhub</h1>
        </a>
    </div>

    <!-- Middle Section: Location and Search (Hidden on Mobile) -->
    <div class="hidden md:flex items-center w-full md:w-1/2 lg:w-2/3 space-x-4 ms-20">
        <!-- Location Selector -->
        <div class="relative group">
            <button id="locationBtn"
                class="flex items-center space-x-1 text-gray-800 hover:text-blue-600 focus:outline-none">
                <i class="fa-solid fa-location-dot text-blue-600"></i>
                <span class="text-sm font-medium">Delhi, India</span>
                <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>

            <!-- Location Dropdown -->
            <div id="locationDropdown"
                class="absolute left-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg hidden opacity-0 scale-95 transition-all duration-300 origin-top-left">
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
                        <h4 class="text-xs font-semibold text-gray-500 uppercase mb-2">Recent Locations</h4>
                        <ul>
                            <li class="py-1.5 px-2 hover:bg-gray-100 rounded cursor-pointer">Mumbai, Maharashtra</li>
                            <li class="py-1.5 px-2 hover:bg-gray-100 rounded cursor-pointer">Bangalore, Karnataka</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="flex items-center w-2/3 border border-gray-300 rounded-md overflow-hidden shadow-sm">
            <input type="text" placeholder="Search for Products, Brands and More"
                class="w-full px-4 py-2 text-sm md:text-base focus:outline-none">
            <button class="bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>


    </div>



    <!-- Right Section (Hidden on Mobile) -->
    <div class="hidden md:flex items-center space-x-6">

        <!-- Wishlist Button -->
        <button
            class="relative flex items-center space-x-2 px-4 py-2 text-gray-800 font-medium transition-all duration-200 shadow-sm">
            <div class="relative">
                <!-- Wishlist (Heart) Icon -->
                <i class="fa-solid fa-heart text-2xl text-gray-700 hover:text-red-600 transition-all duration-200"></i>

                <!-- Notification Badge -->
                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                    5
                </span>
            </div>
        </button>


        <!-- Chat Button -->
        <button
            class="relative flex items-center space-x-2 px-4 py-2 text-gray-800 font-medium transition-all duration-200 shadow-sm">
            <div class="relative">
                <!-- Chat Icon -->
                <i
                    class="fa-solid fa-comments text-2xl text-gray-700 hover:text-blue-600 transition-all duration-200"></i>

                <!-- Notification Badge -->
                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                    3
                </span>
            </div>
        </button>


        <!-- Cart Button -->
        <button
            class="relative flex items-center space-x-2 px-4 py-2  text-gray-800 font-medium   transition-all duration-200 shadow-sm ">
            <div class="relative">
                <i
                    class="fa-solid fa-cart-shopping text-2xl text-gray-700 hover:text-red-600 transition-all duration-200"></i>
                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                    4
                </span>
            </div>
        </button>

        <!-- Profile Dropdown Button -->
        <div class="relative">
            <button id="profileBtn"
                class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 focus:outline-none transition-all duration-200">
                <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                    <img src="https://i.pravatar.cc/100" alt="User" class="w-full h-full object-cover">
                </div>
                <i class="fa-solid fa-chevron-down text-xs"></i>
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

        <!-- <button class="text-gray-700 text-xl hover:text-gray-900">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </button> -->
    </div>

    <!-- Mobile Icons -->
    <div class="md:hidden flex items-center space-x-4">
        <!-- Mobile Location Icon -->
        <button id="mobileLocationBtn" class="text-gray-700 mr-4">
            <i class="fa-solid fa-location-dot text-lg"></i>
        </button>

        <!-- Mobile Search Icon -->
        <button id="mobileSearchBtn" class="text-gray-700 text-xl">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</nav>

<!-- Mobile Search Bar (Initially Hidden) -->
<div id="mobileSearchBox" class="hidden w-full px-4 py-2 border-t border-gray-300 bg-white fixed top-14 left-0 z-50">
    <div class="flex items-center border border-gray-300 rounded-md overflow-hidden shadow-sm">
        <input type="text" placeholder="Search for Products, Brands and More"
            class="w-full px-4 py-2 text-sm focus:outline-none">
        <button class="bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</div>

<!-- Mobile Location Selector (Initially Hidden) -->
<div id="mobileLocationBox" class="hidden w-full px-4 py-3 border-t border-gray-300 bg-white fixed top-14 left-0 z-50">
    <div class="mb-4">
        <h3 class="font-semibold text-gray-900 mb-2">Select Delivery Location</h3>
        <div class="flex items-center mb-3 p-2 bg-blue-50 rounded-md">
            <i class="fa-solid fa-location-crosshairs text-blue-600 mr-2"></i>
            <button class="text-blue-600 font-medium">Use current location</button>
        </div>
        <div class="relative mb-3">
            <input type="text" placeholder="Search for area"
                class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
            <i class="fa-solid fa-magnifying-glass absolute right-3 top-2.5 text-gray-400 text-sm"></i>
        </div>
    </div>
    <div>
        <h4 class="text-xs font-semibold text-gray-500 uppercase mb-2">Recent Locations</h4>
        <ul class="space-y-1">
            <li class="py-2 px-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center">
                <span>Delhi, India</span>
                <i class="fa-solid fa-check text-blue-600"></i>
            </li>
            <li class="py-2 px-2 hover:bg-gray-100 rounded cursor-pointer">Mumbai, Maharashtra</li>
            <li class="py-2 px-2 hover:bg-gray-100 rounded cursor-pointer">Bangalore, Karnataka</li>
        </ul>
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