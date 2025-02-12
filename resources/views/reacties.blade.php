@extends('layouts.layout')

@section('title')
    Stages
@endsection

@section('content')

@foreach($reactions as $reaction)

<div class="card">
    <h5 class="card-header">

        {{$reaction->stageBedrijven->name}}
    </h5>
            @auth()
            @if (auth()->user()->role === 1 )

            @if($reaction->users->where('id', '=', auth()->id())->count() > 0)



                <a href="{{route('stage.likes.undo',['stageBedrijven'=>$reaction->stageBedrijven, 'stage'=>$reaction])}}"
                   class="btn btn-info float-right diconfirm"> Niet meer
                    Geïnteresseerd</a>



                {{--            @else--}}
{{--                <a href="{{route('likes', ['stageBedrijven' => $company, 'stage' => $stage])}}"--}}
{{--                   style="font-size:24px;color:black;"><i class="fa fa-heart float-right"--}}
{{--                                                          style="font-size:24px;color:firebrick"> {{$stage->users->count()}}</i></a>--}}
             @endif
            @endif
            @endauth






    <div class="card-body">
        <h5 class="card-title float-center">

            <div class="row">
                <div class="col-md-5">

                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Functie:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$reaction->functie}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Wat ga je leren?</strong>
                        </div>
                        <div class="col-md-8">
                            {{$reaction->wat_te_doen}}<br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Werkzaamhede</strong>

                        </div>

                        <div class="col-md-8">
                            <ul>
                                <li>
                                    - {{$reaction->werkzaamheden}}
                                </li>
                            </ul>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Wat zoeken wij?</strong>

                        </div>

                        <div class="col-md-8">

                            {{$reaction->wat_zoeken_wij}}
                            <br>
                        </div>

                    </div>

                </div>


                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Leerweg: </strong><br>
                        </div>
                        <div class="col-md-8">
                            {{$reaction->leerweg}}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Aantal plaatsen:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$reaction->aantal_plaatsen}}<br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Periode: </strong>
                        </div>
                        <div class="col-md-8">
                            {{$reaction->start_datum}} <strong>t/m</strong> {{$reaction->eind_datum}}<br>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
            </div>

        </h5><br>



        <a href="{{route('dashboard.index')}}" class="btn btn-primary ">Terug naar Dashboard</a><br>
    </div>

    </div><br>
    @endforeach
@endsection



