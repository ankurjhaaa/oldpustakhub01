<?php include_once "../config/db.php"; ?>

<?php
if (!isset($_SESSION['email'])) {
    echo "<script>window.location.href='login.php';</script>";
}

$email = $_SESSION['email'];
$call_self_id = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
$self_id = mysqli_fetch_assoc($call_self_id);
$sender_id = $self_id['id'];

if (isset($_GET['user'])) {
    $id = $_GET['user'];
    $call_user_name = mysqli_query($connect, "SELECT * FROM users WHERE id='$id'");
    $user_name = mysqli_fetch_assoc($call_user_name);
    $reciver_id = $user_name['id'];
}
if (isset($_GET['bookId'])) {
    $bookId = $_GET['bookId'];
    $call_book_name = mysqli_query($connect, "SELECT * FROM books WHERE book_id='$bookId'");
    $book_name = mysqli_fetch_assoc($call_book_name);
    $book_img = $book_name['img1'];
    // $reciver_id = $user_name['id'];

    $insert_new_chat_book = mysqli_query($connect, "INSERT INTO chat (reciver_id, sender_id, image, bookId, time) VALUES ('$reciver_id', '$sender_id', '$book_img', '$bookId', NOW())");
    if ($insert_new_chat_book) {
        echo '<script>window.location.href = "?user=' . $reciver_id . '";</script>';
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body,
        html {
            height: 100%;
            overflow: hidden;
            /* yahi kaam karaya scroll ko disable karne ka */
        }
    </style>

</head>

<body class="bg-gray-100">
    <div class="fixed top-0 left-0 right-0 ">
        <?php include_once "navbar.php"; ?>
    </div>
    <div class="flex h-screen">
        <!-- Friends List -->
        <div
            class="w-full md:w-1/4 bg-white p-4  border-r h-screen md:block <?php echo isset($_GET['user']) ? 'hidden' : ''; ?>">
            <?php include_once 'friends.php'; ?>
        </div>

        <!-- Chat Section -->
        <div class="w-full md:w-3/4 h-screen md:block">
            <div class="w-full flex flex-col h-screen">

                <!-- Header -->
                <div class="bg-white p-4 border-b flex items-center shadow-md fixed top-20 left-0 right-0 md:relative">

                    <img src="../images/<?php echo empty($user_name['dp']) ? 'default_user.jpeg' : htmlspecialchars($user_name['dp']); ?>"
                        class="w-12 h-12 rounded-sm border object-cover shadow-sm mr-3 cursor-pointer" loading="lazy"
                        onerror="this.onerror=null; this.src='dp/defaultUser.webp';"
                        onclick="window.location.href='../profile.php?email=<?= $user_name['email'] ?>'">
                    <div class="flex-1" onclick="window.location.href='../profile.php?email=<?= $user_name['email'] ?>'">
                        <p class="font-semibold text-lg"><?= $user_name['firstname'] ?> <?= $user_name['lastname'] ?>
                        </p>
                        <p id="typingStatus" class="text-sm text-green-500">Seller</p>
                    </div>
                    <?php
                    // PHP में अपना dynamic number लो
                    $pnumber = $user_name['mobile'];
                    $phoneNumber = $pnumber; // ➡️ Example (country code + number)
                    ?>

                    <button onclick="handleCall()"
                        class="flex items-center gap-2 bg-[#015551] hover:bg-[#01403f] text-white font-semibold py-2 px-4 rounded-md me-6 shadow-md">
                        <i class="fa-solid fa-phone text-xl"></i>
                        Call
                    </button>

                    <script>
                        // PHP से नंबर JS में पास कर रहे हैं
                        const phoneNumber = "<?= $phoneNumber ?>";

                        function handleCall() {
                            if (window.innerWidth <= 768) {
                                // 👉 Mobile device
                                window.location.href = `tel:${phoneNumber}`;
                            } else {
                                // 👉 Desktop/Laptop
                                window.open(`https://wa.me/${phoneNumber}`, '_blank');
                            }
                        }
                    </script>




                    <button onclick="window.location.href='index.php'" class="text-black text-2xl mr-4">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                </div>


                <!-- Messages -->
                <div id="chatBox"
                    class="flex-1 p-4 space-y-2 flex flex-col-reverse mt-20 mb-16 overflow-y-auto overflow-x-hidden">
                    <!-- Messages will be loaded here via AJAX -->
                </div>
                <!-- Input Box -->
                <!-- Image Preview Popup -->
                <div id="imagePopup"
                    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                    <div class="bg-white p-4 rounded-lg shadow-lg relative w-80">
                        <button id="closePopup"
                            class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl">&times;</button>
                        <img id="popupImg" src="#" class="w-full h-auto rounded-lg">
                        <p class="text-center mt-2 text-sm text-gray-500">Selected Image</p>
                    </div>
                </div>

                <!-- Hidden fields from PHP -->
                <input type="hidden" id="sender_id" value="<?php echo $sender_id; ?>">
                <input type="hidden" id="reciver_id" value="<?php echo $reciver_id; ?>">

                <!-- तुम्हारा original form -->
                <form id="chatForm" method="post" enctype="multipart/form-data">
                    <div
                        class="bg-white p-3 border-t shadow-lg fixed bottom-0 left-0 right-0 md:relative flex items-center gap-2">
                        <!-- <label for="imageInput" class="cursor-pointer">
                            <i class="fas fa-image text-2xl text-gray-500 hover:text-blue-500"></i>
                            <input type="file" id="imageInput" name="image" accept="image/*" class="hidden">
                        </label> -->
                        <input type="text" id="messageInput" name="msg" placeholder="Type a message..."
                            class="w-full p-3 border rounded-md focus:ring-2 bg-gray-100">
                        <button type="submit" name="msg"
                            class="bg-[#015551] text-white px-5 py-3 rounded-md hover:bg-blue-600 shadow-md">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>

                <!-- JavaScript (Image auto-upload) -->
                <script>
                    document.getElementById('imageInput').addEventListener('change', function () {
                        let file = this.files[0];
                        if (!file) return;

                        let sender_id = document.getElementById('sender_id').value;
                        let receiver_id = document.getElementById('reciver_id').value;

                        let formData = new FormData();
                        formData.append('image', file);
                        formData.append('sender_id', sender_id);
                        formData.append('reciver_id', receiver_id);

                        fetch('upload_image.php', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log('Upload Success:', data);
                                alert(data);
                            })
                            .catch(error => {
                                console.error('Upload Error:', error);
                                alert('Upload failed: ' + error);
                            });
                    });
                </script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            </div>
        </div>

    </div>

    <!-- jQuery & AJAX Script -->
    <script>
        $(document).ready(function () {
            let chatBox = $("#chatBox");
            let isUserScrolling = false;

            function loadMessages(scrollToBottom = false) {
                $.ajax({
                    url: "load_messages.php",
                    type: "POST",
                    data: { sender_id: <?= $sender_id ?>, reciver_id: <?= $reciver_id ?> },
                    success: function (data) {
                        let previousHeight = chatBox[0].scrollHeight; // पुराने मैसेज लोड करने से पहले ऊंचाई

                        chatBox.html(data);

                        if (!isUserScrolling || scrollToBottom) {
                            chatBox.scrollTop(chatBox[0].scrollHeight); // केवल तभी स्क्रॉल जब यूजर स्क्रॉल नहीं कर रहा
                        } else {
                            let newHeight = chatBox[0].scrollHeight;
                            chatBox.scrollTop(chatBox.scrollTop() + (newHeight - previousHeight)); // पुरानी पोजीशन बनाए रखो
                        }
                    }
                });
            }

            loadMessages(true); // लोडिंग के समय हमेशा नीचे स्क्रॉल
            setInterval(loadMessages, 1000);

            $("#chatForm").submit(function (event) {
                event.preventDefault();
                let message = $("#messageInput").val();
                if (message.trim() !== "") {
                    $.ajax({
                        url: "send_message.php",
                        type: "POST",
                        data: { sender_id: <?= $sender_id ?>, reciver_id: <?= $reciver_id ?>, msg: message },
                        success: function () {
                            $("#messageInput").val('');
                            loadMessages(true); // मैसेज भेजने के बाद नीचे स्क्रॉल करो
                        }
                    });
                }
            });

            // जब यूजर स्क्रॉल करता है, तो ऑटो-स्क्रॉल को रोक दो
            chatBox.on("scroll", function () {
                if (chatBox.scrollTop() + chatBox.innerHeight() < chatBox[0].scrollHeight - 50) {
                    isUserScrolling = true;
                } else {
                    isUserScrolling = false;
                }
            });


        });

    </script>

</body>

</html>