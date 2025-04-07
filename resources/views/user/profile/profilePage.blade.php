@extends('layout.app')

@section('content')
    @include('components.navbar')
    <div class="flex flex-col items-center justify-center min-h-screen bg-red-200 text-red-950">
        <h2 class="text-9xl text-center mb-10">Your Profile</h2>

        {{-- {{dd($user)}} --}}

        @php
            $hobbies = json_decode($user['hobbies'], true);
        @endphp

        <div class="w-full max-w-5xl px-10 py-12 bg-white rounded-2xl shadow-2xl z-10">
            <div class="flex flex-col lg:flex-row items-start gap-12">
                <!-- Left Column -->
                <div class="flex-1">
                    <!-- Profile Picture -->
                    <div class="mb-6 text-center">
                        <img src="/{{ $user['profile_pic'] }}" alt="Profile Picture"
                            class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-red-300 shadow-lg">
                        <p class="mt-4 text-xl font-bold">{{ $user['username'] }}</p>
                    </div>

                    <!-- Bio -->
                    <div class="mb-6">
                        <h4 class="text-xl font-semibold mb-1">Bio</h4>
                        <p class="text-base text-red-800">{{ $user['bio'] ?? 'No bio provided.' }}</p>
                    </div>

                    <!-- Hobbies -->
                    <div class="mb-4">
                        <h4 class="text-xl font-semibold mb-2">Hobbies</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($hobbies as $hobby)
                                <span class="bg-red-100 text-red-800 px-4 py-1 rounded-full text-sm font-medium shadow-sm">
                                    {{ $hobby }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="flex-1">
                    <!-- Email -->
                    <div class="mb-4">
                        <h4 class="text-xl font-semibold mb-1">Email</h4>
                        <p class="text-base">{{ $user['email'] }}</p>
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <h4 class="text-xl font-semibold mb-1">Phone</h4>
                        <p class="text-base">{{ $user['phone'] }}</p>
                    </div>
                    <!-- Date of Birth -->
                    <div class="mb-4">
                        <h4 class="text-xl font-semibold mb-1">Date of Birth</h4>
                        <p class="text-base">{{ \Carbon\Carbon::parse($user['dob'])->format('F d, Y') }}</p>
                    </div>

                    <!-- Gender -->
                    <div class="mb-4">
                        <h4 class="text-xl font-semibold mb-1">Gender</h4>
                        <p class="text-base capitalize">{{ $user['gender'] }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
