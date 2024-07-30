@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'user dashboard')

@section('content')
    <header>
        <div class="title-name">
            <img class="title-content" src="images/welcome/users/content-users.svg" alt="">
            <a href="{{ url('users/create') }}" class="add-icon">
                <img src="images/welcome/users/icon-add.svg" alt="">
            </a>
        </div>

        <div class="img-profile">
            <img class="mask" src="images/loginRegistre/bg-upload-photo.png" alt="Photo">
            <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
        </div>
    </header>


    <section class="content-profile">
        @foreach ($users as $user)
            <div class="modules">
                <div class="individual-module">
                    <figure>
                        <img class="mask" src={{ asset('images/userProfile/'. $user->photo) }} alt="Photo">
                        <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
                    </figure>
                    <aside class="info">
                        <div class="titulos">
                            <p>ID:</p>
                            <p>NOMBRE:</p>
                            <p>CUMPLEAÑOS:</p>
                        </div>
                        <div class="contenido">
                            <p>{{$user->id}}</p>
                            <p>{{$user->fullname}}</p>
                            <p>{{$user->birthdate}}</p>
                        </div>
                    </aside>
                </div>
                <div class="info">
                    <a href="">
                        <img src="images/welcome/users/icon-delete.svg" alt="" class="delete">
                    </a>
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/welcome/users/icon-edit.svg" alt="" class="edit">
                    </a>
                </div>
            </div>
        @endforeach
        {{ $users->links('layouts.paginator') }}
    </section>
    <footer class="navigation">
        <p>Admin</p>
        <a href="{{ url('dashboard') }}">
            <img src="images/welcome/users/icon-back.svg" alt="" class="back">
        </a>
    </footer>

@endsection

