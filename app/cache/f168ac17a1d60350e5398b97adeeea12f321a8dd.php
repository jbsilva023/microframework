<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ANONERG</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app/public/css/file-upload.css"/>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="/vendor/components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/be56a064b0.js" crossorigin="anonymous"></script>
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="/app/public/js/file-upload.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.file-upload').file_upload();
        });
    </script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="https://www.anoreg.org.br/site/wp-content/images/logo-anoreg-300.png" width="30" height="30"
                 alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
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
            </ul>
        </div>
    </nav>

    <section id="content">
        <?php echo $__env->yieldContent('content'); ?>
    </section>

    <footer class="container py-5">
        <div class="row">
            
            
        </div>
    </footer>
</div>

</body>
</html>
<?php /**PATH /var/www/projetos/microframework/app/views/layouts/default.blade.php ENDPATH**/ ?>