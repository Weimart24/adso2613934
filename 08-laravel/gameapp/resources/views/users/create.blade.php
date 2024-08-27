@extends('layouts.app')
@section('title', 'Gameapp - Add-User')
@section('class', 'dashboard registre user-edit')

@section('content')

    <header>
        <img class="title-content" src={{ asset('images/welcome/users/add-user.svg') }} alt="">
    </header>

    <section class="scroll higth-registre">
        <!-- RESTO DEL CONTENIDO -->
        <form action={{ route('users.store') }} method="post" enctype="multipart/form-data">
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
                <input id="photo" type="file" name="photo" value="{{ old('photo') }}" accept="image/*">
            </div>
            {{-- Documento --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Documento
                </label>
                <input type="text" name="document" value="{{ old('document') }}" placeholder="123456789" maxlength="12">
            </div>
            {{-- Nombre --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Nombre Completo
                </label>
                <input type="text" name="fullname" value="{{ old('fullname') }}" placeholder="Pepito Pérez" maxlength="12">
            </div>
            {{-- Género --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Género
                </label>
                <select type="" name="gender" value="{{ old('gender') }}">
                    <option value="">Seleccione Género</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            {{-- Cumpleaños --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Cumpleaños
                </label>
                <input class="date" type="date" name="birthdate" value="{{ old('birthdate') }}" placeholder="123456789" maxlength="12">
            </div>
            {{-- Teléfono --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Teléfono
                </label>
                <input type="text" name="phone" placeholder="3000000000" value="{{ old('phone') }}" maxlength="12">
            </div>
            {{-- Correo Electrónico --}}
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Correo Electrónico
                </label>
                <input type="email" name="email" placeholder="juanitoperez@gmail.com" value="{{ old('email') }}"maxlength="">
            </div>
            <!-- Contraseña -->
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Contraseña
                </label>
                <img class="ico-eye" src={{asset ('images/loginRegistre/icon-eye.svg') }} alt="Eyes">
                <input type="password" name="password" value="{{ old('password') }}" placeholder="∗∗∗∗∗∗∗∗∗∗∗∗∗∗">
            </div>
            <div class="form-group">
                <label for="">
                    <img src="" alt="">
                    Verficar Contraseña
                </label>
                <img class="ico-eye" src={{asset ('images/loginRegistre/icon-eye.svg') }} alt="Eyes">
                <input type="password" name="password_confirmation" value="{{ old('password') }}" placeholder="∗∗∗∗∗∗∗∗∗∗∗∗∗∗">
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
        <a href={{ url('/users') }}>
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