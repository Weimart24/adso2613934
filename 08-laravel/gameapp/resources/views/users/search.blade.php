@forelse ($users as $user)
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
@empty
    No found
@endforelse
