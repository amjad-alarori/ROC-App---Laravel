<form method="POST" class="AjaxForm" action="{{route('docent.store')}}">

@csrf

<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="name" value="{{ __('Naam') }}"/>
    <x-jet-input id="name" name="name" value="{{optional($userProperty)->name}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="name" required/>
    <x-jet-input-error for="name" class="valErr mt-2"/>
</div>


<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="email" value="{{ __('Studenten email') }}"/>
    <x-jet-input id="email" name="email" value="{{optional($userProperty)->email}}"
                 type="email" class="mt-1 block w-full"
                 autocomplete="email" required/>
    <x-jet-input-error for="email" class="valErr mt-2"/>
</div>


    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        Rol
    </div>


    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <input type="radio" id="roleStudent" name="role" value="1">
        <label for="roleStudent">Student</label><br><br>
        <input type="radio" id="roleDocent" name="role" value="2">
        <label for="roleDocent">Docent</label><br><br>

    </div>






    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
