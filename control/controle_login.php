<?php

require_once("config.php");
session_start();

         if(filter_input(INPUT_SERVER,'REQUEST_METHOD') === 'POST' && !empty(filter_input(INPUT_POST,'login')) && !empty(filter_input(INPUT_POST,'senha')))
        {
              $login= strip_tags(filter_input(INPUT_POST,'login'));
              $senha = md5(filter_input(INPUT_POST,'senha'));
             
            /*  echo $_SESSION['login']. "tipo= ".gettype($_SESSION['login'])." e post=". md5($_POST['login']). "tipo md5 post = ". gettype(md5($_POST['login']));
             if($_SESSION['login'] == md5($_POST['login']) ){
                 echo "iguais";
             } else {
                 echo 'diferentes';
             } }*/
            if((isset ($_SESSION['login']) == true) and ($_SESSION['login'] == $login)){
                 echo '<script> window.alert("Já Logado");'
                . ' window.setTimeout('."location.href='http://auditorbot/view/cadastrolista/index.php');</script>";
            
            } 
            else{
        
        
   
      
                    //$login = trim(htmlspecialchars($_POST['login'] ));
                    //$senha = md5(trim(htmlspecialchars($_POST['senha'] )));


                    $user = new Usuario($login,$senha);

                                 try {
					
				

							if($user->login($login, $senha) === "true"){
                                                           
                                                            $clogin= new Login($user->getId_usuario());
                                                            $clogin->insert();//Insere login
                                                            
								

								$_SESSION['login'] = $login;
                                $_SESSION['id_login']=$clogin->getId_login();// pq usei o id_login?
								$_SESSION['senha'] = md5($senha);
								header("refresh: 1; url=http://auditorbot/view/cadastrolista/index.php");


							}//fim do if verifica login

							else{
								  unset ($_SESSION['login']);
								  unset ($_SESSION['senha']);
								  header('location:index.php');
								  
						  }

				} // fim do try
			catch (Exception $e) { ?>
                        
                 <script>
                    window.alert('<?php echo $e->getMessage()?>');
                    window.setTimeout("location.href='/view/login/index.php'"); 
                </script>
 

                <?php
                           
				} //fim do catch

            }//fim do ELSE DE SESSao existente
        }//fim do if que ferifica os dados post

        else {
               ?>
                 <script>
                    window.alert('Dados de Login e Senha precisam ser preenchidos!');
                    window.setTimeout("location.href='http://auditorbot/view/login/index.php'"); 
                </script>
              
<?php                   }

