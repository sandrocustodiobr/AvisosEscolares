<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
$obj= new Assunto();

$obj->id=$_POST['id'];
$obj->nomecurto=strip_tags($_POST['nomecurto']);
$obj->descricao=strip_tags($_POST['descricao']);
$obj->ano_semestre=$_POST['ano_semestre'];
$obj->id_curso=$_POST['id_curso'];
//$obj->imagem=strip_tags($_POST['imagem']);

$feito = $obj->editar();

if ($feito) {
        echo "Atualizado com sucesso.";
} else {
        echo "ERRO AO ATUALIZAR.";
}
?>

<br><br>
<a href='assuntos-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>