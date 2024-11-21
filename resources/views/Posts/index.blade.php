<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div id="app" class="container py-5">
        <h1 class="text-center text-primary mb-4">Posts</h1>

        <!-- Create New Post Link (Centered) -->
        <div class="mb-4 d-flex justify-content-center">
            <a href="{{ route('posts.create') }}" class="btn btn-outline-primary">Create New Post</a>
        </div>

        <!-- Search Form (Centered) -->
        <div class="mb-4 d-flex justify-content-center">
            <form action="{{ route('posts.index') }}" method="GET" class="d-flex justify-content-center">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search posts..." 
                    value="{{ request()->get('search') }}" 
                    class="form-control w-50 me-2"
                >
                <button 
                    type="submit" 
                    class="btn btn-primary"
                >
                    Search
                </button>
            </form>
        </div>

        <!-- Posts List (Centered with Flexbox) -->
        <div class="d-flex justify-content-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 w-100">
                @foreach($posts as $post)
                    <div class="col d-flex justify-content-center">
                        <div class="card shadow-sm d-flex flex-column justify-content-between" style="height: 400px; width: 300px;">
                            <div class="card-body">
                                <!-- Post Title and Delete Button (Centered) -->
                                <div class="d-flex justify-content-between mb-4">
                                    <span class="h5 text-primary">{{ $post->title }}</span>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" class="d-flex justify-content-center">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this post?')" 
                                            class="btn btn-danger btn-sm"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                <div class="text-center mb-3">
                                    <img src="{{ asset('images/'.$post->image) }}" alt="Post Image" class="img-fluid rounded mb-2" style="max-height: 200px; object-fit: cover;">
                                </div>
                                <p class="card-text text-muted">{{ Str::limit($post->body, 100) }}...</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
