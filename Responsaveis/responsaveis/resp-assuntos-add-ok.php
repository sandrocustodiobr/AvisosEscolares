<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "vinculando assuntos";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php

echo "Enviando...<br>";

if ( !isset($_GET['id_responsavel']) || !isset($_GET['id_assunto']) ) {
    echo "Dados inválidos.<br>";
    include_once '../sistema/rodape.php';
    return;
}

$objResp = new RespAssunto();
$objResp->id_responsavel=strip_tags($_GET['id_responsavel']);
$objResp->id_assunto=strip_tags($_GET['id_assunto']);

$inserido = $objResp->Inserir();

if ($inserido) {
    echo "<h3>Assunto vinculado com sucesso!</h3>";
} else {
    echo "<h3>ERRO AO TENTAR GRAVAR!</h3>";
}

//$objResp->MostraDados();

//echo "Fim.";

?>

<a href='resp-assuntos.php?id=<?php echo $_GET['id_responsavel'];?>' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>