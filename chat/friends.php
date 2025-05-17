<?php include_once "../config/db.php"; ?>
<?php if(!isset($_SESSION['email'])){
    echo '<script>window.history.back();</script>';
} ?>
<?php

$email = $_SESSION['email'];
?>

<!-- Font Awesome (for icons) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

<div class="w-full bg-white p-4 pt-20">
    <div class="flex items-center justify-between">
        <a href="index.php" class="text-xl font-bold mb-4">INBOX</a>

        <div class="flex space-x-4">


            <!-- Dropdown Menu -->
            <div class="relative inline-block text-left">
                <!-- <button onclick="toggleDropdown()"
                    class="bg-gray-300 p-1 h-8 w-10 rounded-md flex items-center justify-center focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button> -->
                <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg hidden">
                    <a href="profile.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                    <a href="setting.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-cog mr-2"></i> Settings
                    </a>
                    <a href="about.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-info-circle mr-2"></i> About
                    </a>
                    <?php
                        if($email == "akj41731@gmail.com"){
                            echo "<a href='users.php' class='flex items-center px-4 py-2 text-red-700 hover:bg-gray-100'>
                        <i class='fas fa-user mr-2'></i></i>Chat User 
                    </a>";
                        }
                    ?>
                    <a href="logout.php" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="searchInput" placeholder="Search for a user..."
            class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            onkeyup="searchUsers()">
    </div>

    <!-- User List jisne last time mesage kiya h -->
    <div class="space-y-4 overflow-y-auto max-h-[600px]  rounded-lg p-2 [&::-webkit-scrollbar]:hidden" id="userList">
        <?php
        $call_user = mysqli_query($connect, "SELECT * , 
       (SELECT message FROM chat 
        WHERE (sender_id = chat_user_id AND reciver_id = (SELECT id FROM users WHERE email = '$email')) 
           OR (sender_id = (SELECT id FROM users WHERE email = '$email') AND reciver_id = chat_user_id) 
        ORDER BY time DESC LIMIT 1) AS last_message,
       (SELECT time FROM chat 
        WHERE (sender_id = chat_user_id AND reciver_id = (SELECT id FROM users WHERE email = '$email')) 
           OR (sender_id = (SELECT id FROM users WHERE email = '$email') AND reciver_id = chat_user_id) 
        ORDER BY time DESC LIMIT 1) AS last_chat_time
FROM users
JOIN (
    SELECT DISTINCT 
        CASE 
            WHEN sender_id = (SELECT id FROM users WHERE email = '$email') THEN reciver_id 
            ELSE sender_id 
        END AS chat_user_id
    FROM chat
    WHERE sender_id = (SELECT id FROM users WHERE email = '$email') 
       OR reciver_id = (SELECT id FROM users WHERE email = '$email')
) AS chat_users ON users.id = chat_users.chat_user_id
ORDER BY last_chat_time DESC
");

        while ($chat = mysqli_fetch_array($call_user)) {
            $chat_user_id = $chat['chat_user_id'];

            $user_query = mysqli_query($connect, "SELECT * FROM users WHERE id = '$chat_user_id'");
            $user = mysqli_fetch_assoc($user_query);

            $call_send_msg = mysqli_query($connect, "SELECT * FROM chat 
            WHERE (sender_id='$chat_user_id' AND reciver_id=(SELECT id FROM users WHERE email='$email')) 
               OR (sender_id=(SELECT id FROM users WHERE email='$email') AND reciver_id='$chat_user_id')
            ORDER BY time DESC LIMIT 1");

            $last_message = mysqli_fetch_array($call_send_msg);
            ?>
            <a href="message.php?user=<?= $user['id'] ?>">
                <div class="user-item flex items-center p-2 hover:bg-gray-200 rounded cursor-pointer">
                    <img src="../images/default_user.jpeg"
                        class="w-12 h-12 rounded-full border object-cover mr-3 shadow-sm" loading="lazy"
                        >

                    <div>
                        <h1 class="text-xl font-medium text-gray-800"><?= $user['firstname'] ?>     <?= $user['lastname'] ?>
                        </h1>
                        <p class="text-sm text-gray-500">
                            <?= (isset($last_message['message']) && strlen($last_message['message']) > 25)
                                ? substr($last_message['message'], 0, 25) . "..."
                                : ($last_message['message'] ?? 'No messages yet'); ?>
                        </p>

                    </div>
                </div>
            </a>

        <?php } ?>
    </div>

</div>





<script>
    function toggleDropdown() {
        document.getElementById("dropdownMenu").classList.toggle("hidden");
    }

    function searchUsers() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let users = document.getElementsByClassName("user-item");

        for (let i = 0; i < users.length; i++) {
            let name = users[i].getElementsByTagName("p")[0].innerText.toLowerCase();
            users[i].parentElement.style.display = name.includes(input) ? "" : "none";
        }
    }

    function toggleChatPopup() {
        document.getElementById("chatPopup").classList.toggle("hidden");
    }

    function searchChats() {
        let input = document.getElementById("chatSearch").value.toLowerCase();
        let chats = document.getElementsByClassName("chat-item");

        for (let i = 0; i < chats.length; i++) {
            let name = chats[i].getElementsByTagName("p")[0].innerText.toLowerCase();
            chats[i].parentElement.style.display = name.includes(input) ? "" : "none";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let isScrolling = false;

    function fetchFriendsList() {
        if (!isScrolling) {
            $.ajax({
                url: "friends.php", // यही पेज फिर से लोड होगा लेकिन बिना पूरा reload किए
                method: "GET",
                data: { fetch: "users" }, // Ajax में पहचानने के लिए एक parameter भेजा
                success: function (response) {
                    let newContent = $(response).find("#userList").html();
                    $("#userList").html(newContent); // सिर्फ यूज़र लिस्ट को अपडेट करेगा
                }
            });
        }
    }

    // Auto-Refresh हर 5 सेकंड में
    setInterval(fetchFriendsList, 5000);

    // जब यूजर स्क्रॉल करेगा, तो Auto-Refresh रुकेगा
    document.getElementById("userList").addEventListener("scroll", function () {
        isScrolling = true;
        clearTimeout(scrollTimeout);
        var scrollTimeout = setTimeout(() => { isScrolling = false; }, 2000);
    });
</script>