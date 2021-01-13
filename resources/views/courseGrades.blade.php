@extends('layouts.layout')

@section('title')
    Cijfers
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col-md-6">
            Cijfers<br/>
            <span
                class="h5">{{$plan->subject->title . " " . $plan->course->study_year . " (" .$campus->name . ")"}}</span>
        </div>
    </div>

    <form method="POST" action="{{route('cijfer.store',['course'=> $course,'coursePlan'=>$plan])}}">
        @csrf
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="w-20" scope="col">student</th>
                <th class="w-50 text-center" scope="col"></th>
                <th class="w-15 text-center" scope="col">geslaagt</th>
                <th class="w-15 text-center" scope="col">definitief</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plan->course->students as $student)
                <tr scope="row">
                    <td>{{$student->name}}</td>
                    <td>
                        @if($coOpLocations !== null)
                            <div class="d-flex flex-row flex-wrap justify-content-between">
                                @if($coOpLocations[$student->id] === false)
                                    <span>nog niet alle competenties behaald</span>
                                    <button class="btn btn-secondary" disabled>Stageplek</button>
                                @else
                                    <span>Stage locatie:&nbsp;&nbsp;{{optional($coOpLocations[$student->id])->name}}</span>
                                    @if($coOpLocations[$student->id] === true)
                                        <x-form.modal-button data-target="#formModal"
                                                             data-url="{{route('coOpLocationForm',['plan'=>$plan])}}"
                                                             class="btn btn-success">toevoegen
                                        </x-form.modal-button>
                                    @else
                                        <x-form.modal-button data-target="#formModal"
                                                             data-url="{{route('coOpLocationForm',['plan'=>$plan])}}"
                                                             class="btn btn-warning">wijzigen
                                        </x-form.modal-button>
                                    @endif
                                @endif
                            </div>
                        @endif

                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input passBox" id="{{$student->id}}" type="checkbox"
                                   name="passedBox[]" value="{{$student->id}}"
                                {{array_key_exists($student->id,$filledStudents)?($filledStudents[$student->id]->passed?'checked':''):''}}
                                {{array_key_exists($student->id,$filledStudents)?($filledStudents[$student->id]->definitive?'disabled':''):''}}>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input defBox" id="defBox{{$student->id}}" type="checkbox"
                                   name="defBox[]" value="{{$student->id}}"
                                {{array_key_exists($student->id,$filledStudents)?($filledStudents[$student->id]->definitive?'checked':''):''}}>
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
