@extends('layouts.layout')

@section('title')
    Studenten
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-4">Studenten</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('enrollment.create',['course'=>$course])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                studenten toevoegen
            </x-form.modal-button>
        </div>
    </div>
    <div class="d-flex flex-row flex-wrap justify-content-around">
        @foreach($course->students as $student)
            <x-cards.profile-card title="{{$student->name}}" cardImage="" style="max-width: 350px;">
                <x-slot name="image">
                    <img class="img" src="{{asset('images/rocafbeelding3.jpg')}}">
                </x-slot>
                <x-slot name="descrition">
                </x-slot>
                <form method="POST" action="{{route('enrollment.destroy',['course'=>$course, 'enrollment'=>$student])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-just-icon btn-round">
                        <i class="far fa-window-close"></i>
                        <div class="ripple-container">stoppen</div>
                    </button>
                </form>
                <a href="{{route('QDossier',['user'=> $student, 'course'=>$course])}}" class="btn btn-just-icon btn-round">
                    <i class="fas fa-tasks"></i>
                    <div class="ripple-container">K-dossier</div>
                </a>
                <a href="{{route('studentDash')}}" class="btn btn-just-icon btn-round">
                    <i class="far fa-eye"></i>
                    <div class="ripple-container">dashboard</div>
                </a>
            </x-cards.profile-card>
        @endforeach
    </div>
@endsection
