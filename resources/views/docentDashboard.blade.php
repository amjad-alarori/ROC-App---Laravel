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
                     Welkom  {{-- {{$user->name}}--}}
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
                        <form method="post" class="search" action="{{route('DashGo')}}">
                            @csrf
                            <select class="select2 single2" name="SearchId" id='searchUser' style='width: 200px;'>
                                <option value='0'>- Zoek account -</option>
                            </select>
                            <br>
                            <button class="btn btn-primary" type="submit"> Klik hier voor dashboard</button>





{{--                            <input type="text" class="searchTerm" name="searchTerm" placeholder="Wie zoek je?">--}}
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>

{{--            @foreach ($data as $searchvalue)--}}

{{--                <table>--}}
{{--                    <tr>--}}
{{--                        <th>Zoekresultaten</th>--}}

{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <td>{{$searchvalue->name}}</td>--}}

{{--                    </tr>--}}

{{--                </table>--}}

{{--                @endforeach--}}




        </div>
    </div>



    </div>
    @endsection

    @section('script')


@endsection

















