<?php 
class Login {

	private $id_login;
	private $id_usuario;
	private $data_login;
	
	public function getId_login(){
		return $this->id_login;
	}
	private function setId_login($value){
		$this->id_login = $value;
	}
	public function getId_usuario(){
		return $this->id_usuario;
	}
	private function setId_usuario($value){
		$this->id_usuario = $value;
	}
	
	public function getData_login(){
		return $this->data_login;
	}
	private function setData_login($value){
		$this->dtcadastro = $value;
	}
	
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_login WHERE id_login = :ID", array(
			":ID"=>$id
		));
		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}
	public static function getList(){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_login ORDER BY id_usuario;");
	}
	public static function searchLoginByUser($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_login WHERE id_usuario LIKE :SEARCH ORDER BY id_usuario", array(
			':SEARCH'=>"%".$login."%"
		));
	}
	public function login($login, $password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_login WHERE id_usuario = :LOGIN AND dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password
		));
		if (count($results) > 0) {
			$this->setData($results[0]);
		} else {
			throw new Exception("Login e/ou senha inválidos.");
		}
	}
	public function setData($data){
		$this->setId_login($data['id_login']);
		$this->setId_usuario($data['id_usuario']);
	}
	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_login_insert(:USUARIO)", array(
			':USUARIO'=>$this->getId_usuario()
		));
		if (count($results) > 0) {
			$this->setData($results[0]);
		}
	}
	
	
	public function __construct($id_usuario = ""){
		$this->setId_usuario($id_usuario);
	}
	public function __toString(){
		return json_encode(array(
			"id_login"=>$this->getId_login(),
			"id_usuario"=>$this->getId_usuario(),
			"data_login"=>$this->getData_login()->format("d/m/Y H:i:s")
		));
	}
} 	
	
 ?>