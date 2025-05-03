<!-- Mobile Search Button (Bottom Right) -->
<div class="fixed bottom-20 right-6 z-50 md:hidden">
    <button id="mobileSearchBtn" class="group relative">
        <div class="flex items-center justify-center w-14 h-14 rounded-2xl border border-blue-600 bg-[#57B4BA] shadow-sm transition-all duration-200">
            <i class="fa-solid fa-magnifying-glass text-[#FDFBEE] text-base group-hover:scale-110 transition-transform"></i>
        </div>
    </button>
</div>

<!-- Search Modal -->
<div id="searchModal" class="fixed inset-0 z-50 bg-black/50 hidden items-start justify-center pt-24 px-4 mt-20">
    <div class="bg-white w-full max-w-md rounded-xl shadow-xl p-4 relative">

        <!-- Modal Header -->
        <div class="flex items-center justify-between mb-3">
            <h2 class="text-lg font-semibold text-gray-800">Search Book</h2>
            <button id="closeSearchModal" class="text-gray-500 hover:text-red-500 text-xl font-bold">&times;</button>
        </div>

        <!-- Search Form -->
        <form id="searchForm" action="filter.php" method="GET" class="relative mb-2">
            <input id="searchInput" type="text" name="book_name" placeholder="Search for books, authors..."
                class="w-full border border-gray-300 rounded-md pr-10 pl-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />
            <button type="submit" name="find_book"
                class="absolute inset-y-0 right-3 flex items-center text-blue-600 hover:text-blue-800">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <!-- Suggestions List -->
        <ul id="suggestionsList" class="w-full border border-gray-200 rounded-md shadow-sm max-h-60 overflow-y-auto text-sm text-gray-800 custom-scroll">
            <li class="px-4 py-2 font-semibold text-gray-500 cursor-default select-none">
                Search Book-Name, Category, Book-detail..
            </li>
            <?php 
            $call_books_name = mysqli_query($connect, "
                SELECT title AS name FROM books
                UNION ALL
                SELECT category_title FROM category
                UNION ALL
                SELECT subcat_title FROM sub_category 
                ORDER BY RAND()
            ");
            while ($books_name = mysqli_fetch_array($call_books_name)) { ?>
                <li class="px-4 py-2 cursor-pointer hover:bg-blue-50 transition-all duration-150 rounded">
                    <a href="filter.php?find_book=&book_name=<?= urlencode($books_name['name']) ?>" class="flex items-center gap-2">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i> <?= htmlspecialchars($books_name['name']) ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>

<!-- Script -->
<script>
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const searchModal = document.getElementById('searchModal');
    const closeSearchModal = document.getElementById('closeSearchModal');
    const searchInput = document.getElementById('searchInput');
    const suggestionsList = document.getElementById('suggestionsList');

    // Open modal
    mobileSearchBtn.addEventListener('click', () => {
        searchModal.classList.remove('hidden');
        searchModal.classList.add('flex');
        setTimeout(() => searchInput.focus(), 100);
    });

    // Close modal
    closeSearchModal.addEventListener('click', () => {
        searchModal.classList.add('hidden');
        searchModal.classList.remove('flex');
    });

    // ESC key to close modal
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            searchModal.classList.add('hidden');
            searchModal.classList.remove('flex');
        }
    });

    // Live Search: Fetch suggestions
    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();

        if (query.length > 0) {
            fetch(`?query=${query}`)
                .then(response => response.json())
                .then(suggestions => {
                    suggestionsList.innerHTML = ''; // Clear previous suggestions
                    if (suggestions.length === 0) {
                        suggestionsList.innerHTML = `<li class="px-4 py-2 text-gray-500">No results found</li>`;
                    } else {
                        // Prioritize matching text suggestions at the top
                        const sortedSuggestions = suggestions.filter(s => s.toLowerCase().includes(query.toLowerCase()))
                            .concat(suggestions.filter(s => !s.toLowerCase().includes(query.toLowerCase())));

                        sortedSuggestions.forEach(suggestion => {
                            const listItem = document.createElement('li');
                            listItem.classList.add('px-4', 'py-2', 'cursor-pointer', 'hover:bg-blue-50', 'transition-all', 'duration-150', 'rounded');
                            listItem.innerHTML = `
                                <a href="filter.php?find_book=&book_name=${encodeURIComponent(suggestion)}" class="flex items-center gap-2">
                                    <i class="fa-solid fa-magnifying-glass text-xs"></i> ${suggestion}
                                </a>
                            `;
                            suggestionsList.appendChild(listItem);
                        });
                    }
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        } else {
            suggestionsList.innerHTML = `<li class="px-4 py-2 font-semibold text-gray-500 cursor-default select-none">Search Book-Name, Category, Book-detail..</li>`;
        }
    });
</script>
