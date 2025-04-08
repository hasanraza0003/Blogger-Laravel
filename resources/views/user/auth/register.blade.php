@extends('layout.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-red-200 text-red-950">
    <h1 class="absolute bottom-10 left-10 text-red-950 text-[200px] ">Blogger</h1>
    <div class="w-full max-w-4xl px-12 pt-10 pb-10 bg-white rounded-lg shadow-lg ">
        <h2 class="text-6xl font-bold text-center mb-6">Blogger</h2>
        <h2 class="text-5xl text-center mb-6">Register</h2>

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-8">
                <!-- Left Column -->
                <div>
                    <!-- Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-semibold mb-2">Username <span class="text-red-600">*</span></label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Enter You Username"
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                        @error('username')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-semibold mb-2">Password <span class="text-red-600">*</span></label>
                        <input type="password" id="password" name="password" placeholder="Enter You Password"
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                        @error('password')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-semibold mb-2">Phone <span class="text-red-600">*</span></label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter You Phone Number"
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                        @error('phone')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Profile Picture -->
                    <div class="mb-4">
                        <label for="profile_pic" class="block text-sm font-semibold mb-2">Profile Picture <span class="text-red-600">*</span></label>
                        <input type="file" id="profile_pic" name="profile_pic"
                            class="w-full p-2 border rounded-md bg-red-50 file:bg-red-200 file:text-red-950 file:border-0 file:px-4 file:py-2 file:rounded-md">
                        @error('profile_pic')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="mb-4">
                        <label for="dob" class="block text-sm font-semibold mb-2">Date of Birth <span class="text-red-600">*</span></label>
                        <input type="date" id="dob" name="dob" value="{{ old('dob') }}" 
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                        @error('dob')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div>
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold mb-2">Email <span class="text-red-600">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter You Email"
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                        @error('email')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-semibold mb-2">Confirm Password <span class="text-red-600">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                        @error('password_confirmation')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Gender <span class="text-red-600">*</span></label>
                        <select name="gender" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                            <option value="">Select Gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Hobbies -->
                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-2">Hobbies <span class="text-red-600">*</span></label>
                        <div class="grid grid-cols-2 gap-2">
                            @php
                                $hobbies = old('hobbies', []);
                            @endphp
                            @foreach(['reading', 'traveling', 'sports', 'music', 'gaming', 'cooking', 'drawing', 'photography', 'gardening', 'hiking'] as $hobby)
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="{{ $hobby }}" class="mr-2" {{ in_array($hobby, $hobbies) ? 'checked' : '' }}>
                                    {{ ucfirst($hobby) }}
                                </label>
                            @endforeach
                        </div>
                        @error('hobbies')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Short Summary (Bio) - Spans Two Columns -->
                <div class="col-span-2">
                    <div class="mb-4">
                        <label for="bio" class="block text-sm font-semibold mb-2">Short Summary About Yourself <span class="text-red-600">*</span></label>
                        <textarea id="bio" name="bio"
                            class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                            rows="4" placeholder="Write something about yourself...">{{ old('bio') }}</textarea>
                        @error('bio')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-red-950 text-white mt-6 py-3 rounded-md hover:bg-red-900 transition">
                Register
            </button>

            <!-- Login Link -->
            <p class="text-center text-sm mt-4">
                Already have an account? <a href="{{ url('login') }}"
                    class="text-red-950 font-semibold hover:underline">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
