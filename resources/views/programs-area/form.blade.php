{{--<div class="col-span-6 sm:col-span-4 mt-1">--}}
{{--    <div class="form-row">--}}
{{--        <div class="col">--}}
{{--            <x-jet-label for="title" value="{{ __('Opleiding naam')}}"/>--}}
{{--            <x-jet-input id="title" name="title" value="{{optional($programArea)->title}}"--}}
{{--                         type="text" class="mt-1 block w-full" autocomplete="title" required/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-span-6 sm:col-span-4 mt-1">--}}
{{--    <div class="form-row">--}}
{{--        <div class="col">--}}
{{--            <x-jet-label for="description" value="{{ __('Beschrijving van opleiding')}}"/>--}}
{{--            <x-jet-input id="description" name="description" value="{{optional($programArea)->description}}"--}}
{{--                         type="text" class="mt-1 block w-full" autocomplete="description" required/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-span-6 sm:col-span-4 mt-1">--}}
{{--    <div class="form-row">--}}
{{--        <div class="col">--}}
{{--            <x-jet-label for="code" value="{{ __('Opleiding code')}}"/>--}}
{{--            <x-jet-input id="code" name="code" value="{{optional($programArea)->code}}"--}}
{{--                         type="text" class="mt-1 block w-full" autocomplete="code" required/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="col-span-6 sm:col-span-4 mt-1">--}}
{{--    <div class="form-row">--}}
{{--        <div class="col">--}}
{{--            <x-jet-label for="type" value="{{ __('Opleiding type (Bachelor, AD, Master etc.)')}}"/>--}}
{{--            <x-jet-input id="type" name="type" value="{{optional($programArea)->type}}"--}}
{{--                         type="text" class="mt-1 block w-full" autocomplete="type" required/>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="form-group form-row">
    <label for="name">Naam van de Opleiding</label>
    <input class="form-control" name="title" id="title" type="text" required value="{{old('title')}}"/>
    @error('title')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="form-group form-row">
    <label for="street">Beschrijving</label>
    <input class="form-control" name="description" id="description" type="text" value="{{old('description')}}"
           required/>
    @error('description')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="form-group form-row">
    <label for="street">Opleiding code</label>
    <input class="form-control" name="code" id="code" type="text" value="{{old('code')}}"
           required/>
    @error('code')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<div class="form-group form-row">
    <label for="street">Opleiding type (Bachelor, AD etc.)</label>
    <input class="form-control" name="type" id="type" type="text" value="{{old('type')}}"
           required/>
    @error('type')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
