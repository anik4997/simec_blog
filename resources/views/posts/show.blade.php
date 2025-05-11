
<!DOCTYPE html>
<html>
<head>
    <title>Post Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mb-3">Back</a>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
</div>
</body>
</html>
