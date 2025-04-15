<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFBEE] min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6 sm:p-8">
    <h2 class="text-2xl sm:text-3xl font-bold text-center text-[#015551] mb-6">Create an Account</h2>

    <!-- Sign Up Form -->
    <form action="signup_action.php" method="POST" class="space-y-4">
      <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
          <label class="block text-sm text-[#015551] mb-1">First Name</label>
          <input type="text" name="first_name" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#57B4BA] focus:outline-none" />
        </div>
        <div class="flex-1">
          <label class="block text-sm text-[#015551] mb-1">Last Name</label>
          <input type="text" name="last_name" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#57B4BA] focus:outline-none" />
        </div>
      </div>

      <div>
        <label class="block text-sm text-[#015551] mb-1">Mobile Number</label>
        <input type="tel" name="mobile" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#57B4BA] focus:outline-none" />
      </div>

      <div>
        <label class="block text-sm text-[#015551] mb-1">Email Address</label>
        <input type="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#57B4BA] focus:outline-none" />
      </div>

      <div>
        <label class="block text-sm text-[#015551] mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#57B4BA] focus:outline-none" />
      </div>

      <button
        type="submit" name="signup"
        class="w-full bg-[#015551] text-white font-semibold py-2 rounded-lg hover:bg-[#013e3c] transition duration-200">
        Sign Up
      </button>
    </form>

    <!-- Already have an account -->
    <p class="mt-6 text-center text-sm text-gray-600">
      Already have an account?
      <a href="login.php" class="text-[#57B4BA] hover:underline font-medium">Login</a>
    </p>
  </div>

</body>
</html>
