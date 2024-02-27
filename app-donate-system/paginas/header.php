<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Donate System | Home</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/bg-img/Logo2.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://scripts.lahar.com.br/api_parametros.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var integrou = false;
        $("#ID_DO_FORMULARIO_COM_AS_INFOS").submit(function() {
            if (!integrou) {
                efetua_integracao();
                integrou = true;
                return false;
            }
        })
    });

    function efetua_integracao() {
        var campos = { // Colocar aqui campos fixos ou enviar estas infos como hidden no formulário
            token_api_lahar: 'TOKEN_DA_API_LAHAR_OBTIDO_EM_CONFIGURACOES',
            nome_formulario: "NOME_DO_FORMULARIO_PARA_IDENTIFICACAO", // será o identificador da conversão na base de contatos
            identificador_tracker_lahar: $('#identificador_tracker_lahar').val(), // Remover esta linha caso não utilize o Tracking 
            url_origem: $(location).attr('href') // Alterar apenas se necessário
        };
        var elementos = [];
        $('.api-lahar').each(function(index, element) {
            elementos.push(element);
        });
        integracao_js(campos, 'redireciona', elementos, 'conversions');
    }

    function redireciona() {
        var form = document.getElementById("ID_DO_FORMULARIO_COM_AS_INFOS");
        form.submit();
    }
</script>

<body>
    <!-- ##### Search Wrapper Start ##### -->
    <div class="search-wrapper d-flex align-items-center justify-content-center bg-img foo-bg-overlay" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="close--icon">
            <i class="fa fa-times"></i>
        </div>
        <!-- Logo -->
        <a href="index.html" class="search-logo"><img src="../img/bg-img/Logo2.png" alt=""></a>
        <!-- Search Form -->
        <div class="search-form">
            <form action="#" method="get">
                <input type="search" name="search" id="search" placeholder="Enter Your Keywords">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <!-- Copwrite Text -->
        <div class="copywrite-text">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>

    <div id="preloader">
        <div class="circle">
            <img src="../img/bg-img/logo2.png" alt="">
        </div>
    </div>

    <nav class="navbar navbar-expand-lg  ftco-navbar-light">
        <div class="container-xl">
            <a class="navbar-brand align-items-center" href="index.html">
                <div class="circle">
                <a href="index.php" class="search-logo"><img class="logo-img" src="../img/logo.png" alt=""></a>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="sobre-nos.php">Sobre Nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="causas.php">Causas</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>