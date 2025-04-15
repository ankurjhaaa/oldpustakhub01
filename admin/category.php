<?php include_once "../config/db.php"; ?>
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

            <!-- Container -->
            <div class=" bg-gray-100 min-h-screen">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- ✅ Add Category -->
                    <div class="bg-white rounded-lg shadow-md p-6 ">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-folder-plus text-blue-500"></i> Add Category
                        </h2>
                        <form method="post" action="action/insert_category.php" enctype="multipart/form-data">
                            <!-- Category Name -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Category Name</label>
                                <input type="text" name="category_title" placeholder="e.g. Furniture, Books"
                                    class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-400"
                                    required>
                            </div>

                            <!-- Category Image (Square Box) -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Icon / Image</label>
                                <div
                                    class="w-28 h-28 border rounded-md flex items-center justify-center overflow-hidden bg-gray-50 cursor-pointer relative">
                                    <input type="file" id="catImage" name="cat_img" accept="image/*"
                                        onchange="previewImage(event, 'catPreview')"
                                        class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                                    <img id="catPreview" class="object-cover w-full h-full hidden" />
                                    <span id="catPlaceholder" class="text-gray-400 text-sm">Click to upload</span>
                                </div>
                            </div>

                            <button type="submit" name="add_cat"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold mt-3">
                                Add Category
                            </button>
                        </form>
                        
                        

                    </div>

                    <!-- ✅ Add Subcategory -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-sitemap text-green-500"></i> Add Subcategory
                        </h2>
                        <form method="post" action="action/insert_subcat.php" enctype="multipart/form-data">
                            <!-- Select Category -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Select Category</label>
                                <select
                                    class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-green-400" name="id_cat">
                                    <option>Select a category</option>
                                    <?php
                                        $call_category = $connect->query("SELECT * FROM category");
                                        while($category_id = $call_category->fetch_array()){ ?>
                                        <option value="<?= $category_id['cat_id']; ?>"><?= $category_id['category_title']; ?></option>
                                    <?php } ?>
                                    
                                    
                                </select>
                            </div>

                            <!-- Subcategory Name -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Subcategory Name</label>
                                <input type="text" placeholder="e.g. Thriller, Sofa" name="subcat_title"
                                    class="mt-1 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-green-400"
                                    required>
                            </div>

                            <!-- Subcategory Image (Square Box) -->
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Icon / Image</label>
                                <div
                                    class="w-28 h-28 border rounded-md flex items-center justify-center overflow-hidden bg-gray-50 cursor-pointer relative">
                                    <input type="file" name="subcat_img" id="subCatImage" accept="image/*"
                                        onchange="previewImage(event, 'subcatPreview')"
                                        class="absolute inset-0 opacity-0 cursor-pointer z-10" />
                                    <img id="subcatPreview" class="object-cover w-full h-full hidden" />
                                    <span id="subcatPlaceholder" class="text-gray-400 text-sm">Click to upload</span>
                                </div>
                            </div>

                            <button type="submit" name="add_subcat"
                                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-semibold mt-3">
                                Add Subcategory
                            </button>
                        </form>
                    </div>
                </div>

                <!-- 🔍 View Button -->
                <div class="mt-10 text-center">
                    <button onclick="document.getElementById('viewModal').classList.remove('hidden')"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-md">
                        🔍 View All Categories & Subcategories
                    </button>
                </div>
            </div>

            <!-- 🧾 Modal -->
            <div id="viewModal"
                class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
                <div class="bg-white w-[95%] md:w-[80%] max-h-[90vh] overflow-y-auto p-6 rounded-lg shadow-lg relative">
                    <button onclick="document.getElementById('viewModal').classList.add('hidden')"
                        class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-xl">
                        &times;
                    </button>
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">📋 All Categories & Subcategories</h3>

                    <!-- 🔍 Search -->
                    <input type="text" placeholder="Search category or subcategory..." onkeyup="filterTable(this)"
                        class="mb-4 w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-400">

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full border text-sm text-left text-gray-600" id="categoryTable">
                            <thead class="bg-gray-200 text-gray-800 font-semibold">
                                <tr>
                                    <th class="px-4 py-2 border">Category</th>
                                    <th class="px-4 py-2 border">Subcategory</th>
                                    <th class="px-4 py-2 border">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-2 border">Books</td>
                                    <td class="px-4 py-2 border">Thriller</td>
                                    <td class="px-4 py-2 border"><img src="https://via.placeholder.com/40"
                                            class="w-10 h-10 object-cover rounded" /></td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 border">Electronics</td>
                                    <td class="px-4 py-2 border">Mobile</td>
                                    <td class="px-4 py-2 border"><img src="https://via.placeholder.com/40"
                                            class="w-10 h-10 object-cover rounded" /></td>
                                </tr>
                                <!-- More dynamic rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 📸 JS: Image Preview + Table Filter -->
            <script>
                function previewImage(event, previewId) {
                    const fileInput = event.target;
                    const img = document.getElementById(previewId);
                    const placeholder = previewId === 'catPreview' ? document.getElementById('catPlaceholder') : document.getElementById('subcatPlaceholder');

                    img.src = URL.createObjectURL(fileInput.files[0]);
                    img.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                }

                function filterTable(input) {
                    const filter = input.value.toLowerCase();
                    const rows = document.querySelectorAll('#categoryTable tbody tr');
                    rows.forEach(row => {
                        const text = row.innerText.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
                    });
                }
            </script>




            <!-- main work space foe shown -->


        </main>
    </div>
</body>

</html>