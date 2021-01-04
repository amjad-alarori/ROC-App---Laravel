<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            <x-jet-label for="semester" value="{{ __('Semester') }}"/>
            <x-jet-input id="semester" name="semester"
                         type="number" class="mt-1 block w-40" min="1" max="{{$course->program->length*2}}"
                         oninput="validity.valid||(value='');" autocomplete="code" required/>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-4">
    <div class="form-row">
        <div class="col">
            <input class="rounded-md shadow-sm mt-1 hider" type="checkbox" name="period" id="period">
            <label class="font-medium text-sm text-gray-700" for="period">Semester heeft twee perioden</label>
            <div class="row d-none hiding">
                <div class="col">
                    <label class="block font-medium text-sm text-gray-700" for="periodeNr">Priode</label>
                    <input class="form-input rounded-md shadow-sm mt-1 block" type="number" id="periodeNr"
                           name="periodNr" min="1"
                           max="2" oninput="validity.valid||(value='')">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-span-6 sm:col-span-4 mt-1">
    <div class="form-row">
        <div class="col">
            @if($isStage==true)
                <x-jet-label for="subjects" value="Sagetage"/>
                <select class="select2 single2 form-control form-input rounded-md shadow-sm mt-1 w-full block" id="subjects"
                        name="subjects" required>
                    <option value="" selected>Kies een satage</option>
                    @foreach($subjects as $subject)
                        @if($subject->co_op)
                            <option value="{{$subject->id}}">
                                {{$subject->title . ' (' . $subject->e_credit . ' EC\'s)'}}
                            </option>
                        @endif
                    @endforeach
                </select>
            @else
                <x-jet-label for="subjects" value="studievakken"/>
                <select class="select2 single2 form-control form-input rounded-md shadow-sm mt-1 w-full block" id="subjects"
                        name="subjects[]" multiple="multiple" data-placeholder="Kies studievakken" required>
                    @foreach($subjects as $subject)
                        @if(! $subject->co_op)
                            <option value="{{$subject->id}}">
                                {{$subject->title . ' (' . $subject->e_credit . ' EC\'s)'}}
                            </option>
                        @endif
                    @endforeach
                </select>
            @endif
        </div>
    </div>
</div>
