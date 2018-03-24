<?php
$nome_modulo = "TIPOS de NOTÍCIA";
$nome_tela = "início"; 

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<fieldset>
    <legend>Buscar TIPO de NOTÍCIA por...</legend>
    
    <form action="tiponoticia-listar.php" method="GET">
        <select name="campo" class="form-control-static">
            <option value="descricao" accesskey="l">Descrição</option>
            <option value="id" accesskey="i">Id</option>
        </select>
        <input type="text" name="texto" class="form-control-static" autofocus>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</fieldset>

<br><hr><br>
<p><a href="tiponoticia-listar.php" class="btn btn-primary">Listar todos</a></p>

<br><hr><br>
<p><a href="tiponoticia-add.php" class="btn btn-warning">Cadastrar um Tipo</a></p>

<?php
include_once '../sistema/rodape.php';
?>