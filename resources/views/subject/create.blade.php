<form method="POST" class="AjaxForm" action="{{route('subject.store',['isStage'=>$isStage])}}">
    @csrf

    @include('subject.form', ['subject' => null, 'competences'=>$competences, 'isStage'=>$isStage])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
