{{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}


@extends('layouts.app')
@section('title', 'Gameapp - Register')
@section('class', 'registre catalogue')

@section('content')

    <header>
        <img src="images/logo-welcome.svg" alt="logo" class="logo-top">

        <aside class="filter">
            <!-- boton de retroceder -->
            <a href="catalogue.html" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <div class="img">
                <img src="images/loginRegistre/icon-registre.svg" alt="">
            </div>

            <!-- icono del menú hamburguesa -->
            <svg class="btn-burger" viewBox="0 0 100 100" width="75">
                <path class="line top"
                    d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                <path class="line middle" d="m 70,50 h -40" />
                <path class="line bottom"
                    d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
            </svg>
        </aside>
    </header>

    @include('layouts.menuBurger')


    <section class="scroll higth-registre">
        <!-- RESTO DEL CONTENIDO -->
        <form action={{ route('register') }} method="post" enctype="multipart/form-data">
            @csrf
            <ul>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                @endif
            </ul>
            <!-- Label del id -->
            <div class="form-group">
                <img id="upload" class="mask" src="images/loginRegistre/bg-img-user.jpg" alt="Photo">
                <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
                <input id="photo" type="file" name="photo" accept="image/*">
            </div>
            {{-- Documento --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Documento
                </label>
                <input type="text" name="document" placeholder="123456789" maxlength="12">
            </div>
            {{-- Nombre --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Nombre Completo
                </label>
                <input type="text" name="fullname" placeholder="Pepito Pérez" maxlength="12">
            </div>
            {{-- Género --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Género
                </label>
                <select type="" name="gender">
                    <option value="">Seleccione Género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            {{-- Cumpleaños --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Cumpleaños
                </label>
                <input type="date" name="birthdate" placeholder="123456789" maxlength="12">
            </div>
            {{-- Teléfono --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Teléfono
                </label>
                <input type="text" name="phone" placeholder="3000000000" maxlength="12">
            </div>
            {{-- Correo Electrónico --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Correo Electrónico
                </label>
                <input type="email" name="email" placeholder="juanitoperez@gmail.com" maxlength="">
            </div>
            <!-- Contraseña -->
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Contraseña
                </label>
                <img class="ico-eye" src="images/loginRegistre/icon-eye.svg" alt="Eyes">
                <input type="password" name="password" placeholder="∗∗∗∗∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Verficar Contraseña
                </label>
                <img class="ico-eye" src="images/loginRegistre/icon-eye.svg" alt="Eyes">
                <input type="password" name="password_confirmation" placeholder="∗∗∗∗∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src="images/loginRegistre/bg-input-login.svg" alt="">
                </button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    }
                }
            })
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            //-------------------------------------------
            $togglePass = false;
            $('section').on('click', '.ico-eye', function() {
                !$togglePass ? $(this).next().attr('type', 'text') :
                    $(this).next().attr('type', 'password')

                    !$togglePass ? $(this).attr('src', 'images/loginRegistre/icon-eye-close.svg') :
                    $(this).attr('src', 'images/loginRegistre/icon-eye.svg')
                $togglePass = !$togglePass
            })
            //------------------------------------------
            $('.border-mask').click(function(e) {
                $('#photo').click()
            })
            $('#photo').change(function(e) {
                e.preventDefault()
                let reader = new FileReader()
                reader.onload = function(evt) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })
        })
    </script>

@endsection
