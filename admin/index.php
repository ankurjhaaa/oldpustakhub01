<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once "includes/navbar.php"; ?>
    <div class="flex pt-[56px]"> <!-- Top navbar height = 56px -->
        <?php include_once "includes/sidebar.php"; ?>
        <!-- Main Content -->
        <main class="flex-1 ml-0 md:ml-64 h-[calc(100vh-56px)] overflow-y-auto bg-gray-100 p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Welcome, Admin</h1>


            <!-- main work space foe shown -->

            <!-- Top Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-500">
                    <h3 class="text-sm text-gray-500">Total Users</h3>
                    <p class="text-2xl font-bold text-gray-800">4,320</p>
                    <p class="text-xs text-gray-400">+85 this week</p>
                </div>
                <div class="bg-white p-5 rounded-lg shadow border-l-4 border-green-500">
                    <h3 class="text-sm text-gray-500">Total Listings</h3>
                    <p class="text-2xl font-bold text-gray-800">8,115</p>
                    <p class="text-xs text-gray-400">+234 new ads</p>
                </div>
                <div class="bg-white p-5 rounded-lg shadow border-l-4 border-yellow-500">
                    <h3 class="text-sm text-gray-500">Active Chats</h3>
                    <p class="text-2xl font-bold text-gray-800">670</p>
                    <p class="text-xs text-gray-400">User-to-user conversations</p>
                </div>
                <div class="bg-white p-5 rounded-lg shadow border-l-4 border-red-500">
                    <h3 class="text-sm text-gray-500">Reported Items</h3>
                    <p class="text-2xl font-bold text-gray-800">92</p>
                    <p class="text-xs text-gray-400">Pending moderation</p>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
                <ul class="space-y-3 text-sm text-gray-600">
                    <li>👤 <b>Ravi</b> registered as user</li>
                    <li>📤 New listing <b>#1024</b> posted in <b>Electronics</b></li>
                    <li>💬 Chat started between <b>Neha</b> and <b>Mohit</b></li>
                    <li>🚩 Report received for listing <b>#9812</b></li>
                    <li>✅ Listing <b>#9123</b> approved</li>
                    <li>📁 Subcategory <b>“Books > Thriller”</b> updated</li>
                </ul>
            </div>

            <!-- Quick Access Panels -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Top Categories -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-base font-semibold text-gray-700 mb-3">Top Categories</h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li>📱 Electronics (2,310 ads)</li>
                        <li>🚗 Vehicles (1,845 ads)</li>
                        <li>🏠 Property (1,460 ads)</li>
                        <li>📚 Books (780 ads)</li>
                    </ul>
                </div>

                <!-- Admin Tools -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-base font-semibold text-gray-700 mb-3">Admin Shortcuts</h3>
                    <ul class="text-sm space-y-2 text-blue-600">
                        <li><a href="#" class="hover:underline">➕ Add New Category</a></li>
                        <li><a href="#" class="hover:underline">🗂️ Manage Subcategories</a></li>
                        <li><a href="#" class="hover:underline">🚩 Report Review</a></li>
                        <li><a href="#" class="hover:underline">👥 Manage Users</a></li>
                    </ul>
                </div>
            </div>

            <!-- System Summary Table -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">System Overview</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-600">
                        <thead>
                            <tr class="bg-gray-100 text-xs uppercase text-gray-500">
                                <th class="px-4 py-2">Module</th>
                                <th class="px-4 py-2">Total</th>
                                <th class="px-4 py-2">Approved</th>
                                <th class="px-4 py-2">Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="px-4 py-2">Listings</td>
                                <td class="px-4 py-2">8,115</td>
                                <td class="px-4 py-2">7,900</td>
                                <td class="px-4 py-2">215</td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-2">Users</td>
                                <td class="px-4 py-2">4,320</td>
                                <td class="px-4 py-2">4,320</td>
                                <td class="px-4 py-2">0</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Reports</td>
                                <td class="px-4 py-2">92</td>
                                <td class="px-4 py-2">61</td>
                                <td class="px-4 py-2">31</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <!-- main work space foe shown -->


        </main>
    </div>
</body>

</html>