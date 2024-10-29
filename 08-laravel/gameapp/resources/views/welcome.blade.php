@extends('layouts.app')
@section('title', 'Gameapp - Welcome')
@section('class', 'welcome')

@section('content')
    <header>
        <img src="{{ asset('images/logo-welcome.svg') }}" alt="Logo">
    </header>

    <section class="slider owl-carousel owl-theme">
        @foreach ($sliders as $slider)
            <img src="{{ asset('images/gameImage/' . $slider->image) }}" alt="Log contenido">
        @endforeach
    </section>

    <footer>
        <a href="{{ url('catalogue') }}">
            <img src="{{ asset('images/content-btn-welcome.svg') }}" alt="Letra boton Inicio">
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
