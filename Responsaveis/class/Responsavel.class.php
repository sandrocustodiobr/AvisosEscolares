<?php

class Responsavel {
    private $id;
    private $nome;
    private $admin;
    private $email;
    private $senha;
    
    private $tabela;
    private $link;
    
    private $debug=FALSE;

    public function __construct() {
        $this->link = mysqli_connect('localhost', 'root', 'root', 'AvisosEscolares')
            or die ("<h3>Erro ao conectar ao servidor...</h3>");        
        $this->tabela = "Responsavel";
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

    public function Inserir() {
        $sql = "INSERT INTO $this->tabela (nome,admin,email,senha) values ('$this->nome','$this->admin','$this->email','$this->senha')";
        $retorno = mysqli_query($this->link, $sql);

        if ($this->debug) { echo " Query: $sql... Ret: $retorno..."; }
        return $retorno;
    }
    
    public function MostraDados() {
        echo "<br>".$this->id."<br>".$this->nome."<br>".$this->email.
                "<br>".$this->admin."<br>".$this->senha."<br>".$this->tabela."<br>";
    }
    
    public function listar($complemento = "") {     
        $sql = "SELECT * FROM $this->tabela ".$complemento;

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;
        
        while ($reg = mysqli_fetch_assoc($resultado)) {
            
            $obj = new Responsavel();
            $obj->id = $reg["id"];
            $obj->nome = $reg["nome"];
            $obj->admin = $reg["admin"];
            $obj->email = $reg["email"];
            $obj->senha = $reg["senha"];
            
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
        $retorno = false;
        $sql = "update $this->tabela set "
                . "nome='$this->nome', "
                . "admin='$this->admin', "
                . "email='$this->email' "
                . "where id=$this->id";
        //echo "<br>Query: ".$sql."<br>";
        $retorno = mysqli_query($this->link, $sql);
        return $retorno;
    }
    
    public function novasenha() {
        $retorno = false;
        $sql = "update $this->tabela set "
                . "senha='$this->senha' "
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
            $obj23 = new Curso();
            $obj23->id=$req["id"];
            $obj23->nome=$req["nome"];
            $obj23->admin=$req["admin"];
            $obj23->email=$req["email"];
            $obj23->senha=$req["senha"];

            //$this->MostraDados();
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
    
    public function login() {
        $sql = "Select * FROM $this->tabela where email='$this->email' and senha='$this->senha'";

        $resultado = mysqli_query($this->link, $sql);
        $retorno = NULL;

        $req = mysqli_fetch_assoc($resultado);
        if ($req == true) {
            $obj = new Responsavel();
            $obj->id    = $req["id"];
            $obj->name  = $req["nome"];
            $obj->email = $req["email"];
            $obj->nome  = $req["nome"];
            $obj->admin = $req["admin"];
            $retorno = $obj;
        } else {
            $retorno = null;
        }

        return $retorno;
    }
}