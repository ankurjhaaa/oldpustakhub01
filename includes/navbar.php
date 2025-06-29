<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

<nav
    class="bg-[#015551] shadow-md border-b border-gray-200 shadow-md px-6 py-3 flex items-center justify-between sticky top-0 w-full h-20 z-50">
    <!-- Left Section: Logo -->
    <div class="flex items-center space-x-2">
        <a href="index.php">
            <h1 class="text-[#FDFBEE] font-bold text-xl">PUSTAKHUB</h1>
        </a>
    </div>
    <?php
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $userlatlngQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
        $userlatlng = $userlatlngQuery->fetch_assoc();
        $latitude = $userlatlng['lat'] ?? null;
        $longitude = $userlatlng['lng'] ?? null;

        if ($latitude && $longitude) {
            $url = "https://nominatim.openstreetmap.org/reverse?lat=$latitude&lon=$longitude&format=json";

            $options = [
                "http" => [
                    "header" => "User-Agent: MyLocationApp/1.0\r\n"
                ]
            ];
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $data = json_decode($response, true);

            if (isset($data['address'])) {
                $address = $data['address'];

                if (!empty($address['county'])) {
                    $ADDRESS = $address['county'];
                } elseif (!empty($address['district'])) {
                    $ADDRESS = $address['district'];
                } elseif (!empty($address['state_district'])) {
                    $ADDRESS = $address['state_district'];
                } elseif (!empty($address['region'])) {
                    $ADDRESS = $address['region'];
                } else {
                    $ADDRESS = "India";

                }
            } else {
                echo "Invalid response from API.";
            }
        } else {

        }
    }
    ?>

    <!-- Middle Section: Location and Search (Hidden on Mobile) -->
    <div class="hidden md:flex items-center w-full md:w-1/2 lg:w-1/2 gap-2 mx-8 ps-10">
        <!-- Location Selector -->
        <div class="relative group flex-shrink-0">
            <button onclick="document.getElementById('mobileLocationPopup').classList.remove('hidden')"
                class="flex items-center space-x-1 text-gray-800 hover:text-blue-600 focus:outline-none">
                <i class="fa-solid fa-location-dot text-[#FDFBEE]"></i>
                <span class="text-sm text-[#FDFBEE] font-medium"><?php if (isset($_SESSION['email'])) {
                    if ($userlatlng['lat'] != "") {
                        echo $ADDRESS;
                    } else {
                        echo "New Delhi";
                    }
                } else {
                    echo "New Delhi";
                } ?></span>
                <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </div>
        <!-- Search Bar -->
        <div class="relative w-full max-w-xl mx-auto">
            <!-- ✅ SEARCH BAR -->
            <form action="filter.php" method="GET" class="flex-1">
                <div
                    class="flex items-center w-full border border-gray-300 rounded-md overflow-hidden shadow-sm bg-white px-3">
                    <button type="submit" name="find_book">
                        <i class="fa-solid fa-magnifying-glass text-gray-500 text-sm md:text-base mr-2"></i>
                    </button>
                    <input type="text" name="book_name" id="searchInput"
                        placeholder="Search for Products, Brands and More"
                        class="w-full px-2 py-2 text-sm md:text-base focus:outline-none text-gray-800"
                        onfocus="showDropdown()" oninput="filterSuggestions()">
                </div>
            </form>

            <!-- 🔻 SUGGESTION BOX -->
            <!-- <ul id="suggestionBox"
                class="hidden absolute z-50 bg-white w-full border border-gray-300 rounded-lg shadow-md max-h-72 overflow-y-auto text-sm text-gray-800 custom-scroll"> -->
            <!-- <li class="px-4 py-2 font-semibold text-gray-500 cursor-default select-none">Search
                    Book-Name,Category,Book-detail..</li> -->
            <?php
            //             $call_books_name = mysqli_query($connect, " SELECT title FROM books
            // UNION ALL
            // SELECT category_title FROM category
            // UNION ALL
            // SELECT subcat_title FROM sub_category ORDER BY RAND()");
            // while ($books_name = mysqli_fetch_array($call_books_name)) { 
            ?>
            <!-- <a href="filter.php?find_book=&book_name=<?php //echo  $books_name['title'] ?>"> -->
            <!-- <li -->
            <!-- class="px-4 py-2 cursor-pointer hover:bg-blue-50 transition-all duration-150 rounded flex items-center gap-2"> -->
            <!-- <i class="fa-solid fa-magnifying-glass text-xs"></i> <?php //echo $books_name['title'] ?> -->
            <!-- </li> -->
            <!-- </a> -->
            <?php //} ?>


            <!-- </ul> -->
        </div>

        <!-- 👇 Scrollbar Hiding (CSS) -->
        <!-- <style>
            .custom-scroll {
                scrollbar-width: none;
            }

            .custom-scroll::-webkit-scrollbar {
                display: none;
            }
        </style> -->

        <!-- ✅ JavaScript -->
        <!-- <script>
            const input = document.getElementById('searchInput');
            const suggestionBox = document.getElementById('suggestionBox');
            const allItems = Array.from(suggestionBox.querySelectorAll('li')).slice(1); // skip "Trending"

            function showDropdown() {
                suggestionBox.classList.remove('hidden');
            }

            function filterSuggestions() {
                const keyword = input.value.toLowerCase();
                let shown = 0;

                allItems.forEach(li => {
                    if (li.textContent.toLowerCase().includes(keyword) && shown < 7) {
                        li.classList.remove('hidden');
                        shown++;
                    } else {
                        li.classList.add('hidden');
                    }
                });
            }

            input.addEventListener('blur', () => {
                setTimeout(() => {
                    suggestionBox.classList.add('hidden');
                }, 200);
            });

            allItems.forEach(li => {
                li.addEventListener('click', () => {
                    input.value = li.textContent.trim();
                    suggestionBox.classList.add('hidden');
                });
            });
        </script> -->


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
                    <!-- <span
                        class="absolute -top-1.5 -right-1.5 bg-red-500 text-[#FDFBEE] text-xs font-bold px-2 py-0.5 rounded-full shadow-md">
                        3
                    </span> -->
                </div>

            </a>


            <!-- Profile Dropdown Button -->
            <div class="relative ">
                <button id="profileBtn"
                    class="flex items-center space-x-2 text-gray-800 hover:text-blue-600 focus:outline-none transition-all duration-200">
                    <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                        <!-- <img src="images/default_user.jpeg" alt="User" class=""> -->
                        <div
                            class="w-full h-full object-cover flex items-center justify-center rounded-full bg-[#015551]/10 text-[#015551] font-bold text-lg">
                            <?= strtoupper(substr($USERDETAIL['firstname'], 0, 1)) ?>
                        </div>
                    </div>

                    <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE] "></i>
                </button>

                <!-- Dropdown Menu (Initially Hidden) -->
                <div id="profileDropdown"
                    class="absolute right-0 mt-5 w-56 bg-white border border-gray-200 rounded-sm shadow-lg hidden opacity-0 scale-95 transition-all duration-300 origin-top-right">
                    <!-- Top Section with User Info -->
                    <div class="p-4 border-b">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                        <!-- <img src="images/default_user.jpeg" alt="User" class=""> -->
                        <div
                            class="w-full h-full object-cover flex items-center justify-center rounded-full bg-[#015551]/10 text-[#015551] font-bold text-lg">
                            <?= strtoupper(substr($USERDETAIL['firstname'], 0, 1)) ?>
                        </div>
                    </div>
                            <div>
                                <h3 class="text-gray-900 font-semibold"><?= $USERDETAIL['firstname'] . ' ' . $USERDETAIL['lastname'] ?></h3>
                                <p class="text-gray-500 text-sm"><?= $_SESSION['email'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <ul class="py-2">
                        <li><a href="profile.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-user-circle mr-3 text-blue-600"></i> My Profile</a></li>
                        <li><a href="wallet/wallet.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-box mr-3 text-green-600"></i> Wallet</a></li>
                        <li><a href="wishlist.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100"><i
                                    class="fa-solid fa-heart mr-3 text-red-500"></i> Wishlist
                                <?php
                                $email = $_SESSION['email'];
                                $findLikedQuery = $connect->query("SELECT * FROM liked WHERE UserEmail='$email'");
                                $likeBookCount = mysqli_num_rows($findLikedQuery);
                                if ($likeBookCount > 0) { ?>
                                    (<?= $likeBookCount ?>)
                                <?php } ?>
                            </a></li>
                        <li><a href="settings.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-cog mr-3 text-yellow-500"></i> Settings</a></li>
                        <li><a href="users_account/logout.php"
                                class="flex items-center px-4 py-3 text-red-600 hover:bg-gray-100 font-semibold">
                                <i class="fa-solid fa-sign-out-alt mr-3"></i> Logout</a></li>
                    </ul>
                </div>
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
            <?php if ($USERDETAIL['role'] == 2 && $USERDETAIL['isPlanActive'] == 0) { ?>
                <!-- Your Existing Button (No Changes) -->
                <button class="sell-btn group relative inline-flex items-center justify-center text-white font-semibold 
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
                </button>


            <?php } else { ?>
                <a href="sell/sell.php" class="group relative inline-flex items-center justify-center text-white font-semibold 
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
            <?php } ?>

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

        <?php if (isset($_SESSION['email'])) { ?>

            <button onclick="document.getElementById('mobileLocationPopup').classList.remove('hidden')"
                class="flex items-center space-x-1 text-gray-800 hover:text-blue-600 focus:outline-none">
                <i class="fa-solid fa-location-dot text-[#FDFBEE]"></i>
                <span class="text-sm text-[#FDFBEE] font-medium"><?php if ($userlatlng['lat'] != "") {
                    echo $ADDRESS;
                } else {
                    echo "New Delhi";
                } ?></span>
                <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE]"></i>
            </button> <?php } else { ?>

            <button onclick="document.getElementById('mobileLocationPopup').classList.remove('hidden')"
                class="flex items-center space-x-1 text-gray-800 hover:text-blue-600 focus:outline-none">
                <i class="fa-solid fa-location-dot text-[#FDFBEE]"></i>
                <span class="text-sm text-[#FDFBEE] font-medium">
                    India
                </span>
                <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE]"></i>
            </button>
        <?php } ?>

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
        <!-- Heading and content -->
        <div class="mb-4 p-4">
            <h3 class="font-semibold text-gray-900 mb-2">Select Delivery Location</h3>

            <?php if (!isset($_SESSION['email'])) { ?>
                <div
                    class="relative flex items-center w-full border border-gray-300 rounded-lg bg-white shadow-sm transition focus-within:ring-2 focus-within:ring-[#015551]">

                    <!-- Location icon button (gets location) -->
                    <button type="button" onclick="getLocation()" class="pl-3 text-[#015551] hover:text-[#013b3b]">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                    </button>

                    <!-- Readonly visible input for location -->
                    <input type="text" id="location" placeholder="please login to Continue"
                        class="flex-grow px-4 py-2 text-sm sm:text-base bg-transparent focus:outline-none text-gray-600"
                        readonly>

                    <!-- Submit button inside the same input area -->
                    <button type="submit" name="locatiomInsertbtn"
                        class="openPopupBtn px-4 py-1 mx-2 bg-[#015551] hover:bg-[#01403c] text-white text-sm sm:text-base font-medium rounded-md transition-all duration-300">
                        Login
                    </button>
                </div>

                <label for="location" class="block mt-2 text-sm text-gray-600">Your Location</label>
            <?php } else { ?>
                <form action="action/locationInsert.php" method="post" class="w-full max-w-xl mx-auto">
                    <div
                        class="relative flex flex-nowrap items-center w-full border border-gray-300 rounded-lg bg-white shadow-sm transition focus-within:ring-2 focus-within:ring-[#015551] overflow-hidden">

                        <!-- Location icon button (gets location) -->
                        <button type="button" onclick="getLocation()"
                            class="pl-3 text-[#015551] hover:text-[#013b3b] shrink-0">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </button>

                        <!-- Readonly visible input for location -->
                        <input type="text" id="location" placeholder="Use Current Location"
                            class="flex-grow min-w-0 px-4 py-2 text-sm sm:text-base bg-transparent focus:outline-none text-gray-700"
                            readonly>

                        <!-- Submit button inside the same input area -->
                        <button type="submit" name="locatiomInsertbtn"
                            class="shrink-0 px-4 py-1 mx-2 bg-[#015551] hover:bg-[#01403c] text-white text-sm sm:text-base font-medium rounded-md transition-all duration-300 whitespace-nowrap">
                            Submit
                        </button>

                        <!-- Hidden fields for lat/lng -->
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="hidden" value="<?= $email ?>" name="userEmail">
                    </div>
                </form>


            <?php } ?>

            <script>
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            const lat = position.coords.latitude;
                            const lng = position.coords.longitude;
                            document.getElementById('location').value = `Lat: ${lat}, Lng: ${lng}`;
                            document.getElementById('latitude').value = lat;
                            document.getElementById('longitude').value = lng;
                        }, function (error) {
                            alert("Location access denied or unavailable.");
                        });
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                }
            </script>
        </div>

        <!-- 🔍 Searchable Suggested Cities -->
        <div class="mt-6 px-4 sm:px-0">
            <h4 class="text-xs font-semibold text-gray-500 uppercase mb-2">Suggested Cities</h4>

            <!-- Search box -->
            <div class="relative mb-2">
                <input type="text" id="citySearch" placeholder="Search city..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 text-gray-800">
                <!-- <i
                    class="fa-solid fa-magnifying-glass absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i> -->
            </div>

            <!-- Suggested city list -->
            <ul id="cityList" class="space-y-1 max-h-60 overflow-y-auto">
                <?php
                $allCityQuery = $connect->query("SELECT DISTINCT state FROM books  ORDER BY district ASC");
                while ($allCity = $allCityQuery->fetch_array()) { ?>

                    <a href="filter.php?city=<?= htmlspecialchars($allCity['state']) ?>">
                        <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">
                            <?= $allCity['state'] ?>
                        </li>
                    </a>
                <?php } ?>

                <!-- <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Mumbai</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Bangalore</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Hyderabad</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Chennai</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Pune</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Jaipur</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Ahmedabad</li>
                <li class="py-2 px-3 bg-gray-50 hover:bg-blue-100 rounded cursor-pointer text-sm">Kolkata</li> -->
            </ul>
        </div>

        <script>
            const cityInput = document.getElementById("citySearch");
            const cityList = document.getElementById("cityList");
            const cities = Array.from(cityList.getElementsByTagName("li"));

            cityInput.addEventListener("input", function () {
                const filter = this.value.toLowerCase();
                cities.forEach(city => {
                    const text = city.textContent.toLowerCase();
                    city.style.display = text.includes(filter) ? "block" : "none";
                });
            });

            cities.forEach(city => {
                city.addEventListener("click", function () {
                    cityInput.value = this.textContent;
                });
            });
        </script>


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