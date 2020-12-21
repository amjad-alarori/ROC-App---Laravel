@csrf

<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="name" value="{{ __('Naam van bedrijf') }}"/>
    <x-jet-input id="name" name="name" value="{{old('name')!==null?old('name'):(isset($bedrijf)?$bedrijf->name:'')}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="name" required/>
    <x-jet-input-error for="name" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="address" value="{{ __('Adres') }}"/>
    <x-jet-input id="address" name="address"
                 value="{{old('address')!==null?old('address'):(isset($bedrijf)?$bedrijf->address:'')}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="address" required/>
    <x-jet-input-error for="address" class="valErr mt-2"/>
</div>



<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <div class="col-4">
        <x-jet-label for="zip" value="{{ __('Post code') }}"/>
        <x-jet-input id="zip" name="zip_code"
                     value="{{old('zip_code')!==null?old('zip_code'):(isset($bedrijf)?$bedrijf->zip_code:'')}}"
                     class="mt-1 block w-full"
                     autocomplete="zip_code" required/>
        <x-jet-input-error for="zip_code" class="valErr mt-2"/>
    </div>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="city" value="{{ __('plaats') }}"/>
    <x-jet-input id="city" name="city" value="{{old('city')!==null?old('city'):(isset($bedrijf)?$bedrijf->city:'')}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="city" required/>
    <x-jet-input-error for="city" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="email" value="{{ __('Email') }}"/>
    <x-jet-input id="email" name="email" value="{{old('email')!==null?old('email'):(isset($bedrijf)?$bedrijf->email:'')}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="email" required/>
    <x-jet-input-error for="email" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="phone" value="{{ __('Telefoon') }}"/>
    <x-jet-input id="phone" name="phone_nr"
                 value="{{old('phone_nr')!==null?old('phone_nr'):(isset($bedrijf)?$bedrijf->phone_nr:'')}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="phone_nr" required/>
    <x-jet-input-error for="phone_nr" class="valErr mt-2"/>
</div>
