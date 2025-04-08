{{-- Global Success/Failure Message --}}
@if (session('success'))
    <div class="absolute mb-4 right-5 top-28 p-3 bg-green-100 text-green-800 rounded-md border border-green-300">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="absolute right-5 top-28 mb-4 p-3 bg-red-100 text-red-800 rounded-md border border-red-300">
        {{ session('error') }}
    </div>
@endif


<div
    class="w-full h-screen bg-red-200 text-red-950 flex flex-col justify-center items-center space-y-10 py-10 text-center">
    <h1 class="text-[300px]">Blogger</h1>
    <p class="w-3/5 text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima aperiam odio adipisci
        suscipit
        voluptatem repellendus saepe veniam id. Perferendis, molestias.</p>
    <button class="bg-red-950 text-red-200 rounded-xl py-4 px-10">Explore Us</button>
</div>
