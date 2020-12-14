@extends('layouts.layout')

@section('title')

Student Dashboard
@endsection


@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h1">
                        Dashboard
                    </h1>
                    <hr>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="h3 card-title">38/150</h3>
                            <p class="card-text">Behaalde competenties</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <div class="card h-100" style="width: 18rem;">

                        <div class="card-body">
                            <h3 class="h3 card-title">53<sup style="font-size: 20px">%</sup></h3>
                            <p class="card-text">Van het kwalificatie dossier voltooid</p>

                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card h-100" style="width: 18rem;">

                        <div class="card-body">
                            <h3 class="h3 card-title">Laatst behaald</h3>
                            <p class="card-text">Laatst behaalde competentie</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="card h-100" style="width: 18rem;">

                        <div class="card-body">
                            <h3 class="h3 card-title">20/50</h3>
                            <p class="card-text">Afgeronde werkprocessen</p>

                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
    @endsection

    @section('script')

{{--        <script type="text/javascript">--}}
{{--            var bar = new ProgressBar.Circle(containerProgress, {--}}
{{--                strokeWidth: 7,--}}
{{--                easing: 'easeInOut',--}}
{{--                duration: 1400,--}}
{{--                color: '#FFEA82',--}}
{{--                trailColor: '#eee',--}}
{{--                trailWidth: 1,--}}
{{--                svgStyle: null--}}
{{--            });--}}

{{--            bar.animate(0.5);  // Number from 0.0 to 1.0--}}
        </script>
@endsection

















