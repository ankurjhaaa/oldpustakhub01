<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Popup Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center w-full h-screen">



    <!-- Popup Overlay -->
    <div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-[90%] max-w-sm rounded-xl shadow-lg relative p-6">

            <!-- Close Button -->
            <button id="closePopupBtn"
                class="absolute top-4 right-4 text-2xl text-gray-600 hover:text-black">&times;</button>

            <!-- Image -->
            <div class="flex justify-center mb-4">
                <img src="images/logo2.png" alt="Icon" class="w-16 h-16">
            </div>

            <!-- Message -->
            <p class="text-center text-gray-800 font-medium text-lg mb-6">
                Help us become one of the safest places to buy and sell
            </p>

            <!-- Progress Dots -->
            <div class="flex justify-center space-x-2 mb-6">
                <span class="w-2 h-2 rounded-full bg-teal-800"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                <span class="w-2 h-2 rounded-full bg-gray-300"></span>
            </div>

            <!-- Continue with Email Button -->
            <button id="showLoginForm"
                class="w-full border border-gray-400 rounded-md py-2 flex items-center justify-center gap-2 mb-4 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H8m0 0l-4 4m4-4l-4-4" />
                </svg>
                Continue with Password
            </button>

            <!-- Login Form -->
            <div id="loginForm" class="hidden">
                <form action="users_account/login_action.php" method="post">
                    <input type="email" placeholder="Email" name="email"
                        class="w-full mb-3 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    <input type="password" placeholder="Password" name="password"
                        class="w-full mb-3 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    <button name="login"
                        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition mb-3">Login</button>
                </form>
            </div>

            <!-- Google Button -->
            <?php
                require 'vendor/autoload.php';
                $client = new Google_Client();
                $client->setClientId('221201399960-mtidn0pcb10bgrga4nu9v15pssvaj2fi.apps.googleusercontent.com');
                $client->setClientSecret('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');
                $client->setRedirectUri('http://localhost/pustakhub/index.php');
                $client->addScope(['email', 'profile']);
                $login_url = $client->createAuthUrl();
                ?>
            <a href="<?= $login_url ?>"
                class="w-full border border-gray-400 rounded-md py-2 flex items-center justify-center gap-2 mb-4 hover:bg-gray-100">
                <img src="https://www.google.com/favicon.ico" alt="Google" class="w-5 h-5">
                Continue with Google
            </a>

            <!-- OR -->
            <!-- <div class="text-center mb-4 font-semibold text-gray-500">OR</div> -->

            <!-- Forget Password Link -->
            <!-- <div class="text-center mb-4">
                <a href="#" id="showOtpSection" class="text-blue-800 font-semibold underline">Forget Password</a>
            </div> -->

            <!-- OTP Section -->
            <!-- <div id="otpSection" class="hidden">
                <input type="email" placeholder="Enter your email"
                    class="w-full mb-3 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400" />
                <button class="w-full bg-purple-600 text-white py-2 rounded-md hover:bg-purple-700 transition mb-3">Send
                    OTP</button>
                <input type="text" placeholder="Enter OTP"
                    class="w-full mb-3 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400" />
                <button class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">Verify
                    OTP</button>
            </div> -->

            <!-- Privacy Note -->
            <p class="text-xs text-center text-gray-500 mt-4">
                All your personal details are safe with us.<br>
                If you continue, you are accepting <a href="#" class="text-blue-700 underline">pustakhub Terms and
                    Conditions</a> and <a href="#" class="text-blue-700 underline">Privacy Policy</a>.
            </p>
        </div>
    </div>

    <!-- JavaScript to Handle Popup & Switching -->
    <script>
    const openButtons = document.querySelectorAll('.openPopupBtn'); // now handles multiple buttons
    const closeBtn = document.getElementById('closePopupBtn');
    const overlay = document.getElementById('popupOverlay');
    const loginForm = document.getElementById('loginForm');
    const showLoginFormBtn = document.getElementById('showLoginForm');
    const otpSection = document.getElementById('otpSection');
    const showOtpBtn = document.getElementById('showOtpSection');

    // loop through all buttons and attach click listener
    openButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            overlay.classList.remove('hidden');
            loginForm.classList.add('hidden');
            otpSection.classList.add('hidden');
        });
    });

    closeBtn.addEventListener('click', () => {
        overlay.classList.add('hidden');
    });

    window.addEventListener('click', (e) => {
        if (e.target === overlay) {
            overlay.classList.add('hidden');
        }
    });

    showLoginFormBtn.addEventListener('click', () => {
        loginForm.classList.remove('hidden');
        otpSection.classList.add('hidden');
    });

    showOtpBtn.addEventListener('click', () => {
        otpSection.classList.remove('hidden');
        loginForm.classList.add('hidden');
    });
</script>

</body>

</html>