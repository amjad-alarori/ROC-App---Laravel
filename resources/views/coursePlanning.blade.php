@extends('layouts.layout')

@section('title')
    Opleiding planning
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-6">
            Opleiding planning<br/>
            <span class="h5">{{$course->title}}</span>
        </div>
        <div class="col-md-6" style="text-align: end">
            <x-form.modal-button data-target="#formModal" data-url="{{route('plan.create',['course'=>$course])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                studievak toevoegen
            </x-form.modal-button>

            <x-form.modal-button data-target="#formModal"
                                 data-url="{{route('plan.create',['course'=>$course,'stage'=>true])}}"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Stage toevoegen
            </x-form.modal-button>

            <form method="POST" action="{{route('plan.store',['course'=>$course,'standard'=>true])}}">
                @csrf
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                    Programma planning ophalen
                </button>
            </form>
        </div>
    </div>

    @foreach($plans as $semester=>$periods)
        <x-cards.cardwfull :title="'Semester '.$semester" class="my-4" :withFoot="false">
            @if(array_key_exists(2,$periods))
                @foreach($periods as $period=>$subjects)
                    <x-cards.cardwfull :title="'Periode '.$period" class="my-4" :withFoot="false">
                        <div class="d-flex flex-wrap">
                            @foreach($subjects as $subject)
                                <div class="p-2">
                                    <div
                                        class="card bg-gray d-flex h-100"
                                        style="{{$subject->subject->co_op==1?'background-color: #ffe680;':''}}">
                                        <div class="d-flex flex-row border-bottom justify-content-between">
                                            <div class="p-2">
                                                {{$subject->subject->title}} ({{$subject->subject->e_credit}} EC's)
                                            </div>
                                            <div class="p-2">
                                                <a href="{{route('subjectGrades',['coursePlan'=>$subject])}}" class="btn btn-just-icon btn-round ml-2"
                                                   style="background-color: orange">
                                                    <i class="fas fa-drafting-compass" style="font-size: 18px;"></i>
                                                </a>
                                            </div>
                                            <div class="p-2">
                                                <form method="POST"
                                                      action="{{route('plan.destroy',['course'=>$course,'coursePlan'=>$subject])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger mr-2 align-self-center">X</button>
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
                    </x-cards.cardwfull>
                @endforeach
            @else
                <div class="d-flex flex-wrap">
                    @foreach($periods as $period=>$subjects)
                        @foreach($subjects as $subject)
                            <div class="p-2">
                                <div
                                    class="card bg-gray d-flex h-100"
                                    style="{{$subject->subject->co_op==1?'background-color: #ffe680;':''}}">
                                    <div class="d-flex flex-row border-bottom justify-content-between">
                                        <div class="p-2">
                                            {{$subject->subject->title}} ({{$subject->subject->e_credit}} EC's)
                                        </div>
                                        <div class="p-2">
                                            <a href="{{route('subjectGrades',['coursePlan'=>$subject])}}" class="btn btn-just-icon btn-round ml-2"
                                               style="background-color: orange">
                                                <i class="fas fa-drafting-compass" style="font-size: 18px;"></i>
                                            </a>
                                        </div>
                                        <div class="p-2">
                                            <form method="POST"
                                                  action="{{route('plan.destroy',['course'=>$course,'coursePlan'=>$subject])}}">
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
        </x-cards.cardwfull>
    @endforeach
@endsection
