<?php

include_once "../config/db.php";

if (isset($_POST['login'])) {
    // Sanitize input
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Fetch user by email
    $stmt = $connect->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['email'] = $user['email'];



            // Redirect securely
            // header("Location: ../index.php");
            // exit();
            echo '<script>window.history.back();</script>';
        }
    }

    // If failed
    echo '<script>window.history.back();</script>';

    // echo "Invalid email or password.";
}
?>