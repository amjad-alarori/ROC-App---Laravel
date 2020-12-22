<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
     aria-hidden="true" {{$attributes}}>
    <div class="d-flex flex-row">
        <div style="width: 160px;"></div>
        <div class="w-full">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{--                    <h5 class="modal-title" id="ModalLabel"></h5>--}}
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
