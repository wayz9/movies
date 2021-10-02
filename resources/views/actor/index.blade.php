<x-admin-layout page="Actors" desc="Shows all popular actors">
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
</x-admin-layout>
