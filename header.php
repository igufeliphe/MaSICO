<?php include_once 'config.php'; 

session_start();
require 'acesso.php';
?>
<style type="text/css">
      .sem-borda{
        border-radius: 0px;
        }
      nav{
        position: fixed;
      }
    </style>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="body.php">Sistema Comercial</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li><a href="index.php">Inicio</a></li>-->
       

       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Funcionarios <span class="glyphicon glyphicon-menu-down"></span> </a>
          <ul class="dropdown-menu">
            <li><a href="cadFuncionario.php"><span class="
glyphicon glyphicon-plus"></span> Cadastrar</a></li>
            <li><a href="lisFuncionario.php"><span class="
glyphicon glyphicon-align-left"></span> Listar</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produto <span class="glyphicon glyphicon-menu-down"></span>  </a>
          <ul class="dropdown-menu">
            <li><a href="cadProduto.php"><span class="
glyphicon glyphicon-plus"></span> Cadastrar</a></li>
            <li><a href="lisProduto.php"><span class="
glyphicon glyphicon-align-left"></span> Listar</a></li>
          </ul>
        </li>

        
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Fornecedor <span class="glyphicon glyphicon-menu-down"></span>  </a>
          <ul class="dropdown-menu">
            <li><a href="cadFornecedor.php"><span class="
glyphicon glyphicon-plus"></span> Cadastrar</a></li>
            <li><a href="lisFornecedor.php"><span class="
glyphicon glyphicon-align-left"></span> Listar</a></li>
          </ul>
        </li>



        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="glyphicon glyphicon-menu-down"></span>  </a>
          <ul class="dropdown-menu">
            <li><a href="cadCliente.php"><span class="
glyphicon glyphicon-plus"></span> Cadastrar</a></li>
            <li><a href="lisCliente.php"><span class="
glyphicon glyphicon-align-left"></span> Listar</a></li>
          </ul>
        </li>



      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios <span class="glyphicon glyphicon-menu-down"></span>  </a>
          <ul class="dropdown-menu">
            <li><a href="cadUsuario.php"><span class="
glyphicon glyphicon-plus"></span> Cadastrar</a></li>
            <li><a href="lisUsuario.php"><span class="
glyphicon glyphicon-align-left"></span> Listar</a></li>
          </ul>
        </li>

      </ul>

<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="about.php"><span class="
glyphicon glyphicon-info-sign"></span> Informações</a></li>
            <li><a onclick="alert('EM DESENVOLVIMENTO..\nInforma os status de conexão com arquivos em excel ou e-mails recebidos que estão sendo incluidos no sistema\nou já estão =P');"><span class="
glyphicon glyphicon-comment"></span> API</a></li>
            <li><a href="#"><span class="
glyphicon glyphicon-envelope"></span> E-mail</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
          </ul>
        </li>
      </ul>

 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body style="background-image: url(http://hdblackwallpaper.com/wallpaper/2015/05/hd-black-background-21-background-wallpaper.jpg);">
  <style type="text/css">
    h5,h1,h3,h2,th{
      color:white;
    }
  </style>



<script>
  var clockid=new Array()
var clockidoutside=new Array()
var i_clock=-1
var thistime= new Date()
var hours=thistime.getHours()
var minutes=thistime.getMinutes()
var seconds=thistime.getSeconds()
if (eval(hours) <10) {hours="0"+hours}
if (eval(minutes) < 10) {minutes="0"+minutes}
if (seconds < 10) {seconds="0"+seconds}
var thistime = hours+":"+minutes+":"+seconds

function writeclock() {
    i_clock++
    if (document.all || document.getElementById || document.layers) {
  clockid[i_clock]="clock"+i_clock
  document.write("<span id='"+clockid[i_clock]+"' style='position:relative'>"+thistime+"</span>")
    }
}

function clockon() {
    thistime= new Date()
    hours=thistime.getHours()
    minutes=thistime.getMinutes()
    seconds=thistime.getSeconds()
    if (eval(hours) <10) {hours="0"+hours}
    if (eval(minutes) < 10) {minutes="0"+minutes}
    if (seconds < 10) {seconds="0"+seconds}
    thistime = hours+":"+minutes+":"+seconds
    
    if (document.all) {
  for (i=0;i<=clockid.length-1;i++) {
      var thisclock=eval(clockid[i])
      thisclock.innerHTML=thistime
  }
    }

    if (document.getElementById) {
  for (i=0;i<=clockid.length-1;i++) {
      document.getElementById(clockid[i]).innerHTML=thistime
  }
    }
    var timer=setTimeout("clockon()",1000)
}
window.onload=clockon
          </script>
</script>
<?php include 'modals.php'; ?>