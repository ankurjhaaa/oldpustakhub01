<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sell Your Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-gray-100 ">
    <?php include_once "includes/mini_nav.php"; ?>

    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-sm p-6 space-y-6 mt-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-4 text-center">Sell Your Book</h2>

        <div class="border p-4 rounded-sm">
            <h2 class="text-lg font-bold text-gray-800 mb-2">SELECTED CATEGORY</h2>

            <div class="flex flex-wrap items-center text-sm text-gray-700 space-x-2">
                <span>Books, Sports & Hobbies</span>
                <span>/</span>
                <span>Books</span>
                <a href="sell.php" class="text-blue-900 font-semibold underline hover:text-blue-700 ml-2">Change</a>
            </div>
        </div>

        <hr>


        <!-- Book Title -->
        <div>
            <label class="block text-gray-600 mb-1">Book Title</label>
            <input type="text" placeholder="Enter book title (minimum 5)"
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- Author Name -->
        <div>
            <label class="block text-gray-600 mb-1">Author Name</label>
            <input type="text" placeholder="Enter author's name"
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- Mrp -->
        <div>
            <label class="block text-gray-600 mb-1">MRP (₹)</label>
            <input type="number" placeholder="Enter MRP (max ₹9999)"
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- Price -->
        <div>
            <label class="block text-gray-600 mb-1">Set Your Price (₹)</label>
            <input type="number" placeholder="Enter price (max ₹9999)"
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <hr>

        <div>
            <label class="block text-gray-600 mb-1">Publish Date</label>
            <input type="number" placeholder="Enter price (max ₹9999)"
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <div>
            <label class="block text-gray-600 mb-1">Total Page</label>
            <input type="number" placeholder="Enter price (max ₹9999)"
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <!-- Description -->
        <div>
            <label class="block text-gray-600 mb-1">Description</label>
            <textarea rows="4" placeholder="Write a short description..."
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <!-- reason You sell -->
        <div>
            <label class="block text-gray-600 mb-1">Reason ? Why you Sell</label>
            <textarea rows="4" placeholder="Write a short description..."
                class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <!-- Book Condition -->
        <div>
            <label class="block text-gray-600 mb-1">Book Condition</label>
            <select class="w-full px-4 py-2 border rounded-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">Select Condition</option>
                <option value="new">New</option>
                <option value="like-new">Like New</option>
                <option value="used">Used</option>
                <option value="heavily-used">Heavily Used</option>
            </select>
        </div>
        <hr>


        <!-- Upload Photos -->
        <div>
            <label class="block text-gray-600 mb-2 text-lg">Upload Book Images</label>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

                <!-- Image Box 1 -->
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-md overflow-hidden h-32 flex justify-center items-center">
                    <input type="file" class="absolute inset-0 opacity-0 cursor-pointer z-10" accept="image/*"
                        onchange="showPreview(event, 'preview1')" />
                    <div id="preview1" class="flex flex-col items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                        </svg>
                        <span class="text-sm">Add Photo</span>
                    </div>
                </div>

                <!-- Image Box 2 -->
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-md overflow-hidden h-32 flex justify-center items-center">
                    <input type="file" class="absolute inset-0 opacity-0 cursor-pointer z-10" accept="image/*"
                        onchange="showPreview(event, 'preview2')" />
                    <div id="preview2" class="flex flex-col items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                        </svg>
                        <span class="text-sm">Add Photo</span>
                    </div>
                </div>

                <!-- Image Box 3 -->
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-md overflow-hidden h-32 flex justify-center items-center">
                    <input type="file" class="absolute inset-0 opacity-0 cursor-pointer z-10" accept="image/*"
                        onchange="showPreview(event, 'preview3')" />
                    <div id="preview3" class="flex flex-col items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                        </svg>
                        <span class="text-sm">Add Photo</span>
                    </div>
                </div>

                <!-- Image Box 4 -->
                <div
                    class="relative border-2 border-dashed border-gray-300 rounded-md overflow-hidden h-32 flex justify-center items-center">
                    <input type="file" class="absolute inset-0 opacity-0 cursor-pointer z-10" accept="image/*"
                        onchange="showPreview(event, 'preview4')" />
                    <div id="preview4" class="flex flex-col items-center text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7v10a4 4 0 004 4h10a4 4 0 004-4V7a4 4 0 00-4-4H7a4 4 0 00-4 4z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 11l4 4 4-4M8 7h.01M16 7h.01" />
                        </svg>
                        <span class="text-sm">Add Photo</span>
                    </div>
                </div>

            </div>
        </div>
        <!-- image prieview -->
        <script>
            function showPreview(event, previewId) {
                const file = event.target.files[0];
                const previewDiv = document.getElementById(previewId);

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewDiv.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-md" />`;
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>


        <hr>
        <!-- Location -->
        <div>
            <label class="block text-gray-600 mb-1">Your Location</label>
            <input type="text" placeholder="City or Area"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
        </div>
        <?php include_once "includes/location.php"; ?>

        <!-- Submit Button -->
        <div class="text-center">
            <button
                class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">
                Post Book for Sale
            </button>
        </div>
    </div>


</body>

</html>