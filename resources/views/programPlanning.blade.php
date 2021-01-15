@extends('layouts.layout')

@section('title')
    Programma planning
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-6">
            Programma planning<br />
            <span class="h5">{{$program->title}}</span>
        </div>
        <div class="col-md-6" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('program.semester.create',['program'=>$program])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                studievak toevoegen
            </x-form.modal-button>

            <x-form.modal-button data-target="#formModal"
                                 data-url="{{route('program.semester.create',['program'=>$program,'stage'=>true])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Stage toevoegen
            </x-form.modal-button>
        </div>
    </div>


    @foreach($semesters as $semester=>$periods)
        <x-cards.card-w-full :title="'Semester '.$semester" class="my-4" :withFoot="false">
            @if(array_key_exists(2,$periods))
                @foreach($periods as $period=>$subjects)
                    <x-cards.card-w-full :title="'Periode '.$period" class="my-4" :withFoot="false">
                        <div class="d-flex flex-wrap">
                            @foreach($subjects as $subject)
                                <div class="p-2">
                                    <div
                                        class="card bg-gray d-flex h-100" style="{{$subject->subject->co_op==1?'background-color: #ffe680;':''}}">
                                        <div class="d-flex flex-row border-bottom justify-content-between">
                                            <div class="p-2">
                                                {{$subject->subject->title}} ({{$subject->subject->e_credit}} EC's)
                                            </div>
                                            <div class="p-2">
                                                <form method="POST"
                                                      action="{{route('program.semester.destroy',['program'=>$program,'semester'=>$subject])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger mx-2 align-self-center">X</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="flex-row">
                                            <div class="p-2" style="width: 200px;">
                                                competenties:
                                                <ul style="list-style-position: inside; list-style-type: disc;">
                                                    @foreach($subject->subject->attachedCompetences as $competence)
                                                        <li>{{$competence->title}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </x-cards.card-w-full>
                @endforeach
            @else
                <div class="d-flex flex-wrap">
                    @foreach($periods as $period=>$subjects)
                        @foreach($subjects as $subject)
                            <div class="p-2">
                                <div
                                    class="card bg-gray d-flex h-100" style="{{$subject->subject->co_op==1?'background-color: #ffe680;':''}}">
                                    <div class="d-flex flex-row border-bottom justify-content-between">
                                        <div class="p-2">
                                            {{$subject->subject->title}} ({{$subject->subject->e_credit}} EC's)
                                        </div>
                                        <div class="p-2">
                                            <form method="POST"
                                                  action="{{route('program.semester.destroy',['program'=>$program,'semester'=>$subject])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mx-2 align-self-center">X</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="flex-row">
                                        <div class="p-2" style="width: 200px;">
                                            competenties:
                                            <ul style="list-style-position: inside; list-style-type: disc;">
                                                @foreach($subject->subject->attachedCompetences as $competence)
                                                    <li>{{$competence->title}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endif
        </x-cards.card-w-full>
    @endforeach
@endsection
