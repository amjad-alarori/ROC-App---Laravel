<form method="POST" class="AjaxForm"
      action="{{route('coOpLocationSave',['plan'=>$plan, 'student'=>$student])}}">
    @csrf

    <select class="select2 single2 w-full" name="coOpLocation" id='searchCompany' data-url="{{route('SearchCompany')}}">
        @if($company)
            <option value='{{$company->id}}'>{{$company->name}}</option>
        @else
            <option value='0'>- Zoek een stage bedrijf -</option>
        @endif
    </select>

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
        <button type="button" id="delComp" class="btn btn-danger">verwijderen</button>
    </div>
</form>
