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

  {{-- Bottom Navigation Bar (fixed) --}}
  <x-navigation />

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
        name: 'Painting Jam',
        description: 'A chill night of freestyle painting with snacks and music.',
        category: 'Creative',
        id: 1
      },
      {
        coords: [3.5735, 51.4448],
        name: 'Hack by the Sea',
        description: '24h Hackathon by the Dutch coast. Food, swag, prizes!',
        category: 'Contest',
        id: 2
      },
      {
        coords: [3.5715, 51.4435],
        name: 'Campus Football Tournament',
        description: '8 teams, 1 trophy. Join or cheer!',
        category: 'Sports',
        id: 3
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

        const eventUrl = `/events/${event.id}`;

        popupDiv.innerHTML = `
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-800 font-sans">
              <div class="absolute top-4 right-4 bg-yellow-500 text-purple-900 text-xs px-3 py-1 rounded-full">${event.category}</div>
            <div class="p-4">
              <h3 class="text-univibe-purple text-lg mb-1">
                <a href="${eventUrl}">${event.name}</a> </h3>
              <p class="text-gray-700 text-sm">
                <a href="${eventUrl}">${event.description}</a> </p>
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