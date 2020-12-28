@extends('layouts.layout')

@section('title')
    Programma planning
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-6">Programma planning</div>
        <div class="col-md-6" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('semester.create',['program'=>$program])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                studievak toevoegen
            </x-form.modal-button>

            <x-form.modal-button data-target="#formModal" data-url="{{route('semester.create',['program'=>$program,'stage'=>true])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Stage toevoegen
            </x-form.modal-button>
        </div>
    </div>






@endsection
