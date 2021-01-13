@extends('layouts.layout')

@section('title')
    Kies een opleiding
@endsection


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        Kies een opleiding

                    </h1>
                    <hr>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">


                    <div class="row justify-content-center">
                        @foreach($courses as $course)
                            <div class="card" style="width: 20rem;display:inline-block;">
                                <img class="card-img-top" src="{{ asset('images/course2.png') }}" alt="">
                                @if(auth()->user()->role ===1)
                                <a class="card-body stretched-link" href="">
                                    <h4 class="card-title">{{$course->program->title}}</h4>
                                    <p class="card-text">Niveau: {{$course->program->degree}}<br>
                                    Jaar: {{$course->study_year}}</p>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

    </div>

{{--                        @foreach($courses as $course)--}}
{{--                    <div class="card h-100" style="width: 18rem;">--}}
{{--                        <div class="card-body">--}}
{{--                            <h3 class="h3 card-title">{{$course->program->title}}</h3>--}}
{{--                            <p class="card-text">{{$course->program->degree}}<br>--}}
{{--                            {{$course->study_year}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}


@endsection


















