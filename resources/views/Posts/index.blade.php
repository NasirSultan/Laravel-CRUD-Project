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
        <table class="table table-bordered table-hover w-100">
    <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <!-- Post Title -->
            <td class="text-primary align-middle">{{ $post->title }}</td>

            <!-- Post Image -->
            <td class="text-center align-middle">
                <img src="{{ asset('images/'.$post->image) }}" alt="Post Image" class="img-fluid rounded" style="max-height: 100px; object-fit: cover;">
            </td>

            <!-- Post Description -->
            <td class="align-middle">{{ Str::limit($post->body, 100) }}...</td>

            <!-- Action Buttons -->
            <td class="text-center align-middle">
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
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
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
