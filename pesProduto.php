<?php include_once 'config.php'; 
include 'header.php';

$pesquisar = $_GET['pesquisar'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_produto WHERE nm_produto LIKE '%".$pesquisar."%'");

?>
<title>Pesquisa por: <?php echo $pesquisar; ?></title>
<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesProduto.php">
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
        <th>VALOR</th>
        <th>QUANTIDADE</th>
        <th>TIPO</th>

      </tr>
    </thead>
    <tbody>
      <?php while($row = $rs->fetch(PDO::FETCH_OBJ))
  { ?>
      <tr class="info">
        <td><?php echo $row->cd_produto; ?></td>
        <td><?php echo $row->nm_produto; ?></td>
        <td><?php echo $row->vl_produto; ?></td>
        <td><?php echo $row->qtd_produto; ?></td>
        <td><?php echo $row->tp_produto; ?></td>
      </tr>
     <?php }
 ?>
    </tbody>
  </table>

</div>
</div>