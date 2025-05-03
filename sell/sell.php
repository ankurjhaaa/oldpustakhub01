
<?php include_once "../config/db.php"; 
 if(!isset($_SESSION['email'])){
  echo '<script>window.history.back();</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Category Selector</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script>
    function showDesktopSubcategory(id, btn) {
      document.querySelectorAll("[data-desktop-sub]").forEach(el => el.classList.add("hidden"));
      document.querySelectorAll("#desktopCategoryList button").forEach(b => b.classList.remove("bg-gray-200"));
      btn.classList.add("bg-gray-200");
      document.getElementById(id).classList.remove("hidden");
    }

    function toggleMobileSub(id) {
      document.querySelectorAll("[id^='mobile-sub-']").forEach(el => {
        if (el.id !== id) el.classList.add("hidden");
      });
      document.getElementById(id).classList.toggle("hidden");
    }

    window.onload = () => {
      const firstBtn = document.querySelector("#desktopCategoryList button");
      if (firstBtn) firstBtn.click();
    };
  </script>
</head>

<body class="bg-gray-100">
  <?php include_once "../includes/mini_nav.php"; ?>

  <!-- Main Container -->
  <div class="max-w-4xl mx-auto mt-4 bg-white rounded shadow overflow-hidden border">
    <div class="p-4 border-b font-semibold text-lg">CHOOSE A CATEGORY</div>

    <!-- Desktop Layout -->
    <div class="hidden md:flex">
      <!-- Left: Categories -->
      <div class="w-1/2 border-r divide-y" id="desktopCategoryList">
        <button onclick="showDesktopSubcategory('sub-cars', this)"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"></i><span>Novel </span></div>
          <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
        </button>
        <button onclick="showDesktopSubcategory('sub-mobiles', this)"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"><span>Science</span></div>
          <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
        </button>
        <button onclick="showDesktopSubcategory('sub-jobs', this)"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"></i><span>Entertenment</span></div>
          <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
        </button>
        <button onclick="showDesktopSubcategory('sub-books', this)"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"></i><span>Dummy</span></div>
          <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
        </button>
      </div>

      <!-- Right: Subcategories -->
      <div class="w-1/2 divide-y" id="desktopSubcategoryList">
        <div id="sub-cars" data-desktop-sub class="hidden">
          <?php
          $call_subcat_id = $connect->query("SELECT * FROM sub_category WHERE cat_id=1");
          while ($subcat_id = $call_subcat_id->fetch_array()) { ?>
            <a href="sell_book.php?subcat_id=<?= $subcat_id['subcat_id'] ?>"><div class="px-4 py-3 hover:bg-gray-100 cursor-pointer"><?= $subcat_id['subcat_title'] ?></div></a>
          <?php } ?>

          <!-- <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">Hatchback</div>
          <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">Sedan</div>
          <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">Luxury</div>
          <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">Others</div> -->
        </div>
        <div id="sub-mobiles" data-desktop-sub class="hidden">
          <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">chemistry</div>
          
        </div>
        <div id="sub-jobs" data-desktop-sub class="hidden">
          <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">physics</div>
          
        </div>
        <div id="sub-books" data-desktop-sub class="hidden">
          <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">new books</div>
          
        </div>
      </div>
    </div>

    <!-- Mobile Layout -->
    <div class="md:hidden divide-y" id="mobileCategoryList">
      <div>
        <button onclick="toggleMobileSub('mobile-sub-0')"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"><i class="fas fa-car-side text-gray-600"></i><span>Cars</span></div>
          <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
        </button>
        <div id="mobile-sub-0" class="hidden bg-gray-50 border-t">
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">SUV</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Hatchback</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Sedan</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Luxury</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Others</div>
        </div>
      </div>

      <div>
        <button onclick="toggleMobileSub('mobile-sub-1')"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"><i class="fas fa-mobile-alt text-gray-600"></i><span>Mobiles</span></div>
          <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
        </button>
        <div id="mobile-sub-1" class="hidden bg-gray-50 border-t">
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Smartphones</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Tablets</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Accessories</div>
        </div>
      </div>

      <div>
        <button onclick="toggleMobileSub('mobile-sub-2')"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"><i class="fas fa-briefcase text-gray-600"></i><span>Jobs</span></div>
          <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
        </button>
        <div id="mobile-sub-2" class="hidden bg-gray-50 border-t">
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">IT Jobs</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Marketing</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">BPO</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Education</div>
        </div>
      </div>

      <div>
        <button onclick="toggleMobileSub('mobile-sub-3')"
          class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2"><i class="fas fa-dumbbell text-gray-600"></i><span>Books, Sports &
              Hobbies</span></div>
          <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
        </button>
        <div id="mobile-sub-3" class="hidden bg-gray-50 border-t">
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Books</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Gym & Fitness</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Musical Instruments</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Sports Equipment</div>
          <div class="px-6 py-2 hover:bg-gray-100 text-sm">Other Hobbies</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>