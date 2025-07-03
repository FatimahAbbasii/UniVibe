<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UniVibe - Activities</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Import Goldman font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
    <div class="max-w-md mx-auto px-6">
            {{-- Search bar --}}
                <div class="mt-6 relative -mb-6 z-20">
                    <div class="flex items-center bg-white rounded-full px-4 py-3 text-gray-700 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <input type="text" placeholder="Search event here..."
                            class="ml-3 flex-grow bg-transparent focus:outline-none text-black text-base" />
                    </div>
                </div>

        <form method="GET" action="{{ url()->current() }}" class="space-y-4" id="filterForm">

    {{-- Category Dropdown --}}
    <div class="mt-8">
        <label for="category" class="text-sm text-white block mb-1">Category</label>
        <select name="category" id="category" class="w-full px-4 py-2 rounded-lg text-black" onchange="document.getElementById('filterForm').submit();">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Date Dropdown --}}
    <div>
        <label for="date" class="text-sm text-white block mb-1">Date</label>
        <select name="date" id="date" class="w-full px-4 py-2 rounded-lg text-black" onchange="document.getElementById('filterForm').submit();">
            <option value="">All Dates</option>
            @foreach($dates as $date)
                <option value="{{ $date }}" {{ request('date') === $date ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::parse($date)->format('M j') }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Clear Button --}}
    @if(request()->hasAny(['category', 'location', 'date']))
        <div class="mt-2">
            <a href="{{ url()->current() }}" class="text-sm text-orange-400 underline">Clear filters</a>
        </div>
    @endif
</form>


        {{-- Upcoming events section --}}
        <div class="pt-2 space-y-6">
            @foreach($events as $event)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-800 font-sans">
                <div class="relative event-image-filter h-48">
                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="w-full h-full object-cover" />
                    <div class="absolute top-4 right-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full">
                        {{ ucfirst($event->category) }}
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="text-purple-900 text-lg mb-1">{{ $event->name }}</h3>
                    <p class="text-gray-700 text-sm">{{ $event->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    <div class="fixed bottom-24 right-4">
        <button class="bg-orange-400 text-white text-2xl w-12 h-12 rounded-full shadow-lg flex items-center justify-center hover:bg-orange-500">
            +
        </button>
    </div>

    <nav
        class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-50">
        {{-- Home Icon --}}
        <button class="flex flex-col items-center text-gray-500">
            <img src="{{ asset('home.png') }}" alt="Home Icon" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Home</span>
        </button>

        {{-- Map Icon --}}
        <button class="flex flex-col items-center text-gray-500">
            <img src="{{ asset('map.png') }}" alt="Map Icon" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Map</span>
        </button>

        {{-- Events Icon --}}
        <button class="flex flex-col items-center text-purple-700">
            <img src="{{ asset('event.png') }}" alt="Events Icon" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Events</span>
        </button>

        {{-- Profile Icon --}}
        <button class="flex flex-col items-center text-gray-500">
            <img src="{{ asset('profile.png') }}" alt="Profile Icon" class="h-6 w-6 mb-1 object-contain">
            <span class="text-xs">Profile</span>
        </button>
    </nav>
</body>

</html>
