<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Create</h2>
        
        <form class="space-y-4" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input 
                type="title" 
                name="title"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                placeholder="title" value="{{old('title')}}"
            />
            </div>
    
            <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Desc</label>
            <textarea 
            name="desc" rows="3" cols="50"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                placeholder="desc"
            >{{old('desc')}}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Image File</label>
                <input 
                    type="file" name="file"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="title" value="{{old('file')}}"
                />
                </div>
    
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg transition-colors">
            Create Post
            </button>
        </form>
        </div>
    </div>
</x-app-layout>