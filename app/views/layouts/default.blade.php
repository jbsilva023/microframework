<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ANONERG</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('css/libs/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs/bite-checkbox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/libs/font-awesome.min.css')}}">
    @yield('css')--}}

    {{--<script type="text/javascript" src="{{asset('js/libs/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/libs/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/libs/bootstrap.min.js')}}"></script>
    @yield('js')--}}

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="https://www.anoreg.org.br/site/wp-content/images/logo-anoreg-300.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Importar <span class="sr-only">(Página atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Destaques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Preços</a>
                </li>
                {{--<li class="nav-item">
                    <a class="nav-link disabled" href="#">Desativado</a>
                </li>--}}
            </ul>
        </div>
    </nav>

    <section id="content">
        @yield('content')
    </section>

    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
                <small class="d-block mb-3 text-muted">© 2017-2018</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Algo legal</a></li>
                    <li><a class="text-muted" href="#">Feature aleatória</a></li>
                    <li><a class="text-muted" href="#">Recursos para times</a></li>
                    <li><a class="text-muted" href="#">Coisas para desenvolvedores</a></li>
                    <li><a class="text-muted" href="#">Outra coisa legal</a></li>
                    <li><a class="text-muted" href="#">Último item</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Fontes</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Fonte</a></li>
                    <li><a class="text-muted" href="#">Nome da fonte</a></li>
                    <li><a class="text-muted" href="#">Outra fonte</a></li>
                    <li><a class="text-muted" href="#">Fonte final</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Fontes</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Negócios</a></li>
                    <li><a class="text-muted" href="#">Educação</a></li>
                    <li><a class="text-muted" href="#">Governo</a></li>
                    <li><a class="text-muted" href="#">Jogos</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Sobre</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Equipe</a></li>
                    <li><a class="text-muted" href="#">Locais</a></li>
                    <li><a class="text-muted" href="#">Privacidade</a></li>
                    <li><a class="text-muted" href="#">Termos</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
