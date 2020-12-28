@extends('layouts.layout')

@section('title')
    Programma's
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-4">Programma's</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('program.create')}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe locatie
            </x-form.modal-button>
        </div>
    </div>

    <x-cards.accordion>
        @foreach($areas as $area)
            <x-cards.accordioncard order="{{$area->id}}" collapsed="{{$area === $areas[0]?'false':'true'}}">
                <x-slot name="btnTxt">
                    {{$area->title}}
                </x-slot>
                <ul class="list-group">
                    @foreach($area->programs as $program)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-10">
                                    <span class="h5 clock">{{$program->code . " - " . $program->title}}</span>
                                    <div class="row">
                                        <div class="col-md-3 col-lg-2">
                                            Niveau:
                                        </div>
                                        <div class="col-md-4">
                                            {{$program->degree}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-lg-2">
                                            Duur:
                                        </div>
                                        <div class="col-md-4">
                                            {{$program->length}} jaar
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="float-right">
                                        <form method="POST" action="{{route('program.destroy',['program'=>$program])}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="far btn btn-block" value="&#xf2ed;"
                                                   style="font-size:20px; color:red">
                                        </form>
                                    </div>
                                    <div class="float-right">
                                        <x-form.modal-button data-target="#formModal"
                                                             data-url="{{route('program.edit',['program'=>$program])}}"
                                                             class="btn btn-block float-right">
                                            <i class='fas fa-pencil-alt'
                                               style="font-size:20px; color: orange"></i>
                                        </x-form.modal-button>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{route('semester.index', ['program'=>$program])}}"
                                           class="btn btn-block">
                                            <i class='far fa-calendar-alt'
                                               style="font-size:20px; color: forestgreen"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </x-cards.accordioncard>
        @endforeach
    </x-cards.accordion>
@endsection
