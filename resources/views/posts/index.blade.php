<x-app-layout>
    <div class="container p-5">
        @foreach ($posts as $post)
            <div class="flex">
                <div>
                    <a href="{{ route('dashboard', $post->user->id) }}">
                        <img src="/storage/{{ $post->image }}" alt="" class="w-80 h-80">
                    </a>
                </div>
                <div class="flex">
                    <div class="ml-4">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-100 rounded-full"
                            style="max-width: 40px">
                    </div>
                    <div class="ml-4">
                        <p class="font-bold"><a
                                href="{{ route('dashboard', $post->user->id) }}">{{ $post->user->username }}</a>
                        </p>
                    </div>
                    <div class="ml-4">
                        <a href="#">Follow</a>
                    </div>
                </div>
            </div>
            <div class="flex mt-4 mb-4">
                <a href="{{ route('dashboard', $post->user->id) }}"
                    class="font-semibold">{{ $post->user->username }}</a>
                <span class="ml-4">{{ $post->caption }}</span>
            </div>
            <hr class="font-bold text-black">
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
