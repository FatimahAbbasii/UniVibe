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
    body {
      font-family: 'Goldman', cursive;
    }

    .bg-gradient-univibe {
      background: linear-gradient(to bottom, #6C55C8, #ffffff);
    }

    .fullscreen-map {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      z-index: 0;
      border: none;
    }

    .z-top {
    position: relative;
    z-index: 10;
    pointer-events: none;
    }

    .z-top nav, .z-top button, .z-top svg, .z-top span {
    pointer-events: auto;
    }

  </style>
</head>
<body class="text-white bg-gradient-univibe overflow-hidden">

    <div class="absolute top-4 left-4 z-20 text-white text-xl pointer-events-none">
        UniVibe
    </div>

  {{-- Fullscreen iframe background --}}
  <iframe
    src="https://api.maptiler.com/maps/0197d03b-5183-7600-a800-619d965b8886/?key=q9NfI5cOMSftXMPiqa73#18.0/51.44431/3.57283"
    allowfullscreen
    loading="lazy"
    class="fullscreen-map">
  </iframe>

  {{-- Foreground content --}}
  <div class="flex flex-col justify-between min-h-screen max-w-md mx-auto z-top">

    {{-- Bottom Navigation Bar --}}
    <nav class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-top">
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
  </div>

</body>
</html>

