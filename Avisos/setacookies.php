<?php

$nome_tela = "cookiesok";
include_once "../Responsaveis/class/Carregar.class.php";
include_once 'topo_usuario.php';

if (isset($_GET['curso'])) {
    setcookie('curso', $_GET['curso']);
    $curso = $_GET['curso'];
    
    // pegando nome do curso
    $objCurso = new Curso();
    $objCurso->id = $curso;
    $dadosCurso = $objCurso->retornarunico();
    $nome_curso = $dadosCurso->nomecurto;
}

if (isset($_GET['ano_sem'])) {
    setcookie('ano_sem', $_GET['ano_sem']);
    $ano_sem = $_GET['ano_sem'];
}


?>

<div class="container">

    <!-- FIRST ROW OF BLOCKS -->     
    <div class="row">

        <div class="col-sm-3 col-lg-3">
            
            <!-- FILTROS -->
            <div class="half-unit">
                <dtitle>FILTROS ATIVOS - <?php echo $data_hoje; ?></dtitle>
                <hr>
                <div class="cont">
                    <p><bold><?php echo $nome_curso; ?></bold><br>
                    ANO/SEM.: 
                    <?php
                    if ($ano_sem > 0) {
                        echo $ano_sem . 'º';
                    } else {
                        echo "0 (todos)";
                    }
                    ?>
                    </p>
                </div>	
            </div>
            
            <!-- SERVER UPTIME -->
            <div class="half-unit">
                <dtitle>FILTROS ALTERADOS...</dtitle>
                <hr>
                <div class="cont">
                    <a href="index.php" class="btn btn-default">Ver Avisos/Notícias</a>
                </div>

            </div>

        </div>
    </div><!-- /row -->

</div> <!-- /container -->

<?php
include_once 'rodape_usuario.php';
?>