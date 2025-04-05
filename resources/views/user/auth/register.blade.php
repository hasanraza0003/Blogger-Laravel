@extends('layout.app')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-red-200 text-red-950">
        <h1 class="absolute bottom-10 left-10 text-red-950 text-[200px] ">Blogger</h1>
        <div class="w-full max-w-4xl px-12 pt-10 pb-10 bg-white rounded-lg shadow-lg ">
            <h2 class="text-6xl font-bold text-center mb-6">Blogger</h2>
            <h2 class="text-5xl text-center mb-6">Register</h2>

            <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div>
                        <!-- Username -->
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-semibold mb-2">Username <span class="text-red-600">*</span></label>
                            <input type="text" id="username" name="username"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                                required>
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-semibold mb-2">Password <span class="text-red-600">*</span></label>
                            <input type="password" id="password" name="password"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                                required>
                        </div>


                        <!-- Phone -->
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-semibold mb-2">Phone <span class="text-red-600">*</span></label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                                required>
                        </div>

                        <!-- Profile Picture -->
                        <div class="mb-4">
                                <label for="profile_picture" class="block text-sm font-semibold mb-2">Profile Picture <span class="text-red-600">*</span></label>
                                <input type="file" id="profile_picture" name="profile_picture"
                                    class="w-full p-2 border rounded-md bg-red-50 file:bg-red-200 file:text-red-950 file:border-0 file:px-4 file:py-2 file:rounded-md">
                            </div>

                        <!-- Date of Birth -->
                        <div class="mb-4">
                            <label for="dob" class="block text-sm font-semibold mb-2">Date of Birth <span class="text-red-600">*</span></label>
                            <input type="date" id="dob" name="dob"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                                required>
                        </div>


                    </div>

                    <!-- Right Column -->
                    <div>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold mb-2">Email <span class="text-red-600">*</span></label>
                            <input type="email" id="email" name="email"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                                required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="confirm_password" class="block text-sm font-semibold mb-2">Confirm Password <span class="text-red-600">*</span></label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                                required>
                        </div>

                        <!-- Gender -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2">Gender <span class="text-red-600">*</span></label>
                            <select name="gender"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>


                        <!-- Hobbies -->
                        <div class="mb-4">
                            <label class="block text-sm font-semibold mb-2">Hobbies <span class="text-red-600">*</span></label>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="reading" class="mr-2">
                                    Reading
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="traveling" class="mr-2">
                                    Traveling
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="sports" class="mr-2">
                                    Sports
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="music" class="mr-2">
                                    Music
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="gaming" class="mr-2">
                                    Gaming
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="cooking" class="mr-2">
                                    Cooking
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="drawing" class="mr-2">
                                    Drawing
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="photography" class="mr-2">
                                    Photography 
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="gardening" class="mr-2">
                                    Gardening 
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="hobbies[]" value="hiking" class="mr-2">
                                    Hiking 
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Short Summary (Bio) - Spans Two Columns -->
                    <div class="col-span-2">
                        <div class="mb-4">
                            <label for="bio" class="block text-sm font-semibold mb-2">Short Summary About
                                Yourself <span class="text-red-600">*</span></label>
                            <textarea id="bio" name="bio"
                                class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400" rows="4"
                                placeholder="Write something about yourself..."></textarea>
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
                    Already have an account? <a href="{{url('login') }}"
                        class="text-red-950 font-semibold hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>
@endsection
