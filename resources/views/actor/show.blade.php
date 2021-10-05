<x-admin-layout page="View Actor" desc="Display everything about actor">
    <div class="flex flex-col md:flex-row gap-6 mb-8 md:mb-11 xl:mb-10">
        <div class="md:max-w-[256px] 2xl:max-w-xs flex-shrink-0">
            <img src="{{ $actor['picture'] }}" alt="{{ $actor['name'] }}"
                class="block w-full object-cover object-center rounded-xl">
        </div>
        <div>
            <div class="mb-5">
                <h1 class="mb-1.5 text-2xl 2xl:text-[32px] 2xl:leading-9 font-bold text-gray-900 tracking-tighter">{{ $actor['name'] }}</h1>
                <p class="text-sm text-gray-600">{{ $actor['birthday']->age }} years old &middot; {{ $actor['known_for_department'] }}</p>
            </div>
            <div class="mb-5 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm">
                <div class="inline-flex items-center gap-1.5">
                    <span class="inline-flex text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z">
                            </path>
                        </svg>
                    </span>
                    <span class="text-gray-900 font-medium">{{ $actor['birthday']->format('d F Y') }}</span>
                </div>
                <div class="inline-flex items-center gap-1.5">
                    <span class="inline-flex text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </span>
                    <span class="text-gray-900 font-medium">{{ $actor['place_of_birth'] }}</span>
                </div>
                <div class="inline-flex items-center gap-1.5">
                    <span class="inline-flex text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                            </path>
                        </svg>
                    </span>
                    <span class="text-gray-900 font-medium">{{ count($cast) }} @choice('credit|credits',
                        count($cast))</span>
                </div>
            </div>
            <div class="mb-5">
                <h4 class="mb-1 text-sm font-medium text-gray-900">Biography</h4>
                <p class="max-w-2xl mb-1.5 line-clamp-5 md:line-clamp-15 text-sm text-gray-600 whitespace-pre-line">{{ $actor['biography'] }}</p>
                <a href="#" class="text-sm font-medium text-cyan-600">Read full biography</a>
            </div>
        </div>
    </div>
    <div class="grid lg:grid-cols-4 gap-8 lg:gap-6 mb-8 md:mb-11 xl:mb-14">
        <div>
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Personal Info</h2>
            <div class="flex flex-col gap-6">
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Known For</h4>
                    <p class="text-gray-600">{{ $actor['known_for_department'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Gender</h4>
                    <p class="text-gray-600">{{ $actor['gender'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Knownfor credits</h4>
                    <p class="text-gray-600">{{ count($cast) }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Birthday</h4>
                    <p class="text-gray-600">{{ $actor['birthday']->format('d M Y') }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Also Known As</h4>
                    <div>
                        @foreach (collect($actor['also_known_as'])->take(2) as $name)
                        <p class="mb-0.5 text-gray-600">{{ $name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-3 grid grid-cols-1 gap-8">
            <div>
                <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Known For</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 2xl:grid-cols-5 gap-4">
                    @foreach ($cast->sortByDesc('release_date')->take(5) as $media)
                    <div class="flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl">
                        <div class="overflow-hidden">
                            <img src="{{ $media['poster'] }}" alt="{{ $media['title'] }}"
                                class="object-center object-cover">
                        </div>
                        <div class="py-3 px-4 text-sm">
                            <a href="{{ $media['url'] }}" class="text-center block font-semibold text-gray-900 hover:text-cyan-600">{{ $media['title'] }}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Acting</h2>
                <div class="py-1 flex flex-col bg-white divide-y divide-gray-100 rounded-xl ring-1 ring-inset ring-gray-100">
                    @foreach ($cast->sortByDesc('release_date') as $role)
                    <div class="py-3 md:py-4 flex items-center">
                        <div class="w-16 md:w-20 flex-shrink-0 flex items-center justify-center">
                            <span class="text-sm text-gray-700">{{ $role['release_date']->format('Y') }}</span>
                        </div>
                        <div class="inline-flex flex-shrink-0 items-center justify-center text-gray-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M8 2.5A5.5 5.5 0 1 0 13.5 8 5.506 5.506 0 0 0 8 2.5ZM8 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"/></svg>
                        </div>
                        <div class="ml-5">
                            <span class="text-sm">
                                <a href="{{ $role['url'] }}" class="font-semibold text-gray-900">{{ $role['title'] }}</a>
                                <span class="text-gray-500">as</span>
                                <span class="text-gray-600">{{ $role['character'] }}</span>
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div>

    </div>
</x-admin-layout>
