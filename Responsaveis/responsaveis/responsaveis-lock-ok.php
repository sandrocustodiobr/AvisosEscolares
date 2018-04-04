<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "bloquear";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"]))
{   
    $obj=new Responsavel();
    $obj->id=$_GET["id"];
    
    if ($_GET['acao'] == 'bloquear') {
        $feito = $obj->bloquear();
    } elseif ($_GET['acao'] == 'desbloquear') {
        $feito = $obj->desbloquear();
    } else {
        $feito = false;
    }
    if ($feito && $_GET['acao'] == 'bloquear') {
        $msg="Bloqueado com sucesso!";
    } elseif ($feito && $_GET['acao'] == 'desbloquear') {
        $msg="Desbloqueado com sucesso!";
    } else {
        $msg="ERRO AO TENTAR BLOQUEAR...";
    }
}
else 
{
    $msg="Registro (ID) não informado.";
}
echo $msg;
?>

<br><br>
<a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>
