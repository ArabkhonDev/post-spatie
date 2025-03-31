<x-app-layout>
    <div class="container m-auto">
        <div class="flex flex-wrap">
            @foreach ($posts as $post)
                <div class=" bg-gray-100 flex items-center justify-center p-4">
                    <div class="max-w-sm w-full bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
                    <div class="relative">
                        <img 
                        src="https://placehold.co/400x300"
                        alt="Product"
                        class="w-full h-52 object-cover"
                        />
                        <span class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                        Sale
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-4">
                        <div>
                        <h3 class="text-xl font-bold text-gray-900">{{$post->title}}</h3>
                        <p class="text-gray-500 mt-1">Premium cotton blend</p>
                        </div>
                        
                        <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="text-2xl font-bold text-gray-900">$49.99</p>
                            <p class="text-sm text-gray-500 line-through">$69.99</p>
                        </div>
                        
                        <div class="flex items-center gap-1">
                            <div class="text-yellow-400">★★★★</div>
                            <div class="text-gray-300">★</div>
                            <span class="text-sm text-gray-600 ml-1">(42)</span>
                        </div>
                        </div>
                
                        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition-colors">
                        <a href="{{route('posts.show', $post->id)}}">Read more</a>
                        </button>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{$posts->links()}}

</x-app-layout>