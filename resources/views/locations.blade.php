@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-md-4">Locaties</div>
        <div class="col-md-8" style="text-align: end">
            <x-form.modal-button data-target="#ModalComponent"
                                 class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                Nieuwe locatie
            </x-form.modal-button>
        </div>
    </div>
    <form id="locationForm" method="Post" action="{{route('campus.store')}}">
        <x-form.modal title="Nieuwe locatoe toevoegen" submitText="opslaan" id="ModalComponent">
            @include('locationForm')
        </x-form.modal>
    </form>

    <form id="editForm" method="Post">
        <x-form.modal title="Edit locatoe" submitText="bijwerken" id="editModal">
{{--            @method('PUT')--}}
            @include('locationEdit')
        </x-form.modal>
    </form>

    @foreach($campuses as $campus)
        <x-cards.cardwfull :title="$campus->name" class="my-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            Adres:
                        </div>
                        <div class="col-md-8">
                            {{$campus->street}} {{$campus->house_nr}} {{$campus->house_nr_addition}}<br/>
                            {{$campus->zip_code}} {{$campus->city}}
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>E-mail:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$campus->email}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <strong>Telefoon:</strong>
                        </div>
                        <div class="col-md-8">
                            {{$campus->phone_nr}}
                        </div>
                    </div>
                </div>
            </div>
            <x-slot name="footer">
                <div class="row justify-content-end">
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <form method="POST" action="{{route('campus.destroy',['campus'=>$campus])}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-block float-right"
                                   value="Verwijderen"></input>
                        </form>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <button data-id="{{$campus->id}}" class="btn btn-warning btn-block float-right editBtn">
                            Wijzigen
                        </button>
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

            $('.editBtn').each(function () {
                let id = $(this).data('id');
                let url = "{{route('campus.edit',['campus'=>':id'])}}";
                url = url.replace(':id', id);

                $(this).on('click', function () {
                    $.get(url)
                        .done(function (data) {
                            let editUrl = "{{route('campus.update',['campus'=>':camp'])}}";
                            editUrl=editUrl.replace(':camp',id);
                            let camp = JSON.parse(data);

                            $('#editForm').attr('action',editUrl)
                            $('#editname').val(camp.name);
                            $('#editstreet').val(camp.street);
                            $('#editnr').val(camp.house_nr);
                            $('#editaddition').val(camp.house_nr_addition);
                            $('#editzip').val(camp.zip_code);
                            $('#editcity').val(camp.city);
                            $('#editemail').val(camp.email);
                            $('#editphone').val(camp.phone_nr);

                            $('#editModal').modal('show');
                        })
                        .fail(function () {
                            alert('Somthing went wrong, refresh the page and try it again!');
                        });
                })
            })

        })
        $('#editModal').on('hidden.bs.modal',function () {
            $('#editForm').removeAttr('action');
        });

        $('#ModalComponent').on('shown.bs.modal', function () {
            $('#name').trigger('focus')
        });

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
