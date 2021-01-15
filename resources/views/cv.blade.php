@extends('layouts.layout')

@section('title')

CV
@endsection


@section('content')
<div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
    <div class="col-md-4">Mijn CV</div>
    <div class="col-md-8" style="text-align: end">
        <x-form.modal-button data-target="#formModal" data-url="{{route('cv.create')}}"
                             class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
            Voeg CV toe


        </x-form.modal-button>
    </div>
</div>

<br>



            @foreach ($cv as $cvProperty)
            <div class="cv">
                Personalia
            </div>

            <br>

            <div class="row">
                <div class="col-sm-2">
                    <span class="cvProperties">Voornaam:</span><br>
                    <span class="cvProperties">Achternaam:</span><br>
                    <span class="cvProperties">Geboortedatum:</span><br>

                </div>
                <div class="col-sm-2">
                    <span class="cvProperties">{{$cvProperty->firstName}}</span><br>
                    <span class="cvProperties">{{$cvProperty->lastName}}</span><br>
                    <span class="cvProperties">{{$cvProperty->birthDate}}</span><br>
                </div>

                <div class="col-sm-2">
                    <span class="cvProperties">Adres:</span><br>
                    <span class="cvProperties">Postcode:</span><br>
                    <span class="cvProperties">Woonplaats:</span><br>
                </div>

                <div class="col-sm-2">
                    <span class="cvProperties">{{$cvProperty->address}}</span><br>
                    <span class="cvProperties">{{$cvProperty->zip_code}}</span><br>
                    <span class="cvProperties">{{$cvProperty->city}}</span><br>

                </div>

                <div class="col-sm-2">
                    <span class="cvProperties">Email:</span><br>
                    <span class="cvProperties">Telefoon nummer:</span><br>
                </div>

                <div class="col-sm-2">
                    <span class="cvProperties">{{$cvProperty->email}}</span><br>
                    <span class="cvProperties">{{$cvProperty->phone_nr}}</span><br>
                </div>
            </div>

            <br>
            <br>

            <div class="cv">
                Opleidingen
            </div>

            <br>

            <div class="opleidingsGraad">
                MBO
            </div>


            <div class="col-sm-6">

                <span class="cvProperties"> Opleiding: {{$cvProperty->education_mbo}}</span><br>
                <span class="cvProperties">Onderwijs instantie: {{$cvProperty->institute_mbo}}</span> <br>
                <span class="cvProperties">Van {{$cvProperty->startDate_mbo}} tot {{$cvProperty->endDate_mbo}}</span>
            </div>

            <br>

            <div class="opleidingsGraad">
                Voortgezet onderwijs
            </div>
                <div class="col-sm-6">
                    <span class="cvProperties"> Niveau: {{$cvProperty->level}} </span><br>
                    <span class="cvProperties">Onderwijs instantie: {{$cvProperty->institute_middle}}</span> <br>
                    <span class="cvProperties">Van {{$cvProperty->startDate_middle}} tot {{$cvProperty->endDate_middle}}</span>
                </div>

            <br>

            <div class="opleidingsGraad">
                Basis onderwijs
            </div>
            <div class="col-sm-6">
                <span class="cvProperties">Onderwijs instantie: {{$cvProperty->institute_basic}}</span> <br>
                <span class="cvProperties">Van {{$cvProperty->startDate_basic}} tot {{$cvProperty->endDate_basic}}</span>
            </div>

            <br>

            <div class="cv">
               Werkervaring
            </div>

            <br>

            <div class="col-sm-6">
                <span class="cvProperties">Werkgever: {{$cvProperty->company}}</span> <br>
                <span class="cvProperties">Functie:  {{$cvProperty->function}}</span> <br>
                <span class="cvProperties">Van {{$cvProperty->startDate_work}} tot {{$cvProperty->endDate_work}}</span>
            </div>
            <br>

            <div class="cv">
                Overig
            </div>

            <br>
            <div class="row">
            <div class="col-sm-6">
                <div class="overig">
                    Hobby's
                </div>
                <span class="cvProperties">&nbsp;- {{$cvProperty->hobbyOne}}</span> <br>
                <span class="cvProperties">&nbsp;- {{$cvProperty->hobbyTwo}}</span> <br>
                <span class="cvProperties">&nbsp;- {{$cvProperty->hobbyThree}}</span><br>
                <span class="cvProperties">&nbsp;- {{$cvProperty->hobbyFour}}</span>
            </div>


                <div class="col-sm-6">
                    <div class="overig">
                        Vaardigheden
                    </div>
                    <span class="cvProperties">&nbsp;- {{$cvProperty->skillOne}} </span> <br>
                    <span class="cvProperties">&nbsp;- {{$cvProperty->skillTwo}} </span> <br>
                    <span class="cvProperties">&nbsp;- {{$cvProperty->skillThree}} </span> <br>
                    <span class="cvProperties">&nbsp;- {{$cvProperty->skillFour}} </span>

                </div>


            </div>
            <br>
            <br>

            @if(auth()->user()->role=== 1)

                <div class="row">
                <div class="col-md-6 col-sm-12">

                        <x-form.modal-button data-target="#formModal"
                                             data-url="{{route('cv.edit',['cv'=> $cvProperty])}}"
                                             class="btn btn-warning btn-block float-right">Wijzigen
                        </x-form.modal-button>
                    </div>
                    <div class="col-md-6 col-sm-12">

                        <form method="POST"
                              action="{{route('cv.destroy', ['cv'=> $cvProperty])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-block float-right"
                                   value="Verwijderen">
                        </form>
                    </div>
                </div>

                @endif

            @endforeach





    @endsection

@section('script')


@endsection

















