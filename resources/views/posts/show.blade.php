<x-app-layout>
        <link
          rel="stylesheet"
          href="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/css/32144b924e2aa5af.css"
        />
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-4">
    <div class="flex flex-col items-center md:flex-row">
        <div class="md:w-1/3 p-4 relative">
            <div class=" ">
                <img src="https://rukminim2.flixcart.com/image/312/312/xif0q/computer/k/8/k/15-fa1226tx-gaming-laptop-hp-original-imah4bjbx8ctzdg6.jpeg" alt="HP Victus Laptop" class="w-full h-auto object-cover rounded-lg"/>
            </div>
            <p class="text-sm text-gray-600 mb-4">Post id: {{$post->id}}</p>
        </div>
      
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
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-yellow-400 py-2 px-4 ml-2 rounded">Delete post</button>
                    </form>
                </div>
            </div>
      </div>

     
    </div>
  </div>
  <div>
    Izohlar soni: 15
  </div>
  <div
  class="flex flex-col justify-center items-center bg-white"
>
  <div
    class="mx-auto flex w-full mt-20 flex-col justify-center px-5 pt-0 md:h-[unset] max-w-[520px] lg:px-6 xl:pl-0"
  >
    <div class="relative flex w-full flex-col pt-[20px] md:pt-0">
      <div
        class="rounded-lg border bg-card text-card-foreground shadow-sm mb-5 h-min flex items-center aligh-center max-w-full py-8 px-4 dark:border-zinc-800"
      >
        <div>
          <p
            class="text-xl font-extrabold text-zinc-950 leading-[100%] dark:text-white pl-4 md:text-3xl"
          >
            Vlad BZ
          </p>
          <p
            class="text-sm font-medium text-zinc-500 dark:text-zinc-400 md:mt-2 pl-4 md:text-base"
          >
            CTO and Founder
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>