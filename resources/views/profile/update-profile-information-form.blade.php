<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>


    <x-slot name="description">
        {{ __('Profiel') }}
    </x-slot>

    <x-slot name="form">


        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Profiel foto') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                <br>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Selecteer een nieuwe foto') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
    @endif
        <br>

    <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Naam') }}" />

{{--            @if(Auth::user()->role==1)--}}
{{--            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" value="{{Auth::user()->name }}"/>--}}
{{--            @else--}}
                <div class="form-input rounded-md shadow-sm mt-1 block w-full" id="name">{{Auth::user()->name }}</div>
{{--            @endif--}}
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <br>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <div class="form-input rounded-md shadow-sm mt-1 block w-full" id="email">{{Auth::user()->email }}</div>
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <br>

        <!-- biography -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="biography" value="{{ __('Iets over jezelf') }}" />
            <textarea class="form-input rounded-md shadow-sm block mt-1 w-full" id="biography" name="biography" wire:model.defer="state.biography" style="margin-top: 4px; margin-bottom: 0px;">{{Auth::user()->biography }}</textarea>
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
