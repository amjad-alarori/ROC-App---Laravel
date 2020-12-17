@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">Locaties</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe locatie
            </x-form.modal-button>
        </div>
    </div>
    @include('locationForm')
    @foreach($locations as $location)
        <x-cards.cardwfull :title="$location->name" class="my-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            Adres:
                        </div>
                        <div class="col-md-8">
                            {{$location->street}} {{$location->house_nr}} {{$location->house_nr_addition}}<br/>
                            {{$location->zip_code}} {{$location->city}}
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>E-mail:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$location->email}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Telefoon:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$location->phone_nr}}
                        </div>
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="row justify-content-end">
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <a href="#" class="btn btn-danger btn-block float-right">Delete</a>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <a href="#" class="btn btn-warning btn-block float-right">Edit</a>
                    </div>
                </div>
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
        $('.modal').on('hidden.bs.modal', function (e) {
            $(this)
                .find("input:not([type=hidden]),textarea,select")
                .val('')
                .end()
                .find(".valErr")
                .remove()
                .end()
        });
    </script>
@endsection
