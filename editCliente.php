<?php
include 'header.php';
 include_once 'config.php';


$ind = $_GET['id'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_cliente where cd_cliente='$ind'");
$row = $rs->fetch(PDO::FETCH_OBJ);
 ?>



<html>
	<head>
		<title>Editar Cliente</title>
		<meta charset="utf-8">
	</head>
	<body>

<div class="container">
		<form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $row->cd_cliente; ?>">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" placeholder="<?php echo $row->nm_cliente ?>" >
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CPF</span>
  <input type="text" class="form-control" name="cpf" aria-describedby="basic-addon1" maxlength="11" placeholder="<?php echo $row->cpf_cliente ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CNPJ</span>
  <input type="text" class="form-control" name="cnpj" aria-describedby="basic-addon1" placeholder="<?php echo $row->cnpj_cliente ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">RG</span>
  <input type="text" class="form-control" name="rg" aria-describedby="basic-addon1" placeholder="<?php echo $row->rg_cliente ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">I.E</span>
  <input type="text" class="form-control" name="ie" aria-describedby="basic-addon1" placeholder="<?php echo $row->ie_cliente ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Telefone</span>
  <input type="number" class="form-control" name="tel" aria-describedby="basic-addon1" placeholder="<?php echo $row->tel_cliente ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">E-mail</span>
  <input type="email" class="form-control" name="email" aria-describedby="basic-addon1" placeholder="<?php echo $row->email_cliente ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CEP</span>
  <input type="text" class="form-control" id="cep" name="cep" aria-describedby="basic-addon1" placeholder="<?php echo $row->cep_cliente ?>">
</div>



<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nº</span>
  <input type="text" class="form-control" name="num" aria-describedby="basic-addon1" placeholder="<?php echo $row->num_res_cliente ?>">
</div>
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
 $cnpj = $_POST["cnpj"];
 $rg = $_POST["rg"];
 $ie = $_POST["ie"];
 $tel = $_POST["tel"];
 $cep = $_POST["cep"];
 $num = $_POST["num"];
 $email = $_POST['email'];
$id = $_POST['id'];

if (empty($nome) && empty($cpf) && empty($cnpj) && empty($rg) && empty($ie) && empty($tel) && empty($cep) && empty($num) && empty($email)) {

echo '<div class="container">
  <div class="alert alert-danger" role="alert">Não deixe nada em branco..</div></div>';
exit;


}

$stmt = $pdo->prepare("UPDATE `tb_cliente` 
                       SET
                       `nm_cliente` = '$nome',
                       `cpf_cliente` = '$cpf',
                       `cnpj_cliente` = '$cnpj',
                       `rg_cliente` = '$rg',
                       `ie_cliente` = '$ie',
                       `tel_cliente` = '$tel',
                       `cep_cliente` = '$cep',
                       `email_cliente` = '$email',
                       `num_res_cliente` = '$num'
                       WHERE `cd_cliente` = '$id'");

$stmt->execute();

  if ($stmt) {
  echo"<script language='javascript' type='text/javascript'>alert('Cliente atualizado com Sucesso..');window.location.href='lisCliente.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadCliente.php';</script>";
  }
  
}
 ?>