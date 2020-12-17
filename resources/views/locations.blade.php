@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Locaties</div>
        <div class="col-sm-8">
            <a href="{{route('locatie.create')}}" class="btn btn-primary my-4 float-right">Nieuwe locatie</a>
        </div>
    </div>
    @foreach($locations as $location)
        <x-cards.cardwfull :title="$location->name" class="my-4">

            <x-slot name="footer">
                <a href="#" class="btn btn-primary block float-right">View Profile</a>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
