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

    <form method="POST" action="{{route('cijfer.store',['coursePlan'=>$plan])}}">
        @csrf
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="w-80" scope="col">student</th>
                <th class="w-10 text-center" scope="col">geslaagt</th>
                <th class="w-10 text-center" scope="col">definitief</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td scope="row">{{$student->name}}</td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input passBox" id="{{$student->id}}" type="checkbox"
                                   name="{{$student->id}}[]" value="passed">
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="form-check">
                            <input class="form-check-input defBox" id="defBox{{$student->id}}" type="checkbox"
                                   name="{{$student->id}}[]" value="definitive" disabled>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
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
            $('[type=checkbox]').on('change', function () {
                if (this.value == 'passed') {
                    let cBoxId = this.id;

                    if (this.checked) {
                        $("#defBox" + cBoxId).removeAttr("disabled");
                    } else {
                        $("#defBox" + cBoxId).prop("checked", false);
                        $("#defBox" + cBoxId).attr("disabled", "disabled");
                    }
                }
            });
        });
    </script>
@endsection
