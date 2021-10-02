<x-admin-layout page="TV Shows" desc="Shows all released tv shows">
    <div class="tvs grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-8 lg:gap-6">
        @foreach ($tvs as $tv)
        <div class="tv flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
            <div class="relative">
                <img src="{{ $tv['poster'] }}" alt="{{ $tv['title'] }}">
                <x-rating rating="{{ $tv['vote_average'] }}" />
            </div>
            <div class="py-3 px-4 text-sm">
                <a href="{{ route('tv.show', ['id' => $tv['id']]) }}"
                    class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1"
                    title="{{ $tv['title'] }}">{{ $tv['title'] }}</a>
                <div class="text-gray-600">{{ $tv['release_date']->format('M d, Y') }}</div>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            var elem = document.querySelector('.tvs');

            var infScroll = new InfiniteScroll( elem, {
                prefill: true,
                path: "/tvs/@{{#}}",
                append: '.tv',
                history: false,
            });
        })
    </script>
</x-admin-layout>
