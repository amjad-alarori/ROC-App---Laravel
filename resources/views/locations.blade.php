@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Locaties</div>
        <div class="col-sm-8">
            <x-form.modal-button class="btn btn-primary my-4 float-right">Nieuwe locatie</x-form.modal-button>
        </div>
    </div>
    @include('locationForm')
    @foreach($locations as $location)
        <x-cards.cardwfull :title="$location->name" class="my-4">

            <x-slot name="footer">
                <a href="#" class="btn btn-primary block float-right">View Profile</a>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
@section('script')
    <script>
        $(function () {
            @if(count($errors)>0)
                $('#ModalComponent').modal('show')
            @endif
        })
        $('#ModalComponent').on('shown.bs.modal', function () {
            $('#name').trigger('focus')
        })
        $('.modal').on('hidden.bs.modal', function(e)
        {
            $(this)
                .find("input:not([type=hidden]),textarea,select")
                .val('')
                .end()
                .find(".valErr")
                .remove()
                .end()
        }) ;
    </script>
@endsection
