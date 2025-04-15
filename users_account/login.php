<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Modern Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FDFBEE] flex items-center justify-center min-h-screen">

  <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl">
    <h2 class="text-3xl font-bold text-center text-[#015551] mb-6">Welcome Back</h2>

    <form action="login_action.php" method="POST">
      <!-- Email -->
      <div class="mb-4">
        <label class="block text-sm font-medium text-[#015551] mb-1" for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="you@example.com"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA]" />
      </div>

      <!-- Password -->
      <div class="mb-6">
        <label class="block text-sm font-medium text-[#015551] mb-1" for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="********"
          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA]" />
      </div>

      <!-- Login Button -->
      <button name="login"
        class="w-full bg-[#015551] text-white py-2 rounded-lg hover:bg-[#013e3c] transition duration-200 font-semibold">
        Sign In
      </button>
    </form>

    <!-- Divider -->
    <div class="my-6 flex items-center">
      <hr class="flex-grow border-t border-gray-300" />
      <span class="mx-3 text-gray-500 text-sm">or</span>
      <hr class="flex-grow border-t border-gray-300" />
    </div>

    <!-- Google Sign In -->
    <button
      class="w-full flex items-center justify-center gap-2 border border-gray-300 py-2 rounded-lg text-[#FE4F2D] hover:bg-[#fef1ee] transition duration-200 font-semibold">
      <img src="https://img.icons8.com/color/20/google-logo.png" alt="Google" />
      Sign in with Google
    </button>

    <!-- Sign up link -->
    <p class="mt-6 text-center text-sm text-gray-600">
      Don’t have an account?
      <a href="#" class="text-[#57B4BA] hover:underline font-medium">Sign up</a>
    </p>
  </div>
  

</body>

</html>