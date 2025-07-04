<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $event->name }} - UniVibe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .bg-gradient-univibe {
            background: linear-gradient(to bottom, #6C55C8, rgb(255, 255, 255));
        }

        .bg-dark-card {
            background-color: #202020;
        }

        .text-neon-yellow {
            color: #FFA706;
        }

        .icon-bg-purple {
            background-color: #6C55C8;
        }

        .icon-bg-yellow {
            background-color: #FFA706;
        }

        .text-univibe-purple {
            color: #6C55C8;
        }

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
                class="w-10 h-10 rounded-full border-2 border-white r-0" />
        </div>

        {{-- Greeting and headline --}}
        <div class="mt-4 mb-4"> {{-- Removed px-6 from here --}}
            <h1 class="text-4xl leading-tight"> Events </h1>
        </div>
    </div>

    {{-- Main content area --}}
    <div class="bg-dark-card flex-grow -mt-2 overflow-hidden rounded-t-3xl rounded-b-3xl pb-24">
    <div class="max-w-md mx-auto ">
        <img src="{{ asset($event->image) }}"
     alt="{{ $event->name }}"
     class="w-full h-48 object-cover rounded-t-3xl mb-2" />
        <div class="absolute top-36 right-8 bg-yellow-400 text-purple-800 text-xs font-bold px-3 py-1 rounded-full">
            {{ ucfirst($event->category) }}
        </div>

        {{-- Content --}}
    <div class="p-2 pt-2 space-y-4 px-6">
        <h2 class="text-3xl text-neon-yellow font-bold leading-snug">{{ $event->name }}</h2>
        <div class="flex items-center text-sm space-x-2">
            <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-6 h-6 rounded-full">
            <span class="text-white font-sans">by <strong>{{ $event->organizer }}</strong></span>
            <span class="text-yellow-400">4.3 ★★★★☆</span>
        </div>

        <p class="text-gray-200 text-sm leading-relaxed font-sans">{{ $event->description }}</p>

        <div>
            <h3 class="uppercase text-univibe-purple text-xs font-bold">Location</h3>
            <p class="text-sm font-sans">{{ $event->address }}</p>
        </div>

        <div>
            <h3 class="uppercase text-univibe-purple text-xs font-bold">Time & date</h3>
            <p class="text-sm font-sans">{{ \Carbon\Carbon::parse($event->time)->format('jS M, H:i') }}</p>
        </div>

        <a href="{{ url('music/' . Str::slug($event->name)) }}">
            <button class="bg-neon-yellow text-purple-800 font-bold px-6 py-2 rounded-full hover:bg-yellow-500 transition-colors duration-300">
                Pick music for the event
            </button>
        </a>

        <div class="text-center mt-6">
            <p class="mb-2">Are you coming?</p>
            <div class="flex justify-around text-sm font-semibold">
                <button class="px-4 py-2 border rounded-full">Yes</button>
                <button class="px-4 py-2 border rounded-full">Maybe</button>
                <button class="px-4 py-2 border rounded-full">No</button>
            </div>
        </div>

        <div class="flex items-center mt-6">
            <img src="https://randomuser.me/api/portraits/men/45.jpg" class="w-8 h-8 rounded-full border-2 border-white">
            <img src="https://randomuser.me/api/portraits/women/66.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-3">
            <img src="https://randomuser.me/api/portraits/men/78.jpg" class="w-8 h-8 rounded-full border-2 border-white -ml-3">
            <span class="text-xs ml-3 font-sans">Dragan, Petkan, Kiro and others are coming to this event</span>
        </div>
    </div>
    </div>
    </div>

    {{-- Bottom Nav --}}
    <x-navigation />
</body>

</html>
