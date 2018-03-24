<?php

class Assunto {
    private $id;
    private $id_curso;
    private $nomecurto;
    private $descricao;
    private $ano_semestre;
    private $imagem;
    private $nome_curso;


    private $tabela;
    private $link;
    
    private $objTemp;
    
    private $debug=FALSE;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', 'root', 'AvisosEscolares')
            or die ("<h3>Erro ao conectar ao servidor...</h3>");        
        $this->tabela = "Assunto";
        $this->admin = FALSE;
        if ($this->debug) { echo "construct..."; }
    }
    public function __destruct() {
        unset($this->link);
        if ($this->debug) { echo "destruct..."; }
    }

    public function __get($key) {
        return $this->$key;
        if ($this->debug) { echo "Pegando $key..."; }
    }

    //método de retorno de valores do objeto 
    public function __set($key, $value) {
        $this->$key = $value;
        if ($this->debug) { echo "Definindo $key..."; }
    }

    public function inserir() {
        $sql = "INSERT INTO $this->tabela (id_curso,nomecurto,descricao,ano_semestre,imagem)".
               " values ($this->id_curso,'$this->nomecurto','$this->descricao',$this->ano_semestre,'$this->imagem')";
        $retorno = mysqli_query($this->link, $sql);

        if ($this->debug) { echo " Query: $sql... Ret: $retorno..."; }
        return $retorno;
    }
    
    public function MostraDados() {
        echo "<br>".$this->id." / ".$this->id_curso." / ".$this->nomecurto." / ".$this->descricao." / ".$this->imagem." / ".$this->tabela." / ".$this->admin."<br>";
    }
    
    public function listar($complemento = "") {

        //$sql = "SELECT * FROM $this->tabela ".$complemento;
        $sql = "SELECT Assunto.*, Curso.nomecurto as nome_curso FROM $this->tabela INNER JOIN Curso ON Curso.id=$this->tabela.id_curso ".$complemento;
        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;
        
        while ($reg = mysqli_fetch_assoc($resultado)) {
   
            //print_r($reg);
            //echo "<br><br><br><br><br>";
            
            $obj41 = new Assunto();
            $obj41->id = $reg["id"];
            $obj41->nomecurto = $reg["nomecurto"];
            $obj41->descricao = $reg["descricao"];
            $obj41->ano_semestre = $reg["ano_semestre"];
            $obj41->imagem = $reg["imagem"];
            $obj41->id_curso = $reg["id_curso"];
            $obj41->nome_curso = $reg["nome_curso"];
            
            $retorno[] = $obj41;
        }
        return $retorno;
    }
    
    public function excluir() {
        $retorno = false;
        $sql = "delete from $this->tabela where id=$this->id";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function editar() {
        $retorno = false;
        $sql = "update $this->tabela "
                . "set id_curso=$this->id_curso,"
                . "nomecurto='$this->nomecurto', descricao='$this->descricao',"
                . "ano_semestre=$this->ano_semestre, imagem='$this->imagem' "
                . " where id=$this->id";
        //echo "<br>Query: ".$sql."<br>";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function retornarunico() {
        /*  Mostra reg. único */
        $sql = "SELECT Assunto.*, Curso.nomecurto as nome_curso FROM $this->tabela INNER JOIN Curso ON Curso.id=$this->tabela.id_curso WHERE $this->tabela.id=$this->id"; 
        //SELECT Assunto.*, Curso.nomecurto as nome_curso FROM Assunto INNER JOIN Curso ON Curso.id=Assunto.id_curso WHERE Assunto.id=4 
        
        //echo "<br>retornaunico: ". $this->id."<br>";

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;

        $reg = mysqli_fetch_assoc($resultado);
        
        //echo "..."; print_r($reg); echo "...";
        
        $obj23 = new Assunto();
        $obj23->id=$reg["id"];
        $obj23->id_curso = $reg["id_curso"];
        $obj23->nomecurto = $reg["nomecurto"];
        $obj23->descricao = $reg["descricao"];
        $obj23->ano_semestre = $reg["ano_semestre"];
        $obj23->imagem = $reg["imagem"];
        $obj23->nome_curso = $reg["nome_curso"];
            
        $retorno = $obj23;
            
        if ($this->debug) { echo "if..."; }

        return $retorno;
    }
    
    public function conta() {
        $lista = $this->listar();
        return count($lista);
    }

}