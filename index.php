<?php include_once "config/db.php"; ?>
<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('221201399960-mtidn0pcb10bgrga4nu9v15pssvaj2fi.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/pustakhub/index.php');
$client->addScope(['email', 'profile']);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Fetch User Data from Google
    $oauth = new Google_Service_Oauth2($client);
    $user = $oauth->userinfo->get();

    $google_id = $user->id; 
    $name = $user->name;
    $email = $user->email; 
    $picture = $user->picture; 

    
    $query = $connect->prepare("SELECT * FROM users WHERE google_id = ?");
    $query->bind_param("s", $google_id);
    $query->execute();
    $result = $query->get_result();
    $count = $result->num_rows;

    if ($count == 0) {
       
        $insert = $connect->prepare("INSERT INTO users (google_id, firstname, email, dp) VALUES (?, ?, ?, ?)");
        $insert->bind_param("ssss", $google_id, $name, $email, $picture);
        if ($insert->execute()) {
            // $_SESSION['user'] = $email;
            echo "User successfully added to database!";
        } else {
            die("Database Insert Error: " . $insert->error);
        }
    } 

    $user_call = mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND google_id='$google_id'");
    $numema = mysqli_num_rows($user_call);
    $emails = mysqli_fetch_assoc($user_call);
    if ($numema == 1) {
        $_SESSION['email'] = $email;
        echo '<script>window.location.href = "index.php";</script>';
        // redirect('');
    }
    
    header("Location: index.php");
    exit();
}
?>

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




    <!-- Bottom Navbar (Visible on Mobile) -->
    <br><br><br>
    <?php include_once "includes/footer.php" ?>
    <?php include_once "includes/bottom_nav.php" ?>
    <?php include_once "includes/mob_search.php" ?>
    <?php include_once "includes/mob_foot.php" ?>
    <?php include_once "users_account/loginpopup.php"; ?>



</body>

</html>