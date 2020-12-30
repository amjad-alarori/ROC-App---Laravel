<x-guest-layout>
    @if(session()->has('NoAccess') || session()->has('showError'))
        <div class="container-fluid bg-gray-100 p-3">
        <div class="alert alert-danger alert-dismissible" id="noaccess-error">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session()->has('NoAccess')?session('NoAccess'):session('showError')}}
        </div>
        </div>
    @endif
    <x-jet-authentication-card>
        <x-jet-validation-errors class="mb-4"/>

        <x-slot name="logo"><img style="height: 150px; width: 130px; border-radius: 10px;"
                                 src="{{ asset('images/roclogo.png') }}"></x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                             autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script>
        $(function () {
            $("#noaccess-error").delay(4000).slideUp(800, function () {
                $(this).remove();
            });
        });
    </script>
</x-guest-layout>
