<h1>Posts</h1>
<a href="{{ route('posts.create') }}">Create New Post</a>

<form action="{{ route('posts.index') }}" method="GET">
    <input type="text" name="search" placeholder="Search posts..." value="{{ request()->get('search') }}">
    <button type="submit">Search</button>
</form>

<ul>
    @foreach($posts as $post)
        <li>
            {{ $post->title }} 
            <img src="{{ asset('images/'.$post->image) }}" width="100">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
