<x-app-layout>
<div class="container p-5">
    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <h3 class="font-bold">Add New Post</h3>
        </div>

        <!-- Caption -->
        <div>
            <x-input-label for="caption" :value="__('Post Caption')" />
            <x-text-input id="caption" class="block mt-1 w-full" type="text" name="caption" :value="old('caption')" autofocus
                autocomplete="caption" />
            <x-input-error :messages="$errors->get('caption')" class="mt-2" />
        </div>

        {{-- Image  --}}
        <div class="mt-4">
            <x-input-label for="image" :value="__('Post Image')" />
            <x-text-input type="file" id="image" class="block mt-1 w-full" name="image" :value="old('image')"
                autofocus autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Post') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-app-layout>
