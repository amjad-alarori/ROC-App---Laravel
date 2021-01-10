@extends('layouts.layout')

@section('title')
    Kwalificatie Dossier
@endsection

@section('content')
    <div class="content-header container-fluid">
        <div class="row mb-5">
            <div class="col">
                <h1 class="h1">
                    @if(!isset($user))
                        <span>Mijn kwalificatie dossier</span>
                    @else
                        <span>Kwalificatie dossier {{$user->name}}</span>
                    @endif
                </h1>
                <hr>
            </div>
        </div>
    </div>

    <div class="content container-fluid">
        @foreach($competencesArray as $competences)
            <div class="qualification-list">
                <div class="h3 mb-3"
                     id="h3qualificationDone">{{$loop->index === 0 ?"Behaalde competenties":"Nog te behalen competenties"}}</div>
                <hr>
                @foreach($competences as $competence)
                    <span class="qualification-wrap">
                    <input class="compCheckBox" disabled type="checkbox" {{$loop->parent->index === 0 ?"checked":""}}/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      {{$competence->title}}
                    </label>
                  </span>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection


















