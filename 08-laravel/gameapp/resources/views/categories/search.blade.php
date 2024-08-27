@forelse ($categories as $category)
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
            <button class="delete" data-fullname="{{ $category->name }}">
                <img src="{{ asset('images/welcome/users/icon-delete.svg') }}" alt="delete">
            </button>
            <form action="{{ url('categories/' . $category->id) }}" method="post" class="delete-form">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
    @empty
    <p>No users found.</p>
@endforelse
