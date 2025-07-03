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
    <div class="bg-gradient-to-b from-purple-700 to-black min-h-screen text-white p-4">
    {{-- Topbar --}}
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-3xl font-bold">Activities</h1>
        <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10 border-2 border-white">
    </div>

    {{-- Search Bar --}}
    <input type="text" placeholder="Search event here..." class="w-full px-4 py-2 rounded-lg text-black mb-4" />

    {{-- Filters --}}
    <div class="flex flex-wrap gap-2 mb-6">
        @foreach(['Category', 'Age', 'Location', 'Fee', 'Date'] as $filter)
            <button class="bg-purple-500 hover:bg-purple-600 px-3 py-1 rounded-full text-sm">{{ $filter }}</button>
        @endforeach
    </div>

    {{-- Events --}}
    <div class="space-y-4">
        @foreach($events as $event)
        <div class="bg-white text-black rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->name }}" class="w-full h-40 object-cover">
            <div class="p-4">
                <span class="bg-orange-500 text-white text-xs px-2 py-1 rounded-full mb-2 inline-block">
                    {{ ucfirst($event->category) }}
                </span>
                <h2 class="text-xl font-semibold text-purple-700">{{ $event->name }}</h2>
                <p class="text-sm mt-1">{{ $event->description }}</p>
                <div class="flex items-center justify-between text-sm text-gray-600 mt-2">
                    <span>📍 {{ $event->address }}</span>
                    <span>🕒 {{ \Carbon\Carbon::parse($event->time)->format('jS M, H:i') }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>

</html>
