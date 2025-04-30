
<?php
include_once "../config/db.php";
$email = $_SESSION['email'];
if (isset($_POST['locatiomInsertbtn'])) {
    $lat = $_POST['latitude'];
    $lng = $_POST['longitude'];

    // Update query with proper syntax
    $insertLocationUserQuery = mysqli_query($connect, "UPDATE users SET lat='$lat', lng='$lng' WHERE email='$email'");

    // Check if the query executed successfully
    if ($insertLocationUserQuery) {
        echo '<script>window.location.href = "../index.php";</script>';
    } else {
        echo 'Error: ' . mysqli_error($connect); // Error handling
    }
}
?>
