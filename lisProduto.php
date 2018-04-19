<meta charset="utf-8">
<?php include_once 'config.php'; 
include 'header.php';


$listar = lisProduto();

?>
<title>Listar Produtos</title>

<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesProduto.php">
  <div class="form-group">
    <input name="pesquisar" type="text" class="form-control" placeholder="Pesquisar">
  </div>
  <button type="submit" class="btn btn-default">Procurar</button>
</form></center>
</nav>
<hr>
<br>

 <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>IMAGEM</th>
        <th>NOME</th>
        <th>TIPO</th>
        <th>QUANTIDADE</th>
        <th>VALOR</th>
        <th><center><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></center> </th>

      </tr>
    </thead>
    <tbody>
      <?php while($row = $listar->fetch(PDO::FETCH_OBJ))
	{ 
    $v = $row->vl_produto;
    $valor =  number_format($v, 2, ',', '.');?>

<form action="" method="GET">
      <tr class="info">
<input type="hidden" name="id" value="<?php echo $row->cd_produto;?>">
        <td><?php echo $row->cd_produto; ?></td>
        <td><img src="img/<?php echo $row->img_produto; ?>" style="width: 85px;height: 80px;"></td>
        <td><?php echo $row->nm_produto; ?></td>
        <td><?php echo $row->tp_produto; ?></td>
        <td><?php echo $row->qtd_produto; ?></td>
        <td><?php echo $valor; ?></td>
        <td><center>
          
  <button type="submit" name="excluir" class="btn btn-default" onclick="return confirm('Deseja mesmo excluir este produto?');" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-minus" aria-hidden="true"></span></a></button>
</form>
<form action="editProduto.php" method="GET">
<input type="hidden" name="id" value="<?php echo $row->cd_produto;?>">
  <button type="submit" class="btn btn-default" onclick="return confirm('Deseja mesmo editar este produto?');"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
</form>


      </tr>
     <?php
   } 
if (isset($_GET['excluir'])) {
$pdo = conectar();
$id = $_GET['id'];
$sql = $pdo->prepare("DELETE FROM tb_produto WHERE cd_produto = '$id'");
$sql->execute(); 
echo"<script language='javascript' type='text/javascript'>alert('Apagado com sucesso..');window.location.href='lisProduto.php';</script>";
}
if (isset($_GET['editar'])) {
  echo "<script language='javascript' type='text/javascript'>alert('Ainda em desenvolvimento..');window.location.href='lisProduto.php';</script>";
  //header('location: editProduto.php');
}











 ?>
    </tbody>
  </table>

</div>

