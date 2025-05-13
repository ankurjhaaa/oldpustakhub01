<?php include_once "config/db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>profile | pustakhub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
  <?php include_once "includes/navbar.php" ?>
  <!-- Mobile User Profile Header -->
  <?php if (isset($_SESSION['email'])) { ?>
    <div class="bg-white px-4 py-3  shadow-lg flex items-start space-x-3">
      <!-- Profile Initial -->
      <div
        class="w-11 h-11 flex items-center justify-center rounded-full bg-[#015551]/10 text-[#015551] font-bold text-lg mt-2">
        <?= strtoupper(substr($USERDETAIL['firstname'], 0, 1)) ?>
      </div>

      <!-- User Info -->
      <div class="flex-1 mt-2">
        <!-- Name & Badge -->
        <div class="flex items-center space-x-2">
          <h2 class="text-base font-semibold text-gray-800"><?= $USERDETAIL['firstname'] ?>   <?= $USERDETAIL['lastname'] ?>
          </h2>
          <?php if ($USERDETAIL['role'] == '2'): ?>
            <span class="text-[10px] bg-green-100 text-green-600 px-2 py-[2px] rounded-md font-medium">Seller</span>
          <?php endif; ?>
        </div>

        <!-- Sub Info -->
        <p class="text-[13px] text-gray-500 mt-1">
          <?php if ($USERDETAIL['role'] == '2') { ?>
            <span class="text-blue-600 font-semibold">✨ Valid till
              <?php
              $datetime = $USERDETAIL['purchased_end']; // e.g. "2025-07-10 16:30:00"
              $formattedDate = date("d M Y, h:i A", strtotime($datetime)); // Example: "10 Jul 2025, 04:30 PM"
              echo $formattedDate;
              ?>

            </span>
          <?php } else { ?>
            <span class="text-blue-600 font-semibold">✨ Not Seller </span>
          <?php } ?>

        </p>

        <!-- Follower / Following -->
        <div class="flex space-x-6 mt-2 text-[12px] text-gray-600 font-medium">
          <span>👥 Followers:
            <strong><?= mysqli_num_rows($connect->query("SELECT * FROM follow WHERE sellerEmail='$email'")) ?></strong></span>
          <span>🔄 Following:
            <strong><?= mysqli_num_rows($connect->query("SELECT * FROM follow WHERE userEmail='$email'")) ?></strong></span>
        </div>
      </div>
    </div>

    <!-- Top Buttons -->
    <div class="grid grid-cols-2 gap-2 bg-white p-4">
      <a href="wallet/wallet.php">
        <div class="flex items-center gap-2 border rounded p-2">
          <div class="text-blue-600">📦</div>
          <span>Wallet</span>
        </div>
      </a>
      <a href="wishlist.php">
        <div class="flex items-center gap-2 border rounded p-2">
          <div class="text-pink-600">💙</div>
          <span>Wishlist</span>
        </div>
      </a>
      <a href="profile.php?email=<?= $USERDETAIL['email'] ?>">
        <div class="flex items-center gap-2 border rounded p-2">
          <div class="text-purple-600">🎁</div>
          <span>Your Books</span>
        </div>
      </a>
      <a href="">
        <div class="flex items-center gap-2 border rounded p-2">
          <div class="text-indigo-600">🎧</div>
          <span>Help Center</span>
        </div>
      </a>
    </div>


    <!-- Account Settings -->
    <div class="bg-white mt-2 p-4 space-y-3">
      <h3 class="font-bold">Account Settings</h3>
      <!-- <div class="p-2">
      <p>✨ Flipkart Plus</p>
    </div> -->
      <div class="p-2">
        <a href="users_account/editProfile.php">👤 Edit Profile</a>
      </div>
      <!-- <div class="p-2">
      <p>💳 Saved Credit / Debit & Gift Cards</p>
    </div> -->
      <div class="p-2">
        <p>📍 Saved Addresses</p>
      </div>
      <div class="p-2">
        <p>🈯 Select Language</p>
      </div>
      <div class="p-2">
        <p>🔔 Notification Settings</p>
      </div>
      <div class="p-2">
        <p>🔒 Privacy Center</p>
      </div>

    </div>

  <?php } else { ?>
    <div class="bg-white px-4 py-3  shadow-lg flex items-start space-x-3">
      <!-- Profile Initial -->
      <div
        class="w-11 h-11 flex items-center justify-center rounded-full bg-[#015551]/10 text-[#015551] font-bold text-lg mt-2">
        U
      </div>

      <!-- User Info -->
      <div class="flex-1 mt-2">
        <!-- Name & Badge -->
        <div class="flex items-center space-x-2">
          <h2 class="text-base font-semibold text-gray-800">Guest User
          </h2>

        </div>

        <!-- Sub Info -->
        <p class="text-[13px] text-gray-500 mt-1">
          <span class="text-blue-600 font-semibold">Login</span>
        </p>
      </div>
    </div>
  <?php } ?>




  <!-- Email Verification Banner -->
  <!-- <div class="bg-white p-4 mt-2 flex justify-between items-center">
    <div>
      <p class="text-sm font-medium">Add/Verify your Email <span class="text-red-500">•</span></p>
      <p class="text-xs text-gray-500">Get latest updates of your orders</p>
    </div>
    <button class="bg-blue-500 text-white px-4 py-1 rounded">Update</button>
  </div> -->



  <!-- Notifications -->
  <!-- <div class="bg-white mt-2 p-4">
    <h3 class="font-bold mb-2">Notifications</h3>
    <div class="text-sm text-gray-700">🔔 Tap for latest updates and offers</div>
  </div> -->



  <!-- Activity -->
  <!-- <div class="bg-white mt-2 p-4 space-y-2">
    <h3 class="font-bold">My Activity</h3>
    
  </div> -->
  <!-- Footer -->
  <div class="bg-white mt-2 p-4 space-y-2">
    <h3 class="font-bold">Feedback & Information</h3>
    <div class="p-2">
      <p>📄 Terms, Policies and Licenses</p>
    </div>
    <div class="p-2">
      <p>❓ Browse FAQs</p>
    </div>
    <div class="p-2">
      <p>✍️ Reviews</p>
    </div>
    <div class="p-2">
      <p>💬 Questions & Answers</p>
    </div>

  </div>
  <?php if (isset($_SESSION['email'])) { ?>
    <!-- Sell -->
    <div class="bg-white mt-2 p-4 space-y-2">
      <h3 class="font-bold">Get Seller Tag</h3>
      <div class="p-2">
        <a href="wallet/purchaseSellPlan.php">
          <p>🏪 Sell New Books With Us</p>

        </a>
      </div>

    </div>


    <!-- Logout -->
    <div class="bg-white p-4 text-center mt-2">
      <a href="users_account/logout.php" class="text-red-600 text-xl font-semibold">Log Out</a>
    </div>
  <?php } else { ?>
    <!-- Logout -->
    <div class=" openPopupBtn bg-white p-4 text-center mt-2">
      <button class="text-red-600 text-xl font-semibold">Login</button>
    </div>
  <?php } ?>


  <!-- Bottom Navigation -->
  <!-- <div class="fixed bottom-0 left-0 right-0 bg-white border-t flex justify-around text-sm py-2">
    <div class="flex flex-col items-center text-blue-600">🏠<span>Home</span></div>
    <div class="flex flex-col items-center">🎮<span>Play</span></div>
    <div class="flex flex-col items-center">📂<span>Categories</span></div>
    <div class="flex flex-col items-center font-semibold text-blue-600">👤<span>Account</span></div>
    <div class="flex flex-col items-center relative">
      🛒<span>Cart</span>
      <span class="absolute top-0 right-0 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">2</span>
    </div>
  </div> -->
  <?php include_once "includes/bottom_nav.php" ?>


  <br>
  <br>
  <br>
  <br>
  <br>
  <?php include_once "users_account/loginpopup.php"; ?>

</body>

</html>