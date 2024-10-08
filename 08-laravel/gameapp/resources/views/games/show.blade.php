@extends('layouts.app')
@section('title', 'Gameapp - Show Game')
@section('class', 'dashboard registre user-edit')

@section('content')
    <header>
        <img class="title-content" src="{{asset('images/userInfo.svg')}}" alt="">
    </header>

    <section class="profile">
        <div class="form-group">
            @if ($game->photo == 'no-photo.png')
                <img id="upload" class="mask" src="{{ asset('images/gameImage/' . $game->image) }}" alt="Photo-Default">
            @else
                <img id="upload" class="mask" src="{{ asset('images/gameImage/' . $game->image) }}" alt="Photo">
            @endif
            <img class="border-mask" src="{{asset('images/loginRegistre/border-mask.svg')}}" alt="borde">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label>Título:</label>
            <span>{{ $game->title }}</span>
        </div>
        <div class="form-group">
            <label>Desarrollado:</label>
            <span>{{ $game->developer }}</span>
        </div>
        <div class="form-group">
            <label>Género:</label>
            <span>{{ $game->genre }}</span>
        </div>
        <div class="form-group">
            <label>Precio:</label>
            <span>{{ $game->price }}</span>
        </div>
        <div class="form-group">
            <label>descripción:</label>
            <span>{{ $game->description }}</span>
        </div>
        <div class="form-group">
            <label>Año de Creación:</label>
            <span>{{ $game->releasedate }}</span>
        </div>
    </section>

    <footer class="navigation">
        <p>Admin</p>
        <a href={{ url('/games') }}>
            <img src="{{asset('images/welcome/users/icon-back.svg')}}" alt="" class="back">
        </a>
    </footer>

@endsection

@section('js')

@endsection
