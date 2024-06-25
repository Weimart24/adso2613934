@extends('layouts.app')
@section('title', 'Gameapp - Welcome')
@section('class', 'welcome')

@section('content')
    <header>
        <img src="{{asset('images/logo-welcome.svg')}}" alt="Logo">
    </header>

    <section class="slider owl-carousel owl-theme">
        <img src="{{ asset('images/slide01.png')}}" alt="Log contenido">
        <img src="{{ asset('images/slide02.png')}}" alt="Log contenido">
        <img src="{{ asset('images/slide03.png')}}" alt="Log contenido">
    </section>

    <footer>
        <a href="{{ url('catalogue') }}">
            <img src="{{ asset('images/content-btn-welcome.svg')}}" alt="Letra boton Inicio">
        </a>
    </footer>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })
    </script>
@endsection
