<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Flipkart Navbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50">
    <!-- Sticky Navbar -->
     <?php include_once "includes/navbar.php" ?>
     <?php include_once "includes/category.php" ?>
     <?php include_once "includes/carousel.php" ?>
     <?php include_once "includes/books.php" ?>
     <?php include_once "includes/footer.php" ?>
     
   

    <!-- Bottom Navbar (Visible on Mobile) -->
    <?php include_once "includes/bottom_nav.php" ?>
    
</body>
</html>