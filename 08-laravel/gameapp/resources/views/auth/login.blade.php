{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.app')
@section('title', 'Gameapp - Login')
@section('class', 'login catalogue')

@section('content')
    <header>
        <img src="images/logo-welcome.svg" alt="logo" class="logo-top">

        <aside class="filter">
            <!-- boton de retroceder -->
            <a href="catalogue.html" class="btn-back">
                <img src="images/btn-back.svg" alt="Back">
            </a>
            <div class="img">
                <img src="images/loginRegistre/icon-login.svg" alt="">
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

    <section class="scroll higth-login">
        <!-- RESTO DEL CONTENIDO -->
        <form action={{ route('login') }} method="post">
            @csrf
            @if (count($errors->all()) > 0)
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <!-- Label del id -->
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Email
                </label>
                <input type="email" name="email" placeholder="hola@hola.com" maxlength="30">
            </div>

            <!-- Label de la contraseña -->
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Contraseña
                </label>
                <img class="ico-eye" src="images/loginRegistre/icon-eye.svg" alt="Eyes">
                <input type="password" name="password" placeholder="∗∗∗∗∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <p class="accounts">Si no tienes una cuenta <a href="register.html">registrese aquí</a></p>
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src="images/loginRegistre/bg-input-login.svg" alt="">
                </button>
                <a href="">¿Olvidaste la contraseña?</a>
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
        })
    </script>
@endsection
