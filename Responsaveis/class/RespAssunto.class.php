<?php

class RespAssunto {
    private $id;
    private $id_responsavel;
    private $id_assunto;
    private $nome_assunto;
    private $nome_curso;
    private $id_curso;


    private $tabela;
    private $link;
    
    private $objTemp;
    
    private $debug=FALSE;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', 'root', 'AvisosEscolares')
            or die ("<h3>Erro ao conectar ao servidor...</h3>");        
        $this->tabela = "ResponsavelAssunto";
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
        $sql = "INSERT INTO $this->tabela (id_responsavel,id_assunto) values ('$this->id_responsavel','$this->id_assunto')";
        $retorno = mysqli_query($this->link, $sql);

        if ($this->debug) { echo " Query: $sql... Ret: $retorno..."; }
        return $retorno;
    }
    
    public function MostraDados() {
        echo "<br>".$this->id."<br>".$this->id_responsavel."<br>".$this->id_assunto."<br>".$this->tabela."<br>".$this->admin."<br>";
    }
    
    public function listar($complemento = "") {
        $sql = "SELECT $this->tabela.*,"
                ." Assunto.nomecurto as nome_assunto,"
                ." Curso.nomecurto as nome_curso,"
                ." Assunto.id_curso"
                ." FROM $this->tabela "
                ."INNER JOIN Assunto ON Assunto.id=$this->tabela.id_assunto "
                ."LEFT  JOIN Curso   ON Assunto.id_curso=Curso.id "
                .$complemento;
//        echo "<br>$sql<br>";

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;
        
        while ($reg = mysqli_fetch_assoc($resultado)) {
            
            $obj = new RespAssunto();
            $obj->id = $reg["id"];
            $obj->id_responsavel = $reg["id_responsavel"];
            $obj->id_assunto = $reg["id_assunto"];
            $obj->nome_assunto = $reg["nome_assunto"];
            $obj->nome_curso = $reg["nome_curso"];
            $obj->id_curso = $reg["id_curso"];
            
            $retorno[] = $obj;
        }
        return $retorno;
    }
    
    public function excluir() {
        $sql = "delete from $this->tabela where id=$this->id";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function editar() {
        $sql = "update $this->tabela set id_responsavel='$this->id_responsavel', id_assunto='$this->id_assunto' "
                . "where id=$this->id";
        //echo "<br>Query: ".$sql."<br>";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function retornarunico() {
        /*  Mostra reg. único */
        $sql = "Select * FROM $this->tabela where id=$this->id";
        
        //echo "<br>retornaunico: ". $this->id."<br>";

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;

        $req = mysqli_fetch_assoc($resultado);
        
        if ($req == true) {
            $obj23 = new RespAssunto();
            $obj23->id=$req["id"];
            $obj23->id_responsavel=$req["id_responsavel"];
            $obj23->id_assunto=$req["id_assunto"];

            $retorno = $obj23;
            
            if ($this->debug) { echo "if..."; }
        } else {
            $retorno = null;
            if ($this->debug) { echo "else..."; }
        }

        return $retorno;
    }
    
    public function conta() {
        $lista = $this->listar();
        return count($lista);
    }

}