<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OTP Verification</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FDFBEE] min-h-screen flex items-center justify-center px-4">

  <div class="w-full max-w-sm sm:max-w-md bg-white p-6 sm:p-8 rounded-2xl shadow-xl">
    <h2 class="text-2xl sm:text-3xl font-bold text-center text-[#015551] mb-2">Verify OTP</h2>
    <p class="text-sm text-gray-600 text-center mb-6">
      Please enter the 6-digit OTP sent to your email.
    </p>

    <!-- OTP Inputs -->
    <div class="flex justify-between gap-2 mb-6">
      <input type="text" maxlength="1"
        class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA] text-xl" />
      <input type="text" maxlength="1"
        class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA] text-xl" />
      <input type="text" maxlength="1"
        class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA] text-xl" />
      <input type="text" maxlength="1"
        class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA] text-xl" />
      <input type="text" maxlength="1"
        class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA] text-xl" />
      <input type="text" maxlength="1"
        class="w-12 h-12 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#57B4BA] text-xl" />
    </div>

    <!-- Verify Button -->
    <button
      class="w-full bg-[#015551] text-white py-2 rounded-lg hover:bg-[#013e3c] transition duration-200 font-semibold">
      Verify OTP
    </button>

    <!-- Resend Link -->
    <p class="mt-6 text-center text-sm text-gray-600">
      Didn’t receive the OTP?
      <a href="#" class="text-[#57B4BA] hover:underline font-medium">Resend OTP</a>
    </p>
  </div>

  <!-- Optional Auto-focus JS -->
  <script>
    const inputs = document.querySelectorAll("input[type='text']");
    inputs.forEach((input, index) => {
      input.addEventListener("input", () => {
        if (input.value.length === 1 && index < inputs.length - 1) {
          inputs[index + 1].focus();
        }
      });
    });
  </script>
</body>
</html>
