<?php
session_start();
if (isset($_GET['id_responsavel'])) {
    if ($_GET['id_responsavel'] == $_SESSION['id']) {
        $idResponsavelAssuntos = $_SESSION['id'];
    } elseif ($_SESSION['admin']) {
        $idResponsavelAssuntos = $_GET['id_responsavel'];
    } else { // se id for direrente e não for admin
        header("location:responsaveis-unico.php");
    }
} else {
    header("location:responsaveis-listar.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "excluindo";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"]))
{   
    $obj=new RespAssunto();
    $obj->id=$_GET["id"];
    $feito = $obj->excluir();
    if($feito)
            $msg="Assunto desvinculado com sucesso!";
    else
            $msg="ERRO AO TENTAR EXCLUIR...";
}
else 
{
    $msg="Registro (ID) não informado.";
}
echo $msg;
?>

<br><br>
<a href='resp-assuntos.php?id=<?php echo $_GET['id_responsavel'];?>' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>
