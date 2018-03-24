<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "cadastrando";

include_once "../class/Carregar.class.php";
include_once '../sistema/topo.php';
?>

<?php // MONTANDO A LISTA DE CURSOS DO SELECT
$objCurso = new Curso();
$listar=$objCurso->listar($complemento_sql);		
$saida='<option value="0">(nenhum selecionado) Aqui você pode selecionar um...</option>';
foreach ($listar as $dados){
    $saida .= '<option value="'.$dados->id.'"';
    if ( $dados->id == $_GET['id_curso'] ) { 
        $saida .= " selected";
    }
    $saida .= '>'.$dados->id." - ".$dados->nomecurto." - ".$dados->nomelongo.'</option>';
}
?>



<form method="POST" action="assuntos-add-ok.php">
    <div id="form_resp_add">
        <label>Nome curto:</label>
        <input class="form-control" name="nomecurto" type="text" maxlength="15"/><br>

        <label>Descrição:</label>
        <input class="form-control" name="descricao" type="text" maxlength="100"/><br>
        
        <label>Ano/Semestre:</label>
        <input class="form-control" name="ano_semestre" type="number"/><br>
        
        <label>Curso:</label><br>
        <select name="id_curso" class="form-control-static">
            <?php echo $saida; ?>
        </select><br><br>
        
        <label>Imagem:</label>
        <input class="form-control" name="imagem" type="text" maxlength="100"/><br>

        <button type="submit" name="botao" value="Enviar" class="btn btn-success">Enviar</button> &nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Limpar</button> &nbsp;&nbsp;
        <a href='cursos-listar.php' class='btn btn-default'>Voltar</a>
    </div>
</form>

<?php
include_once '../sistema/rodape.php';
?>