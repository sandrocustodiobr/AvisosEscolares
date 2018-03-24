<?php
$nome_modulo = "NOTĩCIAS";
$nome_tela = "excluindo";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"]))
{   
    $obj=new Noticia();
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
<a href='noticias.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>
