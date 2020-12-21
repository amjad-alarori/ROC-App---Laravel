<form method="POST" class="AjaxForm" action="{{route('campus.store')}}">
    @csrf

    @include('location.form', ['campus' => null])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
