<?php

$nome_tela="filtros";
include_once "../Responsaveis/class/Carregar.class.php";
include_once 'topo_usuario.php';

if (isset($_COOKIE['curso'])) {
    $curso = $_COOKIE['curso'];
} else {
    $curso = 0;
}
// MONTANDO A LISTA DE CURSOS DO SELECT
$objCurso = new Curso();
$listar = $objCurso->listar($complemento_sql);
$saida = '<option value="0">Selecione...</option>';
foreach ($listar as $dados) {
    $saida .= '<option value="' . $dados->id . '"';
    if ($dados->id == $curso) {
        $saida .= " selected='selected'";
    }
    $saida .= '>' . $dados->nomecurto . '</option>';
}

if ( isset($_COOKIE['ano_sem']) ) {
    $ano_sem = $_COOKIE['ano_sem'];
} else {
    $ano_sem = 0;
}

//$cookie_name = "usuario";
//$cookie_value = "Jose da Silva";
//setcookie($cookie_name, $cookie_value, time() + (60), "/");

?>

<div class="container">

    <!-- FIRST ROW OF BLOCKS -->     
    <div class="row">

        <!-- UM QUADRO -->
        <div class="col-sm-3 col-lg-3">
            <div class="dash-unit">
                <dtitle>DEFINIR FILTROS</dtitle>
                <hr>
                <div class="text">
                    
                    <fieldset>
                        <form action="setacookies.php">
                            <p>
                                <b>CURSO/ESCOLA:</b><br>
                                <select name="curso" class="form-control-static" style="color: black">
                                    <?php echo $saida; ?>
                                </select>
                            </p>
                            
                            <p>
                                <b>ANO/SEMESTRE:</b> (0 = todos)<br>
                                <input class="form-control-static" style="color: black" type="number" name="ano_sem" value="<?php echo $ano_sem; ?>">
                            </p>
                            
                            <p>
                                <button type="submit" class="btn btn-success">Salvar</button>
                                <a href="index.php" class="btn btn-default">Voltar</a>
                            </p>
                        </form>
                    </fieldset>
                    
                </div>
            </div>
        </div>
 
    </div>
</div><!-- /row -->

<!-- NOVAS LINHAS ENTRAM AQUI -->

</div> <!-- /container -->



<?php
include_once 'rodape_usuario.php';
?>