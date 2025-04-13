<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OLX Profile Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100 ">
    <?php include_once "includes/navbar.php"; ?>
    <div class="max-w-[1400px] mx-auto grid grid-cols-1 lg:grid-cols-4 gap-6 mt-2">

        <!-- Sidebar -->
        <aside class="bg-white p-6 rounded-md shadow col-span-1">
            <div class="flex flex-col items-center text-center">
                <div
                    class="w-24 h-24 rounded-full bg-cyan-800 text-white flex items-center justify-center text-4xl font-bold">
                    <i class="fas fa-user"></i>
                </div>
                <h2 class="text-lg font-semibold mt-4">Asiatic Auto Consult...</h2>

                <button class="mt-2 px-4 py-1 border rounded-full text-sm flex items-center gap-2">
                    <i class="fas fa-user-plus"></i>
                </button>

                <div class="text-sm text-gray-600 mt-4">
                    <p><i class="far fa-calendar-alt mr-1"></i> Member since Jan 2015</p>
                    <p class="mt-2"><i class="fas fa-users mr-1"></i> <strong>40</strong> Followers &nbsp; | &nbsp;
                        <strong>1</strong> Following</p>
                </div>

                <div class="mt-3 text-xs text-gray-700">
                    <p class="font-semibold mb-1">User verified with</p>
                    <div class="flex gap-4 text-xl">
                        <i class="fas fa-phone text-gray-600"></i>
                        <i class="fas fa-envelope text-gray-600"></i>
                    </div>
                </div>

                <button class="w-full bg-cyan-900 text-white py-2 rounded-md mt-6 font-semibold">
                    <i class="fas fa-share-alt mr-2"></i> Share profile
                </button>

                <button class="w-full border-2 border-cyan-900 text-cyan-900 py-2 rounded-md mt-3 font-semibold">
                    <i class="fas fa-flag mr-2"></i> Report user
                </button>
            </div>
        </aside>

        <!-- Main Grid -->
        <main class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card Repeat -->
            <div
                class="border rounded-md shadow-sm hover:shadow-md transition-all duration-200 bg-white overflow-hidden flex flex-col p-1 max-w-sm">
                <a href="view.php">
                    <!-- Image Section -->
                    <div class="relative w-full h-[160px] sm:h-[200px]">
                        <img src="https://picsum.photos/300/300" class="w-full h-full object-cover rounded-sm border"
                            alt="Smartphone" loading="lazy">
                        <form action="" method="post">
                            <button id="wishlistBtn"
                                class="absolute top-2 right-2 p-2 rounded-full bg-white/60 backdrop-blur-md shadow-md hover:bg-red-100 hover:scale-110 transition-all duration-300 group"
                                aria-label="Add to Wishlist">
                                <i
                                    class="fa-regular fa-heart text-gray-600 group-hover:text-red-500 group-hover:fa-solid transition-all duration-300 text-lg"></i>
                            </button>
                        </form>

                    </div>

                    <!-- Details Section -->
                    <div class="p-2 flex-grow flex flex-col">
                        <!-- Price -->
                        <div class="mb-1">
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm sm:text-base font-bold text-gray-900">₹1999</h3>
                                <span class="line-through text-xs text-gray-500">₹2499</span>
                                <span class="text-xs text-green-600 font-semibold">20% off</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <p class="text-gray-800 text-sm sm:text-base font-medium mb-1 line-clamp-1">
                            Science Book kc
                        </p>

                        <!-- Author -->
                        <p class="text-gray-600 text-xs sm:text-sm mb-1">
                            Author: Ankur Jha
                        </p>

                        <!-- Location & Time -->
                        <div class="flex justify-between text-xs text-gray-500">
                            <span class="truncate">📍 Patna</span>
                            <span>🕒 Today</span>
                        </div>
                    </div>
                </a>
                <hr>
            </div>

            

        </main>
    </div>




    <?php include_once "includes/bottom_nav.php" ?>
    <br>
    <br>
    <br>
</body>

</html>