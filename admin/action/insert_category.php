<?php
include_once "../../config/db.php";
if (isset($_POST['add_cat'])) {
    $title = $_POST['category_title'];
    $image = $_FILES['cat_img']['name'];
    $tmp = $_FILES['cat_img']['tmp_name'];

    move_uploaded_file($tmp, "../../images/$image");
    $connect->query("INSERT INTO category (category_title, cat_img) VALUES ('$title', '$image')");

    echo "Category Added!";
}

?>