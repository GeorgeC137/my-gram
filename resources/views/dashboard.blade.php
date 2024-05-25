<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyGram') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="flex">
            <div class="grid-cols-3 gap-2 p-5">
                <img src="https://picsum.photos/400" class="w-32 h-32 rounded-full">
            </div>
            <div class="p-5">
                <div class="flex justify-between items-baseline">
                    <h1 class="font-bold">{{ $user->username }}</h1>
                    <a href="{{ route('post.create') }}" class="text-green-500 font-semibold">Add New Post</a>
                </div>
                <div class="flex">
                    <div class="pr-5"><strong>17</strong> posts</div>
                    <div class="pr-5"><strong>17k</strong> followers</div>
                    <div class="pr-5"><strong>53</strong> following</div>
                </div>
                <div class="pt-5 font-extrabold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#">{{ $user->profile->url }}</a></div>
            </div>
        </div>

        <div class="flex pt-4">
            <div class="grid grid-cols-4 gap-4 p-5">
                <img src="https://picsum.photos/400" alt="" class="w-full">
                <img src="https://picsum.photos/400" alt="" class="w-full">
                <img src="https://picsum.photos/400" alt="" class="w-full">
                <img src="https://picsum.photos/400" alt="" class="w-full">
            </div>
        </div>
    </div>
</x-app-layout>
