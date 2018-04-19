<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    function sucesso(){
        setTimeout("window.location='index.php?=sucesso'",1000);
      //setTimeout("window.history.go(-1);",1000);
    }
</script>
<meta charset="utf-8">


<?php 
//include_once 'acesso.php';
// igor
function conectar(){
$pdo = new PDO("mysql:host=localhost;dbname=sistema","root","vertrigo");


return $pdo;
}

function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }

    return true;
}













//cliente
function cadCliente(){


 $nome = $_POST["nome"];
 $cpf = $_POST["cpf"];
 $cnpj = $_POST["cnpj"];
 $rg = $_POST["rg"];
 $ie = $_POST["ie"];
 $tel = $_POST["tel"];
 $nome = $_POST["nome"];
 $cep = $_POST["cep"];
 $num = $_POST["num"];
 $email = $_POST['email'];
 
$arq_foto = $_FILES['foto'];


$diretorio = "img/";

if(move_uploaded_file($arq_foto['tmp_name'], $diretorio.$arq_foto['name']))
{
	$pdo = conectar();
$nomefoto = $arq_foto['name'];

$stmt = $pdo->prepare("INSERT INTO tb_cliente(cd_cliente,
													nm_cliente,
											      cpf_cliente,
												  cnpj_cliente,
												  rg_cliente,
												  ie_cliente,
												  tel_cliente,
												  
												  cep_cliente,
												  email_cliente,
												  num_res_cliente,
												  img_cliente) 
										   VALUES(null,
										   		  '$nome',
										          '$cpf',
												  '$cnpj',
												  '$rg',
												  '$ie',
												  '$tel',
												  
												   $cep,
												   '$email',
												  '$num',
													'$nomefoto')");
$stmt->execute();

  if ($stmt) {
    echo"<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com Sucesso..');window.location.href='lisCliente.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadCliente.php';</script>";
  }
 }  else{
	echo "<script language='javascript' type'text/javascript'>alert('Algo aconteceu com a foto\nTente Novamente..');</script>";
	
}

}
 function lisCliente(){
 
 $pdo = conectar();
 	$rs = $pdo->query("SELECT * FROM tb_cliente");
 	return $rs;
 }








//fornecedor
function lisFornecedor(){
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_fornecedor");

return $rs;
}
function cadFornecedor(){

$pdo = conectar();
 $nome = $_POST["nome"];
 $cnpj = $_POST["cnpj"];
 $ie = $_POST["ie"];
 $tel = $_POST["tel"];
 $cep = $_POST["cep"];
 $email = $_POST['email'];


$stmt = $pdo->prepare("INSERT INTO tb_fornecedor(nm_fornecedor,
											      cnpj_fornecedor,
												  ie_fornecedor,
												  tel_fornecedor,
												  cep_fornecedor,
												  email_fornecedor) 
										   VALUES('$nome',
										          '$cnpj',
												  '$ie',
												  '$tel',
												   $cep,
												  '$email')");
$stmt->execute();

  if ($stmt) {
    echo"<script language='javascript' type='text/javascript'>alert('Fornecedor cadastrado com Sucesso..');window.location.href='lisFornecedor.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadFornecedor.php';</script>";
  }

}




//funcionario
function cadFuncionario(){

$pdo = conectar();
 $nome = $_POST["nome"];
 $cpf = $_POST["cpf"];
 $rg = $_POST["rg"];
 $tel = $_POST["tel"];
 $cep = $_POST["cep"];
 $email = $_POST['email'];

$arq_foto = $_FILES['foto'];

$diretorio = "img/";

if(move_uploaded_file($arq_foto['tmp_name'], $diretorio.$arq_foto['name']))
{
$nomefoto = $arq_foto['name'];
$stmt = $pdo->prepare("INSERT INTO tb_funcionario(nm_funcionario,
											      cpf_funcionario,
												  rg_funcionario,
												  tel_funcionario,
												  cep_funcionario,
												  email_funcionario,
												  img_funcionario) 
										   VALUES('$nome',
										          '$cpf',
												  '$rg',
												  '$tel',
												   $cep,
												   '$email',
													'$nomedafoto')");
$stmt->execute();

  if ($stmt) {
    echo"<script language='javascript' type='text/javascript'>alert('Funcionario cadastrado com Sucesso..');window.location.href='lisFuncionario.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadCliente.php';</script>";
  }
  }else{
	echo "<script language='javascript' type'text/javascript'>alert('Algo aconteceu com a foto\nTente Novamente..');</script>";
	
}

}
function lisFuncionario(){
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_funcionario");

return $rs;
}


//produtos
function cadProduto(){
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];

$arq_foto = $_FILES['foto'];

$diretorio = "img/";

if(move_uploaded_file($arq_foto['tmp_name'], $diretorio.$arq_foto['name']))
{
$nomefoto = $arq_foto['name'];
$pdo = conectar();

$stmt=$pdo->prepare("INSERT INTO tb_produto(nm_produto,
											tp_produto,
											qtd_produto,
											vl_produto,
											img_produto)
									 VALUES('$nome',
								    	   '$tipo',
				         					'$quantidade',
											'$valor',
											 '$nomefoto')");
$stmt->execute();

if ($stmt) {
	echo "<script language='javascript' type'text/javascript'>alert('Produto Cadastrado com Sucesso..');window.location.href='lisProduto.php';</script>";
}else{
	echo "<script language='javascript' type'text/javascript'>alert('Error ao Cadastrar Produto..');window.location.href='cadProduto.php';</script>";
}

}else{
	echo "<script language='javascript' type'text/javascript'>alert('Algo aconteceu com a foto\nTente Novamente..');</script>";
	
}
}

function lisProduto(){
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_produto");

return $rs;	
}



//usuario

function cadUsuario(){

$pdo = conectar();
 $nome = $_POST["nome"];
 $senha = $_POST["senha"];


$stmt = $pdo->prepare("INSERT INTO tb_usuario(nm_usuario,
											      senha_usuario
												  ) 
										   VALUES('$nome',
										          '$senha')");
$stmt->execute();

  if ($stmt) {
    echo"<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com Sucesso..');window.location.href='lisUsuario.php';</script>";
  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Algo não esta funcionando corretamente..\n Contacte um Admnistrador..');window.location.href='cadUsuario.php';</script>";
  }

}

function lisUsuario(){
$pdo = conectar();
$rs = $pdo->query("SELECT * FROM tb_usuario");

return $rs;

}


?>