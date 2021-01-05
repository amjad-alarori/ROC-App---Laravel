<form method="POST" class="AjaxForm" action="{{route('enrollment.store',['course'=>$course])}}">
    @csrf

    <div class="col-span-6 sm:col-span-4 mt-1">
        <div class="form-row">
            <div class="col">
                <x-jet-label for="students" value="{{ __('studenten') }}"/>
                <select class="select2" name="SearchId[]" id='searchUser' style='width: 400px;' multiple
                        data-url="{{route('searchUser')}}">
                    <option value='0'>Studenten zoeken</option>
                </select>&nbsp; &nbsp;
            </div>
        </div>
    </div>

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">toevoegev</button>
    </div>
</form>
