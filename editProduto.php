<?php
include 'header.php';
 include_once 'config.php';


$ind = $_GET['id'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_produto where cd_produto='$ind'");
$row = $rs->fetch(PDO::FETCH_OBJ);
 ?>



<html>
	<head>
		<title>Editar produto</title>
		<meta charset="utf-8">
	</head>
	<body>

<div class="container">
		<form action="" method="POST">
<input type="hidden" name="id" value="<?php echo $row->cd_produto; ?>">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">NOME</span>
  <input type="text" class="form-control" name="nome" aria-describedby="basic-addon1" placeholder="<?php echo $row->nm_produto ?>" >
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">QUANTIDADE</span>
  <input type="text" class="form-control" name="cpf" aria-describedby="basic-addon1" maxlength="11" placeholder="<?php echo $row->qtd_produto ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">VALOR</span>
  <input type="text" class="form-control" name="cnpj" aria-describedby="basic-addon1" placeholder="<?php echo $row->vl_produto ?>">
</div>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">TIPO</span>
  <input type="text" class="form-control" name="rg" aria-describedby="basic-addon1" placeholder="<?php echo $row->tp_produto ?>">
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
 $valor = $_POST["vl"];
 $qtd = $_POST["qtd"];
 $tipo = $_POST["tipo"];
if (empty($nome) && empty($valor) && empty($qtd) && empty($tipo)) {
  echo '
<div class="container">
  <div class="alert alert-danger" role="alert">Não deixe nada em branco..</div></div>';
exit;

}
$id = $_POST['id'];



$stmt = $pdo->prepare("UPDATE `tb_produto` 
                       SET
                       `nm_produto` = '$nome',
                       `vl_produto` = '$valor',
                       `qtd_produto` = '$qtd',
                       `tp_produto` = '$tipe',
                       WHERE `cd_produto` = '$id'");

$stmt->execute();

  if ($stmt) {
  echo"<script language='javascript' type='text/javascript'>alert('Produto atualizado com Sucesso..');window.location.href='lisproduto.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadproduto.php';</script>";
  }
  
}
 ?>