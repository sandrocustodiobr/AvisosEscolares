<?php
$nome_modulo = "CURSOS";
$nome_tela = "ver/consultar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if ( !isset($_GET['id']) ) {
    echo "ID inválido.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$obj = new Curso();
$obj->id=$_GET['id'];

$dados = $obj->retornarunico();

// DEBUG
//echo "ID:".$obj->id."...";
//$obj->MostraDados();
			
$saida = "<tr><td>ID</td><td>$dados->id</td></tr>
          <tr><td>Nome curto</td><td>$dados->nomecurto</td></tr>
          <tr><td>Nome longo (por extenso)</td><td>$dados->nomelongo</td></tr>
          <tr><td><a href='cursos-listar.php' class='btn btn-default'>Voltar</a></td><td></td></tr>";
?>

<div class="content table-responsive table-full-width">
    <table class="table table-hover">
        <tbody>
            <?php echo $saida;?>
        </tbody>
    </table>
</div>

<?php
include_once '../sistema/rodape.php';
?>