@extends('layouts.layout')

@section('title')
    Studievakken
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-4">Studievakken</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('subject.create')}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe vak
            </x-form.modal-button>
        </div>
    </div>


    @foreach($subjects as $subject)
        <x-cards.cardwfull title="" class="my-4">
            <div class="row">
                <div class="col-6">
                    {{$subject->title}}<br/>
                    {{$subject->e_credit}} EC's
                </div>
                <div class="col">
                    {{$subject->program_id != null ? 'Opleiding: '. $subject->program->title:''}}
                </div>
            </div>

            <x-slot name="footer">
                <div class="row justify-content-end">
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <form method="POST" action="{{route('subject.destroy',['subject'=>$subject])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="far btn btn-block" value="&#xf2ed;"
                                   style="font-size:20px; color:red">
                        </form>
                        <x-form.modal-button data-target="#formModal"
                                             data-url="{{route('subject.edit',['subject'=>$subject])}}"
                                             class="btn btn-block float-right">
                            <i class='fas fa-pencil-alt'
                               style="font-size:20px; color: orange"></i>
                        </x-form.modal-button>
                    </div>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
