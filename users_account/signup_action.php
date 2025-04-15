<?php include_once "../config/db.php"; ?>


<?php

if (isset($_POST['signup'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $checkEmail = $connect->query("select email from users where email='$email'");
    if ($checkEmail->num_rows > 0) {
        echo "email already exist";
    } else {
        $insert_user = mysqli_query($connect, "INSERT INTO users (firstname,lastname,mobile,email,password) VALUES ('$first_name','$last_name','$mobile','$email','$password')");
        if ($insert_user) {
            echo '<script>window.location.href = "login.php";</script>';
        }
    }



}



?>