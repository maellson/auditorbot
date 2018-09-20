<?php 
class Usuario {
	private $id_usuario;
	private $login;
	private $dessenha;
	private $dtcadastro;
	
	public function getId_usuario(){
		return $this->id_usuario;
	}
	private function setId_usuario($value){
		$this->id_usuario = $value;
	}
	public function getLogin(){
		return $this->login;
	}
	private function setLogin($value){
		$this->login = $value;
	}
	public function getSenha(){
		return $this->dessenha;
	}
	private function setSenha($value){
		$this->dessenha = $value;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	private function setDtcadastro($value){
		$this->dtcadastro = $value;
	}
	
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuario WHERE id_usuario = :ID", array(
			":ID"=>$id
		));
		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}
	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuario ORDER BY login;");
	}
	public static function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuario WHERE login LIKE :SEARCH ORDER BY login", array(
			':SEARCH'=>"%".$login."%"
		));
	}
	public function login($login, $password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuario WHERE login = :LOGIN", array(
			":LOGIN"=>$login, 

		));
		if (count($results) > 0) {
			$this->setData($results[0]);
			if (password_verify($password,$this->getsenha())){
				return "true";
				
			} else{
			 throw new Exception("Senha inválida");}
		} else {
			throw new Exception("Login inválido.");
		}
	}
	public function verifica_login($login){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuario WHERE login = :LOGIN", array(
			":LOGIN"=>$login
		));
		if (count($results) > 0) {
			return true;
			
		} else {
			return false;
		}
	}

	private function setData($data){
		$this->setid_usuario($data['id_usuario']);
		$this->setLogin($data['login']);
		$this->setSenha($data['senha']);
		$this->setDtcadastro(new DateTime($data['data_cadastro']));
	}
	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuario_insert(:LOGIN, :PASSWORD)", array(
			':LOGIN'=>$this->getLogin(),
			':PASSWORD'=>$this->getSenha()
		));
		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}
	public function update($login, $password){
		$this->setLogin($login);
		$this->setSenha($password);
		$sql = new Sql();
		$sql->query("UPDATE tb_usuario SET login = :LOGIN, senha = :PASSWORD WHERE id_usuario = :ID", array(
			':LOGIN'=>$this->getLogin(),
			':PASSWORD'=>$this->getSenha(),
			':ID'=>$this->getId_usuario()
		));
	}
	public function delete(){
		$sql = new Sql();
		$sql->query("DELETE FROM tb_usuario WHERE id_usuario = :ID", array(
			':ID'=>$this->getId_usuario()
		));
		$this->setId_usuario(0);
		$this->setLogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());
	}
	public function __construct($login = "", $password = ""){
		$this->setLogin($login);
		$this->setSenha($password);
	}
	public function __toString(){
		return json_encode(array(
			"id_usuario"=>$this->getId_usuario(),
			"login"=>$this->getLogin(),
			"senha"=>$this->getSenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
} 	
	
 ?>