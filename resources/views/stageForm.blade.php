<form method="POST" class="AjaxForm" action="{{route('stage.store', ['stageBedrijven'=> $company])}}">


@csrf

<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="funcite" value="{{ __('Funcite') }}"/>
    <x-jet-input id="funcite" name="Funcite" value=""
                 type="text" class="mt-1 block w-full"
                 autocomplete="funcite" required/>
    <x-jet-input-error for="funcite" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="leerweg" value="{{ __('Leerweg') }}"/>
    <x-jet-input id="leerweg" name="leerweg"
                 value="" type="text"
                 class="mt-1 block w-full"
                 autocomplete="leerweg" required/>
    <x-jet-input-error for="leerweg" class="valErr mt-2"/>
</div>



<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <div class="col-4">
        <x-jet-label for="aantal_plaatsen" value="{{ __('Aantal plaatsen') }}"/>
        <x-jet-input id="aantal_plaatsen" name="aantal_plaatsen"
                     value="" type="number"
                     class="mt-1 block w-full"
                     autocomplete="aantal_plaatsen" required/>
        <x-jet-input-error for="aantal_plaatsen" class="valErr mt-2"/>
    </div>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="periode" value="{{ __('Periode') }}"/>
    <x-jet-input id="periode" name="periode" value=""
                 type="text" class="mt-1 block w-full"
                 autocomplete="periode" required/>
    <x-jet-input-error for="periode" class="valErr mt-2"/>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="wat_te_doen" value="{{ __('Wat ga je doen?') }}"/>
    <x-jet-input id="wat_te_doen" name="wat_te_doen" value=""
                 type="wat_te_doen" class="mt-1 block w-full"
                 autocomplete="wat_te_doen" required/>
    <x-jet-input-error for="wat_te_doen" class="valErr mt-2"/>
</div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">

        <x-jet-label for="werkzaamheden" value="{{ __('Werkzaamheden') }}"/>
        <x-jet-input id="werkzaamheden" name="werkzaamheden" value=""
                     type="text" class="mt-1 block w-full"
                     autocomplete="werkzaamheden" required/>

    </div>


<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="wat_zoeken_wij" value="{{ __('Wat zoeken wij?') }}"/>
    <x-jet-input id="wat_zoeken_wij" name="wat_zoeken_wij"
                 value="" type="text"
                 class="mt-1 block w-full"
                 autocomplete="wat_zoeken_wij" required/>
    <x-jet-input-error for="wat_zoeken_wij" class="valErr mt-2"/>
</div>



    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
