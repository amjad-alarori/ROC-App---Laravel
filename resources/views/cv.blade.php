@extends('layouts.layout')

@section('title')

CV
@endsection


@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        Mijn CV
                    </h1>
                    <hr>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="cv">
                Personalia

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <span class="cvProperties">Voornaam:</span><br>
                    <span class="cvProperties">Achternaam:</span><br>
                    <span class="cvProperties">Geboortedatum:</span><br>

                </div>
                <div class="col-sm-6">
                    Woonplaats:<br>
                    Adres:<br>

                </div>

            </div>


        </div>


    </div>
    @endsection

@section('script')


@endsection

















