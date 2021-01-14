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
                        {{--                        {{$user->name . "  -  " . $user->id}}--}}
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


                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="h3 card-title">38/150</h3>
                            <p class="card-text">Behaalde competenties</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="card h-100" style="width: 18rem;">

                        <div class="card-body">
                            <h3 class="h3 card-title">53<sup style="font-size: 20px">%</sup></h3>
                            <p class="card-text">Van het kwalificatie dossier voltooid</p>

                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card h-100" style="width: 18rem;">

                        <div class="card-body">
                            <h3 class="h3 card-title">Laatst behaald</h3>
                            <p class="card-text">Laatst behaalde competentie</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card h-100" style="width: 18rem;">

                        <div class="card-body">
                            <h3 class="h3 card-title">20/50</h3>
                            <p class="card-text">Afgeronde werkprocessen</p>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            {{--            @auth()--}}
            {{--                @if(auth()->user()->role !== 1):--}}
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
            {{--                @endif--}}
            {{--            @endauth--}}
        </div>
    </div>
    <br>
    @if(auth()->user()->role === 1)
    <div class="content">
        <div class="container-fluid">

            <a href="{{route('reacties')}}" class="">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="card h-100" style="width: 18rem;">
                            <div class="card-body">
                                <h3 class="h3 card-title">
                               4
                                </h3>
                                <p class="card-text">Stage reacties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
    @endif

@endsection


















