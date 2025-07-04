<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>UniVibe - Map</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Goldman', cursive;
    }

    .bg-gradient-univibe {
      background: linear-gradient(to bottom, #6C55C8, #ffffff);
    }

    #map {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      z-index: 0;
    }

    .z-top {
      position: relative;
      z-index: 10;
    }

    .title {
      position: fixed;
      top: 1rem;
      left: 1rem;
      color: white;
      font-size: 1.25rem;
      font-weight: 700;
      z-index: 15;
      user-select: none;
    }

    nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      max-width: 24rem;
      margin: 0 auto;
      background: white;
      padding: 1rem;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
      border-top-left-radius: 1.5rem;
      border-top-right-radius: 1.5rem;
      display: flex;
      justify-content: space-around;
      align-items: center;
      z-index: 15;
    }

    nav button {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #6c55c8;
      font-size: 0.75rem;
      border: none;
      background: none;
      cursor: pointer;
    }

    nav button.inactive {
      color: #a3a3a3;
    }

    /* Bottom popup styling */
    #bottom-popup {
      display: none;
      position: fixed;
      bottom: 7rem;
      left: 50%;
      transform: translateX(-50%);
      width: 95vw;
      background: transparent;
      z-index: 20;
    }

    .text-univibe-purple {
            color: #6C55C8;
        }
  </style>
</head>
<body class="text-white bg-gradient-univibe overflow-hidden">
  <div class="title">UniVibe</div>
  <div id="map"></div>

  <nav>
    <button>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-7 13v-6h4v6m5-3v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m13 0H6" />
      </svg>
      Home
    </button>
    <button class="inactive">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V7a2 2 0 012-2h6m8 5v6a2 2 0 01-2 2h-6m-3 0v-6a2 2 0 012-2h6" />
      </svg>
      Map
    </button>
    <button class="inactive">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-3-3v6m6 3v-6a2 2 0 00-2-2h-6a2 2 0 00-2 2v6m6-6v6" />
      </svg>
      Events
    </button>
    <button class="inactive">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <circle cx="12" cy="12" r="10" stroke-width="2" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
      Profile
    </button>
  </nav>

  <div id="bottom-popup"></div>

  <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>
  <script>
    const map = new maplibregl.Map({
      container: 'map',
      style: 'https://api.maptiler.com/maps/0197d03b-5183-7600-a800-619d965b8886/style.json?key=q9NfI5cOMSftXMPiqa73',
      center: [3.57283, 51.44431],
      zoom: 18,
      pitch: 60,
      bearing: -20,
    });

    map.dragRotate.enable();
    map.touchZoomRotate.enableRotation();

    const events = [
      {
        coords: [3.57283, 51.44431],
        name: 'Hack by the Sea',
        description: '24h Hackathon by the Dutch coast. Food, swag, prizes!',
        category: 'Contests',
      },
      {
        coords: [3.5735, 51.4448],
        name: 'Silent Disco Night',
        description: 'Wireless headphones, 3 DJs, 1 vibe.',
        category: 'Parties',
      },
      {
        coords: [3.5715, 51.4435],
        name: 'Open Mic Night',
        description: 'Poetry, comedy, music – the stage is yours.',
        category: 'Creative',
      }
    ];

    const popupDiv = document.getElementById('bottom-popup');
    const markers = [];
    let activeMarker = null;

    events.forEach((event) => {
      const el = document.createElement('div');
      el.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24" fill="#6C55C8" >
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38
            0-2.5-1.12-2.5-2.5s1.12-2.5
            2.5-2.5 2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z"/>
        </svg>
      `;
      el.style.cursor = 'pointer';

      const marker = new maplibregl.Marker({ element: el })
        .setLngLat(event.coords)
        .addTo(map);

      el.addEventListener("click", () => {
        if (activeMarker === marker) {
          popupDiv.style.display = "none";
          const svg = el.querySelector('svg');
          if (svg) svg.setAttribute('fill', '#6C55C8');
          activeMarker = null;
          return;
        }

        markers.forEach(m => {
          const svg = m.getElement().querySelector('svg');
          if (svg) svg.setAttribute('fill', '#6C55C8');
        });

        const svg = el.querySelector('svg');
        if (svg) svg.setAttribute('fill', '#f8b11e');

        popupDiv.innerHTML = `
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-800 font-sans">
              <div class="absolute top-4 right-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full">${event.category}</div>
            <div class="p-4">
              <h3 class="text-univibe-purple text-lg mb-1">${event.name}</h3>
              <p class="text-gray-700 text-sm">${event.description}</p>
            </div>
          </div>
        `;
        popupDiv.style.display = "block";

        activeMarker = marker;
      });
      markers.push(marker);
    });
  </script>
</body>
</html>
