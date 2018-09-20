<?php 

require_once "config.php";

if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username']) && !empty($_POST['psw'] ) && !empty($_POST['psw-rec'] ) )
{

		if($_POST['psw']===$_POST['psw-rec'])
		{
			$login = trim($_POST['username']);
			$senha = md5(trim($_POST['psw']));
		      
		      $user = new Usuario($login, password_hash($senha, PASSWORD_BCRYPT));
		      if(!$user->verifica_login($login)){
		      	$user->insert();

		      	//echo $user;

		      ?>

		      <script>
		      	window.alert("Cadastro realizado com Sucesso!");
		      	window.setTimeout("location.href='http://auditorbot/index.php'",100);
		      </script>

<?php
		      }

		      else 
		      {
		      	  ?>

				      <script>
				      	window.alert("ERROR: Login já cadastrado! Tente novamente");
				      	window.history.back();
				      </script>

<?php
		      }


		} //fim if psw iguais

}// fim if empty




 ?>