<x-admin-layout page="View TV Show" desc="Display everything about tv show">
    <div class="mb-8 md:mb-11 xl:mb-14">
        <div id="setImage" class="bg-top bg-no-repeat bg-cover rounded-xl overflow-hidden">
            <div
                class="flex flex-col md:py-8 md:px-9 gap-4 md:gap-6 2xl:gap-8 md:flex-row bg-transparent md:bg-gradient-to-br from-dark-900 via-dark-800/95 to-dark-900/25">
                <div class="md:max-w-[256px] 2xl:max-w-xs">
                    <img src="{{ $tvshow['poster'] }}" alt="{{ $tvshow['title'] }}"
                        class="object-cover object-center rounded-xl" class="object-center object-cover">
                </div>
                <div>
                    <div class="mb-5 2xl:mb-6">
                        <h1
                            class="mb-1.5 text-2xl 2xl:text-[32px] 2xl:leading-9 font-bold text-gray-900 tracking-tighter md:text-gray-100">
                            {{ $tvshow['title'] }} {{ $tvshow['release_date']->format('(Y)') }}</h1>
                        <p class="text-sm text-gray-500 md:text-gray-300">
                            {{ $tvshow['release_date']->format('M d, Y') }}
                            ({{ collect($tvshow['origin_country'])->first() }}) • {{ $tvshow['genre'] }}
                        </p>
                    </div>
                    <div class="text-sm mb-5 2xl:mb-6">
                        <h4 class="mb-1 text-sm font-medium text-gray-900 md:text-gray-100">Overview</h4>
                        <p class="max-w-lg line-clamp-2 text-gray-600 md:text-gray-400">{{ $tvshow['overview'] }}</p>
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
                            <div class="text-sm font-medium">{{ count($tvshow['seasons']) }} @choice('season|seasons',
                                count($tvshow['seasons']))</div>
                        </div>
                        <div class="flex items-center gap-1.5 text-gray-800 md:text-gray-100">
                            <span class="inline-flex">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </span>
                            <div class="text-sm font-medium">{{ collect($tvshow['seasons'])->sum('episode_count') }} @choice('episode|episodes',
                                collect($tvshow['seasons'])->sum('episode_count'))</div>
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
                            <div class="text-sm font-medium">{{ $tvshow['vote_average'] }}</div>
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
                            <div class="text-sm font-medium">{{ $tvshow['status'] }}</div>
                        </div>
                    </div>
                    <div class="mb-5 2xl:mb-12 max-w-lg w-full flex flex-wrap md:gap-x-10 gap-y-5">
                        @foreach ($tvshow['crew'] as $person)
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
                @foreach ($tvshow['cast'] as $person)
                <div class="flex flex-col bg-white ring ring-inset ring-gray-100 rounded-xl overflow-hidden">
                    <div class="relative">
                        <img src="{{ $person['picture'] }}" alt="{{ $person['name'] }}"
                            class="object-center object-cover">
                    </div>
                    <div class="py-3 px-4 text-sm">
                        <a href="{{ route('actor.show', ['id' => $person['id']]) }}"
                            class="font-semibold text-gray-900 hover:text-cyan-600 line-clamp-1">{{ $person['name'] }}</a>
                        <div class="text-gray-600 line-clamp-1" title="{{ $person['character'] }}">
                            {{ $person['character'] }}</div>
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
                    <p class="text-gray-600">{{ $tvshow['status'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Original Language</h4>
                    <p class="text-gray-600">{{ $tvshow['languages'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Tagline</h4>
                    <p class="text-gray-600 italic">{{ $tvshow['tagline'] }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Seasons</h4>
                    <p class="text-gray-600">{{ count($tvshow['seasons']) }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Episodes</h4>
                    <p class="text-gray-600">{{ collect($tvshow['seasons'])->sum('episode_count') }}</p>
                </div>
                <div class="text-sm">
                    <h4 class="mb-1 font-medium text-gray-900">Type</h4>
                    <p class="text-gray-600">{{ $tvshow['type'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-8 md:mb-11 xl:mb-14 2xl:px-9 grid lg:grid-cols-4 gap-8 lg:gap-6">
        <div class="col-span-3">
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Reviews</h2>
            @foreach ($tvshow['reviews'] as $review)
            <div class="pt-4 pb-8 px-5 flex items-start gap-3 bg-white">
                <div class="flex-shrink-0 mt-0.5">
                    <img src="{{ $review['author_details']['avatar'] }}" alt="User" class="w-10 h-10 rounded-full">
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h4 class="text-base font-semibold text-gray-900">A review by {{ $review['author'] }}</h4>
                        @if ($review['author_details']['rating'] != '')
                        <span class="py-1 pl-1 pr-1.5 inline-flex items-center gap-1 bg-gray-100 text-gray-600 rounded">
                            <span class="inline-flex text-cyan-600">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            </span>
                            <span
                                class="text-xs leading-3 font-bold tracking-tighter inline-flex mt-px">{{ $review['author_details']['rating'] }}</span>
                        </span>
                        @endif
                    </div>
                    <p class="mb-4 text-sm text-gray-600">Written by {{ $review['author'] }} on
                        {{ $review['created_at']->format('F d, Y') }}</p>
                    <p class="text-sm text-gray-700 whitespace-pre-line line-clamp-4 md:line-clamp-none">
                        {{ $review['content'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div>
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Social Media</h2>
            <div class="flex items-center gap-6">
                <a href="#" class="text-gray-600 hover:text-blue-500">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25 0H3C2.20435 0 1.44129 0.316071 0.87868 0.87868C0.31607 1.44129 0 2.20435 0 3L0 25C0 25.7956 0.31607 26.5587 0.87868 27.1213C1.44129 27.6839 2.20435 28 3 28H11.5781V18.4806H7.64062V14H11.5781V10.585C11.5781 6.70062 13.8906 4.555 17.4325 4.555C19.1287 4.555 20.9025 4.8575 20.9025 4.8575V8.67H18.9481C17.0225 8.67 16.4219 9.865 16.4219 11.0906V14H20.7206L20.0331 18.4806H16.4219V28H25C25.7956 28 26.5587 27.6839 27.1213 27.1213C27.6839 26.5587 28 25.7956 28 25V3C28 2.20435 27.6839 1.44129 27.1213 0.87868C26.5587 0.316071 25.7956 0 25 0Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="#" class="text-gray-600 hover:text-rose-500">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M14.0031 6.82115C10.0303 6.82115 6.82588 10.0263 6.82588 14C6.82588 17.9737 10.0303 21.1788 14.0031 21.1788C17.9759 21.1788 21.1804 17.9737 21.1804 14C21.1804 10.0263 17.9759 6.82115 14.0031 6.82115ZM14.0031 18.6672C11.4358 18.6672 9.33698 16.5741 9.33698 14C9.33698 11.4259 11.4296 9.33281 14.0031 9.33281C16.5767 9.33281 18.6693 11.4259 18.6693 14C18.6693 16.5741 16.5704 18.6672 14.0031 18.6672ZM23.148 6.5275C23.148 7.45844 22.3984 8.20194 21.474 8.20194C20.5432 8.20194 19.7999 7.45219 19.7999 6.5275C19.7999 5.60281 20.5495 4.85306 21.474 4.85306C22.3984 4.85306 23.148 5.60281 23.148 6.5275ZM27.9016 8.22693C27.7954 5.98393 27.2832 3.9971 25.6404 2.36015C24.0038 0.723195 22.0174 0.210867 19.7749 0.0984045C17.4637 -0.0328015 10.5363 -0.0328015 8.2251 0.0984045C5.98885 0.204619 4.00245 0.716947 2.35962 2.3539C0.716788 3.99085 0.21082 5.97769 0.0983826 8.22069C-0.0327942 10.5324 -0.0327942 17.4613 0.0983826 19.7731C0.204573 22.0161 0.716788 24.0029 2.35962 25.6399C4.00245 27.2768 5.9826 27.7891 8.2251 27.9016C10.5363 28.0328 17.4637 28.0328 19.7749 27.9016C22.0174 27.7954 24.0038 27.2831 25.6404 25.6399C27.277 24.0029 27.7892 22.0161 27.9016 19.7731C28.0328 17.4613 28.0328 10.5387 27.9016 8.22693ZM24.9158 22.2535C24.4286 23.4781 23.4853 24.4215 22.2548 24.9151C20.412 25.6461 16.0395 25.4774 14.0031 25.4774C11.9668 25.4774 7.58795 25.6399 5.75148 24.9151C4.52716 24.4278 3.58394 23.4843 3.09046 22.2535C2.35962 20.4104 2.52828 16.0368 2.52828 14C2.52828 11.9632 2.36587 7.5834 3.09046 5.74651C3.57769 4.52192 4.52091 3.57849 5.75148 3.0849C7.5942 2.3539 11.9668 2.52259 14.0031 2.52259C16.0395 2.52259 20.4183 2.36015 22.2548 3.0849C23.4791 3.57224 24.4223 4.51568 24.9158 5.74651C25.6466 7.58965 25.478 11.9632 25.478 14C25.478 16.0368 25.6466 20.4166 24.9158 22.2535Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="#" class="text-gray-600 hover:text-cyan-500">
                    <svg width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.1219 5.73201C25.1397 5.98356 25.1397 6.23517 25.1397 6.48672C25.1397 14.1593 19.3656 23 8.81221 23C5.56092 23 2.54063 22.0476 0 20.3946C0.461947 20.4484 0.906066 20.4664 1.38579 20.4664C4.06849 20.4664 6.53808 19.55 8.51017 17.9867C5.98732 17.9328 3.87309 16.2617 3.14465 13.9617C3.50001 14.0156 3.85532 14.0515 4.22845 14.0515C4.74367 14.0515 5.25893 13.9796 5.7386 13.8539C3.10916 13.3148 1.13701 10.9789 1.13701 8.1578V8.08595C1.90095 8.51721 2.78935 8.78673 3.73091 8.82263C2.18521 7.78042 1.17256 6.00154 1.17256 3.98902C1.17256 2.91092 1.45677 1.92264 1.95427 1.06013C4.77916 4.582 9.02539 6.88196 13.7868 7.13357C13.698 6.70232 13.6446 6.25314 13.6446 5.80391C13.6446 2.60544 16.203 0 19.3832 0C21.0355 0 22.5279 0.700779 23.5761 1.83281C24.8731 1.58126 26.1167 1.09608 27.2183 0.431253C26.7918 1.77894 25.8858 2.91097 24.6954 3.62967C25.8503 3.50395 26.9696 3.18044 28 2.73127C27.2184 3.88122 26.2412 4.9054 25.1219 5.73201Z"
                            fill="currentColor" />
                    </svg>

                </a>
            </div>
        </div>
    </div>
    <div class="mb-8 md:mb-11 xl:mb-14 2xl:px-9 grid lg:grid-cols-4 gap-8 lg:gap-6">
        <div class="col-span-3">
            <h2 class="mb-3 text-base lg:text-xl font-semibold text-gray-900">Trailer</h2>
            @foreach ($tvshow['videos']->take(1) as $video)
            <div class="relative w-full overflow-hidden pt-[56.25%] rounded-xl">
                <iframe class="w-full absolute inset-0 h-full border-none" src="{{ $video['url'] }}"
                    title="{{ $video['name'] }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
    </div>

    <x-style url="{{ $tvshow['background'] }}" />
</x-admin-layout>
