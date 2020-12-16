@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Locaties</div>
        <div class="col-sm-8">
            <x-form.modalButton class="btn-primary my-4 float-right">Nieuwe locatie</x-form.modalButton>
        </div>
    </div>

    <form id="locationForm" method="Post" action="{{route('locatie.store')}}">
        <x-form.modal title="Nieuwe locatie">
            @csrf
            <div class="form-group form-row">
                <label id="name">Naam van de locatie</label>
                <input class="form-control" name="name" id="name" type="text" required value="{{old('name')}}"/>
            </div>
            <div class="form-group form-row">
                <label id="street">Straat</label>
                <input class="form-control" name="street" id="street" type="text" value="{{old('street')}}" required/>
            </div>
            <div class="form-group">
                <label id="street">Huisnummer en toevoeging</label>
                <div class="form-row">
                    <div class="col-md-3">
                        <input class="form-control" name="nr" id="nr" type="number" min="1" placeHolder="nr." value="{{old('nr')}}" required/>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control" name="addition" id="add" type="text" value="{{old('addition')}}"/>
                    </div>
                </div>
            </div>
            <div class="form-group form-row">
                <div class="col-4">
                    <label id="zip">Post code</label>
                    <input class="form-control" name="zip" id="zip" type="text" value="{{old('zip')}}" required/>
                </div>
            </div>
            <div class="form-group form-row">
                <label id="mail">E-mail</label>
                <input class="form-control" name="mail" id="mail" type="email"  value="{{old('mail')}}" required/>
            </div>
            <div class="form-group form-row">
                <label id="phone">Telefoon</label>
                <input class="form-control" name="phone" id="phone" type="text"  value="{{old('phone')}}" required/>
            </div>
        </x-form.modal>
    </form>

    @foreach($locations as $location)
        <x-cards.cardwfull :title="$location->name">

            <x-slot name="footer">
                <a href="#" class="btn btn-primary block float-right">View Profile</a>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
