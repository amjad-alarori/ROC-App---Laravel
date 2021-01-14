@extends('layouts.layout')

@section('title')
    Student Dashboard
@endsection


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        Dashboard
                        {{$user->name}}
                    </h1>
                    <hr>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    @auth()
                        @if(auth()->user()->role !== 3)

                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="card" style="width: 18rem; height: 220px;">
                                        <div class="card-body">
                                            <h3 class="h3 card-title">Stage reacties </h3>
                                            <p class="card-text">Bekijk de stages waarop je hebt gereageerd</p>
                                            <br>
                                            <br>
                                            @if(auth()->user()->role ===1)
                                            <a href="{{route('reacties')}}" class="btnSearch"
                                               id="btnReactions">Reacties</a>
                                            @else
                                                <a href="{{route('reacties',['student'=>$user])}}" class="btnSearch" id="btnReactions">Reacties</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endauth


                    <div id="wrapper">
                        <div id="btnQf">
                            @if(auth()->user()->role === 3)
                                <a class="btnStudentDash"
                                   href="{{route('studentsQFile', ['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'user' => $user])}}">Volledig
                                    kwalificatie dossier</a>
                            @endif
                        </div>

                        @if(auth()->user()->role ===3)

                            <div id="btnCv">
                                <a class="btnStudentDash"
                                   href="{{route('cv.show',['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'user' => $user, 'cv'=>0])}}">Bekijk
                                    CV</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <br>


        </div>
    </div>

@endsection


















