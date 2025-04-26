<?php
include_once "../config/db.php";
if (isset($_POST['post_book'])) {
    // Text Inputs
    $title = $_POST['title'];
    $author = $_POST['author'];
    $mrp = $_POST['mrp'];
    $set_price = $_POST['set_price'];
    $publish_year = $_POST['publish_year'];
    $page = $_POST['page'];
    $description = $_POST['description'];
    $reason = $_POST['reason'];
    $book_condition = $_POST['book_condition'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $category = $cate4_name['category_title'];
    $sub_category = $sub_cate2_name['subcat_title'];
    $email = $_SESSION['email'];
    date_default_timezone_set("Asia/Kolkata"); // Set to Indian time zone
    $timestamp = date("Y-m-d H:i:s"); // Output: 2025-04-21 14:52:30


    // Upload function
    // File Upload
    $target_dir = "../images/";
    $img1 = $img2 = $img3 = $img4 = $img5 = $img6 = $img7 = "";

    function uploadImage($fileInput, $target_dir)
    {
        if (!empty($_FILES[$fileInput]["name"])) {
            $unique_name = time() . "_" . uniqid() . "_" . basename($_FILES[$fileInput]["name"]);
            move_uploaded_file($_FILES[$fileInput]["tmp_name"], $target_dir . $unique_name);
            return $unique_name;
        }
        return "";
    }

    $img1 = uploadImage("img1", $target_dir);
    $img2 = uploadImage("img2", $target_dir);
    $img3 = uploadImage("img3", $target_dir);
    $img4 = uploadImage("img4", $target_dir);
    $img5 = uploadImage("img5", $target_dir);
    $img6 = uploadImage("img6", $target_dir);
    $img7 = uploadImage("img7", $target_dir);

    $uploaded_images = array_filter([$img1, $img2, $img3, $img4, $img5, $img6, $img7]);

    if (count($uploaded_images) < 1) {
        echo "<script>
         alert('Please upload at least 1 images of the book.');
         window.history.back();
     </script>";
        exit();
    }

    // Insert Query
    $sql = "INSERT INTO books (
    title, author, mrp, set_price, publish_year, page, description, reason, 
    book_condition, img1, img2, img3, img4, img5, img6, img7, 
    longitude, latitude, state, district, category, sub_category, seller_email, post_date 
) VALUES (
    '$title', '$author', '$mrp', '$set_price', '$publish_year', '$page', '$description', '$reason', 
    '$book_condition', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', 
    '$longitude', '$latitude', '$state', '$district', '$category', '$sub_category', '$email', '$timestamp' 
)";

    if (mysqli_query($connect, $sql)) {
        echo "<script>window.location.href = '';</script>";

    } else {
        echo "Error: " . mysqli_error($connect);
    }

}

?>