@extends('layout.app')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-red-200 text-red-950">
    <h1 class="absolute bottom-10 left-10 text-red-950 text-[200px]">Blogger</h1>

    <div class="w-full max-w-4xl px-12 pt-10 pb-10 bg-white rounded-lg shadow-lg">
        <h2 class="text-6xl font-bold text-center mb-6">Blogger</h2>
        <h2 class="text-5xl text-center mb-6">Create Blog</h2>

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold mb-2">Title <span class="text-red-600">*</span></label>
                <input type="text" id="title" name="title"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-semibold mb-2">Category <span class="text-red-600">*</span></label>
                <select name="category" id="category"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400">
                    <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select a category</option>
                    <option value="tech" {{ old('category') == 'tech' ? 'selected' : '' }}>Tech</option>
                    <option value="lifestyle" {{ old('category') == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                    <option value="travel" {{ old('category') == 'travel' ? 'selected' : '' }}>Travel</option>
                    <option value="food" {{ old('category') == 'food' ? 'selected' : '' }}>Food</option>
                    <option value="education" {{ old('category') == 'education' ? 'selected' : '' }}>Education</option>
                </select>
                @error('category')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cover Image -->
            <div class="mb-4">
                <label for="cover_img" class="block text-sm font-semibold mb-2">Cover Image <span class="text-red-600">*</span></label>
                <input type="file" id="cover_img" name="cover_img"
                    class="w-full p-2 border rounded-md bg-red-50 file:bg-red-200 file:text-red-950 file:border-0 file:px-4 file:py-2 file:rounded-md">
                @error('cover_img')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold mb-2">Content <span class="text-red-600">*</span></label>
                <textarea id="description" name="description" rows="8"
                    class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-red-400"
                    placeholder="Write your blog post...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-red-950 text-white mt-6 py-3 rounded-md hover:bg-red-900 transition">
                Publish Blog
            </button>
        </form>
    </div>
</div>
@endsection
