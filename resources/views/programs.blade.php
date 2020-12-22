@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Opleidingen</div>
        <div class="col-sm-8">
            <a href="{{route('opleiding.create')}}" class="btn btn-primary my-4 float-right">Nieuwe opleiding</a>
        </div>
    </div>
    @foreach($programAreas as $programArea)
        <x-cards.cardwfull :title="$location->name" class="my-4">

            <x-slot name="footer">
                <a href="#" class="btn btn-primary block float-right">Bekijk opleiding</a>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
