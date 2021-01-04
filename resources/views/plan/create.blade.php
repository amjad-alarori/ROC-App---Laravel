<form method="POST" class="AjaxForm" action="{{route('plan.store',['course'=>$course,'isStage'=>$isStage])}}">
    @csrf

    @include('plan.form', ['course'=>$course,'isStage'=>$isStage])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
