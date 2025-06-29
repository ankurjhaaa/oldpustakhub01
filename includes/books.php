<?php
// Pagination Setup
$limit = 9; // Number of books per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetching user location if logged in
$books_query = "";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $callUserAddressQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
    $callUserAddress = $callUserAddressQuery->fetch_assoc();
    $user_lat = (!empty($callUserAddress['lat'])) ? $callUserAddress['lat'] : 28.6139;
    $user_lng = (!empty($callUserAddress['lng'])) ? $callUserAddress['lng'] : 77.2090;



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
    <!-- <h2 class="text-2xl font-bold text-gray-800 mb-5">Recommendation Books</h2> -->
    <h1 class='text-2xl font-semibold text-[#015551] mb-5'>
        Showing All <span class='text-gray-800'><?php if (isset($_SESSION['email'])) {
            if ($seeVersion['seeVersion'] == 0) {
                echo "Old ";
            } else {
                echo "New ";
            }
        }?></span> Books
    </h1>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1 md:gap-4">
        <?php
        $countBooksInRow = 1;
        while ($books = mysqli_fetch_array($call_books)) { ?>
            <div
                class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
                <div class="relative w-full h-[160px] sm:h-[200px]">
                    <div class="absolute top-1 left-1 bg-black/60 text-white text-xs sm:text-sm px-2 py-1 rounded shadow">
                        <?php $bookId = $books['book_id'] ?>
                        👁️
                        <?= mysqli_num_rows(mysqli_query($connect, "SELECT * FROM book_views where book_id='$bookId'")) ?>
                        views
                    </div>
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
                <div class="p-2 flex-grow flex flex-col">
                    <div class="mb-1">
                        <div class="flex items-center gap-2">
                            <h3 class="text-sm sm:text-base font-bold text-gray-900">₹<?= $books['set_price'] ?></h3>
                            <span class="line-through text-xs text-gray-500">₹<?= $books['mrp'] ?></span>
                            <span class="text-xs text-green-600 font-semibold">20% off</span>
                        </div>
                    </div>
                    <p class="text-gray-800 text-md sm:text-base font-medium mb-1 line-clamp-1">
                        <?= strlen($books['title']) > 20 ? substr($books['title'], 0, 20) . '...' : $books['title'] ?>
                    </p>
                    <p class="text-gray-600 text-xs sm:text-sm mb-1">Author:
                        <?= strlen($books['author']) > 13 ? substr($books['author'], 0, 13) . '...' : $books['author'] ?>
                    </p>
                    <hr>
                    <div class="flex justify-between text-xs text-gray-500">
                        <span
                            class="truncate">📍<?= strlen($books['state']) > 10 ? substr($books['state'], 0, 10) . '..' : $books['state'] ?></span>
                        <span>🕒 Today</span>
                    </div>
                </div>

            </div>
            <?php
            if ($countBooksInRow == 7) { ?>
                <!-- Match exact size and layout of book card -->
                <div
                    class="border shadow-sm hover:shadow-md transition-all duration-200 bg-blue-600 text-white flex flex-col p-1 max-w-sm w-full h-full">
                    <!-- Dummy image section for height balance -->
                    <div class="w-full h-[160px] sm:h-[200px] bg-blue-500 flex items-center justify-center text-center px-4">
                        <p class="text-sm sm:text-base font-semibold">Want to see<br> your books here?</p>
                    </div>

                    <!-- Content Section -->
                    <div class="p-2 flex-grow flex flex-col justify-between text-center">
                        <div class="space-y-2">
                            <?php if ($books['version'] == 0) { ?>
                                <p class="text-sm sm:text-base text-white">
                                    Sell your Old books on <span class="font-bold text-white underline">Pustakhub</span>

                                </p>

                            <?php } else { ?>
                                <p class="text-sm sm:text-base text-white">
                                    Make seller, sell New books on <a href="index.php"
                                        class="font-bold text-white underline">Pustakhub</a>

                                </p>
                            <?php } ?>
                        </div>
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <button
                                class="openPopupBtn mt-4 py-2 bg-white text-blue-600 font-semibold text-sm hover:bg-blue-100 hover:shadow-md transition border">
                                Start Selling
                            </button>
                        <?php } else { ?>

                            <a href="sell/sell.php"
                                class="mt-4 py-2 bg-white text-blue-600 font-semibold text-sm hover:bg-blue-100 hover:shadow-md transition border">
                                Start Selling
                            </a>
                        <?php } ?>
                    </div>
                    <hr class="border-blue-500">
                </div>
            <?php }
            $countBooksInRow++;
            ?>
        <?php } ?>
    </div>

    <?php
    $start = max(1, $page - 2);
    $end = min($total_pages, $page + 2);
    ?>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center gap-2 text-sm">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="text-[#015551] hover:underline px-3 py-1 mt-1">Previous</a>
        <?php endif; ?>

        <?php for ($p = $start; $p <= $end; $p++): ?>
            <a href="?page=<?= $p ?>" class="px-4 py-2 rounded-full font-medium 
           <?= $p == $page
               ? 'bg-[#015551] text-white'
               : ' text-black hover:bg-[#66BBB3] hover:text-white' ?>">
                <?= $p ?>
            </a>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
            <a href="?page=<?= $page + 1 ?>" class="text-[#015551] hover:underline px-3 py-1 mt-1">Next</a>
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