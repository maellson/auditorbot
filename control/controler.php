<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Auditor_BOt</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="../css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../js/javascripty.js"></script>

  <link rel="icon" type="image/png" href="favicon.png" />
    </head>
    <body>

        
        <?php
        
   session_start();
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  session_destroy();
  header('location:../index.php');
  } 
              
        if (isset($_FILES['myFile']) and !empty($_FILES['myFile']) and (filter_input(INPUT_SERVER,'REQUEST_METHOD') === 'POST' )) {
            
            //carrega o arquivo
            $file = $_FILES['myFile']['tmp_name'];
     
            //echo $file. "<br>";
            
            //echo "sha256 do nome do arquivo: ".hash('sha256',"arquivo.csv")."<br>";
            //echo "sha256 da frase: ".hash('sha256',"so um teste")."<br>";
            
            //escreve o sha256 na tela
            echo "sha256 do arquivo.csv: " . hash_file('sha256', $file) ."<br>";

            
            //pega o nome do arquivo e adiciona a data e hora do upload
            $nome = date("d_m_y h.i.s "). filter_input(INPUT_POST,'Nome')."_";
            // Abre ou cria o arquivo bloco1.txt
            // w+’ – Abre para leitura e escrita; 
            // coloca o ponteiro no início do arquivo e apaga o conteúdo que já
            //  foi escrito. Se o arquivo não existir, tentar criá-lo.
            // criando o arquivo txt com o sha256 do arquivo csv
            $dirtype = filter_input(INPUT_POST, 'tipo_lista');
            $dirUploads = "../arquivos/uploads/".$dirtype;
            if(!is_dir($dirUploads)){
			mkdir($dirUploads);
			}
            $fileTxt = $dirUploads.DIRECTORY_SEPARATOR."_".$nome.$_SESSION['login']."_sha256.txt";
            $fp1 = fopen($fileTxt, "w+");
            
            
            echo "<a href='$fileTxt'>link_sha 256 do arquivo</a>";
            /**
             * nova forma de fazer o nome e dir:
             * $fp = fopen("../arquivos".DIRECTORY_SEPARATOR.mkdir(date("d_m_y")).DIRECTORY_SEPARATOR.$nome."sha256.txt", "w+");
             * 
             */
            

            // Escreve a hash criada no sha256.txt
            $escreve1 = fwrite($fp1, hash_file('sha256', $file));

            // Fecha o arquivo
            fclose($fp1); 


            try {
                //novoCarregamento($file);
                $input = carregaTable($file);
                if($input[0]>1){
                    $uploadfile = $dirUploads.DIRECTORY_SEPARATOR.date("d.m.y_h.i.s")."_".$_SESSION['login']."_".basename($_FILES['myFile']['name']);
                   // $newName =date("d.m.y_h.i.s")."_". $file['name'];
                    if(move_uploaded_file($_FILES['myFile']['tmp_name'], $uploadfile)){
                            echo "Upload realizado com Sucesso!";

                    }// fim do if mov upload
                    else{
                            throw new Exception("Error: falha ao mover o upload!");
                    }
                }
                
                 echo "<a href='$uploadfile'>link_file_upload</a>";
             
                echo "<br>dump do arquivo csv 2 " . "<br>";
                var_dump (carregaTable($uploadfile));
   
               echo "<br> tamanho do array: ".count($input)."<br>";
               // carregador tabela original
               
               $original_tabela= '../arquivos/inscritos.csv';
               $tabela_original = carregaOriginal($original_tabela);
               
                /* chmar algoritimo para cadastrar arquivo  capturar o id_arquiv*/   

                       for ($i = 1; $i < count($input); $i++) {
                            echo "nis".$i."= ".$input[$i]['nis']." nome= ".$input[$i]['nome']."<br>";
                            }
                /* Chamar algoritimo para colocar a lista de pessoas no bd*/
                   
  
                      echo "<br>============= lista saída da comparação============== <br>";
                        $arrayErrados =array();
                        /** o input daki sera a proria lista de pessoa desse id_de_arquivo*/
                      for ($i = 1; $i < count($input); $i++) {
                          for ($k = 0; $k < count($tabela_original ); $k++) {
                              
                              if($input[$i]['nis']===$tabela_original[$k]['nis']){
                                  $retorno = 'TRUE';
                                  break;
                              }else {
                                  
                                  $retorno = 'FALSE';
                              }
                              
                          }
                          if($retorno === 'FALSE'){
                             $notFound= array_push($arrayErrados, $input[$i]); 
                          }
                        
                          echo $input[$i]['nis'].'='.$retorno.'<br>';
                          /** modifica o status */
                         
                            
                      } 
                      echo '<br> ==='. "Compatíveis com erro=== <br>";
                        $test= json_encode($arrayErrados);
                        $string_ = (string) var_dump($arrayErrados);

        $lista = $arrayErrados; 

/* criar algoritimo para alterar o status dos que não forem encontrados para "error"  de acordo com o id de cada um*/
        ?>

  

  <div id="lista" class="container-fluid text-center bg-grey">
  <h2>INSCRIÇÕES ERRADAS</h2>
  <h4>Selecione as Inscrições que você deseja adicionar observações</h4>
  
  <div  class="row slideanim">
      <div class="col-sm-12">            
          <form name="Dados"  action="selectIPTU.php" method="POST"> 
                <table id="menor" class = "table table-bordered table-striped table-hover " border="1" >
                        <thead>
                            <tr>
                                <th>NOME</th>
                                <th>NIS</th>
                                <th>OBSERVAÇÃO</th>
                                
                            </tr>
                        </thead>
                         <?php   

                       foreach ($lista as $row) {
                              $nome = $row['nome'];
                              $nis = $row['nis'];
                               
                              ?>

                             <tbody>
                                    <tr>   
  
                                        <td><?= $nome; ?></td>
                                        <td><?= $nis; ?></td>
                                        <td></td>
                                        
                                    </tr>
                            </tbody>
                                 <?php } ?>
                </table>
                
           
                       
                 <br/><input class="btn btn-primary" type="submit" value="ENVIAR PROPOSTA" name="ENVIAR" />
                 
             </form>
      </div>
    </div>
</div> 


<?php





                        
                        echo $string_;
                            $fileError = $dirUploads.DIRECTORY_SEPARATOR.$nome."_".$_SESSION['login']."_"."rel_erro.txt";
                            $fp2 = fopen($fileError, "w+");

                           // Escreve "exemplo de escrita" no sha256.txt
                           $escreve2 = fwrite($fp2, $test);

                           // Fecha o arquivo
                           fclose($fp2); 
  
       
                     /**  echo "apartir daki tabela original"; 
                        foreach ( $tabela_original as $seu_valor ) {
                            echo $seu_valor . '<br>';
                        }*/

            } catch (Exception $e) {
                echo 'Exceção capturada: ', $e->getMessage(), "\n";
            }
    } else{
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        
        header('location:index.php');
    }
    
    
/**
 * 
 * Funcoes usada no codigo
 * 
 * 
 */
    function carregaOriginal($table){
                $row = 0;
                    if (($handle = fopen($table, "r")) !== FALSE) {
                             while (($col = fgetcsv($handle, 1000, ";"))!== FALSE) {
                                $row++;
                                $colunas = count($col);
                                 if($colunas<>14){
                                         throw new Exception('ERRO NA TABELA CSV ORIGINAL');
                                     }

                                 $plan[] = [
                                     'nis' => $col[0],
                                     'nome' => $col[1]
                                 ];
                             }

                         fclose($handle);
                    }
                   
            
                    return $plan;
            }
   
            //funcao criada      
            function carregaTable($table) {
                    $row = 0;
                    if (($handle = fopen($table, "r")) !== FALSE) {
                             while (($col = fgetcsv($handle, 1000, ";"))!== FALSE) {
                                $row++;
                                $colunas = count($col);
                                 if($colunas<>2){
                                         throw new Exception('ERRO NO INPUT DA LISTA');
                                     }

                                 $plan[] = [
                                     'nome' => $col[0],
                                     'nis' => $col[1]
                                 ];
                             }

                         fclose($handle);
                    }
                   
            
                    return $plan;
            }

        
        
        
        
        
        ?>


    </body>
</html>
