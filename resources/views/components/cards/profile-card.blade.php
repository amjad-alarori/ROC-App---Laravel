<div {{$attributes->merge(['class'=>'card card-profile'])}}>
    <div class="d-flex card-header card-header-image justify-content-center">
        {{$image}}
        <div class="colored-shadow"
             style="background-image: url('{{asset("$cardImage")}}'); opacity: 1;"></div>
    </div>
    <div class="card-body ">
        <h4 class="card-title">{{$title}}</h4>
        <h6 class="card-category text-gray">{{$descrition}}</h6>
    </div>
    <div class="card-footer justify-content-center">
        {{$slot}}
    </div>
</div>
