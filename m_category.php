<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Category </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .active-cat {
            background-color: #e0f2fe;
            color: #1d4ed8;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-white md:hidden">
<?php include_once "includes/navbar.php" ?>

    <div class="flex h-screen">

        <!-- Left: Categories -->
        <div class="w-1/4 border-r border-gray-200 overflow-y-auto">
            <ul id="categoryList" class="text-xs">
                <li onclick="showSubcategory('grocery', this)"
                    class="cursor-pointer p-3 space-y-1 text-center active-cat">
                    <img src="https://picsum.photos/60?1" class="w-10 h-10 rounded-full mx-auto" />
                    <p>Grocery</p>
                </li>
                <li onclick="showSubcategory('fashion', this)" class="cursor-pointer p-3 space-y-1 text-center">
                    <img src="https://picsum.photos/60?2" class="w-10 h-10 rounded-full mx-auto" />
                    <p>Fashion</p>
                </li>
                <li onclick="showSubcategory('electronics', this)" class="cursor-pointer p-3 space-y-1 text-center">
                    <img src="https://picsum.photos/60?3" class="w-10 h-10 rounded-full mx-auto" />
                    <p>Electronics</p>
                </li>
            </ul>
        </div>

        <!-- Right: Subcategories -->
        <div class="w-3/4 p-4 overflow-y-auto text-sm">

            <!-- Grocery Subcategory -->
            <div id="grocery" class="subcategory">
                <h2 class="text-base font-semibold mb-3">Grocery</h2>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div><a href="index.php"><img src="https://picsum.photos/60?10" class="rounded-full mx-auto mb-1" /></a>
                        <p>Rice</p>
                    </div>
                    <div><img src="https://picsum.photos/60?11" class="rounded-full mx-auto mb-1" />
                        <p>Tea</p>
                    </div>
                    <div><img src="https://picsum.photos/60?12" class="rounded-full mx-auto mb-1" />
                        <p>Oil</p>
                    </div>
                    <div><img src="https://picsum.photos/60?13" class="rounded-full mx-auto mb-1" />
                        <p>Snacks</p>
                    </div>
                    <div><img src="https://picsum.photos/60?14" class="rounded-full mx-auto mb-1" />
                        <p>Dry Fruits</p>
                    </div>
                    <div><img src="https://picsum.photos/60?15" class="rounded-full mx-auto mb-1" />
                        <p>Masala</p>
                    </div>
                </div>
            </div>

            <!-- Fashion Subcategory -->
            <div id="fashion" class="subcategory hidden">
                <h2 class="text-base font-semibold mb-3">Fashion</h2>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div><img src="https://picsum.photos/60?20" class="rounded-full mx-auto mb-1" />
                        <p>Men</p>
                    </div>
                    <div><img src="https://picsum.photos/60?21" class="rounded-full mx-auto mb-1" />
                        <p>Women</p>
                    </div>
                    <div><img src="https://picsum.photos/60?22" class="rounded-full mx-auto mb-1" />
                        <p>Kids</p>
                    </div>
                    <div><img src="https://picsum.photos/60?23" class="rounded-full mx-auto mb-1" />
                        <p>Footwear</p>
                    </div>
                    <div><img src="https://picsum.photos/60?24" class="rounded-full mx-auto mb-1" />
                        <p>Bags</p>
                    </div>
                    <div><img src="https://picsum.photos/60?25" class="rounded-full mx-auto mb-1" />
                        <p>Watches</p>
                    </div>
                </div>
            </div>

            <!-- Electronics Subcategory -->
            <div id="electronics" class="subcategory hidden">
                <h2 class="text-base font-semibold mb-3">Electronics</h2>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div><img src="https://picsum.photos/60?30" class="rounded-full mx-auto mb-1" />
                        <p>TV</p>
                    </div>
                    <div><img src="https://picsum.photos/60?31" class="rounded-full mx-auto mb-1" />
                        <p>Laptops</p>
                    </div>
                    <div><img src="https://picsum.photos/60?32" class="rounded-full mx-auto mb-1" />
                        <p>Smartphones</p>
                    </div>
                    <div><img src="https://picsum.photos/60?33" class="rounded-full mx-auto mb-1" />
                        <p>Camera</p>
                    </div>
                    <div><img src="https://picsum.photos/60?34" class="rounded-full mx-auto mb-1" />
                        <p>Speakers</p>
                    </div>
                    <div><img src="https://picsum.photos/60?35" class="rounded-full mx-auto mb-1" />
                        <p>Gadgets</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function showSubcategory(id, element) {
            // Hide all subcategories
            document.querySelectorAll('.subcategory').forEach(div => div.classList.add('hidden'));
            // Show selected subcategory
            document.getElementById(id).classList.remove('hidden');

            // Remove active from all
            document.querySelectorAll('#categoryList li').forEach(li => li.classList.remove('active-cat'));
            // Add active class to clicked
            element.classList.add('active-cat');
        }
    </script>


    <?php include_once "includes/bottom_nav.php" ?>
    <br>
    <br>
    <br>
    <?php include_once "users_account/loginpopup.php"; ?>

</body>

</html>