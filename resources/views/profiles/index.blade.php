<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyGram') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="flex">
            <div class="grid-cols-3 gap-2 p-5">
                <img src="{{ $user->profile->profileImage() }}" class="w-32 h-32 rounded-full">
            </div>
            <div class="p-5">
                <div class="flex justify-between items-baseline">
                    <h1 class="font-bold">{{ $user->username }}</h1>
                    <div class="ml-4">
                        <follow-button :user-id="{{ $user->id }}" :follows="{{ $follows }}"></follow-button>
                    </div>
                    @can('update', $user->profile)
                        <a href="{{ route('post.create') }}" class="text-green-500 font-semibold ml-4">Add New Post</a>
                    @endcan
                </div>
                <div class="mb-2 mt-2">
                    @can('update', $user->profile)
                        <a href="{{ route('profiles.edit', $user) }}" class="text-green-500 font-semibold">Edit Profile</a>
                    @endcan
                </div>
                <div class="flex">
                    <div class="pr-5"><strong>{{ $postsCount }}</strong> {{ Str::plural('post', $postsCount) }}</div>
                    <div class="pr-5"><strong>{{ $followersCount }}</strong> {{ Str::plural('follower', $followersCount) }}</div>
                    <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div class="pt-5 font-extrabold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
            </div>
        </div>

        <div class="flex pt-4">
            <div class="grid grid-cols-4 gap-4 p-5">
                @foreach ($user->posts as $post)
                    <div>
                        <a href="{{ route('post.show', $post) }}">
                            <img src="/storage/{{ $post->image }}" alt="" class="w-full mb-2">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
