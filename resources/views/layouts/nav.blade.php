<nav class="w-full bg-white dark:bg-[#18181b] shadow mb-8">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16 gap-7">
            <div class="flex items-center space-x-6">
                <span class="text-xl font-bold text-[#1b1b18] dark:text-white">Welcome to Your Dashboard</span>
                <a href="/"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium">Home</a>
                <a href="{{ route('tables.index') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium">Tables</a>
                <a href="{{ route('menus.index') }}"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium">Menu</a>
                <a href="#"
                    class="text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 font-medium">Orders</a>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition font-semibold shadow cursor-pointer">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
