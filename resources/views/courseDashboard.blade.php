@extends('layouts.layout')

@section('title')
    Opleidingen
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
    <div class="row py-4 px-2">
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-header card-header-image">
                    <a href="#">
                        <img class="img" src="{{asset('images/rocafbeelding3.jpg')}}">
                    </a>
                    <div class="colored-shadow"
                         style="background-image: url('{{asset("images/rocafbeelding3.jpg")}}'); opacity: 1;"></div>
                </div>
                <div class="card-body ">
                    <h4 class="card-title">Studenten</h4>
                    <h6 class="card-category text-gray">student management paneel</h6>


                </div>
                <div class="card-footer justify-content-center">
                    <a href="#" class="btn btn-just-icon btn-twitter btn-round">
                        <i class="fas fa-users"></i>
                        <div class="ripple-container">lijst</div>
                    </a>
                    <a href="#" class="btn btn-just-icon btn-twitter btn-round">
                        <i class="fas fa-medkit"></i>
                        <div class="ripple-container">stages</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-header card-header-image">
                    <a href="#">
                        <img class="img" src="{{asset('images/studievakken.jpg')}}">
                    </a>
                    <div class="colored-shadow"
                         style="background-image: url('{{asset("images/studievakken.jpg")}}'); opacity: 1;"></div>
                </div>
                <div class="card-body ">
                    <h4 class="card-title">Semesters</h4>
                    <h6 class="card-category text-gray">studievakken en stages</h6>


                </div>
                <div class="card-footer justify-content-center">
                    <a href="#" class="btn btn-just-icon btn-twitter btn-round">
                        <i class="fas fa-users"></i>
                        <div class="ripple-container">lijst</div>
                    </a>
                    <a href="#" class="btn btn-just-icon btn-twitter btn-round">
                        <i class="fas fa-medkit"></i>
                        <div class="ripple-container">stages</div>
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
