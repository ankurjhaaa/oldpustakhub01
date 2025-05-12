<!-- Only the color classes are updated as per #015551 -->

<?php include_once "../config/db.php"; ?>

<?php

if (isset($_GET['plan'])) {
    $planName = $_GET['plan'];
}
// else{
//     echo '<script>window.location.href = "purchasePayment.php";</script>';

// } 


if ($planName == "PLAN30") {
    $planAmountPrice = 30;
} elseif ($planName == "PLAN160") {
    $planAmountPrice = 160;
} elseif ($planName == "PLAN300") {
    $planAmountPrice = 300;
} else{
    echo '<script>window.location.href = "purchasePayment.php";</script>';

}
$planAmount = floatval($planAmountPrice);
$total = floatval($total); // अगर ये DB से आ रहा है तो ensure करें कि ये number है
$shortage = $planAmount - $total;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy Plan - Professional</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php include_once "walletNavbar.php"; ?>

    <div class="flex items-center justify-center px-4 py-10">
        <div class="bg-white shadow-xl rounded-md p-8 max-w-lg w-full border border-[#015551]">
            <h1 class="text-3xl font-extrabold text-center text-[#015551] mb-6">Purchase Your Plan</h1>

            <?php if ($planAmount > $total): ?>
                <!-- Insufficient Balance View -->
                <div class="text-center">
                    <h2 class="text-xl font-bold text-red-600 mb-2">Insufficient Wallet Balance</h2>
                    <p class="text-gray-600 mb-4">You don’t have enough balance to complete this transaction. Please review
                        the summary below.</p>

                    <div class="bg-gray-50 rounded-lg p-4 text-left text-sm text-gray-700 mb-5 border border-[#015551]">
                        <p><strong>• Available Balance:</strong> ₹<?= $total ?></p>
                        <p><strong>• Plan Cost:</strong> ₹<?= $planAmount ?></p>
                        <p><strong>• Shortage:</strong> <span class="text-red-500 font-semibold">₹<?= $shortage ?></span>
                        </p>
                    </div>

                    <p class="text-xs text-gray-500 mb-6">
                        To continue, please add sufficient funds to your wallet. Your transaction cannot proceed without
                        enough balance.
                    </p>

                    <div class="flex justify-center gap-4">
                        <a href="wallet.php"
                            class="bg-[#015551] hover:bg-[#01443e] text-white px-5 py-2 rounded-md text-sm font-semibold">
                            Add Funds
                        </a>
                        <a href="purchaseSellPlan.php"
                            class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded-md text-sm font-semibold">
                            Cancel
                        </a>
                    </div>
                </div>

            <?php else: ?>
                <!-- Sufficient Balance View -->
                <div class="text-center">
                    <h2 class="text-xl font-bold text-[#015551] mb-2">Confirm Your Plan Purchase</h2>
                    <p class="text-gray-600 mb-4">You have enough balance. Please review the purchase details before
                        confirming.</p>

                    <div class="bg-gray-50 rounded-lg p-4 text-left text-sm text-gray-700 mb-5 border border-[#015551]">
                        <p><strong>• Available Balance:</strong> ₹<?= $total ?></p>
                        <p><strong>• Plan Price:</strong> ₹<?= $planAmount ?></p>
                        <p><strong>• Balance After Purchase:</strong> <span
                                class="text-[#015551] font-semibold">₹<?= $total - $planAmount ?></span></p>
                    </div>

                    <div
                        class="bg-gray-100 rounded-md p-3 mb-6 text-xs text-left text-gray-500 border-l-4 border-[#015551]">
                        <h3 class="font-semibold mb-1">Terms & Conditions:</h3>
                        <ul class="list-disc list-inside">
                            <li>This plan is valid as per the terms selected.</li>
                            <li>No refunds after successful purchase.</li>
                            <li>Your remaining balance can be used for other services.</li>
                            <li>Make sure your details are correct before confirming.</li>
                        </ul>
                    </div>

                    <form method="post" action="process-purchase.php" class="flex justify-center gap-4">
                        <input type="hidden" name="confirmed_plan" value="<?= $planAmount ?>">
                        <button type="submit"
                            class="bg-[#015551] hover:bg-[#01443e] text-white px-5 py-2 rounded-md text-sm font-semibold">
                            Confirm Purchase
                        </button>
                        <a href="purchaseSellPlan.php"
                            class="bg-gray-300 hover:bg-gray-400 px-5 py-2 rounded-md text-sm font-semibold">
                            Cancel
                        </a>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>