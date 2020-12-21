<form method="POST" class="AjaxForm" action="{{route('campus.update', [$campus->id])}}">
    @csrf
    @method('PUT')

    @include('location.form', ['campus' => $campus])

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Bewerken</button>
    </div>
</form>
