<?php
$nome_modulo = "CURSOS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php
if (isset($_GET["id"])) {
    $objUsuario=new Curso();
    $objUsuario->id= $_GET["id"];
    $item=$objUsuario->retornarunico();
    //echo "<br>Lendo dados: ID: $item->id Nome Curto: $item->nomecurto Nome longo: $item->nomelongo<br>";
} else {
    header ("ID não informado.");
}
?>

<form method="POST" action="cursos-upd-ok.php">
    <div id="formulario">
        <label>ID:</label>
        <input class="form-control" name="id" type="number" value="<?php echo $item->id; ?>" readonly/><br>

        <label>Nome curto:</label>
        <input class="form-control" name="nomecurto" type="text" value="<?php echo $item->nomecurto; ?>" maxlength="15"/><br>

        
        <label>Nome longo (por extenso):</label>
        <input class="form-control" name="nomelongo" type="text" value="<?php echo $item->nomelongo; ?>" maxlength="100"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='cursos-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>