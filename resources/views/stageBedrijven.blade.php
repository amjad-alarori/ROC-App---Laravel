@extends('layouts.layout')

@section('title')
    Stage Bedrijven
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">Stage Bedrijven</div>
        <div class="col-md-8" style="text-align: end">
            @if (Auth::user()->role === 1 )

            @else
                <x-form.modal-button data-target="#formModal" data-url="{{route('stageBedrijven.create')}}"
                                     class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                    Nieuwe bedrijf
                </x-form.modal-button>
            @endif
        </div>
    </div>

    <br>
    <div class="h4"><h4><i class="fas fa-search"></i>&nbsp; Zoek een bedrijf</h4></div>
    <hr>
    <br>

    <form method="post" class="search" action="{{route('companyDash')}}">
        @csrf
        <div class="searchCompany2">
            <select class="select2 single2" name="searchId" id='searchCompany' style='width: 400px;' data-url="{{route('searchCompany')}}">
                <option value='0'>- Zoek bedrijf -</option>
            </select>&nbsp; &nbsp;
            <button class="btnSearch" type="submit" style="background-color: coral; color: white;"> Ga naar
                bedrijf
            </button>
        </div>



    </form>
    </div>
    <hr>

    @foreach($stageBedrijven as $bedrijf)

        <x-cards.cardwfull :title="$bedrijf->name" class="my-4">

            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            Adres:
                        </div>
                        <div class="col-md-8">
                            {{$bedrijf->address}} <br/>
                            {{$bedrijf->zip_code}} {{$bedrijf->city}}
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>E-mail:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$bedrijf->email}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Telefoon:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$bedrijf->phone_nr}}
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{route('stageBedrijven.show',['stageBedrijven' => $bedrijf])}}"
                   class="btn btn-primary float-right"> Meer info</a>
            </div>

            <x-slot name="footer">
                <div class="row justify-content-end">
                    @if (Auth::user()->role === 1 )

                    @else
                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <form method="POST"
                                  action="{{route('stageBedrijven.destroy',['stageBedrijven'=>$bedrijf])}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-block float-right"
                                       value="Verwijderen"></input>
                            </form>
                        </div>

                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <x-form.modal-button data-target="#formModal"
                                                 data-url="{{route('stageBedrijven.edit',['stageBedrijven'=>$bedrijf])}}"
                                                 class="btn btn-warning btn-block float-right">Wijzigen
                            </x-form.modal-button>
                        </div>
                    @endif

                </div>
            </x-slot>
        </x-cards.cardwfull>

    @endforeach
@endsection


