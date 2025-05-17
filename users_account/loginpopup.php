<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Popup Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">

    <!-- Trigger Button (Example) -->
    <!-- <button class="openPopupBtn bg-blue-600 text-white px-4 py-2 rounded-md">Open Login Popup</button> -->

    <!-- Popup Overlay -->
    <div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-gray-100 rounded-lg border-4 border-[#015551] shadow-lg w-[90%] max-w-sm p-6 relative">

            <!-- Close Button -->
            <button id="closePopupBtn" class="absolute top-4 right-4 text-gray-600 text-2xl hover:text-black"></button>

            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="images/logo2.png" alt="Logo" class="w-32 h-32 border-2 border-[#015551]">
            </div>

            <!-- Step 1: Selection -->
            <div id="stepSelection">
                <p class="text-center text-gray-800 font-semibold text-lg mb-6">Help us become one of the safest places
                    to buy and sell</p>
                <div class="flex flex-col gap-3">
                    <button id="showEmailLogin"
                        class="w-full border py-2 border-2 border-[#015551] rounded-sm hover:bg-gray-100 text-md">Continue
                        with Password</button>
                    <button id="showOtpLogin"
                        class="w-full border py-2 border-2 border-[#015551] rounded-sm hover:bg-gray-100 text-md">Signup / Forget Password</button>
                </div>
            </div>

            <!-- Step 2: Email Login -->
            <div id="emailLogin" class="hidden">
                <p class="text-center text-gray-800 font-semibold text-lg mb-6">Enter Your Valid Email Or Password To
                    Login to Continue </p>
                <form action="users_account/login_action.php" method="post">
                    <input type="email" name="email" placeholder="Enter Email"
                        class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
                        required />
                    <input type="password" name="password" placeholder="Enter Password"
                        class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
                        required />
                    <button type="submit" name="login"
                        class="w-full bg-[#015551] text-white py-2 rounded-md  transition">Login</button>
                </form>
            </div>

            <!-- Step 2: OTP - Email input -->
            <div id="otpStepEmail" class="hidden">
                <p class="text-center text-gray-800 font-semibold text-lg mb-6">Enter Your Valid Email To
                    Get OTP and Continue . </p>
                <form id="otpEmailForm">
                    <input type="email" id="otpEmail" placeholder="Enter your Email"
                        class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]"
                        required />
                    <button type="button" id="sendOtpBtn"
                        class="w-full text-white py-2 rounded-md bg-[#015551] transition">Send
                        OTP</button>
                </form>
            </div>
            <script>
                document.getElementById('sendOtpBtn').addEventListener('click', function () {
                    const email = document.getElementById('otpEmail').value.trim();

                    if (email === "") {
                        alert("Please enter your email.");
                        return;
                    }

                    fetch('send_otp.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `email=${encodeURIComponent(email)}`
                    })
                        .then(response => response.text())
                        // .then(data => {
                        //     if (data === 'success') {
                        //         // alert("OTP sent successfully!");
                        //         // show next OTP input section here
                        //     } else if (data === 'invalid') {
                        //         alert("Invalid email address.");
                        //     } else {
                        //         alert("Failed to send OTP. Please try again.");
                        //     }
                        // })
                        .catch(error => {
                            console.error('Error:', error);
                            alert("Something went wrong.");
                        });
                });

            </script>


            <!-- Step 3: OTP - Code input -->
            <div id="otpVerifyStep" class="hidden">
                <p class="text-center text-gray-800 font-semibold text-lg mb-6">Please check Email And fill Otp to Continue Login . </p>
                <form action="" method="post">
                    <input type="hidden" name="email" value="<?= $_SESSION['otp_email'] ?>" id="otpHiddenEmail">
                    <input type="text" name="otp" placeholder="Enter OTP"
                        class="w-full mb-3 px-3 py-2 border-2 border-[#015551] rounded-md focus:ring-2 focus:ring-[#015551]" required />
                    <button type="submit" name='verifyEmailOtp'
                        class="w-full bg-[#015551] text-white py-2 rounded-md  transition">Verify
                        OTP</button>
                </form>
                <?php
                if (isset($_POST['verifyEmailOtp'])) {
                    $email = $_POST['email'];
                    $otp = $_POST['otp'];

                    // Fetch user by email
                    $stmt = $connect->prepare("SELECT id, email, otp FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows === 1) {
                        $user = $result->fetch_assoc();
                        $databaseOtp = $user['otp'];

                        // Verify password
                        if ($otp === $databaseOtp) {
                            // session_regenerate_id(true); // Prevent session fixation
                            $_SESSION['email'] = $user['email'];
                            echo '<script>window.history.back();</script>';
                        }
                    }
                    echo '<script>window.history.back();</script>';
                }
                ?>
            </div>

            <!-- Privacy Info -->
            <p class="text-xs text-center text-gray-500 mt-4">
                All your personal details are safe with us.<br>
                By continuing, you accept our <a href="#" class="text-blue-700 underline">Terms</a> & <a href="#"
                    class="text-blue-700 underline">Privacy Policy</a>.
            </p>
        </div>
    </div>

    <!-- Script -->
    <script>
        const openButtons = document.querySelectorAll('.openPopupBtn');
        const closeBtn = document.getElementById('closePopupBtn');
        const overlay = document.getElementById('popupOverlay');

        const stepSelection = document.getElementById('stepSelection');
        const emailLogin = document.getElementById('emailLogin');
        const otpStepEmail = document.getElementById('otpStepEmail');
        const otpVerifyStep = document.getElementById('otpVerifyStep');

        const showEmailLogin = document.getElementById('showEmailLogin');
        const showOtpLogin = document.getElementById('showOtpLogin');
        const sendOtpBtn = document.getElementById('sendOtpBtn');
        const otpHiddenEmail = document.getElementById('otpHiddenEmail');

        // Open Popup
        openButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                overlay.classList.remove('hidden');
                showStep('selection');
            });
        });

        // Close Popup
        closeBtn.addEventListener('click', () => overlay.classList.add('hidden'));
        window.addEventListener('click', e => { if (e.target === overlay) overlay.classList.add('hidden'); });

        // Show Login Options
        showEmailLogin.addEventListener('click', () => showStep('email'));
        showOtpLogin.addEventListener('click', () => showStep('otpEmail'));

        // Send OTP Simulation
        sendOtpBtn.addEventListener('click', () => {
            const email = document.getElementById('otpEmail').value.trim();
            if (email !== "") {
                otpHiddenEmail.value = email;
                showStep('otpVerify');
                // TODO: Send OTP to backend
            } else {
                alert("Please enter a valid email.");
            }
        });

        // Show different step panels
        function showStep(step) {
            stepSelection.classList.add('hidden');
            emailLogin.classList.add('hidden');
            otpStepEmail.classList.add('hidden');
            otpVerifyStep.classList.add('hidden');

            if (step === 'selection') stepSelection.classList.remove('hidden');
            else if (step === 'email') emailLogin.classList.remove('hidden');
            else if (step === 'otpEmail') otpStepEmail.classList.remove('hidden');
            else if (step === 'otpVerify') otpVerifyStep.classList.remove('hidden');
        }
    </script>

</body>

</html>