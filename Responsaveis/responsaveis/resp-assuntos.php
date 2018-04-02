<?php
session_start();

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "assuntos vinculados";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php 

if (isset($_GET['id']) && $_SESSION['admin']) {
        $idResponsavelAssuntos = $_GET['id'];
} else {
        $idResponsavelAssuntos = $_SESSION['id'];
}

$obj = new Responsavel();
$obj->id=$idResponsavelAssuntos;
$dados = $obj->retornarunico(); 
$id_responsavel = $dados->id;
$nome_responsavel = $dados->nome;
$complemento_sql = " where id_responsavel=".$dados->id;
?>

<h3 class="text-capitalize">Responsável: <?php echo $id_responsavel." - ".$nome_responsavel ?></h3>

<a href='<?php echo ($_SESSION["admin"]) ? "responsaveis-listar.php" : "responsaveis-unico.php"; ?>' class='btn btn-default'>Voltar</a> &nbsp; &nbsp;&nbsp; &nbsp;


<?php // MOSTA O GET PARA A CHAMADA DO resp-assuntos-add.php
$get_resp="?id_responsavel=".$id_responsavel."&nome_responsavel=".$nome_responsavel; ?>
<a href="resp-assuntos-add.php<?php echo $get_resp; ?>" class="btn btn-warning">Vincular Assuntos</a>  

<br><br>

    </div>
</div>

<!-- MONTANDO A TABELA DE ASSUNTOS VINCULADOS AO RESPONSAVEL -->

<div class="row">
    <div class="col-md-12">
        <p class="text-capitalize">Assuntos vinculados atualmente:</p>
        
        <!-- MONTAR ======================================================================== -->
        
<?php // TABELA 

//include_once "../class/RespAssunto.class.php";

$objRespAss = new RespAssunto();
//$listar=$objRespAss->listar();
$listar=$objRespAss->listar($complemento_sql);
			
$saida = '';

foreach ($listar as $dados){
    //print_r($dados);
    $saida .= '<tr>
    <td>'.$dados->nome_curso .'</td>
    <td>'.$dados->nome_assunto.'</td>
    <td><a href="resp-assuntos-unico.php'.$get_resp.'&id_assunto='.$dados->id.'" class="btn btn-primary">Ver</a>  &nbsp; &nbsp;
        <a href="resp-assuntos-del-ok.php'.$get_resp.'&id='.$dados->id.'" title="Desvicular assunto." class="btn btn-danger">Desvincular</a></td>
    </tr>'; 
}

if ($saida == '') {
    $saida = '<td></td><td>(sem assuntos vinculados)</td><td></td>';
}
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>Curso</th><th>Assunto</th><th>Ver/Desvincular</th></tr>
        <?php echo $saida; ?>
    </table>
</div>
    
    </div>
