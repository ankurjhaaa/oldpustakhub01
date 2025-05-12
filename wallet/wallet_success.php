<?php
include_once "../config/db.php";

 if(!isset($_SESSION['email'])){
    echo '<script>window.history.back();</script>';
} 

if (isset($_GET['payment_id']) && isset($_GET['amount'])) {
    $user_email = $_SESSION['email'];
    $amount = $_GET['amount'];
    $payment_id = $_GET['payment_id'];

    $inseetPaymentDetail = $connect->query("INSERT INTO wallet (user_email, amount, payment_id, status, type) VALUES ('$user_email', '$amount', '$payment_id', 'success', 'credit')");
    if($inseetPaymentDetail){
        $totalAmount = $total + $amount ;
        $inseetPaymentInUser = $connect->query("UPDATE users SET wallet='$totalAmount' WHERE email='$email'");
        if($inseetPaymentInUser){
            header("Location: wallet.php");
            exit();
        }
    }


    
}
?>
