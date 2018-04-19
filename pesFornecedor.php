<?php include_once 'config.php'; 
include 'header.php';

$pesquisar = $_GET['pesquisar'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_fornecedor WHERE nm_fornecedor LIKE '%".$pesquisar."%'");

?>
<title>Pesquisa por: <?php echo $pesquisar; ?></title>
<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesFornecedor.php">
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
        <th>CNPJ</th>
        <th>IE</th>
        <th>TEL</th>
        <th>EMAIL</th>
        <th>CEP</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $rs->fetch(PDO::FETCH_OBJ))
  { ?>
      <tr class="info">
        <td><?php echo $row->cd_fornecedor; ?></td>
        <td><?php echo $row->nm_fornecedor; ?></td>
        <td><?php echo $row->cnpj_fornecedor; ?></td>
        <td><?php echo $row->ie_fornecedor; ?></td>
        <td><?php echo $row->tel_fornecedor; ?></td>
        <td><?php echo $row->email_fornecedor; ?></td>
        <td><?php echo $row->cep_fornecedor; ?></td>
      </tr>
     <?php }
 ?>
    </tbody>
  </table>

</div>
</div>