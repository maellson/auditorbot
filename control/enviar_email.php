<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';



$NOME= $_POST['Nome'];
$CPF = $_POST['CPF'];
$CNPJ = $_POST['CNPJ'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$inscricoes = $_POST['inscricoes'];


$divida = $_POST['dividaT'];
$numParcelas = $_POST['numParcela'];
$dataPagamento = $_POST['dataPagamento'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');





$arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
  <tr>
                 <td width='500'>Nome:$NOME</td>
                </tr>
                <tr>
                  <td width='320'>Telefone:<b>$telefone</b></td>
     </tr>
      <tr>
                  <td width='320'>Divida:<b>$divida</b></td>
                </tr>
     <tr>
                  <td width='320'>Número de parcelas:$numParcelas</td>
                </tr>
                <tr>
                  <td width='320'>Data de Pagamento:$dataPagamento</td>
                </tr>
            </td>
          </tr>  
          <tr>
            <td>Esta proposta foi enviada  em <b>$data_envio</b> às <b>$hora_envio</b></td>
          </tr>
        </table>
    </html>
  ";

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'hackerjava.lima@gmail.com';                 // SMTP username
    $mail->Password = 'gecwkekamq25';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('hackerjava.lima@gmail.com', 'Maelson Lima');
    //$mail->addAddress('felipemottagadelha@gmail.com ', 'Felipe Gadelha');     // Add a recipient
    $mail->addAddress('mqmaellson39@gmail.com','Maelson Gmail');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Proposta Seplan-teste de email';
    $mail->Body    = $arquivo;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Mensagem enviada com Sucesso';
} catch (Exception $e) {
    echo 'O E-mail não pode ser enviado! ', $mail->ErrorInfo;
}
