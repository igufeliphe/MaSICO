<?php
include 'header.php';
 include_once 'config.php';


$ind = $_GET['id'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_funcionario where cd_funcionario='$ind'");
$row = $rs->fetch(PDO::FETCH_OBJ);
 ?>



<html>
	<head>
		<title>Editar funcionario</title>
		<meta charset="utf-8">
	</head>
	<body>

<div class="container">
		<form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $row->cd_funcionario; ?>">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" placeholder="<?php echo $row->nm_funcionario ?>" >
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CPF</span>
  <input type="text" class="form-control" name="cpf" aria-describedby="basic-addon1" placeholder="<?php echo $row->cpf_funcionario ?>">
</div>


<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">RG</span>
  <input type="text" class="form-control" name="rg" aria-describedby="basic-addon1" placeholder="<?php echo $row->rg_funcionario ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Telefone</span>
  <input type="number" class="form-control" name="tel" aria-describedby="basic-addon1" placeholder="<?php echo $row->tel_funcionario ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">E-mail</span>
  <input type="email" class="form-control" name="email" aria-describedby="basic-addon1" placeholder="<?php echo $row->email_funcionario ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CEP</span>
  <input type="text" class="form-control" id="cep" name="cep" aria-describedby="basic-addon1" placeholder="<?php echo $row->cep_funcionario ?>">
</div>
<br>



<br>
			<button class="btn btn-default" type="submit" name="confirmar">Editar</button><br>
		</form>
	</div>
	</body>
</html>

<?php 
if (isset($_POST['confirmar'])) {



 $pdo = conectar();
 $nome = $_POST["nome"];
 $cpf = $_POST["cpf"];
 $rg = $_POST["rg"];
 $tel = $_POST["tel"];
 $cep = $_POST["cep"];
 $email = $_POST['email'];

$id = $_POST['id'];

if (empty($nome) && empty($cpf) && empty($cpf) && empty($rg) && empty($rg) && empty($tel) && empty($cep) && empty($num) && empty($email)) {

echo '<div class="container">
  <div class="alert alert-danger" role="alert">Não deixe nada em branco..</div></div>';
exit;


}

$stmt = $pdo->prepare("UPDATE `tb_funcionario` 
                       SET
                       `nm_funcionario` = '$nome',
                       `cpf_funcionario` = '$cpf',
                       `rg_funcionario` = '$rg',
                       `tel_funcionario` = '$tel',
                       `cep_funcionario` = '$cep',
                       `email_funcionario` = '$email',
                       WHERE `cd_funcionario` = '$id'");

$stmt->execute();

  if ($stmt) {
  echo"<script language='javascript' type='text/javascript'>alert('funcionario atualizado com Sucesso..');window.location.href='lisFuncionario.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadFuncionario.php';</script>";
  }
  
}
 ?>