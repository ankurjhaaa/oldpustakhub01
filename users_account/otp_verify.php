<?php
// if (isset($_POST['verifyEmailOtp'])) {
//     $email = $_POST['email'];
//     $otp = $_POST['otp'];
//     $verifyEmailOtpQuery = $connect->query("SELECT * FROM users WHERE email='$email' AND otp='$otp'");
//     if ($verifyEmailOtpQuery) {
//         $_SESSION['email'] = $email;
//         echo '<script>window.history.back();</script>';
//     }
// }
?>
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