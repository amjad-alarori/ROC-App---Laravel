@extends('layouts.layout')

@section('title')
    Opleidingen beheer
@endsection

@section('content')
    <div class="row display-4 border-bottom border-secondary rounded-bottom px-4 pb-3 mb-3">
        <div class="col">Opleidingen beheer</div>
    </div>
    <div class="d-flex flex-wrap justify-content-around mt-4">
        <a href="{{route('course.index')}}" class="d-flex flex-column justify-content-center btn m-4 p-2 rounded shadow border" style="width: 300px;height: 300px;">
            <div class="align-self-center h3">opleidingen</div>
            <div class="align-self-center h3">
                <i class='fas fa-chalkboard-teacher' style="font-size: 36px;"></i>
            </div>
        </a>
        <a href="{{route('competence.index')}}" class="d-flex flex-column justify-content-center btn m-4 p-2 rounded shadow border" style="width: 300px;height: 300px;">
            <div class="align-self-center h3">Competenties</div>
            <div class="align-self-center h3">
                <i class='fas fa-tasks' style="font-size: 36px;"></i>
            </div>
        </a>
        <a href="{{route('subject.index')}}" class="d-flex flex-column justify-content-center btn m-4 p-2 rounded shadow border" style="width: 300px;height: 300px;">
            <div class="align-self-center h3">Studievakken <br />en stages</div>
            <div class="align-self-center h3">
                <i class='fas fa-book-open' style="font-size: 36px;"></i>
            </div>
        </a>
        <a href="{{route('program.index')}}" class="d-flex flex-column justify-content-center btn m-4 p-2 rounded shadow border" style="width: 300px;height: 300px;">
            <div class="align-self-center h3">programma's</div>
            <div class="align-self-center h3">
                <i class='far fa-clipboard' style="font-size: 36px;"></i>
            </div>
        </a>
        <a href="#" class="d-flex flex-column justify-content-center btn m-4 p-2 rounded shadow border" style="width: 300px;height: 300px;">
            <div class="align-self-center h3">Sectoren</div>
            <div class="align-self-center h3">
                <i class='fas fa-sitemap' style="font-size: 36px;"></i>
            </div>
        </a>
        <a href="{{route('campus.index')}}" class="d-flex flex-column justify-content-center btn m-4 p-2 rounded shadow border" style="width: 300px;height: 300px;">
            <div class="align-self-center h3">Locaties</div>
            <div class="align-self-center h3">
                <i class='far fa-building' style="font-size: 36px;"></i>
            </div>
        </a>
    </div>
@endsection
