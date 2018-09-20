<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Logout system</title>
    </head>
    <body>
        <?php
        session_start();
            $token = md5(session_id());
            if(isset($_GET['token']) && $_GET['token'] === $token) {
               // limpe tudo que for necessário na saída.
               // Eu geralmente não destruo a seção, mas invalido os dados da mesma
               // para evitar algum "necromancer" recuperar dados. Mas simplifiquemos:
               unset($_SESSION['login']);
               unset($_SESSION['senha']);
               session_destroy();
               header("location:../index.php");
               exit();
            } else {
               echo '<a href="doLogout.php?token='.$token.'>Confirmar logout</a>';
            }
        ?>
    </body>
</html>
