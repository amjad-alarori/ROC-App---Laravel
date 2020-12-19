@csrf

<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="name" value="{{ __('Naam van locatie') }}"/>
    <x-jet-input id="name" name="name" value="{{old('name')!==null?old('name'):(isset($campus)?$campus->name:'')}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="name" required/>
    <x-jet-input-error for="name" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="street" value="{{ __('Straat') }}"/>
    <x-jet-input id="street" name="street"
                 value="{{old('street')!==null?old('street'):(isset($campus)?$campus->street:'')}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="street" required/>
    <x-jet-input-error for="street" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="nr" value="{{ __('Huisnummer en toevoeging') }}"/>
    <div class="form-row">
        <div class="col-md-3">
            <x-jet-input id="nr" name="house_nr"
                         value="{{old('house_nr')!==null?old('house_nr'):(isset($campus)?$campus->house_nr:'')}}"
                         type="number" min="1"
                         placeHolder="nr."
                         class="mt-1 block w-full" autocomplete="street"
                         oninput="validity.valid||(value='');"/>
        </div>
        <div class="col-md-2">
            <x-jet-input id="addition" name="house_nr_addition"
                         value="{{old('house_nr_addition')!==null?old('house_nr_addition'):(isset($campus)?$campus->house_nr_addition:'')}}"
                         type="text"
                         class="mt-1 block w-full"/>
        </div>
    </div>
    <x-jet-input-error for="house_nr" class="valErr mt-2"/>
    <x-jet-input-error for="house_nr_addition" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <div class="col-4">
        <x-jet-label for="zip" value="{{ __('Post code') }}"/>
        <x-jet-input id="zip" name="zip_code"
                     value="{{old('zip_code')!==null?old('zip_code'):(isset($campus)?$campus->zip_code:'')}}"
                     class="mt-1 block w-full"
                     autocomplete="zip_code" required/>
        <x-jet-input-error for="zip_code" class="valErr mt-2"/>
    </div>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="city" value="{{ __('plaats') }}"/>
    <x-jet-input id="city" name="city" value="{{old('city')!==null?old('city'):(isset($campus)?$campus->city:'')}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="city" required/>
    <x-jet-input-error for="city" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="email" value="{{ __('Email') }}"/>
    <x-jet-input id="email" name="email" value="{{old('email')!==null?old('email'):(isset($campus)?$campus->email:'')}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="email" required/>
    <x-jet-input-error for="email" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="phone" value="{{ __('Telefoon') }}"/>
    <x-jet-input id="phone" name="phone_nr"
                 value="{{old('phone_nr')!==null?old('phone_nr'):(isset($campus)?$campus->phone_nr:'')}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="phone_nr" required/>
    <x-jet-input-error for="phone_nr" class="valErr mt-2"/>
</div>
