<?php include_once 'config.php'; 
include 'header.php';

$listar=lisFuncionario();

?>
<title>Listar Funcionarios</title>
<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesFuncionario.php">
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
        <th>CPF</th>
      	<th>RG</th>
      	<th>TEL</th>
      	<th>EMAIL</th>
      	<th>CEP</th>
         <th><center><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></center> </th>
      </tr>
    </thead>
    <tbody>
      <?php 

      while($row = $listar->fetch(PDO::FETCH_OBJ))
	{ ?>
        <form action="" method="GET">
      <input type="hidden" name="id" value="<?php echo $row->cd_funcionario;?>">
      <tr class="info">
        <td><?php echo $row->cd_funcionario; ?></td>
        <td><img src="img/<?php echo $row->img_funcionario; ?>" style="width: 85px;height: 80px;"></td>
        <td><?php echo $row->nm_funcionario; ?></td>
        <td><?php echo $row->cpf_funcionario; ?></td>
        <td><?php echo $row->rg_funcionario; ?></td>
        <td><?php echo $row->tel_funcionario; ?></td>
        <td><?php echo $row->email_funcionario; ?></td>
        <td><?php echo $row->cep_funcionario; ?></td>
       <td><center>
          
  <button type="submit" name="excluir" class="btn btn-default" onclick="return confirm('Deseja mesmo excluir este funcionario?');" class="btn btn-default"><span class="glyphicon glyphicon glyphicon-minus" aria-hidden="true"></span></a></button>
</form>

<form method="GET" action="editFuncionario.php">
<input type="hidden" name="id" value="<?php echo $row->cd_funcionario;?>">
  <button type="submit" name="editar" class="btn btn-default" onclick="return confirm('Deseja mesmo editar este funcionario?');"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
</form>


      </tr>
     <?php
   } 
if (isset($_GET['excluir'])) {
$pdo = conectar();
$id = $_GET['id'];
$sql = $pdo->prepare("DELETE FROM tb_funcionario WHERE cd_funcionario = '$id'");
$sql->execute(); 
echo"<script language='javascript' type='text/javascript'>alert('Apagado com sucesso..');window.location.href='lisfuncionario.php';</script>";
}
if (isset($_GET['editar'])) {
  $id = $_GET['id'];


  echo "<script language='javascript' type='text/javascript'>alert('Ainda em desenvolvimento..');window.location.href='lisfuncionario.php';</script>";
  //header('location: editfuncionario.php');
}

