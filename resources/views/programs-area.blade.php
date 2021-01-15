@extends('layouts.layout')

@section('title')
    Sectoren
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Sectoren</div>
            <div class="col-md-8" style="text-align: end">
                <x-form.modal-button data-target="#formModal" data-url="{{route('study.create')}}"
                                     class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                    Nieuwe sector
                </x-form.modal-button>
            </div>
    </div>
    @foreach($programArea as $programArea)
        <x-cards.card-w-full :title="$programArea->title" class="my-4">
            {{$programArea->description}}
            <x-slot name="footer">
                <form method="post" action="{{route('study.destroy', ['programArea'=>$programArea->id])}}">
                    @method('DELETE')
                    @csrf
                    <div class="btn btn-warning">
                        <x-form.modal-button data-target="#formModal" data-url="{{route('study.edit', ['programArea'=>$programArea])}}">
                            Edit
                        </x-form.modal-button>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </x-slot>
        </x-cards.card-w-full>
    @endforeach
@endsection
