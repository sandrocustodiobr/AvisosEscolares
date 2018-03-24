<?php
$nome_modulo = "CURSOS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php
$obj= new Curso();

$obj->id=$_POST['id'];
$obj->nomecurto=$_POST['nomecurto'];
$obj->nomelongo=$_POST['nomelongo'];
//$obj->MostraDados();
$feito = $obj->editar();

if ($feito) {
        echo "Atualizado com sucesso.";
} else {
        echo "ERRO AO ATUALIZAR.";
}

//echo $objUsuario->id."...<br>";
//echo $objUsuario->nomecurto."...<br>";
//echo $objUsuario->nomelongo."...<br>";
?>

<br><br>
<a href='cursos-listar.php' class='btn btn-default'>Voltar</a>


<?php
include_once '../sistema/rodape.php';
?>