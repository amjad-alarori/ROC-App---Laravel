<form method="POST" class="AjaxForm" action="{{route('study.update', ['programArea'=>$programArea])}}">
    @csrf

    @method('PUT')

    @include('programs-area.form', ['programAreas' => $programArea])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
