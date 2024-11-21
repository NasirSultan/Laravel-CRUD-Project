<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="Enter your title" 
                required 
                class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
        </div>
        <div>
            <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
            <textarea 
                name="body" 
                id="body" 
                placeholder="Enter post content" 
                required 
                rows="5" 
                class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            ></textarea>
        </div>
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input 
                type="file" 
                name="image" 
                id="image" 
                class="mt-1 block w-full text-sm text-gray-600
                       file:mr-4 file:py-2 file:px-4
                       file:rounded file:border-0
                       file:text-sm file:font-semibold
                       file:bg-blue-50 file:text-blue-700
                       hover:file:bg-blue-100"
            >
        </div>
        <div>
            <button 
                type="submit" 
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
                Submit
            </button>
        </div>
    </form>
</div>
