

@csrf



<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="wie_zijn_wij" value="{{ __('Wie zijn wij?') }}"/>
    <x-jet-input id="wie_zijn_wij" name="wie_zijn_wij" value="{{optional($stage)->wie_zijn_wij}}"
                 type="textarea" class="mt-1 block w-full"
                 autocomplete="wie_zijn_wij" required/>
    <x-jet-input-error for="wie_zijn_wij" class="valErr mt-2"/>

</div>

<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="functie" value="{{ __('Funcite') }}"/>
    <x-jet-input id="functie" name="functie" value="{{optional($stage)->functie}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="functie" required/>
    <x-jet-input-error for="functie" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="leerweg" value="{{ __('Leerweg') }}"/>
    <x-jet-input id="leerweg" name="leerweg"
                 value="{{optional($stage)->leerweg}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="leerweg" required/>
    <x-jet-input-error for="leerweg" class="valErr mt-2"/>
</div>



<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <div class="col-4">
        <x-jet-label for="aantal_plaatsen" value="{{ __('Aantal plaatsen') }}"/>
        <x-jet-input id="aantal_plaatsen" name="aantal_plaatsen"
                     value="{{optional($stage)->aantal_plaatsen}}" type="number"
                     class="mt-1 block w-full"
                     autocomplete="aantal_plaatsen" required/>
        <x-jet-input-error for="aantal_plaatsen" class="valErr mt-2"/>
    </div>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="start" value="{{ __('Start datum') }}"/>
    <x-jet-input id="start" name="start_datum" value="{{optional($stage)->start_datum}}"
                 type="date" class="mt-1 block w-full"
                 autocomplete="start" required/>
    <x-jet-input-error for="start" class="valErr mt-2"/>
</div>
    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="eind" value="{{ __('Eind datum') }}"/>
        <x-jet-input id="eind" name="eind_datum" value="{{optional($stage)->eind_datum}}"
                     type="date" class="mt-1 block w-full"
                     autocomplete="eind" required/>
        <x-jet-input-error for="eind" class="valErr mt-2"/>
    </div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="wat_te_doen" value="{{ __('Wat ga je doen?') }}"/>
    <x-jet-input id="wat_te_doen" name="wat_te_doen" value="{{optional($stage)->wat_te_doen}}"
                 type="textarea" class="mt-1 block w-full"
                 autocomplete="wat_te_doen" required/>
    <x-jet-input-error for="wat_te_doen" class="valErr mt-2"/>
</div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">

        <x-jet-label for="werkzaamheden" value="{{ __('Werkzaamheden') }}"/>
        <x-jet-input id="werkzaamheden" name="werkzaamheden" value="{{optional($stage)->werkzaamheden}}"
                     type="textarea" class="mt-1 block w-full"
                     autocomplete="werkzaamheden" required/>

    </div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="wat_zoeken_wij" value="{{ __('Wat zoeken wij?') }}"/>
    <x-jet-input id="wat_zoeken_wij" name="wat_zoeken_wij"
                 value="{{optional($stage)->wat_zoeken_wij}}" type="textarea"
                 class="mt-1 block w-full"
                 autocomplete="wat_zoeken_wij" required/>
    <x-jet-input-error for="wat_zoeken_wij" class="valErr mt-2"/>
</div>

<div class="mt-4">
    <x-jet-label for="role" value="{{ __('Sector') }}" />
    <select id="sectors" name="sectors">
        @foreach($sectors as $sector)
        <option value="{{$sector->id}}">{{$sector->title}}</option>
       @endforeach
    </select>
</div>



    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>

