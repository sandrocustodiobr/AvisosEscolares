<?php
$nome_modulo = "CURSOS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<form method="POST" action="cursos-add-ok.php">
    <div id="form_resp_add">
        <label>Nome curto:</label>
        <input class="form-control" name="nomecurto" type="text" maxlength="15"/><br>

        <label>Nome longo (por extenso):</label>
        <input class="form-control" name="nomelongo" type="text" maxlength="100"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='cursos-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>