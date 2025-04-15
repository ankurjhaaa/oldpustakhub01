<?php
 include_once "../config/db.php";

 if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $checkQuery = $connect->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if($checkQuery->num_rows == 1){
        $_SESSION['email'] = $email;
        echo '<script>window.location.href = "../index.php";</script>';
    } 
 }

?>