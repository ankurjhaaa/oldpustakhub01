<?php include_once "config/db.php"; 

$bookId = $_GET['bookId'];
$CallBookDetail = $connect->query("SELECT * FROM books WHERE book_id='$bookId'");
$BookDetail = $CallBookDetail->fetch_assoc();

// get user detail 
$sellerEmail = $BookDetail['seller_email'];
$callUserDetail = $connect->query("SELECT * FROM users WHERE email='$sellerEmail'");
$userDetail = $callUserDetail->fetch_assoc();

if(isset($_SESSION['email'])){
    $User = UserDetail();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details | PustakHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <style>
        .thumbnail.active {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .image-gallery {
            height: 500px;
        }

        @media (max-width: 768px) {
            .image-gallery {
                height: 350px;
            }
        }
    </style>
</head>

<body class="bg-[url('images/bodylogo.jpg')] bg-cover bg-center bg-no-repeat min-h-screen">
    <?php include_once "includes/navbar.php"; ?>
    <!-- Navigation would be included here -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-1 md:gap-8 ">
            <!-- Image Gallery Section -->
            <div class=" lg:col-span-8">
                <div class="flex flex-col gap-1">

                    <!-- Main Image Display -->
                    <div class="relative w-full">
                        <button onclick="prevImage()"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-md shadow-md border border-gray-300 hover:bg-gray-100 transition z-10">
                            <i class="fas fa-chevron-left text-gray-700"></i>
                        </button>

                        <img id="mainImage" src="images/<?= $BookDetail['img1'] ?>"
                            class="w-full max-h-[400px] sm:max-h-[500px] object-contain rounded-md shadow bg-white p-2 cursor-zoom-in"
                            alt="Book Cover" onclick="openFullScreen()">

                        <button onclick="nextImage()"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-md shadow-md border border-gray-300 hover:bg-gray-100 transition z-10">
                            <i class="fas fa-chevron-right text-gray-700"></i>
                        </button>
                    </div>
                    

                    <!-- Thumbnails Section -->
                    <div
                        class="flex bg-white rounded-md gap-3  overflow-x-auto sm:justify-start md:justify-start  sm:px-0 scrollbar-hide md:flex-wrap ">

                        <img src="images/<?= $BookDetail['img1'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200 ms-1"
                            onclick="changeImage(0)">

                        <img src="images/<?= $BookDetail['img2'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(1)">

                        <img src="images/<?= $BookDetail['img3'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(2)">

                        <img src="images/<?= $BookDetail['img4'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(3)">
                    </div>
                    <!-- description   -->
                    <!-- Tab Navigation -->
                    <div class="border border-gray-300 rounded-md bg-white p-4">
                        <div class="flex border-b mb-4">
                            <button class="tab-btn px-4 py-2 font-semibold text-green-600 border-b-2 border-green-600"
                                onclick="openTab(event, 'details')">Details</button>
                            <button class="tab-btn px-4 py-2 text-gray-600"
                                onclick="openTab(event, 'author')">Author</button>
                        </div>

                        <!-- Details Content -->
                        <div id="details" class="tab-content block">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                            <p class="text-sm font-medium text-gray-800"><?= $BookDetail['description']  ?></p>
                            <p class="text-sm text-gray-700"><?= $BookDetail['reason']  ?></p>
                        </div>

                        <!-- Author Content -->
                        <div id="author" class="tab-content hidden">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Author</h2>
                            <p class="text-sm text-gray-800"><?= $BookDetail['author']  ?></p>
                        </div>
                    </div>

                    <script>
                        function openTab(evt, tabName) {
                            const contents = document.querySelectorAll(".tab-content");
                            const tabs = document.querySelectorAll(".tab-btn");

                            contents.forEach(c => c.classList.add("hidden"));
                            tabs.forEach(t => {
                                t.classList.remove("text-green-600", "border-b-2", "border-green-600");
                                t.classList.add("text-gray-600");
                            });

                            document.getElementById(tabName).classList.remove("hidden");
                            evt.currentTarget.classList.remove("text-gray-600");
                            evt.currentTarget.classList.add("text-green-600", "border-b-2", "border-green-600");
                        }
                    </script>


                </div>
            </div>


            <!-- Product Details Section -->
            <div class="lg:col-span-4 space-y-1">
                <div class="bg-white p-5 rounded-md shadow-sm border border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2"><?= $BookDetail['title']  ?></h1>
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <span class="text-3xl font-bold text-[#015551]">₹<?= $BookDetail['set_price']  ?></span>
                            <span class="text-sm text-gray-500 ml-1">(MRP:-<?= $BookDetail['mrp']  ?>)</span>
                        </div>
                        <div class="flex space-x-3">
                            <button class="text-gray-500 hover:text-blue-500 transition-colors" title="Share">
                                <i class="fas fa-share-alt"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-500 transition-colors" title="Save">
                                <a href="wishlist.php"><i class="fas fa-heart "></i></a>
                            </button>
                        </div>
                        
                    </div>

                    <div class="space-y-1 text-sm text-gray-600">
                        <!-- <p><i class="fas fa-book text-blue-500 mr-2"></i> Complete set of NEET preparation books
                            including modules</p> -->
                        <p><i class="fas fa-clipboard-check text-blue-500 mr-2"></i>  condition ( <?= $BookDetail['book_condition']  ?> )</p>
                        
                    </div>
                </div>




                <div class="bg-white p-5 rounded-md shadow-sm border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-teal-700"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800"><?= $userDetail['firstname'] ?> <?= $userDetail['lastname'] ?></h3>
                                <p class="text-xs text-gray-500">Member since 2022</p>
                            </div>
                        </div>
                        <a href="profile.php?email=<?= $userDetail['email'] ?>" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <button
                        class="w-full bg-[#015551] hover:bg-[#027c77] text-white font-medium py-2.5 px-4 rounded-lg transition-colors duration-300">
                        <i class="fas fa-comment-dots mr-2"></i> Chat with Seller
                    </button>
                </div>

                <!-- posted on  -->
                <div class="border border-gray-300 rounded-md p-4 bg-white">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">Posted in</h2>

                    <p class="text-sm text-blue-900"><?= $BookDetail['district']  ?>, <?= $BookDetail['state']  ?></p>
                </div>

                <div class="bg-white p-5 rounded-md shadow-sm border border-gray-200">
                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i> Location
                    </h3>
                    <div class="rounded-lg overflow-hidden" style="height: 300px;">
                        <iframe class="w-full h-full border-0"
                            src="https://maps.google.com/maps?q=<?= $BookDetail['latitude'] ?>,<?= $BookDetail['longitude'] ?>&z=15&output=embed"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p class="text-sm text-gray-600 mt-2"><?= $BookDetail['district']  ?>, <?= $BookDetail['state']  ?></p>
                </div>

            </div>
        </div>
    </div>


    <!-- Fullscreen Image Modal -->
    <div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center hidden">
        <button onclick="prevImage()"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-left text-gray-700"></i>
        </button>

        <img id="fullscreenImage" class="max-w-[90vw] max-h-[90vh] object-contain">

        <button onclick="nextImage()"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-right text-gray-700"></i>
        </button>

        <button onclick="closeFullScreen()"
            class="absolute top-6 right-6 text-white text-3xl hover:text-gray-300 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>


    <?php include_once "includes/books.php"; ?>







    <div class="fixed bottom-0 left-0 right-0 bg-[#F4F4F2] text-white flex justify-around p-3 md:hidden shadow-lg z-50">

        <button
            class="flex items-center gap-2 px-4 py-2 rounded-md bg-[#015551] hover:bg-[#00a1a8] transition duration-300 text-sm font-semibold">
            <i class="fas fa-comments"></i>
            Chat With Ankur
        </button>

        <button
            class="flex items-center gap-2 px-4 py-2 rounded-md bg-[#015551] hover:bg-[#00a1a8] transition duration-300 text-sm font-semibold">
            <i class="fas fa-phone-alt"></i>
            Call
        </button>

    </div>
    <br>
    <br>
    <br>
    <?php include_once "includes/footer.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>





    <script>
        const images = [
            "images/<?= $BookDetail['img1'] ?>",
            "images/<?= $BookDetail['img2'] ?>",
            "images/<?= $BookDetail['img3'] ?>",
            "images/<?= $BookDetail['img4'] ?>"
        ];
        let currentIndex = 0;
        const thumbnails = document.querySelectorAll('.thumbnail');

        function updateActiveThumbnail() {
            thumbnails.forEach((thumb, index) => {
                thumb.classList.toggle('active', index === currentIndex);
            });
        }

        function changeImage(index) {
            currentIndex = index;
            document.getElementById("mainImage").src = images[currentIndex];
            updateActiveThumbnail();
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            document.getElementById("mainImage").src = images[currentIndex];
            document.getElementById("fullscreenImage").src = images[currentIndex];
            updateActiveThumbnail();
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            document.getElementById("mainImage").src = images[currentIndex];
            document.getElementById("fullscreenImage").src = images[currentIndex];
            updateActiveThumbnail();
        }

        function openFullScreen() {
            document.getElementById("fullscreenImage").src = images[currentIndex];
            document.getElementById("fullscreenModal").classList.remove("hidden");
            document.body.style.overflow = "hidden";
        }

        function closeFullScreen() {
            document.getElementById("fullscreenModal").classList.add("hidden");
            document.body.style.overflow = "auto";
        }

        // Keyboard navigation
        document.addEventListener("keydown", function (event) {
            if (!document.getElementById("fullscreenModal").classList.contains("hidden")) {
                if (event.key === "Escape") closeFullScreen();
            }
            if (event.key === "ArrowLeft") prevImage();
            if (event.key === "ArrowRight") nextImage();
        });

        // Initialize
        updateActiveThumbnail();
    </script>


</body>

</html>