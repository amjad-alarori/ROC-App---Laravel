@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        {{--    <div class="row justify-content-md-center">--}}
        {{--        <div class="col-md-5">--}}
        <form id="locationForm" method="Post" action="{{route('locatie.store')}}">
            @csrf
            <div class="form-group form-row">
                <label for="name">Naam van de locatie</label>
                <input class="form-control" name="name" id="name" type="text" required value="{{old('name')}}"/>
                @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group form-row">
                <label for="street">Straat</label>
                <input class="form-control" name="street" id="street" type="text" value="{{old('street')}}"
                       required/>
                @error('street')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="street">Huisnummer en toevoeging</label>
                <div class="form-row">
                    <div class="col-md-3">
                        <input class="form-control" name="house_nr" id="nr" type="number" min="1" placeHolder="nr."
                               value="{{old('house_nr')}}" required oninput="validity.valid||(value='');"/>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" name="house_nr_addition" id="add" type="text"
                               value="{{old('house_nr_addition')}}"/>
                    </div>
                        @error('house_nr')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('house_nr_addition')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-4">
                    <label for="zip">Post code</label>
                    <input class="form-control" name="zip_code" id="zip" type="text" value="{{old('zip_code')}}"
                           required/>
                    @error('zip_code')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group form-row">
                <label for="city">Stat</label>
                <input class="form-control" name="city" id="city" type="text" value="{{old('city')}}" required/>
                @error('city')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group form-row">
                <label for="mail">E-mail</label>
                <input class="form-control" name="email" id="mail" type="email" value="{{old('email')}}" required/>
                @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group form-row">
                <label for="phone">Telefoon</label>
                <input class="form-control" name="phone_nr" id="phone" type="text" value="{{old('phone_nr')}}"
                       required/>
                @error('phone_nr')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn text-white btn-bg-color float-right m-2">Opslaan</button>
            <a href="{{route('locatie.index')}}" class="btn text-white btn-bg-color float-right m-2">Terug</a>
        </form>
        {{--        </div>--}}
        {{--    </div>--}}
    </x-jet-authentication-card>
@endsection
