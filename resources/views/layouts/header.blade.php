{{-- top nav --}}
<div class="top-nav bg-white h-[120px] px-6 py-4">
    <div class="w-full flex mb-2 justify-between">
        <h1 class="text-xl font-bold">@yield('topNavTitle', __('messages.dashboard'))</h1>

        <div class="relative border-gray-100 border-[2px] p-2">
            <a href="#" class="flex gap-2 align-middle" id="languageTrigger">
                <img src="{{ asset(app()->getLocale() == 'en' ? 'en.svg' : 'jp.svg') }}"
                    alt="{{ app()->getLocale() == 'en' ? 'english' : 'japanese' }}" class="w-[16px]">
                {{ app()->getLocale() == 'en' ? 'English' : '日本' }}
                <img src="{{ asset('down.svg') }}" alt="down" class="w-[16px] mt-[2px]">
            </a>

            <div id="languageSelect" class="absolute flex flex-col bg-white shadow-lg p-2 w-full left-0 mt-3 gap-2"
                style="display: none;">
                <a href="{{ route('lang', 'en') }}" class="flex gap-2 align-middle">
                    <img src="{{ asset('en.svg') }}" alt="english" class="w-[16px]">
                    English
                </a>
                <hr>
                <a href="{{ route('lang', 'jp') }}" class="flex gap-2 align-middle">
                    <img src="{{ asset('jp.svg') }}" alt="japan" class="w-[16px]">
                    日本
                </a>
            </div>
        </div>

    </div>

    <hr>

    @php
        $segments = Request::segments();
        // print_r($segments);
        $url = '';
    @endphp

    <nav class="flex mt-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    {{-- home icon --}}
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    {{ __('messages.home') }}
                </a>
            </li>

            @foreach ($segments as $segment)
                @php $url .= '/' . $segment @endphp
                @if (!$loop->last)
                    <li aria-current="page">
                        <div class="flex items-center">
                            <a href="{{ $url }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>

                                @if (Lang::has("messages.$segment"))
                                    {{ __("messages.$segment") }}
                                @else
                                    {{ $segment }}
                                @endif
                            </a>
                        </div>
                    </li>
                @else
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-medium text-gray-500  dark:text-gray-400">
                                {{-- case: messages.5 on /invoice/transaction/5 hence checking Lang::has --}}
                                @if (Lang::has("messages.$segment"))
                                    {{ __("messages.$segment") }}
                                @else
                                    {{ $segment }}
                                @endif
                            </span>
                        </div>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>

</div>
