@extends('layouts.app')
@section('title', 'Gameapp - Edit-Game')
@section('class', 'dashboard registre user-edit')

@section('content')

    <header>
        <img class="title-content" src={{ asset('images/welcome/users/edit-user.svg') }} alt="">
    </header>

    <section class="scroll higth-registre">
        <!-- RESTO DEL CONTENIDO -->
        <form action={{ url('games/' . $game->id) }} method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- en html no existe el metodo PUT --}}
            <ul>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                @endif
            </ul>
            <!-- Label del id -->
            <div class="form-group">
                <img id="upload" class="mask" src={{ asset('images/gameImage/' . $game->image) }} alt="Photo">
                <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
                <input id="photo" type="file" name="image" value="{{ old('image') }}" accept="image/*">
                <input type="hidden" name="originPhoto" value={{ $game->image }}>
                <input type="hidden" name="id" value={{ $game->id }}>
            </div>
            {{-- Titulo --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Título
                </label>
                <input type="text" name="title" value="{{ old('title', $game->title) }}" placeholder="123456789"
                    maxlength="12">
            </div>
            {{-- Desarrollador --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Desarrollador
                </label>
                <input type="text" name="developer" value="{{ old('developer', $game->developer) }}"
                    placeholder="Pepito Pérez" maxlength="12">
            </div>
             {{-- Genero --}}
             <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Genero
                </label>
                <input type="text" name="genre" placeholder="Action" value="{{ old('genre', $game->genre) }}"maxlength="">
            </div>
            {{-- Año de creación --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Año de Creación
                </label>
                <input type="date" name="releasedate" value="{{ old('releasedate', $game->releasedate) }}"
                    placeholder="123456789" maxlength="12">
            </div>
            {{-- Categoría --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Categoría
                </label>
                <select type="" name="category_id"">
                    <option value="">Seleccione Categoría</option>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}" @if(old('category_id', $game->category_id) == $cat->id) selected @endif> {{ $cat->name }} </option>
                    @endforeach
                </select>
            </div>
            {{-- Precio --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Precio
                </label>
                <input type="text" name="price" placeholder="3000000000" value="{{ old('price', $game->price) }}"
                    maxlength="12">
            </div>
            {{-- Slader --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Slider
                </label>
                <select type="" name="slider" value="{{ old('slider', $game->slider) }}">
                    <option value="">Seleccione Slader</option>
                    <option value="1" @if(old('slader', $game->slider) == 1 ) selected @endif>Activo</option>
                    <option value="0" @if(old('slader', $game->slider) == 0 ) selected @endif>Inactivo</option>
                </select>
            </div>
            {{-- Descripción --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Descripción
                </label>
                <textarea class="textarea" name="description" placeholder="" maxlength="">{{ old('description', $game->description) }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src={{ asset('images/welcome/users/bg-btn-save.svg') }} alt="">
                </button>
            </div>
        </form>
    </section>

    <footer class="navigation">
        <p>Admin</p>
        <a href={{ url('/games') }}>
            <img src={{ asset('images/welcome/users/icon-back.svg') }} alt="" class="back">
        </a>
    </footer>

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

                    !$togglePass ? $(this).attr('src',
                        "{{ asset('images/loginRegistre/icon-eye-close.svg') }}") :
                    $(this).attr('src', "{{ asset('images/loginRegistre/icon-eye.svg') }}")
                $togglePass = !$togglePass
            })
            //------------------------------------------
            $('.border-mask').click(function(e) {
                $('#photo').click()
            })
            $('#photo').change(function(e) {
                e.preventDefault()
                let reader = new FileReader()
                reader.onload = function(evt) {
                    $('#upload').attr('src', event.target.result)
                }
                reader.readAsDataURL(this.files[0])
            })
        })
    </script>

@endsection
