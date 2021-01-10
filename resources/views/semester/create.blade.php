<form method="POST" class="AjaxForm" action="{{route('program.semester.store',['program'=>$program,'isStage'=>$isStage])}}">
    @csrf

    @include('semester.form', ['program'=>$program,'isStage'=>$isStage])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
