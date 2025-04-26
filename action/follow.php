<?php
include_once "../config/db.php";
if(isset($_POST['followBtn'])){
    $sellerEmailId = $_POST['sellerEmailId'];
    $UserEmailId = $_POST['UserEmailId'];

    $checkFollow = $connect->query("SELECT * FROM follow WHERE UserEmail = '$UserEmailId' AND sellerEmail = '$sellerEmailId'");
    $isFollow = $checkFollow->fetch_array();

    if ($checkFollow->num_rows > 0) {
        // Remove from wishlist
        $connect->query("DELETE FROM follow WHERE UserEmail = '$UserEmailId' AND sellerEmail = '$sellerEmailId'");
    } else {
        // Add to wishlist
        $connect->query("INSERT INTO follow (UserEmail, sellerEmail) VALUES ('$UserEmailId', '$sellerEmailId')");
    }
    echo '<script>window.location.href = "../profile.php?email=' . $sellerEmailId . '";</script>';

}
// echo $sellerEmailId;
// echo $UserEmailId;



?>