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
                        @if(auth()->user()->role ===1)
                        @foreach($courses as $course)
                        <form method="post" action="{{route('myQFile', ['user'=>$user, 'course'=>$course])}}">
                            @csrf
                            <div class="card" style="width: 20rem;display:inline-block;">
                                <img class="card-img-top" src="{{ asset('images/course2.png') }}" alt="">

                                    <h4 class="card-title">{{$course->program->title}}</h4>
                                    <p class="card-text">Niveau: {{$course->program->degree}}<br>
                                    Jaar: {{$course->study_year}}</p>
                                <br>

                            <div class="card-footer">
                                <button class="btnSearch" type="submit">Kwalificatie dossier</button>
                            </div>
                            </div>
                        </form>
                        @endforeach
                        @endif

                        @if(auth()->user()->role ===3)
                                @foreach($courses as $course)
                                    <form method="post" action="{{route('studentsQFile', ['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'user'=>$user, 'course'=>$course])}}">
                                        <div class="card" style="width: 20rem;display:inline-block;">
                                            <img class="card-img-top" src="{{ asset('images/course2.png') }}" alt="">
                                            <input type="hidden" name="course" value="{{$course->id}}">

                                            <h4 class="card-title">{{$course->program->title}}</h4>
                                            <p class="card-text">Niveau: {{$course->program->degree}}<br>
                                                Jaar: {{$course->study_year}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btnSearch" type="submit">Kwalificatie dossier</button>
                                        </div>
                                    </form>
                                @endforeach
                            @endif

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


















