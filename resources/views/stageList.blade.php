@extends('layouts.layout')

@section('title')
    Stages
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">Stages</div>
    </div>

    <div class="row">

        <div class="col-md-4 col-sm-4">
            <br>
            <br>
            <h5 class="h5">
                Filter
            </h5>
            <hr>
            <br>
            Selecteer een werksector om stages te filteren:

            <form method="GET" action="{{route('stageList')}}">
                <select name="filterKey">
                    <option value=0>Geen filter</option>
                    @foreach ($sectors as $sector)
                        <option
                            value="{{$sector->id}}" {{isset($filterId)?(intval($filterId)===$sector->id?"selected":""):""}}>{{$sector->title}}</option>
                    @endforeach
                </select>
                <button class="btnSearch" type="submit">Filter</button>
            </form>
        </div>

        <div class="col-md-8 col-sm-8">
            <br>
            <div class="column-stages">

                @foreach($stages as $stage)
                    <div class="accordionStageList" id=-"accordion">
                        <div class="card">
                            <div class="card-header" id="heading{{$stage->id}}">
                                <div class="row" id="headerStages">
                                    <div class="col-md-4">
                                        <h4 class="h4 header">
                                            {{$stage->functie}}
                                        </h4>
                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="h5" style="text-align: end">
                                            {{$stage->stageBedrijven->name}}
                                        </h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <span class="stageAttributes">Wat ga je doen?</span><br>
                                        {{$stage->wat_te_doen}}<br>
                                        <br>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <span class="stageAttributes">Leerweg</span><br>
                                        {{$stage->leerweg}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <span class="stageAttributes">Voor welke periode?</span><br>
                                        Vanaf {{date("d/m/Y",strtotime($stage->start_datum))}}
                                        tot {{date("d/m/Y",strtotime($stage->eind_datum))}}
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <span class="stageAttributes">Werksector</span><br>
                                        {{$stage->area->title}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12" style="text-align: start">
                                        @if(auth()->user()->role===1)
                                            @if($stage->users->where('id', '=', auth()->id())->count() === 0)

                                                <a href="{{route('stage.show',['stageBedrijven'=>$stage->stageBedrijven,'stage'=>$stage])}}"
                                                   class="btn btn-primary float-right confirm"> Ik heb interesse</a>

                                            @else

                                                <a href="{{route('stage.likes.undo',['stageBedrijven'=>$stage->stageBedrijven, 'stage'=>$stage])}}"
                                                   class="btn btn-info float-right diconfirm"> Niet meer
                                                    Geïnteresseerd</a>

                                            @endif
                                        @endif

                                    </div>
                                    <div class="col-md-6 col-sm-12" style="text-align: end">
                                        <button class="btnSearch" data-toggle="collapse"
                                                data-target="#collapse{{$stage->id}}" aria-expanded="true"
                                                aria-controls="collapse{{$stage->id}}">
                                            Meer info
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="collapse{{$stage->id}}" class="collapse" aria-labelledby="heading">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 col-sm-12">
                                    <span class="stageAttributes">
                                        Wat zoeken wij?
                                    </span><br>
                                        {{$stage->wat_zoeken_wij}}
                                    </div>
                                    <br>
                                    <div class="col-md-6 col-sm-12">
                                    <span class="stageAttributes">
                                        Werkzaamheden
                                    </span><br>
                                        {{$stage->werkzaamheden}}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                    <span class="stageAttributes">
                                        Totaal aantal plaatsen
                                    </span><br>
                                        {{$stage->aantal_plaatsen}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



    {{--        <section>--}}
    {{--            <p>--}}
    {{--                <strong>--}}
    {{--            <p> Wie zijn wij? </p></strong>--}}
    {{--            {{$company->wie_zijn_wij}}--}}

    {{--                </p>--}}
    {{--        </section>--}}

    {{--        <br>--}}
    {{--        <hr>--}}
    {{--        <br>--}}


    {{--        <div class="row">--}}
    {{--            <div class="col-md-5">--}}

    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Functie:</strong>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        {{$stage->functie}}--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <br>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Wat ga je leren?</strong>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        {{$stage->wat_te_doen}}<br>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <br>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Werkzaamhede</strong>--}}

    {{--                    </div>--}}

    {{--                    <div class="col-md-8">--}}
    {{--                        <ul>--}}
    {{--                            <li>--}}
    {{--                                - {{$stage->werkzaamheden}}--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                        <br>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Wat zoeken wij?</strong>--}}

    {{--                    </div>--}}

    {{--                    <div class="col-md-8">--}}

    {{--                        {{$stage->wat_zoeken_wij}}--}}
    {{--                        <br>--}}
    {{--                    </div>--}}

    {{--                </div>--}}

    {{--            </div>--}}


    {{--            <div class="col-md-5">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Leerweg: </strong><br>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        {{$stage->leerweg}}--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <br>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Aantal plaatsen:</strong>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        {{$stage->aantal_plaatsen}}<br>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <br>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-lg-4">--}}
    {{--                        <strong>Periode: </strong>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-8">--}}
    {{--                        {{$stage->start_datum}} <strong>t/m</strong> {{$stage->eind_datum}}<br>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <br>--}}

    {{--            </div>--}}







@endsection


