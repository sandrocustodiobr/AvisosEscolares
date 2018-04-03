<?php
session_start();
if ($_SESSION["logado"]) {
    unset($_SESSION["logado"]);  // LOGOFF
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>NOTÍCIAS/AVISOS IFSUL</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
    <!--     BOTOES INICIAIS     -->
    <link href="../assets/css/botoes.css" rel="stylesheet" />
    
    <script src="../sistema/noticias.js"></script> 

</head>
<body>

    <!-- ACIMA, DO TEMPLATE / ABAIXO, DO EEXEMPLO DO PROFESSOR -->
    
    <div class="container">
        <div class="row" style="padding-top: 80px">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">NOTÍCIAS/AVISOS IFSUL</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="login-ok.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password">
                                </div>
                                <div class="form-group">
                                    <span style="font-family: sans-serif; color: lightgrey" >Admin: </span>
                                    <input class="checkbox-inline checked" name="admin" type="checkbox">
                                </div>
                                <button class="btn btn-lg btn-success btn-block" type="submit" value="Enviar" name="botao">Enviar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ABAIXO, DO TEMPLATE -->
    
</body>

    <!--   Core JS Files   -->
    <script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>

</html>
