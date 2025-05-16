<!-- Button to open modal -->


<!-- Modal -->
<div id="modal" class="fixed inset-0 p-6 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg relative">

        <!-- Close button -->
        <button id="closeModalBtn"
            class="absolute top-3 right-3 text-gray-400 hover:text-gray-900 text-xl font-bold"></button>

        <!-- Search input with icons inside -->
        <div class="relative">
            <!-- Left search icon -->
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none"
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.35-4.35M17 17A7.5 7.5 0 1110.5 3 7.5 7.5 0 0117 17z" />
            </svg>

            <!-- Search input -->
            <form action="filter.php" method="get">
                <input id="searchInput" type="text" placeholder="Search for Products, Brands and More" name="book_name"
                    class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    oninput="filterSuggestions(this.value)" />

                <!-- Right search icon button -->
                <button type="submit" name="find_book"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-blue-600">
                    🔍
                </button>
            </form>
        </div>

        <!-- Static Suggestions Div -->
        <div id="suggestions" 
            class="mt-4 max-h-72 overflow-y-auto space-y-1 text-sm text-gray-700 border border-gray-200 rounded-md">
            <?php
            $call_books_name = mysqli_query($connect, "
      SELECT title AS name FROM books
      UNION ALL
      SELECT category_title AS name FROM category
      UNION ALL
      SELECT subcat_title AS name FROM sub_category
      ORDER BY RAND()
    ");

            while ($row = mysqli_fetch_array($call_books_name)) { ?>
                <a href="filter.php?find_book=&book_name=<?= urlencode($row['name']) ?>"
                    class="block hover:no-underline focus:outline-none focus:ring-2 focus:ring-blue-500 rounded"
                    role="option" aria-selected="false">
                    <div class="suggestion flex items-center gap-2 px-3 py-2 hover:bg-gray-100 rounded cursor-pointer">
                        <i class="fa-solid fa-magnifying-glass text-gray-500 text-xs"></i>
                        <span><?= htmlspecialchars($row['name']) ?></span>
                    </div>
                </a>
            <?php } ?>
        </div>

    </div>
</div>

<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');
    const suggestions = document.querySelectorAll('.suggestion');

    function filterSuggestions(query) {
        query = query.toLowerCase();
        suggestions.forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(query)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }




    openModalBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    closeModalBtn.addEventListener('click', () => modal.classList.add('hidden'));
    modal.addEventListener('click', e => { if (e.target === modal) modal.classList.add('hidden'); });
</script>