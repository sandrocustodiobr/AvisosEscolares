<?php
session_start();
if ( isset($_SESSION['logado']) && isset($_SESSION['id']) && !$_SESSION['admin'] ){
    header("location:responsaveis-unico.php");
}

$nome_modulo = "RESPONSÁVEIS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<form method="POST" action="responsaveis-add-ok.php">
    <div id="form_resp_add">
        <label>Nome:</label>
        <input class="form-control" name="nome" type="text" maxlength="50"/><br>

        <label>Admin:</label>
        <input class="form-inline" name="admin" type="radio" value="1"/> Sim
        <input class="form-inline" name="admin" type="radio" value="0" checked/> Não<br>

        <label>Email:</label>
        <input class="form-control" name="email" type="email" maxlength="50"/><br>

        <label>Senha inicial:</label>
        <input class="form-control" name="senha" type="password" maxlength="50"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>