<?php include_once "config/db.php"; ?>

<?php
// session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'invalid';
        exit;
    }

    $otp = rand(100000, 999999);

    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;

    $subject = "Your OTP Code";
    $message = "Your OTP is: $otp\n\nPlease do not share it with anyone.";
    $headers = "From: support@yourdomain.com\r\n" .
               "Reply-To: support@pustakhub.com\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($email, $subject, $message, $headers)) {
       $checkEmailQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
        $countCheckEmail = $checkEmailQuery->num_rows;
        if($countCheckEmail == 0){
            $connect->query("INSERT INTO users (email,otp) VALUE ('$email','$otp')");
        }else{
            $connect->query("UPDATE users SET otp='$otp' where email='$email'");
        }
    } else {
        echo 'fail';
    }
}
?>
