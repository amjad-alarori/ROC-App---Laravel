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
                         oninput="validity.valid||(value='');"/>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-3">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="competences" value="competenties"/>
            <select class="select2 form-input rounded-md shadow-sm mt-1 w-full block" id="competences" name="competences[]" multiple="multiple">
                @foreach($competences as $competence)
                    <option value="{{'Selected,'.$competence->id}}">$competence->title</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
