<form method="POST" class="AjaxForm" action="{{route('stageBedrijven.store')}}">

@csrf
    <input type="hidden" name="role" value="3">

<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="name" value="{{ __('Naam van bedrijf') }}"/>
    <x-jet-input id="name" name="name" value="{{optional($bedrijf)->name}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="name" required/>
    <x-jet-input-error for="name" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="address" value="{{ __('Adres') }}"/>
    <x-jet-input id="address" name="address"
                 value="{{optional($bedrijf)->address}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="address" required/>
    <x-jet-input-error for="address" class="valErr mt-2"/>
</div>



<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <div class="col-4">
        <x-jet-label for="zip" value="{{ __('Post code') }}"/>
        <x-jet-input id="zip" name="zip_code"
                     value="{{optional($bedrijf)->zip_code}}"
                     class="mt-1 block w-full"
                     autocomplete="zip_code" required/>
        <x-jet-input-error for="zip_code" class="valErr mt-2"/>
    </div>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="city" value="{{ __('plaats') }}"/>
    <x-jet-input id="city" name="city" value="{{optional($bedrijf)->city}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="city" required/>
    <x-jet-input-error for="city" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="email" value="{{ __('Email') }}"/>
    <x-jet-input id="email" name="email" value="{{optional($bedrijf)->email}}"
                 type="email" class="mt-1 block w-full"
                 autocomplete="email" required/>
    <x-jet-input-error for="email" class="valErr mt-2"/>
</div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">

        <x-jet-label for="contact_persoon" value="{{ __('Contact persoon') }}"/>
        <x-jet-input id="contact_persoon" name="contact_persoon" value=""
                     type="text" class="mt-1 block w-full"
                     autocomplete="contact_persoon" required/>

    </div>


<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="phone" value="{{ __('Telefoon') }}"/>
    <x-jet-input id="phone" name="phone_nr"
                 value="{{optional($bedrijf)->phone_nr}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="phone_nr" required/>
    <x-jet-input-error for="phone_nr" class="valErr mt-2"/>
</div>



    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
