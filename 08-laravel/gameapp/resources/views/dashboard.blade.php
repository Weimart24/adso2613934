@extends('layouts.app')
@section('title', 'Gameapp - Dashboard')
@section('class', 'dashboard')

@section('content')
    <header>
        <div class="title-name">
            <img class="title-content" src="images/welcome/content-welcome.svg" alt="">
            <h2>{{ $user->fullname }}</h2>
        </div>

        <div class="img-profile">
            <a href={{ url('/profile') }}>
                @if ($user->photo == 'no-photo.png')
                <img id="upload" class="mask" src="{{ asset('images/userProfile/' . $user->photo) }}" alt="Photo-Default">
            @else
                <img id="upload" class="mask" src="{{ asset('images/userProfile/' . $user->photo) }}" alt="Photo">
            @endif
                 <img class="border-mask" src="images/loginRegistre/border-mask.svg"
                    alt="borde">
            </a>
        </div>
    </header>


    <section class="content">
        <div class="modules">
            <figure>
                <img src="images/welcome/icon-module.svg" alt="">
                <figcaption>{{ count($users) }} users</figcaption>
            </figure>
            <aside class="text">
                <img src="images/welcome/module-user.svg" alt="" width="163px" height="38px">
                <p class="info-text">
                    Lorem ipsum dolor, sit amet consectetur.
                </p>
                <a href={{ url('users') }}>
                    <img src="images/welcome/button-view.svg" alt="" class="view">
                </a>
            </aside>
        </div>
        <div class="modules">
            <figure>
                <img src="images/welcome/icon-game.svg" alt="">
                <figcaption>{{ count($games) }} games</figcaption>
            </figure>
            <aside class="text">
                <img src="images/welcome/module-game.svg" alt="" width="174px" height="38px">
                <p class="info-text">
                    Lorem ipsum dolor, sit amet consectetur.
                </p>
                <a href={{ url('games') }}>
                    <img src="images/welcome/button-view.svg" alt="" class="view">
                </a>
            </aside>
        </div>
        <div class="modules">
            <figure>
                <img src="images/welcome/icon-category.svg" alt=""">
                <figcaption>{{ count($categories) }} categories</figcaption>
            </figure>
            <aside class=" text">
                <img src="images/welcome/module-categories.svg" alt="" width="192px" height="38px">
                <p class="info-text">
                    Lorem ipsum dolor, sit amet consectetur.
                </p>
                <a href={{ url('categories') }}>
                    <img src="images/welcome/button-view.svg" alt="" class="view">
                </a>
            </aside>
        </div>
    </section>

    <footer class="navigation">
        <p>{{ Auth::user()->role }}</p>
        <a href="javascript:;" onclick="logit.submit();">
            <img src="images/welcome/btn-logout.svg" alt="" class="logout">
        </a>
    </footer>
    <form action={{ route('logout') }} id="logit" method="post">
        @csrf
    </form>
@endsection

@section('js')

@endsection
