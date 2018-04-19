<?php
include 'header.php';
 include_once 'config.php';


$ind = $_GET['id'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_usuario where cd_usuario='$ind'");
$row = $rs->fetch(PDO::FETCH_OBJ);
 ?>



<html>
	<head>
		<title>Editar usuario</title>
		<meta charset="utf-8">
	</head>
	<body>

<div class="container">
		<form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $row->cd_usuario; ?>">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">NOME</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" placeholder="<?php echo $row->nm_usuario ?>" >
</div><br>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">SENHA</span>
  <input type="text" class="form-control" name="senha" aria-describedby="basic-addon1" maxlength="11" placeholder="<?php echo $row->senha_usuario ?>">
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
 $senha = $_POST["senha"];

if (empty($nome) && empty($senha)) {
  echo '
<div class="container">
  <div class="alert alert-danger" role="alert">Não deixe nada em branco..</div></div>';
exit;

}
$id = $_POST['id'];



$stmt = $pdo->prepare("UPDATE `tb_usuario` 
                       SET
                       `nm_usuario` = '$nome',
                       `senha_usuario` = '$valor',
                       WHERE `cd_usuario` = '$id'");

$stmt->execute();

  if ($stmt) {
  echo"<script language='javascript' type='text/javascript'>alert('usuario atualizado com Sucesso..');window.location.href='lisusuario.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='lisusuario.php';</script>";
  }
  
}
 ?>