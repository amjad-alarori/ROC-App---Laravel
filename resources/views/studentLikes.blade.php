
@extends('layouts.layout')

@section('title')

    Geïnteresseerd studenten

@endsection


@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        Geïnteresseerd in deze functie
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
                @foreach($users as $user)
                <div class="col-lg-3 col-6">


                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="h3 card-title">{{$user->name}}</h3>
                            <form method="post" class="search" action="{{route('DashGo')}}">
                                @csrf
                                <button class="btn btn-primary" type="submit"> Klik hier voor dashboard</button>
                            </form>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')


@endsection

















