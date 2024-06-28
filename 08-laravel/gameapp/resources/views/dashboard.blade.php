@extends('layouts.app')
@section('title', 'Gameapp - Dashboard')
@section('class', 'dashboard')

@section('content')
    <header>
        <div class="title-name">
            <img class="title-content" src="images/welcome/content-welcome.svg" alt="">
            <h2>Juan Pérez</h2>
        </div>

        <div class="img-profile">
            <a href="edit-admin.html">
                <img class="mask" src="images/loginRegistre/bg-upload-photo.png" alt="Photo">
                <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
            </a>
        </div>
    </header>


    <section class="content">
        <div class="modules">
            <figure>
                <img src="images/welcome/icon-module.svg" alt="">
                <figcaption>20 users</figcaption>
            </figure>
            <aside class="text">
                <img src="images/welcome/module-user.svg" alt="" width="163px" height="38px">
                <p class="info-text">
                    Lorem ipsum dolor, sit amet consectetur.
                </p>
                <a href="user.html">
                    <img src="images/welcome/button-view.svg" alt="" class="view">
                </a>
            </aside>
        </div>
        <div class="modules">
            <figure>
                <img src="images/welcome/icon-game.svg" alt="">
                <figcaption>15 games</figcaption>
            </figure>
            <aside class="text">
                <img src="images/welcome/module-game.svg" alt="" width="174px" height="38px">
                <p class="info-text">
                    Lorem ipsum dolor, sit amet consectetur.
                </p>
                <a href="game.html">
                    <img src="images/welcome/button-view.svg" alt="" class="view">
                </a>
            </aside>
        </div>
        <div class="modules">
            <figure>
                <img src="images/welcome/icon-category.svg" alt=""">
                <figcaption>28 categories</figcaption>
            </figure>
            <aside class=" text">
                <img src="images/welcome/module-categories.svg" alt="" width="192px" height="38px">
                <p class="info-text">
                    Lorem ipsum dolor, sit amet consectetur.
                </p>
                <a href="category.html">
                    <img src="images/welcome/button-view.svg" alt="" class="view">
                </a>
            </aside>
        </div>
    </section>

    <footer class="navigation">
        <p>Admin</p>
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