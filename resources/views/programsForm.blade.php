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
        <form id="locationForm" method="Post" action="{{route('opleiding.store')}}">
            @csrf
            <div class="form-group form-row">
                <label for="name">Naam van de locatie</label>
                <input class="form-control" name="title" id="title" type="text" required value="{{old('title')}}"/>
                @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group form-row">
                <label for="street">Beschrijving</label>
                <input class="form-control" name="desscription" id="description" type="text" value="{{old('description')}}"
                       required/>
                @error('description')
                <p class="text-sm text-red-600">{{ $message }}</p>
            </div>
            <button type="submit" class="btn text-white btn-bg-color float-right m-2">Opslaan</button>
            <a href="{{route('opleiding.index')}}" class="btn text-white btn-bg-color float-right m-2">Terug</a>
        </form>
        {{--        </div>--}}
        {{--    </div>--}}
    </x-jet-authentication-card>
@endsection
