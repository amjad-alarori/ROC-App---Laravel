@extends('layouts.layout')

@section('title')
    {{$company->name}}
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">{{$company->name}}</div>
        <div class="col-md-8" style="text-align: end">

            <x-form.modal-button data-target="#formModal" data-url="{{route('stage.create', ['stageBedrijven'=> $company])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe stageplek
            </x-form.modal-button>

        </div>
    </div>

    @foreach($stages as $stage)
        <x-cards.cardwfull :title="$stage->functie" class="my-4">

            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Functie:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$stage->functie}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Wat ga je leren?</strong>
                        </div>
                        <div class="col-md-8">
                            {{$stage->wat_te_doen}}<br>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Werkzaamhede</strong>

                        </div>

                        <div class="col-md-8">
                            <ul>
                                <li>
                                    - {{$stage->werkzaamheden}}
                                </li>
                            </ul><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Wat zoeken wij?</strong>

                        </div>

                        <div class="col-md-8">

                            {{$stage->wat_zoeken_wij}}
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
                            {{$stage->leerweg}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Aantal plaatsen:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$stage->aantal_plaatsen}}<br>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Periode: </strong>
                        </div>
                        <div class="col-md-8">
                            {{$stage->start_datum}} <strong>t/m</strong> {{$stage->eind_datum}}<br>
                        </div>
                    </div><br>
                </div>



                <i class="fa fa-heart float-left" style="font-size:24px;color:firebrick">      <a href="{{route('likes', ['stageBedrijven' => $company, 'stage' => $stage])}}" style="font-size:24px;color:black;">{{$stage->users->count()}}</a></i><br>




            <x-slot name="footer">
                <div class="row justify-content-end">
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <form method="POST" action="{{route('stage.destroy', ['stageBedrijven'=> $company, 'stage'=> $stage])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-block float-right"
                                   value="Verwijderen"></input>
                        </form>
                    </div>

                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <x-form.modal-button data-target="#formModal" data-url="{{route('stage.edit',['stageBedrijven'=>$company, 'stage'=> $stage])}}"
                                             class="btn btn-warning btn-block float-right">Wijzigen
                        </x-form.modal-button>
                    </div>
                    <div>
                        @if(!Auth::user()->stage->count())

                        <a href="{{route('stage.show',['stageBedrijven'=>$company, 'stage'=>$stage])}}"  class="btn btn-primary float-right"> Ik heb interesse</a>
                        @else
                        <a class="btn btn-primary float-right"> Ik heb interesse</a>
                        @endif
                    </div>
                </div>
            </x-slot></div>
        </x-cards.cardwfull><hr>
    @endforeach
@endsection





{{--@extends('layouts.layout')--}}


{{--@section('title')--}}
{{--    Stage Bedrijven--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">--}}

{{--        <div class="col-md-4">--}}

{{--        </div>--}}

{{--        <div class="col-md-8" style="text-align: end">--}}
{{--            <x-form.modal-button data-target="#formModal" data-url=""--}}
{{--                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">--}}
{{--                Nieuwe bedrijf--}}
{{--            </x-form.modal-button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{----}}



{{--    <h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h1>--}}

{{--@endsection--}}


