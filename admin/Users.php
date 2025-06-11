<?php include_once "../config/db.php"; ?>
<?php include_once "includes/redirectLogin.php"; ?>

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
            <!-- Container -->
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Admin - Users</title>
                <script src="https://cdn.tailwindcss.com"></script>
                <style>
                    [x-cloak] {
                        display: none !important;
                    }
                </style>
            </head>

            <body class="bg-gray-100 text-gray-800 font-sans">

                <!-- Header -->
                <div
                    class="bg-white shadow-sm p-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-700">User Management</h2>
                        <p class="text-sm text-gray-500">View and manage all registered users</p>
                    </div>
                    <div class="flex flex-col sm:flex-row w-full md:w-auto gap-2">
                        <input id="searchInput" type="text" placeholder="Search users..."
                            class="w-full sm:w-64 px-4 py-2 rounded-md border border-gray-300 focus:ring-blue-500 focus:ring-2 outline-none" />
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">+ Add
                            User</button>
                    </div>
                </div>

                <!-- Table -->
                <div class="p-4 overflow-x-auto">
                    <div class="bg-white shadow rounded-xl w-full">
                        <table class="min-w-full divide-y divide-gray-200 text-sm" id="userTable">
                            <thead class="bg-gray-100 text-gray-600">
                                <tr>
                                    <th class="px-6 py-3 text-left">User</th>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Role</th>
                                    <th class="px-6 py-3 text-left">Joined</th>
                                    <th class="px-6 py-3 text-left">Status</th>
                                    <th class="px-6 py-3 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                <?php
                                $callAllUser = $connect->query("SELECT * FROM users ");
                                while ($allUser = $callAllUser->fetch_array()) { ?>
                                    <tr class="userRow">
                                        <td class="px-6 py-4 flex items-center gap-3">
                                            <img src="https://i.pravatar.cc/100?img=5" alt=""
                                                class="w-10 h-10 rounded-full" />
                                            <div>
                                                <p class="font-semibold"><?= $allUser['firstname'] ?>
                                                    <?= $allUser['lastname'] ?></p>
                                                <p class="text-xs text-gray-400">#<?= $allUser['id'] ?></p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4"><?= $allUser['email'] ?></td>
                                        <td class="px-6 py-4"><span
                                                class="bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded"><?php if ($allUser['role'] == 0) {
                                                    echo "User";
                                                } elseif($allUser['role'] == 2){
                                                    echo "Seller";
                                                } elseif ($allUser['role'] == 1){
                                                    echo "admin";
                                                } ?></span>
                                        </td>
                                        <td class="px-6 py-4"><?= $allUser['joined_at'] ?></td>
                                        <td class="px-6 py-4"><span
                                                class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">Active</span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <!-- Mobile dropdown -->
                                            <div class="relative inline-block text-left md:hidden">
                                                <button onclick="toggleDropdown(this)"
                                                    class="text-gray-500 hover:text-gray-700 focus:outline-none">
                                                    ⋮
                                                </button>
                                                <div
                                                    class="dropdown hidden absolute right-0 mt-2 w-28 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                                                    <button
                                                        class="w-full text-left px-3 py-2 hover:bg-gray-100 text-sm text-blue-600">View</button>
                                                    <button
                                                        class="w-full text-left px-3 py-2 hover:bg-gray-100 text-sm text-yellow-600">Edit</button>
                                                    <button
                                                        class="w-full text-left px-3 py-2 hover:bg-gray-100 text-sm text-red-600">Delete</button>
                                                </div>
                                            </div>

                                            <!-- Desktop buttons -->
                                            <div class="hidden md:flex justify-end gap-2">
                                                <button class="text-blue-600 hover:underline text-sm">View</button>
                                                <button class="text-yellow-600 hover:underline text-sm">Edit</button>
                                                <button class="text-red-600 hover:underline text-sm">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>


                                <!-- More .userRow can go here -->

                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    // Search filter
                    const searchInput = document.getElementById('searchInput');
                    const rows = document.querySelectorAll('.userRow');

                    searchInput.addEventListener('input', () => {
                        const search = searchInput.value.toLowerCase();
                        rows.forEach(row => {
                            const text = row.innerText.toLowerCase();
                            row.style.display = text.includes(search) ? '' : 'none';
                        });
                    });

                    // Dropdown toggle
                    function toggleDropdown(btn) {
                        const dropdown = btn.nextElementSibling;
                        dropdown.classList.toggle('hidden');
                        document.addEventListener('click', function outsideClick(e) {
                            if (!dropdown.contains(e.target) && e.target !== btn) {
                                dropdown.classList.add('hidden');
                                document.removeEventListener('click', outsideClick);
                            }
                        });
                    }
                </script>

            </body>

            </html>



        </main>
    </div>
</body>

</html>