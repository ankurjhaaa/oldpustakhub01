<?php include_once "../config/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <?php include_once "walletNavbar.php"; ?>


    <div class="bg-gray-50 py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">

            <!-- Breadcrumb -->
            <div class="text-sm text-gray-500 mb-2">
                <a href=""><span class="text-indigo-600 font-medium">Wallet</span></a>
                <span> / </span>
                <span class="font-medium text-gray-700">Purchase Plan</span>
            </div>

            <!-- Heading -->
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Choose Purchase Plan</h2>

            <!-- Hosting Info Box -->
            <div class="bg-white border rounded-md p-4 mb-4">
                <h3 class="text-lg font-semibold mb-2">About Plan</h3>
                <p class="text-sm text-gray-700">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, pariatur magnam tempora quos,
                    corporis nobis, neque quam mollitia dicta soluta velit? Quo minus porro consequuntur possimus
                    repellat facere in officiis.
                </p>
            </div>

            <!-- Warning Box -->
            <div
                class="bg-yellow-100 border border-yellow-300 text-yellow-800 px-4 py-3 rounded-md flex items-start gap-2">
                <svg class="w-5 h-5 mt-0.5 shrink-0 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M5.07 5.07a10 10 0 0113.86 0m1.42 1.42a10 10 0 010 13.86m-1.42 1.42a10 10 0 01-13.86 0m-1.42-1.42a10 10 0 010-13.86" />
                </svg>
                <p class="text-sm">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat sed reiciendis quod voluptate
                    veniam nam odio unde, itaque nihil deleniti ipsum corrupti quia, cumque officia alias culpa
                    laboriosam magnam magni.
                </p>
            </div>

        </div>
    </div>

    <div class="bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                <!-- PLAN 0 -->
                <div class="bg-white border rounded-xl shadow p-6 text-center">
                    <h3 class="text-gray-800 text-lg font-bold mb-2">PLAN0</h3>
                    <p class="text-4xl font-bold">₹0</p>
                    <p class="text-sm text-gray-500 mb-4">Forever</p>
                    <ul class="text-sm text-left space-y-2 mb-4">
                        <li><strong>List 5</strong> Books</li>
                        <li><strong>Basic</strong> Dashboard Access</li>
                        <li class="text-red-600">✘ Ads Promotion</li>
                        <li class="text-red-600">✘ Analytics</li>
                        <li class="text-red-600">✘ Priority Support</li>
                        <li class="text-red-600">✘ Custom Branding</li>
                    </ul>
                    <button class="bg-purple-200 text-purple-900 px-4 py-2 rounded-md font-semibold w-full">Already
                        Enrolled</button>
                </div>

                <!-- PLAN 30 -->
                <div class="bg-white border rounded-xl shadow p-6 text-center">
                    <h3 class="text-gray-800 text-lg font-bold mb-2">PLAN30</h3>
                    <p class="text-4xl font-bold">₹30</p>
                    <p class="text-sm text-gray-500 mb-4">Valid for 1 Month</p>
                    <ul class="text-sm text-left space-y-2 mb-4">
                        <li><strong>List 20</strong> Books</li>
                        <li><strong>Full</strong> Dashboard Access</li>
                        <li><strong>Standard</strong> Analytics</li>
                        <li><strong>Email</strong> Notifications</li>
                        <li class="text-red-600">✘ Custom Branding</li>
                        <li class="text-red-600">✘ Priority Support</li>
                    </ul>

                    <a href="purchasePayment.php?plan=PLAN30"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold w-full text-center block">
                        Enroll Now
                    </a>


                </div>

                <!-- PLAN 160 -->
                <div class="bg-white border rounded-xl shadow p-6 text-center">
                    <h3 class="text-gray-800 text-lg font-bold mb-2">PLAN160</h3>
                    <p class="text-4xl font-bold">₹160</p>
                    <p class="text-sm text-gray-500 mb-4">Valid for 6 Months</p>
                    <ul class="text-sm text-left space-y-2 mb-4">
                        <li><strong>List 100</strong> Books</li>
                        <li><strong>Advanced</strong> Dashboard</li>
                        <li><strong>Full</strong> Analytics</li>
                        <li><strong>Email + SMS</strong> Notifications</li>
                        <li><strong>Basic</strong> Branding</li>
                        <li class="text-red-600">✘ Priority Support</li>
                    </ul>
                    <a href="purchasePayment.php?plan=PLAN160"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold w-full text-center block">
                        Enroll Now
                    </a>
                </div>

                <!-- PLAN 300 -->
                <div class="bg-white border rounded-xl shadow p-6 text-center">
                    <h3 class="text-gray-800 text-lg font-bold mb-2">PLAN300</h3>
                    <p class="text-4xl font-bold">₹300</p>
                    <p class="text-sm text-gray-500 mb-4">Valid for 1 Year</p>
                    <ul class="text-sm text-left space-y-2 mb-4">
                        <li><strong>Unlimited</strong> Book Listings</li>
                        <li><strong>Premium</strong> Dashboard</li>
                        <li><strong>Advanced</strong> Analytics</li>
                        <li><strong>Email + SMS</strong> Notifications</li>
                        <li><strong>Full</strong> Branding Access</li>
                        <li><strong>Priority</strong> Support</li>
                    </ul>
                    <a href="purchasePayment.php?plan=PLAN300"
                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md font-semibold w-full text-center block">
                        Enroll Now
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- <br><br><br> -->
    <?php include_once "../includes/footer.php" ?>
    <?php include_once "walletBottomNav.php" ?>


</body>

</html>