@extends('layouts.app')
@section('title', 'Gameapp - Catalogue')
@section('class', 'catalogue')

@section('content')
<header>
    <img src="images/logo-welcome.svg" alt="logo" class="logo-top">

    <aside class="filter">
        <!-- boton de retroceder -->
        <a href= {{ url("/") }} class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>

        <!-- formulario del filtro -->
        <form action="" method="POST">
            <input type="text" placeholder="Search" maxlength="15">
        </form>

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


<!-- ESTO ES EL MENÚ DEL MENÚ HAMBURGUESA -->
<nav class="nav">
    <menu>
        <img src="images/bg-menu.svg" alt="">
        <a href={{ url('login') }}>
            <img src="images/menu-login.svg" alt="Login">
        </a>
        <a href={{ url('register') }}>
            <img src="images/menu-registre.svg" alt="Register">
        </a>
        <a href={{ url('catalogue') }}>
            <img src="images/menu-catalogue.svg" alt="Catalogue">
        </a>
        <img class="social" src="images/icon-social.png" alt="">
    </menu>
</nav>


<section class="scroll">
    <!-- RESTO DEL CONTENIDO -->
    <article>
        <h2>
            <img src="images/catalogue/ico-category.svg" alt="Category">
            Categoría 01
        </h2>
        <div class="owl-carousel">
            <figure>
                <img src="images/catalogue/slide-c1-01.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 1</figcaption></a>
            </figure>
            <figure>
                <img src="images/catalogue/slide-c1-02.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 2</figcaption></a>
            </figure>
            <figure>
                <img src="images/catalogue/slide-c1-03.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 3</figcaption></a>
            </figure>
        </div>
    </article>

    <article>
        <h2>
            <img src="images/catalogue/ico-category.svg" alt="Category">
            Categoría 02
        </h2>
        <div class="owl-carousel">
            <figure>
                <img src="images/catalogue/slide-c2-01.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 1</figcaption></a>
            </figure>
            <figure>
                <img src="images/catalogue/slide-c2-02.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 2</figcaption></a>
            </figure>
            <figure>
                <img src="images/catalogue/slide-c2-03.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 3</figcaption></a>
            </figure>
        </div>
    </article>

    <article>
        <h2>
            <img src="images/catalogue/ico-category.svg" alt="Category">
            Categoría 03
        </h2>
        <div class="owl-carousel">
            <figure>
                <img src="images/catalogue/slide-c3-01.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 1</figcaption></a>
            </figure>
            <figure>
                <img src="images/catalogue/slide-c3-02.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 2</figcaption></a>
            </figure>
            <figure>
                <img src="images/catalogue/slide-c3-03.png" alt="" class="slide">
                <a href="view-game.html"><figcaption>Ovni 3</figcaption></a>
            </figure>
        </div>
    </article>
</section>
@endsection

@section('js')
    <script>
       $(document).ready(function () {
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
            $('aside').on('click', '.btn-burger', function () {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
        })
    </script>
@endsection
