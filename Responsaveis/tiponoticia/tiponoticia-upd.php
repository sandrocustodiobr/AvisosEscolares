<?php
$nome_modulo = "TIPOS de NOTÍCIA";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php
if (isset($_GET["id"])) {
    $objUsuario=new Tiponoticia();
    $objUsuario->id= $_GET["id"];
    $item=$objUsuario->retornarunico();
} else {
    header ("ID não informado.");
}
?>

<form method="POST" action="tiponoticia-upd-ok.php">
    <div id="formulario">
        <label>ID:</label>
        <input class="form-control" name="id" type="number" value="<?php echo $item->id; ?>" readonly/><br>

        <label>Nome curto:</label>
        <input class="form-control" name="descricao" type="text" value="<?php echo $item->descricao; ?>" maxlength="20" autofocus/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='tiponoticia-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>