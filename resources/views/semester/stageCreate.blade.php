<form method="POST" class="AjaxForm" action="{{route('semester.store',['program'=>$program,'stage'=>true])}}">
    @csrf

    @include('semester.form', ['program'=>$program,'semester' => null])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
