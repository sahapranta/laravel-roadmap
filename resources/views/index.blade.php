<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('roadmap.meta_title') }}</title>
    <meta name="description" content="{{ config('roadmap.meta_description') }}">
    @if (config('roadmap.noindex', false))
        <meta name="robots" content="noindex,nofollow">
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.7/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            // theme: {
            //     extend: {
            //         colors: {
            //             clifford: '#da373d',
            //         }
            //     }
            // }
        }
    </script>
</head>

<body class="w-full h-auto min-h-screen bg-gray-100 dark:bg-gray-600 overflow-y-auto relative" x-data="{ darkMode: false }"
    x-init="if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        localStorage.setItem('darkMode', JSON.stringify(true));        
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    if (this.switchOn) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">
    <div class="max-w-screen-md md:mx-auto md:pt-10">
        {{-- Top Area --}}
        <div class="flex bg-white shadow-md p-2 md:mb-3 md:rounded-lg">
            <a href="https://www.rowy.io/?utm_source=roadmap">
                <div class="flex flex-col justify-start select-none rounded-lg px-4 py-1">
                    <span class="text-2xl font-bold">{{ config('roadmap.title', 'Laravel Roadmap') }}</span>
                </div>
            </a>
            <div class="ml-auto flex" x-cloak>
                <div class="tooltip tooltip-top p-0 flex items-center text-sm" data-tip="Theme">
                    <div class="me-4">
                        <button type="button" x-bind:class="darkMode ? 'bg-indigo-500' : 'bg-gray-200'"
                            x-on:click="darkMode = !darkMode"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            role="switch" aria-checked="false">
                            <span class="sr-only">Dark mode toggle</span>
                            <span x-bind:class="darkMode ? 'translate-x-5 bg-gray-700' : 'translate-x-0 bg-white'"
                                class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full shadow ring-0 transition duration-200 ease-in-out">
                                <span
                                    x-bind:class="darkMode ? 'opacity-0 ease-out duration-100' : 'opacity-100 ease-in duration-200'"
                                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                                    </svg>
                                </span>
                                <span
                                    x-bind:class="darkMode ? 'opacity-100 ease-in duration-200' : 'opacity-0 ease-out duration-100'"
                                    class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity"
                                    aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        </button>
                    </div>

                </div>
                @if (Route::has('login'))
                    <button class="">
                        <a href="{{ route('login') }}"
                            class="px-3 py-1.5 cursor-pointer rounded-md bg-slate-100 hover:bg-slate-200">Login</a>
                    </button>
                @endif
            </div>
        </div>

        {{-- Main Area --}}
        <div class="w-full h-full bg-white rounded-lg shadow-md">
            <div
                class="flex justify-between items-center px-4 pt-4 pb-2 border-b-2 border-b-gray-100 rounded-b-none md:rounded-lg md:rounded-b-none">
                <div class="flex text-base text-gray-600">
                    <button
                        class="border-b-2 border-green-500 px-2.5 py-1 cursor-pointer hover:bg-green-100">All</button>
                    @foreach (config('roadmap.types') as $type)
                        <button class="px-2.5 py-1 cursor-pointer hover:bg-slate-100">{{ $type }}</button>
                    @endforeach
                </div>
                <div class="flex items-center">
                    <button class="px-2.5 py-1 cursor-pointer hover:bg-slate-100 text-base text-gray-600">Most
                        Voted</button>
                </div>
            </div>
            <div class="w-full px-4">
                @foreach ($features as $feature)
                    <div
                        class="w-full overflow-hidden border-b-2 border-b-base-200 px-2 py-4 hover:bg-base-200 gap-1 md:gap-2 justify-between flex flex-col">

                        <div class="divider divider-horizontal m-0"></div>
                        <div class="w-full overflow-hidden gap-1 md:gap-2 flex flex-col md:flex-row justify-between">
                            <div class="text-xl leading-7 flex items-center gap-4">
                                <div class="inline-flex my-2 font-semibold text-lg leading-6">
                                    {{ $feature->name }}
                                </div>
                                <div class="inline-flex text-xs px-2 py-1 bg-amber-600 text-white rounded-full">
                                    {{ Str::of($feature->type)->replace('_', ' ')->title() }}
                                </div>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates pariatur corporis
                            quisquam accusantium voluptas quae, rerum unde. Dolor, quos vitae fugiat officia aut
                            libero, accusantium commodi harum consequatur culpa provident.
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="fixed bottom-4 right-4 md:bottom-8 md:right-8 flex flex-col items-end">
        <button data-feedbackfin-button class="flex items-center bg-blue-500 rounded-full px-6 h-12 text-white group">
            Send feedback
        </button>
    </div>
</body>

</html>
