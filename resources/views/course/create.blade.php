<form method="POST" class="AjaxForm" action="{{route('course.store')}}">
    @csrf

    @include('course.form', ['course' => null])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
