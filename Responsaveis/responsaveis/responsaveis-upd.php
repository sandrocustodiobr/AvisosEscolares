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

    if (isset($_GET["id"]))
    {
        $obj=new Responsavel();
        $obj->id= $_GET["id"];
        $item=$obj->retornarunico();
        //echo "<br>Lendo dados: ID: $item->id Nome Curto: $item->nomecurto Nome longo: $item->nomelongo<br>";
    }
    else 
    {
        header ("ID não informado.");
    }
    ?>

<form method="POST" action="responsaveis-upd-ok.php">
    <div id="formulario">
        <label>ID:</label>
        <input class="form-control" name="id" type="number" value="<?php echo $item->id; ?>" readonly/><br>

        <label>Nome:</label>
        <input class="form-control" name="nome" type="text" value="<?php echo $item->nome; ?>" maxlength="50"/><br>

        <label>Admin:</label>
        <input class="form-inline" name="admin" type="radio" value="1" <?php if ($item->admin) { echo "checked"; } ?>/> Sim
        <input class="form-inline" name="admin" type="radio" value="0" <?php if (!$item->admin) { echo "checked"; } ?>/> Não<br>

        <label>Email:</label>
        <input class="form-control" name="email" type="email" value="<?php echo $item->email; ?>" maxlength="50"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='responsaveis-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>