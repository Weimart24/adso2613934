@extends('layouts.app')
@section('title', 'Gameapp - Profile')
@section('class', 'dashboard registre user-edit')

@section('content')
    <header>
        <img class="title-content" src="images/welcome/users/profileTitle.svg" alt="">
    </header>

    <section class="profile">
        <div class="form-group">
            @if ($user->photo == 'no-photo.png')
                <img id="upload" class="mask" src="{{ asset('images/userProfile/' . $user->photo) }}" alt="Photo-Default">
            @else
                <img id="upload" class="mask" src="{{ asset('images/userProfile/' . $user->photo) }}" alt="Photo">
            @endif
            <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label>Documento:</label>
            <span>{{ $user->document }}</span>
        </div>
        <div class="form-group">
            <label>Nombre:</label>
            <span>{{ $user->fullname }}</span>
        </div>
        <div class="form-group">
            <label>Género:</label>
            <span>{{ $user->gender }}</span>
        </div>
        <div class="form-group">
            <label>Cumpleaños:</label>
            <span>{{ $user->birthdate }}</span>
        </div>
        <div class="form-group">
            <label>Teléfono:</label>
            <span>{{ $user->phone }}</span>
        </div>
        <div class="form-group">
            <label>Correo Electrónico:</label>
            <span>{{ $user->email }}</span>
        </div>
    </section>

    <footer class="navigation">
        <p>Admin</p>
        <a href={{ url('/dashboard') }}>
            <img src="images/welcome/users/icon-back.svg" alt="" class="back">
        </a>
    </footer>

@endsection

@section('js')

@endsection
