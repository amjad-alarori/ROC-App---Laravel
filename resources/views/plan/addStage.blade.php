<form method="POST" class="AjaxForm"
      action="{{route('student.plan.cijfer.update',['student'=>$student, 'plan'=>$plan,'cijfer'=>0])}}">
    @csrf
    @method('PUT')

    <select class="select2 single2 w-full" name="SearchCompany" id='searchUser'  data-url="{{route('SearchCompany')}}">
        <option value='0'>- Zoek een stage bedrijf -</option>
    </select>

    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
