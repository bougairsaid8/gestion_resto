<nav class=" w-full border-b border-gray-200 bg-black ">
    <div class="flex items-center justify-between">
        <!-- Search Bar -->
        <div class="relative w-96">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" class="block w-full rounded-full border border-gray-300 bg-gray-50 p-2 pl-10 text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Search">
        </div>

        <!-- Right Side Icons & Profile -->
        <div class="flex items-center space-x-4">
            <button class="text-gray-500 hover:text-gray-700">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
            </button>
            <div class="flex items-center space-x-3 rounded-lg border border-gray-100 p-1 pr-3 shadow-sm">
                <img src="https://ui-avatars.com/api/?name=Said+Bougair" class="h-8 w-8 rounded-lg" alt="User">
                <div class="text-left text-xs">
                    <p class="font-bold text-gray-800">Jane Cooper</p>
                    <p class="text-gray-500">jane234@example.com</p>
                </div>
                <svg class="h-1 w-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </div>
    </div>
</nav>