@extends('layouts.app')
@section('title', 'GameApp - Users Module')
@section('class', 'user dashboard')

@section('content')
    <header>
        <div class="title-name">
            <img class="title-content" src="images/welcome/users/content-categories.svg" alt="">
            <a href={{ url('categories/create') }} class="add-icon">
            </a>
            {{-- <a href={{ url('export/users/pdf') }} class="pdf-icon">
            </a>
            <a href={{ url('export/users/excel') }} class="excel-icon">
            </a> --}}
            <input type="text" placeholder="Search" name="qsearch" class="qsearch" maxlength="15">
        </div>

        <div class="img-profile">
            <img class="mask" src={{ asset('images/userProfile/' . Auth::user()->photo) }} alt="Photo">
            <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
        </div>
    </header>

    <section class="content-profile">
        @foreach ($categories as $category)
            <div class="modules">
                <div class="individual-module">
                    <figure>
                        <a href="{{ url('categories/' . $category->id) }}">
                            <img class="mask" src={{ asset('images/imageCategory/' . $category->image) }} alt="Photo">
                            <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
                        </a>
                    </figure>
                    <aside class="info">
                        <div class="titulos">
                            <p>ID:</p>
                            <p>NOMBRE:</p>
                            <p>AÑO:</p>
                        </div>
                        <div class="contenido">
                            <p>{{ $category->id }}</p>
                            <p>{{ $category->name }}</p>
                            <p>{{ $category->releasedate }}</p>
                        </div>
                    </aside>
                </div>
                <div class="info">
                    <a href="{{ url('categories/' . $category->id . '/edit') }}">
                        <img src="images/welcome/users/icon-edit.svg" alt="" class="edit">
                    </a>
                    <!--ORGANIZAR EL FORMULARIO PARA QUE SE VEA BONITO-->
                    <button class="delete" data-fullname="{{ $category->fullname }}">
                        <img src="{{ asset('images/welcome/users/icon-delete.svg') }}" alt="delete">
                    </button>
                    <form action="{{ url('categories/' . $category->id) }}" method="post" class="delete-form">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        @endforeach

    </section>
    {{ $categories->links('layouts.paginator') }}
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
                var model = 'categories';

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
