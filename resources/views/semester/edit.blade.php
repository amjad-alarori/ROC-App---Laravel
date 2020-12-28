<form method="POST" class="AjaxForm" action="{{route('semester.update', ['semester' => $semester, 'program'=>$program])}}">
    @csrf
    @method('PUT')

    @include('semester.form', ['semester' => $semester])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
