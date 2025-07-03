<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>UniVibe - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <link
    href="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.css"
    rel="stylesheet"
  />
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

    /* Popup styling */
    .popup-content {
      max-width: 300px;
      font-family: Arial, sans-serif;
      color: black;
      display: flex;
      gap: 12px;
    }

    .popup-text {
      flex: 1;
    }

    .popup-text h3 {
      margin: 0 0 0.4em 0;
      font-weight: 700;
      font-size: 1.1rem;
      color: #4b3ca7; /* Dark purple */
    }

    .popup-text p {
      margin: 0.15em 0;
      font-size: 0.9rem;
      line-height: 1.2;
    }

    .popup-text .label {
      font-weight: 600;
      color: #6c55c8;
    }

    .popup-image {
      width: 110px;
      height: 80px;
      border-radius: 8px;
      object-fit: cover;
      flex-shrink: 0;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      border: 2px solid #6c55c8;
    }
  </style>
</head>
<body class="text-white bg-gradient-univibe overflow-hidden">

  <div class="title">UniVibe</div>

  <div id="map"></div>

  <nav>
    <button>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 mb-1"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M3 12l2-2m0 0l7-7 7 7m-7 13v-6h4v6m5-3v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m13 0H6"
        />
      </svg>
      Home
    </button>
    <button class="inactive">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 mb-1"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 20l-5.447-2.724A2 2 0 013 15.382V7a2 2 0 012-2h6m8 5v6a2 2 0 01-2 2h-6m-3 0v-6a2 2 0 012-2h6"
        />
      </svg>
      Map
    </button>
    <button class="inactive">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 mb-1"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 12h6m-3-3v6m6 3v-6a2 2 0 00-2-2h-6a2 2 0 00-2 2v6m6-6v6"
        />
      </svg>
      Events
    </button>
    <button class="inactive">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 mb-1"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <circle cx="12" cy="12" r="10" stroke-width="2" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
      </svg>
      Profile
    </button>
  </nav>

  <script src="https://unpkg.com/maplibre-gl@2.4.0/dist/maplibre-gl.js"></script>
  <script>
    function formatDate(date) {
      const options = { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' };
      return new Date(date).toLocaleDateString(undefined, options);
    }

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
        name: 'Table Tennis Knockout',
        description: 'Winner takes all!',
        category: 'Sports',
        image: 'UniVibe/public/images/ping.jpg',
        organizer: 'Sports Committee',
        vibe_score: 72,
        address: 'Gym Basement',
        time: new Date(new Date().getTime() + 4 * 24 * 60 * 60 * 1000).setHours(12, 0, 0, 0),
      },
      {
        coords: [3.5735, 51.4448],
        name: 'Jazz Night',
        description: 'Smooth tunes all evening long.',
        category: 'Music',
        image: '{{ asset('images/ping.jpg') }}',
        organizer: 'Music Society',
        vibe_score: 85,
        address: 'Auditorium',
        time: new Date(new Date().getTime() + 7 * 24 * 60 * 60 * 1000).setHours(20, 0, 0, 0),
      },
      {
        coords: [3.5715, 51.4435],
        name: 'Art Exhibition',
        description: 'Explore modern art pieces.',
        category: 'Art',
        image: '{{ asset('images/ping.jpg') }}',
        organizer: 'Art Club',
        vibe_score: 78,
        address: 'Gallery Hall',
        time: new Date(new Date().getTime() + 2 * 24 * 60 * 60 * 1000).setHours(15, 30, 0, 0),
      }
    ];

    events.forEach((event) => {
      const popupHTML = `
        <div class="popup-content">
          <div class="popup-text">
            <h3>${event.name}</h3>
            <p><span class="label">Description:</span> ${event.description}</p>
            <p><span class="label">Category:</span> ${event.category}</p>
            <p><span class="label">Organizer:</span> ${event.organizer}</p>
            <p><span class="label">Vibe Score:</span> ${event.vibe_score}</p>
            <p><span class="label">Address:</span> ${event.address}</p>
            <p><span class="label">Time:</span> ${formatDate(event.time)}</p>
          </div>
          <img class="popup-image" src="${event.image}" alt="${event.name} Image" />
        </div>
      `;

      const popup = new maplibregl.Popup({ offset: 25 }).setHTML(popupHTML);

      new maplibregl.Marker({ color: '#6C55C8' })
        .setLngLat(event.coords)
        .setPopup(popup)
        .addTo(map);
    });
  </script>
</body>
</html>
