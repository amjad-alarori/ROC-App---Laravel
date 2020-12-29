<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="year" value="Title van studiejaar"/>
            <x-jet-input id="year" name="year" value="{{optional($course)->study_year}}" type="number"
                         class="mt-1 w-25 block" placeholder="yyyy" min="{{date('Y')-4}}" max="9999"
                         autocomplete="code" required/>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="program" value="Programma"/>
            <select class="select2 single2 form-control form-input rounded-md shadow-sm mt-1 w-full block" id="program"
                    name="program">
                <option value="" selected>Kies een programma</option>
                @foreach($programs as $program)
                    <option
                        value="{{$program->id}}" {{optional($course)->program_id==$program->id?'selected':''}}>{{$program->code . '-' . $program->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="campus" value="Locatie"/>
            <select class="select2 single2 form-control form-input rounded-md shadow-sm mt-1 w-full block" id="campus"
                    name="campus">
                <option value="" selected>Kies een locatie</option>
                @foreach($campuses as $campus)
                    <option
                        value="{{$campus->id}}" {{optional($course)->campus_id==$campus->id?'selected':''}}>{{$campus->name . ' (' . $campus->city . ')'}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
