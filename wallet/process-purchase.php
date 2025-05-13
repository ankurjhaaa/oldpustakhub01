<?php include_once "../config/db.php"; ?>

<?php
// session_start();
if (isset($_POST['processPurchase'])) {
    $confirmed_plan = $_SESSION['planAmountPrice'];
    $planName = $_POST['planName'];
    // echo $confirmed_plan ;
    // $userDebitQuery = $connect->query("INSERT INTO wallet ");
    $userDebitQuery = $connect->query("INSERT INTO wallet (user_email, amount, payment_id, status, type) VALUES ('$email', '$confirmed_plan', '$planName', 'success', 'debit')");

    if ($userDebitQuery) {
        $totalAmount = $total - $confirmed_plan;
        date_default_timezone_set("Asia/Kolkata");
        $currentTime = date("Y-m-d H:i:s");  // Format: 2025-05-13 16:23:00
        if ($confirmed_plan == 30) {
            $endTime = date("Y-m-d H:i:s", strtotime("+30 days")); // 30 din baad ka timestamp

        } elseif ($confirmed_plan == 160) {
            $endTime = date("Y-m-d H:i:s", strtotime("+6 months"));

        } elseif ($confirmed_plan == 300) {
            $endTime = date("Y-m-d H:i:s", strtotime("+1 year"));

        }

        $inseetPaymentInUser = $connect->query("UPDATE users SET wallet='$totalAmount' ,  role=2, purchased_at='$currentTime' , purchased_end='$endTime' WHERE email='$email'");
        if ($inseetPaymentInUser) {
            header("Location: wallet.php");
            exit();
        }

    }

}



?>