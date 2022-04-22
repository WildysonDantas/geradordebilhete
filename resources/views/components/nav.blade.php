<nav class="navbar navbar-expand-lg  navbar-expand-sm navbar-expand-xl  navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">Bolão da Sorte Vip</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


        </ul>
        <form class="form-inline my-2 my-lg-0">
            @if (!Auth::check())
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Login</button>
            @else
                <a class=" my-2 my-sm-0 text-white" href="{{ route('dashboard') }}">Área
                    Administrativa</a>
                <div class="text-white"> &nbsp; | &nbsp; </div>

                <a class=" my-2 my-sm-0 text-white" href="{{ route('dashboard') }}">
                    Sair</a>
            @endif
        </form>
    </div>
</nav>
