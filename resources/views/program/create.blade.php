<form method="POST" class="AjaxForm" action="{{route('program.store')}}">
    @csrf

    @include('program.form', ['program' => null])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
