@extends('layouts.layout')

@section('title')
    Stages
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">Stages</div>
    </div>

    <x-cards.cardwfull title="$stage->functie" class="my-4">

        <section>
            <p>
                <strong>
            <p> Wie zijn wij? </p></strong>
{{--            {{$company->wie_zijn_wij}}--}}

                </p>
        </section>

        <br>
        <hr>
        <br>


        <div class="row">
            <div class="col-md-5">

                <div class="row">
                    <div class="col-lg-4">
                        <strong>Functie:</strong>
                    </div>
                    <div class="col-md-8">
{{--                        {{$stage->functie}}--}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Wat ga je leren?</strong>
                    </div>
                    <div class="col-md-8">
{{--                        {{$stage->wat_te_doen}}<br>--}}
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
{{--                                - {{$stage->werkzaamheden}}--}}
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

{{--                        {{$stage->wat_zoeken_wij}}--}}
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
{{--                        {{$stage->leerweg}}--}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Aantal plaatsen:</strong>
                    </div>
                    <div class="col-md-8">
{{--                        {{$stage->aantal_plaatsen}}<br>--}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <strong>Periode: </strong>
                    </div>
                    <div class="col-md-8">
{{--                        {{$stage->start_datum}} <strong>t/m</strong> {{$stage->eind_datum}}<br>--}}
                    </div>
                </div>
                <br>

            </div>


            <x-slot name="footer">
                <div class="row justify-content-end">



                </div>
            </x-slot>
        </div>
    </x-cards.cardwfull>





@endsection


