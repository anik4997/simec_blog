<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        @if($hasPosts)
            @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h4>{{ $post->title }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
                        <small class="text-muted">Posted on {{ $post->created_at->format('d M Y h:i A') }}</small>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Read More</a>
                    </div>
                </div>
            @endforeach
        @else
            <div id="postContainer">
                <p>Loading posts from external API...</p>
            </div>

            <script>
            document.addEventListener("DOMContentLoaded", function () {
                fetch('https://jsonplaceholder.typicode.com/posts?_limit=10')
                    .then(response => response.json())
                    .then(posts => {
                        const container = document.getElementById('postContainer');
                        container.innerHTML = '';
                        posts.forEach(post => {
                            const html = `
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h4>${post.title}</h4>
                                        <p>${post.body.substring(0, 100)}...</p>
                                        <a href="#" class="btn btn-secondary disabled">Read More</a>
                                    </div>
                                </div>
                            `;
                            container.innerHTML += html;
                        });
                    })
                    .catch(error => {
                        document.getElementById('postContainer').innerHTML = '<p class="text-danger">Failed to load posts.</p>';
                        console.error('Fetch error:', error);
                    });
            });
            </script>
        @endif
    </div>

    <!-- Bootstrap JS (Optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
