<?php
$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "muda senha";

include_once "../class/Carregar.class.php";

// SE NÃO FOR ADMIN E TIVER SIDO REDIRECIONADO PARA CÁ
session_start(); // normalmente dado no topo.php
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) ){
    if ($_GET['id_mudar_senha'] == $_SESSION['id']) {
        $o_proprio = TRUE;
        $id = $_SESSION['id'];
    } elseif ($_SESSION['admin']) {
        $o_proprio = FALSE;
        $id = filter_input(INPUT_GET, 'id_mudar_senha');
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
$dados = $obj->retornarunico();
?>

<form method="POST" action="muda_senha_feito.php">
    <div id="form_resp_add">
        <input name="id" type="number" value="<?php echo $dados->id ?>" readonly hidden/>
        
        <label>Nome:</label>
        <input class="form-control" name="nome" type="text" value="<?php echo $dados->nome ?>" readonly/><br>

        <label>Senha nova:</label>
        <input class="form-control" name="senha1" type="password" maxlength="50"/><br>

        <label>Repita:</label>
        <input class="form-control" name="senha2" type="password" maxlength="50"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>