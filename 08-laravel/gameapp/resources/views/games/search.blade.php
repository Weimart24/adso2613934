@forelse ($games as $game)
    <div class="modules">
        <div class="individual-module">
            <figure>
                <a href="{{ url('games/' . $game->id) }}">
                    <img class="mask" src={{ asset('images/gameImage/' . $game->image) }} alt="Photo">
                    <img class="border-mask" src={{ asset('images/loginRegistre/border-mask.svg') }} alt="borde">
                </a>
            </figure>
            <aside class="info">
                <div class="titulos">
                    <p>ID:</p>
                    <p>NOMBRE:</p>
                    <p>CREADOR:</p>
                </div>
                <div class="contenido">
                    <p>{{ $game->id }}</p>
                    <p>{{ $game->title }}</p>
                    <p>{{ $game->developer }}</p>
                </div>
            </aside>
        </div>
        <div class="info">
            <a href="{{ url('games/' . $game->id . '/edit') }}">
                <img src="images/welcome/users/icon-edit.svg" alt="" class="edit">
            </a>
            <!--ORGANIZAR EL FORMULARIO PARA QUE SE VEA BONITO-->
            <button class="delete" data-fullname="{{ $game->title }}">
                <img src="{{ asset('images/welcome/users/icon-delete.svg') }}" alt="delete">
            </button>
            <form action="{{ url('games/' . $game->id) }}" method="post" class="delete-form">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
@empty
    <p>No users found.</p>
@endforelse
