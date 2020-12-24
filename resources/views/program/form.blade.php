<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="code" value="{{ __('Programma code') }}"/>
            <x-jet-input id="code" name="code" value="{{optional($program)->code}}"
                         type="text" class="mt-1 block w-40"
                         autocomplete="code" required/>
        </div>
    </div>
</div>

<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="title" value="{{ __('Naam van de programma') }}"/>
            <x-jet-input id="title" name="title" value="{{optional($program)->title}}"
                         type="text" class="mt-1 block w-full"
                         autocomplete="title" required/>
        </div>
    </div>
</div>

<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
{{--        <div class="col-md-4">--}}
        <div class="col">
            <x-jet-label for="degree" value="{{ __('Niveau') }}"/>
            <select class="form-control rounded-md shadow-sm mt-1 block w-40" id="degree" name="degree"
                    autocomplete="degree" required="required">
                <option value="" selected="selected" hidden="hidden">...</option>
                <option value="1" {{optional($program)->degree==1?'selected':''}}>
                    Niveau 1
                </option>
                <option value="2" {{optional($program)->degree==2?'selected':''}}>
                    Niveau 2
                </option>
                <option value="3" {{optional($program)->degree==1?'selected':''}}>
                    Niveau 3
                </option>
                <option value="4"{{optional($program)->degree==1?'selected':''}}>
                    Niveau 4
                </option>
                <option value="5" {{optional($program)->degree==1?'selected':''}}>
                    Niveau 5
                </option>
            </select>
        </div>
    </div>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <div class="form-row">
        <x-jet-label for="length" value="{{ __('Programma duur') }}"/>
    </div>
    <div class="form-row">
        <div class="col">
            <x-jet-input id="length" name="length"
                         value="{{optional($program)->length}}"
                         type="number" min="1"
                         class="mt-1 inline-block w-40" autocomplete="length"
                         oninput="validity.valid||(value='');"/>
            <span class="text-center align-items-center justify-content-center h-100">Jaar</span>
        </div>
    </div>
</div>

<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="area" value="{{ __('Sector') }}"/>
            <select class="form-control rounded-md shadow-sm mt-1 block w-40" id="area" name="area"
                    autocomplete="area" required="required">
                <option value="" selected="selected" hidden="hidden">...</option>

                @foreach($areas as $area)
                    <option
                        value="{{$area->id}}" {{optional($program)->area_id==$area->id?'selected':''}}>
                        {{$area->title}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
