<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Painel</title>


    <!-- Custom CSS -->
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <!-- Custom JS -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <!-- Custom font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">
        $(function() {
            $('.close').click(function() {
                $('.ad').css('display', 'none');
            })
        })
        $(document).ready(function() {
            $('.nav-trigger').click(function() {
                $('.side-nav').toggleClass('visible');
            });
        });
    </script>
</head>
<body>

    <div class="header">
        <div class="logo">
            <span>Painel</span>
        </div>
        <a href="#" class="nav-trigger"><span></span></a>
    </div>
    <div class="side-nav ">
        <div class="logo">
            <span>  Olá, {{ Auth::user()->name }}</span>
        </div>
        <nav>
            <ul id="menu-content list-unstyled components">
                <li>
                    <a href="{{ url('/home') }}">
                        <span><i class="fas fa-home"></i></span>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/fornecedores') }}">
                        <span><i class="far fa-address-card"></i></span>
                        <span>Fornecedores</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/produtos') }}">
                        <span><i class="fas fa-archive"></i></span>
                        <span>Produtos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/vendedores') }}">
                        <span><i class="fas fa-users"></i></span>
                        <span>Vendedores</span>
                    </a>
                </li>
                <li >
                    <a href="{{ url('/usuarios') }}">
                        <span><i class="fas fa-user-plus"></i></span>
                        <span>Usuários</span>
                    </a>
                </li>

                <li href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <a style="color: #fff;">
                        <span><i class="fas fa-sign-out-alt"></i></span>
                        <span>Sair</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

       @yield('content')



<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
