<?php include_once 'config.php'; 
include 'header.php';


$listar = lisUsuario();

?>

<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesUsuario.php">
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
        <th>NOME</th>
        <th>SENHA</th>
        
        <th><center><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></center> </th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $listar->fetch(PDO::FETCH_OBJ))
	{ ?>
    <form action="" method="GET">
      <input type="hidden" name="id" value="<?php echo $row->cd_usuario;?>">
      <tr class="info">
        <td><?php echo $row->cd_usuario; ?></td>
        <td><?php echo $row->nm_usuario; ?></td>
        <td><?php echo "**********"; ?></td>
        
        <td><center>
          
  <button type="submit" name="excluir" class="btn btn-default" onclick="return confirm('Deseja mesmo excluir este Usuario?');" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-minus" aria-hidden="true"></span></a></button>
</form>

<form action="editUsuario.php">
<input type="hidden" name="id" value="<?php echo $row->cd_usuario;?>">
  <button type="submit" name="editar" class="btn btn-default" onclick="return confirm('Deseja mesmo editar este Usuario?');"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
</form>


      </tr>
     <?php
   } 
if (isset($_GET['excluir'])) {
$pdo = conectar();
$id = $_GET['id'];
$sql = $pdo->prepare("DELETE FROM tb_usuario WHERE cd_usuario = '$id'");
$sql->execute(); 
echo"<script language='javascript' type='text/javascript'>alert('Apagado com sucesso..');window.location.href='lisUsuario.php';</script>";
}
if (isset($_GET['editar'])) {
  echo "<script language='javascript' type='text/javascript'>alert('Ainda em desenvolvimento..');window.location.href='editUsuario.php';</script>";

}











 ?>
    </tbody>
  </table>

</div>

