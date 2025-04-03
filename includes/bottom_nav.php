<div class="fixed bottom-0 left-0 w-full border-t border-[#E8E8E8] shadow-lg flex justify-around items-center py-2 md:hidden bg-[#F4F4F2] z-50">
    <!-- Wishlist Button -->
    <a href="wishlist.php" class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
        <div class="relative">
            <!-- Heart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <!-- Notification Badge -->
            <span class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                5
            </span>
        </div>
        <span class="text-xs mt-1 font-medium">Wishlist</span>
    </a>

    <!-- Chat Button -->
    <a href="chat.php" class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
        <div class="relative">
            <!-- Chat Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <!-- Notification Badge -->
            <span class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                3
            </span>
        </div>
        <span class="text-xs mt-1 font-medium">Chat</span>
    </a>

    <!-- Sell Button (Center) -->
    <a href="sell.php" class="relative flex items-center justify-center -mt-8 transition-transform duration-300 hover:scale-105">
        <!-- Outer Circle with Gradient -->
        <div class="absolute w-16 h-16 rounded-full bg-gradient-to-r from-[#00ADB5] to-[#BBBFCA] p-1 shadow-lg">
        </div>
        
        <!-- Inner Circle -->
        <div class="relative z-10 flex items-center justify-center w-14 h-14 bg-white rounded-full shadow-inner">
            <span class="text-[#495464] font-bold text-sm">SELL</span>
        </div>
    </a>

    <!-- Cart Button -->
    <a href="cart.php" class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
        <div class="relative">
            <!-- Shopping Cart Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <!-- Notification Badge -->
            <span class="absolute -top-2 -right-2 bg-[#00ADB5] text-white text-xs font-medium px-1.5 py-0.5 rounded-full flex items-center justify-center min-w-[20px]">
                5
            </span>
        </div>
        <span class="text-xs mt-1 font-medium">Cart</span>
    </a>

    <!-- Profile Button -->
    <a href="profile.php" class="text-[#495464] hover:text-[#00ADB5] flex flex-col items-center px-2 py-1 transition-colors duration-200">
        <div class="relative w-6 h-6 rounded-full overflow-hidden border border-[#00ADB5]">
            <img src="https://i.pravatar.cc/100" alt="Profile" class="w-full h-full object-cover">
        </div>
        <span class="text-xs mt-1 font-medium">Profile</span>
    </a>
</div>