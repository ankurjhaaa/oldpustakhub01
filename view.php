<?php include_once "config/db.php";

$bookId = $_GET['bookId'];
if (isset($_GET['bookId'])) {
    $bookId = $_GET['bookId'];
    $insertView = mysqli_query($connect, "INSERT INTO book_views (book_id) VALUE ('$bookId')");
}
$CallBookDetail = $connect->query("SELECT * FROM books WHERE book_id='$bookId'");
$BookDetail = $CallBookDetail->fetch_assoc();

// get user detail 
$sellerEmail = $BookDetail['seller_email'];
$callUserDetail = $connect->query("SELECT * FROM users WHERE email='$sellerEmail'");
$userDetail = $callUserDetail->fetch_assoc();

if (isset($_SESSION['email'])) {
    $User = UserDetail();
}

//bg rough or white 
if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    $seeVersionQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
    $seeVersion = $seeVersionQuery->fetch_assoc();

    if ($seeVersion['seeVersion'] == 0) {
        $BG = "bg-[url('images/bodylogo.jpg')] bg-cover bg-center bg-no-repeat min-h-screen";
    } else {
        $BG = "bg-gray-200";
    }

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

<body class="<?= $BG ?>">
    <?php include_once "includes/navbar.php"; ?>
    <!-- Navigation would be included here -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-1 md:gap-8 ">
            <!-- Image Gallery Section -->
            <div class=" lg:col-span-8">
                <div class="flex flex-col gap-1">

                    <!-- Main Image Display -->
                    <div class="relative w-full ">
                        <button onclick="prevImage()"
                            class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-md shadow-md border border-gray-300 hover:bg-gray-100 transition z-10">
                            <i class="fas fa-chevron-left text-gray-700"></i>
                        </button>

                        <div class="relative w-full">
                            <!-- ЁЯЯа Orange "NEW" Badge -->
                            <?php if ($BookDetail['version'] == 1) { ?>
                                <div
                                    class="absolute top-2 left-2 bg-orange-500 text-white text-[11px] sm:text-xs font-bold px-2 py-[2px] rounded shadow-md uppercase tracking-wide z-10">
                                    NEW Book
                                </div>

                            <?php } else { ?>
                                <div
                                    class="absolute top-2 left-2 bg-gray-500 text-white text-[11px] sm:text-xs font-bold px-2 py-[2px] rounded shadow-md uppercase tracking-wide z-10">
                                    OLD Book
                                </div>

                            <?php } ?>

                            <!-- ЁЯУЪ Main Image -->
                            <img id="mainImage" src="images/<?= $BookDetail['img1'] ?>"
                                class="w-full h-[400px] sm:h-[500px] object-contain rounded-md shadow bg-white p-2 cursor-zoom-in"
                                alt="Book Cover" onclick="openFullScreen()">
                        </div>


                        <button onclick="nextImage()"
                            class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white/80 p-2 rounded-md shadow-md border border-gray-300 hover:bg-gray-100 transition z-10">
                            <i class="fas fa-chevron-right text-gray-700"></i>
                        </button>
                    </div>


                    <!-- Thumbnails Section -->
                    <div
                        class="flex bg-white rounded-md gap-3  overflow-x-auto sm:justify-start md:justify-start  sm:px-0 scrollbar-hide md:flex-wrap hidden">

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

                        <img src="images/<?= $BookDetail['img5'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(4)">

                        <img src="images/<?= $BookDetail['img6'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(5)">

                        <img src="images/<?= $BookDetail['img7'] ?>"
                            class="thumbnail w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-md cursor-pointer border-2 border-gray-200 hover:border-blue-400 transition-all duration-200"
                            onclick="changeImage(6)">

                    </div>
                    <!-- description   -->
                    <!-- Tab Navigation -->
                    <div class="border border-gray-300 rounded-md bg-white p-4">
                        <div class="flex border-b mb-4">
                            <button class="tab-btn px-4 py-2 font-semibold text-green-600 border-b-2 border-green-600"
                                onclick="openTab(event, 'details')">Description</button>
                            <button class="tab-btn px-4 py-2 text-gray-600"
                                onclick="openTab(event, 'author')">Details</button>
                        </div>

                        <!-- Details Content -->
                        <div id="details" class="tab-content block">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                            <p class="text-sm font-medium text-gray-800 whitespace-pre-wrap break-words max-h-60 overflow-y-auto"><?= $BookDetail['description'] ?></p>
                            
                        </div>

                        <!-- Author Content -->
                        <div id="author" class="tab-content hidden">
                            <h2 class="text-lg font-semibold text-gray-900 mb-2">Book Details</h2>
                            <p class="text-sm text-gray-800"><strong>Author : </strong><?= $BookDetail['author'] ?></p>
                            <p class="text-sm text-gray-800"><strong>Publish Year : </strong><?= $BookDetail['publish_year'] ?></p>
                            <p class="text-sm text-gray-800"><strong>Book Condition : </strong><?= $BookDetail['book_condition'] ?></p>
                            <p class="text-sm text-gray-800"><strong>Category : </strong><?= $BookDetail['category'] ?></p>
                            <p class="text-sm text-gray-800"><strong>Sub Category : </strong><?= $BookDetail['sub_category'] ?></p>
                            <p class="text-sm text-gray-800"><strong>Book Version : </strong><?= $BookDetail['version'] ?></p>
                            <p class="text-sm text-gray-800"><strong>Total Pages : </strong><?= $BookDetail['page'] ?></p>
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
                    <!-- Header Row -->
                    <div class="flex justify-between items-start mb-2">
                        <!-- Title -->
                        <h1 class="text-xl md:text-2xl font-bold text-gray-800"><?= $BookDetail['title'] ?></h1>

                        <!-- Share & Wishlist -->
                        <div class="flex space-x-4">
                            <button onclick="shareNow()" class="text-gray-600 hover:text-blue-600"
                                title="Share this book">
                                <i class="fas fa-share-alt text-lg md:text-xl"></i>
                            </button>
                            <a href="wishlist.php" class="text-gray-600 hover:text-red-600" title="Save to wishlist">
                                <i class="fas fa-heart text-lg md:text-xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Author -->
                    <p class="text-xs md:text-sm text-gray-500 mb-4">
                        Author:
                        <a href="filter.php?authorName=<?= $BookDetail['author'] ?>"
                            class="text-blue-800 hover:underline">
                            <?= $BookDetail['author'] ?>
                        </a>
                    </p>

                    <!-- Price & Info -->
                    <div class="mb-4">
                        <span
                            class="text-2xl md:text-3xl font-bold text-[#015551]">₹<?= $BookDetail['set_price'] ?></span>
                        <span
                            class="text-xs md:text-sm text-gray-500 ml-2 line-through">₹<?= $BookDetail['mrp'] ?></span>
                        <div class="text-2xs md:text-xs text-gray-500 mt-1">
                            👁️
                            <?= mysqli_num_rows(mysqli_query($connect, "SELECT * FROM book_views WHERE book_id='$bookId'")) ?>
                            views
                            🕒 <?= date("d M Y", strtotime($BookDetail['post_date'])) ?>
                        </div>
                    </div>

                    <!-- Condition (Only for version 0) -->
                    <?php if ($BookDetail['version'] == 0): ?>
                        <p class="text-xs md:text-sm text-gray-600">
                            <i class="fas fa-clipboard-check mr-1"></i>
                            Condition: <?= $BookDetail['book_condition'] ?>
                        </p>
                    <?php endif; ?>

                </div>

                <!-- Share Script -->
                <script>
                    function shareNow() {
                        if (navigator.share) {
                            navigator.share({
                                title: document.title,
                                text: 'Check out this book on Pustakhub!',
                                url: window.location.href
                            }).catch(console.error);
                        } else {
                            alert("Sharing not supported in this browser.");
                        }
                    }
                </script>





                <div class="bg-white p-5 rounded-md shadow-sm border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center space-x-3">
                            <a href="booksFrom.php?email=<?= $userDetail['email'] ?>"
                                class="flex items-center justify-center">
                                <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-teal-700"></i>
                                </div>
                                <div class="ms-2">
                                    <h3 class="font-semibold text-gray-800 "><?= $userDetail['firstname'] ?>
                                        <?= $userDetail['lastname'] ?>
                                    </h3>
                                    <p class="text-xs text-gray-500">Member since 2022</p>
                                </div>
                            </a>
                        </div>
                        <a href="booksFrom.php?email=<?= $userDetail['email'] ?>"
                            class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <?php if (isset($_SESSION['email'])) { ?>
                        <?php if ($email == $userDetail['email']) { ?>
                            <div class="flex gap-2 w-full">

                                <!-- Change Button (60%) -->

                                <!-- Trigger Button -->
                                <button onclick="openChangeModal()"
                                    class="flex items-center justify-center gap-2 w-[60%] bg-[#015551] hover:bg-[#027c77] text-white font-semibold text-base px-4 py-2.5 rounded-md transition-all duration-300 shadow-md">
                                    <i class="fas fa-edit text-white"></i>
                                    <span>Change</span>
                                </button>

                                <!-- Modal Background -->
                                <div id="changeModal"
                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                                    <!-- Modal Box -->
                                    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Feature Not Available</h2>
                                        <p class="text-gray-600 mb-6">
                                            The "Change" feature is not available yet. If you want to update this product,
                                            please delete it and upload a new book with the changes.
                                        </p>

                                        <!-- Buttons -->
                                        <div class="flex justify-end gap-4">
                                            <form method="post" action="includes/deleteBook.php">
                                                <input type="hidden" name="deleteBookId" value="<?= $BookDetail['book_id'] ?>">
                                                <button type="submit" name="deleteBook"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md shadow">
                                                    Delete
                                                </button>
                                            </form>

                                            <button onclick="closeChangeModal()"
                                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-4 py-2 rounded-md shadow">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- JavaScript for Modal -->
                                <script>
                                    function openChangeModal() {
                                        document.getElementById('changeModal').classList.remove('hidden');
                                    }

                                    function closeChangeModal() {
                                        document.getElementById('changeModal').classList.add('hidden');
                                    }
                                </script>



                                <!-- Remove Button (40%) -->
                                <!-- Remove Button -->
                                <button onclick="openModal()"
                                    class="flex items-center justify-center gap-2 w-[40%] bg-[#015551] hover:bg-[#027c77] text-white font-semibold text-base px-4 py-2.5 rounded-md transition-all duration-300 shadow-md">
                                    <i class="fas fa-trash-alt text-white"></i>
                                    <span>Remove</span>
                                </button>

                                <!-- Modal Background -->
                                <div id="deleteModal"
                                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                                    <div class="bg-white rounded-lg shadow-lg w-[90%] max-w-md p-6 text-center">

                                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Are you sure you want to delete
                                            this Book?</h2>

                                        <div class="flex justify-center gap-4">
                                            <form action="includes/deleteBook.php" method="post">
                                                <input type="hidden" name="deleteBookId" value="<?= $BookDetail['book_id'] ?>">
                                                <!-- Yes Button -->
                                                <button type="submit" name="deleteBook"
                                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Yes</button>
                                            </form>

                                            <!-- No Button -->
                                            <button onclick="closeModal()"
                                                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">No</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- JavaScript -->
                                <script>
                                    function openModal() {
                                        document.getElementById('deleteModal').classList.remove('hidden');
                                    }

                                    function closeModal() {
                                        document.getElementById('deleteModal').classList.add('hidden');
                                    }
                                </script>


                            </div>
                        <?php } else { ?>
                            <a href="chat/message.php?user=<?= $userDetail['id'] ?>&bookId=<?= $BookDetail['book_id'] ?>"
                                class="flex items-center justify-center gap-2 w-full md:w-auto bg-[#015551] hover:bg-[#027c77] text-white font-semibold text-base px-6 py-2.5 rounded-lg transition-all duration-300 shadow-md">
                                <i class="fas fa-comment-dots"></i>
                                <span>Chat with Seller</span>
                            </a>
                        <?php } ?>
                    <?php } else { ?>
                        <a
                            class="flex items-center justify-center gap-2 w-full md:w-auto bg-[#015551] hover:bg-[#027c77] text-white font-semibold text-base px-6 py-2.5 rounded-lg transition-all duration-300 shadow-md">
                            <i class="fas fa-comment-dots"></i>
                            <span>Login to Chat</span>
                        </a>

                    <?php } ?>

                </div>

                <!-- posted on  -->
                <div class="border border-gray-300 rounded-md p-4 bg-white">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">Posted in</h2>

                    <p class="text-sm text-blue-900"><?= $BookDetail['district'] ?>, <?= $BookDetail['state'] ?></p>
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
                    <p class="text-sm text-gray-600 mt-2"><?= $BookDetail['district'] ?>, <?= $BookDetail['state'] ?>
                    </p>
                </div>

            </div>
        </div>
    </div>


    <!-- Fullscreen Image Modal -->
    <div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center hidden">
        <button onclick="prevImage()"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-md shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-left text-gray-700"></i>
        </button>

        <img id="fullscreenImage" class="max-w-[90vw] max-h-[90vh] object-contain">

        <button onclick="nextImage()"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white p-3 rounded-md shadow-lg hover:bg-gray-100 transition z-10">
            <i class="fas fa-chevron-right text-gray-700"></i>
        </button>

        <button onclick="closeFullScreen()"
            class="absolute top-6 right-6 text-white text-3xl hover:text-gray-300 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>









    <div class="fixed bottom-0 left-0 right-0 bg-[#F4F4F2] text-white flex justify-around p-3 md:hidden shadow-lg z-50">

        <a href="chat/message.php?user=<?= $userDetail['id'] ?>&bookId=<?= $BookDetail['book_id'] ?>"
            class="flex items-center gap-2 px-4 py-2 rounded-md bg-[#015551]  transition duration-300 text-sm font-semibold">
            <i class="fas fa-comments"></i>
            Chat With Ankur
        </a>

        <?php
        // PHP рдореЗрдВ рдЕрдкрдирд╛ dynamic number рд▓реЛ
        $pnumber = $userDetail['mobile'];
        $phoneNumber = $pnumber; // тЮбя╕П Example (country code + number)
        ?>

        <button onclick="handleCall()"
            class="flex items-center gap-2 px-4 py-2 rounded-md bg-[#015551]  transition duration-300 text-sm font-semibold">
            <i class="fas fa-phone-alt"></i>
            Call
        </button>
        <!-- <button 
            class="flex items-center gap-2 bg-[#015551] hover:bg-[#01403f] text-white font-semibold py-2 px-4 rounded-md me-6 shadow-md">
            <i class="fa-solid fa-phone text-xl"></i>
            Call
        </button> -->

        <script>
            // PHP рд╕реЗ рдирдВрдмрд░ JS рдореЗрдВ рдкрд╛рд╕ рдХрд░ рд░рд╣реЗ рд╣реИрдВ
            const phoneNumber = "<?= $phoneNumber ?>";

            function handleCall() {
                if (window.innerWidth <= 768) {
                    // ЁЯСЙ Mobile device
                    window.location.href = `tel:${phoneNumber}`;
                } else {
                    // ЁЯСЙ Desktop/Laptop
                    window.open(`https://wa.me/${phoneNumber}`, '_blank');
                }
            }
        </script>

    </div>
    <br>
    <br>
    <br>
    <?php include_once "includes/footer.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>





    <script>
        const images = [
            "images/<?= $BookDetail['img1'] ?>",
            "images/<?php if ($BookDetail['img2'] != "") {
                echo $BookDetail['img2'];
            } else {
                echo "No_Image_Available.jpg";
            } ?>",

            "images/<?php if ($BookDetail['img3'] != "") {
                echo $BookDetail['img3'];
            } else {
                echo "No_Image_Available.jpg";
            } ?>",

            "images/<?php if ($BookDetail['img4'] != "") {
                echo $BookDetail['img4'];
            } else {
                echo "No_Image_Available.jpg";
            } ?>",
            "images/<?php if ($BookDetail['img5'] != "") {
                echo $BookDetail['img5'];
            } else {
                echo "No_Image_Available.jpg";
            } ?>",
            "images/<?php if ($BookDetail['img6'] != "") {
                echo $BookDetail['img6'];
            } else {
                echo "No_Image_Available.jpg";
            } ?>",
            "images/<?php if ($BookDetail['img7'] != "") {
                echo $BookDetail['img7'];
            } else {
                echo "No_Image_Available.jpg";
            } ?>",


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