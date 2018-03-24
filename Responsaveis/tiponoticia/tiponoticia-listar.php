<?php
$nome_modulo = "TIPOS de NOTÍCIA";
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
    case "descricao":
        $complemento_sql = "where lower($nome_campo) like lower('%$texto_busca%')";
        break;
    default:
        $complemento_sql = "";
        break;
}
?>

<label>Busca TIPO de NOTÍCIA por</label>
  
<form action="tiponoticia-listar.php" method="GET">
    <select name="campo" class="form-control-static">
        <option value="descricao" accesskey="d" 
            <?php if ($nome_campo == "descricao") { echo "selected"; } ?> 
                >Descrição</option>
        <option value="id" accesskey="i" 
            <?php if ($nome_campo == "id") { echo "selected"; } ?> 
                >ID</option>
    </select>
    <input type="text" name="texto" autofocus value="<?php echo $texto_busca; ?>" class="form-control-static"> &nbsp;&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">Buscar</button> &nbsp;&nbsp;&nbsp;
    <a href="tiponoticia-listar.php" class="btn btn-primary">Listar todos</a> &nbsp;&nbsp;&nbsp;
    <a href="tiponoticia-add.php" class="btn btn-warning">Cadastrar um Curso</a>
</form>
       
<br>
       
<?php

$objCurso = new Tiponoticia();
$listar=$objCurso->listar($complemento_sql);
			
$saida='';

foreach ($listar as $dados){
    $saida .= '<tr>
    <td>'.$dados->id.'</td>
    <td>'.$dados->descricao.'</td>
    <td><a href="tiponoticia-unico.php?id='.$dados->id.'" class="btn btn-primary">Ver</a>
        <a href="tiponoticia-upd.php?id='.$dados->id.'" class="btn btn-warning">Editar</a></td>
    <td><a href="tiponoticia-del.php?id='.$dados->id.'" class="btn btn-danger">Excluir</a></td>
    </tr>';
}
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>ID</th><th>Descrição</th><th>Ver/Editar</th><th>Excluir</th></tr>
        <?php echo $saida; ?>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>