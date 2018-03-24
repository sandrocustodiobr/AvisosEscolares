<?php
$nome_modulo = "TIPOS de NOTÍCIA";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php
$obj= new Tiponoticia();

$obj->id=$_POST['id'];
$obj->descricao=$_POST['descricao'];
//$obj->MostraDados();
$feito = $obj->editar();

if ($feito) {
        echo "Atualizado com sucesso.";
} else {
        echo "ERRO AO ATUALIZAR.";
}

?>

<br><br>
<a href='tiponoticia-listar.php' class='btn btn-default'>Voltar</a>


<?php
include_once '../sistema/rodape.php';
?>