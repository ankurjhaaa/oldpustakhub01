<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book Toggle with Category</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .hide-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .hide-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
</head>

<body class="bg-gray-100">

  <?php
  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $seeVersionQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
    $seeVersion = $seeVersionQuery->fetch_assoc();
    $seeVersionn = $seeVersion['seeVersion'];
  } else {
    $seeVersionQuery = $connect->query("SELECT * FROM books ");
    $seeVersion = $seeVersionQuery->fetch_assoc();
    $seeVersionn = $seeVersion['version'];
  }
  ?>

  <!-- 📚 Category Bar -->
  <div class="bg-gray-100 py-2 shadow-sm overflow-x-auto hide-scrollbar">
    <div class="flex w-max gap-6 px-4 md:px-12">

      <!-- Category Item -->
      <div class="flex flex-col items-center min-w-[60px] cursor-pointer group">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $newVersion = isset($_POST['bookToggle']) ? 1 : 0;
          $stmt = $connect->prepare("UPDATE users SET seeVersion = ? WHERE email = ?");
          $stmt->bind_param("is", $newVersion, $email);
          $stmt->execute();
          if ($stmt->execute()) {
            echo '<script>window.location.href = "";</script>';
          }
        }
        ?>

        <!-- ✅ Auto-submit form on toggle -->
        <form method="POST">
          <label class="relative inline-flex items-center cursor-pointer mt-2">
            <input type="checkbox" name="bookToggle" class="sr-only peer" id="bookToggle" onchange="this.form.submit()"
              <?php if (isset($_SESSION['email'])) {
                echo ($seeVersion['seeVersion'] == 1) ? 'checked' : '';
              } else {
                echo ($seeVersion['version'] == 1) ? 'checked' : '';
              } ?>>
            <div class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-[#2874f0] transition-colors"></div>
            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-all peer-checked:translate-x-5">
            </div>
          </label>
        </form>

        <span
          class="text-[12px] font-medium mt-1 text-gray-700 group-hover:text-[#2874f0] transition-colors duration-300"><!-- 📘 Old Books Section -->
          <div id="oldBooks">
            <h2><?php if (isset($_SESSION['email'])) {
              if ($seeVersion['seeVersion'] == 0) {
                echo "Old Books ";
              } else {
                echo "New Books";
              }
            } else {
              if ($seeVersion['version'] == 0) {
                echo "Old Books ";
              } else {
                echo "New Books";
              }
            } ?></h2>
          </div>


        </span>
      </div>
      <?php
      $callCatQuery = $connect->query("SELECT * FROM category");
      while ($callCat = $callCatQuery->fetch_array()) { ?>

        <a href="filter.php?category=<?= $callCat['category_title'] ?>">
          <div class="flex flex-col items-center min-w-[60px] cursor-pointer group">
            <img src="images/<?= $callCat['cat_img'] ?>" alt="<?= $callCat['category_title'] ?>"
              class="w-10 h-10 object-cover rounded-md border border-gray-300 group-hover:scale-105 transition-transform duration-300" />
            <span
              class="text-[12px] font-medium mt-1 text-gray-700 group-hover:text-[#2874f0] transition-colors duration-300"><?= $callCat['category_title'] ?></span>
          </div>
        </a>
      <?php } ?>



    </div>
  </div>




</body>

</html>