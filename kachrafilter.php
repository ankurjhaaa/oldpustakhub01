<?php include_once "config/db.php"; ?>
<?php
if (isset($_GET['find_book'])) {
    $book_name = $_GET['book_name'];
}
if (isset($_GET['category'])) {
    $category_name = $_GET['category'];
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

    <div class="container mx-auto px-4 sm:px-6 py-6 min-h-screen">
    <?php
    $limit = 12; // कितनी books प्रति पेज दिखानी है
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Category या Search टाइटल
    if (isset($_GET['category'])) {
        $category_name = $_GET['category'];
        echo "<h2 class='text-2xl font-bold text-gray-800 mb-5'>Search Category '$category_name'</h2>";
        $where = "WHERE category='$category_name'";
    } else {
        $book_name = $_GET['search'] ?? '';
        echo "<h2 class='text-2xl font-bold text-gray-800 mb-5'>Search Book '$book_name'</h2>";
        $where = "WHERE title LIKE '%$book_name%' OR author LIKE '%$book_name%' OR book_condition LIKE '%$book_name%' OR state LIKE '%$book_name%' OR category LIKE '%$book_name%' OR set_price LIKE '%$book_name%' OR district LIKE '%$book_name%' OR sub_category LIKE '%$book_name%'";
    }

    // Total Books Count
    $count_result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM books $where");
    $count_row = mysqli_fetch_assoc($count_result);
    $total_books = $count_row['total'];
    $total_pages = ceil($total_books / $limit);

    // Books Query with LIMIT
    $call_books = mysqli_query($connect, "SELECT * FROM books $where ORDER BY book_id DESC LIMIT $offset, $limit");
    ?>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1 md:gap-4">
        <?php while ($books = mysqli_fetch_array($call_books)) { ?>
            <div class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
                <!-- Image Section -->
                <div class="relative w-full h-[160px] sm:h-[200px]">
                    <?php if (!isset($_SESSION['email'])) { ?>
                        <button class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group">
                            <i class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                        </button>
                    <?php } else { ?>
                        <form action="action/liked.php" method="post">
                            <button id="wishlistBtn" name="like"
                                class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group">
                                <div class="group w-fit cursor-pointer">
                                    <?php
                                    $bookId = $books['book_id'];
                                    $UserEmail = $_SESSION['email'];
                                    $CheckLiked = $connect->query("SELECT * FROM liked WHERE UserEmail = '$UserEmail' AND BookId = '$bookId'");
                                    $isLiked = ($CheckLiked->num_rows > 0);
                                    ?>
                                    <i class="fa-solid fa-heart text-<?= $isLiked ? 'red' : 'gray'; ?>-500 group-hover-red-500 transition-colors duration-300 text-xl"></i>
                                </div>
                            </button>
                            <input type="hidden" name="BookLikeId" value="<?= $books['book_id'] ?>">
                        </form>
                    <?php } ?>
                    <a href="view.php?bookId=<?= $books['book_id'] ?>">
                        <img src="images/<?= $books['img1'] ?>" class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="<?= $books['title'] ?>" loading="lazy">
                    </a>
                </div>

                <!-- Details Section -->
                <div class="p-2 flex-grow flex flex-col">
                    <div class="mb-1">
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm sm:text-base font-bold text-gray-900">₹<?= $books['set_price'] ?></h3>
                            <span class="line-through text-xs text-gray-500">₹<?= $books['mrp'] ?></span>
                            <span class="text-xs text-green-600 font-semibold">20% off</span>
                        </div>
                    </div>
                    <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1"><?= $books['title'] ?></p>
                    <p class="text-gray-600 text-xs sm:text-sm mb-1">Author: <?= $books['author'] ?></p>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span class="truncate">📍 <?= $books['district'] ?></span>
                        <span>🕒 Today</span>
                    </div>
                </div>
                <hr>
            </div>
        <?php } ?>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6 flex justify-center flex-wrap gap-2 text-sm">
        <?php if ($page > 1): ?>
            <a href="?<?= isset($_GET['category']) ? "category=$category_name" : "search=$book_name" ?>&page=<?= $page - 1 ?>"
               class="px-3 py-1 border border-gray-300 rounded hover:bg-[#015551] hover:text-white">Previous</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?<?= isset($_GET['category']) ? "category=$category_name" : "search=$book_name" ?>&page=<?= $i ?>"
               class="px-3 py-1 border <?= ($i == $page) ? 'bg-[#015551] text-white' : 'border-gray-300 hover:bg-gray-100' ?> rounded">
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?<?= isset($_GET['category']) ? "category=$category_name" : "search=$book_name" ?>&page=<?= $page + 1 ?>"
               class="px-3 py-1 border border-gray-300 rounded hover:bg-[#015551] hover:text-white">Next</a>
        <?php endif; ?>
    </div>

    <script>
        window.addEventListener('pageshow', function (event) {
            if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                location.reload();
            }
        });
    </script>
</div>


    <!-- Bottom Navbar (Visible on Mobile) -->
    <br><br><br>
    <?php include_once "includes/footer.php" ?>
    <?php include_once "includes/mob_search.php" ?>
    <?php include_once "includes/bottom_nav.php" ?>
    <?php include_once "includes/mob_foot.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>



</body>

</html>