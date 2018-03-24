<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
$obj= new Responsavel();

$obj->id=$_POST['id'];
$obj->nome =strip_tags($_POST['nome']);
$obj->admin=strip_tags($_POST['admin']);
$obj->email=strip_tags($_POST['email']);
$obj->senha=strip_tags($_POST['senha']);
//$obj->MostraDados();
$feito = $obj->editar();

if ($feito) {
        echo "Atualizado com sucesso.";
} else {
        echo "ERRO AO ATUALIZAR.";
}

//echo $objUsuario->id."...<br>";
?>

<br><br>
<a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>


<?php
include_once '../sistema/rodape.php';
?>