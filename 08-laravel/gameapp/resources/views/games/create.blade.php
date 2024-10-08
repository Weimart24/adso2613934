@extends('layouts.app')
@section('title', 'Gameapp - Add-Game')
@section('class', 'dashboard registre user-edit')

@section('content')

    <header>
        <img class="title-content" src={{ asset('images/welcome/users/add-game.svg') }} alt="">
    </header>

    <section class="scroll higth-registre">
        <!-- RESTO DEL CONTENIDO -->
        <form action={{ route('games.store') }} method="post" enctype="multipart/form-data">
            @csrf
            <ul>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                @endif
            </ul>
            <!-- Label del id -->
            <div class="form-group">
                <img id="upload" class="mask" src={{ asset('images/welcome/users/add-icon.svg') }} alt="Photo">
                    <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
                <input id="photo" type="file" name="image" value="{{ old('image') }}" accept="image/*">
            </div>
            {{-- Nombre del Juego --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Nombre del Juego
                </label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="ej: Halo" maxlength="12">
            </div>
            {{-- Desarrollador del Juego --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Desarrollador
                </label>
                <input type="text" name="developer" value="{{ old('developer') }}" placeholder="ej: Microsoft" maxlength="12">
            </div>
            {{-- Categoría --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Categoría
                </label>
                <select type="" name="category_id" value="{{ old('category_id') }}">
                    <option value="">Seleccione Categoría</option>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}" @if(old('category_id') == $cat->id) selected @endif> {{ $cat->name }} </option>
                    @endforeach
                </select>
            </div>
            {{-- Año de creación --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Año de Creación
                </label>
                <input class="date" type="date" name="releasedate" value="{{ old('releasedate') }}" placeholder="123456789" maxlength="12">
            </div>
            {{-- Precio del Videojuego --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Precio
                </label>
                <input type="text" name="price" placeholder="$99.99" value="{{ old('price') }}" maxlength="12">
            </div>
            {{-- Genero --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Genero
                </label>
                <input type="text" name="genre" placeholder="Action" value="{{ old('genre') }}"maxlength="">
            </div>
            {{-- Slader --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Slader
                </label>
                <select type="" name="slider" value="{{ old('slider') }}">
                    <option value="">Seleccione Slader</option>
                    <option value="1" @if(old('slader') == 1 ) selected @endif>Activo</option>
                    <option value="0" @if(old('slader') == 0 ) selected @endif>Inactivo</option>
                </select>
            </div>
            <!-- Descripción -->
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Descripción
                </label>
                <textarea class="textarea" name="description" placeholder="Lorem ipsum" value=""maxlength="">{{ old('description') }}</textarea>
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

                    !$togglePass ? $(this).attr('src', "{{ asset ('images/loginRegistre/icon-eye-close.svg') }}") :
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