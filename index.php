<?php require 'config.php';
//include_once 'acesso.php';

 ?>

<title>Entrar - MASICO </title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="http://getbootstrap.com.br/docs/4.1/examples/sign-in/signin.css">
 <body>
<style type="text/css">

</style>


<body class="text-center" style="background-image: url(http://hdblackwallpaper.com/wallpaper/2015/05/hd-black-background-21-background-wallpaper.jpg);">
    <form class="form-signin" action="" method="POST">
      
      <h1 class="h3 mb-3 font-weight-normal" style="color:white;">MASICO <br><small><u>MASTER APLICAÇÃO SISTEMA COMERCIAL</u></small></h1>
      <label for="inputEmail"  class="sr-only">Usuario</label>
      <input type="text" name="nome" id="inputEmail" class="form-control" placeholder="Usuario" autofocus required><br>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label style="color:white;">
          <input type="checkbox" value="Lembrar-me" > Lembrar-me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" id="myButton" data-loading-text="Acessando.." autocomplete="off" name="confirmar" type="submit">Entrar</button><br>
      <button class="btn btn-lg btn-danger btn-block" onclick="entrar();" type="submit">Acessos</button>
    </form>

<script>
  $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script>
  function entrar() {
    alert("Usuario: admin\nSenha: 123");
  }
</script>

</body>
</body><br><br><br><br>
<?php 

if (isset($_POST['confirmar'])) {
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$pdo = conectar();





$stmt = $pdo->query("SELECT * FROM tb_usuario WHERE nm_usuario = '$nome' AND senha_usuario = '$senha'");
//$stmt = $pdo->prepare("SELECT * FROM tb_usuario WHERE nm_usuario = '$nome' AND senha_usuario = '$senha'");

$stmt->execute();


if($stmt->rowCount() <= 0)
{
 echo "<script>alert('Usuarios ou Senha Incorretos!');
            top.location.href='index.php';
            </script>";
exit;

   }
else{



session_start();
$_SESSION['logged_in'] = true;

echo "<script>alert('Voce foi autenticado com sucesso! Aguarde um instante');top.location.href='body.php';
</script>";

}





}

 ?>