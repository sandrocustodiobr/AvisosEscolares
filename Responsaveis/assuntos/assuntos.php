<?php
$nome_modulo = "ASSUNTOS";
$nome_tela = "início"; 

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
        $saida .= " selected='selected'";
    }
    $saida .= '>'.$dados->id." - ".$dados->nomecurto." - ".$dados->nomelongo.'</option>';
}
?>

<a href="assuntos-listar.php" class="btn btn-primary">Listar todos</a>  &nbsp; &nbsp;

<a href="assuntos-add.php" class="btn btn-warning">Cadastrar um Assunto</a>

<br><br><br>


<fieldset>
    <legend>Filtrando ASSUNTOS...</legend>
    
    <form action="assuntos-listar.php" method="GET">
        
        <label>CURSO:</label><br>
        <select name="id_curso" class="form-control-static">
            <?php echo $saida; ?>
        </select>
        <br><br>
             
        <table>
            <tr>
                <td>
                    <label>Nome curto:</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>Descrição:</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>Ano/Semestre:</label> &nbsp; &nbsp;
                </td>
                <td>
                    <label>ID:</label> &nbsp; &nbsp;
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nomecurto" class="form-control-static" value="<?php echo $_GET["nomecurto"]; ?>" autofocus> &nbsp;
                </td>
                <td>
                    <input type="text" name="descricao" class="form-control-static" value="<?php echo $_GET["descricao"]; ?>"> &nbsp;
                </td>
                <td>
                    <input type="number" name="ano_semestre" class="form-control-static" value="<?php echo $_GET["ano_semestre"]; ?>"> &nbsp;
                </td>
                <td>
                    <input type="number" name="id" class="form-control-static" value="<?php echo $_GET["id"]; ?>"> &nbsp; &nbsp; &nbsp;
                </td>
                <td>
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </td>
            </tr>
        </table>
        
    </form>
</fieldset>

<?php
include_once '../sistema/rodape.php';
?>