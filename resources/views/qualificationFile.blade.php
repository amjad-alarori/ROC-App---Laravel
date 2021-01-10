@extends('layouts.layout')

@section('title')
    Kwalificatie Dossier
@endsection


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        @auth()
                            @if(auth()->user()->role == 1):
                            Mijn kwalificatie dossier
                            @else
                            Kwalificatie dossier
                            @endif
                        @endauth
                    </h1>
                    <hr>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">



            <div class="qualification-list">
                <div class="h3" id="h3qualificationDone">Behaalde competenties</div>
                <hr>
                <br>
                  <span class="qualification-wrap">
                      <input disabled type="checkbox" checked/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 1
                    </label>

                  </span>
                                <span class="qualification-wrap">
                    <input disabled type="checkbox" checked/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 2
                    </label>

                  </span>
                                <span class="qualification-wrap">
                    <input disabled type="checkbox" checked/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 3
                    </label>

                  </span>
                                <span class="qualification-wrap">
                    <input disabled type="checkbox" checked/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 4
                    </label>

                  </span>

                            </div>


                            <div class="qualification-list">
                                <div class="h3" id="h3qualificationNotDone">Nog te behalen competenties</div>
                                <hr>
                                <br>
                  <span class="qualification-wrap">
                    <input disabled type="checkbox"/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 1
                    </label>

                  </span>
                                <span class="qualification-wrap">
                    <input disabled type="checkbox"/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 2
                    </label>

                  </span>
                                <span class="qualification-wrap">
                    <input disabled type="checkbox"/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 3
                    </label>

                  </span>
                                <span class="qualification-wrap">
                    <input disabled type="checkbox"/>
                    <label for="qualification" class="qualification">
                      <i class="fa fa-check"></i>
                      Competentie 4
                    </label>

                  </span>

            </div>

        </div>
    </div>
@endsection


















