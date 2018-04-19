<?php include_once 'config.php'; 

include 'header.php';


?>

<style type="text/css">
  .wrapper {
    position: relative
}
* {margin:0;}

</style>
<script type="text/javascript" src="body.js"></script>
<html>
	<head>
		<title>Inicio - MASICO</title>
		<meta charset="utf-8">
	</head>
	<body style="background-image: url(img/padrao.jpg);">


		
		<div class="container-fluid">
<div class="card text-center">
  <div class="card-header">
    <h2 style="color:white;">MASICO <br><small><u>MASTER APLICAÇÃO SISTEMA COMERCIAL</u></small></h2>
  </div><br>
  <div class="card-body">
    <h5 class="card-title" style="color:white;">PHP e MySql</h5>
    <p class="card-text" style="color:white;">Estruturado em PDO.</p>
    <a href="about.php" target="_ablank"  class="btn btn-primary" title="quem fez essa bagaça" style="color:white;">Colaboradores</a>
  </div><br>
  <div class="card-footer text-muted" style="color:white;">
    Data de Entrega 20/04/2018
    <br><br>
    <button class="btn btn-primary" onclick="alert('Horário Oficial\nUTC−3 - Horário de Brasília');">
    <script>writeclock();</script></button>
  </div>
</div>
</div>

                         
                             </
	</body>
</html>

<?php 
if (isset($_POST['confirmar'])) {
	cadcliente();
}
include 'footer.php';

 ?>

