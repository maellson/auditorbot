<!DOCTYPE html>
<html>
<head>
    <title>AuditorBOt</title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	
		
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/javascripty.js"></script>

	<link rel="icon" type="image/png" href="favicon.png" />

</head>



<body id="topo" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand logo" href="index.php"><img class="img-responsive img-rounded" src="img/logo-pmcg.png" alt="logo" width="100" height="80"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       
        <li><a href="view/login/index.php">ENVIAR LISTAS</a></li>
        <li><a href="#consultar">CONSULTAR LISTAS</a></li>
        <li><a href="#downloads">DOWNLOADS</a></li>
        <li><a href="#contact">CONTATO</a></li>
      </ul>
    </div>
  </div>

</nav>
 <div class="jumbotron imagemDeFundo text-center">
  <h1>PREFEITURA MUNICIPAL DE CAMPINA GRANDE</h1>
  <p>Secretaria de Planejamento e Gestão</p> 
</div>

<div id="consultar" class="container-fluid text-center bg-grey">
  <h2>CONSULTAR LISTAS</h2>
   <div class="row text-center slideanim">
        <div class="col-sm-5">
            <h4>Realize consultas e descubra em qual lista e qual o seu status de compatibilidade dentro das listas.</h4>
            <h4>Insira Apenas Números!</h4>
        </div>    
  
      
      <div class="col-sm-7 form-group">  
          <form name="formBusca" method="POST" action="../controller/controler.php" >
                    <input  type="radio" name="tDoc" value="CPF" checked="checked" />
                        <label>CPF </label>
                        <input  type="radio" name="tDoc" value="CNPJ" />
                        <label> NIS </label>       
                        <input class="form-control" type="text"  name="nDoc" value="" placeholder="Número do Documento" required /><br>
                        <input class="btn btn-primary" type="submit" value="Buscar" name="Buscar" />
          </form>
  
        </div><!-- fim div col-->
  </div><!-- fim div row-->
</div>


<div id="downloads" class="container-fluid text-center">
  <h2 class="text-center">Arquivos para Download</h2>
            <div class="row">

              <div class="col-sm-6 col-md-4 text-center">
                <div class="thumbnail">
                    <a href="uploads/compativeis/"><span class="glyphicon glyphicon-list-alt logo"></span></a>
                  <div class="caption">
                    <h3>COMPATÍVEIS</h3>
                    <p>...</p>
                    <p><a href="uploads/compativeis/" class="btn btn-primary" role="button">Página de Download</a> 
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <a href="uploads/incompativeis/"><span class="glyphicon glyphicon-list-alt logo"></span></a>
                  <div class="caption">
                    <h3>INCOMPATÍVEIS</h3>
                    <p>...</p>
                    <p><a href="uploads/incompativeis/" class="btn btn-primary" role="button">Download</a> 
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <a href="uploads/reserva/"><span class="glyphicon glyphicon-list-alt logo"></span></a>
                  <div class="caption">
                    <h3>RESERVA</h3>
                    <p>...</p>
                    <p><a href="uploads/reserva/" class="btn btn-primary" role="button">Download</a> 
                  </div>
                </div>
              </div>

              

            </div><!-- fim div row-->  

</div><!-- fim div arquivos-->    

<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">ENTRE EM CONTATO</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contate-nos e responderemos em até 48h!</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Campina Grande, PB</p>
      <p><span class="glyphicon glyphicon-phone"></span> +55 83 33106283</p>
      <p><span class="glyphicon glyphicon-envelope"></span> observacampina@gmail.com</p>
    </div>
    <div class="col-sm-7 slideanim">
        <form name="form_contato" method="POST" action="../controller/contactar_email.php">
            <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="Name" name="Nome" placeholder="Name" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="Email" name="Email" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="Comentario" name="Comentario" placeholder="Comentário" rows="5"></textarea><br>
          <input class="btn btn-primary pull-right" type="submit" value="Buscar" name="Buscar" />
          
          <!--<div class="g-recaptcha" data-sitekey="6Le_a2UUAAAAAJTxDdGyzNGk98UfQCNqCjxEbggg"></div> -->
        </form>
    </div>
  </div>
</div>

<footer class="footer_container container-fluid text-center">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-xl-12 col-">
            <!-- <a id="to_top" href="#myPage" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a> -->
            <button onclick="topFunction()" id="btn_top" title="Go to top">Topo</button> 
            <p id="link_footer"> <a href="http://www.observacampina.com" title="Visite o ObservaCampina">www.observacampina.com</a></p>
        </div>
    </div>
</footer>
  

<script src="js/javascripty.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

 </body>
 </html>