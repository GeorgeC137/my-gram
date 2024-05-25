<x-app-layout>
    <div class="container p-5">
        <div class="flex">
            <div>
                <img src="/storage/{{ $post->image }}" alt="" class="w-80 h-80">
            </div>
            <div class="flex">
                <div class="ml-4">
                    <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-full"
                        style="max-width: 40px">
                </div>
                <div class="ml-4">
                    <p class="font-bold"><a href="{{ route('dashboard', $post->user->id) }}">{{ $post->user->username }}</a>
                    </p>
                </div>
                <div class="ml-4">
                    <a href="#">Follow</a>
                </div>
            </div>
        </div>
        <div class="flex">
            <a href="{{ route('dashboard', $post->user->id) }}" class="font-semibold">{{ $post->user->username }}</a>
            <span class="ml-4">{{ $post->caption }}</span>
        </div>
    </div>
</x-app-layout>
