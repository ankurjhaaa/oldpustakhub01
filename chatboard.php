<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pustakhub | Chat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex h-screen">
  
  <!-- Sidebar (Inbox List) -->
  <div class="w-1/3 bg-white p-4 overflow-y-auto">
    <h2 class="text-2xl font-bold mb-4">INBOX</h2>

    <!-- Search Box -->
    <input type="text" placeholder="Search..." class="mb-4 w-full border rounded-full px-4 py-2">

    <!-- Quick Filters -->
    <div class="flex gap-2 mb-4">
      <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full">All</button>
      <button class="px-3 py-1 border rounded-full">Meeting</button>
      <button class="px-3 py-1 border rounded-full">Unread</button>
      <button class="px-3 py-1 border rounded-full">Important</button>
    </div>

    <!-- Chat List Start -->
    <div class="space-y-4">

      <!-- One Chat Item Start -->
      <div class="flex items-center gap-3 cursor-pointer p-2 hover:bg-gray-100 rounded">
        <img src="https://via.placeholder.com/50" alt="Profile" class="w-12 h-12 rounded-full">
        <div>
          <p class="font-bold">Ganesh Motors</p>
          <p class="text-sm text-gray-500 truncate">Thar new model DRL lights jeep spa...</p>
        </div>
      </div>
      <div class="flex items-center gap-3 cursor-pointer p-2 hover:bg-gray-100 rounded">
        <img src="https://via.placeholder.com/50" alt="Profile" class="w-12 h-12 rounded-full">
        <div>
          <p class="font-bold"> Motors</p>
          <p class="text-sm text-gray-500 truncate">Thar new model DRL lights jeep spa...</p>
        </div>
      </div>
      <!-- One Chat Item End -->

      <!-- Duplicate this block inside your PHP loop -->

    </div>
    <!-- Chat List End -->

  </div>

  <!-- Chat Window -->
  <div class="flex-1 flex flex-col">
    
    <!-- Chat Header -->
    <div class="flex items-center justify-between bg-white p-4 shadow">
      <div class="flex items-center gap-3">
        <img src="https://via.placeholder.com/50" alt="Profile" class="w-12 h-12 rounded-full">
        <p class="font-bold">Ganesh Motors</p>
      </div>
      <div class="flex items-center gap-4">
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405M19.5 9.5l-7-7-7 7m14 6V13a2 2 0 00-2-2h-3.586a1 1 0 01-.707-.293l-7-7A1 1 0 003.586 4H2" /></svg>
        </button>
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h3m4 0h8m-8 4h8m-8 4h8" /></svg>
        </button>
        <button>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
    </div>

    <!-- Chat Messages -->
    <div class="flex-1 p-6 overflow-y-auto bg-gray-50 space-y-4">
      
      <!-- One Message (Receiver) -->
      <div class="flex items-start gap-2">
        <img src="https://via.placeholder.com/50" alt="Profile" class="w-8 h-8 rounded-full">
        <div class="bg-gray-200 p-3 rounded-lg max-w-xs">
          <p>Hello, we have new models! dddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>
          <p class="text-xs text-gray-400 text-right mt-1">13:00</p>
        </div>
      </div>

      <!-- One Message (Sender) -->
      <div class="flex justify-end">
        <div class="bg-blue-500 text-white p-3 rounded-lg max-w-xs">
          <p>Great, send me details.</p>
          <p class="text-xs text-white text-right mt-1">13:05</p>
        </div>
      </div>

      <!-- Duplicate these blocks for each message -->

    </div>

    <!-- Chat Input -->
    <div class="p-4 bg-white flex items-center gap-2">
      <button class="px-4 py-2 bg-gray-200 rounded">CHAT</button>
      <input type="text" placeholder="Type a message" class="flex-1 border rounded-full px-4 py-2">
      <button class="px-4 py-2 bg-blue-500 text-white rounded">MAKE OFFER</button>
      <button>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 010-5.656m-2.828 2.828a4 4 0 105.656-5.656m1.415 1.414a6 6 0 11-8.485 8.485" /></svg>
      </button>
    </div>

  </div>

</div>
</body>
</html>
