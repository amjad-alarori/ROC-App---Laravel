<div {{$attributes->merge(['class'=>"card row no-gutter"])}}>
    <div class="card-header w-full">
        <h3 class="card-title h3">{{ $title }}</h3>
    </div>
    <div class="card-body w-100">
        <div class="card-text">
            {{ $slot }}
        </div>
    </div>
    <div class="card-footer" style="background-color: white">
        {{ $footer }}
    </div>
</div>
