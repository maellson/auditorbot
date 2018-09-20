<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>input type</title>
	<link rel="stylesheet" href="">
</head>
<body>
    <form method="POST" enctype="multipart/form-data" >
		<input type="file" name="myFile">
		<button type="submit">send</button>

	</form>
</body>
</html>
<?php 

if (!empty($_POST['myFile'])) {
            
            //carrega o arquivo
            $subido = $_POST['myFile'];
            
            //escreve o sha256 na tela
            echo "sha256 do arquivo.csv: " . hash_file('sha256', $subido) ."<br>";
}else{
    echo "essa buceta ta vazia denovo";
}