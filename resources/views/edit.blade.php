<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
</head>
<body>
<header>
    <div>
        <div>
            Blog
        </div>
        <div>
            Home
        </div>
        <div>
            Logout
        </div>
    </div>
</header>
<main>
    <form method="POST" action="{{route('update',$post->id)}}">
        @csrf
        <div>
            <span>Content</span>
            <textarea name="post"  placeholder="What's on your mind?">{{$post->content}}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</main>
</body>
</html>
