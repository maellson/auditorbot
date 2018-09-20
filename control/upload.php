<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>input type</title>
	<link rel="stylesheet" href="">
</head>
<body>
    <form method="POST" enctype="multipart/form-data" >
		<input type="file" name="fileUpload" accept=".csv">
		<button type="submit">send</button>

	</form>
</body>
</html>

<?php 

	if ($_SERVER["REQUEST_METHOD"]==="POST") {
		// e $_POST['tipo']
//$tipo = $_POST['tipo']
// falta pegar o tipo e colocar na pasta que tem aquele tipo
// se o tipo for um da lista, ser[a direcionado para aquel diretorio]
		if(isset($_FILES['fileUpload'])){



				$file = $_FILES["fileUpload"];
				$nomeType  = $file["name"];
                                echo $nomeType."<br>";
    
				//$domain = strstr($mimeType, 'image');
				//echo "teste: $domain <br>";
				echo $nomeType;
                                
                                echo "sha256 do arquivo.csv: " . hash_file('sha256', $file) ."<br>";
                                
				$termo = 'csv';

				$pattern = '/' . $termo . '/';
				if (preg_match($pattern, $nomeType)) //verifica se no nometype tem o termo
				{
				  		echo 'Arquivo valido';

						if($file["error"]){

							echo "error";
						}//fim do if carrega file
						$dirUploads = "../arquivos/uploads";// precisa receber o tipo

						if(!is_dir($dirUploads)){
							mkdir($dirUploads);
						}//fim if de diretorios
						$newName =date("d.m.y_h.i.s")."_". $file["name"];
						if(move_uploaded_file($file["tmp_name"], $dirUploads.DIRECTORY_SEPARATOR.$newName)){
							echo "Upload realizado com Sucesso!";

						}// fim do if mov upload
						else{
							throw new Exception("Error: falha ao mover o upload!");
						}

				} 
				else {
					  echo 'formato incorreto de upload';
					}


		} // fim do iff isset upload
		else{
			echo "Upload vazio";
		}

		
	} //fim do if post

 ?>