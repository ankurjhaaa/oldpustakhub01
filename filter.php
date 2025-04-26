<?php include_once "config/db.php"; ?>
<?php
if (isset($_GET['find_book'])) {
    $book_name = $_GET['book_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pustakhub.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-[url('images/bodylogo.jpg')] bg-cover bg-center bg-no-repeat min-h-screen">
    <!-- Sticky Navbar -->
    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/category.php" ?>

    <!-- filter books  -->
    <div class="container mx-auto px-4 sm:px-6 py-6 min-h-screen">
        <h2 class="text-2xl font-bold text-gray-800 mb-5">Search Book '<?= $book_name ?>' </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1  md:gap-4">
            <?php
            $call_books = mysqli_query($connect, "SELECT * FROM books WHERE title LIKE '%$book_name%' or author LIKE '%$book_name%' or book_condition LIKE '%$book_name%' or state LIKE '%$book_name%' or category LIKE '%$book_name%' or set_price LIKE '%$book_name%' or book_condition LIKE '%$book_name%' or district LIKE '%$book_name%' or sub_category LIKE '%$book_name%'");
            while ($books = mysqli_fetch_array($call_books)) { ?>
                <div
                    class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
                    <!-- Image Section -->
                    <div class="relative w-full h-[160px] sm:h-[200px]">
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <button
                                class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                                aria-label="Add to Wishlist">
                                <i
                                    class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                            </button>
                        <?php } else { ?>
                            <form action="action/liked.php" method="post">
                                <button id="wishlistBtn" name="like"
                                    class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                                    aria-label="Add to Wishlist">
                                    <div class="group w-fit cursor-pointer">
                                        <?php
                                        $bookId = $books['book_id'];
                                        $UserEmail = $_SESSION['email'];
                                        $CheckLiked = $connect->query("SELECT * FROM liked WHERE UserEmail = '$UserEmail' AND BookId = '$bookId'");
                                        $isLiked = ($CheckLiked->num_rows > 0);
                                        ?>
                                        <i
                                            class="fa-solid fa-heart text-<?= $isLiked ? 'red' : 'gray'; ?>-500 group-hover-red-500 transition-colors duration-300 text-xl"></i>
                                    </div>
                                </button>
                                <input type="hidden" name="BookLikeId" value="<?= $books['book_id'] ?>">
                            </form>
                        <?php } ?>
                        <a href="view.php?bookId=<?= $books['book_id'] ?>">
                            <img src="images/<?= $books['img1'] ?>"
                                class="w-full h-full object-cover hover:shadow-lg rounded-sm border"
                                alt="<?= $books['title'] ?>" loading="lazy">
                        </a>
                    </div>

                    <!-- Details Section -->
                    <div class="p-2 flex-grow flex flex-col">
                        <!-- Price -->
                        <div class="mb-1">
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">₹<?= $books['set_price'] ?></h3>
                                <span class="line-through text-xs text-gray-500">₹<?= $books['mrp'] ?></span>
                                <span class="text-xs text-green-600 font-semibold">20% off</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                            <?= $books['title'] ?>
                        </p>

                        <!-- Author -->
                        <p class="text-gray-600 text-xs sm:text-sm mb-1">
                            Author: <?= $books['author'] ?>
                        </p>

                        <!-- Location & Time -->
                        <div class="flex justify-between text-xs text-gray-500">
                            <span class="truncate">📍 <?= $books['district'] ?></span>
                            <span>🕒 Today</span>
                        </div>
                    </div>
                    <hr>
                </div>

            <?php } ?>
            <!-- Product Card 1 -->
            <script>
                window.addEventListener('pageshow', function (event) {
                    if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                        location.reload();
                    }
                });
            </script>
        </div>
    </div>




    <!-- Bottom Navbar (Visible on Mobile) -->
    <br><br><br>
    <?php include_once "includes/footer.php" ?>
    <?php include_once "includes/bottom_nav.php" ?>
    <?php include_once "includes/mob_foot.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>



</body>

</html>