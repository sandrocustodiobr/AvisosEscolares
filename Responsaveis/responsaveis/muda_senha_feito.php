<?php
$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "muda senha";

include_once "../class/Carregar.class.php";

// SE NÃO FOR ADMIN E TIVER SIDO REDIRECIONADO PARA CÁ
session_start(); // normalmente dado no topo.php
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) ){
    if ($_POST['id'] == $_SESSION['id']) {
        $o_proprio = TRUE;
        $id = $_SESSION['id'];
    } elseif ($_SESSION['admin']) {
        $o_proprio = FALSE;
        $id = filter_input(INPUT_POST, 'id');
    } else {
        header('location:../sistema/logoff.php');
    }
} else {
    header('location:../sistema/logoff.php');
}

include_once '../sistema/topo.php';
?>

<?php

$obj = new Responsavel();
$obj->id=$id;
//echo filter_input(INPUT_POST, 'senha1').'<br>';
$feito = false;
if (!empty($_POST['senha1'])) { // mudar senha
    $senha = filter_input(INPUT_POST, 'senha1');
    $senha2 = $_POST['senha2'];
    //echo "1 ".$senha."/".$senha2."/ ";
    if ($senha == $senha2) {
        $obj->setSenha($senha);
        $ok = $obj->novasenha();
        if ($ok) {
            echo "<h3 style='color: darkgreen'>Senha gravada com sucesso.</h3>";
            $feito = true;
        }
    }
}
echo (!$feito) ? '<h4>Erro ao tentar gravar...</h4>' : '';
?>

<a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>

<?php
include_once '../sistema/rodape.php';
?>