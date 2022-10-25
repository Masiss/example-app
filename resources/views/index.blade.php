<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
    }
    header{
        width: 100%;
        font-size: 30px;
        background-color: lightgrey;
    }
    .nav-bar{
        display: flex;
        justify-content: space-around;

    }
    form{
        width: 25%;
        margin:50px 25px;
    }
</style>
<body>
<header>
    <div class="nav-bar">
            <span>
                Blog
            </span>
            <span>
                Home
            </span>
            <span>
                Logout
            </span>
    </div>

</header>
<main>
    <form method="POST" action="{{route('store')}}">
        @csrf
        <div style="display: flex; flex-direction: column">
            <p>Content</p>
            <textarea name="post" placeholder="What's on your mind?"></textarea>
        </div>
        <button type="submit" style="background-color: cornflowerblue; margin-top: 25px;border: 0;font-size: 18px">POST</button>
    </form>
    <div>
        <div class="container" style="display: grid;grid-auto-columns: 100px;grid-auto-flow: row">
            @foreach ($posts as $post)
                <div style="border: 1px black; border-radius: 10%;width: 100px; height: 50px;">
                    {{ $post->content }}
                    <a href="{{route('edit',$post->id)}}">Edit</a>
                </div>
            @endforeach
                {{ $posts->links() }}

        </div>

    </div>
</main>
</body>
</html>
