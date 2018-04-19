<?php include_once 'config.php'; 
include 'header.php';

$pesquisar = $_GET['pesquisar'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_cliente WHERE nm_cliente LIKE '%".$pesquisar."%'");

?>
<title>Pesquisa por: <?php echo $pesquisar; ?></title>
<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesCliente.php">
  <div class="form-group">
    <input type="text" name="pesquisar" class="form-control" placeholder="Pesquisar">
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
        <th>CPF</th>
        <th>CNPJ</th>
        <th>RG</th>
      	<th>IE</th>
      	<th>TEL</th>
      	<th>EMAIL</th>
      	<th>Nº RES</th>
      </tr>
    </thead>
    <tbody>







<?php 
$csql = "SELECT * FROM tb_cliente WHERE nm_cliente OR cpf_cliente OR email_cliente  LIKE '%".$pesquisar."%'";
$numRegistros = Count($csql);
if ($numRegistros == 0) {
	?>
<tr class="info">
<td>Nada foi encontrado..</td>
</tr>

	<?php
}



      while($row = $rs->fetch(PDO::FETCH_OBJ))
	{ ?>
      <tr class="info">
        <td><?php echo $row->cd_cliente; ?></td>
        <td><?php echo $row->nm_cliente; ?></td>
        <td><?php echo $row->cpf_cliente; ?></td>
        <td><?php echo $row->cnpj_cliente; ?></td>
        <td><?php echo $row->rg_cliente; ?></td>
        <td><?php echo $row->ie_cliente; ?></td>
        <td><?php echo $row->tel_cliente; ?></td>
        <td><?php echo $row->email_cliente; ?></td>
        <td><?php echo $row->num_res_cliente; ?></td>
      </tr>
     <?php }
 ?>
    </tbody>
  </table>

</div>