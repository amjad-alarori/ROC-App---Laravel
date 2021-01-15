@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">Locaties</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('campus.create')}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe locatie
            </x-form.modal-button>
        </div>
    </div>

    @foreach($campuses as $campus)
        <x-cards.card-w-full :title="$campus->name" class="my-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            Adres:
                        </div>
                        <div class="col-md-8">
                            {{$campus->street}} {{$campus->house_nr}} {{$campus->house_nr_addition}}<br/>
                            {{$campus->zip_code}} {{$campus->city}}
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>E-mail:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$campus->email}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Telefoon:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$campus->phone_nr}}
                        </div>
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="row justify-content-end">
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <form method="POST" action="{{route('campus.destroy',['campus'=>$campus])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-block float-right"
                                   value="Verwijderen"/>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <x-form.modal-button data-target="#formModal" data-url="{{route('campus.edit',['campus'=>$campus])}}"
                                             class="btn btn-warning btn-block float-right">
                            Wijzigen
                        </x-form.modal-button>
                    </div>
                </div>
            </x-slot>
        </x-cards.card-w-full>
    @endforeach
@endsection
