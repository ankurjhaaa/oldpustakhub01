<?php include_once "config/db.php"; ?>
<?php
if (isset($_GET['email'])) {
    $userEmail = $_GET['email'];
}
$sellerDetailQuery = $connect->query("SELECT * FROM users WHERE email='$userEmail'");
$sellerDetail = $sellerDetailQuery->fetch_assoc();
if (isset($_SESSION['email'])) {

    $thisUserEmail = $_SESSION['email'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile | pustakhub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 ">
    <?php include_once "includes/navbar.php"; ?>
    <div class="max-w-[90%] mx-auto h-full grid grid-cols-1 lg:grid-cols-4 gap-6 mt-[3%]">

        <!-- Sidebar -->
        <div class="bg-white p-6 rounded-md shadow col-span-1 ">
            <div class="flex flex-col items-center text-center">
                <div
                    class="w-24 h-24 rounded-full bg-cyan-800 text-white flex items-center justify-center text-4xl font-bold">
                    <i class="fas fa-user"></i>
                </div>
                <h2 class="text-lg font-semibold mt-4"><?= $sellerDetail['firstname'] ?>
                    <?= $sellerDetail['lastname'] ?>
                </h2>


                <!-- count all follower and following -->
                <?php if (isset($_SESSION['email'])) { ?>
                    <?php
                    $checkFollow = $connect->query("SELECT * FROM follow WHERE UserEmail = '$thisUserEmail' AND sellerEmail = '$userEmail'");
                    $isFollow = ($checkFollow->num_rows > 0); ?>

                    <?php if ($sellerDetail['email'] != $thisUserEmail) { ?>
                        <form action="action/follow.php" method="post">
                            <button class="mt-2 px-4 py-1 border border-black text-sm flex items-center gap-2" name="followBtn">
                                <?= $isFollow ? 'Following' : '<i class="fas fa-user-plus"></i> follow'; ?>
                            </button>
                            <input type="hidden" name="sellerEmailId" value="<?= $userEmail ?>">
                            <input type="hidden" name="UserEmailId" value="<?= $thisUserEmail ?>">
                        </form>
                    <?php } ?>

                <?php } ?>



                <div class="text-sm text-gray-600 mt-4">
                    <p><i class="far fa-calendar-alt mr-1"></i> Member since Jan 2015</p>
                    
                    <!-- <p class="mt-2"><i class="fas fa-users mr-1"></i>
                        <strong></strong>
                        Followers &nbsp; | &nbsp;
                        <strong></strong>
                        Following
                    </p> -->
                    <!-- Trigger Buttons -->
                    <p class="mt-4 text-sm">
                        <i class="fas fa-users mr-1"></i>

                        <button onclick="openPopup('followers')" class="text-cyan-700 hover:underline font-semibold">
                            <?= mysqli_num_rows($connect->query("SELECT * FROM follow WHERE sellerEmail='$userEmail'")) ?>
                            Followers
                        </button>

                        &nbsp; | &nbsp;

                        <button onclick="openPopup('following')" class="text-cyan-700 hover:underline font-semibold">
                            <?= mysqli_num_rows($connect->query("SELECT * FROM follow WHERE userEmail='$userEmail'")) ?>
                            Following
                        </button>
                    </p>

                    <!-- Overlay -->
                    <div id="popupOverlay" class="fixed inset-0 bg-black/40 z-40 hidden"></div>

                    <!-- Modal -->
                    <div id="popupModal" class="hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
    bg-white rounded-md shadow-2xl w-[95%] max-w-lg z-50 p-6 sm:p-8">

                        <!-- Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 id="popupTitle" class="text-xl sm:text-2xl font-bold text-gray-800"></h2>
                            <button onclick="closePopup()"
                                class="text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
                        </div>

                        <!-- Search Bar -->
                        <input type="text" id="searchInput" placeholder="Search user..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg mb-5 focus:outline-none focus:ring-2 focus:ring-cyan-500">

                        <!-- Follower List -->
                        <div id="followersList" class="max-h-64 overflow-y-auto space-y-4 hidden">
                            <!-- Dummy Follower User -->
                            <?php $allFollowerUserQuery = $connect->query("SELECT * FROM follow WHERE sellerEmail='$userEmail'");
                            while ($allFollowerUser = $allFollowerUserQuery->fetch_array()) { ?>
                                <?php
                                $allFollowerUserEmail = $allFollowerUser['UserEmail'];
                                $allFollowingUserDetailQuery = $connect->query("SELECT * FROM users WHERE email='$allFollowerUserEmail'");
                                while ($allFollowingUserDetail = $allFollowingUserDetailQuery->fetch_array()) { ?>
                                    <a href="profile.php?email=<?= $allFollowingUserDetail['email'] ?>">
                                        <div class="flex items-center gap-4">
                                            <img src="images/default_user.jpeg" class="w-10 h-10 rounded-full shadow" />
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800">
                                                    <?= $allFollowingUserDetail['firstname'] ?>
                                                    <?= $allFollowingUserDetail['lastname'] ?>
                                                </p>
                                                <p class="text-xs text-gray-500"><?= $allFollowingUserDetail['email'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>

                            <?php } ?>


                        </div>

                        <!-- Following List -->
                        <div id="followingList" class="max-h-64 overflow-y-auto space-y-4 hidden">
                            <!-- Dummy Following User -->
                            <?php $allFollowingUserQuery = $connect->query("SELECT * FROM follow WHERE userEmail='$userEmail'");
                            while ($allFollowingUser = $allFollowingUserQuery->fetch_array()) { ?>
                                <?php
                                $allFollowingUserEmail = $allFollowingUser['sellerEmail'];
                                $allFollowingUserDetailQuery = $connect->query("SELECT * FROM users WHERE email='$allFollowingUserEmail'");
                                while ($allFollowingUserDetail = $allFollowingUserDetailQuery->fetch_array()) { ?>
                                    <a href="profile.php?email=<?= $allFollowingUserDetail['email'] ?>">
                                        <div class="flex items-center gap-4">
                                            <img src="images/default_user.jpeg" class="w-10 h-10 rounded-full shadow" />
                                            <div>
                                                <p class="text-sm font-semibold text-gray-800">
                                                    <?= $allFollowingUserDetail['firstname'] ?>
                                                    <?= $allFollowingUserDetail['lastname'] ?>
                                                </p>
                                                <p class="text-xs text-gray-500"><?= $allFollowingUserDetail['email'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php } ?>


                            <?php } ?>

                        </div>

                        <!-- Close Button -->
                        <button onclick="closePopup()"
                            class="mt-6 w-full bg-cyan-600 hover:bg-cyan-700 text-white py-2 rounded-lg font-semibold">
                            Close
                        </button>
                    </div>
                    <script>
                        function openPopup(type) {
                            document.getElementById("popupOverlay").classList.remove("hidden");
                            document.getElementById("popupModal").classList.remove("hidden");

                            document.getElementById("popupTitle").innerText = type === 'followers' ? "Followers" : "Following";

                            document.getElementById("followersList").classList.toggle("hidden", type !== 'followers');
                            document.getElementById("followingList").classList.toggle("hidden", type !== 'following');

                            const listId = type === 'followers' ? 'followersList' : 'followingList';
                            const searchInput = document.getElementById("searchInput");

                            searchInput.value = "";
                            searchInput.oninput = function () {
                                const query = this.value.toLowerCase();
                                document.querySelectorAll(`#${listId} > div`).forEach(div => {
                                    div.style.display = div.innerText.toLowerCase().includes(query) ? "flex" : "none";
                                });
                            };
                        }

                        function closePopup() {
                            document.getElementById("popupOverlay").classList.add("hidden");
                            document.getElementById("popupModal").classList.add("hidden");
                        }
                    </script>

                </div>

                <div class="mt-3 text-xs text-gray-700">
                    <p class="font-semibold mb-1">User verified with</p>
                    <div class="flex gap-4 text-xl">
                        <i class="fas fa-phone text-gray-600"></i>
                        <i class="fas fa-envelope text-gray-600"></i>
                    </div>
                </div>
                <?php if (isset($_SESSION['email'])) { ?>

                    <?php if ($sellerDetail['email'] != $thisUserEmail) { ?>
                        <button onclick="shareProfile()"
                            class="w-full bg-cyan-900 text-white py-2 rounded-md mt-6 font-semibold">
                            <i class="fas fa-share-alt mr-2"></i> Share profile
                        </button>

                        <script>
                            function shareProfile() {
                                if (navigator.share) {
                                    navigator.share({
                                        title: document.title,
                                        text: "Check out this profile!",
                                        url: window.location.href
                                    })
                                        .then(() => console.log('Shared successfully'))
                                        .catch((error) => console.log('Error sharing:', error));
                                } else {
                                    alert("Sharing not supported on this browser. You can copy the link manually: " + window.location.href);
                                }
                            }
                        </script>

                    <?php } else { ?>
                        <a href="users_account\editProfile.php" class="w-full bg-cyan-900 text-white py-2 rounded-md mt-6 font-semibold">
                            <i class="fas fa-edit mr-2"></i>
                            Update profile
                        </a>
                        <a href="wallet/purchaseSellPlan.php" class="w-full bg-cyan-900 text-white py-2 rounded-md mt-6 font-semibold">
                            <!-- <i class="fas fa-edit mr-2"></i> -->
                            Make You Seller
                        </a>
                    <?php } ?>

                    <?php if ($sellerDetail['email'] != $thisUserEmail) { ?>
                        <a href="" class="w-full border-cyan-900 text-cyan-900 py-2 rounded-md mt-3 font-semibold underline">
                            Report Profile
                        </a>
                    <?php } else { ?>
                        <a href="" class="w-full border-cyan-900 text-cyan-900 py-2 rounded-md mt-3 font-semibold underline">
                            Share Profile
                        </a>
                    <?php } ?> <?php } else { ?>
                        <button onclick="shareProfile()"
                            class="w-full bg-cyan-900 text-white py-2 rounded-md mt-6 font-semibold">
                            <i class="fas fa-share-alt mr-2"></i> Share profile
                        </button>

                        <script>
                            function shareProfile() {
                                if (navigator.share) {
                                    navigator.share({
                                        title: document.title,
                                        text: "Check out this profile!",
                                        url: window.location.href
                                    })
                                        .then(() => console.log('Shared successfully'))
                                        .catch((error) => console.log('Error sharing:', error));
                                } else {
                                    alert("Sharing not supported on this browser. You can copy the link manually: " + window.location.href);
                                }
                            }
                        </script>
                    
                    <?php } ?>



            </div>
        </div>

        <!-- Main Grid -->
        <main class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 flex alin">
            <!-- Card Repeat -->
            <?php

            $call_books = $connect->query("SELECT * FROM books WHERE seller_email='$userEmail'");
            if (mysqli_num_rows($call_books) != 0) { ?>
                <?php while ($books = mysqli_fetch_array($call_books)) {
                    ?>
                    <div
                        class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm h-80">
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
                                    class="w-full h-full object-cover hover:shadow-lg rounded-sm border" alt="Books"
                                    loading="lazy">
                            </a>
                        </div>
                        <script>
                            window.addEventListener('pageshow', function (event) {
                                if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
                                    location.reload();
                                }
                            });
                        </script>

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
            <?php } else { ?>
                <div
                    class="col-span-2 md:col-span-3 lg:col-span-4 xl:col-span-5 flex flex-col items-center justify-center text-center py-32">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076507.png" alt="Empty Wishlist"
                        class="w-20 h-20 mb-4 opacity-70" />
                    <p class="text-gray-600 text-lg font-medium">You haven't Sold Book anything yet</p>
                    <p class="text-gray-400 text-sm mt-1">Start adding books you love to see them here!</p>
                </div>
            <?php } ?>




        </main>
    </div>




    <?php include_once "includes/bottom_nav.php" ?>
    <br>
    <br>
    <br>
</body>

</html>