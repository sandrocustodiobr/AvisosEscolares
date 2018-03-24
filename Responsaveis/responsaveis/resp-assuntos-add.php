<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "vinculando assuntos";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php /* // FILTROS ASSUNTO
$objFiltro = new Parametros();
$objFiltro->add('int'  , 'id_curso'    , $_GET['id_curso']    );
$objFiltro->add('texto', 'nomecurto'   , $_GET['nomecurto']   );
$objFiltro->add('texto', 'descricao'   , $_GET['descricao']   );
$objFiltro->add('int'  , 'ano_semestre', $_GET['ano_semestre']);
$objFiltro->add('int'  , 'id'          , $_GET['id']          );

$complemento_sql = $objFiltro->sql();
$filtros_tela    = $objFiltro->tela();
$filtros_get     = $objFiltro->get(); */
?>

<h3>Responsável: &nbsp;<?php echo $_GET['id_responsavel']." - ".$_GET['nome_responsavel'];?></h3>
<a href='resp-assuntos.php?id=<?php echo $_GET['id_responsavel']; ?>' class='btn btn-default'>Voltar</a> &nbsp;
<!-- <label>Filtro(s): </label>&nbsp;<?php //echo $filtros_tela; ?>&nbsp;&nbsp;&nbsp; -->

<?php // TABELA

$objAss = new Assunto();
$listar=$objAss->listar(); // AQUI SE APLICAM OS FILTROS usando $complemento_sql
			
$saida='';

foreach ($listar as $dados){
    //print_r($dados);
    
    $objRespAss = new RespAssunto();
    $complemento_sql = " where id_assunto=".$dados->id." and id_responsavel=".$_GET['id_responsavel'];
    $lista_ass_resp = $objRespAss->listar($complemento_sql);
    if ( count($lista_ass_resp) > 0 ) {
        $link_assunto = 'Vinculado';
    } else {
        $link_assunto = '<a href="resp-assuntos-add-ok.php?id_assunto='.$dados->id.'&id_responsavel='.$_GET['id_responsavel'].'" class="btn btn-warning">Vincular</a>';
    }
    
    $saida .= '<tr>
    <td>'.$dados->id.'</td>
    <td>'.$dados->nomecurto.'</td>
    <td>'.$dados->descricao.'</td>
    <td>'.$dados->ano_semestre.'</td>
    <td>'.$dados->id_curso.'-'.$dados->nome_curso.'</td>
    <td>'.$link_assunto.'</td>
    </tr>';
}
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>ID</th><th>Nome Curto</th><th>Descrição</th><th>Ano/Sem.</th><th>Curso</th><th>Vincular</th></tr>
        <?php echo $saida; ?>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>