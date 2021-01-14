@extends('layouts.layout')

@section('title')

    Docent Dashboard
@endsection


@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        Welkom {{-- {{$user->name}}--}}
                    </h1>

                    <hr>
                    <br>
                </div>
                <div class="col-sm-6">

                    <div class="col-md-12" style="text-align: end">
                        <x-form.modal-button data-target="#formModal" data-url="{{route('docent.create')}}"
                                             class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                            Nieuwe gebruiker toevoegen


                        </x-form.modal-button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">


            <div class="wrap">
                <div class="h4"><h4>Zoek een student</h4></div>
                <hr>
                <form method="post" class="search" action="{{route('studentDash')}}">
                    @csrf
                    <div class="searchUser2">
                        <select class="select2 single2" name="SearchId" id='searchUser' style='width: 400px;' data-url="{{route('searchUser')}}">
                            <option value='0'>- Zoek account -</option>
                        </select>&nbsp; &nbsp;
                        <button class="btnSearch" type="submit" style="background-color: coral; color: white;"> Ga naar
                            account
                        </button>
                    </div>



                </form>
            </div>



        </div>
    </div>



    </div>
@endsection

@section('script')


@endsection

















