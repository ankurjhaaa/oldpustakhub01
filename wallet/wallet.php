<?php include_once "../config/db.php"; ?>
<?php if (!isset($_SESSION['email'])) {
  echo '<script>window.history.back();</script>';
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wallet Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body class="bg-gray-100 text-gray-800 font-sans">
  <?php include_once "../includes/minusNavbar.php"; ?>

  <div class="max-w-6xl mx-auto px-4 py-8 space-y-8">

    <!-- Top Section: Balance + Add Fund -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

      <!-- Available Balance -->
      <div class="bg-white shadow rounded-sm p-6 border border-[#015551] flex flex-col justify-between">
        <div>
          <h2 class="text-lg font-semibold text-[#015551] mb-1">Available Balance</h2>
          <p class="text-3xl font-bold text-[#015551]">₹ <?= number_format($total, 2); ?></p>
          <p class="text-sm text-gray-500 mt-2">Last updated: 10 May 2025</p>
        </div>
      </div>

      <!-- Spacer for mobile -->
      <div class="hidden md:block"></div>

      <!-- Add Funds -->
      <!-- add_wallet.php -->
      <div class="bg-white shadow rounded-sm p-6 border border-[#015551] md:col-span-2">
        <h2 class="text-lg font-semibold text-[#015551] mb-4">Add Wallet</h2>
        <form id="razorpay-form" class="space-y-4">
          <div>
            <label class="block text-sm font-medium mb-1">Amount (₹)</label>
            <input type="number" name="amount" id="amount" placeholder="Enter amount"
              class="w-full px-4 py-2 border border-[#015551] rounded-md focus:outline-none focus:ring-2 focus:ring-[#015551]"
              required />
          </div>
          <button type="button" id="payBtn"
            class="bg-[#015551] hover:bg-[#014341] text-white px-6 py-2 rounded-sm transition duration-300">Add
            Money</button>
        </form>

      </div>
      <script>
        document.getElementById("payBtn").onclick = function (e) {
          e.preventDefault();
          const amountField = document.getElementById("amount");
          const amount = amountField.value;

          if (amount < 30) {
            alert("Minimum amount should be ₹30");
            amountField.focus();
            return;
          }

          const amountInPaisa = amount * 100;

          const options = {
            key: "rzp_test_wMrelPwjtkBE1b", // Replace with your live/test key
            amount: amountInPaisa,
            currency: "INR",
            name: "pustakhub",
            description: "Wallet Fund",
            handler: function (response) {
              // ✅ Payment successful
              window.location.href = "wallet_success.php?payment_id=" + response.razorpay_payment_id + "&amount=" + amount;
            },
            theme: {
              color: "#015551"
            },
            modal: {
              // 🔄 Razorpay popup closed by user (cancelled)
              ondismiss: function () {
                alert("Payment was cancelled by you.");
                window.location.href = "wallet.php"; // Send back to wallet
              }
            },
            // ⛔ Handle other errors
            retry: {
              enabled: false // Optional: disable automatic retry
            }
          };

          const rzp1 = new Razorpay(options);

          // ⛔ If any error occurs during open()
          rzp1.on('payment.failed', function (response) {
            alert("Payment failed. Reason: " + response.error.description);
            window.location.href = "wallet.php";
          });

          try {
            rzp1.open();
          } catch (err) {
            alert("Something went wrong: " + err.message);
            window.location.href = "wallet.php";
          }
        };

      </script>



    </div>

    <div class="bg-white shadow rounded-sm p-6 border border-[#015551] space-y-8">
      <!-- Wallet Fund Form -->
      <!-- <div>
        <h2 class="text-lg font-semibold text-[#015551] mb-4">Add Wallet</h2>
        <form id="razorpay-form" class="space-y-4">
          <div>
            <label class="block text-sm font-medium mb-1">Amount (₹)</label>
            <input type="number" name="amount" id="amount" placeholder="Enter amount"
              class="w-full px-4 py-2 border border-[#015551] rounded-md focus:outline-none focus:ring-2 focus:ring-[#015551]"
              required />
          </div>
          <button type="button" id="payBtn"
            class="bg-[#015551] hover:bg-[#014341] text-white px-6 py-2 rounded-md transition duration-300">
            Add Money
          </button>
        </form>
      </div> -->

      <!-- Transaction History -->
      <div>
        <h2 class="text-lg font-semibold text-[#015551] mb-4">Transaction History</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-left border">
            <thead>
              <tr class="bg-[#015551] text-white">
                <th class="px-4 py-2">Date</th>
                <th class="px-4 py-2">Transaction ID</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Amount</th>
                <th class="px-4 py-2">Status</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <?php
              // include "config/db.php";
              // session_start();
              $user_email = $_SESSION['email'];
              $stmt = $connect->prepare("SELECT * FROM wallet WHERE user_email = ? ORDER BY id DESC");
              $stmt->bind_param("s", $user_email);
              $stmt->execute();
              $result = $stmt->get_result();
              $transactions = [];

              while ($row = $result->fetch_assoc()) {
                $transactions[] = $row;
              }

              foreach ($transactions as $txn):
                $type = $txn['type']; // You can enhance this logic if debit/credit is tracked
                $typeClass = $type == 'credit' ? 'text-green-600' : 'text-red-600';
                $statusClass = $txn['status'] == 'success' ? 'text-green-700' : 'text-yellow-600';
                ?>
                <tr>
                  <td class="px-4 py-2"><?= date("d M Y", strtotime($txn['created_at'])) ?></td>
                  <td class="px-4 py-2"><?= $txn['payment_id'] ?></td>
                  <td class="px-4 py-2 <?= $typeClass ?> font-medium"><?= $type ?></td>
                  <td class="px-4 py-2">₹<?= number_format($txn['amount'], 2) ?></td>
                  <td class="px-4 py-2"><span
                      class="<?= $statusClass ?> font-semibold"><?= ucfirst($txn['status']) ?></span></td>
                </tr>
              <?php endforeach; ?>
              <?php if (count($transactions) === 0): ?>
                <tr>
                  <td colspan="5" class="text-center px-4 py-4 text-gray-500">No transactions found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- Guidelines -->
    <div class="bg-white shadow rounded-sm p-6 border border-[#015551]">
      <h2 class="text-lg font-semibold text-[#015551] mb-3">Wallet Usage Guidelines</h2>
      <ul class="list-disc ml-5 text-sm space-y-1 text-gray-700">
        <li>Minimum add fund amount is ₹30.</li>
        <li>Funds are non-refundable once added to wallet.</li>
        <li>Use wallet balance for book purchases only.</li>
        <li>All transactions are secured using encrypted payment gateways.</li>
        <li>Contact support if transaction is not reflected within 10 minutes.</li>
      </ul>
    </div>
  </div>
  <br><br><br>
  <?php include_once "../users_account/withoutNamePopup.php"; ?>
  <?php include_once "../includes/footer.php" ?>

  <?php include_once "../includes/minusBottomNav.php" ?>

</body>

</html>