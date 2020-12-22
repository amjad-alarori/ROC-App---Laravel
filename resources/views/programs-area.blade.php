@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Opleidingen</div>
            <div class="col-md-8" style="text-align: end">
                <x-form.modal-button>
                    Nieuwe opleiding
                </x-form.modal-button>
            </div>
    </div>
    @include('programs-areaForm')
    @foreach($programArea as $programArea)
        <x-cards.cardwfull :title="$programArea->title" class="my-4">
            {{$programArea->description}}
            <x-slot name="footer">
                <form method="post" action="{{route('opleiding.destroy', ['opleiding' => $programArea->id])}}">
                    @method('DELETE')
                    @csrf
                    <div class="btn btn-warning">
                        <x-form.modal-button>
                            Edit
                        </x-form.modal-button>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="#" class="btn btn-primary block float-right">Bekijk opleiding</a>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
