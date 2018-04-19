<?php
include 'header.php';
 include_once 'config.php'; ?>



<html>
	<head>
		<title>Cadastro de Produtos</title>
		<meta charset="utf-8">
	</head>
	<body>
<div class="container">
		<form action="" method="POST" enctype="multipart/form-data">

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Tipo</span>
  <input type="text" class="form-control" name="tipo" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Quantidade</span>
  <input type="text" class="form-control" name="quantidade" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">R$</span>
  <input type="text" class="form-control" name="valor" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Imagem</span>
  <input type="file" class="form-control" name="foto" aria-describedby="basic-addon1">
</div>

<br>
			<button class="btn btn-default" type="submit" name="confirmar">Cadastrar</button><br>
		</form>
	</div>
	</body>
</html>

<?php 
if (isset($_POST['confirmar'])) {
	
  cadProduto();
  
}
 ?>