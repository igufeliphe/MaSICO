<?php
 
// inicia a sessão
session_start();
 
// muda o valor de logged_in para false
$_SESSION['logged_in'] = false;
 
// finaliza a sessão
session_destroy();
 
// retorna para a index.php

echo "<script>alert('Voce saiu');top.location.href='index.php';
            </script>";


 ?>

 
