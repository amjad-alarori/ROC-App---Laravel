<form method="POST" class="AjaxForm" action="{{route('course.update', ['course' => $course])}}">
    @csrf
    @method('PUT')

    @include('course.form', ['course' => $course])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
