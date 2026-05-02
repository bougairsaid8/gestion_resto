<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cafe Manager')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans antialiased min-h-screen">
    <div class="flex min-h-screen w-full">
        <aside class=" md:block h-screen w-72 border-r border-gray-200 bg-white">
            <div class="flex h-full flex-col overflow-y-auto px-4 py-6">
                <div class="mb-10 flex items-center justify-between">
                    <span class="text-xl font-bold text-gray-800">Cafe Manager</span>
                    
                </div>

                <ul class="space-y-2 font-medium text-sm text-gray-700">
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Overview</a></li>
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Categories</a></li>
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Products</a></li>
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Tables</a></li>
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Staff</a></li>
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Orders</a></li>
                    <li><a href="#" class="block rounded-xl px-3 py-2 hover:bg-gray-100">Customers</a></li>
                </ul>
            </div>
        </aside>

        <main class="flex-1 bg-gray-50">
            <nav class="w-full border-b border-gray-200 bg-white px-4 py-2 shadow-sm">
                    <div class="flex flex-wrap items-end gap-2 justify-end">
                        
                        <div class="flex items-end space-x-3 rounded-lg border border-gray-100 bg-white p-2 shadow-sm">
                            <img src="https://ui-avatars.com/api/?name=Said+Bougair" class="h-8 w-8 rounded-lg" alt="User">
                            <div class="text-left text-xs">
                                <p class="font-bold text-gray-800">Jane Cooper</p>
                                <p class="text-gray-500">jane234@example.com</p>
                            </div>
                            <svg class="h-3 w-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
            </nav>

            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>