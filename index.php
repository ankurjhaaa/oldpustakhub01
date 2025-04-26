<?php include_once "config/db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pustakhub.com</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        crossorigin="anonymous"></script>
</head>
<body class="bg-[url('images/bodylogo.jpg')] bg-cover bg-center bg-no-repeat min-h-screen">
    <!-- Sticky Navbar -->
     <?php include_once "includes/navbar.php" ?>
     <?php include_once "includes/category.php" ?>
     <?php include_once "includes/carousel.php" ?>
     
     <?php include_once "includes/books.php" ?>
     
     
   

    <!-- Bottom Navbar (Visible on Mobile) -->
     <br><br><br>
     <?php include_once "includes/footer.php" ?>
    <?php include_once "includes/bottom_nav.php" ?>
    <?php include_once "includes/mob_foot.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>

    
    
</body>
</html>