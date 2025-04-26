<?php include_once "../config/db.php";

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

    <form action="" method="post" enctype="multipart/form-data" >
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
            <div>
                <label class="block text-[#015551] mb-1">Book Title</label>
                <input type="text" placeholder="Enter book title (minimum 5)" name="title"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />
            </div>

            <!-- Author Name -->
            <div>
                <label class="block text-gray-600 mb-1">Author Name</label>
                <input type="text" placeholder="Enter author's name" name="author"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />
            </div>

            <!-- Mrp -->
            <div>
                <label class="block text-gray-600 mb-1">MRP (₹)</label>
                <input type="number" placeholder="Enter MRP (max ₹9999)" name="mrp"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />
            </div>

            <!-- Price -->
            <div>
                <label class="block text-gray-600 mb-1">Set Your Price (₹)</label>
                <input type="number" placeholder="Enter price (max ₹9999)" name="set_price"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />
            </div>
            <hr>

            <div>
                <label class="block text-gray-600 mb-1">Publish Year</label>
                <select
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"
                    name="publish_year">
                    <option>Publish Year</option>
                    <script>
                        for (let year = new Date().getFullYear(); year >= 1950; year--) {
                            document.write(`<option>${year}</option>`);
                        }
                    </script>
                </select>
            </div>

            <div>
                <label class="block text-gray-600 mb-1">Total Page</label>
                <input type="number" placeholder="Enter Book Pages" name="page"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" />
            </div>
            <!-- Description -->
            <div>
                <label class="block text-gray-600 mb-1">Description</label>
                <textarea rows="4" placeholder="Write a short description..." name="description"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"></textarea>
            </div>

            <!-- reason You sell -->
            <div>
                <label class="block text-gray-600 mb-1">Reason ? Why you Sell</label>
                <textarea rows="4" placeholder="Write a short Reason..." name="reason"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]"></textarea>
            </div>

            <!-- Book Condition -->
            <div>
                <label class="block text-gray-600 mb-1">Book Condition</label>
                <select name="book_condition"
                    class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]">
                    <option value="">Select Condition</option>
                    <option value="new">New</option>
                    <option value="like-new">Like New</option>
                    <option value="used">Used</option>
                    <option value="heavily-used">Heavily Used</option>
                </select>
            </div>
            <hr>


            <!-- Upload Photos -->
            <div>
                <label class="block text-gray-600 mb-2 text-lg">Upload Book Images</label>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

                    <!-- Image Box 1 -->
                    <div
                        class="relative border-2 border-dashed border-[#015551] rounded-md overflow-hidden h-32 flex justify-center items-center">
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
                <input type="text" placeholder=" "
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
                function toggleAddressForm() {
                    const form = document.getElementById('addressForm');
                    form.classList.toggle('hidden');
                }

                document.getElementById('newAddressForm').addEventListener('submit', function (e) {
                    e.preventDefault();
                    alert('Address saved!');
                    toggleAddressForm();
                });

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