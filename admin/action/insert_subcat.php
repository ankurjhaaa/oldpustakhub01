<?php
include_once "../../config/db.php";
if (isset($_POST['add_subcat'])) {
    $subcat_title = $_POST['subcat_title'];
    $id_cat = $_POST['id_cat'];
    $subcat_img = $_FILES['subcat_img']['name'];
    $subcat_img_tmp = $_FILES['subcat_img']['tmp_name'];

    move_uploaded_file($subcat_img_tmp, "../../images/$subcat_img");
    $connect->query("INSERT INTO sub_category (cat_id, subcat_title, subcat_img) VALUES ('$id_cat','$subcat_title', '$subcat_img')");

    echo '<script>window.history.back();</script>';
}

?>