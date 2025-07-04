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
            <form method="GET" action="{{ url()->current() }}" class="mt-6 relative -mb-6 z-20">
                <div class="flex items-center bg-white rounded-full px-4 py-3 text-gray-700 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>
                    <input type="text" name="name" placeholder="Search event here..." value="{{ request('name') }}"
                        class="ml-3 flex-grow bg-transparent focus:outline-none text-black text-base" />
                </div>
            </form>

            <h3 class="text-white text-lg mb-1 mt-8">Filter events</h3>
            <form method="GET" action="{{ url()->current() }}" class="space-y-4 mb-6" id="filterForm">
                {{-- Category dropdown --}}
                <select name="category" class="w-full px-4 py-2 rounded-lg text-black" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}</option>
                    @endforeach
                </select>

                {{-- Address dropdown --}}
                <select name="address" class="w-full px-4 py-2 rounded-lg text-black" onchange="this.form.submit()">
                    <option value="">All Locations</option>
                    @foreach($addresses as $address)
                        <option value="{{ $address }}" {{ request('address') == $address ? 'selected' : '' }}>{{ $address }}
                        </option>
                    @endforeach
                </select>

                {{-- Vibe Score Range --}}
                <div class="flex gap-2">
                    <input type="number" name="vibe_min" value="{{ request('vibe_min') }}" min="0" max="100"
                        placeholder="Min Vibe" class="w-1/2 px-4 py-2 rounded-lg text-black" />
                    <input type="number" name="vibe_max" value="{{ request('vibe_max') }}" min="0" max="100"
                        placeholder="Max Vibe" class="w-1/2 px-4 py-2 rounded-lg text-black" />
                </div>

                {{-- Time/date picker --}}
                <input type="date" name="time" value="{{ request('time') }}"
                    class="w-full px-4 py-2 rounded-lg text-black" />

                {{-- Submit / Reset --}}
                <div class="flex justify-between items-center">
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg">Filter</button>
                    <a href="{{ url()->current() }}" class="text-sm text-orange-400 underline">Clear</a>
                </div>
            </form>

            {{-- Upcoming events section --}}
<div class="pt-2 space-y-6">
    @foreach($events as $event)
        <a href="{{ route('events.show', $event->id) }}" class="block">
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-800 font-sans relative">
                <div class="relative event-image-filter h-48">
                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}"
                        class="w-full h-full object-cover" />

                    <div class="absolute top-4 right-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full">
                        {{ ucfirst($event->category) }}
                    </div>
                </div>
                <div class="p-4 pb-10">
                    <h3 class="text-purple-900 text-lg mb-1">{{ $event->name }}</h3>
                    <p class="text-gray-700 text-sm">{{ $event->description }}</p>
                </div>
                <div class="absolute top-4 left-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full shadow flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.377 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118L10 14.347l-3.376 2.455c-.785.57-1.84-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.63 9.394c-.783-.57-.38-1.81.588-1.81h4.174a1 1 0 00.951-.69l1.286-3.967z" />
                    </svg>
                    {{ $event->vibe_score }}
                </div>
            </div>
        </a>
    @endforeach
</div>

        </div>
    </div>

    <div class="fixed bottom-24 right-4">
        <button
            class="bg-orange-400 text-white text-2xl w-12 h-12 rounded-full shadow-lg flex items-center justify-center hover:bg-orange-500">
            +
        </button>
    </div>

    <x-navigation />

    <script>
        const searchInput = document.querySelector('input[name="name"]');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                clearTimeout(window.searchDelay);
                window.searchDelay = setTimeout(() => {
                    searchInput.form.submit();
                }, 400); // delay so it doesn’t overload
            });
        }
    </script>

</body>

</html>