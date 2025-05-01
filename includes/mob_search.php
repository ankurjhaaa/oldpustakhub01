<!-- Search Icon (bottom right, above navbar) -->
<div class="fixed bottom-20 right-6 z-50 md:hidden">
    <button id="mobileSearchBtn" class="group relative">
        <div
            class="flex items-center justify-center w-14 h-14 rounded-2xl border border-blue-600 bg-[#57B4BA] shadow-sm  transition-all duration-200">
            <i
                class="fa-solid fa-magnifying-glass text-[#FDFBEE] text-base group-hover:scale-110 transition-transform"></i>
        </div>
    </button>
</div>
<!-- Mobile Search Bar (Initially Hidden) -->
<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 z-50 bg-black/40 hidden items-center justify-center">
    <div class="bg-white w-11/12 max-w-md mx-auto rounded-lg shadow-lg p-4">

        <!-- Modal Header -->
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-lg font-semibold text-gray-800">Search Book</h2>
            <button id="closeSearchModal" class="text-gray-500 hover:text-red-500 text-xl">&times;</button>
        </div>

        <!-- Search Form -->
        <form id="searchForm" action="search.php" method="GET" class="relative">
            <input id="searchInput" type="text" name="q" placeholder="Search for books, authors..."
                class="w-full border border-gray-300 rounded-md pr-10 pl-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />
            <button type="submit"
                class="absolute inset-y-0 right-2 flex items-center text-blue-600 hover:text-blue-800">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</div>
<script>
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const searchModal = document.getElementById('searchModal');
    const closeSearchModal = document.getElementById('closeSearchModal');

    // Open Modal
    mobileSearchBtn.addEventListener('click', () => {
        searchModal.classList.remove('hidden');
        searchModal.classList.add('flex');
        document.getElementById('searchInput').focus();
    });

    // Close Modal
    closeSearchModal.addEventListener('click', () => {
        searchModal.classList.add('hidden');
        searchModal.classList.remove('flex');
    });

    // ESC to close
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            searchModal.classList.add('hidden');
            searchModal.classList.remove('flex');
        }
    });
</script>