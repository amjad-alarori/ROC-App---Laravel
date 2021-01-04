@extends('layouts.layout')

@section('title')
    Opleiding
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-4">
        <div class="col-sm-4">Opleidingen</div>
            <div class="col-md-8" style="text-align: end">
                <x-form.modal-button data-target="#formModal" data-url="{{route('study.create',['campus' => $campus])}}"
                                     class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                    Nieuwe opleiding
                </x-form.modal-button>
            </div>
    </div>
    @foreach($programArea as $programArea)
        <x-cards.cardwfull :title="$programArea->title" class="my-4">
            {{$programArea->description}}
            <x-slot name="footer">
                <form method="post" action="{{route('study.destroy', ['campus' => $campus, 'study' => $programArea->id])}}">
                    @method('DELETE')
                    @csrf
                    <div class="btn btn-warning">
                        <x-form.modal-button data-target="#formModal" data-url="{{route('study.edit', ['campus'=>$campus, 'study' => $programArea->id])}}">
                            Edit
                        </x-form.modal-button>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{route('program.index', ['campus'=>$campus, 'study'=>$programArea])}}" class="btn btn-primary block float-right">Bekijk opleiding</a>
            </x-slot>
        </x-cards.cardwfull>
    @endforeach
@endsection
