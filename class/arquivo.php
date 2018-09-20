<?php

/*
 *
 * @author maellson
 */
class Arquivo {
    
    private $id_arquivo;
    private $nome_arquivo;
    private $diretorio;
    private $sha256;
    private $tipo_doc;
    private $tipo_lista;
    private $observacao;
    private $id_login;
    private $data_envio;
    
    
    //getters 
    
    function getId_arquivo() {
        return $this->id_arquivo;
    }

    function getNome_arquivo() {
        return $this->nome_arquivo;
    }

    function getDiretorio() {
        return $this->diretorio;
    }

    function getSha256() {
        return $this->sha256;
    }

    function getTipo_doc() {
        return $this->tipo_doc;
    }

    function getTipo_lista() {
        return $this->tipo_lista;
    }

    function getObservacao() {
        return $this->observacao;
    }

    function getId_login() {
        return $this->id_login;
    }

    function getData_envio() {
        return $this->data_envio;
    }

    //and setters

    private function setId_arquivo($id_arquivo) {
        $this->id_arquivo = $id_arquivo;
    }

    private function setNome_arquivo($nome_arquivo) {
        $this->nome_arquivo = $nome_arquivo;
    }

    private function setDiretorio($diretorio) {
        $this->diretorio = $diretorio;
    }

    private function setSha256($sha256) {
        $this->sha256 = $sha256;
    }

    private function setTipo_doc($tipo_doc) {
        $this->tipo_doc = $tipo_doc;
    }

    private function setTipo_lista($tipo_lista) {
        $this->tipo_lista = $tipo_lista;
    }

    private function setObservacao($observacao) {
        $this->observacao = $observacao;
    }

    private function setId_login($id_login) {
        $this->id_login = $id_login;
    }

    private function setData_envio($data_envio) {
        $this->data_envio = $data_envio;
    }


     public function setData($data)
     {
        try 
        {
        $this->setId_arquivo($data['id_arquivo']);
        $this->setNome_arquivo($data['nome_arquivo']);
        $this->setDiretorio($data['diretorio']);
        $this->setSha256($data['sha256']);
        $this->setTipo_doc($data['tipo_doc']);
        $this->setTipo_lista($data['tipo_lista']);
        $this->setObservacao($data['observacao']);
        $this->setId_login($data['id_login']);        
        $this->setData_envio(new DateTime($data['data_envio']));
        }
        catch (Exception $exc) {
                echo "error no set data:";//$exc->getTraceAsString();
            }
    }
    
    public function loadById($id_arquivo){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_arquivo WHERE id_arquivo = :ID", array(
            ":ID"=>$id_arquivo
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }
    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_arquivo ORDER BY id_arquivo;");
    }
    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM vw_user_login WHERE nome LIKE :SEARCH ORDER BY nome", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }
   
    
    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_arquivo_insert(:NOME_ARQUIVO, :DIRETORIO, :SHA256,:TIPO_DOC,:TIPO_LISTA,:OBSERVACAO,:ID_LOGIN, :DATA_ENVIO)", array(
            ':NOME_ARQUIVO'=>$this->getNome_arquivo(),
            ':DIRETORIO'=> $this->getDiretorio(),
            ':SHA256'=> $this->getSha256(),
            ':TIPO_DOC'=> $this->getTipo_doc(),
            ':TIPO_LISTA'=> $this->getTipo_lista(),
            ':OBSERVACAO'=> $this->getObservacao(),
            ':ID_LOGIN'=> $this->getId_login()
  
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }

    public function __construct(
        $id_arquivo = "",
        $nome_arquivo="",
        $diretorio="",
        $sha256="",
        $tipo_doc="",
        $tipo_lista="",
        $observacao="",
        $id_login="")
    {

        $this->setId_arquivo($id_arquivo);
        $this->setNome_arquivo($nome_arquivo);
        $this->setDiretorio($diretorio);
        $this->setSha256($sha256);
        $this->setTipo_doc($tipo_doc);
        $this->setTipo_lista($tipo_lista);
        $this->setObservacao($observacao);
        $this->setId_login($id_login);
    }
    
            
   
}
