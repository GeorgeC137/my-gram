<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        // dd($users);

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(3);

        // dd($posts);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => ['required', 'string'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profiles/' . auth()->id());

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
