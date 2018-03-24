<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "editar";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>


<?php
if (isset($_GET["id"])) {
    $objUsuario = new Assunto();
    $objUsuario->id = $_GET["id"];
    $item=$objUsuario->retornarunico();
    $id_curso = $item->id_curso;
    //echo "ID Curso: $item->id_curso<br>";
} else {
    header ("ID não informado.");
}
?>

<?php // MONTANDO A LISTA DE CURSOS DO SELECT
$objCurso = new Curso();
$listar=$objCurso->listar();		
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
    //echo " $dados->id == $id_curso <br>";
    $saida .= '<option value="'.$dados->id.'"';
    if ( $dados->id == $id_curso ) { // AQUI MARCA O SELECTED
        $saida .= " selected";
    }
    $saida .= '>'.$dados->id." - ".$dados->nomecurto." - ".$dados->nomelongo.'</option>';
}
?>

<form method="POST" action="assuntos-upd-ok.php">
    <div id="form_edit">
        <?php //$item->MostraDados(); ?>
        
        <label>ID:</label>
        <input class="form-control" name="id" type="number" value="<?php echo $item->id; ?>" readonly/><br>
        
        <label>Nome curto:</label>
        <input class="form-control" name="nomecurto" type="text" value="<?php echo $item->nomecurto; ?>" maxlength="15"/><br>

        <label>Descrição:</label>
        <input class="form-control" name="descricao" type="text" value="<?php echo $item->descricao; ?>" maxlength="100"/><br>
        
        <label>Ano/Semestre:</label>
        <input class="form-control" name="ano_semestre" type="number" value="<?php echo $item->ano_semestre; ?>"/><br>
        
        <label>Curso:</label><br>
        <select name="id_curso" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>
        
        <label>Imagem:</label>
        <input class="form-control" name="imagem" type="text" value="<?php echo $item->imagem; ?>" maxlength="100"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='assuntos-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>