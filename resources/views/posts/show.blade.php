<x-app-layout>
        <link
          rel="stylesheet"
          href="https://horizon-ui.com/shadcn-nextjs-boilerplate/_next/static/css/32144b924e2aa5af.css"
        />
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden mt-4">
    <div class="flex flex-col items-center md:flex-row">
        <div class="md:w-1/3 p-4 relative">
            <div class=" ">
                <img src="{{asset('storage/'.$post->file)}}" alt="{{$post->title}}" class="w-full h-auto object-cover rounded-lg"/>
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
                    @can('edit')
                            <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                                <a href="{{route('posts.edit', $post->id)}}">Edit post</a>
                             </button>
                    @endcan

                   @can('delete')
                        <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                            <button type="submit" class="bg-yellow-400 py-2 px-4 ml-2 rounded">Delete post</button>
                        </form>
                   @endcan
                </div>
            </div>
      </div>
    </div>
  </div>
  <div class="container m-auto mt-2">
    Izohlar soni: {{count($post->comments)}}
  </div>
  @foreach ($post->comments as $comment)
      
  <div class="flex flex-col justify-center items-center bg-white">
      <div class="mx-auto flex w-full  flex-col justify-center px-5 pt-0 md:h-[unset] max-w-[520px] lg:px-6 xl:pl-0">
                <div class="relative flex w-full flex-col pt-[20px] md:pt-2">
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm mb-5 h-min flex items-center aligh-center max-w-full py-8 px-4 dark:border-zinc-800">
                        <div>
                            <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400 md:mt-2 pl-4 md:text-base">
                                {{$comment->user->name}} 
                            </p>
                            <p class="text-sm font-medium text-zinc-500 dark:text-zinc-400 md:mt-2 pl-4 md:text-base">
                                {{$comment->desc}} 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        

    <div class="flex w-full items-center justify-center  p-4">
        <form action="{{route('comments.store')}}" method="post">
            @csrf
            <div class="w-full max-w-lg">
                <div class="relative rounded-2xl bg-white p-6 shadow">
                    <div class="mb-4 w-[520px] flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900">Leave feedback</h2>
                    </div>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <p class="mb-4 text-center text-sm m-2">Postga izoh yozishingiz va xato kamxhilik bo'lsa xabar berishingiz mumkin
                        <textarea name="desc" class="mb-3 w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" rows="5" cols="50" placeholder="Your feedback..."></textarea>
                        
                    <button type="submit" class="w-full rounded-lg bg-gray-900 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-gray-800">Submit</button>
                </div>
            </div>
        </form>
    </div>
  
</x-app-layout>