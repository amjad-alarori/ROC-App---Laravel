<<<<<<< HEAD
<?php
=======
<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="title" value="Title van studievak"/>
            <x-jet-input id="title" name="title" value="{{optional($subject)->title}}"
                         type="text" class="mt-1 w-full block"
                         autocomplete="code" required/>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-3">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="credits" value="EC's"/>
            <x-jet-input id="credits" name="credits"
                         value="{{optional($subject)->e_credit}}"
                         type="number" min="1"
                         class="mt-1 inline-block w-40" autocomplete="credits"
                         oninput="validity.valid||(value='');" required/>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-3">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="competences" value="competenties"/>
            <select class="select2 multiselect form-input rounded-md shadow-sm mt-1 w-full block" id="competences" name="competences[]" multiple="multiple" data-placeholder="Selecteer competenties en/of maak een niuwe aan" required>
                @foreach($competences as $competence)
                    <option value="{{'Selected,'.$competence->id}}" {{isset($subject)?(in_array($competence->id,$subject->attachedCompetences->pluck('id')->toarray())?'selected':''):''}}>{{$competence->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="program" value="Programma"/>
            <select class="select2 single2 form-input rounded-md shadow-sm mt-1 w-full block" id="program" name="program">
                <option value="" selected>voor een specifieke programma?</option>
                @foreach($programs as $program)
                    <option value="{{$program->id}}" {{optional($subject)->program_id==$program->id?'selected':''}}>{{$program->code . '-' . $program->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
