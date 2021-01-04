<form method="POST" class="AjaxForm" action="{{route('study.store' [$campus->id])}}">
    @csrf

    @include('programs-area.form', ['programsArea' => null])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
