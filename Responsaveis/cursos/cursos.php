<?php
$nome_modulo = "CURSOS";
$nome_tela = "início"; 

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<fieldset>
    <legend>Buscar CURSO por...</legend>
    
    <form action="cursos-listar.php" method="GET">
        <select name="campo" class="form-control-static">
            <option value="nomecurto" accesskey="n">Nome curto</option>
            <option value="nomelongo" accesskey="l">nome Longo</option>
            <option value="id" accesskey="i">Id</option>
            <!-- <option value="" name="campo-busca"></option> -->
        </select>
        <input type="text" name="texto" class="form-control-static" autofocus>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</fieldset>

<br><hr><br>
<p><a href="cursos-listar.php" class="btn btn-primary">Listar todos</a></p>

<br><hr><br>
<p><a href="cursos-add.php" class="btn btn-warning">Cadastrar um Curso</a></p>

<?php
include_once '../sistema/rodape.php';
?>