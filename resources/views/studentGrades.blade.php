@extends('layouts.layout')

@section('title')
    Cijfers
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-6">
            Cijfers van<br/>
            <span class="h5">{{$student->name}}</span>
        </div>
    </div>
    <form method="POST" action="{{route('studentGrades.update',['course'=> $course,'student'=>$student])}}">
        @csrf
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="w-20" scope="col">Vak</th>
                <th class="w-50 text-center" scope="col"></th>
                <th class="w-15 text-center" scope="col">geslaagt</th>
                <th class="w-15 text-center" scope="col">definitief</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plans as $plan)
                <tr scope="row">
                    <td>{{$plan->subject->title}}</td>
                    <td>
                        @if($coOpLocations[$plan->id] !== null)
                            <div class="d-flex flex-row flex-wrap justify-content-between">

                                @if($coOpLocations[$plan->id] === false)
                                    <span>nog niet alle competenties behaald</span>
                                    <button class="btn btn-secondary" disabled>Stageplek</button>
                                @else
                                    <span>Stage locatie:&nbsp;&nbsp;{{optional($coOpLocations[$plan->id])->name}}</span>
                                    @if($plan->grades->count()===0 || ($plan->grades->count()>0&& !$plan->grades->offsetGet(0)->passed))
                                        @if($coOpLocations[$plan->id] === true)
                                            <x-form.modal-button data-target="#formModal"
                                                                 data-url="{{route('coOpLocationForm',['plan'=>$plan, 'student'=>$student])}}"
                                                                 class="btn btn-success">toevoegen
                                            </x-form.modal-button>
                                        @else
                                            <x-form.modal-button data-target="#formModal"
                                                                 data-url="{{route('coOpLocationForm',['plan'=>$plan,'student'=>$student])}}"
                                                                 class="btn btn-warning">wijzigen
                                            </x-form.modal-button>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        @endif

                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input passBox" id="{{$plan->id}}" type="checkbox"
                                   name="passedBox[]" value="{{$plan->id}}"
                                {{$plan->grades->count()>0?($plan->grades->offsetGet(0)->passed?'checked':''):''}}
                                {{$plan->grades->count()>0?($plan->grades->offsetGet(0)->definitive?'disabled':''):''}}>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input defBox" id="defBox{{$plan->id}}" type="checkbox"
                                   name="defBox[]" value="{{$plan->id}}"
                                {{$plan->grades->count()>0?($plan->grades->offsetGet(0)->definitive?'checked':''):''}}>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <div class="d-flex justify-content-end">
                        <input
                            class="btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4"
                            type="submit" value="verzenden">
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('[type=checkbox]').map(function () {
                let chkBoxElement = $('#' + this.id);
                if (chkBoxElement.hasClass('passBox')) {
                    let cBoxId = this.id;

                    if (!this.checked) {
                        $("#defBox" + cBoxId).prop("checked", false);
                        $("#defBox" + cBoxId).attr("disabled", "disabled");
                    }
                }
            })

            $('[type=checkbox]').on('change', function () {
                let chkBoxElement = $('#' + this.id);
                if (chkBoxElement.hasClass('passBox')) {
                    let cBoxId = this.id;

                    if (this.checked) {
                        $("#defBox" + cBoxId).removeAttr("disabled");
                    } else {
                        $("#defBox" + cBoxId).prop("checked", false);
                        $("#defBox" + cBoxId).attr("disabled", "disabled");
                    }
                } else if (chkBoxElement.hasClass('defBox')) {
                    let cBoxId = this.id;
                    cBoxId = cBoxId.substring(6, cBoxId.length)

                    if (this.checked) {
                        $("#" + cBoxId).attr("disabled", "disabled");
                    } else {
                        $("#" + cBoxId).removeAttr("disabled");
                    }

                }
            });
        });
    </script>
@endsection
