<!-- Sidebar (fixed, scrollable inside) -->
<aside
    class="w-64 fixed top-[56px] left-0 h-[calc(100vh-56px)] bg-[#111827] text-white z-30 overflow-y-auto shadow-lg hidden md:block">
    <div class="px-4 py-6">
        <div class="flex items-center space-x-2 mb-6">
            <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full border-2 border-blue-500" alt="Admin">
            <div>
                <p class="text-sm font-semibold">Admin Name</p>
                <p class="text-xs text-gray-400">admin@email.com</p>
            </div>
        </div>

        <nav class="space-y-1 text-sm">
            <a href="index.php" class="flex items-center px-4 py-2 rounded bg-gray-800 hover:bg-gray-700">
                <i class="fas fa-home w-5 mr-2"></i> Dashboard
            </a>
            <a href="category.php" class="flex items-center px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-layer-group w-5 mr-2"></i> Categories
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-users w-5 mr-2"></i> Users
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-chart-line w-5 mr-2"></i> Reports
            </a>
            <a href="#" class="flex items-center px-4 py-2 rounded hover:bg-gray-700">
                <i class="fas fa-cog w-5 mr-2"></i> Settings
            </a>
        </nav>
    </div>
</aside>