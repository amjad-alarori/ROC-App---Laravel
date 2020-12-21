@extends('layouts.layout')

@section('title')
    Accordion
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col">
            <span class="display-4" style="font-size: 40px">Opleidingen</span>
            <a href="{{route('program.create')}}"
               class="btn inline-flex mt-2 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold
           text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none float-right
           focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Nieuwe opleiding aanmaken
            </a>
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
                            {{$program->code . " - " . $program->title}}
                            <div class="float-right mx-2">
                                <form method="POST" action="{{route('program.destroy',['program'=>$program])}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="far" value="&#xf2ed;"
                                           style="font-size:20px; color:red">
                                </form>
                            </div>
                            <div class="float-right mx-2">
                                <a href="{{route('program.edit',['program'=>$program])}}"><i
                                        class='fas fa-pencil-alt'
                                        style="font-size:20px; color: orange"></i></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </x-cards.accordioncard>
        @endforeach
    </x-cards.accordion>
@endsection
