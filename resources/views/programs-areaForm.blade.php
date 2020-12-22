<form id="areaForm" method="Post" action="{{route('opleiding.store')}}">
    <x-form.modal title="Opleiding toevoegen">
     @csrf
     <div class="form-group form-row">
         <label for="name">Naam van de locatie</label>
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
{{--     <button type="submit" class="btn text-white btn-bg-color float-right m-2">Opslaan</button>--}}
{{--     <a href="{{route('opleiding.index')}}" class="btn text-white btn-bg-color float-right m-2">Terug</a>--}}
    </x-form.modal>
</form>
