@extends('layouts.layout')

@section('title')
    Accordion
@endsection

@section('content')
    @dd($programs)
    <x-cards.accordion>
        <x-cards.accordioncard order="One" collapsed="false">
            <x-slot name="btnTxt">
                Collapsible Group Item #1
            </x-slot>
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
            labore sustainable VHS.
        </x-cards.accordioncard>

        <x-cards.accordioncard order="Two" collapsed="true">
            <x-slot name="btnTxt">
                Collapsible Group Item #2
            </x-slot>
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
            labore sustainable VHS.
        </x-cards.accordioncard>

        <x-cards.accordioncard order="Three" collapsed="true">
            <x-slot name="btnTxt">
                Collapsible Group Item #3
            </x-slot>
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
            sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
            labore sustainable VHS.
        </x-cards.accordioncard>
    </x-cards.accordion>
@endsection
