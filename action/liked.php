<?php
include_once "../config/db.php";
if (isset($_POST['like'])) {
    $bookId = $_POST['BookLikeId'];
    $UserEmail = $_SESSION['email'];

    // Check if the book is already in the wishlist
    $CheckLiked = $connect->query("SELECT * FROM liked WHERE UserEmail = '$UserEmail' AND BookId = '$bookId'");
    $isLiked = $CheckLiked->fetch_array();

    if ($CheckLiked->num_rows > 0) {
        // Remove from wishlist
        $connect->query("DELETE FROM liked WHERE UserEmail = '$UserEmail' AND BookId = '$bookId'");
    } else {
        // Add to wishlist
        $connect->query("INSERT INTO liked (UserEmail, BookId) VALUES ('$UserEmail', '$bookId')");
    }
    
    echo '<script>window.history.back();</script>';
}


?>