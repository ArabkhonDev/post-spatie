<x-app-layout>
    <div class="container m-auto">
        @can('create')
            <div class="mt-2">
                <a href="route('posts.create')" class="bg-blue-300 py-2 px-6 rounded ">Create post</a>
            </div>
        @endcan
        <div class="flex flex-wrap">
            @foreach ($posts as $post)
                <div class=" bg-gray-100 flex items-center justify-center p-4">
                    <div class="max-w-sm w-full bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
                    <div class="relative">
                        <img 
                        src="{{asset('storage/'.$post->file)}}"
                        alt="Product"
                        class="w-full h-52 object-cover"
                        />
                        <span class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                        Sale
                        </span>
                    </div>
                    
                    <div class="p-5 space-y-4">
                        <div>
                            <h5 class="text-xl font-bold text-gray-900">Post Id: {{$post->id}}</h5>
                            <h3 class="text-xl font-bold text-gray-900">{{$post->title}}</h3>
                        </div>
                        
                        <div class="flex justify-between items-center">
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