<nav class="bg-red-950 shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-5xl font-bold text-red-200">Blogger</a>

        <!-- Navbar Links -->
        <div class="flex space-x-6 justify-center items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold text-red-200 hover:text-red-400">Home</a>
            <a href="{{ url('/about') }}" class="text-xl font-bold text-red-200 hover:text-red-400">About</a>
            <a href="{{route('blog.create')}}" class="text-xl font-medium px-4 py-2 bg-red-200 text-red-950 rounded-lg hover:text-red-400">Create
                Blog</a>
        </div>

        <!-- Auth Buttons -->
        <div class="flex space-x-4 items-center">
            @auth
                <!-- Profile Dropdown -->
                <div class="relative group flex justify-center items-center">
                    <button class="text-red-200 font-medium border border-red-200 rounded-3xl p-2">
                        {{ Auth::user()->username }}
                    </button>
                    <div class="absolute top-8 hidden group-hover:block bg-white shadow-md rounded-lg mt-2 py-2 w-32 z-50">
                        <a href="{{ route('profile') }}"
                            class="block px-4 py-2 text-sm text-red-950 hover:bg-red-200">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-red-950 hover:bg-red-200">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ url('/login') }}"
                    class="px-4 py-2 bg-red-200 text-red-950 rounded-lg hover:text-red-400">Login</a>
                <a href="{{ url('/register') }}"
                    class="px-4 py-2 border border-red-200 text-red-200 rounded-lg hover:bg-red-200 hover:text-red-950">Register</a>
            @endguest
        </div>
    </div>
</nav>
