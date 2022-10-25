<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->paginate(6);
        return view('index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $content = $request->post;
            Post::query()->create([
                'content' => $content
            ]);
            DB::commit();
            return redirect()->route('index');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput();
        }
    }

    public function edit(Post $post)
    {
        return view('edit',[
            'post'=>$post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        DB::beginTransaction();
        try {
            $content = $request->post;
            Post::where('id',$post->id)->update([
                'content' => $content
            ]);
            DB::commit();
            return redirect()->route('index');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput();
        }
    }
}
