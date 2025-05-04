
<!-- Navbar -->
<nav class="bg-[#1F2937] text-white px-4 py-3 shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        <!-- Logo -->
        <a href="index.php">
            <div class="text-xl font-bold tracking-wide">
                Admin<span class="text-blue-400">Panel</span>
            </div>
        </a>


        <div class="hidden md:flex items-center space-x-6">
            <div class="relative group">
                <a href="../users_account/logout.php" class="block px-4 py-2 bg-gray-700 hover:bg-gray-600 text-sm rounded-lg">
                    <i class="fas fa-sign-out-alt mr-2 w-4 text-gray-500"></i> Logout
                </a>
            </div>
        </div>

        <!-- Mobile Hamburger -->
        <div class="md:hidden">
            <button id="mobile-sidebar-btn" class="focus:outline-none">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar (Mobile Only) -->
<div id="mobile-sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-[#111827] text-white transform -translate-x-full transition-transform duration-300 z-50">
    <div class="flex flex-col h-full">
        <!-- Header -->
        <div class="flex items-center justify-between px-4 py-4 border-b border-gray-700">
            <div class="text-lg font-semibold">Admin Panel</div>
            <button id="close-sidebar" class="text-gray-400 hover:text-white">
                ✕
            </button>
        </div>

        <!-- Admin Info -->
        <div class="flex flex-col items-center py-6 space-y-2">
            <img src="https://i.pravatar.cc/80" class="w-16 h-16 rounded-full border-2 border-blue-400" alt="Admin">
            <span class="text-sm">Admin Name</span>
        </div>

        <!-- Menu Links -->
        <nav class="flex flex-col space-y-2 px-6">
            <a href="#" class="py-2 px-4 rounded bg-gray-700 flex items-center space-x-2">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="#" class="py-2 px-4 rounded bg-gray-700 flex items-center space-x-2">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
            <a href="#" class="py-2 px-4 rounded bg-gray-700 flex items-center space-x-2">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
            </a>
            <a href="#" class="py-2 px-4 rounded bg-gray-700 flex items-center space-x-2">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </nav>
    </div>
</div>

<!-- Overlay when sidebar open -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden z-40"></div>

<!-- JavaScript -->
<script>
    const sidebarBtn = document.getElementById("mobile-sidebar-btn");
    const sidebar = document.getElementById("mobile-sidebar");
    const overlay = document.getElementById("overlay");
    const closeBtn = document.getElementById("close-sidebar");

    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
    });

    closeBtn.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });

    overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });
</script>