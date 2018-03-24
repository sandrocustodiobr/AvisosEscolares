<?php
session_start();

if(!isset($_SESSION['logado'])){
    header("location:../sistema/login.php");
}

if (!$_SESSION['admin']) {
    if ($nome_modulo == "TIPOS de NOTÍCIA" && $nome_tela !== "lista/busca") {
        header("location:tiponoticia-listar.php");
    }
    if ($nome_modulo == "CURSOS" && $nome_tela !== "lista/busca") {
        header("location:cursos-listar.php");
    }
    if ($nome_modulo == "ASSUNTOS" && $nome_tela !== "lista/busca") {
        header("location:assuntos-listar.php");
    }
}

?>

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AVISOS/NOTÍCIAS IFSUL</title>

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

<?php 
$complemento_sql = ""; 
$pasta_upload    = "../../arquivos_upload/";
?>
    
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="../assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="../sistema/index.php" class="simple-text">
                    AVISOS/NOTÍCIAS IFSUL
                </a>
            </div>

            <ul class="nav">
                <li <?php if ($nome_modulo == "INÍCIO") { echo 'class="active"'; }?>>
                    <a href="../sistema/index.php">
                        <i class="pe-7s-home"></i>
                        <p>Início</p>
                    </a>
                </li>
                <li <?php if ($nome_modulo == "NOTÍCIAS") { echo 'class="active"'; }?>>
                    <a href="../noticias/noticias.php">
                        <i class="pe-7s-bell"></i>
                        <p>Notícia/Aviso</p>
                    </a>
                </li>
                <li <?php if ($nome_modulo == "ASSUNTOS") { echo 'class="active"'; }?>>
                    <a href="../assuntos/assuntos.php">
                        <i class="pe-7s-ticket"></i>
                        <p>Assuntos/Matérias</p>
                    </a>
                </li>
                <li <?php if ($nome_modulo == "CURSOS") { echo 'class="active"'; }?>>
                    <a href="../cursos/cursos.php">
                        <i class="pe-7s-medal"></i>
                        <p>Cursos</p>
                    </a>
                </li>
                <li <?php if ($nome_modulo == "TIPOS de NOTÍCIA") { echo 'class="active"'; }?>>
                    <a href="../tiponoticia/tiponoticia.php">
                        <i class="pe-7s-tools"></i>
                        <p>Tipo de Notícia/Aviso</p>
                    </a>
                </li>
                <li <?php if ($nome_modulo == "RESPONSÁVEIS") { echo 'class="active"'; }?>>
                    <a href="../responsaveis/responsaveis-listar.php">
                        <i class="pe-7s-user"></i>
                        <p>Responsáveis</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-close-circle"></i>
                        <p>SAIR</p>
                    </a>
                </li>
		<li class="active-pro">
                    <a href="../../Avisos/index.php" append="_blank">
                        <i class="pe-7s-rocket"></i>
                        Visualizando Notícias/Avisos
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <h3><?php echo $nome_modulo." - ".$nome_tela; ?></h3>
                    <!-- <a class="navbar-brand" href="#">texto</a> -->
                    
                    
                </div>
                
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        <div class="">
                        
                        </div>
                        <li>
                            <input type="button" value="Voltar" onClick="history.go(-1)" class='btn btn-default'> 
                        </li>
                        <li>
                            <input type="button" value="Avançar" onCLick="history.forward()" class='btn btn-default'> 
                        </li>
			<li>
                           <a href="../noticias/noticias.php">
                                <p><i class="fa fa-search"></i> BUSCA</p>
                            </a>
                        </li>

                        <li>
                            <a href="../responsaveis/responsaveis-unico.php?id=<?php echo $_SESSION['id']; ?>">
                               <p><i class="fa fa-user"></i> <?php echo $_SESSION['nome']; ?></p>
                           </a>
                        </li>
                        
	                    <li>
                            <a href="../sistema/login.php">
                                <p><i class="pe-7s-close-circle"></i> SAIR</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
        
        
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
<!--
<form name="topo-botoes"> 
<input type="button" value="Voltar" onClick="history.go(-1)" class='btn btn-primary'> 
<input type="button" value="Avançar" onCLick="history.forward()" class='btn btn-primary'> 
<input type="button" value="Atualizar" onClick="history.go(0)" class='btn btn-primary'> 
</form>
-->



