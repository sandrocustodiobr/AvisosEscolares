<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "lista/busca";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php // FILTROS
$objFiltro = new Parametros();
$objFiltro->add('int'  , 'id_curso'    , $_GET['id_curso']    );
$objFiltro->add('texto', 'nomecurto'   , $_GET['nomecurto']   );
$objFiltro->add('texto', 'descricao'   , $_GET['descricao']   );
$objFiltro->add('int'  , 'ano_semestre', $_GET['ano_semestre']);
$objFiltro->add('int'  , 'id'          , $_GET['id']          );

$complemento_sql = $objFiltro->sql();
$filtros_tela    = $objFiltro->tela();
$filtros_get     = $objFiltro->get();
?>


<?php 
if ($_SESSION['admin']) {
    echo '<label>Filtro(s): </label><?php echo $filtros_tela; ?>&nbsp;&nbsp;&nbsp;
        <a href="assuntos.php<?php echo $filtros_get; ?>" class="btn btn-primary">Editar Filtros</a> &nbsp;&nbsp;&nbsp;
        <a href="assuntos-listar.php" class="btn btn-primary">Listar todos</a> &nbsp;&nbsp;&nbsp;
        <a href="assuntos-add.php" class="btn btn-warning">Cadastrar um Assunto</a>';
}
?>

<?php // TABELA

$objAss = new Assunto();
$listar=$objAss->listar($complemento_sql); // AQUI SE APLICAM OS FILTROS
			
$saida='';

foreach ($listar as $dados){
    //print_r($dados);
    $saida .= '<tr>
    <td>'.$dados->id.'</td>
    <td>'.$dados->nomecurto.'</td>
    <td>'.$dados->descricao.'</td>
    <td>'.$dados->ano_semestre.'º</td>
    <td>'.$dados->nome_curso.'</td>
    <td>';
    if ($_SESSION['admin']) {
        $saida .= '<a href="assuntos-unico.php?id='.$dados->id.'" class="btn btn-primary">Ver</a>'
                . '<a href="tiponoticia-upd.php?id='.$dados->id.'" class="btn btn-warning">Editar</a></td>'
                . '<td><a href="tiponoticia-del.php?id='.$dados->id.'" class="btn btn-danger">Excluir</a></td>';
    } else {
        $saida .= '</td><td></td>';
    }
    $saida .= '</tr>';
}
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>ID</th><th>Nome Curto</th><th>Descrição</th><th>Ano/Sem.</th><th>Curso</th><th><?php echo ($_SESSION['admin']) ? 'Ver/Editar' : ''; ?></th><th><?php echo ($_SESSION['admin']) ? 'Excluir' : ''; ?></th></tr>
        <?php echo $saida; ?>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>