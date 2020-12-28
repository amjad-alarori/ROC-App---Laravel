<form method="POST" class="AjaxForm" action="{{route('semester.store',['program'=>$program])}}">
    @csrf

    @error('periodNr')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
    @error('subject')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
    {{--        @dd($errors)--}}
    @error('subjects.*')
    <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror

    @include('semester.form', ['program'=>$program,'semester' => null])

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
