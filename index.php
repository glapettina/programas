<?php

require_once("config/conexion.php");

if (isset($_POST['enviar']) and $_POST['enviar'] == 'si') {
    require_once("models/Usuario.php");
    $usuario = new Usuario();
    $usuario->login();
}

?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CET Nº 13::Acceso</title>

    <link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="public/img/favicon.png" rel="icon" type="image/png">
    <link href="public/img/favicon.ico" rel="shortcut icon">


    <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">

                <form class="sign-box" action="" method="post" id="login_form">

                    <input type="hidden" id="rol_id" name="rol_id" value=1>
                    <div class="sign-avatar">
                        <img src="public/1.jpg" alt="" id="imgTipo">
                    </div>
                    <header class="sign-title" id="lblTitulo">Acceso</header>

                    <?php

                    if (isset($_GET['m'])) {

                        switch ($_GET['m']) {
                            case "1";
                    ?>

                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="icon ion-ioscheckmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                        <span>El Usuario y/o Contraseña son incorrectos</span>

                                    </div>
                                </div>
                            <?php
                                break;

                            case "2";
                            ?>

                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="icon ion-ioscheckmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                        <span>Los campos están vacíos</span>

                                    </div>
                                </div>
                    <?php
                                break;
                        }
                    }

                    ?>



                    <div class="form-group">
                        <input type="text" id="usu_correo" name="usu_correo" class="form-control" value="alumno@correo.com" />
                    </div>
                    <div class="form-group">
                        <input type="password" id="usu_pass" name="usu_pass" class="form-control" value="alumno" />
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="rol_id"><strong>Rol</strong></label>
                        <select class="form-control select2" id="rol_id" name="rol_id">
                            <option value="1">Alumno</option>
                            <option value="2">Administrador</option>
                            <option value="3">Directivo</option>
                        </select>
                    </div>
                    <!-- <div class="form-group col-md-12">
                    <div class="float-left reset col-md-6">
                            <a href="#" id="btnPreceptor">Directivo</a>
                            <input type="hidden" id="rol_id" name="rol_id" value=3>
                        </div>
                        <div class="float-left reset col-md-6">
                            <a href="#" id="btnPreceptor">Administrador</a>
                            <input type="hidden" id="rol_id" name="rol_id" value=2>
                        </div>
                    </div> -->
                    <input type="hidden" name="enviar" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>

                </form>
            </div>
        </div>
    </div>
    <!--.page-center-->


    <script src="public/js/lib/jquery/jquery.min.js"></script>
    <script src="public/js/lib/tether/tether.min.js"></script>
    <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function() {
                setTimeout(function() {
                    $('.page-center').matchHeight({
                        remove: true
                    });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                }, 100);
            });
        });
    </script>
    <script src="js/app.js"></script>
    <script type="text/javascript" src="index.js"></script>
</body>

</html>