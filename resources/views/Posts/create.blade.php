<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel with Vite</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div id="app" class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="max-w-lg w-100 p-4 bg-gradient-to-br from-blue-50 via-white to-blue-100 shadow-lg rounded-lg border border-transparent transform transition hover:scale-105 hover:shadow-2xl duration-300 ease-in-out">
            <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">Create Post</h1>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label text-blue-700">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        placeholder="Enter your title" 
                        required 
                        class="form-control border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label text-blue-700">Body</label>
                    <textarea 
                        name="body" 
                        id="body" 
                        placeholder="Enter post content" 
                        required 
                        rows="5" 
                        class="form-control border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                    ></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label text-blue-700">Upload Image</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="image" 
                        class="form-control-file mt-1 text-sm text-gray-600 
                               file:mr-4 file:py-2 file:px-4 
                               file:rounded file:border-0 
                               file:text-sm file:font-semibold 
                               file:bg-blue-200 file:text-blue-800 
                               hover:file:bg-blue-300"
                    >
                </div>
                <div>
                    <button 
                        type="submit" 
                        class="w-100 btn btn-primary btn-lg py-2 rounded-lg shadow-md hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
