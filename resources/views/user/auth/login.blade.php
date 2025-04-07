@extends('layout.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-red-200 text-red-950 ">
        <h1 class="absolute bottom-10 left-40 text-red-950 text-[200px] ">Blogger</h1>
        <div class="w-full max-w-xl px-20 py-20 bg-white rounded-xl shadow-lg">
            <h2 class="text-6xl font-bold text-center mb-6">Blogger</h2>
            <h2 class="text-5xl text-center mb-6">Login</h2>

            {{-- Global Success/Failure Message --}}
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md border border-green-300">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-md border border-red-300">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-md font-semibold mb-2">Email <span class="text-red-600">*</span></label>
                    <input type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400 {{ $errors->has('email') ? 'border-red-500' : '' }}">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-md font-semibold mb-2">Password <span class="text-red-600">*</span></label>
                    <input type="password" id="password" name="password"
                        class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400 {{ $errors->has('password') ? 'border-red-500' : '' }}">
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full bg-red-950 text-white mt-4 py-2 rounded-md hover:bg-red-900 transition">
                    Login
                </button>

                {{-- Link --}}
                <p class="text-center text-sm mt-4">
                    Don't have an account?
                    <a href="{{ url('register') }}" class="text-red-950 font-semibold hover:underline">Register</a>
                </p>
            </form>
        </div>
    </div>
@endsection
