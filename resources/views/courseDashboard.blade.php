@extends('layouts.layout')

@section('title')
    Opleiding dashboard
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3" style="font-size: 2rem;">
        {{$course->program->title . ' (' . $course->study_year . ')'}}<br/>
        {{$course->campus->name}}
    </div>
    <div class="row py-2">
        <div class="col-md-5">
            <div class="card rounded shadow w-full">
                <div class="card-header">Programma gegevens</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">Programma code</div>
                        <div class="col-md-6">{{$course->program->code}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Sector</div>
                        <div class="col-md-6">{{$course->program->area->title}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Niveau</div>
                        <div class="col-md-6">Niveau {{$course->program->degree}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Duur</div>
                        <div class="col-md-6">{{$course->program->length}} jaar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-4 px-2 d-flex justify-content-around">
        <div class="col-md-4">
            <x-cards.ProfileCard title="Studenten" cardImage="images/rocafbeelding3.jpg">
                <x-slot name="image">
                    <img class="img" src="{{asset('images/rocafbeelding3.jpg')}}">
                </x-slot>
                <x-slot name="descrition">
                    student management paneel
                </x-slot>
                <a href="{{route('enrollment.index',['course'=>$course])}}" class="btn btn-just-icon btn-round">
                    <i class="fas fa-users"></i>
                    <div class="ripple-container">lijst</div>
                </a>
{{--                <a href="#" class="btn btn-just-icon btn-round">--}}
{{--                    <i class="fas fa-medkit"></i>--}}
{{--                    <div class="ripple-container">stages</div>--}}
{{--                </a>--}}
            </x-cards.ProfileCard>
        </div>
        <div class="col-md-4">
            <x-cards.ProfileCard title="Semesters" cardImage="images/studievakken.jpg">
                <x-slot name="image">
                    <img class="img" src="{{asset('images/studievakken.jpg')}}">
                </x-slot>
                <x-slot name="descrition">
                    studievakken en stages
                </x-slot>
                <a href="{{route('plan.index',['course'=>$course])}}" class="btn btn-just-icon btn-round">
                    <i class="far fa-calendar-alt"></i>
                    <div class="ripple-container">semesters</div>
                </a>
            </x-cards.ProfileCard>
        </div>
    </div>
@endsection
