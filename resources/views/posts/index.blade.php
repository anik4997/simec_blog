<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        .btn-readmore {
            margin-top: 10px;
        }
        .card-body {
            position: relative;
        }
        .timestamp {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 0.85rem;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Mini Blog Project</h1>
        <MARQuee>SIMEC SYSTEM Aptitute Test</MARQuee>
        <div class="text-end mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">+ Create New Post</a>
        </div>

        @if($hasPosts)
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h4>{{ $post->title }}</h4>
                    <p class="short-body" id="short-{{ $post->id }}">
                        {{ \Illuminate\Support\Str::limit($post->body, 100) }}
                        <button class="btn btn-link p-0" onclick="toggleFullText({{ $post->id }})">Read More</button>
                    </p>
                    <p class="full-body d-none" id="full-{{ $post->id }}">
                        {{ $post->body }}
                        <button class="btn btn-link p-0" onclick="toggleFullText({{ $post->id }}, false)">Show Less</button>
                    </p>
                    <small class="text-muted">Posted on {{ $post->created_at->format('d M Y h:i A') }}</small><br>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-outline-primary mt-2">Go to Details</a>
                </div>
            </div>
        @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>

        @else
            <div id="postContainer">
                <p class="text-muted">Loading posts from external API...</p>
            </div>

            <script>
            document.addEventListener("DOMContentLoaded", function () {
                fetch('https://jsonplaceholder.typicode.com/posts?_limit=10')
                    .then(response => response.json())
                    .then(posts => {
                        const container = document.getElementById('postContainer');
                        container.innerHTML = '';
                        posts.forEach(post => {
                            const card = document.createElement('div');
                            card.classList.add('card', 'mb-4');

                            const body = document.createElement('div');
                            body.classList.add('card-body');

                            const title = document.createElement('h4');
                            title.textContent = post.title;

                            const excerpt = document.createElement('p');
                            excerpt.textContent = post.body.substring(0, 100) + '...';

                            const fullBody = document.createElement('p');
                            fullBody.textContent = post.body;
                            fullBody.classList.add('d-none');

                            const btn = document.createElement('button');
                            btn.textContent = 'Read More';
                            btn.classList.add('btn', 'btn-outline-secondary', 'btn-sm', 'btn-readmore');
                            btn.addEventListener('click', function () {
                                fullBody.classList.toggle('d-none');
                                excerpt.classList.toggle('d-none');
                                btn.textContent = fullBody.classList.contains('d-none') ? 'Read More' : 'Show Less';
                            });

                            body.appendChild(title);
                            body.appendChild(excerpt);
                            body.appendChild(fullBody);
                            body.appendChild(btn);
                            card.appendChild(body);
                            container.appendChild(card);
                        });
                    })
                    .catch(error => {
                        document.getElementById('postContainer').innerHTML = '<p class="text-danger">⚠️ Failed to load posts from API.</p>';
                        console.error('Fetch error:', error);
                    });
            });
            </script>
        @endif
        <script>
             function toggleFullText(id, expand = true) {
                    document.getElementById('short-' + id).classList.toggle('d-none', expand);
                    document.getElementById('full-' + id).classList.toggle('d-none', !expand);
                }
        </script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
