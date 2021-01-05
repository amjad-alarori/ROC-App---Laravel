<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="title" value="{{ __('Opleiding naam')}}"/>
            <x-jet-input id="title" name="title" value="{{optional($programAreas)->title}}"
                         type="text" class="mt-1 block w-full" autocomplete="title" required/>
        </div>
    </div>
</div>

<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="description" value="{{ __('Beschrijving van opleiding')}}"/>
            <x-jet-input id="description" name="description" value="{{optional($programAreas)->description}}"
                         type="text" class="mt-1 block w-full" autocomplete="description" required/>
        </div>
    </div>
</div>
