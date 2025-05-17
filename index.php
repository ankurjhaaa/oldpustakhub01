<?php include_once "config/db.php"; ?>


<?php 
if(isset($_SESSION['email'])){
    
$email = $_SESSION['email'];
$seeVersionQuery = $connect->query("SELECT * FROM users WHERE email='$email'");
$seeVersion = $seeVersionQuery->fetch_assoc();

if ($seeVersion['seeVersion'] == 0) {
    $BG = "bg-[url('images/bodylogo.jpg')] bg-cover bg-center bg-no-repeat min-h-screen";
} else {
    $BG = "bg-gray-200";
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pustakhub.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="images\logo2.png">
</head>

<body class="<?= $BG ?>">
    <!-- google signin work  -->
    

<!-- ----------------------------------------------------------------------- -->
    <!-- Sticky Navbar -->
    <?php include_once "includes/navbar.php" ?>
    <?php include_once "includes/category.php" ?>
    <?php include_once "includes/carousel.php" ?>

    <?php include_once "includes/books.php" ?>
    
    <?php include_once "users_account/withoutNamePopup.php"; ?>




    <!-- Bottom Navbar (Visible on Mobile) -->
    <br><br><br>
    <?php include_once "includes/footer.php" ?>
    <?php include_once "includes/bottom_nav.php" ?>
    <?php include_once "includes/mob_foot.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>



</body>

</html>