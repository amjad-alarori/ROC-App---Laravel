@extends('layouts.layout')

@section('title')
    Opleidingen
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-4">Opleidingen</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('course.create')}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe opleiding
            </x-form.modal-button>
        </div>
    </div>

    <x-cards.accordion>
        @foreach($years as $year=>$areasColl)
            <x-cards.accordioncard order="{{$year}}"
                                   collapsed="{{$areasColl === $years[array_key_first($years)]?'false':'true'}}">
                <x-slot name="btnTxt">
                    {{str_replace('year','',$year)}}
                </x-slot>
                <ul class="list-group">
                    <x-cards.accordion :compId="$year">
                        @foreach($areasColl as $areaId=>$courses)
                            <x-cards.accordioncard :compId="$year" order="{{$areaId}}"
                                                   collapsed="{{$courses === $areasColl[array_key_first($areasColl)]?'false':'true'}}">
                                <x-slot name="btnTxt">
                                    {{$areas[$areaId]->title}}
                                </x-slot>
                                <ul class="list-group">
                                    @foreach($courses as $course)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <span
                                                        class="h5 clock">{{$course->program->code . " - " . $course->program->title}}</span>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-md-4 col-lg-3">
                                                                    Niveau:
                                                                </div>
                                                                <div class="col-md-6 col-lg-8">
                                                                    {{$course->program->degree}}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-lg-3">
                                                                    Duur:
                                                                </div>
                                                                <div class="col-md-6 col-lg-8">
                                                                    {{$course->program->length}} jaar
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4 col-lg-3">
                                                                    Locatie:
                                                                </div>
                                                                <div class="col-md-6 col-lg-8">
                                                                    {{$course->campus->name}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="float-right">
                                                        <form method="POST"
                                                              action="{{route('course.destroy',['course'=>$course])}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" class="far btn btn-block"
                                                                   value="&#xf2ed;"
                                                                   style="font-size:20px; color:red">
                                                        </form>
                                                    </div>
                                                    <div class="float-right">
                                                        <x-form.modal-button data-target="#formModal"
                                                                             data-url="{{route('course.edit',['course'=>$course])}}"
                                                                             class="btn btn-block">
                                                            <i class='fas fa-pencil-alt'
                                                               style="font-size:20px; color: orange"></i>
                                                        </x-form.modal-button>
                                                    </div>
                                                    <div class="float-right">
                                                        <a href="{{route('course.show', ['course'=>$course])}}"
                                                           class="btn btn-block">
                                                            <i class='far fa-folder-open'
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
                </ul>
            </x-cards.accordioncard>
        @endforeach
    </x-cards.accordion>
@endsection
