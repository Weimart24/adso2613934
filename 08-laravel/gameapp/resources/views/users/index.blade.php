@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'user dashboard')

@section('content')
    <header>
        <div class="title-name">
            <img class="title-content" src="images/welcome/users/content-users.svg" alt="">
            <a href={{ url('users/create') }} class="add-icon">
            </a>
            <a href={{ url('export/users/pdf') }} class="pdf-icon" >
            </a>
            <a href={{ url('export/users/excel') }} class="excel-icon" >
            </a>
            <form action="{{ url('import/users') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" class="hidden" accept="aplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <button type="submit" class="btn-import">
                    
                </button>
            <input type="text" placeholder="Search" name="qsearch" class="qsearch" maxlength="15">
        </div>

        <div class="img-profile">
            <img class="mask" src={{ asset('images/userProfile/' . Auth::user()->photo) }} alt="Photo">
            <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
        </div>
    </header>

    <section class="content-profile">
        {{-- <div class="loading-container">
            <span class="loading">L</span>
            <span class="loading">O</span>
            <span class="loading">A</span>
            <span class="loading">D</span>
            <span class="loading">I</span>
            <span class="loading">N</span>
            <span class="loading">G</span>
        </div> --}}
        @foreach ($users as $user)
            <div class="modules">
                <div class="individual-module">
                    <figure>
                        <a href="{{ url('users/' . $user->id) }}">
                            <img class="mask" src="{{ asset('images/userProfile/' . $user->photo) }}" alt="Photo">
                            <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
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
                    <a href="{{ url('users/' . $user->id . '/edit') }}">
                        <img src="images/welcome/users/icon-edit.svg" alt="" class="edit">
                    </a>
                    <!--ORGANIZAR EL FORMULARIO PARA QUE SE VEA BONITO-->
                    <button class="delete" data-fullname="{{ $user->fullname }}">
                        <img src="{{ asset('images/welcome/users/icon-delete.svg') }}" alt="delete">
                    </button>
                    <form action="{{ url('users/' . $user->id) }}" method="post" class="delete-form">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        @endforeach
        
    </section>
    {{ $users->links('layouts.paginator') }}
    <footer class="navigation">
        <p>Admin</p>
        <a href="{{ url('dashboard') }}">
            <img src="images/welcome/users/icon-back.svg" alt="" class="back">
        </a>
    </footer>

@endsection

@section('js')
    <script>
        $().ready(function() {
            $(document).on('click', '.delete', function() {
                console.log('click');
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
                        $(this).siblings('.delete-form').submit();
                    }
                });
            });

            $('.qsearch').on('keyup', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = $('meta[name="csrf-token"]').attr('content');
                var model = 'users';

                $.post(model + '/search', {
                        q: query,
                        _token: token
                    },
                    function(data) {
                        $('.content-profile').html(data);
                    }
                ).fail(function(xhr, status, error) {
                    console.error('Error:', error);
                });
            });
        });
    </script>
@endsection
