<?php include_once 'config.php'; 
include 'header.php';

$pesquisar = $_GET['pesquisar'];
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_funcionario WHERE nm_funcionario LIKE '%".$pesquisar."%'");

?>
<title>Pesquisa por: <?php echo $pesquisar; ?></title>

<div class="container">

<nav class="navbar navbar-default"><center>
<form class="navbar-form " role="search" method="GET" action="pesFuncionario.php">
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
        <th>RG</th>
        <th>TEL</th>
        <th>EMAIL</th>
        <th>CEP</th>
      </tr>
    </thead>
    <tbody>

      <?php while($row = $rs->fetch(PDO::FETCH_OBJ))
  { 

    if ($row == null)
{?>
    <tr class="info">
        <td>Nada Encontrado</td>

      </tr>
<?php }else{
?>
      <tr class="info">
        <td><?php echo $row->cd_funcionario; ?></td>
        <td><?php echo $row->nm_funcionario; ?></td>
        <td><?php echo $row->cpf_funcionario; ?></td>
        <td><?php echo $row->rg_funcionario; ?></td>
        <td><?php echo $row->tel_funcionario; ?></td>
        <td><?php echo $row->email_funcionario; ?></td>
        <td><?php echo $row->cep_funcionario; ?></td>
      </tr>
     <?php }}
 ?>
    </tbody>
  </table>

</div>
</div>