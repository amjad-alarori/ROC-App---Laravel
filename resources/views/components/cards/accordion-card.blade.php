<div class="card border-0">
    <div class="card-header p-0 border-0" id="heading{{$order}}">
        <h5 class="mb-0">
            <button class="btn btn-link accordion-title {{$collapsed=='true'?'collapsed':''}}" data-toggle="collapse"
                    data-target="#collapse{{$order}}" aria-expanded="{{$collapsed=='true'?'true':'false'}}"
                    aria-controls="collapse{{$order}}">
                <i class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100"></i>
                {{$btnTxt}}
            </button>
        </h5>
    </div>

    <div id="collapse{{$order}}" class="collapse {{$collapsed=='true'?'':'show'}}" aria-labelledby="heading{{$order}}"
         data-parent="#{{$compId}}">
        <div class="card-body">
            {{$slot}}
        </div>
    </div>
</div>
