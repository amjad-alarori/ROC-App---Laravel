@extends('layouts.layout')

@section('title')
    Locaties
@endsection

@section('content')
    @foreach($locations as $location)
        <x-cards.cardwfull title="{{$location->name}}">
            jhd kjahsgdkfhjaskdjhf kjsbvkjabsdkjvbkd jh bkdhb kjhsdb kj sdjk kjhdf kjhsdkj gskdjh kjshdg kjhsgd fkj
        </x-cards.cardwfull>
    @endforeach
@endsection

