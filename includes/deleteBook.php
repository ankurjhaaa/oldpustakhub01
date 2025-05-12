<?php include_once "../config/db.php"; ?>
<?php
if (isset($_POST['deleteBook'])) {
    $deleteBookId = $_POST['deleteBookId'];

    // Delete queries
    $deleteBookItemQuery = $connect->query("DELETE FROM books WHERE book_id='$deleteBookId'");
    $deleteBookViewQuery = $connect->query("DELETE FROM book_views WHERE book_id='$deleteBookId'");
    $deleteBookChatQuery = $connect->query("DELETE FROM chat WHERE bookId='$deleteBookId'");
    $deleteBookLikedQuery = $connect->query("DELETE FROM liked WHERE bookId='$deleteBookId'");

    // If all deletions were successful, redirect
    if ($deleteBookItemQuery && $deleteBookViewQuery && $deleteBookChatQuery && $deleteBookLikedQuery) {
        header("Location: ../index.php");
        exit(); // Important to stop script execution
    } else {
        echo "Something went wrong while deleting the book.";
    }
}
?>