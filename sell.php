<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Category Selector</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="bg-gray-100">
    <?php include_once "includes/mini_nav.php"; ?>

  

  <!-- Main Category Container -->
  <div class="max-w-4xl mx-auto mt-4 bg-white rounded shadow overflow-hidden border">
    <div class="p-4 border-b font-semibold text-lg">CHOOSE A CATEGORY</div>

    <!-- Desktop Layout -->
    <div class="hidden md:flex">
      <!-- Left Category List -->
      <div class="w-1/2 border-r divide-y" id="desktopCategoryList"></div>

      <!-- Right Subcategory List -->
      <div class="w-1/2 divide-y" id="desktopSubcategoryList"></div>
    </div>

    <!-- Mobile Layout -->
    <div class="md:hidden divide-y" id="mobileCategoryList"></div>
  </div>

  <script>
    const subcategories = {
      "Cars": ["SUV", "Hatchback", "Sedan", "Luxury", "Others"],
      "Mobiles": ["Smartphones", "Tablets", "Accessories"],
      "Jobs": ["IT Jobs", "Marketing", "BPO", "Education"],
      "Books, Sports & Hobbies": ["Books", "Gym & Fitness", "Musical Instruments", "Sports Equipment", "Other Hobbies"],
    };

    const icons = {
      "Cars": "fa-car-side",
      "Mobiles": "fa-mobile-alt",
      "Jobs": "fa-briefcase",
      "Books, Sports & Hobbies": "fa-dumbbell"
    };

    // Desktop Mode Logic
    const desktopCategoryList = document.getElementById("desktopCategoryList");
    const desktopSubcategoryList = document.getElementById("desktopSubcategoryList");

    function showDesktopSubcategory(category, btn) {
      document.querySelectorAll("#desktopCategoryList button").forEach(b => b.classList.remove("bg-gray-200"));
      btn.classList.add("bg-gray-200");

      const subs = subcategories[category];
      desktopSubcategoryList.innerHTML = subs.map(sub => `
        <div class="px-4 py-3 hover:bg-gray-100 cursor-pointer">${sub}</div>
      `).join("");
    }

    // Mobile Mode Logic
    const mobileCategoryList = document.getElementById("mobileCategoryList");
    let index = 0;
    for (const category in subcategories) {
      const icon = icons[category] || "fa-box";
      const id = `mobile-sub-${index}`;

      // Desktop
      desktopCategoryList.innerHTML += `
        <button onclick="showDesktopSubcategory('${category}', this)" class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
          <div class="flex items-center gap-2">
            <i class="fas ${icon} text-gray-600"></i>
            <span>${category}</span>
          </div>
          <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
        </button>
      `;

      // Mobile
      mobileCategoryList.innerHTML += `
        <div>
          <button onclick="toggleMobileSub('${id}')" class="w-full flex items-center justify-between px-4 py-3 hover:bg-gray-100">
            <div class="flex items-center gap-2">
              <i class="fas ${icon} text-gray-600"></i>
              <span>${category}</span>
            </div>
            <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
          </button>
          <div id="${id}" class="hidden bg-gray-50 border-t">
            ${subcategories[category].map(sub => `
              <div class="px-6 py-2 hover:bg-gray-100 text-sm">${sub}</div>
            `).join("")}
          </div>
        </div>
      `;
      index++;
    }

    // Mobile Toggle Logic
    function toggleMobileSub(id) {
      document.querySelectorAll("[id^='mobile-sub-']").forEach(el => {
        if (el.id !== id) el.classList.add("hidden");
      });
      const target = document.getElementById(id);
      target.classList.toggle("hidden");
    }

    // Desktop: Auto Select First
    window.onload = () => {
      const firstBtn = document.querySelector("#desktopCategoryList button");
      if (firstBtn) firstBtn.click();
    };
  </script>
</body>
</html>
