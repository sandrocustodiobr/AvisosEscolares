<?php
$nome_modulo = "NOTÍCIAS";
$nome_tela = "lista";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php // FILTROS
$objFiltro = new Parametros();
$objFiltro->add('data'  , 'data_publicacao', $_GET['data_publicacao']);
$objFiltro->add('data'  , 'data_evento'    , $_GET['data_evento']    );
$objFiltro->add('int'   , 'id_assunto'     , $_GET['id_assunto']);
$objFiltro->add('texto' , 'texto'          , $_GET['texto']     );
$objFiltro->add('int'   , 'ano_semestre'   , $_GET['ano_semestre']);

$complemento_sql = $objFiltro->sql();
$filtros_tela    = $objFiltro->tela();
$filtros_get     = $objFiltro->get();
?>

<a href="noticias-add.php" class="btn btn-warning">Criar Notícia</a> &nbsp; &nbsp; &nbsp; &nbsp; 
<label>Filtro(s) ativo(s): </label><?php echo $filtros_tela; ?> &nbsp; &nbsp; &nbsp; &nbsp; 

<?php
if ( !empty($complemento_sql) ) {  // BOTÃO Limpar filtro(s)
    echo '<a href="noticias.php" class="btn btn-primary">Limpar filtro(s)</a> &nbsp; &nbsp; &nbsp; &nbsp; ';
} 
?>

<fieldset>


    <form action="noticias.php<?php echo $filtros_get;?>" method="GET">

        <?php
        // MONTANDO A LISTA DE ASSUNTOS DO SELECT
        $obj90 = new Assunto();
        $listar = $obj90->listar();
        $saida = '<option value="0">Selecionar...</option>';
        foreach ($listar as $dados) {
            $saida .= '<option value="' . $dados->id . '"';
            if ($dados->id == $_GET['id_assunto']) {
                $saida .= " selected='selected'";
            }
            $saida .= '>' . $dados->nome_curso . " - " . $dados->nomecurto . '</option>';
        }
        ?>

        <br><br>

        <table>
            <tr>
                <td>
                    <label>Data Publicação:</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>Data Evento:</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>Assunto:</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>Ano/Sem</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>TEXTO:</label> &nbsp; &nbsp;
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="date" name="data_publicacao" class="form-control-static"> &nbsp;
                </td>
                <td>
                    <input type="date" name="data_evento" class="form-control-static"> &nbsp;
                </td>
                <td>
                    <select name="id_assunto" class="form-control-static">
                        <?php echo $saida; ?>
                    </select> &nbsp;
                </td>
                <td>
                    <input type="number" name="ano_semestre" class="form-control-static"> &nbsp;
                </td>
                <td>
                    <input type="text" name="texto" class="form-control-static" autofocus> &nbsp;
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </td>
            </tr>
        </table>

    </form>
</fieldset>


<br><br>

    </div>
</div>

<!-- MONTANDO A TABELA DE ASSUNTOS VINCULADOS AO RESPONSAVEL -->

<div class="row">
    <div class="col-md-12">
        
        <!-- MONTAR ======================================================================== -->
        
<?php // TABELA 

$objNoticia = new Noticia();
$listar=$objNoticia->listar($complemento_sql);
			
$saida = '';

foreach ($listar as $dados){
    //print_r($dados);
    $temp  = ""; 
    if ( strlen($dados->imagem) > 0 || strlen($dados->anexo) > 0 ) { 
        $temp = "SIM"; 
        
    } else { 
        $temp = "-";
    }
    
    $tmpDataNoticia  = new Data($dados->data_publicacao);
    $data_publicacao = $tmpDataNoticia->FormatoParaTela();
    
    $tmpDataNoticia  = new Data($dados->data_evento);
    $data_evento     = $tmpDataNoticia->FormatoParaTela();
    
    $tmpDataNoticia  = new Data($dados->data_validade);
    $data_validade     = $tmpDataNoticia->FormatoParaTela();
    
    $saida .= '<tr ';
    if ($dados->data_validade < date("Y-m-d")) {
        $saida .= ' style="color: grey"';
        $vencido = true;
    } else {
        $vencido = false;
    }
        
    $saida .= '><td>';
    $saida .= ($vencido) ? '' : '<b>';
    $saida .= $data_evento;
    $saida .= ($vencido) ? '' : '</b>';
    $saida .= '<br>';
    $saida .= ($vencido) ? '<b style="color: darkred">' : '';
    $saida .= $data_validade;
    $saida .= ($vencido) ? '</b>' : '';
    $saida .= '</td><td>'.$dados->nome_curso."<br>".$dados->nome_assunto;
    $saida .= ($dados->ano_semestre == 0) ? ' (geral)' : ' ('.$dados->ano_semestre.'º)';
    $saida .= '</td><td><b';
    $saida .= ($vencido) ? '' : ' style="color: darkgreen"';
    $saida .= '><big>'.$dados->titulo."</big></b><br>".$dados->texto.'</td>
                <td>'.$temp.'</td>
                <td><a href="noticias-unico.php?id='.$dados->id.'" class="btn ';
    $saida .= ($vencido) ? 'btn-default' : 'btn-primary';
    $saida .= '">Ver</a>  &nbsp; &nbsp;';
    
    $saida .= '<a href="noticias-up.php?id='.$dados->id.'" class="btn ';
    $saida .= ($vencido) ? 'btn-default' : 'btn-warning';
    $saida .= '">Editar</a>  &nbsp; &nbsp;';
    
    $saida .= '<a href="noticias-del.php?id='.$dados->id.'" class="btn ';
    $saida .= ($vencido) ? 'btn-default' : 'btn-danger';
    $saida .= '">Excluir</a></td> </tr>'; 
}

?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>Evento<br>Validade</th><th>Curso - Assunto (Ano/Sem.)</th><th>TEXTO</th><th>Imagem ou Anexo</th><th>Ações</th></tr>
        <?php echo $saida; ?>
    </table>
</div>
    
    </div>
