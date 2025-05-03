<?php
// Pagination Setup
$limit = 10; // Number of books per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetching user location if logged in
$books_query = "";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $callUserAddressQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
    $callUserAddress = $callUserAddressQuery->fetch_assoc();
    $user_lat = $callUserAddress['lat'];
    $user_lng = $callUserAddress['lng'];

    if ($user_lat != "") {
        $books_query = "SELECT *, (
            6371 * ACOS(
                COS(RADIANS($user_lat)) * COS(RADIANS(latitude)) *
                COS(RADIANS(longitude) - RADIANS($user_lng)) +
                SIN(RADIANS($user_lat)) * SIN(RADIANS(latitude))
            )
        ) AS distance
        FROM books
        WHERE version='$seeVersionn'
        ORDER BY distance ASC
        LIMIT $limit OFFSET $offset";
    }
} elseif (!isset($_SESSION['email'])) {
    $books_query = "SELECT * FROM books LIMIT $limit OFFSET $offset";
} else {
    $books_query = "SELECT * FROM books WHERE version='$seeVersionn' LIMIT $limit OFFSET $offset";
}

// Run paginated query
$call_books = mysqli_query($connect, $books_query);

// Get total number of books for pagination
$total_books_result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM books");
$total_books_row = mysqli_fetch_assoc($total_books_result);
$total_books = $total_books_row['total'];
$total_pages = ceil($total_books / $limit);
?>

<div class="container mx-auto px-4 sm:px-6 py-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-5">Recommendation Books</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1 md:gap-4">
        <?php while ($books = mysqli_fetch_array($call_books)) { ?>
            <div class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
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
                        <img src="images/<?= $books['img1'] ?>" class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="<?= $books['title'] ?>" loading="lazy">
                    </a>
                </div>
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

    <!-- Pagination -->
    <div class="mt-6 flex justify-center gap-2">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Previous</a>
        <?php endif; ?>
        <?php for ($p = 1; $p <= $total_pages; $p++): ?>
            <a href="?page=<?= $p ?>" class="px-3 py-1 <?= $p == $page ? 'bg-blue-500 text-white' : 'bg-gray-100' ?> rounded hover:bg-blue-100"><?= $p ?></a>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 rounded">Next</a>
        <?php endif; ?>
    </div>
</div>
<script>
            window.addEventListener('pageshow', function (event) {
                if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                    location.reload();
                }
            });
        </script>