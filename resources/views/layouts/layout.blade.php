<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="ScrumApp" content="">
    <meta name="WFADSD2020 Team B3" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','RocApp Team B3')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/de68f974dc.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>

<div id="mainSidenav" class="sidenav">
   <div id="profileBtn">
       @if (Route::has('login'))
        @auth
            @livewire('navigation-dropdown')
        @endif
    @endif
   </div>
    <a href="javascript:void(0)" class="closebtn" id="closeNavButton">&times;</a>
    <a href="#" class="text-nowrap"><i class="fa fa-fw fa-home"></i> Overzicht</a>
    <a href="#" class="text-nowrap"><i class="fas fa-list"></i> Mijn Kwalificatie<br/>Dossier</a>
    <a href="{{route('stageBedrijven.index')}}" class="text-nowrap"><i class="fas fa-building"></i> Stage bedrijven</a>

</div>
<div id="darkMain"></div>
<div id="menuBtn" class="rounded">
    <span style="font-size:30px;cursor:pointer" id="openNavButton">&#9776; Menu</span>
</div>
<div class="container-fluid" id="main">
    <main role="main" class="container font-sans text-gray-900 antialiased">
        @if(session()->has('NoAccess') || session()->has('showError'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible m-3" id="noaccess-error">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session()->has('NoAccess')?session('NoAccess'):session('showError')}}
                </div>
            </div>
        @endif
        <div class="container-fluid pt-9 h-100 pb-3">
            @yield('content')
        </div>
    </main>
</div>

<x-form.modal id="formModal"></x-form.modal>

<!-- Optional JavaScript -->
<script type="text/javascript">
    // var bar = new ProgressBar.Circle(container, {
    //     strokeWidth: 7,
    //     easing: 'easeInOut',
    //     duration: 1400,
    //     color: '#FFEA82',
    //     trailColor: '#eee',
    //     trailWidth: 1,
    //     svgStyle: null
    // });
    //
    // bar.animate(0.5);  // Number from 0.0 to 1.0
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

<script src="{{asset('js/app.js')}}"></script>
<script>
    $(function () {
        $("#noaccess-error").delay(4000).slideUp(800, function () {
            $(this).remove();
        });
    });
</script>
@yield('script')
</body>
</html>
