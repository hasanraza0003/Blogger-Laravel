
<nav class="bg-red-950 shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="" class="text-5xl font-bold text-red-200">Blogger</a>
    
            <!-- Navbar Links (Only for large screens) -->
            <div class="flex space-x-6 justify-center items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-red-200 hover:text-red-400">Home</a>
                <a href="{{ url('/about') }}" class="text-xl font-bold text-red-200 hover:text-red-400">About</a>
                <a href="{{ url('/blog-detail') }}" class="text-xl font-bold text-red-200 hover:text-red-400">Blogs</a>
                <a href="{{ url('/add/blog') }}" class="text-xl font-medium px-4 py-2 bg-red-200 text-red-950 rounded-lg hover:text-red-400">Create Blog</a>
            </div>
    
            <!-- Auth Buttons -->
            <div class="flex space-x-4">
               
                    <!-- Profile Dropdown -->
                    <div class="relative group flex justify-center items-center">
                        
                        <button class="text-red-200 font-medium border border-red-200 rounded-3xl p-2">
                            {{-- {{ Auth::user()->name }} --}} Hasan
                        </button>
                        <div class="absolute top-8 hidden group-hover:block bg-white shadow-md rounded-lg mt-2 py-2 w-24">
                            <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-brown-700 hover:bg-red-200">Profile</a>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-brown-700 hover:bg-red-200">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
             
                    <a href="{{ url('/login') }}" class="px-4 py-2 bg-red-200 text-red-950 rounded-lg hover:text-red-400">Login</a>
                    <a href="{{ url('/register') }}" class="px-4 py-2 border border-red-200 text-red-200 rounded-lg hover:bg-red-200 hover:text-red-950">Register</a>
               
            </div>
        </div>
</nav>
    