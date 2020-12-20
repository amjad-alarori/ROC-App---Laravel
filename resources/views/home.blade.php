<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->

            <div class="carousel-item active">
                <img class="img-fluid" src="{{ asset('images/rocafbeelding1.png') }}">

            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('images/rocafbeelding4.jpg') }}">

            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item">
                <img class="img-fluid" src="{{ asset('images/rocafbeelding5.jpg') }}">

            </div>
        </div>

    </div>


<section class="py-5">
    <div class="containerLandingPage">
        <h1 class="display-4">Welkom bij ROC Flevoland</h1>
        <br>

        <button type="button" class="btnLogin">Login</button>
</section>

{{--<div id="background-carousel">--}}
{{--    <div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--        <div class="carousel-inner">--}}
{{--            <div class="carousel-item active">--}}
{{--                <img src="{{ asset('images/rocafbeelding1.png') }}" class="d-block w-100" alt="no image">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img src="{{ asset('images/rocafbeelding2.png') }}" class="d-block w-100" alt="no image">--}}
{{--            </div>--}}
{{--            <div class="carousel-item" data-slide="prev">--}}
{{--                <img src="{{ asset('images/rocafbeelding3.jpg') }}" class="d-block w-100" alt="no image">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div id="content-wrapper">--}}
{{--    <!-- PAGE CONTENT -->--}}
{{--    <div class="container">--}}
{{--        <div class="page-header"><h3>Fullscreen Background Carousel</h3></div>--}}
{{--        <div class="well"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet</p>--}}
{{--        </div><!-- End Well -->--}}
{{--    </div><!-- End Container -->--}}
{{--    <!-- PAGE CONTENT -->--}}
{{--</div>--}}

<!-- Optional JavaScript -->


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>



</body>
</html>

