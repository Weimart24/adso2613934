@extends('layouts.app')
@section('title', 'Gameapp - Profile')
@section('class', 'dashboard registre user-edit')

@section('content')
    <header>
        <img class="title-content" src="{{asset('images/categoryInfo.svg')}}" alt="">
    </header>

    <section class="profile">
        <div class="form-group">
            @if ($category->image == 'no-category.png')
                <img id="upload" class="mask" src="{{ asset('images/imageCategory/' . $category->image) }}" alt="image-Default">
            @else
                <img id="upload" class="mask" src="{{ asset('images/imageCategory/' . $category->image) }}" alt="Photo">
            @endif
            <img class="border-mask" src="{{asset('images/loginRegistre/border-mask.svg')}}" alt="borde">
            <input id="photo" type="file" name="photo" accept="image/*">
        </div>
        <div class="form-group">
            <label>ID:</label>
            <span>{{ $category->id }}</span>
        </div>
        <div class="form-group">
            <label>Nombre:</label>
            <span>{{ $category->name }}</span>
        </div>
        <div class="form-group">
            <label>Empresa:</label>
            <span>{{ $category->manufacturer }}</span>
        </div>
        <div class="form-group">
            <label>Fecha de creación:</label>
            <span>{{ $category->releasedate }}</span>
        </div>
        <div class="form-group">
            <label>Descripción:</label>
            <textarea class="textarea">{{ $category->description }}</textarea>
        </div>
    </section>

    <footer class="navigation">
        <p>Admin</p>
        <a href={{ url('/categories') }}>
            <img src="{{asset('images/welcome/users/icon-back.svg')}}" alt="" class="back">
        </a>
    </footer>

@endsection

@section('js')

@endsection
