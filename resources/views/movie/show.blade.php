<x-admin-layout page="View Movie" desc="Display everything about movie">
    <div class="mb-8 md:mb-11 xl:mb-14">
        <div id="setImage" class="bg-top bg-no-repeat bg-cover rounded-xl overflow-hidden">
            <div
                class="flex flex-col md:py-8 md:px-9 gap-4 md:gap-6 2xl:gap-8 md:flex-row bg-transparent md:bg-gradient-to-br from-dark-900 via-dark-800/90 to-dark-900/25">
                <div class="md:max-w-[256px] 2xl:max-w-xs">
                    <img src="{{ $movie['poster'] }}" alt="{{ $movie['title'] }}"
                        class="object-cover object-center rounded-xl" class="object-center object-cover">
                </div>
                <div>
                    <div class="mb-5 2xl:mb-6">
                        <h1 class="mb-1.5 text-2xl 2xl:text-[32px] 2xl:leading-9 font-bold text-gray-900 tracking-tighter md:text-gray-100">
                            {{ $movie['title'] }} {{ $movie['release_date']->format('(Y)') }}</h1>
                        <p class="text-sm text-gray-500 md:text-gray-300">{{ $movie['release_date']->format('M d, Y') }} (US) {{-- <-- !Fix this --}}  • {{ $movie['genre'] }}
                        </p>
                    </div>
                    <div class="text-sm mb-5 2xl:mb-6">
                        <h4 class="mb-1 text-sm font-medium text-gray-900 md:text-gray-100">Overview</h4>
                        <p class="max-w-lg line-clamp-2 text-gray-600 md:text-gray-400">{{ $movie['overview'] }}</p>
                    </div>
                    <div class="mb-5 2xl:mb-6 flex items-center gap-12 flex-wrap">
                        <div class="flex items-center gap-1.5 text-gray-800 md:text-gray-100">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            <div class="text-sm font-medium">{{ $movie['runtime'] }}</div>
                        </div>
                        <div class="flex items-center gap-1.5 text-gray-800 md:text-gray-100">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                    </path>
                                </svg>
                            </span>
                            <div class="text-sm font-medium">{{ $movie['vote_average'] }}</div>
                        </div>
                        <div class="flex items-center gap-1.5 text-gray-800 md:text-gray-100">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5.636 18.364a9 9 0 010-12.728m12.728 0a9 9 0 010 12.728m-9.9-2.829a5 5 0 010-7.07m7.072 0a5 5 0 010 7.07M13 12a1 1 0 11-2 0 1 1 0 012 0z">
                                    </path>
                                </svg>
                            </span>
                            <div class="text-sm font-medium">{{ $movie['status'] }}</div>
                        </div>
                    </div>
                    <div class="mb-5 2xl:mb-12 max-w-lg w-full flex flex-wrap md:gap-x-10 gap-y-5">
                        @foreach ($movie['crew'] as $person)
                        <div class="text-sm w-1/2 md:w-auto">
                            <div class="mb-1 font-medium text-gray-900 md:text-gray-100">{{ $person['name'] }}</div>
                            <div class="text-gray-600 md:text-gray-400">{{ $person['known_for_department'] }}</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="flex items-center gap-3.5">
                        <button type="button"
                            class="p-3 flex items-center justify-center rounded-full text-gray-500 md:text-gray-200 bg-white md:bg-dark-600 ring-1 md:ring-0 ring-inset ring-gray-100 focus:outline-none focus:ring-gray-600">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="p-3 flex items-center justify-center rounded-full text-gray-500 md:text-gray-200 bg-white md:bg-dark-600 ring-1 md:ring-0 ring-inset ring-gray-100 focus:outline-none focus:ring-gray-600">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="p-3 flex items-center justify-center rounded-full text-gray-500 md:text-gray-200 bg-white md:bg-dark-600 ring-1 md:ring-0 ring-inset ring-gray-100 focus:outline-none focus:ring-gray-600">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                        <button type="button"
                            class="p-3 flex items-center justify-center rounded-full text-gray-500 md:text-gray-200 bg-white md:bg-dark-600 md:ring-0 ring-1 ring-inset ring-gray-100 focus:outline-none focus:ring-gray-600">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-8 md:mb-4 xl:mb-6 2xl:px-9 grid lg:grid-cols-4 gap-8 lg:gap-6">
        <div class="lg:col-span-3">
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Top Billed Cast</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($movie['cast'] as $person)
                <div class="flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
                    <div class="relative">
                        <img src="{{ $person['picture'] }}" alt="{{ $person['name'] }}"
                            class="object-center object-cover">
                    </div>
                    <div class="py-3 px-4 text-sm">
                        <a href="{{ route('actor.show', ['id' => $person['id']]) }}" class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1">{{ $person['name'] }}</a>
                        <div class="text-gray-600 line-clamp-1" title="{{ $person['character'] }}">{{ $person['character'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div>
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Infomations</h2>
            <div class="py-5 px-6 rounded-xl bg-white ring-1 ring-inset ring-gray-100 flex flex-col gap-y-5 md:gap-y-6">
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Status</h4>
                    <p class="text-gray-600">{{ $movie['status'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Original Language</h4>
                    <p class="text-gray-600">{{ $movie['languages'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Budget</h4>
                    <p class="text-gray-600">{{ $movie['budget'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Revenue</h4>
                    <p class="text-gray-600">{{ $movie['revenue'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Keywords</h4>
                    <div class="flex flex-wrap items-center gap-2">
                        @foreach ($movie['keywords'] as $keyword)
                        <div class="flex-shrink-0 py-1 px-2.5 rounded bg-gray-100 text-gray-600">
                            {{ $keyword['name'] }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-8 md:mb-11 xl:mb-14 2xl:px-9 grid lg:grid-cols-4 gap-8 lg:gap-6">
        <div class="col-span-3">
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Reviews</h2>
            <div class="py-4 px-5 flex items-start gap-3 bg-white">
                <div class="flex-shrink-0 mt-0.5">
                    <img src="{{ asset('images/wER6MfaKV3swJdjrvRHXwBQxBIw.png') }}" alt="User"
                        class="w-10 h-10 rounded-full">
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h4 class="text-base font-semibold text-gray-900">A review by Manhoor Khan</h4>
                        <span class="py-1 pl-1 pr-1.5 inline-flex items-center gap-1 bg-gray-100 text-gray-600 rounded">
                            <span class="inline-flex text-cyan-600">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </span>
                            <span class="text-xs leading-3 font-bold tracking-tighter inline-flex mt-px">4.5</span>
                        </span>
                    </div>
                    <p class="mb-4 text-sm text-gray-600">Written by Mahnoor Khan on August 4, 2021</p>
                    <p class="text-sm text-gray-700 whitespace-pre-line line-clamp-4 md:line-clamp-6">I watched the
                        film, but it didn't appeal to me as much as the prior films. The change in theme
                        and concept was one of the things that bothered me the most in this film.

                        From street racing and minor crimes, the movies evolved into an idea of saving the planet. Okay,
                        that's wonderful; you can save the world; however, how can someone reach space in his car and
                        survive? Seriously?

                        I don't recall this being fast and furious. The plot was similar to earlier films and revolved
                        around Hobbs and Shaw. The story was not exceptional in any way.

                        And, when it comes to action, it was unrealistic...</p>
                </div>
            </div>
        </div>
    </div>

    <x-style url="{{ $movie['background'] }}" />
</x-admin-layout>
