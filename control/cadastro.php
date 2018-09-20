<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Auditor_BOt</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="../css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/javascripty.js"></script>

  <link rel="icon" type="image/png" href="favicon.png" />

</head>
<body>

<?php


if(!empty($_POST['psw']) && !empty($_POST['psw-rec']))
{

    if($_POST['psw']===$_POST['psw-rec']){
      echo 'deu certo';
    } 
    else 
      {
        
        ?>
        
        <script>
            window.alert("As senhas não são iguais");
            window.setTimeout("location.href='http://auditorbot/view/cadastro.html'",1000); 
            </script>
       

<?php
      }
}



?>
</body>