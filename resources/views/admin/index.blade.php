<x-admin-layout page="Dashboard" desc="Browse movies and tv shows">
    <div class="p-4">
        <div class="mb-6">
            <div class="mb-2.5">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-semibold text-gray-900">Dashboard</h1>
                    <button type="button" class="p-2 flex items-center justify-center rounded-xl bg-gray-200/50 text-gray-600 focus:outline-none focus:bg-gray-200">
                        <span class="inline-flex">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                        </span>
                    </button>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex-grow relative">
                    <input type="text" name="search" id="search" class="py-2.5 px-[2.875rem] block w-full text-sm font-medium rounded-xl bg-gray-200/50 focus:outline-none focus:bg-gray-200 placeholder-gray-600" placeholder="Search">

                    <span class="absolute inset-y-0 left-3 flex items-center justify-center text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                </div>
                <button type="button" class="p-2 flex items-center justify-center rounded-xl bg-gray-200/50 text-gray-600 focus:outline-none focus:bg-gray-200">
                    <span class="inline-flex">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </span>
                </button>
                <div class="relative inline-flex">
                    <button type="button" class="w-10 h-10 rounded-xl focus:outline-none">
                        <img src="https://images.unsplash.com/photo-1517849845537-4d257902454a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile Picture" class="rounded-xl">
                    </button>
                    <span class="block absolute bottom-[-2px] left-[-2px] w-2.5 h-2.5 rounded-full ring-1 ring-inset ring-green-600 bg-green-500"></span>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex flex-col bg-white ring ring-inset ring-gray-100 shadow rounded-xl overflow-hidden">
                <div>
                    <img src="{{ asset('movies/bOFaAXmWWXC3Rbv4u4uM9ZSzRXP.jpg') }}" alt="F9">
                </div>
                <div class="py-3 px-4 text-sm">
                    <a href="#" class="font-semibold text-gray-900">Fast and Furious 9</a>
                    <div class="text-gray-600">May 19, 2021</div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
