<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFBEE] min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-sm sm:max-w-md bg-white p-6 sm:p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl sm:text-3xl font-bold text-center text-[#015551] mb-2">Forgot Password?</h2>
    <p class="text-sm text-gray-600 text-center mb-6">
      Enter your registered email and we'll send you a password reset link.
    </p>

    <!-- Email Input -->
    <div class="mb-4">
      <label for="email" class="block text-sm font-medium text-[#015551] mb-1">Email Address</label>
      <input type="email" id="email" placeholder="you@example.com"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA]" />
    </div>

    <!-- Reset Password Button -->
    <button
      class="w-full bg-[#015551] text-white py-2 rounded-lg hover:bg-[#013e3c] transition duration-200 font-semibold">
      Send Reset Link
    </button>

    <!-- Back to Login -->
    <p class="mt-6 text-center text-sm text-gray-600">
      Remembered your password?
      <a href="login.html" class="text-[#57B4BA] hover:underline font-medium">Back to Login</a>
    </p>
  </div>

</body>
</html>
