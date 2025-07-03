<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-b from-purple-500 to-purple-700 flex flex-col items-center justify-center px-4">
        
        <!-- App Title -->
        <h1 class="text-white text-4xl font-bold mb-8">UniVibe</h1>

        <!-- Login Form Card -->
        <div class="w-full max-w-md bg-white text-black rounded-2xl p-8 shadow-lg">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-500 text-sm" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm mb-1 font-medium">Email</label>
                    <x-text-input id="email"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md text-black focus:ring-purple-500 focus:border-purple-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm mb-1 font-medium">Password</label>
                    <x-text-input id="password"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md text-black focus:ring-purple-500 focus:border-purple-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-500 hover:underline" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit"
                        class="bg-black text-white text-sm px-6 py-3 rounded-md border border-white shadow-md hover:bg-gray-800 transition">
                        LOGIN
                    </button>
                </div>
            </form>

            <!-- Already registered link -->
            <p class="mt-6 text-center text-sm text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-purple-600 hover:underline font-semibold">Register</a>
            </p>
        </div>
    </div>
</x-guest-layout>