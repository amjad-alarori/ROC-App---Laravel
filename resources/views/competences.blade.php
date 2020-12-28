@extends('layouts.layout')

@section('title')
    Competenties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-4">Competenties</div>
    </div>

    <div class="d-flex flex-wrap">
        @foreach($competences as $competence)
            <div class="p-2">
                <div class="card bg-gray d-flex h-100">
                    <div class="d-flex flex-row border-bottom justify-content-between">
                        <div class="p-2">
                            {{$competence->title}}
                        </div>
                        <div class="p-2">
                            <form method="POST" action="{{route('competence.destroy',['competence'=>$competence])}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mx-2 align-self-center">X</button>
                            </form>
                        </div>
                    </div>
                    <div class="flex-row">
                        <div class="p-2" style="width: 200px;">
                            @if($competence->attachedSubjects->count()==0)
                                is niet in gebruik gebruik.
                            @else
                                In gebruik bij:
                                <ul style="list-style-position: inside; list-style-type: disc;">
                                    @foreach($competence->attachedSubjects as $subject)
                                        <li>{{$subject->title}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
