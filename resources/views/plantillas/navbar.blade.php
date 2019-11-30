<nav class="navbar navbar-expand-lg navbar-dark bg-custom">
<a class="navbar-brand" href="/home" style = "font-family:Questrial;">
    <img src="icons\iconmonstr-medical-7-240.png" width="30" height="30" alt="">
    &nbsp;&nbsp;FARMACIAS LA BENDICIÓN
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @if (Route::has('login'))

                    @auth

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" style = "font-family:Questrial;">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="/productos">Listar Productos</a>
                <a class="dropdown-item" href="/tipomedicamento">Listar Tipos de Medicamentos</a>
                <a class="dropdown-item" href="/casamedica">Listar Casas Medicas</a>
                <a class="dropdown-item" href="/presentacion">Listar Presentaciones de Medicamentos</a>
            </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Caja
                </a>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownPortfolio">
                    <a class="dropdown-item" href="/buscar">Registrar Venta de Medicamentos</a>
                    <a class="dropdown-item" href="/buscar_compra">Registrar Compra de Medicamentos</a>
                    <a class="dropdown-item" href="/compras">Registrar abono a acreedor</a>
                </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/visitadores">Visitadores Medicos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/proveedores">Proveedores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/usuarios">Usuarios</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reportes
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="/diario">Reporte de ventas</a>
                <a class="dropdown-item" href="/fechas">Reporte de vencimientos</a>
                <a class="dropdown-item" href="/acreedores">Reporte de acreedores</a>
                <a class="dropdown-item" href="/diario_compras">Reporte de compras</a>
                <a class="dropdown-item" href="/diario_abonos">Reporte de abonos</a>
            </div>
        </li>
        </ul>
    </div>
    <form class="form-inline ml-auto" method="POST" action="{{route('logout')}}">
        {{ csrf_field() }}
        <button class="btn btn-secondary btn-sm">Cerrar Sesion</button>
    </form>
    @else

    <form class="form-inline ml-auto" action="{{route('login')}}">
        <button class="btn btn-secondary btn-sm">Login</button>
    </form>

    @endauth

    @endif
</nav>
