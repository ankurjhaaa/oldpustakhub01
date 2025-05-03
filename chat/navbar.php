<?php if(!isset($_SESSION['email'])){
    echo '<script>window.history.back();</script>';
}  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

<nav
    class="bg-[#015551] shadow-md border-b border-gray-200 shadow-md px-6 py-3 flex items-center justify-between sticky top-0 w-full h-20 z-50">
    <!-- Left Section: Logo -->
    <div class="flex items-center space-x-2">
        <a href="../index.php">
            <h1 class="text-[#FDFBEE] font-bold text-xl">PUSTAKHUB</h1>
        </a>
    </div>

    




    <!-- Right Section (Hidden on Mobile) -->
    <div class="hidden md:flex items-center space-x-6 lg:space-x-10 md:space-x-2 ">

        


        
        <?php
        if (!isset($_SESSION['email'])) { ?>
            <button
                class="openPopupBtn inline-flex items-center gap-1 px-4 py-2 rounded-xl bg-[#00ADB5] hover:bg-[#009da3] text-white font-semibold text-sm shadow-md transition duration-300">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </button>


        <?php } else { ?>
            <!-- Chat Button -->
            <a href="chat"
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


            <!-- Profile Dropdown Button -->
            <div class="relative ">
                <button id="profileBtn"
                    class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 focus:outline-none transition-all duration-200">
                    <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                        <a href="../profile.php?email=<?= $_SESSION['email'] ?>"><img src="../images/default_user.jpeg" alt="User" class="w-full h-full object-cover"></a>
                    </div>
                    <!-- <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE] "></i> -->
                </button>

                
            </div>
        <?php } ?>





        <?php
        if (!isset($_SESSION['email'])) { ?>
            <button class="openPopupBtn">
                <a class="group relative inline-flex items-center justify-center text-white font-semibold 
              transition-transform duration-300 hover:scale-105">

                    <!-- Outer Animated Glowing Border -->
                    <span class="absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-cyan-400 
               animate-rotate-slow blur-md opacity-40 group-hover:opacity-70 transition-all duration-500"></span>

                    <!-- Middle Soft Glow Pulse -->
                    <span class="absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-cyan-400 
               opacity-20 animate-pulse-slow blur-xl group-hover:blur-lg group-hover:opacity-40"></span>

                    <!-- Inner Core Button -->
                    <span class="relative z-10 flex items-center space-x-2 bg-[#015551] px-6 py-2 rounded-full 
               border border-white/10 shadow-md backdrop-blur-md group-hover:shadow-lg">
                        <i class="fa-solid fa-star text-white text-xl animate-wiggle group-hover:animate-none"></i>
                        <span class="tracking-wide">SELL</span>
                    </span>

                </a>
            </button>
        <?php } else { ?>
            <a href="../sell/sell.php" class="group relative inline-flex items-center justify-center text-white font-semibold 
              transition-transform duration-300 hover:scale-105">

                <!-- Outer Animated Glowing Border -->
                <span class="absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-cyan-400 
               animate-rotate-slow blur-md opacity-40 group-hover:opacity-70 transition-all duration-500"></span>

                <!-- Middle Soft Glow Pulse -->
                <span class="absolute inset-0 rounded-full bg-gradient-to-tr from-yellow-400 via-pink-500 to-cyan-400 
               opacity-20 animate-pulse-slow blur-xl group-hover:blur-lg group-hover:opacity-40"></span>

                <!-- Inner Core Button -->
                <span class="relative z-10 flex items-center space-x-2 bg-[#015551] px-6 py-2 rounded-full 
               border border-white/10 shadow-md backdrop-blur-md group-hover:shadow-lg">
                    <i class="fa-solid fa-star text-white text-xl animate-wiggle group-hover:animate-none"></i>
                    <span class="tracking-wide">SELL</span>
                </span>

            </a>

            <style>
                @keyframes pulse-slow {

                    50%,
                    100% {
                        opacity: 0.3;
                    }

                    50% {
                        opacity: 0.6;
                    }
                }

                @keyframes wiggle {

                    50%,
                    100% {
                        transform: rotate(0deg);
                    }

                    25% {
                        transform: rotate(-5deg);
                    }

                    75% {
                        transform: rotate(5deg);
                    }
                }

                .animate-rotate-slow {
                    animation: rotate-slow 8s linear infinite;
                }

                .animate-pulse-slow {
                    animation: pulse-slow 3s ease-in-out infinite;
                }

                .animate-wiggle {
                    animation: wiggle 0.6s ease-in-out infinite;
                }
            </style>




        <?php } ?>






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



    </div>
</nav>


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