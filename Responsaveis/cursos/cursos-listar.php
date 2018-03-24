<?php
$nome_modulo = "CURSOS";
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
    case "nomecurto":
        $complemento_sql = "where lower($nome_campo) like lower('%$texto_busca%')";
        break;
    case "nomelongo":
        $complemento_sql = "where lower($nome_campo) like '%$texto_busca%'";
        break;
    default:
        $complemento_sql = "";
        break;
}
?>

<label>Busca CURSO por</label>
  
<form action="cursos-listar.php" method="GET">
    <select name="campo" class="form-control-static">
        <option value="nomecurto" accesskey="n" 
            <?php if ($nome_campo == "nomecurto" || $nome_campo == "") { echo "selected"; } ?> 
                >Nome curto</option>
        <option value="nome" accesskey="l" 
            <?php if ($nome_campo == "nomelongo") { echo "selected"; } ?> 
                >nome Longo</option>
        <option value="id" accesskey="i" 
            <?php if ($nome_campo == "id") { echo "selected"; } ?> 
                >ID</option>
    </select>
    <input type="text" name="texto" autofocus value="<?php echo $texto_busca; ?>" class="form-control-static"> &nbsp;&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">Buscar</button> &nbsp;&nbsp;&nbsp;
    <a href="cursos-listar.php" class="btn btn-primary">Listar todos</a> &nbsp;&nbsp;&nbsp;
    <a href="cursos-add.php" class="btn btn-warning">Cadastrar um Curso</a>
</form>
       
<br>
       
<?php


//echo "Complemento: ".$complemento_sql."<br>";
//echo "Campo: ".$_GET['campo']."<br>";
//echo "Texto: ".$_GET['texto']."<br>";

$objCurso = new Curso();
$listar=$objCurso->listar($complemento_sql);
			
$saida='';

foreach ($listar as $dados){
    $saida .= '<tr>
    <td>'.$dados->id.'</td>
    <td>'.$dados->nomecurto.'</td>
    <td>'.$dados->nomelongo.'</td>
    <td><a href="cursos-unico.php?id='.$dados->id.'" class="btn btn-primary">Ver</a>
        <a href="cursos-upd.php?id='.$dados->id.'" class="btn btn-warning">Editar</a></td>
    <td><a href="cursos-del.php?id='.$dados->id.'" class="btn btn-danger">Excluir</a></td>
    </tr>';
}
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover table-striped">
        <tr><th>ID</th><th>Nome Curto</th><th>Nome Longo</th><th>Ver/Editar</th><th>Excluir</th></tr>
        <?php echo $saida; ?>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>