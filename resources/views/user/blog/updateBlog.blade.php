@extends('layout.app')

@section('content')
@php
$blog = (object) [
    'title' => 'Exploring the Hidden Gems of Kyoto',
    'category' => 'travel',
    'created_at' => now(),
    'cover_image' => '\assets\user\img\blogThumb.jpg',
    'content' =>
        "Kyoto, the former capital of Japan, offers a perfect blend of traditional and modern experiences. 
        From breathtaking temples to secret tea gardens, it's a city that whispers stories of the past at every corner.
        \n\nWhether you're a first-time visitor or a seasoned traveler, there's always something new to discover. 
        Be sure to explore the Arashiyama Bamboo Grove, sample matcha in a centuries-old teahouse, and take a peaceful stroll along the Philosopher’s Path.",
    'user' => (object) [
        'name' => 'Hasan Raza',
    ],
];
@endphp
<div class="flex flex-col items-center justify-center min-h-screen bg-red-200 text-red-950">
    <h1 class="absolute bottom-10 left-10 text-red-950 text-[200px]">Blogger</h1>

    <div class="w-full max-w-4xl px-12 pt-10 pb-10 bg-white rounded-lg shadow-lg">
        <h2 class="text-5xl font-bold text-center mb-6">Edit Blog</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold mb-2">Title <span class="text-red-600">*</span></label>
                <input type="text" id="title" name="title" value="{{ $blog->title }}"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-semibold mb-2">Category <span class="text-red-600">*</span></label>
                <select name="category" id="category"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400" required>
                    <option value="tech" {{ $blog->category == 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="lifestyle" {{ $blog->category == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                    <option value="travel" {{ $blog->category == 'travel' ? 'selected' : '' }}>Travel</option>
                    <option value="food" {{ $blog->category == 'food' ? 'selected' : '' }}>Food</option>
                    <option value="education" {{ $blog->category == 'education' ? 'selected' : '' }}>Education</option>
                </select>
            </div>

            <!-- Cover Image -->
            <div class="mb-4">
                <label for="cover_image" class="block text-sm font-semibold mb-2">Cover Image <span class="text-red-600">*</span></label>
                <input type="file" id="cover_image" name="cover_image"
                    class="w-full p-2 border rounded-md bg-red-50 file:bg-red-200 file:text-red-950 file:border-0 file:px-4 file:py-2 file:rounded-md">
                @if($blog->cover_image)
                    <p class="text-xs mt-1">Current image: {{ $blog->cover_image }}</p>
                @endif
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="content" class="block text-sm font-semibold mb-2">Content <span class="text-red-600">*</span></label>
                <textarea id="content" name="content" rows="8"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                    placeholder="Write your blog post...">{{ $blog->content }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-red-950 text-white mt-6 py-3 rounded-md hover:bg-red-900 transition">
                Update Blog
            </button>
        </form>
    </div>
</div>
@endsection
