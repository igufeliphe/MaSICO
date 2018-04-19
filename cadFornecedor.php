<?php
include 'header.php';
 include_once 'config.php'; ?>




<html>
	<head>
		<title>Cadastro de Fornecedor</title>
		<meta charset="utf-8">
	</head>
	<body>
<div class="container">
		<form action="" method="POST">

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CNPJ</span>
  <input type="text" class="form-control" name="cnpj" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">I.E</span>
  <input type="text" class="form-control" name="ie" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Telefone</span>
  <input type="number" class="form-control" name="tel" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CEP</span>
  <input type="number" class="form-control" id='cep' name="cep" aria-describedby="basic-addon1">
</div>


<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Rua</span>
  <input type="text" class="form-control" id="rua" name="rua" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nº</span>
  <input type="text" class="form-control" name="num" aria-describedby="basic-addon1" required>
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Bairro</span>
  <input type="text" class="form-control" id="bairro" name="bairro" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Cidade</span>
  <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Estado</span>
  <input type="text" class="form-control" id="uf" name="estado" aria-describedby="basic-addon1">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">E-mail</span>
  <input type="email" class="form-control" name="email" aria-describedby="basic-addon1">
</div>

<br>

			<button class="btn btn-default" type="submit" name="confirmar">Cadastrar</button><br>
		</form>
	</div>
	</body>
</html>

<?php 
if (isset($_POST['confirmar'])) {
	
  cadFornecedor();
  
}
 ?>


