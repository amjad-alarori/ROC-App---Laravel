<<<<<<< HEAD
<?php
=======
<form method="POST" class="AjaxForm" action="{{route('subject.store')}}">
    @csrf

    @include('subject.form', ['subject' => null, 'competences'=>$competences])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
