@extends('layouts.app')
@section('title', 'Gameapp - Add-User')
@section('class', 'dashboard registre user-edit')

@section('content')

    <header>
        <img class="title-content" src={{ asset('images/welcome/users/add-category.svg') }} alt="">
    </header>

    <section class="scroll higth-registre">
        <!-- RESTO DEL CONTENIDO -->
        <form action={{ route('categories.store') }} method="post" enctype="multipart/form-data">
            @csrf
            <ul>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                @endif
            </ul>
            <!-- Label del image -->
            <div class="form-group">
                <img id="upload" class="mask" src={{ asset('images/welcome/users/add-icon.svg') }} alt="Photo">
                <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
                <input id="photo" type="file" name="photo" value="{{ old('photo') }}" accept="image/*">
            </div>
            {{-- Nombre --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Nombre
                </label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Xbox" maxlength="12">
            </div>
            {{-- Empresa --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Empresa
                </label>
                <input type="text" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="Microsoft"
                    maxlength="12">
            </div>
            {{-- Año de Creación --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Fecha de Creación
                </label>
                <input type="date" name="releasedate" value="{{ old('releasedate') }}" maxlength="12">
            </div>
            {{-- Descripción --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Descripción
                </label>
                <textarea class="textarea" name="description" placeholder="Lorem ipsum" value="{{ old('description') }}"maxlength=""></textarea>
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
        <a href={{ url('/categories') }}>
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
