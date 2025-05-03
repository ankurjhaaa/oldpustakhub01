<?php
include_once "../config/db.php";

if (isset($_POST['signup'])) {
    // Input sanitize
    $first_name = trim(htmlspecialchars($_POST['first_name']));
    $last_name  = trim(htmlspecialchars($_POST['last_name']));
    $mobile     = trim($_POST['mobile']);
    $email      = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password   = $_POST['password'];

    // Check if email exists
    $checkEmail = $connect->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Secure password hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user safely
        $stmt = $connect->prepare("INSERT INTO users (firstname, lastname, mobile, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $mobile, $email, $hashedPassword);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo "Signup failed. Please try again.";
        }
    }
}
?>
