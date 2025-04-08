@extends('layout.app')

@section('content')
   

    @include('components.navbar')
    <main class="flex-grow">
        <div class="flex justify-center px-4 py-10">
            <div class="w-full max-w-6xl bg-white rounded-lg shadow-xl overflow-hidden">

                {{-- {{dd($blog)}} --}}
                
                <!-- Blog Image -->
                @if ($blog->cover_img)
                    <img src="/{{ $blog->cover_img }}" alt="Blog Cover" class="w-full h-[400px] object-cover">
                @endif

                <!-- Blog Content -->
                <div class="p-10">
                    <!-- Category & Date -->
                    <div class="flex items-center justify-between mb-4 text-sm text-red-500">
                        <span class="uppercase font-semibold tracking-wide">{{ ucfirst($blog->category) }}</span>
                        <span>{{ $blog->created_at->format('F j, Y') }}</span>
                    </div>

                    <!-- Blog Title -->
                    <h1 class="text-5xl font-bold mb-6 text-red-950 leading-tight">{{ $blog->title }}</h1>

                    <!-- Author Info -->
                    <div class="flex items-center space-x-4 mb-10">
                        <div
                            class="w-11 h-11 rounded-full bg-red-300 flex items-center justify-center text-white font-bold text-lg">
                            {{ strtoupper(substr($blog->author_name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-medium">{{ $blog->author_name }}</p>
                            <p class="text-xs text-gray-500">Author</p>
                        </div>
                    </div>

                    <!-- Blog Body -->
                    <div class="prose max-w-none prose-red">
                        {{$blog->description }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('components.footer')
@endsection
