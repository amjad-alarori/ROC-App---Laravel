<form method="POST" class="AjaxForm" action="{{route('cv.store')}}">

@csrf


<div class="col-span-6 sm:col-span-4 mt-1">
    <x-jet-label for="firstName" value="{{ __('Voornaam') }}"/>
    <x-jet-input id="firstName" name="firstName" value="{{optional($cv)->firstName}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="firstName"/>
    <x-jet-input-error for="name" class="valErr mt-2"/>
</div>

<div class="col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="lastName" value="{{ __('Achternaam') }}"/>
    <x-jet-input id="lastName" name="lastName"
                 value="{{optional($cv)->lastName}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="lastName"/>
    <x-jet-input-error for="lastName" class="valErr mt-2"/>
</div>



<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <div class="col-4">
        <x-jet-label for="birthDate" value="{{ __('Geboortedatum') }}"/>
        <x-jet-input id="birthDate" name="birthDate"
                     value="{{optional($cv)->birthDate}}"
                     class="mt-1 block w-full"
                     autocomplete="birthDate"/>
        <x-jet-input-error for="birthDate" class="valErr mt-2"/>
    </div>
</div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="address" value="{{ __('Adres') }}"/>
    <x-jet-input id="address" name="address" value="{{optional($cv)->address}}"
                 type="text" class="mt-1 block w-full"
                 autocomplete="address"/>
    <x-jet-input-error for="address" class="valErr mt-2"/>
</div>



    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="city" value="{{ __('Woonplaats') }}"/>
        <x-jet-input id="city" name="city" value="{{optional($cv)->city}}"
                     type="text" class="mt-1 block w-full"
                     autocomplete="city"/>
        <x-jet-input-error for="city" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <div class="col-4">
            <x-jet-label for="zip_code" value="{{ __('Postcode') }}"/>
            <x-jet-input id="zip_code" name="zip_code"
                         value="{{optional($cv)->zip_code}}"
                         class="mt-1 block w-full"
                         autocomplete="zip_code"/>
            <x-jet-input-error for="zip_code" class="valErr mt-2"/>
        </div>
    </div>

<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="email" value="{{ __('Email') }}"/>
    <x-jet-input id="email" name="email" value="{{optional($cv)->email}}"
                 type="email" class="mt-1 block w-full"
                 autocomplete="email"/>
    <x-jet-input-error for="email" class="valErr mt-2"/>
</div>


<div class="form-row col-span-6 sm:col-span-4 mt-3">
    <x-jet-label for="phone_nr" value="{{ __('Telefoon') }}"/>
    <x-jet-input id="phone_nr" name="phone_nr"
                 value="{{optional($cv)->phone_nr}}" type="text"
                 class="mt-1 block w-full"
                 autocomplete="phone_nr"/>
    <x-jet-input-error for="phone_nr" class="valErr mt-2"/>
</div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        MBO opleiding
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="education_mbo" value="{{ __('Opleiding') }}"/>
        <x-jet-input id="education_mbo" name="education_mbo" value="{{optional($cv)->eduction_mbo}}"
                     type="text" class="mt-1 block w-full"
                     autocomplete="education_mbo"/>

    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="institute_mbo" value="{{ __('Onderwijs instantie') }}"/>
        <x-jet-input id="institute_mbo" name="institute_mbo"
                     value="{{optional($cv)->institute_mbo}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="institute_mbo"/>
        <x-jet-input-error for="institute_mbo" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="startDate_mbo" value="{{ __('Jaar waarin je bent gestart') }}"/>
        <x-jet-input id="startDate_mbo" name="startDate_mbo"
                     value="{{optional($cv)->startDate_mbo}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="startDate_mbo"/>
        <x-jet-input-error for="startDate_mbo" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="endDate_mbo" value="{{ __('Jaar waarin je bent geëindigd (vul heden in als je nog bezig bent)') }}"/>
        <x-jet-input id="endDate_mbo" name="endDate_mbo"
                     value="{{optional($cv)->endDate_mbo}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="endDate_mbo"/>
        <x-jet-input-error for="endDate_mbo" class="valErr mt-2"/>
    </div>


    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        Voortgezet onderwijs
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="level" value="{{ __('Onderwijs niveau') }}"/>
        <x-jet-input id="level" name="level" value="{{optional($cv)->level}}"
                     type="text" class="mt-1 block w-full"
                     autocomplete="level"/>

    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="institute_middle" value="{{ __('Onderwijs instantie') }}"/>
        <x-jet-input id="institute_middle" name="institute_middle"
                     value="{{optional($cv)->institute_middle}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="institute_middle"/>
        <x-jet-input-error for="institute_middle" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="startDate_middle" value="{{ __('Jaar waarin je bent gestart') }}"/>
        <x-jet-input id="startDate_middle" name="startDate_middle"
                     value="{{optional($cv)->startDate_middle}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="startDate_middle"/>
        <x-jet-input-error for="startDate_middle" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="endDate_middle" value="{{ __('Jaar waarin je bent geëindigd') }}"/>
        <x-jet-input id="endDate_middle" name="endDate_middle"
                     value="{{optional($cv)->endDate_middle}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="endDate_middle"/>
        <x-jet-input-error for="endDate_middle" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        Basis onderwijs
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="institute_basic" value="{{ __('Onderwijs instantie') }}"/>
        <x-jet-input id="institute_basic" name="institute_basic"
                     value="{{optional($cv)->institute_basic}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="institute_basic"/>
        <x-jet-input-error for="institute_basic" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="startDate_basic" value="{{ __('Jaar waarin je bent gestart') }}"/>
        <x-jet-input id="startDate_basic" name="startDate_basic"
                     value="{{optional($cv)->startDate_basic}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="startDate_basic"/>
        <x-jet-input-error for="startDate_basic" class="valErr mt-2"/>
    </div>

    <div class="form-row col-span-6 sm:col-span-4 mt-3">
        <x-jet-label for="endDate_basic" value="{{ __('Jaar waarin je bent geëindigd') }}"/>
        <x-jet-input id="endDate_basic" name="endDate_basic"
                     value="{{optional($cv)->endDate_basic}}" type="text"
                     class="mt-1 block w-full"
                     autocomplete="endDate_basic"/>
        <x-jet-input-error for="endDate_basic" class="valErr mt-2"/>
    </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            Werk
        </div>
        <br>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="company" value="{{ __('Werkgever') }}"/>
            <x-jet-input id="company" name="company" value="{{optional($cv)->company}}"
                         type="text" class="mt-1 block w-full"
                        autocomplete="company"/>

        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="function" value="{{ __('Functie') }}"/>
            <x-jet-input id="function" name="function"
                         value="{{optional($cv)->function}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="function"/>
            <x-jet-input-error for="function" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="startDate_work" value="{{ __('Jaar waarin je bent gestart') }}"/>
            <x-jet-input id="startDate_work" name="startDate_work"
                         value="{{optional($cv)->startDate_work}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="startDate_work"/>
            <x-jet-input-error for="startDate_work" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="endDate_work" value="{{ __('Jaar waarin je bent geëindigd (vul heden in als je hier nog werkt)') }}"/>
            <x-jet-input id="endDate_work" name="endDate_work"
                         value="{{optional($cv)->endDate_work}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="endDate_work"/>
            <x-jet-input-error for="endDate_work" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            Hobby's (vul tot 4 hobby's in)
        </div>
    <br>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="hobbyOne" value="{{ __('Hobby') }}"/>
            <x-jet-input id="hobbyOne" name="hobbyOne" value="{{optional($cv)->hobbyOne}}"
                         type="text" class="mt-1 block w-full"
                         autocomplete="hobbyOne"/>

        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="hobbyTwo" value="{{ __('Hobby') }}"/>
            <x-jet-input id="hobbyTwo" name="hobbyTwo"
                         value="{{optional($cv)->hobbyTwo}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="hobbyTwo"/>
            <x-jet-input-error for="hobbyTwo" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="hobbyThree" value="{{ __('Hobby') }}"/>
            <x-jet-input id="hobbyThree" name="hobbyThree"
                         value="{{optional($cv)->hobbyThree}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="hobbyThree"/>
            <x-jet-input-error for="hobbyThree" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="hobbyFour" value="{{ __('Hobby') }}"/>
            <x-jet-input id="hobbyFour" name="hobbyFour"
                         value="{{optional($cv)->hobbyFour}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="hobbyFour"/>
            <x-jet-input-error for="hobbyFour" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            Vaardigheden (vul tot 4 vaardigheden in)
        </div>
    <br>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="skillOne" value="{{ __('Vaardigheid') }}"/>
            <x-jet-input id="skillOne" name="skillOne" value="{{optional($cv)->skillOne}}"
                         type="text" class="mt-1 block w-full"
                         autocomplete="skillOne"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="skillTwo" value="{{ __('Vaardigheid') }}"/>
            <x-jet-input id="skillTwo" name="skillTwo"
                         value="{{optional($cv)->skillTwo}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="skillTwo"/>
            <x-jet-input-error for="skillTwo" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="skillThree" value="{{ __('Vaardigheid') }}"/>
            <x-jet-input id="skillThree" name="skillThree"
                         value="{{optional($cv)->skillThree}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="skillThree"/>
            <x-jet-input-error for="skillThree" class="valErr mt-2"/>
        </div>

        <div class="form-row col-span-6 sm:col-span-4 mt-3">
            <x-jet-label for="skillFour" value="{{ __('Vaardigheid') }}"/>
            <x-jet-input id="skillFour" name="skillFour"
                         value="{{optional($cv)->skillFour}}" type="text"
                         class="mt-1 block w-full"
                         autocomplete="skillFour"/>
            <x-jet-input-error for="skillFour" class="valErr mt-2"/>
        </div>



    <div class="modal-footer mt-4">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </div>
</form>
