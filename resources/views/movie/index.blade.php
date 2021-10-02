<x-admin-layout page="Movies" desc="Shows all released movies">
    <div class="movies grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-8 lg:gap-6">
        @foreach ($movies as $movie)
        <div class="movie flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
            <div class="relative">
                <img src="{{ $movie['poster'] }}" alt="{{ $movie['title'] }}">
                <x-rating rating="{{ $movie['vote_average'] }}" />
            </div>
            <div class="py-3 px-4 text-sm">
                <a href="{{ route('movie.show', ['id' => $movie['id']]) }}"
                    class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1"
                    title="{{ $movie['title'] }}">{{ $movie['title'] }}</a>
                <div class="text-gray-600">{{ $movie['release_date']->format('M d, Y') }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            var elem = document.querySelector('.movies');

            var infScroll = new InfiniteScroll( elem, {
                prefill: true,
                path: "/movies/@{{#}}",
                append: '.movie',
                history: false,
            });
        })
    </script>
</x-admin-layout>
