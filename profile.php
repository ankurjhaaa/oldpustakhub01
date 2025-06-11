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
  <div class="flex flex-wrap w-full">
    <!-- Left Div -->
    <div class="w-full md:w-2/5 lg:w-1/4 p-2">
      <!-- Mobile User Profile Header -->
      <?php if (isset($_SESSION['email'])) { ?>
        <div class="bg-white px-4 py-3  shadow-lg flex items-start space-x-3 ">
          <!-- Profile Initial -->
          <div
            class="w-11 h-11 flex items-center justify-center rounded-full bg-[#015551]/10 text-[#015551] font-bold text-lg mt-2">
            <?= strtoupper(substr($USERDETAIL['firstname'], 0, 1)) ?>
          </div>

          <!-- User Info -->
          <div class="flex-1 mt-2">
            <!-- Name & Badge -->
            <div class="flex items-center space-x-2">
              <h2 class="text-base font-semibold text-gray-800"><?= $USERDETAIL['firstname'] ?>
                <?= $USERDETAIL['lastname'] ?>
              </h2>
              <?php if ($USERDETAIL['role'] == '2'): ?>
                <span class="text-[10px] bg-green-100 text-green-600 px-2 py-[2px] rounded-md font-medium">Seller</span>
              <?php endif; ?>
            </div>

            <!-- Sub Info -->
            <p class="text-[13px] text-gray-500 mt-1">
              <?php if ($USERDETAIL['role'] == '2') { ?>
                <?php if ($USERDETAIL['purchased_at'] > $USERDETAIL['purchased_end']) { ?>
                  <span class="text-red-600 font-semibold">Expired On</span>
                  <?= date("d M Y, h:i A", strtotime($USERDETAIL['purchased_end'])) ?>

                <?php } else { ?>

                  <span class="text-blue-600 font-semibold">✨ Valid till
                    <?php
                    $datetime = $USERDETAIL['purchased_end']; // e.g. "2025-07-10 16:30:00"
                    $formattedDate = date("d M Y, h:i A", strtotime($datetime)); // Example: "10 Jul 2025, 04:30 PM"
                    echo $formattedDate;
                    ?>

                  </span>
                <?php } ?>
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
          <a href="booksFrom.php?email=<?= $_SESSION['email'] ?>">
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


        <?php if ($USERDETAIL['role'] == 2) { ?>
          <div class="bg-white mt-2 p-4 space-y-2">
            <h3 class="font-bold">Upgrade</h3>
            <div class="p-2">
              <a href="wallet/purchaseSellPlan.php">
                <p>Upgrade Plan with us </p>

              </a>
            </div>

          </div>
        <?php } else { ?>
          <div class="bg-white mt-2 p-4 space-y-2">
            <h3 class="font-bold">Get Seller Tag</h3>
            <div class="p-2">
              <a href="wallet/purchaseSellPlan.php">
                <p>Sell New Books With Us</p>

              </a>
            </div>

          </div>

        <?php } ?>

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
      <?php include_once "users_account/withoutNamePopup.php"; ?>
      <?php include_once "users_account/loginpopup.php"; ?>
    </div>

    <!-- Right Div (hidden on mobile) -->
    <div class="hidden md:block w-full md:w-3/5 lg:w-3/4">
      <div class="flex justify-center items-center mt-10">
        <div class="w-full md:w-2/3 bg-white p-6 rounded-lg ">
          <h3 class="text-lg font-semibold text-gray-800 mb-4">Update Detail</h3>
          <?php
          $callUserDetail = $connect->query("SELECT * FROM users WHERE email='$email'");
          $userDetail = $callUserDetail->fetch_assoc();
          ?>

          <form action="" method="POST">
            <!-- First & Last Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
              <div>
                <label class="block text-gray-700 mb-1">First Name</label>
                <input type="text" name="first_name" placeholder="Ankur" value="<?= $userDetail['firstname'] ?>"
                  class="w-full p-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551]"
                  required>
              </div>
              <div>
                <label class="block text-gray-700 mb-1">Last Name</label>
                <input type="text" name="last_name" placeholder="Jha" value="<?= $userDetail['lastname'] ?>"
                  class="w-full p-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551]"
                  required>
              </div>
            </div>

            <!-- Education (Dropdown) -->
            <div class="mb-4">
              <label class="block text-gray-700 mb-1">Education</label>
              <select name="education"
                class="w-full p-3 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551]">
                <option
                  value="<?= !empty($userDetail['education']) ? $userDetail['education'] : 'Select your highest education' ?>">
                  <?= !empty($userDetail['education']) ? $userDetail['education'] : 'Select your highest education' ?>
                </option>

                <option value="Class 1">Class 1</option>
                <option value="Class 2">Class 2</option>
                <option value="Class 3">Class 3</option>
                <option value="Class 4">Class 4</option>
                <option value="Class 5">Class 5</option>
                <option value="Class 6">Class 6</option>
                <option value="Class 7">Class 7</option>
                <option value="Class 8">Class 8</option>
                <option value="Class 9">Class 9</option>
                <option value="Class 10 (Matric)">Class 10 (Matric)</option>
                <option value="Class 12 (Intermediate)">Class 12 (Intermediate)</option>
                <option value="Diploma">Diploma</option>
                <option value="Bachelor's (B.A/B.Sc/B.Com)">Bachelor's (B.A/B.Sc/B.Com)</option>
                <option value="B.Tech / B.E">B.Tech / B.E</option>
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="Master's (M.A/M.Sc/M.Com)">Master's (M.A/M.Sc/M.Com)</option>
                <option value="M.Tech / M.E">M.Tech / M.E</option>
                <option value="MBA">MBA</option>
                <option value="MCA">MCA</option>
                <option value="Ph.D.">Ph.D.</option>
                <option value="Other">Other</option>
              </select>
            </div>


            <!-- Contact Info -->
            <h3 class="text-lg font-semibold text-gray-800 mb-4 mt-6">Contact Information</h3>

            <!-- Phone Number -->
            <div class="mb-4">
              <label class="block text-gray-700 mb-1">Phone Number</label>
              <div class="flex items-center space-x-2">
                <!-- <span class="text-gray-600">+91</span> -->
                <input type="text" name="mobile" placeholder="Phone Number" value="<?= $userDetail['mobile'] ?>"
                  class="w-full p-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551]"
                  required>
              </div>

            </div>

            <!-- Password -->
            <div class="mb-6">
              <label class="block text-gray-700 mb-1">Password</label>
              <input type="password" name="password" placeholder="Enter new password"
                class="w-full p-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551]">
              <p class="text-gray-500 text-sm mt-2">Leave blank to keep current password.</p>
            </div>

            <!-- Save Button -->
            <div class="text-right">
              <button type="submit" name="updateProfile"
                class="bg-[#015551] hover:bg-[#013f3f] text-white font-semibold py-2 px-6 rounded-sm transition duration-300">
                Save Changes
              </button>
            </div>
          </form>
          <?php
          if (isset($_POST['updateProfile'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $education = $_POST['education'];
            $mobile = $_POST['mobile'];
            $password = $_POST['password'];


            if ($password == "") {

              $stmt = $connect->prepare("UPDATE users SET firstname = ?, lastname = ?, education = ?, mobile = ? WHERE email = ?");
              $stmt->bind_param("sssss", $first_name, $last_name, $education, $mobile, $email);
            } else {

              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
              $stmt = $connect->prepare("UPDATE users SET firstname = ?, lastname = ?, education = ?, mobile = ?, password = ? WHERE email = ?");
              $stmt->bind_param("ssssss", $first_name, $last_name, $education, $mobile, $hashedPassword, $email);
            }

            if ($stmt->execute()) {
              echo '<script>window.location.href = "profile.php";</script>';

              echo "<p class='text-green-600 font-medium mt-4'>Profile updated successfully.</p>";
            } else {
              echo "<p class='text-red-600 font-medium mt-4'>Failed to update profile. Please try again.</p>";
            }
          }


          ?>
        </div>
      </div>
    </div>
  </div>


</body>

</html>