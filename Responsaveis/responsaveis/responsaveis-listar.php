<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "lista/busca";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php
if ( isset($_GET['campo']) ) {
    $nome_campo=$_GET['campo'];
    $texto_busca=$_GET['texto'];
} else {
    $nome_campo="";
    $texto_busca="";
}

switch ($nome_campo) {
    case "id":
        $complemento_sql = "where id=".$_GET['texto'];
        break;
    case "nome":
        $complemento_sql = "where lower($nome_campo) like lower('%$texto_busca%')";
        break;
    case "email":
        $complemento_sql = "where lower($nome_campo) like '%$texto_busca%'";
        break;
    case "admin":
        $complemento_sql = "where admin=$texto_busca";
        break;
    default:
        $complemento_sql = "";
        break;
}
?>

<fieldset>
    <legend>Buscar RESPONSÁVEL por...</legend>
    
    <form action="responsaveis-listar.php" method="GET">
        <select name="campo" class="form-control-static">
            <option value="nome" accesskey="n"
                <?php if ($nome_campo == "nome") { echo "selected"; } ?>
                    >Nome</option>
            <option value="email" accesskey="e"
                <?php if ($nome_campo == "email") { echo "selected"; } ?>
                    >Email</option>
            <option value="id" accesskey="i"
                <?php if ($nome_campo == "id") { echo "selected"; } ?>
                    >Id</option>
            <option value="admin" accesskey="a"
                <?php if ($nome_campo == "admin") { echo "selected"; } ?>
                    >Admin (0/1)</option>
            <!-- <option value="" name="campo-busca"></option> -->
        </select>
        <input type="text" name="texto" value="<?php echo $texto_busca; ?>" class="form-control-static">
        <button type="submit" class="btn btn-primary">Buscar</button> &nbsp;&nbsp;&nbsp;
        <a href="responsaveis-listar.php" class="btn btn-primary">Listar todos</a> &nbsp;&nbsp;&nbsp;
        <a href="responsaveis-add.php" class="btn btn-warning">Cadastrar um Responsável</a>
    </form>
</fieldset>
       
<br>

<?php
$obj = new Responsavel();
$listar=$obj->listar($complemento_sql);
			
$saida='';

foreach ($listar as $dados){
    $temp = "-";
    if ( $dados->admin ) { $temp = "Sim"; }
    
    $saida .= '<tr>
    <td>'.$dados->id.'</td>
    <td>'.$dados->nome.'</td>
    <td>'.$temp.'</td>
    <td><a href="resp-assuntos.php?id='.$dados->id.'" class="btn btn-warning">Assuntos vinculados</a></td>
    <td><a href="responsaveis-unico.php?id='.$dados->id.'" class="btn btn-primary">Ver</a>
        <a href="responsaveis-upd.php?id='.$dados->id.'" class="btn btn-warning">Editar</a></td>
    <td><a href="responsaveis-del.php?id='.$dados->id.'" class="btn btn-danger">Excluir</a></td>
    </tr>';
}
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>ID</th><th>Nome</th><th>Admin</th><th>Assuntos</th><th>Ver/Editar</th><th>Excluir</th></tr>
        <?php echo $saida; ?>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>