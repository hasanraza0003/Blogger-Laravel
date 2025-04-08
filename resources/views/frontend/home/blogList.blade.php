<div class="text-red-950 py-16 px-4 text-center">
    <div class="text-center mb-12">
        <h2 class="text-5xl font-bold mb-4">Latest Blogs</h2>
        <p class="text-xl w-full md:w-1/2 mx-auto">
            Stay updated with our latest insights, tips, and tutorials from the world of blogging.
        </p>
    </div>

    <div class="w-full p-20 h-full flex flex-wrap justify-center items-center gap-20">


        @foreach ($data as $blog)
            <div
                class="w-[400px] h-full bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                <img src="/{{$blog->cover_img}}" alt="Blog Image" class="w-[300px ] h-[300px] object-cover">
                <div class="p-6 flex flex-col justify-between h-full">
                    <h3 class="text-2xl font-semibold mb-2">{{$blog->title}}</h3>
                    <p class="text-red-800 mb-4 truncate">
                        {{$blog->description}}
                    </p>
                    <a href="{{ route('blog.show', $blog->id ) }}" class="text-red-950 font-semibold hover:underline">Read More →</a>
                </div>
            </div>
        @endforeach

    </div>

</div>
