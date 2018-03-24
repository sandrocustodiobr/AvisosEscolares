<?php
$nome_modulo = "TIPOS de NOTÍCIA";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<form method="POST" action="tiponoticia-add-ok.php">
    <div id="form_resp_add">
        <label>Descrição:</label>
        <input class="form-control" name="descricao" type="text" maxlength="20" autofocus/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='tiponoticia-listar.php' class='btn btn-default'>Voltar</a>
        
        <br><br><p class="text-muted">Não é necessário criar muitos tipos de Notícia/Aviso,</p>
        <p class="text-muted"> pois havendo um único tipo de já é suficiente para o funcionamento do sistema.</p>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>