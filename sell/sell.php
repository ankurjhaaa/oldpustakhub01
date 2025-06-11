<?php include_once "../config/db.php";
if (!isset($_SESSION['email'])) {
  echo '<script>window.history.back();</script>';
} else {
  if ($USERDETAIL['isPlanActive'] == 0) {
    echo '<script>window.history.back();</script>';

  }
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
    <div class="p-4 border-b font-semibold text-lg">CHOOSE BOOK CATEGORY</div>

    <!-- Desktop Layout -->
    <div class="hidden md:flex">
      <!-- Left: Categories -->
      <div class="w-1/2 border-r divide-y" id="desktopCategoryList">
        <?php
        $call_cat_id = $connect->query("SELECT * FROM category ");
        while ($cat_id = $call_cat_id->fetch_array()) { ?>
          <button onclick="showDesktopSubcategory('category-<?= $cat_id['cat_id'] ?>', this)"
            class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
            <div class="flex items-center gap-2"><span><?= $cat_id['category_title'] ?></span></div>
            <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
          </button>

        <?php } ?>
      </div>

      <!-- Right: Subcategories -->
      <div class="w-1/2 divide-y" id="desktopSubcategoryList">
        <?php
        $call_cat_id = $connect->query("SELECT * FROM category ");
        while ($cat_id = $call_cat_id->fetch_array()) { ?>
          <div id="category-<?= $cat_id['cat_id'] ?>" data-desktop-sub class="hidden">
            <?php
            $subcatId = $cat_id['cat_id'];
            $call_subcat_id = $connect->query("SELECT * FROM sub_category WHERE cat_id='$subcatId'");
            while ($subcat_id = $call_subcat_id->fetch_array()) { ?>
              <a href="sell_book.php?subcat_id=<?= $subcat_id['subcat_id'] ?>">
                <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer"><?= $subcat_id['subcat_title'] ?></div>
              </a>
            <?php } ?>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Mobile Layout -->
    <div class="md:hidden divide-y" id="mobileCategoryList">
      <?php
      $call_cat_id = $connect->query("SELECT * FROM category ");
      while ($cat_id = $call_cat_id->fetch_array()) { ?>
        <div>
          <button onclick="toggleMobileSub('mcategory-<?= $cat_id['cat_id'] ?>')"
            class="w-full flex items-center justify-between px-10 py-4 hover:bg-gray-100">
            <div class="flex items-center gap-2 text-lg"></i><span><?= $cat_id['category_title'] ?></span></div>
            <i class="fas fa-chevron-down text-gray-400 text-md"></i>
          </button>
          <div id="mcategory-<?= $cat_id['cat_id'] ?>" class="hidden bg-gray-50 border-t">
            <?php
            $subcatId = $cat_id['cat_id'];
            $call_subcat_id = $connect->query("SELECT * FROM sub_category WHERE cat_id='$subcatId'");
            while ($subcat_id = $call_subcat_id->fetch_array()) { ?>
              <a href="sell_book.php?subcat_id=<?= $subcat_id['subcat_id'] ?>">
                <div class="px-20 py-3 hover:bg-gray-100 text-md"><?= $subcat_id['subcat_title'] ?></div>
              </a>
            <?php } ?>


          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <?php include_once "../users_account/withoutNamePopup.php"; ?>
</body>

</html>