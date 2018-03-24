<?php
if (!isset($_COOKIE['curso']) || !isset($_COOKIE['ano_sem'])) {
    header("location:filtros.php");
} else {
    $curso = $_COOKIE['curso'];
    $ano_sem = $_COOKIE['ano_sem'];
}

$nome_tela = "index";
include_once "../Responsaveis/class/Carregar.class.php";
include_once 'topo_usuario.php';
$pasta_upload = "../arquivos_upload/";

if (isset($_COOKIE['curso'])) {
    $curso = $_COOKIE['curso'];
    // pegando nome do curso
    $objCurso = new Curso();
    $objCurso->id = $curso;
    $dadosCurso = $objCurso->retornarunico();
    $nome_curso = $dadosCurso->nomecurto;
}

$data_hoje = date("d/m/Y");
//echo date("d/m/Y");
//echo date("Y-m-d");
?>


<div class="container">

    <!-- FIRST ROW OF BLOCKS -->     
    <div class="row">

        <?php
$objNoticia = new Noticia();
if ( $ano_sem > 0 ) {
    $complemento_sql = " where Assunto.id_curso=$curso and ano_semestre=$ano_sem";
} else {
    $complemento_sql = " where Assunto.id_curso=$curso";
}
$complemento_sql .= " and data_validade >= '".date("Y-m-d")."' ";
//$complemento_sql = "";
$listar=$objNoticia->listar($complemento_sql);
			
$cont = 0;

foreach ($listar as $dados){
    //print_r($dados);
    
    if ( strlen($dados->imagem) > 0 || strlen($dados->anexo) > 0 ) { 
        $tmpImagemAnexo = "SIM"; 
    } else { 
        $tmpImagemAnexo = "-";
    }
    
    $tmpDataNoticia  = new Data($dados->data_evento);
    $data_evento     = $tmpDataNoticia->FormatoParaTela();
    
    $tmpDataNoticia  = new Data($dados->data_validade);
    $data_validade   = $tmpDataNoticia->FormatoParaTela();
    
    if ( $dados->ano_semestre > 0 ) {
        $tmpAnoSem   = $dados->ano_semestre . "º";
    } else {
        $tmpAnoSem   = "geral";
    }
    
    
    echo '<div class="col-sm-3 col-lg-3" style="background-color: #003500">';
    if (strlen($dados->anexo)+strlen($dados->imagem) > 0) {
        echo '<div class="dash-unit dash-unit-maisalta" style="background-color: #003500">';
    } else {
        echo '<div class="dash-unit" style="background-color: #003500">';
    }
    echo '   <dtitle>' . $dados->nome_curso . ' - ' . $tmpAnoSem . ' - ' .$data_evento . '</dtitle>' .
         '   <hr>' .
         '   <div class="text">' .
         '     <p><b>' . $dados->nome_assunto . '</b> - ' .
              '<b>'.$dados->titulo.'</b><br>' .
                    $dados->texto .
         '     <p><grey>Por:' . $dados->nome_responsavel . '. Val:' . $data_validade . '</grey></p>';
    if (strlen($dados->anexo)) {
        echo ' <p><a href="' . $pasta_upload . $dados->anexo . '" target="_blank"> >>> VER ANEXO <<< </a></p>';
    }
    if (strlen($dados->imagem)) {
        echo ' <p><a href="' . $pasta_upload . $dados->imagem . '" target="_blank"><img src="' . $pasta_upload . $dados->imagem . '" width="235" height="235"></a></p>';
    }   
    echo '   </div>' .
         ' </div>' .
         '</div>';
    //echo "<br>" . $data_evento . ' ' . $dados->nome_assunto . "<br>";
    
    $cont++;
}

if ($cont == 0) {
    echo '<div class="col-sm-3 col-lg-3" style="background-color: #003500">' .
         ' <div class="dash-unit" style="background-color: #003500">' .
         '   <dtitle> Mensagem: </dtitle>' .
         '   <hr>' .
         '   <div class="text">' .
         '     <br><br><br><br>    ' .
         '     <p><b>Sem Avisos/Notícias...</b><br>' .
         '     <br><br><br><br>    ' .
         '     <p><grey>Não há Avisos/Notícias selecionados para os filtros atualmente ativos.</grey></p>' .
         '   </div>' .
         ' </div>' .
         '</div>';
}
?>

        <div class="col-sm-3 col-lg-3">

            <!-- FILTROS -->
            <div class="half-unit" style="background-color: #003500">
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
            <div class="half-unit" style="background-color: #003500">
                <dtitle>ALTERAR FILTROS</dtitle>
                <hr>
                <div class="cont">
                    <a href="filtros.php" class="btn btn-default">Alterar Filtros</a>
                </div>

            </div>

        </div>
    </div><!-- /row -->

    <!-- NOVAS LINHAS ENTRAM AQUI -->

</div> <!-- /container -->

<?php
include_once 'rodape_usuario.php';
?>