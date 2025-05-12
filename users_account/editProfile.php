<?php
include_once "../config/db.php";
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <?php include_once "../includes/mini_nav.php"; ?>

    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row justify-between items-start gap-6">

            <!-- Left Column: Edit Profile Info - Hidden on Mobile -->
            <div class=" w-full md:w-1/3 bg-white p-6 rounded-lg shadow-lg border-2 border-[#015551]">
                <div class="flex justify-between items-center mb-4 ">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Profile</h2>
                </div>

                <div class="mt-2">
                    <label class="block text-gray-700 font-medium mb-1">Logged in as</label>
                    <div class="flex items-center space-x-3 flex-wrap">
                        <span class="text-[#015551] font-semibold break-all"><?= $_SESSION['email'] ?></span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="../profile.php?email=<?= $_SESSION['email'] ?> "
                        class="w-full md:w-auto bg-[#015551] hover:bg-[#013f3f] text-white text-sm font-medium py-2 px-4 rounded-sm transition duration-300">
                        View Profile
                    </a>
                </div>
            </div>

            <div class="w-full md:w-2/3 bg-white p-6 rounded-lg shadow-lg border-2 border-[#015551]">
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
                            <input type="text" name="first_name" placeholder="Ankur"
                                value="<?= $userDetail['firstname'] ?>"
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
                            <input type="text" name="mobile" placeholder="Phone Number"
                                value="<?= $userDetail['mobile'] ?>"
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
                        echo '<script>window.location.href = "";</script>';

                        echo "<p class='text-green-600 font-medium mt-4'>Profile updated successfully.</p>";
                    } else {
                        echo "<p class='text-red-600 font-medium mt-4'>Failed to update profile. Please try again.</p>";
                    }
                }


                ?>
            </div>



        </div>
    </div>
</body>

</html>