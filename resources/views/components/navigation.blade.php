<nav class="fixed bottom-0 left-0 right-0 w-full bg-white p-4 shadow-2xl flex justify-around items-center rounded-t-3xl max-w-md mx-auto z-50">

    {{-- Home Icon --}}
    <a href="{{ route('home') }}" class="flex flex-col items-center {{ request()->routeIs('home') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('home.png') }}" alt="Home Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Home</span>
    </a>

    {{-- Map Icon --}}
    <a href="{{ route('map') }}" class="flex flex-col items-center {{ request()->routeIs('map') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('map.png') }}" alt="Map Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Map</span>
    </a>

    {{-- Events Icon --}}
    <a href="{{ route('events.index') }}" class="flex flex-col items-center {{ request()->routeIs('events.*') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('event.png') }}" alt="Events Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Events</span>
    </a>

    {{-- Profile Icon --}}
    <a href="{{ route('profile.edit') }}" class="flex flex-col items-center {{ request()->routeIs('profile.edit') ? 'text-purple-700' : 'text-gray-500' }}">
        <img src="{{ asset('profile.png') }}" alt="Profile Icon" class="h-6 w-6 mb-1 object-contain">
        <span class="text-xs">Profile</span>
    </a>

</nav>
