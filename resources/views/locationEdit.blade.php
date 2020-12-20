@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6 shadow p-5 justify-content-center border rounded">
            <form id="locationForm" method="Post" action="{{route('locatie.update',['locatie'=>$campus])}}">
                @method('PUT')
                @include('locationForm')
                <div class="row pt-5 justify-content-end">
                <a href="{{route('locatie.index')}}" type="button" id="exit" class="btn btn-secondary mx-1" data-dismiss="modal">Terug</a>
                <button type="submit" id="save" class="btn btn-primary mx-1">Bijwerken</button>
                </div>
            </form>
        </div>
    </div>
@endsection
