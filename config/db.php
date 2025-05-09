<?php $connect = mysqli_connect("localhost", "root", "", "oldpustakhub01"); ?>
<?php

session_start();

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
?>