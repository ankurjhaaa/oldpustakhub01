<?php include_once "../config/db.php";

if (!isset($_SESSION['email'])) {
    echo '<script>window.history.back();</script>';
}else {
  if($USERDETAIL['isPlanActive'] == 0){
  echo '<script>window.history.back();</script>';

  }
}

$email = $_SESSION['email'];
$getUserRole = $connect->query("SELECT role FROM users WHERE email='$email'");
$userRole = $getUserRole->fetch_assoc();
if ($userRole['role'] == 2) {
    $bookVersion = 1;
} else {
    $bookVersion = 0;
}

$subcat_id2 = $_GET['subcat_id'];
$call_subcat_name = $connect->query("SELECT * FROM sub_category where subcat_id='$subcat_id2'");
$sub_cate2_name = $call_subcat_name->fetch_array();
$cat3_id = $sub_cate2_name['cat_id'];
$call_cat3_name = $connect->query("SELECT * FROM category where cat_id='$cat3_id'");
$cate4_name = $call_cat3_name->fetch_array();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sell Your Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-gray-100 ">
    <?php include_once "../includes/mini_nav.php"; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-sm p-6 space-y-6 mt-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Sell Your Book</h2>

            <div class="border p-4 rounded-sm">
                <h2 class="text-lg font-bold text-gray-800 mb-2">SELECTED CATEGORY</h2>

                <div class="flex flex-wrap items-center text-sm text-gray-700 space-x-2">
                    <span><?= $cate4_name['category_title'] ?></span>
                    <span>/</span>
                    <span><?= $sub_cate2_name['subcat_title'] ?></span>
                    <a href="sell.php" class="text-blue-900 font-semibold underline hover:text-blue-700 ml-2">Change</a>
                </div>
            </div>

            <hr>


            <!-- Book Title -->
            <div class="mb-4">
                <label class="block text-[#015551] mb-1">Book Title</label>
                <input type="text" name="title" placeholder="Enter book title (minimum 5)"
                    value="<?= isset($_SESSION['old_data']['title']) ? htmlspecialchars($_SESSION['old_data']['title']) : '' ?>"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['title']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />

                <?php if (isset($_SESSION['form_errors']['title'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['title'] ?>
                    </p>
                <?php endif; ?>
            </div>


            <!-- Author Name -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Author Name</label>
                <input type="text" name="author" placeholder="Enter author's name"
                    value="<?= isset($_SESSION['old_data']['author']) ? htmlspecialchars($_SESSION['old_data']['author']) : '' ?>"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['author']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />

                <?php if (isset($_SESSION['form_errors']['author'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['author'] ?>
                    </p>
                <?php endif; ?>
            </div>


            <!-- MRP -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">MRP (₹)</label>
                <input type="number" name="mrp" placeholder="Enter MRP (max ₹9999)"
                    value="<?= isset($_SESSION['old_data']['mrp']) ? htmlspecialchars($_SESSION['old_data']['mrp']) : '' ?>"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['mrp']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />

                <?php if (isset($_SESSION['form_errors']['mrp'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['mrp'] ?>
                    </p>
                <?php endif; ?>
            </div>


            <!-- Set Price -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Set Your Price (₹)</label>
                <input type="number" name="set_price" placeholder="Enter price (max ₹9999)"
                    value="<?= isset($_SESSION['old_data']['set_price']) ? htmlspecialchars($_SESSION['old_data']['set_price']) : '' ?>"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['set_price']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />

                <?php if (isset($_SESSION['form_errors']['set_price'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['set_price'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <hr>

            <!-- Publish Year -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Publish Year</label>
                <select name="publish_year"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['publish_year']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]">

                    <option value="">Publish Year</option>
                    <?php
                    // Generating year options
                    for ($year = date("Y"); $year >= 1950; $year--) {
                        // Check if the current year is already selected
                        $selected = (isset($_SESSION['old_data']['publish_year']) && $_SESSION['old_data']['publish_year'] == $year) ? 'selected' : '';
                        echo "<option value='$year' $selected>$year</option>";
                    }
                    ?>
                </select>

                <?php if (isset($_SESSION['form_errors']['publish_year'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['publish_year'] ?>
                    </p>
                <?php endif; ?>
            </div>


            <!-- Total Page -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Total Pages</label>
                <input type="number" placeholder="Enter Book Pages" name="page"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['page']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"
                    value="<?= isset($_SESSION['old_data']['page']) ? $_SESSION['old_data']['page'] : '' ?>" />

                <?php if (isset($_SESSION['form_errors']['page'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['page'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label class="block text-gray-600 mb-1">Description</label>
                <textarea rows="4" placeholder="Write a short description..." name="description"
                    class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['description']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"><?= isset($_SESSION['old_data']['description']) ? $_SESSION['old_data']['description'] : '' ?></textarea>

                <?php if (isset($_SESSION['form_errors']['description'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $_SESSION['form_errors']['description'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php
            if ($userRole['role'] == 2) {
                // If user is a seller, don't show reason and book condition
            } else { ?>
                <!-- Reason: Why you Sell -->
                <div class="mb-4">
                    <label class="block text-gray-600 mb-1">Reason? Why you Sell</label>
                    <textarea rows="4" placeholder="Write a short Reason..." name="reason"
                        class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['reason']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"><?= isset($_SESSION['old_data']['reason']) ? $_SESSION['old_data']['reason'] : '' ?></textarea>

                    <?php if (isset($_SESSION['form_errors']['reason'])): ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?= $_SESSION['form_errors']['reason'] ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Book Condition -->
                <div class="mb-4">
                    <label class="block text-gray-600 mb-1">Book Condition</label>
                    <select name="book_condition"
                        class="w-full px-4 py-2 border-2 <?= isset($_SESSION['form_errors']['book_condition']) ? 'border-red-500' : 'border-[#015551]' ?> rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]">
                        <option value="">Select Condition</option>
                        <option value="new" <?= isset($_SESSION['old_data']['book_condition']) && $_SESSION['old_data']['book_condition'] == 'new' ? 'selected' : '' ?>>New</option>
                        <option value="like-new" <?= isset($_SESSION['old_data']['book_condition']) && $_SESSION['old_data']['book_condition'] == 'like-new' ? 'selected' : '' ?>>Like New</option>
                        <option value="used" <?= isset($_SESSION['old_data']['book_condition']) && $_SESSION['old_data']['book_condition'] == 'used' ? 'selected' : '' ?>>Used</option>
                        <option value="heavily-used" <?= isset($_SESSION['old_data']['book_condition']) && $_SESSION['old_data']['book_condition'] == 'heavily-used' ? 'selected' : '' ?>>Heavily Used
                        </option>
                    </select>

                    <?php if (isset($_SESSION['form_errors']['book_condition'])): ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?= $_SESSION['form_errors']['book_condition'] ?>
                        </p>
                    <?php endif; ?>
                </div>
            <?php } ?>




            <hr>


            <!-- Upload Photos -->
            <div>
                <label class="block text-gray-600 mb-2 text-lg">Upload Book Images</label>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

                    <!-- Image Box 1 -->
                    <div
                        class="relative border-2 border-dashed <?= isset($_SESSION['form_errors']['img1']) ? 'border-red-500' : '#015551' ?> rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img1" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview1')" />
                        <div id="preview1" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Thumbnail</span>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['form_errors']['img1'])): ?>
                        <p class="text-red-500 text-sm mt-1">
                            <?= $_SESSION['form_errors']['img1'] ?>
                        </p>
                    <?php endif; ?>


                    <!-- Image Box 2 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img2" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview2')" />
                        <div id="preview2" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Photo</span>
                        </div>
                    </div>

                    <!-- Image Box 3 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img3" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview3')" />
                        <div id="preview3" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Photo</span>
                        </div>
                    </div>

                    <!-- Image Box 4 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img4" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview4')" />
                        <div id="preview4" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Photo</span>
                        </div>
                    </div>
                    <!-- Image Box 5 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img5" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview5')" />
                        <div id="preview5" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Photo</span>
                        </div>
                    </div>
                    <!-- Image Box 6 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img6" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview6')" />
                        <div id="preview6" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Photo</span>
                        </div>
                    </div>
                    <!-- Image Box 7 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
                        <input type="file" name="img7" class="absolute inset-0 opacity-0 cursor-pointer z-10"
                            accept="image/*" onchange="showPreview(event, 'preview7')" />
                        <div id="preview7" class="flex flex-col items-center text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                            </svg>
                            <span class="text-sm">Add Photo</span>
                        </div>
                    </div>

                </div>
            </div>
            <!-- image prieview -->
            <script>
                function showPreview(event, previewId) {
                    const file = event.target.files[0];
                    const previewDiv = document.getElementById(previewId);

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewDiv.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-md" />`;
                        };
                        reader.readAsDataURL(file);
                    }
                }
            </script>


            <hr>
            <!-- Location -->
            <div class="relative">
                <label for="location" class="floating-label">Your Location</label>
                <input type="text" placeholder="Click Location Icon "
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"
                    id="location" readonly>
                <button type="button" onclick="getLocation()"
                    class="absolute right-3 top-1/2 transform -translate-y-1/5 text-[#015551] hover:text-blue-700">
                    <i class="fas fa-map-marker-alt text-xl"></i>
                </button>
            </div>
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">

            <script>
                // Toggle the address form visibility
                function toggleAddressForm() {
                    const form = document.getElementById('addressForm');
                    form.classList.toggle('hidden');
                }

                // Handle new address form submission
                document.getElementById('newAddressForm').addEventListener('submit', function (e) {
                    e.preventDefault();
                    alert('Address saved successfully!');
                    toggleAddressForm();
                });

                // Get the user’s current location
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            const lat = position.coords.latitude;
                            const lng = position.coords.longitude;

                            // Set the values in the input fields
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

            <?php include_once "location.php"; ?>

            <!-- Submit Button -->
            <div class="text-center">
                <button name="post_book"
                    class="bg-[#015551] text-white px-6 py-3 rounded-lg shadow-lg [#015551] transition duration-300">
                    Post Book for Sale
                </button>
            </div>
        </div>
    </form>
    <?php include_once "sell_action.php"; ?>


</body>

</html>