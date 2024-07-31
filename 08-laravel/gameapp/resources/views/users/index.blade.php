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
            <img class="mask" src={{ asset('images/userProfile/') }} alt="Photo">
            <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
        </div>
    </header>


    <section class="content-profile">
        @foreach ($users as $user)
            <div class="modules">
                <div class="individual-module">
                    <figure>
                        <a href="{{ url('users/' . $user->id) }}">
                            <img class="mask" src={{ asset('images/userProfile/' . $user->photo) }} alt="Photo">
                            <img class="border-mask" src="images/loginRegistre/border-mask.svg" alt="borde">
                        </a>
                    </figure>
                    <aside class="info">
                        <div class="titulos">
                            <p>ID:</p>
                            <p>NOMBRE:</p>
                            <p>CUMPLEAÑOS:</p>
                        </div>
                        <div class="contenido">
                            <p>{{ $user->id }}</p>
                            <p>{{ $user->fullname }}</p>
                            <p>{{ $user->birthdate }}</p>
                        </div>
                    </aside>
                </div>
                <div class="info">
                    {{-- <a href="javascript:;" class="delete" data-fullname="{{ $user->fullname }}">
                        <img src={{ asset('images/welcome/users/icon-delete.svg') }} alt="delete" class="delete">
                    </a>
                    <form action={{ url('users/' . $user->id) }} method="post" style="display: none">
                        @csrf
                        @method('delete')
                    </form>
                    --}}
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/welcome/users/icon-edit.svg" alt="" class="edit">
                    </a>
                    <!--ORGANIZAR EL FORMULARIO PARA QUE SE VEA BONITO-->
                    <form action="{{ url('users/' . $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="">
                            <img src={{ asset('images/welcome/users/icon-delete.svg') }} alt="delete" class="delete">
                        </a>
                    </form>
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

@section('js')
    <script>
        $('div').on('click', '.delete', function() {
            $fullname = $(this).attr('data-fullname')
            Swal.fire({
                title: "¿Eliminar?",
                text: "Esta seguro de eliminar a " + $fullname,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this.next()).submit()
                }
            });
        })
    </script>
@endsection
