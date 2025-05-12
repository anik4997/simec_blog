<!DOCTYPE html>
<html>
<head>
    <title>Post Detail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        .timestamp {
            font-size: 0.9rem;
            color: #888;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('posts.index') }}" class="btn btn-outline-primary mb-4">← Back to Posts</a>

    <div class="card p-4">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <p class="timestamp mb-4">Posted on {{ $post->created_at->format('d M Y h:i A') }}</p>
        <p style="white-space: pre-wrap;">{{ $post->body }}</p>
    </div>
</div>
</body>
</html>
