@forelse ($users as $user)
    <div class="modules">
        <div class="individual-module">
            <figure>
                <a href="{{ url('users/' . $user->id) }}">
                    <img class="mask" src={{ asset('images/userProfile/' . $user->photo) }} alt="Photo">
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
    @empty
    <p>No users found.</p>
@endforelse
