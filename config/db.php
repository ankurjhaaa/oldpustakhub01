<?php 

// $connect = mysqli_connect("localhost", "root", "", "oldpustakhub01");

 $connect = mysqli_connect("localhost", "pustakhub", "?SvGfHBac;+{", "pustakhub"); 
?>
<?php

session_start();


function UserDetail()
{
    global $connect;
    $email = $_SESSION['email'];
    $query = $connect->query("select * from users where email='$email'");
    $UserDetail = $query->fetch_assoc();
    return $UserDetail;
}

if (isset($_SESSION['email'])) {
    $USERDETAIL = UserDetail();

}
// session_start();

// Database connection (change this part as needed)
// $conn = new mysqli("localhost", "root", "", "your_database");

// Check if already inserted
if (!isset($_SESSION['visited'])) {
    // Get IP and timestamp
    $ip = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $timestamp = date("Y-m-d H:i:s");

    // Insert into visits table
    $sql = "INSERT INTO website_visits (ip, user_agent, visit_time) VALUES (?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sss", $ip, $user_agent, $timestamp);
    $stmt->execute();

    // Set session flag
    $_SESSION['visited'] = true;
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // $user_email = $_SESSION['email'];

    $query = "SELECT type, amount FROM wallet WHERE user_email = ? AND status = 'success'";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $total = 0;

    while ($row = $result->fetch_assoc()) {
        if (strtolower($row['type']) == 'credit') {
            $total += $row['amount'];
        } elseif (strtolower($row['type']) == 'debit') {
            $total -= $row['amount'];
        }
    }


if($USERDETAIL['role'] == 2){
    
    // users table subscription date end kiya mat lab database me 0 kiya
    date_default_timezone_set("Asia/Kolkata");
    $userSubscriptionEndDate = $USERDETAIL['purchased_end']; // e.g. "2025-07-10 16:30:00"
    $userCurrentTime = time(); // current timestamp
    $subscriptionEnd = strtotime($userSubscriptionEndDate); // convert datetime to timestamp

    if ($subscriptionEnd > $userCurrentTime) {
        $updateIsSubscriptionActive = $connect->query("UPDATE users SET isPlanActive=1 WHERE email='$email'");

    } else {
        // $isSubscriptionActive = 0; // subscription expire ho chuka hai
        $updateIsSubscriptionActive = $connect->query("UPDATE users SET isPlanActive=0 WHERE email='$email'");

    }
}
    // if($isSubscriptionActive == 0){

    // }

}


?>