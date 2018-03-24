<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "Excluindo";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"]))
{   
    $obj=new Assunto();
    $obj->id=$_GET["id"];
    $feito = $obj->excluir();
    if($feito)
            $msg="Excluido com sucesso!";
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
<a href='assuntos-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>
