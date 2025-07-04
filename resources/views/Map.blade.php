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
    <x-navigation />

  </div>

</body>
</html>
