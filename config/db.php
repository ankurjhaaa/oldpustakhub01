<?php $connect = mysqli_connect("localhost","root","","oldpustakhub01"); ?>

<?php

session_start();

function UserDetail(){
    global $connect;
    $email = $_SESSION['email'];
    $query = $connect->query("select * from users where email='$email'");
    $UserDetail = $query->fetch_assoc();
    return $UserDetail;
}



?>