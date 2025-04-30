<?php
include "db.php";
$sender_id = $_POST['sender_id'];
$reciver_id = $_POST['reciver_id'];

$query = "SELECT * FROM chat WHERE (sender_id='$sender_id' AND reciver_id='$reciver_id') OR (sender_id='$reciver_id' AND reciver_id='$sender_id') ORDER BY time DESC";
$result = mysqli_query($connect, $query);

$prev_date = '';

while ($msg = mysqli_fetch_assoc($result)) {
    $message_date = date("d M Y", strtotime($msg['time'])); // तारीख को फॉर्मेट करें

    $product_id = $msg['bookId'];
    $product_book_detail_query = $connect->query("SELECT * FROM books WHERE book_id='$product_id'");
    $product_book_detail = $product_book_detail_query->fetch_assoc();
    $product_book_detail_name = $product_book_detail['title'];
    $product_book_detail_author = $product_book_detail['author'];
    $product_book_detailid = $product_book_detail['book_id'];
    $product_book_detail_set_price = $product_book_detail['set_price'];

    // अगर तारीख बदल गई है, तो इसे दिखाएं
    if ($message_date != $prev_date) {
        echo "<div class='w-full text-center my-2'>";
        echo "<span class='bg-gray-300 text-gray-700 px-3 py-1 rounded-lg text-sm'>$message_date</span>";
        echo "</div>";
        $prev_date = $message_date;
    }

    $is_sender = ($msg['sender_id'] == $sender_id);
    echo "<div class='flex " . ($is_sender ? 'justify-end' : 'justify-start') . " mb-2'>";
    echo "<div class='max-w-[80%] px-4 py-2 rounded-lg shadow-md " . ($is_sender ? 'bg-green-700 text-white' : 'bg-gray-400 text-black') . "'>";

    // ✅ यहाँ पर चेक कर रहे हैं image है या text message
    
    if (!empty($msg['image'])) {
        echo "<div class='flex items-start bg-[#d2f4f8] p-3 rounded-xl space-x-3 max-w-md'>";
    
        // 📷 Image Box
        echo "<div class='flex flex-col '>";
        echo "<a href='../view.php?bookId=$product_book_detailid' ><img src='../images/{$msg['image']}' alt='Image' class='w-24 h-24 object-cover rounded-lg cursor-pointer'  /></a>";
        echo "<span class='text-[10px] text-blue-600 mt-1'>Click to Enlarge</span>";
        
        echo "</div>";
    
        // 📝 Message Texts Box (Right Side)
        echo "<div class='flex-1 text-sm text-gray-800'>";
        echo "<p><strong>Book :</strong> $product_book_detail_name</p>";
            echo "<p><strong>Author :</strong>$product_book_detail_author </p>";
            echo "<p><strong>Price :</strong> ₹$product_book_detail_set_price</p>";
        echo "</div>";
    
        echo "</div>";
    
        // ⏰ Timestamp (bottom right)
        echo "<p class='text-sm text-white mt-1 text-right'>Is Tihs Ablable  Now ?? </p>";
    }
    elseif (!empty($msg['message'])) {
        echo "<p>" . nl2br(htmlspecialchars($msg['message'])) . "</p>";
    }

    

    echo "<span class='text-xs block text-right'>" . date("h:i A", strtotime($msg['time'])) . "</span>";
    echo "</div></div>";
}
?>