<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" {{$attributes}}>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" id="exit" class="btn btn-secondary" data-dismiss="modal">Sluien</button>
                <button type="submit" id="save" class="btn btn-primary">{{$submitText}}</button>
            </div>
        </div>
    </div>
</div>
