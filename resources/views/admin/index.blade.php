<x-admin-layout page="Dashboard" desc="Browse movies and tv shows">
    <div class="mb-8 md:mb-11 xl:mb-14">
        <div>
            <h2 class="mb-3 text-base lg:text-lg xl:text-xl font-semibold text-gray-900">What's Popular</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-8 lg:gap-6">
            @foreach ($movies as $movie)
            <div class="flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
                <div class="relative">
                    <img src="{{ $movie['poster'] }}" alt="{{ $movie['title'] }}">
                    <x-rating rating="{{ $movie['vote_average'] }}"/>
                </div>
                <div class="py-3 px-4 text-sm">
                    <a href="{{ route('movie.show', ['id' => $movie['id']]) }}" class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1" title="{{ $movie['title'] }}">{{ $movie['title'] }}</a>
                    <div class="text-gray-600">{{ $movie['release_date']->format('M d, Y') }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mb-8 md:mb-11 xl:mb-14">
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-base lg:text-lg xl:text-xl font-semibold text-gray-900">Trending Movies</h2>
            <div class="p-1 flex items-center gap-1 rounded-xl bg-gray-200/70">
                <a href="/" class="py-2 px-4 text-sm font-medium {{ (request('time_window') != 'week') ? 'bg-white text-gray-900' : 'text-gray-600 hover:text-gray-900' }} rounded-xl">
                    Today
                </a>
                <a href="?time_window=week" class="py-2 px-4 text-sm font-medium {{ (request('time_window') == 'week') ? 'bg-white text-gray-900' : 'text-gray-600 hover:text-gray-900' }} rounded-xl">
                    Week
                </a>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-8 lg:gap-6">
            @foreach ($trending as $movie)
            <div class="flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
                <div class="relative">
                    <img src="{{ $movie['poster'] }}" alt="{{ $movie['title'] }}">
                    <x-rating rating="{{ $movie['vote_average'] }}"/>
                </div>
                <div class="py-3 px-4 text-sm">
                    <a href="{{ route('movie.show', ['id' => $movie['id']]) }}" class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1" title="{{ $movie['title'] }}">{{ $movie['title'] }}</a>
                    <div class="text-gray-600">{{ $movie['release_date']->format('M d, Y') }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mb-8 md:mb-11 xl:mb-14">
        <div class="mb-3">
            <h2 class="text-base lg:text-lg xl:text-xl font-semibold text-gray-900">Popular Actors</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-8 lg:gap-6">
            @foreach ($actors as $actor)
            <div class="flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
                <div class="relative">
                    <img src="{{ $actor['picture'] }}" alt="{{ $actor['name'] }}">
                </div>
                <div class="py-3 px-4 text-sm">
                    <a href="{{ route('actor.show', ['id' => $actor['id']]) }}" class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1">{{ $actor['name'] }}</a>
                    <div class="text-gray-600 line-clamp-1" title="{{ $actor['known_for'] }}">{{ $actor['known_for'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>
