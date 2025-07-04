<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UniVibe - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Import Goldman font from Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Custom CSS for the main background gradient (Purple to Light Gray/White) */
        .bg-gradient-univibe {
            background: linear-gradient(to bottom, #6C55C8, rgb(255, 255, 255));
            /* Start purple, end lighter gray/white */
        }

        /* Custom dark background for the icon row and upcoming events card */
        .bg-dark-card {
            background-color: #202020;
            /* A very dark, almost black-purple */
        }

        /* Custom CSS for the neon yellow text */
        .text-neon-yellow {
            color: #FFA706;
            /* A bright, almost gold-like yellow */
        }

        /* Custom CSS for the event image filter effect */
        .event-image-filter {
            position: relative;
            overflow: hidden;
            /* Ensure pseudo-element stays within bounds */
        }

        .event-image-filter img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* REMOVED: filter: grayscale(100%) brightness(75%) contrast(150%); */
            /* The above filter was making the image look gray/desaturated */
        }

        .event-image-filter::after {
            /* REMOVED entire ::after block to remove purple overlay */
            /*
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(91, 0, 142, 0.4);
            mix-blend-mode: multiply;
            */
        }

        /* Adjusting for proper display of icons (heroicons vs image) */
        .icon-bg-purple {
            background-color: #6C55C8;
            /* Tailwind purple-500 */
        }

        .icon-bg-yellow {
            background-color: #FFA706;
            /* Tailwind yellow-400 */
        }

        /* Custom text color for UniVibe elements (matches icon-bg-purple) */
        .text-univibe-purple {
            color: #6C55C8;
        }

        /* Apply Goldman font to the body (or specific elements) */
        body {
            font-family: 'Goldman', sans-serif;
        }
    </style>
</head>

<body class="text-white bg-gradient-univibe flex flex-col min-h-screen">

    {{-- This div contains the header and greeting that sit on the gradient background --}}
    <div class="max-w-md mr-auto ml-2 relative z-10 flex-shrink-0 px-6">
        {{-- Header --}}
        <div class="flex justify-between items-center pt-6 pb-4"> {{-- Removed px-6 from here --}}
            <div class="text-white text-xl">UniVibe</div>
            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Profile"
                class="w-10 h-10 rounded-full border-2 border-white" />
        </div>

        {{-- Greeting and headline --}}
        <div class="mt-4 mb-8"> {{-- Removed px-6 from here --}}
            <p class="text-white text-lg mb-2">Hey, <span class="text-yellow-400">Silvia</span></p>
            <h1 class="text-4xl leading-tight">
                Feel the <span class="text-yellow-400">Hype</span>.<br />
                Rule the Night<br />
                with <span class="text-yellow-400">UniVibe</span>
            </h1>
        </div>
    </div>

    {{-- Main content area with dark background, flex-grow, and rounding. --}}
    <div class="bg-dark-card flex-grow -mt-2 overflow-hidden rounded-t-3xl rounded-b-3xl pb-24">
        {{-- Inner wrapper for horizontally centering content within the dark background --}}
        <div class="max-w-md mx-auto px-6">

            {{-- Icons row section --}}
            <div class="pt-4 pb-4 relative z-0"> {{-- Removed px-6 from here --}}
                {{-- Changed justify-around to justify-between for tighter edge alignment --}}
                <div class="flex justify-between py-4 space-x-2">
                    <a href="{{ route('events.index', ['category' => 'Sports']) }}"
                        class="flex flex-col items-center space-y-1 text-white text-xs">
                        <div
                            class="icon-bg-purple p-3 rounded-full flex items-center justify-center w-14 h-14 shadow-lg">
                            <img src="{{ asset('sports.png') }}" alt="Sports Icon" class="h-7 w-7 object-contain">
                        </div>
                        <span>Sports</span>
                    </a>

                    <a href="{{ route('events.index', ['category' => 'Creative']) }}"
                        class="flex flex-col items-center space-y-1 text-white text-xs">
                        <div
                            class="icon-bg-yellow p-3 rounded-full flex items-center justify-center w-14 h-14 shadow-lg">
                            <img src="{{ asset('creativity.png') }}" alt="Creative Icon" class="h-7 w-7 object-contain">
                        </div>
                        <span>Creative</span>
                    </a>

                    <a href="{{ route('events.index', ['category' => 'Parties']) }}"
                        class="flex flex-col items-center space-y-1 text-white text-xs">
                        <div
                            class="icon-bg-purple p-3 rounded-full flex items-center justify-center w-14 h-14 shadow-lg">
                            <img src="{{ asset('parties.png') }}" alt="Parties Icon" class="h-7 w-7 object-contain">
                        </div>
                        <span>Parties</span>
                    </a>

                    <a href="{{ route('events.index', ['category' => 'Contests']) }}"
                        class="flex flex-col items-center space-y-1 text-white text-xs">
                        <div
                            class="icon-bg-yellow p-3 rounded-full flex items-center justify-center w-14 h-14 shadow-lg">
                            <img src="{{ asset('trophy.png') }}" alt="Contests Icon" class="h-7 w-7 object-contain">
                        </div>
                        <span>Contests</span>
                    </a>
                </div>

                {{-- Search bar --}}
                <form method="GET" action="{{ route('events.index') }}" class="mt-6 relative -mb-6 z-20">
                    <div class="flex items-center bg-white rounded-full px-4 py-3 text-gray-700 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <input type="text" name="search" placeholder="Search event here..."
                            class="ml-3 flex-grow bg-transparent focus:outline-none text-black text-base" />
                        <button type="submit" class="hidden"></button>
                    </div>
                </form>
            </div>

            {{-- Upcoming events section --}}
            @if ($latestEvent)
                <div class="pt-8">
                    <h2 class="text-white text-xl mb-4">Upcoming <span class="text-yellow-400">event</span></h2>
                    <!-- Vibe Score top-left -->
                    <div
                        class="absolute top-4 left-4 bg-white text-purple-800 text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                        Vibe Score: {{ $latestEvent->vibe_score ?? 'N/A' }}
                    </div>
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-800">
                        <div class="relative event-image-filter h-48">
                            <img src="{{ asset($latestEvent->image) }}" alt="{{ $latestEvent->name }}"
                                class="w-full h-full object-cover rounded-b-none rounded-t-2xl" />

                            <!-- Gradient overlay -->
                            <div class="absolute inset-0 bg-purple-800 mix-blend-color opacity-80"></div>

                            <div
                                class="absolute top-4 right-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full">
                                {{ ucfirst($latestEvent->category) }}
                            </div>
                            <!-- Vibe Score top-left -->
                            <div
                                class="absolute top-4 left-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full shadow flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500 mr-1"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.377 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118L10 14.347l-3.376 2.455c-.785.57-1.84-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.63 9.394c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 00.951-.69l1.286-3.967z" />
                                </svg>
                                {{ $latestEvent->vibe_score }}
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-univibe-purple text-lg mb-1">{{ $latestEvent->name }}</h3>
                            <p class="text-gray-700 text-sm font-sans">{{ $latestEvent->description }}</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endif
        </div>
    </div>

    {{-- Bottom Navigation Bar (fixed) --}}
    <x-navigation />
</body>

</html>