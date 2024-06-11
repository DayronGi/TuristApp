<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TuristApp')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #343a40;
            color: #fff;
            height: 100vh;
            position: fixed;
            padding-top: 20px;
        }
        #content {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 20px;
        }
        .sidebar-header {
            text-align: center;
            padding: 10px;
        }
        .components a {
            color: #ffffff;
            padding: 10px;
            text-decoration: none;
            display: block;
            transition: all 0.3s;
        }
        .components a:hover {
            background-color: #1d2124;
            color: #078fff;
        }
        .components a.dropdown-toggle::after {
            display: none;
        }
        .components .collapse.show a {
            background-color: #1d2124;
            color: #fff;
        }
        .components .collapse.show a:hover {
            color: #078fff;
        }
    </style>
</head>
<body>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>TuristApp</h3>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="#planesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Planes turísticos</a>
                <ul class="collapse list-unstyled" id="planesSubmenu">
                    <li>
                        <a href="{{ route('planes.list') }}">Ver planes</a>
                    </li>
                    <li>
                        <a href="{{ route('planes.create') }}">Crear plan</a>
                    </li>
                    <li>
                        <a href="{{ route('planes.admin') }}">Administrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#puntosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Puntos de visita</a>
                <ul class="collapse list-unstyled" id="puntosSubmenu">
                    <li>
                        <a href="{{ route('puntos.list') }}">Ver puntos</a>
                    </li>
                    <li>
                        <a href="{{ route('puntos.create') }}">Crear punto</a>
                    </li>
                    <li>
                        <a href="{{ route('puntos.admin') }}">Administrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#tarifasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tarifas</a>
                <ul class="collapse list-unstyled" id="tarifasSubmenu">
                    <li>
                        <a href="{{ route('tarifas.list') }}">Ver tarifas</a>
                    </li>
                    <li>
                        <a href="{{ route('tarifas.create') }}">Crear tarifa</a>
                    </li>
                    <li>
                        <a href="{{ route('tarifas.admin') }}">Administrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#vendedoresSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Vendedores</a>
                <ul class="collapse list-unstyled" id="vendedoresSubmenu">
                    <li>
                        <a href="{{ route('vendedores.list') }}">Ver vendedores</a>
                    </li>
                    <li>
                        <a href="{{ route('vendedores.create') }}">Crear vendedor</a>
                    </li>
                    <li>
                        <a href="{{ route('vendedores.admin') }}">Administrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Clientes</a>
                <ul class="collapse list-unstyled" id="clientesSubmenu">
                    <li>
                        <a href="{{ route('clientes.list') }}">Ver clientes</a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.add') }}">Crear cliente</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#comprasSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Compras</a>
                <ul class="collapse list-unstyled" id="comprasSubmenu">
                    <li>
                        <a href="{{ route('compras.list') }}">Ver compras</a>
                    </li>
                    <li>
                        <a href="{{ route('compras.add') }}">Crear compra</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#reportesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reportes</a>
                <ul class="collapse list-unstyled" id="reportesSubmenu">
                    <li>
                        <a href="{{ route('reportes.list') }}">Ver reportes</a>
                    </li>
                    <li>
                        <a href="{{ route('compras.add') }}">Crear compra</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="content">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
