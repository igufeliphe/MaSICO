<?php
include 'header.php';
 include_once 'config.php';


$ind = $_GET['id'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_fornecedor where cd_fornecedor='$ind'");
$row = $rs->fetch(PDO::FETCH_OBJ);
 ?>



<html>
	<head>
		<title>Editar fornecedor</title>
		<meta charset="utf-8">
	</head>
	<body>

<div class="container">
		<form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $row->cd_fornecedor; ?>">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Nome</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" placeholder="<?php echo $row->nm_fornecedor ?>" >
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CNPJ</span>
  <input type="text" class="form-control" name="cnpj" aria-describedby="basic-addon1" placeholder="<?php echo $row->cnpj_fornecedor ?>">
</div>


<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">I.E</span>
  <input type="text" class="form-control" name="ie" aria-describedby="basic-addon1" placeholder="<?php echo $row->ie_fornecedor ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Telefone</span>
  <input type="number" class="form-control" name="tel" aria-describedby="basic-addon1" placeholder="<?php echo $row->tel_fornecedor ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">E-mail</span>
  <input type="email" class="form-control" name="email" aria-describedby="basic-addon1" placeholder="<?php echo $row->email_fornecedor ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">CEP</span>
  <input type="text" class="form-control" id="cep" name="cep" aria-describedby="basic-addon1" placeholder="<?php echo $row->cep_fornecedor ?>">
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
 $cnpj = $_POST["cnpj"];
 $ie = $_POST["ie"];
 $tel = $_POST["tel"];
 $cep = $_POST["cep"];
 $email = $_POST['email'];
$id = $_POST['id'];

if (empty($nome) && empty($cpf) && empty($cnpj) && empty($rg) && empty($ie) && empty($tel) && empty($cep) && empty($num) && empty($email)) {

echo '<div class="container">
  <div class="alert alert-danger" role="alert">Não deixe nada em branco..</div></div>';
exit;


}

$stmt = $pdo->prepare("UPDATE `tb_fornecedor` 
                       SET
                       `nm_fornecedor` = '$nome',
                       `cnpj_fornecedor` = '$cnpj',
                       `ie_fornecedor` = '$ie',
                       `tel_fornecedor` = '$tel',
                       `cep_fornecedor` = '$cep',
                       `email_fornecedor` = '$email',
                       WHERE `cd_fornecedor` = '$id'");

$stmt->execute();

  if ($stmt) {
  echo"<script language='javascript' type='text/javascript'>alert('fornecedor atualizado com Sucesso..');window.location.href='lisfornecedor.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadfornecedor.php';</script>";
  }
  
}
 ?>