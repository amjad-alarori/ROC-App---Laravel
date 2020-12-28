<form method="POST" class="AjaxForm" action="{{route('subject.update', ['subject' => $subject])}}">
    @csrf
    @method('PUT')

    @include('subject.form', ['subject' => $subject, 'competences'=>$competences])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
