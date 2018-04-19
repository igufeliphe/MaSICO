<?php
include 'header.php';
 include_once 'config.php'; ?>



<html>
	<head>
		<title>Cadastro de Usuario</title>
		<meta charset="utf-8">
	</head>
	<body>

<div class="container">
    



<?php 
if (isset($_POST['confirmar'])) {

 if (empty($_POST['nome']) || empty($_POST['senha'])) {
   echo '<div class="alert alert-danger" role="alert">
  Os campos estão em brancos..
</div>';
exit;

 }else{

  cadUsuario();
  }
}
 ?>


<form action="" method="POST">

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" autofocus>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Senha</span>
  <input type="password" class="form-control" name="senha" aria-describedby="basic-addon1">
</div>

<br>

			<button class="btn btn-default" type="submit" name="confirmar">Cadastrar</button><br>
		</form>
	</div>
	</body>
</html>

