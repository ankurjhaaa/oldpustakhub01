
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 ">
<?php include_once "includes/navbar.php" ?>
  <!-- Header -->
  <div class="bg-white p-4 flex items-center justify-between">
    <div>
      <h2 class="text-lg font-semibold">Sajan Kumar</h2>
      <p class="text-sm text-gray-500">Explore <span class="font-semibold text-blue-600">✨ Plus Silver</span></p>
    </div>
    <div class="bg-yellow-400 text-white px-2 py-1 rounded-full text-xs font-semibold">⚡ 0</div>
  </div>

  <!-- Top Buttons -->
  <div class="grid grid-cols-2 gap-2 bg-white p-4">
    <div class="flex items-center gap-2 border rounded p-2">
      <div class="text-blue-600">📦</div>
      <span>Orders</span>
    </div>
    <div class="flex items-center gap-2 border rounded p-2">
      <div class="text-pink-600">💙</div>
      <span>Wishlist</span>
    </div>
    <div class="flex items-center gap-2 border rounded p-2">
      <div class="text-purple-600">🎁</div>
      <span>Coupons</span>
    </div>
    <div class="flex items-center gap-2 border rounded p-2">
      <div class="text-indigo-600">🎧</div>
      <span>Help Center</span>
    </div>
  </div>

  <!-- Email Verification Banner -->
  <div class="bg-white p-4 mt-2 flex justify-between items-center">
    <div>
      <p class="text-sm font-medium">Add/Verify your Email <span class="text-red-500">•</span></p>
      <p class="text-xs text-gray-500">Get latest updates of your orders</p>
    </div>
    <button class="bg-blue-500 text-white px-4 py-1 rounded">Update</button>
  </div>

  

  <!-- Notifications -->
  <div class="bg-white mt-2 p-4">
    <h3 class="font-bold mb-2">Notifications</h3>
    <div class="text-sm text-gray-700">🔔 Tap for latest updates and offers</div>
  </div>

  <!-- Account Settings -->
  <div class="bg-white mt-2 p-4 space-y-3">
    <h3 class="font-bold">Account Settings</h3>
    <p>✨ Flipkart Plus</p>
    <p>👤 Edit Profile</p>
    <p>💳 Saved Credit / Debit & Gift Cards</p>
    <p>📍 Saved Addresses</p>
    <p>🈯 Select Language</p>
    <p>🔔 Notification Settings</p>
    <p>🔒 Privacy Center</p>
  </div>

  <!-- Activity -->
  <div class="bg-white mt-2 p-4 space-y-2">
    <h3 class="font-bold">My Activity</h3>
    <p>✍️ Reviews</p>
    <p>💬 Questions & Answers</p>
  </div>

  <!-- Sell -->
  <div class="bg-white mt-2 p-4 space-y-2">
    <h3 class="font-bold">Earn with Flipkart</h3>
    <p>🏪 Sell on Flipkart</p>
  </div>

  <!-- Footer -->
  <div class="bg-white mt-2 p-4 space-y-2">
    <h3 class="font-bold">Feedback & Information</h3>
    <p>📄 Terms, Policies and Licenses</p>
    <p>❓ Browse FAQs</p>
  </div>

  <!-- Logout -->
  <div class="bg-white p-4 text-center">
    <button class="text-red-600 font-semibold">Log Out</button>
  </div>

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
  <br>
    <br>
    <br>
    <?php include_once "users_account/loginpopup.php"; ?>

</body>
</html>
