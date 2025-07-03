{{-- resources/views/home-purple.blade.php --}}
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
            background: linear-gradient(to bottom, #6C55C8, rgb(255, 255, 255)); /* Start purple, end lighter gray/white */
        }

        /* Custom dark background for the icon row and upcoming events card */
        .bg-dark-card {
            background-color:#202020; /* A very dark, almost black-purple */
        }

        /* Custom CSS for the neon yellow text */
        .text-neon-yellow {
            color: #FFA706; /* A bright, almost gold-like yellow */
        }

        /* Custom CSS for the event image filter effect */
        .event-image-filter {
            position: relative;
            overflow: hidden; /* Ensure pseudo-element stays within bounds */
        }

        .event-image-filter img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%) brightness(75%) contrast(150%); /* Adjust to match the purple hue */
        }

        .event-image-filter::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(91, 0, 142, 0.4); /* Purple overlay with opacity */
            mix-blend-mode: multiply; /* Blends with the image, creating a tinted effect */
        }

        /* Adjusting for proper display of icons (heroicons vs image) */
        .icon-bg-purple {
            background-color: #6C55C8; /* Tailwind purple-500 */
        }
        .icon-bg-yellow {
            background-color: #FBBF24; /* Tailwind yellow-400 */
        }

        /* Apply Goldman font to the body (or specific elements) */
        body {
            font-family: 'Goldman';
        }

        /* If you want to override Tailwind's default font-sans, you can configure it in tailwind.config.js */
        /* For this example, setting it directly on body is sufficient. */
    </style>
</head>
<body class="text-white bg-gradient-univibe flex flex-col min-h-screen">

<div class="flex-grow max-w-md mx-auto relative z-10">

    {{-- Header --}}
    <div class="flex justify-between items-center px-6 pt-6 pb-4">
        <div class="text-white text-xl">UniVibe</div>
        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Profile" class="w-10 h-10 rounded-full border-2 border-white" />
    </div>

    {{-- Greeting and headline --}}
    <div class="px-6 mt-4 mb-8">
        <p class="text-white text-lg mb-2">Hey, <span class="text-yellow-400">Silvia</span></p>
        <h1 class="text-4xl leading-tight">
            Feel the <span class="text-yellow-400">Hype</span>.<br />
            Rule the Night<br />
            with <span class="text-yellow-400">UniVibe</span>
        </h1>
    </div>

    {{-- Wrapper for the content below the main headline, to have a different background --}}
    <div class="bg-dark-card rounded-t-3xl pt-8 pb-4 px-6 relative z-0 -mt-2">

        {{-- Icons row --}}
        <div class="flex justify-around py-4">
            <div class="flex flex-col items-center space-y-2 text-white text-sm">
                <div class="icon-bg-purple p-3 rounded-full flex items-center justify-center w-16 h-16 shadow-lg">
                    {{-- Running icon (heroicons outline) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span>Sports</span>
            </div>

            <div class="flex flex-col items-center space-y-2 text-white text-sm">
                <div class="icon-bg-yellow p-3 rounded-full flex items-center justify-center w-16 h-16 shadow-lg">
                    {{-- Lightbulb icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3a1 1 0 011 1v1a5 5 0 014 4.9v.1a1 1 0 01.9.99v3a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 01.9-.99V9a5 5 0 014-4v-1a1 1 0 011-1z" />
                    </svg>
                </div>
                <span>Creative</span>
            </div>

            <div class="flex flex-col items-center space-y-2 text-white text-sm">
                <div class="icon-bg-purple p-3 rounded-full flex items-center justify-center w-16 h-16 shadow-lg">
                    {{-- Party icon (confetti) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19l-5 2 2-5m11-7l5-2-2 5M9 5l5 14 5-2-8-12z" />
                    </svg>
                </div>
                <span>Parties</span>
            </div>

            <div class="flex flex-col items-center space-y-2 text-white text-sm">
                <div class="icon-bg-yellow p-3 rounded-full flex items-center justify-center w-16 h-16 shadow-lg">
                    {{-- Target icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <circle cx="12" cy="12" r="10" stroke-width="2" />
                      <circle cx="12" cy="12" r="6" stroke-width="2" />
                      <circle cx="12" cy="12" r="2" stroke-width="2" />
                    </svg>
                </div>
                <span>Contests</span>
            </div>
        </div>

        {{-- Search bar --}}
        <div class="px-0 mt-6 relative -mb-6 z-20">
            <div class="flex items-center bg-white rounded-full px-4 py-3 text-gray-700 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
                <input type="text" placeholder="Search event here..." class="ml-3 flex-grow bg-transparent focus:outline-none text-black text-base" />
            </div>
        </div>

    </div> {{-- End of bg-dark-card wrapper --}}


    {{-- Upcoming events section (also inside dark background area) --}}
    <div class="bg-dark-card px-6 pb-24 pt-8 rounded-b-3xl">
        <h2 class="text-white text-xl mb-4">Upcoming <span class="text-yellow-400">events</span></h2>

        {{-- Event Card --}}
        <div class="bg-dark-card rounded-2xl overflow-hidden shadow-lg border border-gray-800">
            <div class="relative event-image-filter h-48">
                <img src="/images/hacking-by-the-sea.jpg" alt="Hacking by the Sea" class="w-full h-full object-cover" />
                <div class="absolute top-4 right-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full">Contests</div>
            </div>
            <div class="p-4">
                <h3 class="text-white text-lg mb-1">Hacking by the Sea</h3>
                <p class="text-gray-300 text-sm">A student party app would help students find and organize social events, particularly parties, near their campus.</p>
            </div>
        </div>

        {{-- You can repeat the event card structure here for more events --}}

    </div> {{-- End of upcoming events section --}}

</div> {{-- End of max-w-md mx-auto container --}}


{{-- Bottom Navigation Bar (fixed) --}}
<nav class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-50">
    <button class="flex flex-col items-center text-purple-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7 13v-6h4v6m5-3v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m13 0H6" />
        </svg>
        <span class="text-xs">Home</span>
    </button>

    <button class="flex flex-col items-center text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V7a2 2 0 012-2h6m8 5v6a2 2 0 01-2 2h-6m-3 0v-6a2 2 0 012-2h6" />
        </svg>
        <span class="text-xs">Map</span>
    </button>

    <button class="flex flex-col items-center text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m6 3v-6a2 2 0 00-2-2h-6a2 2 0 00-2 2v6m6-6v6" />
        </svg>
        <span class="text-xs">Events</span>
    </button>

    <button class="flex flex-col items-center text-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <circle cx="12" cy="12" r="10" stroke-width="2" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span class="text-xs">Profile</span>
    </button>
</nav>

</body>
</html>