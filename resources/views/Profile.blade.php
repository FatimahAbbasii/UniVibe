{{-- resources/views/home-purple.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>UniVibe - Profile</title>
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

<div class="flex-grow w-full relative z-10">

    {{-- Header --}}
    <div class="flex justify-between items-center px-6 pt-6 pb-4">
        <div class="text-white text-xl">UniVibe</div>
    </div>

  {{-- Wrapper for the content below the main headline, to have a different background --}}

<div class="flex-grow w-full relative z-10">
<div class="bg-dark-card rounded-t-3xl pt-8 px-6 pb-24 relative z-0 -mt-2 flex flex-col items-center flex-grow">

    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Profile" class="w-44 h-44 rounded-full object-cover shadow-md" />

    <h2 class="text-2xl font-semibold mt-4 text-white">Silvia Popova</h2>
    <p class="text-base text-gray-300 mt-1">Average rating</p>

    <div class="flex mt-2 text-yellow-400">
        @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6 mx-0.5">
                <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.782 1.401 8.168L12 18.897l-7.335 3.863 1.401-8.168L.132 9.21l8.2-1.192z"/>
            </svg>
        @endfor
    </div>

        {{-- USER INFO --}}
        <div class="mt-6 space-y-4">
            <div>
                <label class="text-[15px] text-white-400">Username</label>
                <div class="flex items-center bg-white rounded-full px-5 py-2.5 text-gray-700 shadow-md w-full mt-1">
    <input
        type="text"
        value="SilviA"
        class="ml-2 flex-grow bg-transparent focus:outline-none text-black text-base"
    />
    <a href="#" class="text-purple-500 text-[15px]">Edit</a>
</div>

            </div>
            <div>
                <label class="text-[15px] text-white-400">Email</label>
                <div class="bg-white text-black rounded-full px-5 py-2.5 flex justify-between items-center mt-1">
                    <span>SilviA@gmail.com</span>
                    <a href="#" class="text-purple-500 text-[15px]">Edit</a>
                </div>
            </div>
            <div>
                <label class="text-[15px] text-white-400">Password</label>
                <div class="bg-white text-black rounded-full px-5 py-2.5 flex justify-between items-center mt-1">
                    <span>••••••••••</span>
                    <a href="#" class="text-purple-500 text-[15px]">Change password</a>
                </div>
            </div>
        </div>

        {{-- BADGES --}}
        <div class="mt-6">
            <p class="text-[20px] text-center mb-2">Badges</p>
            <div class="flex justify-center space-x-3">
                <img src="{{ asset('images/badge-red.png') }}" class="w-14 h-16">
                <img src="{{ asset('images/badge-blue.png') }}" class="w-14 h-16">
                <img src="{{ asset('images/badge-orange.png') }}" class="w-14 h-16">
            </div>
            <p class="text-center text-[15px] text-white-400 mt-2">show more</p>
        </div>

</div> {{-- End of max-w-md mx-auto container --}}


{{-- Bottom Navigation Bar (fixed) --}}
<nav class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-50">
    <a href="/" class="flex flex-col items-center {{ request()->is('/') ? 'text-purple-700' : 'text-gray-500' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7 13v-6h4v6m5-3v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m13 0H6" />
        </svg>
        <span class="text-xs">Home</span>
    </a>

    <a href="/map" class="flex flex-col items-center {{ request()->is('map') ? 'text-purple-700' : 'text-gray-500' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V7a2 2 0 012-2h6m8 5v6a2 2 0 01-2 2h-6m-3 0v-6a2 2 0 012-2h6" />
        </svg>
        <span class="text-xs">Map</span>
    </a>

    <a href="/events" class="flex flex-col items-center {{ request()->is('events') ? 'text-purple-700' : 'text-gray-500' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m6 3v-6a2 2 0 00-2-2h-6a2 2 0 00-2 2v6m6-6v6" />
        </svg>
        <span class="text-xs">Events</span>
    </a>

    <a href="/profile" class="flex flex-col items-center {{ request()->is('profile') ? 'text-purple-700' : 'text-gray-500' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <circle cx="12" cy="12" r="10" stroke-width="2" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span class="text-xs">Profile</span>
    </a>
</nav>

</body>
</html>
