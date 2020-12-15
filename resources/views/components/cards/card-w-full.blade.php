<div class="card row no-gutter">
    <div class="card-header w-full">
        <h3 class="card-title h3">{{ $title }}</h3>
    </div>
    <div class="card-body">
        <p class="card-text">
            {{ $slot }}
        </p>
    </div>
    <div class="card-footer" style="background-color: white">
        <a href="#" class="btn btn-primary float-right">View Profile</a>
    </div>
</div>
