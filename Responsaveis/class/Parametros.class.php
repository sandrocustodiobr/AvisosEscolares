<?php

/* 
 * RECEBE PARAMETROS E MONTA QUERY + OUTRAS FORMAR DE UTILIZAR PARAMETROS RECEBIDOS
 * Sandro Custódio - out/2017
 * 
 * EXEMPLO de uso:
 * 
$objFiltro = new Parametros();
$objFiltro->add('int'  , 'id_curso'    , $_GET['id_curso']    );
$objFiltro->add('texto', 'nomecurto'   , $_GET['nomecurto']   );
$objFiltro->add('texto', 'descricao'   , $_GET['descricao']   );
$objFiltro->add('int'  , 'ano_semestre', $_GET['ano_semestre']);
$objFiltro->add('int'  , 'id'          , $_GET['id']          );

$complemento_sql = $objFiltro->sql();
$filtros_tela    = $objFiltro->tela();
$filtros_get     = $objFiltro->get();
 */

class Parametros {
    private $campos;
    private $complemento_sql;
    private $filtros_tela;
    private $filtros_get;
    private $pronto;
    private $pvez;
    private $debug;


    public function __construct() {
        $this->campos = array();
        $this->complemento_sql = "";
        $this->filtros_tela = " Nenhum. ";
        $this->filtros_get = "";
        $this->pronto = FALSE;
        $this->debug = FALSE;
        if ($this->debug) { echo "/Parametros criada/<br>"; }
    }
    
    public function add($pTipo, $pNomeCampo, $pValor) {
        $this->campos[] = array('tipo' => $pTipo, 'nome' => $pNomeCampo, 'valor' => $pValor);
        if ($this->debug) { echo "/campo adicionado/<br>"; }
    }
    
    private function preparar() { //INICIANDO MONTAGEM DA QUERY e outras strings
        $this->pvez = TRUE;
        foreach ( $this->campos as $cParam ) {
            if ($this->debug) { echo "/processado ".$cParam['nome']."/<br>"; }
            $cValor = $cParam['valor'];
            if ( $cParam['tipo'] == 'data' ) {
                $tmpObjData = new Data($cValor);
                $cValor     = $tmpObjData->FormatoParaTela();
                $tmpDataBanco = $tmpObjData->FormatoParaGravacao();
            }
            if ( ( $cParam['tipo'] == 'int'   && is_numeric($cValor) && $cValor > 0          ) ||
                 ( $cParam['tipo'] == 'texto' && is_string($cValor)  && !empty($cValor) > 0  ) ||
                 ( $cParam['tipo'] == 'data'  && !empty($cValor)                             ) 
                ) {
                
                if ($this->debug) { echo "/dentro de ".$cParam['nome']."/<br>"; }
                if ($this->pvez) {
                    $this->complemento_sql = "where ( "; // query que aplica o filtro
                    $this->filtros_tela    = ""; // mostra filtros na tela
                    $this->filtros_get     = "?"; // devolve os filtros para o assuntos.php
                    $this->pvez = FALSE;
                    if ($this->debug) { echo "/pvez em ".$cParam['nome']."/<br>"; }
                } else {
                    if ($this->debug) { echo "/meio em ".$cParam['nome']."/<br>"; }
                    $this->complemento_sql .= " and ";
                    $this->filtros_tela    .= ",&nbsp;";
                    $this->filtros_get     .= "&";
                }
                
                if ($cParam['tipo'] == 'int')   { $this->complemento_sql .= $cParam['nome']."=".$cValor; }
                if ($cParam['tipo'] == 'data')  { $this->complemento_sql .= $cParam['nome']."='".$tmpDataBanco."'"; }
                if ($cParam['tipo'] == 'texto') { $this->complemento_sql .= $cParam['nome']." like '%".$cValor."%'"; }
                $this->filtros_tela .= "&nbsp;".$cParam['nome']."=".$cValor;
                $this->filtros_get  .= $cParam['nome']."=".$cValor;    
            } // FIM DA MONTAGM DA QUERY
            
            if ($this->debug) { echo "/string sql: ".$this->complemento_sql."/<br>".
                                     "/string tela: ".$this->filtros_tela."/<br>".
                                     "/string get: ".$this->filtros_get."/<br>"; }
        }
        if ( !$this->pvez ) { // finalizando parametros
            $this->complemento_sql .= " )";
            $this->filtros_tela    .= ". ";
            $this->filtros_get     .= "";
        }
        $this->pronto = TRUE;
        
        if ($this->debug) { echo "/string sql: ".$this->complemento_sql."/<br>".
                                 "/string tela: ".$this->filtros_tela."/<br>".
                                 "/string get: ".$this->filtros_get."/<br>"; }
    }
    
    public function sql() {
        if ( !$this->pronto ) {
            $this->preparar();
        }
        return $this->complemento_sql;
    }
    
    public function tela() {
        if ( !$this->pronto ) {
            $this->preparar();
        }
        return $this->filtros_tela;
    }
    
    public function get() {
        if ( !$this->pronto ) {
            $this->preparar();
        }
        return $this->filtros_get;
    }
}
