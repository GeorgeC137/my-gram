<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index($user)
    {
        $user = User::findOrFail($user);
        $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;
        $postsCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->following->count();
        });

        // dd($follows);

        return view('profiles.index', [
            'user' => $user,
            'follows' => $follows,
            'postsCount' => $postsCount,
            'followersCount' => $followersCount,
            'followingCount' => $followingCount,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);

        $data = $request->validate([
            'title' => 'required',
            'image' => 'image',
            'url' => 'url',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profiles/{$user->id}");
    }
}
