<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>

<nav
    class="bg-[#015551] shadow-md border-b border-gray-200 shadow-md px-6 py-3 flex items-center justify-between sticky top-0 w-full h-20 z-50">
    <!-- Left Section: Logo -->
    <div class="flex items-center space-x-2">
        <a href="../index.php">
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
            <a href="../chat"
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
                        <img src="../images/default_user.jpeg" alt="User" class="w-full h-full object-cover">
                    </div>
                    <i class="fa-solid fa-chevron-down text-xs text-[#FDFBEE] "></i>
                </button>

                <!-- Dropdown Menu (Initially Hidden) -->
                <div id="profileDropdown"
                    class="absolute right-0 mt-5 w-56 bg-white border border-gray-200 rounded-sm shadow-lg hidden opacity-0 scale-95 transition-all duration-300 origin-top-right">
                    <!-- Top Section with User Info -->
                    <div class="p-4 border-b">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gray-300 rounded-full overflow-hidden">
                                <img src="../images/default_user.jpeg" alt="User" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-gray-900 font-semibold">Ankur Sharma</h3>
                                <p class="text-gray-500 text-sm"><?= $_SESSION['email'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Items -->
                    <ul class="py-2">
                        <li><a href="../profile.php?email=<?= $_SESSION['email'] ?>"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-user-circle mr-3 text-blue-600"></i> My Profile</a></li>
                        <li><a href="wallet.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-box mr-3 text-green-600"></i> Wallet</a></li>
                        <li><a href="../wishlist.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100"><i
                                    class="fa-solid fa-heart mr-3 text-red-500"></i> Wishlist
                                <?php
                                $email = $_SESSION['email'];
                                $findLikedQuery = $connect->query("SELECT * FROM liked WHERE UserEmail='$email'");
                                $likeBookCount = mysqli_num_rows($findLikedQuery);
                                if ($likeBookCount > 0) { ?>
                                    (<?= $likeBookCount ?>)
                                <?php } ?>
                            </a></li>
                        <li><a href="../settings.php" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100">
                                <i class="fa-solid fa-cog mr-3 text-yellow-500"></i> Settings</a></li>
                        <li><a href="../users_account/logout.php"
                                class="flex items-center px-4 py-3 text-red-600 hover:bg-gray-100 font-semibold">
                                <i class="fa-solid fa-sign-out-alt mr-3"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php } ?>





        






    </div>



    <!-- Mobile Icons -->
    <div class="md:hidden flex items-center space-x-2">
  <!-- Font Awesome Wallet Icon -->
  <i class="fas fa-wallet text-white text-xl"></i>

  <!-- Rupee Amount -->
  <span class="text-base font-semibold text-white">₹ <?= $total ?></span>
</div>

</nav>


<!-- mobile search ka kaam hai -->



<!-- Mobile Location Selector (Initially Hidden) -->
<!-- Overlay -->
<!-- POPUP WRAPPER -->




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

    // locationBtn.addEventListener('click', () => {
    //     locationDropdown.classList.toggle('hidden');
    //     locationDropdown.classList.toggle('opacity-0');
    //     locationDropdown.classList.toggle('scale-95');
    // });

    // Hide location dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!locationBtn.contains(event.target) && !locationDropdown.contains(event.target)) {
            locationDropdown.classList.add('hidden');
            locationDropdown.classList.add('opacity-0');
            locationDropdown.classList.add('scale-95');
        }
    });

    // Mobile Search Toggle
    // document.getElementById('mobileSearchBtn').addEventListener('click', function () {
    //     const searchBox = document.getElementById('mobileSearchBox');
    //     const locationBox = document.getElementById('mobileLocationBox');

    //     searchBox.classList.toggle('hidden');
    //     locationBox.classList.add('hidden');
    // });

    // Mobile Location Toggle
    // document.getElementById('mobileLocationBtn').addEventListener('click', function () {
    //     const locationBox = document.getElementById('mobileLocationBox');
    //     const searchBox = document.getElementById('mobileSearchBox');

    //     locationBox.classList.toggle('hidden');
    //     searchBox.classList.add('hidden');
    // });

</script>
