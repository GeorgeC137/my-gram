<x-app-layout>
    <div class="container p-5">
        <form method="POST" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <h3 class="font-bold">Edit Profile</h3>
            </div>

            <!-- Caption -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ?? $user->profile->title" autofocus
                    autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description') ?? $user->profile->description" autofocus
                    autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="url" :value="__('URL')" />
                <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" :value="old('url') ?? $user->profile->url" autofocus
                    autocomplete="url" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            {{-- Image  --}}
            <div class="mt-4">
                <x-input-label for="image" :value="__('Profile Image')" />
                <x-text-input type="file" id="image" class="block mt-1 w-full" name="image" :value="old('image')"
                    autofocus autocomplete="image" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Save Profile') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
