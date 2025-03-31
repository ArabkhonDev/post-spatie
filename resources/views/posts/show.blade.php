<x-app-layout>
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-4">
    <div class="flex flex-col items-center md:flex-row">
      <div class="md:w-1/3 p-4 relative">
        <div class=" ">
          <img src="https://rukminim2.flixcart.com/image/312/312/xif0q/computer/k/8/k/15-fa1226tx-gaming-laptop-hp-original-imah4bjbx8ctzdg6.jpeg" alt="HP Victus Laptop" class="w-full h-auto object-cover rounded-lg"/>
        </div>
        <p class="text-sm text-gray-600 mb-4">Post id: {{$post->id}}</p>
      </div>
      
      <!-- Product Details -->
      <div class="md:w-2/3 p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">{{$post->title}}</h1>
            <p class="text-sm text-gray-600 mb-4">{{$post->desc}}</p>
            
            <div class="flex items-center mb-4">
            <span class="bg-green-500 text-white text-sm font-semibold px-2.5 py-0.5 rounded">4.5 ★</span>
            <span class="text-sm text-gray-500 ml-2">1,234 reviews</span>
            </div>
            <div class="flex">
                <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                    <a href="{{route('posts.edit', $post->id)}}">Edit post</a>
                </button>
                @can
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Delete post</button>
                    </form>
                @endcan
            </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>