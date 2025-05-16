<?php include_once "config/db.php"; ?>
<?php
if (isset($_GET['find_book'])) {
    $book_name = $_GET['book_name'];
}
if (isset($_GET['category'])) {
    $category_name = $_GET['category'];
}
if (isset($_GET['authorName'])) {
    $authorName = $_GET['authorName'];
}
if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];
    $seeVersionQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
    $seeVersion = $seeVersionQuery->fetch_assoc();
    $seeVersionUser = $seeVersion['seeVersion'];

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
    <title>pustakhub.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="<?= $BG ?>">
    <!-- Sticky Navbar -->
    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/category.php" ?>

    <div class="container mx-auto px-4 sm:px-6 py-6 min-h-screen">
        <?php
        $limit = 9; // कितनी books प्रति पेज दिखानी है
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $callUserAddressQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
            $callUserAddress = $callUserAddressQuery->fetch_assoc();
            $user_lat = (!empty($callUserAddress['lat'])) ? $callUserAddress['lat'] : 28.6139;
            $user_lng = (!empty($callUserAddress['lng'])) ? $callUserAddress['lng'] : 77.2090;
        }

        // Category या Search टाइटल
        if (isset($_GET['category'])) {
            if (isset($_SESSION['email'])) {
                $seeVersionUserQuery = "AND version='$seeVersionUser'";
                $where = "WHERE category='$category_name' $seeVersionUserQuery";

                $call_books = mysqli_query($connect, "SELECT *, (
                6371 * ACOS(
                COS(RADIANS($user_lat)) * COS(RADIANS(latitude)) *
                COS(RADIANS(longitude) - RADIANS($user_lng)) +
                SIN(RADIANS($user_lat)) * SIN(RADIANS(latitude))
            )
        ) AS distance
        FROM books $where ORDER BY book_id DESC LIMIT $offset, $limit");

            } else {
                $seeVersionUserQuery = "";
                $where = "WHERE category='$category_name' $seeVersionUserQuery";
                $call_books = mysqli_query($connect, "SELECT * FROM books $where ORDER BY book_id DESC LIMIT $offset, $limit");


            }
            $category_name = $_GET['category'];
            echo "<h2 class='text-2xl font-bold text-gray-800 mb-5'>Search Category '$category_name'</h2>";
            // $where = "WHERE category='$category_name' $seeVersionUserQuery";
        } elseif (isset($_GET['find_book'])) {
            if (isset($_SESSION['email'])) {
                $seeVersionUserQuery = "AND version='$seeVersionUser'";
                $where = "WHERE( title LIKE '%$book_name%' OR author LIKE '%$book_name%' OR book_condition LIKE '%$book_name%' OR state LIKE '%$book_name%' OR category LIKE '%$book_name%' OR set_price LIKE '%$book_name%' OR district LIKE '%$book_name%' OR sub_category LIKE '%$book_name%') $seeVersionUserQuery";
                $call_books = mysqli_query($connect, "SELECT *, (
                6371 * ACOS(
                COS(RADIANS($user_lat)) * COS(RADIANS(latitude)) *
                COS(RADIANS(longitude) - RADIANS($user_lng)) +
                SIN(RADIANS($user_lat)) * SIN(RADIANS(latitude))
            )
        ) AS distance
        FROM books $where ORDER BY book_id DESC LIMIT $offset, $limit");

            } else {
                $seeVersionUserQuery = "";
                $where = "WHERE( title LIKE '%$book_name%' OR author LIKE '%$book_name%' OR book_condition LIKE '%$book_name%' OR state LIKE '%$book_name%' OR category LIKE '%$book_name%' OR set_price LIKE '%$book_name%' OR district LIKE '%$book_name%' OR sub_category LIKE '%$book_name%') $seeVersionUserQuery";
                $call_books = mysqli_query($connect, "SELECT * FROM books $where ORDER BY book_id DESC LIMIT $offset, $limit");
            }
            $book_name = $_GET['book_name'] ?? '';

            echo "<h2 class='text-2xl font-bold text-gray-800 mb-5'>Search Book '$book_name'</h2>";
        } elseif (isset($_GET['authorName'])) {
            if (isset($_SESSION['email'])) {
                $seeVersionUserQuery = "";
                $where = "WHERE author='$authorName' $seeVersionUserQuery";
                $call_books = mysqli_query($connect, "SELECT * FROM books $where ORDER BY book_id DESC LIMIT $offset, $limit");


            }

        }

        // Total Books Count
        $count_result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM books $where");
        $count_row = mysqli_fetch_assoc($count_result);
        $total_books = $count_row['total'];
        $total_pages = ceil($total_books / $limit);


        ?>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-1 md:gap-4">
            <?php
            $countBooksInRow = 1;
            while ($books = mysqli_fetch_array($call_books)) { ?>
                <div
                    class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
                    <!-- Image Section -->
                    <div class="relative w-full h-[160px] sm:h-[200px]">
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <button
                                class="openPopupBtn absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group">
                                <i
                                    class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
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
                        <div class="mb-1">
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">₹<?= $books['set_price'] ?></h3>
                                <span class="line-through text-xs text-gray-500">₹<?= $books['mrp'] ?></span>
                                <span class="text-xs text-green-600 font-semibold">20% off</span>
                            </div>
                        </div>
                        <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1"><?= $books['title'] ?>
                        </p>
                        <p class="text-gray-600 text-xs sm:text-sm mb-1">Author: <?= $books['author'] ?></p>
                        <div class="flex justify-between text-xs text-gray-500">
                            <span class="truncate">📍 <?= $books['district'] ?></span>
                            <span>🕒 Today</span>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php
                if ($countBooksInRow == 7) { ?>
                    <!-- Match exact size and layout of book card -->
                    <div
                        class="border shadow-sm hover:shadow-md transition-all duration-200 bg-blue-600 text-white flex flex-col p-1 max-w-sm w-full h-full">
                        <!-- Dummy image section for height balance -->
                        <div
                            class="w-full h-[160px] sm:h-[200px] bg-blue-500 flex items-center justify-center text-center px-4">
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

        <div class="flex justify-center items-center mt-10 mb-20 space-x-2 text-sm font-medium">
            <!-- Previous Button -->
            <?php if ($page > 1): ?>
                <a href="?<?= isset($_GET['category']) ? "category=$category_name" : "book_name=$book_name" ?>&page=<?= $page - 1 ?>"
                    class="text-[#015551] hover:underline px-3 py-1">Previous</a>
            <?php endif; ?>

            <!-- Page Numbers -->
            <?php for ($i = $start; $i <= $end; $i++): ?>
                <a href="?<?= isset($_GET['category']) ? "category=$category_name" : "book_name=$book_name" ?>&page=<?= $i ?>"
                    class="px-4 py-2 rounded-full 
           <?= ($i == $page)
               ? 'bg-[#015551] text-white font-bold'
               : 'text-black hover:bg-[#4DA69E]' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <!-- Next Button -->
            <?php if ($page < $total_pages): ?>
                <a href="?<?= isset($_GET['category']) ? "category=$category_name" : "book_name=$book_name" ?>&page=<?= $page + 1 ?>"
                    class="text-[#015551] hover:underline px-3 py-1">Next</a>
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
    <?php include_once "includes/bottom_nav.php" ?>
    <?php include_once "includes/mob_foot.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>



</body>

</html>