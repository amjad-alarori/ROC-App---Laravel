<div class="card card-profile">
    <div class="card-header card-header-image">
        <img class="img" src="{{asset("$cardImage")}}">
        <div class="colored-shadow"
             style="background-image: url('{{asset(isset($bgImage)?"$bgImage":"$cardImage")}}'); opacity: 1;"></div>
    </div>
    <div class="card-body ">
        <h4 class="card-title">{{$title}}</h4>
        <h6 class="card-category text-gray">{{$descrition}}</h6>
    </div>
    <div class="card-footer justify-content-center">
        {{$slot}}
    </div>
</div>
