<?php
if (isset($_SESSION['email'])) { ?>
  <?php if (
    empty($USERDETAIL['firstname']) ||
    empty($USERDETAIL['lastname']) ||
    empty($USERDETAIL['mobile']) ||
    empty($USERDETAIL['password'])
  ) {

    ?>



    <div class="bg-gray-100 flex items-center justify-center ">

      <!-- Popup Overlay -->
      <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
        <div class="bg-white w-[90%] max-w-md rounded-lg border-4 border-[#015551] shadow-lg relative p-6">


          <!-- Logo/Image -->
          <div class="flex justify-center mb-4">
            <img src="images/logo2.png" alt="Logo" class="w-32 h-32 border-2 border-[#015551]">
          </div>

          <!-- Heading -->
          <h2 class="text-center text-2xl font-bold text-gray-800 mb-1">Welcome to PustakHub</h2>
          <p class="text-center text-sm text-gray-500 mb-2">Fill All The Input , Than You Access Your Account To Sell Or Buy
            .</p>
          <?php
          if (isset($_POST['submitDataFill'])) {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);
            $mobile = trim($_POST['mobile']);
            $password = $_POST['password'];

            $errors = [];

            // First name validation
            if (empty($firstname)) {
              $errors['firstname'] = "First name is required.";
            }

            // Last name validation
            if (empty($lastname)) {
              $errors['lastname'] = "Last name is required.";
            }

            // Mobile validation (basic numeric check, can be improved)
            if (empty($mobile)) {
              $errors['mobile'] = "Mobile number is required.";
            } elseif (!preg_match('/^[0-9]{10}$/', $mobile)) {
              $errors['mobile'] = "Enter a valid 10-digit mobile number.";
            }

            // Password validation
            if (empty($password)) {
              $errors['password'] = "Password is required.";
            } elseif (strlen($password) < 6) {
              $errors['password'] = "Password must be at least 6 characters.";
            }

            // If no errors, then update
            if (empty($errors)) {
              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
              $submitDataFill = $connect->query("UPDATE users SET firstname='$firstname', lastname='$lastname', mobile='$mobile', password='$hashedPassword' WHERE email='$email' ");

              if ($submitDataFill) {
                echo '<script>window.location.href = "index.php";</script>';
                exit;
              } else {
                $errors['general'] = "Failed to update user: " . $connect->error;
              }
            }
          }
          ?>

          <!-- Registration Form -->
          <form method="post" action="">
            <p class="text-red-600 text-sm"> <?php if (empty($USERDETAIL['firstname'])) {
              echo "First name is required.";
            } ?></p>
            <input type="text" placeholder="First Name" name="firstname" value="<?= $USERDETAIL['firstname'] ?>"
              class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
              required />

            <p class="text-red-600 text-sm"> <?php if (empty($USERDETAIL['lastname'])) {
              echo "Last name is required.";
            } ?></p>
            <input type="text" placeholder="Last Name" name="lastname" value="<?= $USERDETAIL['lastname'] ?>"
              class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
              required />

            <p class="text-red-600 text-sm"> <?php if (empty($USERDETAIL['mobile'])) {
              echo "Enter a valid 10-digit mobile number.";
            } ?></p>
            <input type="tel" placeholder="Mobile Number" name="mobile" value="<?= $USERDETAIL['mobile'] ?>"
              class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
              required />

            <p class="text-red-600 text-sm"> <?php if (empty($USERDETAIL['password'])) {
              echo "Password must be at least 6 characters.";
            } ?></p>
            <input type="password" placeholder="New Password" name="password"
              class="w-full mb-4 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
              required />



            <button type="submit" name="submitDataFill"
              class="w-full bg-[#015551] text-white py-2 rounded-md hover:bg-[#014842] transition">Fill All Detail</button>
          </form>


          <!-- Footer Text -->
          <p class="text-xs text-center text-gray-400 mt-4">By continuing, you agree to Pustakhub's Terms & Privacy Policy.
          </p>
        </div>
      </div>

    </div>

  <?php } ?>
<?php } ?>