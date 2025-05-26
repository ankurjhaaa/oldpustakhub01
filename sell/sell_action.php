<?php
include_once "../config/db.php";
if (!isset($_SESSION['email'])) {
    echo '<script>window.history.back();</script>';
} else {
    if ($USERDETAIL['isPlanActive'] == 0) {
        echo '<script>window.history.back();</script>';

    }
}

if (isset($_POST['post_book'])) {
    // Text Inputs
    // Initialize error array
    $errors = [];

    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $mrp = $_POST['mrp'] ?? '';
    $set_price = $_POST['set_price'] ?? '';
    $publish_year = $_POST['publish_year'] ?? '';
    $page = $_POST['page'] ?? '';
    $description = addslashes($_POST['description'] ?? '');
    
    $book_condition = $_POST['book_condition'] ?? '';
    $longitude = $_POST['longitude'] ?? '';
    $latitude = $_POST['latitude'] ?? '';
    //$state = $_POST['state'] ?? '';
    //$district = $_POST['district'] ?? '';
    $email = $_SESSION['email'] ?? '';

    $category = $cate4_name['category_title'] ?? '';
    $sub_category = $sub_cate2_name['subcat_title'] ?? '';

    date_default_timezone_set("Asia/Kolkata");
    $timestamp = date("Y-m-d H:i:s");

    // 🛡 Validate fields

    $errors = [];

    // Title validation
    if (empty($_POST['title']) || strlen(trim($_POST['title'])) < 3) {
        $errors['title'] = "Title must be at least 3 characters.";
    } else {
        $title = trim($_POST['title']);
    }

    // Author
    if (empty($_POST['author'])) {
        $errors['author'] = "Author is required.";
    } else {
        $author = trim($_POST['author']);
    }

    // MRP
    if (!is_numeric($_POST['mrp']) || $_POST['mrp'] <= 0) {
        $errors['mrp'] = "Please enter a valid MRP.";
    } else {
        $mrp = floatval($_POST['mrp']);
    }

    // Set Price
    if (!is_numeric($_POST['set_price']) || $_POST['set_price'] <= 0) {
        $errors['set_price'] = "Please enter a valid Set Price.";
    } else {
        $set_price = floatval($_POST['set_price']);
    }

    // Year
    if (!preg_match('/^\d{4}$/', $_POST['publish_year']) || $_POST['publish_year'] < 1800 || $_POST['publish_year'] > date('Y')) {
        $errors['publish_year'] = "Enter a valid publish year.";
    } else {
        $publish_year = $_POST['publish_year'];
    }



    // Description
    if (empty($_POST['description']) || strlen(trim($_POST['description'])) < 10) {
        $errors['description'] = "Description must be at least 10 characters.";
    } else {
        $description = trim($_POST['description']);
    }
    if ($userRole['role'] == 2) {


    } else {


        // Book condition
        if (empty($_POST['book_condition'])) {
            $errors['book_condition'] = "Please select book condition.";
        } else {
            $book_condition = $_POST['book_condition'];
        }
    }


    // Longitude & Latitude
    if (!is_numeric($_POST['longitude']) || !is_numeric($_POST['latitude'])) {
        $errors['location'] = "Invalid location coordinates.";
    } else {
        $longitude = $_POST['longitude'];
        $latitude = $_POST['latitude'];
    }

    // State & District

    // $latitude = $userlatlng['lat'] ?? null;
    // $longitude = $userlatlng['lng'] ?? null;

    if ($latitude && $longitude) {
        $url = "https://nominatim.openstreetmap.org/reverse?lat=$latitude&lon=$longitude&format=json";

        $options = [
            "http" => [
                "header" => "User-Agent: MyLocationApp/1.0\r\n"
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $data = json_decode($response, true);

        if (isset($data['address'])) {
            $address = $data['address'];

            if (!empty($address['county'])) {
                $ADDRESS = $address['county'];
            } elseif (!empty($address['district'])) {
                $ADDRESS = $address['district'];
            } elseif (!empty($address['state_district'])) {
                $ADDRESS = $address['state_district'];
            } elseif (!empty($address['region'])) {
                $ADDRESS = $address['region'];
            } else {
                $ADDRESS = "India";

            }
        } else {
            echo "Invalid response from API.";
        }
    } else {

    }

    // if (empty($_POST['state']) || empty($_POST['district'])) {
    //     $errors['location_info'] = "State and District are required.";
    // } else {
    //     $state = $_POST['state'];
    //     $district = $_POST['district'];
    // }

    // Email from session
    if (!isset($_SESSION['email'])) {
        $errors['session'] = "Session expired. Please login again.";
    } else {
        $email = $_SESSION['email'];
    }

    // Check if any errors
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['old_data'] = $_POST;
        echo "<script>window.history.back();</script>";
        exit;
    }

    // Upload function
    $target_dir = "../images/";
    $img1 = $img2 = $img3 = $img4 = $img5 = $img6 = $img7 = "";

    function uploadImage($fileInput, $target_dir)
    {
        if (!empty($_FILES[$fileInput]["name"])) {
            $unique_name = time() . "_" . uniqid() . "_" . basename($_FILES[$fileInput]["name"]);
            if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $target_dir . $unique_name)) {
                return $unique_name;
            }
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
        $errors[] = "Please upload at least 1 image of the book.";
    }

    // 🚨 Show errors if any
    if (!empty($errors)) {
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<script>window.history.back();</script>";
        exit;
    }

    // ✅ If all validations pass, now proceed to DB insert
    // insert your DB query here...

    // ----------------------------------------
// insert alag alag user or seller 
    $email = $_SESSION['email'];
    $getUserRole = $connect->query("SELECT role FROM users WHERE email='$email'");
    $userRole = $getUserRole->fetch_assoc();

    // Check if not seller
    if ($userRole['role'] == 2) {
        // Insert Query for seller
        $sql = "INSERT INTO books (
        title, author, mrp, set_price, publish_year, page, description, img1, img2, img3, img4, img5, img6, img7, 
        longitude, latitude, category, sub_category, seller_email, post_date ,version ,state
    ) VALUES (
        '$title', '$author', '$mrp', '$set_price', '$publish_year', '$page', '$description', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', 
        '$longitude', '$latitude', '$category', '$sub_category', '$email', '$timestamp' ,1 , '$ADDRESS'
    )";
    } else {
        // Insert Query for user
        $sql = "INSERT INTO books (
        title, author, mrp, set_price, publish_year, page, description, reason, 
        book_condition, img1, img2, img3, img4, img5, img6, img7, 
        longitude, latitude, category, sub_category, seller_email, post_date , state
    ) VALUES (
        '$title', '$author', '$mrp', '$set_price', '$publish_year', '$page', '$description', '$reason', 
        '$book_condition', '$img1', '$img2', '$img3', '$img4', '$img5', '$img6', '$img7', 
        '$longitude', '$latitude', '$category', '$sub_category', '$email', '$timestamp' , '$ADDRESS'
    )";
    }


    if (mysqli_query($connect, $sql)) {
        echo "<script>window.location.href = '../index.php';</script>";

    } else {
        echo "Error: " . mysqli_error($connect);
    }

}

?>